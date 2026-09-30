<?php
declare(strict_types=1);

/**
 * Recibe los formularios. Siempre guarda el lead del lado del servidor antes de responder
 * (brief §7 "Important capture rule"):
 *  - proyecto (selector): CSV + CRM + email, después 303 a WhatsApp con el mensaje armado.
 *  - postulate / arquitecto: CSV + CRM + email, después 303 a /gracias/.
 */
require_once __DIR__ . '/includes/lib.php';
require_once __DIR__ . '/includes/form.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /contanos-tu-proyecto/', true, 303);
    exit;
}

function clean(string $k, int $max = 500): string
{
    $s = trim((string)($_POST[$k] ?? ''));
    $s = preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F]/', '', $s) ?? '';
    return mb_substr($s, 0, $max);
}

/** Teléfono en formato internacional (+595…), que es la identidad del contacto en el CRM. */
function intl_phone(string $digits): string
{
    if (str_starts_with($digits, '595')) { return '+' . $digits; }
    if (str_starts_with($digits, '0')) { return '+595' . substr($digits, 1); }
    if (strlen($digits) === 9 && $digits[0] === '9') { return '+595' . $digits; }
    return '+' . $digits;
}

function log_line(string $msg): void
{
    @file_put_contents(STORAGE_DIR . '/form.log', date('c') . ' ' . $msg . "\n", FILE_APPEND | LOCK_EX);
}

// Pruebas locales (verify.sh, tools/check-wa.mjs): solo con el servidor de desarrollo de PHP.
$dry = PHP_SAPI === 'cli-server' && ($_SERVER['HTTP_X_ARQ_DRY_RUN'] ?? '') === '1';

$source = (string)($_POST['source'] ?? '');
if ($source === 'contacto') { $source = 'proyecto'; } // formulario viejo en caché
if (!in_array($source, ['proyecto', 'arquitecto', 'postulate'], true)) { $source = 'proyecto'; }

// Anti-spam: honeypot + trampa de tiempo. Responde "ok" sin guardar nada.
$elapsed = time() - (int)($_POST['t'] ?? 0);
$minSeconds = $source === 'proyecto' ? 2 : 3;
if (clean('website') !== '' || $elapsed < $minSeconds || $elapsed > 86400) {
    header('Location: /gracias/', true, 303);
    exit;
}

// Límite simple por IP: 10 envíos por hora.
if (!$dry) {
    $ip = $_SERVER['REMOTE_ADDR'] ?? 'x';
    $rl = STORAGE_DIR . '/rl-' . sha1($ip);
    $hits = is_file($rl) ? array_filter(array_map('intval', file($rl, FILE_IGNORE_NEW_LINES) ?: []), fn($t) => $t > time() - 3600) : [];
    if (count($hits) >= 10) {
        http_response_code(429);
        exit('Demasiados envíos. Probá de nuevo más tarde.');
    }
    $hits[] = time();
    @file_put_contents($rl, implode("\n", $hits));
}

$d = [];
foreach (['nombre', 'telefono', 'email', 'mensaje', 'ciudad', 'tipo', 'terreno', 'zona', 'estudio', 'matricula', 'servicios', 'portafolio', 'architect'] as $k) {
    $d[$k] = clean($k, $k === 'mensaje' ? 4000 : 300);
}
$digits = preg_replace('/\D/', '', $d['telefono']) ?? '';
$errors = [];
$phoneOk = strlen($digits) >= 6 && strlen($digits) <= 15;

if ($source === 'proyecto') {
    $o = selector_options();
    if (!isset($o['tipo'][$d['tipo']])) { $errors['tipo'] = 'Elegí qué querés construir.'; }
    if ($d['terreno'] !== '' && !isset($o['terreno'][$d['terreno']])) { $d['terreno'] = ''; }
    if ($d['zona'] !== '' && !isset($o['zona'][$d['zona']])) { $d['zona'] = ''; }
    if ($d['telefono'] !== '' && !$phoneOk) { $errors['telefono'] = 'Revisá el número, con código de área.'; }
    $d['mensaje'] = mb_substr($d['mensaje'], 0, 600);
} else {
    if ($d['nombre'] === '') { $errors['nombre'] = 'Escribí tu nombre.'; }
    if (!$phoneOk) { $errors['telefono'] = 'Escribí un teléfono válido, con código de área.'; }
    if ($source === 'arquitecto' && $d['mensaje'] === '') { $errors['mensaje'] = 'Contanos qué querés consultar.'; }
    if ($source === 'postulate' && $d['estudio'] === '') { $errors['estudio'] = 'Escribí el nombre del estudio o profesional.'; }
}
if ($d['email'] !== '' && !filter_var($d['email'], FILTER_VALIDATE_EMAIL)) { $errors['email'] = 'Revisá el email.'; }
if ($d['portafolio'] !== '' && !preg_match('#^https?://#i', $d['portafolio'])) { $errors['portafolio'] = 'El enlace debe empezar con http:// o https://'; }
if ($d['architect'] !== '') {
    $a = architect($d['architect']);
    if (!$a || empty($a['partner'])) { $d['architect'] = ''; } // solo estudios asociados reciben consultas
}

if ($errors) {
    http_response_code(422);
    page_start([
        'title' => 'Revisá el formulario | ARQ',
        'description' => 'Hay datos por corregir en el formulario. Revisalos y volvé a enviar tu consulta a ARQ, que la deriva al profesional adecuado.',
        'path' => '/enviar.php', 'noindex' => true,
    ]);
    echo '<section class="wrap section narrow"><h1 class="display display--md">Revisá los datos</h1>';
    lead_form($source, ['architect' => $d['architect']], $d, $errors + ['_' => 'Hay campos para corregir.']);
    echo '</section>';
    page_end();
    exit;
}

$waText = $source === 'proyecto' ? selector_message($d) : '';

if (!$dry) {
    // 1) Copia local (CSV) siempre.
    $row = [date('c'), $source, $d['architect'], $d['nombre'], $d['telefono'], $d['email'], $d['ciudad'], $d['tipo'], '', $d['estudio'], $d['portafolio'], $d['mensaje'], $d['terreno'], $d['zona'], $d['matricula'], $d['servicios'], (string)($_SERVER['HTTP_REFERER'] ?? '')];
    if ($fh = @fopen(STORAGE_DIR . '/leads.csv', 'ab')) {
        flock($fh, LOCK_EX);
        fputcsv($fh, $row, ',', '"', '\\');
        fclose($fh);
    } else {
        log_line('No se pudo escribir storage/leads.csv');
    }

    // 2) VenderCRM (nunca bloquea al visitante). El teléfono es la identidad: sin teléfono no se envía.
    if (CRM_API_KEY !== '' && $phoneOk && function_exists('curl_init')) {
        $fields = array_filter([
            'tipo' => $d['tipo'], 'terreno' => $d['terreno'], 'zona' => $d['zona'], 'ciudad' => $d['ciudad'],
            'estudio' => $d['estudio'], 'matricula' => $d['matricula'], 'servicios' => $d['servicios'],
            'portafolio' => $d['portafolio'], 'arquitecto' => $d['architect'],
        ], fn($x) => $x !== '');
        $attr = [];
        if (!empty($_COOKIE['vc_attr'])) {
            $j = json_decode((string)$_COOKIE['vc_attr'], true);
            $attr = is_array($j) ? $j : [];
        }
        $payload = array_filter([
            'name' => $d['nombre'],
            'phone' => intl_phone($digits),
            'email' => $d['email'],
            'message' => $waText !== '' ? $waText : $d['mensaje'],
            'source' => 'arq.com.py:' . $source,
            'idempotency_key' => bin2hex(random_bytes(16)), // uno nuevo por envío (reglas de VenderCRM)
            'page_url' => (string)($_SERVER['HTTP_REFERER'] ?? ''),
            'fields' => $fields ?: null,
        ] + array_intersect_key($attr, array_flip(['utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content', 'gclid', 'fbclid'])),
            fn($x) => $x !== '' && $x !== null);
        try {
            $ch = curl_init(CRM_ENDPOINT);
            curl_setopt_array($ch, [
                CURLOPT_POST => true,
                CURLOPT_HTTPHEADER => ['Content-Type: application/json', 'X-Api-Key: ' . CRM_API_KEY],
                CURLOPT_POSTFIELDS => json_encode($payload, JSON_UNESCAPED_UNICODE),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_TIMEOUT => 10,
            ]);
            $res = curl_exec($ch);
            $code = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
            if ($code !== 200 && $code !== 201) {
                log_line("CRM $code " . substr((string)$res, 0, 300));
            }
        } catch (Throwable $t) {
            log_line('CRM error ' . $t->getMessage());
        }
    }

    // 3) Aviso por email (opcional).
    if (NOTIFY_EMAIL !== '') {
        $body = $waText !== '' ? "Mensaje: $waText\n\n" : '';
        foreach ($d as $k => $val) {
            if ($val !== '') { $body .= "$k: " . str_replace(["\r", "\n"], ' ', $val) . "\n"; }
        }
        @mail(NOTIFY_EMAIL, 'Nuevo contacto arq.com.py (' . $source . ')', $body,
            'Content-Type: text/plain; charset=UTF-8' . (filter_var($d['email'], FILTER_VALIDATE_EMAIL) ? "\r\nReply-To: " . $d['email'] : ''));
    }
}

// 4) Selector: a WhatsApp con el contexto ya escrito. Los demás: página de gracias.
header('Location: ' . ($source === 'proyecto' ? wa($waText) : '/gracias/'), true, 303);

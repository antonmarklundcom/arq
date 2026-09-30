<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/lib.php';
require_once __DIR__ . '/includes/form.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /contacto', true, 303);
    exit;
}

function clean(string $k, int $max = 500): string
{
    $s = trim((string)($_POST[$k] ?? ''));
    $s = preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F]/', '', $s) ?? '';
    return mb_substr($s, 0, $max);
}

function log_line(string $msg): void
{
    @file_put_contents(STORAGE_DIR . '/form.log', date('c') . ' ' . $msg . "\n", FILE_APPEND | LOCK_EX);
}

$source = in_array($_POST['source'] ?? '', ['contacto', 'arquitecto', 'postulate'], true) ? $_POST['source'] : 'contacto';

// Anti-spam: honeypot + trampa de tiempo (mínimo 3 s). Responde "ok" sin enviar nada.
$elapsed = time() - (int)($_POST['t'] ?? 0);
if (clean('website') !== '' || $elapsed < 3 || $elapsed > 86400) {
    header('Location: /gracias', true, 303);
    exit;
}

// Límite simple por IP: 10 envíos por hora.
$ip = $_SERVER['REMOTE_ADDR'] ?? 'x';
$rl = STORAGE_DIR . '/rl-' . sha1($ip);
$hits = is_file($rl) ? array_filter(array_map('intval', file($rl, FILE_IGNORE_NEW_LINES) ?: []), fn($t) => $t > time() - 3600) : [];
if (count($hits) >= 10) {
    http_response_code(429);
    exit('Demasiados envíos. Probá de nuevo más tarde.');
}
$hits[] = time();
@file_put_contents($rl, implode("\n", $hits));

$d = [];
foreach (['nombre', 'telefono', 'email', 'mensaje', 'ciudad', 'tipo', 'presupuesto', 'estudio', 'portafolio', 'architect'] as $k) {
    $d[$k] = clean($k, $k === 'mensaje' ? 4000 : 300);
}
$errors = [];
if ($d['nombre'] === '') { $errors['nombre'] = 'Escribí tu nombre.'; }
$digits = preg_replace('/\D/', '', $d['telefono']) ?? '';
if (strlen($digits) < 6 || strlen($digits) > 15) { $errors['telefono'] = 'Escribí un teléfono válido, por ejemplo 0981 123 456.'; }
if ($d['email'] !== '' && !filter_var($d['email'], FILTER_VALIDATE_EMAIL)) { $errors['email'] = 'Revisá el email.'; }
if ($source === 'arquitecto' && $d['mensaje'] === '') { $errors['mensaje'] = 'Contanos qué querés consultar.'; }
if ($source === 'postulate' && $d['estudio'] === '') { $errors['estudio'] = 'Escribí el nombre del estudio.'; }
if ($d['portafolio'] !== '' && !preg_match('#^https?://#i', $d['portafolio'])) { $errors['portafolio'] = 'El enlace debe empezar con http:// o https://'; }
if ($d['architect'] !== '' && !architect($d['architect'])) { $d['architect'] = ''; }

if ($errors) {
    http_response_code(422);
    $back = ['contacto' => '/contacto', 'arquitecto' => '/arquitectos/' . $d['architect'], 'postulate' => '/postulate'];
    page_start([
        'title' => 'Revisá el formulario | MONOGRAFÍA',
        'description' => 'Hay datos por corregir en el formulario. Revisalos y volvé a enviar tu consulta a arq.com.py.',
        'path' => '/enviar.php', 'noindex' => true,
    ]);
    echo '<section class="wrap section"><h1 class="display display--md">Revisá los datos</h1>';
    lead_form($source, ['architect' => $d['architect']], $d + ['nombre' => $d['nombre']], $errors + ['_' => 'Hay campos para corregir.']);
    echo '</section>';
    page_end();
    exit;
}

// 1) Copia local (CSV) siempre.
$row = [date('c'), $source, $d['architect'], $d['nombre'], $d['telefono'], $d['email'], $d['ciudad'], $d['tipo'], $d['presupuesto'], $d['estudio'], $d['portafolio'], $d['mensaje']];
if ($fh = @fopen(STORAGE_DIR . '/leads.csv', 'ab')) {
    flock($fh, LOCK_EX);
    fputcsv($fh, $row, ',', '"', '\\');
    fclose($fh);
}

// 2) VenderCRM (nunca bloquea al visitante).
if (CRM_API_KEY !== '' && function_exists('curl_init')) {
    $fields = array_filter([
        'tipo' => $d['tipo'], 'ciudad' => $d['ciudad'], 'presupuesto' => $d['presupuesto'],
        'estudio' => $d['estudio'], 'portafolio' => $d['portafolio'], 'arquitecto' => $d['architect'],
    ], fn($x) => $x !== '');
    $attr = [];
    if (!empty($_COOKIE['vc_attr'])) {
        $j = json_decode((string)$_COOKIE['vc_attr'], true);
        $attr = is_array($j) ? $j : [];
    }
    $payload = array_filter([
        'name' => $d['nombre'],
        'phone' => $d['telefono'],
        'email' => $d['email'],
        'message' => $d['mensaje'],
        'source' => 'arq.com.py:' . $source,
        'idempotency_key' => hash('sha256', $digits . '|' . $source . '|' . date('Y-m-d-H')),
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
    $body = '';
    foreach ($d as $k => $val) {
        if ($val !== '') { $body .= "$k: " . str_replace(["\r", "\n"], ' ', $val) . "\n"; }
    }
    @mail(NOTIFY_EMAIL, 'Nuevo contacto arq.com.py (' . $source . ')', $body,
        'Content-Type: text/plain; charset=UTF-8' . (filter_var($d['email'], FILTER_VALIDATE_EMAIL) ? "\r\nReply-To: " . $d['email'] : ''));
}

header('Location: /gracias', true, 303);

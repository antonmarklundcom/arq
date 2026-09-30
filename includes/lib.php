<?php
declare(strict_types=1);

require_once __DIR__ . '/config.php';

function e(?string $s): string
{
    return htmlspecialchars((string)$s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function architects(): array
{
    static $a = null;
    return $a ??= require __DIR__ . '/data/architects.php';
}

function works(): array
{
    static $w = null;
    return $w ??= require __DIR__ . '/data/works.php';
}

function find_by_slug(array $list, string $slug): ?array
{
    foreach ($list as $item) {
        if ($item['slug'] === $slug) {
            return $item;
        }
    }
    return null;
}

function architect(string $slug): ?array { return find_by_slug(architects(), $slug); }
function work(string $slug): ?array { return find_by_slug(works(), $slug); }

/** Obras de un arquitecto (relación muchos a muchos por slug). */
function works_of(string $architectSlug): array
{
    return array_values(array_filter(works(), fn($w) => in_array($architectSlug, $w['architects'], true)));
}

function architects_of(array $work): array
{
    return array_values(array_filter(array_map('architect', $work['architects'])));
}

function url(string $path = '/'): string { return SITE_URL . $path; }

function wa(string $text = ''): string
{
    return 'https://wa.me/' . WHATSAPP_NUMBER . ($text !== '' ? '?text=' . rawurlencode($text) : '');
}

/** Mapa de mensajes de WhatsApp (includes/data/whatsapp.json). */
function wa_map(): array
{
    static $m = null;
    return $m ??= json_decode((string)file_get_contents(__DIR__ . '/data/whatsapp.json'), true) ?: [];
}

/** Mensaje de la página actual: 'wa' en page_start() o la entrada del mapa para su ruta. */
function wa_message(): string
{
    $p = $GLOBALS['page'] ?? [];
    return $p['wa'] ?? (wa_map()['pages'][$p['path'] ?? '/'] ?? wa_map()['pages']['/']);
}

/** Plantilla del mapa con {marcadores} reemplazados. */
function wa_template(string $key, array $vars): string
{
    $t = wa_map()['templates'][$key] ?? '';
    foreach ($vars as $k => $v) {
        $t = str_replace('{' . $k . '}', $v, $t);
    }
    return $t;
}

/** Enlace de WhatsApp con el mensaje de la página actual. */
function wa_page(): string
{
    return wa(wa_message());
}

function example_badge(array $item): string
{
    return !empty($item['example']) ? '<span class="badge" title="Contenido de muestra, no real">Ejemplo</span>' : '';
}

function initials(string $name): string
{
    $out = '';
    foreach (preg_split('/\s+/', $name) ?: [] as $w) {
        if (mb_strlen($w) > 2) {
            $out .= mb_strtoupper(mb_substr($w, 0, 1));
        }
    }
    return mb_substr($out, 0, 2);
}

/* ---------- Layout + SEO ---------- */

$GLOBALS['page'] = [];

function page_start(array $m): void
{
    $m += ['path' => '/', 'og_type' => 'website', 'jsonld' => [], 'crumbs' => [], 'noindex' => false, 'body' => ''];
    $GLOBALS['page'] = $m;
    $canonical = url($m['path']);
    $graph = [
        [
            '@type' => 'Organization', '@id' => url('/#org'), 'name' => SITE_SHORT, 'url' => url('/'),
            'description' => SITE_TAGLINE,
        ],
        [
            '@type' => 'WebSite', '@id' => url('/#site'), 'url' => url('/'), 'name' => SITE_NAME,
            'inLanguage' => SITE_LOCALE, 'publisher' => ['@id' => url('/#org')],
        ],
    ];
    if ($m['crumbs']) {
        $items = [];
        foreach ($m['crumbs'] as $i => [$label, $path]) {
            $items[] = ['@type' => 'ListItem', 'position' => $i + 1, 'name' => $label, 'item' => url($path)];
        }
        $graph[] = ['@type' => 'BreadcrumbList', 'itemListElement' => $items];
    }
    foreach ($m['jsonld'] as $node) {
        $graph[] = $node;
    }
    $ld = json_encode(['@context' => 'https://schema.org', '@graph' => $graph],
        JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP);
    $title = $m['title'];
    $desc = $m['description'];
    $fonts = is_file(__DIR__ . '/../assets/fonts/fonts.css');
    if ($m['noindex']) {
        header('X-Robots-Tag: noindex');
    }
    ?>
<!doctype html>
<html lang="es-PY">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= e($title) ?></title>
<meta name="description" content="<?= e($desc) ?>">
<link rel="canonical" href="<?= e($canonical) ?>">
<link rel="alternate" hreflang="es-PY" href="<?= e($canonical) ?>">
<link rel="alternate" hreflang="x-default" href="<?= e($canonical) ?>">
<meta name="robots" content="<?= $m['noindex'] ? 'noindex,follow' : 'index,follow,max-image-preview:large' ?>">
<meta name="theme-color" content="#141210">
<meta property="og:site_name" content="<?= e(SITE_NAME) ?>">
<meta property="og:locale" content="es_PY">
<meta property="og:type" content="<?= e($m['og_type']) ?>">
<meta property="og:title" content="<?= e($title) ?>">
<meta property="og:description" content="<?= e($desc) ?>">
<meta property="og:url" content="<?= e($canonical) ?>">
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="<?= e($title) ?>">
<meta name="twitter:description" content="<?= e($desc) ?>">
<link rel="icon" href="/assets/img/favicon.svg" type="image/svg+xml">
<?php if ($fonts): ?><link rel="stylesheet" href="/assets/fonts/fonts.css"><?php endif; ?>
<link rel="stylesheet" href="/assets/css/style.css">
<script type="application/ld+json"><?= $ld ?></script>
</head>
<body class="<?= e($m['body']) ?>">
<a class="skip" href="#main">Saltar al contenido</a>
<?php include __DIR__ . '/header.php'; ?>
<main id="main">
<?php
}

function page_end(): void
{
    ?>
</main>
<?php include __DIR__ . '/footer.php'; ?>
<script src="/assets/js/main.js" defer></script>
</body>
</html>
<?php
}

function crumbs_html(array $crumbs): string
{
    $h = '<nav class="crumbs" aria-label="Migas de pan"><ol>';
    $last = count($crumbs) - 1;
    foreach ($crumbs as $i => [$label, $path]) {
        $h .= $i === $last
            ? '<li aria-current="page">' . e($label) . '</li>'
            : '<li><a href="' . e($path) . '">' . e($label) . '</a></li>';
    }
    return $h . '</ol></nav>';
}

/** Placeholder de ladrillo (CSS). Reemplazar por foto: ver docs/owner-todo.md */
function brick(int $tone, string $label = ''): string
{
    return '<div class="brick brick--' . (int)$tone . '" role="img" aria-label="' . e($label) . '"></div>';
}

/** Pared de ladrillo de muestra para tarjetas de obras */
function work_card(array $w): string
{
    $n = str_pad((string)(array_search($w['slug'], array_column(works(), 'slug'), true) + 1), 3, '0', STR_PAD_LEFT);
    return '<a class="card" href="/obras/' . e($w['slug']) . '">'
        . brick((int)$w['tone'], 'Imagen de referencia pendiente: ' . $w['title'])
        . '<span class="card__n">N° ' . $n . '</span>'
        . '<h3 class="card__t">' . e($w['title']) . ' ' . example_badge($w) . '</h3>'
        . '<p class="card__m">' . e($w['type']) . ' · ' . e($w['city']) . ($w['year'] ? ' · ' . e($w['year']) : '') . '</p>'
        . '</a>';
}

function architect_card(array $a): string
{
    return '<a class="card card--person" href="/arquitectos/' . e($a['slug']) . '">'
        . '<span class="folio" aria-hidden="true">' . e(initials($a['name'])) . '</span>'
        . '<h3 class="card__t">' . e($a['name']) . ' ' . example_badge($a) . '</h3>'
        . '<p class="card__m">' . e($a['type']) . ' · ' . e($a['city']) . '</p>'
        . '<p>' . e($a['summary']) . '</p></a>';
}

function not_found(): never
{
    http_response_code(404);
    require __DIR__ . '/../404.php';
    exit;
}

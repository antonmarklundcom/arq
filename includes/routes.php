<?php
declare(strict_types=1);

/**
 * Rutas del sitio: un solo lugar. Lo usan app.php (Hostinger, vía .htaccess)
 * y router.php (desarrollo local). Plan de URLs: docs/seo/arq-urls.md.
 *
 * Cada ruta: archivo en pages/ y si va al sitemap (index).
 * Una ruta cuyo archivo todavía no existe no se sirve ni entra al sitemap.
 */
function routes(): array
{
    return [
        '/'                                          => ['home.php', true],
        '/contanos-tu-proyecto/'                     => ['contanos-tu-proyecto.php', true],
        '/como-funciona/'                            => ['como-funciona.php', true],
        '/servicios/'                                => ['servicios.php', true],
        '/servicios/anteproyecto-arquitectonico/'    => ['servicios/anteproyecto-arquitectonico.php', true],
        '/servicios/planos-documentacion-municipal/' => ['servicios/planos-documentacion-municipal.php', true],
        '/servicios/calculo-estructural/'            => ['servicios/calculo-estructural.php', true],
        '/servicios/direccion-de-proyecto/'          => ['servicios/direccion-de-proyecto.php', true],
        '/proyectos/'                                => ['proyectos.php', true],
        '/proyectos/casa-nueva/'                     => ['proyectos/casa-nueva.php', true],
        '/proyectos/reforma-ampliacion/'             => ['proyectos/reforma-ampliacion.php', true],
        '/arquitectos/'                              => ['arquitectos.php', true],
        '/obras/'                                    => ['obras.php', true],
        '/para-arquitectos/'                         => ['para-arquitectos.php', true],
        '/privacidad/'                               => ['privacidad.php', true],
        '/terminos/'                                 => ['terminos.php', true],
        '/gracias/'                                  => ['gracias.php', false],
    ];
}

/**
 * Redirecciones 301 permanentes. Cada una está también en .htaccess
 * (verify.sh comprueba que coincidan) y en docs/audit/redirects.tsv.
 */
function redirects(): array
{
    return [
        // URLs viejas del directorio (PLAN.md)
        '/contacto/'         => '/contanos-tu-proyecto/',
        '/postulate/'        => '/para-arquitectos/',
        '/nosotros/'         => '/como-funciona/',
        // URLs del documento de estructura anterior (nunca publicadas)
        '/planos/'           => '/servicios/planos-documentacion-municipal/',
        '/carpeta/'          => '/servicios/planos-documentacion-municipal/',
        '/diseno/'           => '/servicios/anteproyecto-arquitectonico/',
        '/estructural/'      => '/servicios/calculo-estructural/',
        '/como-trabajamos/'  => '/como-funciona/',
        '/cotizar/'          => '/contanos-tu-proyecto/',
    ];
}

/** Fichas dinámicas: /obras/{slug}/ y /arquitectos/{slug}/ */
function dynamic_routes(): array
{
    return [
        '#^/obras/([a-z0-9-]+)/$#'       => 'obra.php',
        '#^/arquitectos/([a-z0-9-]+)/$#' => 'arquitecto.php',
    ];
}

function page_file(string $file): string
{
    return dirname(__DIR__) . '/pages/' . $file;
}

/** Rutas publicadas en el sitemap (archivo existente e indexable). */
function sitemap_routes(): array
{
    return array_keys(array_filter(routes(), fn($r) => $r[1] && is_file(page_file($r[0]))));
}

function redirect_301(string $to): never
{
    $qs = (string)($_SERVER['QUERY_STRING'] ?? '');
    header('Location: ' . $to . ($qs !== '' ? '?' . $qs : ''), true, 301);
    exit;
}

/** Resuelve la ruta y carga la página. Termina en 404 si no existe. */
function dispatch(string $path): void
{
    if ($path === '/sitemap.xml') { require dirname(__DIR__) . '/sitemap.php'; return; }
    if ($path === '/robots.txt') { require dirname(__DIR__) . '/robots.php'; return; }

    $redirects = redirects();
    // Sin barra final: redirección explícita en un salto, o se agrega la barra.
    if ($path !== '/' && !str_ends_with($path, '/') && preg_match('#^/[a-z0-9/-]+$#', $path)) {
        redirect_301($redirects[$path . '/'] ?? $path . '/');
    }
    if (isset($redirects[$path])) {
        redirect_301($redirects[$path]);
    }
    $r = routes()[$path] ?? null;
    if ($r && is_file(page_file($r[0]))) {
        require page_file($r[0]);
        return;
    }
    foreach (dynamic_routes() as $re => $file) {
        if (preg_match($re, $path, $m)) {
            $_GET['slug'] = $m[1];
            require page_file($file);
            return;
        }
    }
    not_found();
}

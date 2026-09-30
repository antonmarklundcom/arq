<?php
declare(strict_types=1);
/** Router para desarrollo local: php -S localhost:8000 router.php */
$path = rawurldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?: '/');

$private = preg_match('#^/(includes|storage|docs|tools|audit-shots|\.)#', $path) || preg_match('#\.(md|sh|json|lock|log)$#', $path);
if ($path !== '/' && is_file(__DIR__ . $path) && !$private) {
    return false; // asset estático o .php directo (enviar.php)
}
if ($path === '/') { require __DIR__ . '/index.php'; return true; }
$map = [
    '#^/sitemap\.xml$#' => 'sitemap.php',
    '#^/robots\.txt$#' => 'robots.php',
    '#^/obras/([a-z0-9-]+)/?$#' => ['obra.php', 'slug'],
    '#^/arquitectos/([a-z0-9-]+)/?$#' => ['arquitecto.php', 'slug'],
    '#^/([a-z]+)/?$#' => ['*', 'page'],
];
foreach ($map as $re => $target) {
    if (!preg_match($re, $path, $m)) { continue; }
    if (is_string($target)) { require __DIR__ . '/' . $target; return true; }
    if ($target[0] === '*') {
        $f = __DIR__ . '/' . $m[1] . '.php';
        if (in_array($m[1], ['includes', 'router', 'enviar', 'obra', 'arquitecto', 'sitemap', 'robots'], true) || !is_file($f)) { break; }
        require $f; return true;
    }
    $_GET[$target[1]] = $m[1];
    require __DIR__ . '/' . $target[0];
    return true;
}
require __DIR__ . '/404.php';

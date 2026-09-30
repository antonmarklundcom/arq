<?php
declare(strict_types=1);
/** Router para desarrollo local: php -S localhost:8000 router.php (imita .htaccess). */
$path = rawurldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?: '/');

$private = preg_match('#^/(includes|storage|docs|tools|audit-shots|pages|\.)#', $path) || preg_match('#\.(md|sh|json|lock|log)$#', $path)
    || preg_match('#^/(app|router|sitemap|robots|index)\.php$#', $path);
if ($private) {
    http_response_code(403);
    exit('Forbidden');
}
if ($path !== '/' && is_file(__DIR__ . $path)) {
    return false; // asset estático o enviar.php
}
require __DIR__ . '/app.php';

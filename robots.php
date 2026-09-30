<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/config.php';
header('Content-Type: text/plain; charset=utf-8');
echo "User-agent: *\nAllow: /\nDisallow: /enviar.php\nDisallow: /gracias\n\nSitemap: " . SITE_URL . "/sitemap.xml\n";

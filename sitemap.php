<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/lib.php';
header('Content-Type: application/xml; charset=utf-8');
$urls = sitemap_routes();
foreach (works() as $w) { if (empty($w['example'])) { $urls[] = '/obras/' . $w['slug'] . '/'; } }
foreach (architects() as $a) { if (empty($a['example'])) { $urls[] = '/arquitectos/' . $a['slug'] . '/'; } }
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">
<?php foreach ($urls as $u): ?>
  <url><loc><?= e(url($u)) ?></loc><xhtml:link rel="alternate" hreflang="es-PY" href="<?= e(url($u)) ?>"/></url>
<?php endforeach; ?>
</urlset>

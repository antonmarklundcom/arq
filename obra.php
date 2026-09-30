<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/lib.php';

$w = work((string)($_GET['slug'] ?? '')) ?? not_found();
$auth = architects_of($w);
$crumbs = [['Inicio', '/'], ['Obras', '/obras'], [$w['title'], '/obras/' . $w['slug']]];
$node = [
    '@type' => 'CreativeWork', 'name' => $w['title'], 'url' => url('/obras/' . $w['slug']),
    'description' => $w['summary'], 'inLanguage' => SITE_LOCALE,
    'creator' => array_map(fn($a) => ['@type' => 'Organization', 'name' => $a['name'], 'url' => url('/arquitectos/' . $a['slug'])], $auth),
    'locationCreated' => ['@type' => 'Place', 'name' => $w['city']],
];
if ($w['year']) { $node['dateCreated'] = $w['year']; }
if (!$auth) { unset($node['creator']); }
$title = mb_substr($w['title'], 0, 44) . ' | MONOGRAFÍA';
$desc = $w['summary'] . ' ' . $w['type'] . ' en ' . $w['city'] . '. Créditos y estudios en MONOGRAFÍA.';
if (mb_strlen($desc) > 155) { $desc = mb_substr($desc, 0, 152) . '...'; }
if (mb_strlen($desc) < 120) { $desc .= ' Ficha completa con autores y datos de la obra en arq.com.py.'; $desc = mb_substr($desc, 0, 155); }

page_start(['title' => $title, 'description' => $desc, 'path' => '/obras/' . $w['slug'], 'wa' => wa_template('work', ['title' => $w['title']]), 'crumbs' => $crumbs, 'jsonld' => [$node], 'og_type' => 'article', 'noindex' => !empty($w['example'])]);
?>
<article class="wrap section">
  <?= crumbs_html($crumbs) ?>
  <p class="eyebrow"><?= e($w['type']) ?> · <?= e($w['city']) ?><?= $w['year'] ? ' · ' . e($w['year']) : '' ?></p>
  <h1 class="display display--lg"><?= e($w['title']) ?> <?= example_badge($w) ?></h1>
  <?= brick((int)$w['tone'], 'Imagen de referencia pendiente para ' . $w['title']) ?>
  <div class="prose">
    <p class="lead"><?= e($w['summary']) ?></p>
    <?php foreach ($w['body'] as $p): ?><p><?= e($p) ?></p><?php endforeach; ?>
  </div>
  <?php if ($auth): ?>
  <h2 class="display display--sm">Créditos</h2>
  <ul class="credits"><?php foreach ($auth as $a): ?>
    <li><a href="/arquitectos/<?= e($a['slug']) ?>"><?= e($a['name']) ?></a> <?= example_badge($a) ?><span><?= e($a['city']) ?></span></li>
  <?php endforeach; ?></ul>
  <?php endif; ?>
  <?php if ($w['sources']): ?><p class="small">Fuentes: <?= e(implode('; ', $w['sources'])) ?></p><?php endif; ?>
  <?php if (!empty($w['example'])): ?><p class="small">Contenido de muestra: no corresponde a una obra real.</p><?php endif; ?>
</article>
<?php page_end();

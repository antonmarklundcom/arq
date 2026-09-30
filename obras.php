<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/lib.php';

$cities = array_values(array_unique(array_column(works(), 'city')));
sort($cities);
$types = array_values(array_unique(array_column(works(), 'type')));
sort($types);
$fc = (string)($_GET['ciudad'] ?? '');
$ft = (string)($_GET['tipo'] ?? '');
$list = array_filter(works(), fn($w) => ($fc === '' || $w['city'] === $fc) && ($ft === '' || $w['type'] === $ft));
$crumbs = [['Inicio', '/'], ['Obras', '/obras']];

page_start([
    'title' => 'Obras de arquitectura paraguaya | MONOGRAFÍA',
    'description' => 'Índice de obras de arquitectura del Paraguay con sus autores. Filtrá por ciudad y tipo, y llegá al estudio que las proyectó.',
    'path' => '/obras', 'crumbs' => $crumbs,
    'jsonld' => [[
        '@type' => 'CollectionPage', 'name' => 'Obras', 'url' => url('/obras'), 'inLanguage' => SITE_LOCALE,
    ]],
]);
?>
<section class="wrap section">
  <?= crumbs_html($crumbs) ?>
  <p class="eyebrow">Índice</p>
  <h1 class="display display--lg">Obras</h1>
  <form class="filters" method="get" action="/obras">
    <div class="field"><label for="fc">Ciudad</label>
      <select id="fc" name="ciudad"><option value="">Todas</option>
      <?php foreach ($cities as $c): ?><option<?= $c === $fc ? ' selected' : '' ?>><?= e($c) ?></option><?php endforeach; ?></select></div>
    <div class="field"><label for="ft">Tipo</label>
      <select id="ft" name="tipo"><option value="">Todos</option>
      <?php foreach ($types as $t): ?><option<?= $t === $ft ? ' selected' : '' ?>><?= e($t) ?></option><?php endforeach; ?></select></div>
    <button class="btn btn--ink" type="submit">Filtrar</button>
  </form>
  <?php if ($list): ?>
    <div class="grid"><?php foreach ($list as $w) { echo work_card($w); } ?></div>
  <?php else: ?>
    <p>No hay obras con ese filtro. <a class="link" href="/obras">Ver todas</a></p>
  <?php endif; ?>
</section>
<?php page_end();

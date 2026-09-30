<?php
declare(strict_types=1);

$cities = array_values(array_unique(array_column(works(), 'city')));
sort($cities);
$types = array_values(array_unique(array_column(works(), 'type')));
sort($types);
$fc = (string)($_GET['ciudad'] ?? '');
$ft = (string)($_GET['tipo'] ?? '');
$list = array_filter(works(), fn($w) => ($fc === '' || $w['city'] === $fc) && ($ft === '' || $w['type'] === $ft));
$crumbs = [['Inicio', '/'], ['Obras', '/obras/']];

page_start([
    'title' => 'Obras de arquitectura paraguaya | ARQ',
    'description' => 'Índice de obras de arquitectura del Paraguay con sus autores. Filtrá por ciudad y tipo, y llegá al estudio que las proyectó.',
    'path' => '/obras/', 'crumbs' => $crumbs,
    'jsonld' => [[
        '@type' => 'CollectionPage', 'name' => 'Obras', 'url' => url('/obras/'), 'inLanguage' => SITE_LOCALE,
    ]],
]);
?>
<section class="wrap section">
  <?= crumbs_html($crumbs) ?>
  <p class="eyebrow">Índice</p>
  <h1 class="display display--lg">Obras</h1>
  <p class="lead">Obras y reconocimientos de la arquitectura paraguaya, cada uno con su autoría y su fuente. Las imágenes y los datos de obras de estudios asociados se publican solo con permiso de sus autores.</p>
  <form class="filters" method="get" action="/obras/">
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
    <p>No hay obras con ese filtro. <a class="link" href="/obras/">Ver todas</a></p>
  <?php endif; ?>
  <p class="small">Las fichas marcadas "Ejemplo" muestran el formato y no son obras reales.</p>
</section>
<?= cta_band('¿Tenés un proyecto propio?', 'Contanos qué querés hacer y te conectamos con un profesional independiente para tu etapa.') ?>
<?php page_end();

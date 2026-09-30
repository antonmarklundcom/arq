<?php
declare(strict_types=1);
$crumbs = [['Inicio', '/'], ['Guías', '/guias/']];
page_start([
    'title' => 'Guías para planificar tu casa en Paraguay | ARQ',
    'description' => 'Guías prácticas sobre anteproyecto, cómo elegir arquitecto, terreno, planos, estructura y orientación, para decidir mejor antes de construir en Paraguay.',
    'path' => '/guias/',
    'crumbs' => $crumbs,
    'jsonld' => [['@type' => 'CollectionPage', 'name' => 'Guías', 'url' => url('/guias/'), 'inLanguage' => SITE_LOCALE]],
]);
$guides = [
    ['¿Qué incluye un anteproyecto?', '/guias/que-incluye-un-anteproyecto/', 'Qué se entrega, qué decidís vos en cada etapa y cómo se pasa a los planos de obra.'],
    ['Cómo elegir arquitecto', '/guias/como-elegir-arquitecto/', 'Qué mirar, qué preguntar en la primera reunión y qué dejar por escrito.'],
    ['Antes de comprar un terreno', '/guias/antes-de-comprar-un-terreno/', 'Qué revisar del lote antes de firmar, y con quién conviene consultarlo.'],
];
?>
<article class="wrap section">
  <?= crumbs_html($crumbs) ?>
  <header class="page-head">
    <p class="eyebrow">Guías</p>
    <h1 class="display display--lg">Guías para decidir antes de construir</h1>
    <p class="lead">Las dudas de un proyecto aparecen mucho antes de la obra: si conviene comprar ese terreno, qué hay que pedirle a un arquitecto, cuándo entra un ingeniero. Estas guías responden esas preguntas con criterios generales, sin promesas.</p>
    <p class="hero__cta"><?= selector_cta('Contanos tu proyecto', 'head') ?> <?= wa_cta('Tengo una duda', 'head') ?></p>
  </header>

  <?= related($guides, 'Todas las guías') ?>

  <div class="prose">
    <h2 class="display display--sm">Cómo usar estas guías</h2>
    <p>Son contenido orientativo: explican cómo suele plantearse cada etapa, no reemplazan la opinión de un profesional que vea tu lote y tu caso. Cada municipalidad define sus requisitos, y el profesional confirma la lista vigente.</p>
    <p>Si preferís empezar por los servicios, están en <a class="link" href="/servicios/">servicios</a>; si querés ver cómo trabajamos, en <a class="link" href="/como-funciona/">cómo funciona</a>.</p>
    <?= disclaimer_html() ?>
  </div>
</article>
<?= cta_band('Contanos en qué punto estás.', 'Con unos pocos datos te orientamos hacia el profesional que corresponde a tu proyecto.') ?>
<?php page_end();

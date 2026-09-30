<?php
declare(strict_types=1);

$partners = array_filter(architects(), fn($a) => !empty($a['partner']) && empty($a['example']));
$editorial = array_filter(architects(), fn($a) => empty($a['partner']) && empty($a['example']));
$examples = array_filter(architects(), fn($a) => !empty($a['example']));
$crumbs = [['Inicio', '/'], ['Arquitectos', '/arquitectos/']];
page_start([
    'title' => 'Arquitectos y estudios en Paraguay | ARQ',
    'description' => 'Arquitectos e ingenieros independientes con matrícula verificada, y referencias de la arquitectura paraguaya con su fuente. Así funciona la red de ARQ.',
    'path' => '/arquitectos/', 'crumbs' => $crumbs,
    'jsonld' => [['@type' => 'CollectionPage', 'name' => 'Arquitectos', 'url' => url('/arquitectos/'), 'inLanguage' => SITE_LOCALE]],
]);
?>
<section class="wrap section">
  <?= crumbs_html($crumbs) ?>
  <header class="page-head">
    <p class="eyebrow">Arquitectos</p>
    <h1 class="display display--lg">Arquitectos y estudios</h1>
    <p class="lead">Acá se publican los profesionales independientes con los que trabaja ARQ, cada uno con su matrícula verificada, su obra real y los créditos correctos. Ninguna ficha se publica por pagar ni sin permiso de su autor.</p>
  </header>

  <h2 class="display display--sm">Estudios de la red</h2>
  <?php if ($partners): ?>
    <div class="grid"><?php foreach ($partners as $a) { echo architect_card($a); } ?></div>
  <?php else: ?>
    <div class="empty-state">
      <p class="empty-state__t">Estamos incorporando estudios. Los perfiles se publican con matrícula verificada.</p>
      <p>Mientras tanto, igual podemos ayudarte: contanos tu proyecto y te presentamos a un profesional adecuado cuando la derivación esté confirmada con él.</p>
      <p class="hero__cta"><?= selector_cta('Contanos tu proyecto', 'arquitectos') ?> <a class="btn btn--ghost-ink" href="/para-arquitectos/" data-ev="partner_cta_click" data-ev-loc="arquitectos">Soy arquitecto</a></p>
    </div>
  <?php endif; ?>

  <?php if ($editorial): ?>
  <h2 class="display display--sm">Referencias de la arquitectura paraguaya</h2>
  <p class="prose">Fichas editoriales con datos públicos y su fuente. No son estudios asociados a ARQ y no reciben consultas a través del sitio.</p>
  <div class="grid"><?php foreach ($editorial as $a) { echo architect_card($a); } ?></div>
  <?php endif; ?>

  <div class="prose">
    <h2 class="display display--sm">Qué verificamos antes de publicar</h2>
    <ul class="ticks">
      <li>Identidad y nombre profesional o del estudio.</li>
      <li>Matrícula o registro profesional, cuando corresponde, contra los registros de la entidad respectiva.</li>
      <li>Autoría de cada obra que se muestra y permiso para publicarla.</li>
      <li>Servicios que presta y zona en la que trabaja de verdad.</li>
    </ul>
    <p>El detalle está en <a class="link" href="/para-arquitectos/">para arquitectos</a> y en los <a class="link" href="/terminos/">términos de uso</a>. Las obras del directorio están en <a class="link" href="/obras/">obras</a>.</p>
  </div>

  <?php if ($examples): ?>
  <h2 class="display display--sm">Perfiles de muestra</h2>
  <p class="small">Estas fichas muestran el formato. No corresponden a estudios reales y no aparecen en los buscadores.</p>
  <div class="grid"><?php foreach ($examples as $a) { echo architect_card($a); } ?></div>
  <?php endif; ?>
</section>
<?= cta_band('¿Buscás un profesional para tu proyecto?', 'Contanos qué querés hacer. Te presentamos a quien corresponda según la etapa, la zona y el tipo de obra.') ?>
<?php page_end();

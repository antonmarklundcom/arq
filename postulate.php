<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/lib.php';
require_once __DIR__ . '/includes/form.php';
$crumbs = [['Inicio', '/'], ['Postulá tu estudio', '/postulate']];
page_start([
    'title' => 'Postulá tu estudio de arquitectura | MONOGRAFÍA',
    'description' => 'Postulá tu estudio para integrar el directorio de arquitectura paraguaya. Mostrá tus obras y recibí consultas de clientes que quieren construir.',
    'path' => '/postulate', 'crumbs' => $crumbs,
]);
?>
<section class="wrap section narrow">
  <?= crumbs_html($crumbs) ?>
  <p class="eyebrow">Para estudios</p>
  <h1 class="display display--lg">Un lugar entre los mejores.</h1>
  <p class="lead">MONOGRAFÍA reúne la arquitectura paraguaya con criterio editorial. Postulá tu estudio y revisamos tu portafolio.</p>
  <ul class="ticks">
    <li>Una ficha con estilo de monografía, con tus obras y créditos.</li>
    <li>Consultas de clientes directo a tu estudio.</li>
    <li>Sin costo de postulación.</li>
  </ul>
  <p class="small">Las postulaciones se revisan una por una. Enviar el formulario no garantiza la publicación.</p>
  <?php lead_form('postulate', ['cta' => 'Postular mi estudio']); ?>
</section>
<?php page_end();

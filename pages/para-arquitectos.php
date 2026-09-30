<?php
declare(strict_types=1);
$crumbs = [['Inicio', '/'], ['Para arquitectos', '/para-arquitectos/']];
page_start([
    'title' => 'Para arquitectos e ingenieros: trabajá con ARQ | ARQ',
    'description' => 'Si sos arquitecto o ingeniero en Paraguay, postulá tu estudio. Verificamos matrícula y obra propia antes de publicar una ficha o derivarte consultas.',
    'path' => '/para-arquitectos/', 'crumbs' => $crumbs,
]);
?>
<section class="wrap section narrow">
  <?= crumbs_html($crumbs) ?>
  <p class="eyebrow">Para estudios</p>
  <h1 class="display display--lg">¿Sos arquitecto? Trabajá con ARQ.</h1>
  <p class="lead">Estamos incorporando estudios. Los perfiles se publican con matrícula verificada.</p>
  <p>ARQ recibe consultas de personas que quieren construir, reformar o documentar un proyecto, las ordena y las deriva a arquitectos e ingenieros independientes según especialidad, zona y disponibilidad. Para sumarte, contanos quién sos, qué servicios ofrecés y dónde trabajás.</p>
  <p class="small">Las postulaciones se revisan una por una. Enviar el formulario no garantiza la publicación.</p>
  <?php lead_form('postulate', ['cta' => 'Postular mi estudio']); ?>
</section>
<?php page_end();

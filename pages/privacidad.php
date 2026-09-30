<?php
declare(strict_types=1);
$crumbs = [['Inicio', '/'], ['Privacidad', '/privacidad/']];
page_start([
    'title' => 'Política de privacidad | ARQ',
    'description' => 'Cómo usamos los datos que dejás en los formularios de arq.com.py: qué guardamos, para qué y cómo podés pedir que los eliminemos.',
    'path' => '/privacidad/', 'crumbs' => $crumbs,
]);
?>
<section class="wrap section narrow prose">
  <?= crumbs_html($crumbs) ?>
  <h1 class="display display--lg">Política de privacidad</h1>
  <p class="small">Texto base; conviene que lo revise el titular del sitio.</p>
  <h2 class="display display--sm">Qué datos recibimos</h2>
  <p>Los que escribís en nuestros formularios: nombre, teléfono, email opcional y el detalle de tu consulta o de tu estudio.</p>
  <h2 class="display display--sm">Para qué los usamos</h2>
  <p>Para responderte y, si consultás por un estudio, para derivarle tu mensaje. No vendemos tus datos.</p>
  <h2 class="display display--sm">Tus derechos</h2>
  <p>Podés pedir acceso, corrección o eliminación de tus datos escribiéndonos<?= CONTACT_EMAIL ? ' a ' . e(CONTACT_EMAIL) : ' por el formulario de contacto' ?>.</p>
  <h2 class="display display--sm">Cookies</h2>
  <p>Este sitio no usa cookies propias de seguimiento.</p>
</section>
<?php page_end();

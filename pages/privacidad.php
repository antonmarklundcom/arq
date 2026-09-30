<?php
declare(strict_types=1);
$crumbs = [['Inicio', '/'], ['Privacidad', '/privacidad/']];
page_start([
    'title' => 'Política de privacidad | ARQ',
    'description' => 'Qué datos recibe ARQ cuando contás tu proyecto, para qué los usa, con quién los comparte y cómo pedir que los corrijamos o eliminemos.',
    'path' => '/privacidad/', 'crumbs' => $crumbs,
]);
?>
<section class="wrap section narrow prose">
  <?= crumbs_html($crumbs) ?>
  <h1 class="display display--lg">Política de privacidad</h1>
  <p class="small">Texto base, pendiente de revisión legal. Última actualización: septiembre de 2026.</p>

  <h2 class="display display--sm">Qué datos recibimos</h2>
  <p>Las respuestas del selector de proyecto (tipo de proyecto, si tenés terreno y la zona) y, si los completás, tu nombre, tu teléfono y un detalle del proyecto. Si nos escribís por WhatsApp, también tu número y lo que nos mandes ahí. Los profesionales que se postulan nos dejan los datos de su estudio, matrícula, servicios y portafolio.</p>

  <h2 class="display display--sm">Para qué los usamos</h2>
  <ul class="ticks">
    <li>Para entender tu proyecto y responderte.</li>
    <li>Para presentarte a un profesional independiente. Antes de pasarle tus datos te lo decimos, y solo le compartimos lo necesario para la consulta.</li>
    <li>Para hacer seguimiento de la consulta y mejorar cómo derivamos proyectos.</li>
    <li>Para revisar la postulación de un profesional y verificar sus datos.</li>
  </ul>
  <p>No vendemos tus datos ni los usamos para publicidad de terceros.</p>

  <h2 class="display display--sm">Dónde se guardan</h2>
  <p>En el servidor del sitio y en el sistema de gestión de contactos que usa ARQ para registrar y seguir cada consulta. Las conversaciones de WhatsApp quedan además en esa aplicación.</p>

  <h2 class="display display--sm">Cuánto tiempo</h2>
  <p>Mientras la consulta esté activa y el tiempo necesario para su seguimiento. El plazo de conservación definitivo se publicará en esta sección.</p>

  <h2 class="display display--sm">Tus derechos</h2>
  <p>Podés pedir acceso, corrección o eliminación de tus datos escribiéndonos<?= CONTACT_EMAIL ? ' a ' . e(CONTACT_EMAIL) . ' o' : '' ?> por <a href="<?= e(wa_page()) ?>" rel="noopener">WhatsApp</a>.</p>

  <h2 class="display display--sm">Cookies</h2>
  <p>Este sitio no usa cookies propias de seguimiento ni carga servicios de terceros al navegar.</p>

  <p>Las condiciones generales del servicio están en los <a href="/terminos/">términos de uso</a>.</p>
</section>
<?php page_end();

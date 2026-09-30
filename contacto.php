<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/lib.php';
require_once __DIR__ . '/includes/form.php';
$crumbs = [['Inicio', '/'], ['Contacto', '/contacto']];
page_start([
    'title' => 'Contacto: ¿qué querés construir? | MONOGRAFÍA',
    'description' => 'Contanos qué querés construir en Paraguay y te ayudamos a encontrar el estudio de arquitectura indicado. Respondemos por teléfono o WhatsApp.',
    'path' => '/contacto', 'crumbs' => $crumbs,
    'jsonld' => [['@type' => 'ContactPage', 'name' => 'Contacto', 'url' => url('/contacto'), 'inLanguage' => SITE_LOCALE]],
]);
?>
<section class="wrap section narrow">
  <?= crumbs_html($crumbs) ?>
  <p class="eyebrow">Contacto</p>
  <h1 class="display display--lg">¿Qué querés construir?</h1>
  <p class="lead">Contanos en tres pasos y te orientamos hacia el estudio indicado.</p>
  <?php lead_form('contacto', ['cta' => 'Enviar consulta']); ?>
</section>
<?php page_end();

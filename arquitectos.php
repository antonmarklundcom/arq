<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/lib.php';

$crumbs = [['Inicio', '/'], ['Arquitectos', '/arquitectos']];
page_start([
    'title' => 'Arquitectos y estudios del Paraguay | MONOGRAFÍA',
    'description' => 'Directorio de arquitectos y estudios de Paraguay: conocé su trabajo, sus obras y contactalos directamente para tu proyecto.',
    'path' => '/arquitectos', 'crumbs' => $crumbs,
    'jsonld' => [['@type' => 'CollectionPage', 'name' => 'Arquitectos', 'url' => url('/arquitectos'), 'inLanguage' => SITE_LOCALE]],
]);
?>
<section class="wrap section">
  <?= crumbs_html($crumbs) ?>
  <p class="eyebrow">Directorio</p>
  <h1 class="display display--lg">Arquitectos</h1>
  <div class="grid"><?php foreach (architects() as $a) { echo architect_card($a); } ?></div>
  <p>¿Sos arquitecta o arquitecto? <a class="link" href="/postulate">Postulá tu estudio</a>.</p>
</section>
<?php page_end();

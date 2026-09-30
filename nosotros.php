<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/lib.php';
$crumbs = [['Inicio', '/'], ['Nosotros', '/nosotros']];
page_start([
    'title' => 'Nosotros | MONOGRAFÍA, arquitectura paraguaya',
    'description' => 'MONOGRAFÍA es un directorio editorial de arquitectura paraguaya que conecta obras, estudios y personas que quieren construir en el país.',
    'path' => '/nosotros', 'crumbs' => $crumbs,
    'jsonld' => [['@type' => 'AboutPage', 'name' => 'Nosotros', 'url' => url('/nosotros'), 'inLanguage' => SITE_LOCALE]],
]);
?>
<section class="wrap section narrow prose">
  <?= crumbs_html($crumbs) ?>
  <p class="eyebrow">Nosotros</p>
  <h1 class="display display--lg">Una monografía viva</h1>
  <p class="lead">Un catálogo de obras y estudios, pensado como un libro de arquitectura que sigue creciendo.</p>
  <p>Paraguay es reconocido en el mundo por su arquitectura de ladrillo. En 2016, Solano Benítez y Gabinete de Arquitectura recibieron el León de Oro de la Bienal de Venecia.</p>
  <p>MONOGRAFÍA conecta cada obra con sus autores y cada estudio con sus obras, para que quien quiere construir encuentre a quien puede hacerlo.</p>
  <p>Solo publicamos datos que podemos respaldar. Lo que todavía es de muestra está marcado como <em>Ejemplo</em>.</p>
  <p><a class="btn btn--clay" href="/postulate">Postulá tu estudio</a></p>
</section>
<?php page_end();

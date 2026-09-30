<?php
declare(strict_types=1);
$crumbs = [['Inicio', '/'], ['Proyectos', '/proyectos/']];
page_start([
    'title' => 'Proyectos: casa nueva, reforma o ampliación | ARQ',
    'description' => 'Elegí tu situación: una casa desde cero o una casa que ya existe. Te explicamos el camino y te conectamos con el arquitecto o ingeniero que corresponde.',
    'path' => '/proyectos/',
    'crumbs' => $crumbs,
    'jsonld' => [['@type' => 'CollectionPage', 'name' => 'Proyectos', 'url' => url('/proyectos/'), 'inLanguage' => SITE_LOCALE]],
]);
?>
<article class="wrap section">
  <?= crumbs_html($crumbs) ?>
  <header class="page-head">
    <p class="eyebrow">Proyectos</p>
    <h1 class="display display--lg">Empezá por tu situación</h1>
    <p class="lead">Casi nadie busca "anteproyecto" el primer día. Se busca porque hay un lote, una casa que quedó chica o un espacio que hay que adaptar. Estas páginas parten de esa situación y te llevan al profesional que corresponde.</p>
  </header>

  <ol class="services services--2">
    <li class="services__item">
      <span class="num">A</span>
      <h2 class="display display--md"><a href="/proyectos/casa-nueva/">Casa nueva</a></h2>
      <p>Tenés terreno, o estás por comprarlo, y querés construir desde cero. El recorrido va del programa de necesidades al anteproyecto, los planos, el cálculo y la aprobación municipal.</p>
    </li>
    <li class="services__item">
      <span class="num">B</span>
      <h2 class="display display--md"><a href="/proyectos/reforma-ampliacion/">Reforma o ampliación</a></h2>
      <p>La casa existe y hay que cambiarla: un dormitorio más, un segundo piso, ambientes unidos, cocina y baños nuevos. Antes de dibujar hay que entender lo que ya está construido.</p>
    </li>
  </ol>

  <div class="prose">
    <h2 class="display display--sm">¿Tu caso es otro?</h2>
    <p>Un local comercial, una oficina, un terreno que todavía estás evaluando o una nota de la municipalidad que no sabés cómo responder. Esas consultas también las recibimos: elegí "Otro" o la opción más cercana en el selector, y la ordenamos juntos por WhatsApp antes de buscar a quién presentarte.</p>
    <p>Si ya sabés qué etapa necesitás, los <a class="link" href="/servicios/">servicios</a> están explicados uno por uno.</p>
  </div>
</article>
<?= cta_band('Tres preguntas y seguimos por WhatsApp.', 'Tipo de proyecto, terreno y zona. Con eso ya podemos orientarte.') ?>
<?php page_end();

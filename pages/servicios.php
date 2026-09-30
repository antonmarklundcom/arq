<?php
declare(strict_types=1);
$crumbs = [['Inicio', '/'], ['Servicios', '/servicios/']];
page_start([
    'title' => 'Servicios de arquitectura en Asunción | ARQ',
    'description' => 'Anteproyecto, planos y documentación municipal, cálculo estructural y dirección de proyecto: te conectamos con el profesional independiente adecuado.',
    'path' => '/servicios/',
    'crumbs' => $crumbs,
    'jsonld' => [['@type' => 'CollectionPage', 'name' => 'Servicios', 'url' => url('/servicios/'), 'inLanguage' => SITE_LOCALE]],
]);
?>
<article class="wrap section">
  <?= crumbs_html($crumbs) ?>
  <header class="page-head">
    <p class="eyebrow">Servicios</p>
    <h1 class="display display--lg">Qué profesional necesita tu proyecto</h1>
    <p class="lead">Un proyecto de arquitectura pasa por etapas distintas, y cada una la resuelve un profesional con una formación y una firma propias. Acá te explicamos las cuatro etapas para las que ARQ te conecta con arquitectos e ingenieros independientes.</p>
    <p class="hero__cta"><?= selector_cta('Contanos tu proyecto', 'head') ?> <?= wa_cta('No sé cuál necesito', 'head') ?></p>
  </header>

  <ol class="services">
    <li class="services__item services__item--lead">
      <span class="num">01</span>
      <h2 class="display display--md"><a href="/servicios/anteproyecto-arquitectonico/">Anteproyecto y diseño</a></h2>
      <p>La etapa en la que tu idea se vuelve una propuesta: programa, implantación en el terreno, orientación, primeras plantas y volumetría. Te conectamos con arquitectos que trabajan el diseño desde el sitio y el clima, antes de dibujar el detalle.</p>
      <p class="small">Para quien tiene un terreno, o está por comprarlo, y todavía no tiene planos.</p>
    </li>
    <li class="services__item">
      <span class="num">02</span>
      <h2 class="display display--sm"><a href="/servicios/planos-documentacion-municipal/">Planos y documentación municipal</a></h2>
      <p>El juego de planos que se presenta en la municipalidad y el que se usa en obra. Te conectamos con profesionales que conocen los requisitos de cada municipio del área metropolitana.</p>
    </li>
    <li class="services__item">
      <span class="num">03</span>
      <h2 class="display display--sm"><a href="/servicios/calculo-estructural/">Cálculo estructural</a></h2>
      <p>Fundaciones, columnas, vigas y losas dimensionadas por un ingeniero que firma el cálculo. Te conectamos con ingenieros para obra nueva, ampliaciones en altura o cambios en muros existentes.</p>
    </li>
    <li class="services__item">
      <span class="num">04</span>
      <h2 class="display display--sm"><a href="/servicios/direccion-de-proyecto/">Dirección de proyecto</a></h2>
      <p>Alguien que coordine a los demás profesionales, cuide que lo construido respete lo proyectado y te represente en las decisiones técnicas. Te conectamos con profesionales que ofrecen ese acompañamiento.</p>
    </li>
  </ol>

  <div class="prose">
    <h2 class="display display--sm">Cómo saber por dónde empezar</h2>
    <p>La mayoría de las consultas no empieza con el nombre de un servicio sino con una situación: un lote recién comprado, una casa que quedó chica, un local que hay que adaptar, una nota de la municipalidad. Por eso el primer paso no es elegir un servicio de esta lista, sino contarnos en qué punto estás.</p>
    <ul class="ticks">
      <li><strong>Si todavía no hay planos</strong>, casi siempre se empieza por el anteproyecto. Es la etapa donde más se puede cambiar con menos costo.</li>
      <li><strong>Si ya hay un diseño aprobado por vos</strong>, el paso siguiente es completar la documentación y, según la obra, el cálculo estructural.</li>
      <li><strong>Si la obra va a involucrar a varios profesionales</strong>, conviene definir desde el inicio quién coordina.</li>
      <li><strong>Si ya empezaste a construir</strong> y te piden documentación, contanos el caso: no todos los profesionales toman obras en curso.</li>
    </ul>

    <h2 class="display display--sm">Lo que hace ARQ y lo que no</h2>
    <p>ARQ ordena la consulta, entiende el alcance y te presenta a un profesional con experiencia en ese tipo de trabajo y disponibilidad para tomarlo. El profesional es quien te propone su forma de trabajo y sus honorarios, firma lo que corresponde y responde por su trabajo. Solo publicamos un servicio cuando hay al menos un profesional verificado que puede prestarlo.</p>
    <p>La construcción es otra etapa, con otros responsables. Si ya tenés el proyecto resuelto y buscás quién lo ejecute, mirá <?= obra_link('https://obra.com.py/', 'obra.com.py') ?>.</p>
    <?= disclaimer_html() ?>
  </div>

  <?= related([
      ['Casa nueva', '/proyectos/casa-nueva/', 'Del terreno a los planos de una vivienda.'],
      ['Reforma o ampliación', '/proyectos/reforma-ampliacion/', 'Cuando la casa existe y hay que cambiarla.'],
      ['Cómo funciona ARQ', '/como-funciona/', 'Los cuatro pasos desde tu consulta hasta el profesional.'],
      ['Para arquitectos', '/para-arquitectos/', 'Cómo se suma un estudio a la red.'],
  ]) ?>
</article>
<?= cta_band('Contanos en qué punto estás.', 'Tres preguntas y te orientamos hacia el profesional que corresponde a tu etapa.') ?>
<?php page_end();

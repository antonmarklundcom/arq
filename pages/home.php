<?php
declare(strict_types=1);

page_start([
    'title' => 'Arquitectos en Asunción para tu proyecto | ARQ',
    'description' => 'Contanos qué querés construir. ARQ te conecta con arquitectos e ingenieros independientes según tu proyecto, ubicación y especialidad.',
    'path' => '/', 'body' => 'home',
]);
?>
<section class="hero" aria-labelledby="hero-h">
  <div class="hero__bg brick brick--dark" data-slot="home-hero" aria-hidden="true"></div>
  <div class="wrap hero__in">
    <p class="eyebrow">Arquitectura en Paraguay · <?= e(SITE_COVERAGE) ?></p>
    <p class="display display--xl hero__thesis" aria-hidden="true"><span>La sombra</span> <span>es el primer</span> <span>material.</span></p>
    <p class="hero__sub">Arquitectura pensada para el clima paraguayo.</p>
    <h1 id="hero-h" class="hero__h1">Encontrá el arquitecto adecuado para tu proyecto en Paraguay.</h1>
    <p class="hero__cta">
      <?= selector_cta('Contanos tu proyecto', 'hero') ?>
      <?= wa_cta('Escribinos por WhatsApp', 'hero', 'btn btn--ghost') ?>
    </p>
  </div>
  <div class="hero__foot wrap">
    <span>ARQ conecta proyectos con arquitectos e ingenieros independientes</span>
    <span>No es un estudio ni una constructora</span>
  </div>
</section>

<section class="wrap section manifesto" aria-labelledby="h-man">
  <p class="eyebrow">01 · Manifiesto</p>
  <h2 id="h-man" class="display display--md">Primero el sitio, después el render.</h2>
  <div class="manifesto__cols">
    <p>Un proyecto empieza por el terreno, el sol de la tarde, la forma en que vive una familia y lo que se puede gastar. Recién después aparece un dibujo.</p>
    <p>Por eso lo primero que hacemos es entender qué querés hacer y en qué punto estás: si tenés lote, si ya hay planos, si la municipalidad te pidió algo.</p>
    <p>Con eso buscamos, entre profesionales independientes y verificados, a quien tenga experiencia en ese tipo de obra y tiempo para tomarla.</p>
  </div>
</section>

<section class="band band--paper2" id="selector" aria-labelledby="h-sel">
  <div class="wrap selector-grid">
    <div>
      <p class="eyebrow">02 · Tu proyecto</p>
      <h2 id="h-sel" class="display display--md">¿Qué querés construir?</h2>
      <p class="lead">Contanos en treinta segundos y te conectamos con el profesional adecuado.</p>
      <p class="small">Tres respuestas. Al final se abre WhatsApp con tu consulta ya redactada, y la mandás cuando quieras.</p>
    </div>
    <div class="formbox formbox--selector"><?php lead_form('proyecto', ['cta' => 'Seguir en WhatsApp']); ?></div>
  </div>
</section>

<section class="vision" aria-labelledby="h-vis">
  <div class="vision__img brick brick--dark" data-slot="home-vision" aria-hidden="true"></div>
  <div class="wrap">
    <div class="vision__panel">
      <p class="eyebrow">03 · Antes del plano</p>
      <h2 id="h-vis" class="display display--md">El proyecto empieza antes del plano.</h2>
      <p>Hacia dónde mira el lote. Qué árboles conviene conservar. Dónde pega el sol a las dos de la tarde en enero. Cuántas personas van a vivir ahí dentro de diez años. Qué parte se construye ahora y cuál puede esperar.</p>
      <p>Esas preguntas no las responde ARQ: las trabaja el arquitecto con vos. Nuestro trabajo es que llegues a esa primera reunión con el profesional correcto y con tu idea ya ordenada.</p>
    </div>
  </div>
</section>

<section class="wrap section" aria-labelledby="h-serv">
  <p class="eyebrow">04 · Servicios</p>
  <h2 id="h-serv" class="display display--md">Cuatro etapas, cuatro tipos de profesional.</h2>
  <ol class="services">
    <li class="services__item services__item--lead">
      <span class="num">01</span>
      <h3 class="display display--md"><a href="/servicios/anteproyecto-arquitectonico/">Anteproyecto y diseño</a></h3>
      <p>Para cuando todavía no hay dibujo. Te conectamos con arquitectos que arrancan por el terreno, la orientación y tu programa.</p>
    </li>
    <li class="services__item">
      <span class="num">02</span>
      <h3 class="display display--sm"><a href="/servicios/planos-documentacion-municipal/">Planos y documentación municipal</a></h3>
      <p>Para presentar en la municipalidad y para construir sin improvisar.</p>
    </li>
    <li class="services__item">
      <span class="num">03</span>
      <h3 class="display display--sm"><a href="/servicios/calculo-estructural/">Cálculo estructural</a></h3>
      <p>Un ingeniero que dimensiona y firma la estructura.</p>
    </li>
    <li class="services__item">
      <span class="num">04</span>
      <h3 class="display display--sm"><a href="/servicios/direccion-de-proyecto/">Dirección de proyecto</a></h3>
      <p>Alguien que coordina y controla mientras se construye.</p>
    </li>
  </ol>
</section>

<section class="band band--paper2" aria-labelledby="h-how">
  <div class="wrap">
    <p class="eyebrow">05 · Cómo funciona</p>
    <h2 id="h-how" class="display display--md">De tu consulta al profesional</h2>
    <ol class="steps steps--4">
      <li><span class="num">01</span><h3>Contanos el proyecto</h3><p>Tres preguntas y WhatsApp.</p></li>
      <li><span class="num">02</span><h3>Entendemos el alcance</h3><p>Etapa, zona, tiempos.</p></li>
      <li><span class="num">03</span><h3>Te presentamos al profesional</h3><p>Verificado y con lugar para tomarlo.</p></li>
      <li><span class="num">04</span><h3>Arrancás con el arquitecto</h3><p>El acuerdo es entre ustedes.</p></li>
    </ol>
    <?= disclaimer_html() ?>
    <p><a class="link" href="/como-funciona/">Cómo funciona ARQ, paso a paso</a></p>
  </div>
</section>

<section class="wrap section" aria-labelledby="h-arq">
  <p class="eyebrow">06 · Arquitectos</p>
  <h2 id="h-arq" class="display display--md">Estamos incorporando estudios.</h2>
  <div class="empty-state">
    <p class="lead">Los perfiles se publican con matrícula verificada. Preferimos una sección vacía a una llena de nombres que no podemos respaldar.</p>
    <p><a class="link" href="/arquitectos/">Ver la sección de arquitectos</a></p>
  </div>
</section>

<section class="statement" aria-labelledby="h-stmt">
  <div class="statement__bg brick brick--dark" data-slot="home-statement" aria-hidden="true"></div>
  <div class="wrap statement__in">
    <h2 id="h-stmt" class="display display--xl">Arquitectura para las dos de la tarde.</h2>
    <p class="hero__cta"><?= selector_cta('Contanos tu proyecto', 'statement') ?></p>
  </div>
</section>

<section class="ribbon" aria-labelledby="h-rib">
  <div class="wrap ribbon__in">
    <h2 id="h-rib" class="ribbon__t">¿Sos arquitecto? Trabajá con ARQ.</h2>
    <a class="btn btn--ghost" href="/para-arquitectos/" data-ev="partner_cta_click" data-ev-loc="ribbon">Cómo sumarte</a>
  </div>
</section>
<?php page_end();

<?php
declare(strict_types=1);
$crumbs = [['Inicio', '/'], ['Cómo funciona', '/como-funciona/']];
$faq = [
    ['¿ARQ también trabaja con ingenieros?', 'Sí. Cuando el proyecto necesita cálculo estructural o una revisión de la estructura existente, buscamos un ingeniero con esa especialidad, además del arquitecto o en su lugar, según el caso.'],
    ['¿Puedo pedir que me presenten a más de un profesional?', 'Sí. Si hay más de una opción razonable para tu caso, te lo decimos y tu preferencia cuenta. La decisión de con quién trabajar siempre es tuya.'],
    ['¿Qué pasa si el profesional no me convence?', 'Avisanos. Vemos si hay otra persona adecuada para tu proyecto y tu zona. No estás obligado a contratar a nadie por haber escrito.'],
    ['¿Puedo escribir si mi proyecto todavía es solo una idea?', 'Sí, es el mejor momento. Con saber qué querés hacer y en qué zona ya se puede ordenar el primer paso.'],
];
page_start([
    'faq' => $faq,
    'title' => 'Cómo funciona ARQ: del proyecto al profesional | ARQ',
    'description' => 'Contás tu proyecto, ARQ confirma el alcance y te presenta a un arquitecto o ingeniero independiente. Así son los cuatro pasos y cómo elegimos.',
    'path' => '/como-funciona/',
    'crumbs' => $crumbs,
    'jsonld' => [['@type' => 'AboutPage', 'name' => 'Cómo funciona ARQ', 'url' => url('/como-funciona/'), 'inLanguage' => SITE_LOCALE]],
]);
?>
<article class="wrap section">
  <?= crumbs_html($crumbs) ?>
  <header class="page-head">
    <p class="eyebrow">Cómo funciona</p>
    <h1 class="display display--lg">Cómo funciona ARQ</h1>
    <p class="lead">Elegir un arquitecto es más fácil cuando alguien te ayuda a entender qué necesitás antes de empezar a llamar. ARQ ordena tu consulta y te conecta con un profesional independiente que trabaja el tipo de proyecto que tenés, en la zona donde lo tenés.</p>
    <p class="hero__cta"><?= selector_cta('Contanos tu proyecto', 'head') ?> <?= wa_cta('Escribinos por WhatsApp', 'head') ?></p>
  </header>

  <div class="prose">
    <h2 class="display display--sm">Para quién es</h2>
    <p>Para quien va a construir, reformar o documentar algo en Asunción o alrededores y no sabe si necesita un arquitecto, un ingeniero o las dos cosas. También para quien ya conoce el camino pero no tiene a quién llamar. No hace falta tener un terreno definido ni planos previos: con una idea y una zona alcanza para empezar la conversación.</p>

    <h2 class="display display--sm">Los cuatro pasos</h2>
    <ol class="numbered">
      <li><strong>Contanos el proyecto.</strong> Empezás con un selector de tres preguntas: qué querés hacer, si tenés terreno y en qué zona. Al terminar, seguís la conversación por WhatsApp con un mensaje ya armado, así no tenés que explicar todo desde cero.</li>
      <li><strong>Entendemos el alcance.</strong> Por WhatsApp te preguntamos lo justo para confirmar qué tipo de ayuda necesitás, dónde está el proyecto, en qué etapa se encuentra y para cuándo te gustaría arrancar. Esa conversación la lleva una persona, no un formulario automático.</li>
      <li><strong>Te presentamos al profesional adecuado.</strong> Elegimos a mano, según la especialidad, la zona de trabajo y la disponibilidad actual. Antes de presentarte, el profesional tiene que aceptar la consulta: si no puede tomarla, buscamos otra opción en lugar de insistirle.</li>
      <li><strong>Arrancás con el arquitecto.</strong> Con la presentación hecha, hablás directamente con el profesional. Los plazos de cada trámite dependen del proyecto, de la municipalidad y de la agenda del profesional, que es quien te los explica. Es él quien te propone su forma de trabajo y sus honorarios, y el acuerdo se cierra entre vos y él.</li>
    </ol>
    <?= disclaimer_html() ?>

    <h2 class="display display--sm">Cómo elegimos a los profesionales</h2>
    <p>No publicamos un perfil ni te derivamos a nadie sin revisar antes lo básico. Por cada estudio o profesional que se suma, verificamos:</p>
    <ul class="ticks">
      <li>Su identidad y el nombre con el que ejerce.</li>
      <li>Su matrícula o registro profesional, cuando corresponde a su disciplina.</li>
      <li>Que las obras que muestra son propias y que tiene permiso para publicarlas.</li>
      <li>Que los servicios que ofrece y la zona donde trabaja son reales.</li>
      <li>Su disponibilidad actual, porque un buen profesional con la agenda llena no te sirve hoy.</li>
    </ul>
    <p>A la hora de conectarte con uno, pesa además la complejidad de tu proyecto y su experiencia en trabajos parecidos. Si hay más de una opción razonable, tu preferencia cuenta.</p>

    <h2 class="display display--sm">Qué información ayuda</h2>
    <p>No hace falta tener todo resuelto para escribirnos. Pero cuanto más claro llegues, más rápido se confirma el alcance:</p>
    <ul class="ticks">
      <li>El tipo de proyecto: casa nueva, reforma, ampliación, local, planos o cálculo.</li>
      <li>Si ya tenés terreno, y si todavía no, si estás por comprar uno.</li>
      <li>La ubicación: barrio o ciudad, y si podés, un pin del mapa.</li>
      <li>La etapa en la que estás: idea, evaluación del terreno, planos, trámite en la municipalidad u obra ya empezada.</li>
      <li>Fotos del lote o de la casa actual, y planos previos si existen.</li>
      <li>Cuándo te gustaría empezar, aunque sea una idea aproximada.</li>
    </ul>

    <h2 class="display display--sm">Lo que ARQ no hace</h2>
    <ul class="ticks">
      <li>No diseña: los planos los dibuja y los firma el profesional que te presentemos.</li>
      <li>No construye. La obra es otra etapa, con otros responsables.</li>
      <li>No cobra ni negocia honorarios en nombre del profesional.</li>
      <li>No asegura que un profesional acepte tu consulta ni promete un resultado: lo que pasa después depende del proyecto y del acuerdo entre las partes.</li>
    </ul>
    <p>Si ya tenés el proyecto resuelto y lo que buscás es quién lo ejecute, esa etapa es de <?= obra_link('https://obra.com.py/', 'obra.com.py') ?>.</p>

    <h2 class="display display--sm">Qué pasa con tus datos</h2>
    <p>Usamos lo que nos contás para entender tu proyecto y, con tu consentimiento, pasárselo al profesional que te presentemos. Nada más. Los detalles de qué guardamos y cómo pedir que lo borremos están en la <a class="link" href="/privacidad/">política de privacidad</a>.</p>

    <h2 class="display display--sm">Dónde trabajamos</h2>
    <p>Por ahora, en Asunción y Gran Asunción. Si tu proyecto está en el interior del país, igual podés escribirnos: evaluamos cada consulta según la cobertura real de profesionales en esa zona y te decimos con franqueza si podemos conectarte o no.</p>

    <h2 class="display display--sm">Si todavía no sabés qué necesitás</h2>
    <p>Es lo más común. Muchas consultas empiezan con una situación, no con un servicio: un lote recién comprado, una casa que quedó chica, una nota de la municipalidad. Podés mirar qué hace cada profesional en <a class="link" href="/servicios/">Servicios</a>, o ver cómo se ordena un caso concreto en <a class="link" href="/proyectos/">Proyectos</a>. Y si preferís, contanos tu situación y te orientamos sobre por dónde empezar.</p>
  </div>

  <?= faq_html($faq) ?>
  <p class="prose-note">Si querés saber qué mirar al elegir un profesional, leé la guía <a class="link" href="/guias/como-elegir-arquitecto/">cómo elegir arquitecto</a>.</p>
  <?= related([
      ['Contanos tu proyecto', '/contanos-tu-proyecto/', 'Las tres preguntas que inician la conversación.'],
      ['Servicios', '/servicios/', 'Las cuatro etapas y el profesional de cada una.'],
      ['Casa nueva', '/proyectos/casa-nueva/', 'Del terreno a los planos de una vivienda.'],
      ['Para arquitectos', '/para-arquitectos/', 'Cómo se suma un estudio a la red.'],
  ]) ?>
</article>
<?= cta_band('Empezá por contarnos qué tenés en mente.', 'Tres preguntas, una conversación por WhatsApp y una presentación al profesional que corresponde.') ?>
<?php page_end();

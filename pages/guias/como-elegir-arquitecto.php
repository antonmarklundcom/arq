<?php
declare(strict_types=1);
$crumbs = [['Inicio', '/'], ['Guías', '/guias/'], ['Cómo elegir arquitecto', '/guias/como-elegir-arquitecto/']];
$faq = [
    ['¿Cómo sé si un arquitecto está habilitado para ejercer?',
     'Pedile su número de matrícula y su nombre completo, y verificalos en el registro o la asociación profesional que corresponda. Si alguien duda en darte esos datos, tomalo como una señal para seguir preguntando.'],
    ['¿Conviene pedir varias propuestas?',
     'Conviene comparar propuestas, siempre que todas partan del mismo alcance escrito. Si una cubre más cosas que otra, no son comparables aunque parezcan parecidas.'],
    ['¿Tengo que elegir al que tenga más obras publicadas?',
     'No necesariamente. Importa más que haya trabajado proyectos parecidos al tuyo en tamaño y tipo, y que puedas hablar con alguien que haya trabajado con él.'],
    ['¿Puedo cambiar de profesional si algo no funciona?',
     'Depende de lo que hayan firmado. Por eso conviene dejar por escrito desde el principio cómo se cierra la relación y qué pasa con lo ya entregado.'],
    ['¿ARQ elige por mí?',
     'ARQ te conecta con profesionales independientes según lo que necesitás, pero la decisión de con quién trabajar es tuya, y el acuerdo se cierra entre vos y el profesional.'],
];
page_start([
    'title' => 'Cómo elegir arquitecto para tu casa | ARQ',
    'description' => 'Matrícula, experiencia en obras parecidas, alcance por escrito, preguntas para la primera reunión y señales de alerta antes de elegir arquitecto.',
    'path' => '/guias/como-elegir-arquitecto/',
    'crumbs' => $crumbs,
    'faq' => $faq,
    'og_type' => 'article',
]);
?>
<article class="wrap section">
  <?= crumbs_html($crumbs) ?>
  <header class="page-head">
    <p class="eyebrow">Guías</p>
    <h1 class="display display--lg">Cómo elegir arquitecto para tu casa</h1>
    <p class="lead">Elegí a alguien que esté habilitado, que haya trabajado proyectos parecidos al tuyo y que te explique por escrito qué va a hacer y qué no. Con esos tres criterios y unas pocas preguntas en la primera reunión, ya descartás gran parte de los problemas habituales.</p>
    <p class="hero__cta"><?= selector_cta('Contanos tu proyecto', 'head') ?> <?= wa_cta('Escribinos por WhatsApp', 'head') ?></p>
  </header>

  <div class="prose">
    <h2 class="display display--sm">Empezá por la matrícula</h2>
    <p>Ejercer como arquitecto supone, normalmente, un título y un registro profesional. Antes de hablar de ideas, pedí el nombre completo y el número de matrícula, y comprobalo en el registro o la asociación que corresponda. Es una consulta de pocos minutos.</p>
    <p>Fijate también que quien te atiende sea quien firma. Si te atiende una persona pero los planos los firma otra que nunca conociste, preguntá quién va a estar a cargo de tu proyecto día a día.</p>

    <h2 class="display display--sm">Experiencia en obras parecidas</h2>
    <p>Un estudio que hace edificios grandes no necesariamente es el mejor para una vivienda de lote chico, y al revés. Buscá experiencia en algo cercano a lo tuyo:</p>
    <ul class="ticks">
      <li>Tamaño y tipo de obra parecidos: casa nueva, ampliación o reforma de una casa existente.</li>
      <li>Terrenos con condiciones comparables a las tuyas, como lote angosto, desnivel o zona baja.</li>
      <li>Obras terminadas que puedas ver o preguntar, más que imágenes de renders.</li>
      <li>Alguien que haya sido cliente y acepte contarte cómo fue el trabajo.</li>
    </ul>
    <p>Desconfiá de las fotos sin contexto: preguntá si la obra fue proyectada por el profesional, qué parte hizo y cuándo.</p>

    <h2 class="display display--sm">Forma de trabajo y comunicación</h2>
    <p>Buena parte de las malas experiencias no vienen de un mal diseño, sino de una comunicación confusa. Antes de elegir, averiguá:</p>
    <ul class="ticks">
      <li>Por qué canal se comunican y cada cuánto esperás novedades.</li>
      <li>Cuántas reuniones o revisiones están previstas y cuántos cambios entran en el acuerdo.</li>
      <li>Quién responde tus mensajes y en qué horarios.</li>
      <li>Cómo se toman las decisiones: si te presentan opciones o una sola propuesta.</li>
    </ul>

    <h2 class="display display--sm">El alcance, por escrito</h2>
    <p>Dos propuestas pueden sonar iguales y cubrir cosas muy distintas. Pedí que el alcance quede escrito y que diga con claridad qué incluye cada etapa. Para entender qué suele contener un primer diseño, leé <a class="link" href="/guias/que-incluye-un-anteproyecto/">qué incluye un anteproyecto</a>.</p>
    <ul class="ticks">
      <li>Qué entregables recibís en cada etapa y en qué formato.</li>
      <li>Si el cálculo estructural y las instalaciones están incluidos o los hace otro profesional, como ocurre con el <a class="link" href="/servicios/calculo-estructural/">cálculo estructural</a>.</li>
      <li>Si el profesional prepara o acompaña la documentación para la municipalidad, tema que se detalla en <a class="link" href="/servicios/planos-documentacion-municipal/">planos y documentación municipal</a>.</li>
      <li>Si hay visitas o dirección durante la obra, o si eso es un servicio aparte.</li>
      <li>Cómo y cuándo se pagan los honorarios, y qué pasa si el proyecto se interrumpe.</li>
    </ul>
    <p>Cada municipalidad define sus requisitos, así que pedile al profesional que te confirme la lista vigente para tu lote. No des nada por sabido ni por incluido.</p>

    <h2 class="display display--sm">Preguntas para la primera reunión</h2>
    <ol class="numbered">
      <li>¿Qué proyectos parecidos al mío hiciste y puedo ver alguno?</li>
      <li>¿Quién va a trabajar en mi proyecto y quién lo firma?</li>
      <li>¿Qué necesitás de mí para arrancar: terreno, medidas, fotos, prioridades?</li>
      <li>¿Qué incluye tu propuesta y qué queda afuera?</li>
      <li>¿Con qué ingeniero u otros profesionales trabajás y cómo se coordinan?</li>
      <li>¿Qué decisiones mías pueden hacer cambiar el diseño y qué pasa si cambio de idea a mitad de camino?</li>
      <li>¿Cómo se cierra el trabajo si por algún motivo no seguimos juntos?</li>
    </ol>

    <h2 class="display display--sm">Señales de alerta</h2>
    <ul class="ticks">
      <li>No quiere dar su matrícula o su nombre completo.</li>
      <li>Promete resultados, aprobaciones o fechas que dependen de terceros, como la municipalidad.</li>
      <li>Te presiona para decidir en el día.</li>
      <li>No quiere dejar nada por escrito, ni el alcance ni la forma de pago.</li>
      <li>Muestra obras que no puede explicar o que parecen de otros.</li>
      <li>Descarta tus dudas en lugar de contestarlas.</li>
      <li>Sugiere empezar a construir sin planos ni revisión de la estructura.</li>
    </ul>

    <h2 class="display display--sm">Dónde entra ARQ</h2>
    <p>Si preferís no buscar por tu cuenta, contanos qué querés hacer y en qué zona: ARQ te conecta con un profesional independiente que trabaje ese tipo de proyecto. Antes de presentarte a alguien, revisamos lo básico, como su identidad y su matrícula o registro cuando corresponde; cómo funciona está en <a class="link" href="/como-funciona/">cómo funciona ARQ</a>. Y la decisión final es siempre tuya.</p>
    <?= disclaimer_html() ?>
    <p>Cuando ya tengas el proyecto definido y busques quién lo ejecute, esa etapa corresponde a <?= obra_link('https://obra.com.py/', 'obra.com.py') ?>.</p>

    <div class="note">
      <p>Esta lista es orientativa y no reemplaza tu criterio. Revisala con un profesional de confianza antes de decidir, porque cada caso es distinto.</p>
    </div>
  </div>

  <?= faq_html($faq) ?>
  <?= related([
      ['Qué incluye un anteproyecto', '/guias/que-incluye-un-anteproyecto/', 'Qué esperar del primer diseño de tu casa.'],
      ['Antes de comprar un terreno', '/guias/antes-de-comprar-un-terreno/', 'Qué revisar del lote antes de decidir.'],
      ['Casa nueva', '/proyectos/casa-nueva/', 'Del terreno a los planos de una vivienda.'],
      ['Dirección de proyecto', '/servicios/direccion-de-proyecto/', 'Quién coordina arquitectura, estructura y obra.'],
  ]) ?>
</article>
<?= cta_band('Contanos qué querés construir o cambiar.', 'Con unos pocos datos te orientamos hacia el profesional que corresponde a tu proyecto.') ?>
<?php page_end();

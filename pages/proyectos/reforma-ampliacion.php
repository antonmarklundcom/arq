<?php
declare(strict_types=1);
$crumbs = [['Inicio', '/'], ['Proyectos', '/proyectos/'], ['Reforma o ampliación', '/proyectos/reforma-ampliacion/']];
$faq = [
    ['¿Necesito planos para ampliar mi casa?',
     'En general sí. Una ampliación normalmente se presenta en la municipalidad con planos firmados por un profesional, y quien construye también los necesita. Cada municipalidad define sus requisitos; el profesional te confirma cuáles corresponden.'],
    ['¿Puedo reformar si mi casa no tiene planos aprobados?',
     'Se puede conversar igual, pero cambia el camino. Algunos profesionales ofrecen documentar lo existente; otros no. Por eso te preguntamos por los papeles de la casa antes de presentarte a alguien.'],
    ['¿Quién calcula si puedo subir un piso o sacar un muro?',
     'Eso lo resuelve un ingeniero, no se decide a ojo: hay que saber qué sostiene hoy la casa y qué carga admite lo que ya existe. Lo explicamos en la página de cálculo estructural.'],
    ['¿Puedo seguir viviendo en la casa durante la reforma?',
     'Depende del alcance. Una cocina o un baño se suelen hacer por etapas y con la casa habitada; abrir un techo o intervenir toda la planta baja complica mucho más. El profesional puede proponer un orden de trabajo que lo tenga en cuenta.'],
];
page_start([
    'title' => 'Arquitecto para reforma o ampliación | ARQ',
    'description' => 'Ampliar o reformar una casa existente no es igual que proyectar de cero. Te conectamos con el arquitecto o ingeniero independiente que corresponde.',
    'path' => '/proyectos/reforma-ampliacion/',
    'crumbs' => $crumbs,
    'faq' => $faq,
    'service' => [
        'name' => 'Arquitecto para reforma o ampliación',
        'description' => 'Conexión con arquitectos e ingenieros independientes para reformar, ampliar o adaptar una casa o un local existente en Asunción y Gran Asunción.',
    ],
]);
?>
<article class="wrap section">
  <?= crumbs_html($crumbs) ?>
  <header class="page-head">
    <p class="eyebrow">Proyectos</p>
    <h1 class="display display--lg">Reformar o ampliar una casa que ya existe</h1>
    <p class="lead">Cuando el edificio ya está construido, el proyecto empieza por entender lo que hay: qué sostiene la casa, qué está documentado y qué no. Con eso claro, te conectamos con el arquitecto, el ingeniero o los dos, según lo que quieras cambiar.</p>
    <p class="hero__cta"><?= selector_cta('Contanos tu proyecto') ?> <?= wa_cta('Escribinos por WhatsApp') ?></p>
  </header>

  <div class="prose">
    <h2 class="display display--sm">Para quién es y qué situaciones cubre</h2>
    <p>Esta página es para quien ya tiene una casa, un departamento o un local y quiere cambiarlo. Las consultas más comunes:</p>
    <ul class="ticks">
      <li>sumar un dormitorio o un baño porque la familia creció;</li>
      <li>subir un piso sobre una casa de planta baja;</li>
      <li>cerrar una galería para ganar un ambiente;</li>
      <li>unir ambientes, por ejemplo cocina y comedor, o abrir la casa hacia el patio;</li>
      <li>rehacer cocina y baños, con instalaciones nuevas;</li>
      <li>adaptar una casa para usarla como local u oficina.</li>
    </ul>
    <p>Si partís de un terreno vacío, mirá <a href="/proyectos/casa-nueva/">casa nueva</a>.</p>

    <h2 class="display display--sm">Por qué una reforma no se proyecta como una obra nueva</h2>
    <p>En una reforma se dibuja sobre algo que ya tiene decisiones tomadas, algunas que nadie recuerda. Por eso el trabajo suele empezar con un relevamiento del estado actual: medir, fotografiar y entender cómo está hecha la casa.</p>
    <ul class="ticks">
      <li><strong>Qué muros son portantes.</strong> En muchas casas de ladrillo, el muro que querés abrir es justamente el que sostiene el techo o el piso de arriba.</li>
      <li><strong>Cómo están las instalaciones.</strong> Cañerías y cableado viejos condicionan dónde podés mover una cocina o un baño.</li>
      <li><strong>De dónde viene la humedad.</strong> Una mancha puede venir de una cañería, del techo o del terreno. Conviene entenderla antes de ampliar.</li>
      <li><strong>Qué está documentado.</strong> Puede que la casa tenga planos aprobados, que los tenga de una etapa anterior o que no tenga ninguno.</li>
    </ul>

    <h2 class="display display--sm">Arquitecto, ingeniero o los dos</h2>
    <p>Como regla general:</p>
    <ul class="ticks">
      <li><strong>Solo arquitecto</strong> cuando el cambio es de distribución, terminaciones, aberturas que no tocan la estructura o rehacer cocina y baños.</li>
      <li><strong>Arquitecto e ingeniero</strong> cuando se suma un piso, se quita o se abre un muro portante, se agrega una losa o una ampliación se apoya en lo existente.</li>
    </ul>
    <p>Todo lo que sea estructural lo firma un ingeniero. En <a href="/servicios/calculo-estructural/">cálculo estructural</a> explicamos qué incluye ese trabajo.</p>

    <h2 class="display display--sm">Planos existentes y documentación</h2>
    <p>Que la casa tenga planos aprobados cambia mucho el punto de partida. Con planos, el profesional parte de esa base y la verifica en el lugar. Sin planos, hay un paso previo: dejar por escrito lo que existe.</p>
    <p>Algunos profesionales ofrecen también regularizar o documentar lo existente. No todos lo hacen, y ARQ no lo promete: lo planteamos solo cuando hay un profesional verificado que lo toma.</p>
    <p>Sobre lo municipal, en general una ampliación requiere presentar documentación firmada por un profesional. Cada municipalidad de Asunción y Gran Asunción tiene sus requisitos y sus tiempos, y el profesional te confirma la lista vigente para tu caso. ARQ no hace trámites; el detalle de esa etapa está en <a href="/servicios/planos-documentacion-municipal/">planos y documentación municipal</a>.</p>

    <h2 class="display display--sm">Lo que pesa en Paraguay</h2>
    <p>Una ampliación bien pensada mira el clima antes que el metraje. Un dormitorio al oeste recibe el sol de la tarde y acumula calor hasta la noche; una galería cerrada puede dejar la casa sin la sombra que tenía.</p>
    <p>Las lluvias fuertes piden atención a los techos, las pendientes y los desagües. Una ampliación puede desviar el agua hacia un muro existente o dejar un encuentro de techos por donde se filtre. En lotes angostos, además, lo que sumás suele comerse el patio, que es lo que refresca la casa.</p>

    <h2 class="display display--sm">Vivir en la casa durante la obra</h2>
    <p>Mucha gente no puede mudarse mientras se reforma. Es posible si se planifica: obra por etapas, sectores cerrados y un orden que deje siempre un baño y una cocina funcionando. Plantealo al profesional antes de definir el alcance.</p>

    <h2 class="display display--sm">Qué conviene tener a mano</h2>
    <ul class="ticks">
      <li>planos existentes, si los hay, aunque sean viejos o incompletos;</li>
      <li>fotos de cada ambiente, del techo, del patio y de lo que te preocupa (humedad, fisuras, goteras);</li>
      <li>medidas aproximadas de los ambientes;</li>
      <li>una lista de qué querés cambiar y por qué;</li>
      <li>los documentos del inmueble que tengas a mano;</li>
      <li>una idea general del presupuesto, aunque todavía no tenga cifras.</li>
    </ul>

    <h2 class="display display--sm">Cómo seguimos desde acá</h2>
    <ol class="numbered">
      <li><strong>Nos contás la situación.</strong> Qué tenés, qué querés cambiar y en qué municipio está.</li>
      <li><strong>Ordenamos el alcance.</strong> Definimos si necesitás arquitecto, ingeniero o ambos.</li>
      <li><strong>Te presentamos a un profesional.</strong> Uno con experiencia en reformas y disponibilidad para tu caso.</li>
      <li><strong>El profesional releva y propone.</strong> Visita la casa y te explica lo que encontró.</li>
      <li><strong>Del anteproyecto a los planos.</strong> Primero la idea, en <a href="/servicios/anteproyecto-arquitectonico/">anteproyecto</a>; después el detalle y la documentación.</li>
    </ol>

    <h2 class="display display--sm">El papel de ARQ en una reforma</h2>
    <p>ARQ no proyecta ni reforma nada: te ayuda a entender qué necesitás y te presenta a un profesional independiente. Quien releva, diseña, calcula y firma es ese profesional.</p>
    <p>¿Ya sabés qué querés reformar y buscás quién lo haga? Podés mirar las <?= obra_link('https://obra.com.py/reformas/', 'reformas con obra.com.py') ?>, la marca hermana que se ocupa de la construcción.</p>
  </div>

  <?= faq_html($faq) ?>
  <p class="prose-note">Antes de tocar muros o techos, leé <a class="link" href="/guias/cuando-se-necesita-calculo-estructural/">cuándo se necesita cálculo estructural</a>.</p>
  <?= related([
      ['Cálculo estructural', '/servicios/calculo-estructural/', 'Para subir un piso o abrir muros portantes.'],
      ['Planos y documentación municipal', '/servicios/planos-documentacion-municipal/', 'El juego de planos que se presenta y se usa en obra.'],
      ['Anteproyecto arquitectónico', '/servicios/anteproyecto-arquitectonico/', 'La propuesta antes del detalle.'],
      ['Casa nueva', '/proyectos/casa-nueva/', 'Si partís de un terreno sin construcción.'],
  ]) ?>
</article>
<?= cta_band('Contanos qué querés cambiar en tu casa.', 'Con unas fotos y tu idea alcanza para orientarte hacia el profesional que corresponde.') ?>
<?php page_end();

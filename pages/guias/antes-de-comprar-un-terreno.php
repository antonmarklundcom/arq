<?php
declare(strict_types=1);
$crumbs = [['Inicio', '/'], ['Guías', '/guias/'], ['Antes de comprar un terreno', '/guias/antes-de-comprar-un-terreno/']];
$faq = [
    ['¿Puedo pedirle a un arquitecto que vea el lote antes de comprarlo?',
     'Sí, y es un buen momento para hacerlo. Con el lote a la vista, el profesional te dice qué cabe, qué puede complicar el diseño y qué conviene averiguar antes de firmar. ARQ te conecta con profesionales independientes; no visita ni evalúa lotes.'],
    ['¿Quién revisa los papeles del terreno?',
     'Un escribano o un abogado de tu confianza. El arquitecto mira el lote como espacio para construir; la situación legal del inmueble es otra especialidad y conviene consultarla antes de pagar una seña.'],
    ['¿Un lote barato puede salir caro?',
     'Puede pasar si después aparecen rellenos, inundación, falta de servicios o un suelo que exige fundaciones más complejas. No es una regla, pero por eso conviene revisar esos puntos antes de decidir, no después.'],
    ['¿Cómo sé qué puedo construir en el lote?',
     'Cada municipalidad define retiros, alturas, ocupación del lote y usos, y esas reglas cambian según la zona. El profesional confirma lo vigente para ese lote concreto; no alcanza con lo que te cuente el vendedor.'],
    ['¿Sirve hacer esto si el terreno ya lo compré?',
     'Sí. Muchos puntos de esta guía siguen siendo útiles para entender qué tiene tu lote y qué decisiones de diseño te pide. Las dudas sobre los papeles, en cambio, van con un escribano o un abogado.'],
];
page_start([
    'title' => 'Antes de comprar un terreno para construir | ARQ',
    'description' => 'Qué mirar en un lote antes de firmar: orientación, pendiente, suelo, servicios, retiros y papeles, y cómo hacerlo revisar por un profesional.',
    'path' => '/guias/antes-de-comprar-un-terreno/',
    'crumbs' => $crumbs,
    'faq' => $faq,
    'og_type' => 'article',
]);
?>
<article class="wrap section">
  <?= crumbs_html($crumbs) ?>
  <header class="page-head">
    <p class="eyebrow">Guías</p>
    <h1 class="display display--lg">Antes de comprar un terreno para construir</h1>
    <p class="lead">Antes de firmar conviene revisar cinco cosas: cómo está orientado el lote, su forma y su pendiente, el suelo y el agua, los accesos y servicios, y qué se puede construir ahí. Los papeles los mira un escribano o un abogado, y el lote lo puede mirar un profesional que te ayude a decidir con más datos.</p>
    <p class="hero__cta"><?= selector_cta('Contanos tu proyecto', 'head') ?> <?= wa_cta('Estoy por comprar un lote', 'head') ?></p>
  </header>

  <div class="prose">
    <h2 class="display display--sm">Por qué mirar el lote antes de pagar la seña</h2>
    <p>Una vez que el terreno es tuyo, sus problemas también. Un lote con buen precio por metro puede pedir rellenos, muros de contención o conexiones que no estaban en tus cuentas. Revisarlo antes no te asegura una compra sin sorpresas, pero te deja negociar, pedir aclaraciones o descartar con más criterio.</p>

    <h2 class="display display--sm">Orientación</h2>
    <p>En Paraguay el calor manda, y la orientación del lote decide cuánto trabajo tiene que hacer el diseño. Fijate hacia dónde da el frente, dónde queda el fondo y por dónde cae el sol de la tarde. Andá a verlo a distintas horas, no solo a la mañana que te mostró el vendedor.</p>
    <p>Un lote con el frente al oeste no está descartado, pero el proyecto va a tener que proteger esa fachada. Lo importante es saberlo antes de comprar.</p>

    <h2 class="display display--sm">Forma y pendiente</h2>
    <ul class="ticks">
      <li><strong>Frente y fondo.</strong> Un lote muy angosto limita el ancho de la casa y el estacionamiento; uno con forma irregular desperdicia metros en esquinas difíciles de usar.</li>
      <li><strong>Desnivel.</strong> Un terreno en pendiente puede dar vistas y buena ventilación, pero exige movimientos de tierra y fundaciones más pensadas. Un lote plano no es siempre mejor: si queda por debajo de la calle, el agua llega a él.</li>
      <li><strong>Hacia dónde escurre la lluvia.</strong> Mirá el lote después de una tormenta, si podés. Las marcas de barro, los charcos y las paredes vecinas manchadas cuentan la historia.</li>
    </ul>

    <h2 class="display display--sm">Suelo y agua</h2>
    <p>El suelo no se ve desde la vereda. Algunas señales que conviene observar: rellenos recientes, escombros enterrados, vecinos con fisuras en sus muros, pozos o zanjas abiertas, vegetación que indica humedad. Ninguna confirma nada por sí sola, pero son motivos para preguntar.</p>
    <p>Si el lote está cerca de un arroyo o en una zona baja, averiguá con los vecinos qué pasa cuando llueve mucho. El estudio de suelo y las decisiones de fundación son de un ingeniero; lo contamos en <a class="link" href="/servicios/calculo-estructural/">cálculo estructural</a>.</p>

    <h2 class="display display--sm">Accesos y servicios</h2>
    <p>Un plano puede decir que hay calle y que hay red de agua; vos tenés que verificarlo en el lugar. Una lista corta para llevar:</p>
    <ol class="numbered">
      <li>¿La calle está abierta todo el año o se vuelve intransitable con lluvia?</li>
      <li>¿Pasa un camión por ahí? Es una pregunta útil para cuando llegue el momento de la obra.</li>
      <li>¿Hay red de electricidad en el frente, o el tendido queda lejos?</li>
      <li>¿Hay agua de red o habría que perforar un pozo?</li>
      <li>¿Existe desagüe cloacal, o vas a necesitar cámara séptica y pozo ciego?</li>
      <li>¿Cómo sale el agua de lluvia de la calle y del lote?</li>
    </ol>
    <p>Pedí por escrito lo que te prometan sobre los servicios, y no des por hecho que lo que pasa por la vereda de enfrente llega a tu lote.</p>

    <h2 class="display display--sm">Qué se puede construir: usos y retiros</h2>
    <p>Que el lote sea tuyo no significa que puedas construir cualquier cosa en cualquier parte de él. Las municipalidades suelen regular qué uso admite la zona, cuánto del lote se puede ocupar, qué altura se permite y qué distancia hay que dejar respecto de la calle y de los vecinos. Estas reglas cambian de un municipio a otro y hasta de un barrio a otro.</p>
    <p>Por eso, si tu plan incluye una casa con local, un segundo piso o una vivienda para alquilar, preguntalo antes. Cada municipalidad define sus requisitos; el profesional confirma la lista vigente para tu lote. Podés ver cómo se ordena esa etapa en <a class="link" href="/servicios/planos-documentacion-municipal/">planos y documentación municipal</a>.</p>

    <h2 class="display display--sm">Los papeles del inmueble</h2>
    <p>Acá no hay atajos: la documentación la revisa un escribano o un abogado, antes de pagar una seña y antes de firmar. Ni ARQ ni el arquitecto reemplazan esa revisión. Hay cosas que podés pedir y llevar, sin ser un experto:</p>
    <ul class="ticks">
      <li>La documentación del inmueble que te entregue el vendedor, para que tu escribano o abogado la analice.</li>
      <li>Una confirmación de que quien vende es quien figura como dueño, o tiene facultades para hacerlo.</li>
      <li>Las medidas del título y un plano del lote, para compararlos con lo que ves en el terreno.</li>
      <li>Datos sobre deudas o cargas que pesen sobre el inmueble, que el profesional legal sabrá dónde consultar.</li>
    </ul>

    <?= disclaimer_html() ?>

    <h2 class="display display--sm">Cómo hacer revisar el lote antes de firmar</h2>
    <p>Un arquitecto puede ir al lote con vos, leer lo que ve y decirte qué implicaría construir ahí. No es un estudio formal ni una garantía: es una mirada experta que te ayuda a decidir con más datos. Para sacarle provecho:</p>
    <ul class="ticks">
      <li>Llevá la ubicación exacta, las medidas y el programa aproximado de tu casa.</li>
      <li>Sacá fotos del lote, de la calle, de los vecinos y de los postes o cañerías del frente.</li>
      <li>Escribí tus dudas de antemano: servicios, pendiente, árboles, vecinos.</li>
      <li>Si el profesional lo sugiere, consultá a un ingeniero por el suelo antes de cerrar la compra.</li>
    </ul>
    <p>Lo que sigue después de comprar está en <a class="link" href="/proyectos/casa-nueva/">casa nueva</a>. Y cuando el proyecto esté resuelto y busques quién lo ejecute, esa etapa es de <?= obra_link('https://obra.com.py/', 'obra.com.py') ?>.</p>

    <div class="note">
      <p>Contenido orientativo, sin valor legal. Antes de pagar una seña, consultá con un escribano o abogado y con un profesional que vea el lote.</p>
    </div>
  </div>

  <?= faq_html($faq) ?>
  <?= related([
      ['Casa nueva', '/proyectos/casa-nueva/', 'El camino desde el terreno hasta la obra, etapa por etapa.'],
      ['Anteproyecto arquitectónico', '/servicios/anteproyecto-arquitectonico/', 'La primera propuesta de la casa sobre tu lote.'],
      ['Cálculo estructural', '/servicios/calculo-estructural/', 'Suelo, fundaciones y estructura firmados por un ingeniero.'],
      ['Cómo elegir arquitecto', '/guias/como-elegir-arquitecto/', 'Qué preguntar antes de trabajar con un profesional.'],
  ]) ?>
</article>
<?= cta_band('¿Estás mirando un lote?', 'Contanos dónde queda y qué querés hacer. Te orientamos hacia el profesional que corresponde a tu caso.') ?>
<?php page_end();

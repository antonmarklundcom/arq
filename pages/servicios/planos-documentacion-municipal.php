<?php
declare(strict_types=1);
$crumbs = [['Inicio', '/'], ['Servicios', '/servicios/'], ['Planos y documentación municipal', '/servicios/planos-documentacion-municipal/']];
$faq = [
    ['¿Qué planos necesito para presentar en la municipalidad?', 'Suele incluir ubicación y situación, plantas, cortes, fachadas y techos, y según el caso instalaciones y estructura. Cada municipalidad define su lista, y el profesional te confirma la vigente antes de dibujar.'],
    ['¿Los planos municipales sirven también para construir?', 'No necesariamente. El juego municipal muestra que el proyecto cumple las normas; el de obra tiene el detalle que necesita quien construye. Muchas veces son dos entregas distintas.'],
    ['¿Quién firma y presenta los planos?', 'Normalmente los firma un profesional habilitado, y otros especialistas firman sus partes, como el cálculo estructural. Quién presenta el legajo lo acordás con el profesional. ARQ no firma ni presenta nada.'],
    ['¿Qué pasa si la municipalidad hace observaciones?', 'Es una instancia habitual: la oficina señala lo que no cumple o no está claro, el profesional corrige y se vuelve a presentar. Los tiempos dependen de la municipalidad y del proyecto.'],
    ['¿Hay que hacer algo distinto en Asunción y en Luque, San Lorenzo o Lambaré?', 'Puede haber diferencias. Cada municipalidad tiene su propia oficina de obras particulares, requisitos y tiempos, y las normas se actualizan. El profesional verifica la lista vigente del municipio de tu lote.'],
    ['¿Se puede documentar una construcción que ya existe?', 'Algunos profesionales lo hacen, pero no todos. Contanos el caso y, solo si hay uno verificado que lo ofrezca, te lo presentamos. No podemos prometer el resultado.'],
];
page_start([
    'title' => 'Planos y documentación municipal en Asunción | ARQ',
    'description' => 'Qué planos se presentan en la municipalidad, qué documentos reunir y cómo es el proceso: te conectamos con profesionales de Asunción y Gran Asunción.',
    'path' => '/servicios/planos-documentacion-municipal/',
    'crumbs' => $crumbs,
    'faq' => $faq,
    'service' => ['name' => 'Planos y documentación municipal', 'description' => 'Preparación de los planos y la documentación que se presenta en la municipalidad para una obra, a cargo de un profesional independiente con el que ARQ te conecta.'],
]);
?>
<article class="wrap section">
  <?= crumbs_html($crumbs) ?>
  <header class="page-head">
    <p class="eyebrow">Servicios</p>
    <h1 class="display display--lg">Planos y documentación para la municipalidad</h1>
    <p class="lead">Antes de construir, ampliar o reformar, la municipalidad normalmente pide una carpeta de planos firmada por profesionales habilitados. Acá te explicamos qué contiene, qué tenés que reunir y cómo es el camino, y te conectamos con quien la prepara.</p>
    <p class="hero__cta"><?= selector_cta('Contanos tu proyecto') ?> <?= wa_cta('Escribinos por WhatsApp') ?></p>
  </header>
  <div class="prose">
    <h2 class="display display--sm">Qué es y para quién es</h2>
    <p>Es el juego de planos y papeles con el que se solicita el permiso de construcción en la municipalidad del lugar donde está el lote. También se lo llama legajo o carpeta municipal. Sirve a quien va a construir una casa, ampliar una existente, reformar o adaptar un local.</p>
    <p>No es lo mismo que el diseño: si todavía no tenés una propuesta que te convenza, empezá por el <a class="link" href="/servicios/anteproyecto-arquitectonico/">anteproyecto arquitectónico</a>.</p>

    <h2 class="display display--sm">Planos para la municipalidad y planos de obra</h2>
    <p>Suelen confundirse, pero cumplen funciones distintas. Los planos municipales muestran que el proyecto respeta las normas del lugar: retiros, alturas, ocupación del lote, usos. Están pensados para que los revise una oficina técnica.</p>
    <p>Los planos de obra, también llamados ejecutivos, están pensados para quien construye. Traen más detalle: medidas de replanteo, encuentros, carpinterías, niveles, materiales. Con un legajo municipal solo, un maestro de obra difícilmente pueda trabajar. Acordá con el profesional qué entrega necesitás.</p>

    <h2 class="display display--sm">Qué suele incluir la carpeta</h2>
    <p>La lista exacta la define cada municipalidad. En general, el legajo suele incluir:</p>
    <ul class="ticks">
      <li><strong>Plano de ubicación y situación</strong>: dónde está el lote, su manzana y su relación con las calles.</li>
      <li><strong>Plantas</strong> de cada nivel, con medidas y uso de cada ambiente.</li>
      <li><strong>Cortes</strong> que muestran alturas, niveles y la relación entre pisos.</li>
      <li><strong>Fachadas</strong> hacia la calle y hacia los fondos.</li>
      <li><strong>Planta de techos</strong>, con pendientes y desagües pluviales, importantes con las lluvias fuertes de la zona.</li>
      <li><strong>Planilla de aberturas</strong>, con tipo y medida de puertas y ventanas.</li>
      <li><strong>Instalaciones sanitarias y eléctricas</strong>, cuando corresponde.</li>
      <li><strong>Estructura</strong>, cuando corresponde; en ese caso interviene un ingeniero, como contamos en <a class="link" href="/servicios/calculo-estructural/">cálculo estructural</a>.</li>
    </ul>

    <h2 class="display display--sm">Qué tenés que reunir para empezar</h2>
    <p>Cuanto más completo llegues, menos vueltas se dan. Conviene tener a mano:</p>
    <ul class="ticks">
      <li>Título de propiedad o el documento que acredita el lote.</li>
      <li>Datos catastrales y cuenta corriente catastral del inmueble.</li>
      <li>Medidas del terreno, aunque sean las del título; el profesional verifica en el sitio.</li>
      <li>Documento de identidad del propietario.</li>
      <li>El anteproyecto aprobado por vos, si ya existe.</li>
      <li>Fotos del estado actual, si se trata de una reforma o una ampliación.</li>
    </ul>

    <h2 class="display display--sm">Cómo es el proceso</h2>
    <ol class="numbered">
      <li><strong>Revisión de requisitos.</strong> El profesional consulta qué pide la municipalidad de tu lote y con qué normas vigentes.</li>
      <li><strong>Relevamiento.</strong> Se toman medidas y se constata el estado del terreno o de lo construido, algo clave en los lotes angostos y largos de Asunción.</li>
      <li><strong>Dibujo.</strong> Se preparan plantas, cortes, fachadas, techos y planillas según la lista de ese municipio.</li>
      <li><strong>Firmas.</strong> Firman los profesionales habilitados que correspondan, cada uno en su parte.</li>
      <li><strong>Presentación.</strong> Se ingresa el legajo en la oficina de obras de la municipalidad.</li>
      <li><strong>Observaciones y correcciones.</strong> Si la oficina pide cambios, se corrigen y se vuelve a presentar.</li>
    </ol>

    <h2 class="display display--sm">Asunción y Gran Asunción</h2>
    <p>No hay una única ventanilla para toda el área metropolitana. Asunción, Luque, San Lorenzo, Lambaré, Fernando de la Mora o Mariano Roque Alonso tienen, cada una, su oficina de obras particulares, con requisitos, formatos y tiempos propios. Además las normas cambian con el tiempo.</p>
    <p>Por eso ninguna guía general reemplaza la consulta al profesional: es el profesional quien confirma la lista vigente y su fecha para tu municipio.</p>

    <h2 class="display display--sm">Qué pasa con las observaciones</h2>
    <p>Que la municipalidad devuelva el legajo con observaciones es una parte normal del trámite, no una negativa. Pueden pedir un dato que falta, corregir una medida, ajustar un retiro o aclarar un uso. El profesional responde, corrige los planos y vuelve a presentarlos.</p>
    <p>Cuánto tarda cada etapa depende de la municipalidad, del proyecto y del profesional. Ayuda llegar con documentos completos y decidir temprano los cambios de diseño.</p>

    <h2 class="display display--sm">Documentar lo ya construido</h2>
    <p>Algunos profesionales también se ocupan de documentar lo que ya está construido. ARQ solo te deriva cuando hay un profesional verificado que ofrece ese trabajo, y no promete el resultado.</p>

    <h2 class="display display--sm">El papel de ARQ</h2>
    <p>Nosotros no dibujamos, firmamos ni presentamos los planos, y tampoco gestionamos trámites. Entendemos tu caso, te pedimos los datos básicos y te presentamos a un profesional independiente con experiencia en tu tipo de obra y en tu municipio. Con él acordás alcance y honorarios.</p>
    <p>Cuando la documentación esté lista y busques quién construya, podés mirar <?= obra_link('https://obra.com.py/', 'obra.com.py') ?>. Si se trata de una obra existente, mirá <a class="link" href="/proyectos/reforma-ampliacion/">reforma o ampliación</a>; el recorrido completo está en <a class="link" href="/como-funciona/">cómo funciona ARQ</a>.</p>
  </div>
  <?= faq_html($faq) ?>
  <?= related([
      ['Anteproyecto arquitectónico', '/servicios/anteproyecto-arquitectonico/', 'La etapa de diseño que suele venir antes de los planos.'],
      ['Cálculo estructural', '/servicios/calculo-estructural/', 'Cuando la obra necesita un ingeniero que firme la estructura.'],
      ['Reforma o ampliación', '/proyectos/reforma-ampliacion/', 'Si la casa ya existe y hay que documentar el cambio.'],
      ['Cómo funciona ARQ', '/como-funciona/', 'Los pasos desde tu consulta hasta el profesional.'],
  ]) ?>
</article>
<?= cta_band('¿La municipalidad te pide planos?', 'Contanos el lote, el municipio y en qué etapa estás, y te conectamos con un profesional que conozca ese trámite.') ?>
<?php page_end();

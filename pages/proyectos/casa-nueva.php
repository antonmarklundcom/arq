<?php
declare(strict_types=1);
$crumbs = [['Inicio', '/'], ['Proyectos', '/proyectos/'], ['Casa nueva', '/proyectos/casa-nueva/']];
$faq = [
    ['¿Necesito tener el terreno para hablar con un arquitecto?', 'No. Muchas personas consultan antes de comprar, para saber qué cabe en el lote, cómo está orientado y si el frente o la pendiente complican el diseño. Contanos la ubicación y las medidas aproximadas.'],
    ['¿Puedo construir una casa sin arquitecto?', 'En general, la municipalidad pide planos firmados por un profesional habilitado. Cada municipio define sus requisitos, y el profesional te confirma la lista vigente. Además, un buen proyecto evita cambios en plena obra.'],
    ['¿Cuánto tarda el proyecto de una casa?', 'Depende del tamaño de la casa, de los ajustes del diseño, de la disponibilidad del profesional y de los tiempos de la municipalidad. Por eso ARQ no promete plazos. Llegar con el programa y los datos del terreno acorta las idas y vueltas.'],
    ['¿ARQ diseña la casa o construye?', 'Ninguna de las dos. ARQ te conecta con un arquitecto independiente, que diseña, firma y responde por su trabajo. La construcción es otra etapa, con otros responsables.'],
];
page_start([
    'title' => 'Arquitecto para tu casa nueva en Paraguay | ARQ',
    'description' => 'Tenés un terreno, o estás por comprarlo, y querés hacer tu casa. Te mostramos el camino hasta la obra y te conectamos con un arquitecto independiente.',
    'path' => '/proyectos/casa-nueva/',
    'crumbs' => $crumbs,
    'faq' => $faq,
    'service' => ['name' => 'Arquitecto para casa nueva', 'description' => 'Conexión con arquitectos independientes para diseñar una vivienda nueva en Asunción y Gran Asunción, desde el programa y el terreno hasta la documentación del proyecto.'],
]);
?>
<article class="wrap section">
  <?= crumbs_html($crumbs) ?>
  <header class="page-head">
    <p class="eyebrow">Proyectos · Casa nueva</p>
    <h1 class="display display--lg">Tu casa nueva empieza antes del plano</h1>
    <p class="lead">Si tenés un terreno, o estás por comprarlo, y querés hacer tu casa, lo primero no es dibujar: es ordenar qué necesitás, qué te da el lote y qué etapas vienen después. Te conectamos con un arquitecto independiente que trabaje con vos desde ese punto.</p>
    <p class="hero__cta"><?= selector_cta('Contanos tu proyecto', 'head') ?> <?= wa_cta('Quiero mi casa', 'head') ?></p>
  </header>

  <div class="prose">
    <h2 class="display display--sm">Para quién es esta página</h2>
    <p>Para quien va a construir una vivienda desde cero: una familia con un lote en Luque o Capiatá, una pareja que busca terreno en Asunción, alguien que heredó un fondo. No hace falta tener nada definido; un arquitecto sirve sobre todo cuando las preguntas siguen abiertas.</p>

    <h2 class="display display--sm">Del terreno a la obra, en seis etapas</h2>
    <p>Cada etapa tiene su propio profesional y su propia firma. Esta es la secuencia habitual:</p>
    <ol class="numbered">
      <li><strong>Programa.</strong> Qué necesitás hoy y qué podría cambiar en diez años. Es una conversación, no un dibujo.</li>
      <li><strong>Anteproyecto.</strong> La primera propuesta de la casa en el terreno. Está en <a href="/servicios/anteproyecto-arquitectonico/">anteproyecto arquitectónico</a>.</li>
      <li><strong>Proyecto y documentación.</strong> El diseño aprobado se convierte en planos completos. Mirá <a href="/servicios/planos-documentacion-municipal/">planos y documentación municipal</a>.</li>
      <li><strong>Cálculo estructural.</strong> Un ingeniero dimensiona la estructura y firma el cálculo. Se explica en <a href="/servicios/calculo-estructural/">cálculo estructural</a>.</li>
      <li><strong>Aprobación municipal.</strong> Cada municipalidad del área metropolitana tiene sus requisitos y sus tiempos. El profesional te confirma la lista vigente y presenta la documentación; ARQ no hace trámites.</li>
      <li><strong>Construcción.</strong> La obra en sí, con un constructor y un equipo propios. Es una etapa distinta.</li>
    </ol>

    <h2 class="display display--sm">Qué pensar antes de llamar</h2>
    <p>No hace falta traer respuestas, pero pensar esto ahorra idas y vueltas.</p>
    <ul class="ticks">
      <li><strong>Cuántas personas</strong> viven hoy y cuántas podrían ser en unos años, y si la casa debería poder crecer.</li>
      <li><strong>Ambientes:</strong> dormitorios, baños, si querés cocina abierta o separada, lavadero, depósito.</li>
      <li><strong>Trabajo en casa y mascotas:</strong> un escritorio, un espacio con visitas, un patio con sombra.</li>
      <li><strong>Estacionamiento:</strong> cuántos vehículos, techado o no, y cómo se entra desde la calle.</li>
      <li><strong>Patio y galería:</strong> cuánto de tu vida diaria querés que pase afuera.</li>
      <li><strong>Presupuesto orientativo:</strong> una idea honesta de lo que tenés previsto, aunque sea amplia.</li>
    </ul>

    <h2 class="display display--sm">El terreno ya decide mucho</h2>
    <p>Antes de dibujar, el arquitecto mira el lote. Conviene conocer, en general:</p>
    <ul class="ticks">
      <li><strong>Medidas y forma.</strong> En Asunción es frecuente el frente angosto y el lote profundo, y eso obliga a pensar cómo entra la luz y el aire al centro de la casa. En Luque, San Lorenzo o Capiatá los lotes suelen ser más amplios y dan más libertad, aunque no siempre.</li>
      <li><strong>Orientación.</strong> Hacia dónde da el frente y por dónde entra el sol de la tarde.</li>
      <li><strong>Vecinos y árboles.</strong> Medianeras, construcciones linderas y árboles que dan sombra.</li>
      <li><strong>Pendiente y desagüe pluvial.</strong> Con lluvias fuertes, hacia dónde escurre el agua importa tanto como el diseño de la casa.</li>
      <li><strong>Servicios.</strong> Agua, electricidad, desagüe y estado de la calle.</li>
    </ul>

    <h2 class="display display--sm">Decisiones de clima que suelen funcionar</h2>
    <p>Las buenas casas paraguayas enfrentan el calor con diseño antes que con máquinas. Son consideraciones habituales, no recetas.</p>
    <ul class="ticks">
      <li>Galería orientada al norte, que da sombra en verano y deja pasar el sol bajo del invierno.</li>
      <li>Protección del sol del oeste, el más fuerte de la tarde, con muros ciegos, vegetación o celosías.</li>
      <li>Aleros generosos que cuidan las paredes del sol y de la lluvia.</li>
      <li>Ventilación cruzada, con aberturas enfrentadas que permitan que el aire recorra la casa.</li>
      <li>Patios que refrescan y dan luz al interior, sobre todo en lotes angostos.</li>
      <li>Ladrillo visto, por su inercia térmica y su buen envejecimiento, cuando el presupuesto lo admite.</li>
    </ul>

    <h2 class="display display--sm">Una planta o dos</h2>
    <p>Una planta simplifica la estructura, evita escaleras y conecta con el patio, pero ocupa más terreno. Dos plantas dejan más lote libre y separan la zona social de los dormitorios, a cambio de escalera, más cuidado con el sol arriba y una estructura más exigente. Depende del lote, de la familia y del presupuesto.</p>

    <h2 class="display display--sm">Qué te va a pedir el profesional</h2>
    <p>Para empezar suele alcanzar con esto, si lo tenés:</p>
    <ul class="ticks">
      <li>Ubicación del terreno, y medidas o documentación del lote si las tenés.</li>
      <li>Fotos del lote y de su entorno, con la calle y los vecinos.</li>
      <li>El programa que armaste con las preguntas de arriba.</li>
      <li>Una idea orientativa de presupuesto y de cuándo querrías empezar.</li>
    </ul>

    <h2 class="display display--sm">Cómo te conecta ARQ</h2>
    <p>Nos contás tu situación en pocas preguntas, ordenamos el alcance y te presentamos a un arquitecto independiente con experiencia en viviendas y disponibilidad para tomar tu proyecto. Con él acordás la forma de trabajo y los honorarios. Los pasos están en <a href="/como-funciona/">cómo funciona</a>.</p>
    <p>Las imágenes de casas que ves en este sitio son imágenes conceptuales de la marca, no proyectos de clientes ni obras de un profesional en particular.</p>

    <h2 class="display display--sm">¿Ya tenés planos y querés construir?</h2>
    <p>Cuando el proyecto está resuelto, la etapa que sigue es buscar quién lo ejecute. Podés mirar <?= obra_link('https://obra.com.py/casas/', 'construir tu casa con obra.com.py') ?>, otra marca, con otra forma de trabajo.</p>
  </div>

  <?= faq_html($faq) ?>
  <p class="prose-note">Si todavía estás eligiendo el lote, leé <a class="link" href="/guias/antes-de-comprar-un-terreno/">antes de comprar un terreno</a>; si estás eligiendo con quién trabajar, <a class="link" href="/guias/como-elegir-arquitecto/">cómo elegir arquitecto</a>. Para pensar el sol y la sombra de la casa, <a class="link" href="/guias/orientacion-y-sombra-casa-paraguay/">orientación y sombra</a>.</p>
  <?= related([
      ['Anteproyecto arquitectónico', '/servicios/anteproyecto-arquitectonico/', 'La primera propuesta de tu casa sobre el terreno.'],
      ['Planos y documentación municipal', '/servicios/planos-documentacion-municipal/', 'El juego de planos para la municipalidad y la obra.'],
      ['Cálculo estructural', '/servicios/calculo-estructural/', 'Fundaciones, columnas, vigas y losas firmadas por un ingeniero.'],
      ['Reforma o ampliación', '/proyectos/reforma-ampliacion/', 'Cuando la casa existe y hay que cambiarla.'],
  ]) ?>
</article>
<?= cta_band('Tu terreno ya tiene algo que decir.', 'Contanos dónde está y qué imaginás. Te orientamos hacia el arquitecto que corresponde a tu casa.') ?>
<?php page_end();

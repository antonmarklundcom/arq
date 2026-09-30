<?php
declare(strict_types=1);
$crumbs = [['Inicio', '/'], ['Guías', '/guias/'], ['Orientación y sombra', '/guias/orientacion-y-sombra-casa-paraguay/']];
$faq = [
    ['¿Qué orientación es mejor para una casa en Paraguay?',
     'No hay una única respuesta, porque depende de la forma del lote y de cómo vivís. Como criterio general, conviene proteger las fachadas que reciben el sol más fuerte, en especial las que miran al oeste, y abrir los ambientes de estar hacia donde hay sombra y brisa.'],
    ['¿Una galería alcanza para que la casa no se caliente?',
     'Ayuda mucho, pero sola no resuelve todo. Funciona mejor junto con aleros, ventilación cruzada, cubiertas bien resueltas y vegetación. El arquitecto evalúa cómo combinarlos en tu terreno.'],
    ['¿Sirve hacer una maqueta de sombras para una casa chica?',
     'Sí, porque es una de las formas más simples de ver cómo entra el sol en cada época del año. No reemplaza el criterio del profesional, pero te permite discutir el diseño con datos visibles y no con suposiciones.'],
    ['¿Puedo mejorar la sombra de una casa que ya construí?',
     'En general sí: alargar un alero, sumar una pérgola, plantar árboles adecuados o reabrir ventilaciones suelen ser intervenciones posibles. Si implican tocar estructura o ampliar, consultá antes con un profesional.'],
    ['¿La municipalidad regula aleros y galerías?',
     'Puede hacerlo, por ejemplo con retiros o con la ocupación del lote. Cada municipalidad define sus requisitos, por eso el profesional confirma la lista vigente para tu zona.'],
];
page_start([
    'title' => 'Orientación y sombra en la casa en Paraguay | ARQ',
    'description' => 'Cómo pensar sol, sombra y ventilación al diseñar una casa en Paraguay: orientación, galerías, aleros, vegetación y estudio solar, explicado con claridad.',
    'path' => '/guias/orientacion-y-sombra-casa-paraguay/',
    'crumbs' => $crumbs,
    'faq' => $faq,
    'og_type' => 'article',
]);
?>
<article class="wrap section">
  <?= crumbs_html($crumbs) ?>
  <header class="page-head">
    <p class="eyebrow">Guías</p>
    <h1 class="display display--lg">Orientación y sombra: cómo pensar la casa en Paraguay</h1>
    <p class="lead">En un clima cálido y húmedo, la casa se piensa para protegerse del sol fuerte y dejar pasar el aire. Eso se logra decidiendo bien hacia dónde miran los ambientes, cuánta sombra dan las galerías y los aleros, y por dónde corre la brisa. Esta guía te explica cómo razonarlo antes de dibujar.</p>
    <p class="hero__cta"><?= selector_cta('Contanos tu proyecto', 'head') ?> <?= wa_cta('Quiero que analicen mi terreno', 'head') ?></p>
  </header>

  <div class="prose">
    <h2 class="display display--sm">Empezar por el sol, no por la fachada</h2>
    <p>Paraguay está en el hemisferio sur, así que el sol recorre el cielo por el lado norte: ese es el frente soleado. A eso se suma el sol bajo de la tarde, que entra por el oeste y es el que más calienta una pared o una ventana.</p>
    <p>Por eso, antes de fijar la forma de la casa conviene mirar el lote con una pregunta simple: ¿por dónde entra el sol en cada momento del día y en cada estación? En verano el sol sube alto y en invierno queda más bajo, y esa diferencia es la que permite un diseño inteligente: sombra cuando sobra calor, luz cuando se agradece.</p>

    <h2 class="display display--sm">Qué hacer con cada lado de la casa</h2>
    <ul class="ticks">
      <li><strong>Norte:</strong> es el lado más fácil de proteger con un alero, porque el sol pega desde arriba. Suele ser buen lugar para el living o el comedor.</li>
      <li><strong>Oeste:</strong> el más exigente. Se maneja con poca superficie de vidrio, galerías, vegetación o ambientes que toleran más calor, como lavadero, cocina o depósito.</li>
      <li><strong>Este:</strong> recibe sol de mañana, más suave. Suele servir para dormitorios y para el desayuno.</li>
      <li><strong>Sur:</strong> casi no recibe sol directo. Es un lado fresco y estable, bueno para ventilar.</li>
    </ul>
    <p>Son criterios generales, no una regla fija: un lote angosto, un vecino alto o un árbol grande cambian el razonamiento completo.</p>

    <h2 class="display display--sm">Galerías y aleros: sombra que se puede habitar</h2>
    <p>La galería es uno de los recursos más valiosos de la casa paraguaya. Mantiene el sol fuera de las paredes y de las aberturas, y además suma un espacio intermedio donde se vive buena parte del año. Cuanto más profunda, más protege; cuanto más baja, más cierra la vista y la luz, así que es un equilibrio que se ajusta en el diseño.</p>
    <p>Los aleros cumplen una función parecida en los lados que no tienen galería, y además cuidan las paredes de la lluvia fuerte. Como dimensionarlos depende de la altura de la abertura y de la posición del sol, vale la pena estudiarlo en lugar de copiar una medida estándar. Si la galería o el voladizo son grandes, el ingeniero interviene: lo explicamos en <a class="link" href="/servicios/calculo-estructural/">cálculo estructural</a>.</p>

    <h2 class="display display--sm">Ventilación cruzada: el aire también se diseña</h2>
    <p>En un clima húmedo, sacar el calor importa tanto como no dejarlo entrar. La ventilación cruzada consiste en abrir ventanas o puertas en lados opuestos de un ambiente, para que el aire circule de una a otra. Algunas ideas para pensarla:</p>
    <ul class="ticks">
      <li>Ubicar aberturas enfrentadas, y no solo una ventana por cuarto.</li>
      <li>Dejar pasar el aire entre ambientes, con puertas que permitan cerrar sin cortar la circulación.</li>
      <li>Usar ventanas altas, que dejan salir el aire caliente.</li>
      <li>Fijarse hacia dónde suele venir la brisa en tu zona, y conversarlo con el profesional, que conoce el barrio.</li>
    </ul>

    <h2 class="display display--sm">Vegetación: la sombra que crece</h2>
    <p>Un árbol bien ubicado al oeste o al norte baja la temperatura alrededor de la casa y filtra el sol de la tarde. Conviene elegir especies adecuadas al lugar y prever su tamaño adulto, para que las raíces y las ramas no compliquen muros, cañerías ni cubierta. Si ya hay árboles en el lote, mencionalos desde la primera reunión: a veces conviene diseñar alrededor de ellos.</p>

    <h2 class="display display--sm">Cómo ayuda una maqueta de sombras o un estudio solar</h2>
    <p>Un estudio solar es un análisis, dibujado o digital, que muestra cómo se mueve la sombra de la casa y de sus vecinos a lo largo del día y del año. Una maqueta de sombras hace lo mismo de forma tangible: con un modelo del lote y una luz, se ve qué ambientes quedan al sol y cuáles no.</p>
    <p>Sirve para decidir con evidencia cuestiones como:</p>
    <ol class="numbered">
      <li>Dónde ubicar la galería y qué profundidad darle.</li>
      <li>Qué ventanas necesitan protección y cuáles pueden quedar abiertas.</li>
      <li>Dónde poner un patio, una huerta o una pileta para que tengan sol cuando lo querés.</li>
      <li>Cómo afecta un edificio vecino, presente o futuro, al lote.</li>
    </ol>
    <p>Suele formar parte del trabajo de <a class="link" href="/servicios/anteproyecto-arquitectonico/">anteproyecto</a>, y también puede pedirse en una reforma.</p>

    <h2 class="display display--sm">Qué hace ARQ en este tema</h2>
    <p>ARQ te conecta con arquitectos independientes que analizan el terreno, el sol y el viento antes de proponer una distribución. El diseño y la responsabilidad técnica son del profesional que elijas. Si después querés construir, la obra es otra etapa, con otros responsables: <?= obra_link('https://obra.com.py/', 'obra.com.py') ?>.</p>
    <?= disclaimer_html() ?>

    <div class="note">
      <p>Son criterios generales de diseño, no un estudio de tu terreno. Un arquitecto los ajusta a tu lote, tu zona y tu forma de vivir.</p>
    </div>
  </div>

  <?= faq_html($faq) ?>
  <?= related([
      ['Anteproyecto arquitectónico', '/servicios/anteproyecto-arquitectonico/', 'Donde se estudian implantación, sol y distribución.'],
      ['Casa nueva', '/proyectos/casa-nueva/', 'Del terreno a la vivienda, paso a paso.'],
      ['Antes de comprar un terreno', '/guias/antes-de-comprar-un-terreno/', 'Qué mirar del lote, incluida su orientación.'],
      ['Cómo elegir arquitecto', '/guias/como-elegir-arquitecto/', 'Preguntas para ordenar la conversación.'],
  ]) ?>
</article>
<?= cta_band('Contanos dónde está tu lote.', 'Con la ubicación y una idea de lo que querés, te orientamos hacia un arquitecto que trabaje el sol y la ventilación desde el terreno.') ?>
<?php page_end();

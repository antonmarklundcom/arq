<?php
declare(strict_types=1);
$crumbs = [['Inicio', '/'], ['Servicios', '/servicios/'], ['Anteproyecto', '/servicios/anteproyecto-arquitectonico/']];
$faq = [
    ['¿Con un anteproyecto ya puedo construir?', 'No. Es una propuesta de diseño para revisar y ajustar, sin el detalle que necesita una obra ni la documentación municipal. Para construir hacen falta los planos completos y, según el caso, el cálculo estructural.'],
    ['¿Tengo que tener el terreno comprado?', 'No necesariamente. Si estás por comprar un lote, un arquitecto puede ayudarte a ver qué cabe en él, siempre que tengas medidas y ubicación. Conviene verificar las condiciones de edificación de la zona antes de firmar.'],
    ['¿Puedo cambiar el diseño después de ver la primera propuesta?', 'Sí, para eso existe la etapa. Cuántas rondas de ajustes incluye cada trabajo lo acordás con el profesional antes de empezar.'],
    ['¿El anteproyecto se presenta en la municipalidad?', 'En general no: lo que se presenta es el juego de planos y la documentación completa, que se prepara después de tu aprobación. Aun así, cada municipalidad tiene sus reglas y conviene que el profesional las revise desde el comienzo.'],
    ['¿Qué pasa si no tengo claro qué quiero construir?', 'Es muy común y forma parte del trabajo. La primera reunión sirve para ordenar ideas, y llegar con fotos de casas que te gustan ayuda más que una lista cerrada.'],
];
page_start([
    'title' => 'Anteproyecto arquitectónico en Asunción | ARQ',
    'description' => 'Qué es un anteproyecto, qué incluye y qué llevar a la primera reunión. Te conectamos con arquitectos independientes para diseñar tu casa en Asunción.',
    'path' => '/servicios/anteproyecto-arquitectonico/',
    'crumbs' => $crumbs,
    'faq' => $faq,
    'service' => ['name' => 'Anteproyecto arquitectónico', 'description' => 'Primera propuesta de diseño de una vivienda u otro proyecto, con implantación, plantas, cortes, fachadas y volumetría, a cargo de un arquitecto independiente.'],
]);
?>
<article class="wrap section">
  <?= crumbs_html($crumbs) ?>
  <header class="page-head">
    <p class="eyebrow">Servicios · Diseño</p>
    <h1 class="display display--lg">Anteproyecto arquitectónico: la primera versión de tu proyecto</h1>
    <p class="lead">El anteproyecto es la etapa en la que un arquitecto traduce lo que querés en una propuesta dibujada sobre tu terreno: dónde va la casa, cómo se reparten los ambientes y cómo se va a ver. Es el momento de decidir y corregir, antes de invertir en planos de detalle.</p>
    <p class="hero__cta"><?= selector_cta('Contanos tu proyecto', 'head') ?> <?= wa_cta('Escribinos por WhatsApp', 'head') ?></p>
  </header>

  <div class="prose">
    <h2 class="display display--sm">Qué es un anteproyecto y para quién es</h2>
    <p>Es un diseño preliminar: muestra la idea general con claridad suficiente para entenderla, discutirla y aprobarla, sin resolver todavía cada medida ni cada material.</p>
    <p>Sirve a quien tiene un lote, o está por comprarlo, y aún no tiene planos: una familia que quiere su primera casa, alguien que va a construir en un terreno angosto de Asunción o en un loteamiento nuevo de Luque, San Lorenzo o Mariano Roque Alonso, o un propietario que quiere ver qué se puede hacer antes de decidir.</p>

    <h2 class="display display--sm">En qué se diferencia del proyecto ejecutivo</h2>
    <p>El anteproyecto responde a la pregunta &ldquo;¿cómo podría ser?&rdquo;. El proyecto ejecutivo responde a &ldquo;¿cómo se construye exactamente?&rdquo;. Este segundo incluye los planos completos con medidas y detalles, la planilla de aberturas, las instalaciones y la documentación que se presenta en la municipalidad.</p>
    <p>Por eso el orden importa: mover un ambiente en el anteproyecto es un ajuste de dibujo; hacerlo con el proyecto desarrollado obliga a rehacer trabajo. La etapa posterior está explicada en <a class="link" href="/servicios/planos-documentacion-municipal/">planos y documentación municipal</a>.</p>

    <h2 class="display display--sm">Qué suele incluir</h2>
    <p>El alcance exacto lo define cada profesional, pero un anteproyecto completo normalmente contiene:</p>
    <ul class="ticks">
      <li><strong>Programa de necesidades:</strong> la lista ordenada de ambientes y usos, según cómo vive tu familia.</li>
      <li><strong>Análisis del terreno:</strong> forma, pendiente, árboles, vecinos, calle y orientación.</li>
      <li><strong>Implantación:</strong> dónde se ubica la construcción en el lote, con sus retiros, accesos y patios.</li>
      <li><strong>Plantas esquemáticas:</strong> la distribución de cada nivel.</li>
      <li><strong>Cortes y fachadas esquemáticos:</strong> alturas, cubierta y carácter exterior.</li>
      <li><strong>Volumetría o imágenes:</strong> una maqueta o vistas para imaginar el resultado.</li>
      <li><strong>Superficie orientativa:</strong> una estimación de metros cuadrados construidos para conversar sobre alcance.</li>
    </ul>

    <h2 class="display display--sm">Diseñar para el clima de Paraguay</h2>
    <p>Un buen anteproyecto parte del lugar. Con veranos largos y calurosos, la orientación pesa tanto como la distribución: el sol de la tarde pega fuerte desde el oeste, y conviene protegerlo con aleros, vegetación o ambientes de servicio en lugar de dormitorios.</p>
    <p>Las galerías profundas dan sombra y extienden la vida al aire libre. La ventilación cruzada, con aberturas enfrentadas, refresca sin depender solo del aire acondicionado. Y como las lluvias suelen ser fuertes, también se piensan desde el inicio las cubiertas, los desagües y la relación de la casa con el nivel de la calle.</p>

    <h2 class="display display--sm">Qué tenés que llevar a la primera reunión</h2>
    <ul class="ticks">
      <li>Título o datos del lote, o al menos la dirección y el número de finca o cuenta corriente catastral si los tenés a mano.</li>
      <li>Medidas del terreno, aunque sean aproximadas, y su ubicación exacta.</li>
      <li>Fotos del lote, de la calle y de los vecinos.</li>
      <li>Las restricciones que ya conocés: servidumbres, árboles que querés conservar, un muro medianero.</li>
      <li>Una lista de ambientes, con lo imprescindible separado de lo deseable.</li>
      <li>Cómo vivís: si trabajás desde casa, si recibís mucha gente, si hay adultos mayores o mascotas.</li>
      <li>Referencias: casas, fotos o dibujos que te gusten, y también las que no.</li>
    </ul>

    <h2 class="display display--sm">Cómo es el proceso</h2>
    <ol class="numbered">
      <li><strong>Primera reunión.</strong> Contás qué necesitás, el profesional escucha, pregunta y te explica cómo trabaja.</li>
      <li><strong>Relevamiento.</strong> Se revisan el terreno, sus medidas, el entorno y el sol; muchas veces con una visita al lote.</li>
      <li><strong>Propuesta.</strong> El arquitecto presenta la primera versión de implantación, plantas, cortes y fachadas.</li>
      <li><strong>Ajustes.</strong> Revisás, comentás y se corrige hasta que el diseño represente lo que buscabas.</li>
      <li><strong>Aprobación.</strong> Cuando das tu conformidad, el anteproyecto queda como base para el proyecto y los planos.</li>
    </ol>
    <p>Los plazos dependen del proyecto, de tu disponibilidad y de la agenda del profesional.</p>

    <h2 class="display display--sm">La municipalidad, desde el comienzo</h2>
    <p>El anteproyecto todavía no se presenta como legajo final. Aun así, conviene verificar desde esta etapa qué se puede construir en tu lote: retiros, alturas y usos permitidos. Cada municipalidad del área metropolitana, sea Asunción, Luque, San Lorenzo, Lambaré u otra, define sus propias reglas y sus propios tiempos.</p>
    <p>El profesional que te presentemos consulta la normativa vigente de la zona y te lo confirma. ARQ no gestiona trámites: informamos el camino y conectamos con quien lo recorre.</p>

    <h2 class="display display--sm">Qué hace ARQ en esta etapa</h2>
    <p>Te conectamos con arquitectos independientes que trabajan el diseño desde el terreno y el clima. El diseño, la firma y la responsabilidad técnica son del profesional, y los honorarios se acuerdan directamente con quien te presentemos.</p>
    <p>Cuando tengas el proyecto listo y quieras construir, la etapa de obra es otra y tiene otros responsables: podés mirar <?= obra_link('https://obra.com.py/', 'obra.com.py') ?>.</p>
  </div>

  <?= faq_html($faq) ?>
  <p class="prose-note">Para ver qué trae un anteproyecto, etapa por etapa, leé la guía <a class="link" href="/guias/que-incluye-un-anteproyecto/">qué incluye un anteproyecto</a>.</p>
  <?= related([
      ['Planos y documentación municipal', '/servicios/planos-documentacion-municipal/', 'La etapa que sigue: planos completos y presentación.'],
      ['Casa nueva', '/proyectos/casa-nueva/', 'Del terreno a la vivienda, paso a paso.'],
      ['Cómo funciona ARQ', '/como-funciona/', 'Los cuatro pasos desde tu consulta hasta el profesional.'],
      ['Cálculo estructural', '/servicios/calculo-estructural/', 'Qué define el ingeniero una vez aprobado el diseño.'],
  ]) ?>
</article>
<?= cta_band('Si tenés un terreno, ya hay por dónde empezar.', 'Contanos dónde está el lote y qué querés construir, y te orientamos hacia un arquitecto con experiencia en ese tipo de proyecto.') ?>
<?php page_end();

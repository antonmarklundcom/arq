<?php
declare(strict_types=1);
$crumbs = [['Inicio', '/'], ['Guías', '/guias/'], ['Qué incluye un anteproyecto', '/guias/que-incluye-un-anteproyecto/']];
$faq = [
    ['¿Cuántas versiones del diseño puedo pedir?',
     'Depende de lo que acordés con el profesional antes de empezar. Conviene dejar por escrito cuántas rondas de cambios entran en el trabajo y qué pasa si querés rehacer algo grande después de aprobar.'],
    ['¿Me entregan los planos en papel o en digital?',
     'El formato de entrega también se conversa al inicio. Preguntá qué archivos vas a recibir y si podés usarlos después con otro profesional, por ejemplo el ingeniero.'],
    ['¿Puedo pasar del anteproyecto a otro arquitecto para el proyecto ejecutivo?',
     'Es una decisión tuya, pero conviene aclararlo desde el comienzo con quien diseña, porque el diseño y los dibujos tienen su autoría y cada profesional trabaja a su manera.'],
    ['¿Sirve un anteproyecto para pedir un crédito?',
     'Cada entidad define qué documentación pide y en qué etapa. Consultalo con ella antes de encargar nada; un anteproyecto por sí solo suele ser una propuesta de diseño, no una carpeta técnica completa.'],
];
page_start([
    'title' => 'Qué incluye un anteproyecto de arquitectura | ARQ',
    'description' => 'Qué se entrega y qué no en un anteproyecto, las etapas del diseño, qué decidís vos en cada una y cómo se pasa al proyecto ejecutivo.',
    'path' => '/guias/que-incluye-un-anteproyecto/',
    'crumbs' => $crumbs,
    'faq' => $faq,
    'og_type' => 'article',
]);
?>
<article class="wrap section">
  <?= crumbs_html($crumbs) ?>
  <header class="page-head">
    <p class="eyebrow">Guías</p>
    <h1 class="display display--lg">¿Qué incluye un anteproyecto de arquitectura?</h1>
    <p class="lead">Un anteproyecto reúne los dibujos y las decisiones básicas de tu obra: cómo se ubica en el lote, cómo se distribuye y qué aspecto tiene. No es todavía el juego de planos para construir. Esta guía te cuenta qué recibís, qué decidís en cada etapa y qué falta para llegar al proyecto ejecutivo.</p>
    <p class="hero__cta"><?= selector_cta('Contanos tu proyecto', 'head') ?> <?= wa_cta('Escribinos por WhatsApp', 'head') ?></p>
  </header>

  <div class="prose">
    <h2 class="display display--sm">Lo que normalmente se entrega</h2>
    <p>No hay un paquete único: cada profesional define su alcance y lo acordás con él. Aun así, lo que suele llegar a tus manos se parece a esto:</p>
    <ul class="ticks">
      <li>Un <strong>plano de ubicación</strong> que muestra la construcción dentro del terreno, con accesos y espacios libres.</li>
      <li>Las <strong>plantas de cada nivel</strong>, con los ambientes y su relación entre sí.</li>
      <li>Uno o dos <strong>cortes</strong> y las <strong>fachadas</strong>, para entender alturas y cubierta.</li>
      <li>Alguna forma de <strong>ver el volumen</strong>: una maqueta, un modelo en pantalla o perspectivas.</li>
      <li>Una <strong>memoria breve</strong> con la idea del diseño, los criterios y los materiales previstos en líneas generales.</li>
    </ul>
    <p>Para el detalle de la etapa y su razón de ser, mirá el <a class="link" href="/servicios/anteproyecto-arquitectonico/">servicio de anteproyecto</a>; acá nos concentramos en qué pasa dentro de ella.</p>

    <h2 class="display display--sm">Lo que no se entrega todavía</h2>
    <ul class="ticks">
      <li>Planos con todas las medidas, niveles y detalles constructivos.</li>
      <li>Planillas de aberturas, de terminaciones y cómputos de materiales.</li>
      <li>Planos de estructura y de instalaciones, que hacen otros especialistas.</li>
      <li>La carpeta con los requisitos que exige la municipalidad.</li>
    </ul>
    <p>Con esto solo no se construye, y tampoco conviene tomar como definitivo ningún número de esta etapa.</p>

    <h2 class="display display--sm">Las etapas y qué decidís vos</h2>
    <ol class="numbered">
      <li><strong>Programa.</strong> Decidís qué ambientes querés, cuáles son imprescindibles y cuáles podrían esperar. Es tu tarea más importante y se hace conversando.</li>
      <li><strong>Estudio del lote.</strong> Aportás datos y fotos; el profesional mira la forma, el sol, los vecinos y las condiciones de edificación. Acá decidís si el terreno sirve a tu programa.</li>
      <li><strong>Esquema.</strong> Suelen mostrarte una o dos ideas generales. Elegís el rumbo: una planta compacta o extendida, patio al frente o al fondo, uno o dos niveles.</li>
      <li><strong>Desarrollo del anteproyecto.</strong> Sobre el esquema elegido se dibujan plantas, cortes y fachadas. Opinás sobre circulaciones, tamaños y luz natural.</li>
      <li><strong>Ajustes y conformidad.</strong> Pedís los cambios que correspondan y, cuando el diseño te representa, das tu conformidad. Ese visto bueno es la base de lo que sigue.</li>
    </ol>
    <?= disclaimer_html() ?>

    <h2 class="display display--sm">Del anteproyecto al proyecto ejecutivo</h2>
    <p>Después de tu conformidad, el diseño se convierte en documentos que permiten construir. El arquitecto fija medidas y detalles; el ingeniero calcula la estructura sobre esa base, según lo que requiera la obra, y se coordinan las instalaciones. El paso intermedio habitual es revisar el alcance: qué se dibuja, quién lo firma y cómo se organiza la entrega.</p>
    <p>Un consejo práctico: los cambios grandes conviene hacerlos antes de esta transición, porque mover una escalera cuando ya hay estructura calculada significa repetir trabajo de varios profesionales. Cómo es el paso siguiente está en <a class="link" href="/servicios/planos-documentacion-municipal/">planos y documentación municipal</a>, y el rol de la estructura en <a class="link" href="/servicios/calculo-estructural/">cálculo estructural</a>.</p>

    <h2 class="display display--sm">Qué datos llevar para empezar</h2>
    <ul class="ticks">
      <li>Dirección y medidas del terreno, aunque sean aproximadas, y los datos que figuren en tus documentos del lote.</li>
      <li>Tus prioridades: qué es imprescindible para vos y qué podrías dejar para una segunda etapa.</li>
      <li>Cuántas personas van a vivir y si habrá cambios a futuro, como hijos o una ampliación.</li>
      <li>Tres o cuatro imágenes de lo que te gusta y de lo que no.</li>
      <li>Tus dudas sobre el lote: el ruido, los vecinos o cómo se comporta con la lluvia.</li>
    </ul>
    <p>Las reglas de construcción varían según el municipio: preguntale al profesional cuáles aplican a tu lote.</p>

    <h2 class="display display--sm">Cómo ayuda ARQ</h2>
    <p>ARQ te conecta con profesionales independientes según lo que necesitás; el diseño, la firma y la responsabilidad técnica son de ellos. Los honorarios y el alcance los acordás directamente con el profesional. Si más adelante querés buscar quién construya, esa etapa es de <?= obra_link('https://obra.com.py/', 'obra.com.py') ?>. Si todavía estás eligiendo con quién trabajar, te puede servir la guía sobre <a class="link" href="/guias/como-elegir-arquitecto/">cómo elegir arquitecto</a>.</p>

    <div class="note">
      <p>Contenido orientativo: lo que recibís depende de cada profesional, así que revisalo con él antes de empezar. Cada caso y cada municipalidad tienen sus particularidades.</p>
    </div>
  </div>

  <?= faq_html($faq) ?>
  <?= related([
      ['Anteproyecto arquitectónico', '/servicios/anteproyecto-arquitectonico/', 'El servicio: a quién sirve y cómo se trabaja.'],
      ['Casa nueva', '/proyectos/casa-nueva/', 'El recorrido completo desde el terreno.'],
      ['Cómo elegir arquitecto', '/guias/como-elegir-arquitecto/', 'Qué mirar antes de decidir con quién trabajar.'],
      ['Antes de comprar un terreno', '/guias/antes-de-comprar-un-terreno/', 'Qué revisar del lote antes de firmar.'],
  ]) ?>
</article>
<?= cta_band('Contanos qué querés construir y en qué zona.', 'Con unos pocos datos te orientamos hacia un profesional para empezar el anteproyecto.') ?>
<?php page_end();

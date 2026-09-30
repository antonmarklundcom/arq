<?php
declare(strict_types=1);
$crumbs = [['Inicio', '/'], ['Guías', '/guias/'], ['Planos para construir en Asunción', '/guias/planos-para-construir-en-asuncion/']];
$faq = [
    ['¿Por dónde empiezo si quiero construir?',
     'Por definir qué querés y qué lote tenés. Con eso se hace el anteproyecto, que es la base de todo lo que viene después. Recién cuando la propuesta te convence tiene sentido invertir en planos detallados.'],
    ['¿Un solo profesional se encarga de todo?',
     'Depende del caso. Suele haber un arquitecto que coordina el proyecto, un ingeniero que firma la estructura y, en obras más complejas, especialistas en instalaciones. Quién firma qué lo acordás con cada uno.'],
    ['¿Puedo empezar la obra mientras espero la respuesta de la municipalidad?',
     'Consultalo con el profesional antes de mover tierra o comprar materiales. Cada municipalidad tiene sus reglas sobre cuándo se puede iniciar, y avanzar sin permiso puede traer complicaciones.'],
    ['¿Los planos de la carpeta municipal alcanzan para construir?',
     'En general no. Suelen necesitarse más detalles para ejecutar, y eso se conversa con el arquitecto y con quien construya. Lo explicamos en la página de planos y documentación municipal.'],
    ['¿Qué hace ARQ en todo esto?',
     'Te conecta con profesionales independientes según lo que necesitás. No diseña, no calcula, no firma ni presenta trámites, y tampoco construye.'],
];
page_start([
    'title' => 'Planos para construir en Asunción: qué se necesita | ARQ',
    'description' => 'El recorrido para construir en Asunción: anteproyecto, planos, cálculo, presentación en la municipalidad e inicio de obra, y quién firma cada parte.',
    'path' => '/guias/planos-para-construir-en-asuncion/',
    'crumbs' => $crumbs,
    'faq' => $faq,
    'og_type' => 'article',
]);
?>
<article class="wrap section">
  <?= crumbs_html($crumbs) ?>
  <header class="page-head">
    <p class="eyebrow">Guías</p>
    <h1 class="display display--lg">Planos para construir en Asunción: qué se necesita</h1>
    <p class="lead">Para construir en Asunción normalmente se pasa por cinco etapas: anteproyecto, planos, cálculo de estructura, presentación en la municipalidad y recién después el inicio de obra. Cada una la resuelve un profesional distinto, y conocer el orden te ahorra idas y vueltas.</p>
    <p class="hero__cta"><?= selector_cta('Contanos tu proyecto', 'head') ?> <?= wa_cta('Escribinos por WhatsApp', 'head') ?></p>
  </header>

  <div class="prose">
    <h2 class="display display--sm">El recorrido, etapa por etapa</h2>
    <ol class="numbered">
      <li><strong>Anteproyecto.</strong> Es la propuesta inicial: cómo se acomoda lo que necesitás dentro de tu lote. Se ajusta hasta que estés conforme; detalles en <a class="link" href="/guias/que-incluye-un-anteproyecto/">qué incluye un anteproyecto</a>.</li>
      <li><strong>Planos.</strong> El anteproyecto se convierte en plantas, cortes y fachadas con medidas precisas.</li>
      <li><strong>Cálculo.</strong> Un ingeniero dimensiona la estructura sobre la base de esos planos.</li>
      <li><strong>Presentación municipal.</strong> Se reúne la carpeta y se ingresa en la municipalidad del lote, que la revisa.</li>
      <li><strong>Inicio de obra.</strong> Con el permiso en mano y los planos de obra, se contrata y se empieza a construir.</li>
    </ol>
    <p>El orden importa. Cambiar una pared cuando solo hay un anteproyecto es simple; cambiarla con la estructura calculada y la carpeta presentada obliga a rehacer trabajo de varios profesionales.</p>

    <h2 class="display display--sm">Qué documentos suelen pedirse</h2>
    <p>Hay dos grupos. Los papeles del lote y del propietario, que vos aportás, y los planos, que preparan los profesionales.</p>
    <ul class="ticks">
      <li><strong>Del lote</strong>: documentación que acredite la propiedad y datos que identifiquen el inmueble.</li>
      <li><strong>Del propietario</strong>: identificación y, si actúa otra persona en su nombre, la autorización correspondiente.</li>
      <li><strong>Del proyecto</strong>: el juego de planos, con su firma profesional, y los complementos que el tipo de obra requiera.</li>
    </ul>
    <p>La lista concreta cambia entre municipalidades y con el tiempo. Lo prudente es que el profesional la confirme para tu lote antes de empezar a dibujar. En <a class="link" href="/servicios/planos-documentacion-municipal/">planos y documentación municipal</a> vemos qué contiene habitualmente esa carpeta.</p>

    <h2 class="display display--sm">Quién firma qué</h2>
    <p>No firma una sola persona. Cada profesional responde por su parte:</p>
    <ul class="ticks">
      <li>El <strong>arquitecto</strong> firma el proyecto: la distribución, las fachadas y la relación con las normas del lugar.</li>
      <li>El <strong>ingeniero</strong> firma la estructura, con su memoria y sus planos, como se ve en <a class="link" href="/servicios/calculo-estructural/">cálculo estructural</a>.</li>
      <li>Quienes hacen <strong>instalaciones</strong> firman las suyas cuando la obra lo exige.</li>
      <li>El <strong>propietario</strong> firma como responsable del lote y de las decisiones sobre su proyecto.</li>
    </ul>
    <p>Preguntale a cada uno qué firma y qué queda fuera de su alcance. Los vacíos de responsabilidad suelen aparecer recién en obra.</p>

    <h2 class="display display--sm">Errores comunes</h2>
    <ul class="ticks">
      <li><strong>Comprar o tomar decisiones sin mirar las normas del lote.</strong> Lo que podés construir depende del terreno; por eso conviene leer antes <a class="link" href="/guias/antes-de-comprar-un-terreno/">qué revisar antes de comprar un terreno</a>.</li>
      <li><strong>Pedir planos antes de tener un anteproyecto conforme.</strong> Se paga dos veces el mismo dibujo.</li>
      <li><strong>Confundir el juego municipal con el de obra.</strong> Con los primeros, quien construye suele quedarse con dudas.</li>
      <li><strong>Saltear la estructura</strong> o consultarla tarde, cuando el diseño ya no admite cambios.</li>
      <li><strong>Empezar a construir sin tener claro el permiso.</strong> Cada municipalidad tiene sus reglas y conviene preguntarlas primero.</li>
      <li><strong>Darle por hecho un plazo.</strong> Las revisiones, observaciones y correcciones dependen de cada oficina y de cada proyecto.</li>
      <li><strong>Usar planos viejos de una casa existente</strong> sin verificar que reflejen lo que hay hoy.</li>
    </ul>

    <h2 class="display display--sm">Cuándo se empieza a construir</h2>
    <p>La obra arranca cuando el proyecto está definido, la estructura resuelta y la situación ante la municipalidad aclarada por tu profesional. Ahí sí conviene comparar a quienes pueden ejecutar, con los planos de obra en la mano para que todos coticen lo mismo. Esa etapa es de otra marca: <?= obra_link('https://obra.com.py/', 'obra.com.py') ?>.</p>
    <p>Si todavía no sabés a quién encargarle el proyecto, mirá <a class="link" href="/guias/como-elegir-arquitecto/">cómo elegir arquitecto</a>.</p>

    <h2 class="display display--sm">Dónde entra ARQ</h2>
    <p>Te hacemos unas preguntas sobre tu lote y tu idea y, según eso, te conectamos con profesionales independientes que trabajen en tu tipo de obra. Con ellos acordás alcance y condiciones.</p>
    <?= disclaimer_html() ?>

    <div class="note">
      <p>Esta guía describe el recorrido en general y no es asesoramiento legal ni técnico. Confirmá cada paso con los profesionales de tu proyecto.</p>
    </div>
  </div>

  <?= faq_html($faq) ?>
  <?= related([
      ['Planos y documentación municipal', '/servicios/planos-documentacion-municipal/', 'Qué contiene la carpeta y cómo es el trámite.'],
      ['Qué incluye un anteproyecto', '/guias/que-incluye-un-anteproyecto/', 'La primera etapa, antes de los planos.'],
      ['Cálculo estructural', '/servicios/calculo-estructural/', 'Qué entrega el ingeniero y cuándo se consulta.'],
      ['Casa nueva', '/proyectos/casa-nueva/', 'El camino completo si partís de un lote.'],
  ]) ?>
</article>
<?= cta_band('¿Vas a construir en Asunción o Gran Asunción?', 'Contanos el lote y en qué etapa estás, y te conectamos con profesionales que trabajen en ese tipo de obra.') ?>
<?php page_end();

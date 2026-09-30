<?php
declare(strict_types=1);
$crumbs = [['Inicio', '/'], ['Servicios', '/servicios/'], ['Dirección de proyecto', '/servicios/direccion-de-proyecto/']];
$faq = [
    ['¿La dirección de proyecto es lo mismo que la construcción?', 'No. El constructor ejecuta la obra con su equipo y sus materiales; el director de proyecto controla que lo que se levanta coincida con lo proyectado y te asesora en las decisiones técnicas.'],
    ['¿Qué incluye exactamente la dirección de proyecto?', 'Depende del profesional y de la obra. Puede incluir visitas periódicas, informes de cada visita, revisión de presupuestos, control de calidad y compatibilización de planos, pero el alcance se acuerda por escrito con el profesional antes de empezar.'],
    ['¿Necesito dirección de proyecto si ya tengo un constructor de confianza?', 'Puede seguir siendo útil. Un buen constructor conoce su oficio, pero no revisa su propio trabajo ni te representa ante los demás gremios. Si la obra es chica, tal vez alcance con algo más liviano; el profesional te dice qué tiene sentido.'],
    ['¿Pueden dirigir un proyecto que diseñó otro profesional?', 'En muchos casos sí, pero no todos los profesionales lo aceptan. Quien dirige necesita entender el proyecto a fondo y poder consultar al autor ante una duda. Contanos quién hizo los planos.'],
    ['¿La municipalidad exige un profesional responsable de la obra?', 'En muchos municipios la documentación que se presenta identifica a un profesional responsable, pero cada municipalidad define sus requisitos y sus tiempos. El profesional que te presentemos te confirma qué corresponde en tu caso. ARQ no hace trámites.'],
];
page_start([
    'title' => 'Dirección de proyecto y coordinación | ARQ',
    'description' => 'Qué es la dirección de proyecto, qué puede incluir y cuándo conviene. Te conectamos con profesionales independientes que ofrecen este servicio.',
    'path' => '/servicios/direccion-de-proyecto/',
    'crumbs' => $crumbs,
    'faq' => $faq,
    'service' => [
        'name' => 'Dirección de proyecto',
        'description' => 'Coordinación de arquitectura, estructura e instalaciones y control de que la obra respete el proyecto aprobado, prestada por un profesional independiente al que ARQ te conecta.',
    ],
]);
?>
<article class="wrap section">
  <?= crumbs_html($crumbs) ?>
  <header class="page-head">
    <p class="eyebrow">Servicios</p>
    <h1 class="display display--lg">Quién dirige tu proyecto mientras se construye</h1>
    <p class="lead">La dirección de proyecto es el acompañamiento de un arquitecto o ingeniero que coordina a los demás profesionales, controla que la obra siga lo proyectado y te representa en las decisiones técnicas. Es para quien va a construir y no quiere quedar solo frente a planos que no domina.</p>
    <p class="hero__cta"><?= selector_cta('Contanos tu proyecto') ?> <?= wa_cta('Escribinos por WhatsApp') ?></p>
  </header>

  <div class="prose">
    <h2 class="display display--sm">Qué es la dirección de proyecto</h2>
    <p>Un proyecto reúne el trabajo de varios: el arquitecto dibuja, el ingeniero calcula, otros definen las instalaciones. Cada uno entrega su parte, y las partes tienen que encajar. Quien coordina vela por ese encaje.</p>
    <p>En la práctica, ese profesional:</p>
    <ul class="ticks">
      <li>coordina arquitectura, estructura e instalaciones para que no se contradigan;</li>
      <li>controla que lo construido siga el proyecto aprobado;</li>
      <li>responde las consultas del constructor cuando algo no queda claro en los planos;</li>
      <li>evalúa y aprueba, o rechaza, los cambios que aparecen en el camino;</li>
      <li>te representa en las decisiones técnicas y te explica en términos simples qué se está decidiendo.</li>
    </ul>

    <h2 class="display display--sm">En qué se diferencia de construir y de diseñar</h2>
    <p>El constructor ejecuta: contrata gremios, compra materiales, levanta paredes. El director controla. Por eso conviene que sean personas distintas: quien construye no debería ser el único que verifica su propio trabajo.</p>
    <p>La etapa de diseño termina cuando el proyecto está definido; la dirección empieza cuando ese proyecto se lleva al terreno. A veces quien diseñó también dirige, pero no es obligatorio. Si todavía no tenés planos, empezá por el <a class="link" href="/proyectos/casa-nueva/">camino de una casa nueva</a>.</p>

    <h2 class="display display--sm">Qué puede incluir según el profesional</h2>
    <p>No hay un paquete único. Cada profesional arma su propuesta, y lo que sigue es un menú de lo que suele ofrecerse:</p>
    <ul class="ticks">
      <li><strong>Visitas periódicas a la obra</strong>, con una frecuencia que se define según el tipo de trabajo.</li>
      <li><strong>Actas o informes de visita</strong>, con observaciones y fotos, para que quede registro de lo que se vio y de lo que se decidió.</li>
      <li><strong>Control de calidad</strong> de materiales y de ejecución: niveles, aplomos, armaduras antes de colar, impermeabilizaciones, terminaciones.</li>
      <li><strong>Revisión de presupuestos de contratistas</strong>, para que puedas compararlos con los mismos criterios.</li>
      <li><strong>Compatibilización de planos</strong>: revisar que arquitectura, cálculo e instalaciones no choquen antes de que el problema aparezca en obra.</li>
    </ul>
    <div class="note">
      <p>El alcance se acuerda por escrito con el profesional antes de empezar. Preguntá qué incluye, cada cuánto visita, qué pasa si hay una consulta urgente y qué queda fuera.</p>
    </div>

    <h2 class="display display--sm">Qué necesitás para empezar</h2>
    <ul class="ticks">
      <li>El <strong>proyecto y los planos</strong>, completos o en su versión más avanzada.</li>
      <li>El <strong>cálculo estructural</strong>, si ya existe. Si no, leé sobre el <a class="link" href="/servicios/calculo-estructural/">cálculo estructural</a>.</li>
      <li>Un <strong>cronograma tentativo</strong>: cuándo querés empezar y cuándo te gustaría terminar.</li>
      <li>El <strong>constructor</strong>, si ya lo definiste; si no, avisá, porque el profesional puede ayudarte a comparar propuestas.</li>
    </ul>
    <p>Si todavía te falta la documentación que se presenta en la municipalidad, mirá <a class="link" href="/servicios/planos-documentacion-municipal/">planos y documentación municipal</a>.</p>

    <h2 class="display display--sm">Los pasos, de la consulta a la obra</h2>
    <ol class="numbered">
      <li><strong>Contanos tu proyecto.</strong> Qué vas a construir, dónde está el terreno, en qué etapa estás y qué documentación tenés.</li>
      <li><strong>Definimos qué acompañamiento necesitás.</strong></li>
      <li><strong>Te presentamos a un profesional</strong> que ofrezca dirección de proyecto y tenga experiencia en obras parecidas.</li>
      <li><strong>Acordás el alcance por escrito</strong> directamente con el profesional: qué incluye, cómo se comunican, cómo se aprueban los cambios.</li>
      <li><strong>El profesional acompaña la obra</strong> mientras el constructor la ejecuta, y vos recibís sus informes y decisiones.</li>
    </ol>
    <p>El proceso completo de ARQ está en <a class="link" href="/como-funciona/">cómo funciona</a>.</p>

    <h2 class="display display--sm">El contexto municipal</h2>
    <p>En muchos municipios del área metropolitana, la documentación para construir nombra a un profesional responsable de la obra. Los requisitos y los tiempos cambian de una municipalidad a otra y según el tipo de obra. El profesional que te presentemos te confirma qué se pide en tu caso. ARQ no hace trámites.</p>

    <h2 class="display display--sm">Cuándo vale la pena</h2>
    <ul class="ticks">
      <li><strong>Obra nueva</strong>, donde las decisiones tempranas, como fundaciones y estructura, son las más difíciles de corregir.</li>
      <li><strong>Ampliaciones complejas</strong>, sobre todo en altura o sobre muros existentes.</li>
      <li><strong>Obras con varios gremios</strong> que se pisan entre sí: albañilería, electricidad, sanitaria, carpintería.</li>
      <li><strong>Propietarios que no pueden estar en obra</strong>.</li>
    </ul>
    <p>En una reforma chica y sencilla, en cambio, pueden alcanzar unas visitas puntuales.</p>

    <h2 class="display display--sm">El rol de ARQ</h2>
    <p>Este servicio existe en ARQ solo porque hay profesionales que lo ofrecen de verdad: si no hay nadie disponible para tu tipo de obra, te lo decimos. El profesional es independiente: él define su alcance, sus honorarios y su forma de trabajo, y él responde por lo que firma.</p>
    <p>La construcción misma es otra etapa, con otros responsables. Si ya tenés el proyecto y buscás quién lo ejecute, mirá <?= obra_link('https://obra.com.py/', 'obra.com.py') ?>.</p>
  </div>

  <?= faq_html($faq) ?>
  <?= related([
      ['Cálculo estructural', '/servicios/calculo-estructural/', 'El ingeniero que dimensiona fundaciones, columnas, vigas y losas.'],
      ['Planos y documentación municipal', '/servicios/planos-documentacion-municipal/', 'El juego de planos para presentar y para construir.'],
      ['Casa nueva', '/proyectos/casa-nueva/', 'Del terreno a los planos de una vivienda.'],
      ['Cómo funciona ARQ', '/como-funciona/', 'Los pasos desde tu consulta hasta el profesional.'],
  ]) ?>
</article>
<?= cta_band('Contanos cómo vas a construir.', 'Con unos pocos datos te orientamos hacia un profesional que acompañe tu obra de principio a fin.') ?>
<?php page_end();

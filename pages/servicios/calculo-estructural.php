<?php
declare(strict_types=1);
$crumbs = [['Inicio', '/'], ['Servicios', '/servicios/'], ['Cálculo estructural', '/servicios/calculo-estructural/']];
$faq = [
    ['¿Quién hace el cálculo estructural, un arquitecto o un ingeniero?',
     'Un ingeniero civil o estructural, que es quien dimensiona y firma. El arquitecto coordina con él, pero no reemplaza su cálculo. ARQ te conecta con ingenieros independientes; no calcula ni firma.'],
    ['Quiero hacer un segundo piso sobre mi casa. ¿Qué tengo que saber?',
     'El ingeniero primero tiene que ver qué hay hoy: fundaciones, muros, losa y estado general. Con eso te dice si la base soporta la carga nueva, si hay que reforzarla o si conviene otra solución.'],
    ['¿Puedo sacar una pared para integrar dos ambientes?',
     'Antes de tocarlo, hacelo revisar. Algunos muros solo dividen y otros cargan la losa o el techo, y a simple vista no siempre se distingue. Si es portante, el ingeniero define cómo reemplazar su función.'],
    ['¿Necesito un estudio de suelo?',
     'Es una recomendación habitual, sobre todo en obras de cierto tamaño o en terrenos con dudas, porque los suelos de Gran Asunción cambian de un lote a otro. El ingeniero te indica si conviene uno en tu caso.'],
    ['¿La municipalidad pide los planos de estructura?',
     'Según el tipo de obra, algunas municipalidades piden planos de estructura firmados. Cada una define sus requisitos, por eso el profesional confirma la lista vigente para tu lote.'],
];
page_start([
    'title' => 'Cálculo estructural en Asunción y Paraguay | ARQ',
    'description' => 'Cuándo una obra necesita cálculo estructural, qué entrega el ingeniero y qué datos preparar. Te conectamos con ingenieros independientes en Asunción.',
    'path' => '/servicios/calculo-estructural/',
    'crumbs' => $crumbs,
    'faq' => $faq,
    'service' => ['name' => 'Cálculo estructural', 'description' => 'Te conectamos con ingenieros civiles y estructurales independientes que dimensionan y firman la estructura de obras nuevas, ampliaciones y reformas en Asunción y Gran Asunción.'],
]);
?>
<article class="wrap section">
  <?= crumbs_html($crumbs) ?>
  <header class="page-head">
    <p class="eyebrow">Servicios · Estructura</p>
    <h1 class="display display--lg">Cálculo estructural: qué es y cuándo lo necesitás</h1>
    <p class="lead">El cálculo estructural define con qué dimensiones y con qué armaduras se construyen las fundaciones, las columnas, las vigas y las losas de una obra, para que resista su propio peso, el uso y el clima. Lo resuelve un ingeniero, no un arquitecto, y ARQ te conecta con uno.</p>
    <p class="hero__cta"><?= selector_cta('Contanos tu proyecto', 'head') ?> <?= wa_cta('Necesito un ingeniero', 'head') ?></p>
  </header>

  <div class="prose">
    <h2 class="display display--sm">Quién lo hace y quién firma</h2>
    <p>El cálculo lo realiza un ingeniero civil o estructural, y es él quien firma la memoria de cálculo y los planos de estructura. ARQ no calcula ni firma: entendemos tu proyecto y te presentamos a un ingeniero independiente con experiencia en obras parecidas.</p>
    <p>El arquitecto y el ingeniero conviene que se hablen temprano: las luces entre apoyos, la ubicación de las columnas o los voladizos de galería se conversan entre ambos. Esa coordinación se explica en <a class="link" href="/servicios/direccion-de-proyecto/">dirección de proyecto</a>.</p>

    <h2 class="display display--sm">Cuándo suele hacer falta</h2>
    <p>No hay una regla única para todas las obras. Estas son las situaciones en las que, en general, se consulta a un ingeniero:</p>
    <ul class="ticks">
      <li><strong>Obra nueva</strong> con estructura de hormigón armado, sea vivienda, local o pequeño edificio.</li>
      <li><strong>Losas</strong>, tanto las de entrepiso como las de techo, y más si llevan sobrecargas como terrazas o tanques.</li>
      <li><strong>Un segundo piso sobre una casa existente</strong>, donde hay que verificar si las fundaciones y los muros actuales aguantan más carga.</li>
      <li><strong>Quitar o abrir muros portantes</strong> para integrar ambientes o ampliar una puerta.</li>
      <li><strong>Grandes luces</strong>: una sala amplia sin columnas, una galería profunda.</li>
      <li><strong>Piscinas, tanques elevados y cisternas</strong>.</li>
      <li><strong>Tinglados y cubiertas metálicas</strong>.</li>
    </ul>

    <h2 class="display display--sm">Qué entrega el ingeniero</h2>
    <p>El alcance exacto lo acordás con el profesional, pero un trabajo de estructura completo suele incluir:</p>
    <ul class="ticks">
      <li>La <strong>memoria de cálculo</strong>: el documento donde se explican las hipótesis, las cargas consideradas y los resultados.</li>
      <li>Los <strong>planos de fundaciones</strong>, con el tipo de base elegido y sus dimensiones.</li>
      <li>Los planos de <strong>columnas, vigas y losas</strong>, con sus secciones y niveles.</li>
      <li>Los <strong>detalles de armaduras</strong>: cantidad, diámetro, separación, empalmes y recubrimientos.</li>
      <li>Las <strong>especificaciones de hormigón y acero</strong> que deben usarse en obra.</li>
    </ul>

    <h2 class="display display--sm">Qué tenés que tener para empezar</h2>
    <ul class="ticks">
      <li><strong>Planos de arquitectura o anteproyecto</strong>, aunque estén en borrador. Si todavía no los tenés, el primer paso es el <a class="link" href="/servicios/anteproyecto-arquitectonico/">anteproyecto</a>.</li>
      <li><strong>Estudio de suelo</strong>, si ya existe. Si no, el ingeniero te dirá si conviene encargarlo para tu lote.</li>
      <li><strong>Uso previsto</strong>: vivienda, comercio, depósito, posibilidad de sumar un piso más adelante.</li>
      <li>En reformas, <strong>fotos y relevamiento de lo existente</strong>: muros, losa, fisuras, humedades y, si los hay, los planos originales.</li>
    </ul>

    <h2 class="display display--sm">Cómo se trabaja, paso a paso</h2>
    <ol class="numbered">
      <li>Nos contás el proyecto y dónde está: obra nueva, ampliación, reforma o una estructura puntual.</li>
      <li>Te presentamos a un ingeniero con experiencia en ese tipo de obra.</li>
      <li>El ingeniero revisa lo que tenés, te dice qué le falta y te propone su alcance y sus honorarios.</li>
      <li>Coordina con el arquitecto y, si es una reforma, visita lo existente.</li>
      <li>Entrega memoria y planos, y queda disponible durante la obra según lo que acuerden.</li>
    </ol>

    <h2 class="display display--sm">El contexto de Asunción y Gran Asunción</h2>
    <p>El suelo de Gran Asunción no es uniforme. Hay zonas con arcillas, otras con suelos más firmes y sectores bajos donde la napa puede estar cerca de la superficie; por eso lo que funciona en un lote no siempre sirve en el vecino. Es un motivo frecuente para pedir un estudio de suelo, y será el ingeniero quien lo indique según el caso.</p>
    <p>También es habitual dudar entre ladrillo portante y estructura de hormigón armado. Ambos se usan y cada uno tiene sus condiciones, sobre todo si después querés crecer en altura. Conviene decidirlo con el ingeniero antes de cerrar el diseño.</p>
    <p>En cuanto a la municipalidad, algunas piden planos de estructura firmados según el tipo de obra, y cada una define sus requisitos y sus tiempos. El profesional te confirma qué corresponde para tu lote; ARQ no hace trámites. Para ver cómo se arma el resto de la carpeta, leé <a class="link" href="/servicios/planos-documentacion-municipal/">planos y documentación municipal</a>.</p>

    <div class="note">
      <p><strong>Antes de sacar un muro o sumar un piso, consultá.</strong> Nadie debería demoler, abrir o ampliar una estructura sin que un ingeniero la haya mirado. Es una consulta breve que evita errores difíciles de revertir.</p>
    </div>

    <h2 class="display display--sm">Lo que hace ARQ y lo que no</h2>
    <p>ARQ te presenta al ingeniero adecuado; él define sus honorarios, calcula, firma y responde por su trabajo. Si tu caso es una casa que querés cambiar, mirá también <a class="link" href="/proyectos/reforma-ampliacion/">reforma o ampliación</a>.</p>
    <p>¿Ya tenés proyecto y estructura y querés construir? La ejecución es de otra marca: <?= obra_link('https://obra.com.py/', 'obra.com.py') ?>.</p>
  </div>

  <?= faq_html($faq) ?>
  <?= related([
      ['Anteproyecto arquitectónico', '/servicios/anteproyecto-arquitectonico/', 'El diseño sobre el que después se calcula la estructura.'],
      ['Planos y documentación municipal', '/servicios/planos-documentacion-municipal/', 'La carpeta que se presenta y se usa en obra.'],
      ['Reforma o ampliación', '/proyectos/reforma-ampliacion/', 'Cuando la estructura ya existe y hay que revisarla.'],
      ['Dirección de proyecto', '/servicios/direccion-de-proyecto/', 'Quién coordina arquitectura, estructura y obra.'],
  ]) ?>
</article>
<?= cta_band('Contanos qué querés construir o cambiar.', 'Con unos pocos datos te orientamos hacia el ingeniero que corresponde a tu obra.') ?>
<?php page_end();

<?php
declare(strict_types=1);
$crumbs = [['Inicio', '/'], ['Guías', '/guias/'], ['Cuándo se necesita cálculo estructural', '/guias/cuando-se-necesita-calculo-estructural/']];
$faq = [
    ['¿Una fisura en la pared significa que hay un problema estructural?',
     'No necesariamente. Muchas fisuras finas son del revoque o de la pintura. Las que preocupan son las que crecen, atraviesan el muro de lado a lado, aparecen en diagonal cerca de aberturas o se repiten en varios ambientes. Ante la duda, que un ingeniero las mire.'],
    ['¿Puedo hacer una pileta sin consultar a un ingeniero?',
     'Conviene consultar. Una pileta es una excavación grande, con agua y mucho peso, y afecta el suelo y las construcciones vecinas del lote. El ingeniero define cómo se apoya y se contiene.'],
    ['¿Y si es un quincho liviano, necesito cálculo?',
     'Depende de qué tan liviano sea. Una cubierta chica sobre pocas columnas puede resolverse con criterio del profesional que la proyecta; si hay luces grandes, parrilla de mampostería pesada o se apoya en la casa, pasa a ser una consulta estructural.'],
    ['¿El estudio de suelo reemplaza al cálculo?',
     'No, son pasos distintos. El estudio cuenta cómo es el terreno; el cálculo usa esa información para dimensionar las fundaciones y el resto de la estructura.'],
    ['¿Hay obras donde no hace falta consultar a un ingeniero?',
     'Sí: pintar, cambiar pisos o revestimientos, renovar una cocina sin tocar muros, sumar mobiliario fijo liviano. Si no movés muros, techos ni cargas, en general alcanza con el arquitecto o el oficio que hace el trabajo.'],
];
page_start([
    'title' => 'Cuándo se necesita cálculo estructural | ARQ',
    'description' => 'Casos límite como quitar un muro, sumar un piso, hacer una galería o una pileta, señales de alerta en tu casa y qué preguntarle al ingeniero.',
    'path' => '/guias/cuando-se-necesita-calculo-estructural/',
    'crumbs' => $crumbs,
    'faq' => $faq,
    'og_type' => 'article',
]);
?>
<article class="wrap section">
  <?= crumbs_html($crumbs) ?>
  <header class="page-head">
    <p class="eyebrow">Guías</p>
    <h1 class="display display--lg">Cuándo se necesita cálculo estructural</h1>
    <p class="lead">Se necesita cuando tu obra agrega, quita o cambia algo que sostiene peso: muros, losas, techos, fundaciones o excavaciones grandes. No se necesita para lo que es solo terminación o mobiliario. Esta guía te ayuda a ubicar tu caso en una de las dos categorías o en la zona gris del medio.</p>
    <p class="hero__cta"><?= selector_cta('Contanos tu proyecto', 'head') ?> <?= wa_cta('Tengo una duda estructural', 'head') ?></p>
  </header>

  <div class="prose">
    <h2 class="display display--sm">La pregunta útil: ¿cambia el camino de las cargas?</h2>
    <p>Todo edificio es una cadena: el techo descarga en los muros o vigas, estos en las fundaciones y las fundaciones en el suelo. Si tu obra altera algún eslabón, hay que verificar que la cadena siga completa. Si no toca ninguno, probablemente no haya nada que calcular. Qué hace el ingeniero en sí lo contamos en <a class="link" href="/servicios/calculo-estructural/">cálculo estructural</a>; acá vamos a los casos dudosos.</p>

    <h2 class="display display--sm">Casos límite que generan dudas</h2>
    <ul class="ticks">
      <li><strong>Quitar un muro.</strong> Si separa dos ambientes y no apoya nada encima, puede ser sencillo. Si tiene una losa o un techo arriba, cambia todo. Desde afuera no se sabe: hay casas donde un muro de poco espesor carga y otro más grueso no.</li>
      <li><strong>Un segundo piso.</strong> La pregunta no es si el piso nuevo se puede dibujar, sino si lo de abajo fue pensado para recibirlo. Muchas casas de planta baja se hicieron sin esa previsión.</li>
      <li><strong>Una galería.</strong> Una galería chica sobre columnas pide poco; una profunda, con voladizo o con losa encima, pide verificación.</li>
      <li><strong>Un quincho.</strong> Lo liviano puede no requerir cálculo, pero si se apoya en un muro existente, lleva losa o tiene mampostería pesada, consultá.</li>
      <li><strong>Una pileta.</strong> Mueve mucha tierra, carga mucha agua y puede quedar cerca de la casa o de la medianera.</li>
    </ul>
    <p>En casi todos estos casos, el punto de partida es la casa tal como está hoy, y por eso ayuda leer también <a class="link" href="/proyectos/reforma-ampliacion/">reforma o ampliación</a>.</p>

    <h2 class="display display--sm">Señales de alerta en una casa existente</h2>
    <p>No todo deterioro es estructural, pero ciertas señales justifican que un ingeniero la vea antes de invertir en cualquier cambio:</p>
    <ul class="ticks">
      <li>fisuras que se abren con el tiempo o que podés recorrer con la uña de un extremo a otro;</li>
      <li>grietas en diagonal que nacen en las esquinas de puertas y ventanas;</li>
      <li>puertas o ventanas que empezaron a trabarse sin motivo aparente;</li>
      <li>pisos o losas con pendiente nueva, o con el techo flecheado;</li>
      <li>humedad persistente en la base de los muros, o manchas que vuelven después de pintar;</li>
      <li>armaduras de hierro a la vista, con óxido y hormigón que se desprende.</li>
    </ul>
    <p>La humedad merece una aclaración: muchas veces es una pérdida de cañería o un problema de techo, y no afecta la estructura. Pero cuando es crónica puede ir debilitando materiales, y conviene que alguien identifique el origen antes de tapar la mancha.</p>

    <h2 class="display display--sm">Cuando no hace falta consultar</h2>
    <p>Hay mucho trabajo que no pasa por un ingeniero: pintura, pisos, revestimientos, cambio de aberturas en el mismo hueco, muebles a medida, artefactos y grifería. Si tu reforma es de ese tipo, guardá la consulta para cuando aparezca una duda real y no la compliques de más.</p>

    <h2 class="display display--sm">Qué preguntarle al ingeniero</h2>
    <ol class="numbered">
      <li>¿Qué necesitás ver en mi casa o mi terreno antes de opinar?</li>
      <li>¿Qué entregás exactamente y cuándo se ve eso en la obra?</li>
      <li>¿Hace falta un estudio de suelo en mi caso, o alcanza con tu criterio?</li>
      <li>¿Qué pasa si durante la obra aparece algo distinto a lo previsto?</li>
      <li>¿Podés coordinar con el arquitecto y con quien construye?</li>
      <li>¿Qué cosas de lo que quiero hacer no conviene hacer, y qué alternativas ves?</li>
    </ol>

    <h2 class="display display--sm">Cómo se relaciona con el estudio de suelo</h2>
    <p>El estudio de suelo describe el terreno; el cálculo lo usa para decidir cómo apoyar el edificio. Si el ingeniero duda de lo que hay bajo tu lote, lo habitual es que recomiende el estudio antes de fijar las fundaciones. Si ya tenés uno de una obra anterior en el mismo lote, mostraselo: él decide si sirve para lo nuevo. Y si todavía estás eligiendo dónde comprar, mirá <a class="link" href="/guias/antes-de-comprar-un-terreno/">antes de comprar un terreno</a>.</p>

    <h2 class="display display--sm">Lo que hace ARQ y lo que no</h2>
    <p>Te conectamos con ingenieros y arquitectos independientes según lo que necesites resolver. Ellos evalúan, calculan y firman; nosotros no. Si después querés construir, la ejecución corre por otra marca: <?= obra_link('https://obra.com.py/', 'obra.com.py') ?>.</p>
    <?= disclaimer_html() ?>

    <div class="note">
      <p>Las situaciones de esta guía son ejemplos generales. Si tenés una duda sobre tu casa, pedile a un ingeniero que la vea antes de decidir.</p>
    </div>
  </div>

  <?= faq_html($faq) ?>
  <?= related([
      ['Cálculo estructural', '/servicios/calculo-estructural/', 'Qué entrega el ingeniero y qué datos preparar.'],
      ['Reforma o ampliación', '/proyectos/reforma-ampliacion/', 'Cuando la casa ya existe y querés cambiarla.'],
      ['Qué incluye un anteproyecto', '/guias/que-incluye-un-anteproyecto/', 'El diseño sobre el que se calcula.'],
      ['Antes de comprar un terreno', '/guias/antes-de-comprar-un-terreno/', 'Qué mirar del lote antes de decidir.'],
  ]) ?>
</article>
<?= cta_band('Contanos qué querés cambiar en tu casa.', 'Con unos pocos datos te orientamos hacia el profesional que corresponde a tu caso.') ?>
<?php page_end();

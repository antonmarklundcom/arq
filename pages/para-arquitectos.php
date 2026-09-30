<?php
declare(strict_types=1);
$crumbs = [['Inicio', '/'], ['Para arquitectos', '/para-arquitectos/']];
$faq = [
    ['¿Pueden publicar mi ficha apenas me postulo?', 'No. Publicamos una ficha recién cuando la matrícula, la identidad y la obra propia están verificadas y el acuerdo escrito está firmado. Enviar el formulario abre la revisión, no la publicación.'],
    ['¿Qué pasa si trabajo con un socio o en un estudio con varios profesionales?', 'Contanos cómo está conformado el estudio y quién firma qué. La ficha identifica al estudio y a cada profesional responsable de las obras que se muestran, cada uno con su propia verificación.'],
    ['¿Puedo elegir qué tipo de consultas recibir?', 'Sí. En la postulación indicás tus servicios y tu zona real de trabajo, y esos datos se usan para decidir a quién presentarle cada consulta. La capacidad del momento también cuenta: si no podés tomar trabajos nuevos, nos lo informás.'],
    ['¿Qué obras puedo mostrar en mi ficha?', 'Obras de tu autoría, con permiso del propietario para publicarlas y con la atribución correcta: quién proyectó, quién calculó y quién dirigió. Si una obra fue un trabajo compartido, se indica así.'],
    ['¿ARQ firma, calcula o presenta algo en mi nombre?', 'No. ARQ ordena la consulta y te presenta al cliente. El diseño, el cálculo, la firma, la presentación en la municipalidad y la relación con el cliente son tuyos.'],
    ['¿Cuáles son las condiciones comerciales?', 'Se acuerdan por escrito antes de la primera derivación, una vez que la verificación terminó. Preferimos que las leas completas y con tiempo antes de decidir, en lugar de resumirlas en una página.'],
];
page_start([
    'title' => 'Para arquitectos e ingenieros: trabajá con ARQ | ARQ',
    'description' => 'Si sos arquitecto o ingeniero en Paraguay, conocé cómo funciona ARQ, qué verificamos y qué compromisos pedimos antes de publicar tu ficha.',
    'path' => '/para-arquitectos/',
    'crumbs' => $crumbs,
    'faq' => $faq,
    'jsonld' => [['@type' => 'WebPage', 'name' => 'Para arquitectos e ingenieros', 'url' => url('/para-arquitectos/'), 'inLanguage' => SITE_LOCALE]],
]);
?>
<article class="wrap section">
  <?= crumbs_html($crumbs) ?>
  <header class="page-head">
    <p class="eyebrow">Para arquitectos e ingenieros</p>
    <h1 class="display display--lg">¿Sos arquitecto? Trabajá con ARQ.</h1>
    <p class="lead">ARQ ayuda a personas con un terreno o una casa a entender qué profesional necesitan, y te las presenta con el proyecto ya explicado. Esta página cuenta cómo está pensado el sistema, a quién buscamos y qué pedimos a cambio.</p>
    <p class="hero__cta"><?= wa_cta('Consultanos por WhatsApp', 'head') ?></p>
  </header>

  <div class="prose">
    <p class="note"><strong>Estamos incorporando estudios.</strong> Los perfiles se publican con matrícula verificada.</p>

    <h2 class="display display--sm">Qué recibís como profesional</h2>
    <p>Cuando alguien completa su consulta en ARQ, ya pasó por un filtro de preguntas. Por eso la derivación que te llega no es un mensaje suelto. Así está diseñado el sistema:</p>
    <ul class="ticks">
      <li><strong>Consultas con contexto.</strong> Cada una llega con el tipo de proyecto, el estado del terreno y la ubicación ya registrados.</li>
      <li><strong>Calificación previa opcional.</strong> Cuando el caso lo amerita, profundizamos antes de presentarte: etapa, alcance aproximado, fotos o planos existentes, siempre con consentimiento de la persona.</li>
      <li><strong>Una ficha editorial.</strong> Se arma con datos verificados y obra real, no con frases de presentación. Cuenta qué hacés, cómo trabajás y en qué zona.</li>
      <li><strong>Atribución clara.</strong> Cada consulta y cada obra quedan asociadas a quien corresponde.</li>
      <li><strong>Seguimiento del estado.</strong> Cada consulta se registra con su estado, de modo que nadie tenga que adivinar qué pasó con ella.</li>
    </ul>
    <p>No te prometemos cantidades. ARQ no vende volumen: presenta cada proyecto al profesional que tiene sentido para él, según disciplina, zona, tipo de obra y capacidad del momento.</p>

    <h2 class="display display--sm">A quién buscamos</h2>
    <p>Arquitectos e ingenieros independientes, o estudios establecidos, que trabajen en Paraguay. Para empezar la revisión necesitamos:</p>
    <ul class="ticks">
      <li>Identidad verificable, tuya y del estudio si lo hay.</li>
      <li>Matrícula o registro profesional, donde corresponda a tu disciplina.</li>
      <li>Obra propia que tengas permiso para publicar.</li>
      <li>Servicios definidos: anteproyecto, documentación, cálculo, dirección u otros.</li>
      <li>Una zona real de trabajo. Hoy partimos de Asunción y Gran Asunción; si trabajás en otro lado, contanos igual.</li>
    </ul>

    <h2 class="display display--sm">Cómo verificamos</h2>
    <p>Antes de publicar cualquier ficha revisamos nombre legal y público, datos de contacto, servicios, zona, autoría de las obras y permiso para mostrarlas. Cuando corresponde, verificamos la matrícula con los registros del colegio o de la entidad profesional respectiva. Una obra que no podamos atribuir con certeza no se publica.</p>
    <p>La verificación es un paso de ARQ. No implica aval ni vínculo de ninguna entidad profesional con el sitio.</p>

    <h2 class="display display--sm">Qué pedimos a los profesionales</h2>
    <p>La calidad de las consultas solo se sostiene si la respuesta también es buena. Por eso el acuerdo escrito incluye:</p>
    <ul class="ticks">
      <li>Un tiempo de respuesta acordado con vos, que sea realista para tu forma de trabajar.</li>
      <li>Veracidad en todo lo que figura en tu ficha.</li>
      <li>Atribución correcta de las obras, incluidos colaboradores y otros profesionales.</li>
      <li>Manejo cuidadoso de los datos del cliente, solo para la consulta que te presentamos.</li>
      <li>Informar el estado de cada consulta: tomada, en conversación, cerrada o rechazada.</li>
      <li>Aceptar o rechazar cada consulta dentro del plazo acordado, para no dejar a nadie esperando.</li>
    </ul>

    <h2 class="display display--sm">Cómo es el proceso</h2>
    <ol class="numbered">
      <li><strong>Postulación.</strong> Completás el formulario de más abajo con los datos de tu estudio y tu práctica.</li>
      <li><strong>Revisión.</strong> Leemos tu postulación y, si hace falta, te pedimos más información.</li>
      <li><strong>Verificación.</strong> Comprobamos identidad, matrícula o registro, obra y permisos de publicación.</li>
      <li><strong>Acuerdo escrito.</strong> Firmamos criterios de respuesta, atribución y manejo de datos, junto con las condiciones comerciales.</li>
      <li><strong>Publicación de la ficha.</strong> Se arma con vos, vos la aprobás y recién entonces sale.</li>
    </ol>

    <h2 class="display display--sm">Lo que ARQ no hace</h2>
    <ul class="ticks">
      <li>No publica perfiles sin verificar, ni siquiera de forma provisoria.</li>
      <li>No vende exclusividad ni volumen de consultas.</li>
      <li>No permite que el pago asegure la selección: postularse y acordar condiciones no implica ser elegido para una consulta.</li>
      <li>No diseña, calcula, firma ni tramita por el profesional. Tampoco construye; para eso existe <?= obra_link('https://obra.com.py/', 'obra.com.py') ?>.</li>
    </ul>
    <p>Las condiciones comerciales se acuerdan por escrito antes de la primera derivación. No figuran en esta página porque no queremos que decidas sin haberlas leído completas.</p>
    <p>Si querés entender primero cómo vive el proceso la persona que consulta, leé <a href="/como-funciona/">cómo funciona ARQ</a>. Los perfiles verificados se publican en <a href="/arquitectos/">arquitectos</a>, y los <a href="/servicios/">servicios</a> explican qué etapa resuelve cada profesional. Las reglas generales del sitio están en los <a href="/terminos/">términos</a>.</p>
  </div>

  <?= faq_html($faq) ?>
  <?= related([
      ['Cómo funciona ARQ', '/como-funciona/', 'El recorrido de una consulta, desde el lado de quien la hace.'],
      ['Arquitectos', '/arquitectos/', 'Los perfiles verificados que ya están publicados.'],
      ['Servicios', '/servicios/', 'Las cuatro etapas para las que presentamos profesionales.'],
      ['Términos', '/terminos/', 'Independencia profesional y alcance de la intermediación.'],
  ]) ?>

  <section class="formbox" id="postular" aria-labelledby="postular-h">
    <h2 id="postular-h" class="display display--sm">Postulá tu estudio o tu práctica</h2>
    <p>Completá los datos básicos. Te escribimos para pedirte la documentación cuando empecemos la revisión.</p>
    <?php lead_form('postulate', ['cta' => 'Enviar postulación']); ?>
  </section>
</article>
<?php page_end();

<?php
declare(strict_types=1);
$crumbs = [['Inicio', '/'], ['Términos', '/terminos/']];
page_start([
    'title' => 'Términos de uso y aviso de intermediación | ARQ',
    'description' => 'Qué es ARQ y qué no: somos un servicio de orientación y conexión con profesionales independientes. Leé los términos de uso de arq.com.py.',
    'path' => '/terminos/',
    'crumbs' => $crumbs,
    'jsonld' => [['@type' => 'WebPage', 'name' => 'Términos de uso', 'url' => url('/terminos/'), 'inLanguage' => SITE_LOCALE]],
]);
?>
<section class="wrap section narrow prose">
  <?= crumbs_html($crumbs) ?>
  <h1 class="display display--lg">Términos de uso</h1>
  <p class="small">Texto base, pendiente de revisión legal. Última actualización: septiembre de 2026.</p>
  <p>Estos términos explican qué es arq.com.py, qué podés esperar de él y qué queda fuera de nuestro alcance. Leelos antes de contarnos tu proyecto: lo más importante es que ARQ te conecta con profesionales independientes y no ejecuta ningún trabajo de arquitectura ni de ingeniería.</p>

  <h2 class="display display--sm">1. Quién opera el sitio</h2>
  <p>Los datos del operador (razón social y RUC) se publicarán en esta sección. Hasta entonces, cualquier consulta sobre el sitio podés hacerla por WhatsApp, con el botón que aparece al final de esta página.</p>

  <h2 class="display display--sm">2. Qué es ARQ</h2>
  <p>ARQ es un servicio de orientación y conexión. Te ayudamos a entender qué tipo de ayuda profesional necesita tu proyecto, ordenamos los datos que nos contás y te presentamos a un arquitecto o ingeniero independiente que encaje con el trabajo y con la zona.</p>
  <p>ARQ no es un estudio de arquitectura ni una empresa constructora. No proyectamos, no calculamos, no firmamos planos, no presentamos trámites ante municipalidades y no dirigimos ni ejecutamos obras. Todo eso lo hace el profesional que elijas.</p>

  <h2 class="display display--sm">3. Aviso de intermediación</h2>
  <p>Los profesionales que te presentemos son independientes: no son empleados ni representantes de ARQ. Cuando aceptás trabajar con uno de ellos, el acuerdo es entre vos y esa persona o ese estudio.</p>
  <ul class="ticks">
    <li>El alcance del trabajo, los honorarios y los plazos se acuerdan directamente con el profesional.</li>
    <li>La firma de los planos y la responsabilidad profesional son del profesional.</li>
    <li>ARQ no es parte de ese contrato ni responde por su cumplimiento.</li>
  </ul>
  <p>Te recomendamos dejar por escrito lo que acuerden antes de empezar.</p>

  <h2 class="display display--sm">4. Sin garantías sobre el resultado</h2>
  <p>Conectar no es prometer. ARQ no asegura que un profesional acepte tu consulta, ni que un proyecto se concrete. Tampoco prometemos resultados, plazos, costos, aprobaciones municipales ni la calidad de una obra.</p>
  <p>Los plazos y las aprobaciones dependen de cada municipalidad, de las características del proyecto y de la disponibilidad del profesional. Si tu consulta no encuentra un profesional adecuado, te lo vamos a decir.</p>

  <h2 class="display display--sm">5. Verificación de profesionales</h2>
  <p>Antes de publicar un perfil revisamos, según corresponda a cada disciplina:</p>
  <ul class="ticks">
    <li>la identidad de la persona y el nombre del estudio;</li>
    <li>la matrícula o el registro profesional, donde corresponda;</li>
    <li>que las obras publicadas sean de su autoría y que tenga permiso para mostrarlas;</li>
    <li>los servicios que ofrece y la zona en la que trabaja.</li>
  </ul>
  <p>Esta verificación es un control previo a la publicación. No es una certificación de cada trabajo que el profesional realice ni un seguro sobre su desempeño. Te conviene pedirle lo que necesites para sentirte tranquilo: referencias, ejemplos de planos, una propuesta por escrito.</p>

  <h2 class="display display--sm">6. Información del sitio</h2>
  <p>Las guías, explicaciones y textos de arq.com.py son orientativos. Sirven para que llegues a la conversación con el profesional sabiendo qué preguntar, pero no reemplazan su consejo sobre tu terreno y tu proyecto.</p>
  <p>Los requisitos municipales cambian y son distintos en cada municipalidad. Antes de decidir algo, confirmá la información vigente con la municipalidad que corresponda y con el profesional, y fijate en la fecha de cada dato.</p>

  <h2 class="display display--sm">7. Imágenes conceptuales</h2>
  <p>Algunas imágenes del sitio son imágenes conceptuales de marca: ilustran una idea de arquitectura para Paraguay, no son obras de ARQ ni de ningún cliente, y las identificamos como tales donde puede haber confusión.</p>
  <p>Las imágenes de portfolio real pertenecen a sus autores y se publican con su permiso, con el crédito del estudio que corresponde.</p>

  <h2 class="display display--sm">8. Uso de WhatsApp y formularios</h2>
  <p>Cuando nos escribís por WhatsApp o completás un formulario, aceptás que usemos esos datos para responderte y para derivar tu consulta al profesional que pueda atenderla. No pidas ni envíes por estos canales documentos que no hagan falta para una primera conversación.</p>
  <p>En la <a href="/privacidad/">política de privacidad</a> explicamos qué datos recibimos, para qué los usamos y cómo pedir su eliminación.</p>

  <h2 class="display display--sm">9. Propiedad intelectual</h2>
  <p>Los textos, el diseño y la estructura de arq.com.py pertenecen al operador del sitio. Podés leerlos y compartir el enlace, pero no copiarlos para presentarlos como propios.</p>
  <p>Los planos, fotos y obras de terceros pertenecen a sus autores. Mostrarlos en el sitio no te da derecho a reutilizarlos.</p>

  <h2 class="display display--sm">10. Cambios a estos términos</h2>
  <p>Podemos actualizar estos términos cuando cambie el servicio o cuando la revisión legal lo aconseje. La fecha de arriba indica la última versión. Si seguís usando el sitio después de un cambio, entendemos que aceptás la versión vigente.</p>

  <h2 class="display display--sm">11. Contacto</h2>
  <p>Si tenés dudas sobre estos términos o sobre cómo funciona ARQ, escribinos.</p>
  <p class="hero__cta"><?= wa_cta('Consultar por WhatsApp') ?></p>

  <h2 class="display display--sm">Documentos relacionados</h2>
  <p>Leé también la <a href="/privacidad/">política de privacidad</a> y <a href="/como-funciona/">cómo funciona ARQ</a>, donde explicamos paso a paso cómo te conectamos con un profesional.</p>
</section>
<?php page_end();

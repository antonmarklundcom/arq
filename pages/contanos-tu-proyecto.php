<?php
declare(strict_types=1);
$crumbs = [['Inicio', '/'], ['Contanos tu proyecto', '/contanos-tu-proyecto/']];
page_start([
    'title' => 'Contanos tu proyecto de arquitectura | ARQ',
    'description' => 'Tres preguntas sobre tu proyecto, tu terreno y la zona. Seguís por WhatsApp con la consulta ya escrita y te conectamos con el profesional adecuado.',
    'path' => '/contanos-tu-proyecto/', 'body' => 'is-selector',
    'crumbs' => $crumbs,
    'jsonld' => [['@type' => 'ContactPage', 'name' => 'Contanos tu proyecto', 'url' => url('/contanos-tu-proyecto/'), 'inLanguage' => SITE_LOCALE]],
]);
?>
<section class="wrap section selector-page">
  <?= crumbs_html($crumbs) ?>
  <div class="selector-grid">
    <div class="formbox formbox--selector">
      <p class="eyebrow">Selector de proyecto</p>
      <h1 class="display display--lg">¿Qué querés construir?</h1>
      <p class="lead">Contanos en treinta segundos y te conectamos con el profesional adecuado.</p>
      <?php lead_form('proyecto', ['cta' => 'Seguir en WhatsApp']); ?>
    </div>
    <aside class="selector-aside" aria-labelledby="after-h">
      <h2 id="after-h" class="display display--sm">Qué pasa después</h2>
      <ol class="numbered">
        <li><strong>Se abre WhatsApp</strong>Con tu respuesta ya redactada. La mandás tal cual o le agregás lo que quieras.</li>
        <li><strong>Te hacemos dos o tres preguntas más</strong>Etapa del proyecto, tamaño aproximado, cuándo te gustaría empezar. Si tenés fotos o planos, los podés sumar ahí.</li>
        <li><strong>Buscamos a quién presentarte</strong>Un arquitecto o ingeniero independiente con experiencia en ese tipo de trabajo, que trabaje en tu zona y tenga lugar para tomarlo.</li>
        <li><strong>Te presentamos</strong>Si el profesional acepta, los ponemos en contacto. Lo que acuerden, desde el alcance hasta los honorarios, es entre ustedes.</li>
      </ol>
      <p class="small">¿Preferís escribir sin elegir opciones? <a href="<?= e(wa_page()) ?>" rel="noopener" data-ev="whatsapp_handoff" data-ev-loc="aside">Abrí WhatsApp directamente</a>.</p>
      <?= disclaimer_html() ?>
    </aside>
  </div>
</section>
<?php page_end();

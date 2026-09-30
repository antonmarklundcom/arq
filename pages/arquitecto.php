<?php
declare(strict_types=1);

$a = architect((string)($_GET['slug'] ?? '')) ?? not_found();
$ws = works_of($a['slug']);
$crumbs = [['Inicio', '/'], ['Arquitectos', '/arquitectos/'], [$a['name'], '/arquitectos/' . $a['slug'] . '/']];
$isPerson = $a['type'] === 'Arquitecto';
$node = [
    '@type' => $isPerson ? 'Person' : 'Organization', 'name' => $a['name'], 'url' => url('/arquitectos/' . $a['slug'] . '/'),
    'description' => $a['summary'], 'address' => ['@type' => 'PostalAddress', 'addressLocality' => $a['city'], 'addressCountry' => 'PY'],
];
if ($a['people']) {
    $node['member'] = array_map(fn($p) => ['@type' => 'Person', 'name' => $p], $a['people']);
}
$title = mb_substr($a['name'], 0, 40) . ' | Arquitectos | ARQ';
$title = mb_strlen($title) > 60 ? mb_substr($a['name'], 0, 50) . ' | ARQ' : $title;
$desc = $a['summary'] . ' Ficha con datos verificables, fuentes y obras vinculadas en ARQ.';
if (mb_strlen($desc) > 155) { $desc = mb_substr($desc, 0, 152) . '...'; }
if (mb_strlen($desc) < 120) { $desc .= ' Conocé su trabajo y las fuentes de cada dato en arq.com.py.'; $desc = mb_substr($desc, 0, 155); }

page_start(['title' => $title, 'description' => $desc, 'path' => '/arquitectos/' . $a['slug'] . '/', 'wa' => wa_template('profile', ['name' => $a['name']]), 'crumbs' => $crumbs, 'jsonld' => [$node], 'og_type' => 'profile', 'noindex' => !empty($a['example'])]);
?>
<article class="wrap section profile">
  <?= crumbs_html($crumbs) ?>
  <p class="eyebrow"><?= e($a['type']) ?> · <?= e($a['city']) ?></p>
  <div class="profile__head">
    <span class="folio folio--xl" aria-hidden="true"><?= e(initials($a['name'])) ?></span>
    <h1 class="display display--lg"><?= e($a['name']) ?> <?= example_badge($a) ?></h1>
  </div>
  <?php if ($a['people']): ?><p class="lead"><?= e(implode(' · ', $a['people'])) ?></p><?php endif; ?>
  <div class="prose"><?php foreach ($a['bio'] as $p): ?><p><?= e($p) ?></p><?php endforeach; ?></div>
  <?php if ($a['quote']): ?><blockquote class="quote"><?= e($a['quote']) ?></blockquote><?php endif; ?>
  <?php if ($a['facts']): ?>
    <dl class="facts"><?php foreach ($a['facts'] as [$y, $t]): ?><dt><?= e($y) ?></dt><dd><?= e($t) ?></dd><?php endforeach; ?></dl>
  <?php endif; ?>
  <?php if ($a['sources']): ?><p class="small">Fuentes: <?= e(implode('; ', $a['sources'])) ?></p><?php endif; ?>

  <?php if ($ws): ?>
  <h2 class="display display--sm">Obras</h2>
  <div class="grid"><?php foreach ($ws as $w) { echo work_card($w); } ?></div>
  <?php endif; ?>

  <section class="formbox" aria-labelledby="inq">
  <?php if (!empty($a['partner'])): ?>
    <h2 id="inq" class="display display--sm">Contactá a <?= e($a['name']) ?></h2>
    <?php lead_form('arquitecto', ['architect' => $a['slug'], 'cta' => 'Enviar consulta']); ?>
  <?php elseif (!empty($a['example'])): ?>
    <h2 id="inq" class="display display--sm">Perfil de muestra</h2>
    <p class="small">Así se verá la ficha de un estudio verificado. No es un estudio real y no recibe consultas.</p>
  <?php else: ?>
    <h2 id="inq" class="display display--sm">Ficha editorial</h2>
    <p><?= e($a['name']) ?> no es un estudio asociado a ARQ: esta ficha reúne información pública con su fuente. ARQ no deriva consultas a estudios que no forman parte de su red.</p>
    <p>Si buscás un profesional para tu proyecto, <a class="link" href="/contanos-tu-proyecto/">contanos qué querés hacer</a>.</p>
  <?php endif; ?>
  </section>
</article>
<?php page_end();

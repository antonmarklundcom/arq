<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/lib.php';

$realA = count(array_filter(architects(), fn($a) => empty($a['example'])));
$realW = count(array_filter(works(), fn($w) => empty($w['example'])));

page_start([
    'title' => 'MONOGRAFÍA | Arquitectura del Paraguay, obras y estudios',
    'description' => 'Directorio de la arquitectura paraguaya: explorá obras de ladrillo y encontrá el estudio indicado para tu proyecto. Postulá tu estudio.',
    'path' => '/', 'body' => 'home',
]);
?>
<section class="hero">
  <div class="hero__bg brick brick--dark" aria-hidden="true"></div>
  <div class="wrap hero__in">
    <p class="eyebrow">Arquitectura del Paraguay — Selección 2026</p>
    <h1 class="display display--xl"><span>La arquitectura</span> <span>que el mundo mira.</span></h1>
    <p class="lead">Obras y estudios de un país que hizo del ladrillo una lengua propia.</p>
    <p class="hero__cta">
      <a class="btn btn--clay" href="/obras">Explorar obras</a>
      <a class="btn btn--ghost" href="/arquitectos">Encontrá tu arquitecto</a>
    </p>
  </div>
  <div class="hero__foot wrap">
    <span><?= $realA ?> <?= $realA === 1 ? 'estudio verificado' : 'estudios verificados' ?> · <?= $realW ?> <?= $realW === 1 ? 'obra verificada' : 'obras verificadas' ?></span>
    <span>Catálogo en construcción</span>
  </div>
</section>

<section class="wrap section" aria-labelledby="h-obras">
  <p class="eyebrow">Selección 2026</p>
  <h2 id="h-obras" class="display display--md">Obras</h2>
  <div class="grid"><?php foreach (works() as $w) { echo work_card($w); } ?></div>
  <p><a class="link" href="/obras">Ver todas las obras</a></p>
</section>

<section class="band band--paper2" aria-labelledby="h-how">
  <div class="wrap">
    <p class="eyebrow">Cómo funciona</p>
    <h2 id="h-how" class="display display--md">Del ladrillo al estudio</h2>
    <ol class="steps">
      <li><span class="num">01</span><h3>Explorá</h3><p>Recorré las obras y mirá quién está detrás de cada una.</p></li>
      <li><span class="num">02</span><h3>Encontrá</h3><p>Cada obra enlaza a sus arquitectos, y cada perfil a sus obras.</p></li>
      <li><span class="num">03</span><h3>Contactá</h3><p>Escribile directo al estudio o contanos qué querés construir.</p></li>
    </ol>
  </div>
</section>

<section class="wrap section" aria-labelledby="h-arq">
  <p class="eyebrow">Estudios</p>
  <h2 id="h-arq" class="display display--md">Arquitectos</h2>
  <div class="grid"><?php foreach (architects() as $a) { echo architect_card($a); } ?></div>
</section>

<section class="band band--ink" aria-labelledby="h-post">
  <div class="wrap">
    <p class="eyebrow">Para estudios</p>
    <h2 id="h-post" class="display display--md">Un lugar entre los mejores.</h2>
    <p class="lead">Si tu estudio construye en Paraguay, postulalo para integrar el directorio.</p>
    <a class="btn btn--clay" href="/postulate">Postulá tu estudio</a>
  </div>
</section>
<?php page_end();

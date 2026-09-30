<?php
declare(strict_types=1);
http_response_code(404);
page_start([
    'title' => 'Página no encontrada | ARQ',
    'description' => 'La página que buscás no existe o cambió de lugar. Volvé al inicio o contanos tu proyecto y te conectamos con el profesional adecuado.',
    'path' => '/404', 'noindex' => true,
]);
?>
<section class="wrap section narrow">
  <p class="eyebrow">Error 404</p>
  <h1 class="display display--lg">No encontramos esta página.</h1>
  <p class="lead">Puede que el enlace haya cambiado.</p>
  <p><a class="btn btn--clay" href="/">Volver al inicio</a> <a class="btn btn--ghost-ink" href="/contanos-tu-proyecto/">Contanos tu proyecto</a></p>
</section>
<?php page_end();

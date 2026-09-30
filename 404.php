<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/lib.php';
http_response_code(404);
page_start([
    'title' => 'Página no encontrada | MONOGRAFÍA',
    'description' => 'La página que buscás no existe o cambió de lugar. Volvé al inicio o explorá las obras y los arquitectos del directorio MONOGRAFÍA.',
    'path' => '/404', 'noindex' => true,
]);
?>
<section class="wrap section narrow">
  <p class="eyebrow">Error 404</p>
  <h1 class="display display--lg">No encontramos esta página.</h1>
  <p class="lead">Puede que el enlace haya cambiado.</p>
  <p><a class="btn btn--clay" href="/">Volver al inicio</a> <a class="btn btn--ghost-ink" href="/obras">Explorar obras</a></p>
</section>
<?php page_end();

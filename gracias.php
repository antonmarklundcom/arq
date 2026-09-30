<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/lib.php';
page_start([
    'title' => 'Gracias por escribirnos | MONOGRAFÍA',
    'description' => 'Recibimos tu mensaje en arq.com.py. Te vamos a responder por teléfono o WhatsApp lo antes posible. Gracias por contactarnos.',
    'path' => '/gracias', 'noindex' => true,
]);
?>
<section class="wrap section narrow">
  <p class="eyebrow">Recibido</p>
  <h1 class="display display--lg">Gracias.</h1>
  <p class="lead">Recibimos tu mensaje y te respondemos pronto.</p>
  <p><a class="btn btn--ink" href="/obras">Seguir explorando obras</a></p>
</section>
<?php page_end();

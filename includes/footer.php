<section class="band band--ink" aria-labelledby="cta-h">
  <div class="wrap">
    <p class="eyebrow">Contanos</p>
    <h2 id="cta-h" class="display display--md">¿Qué querés construir?</h2>
    <p class="lead">Te ayudamos a encontrar el estudio indicado para tu proyecto.</p>
    <a class="btn btn--clay" href="/contacto">Escribinos</a>
  </div>
</section>
<footer class="site-footer">
  <div class="wrap footer-grid">
    <div>
      <p class="brand"><?= e(SITE_SHORT) ?></p>
      <p><?= e(SITE_TAGLINE) ?></p>
    </div>
    <nav aria-label="Pie de página">
      <a href="/obras">Obras</a>
      <a href="/arquitectos">Arquitectos</a>
      <a href="/postulate">Postulá tu estudio</a>
      <a href="/contacto">Contacto</a>
      <a href="/nosotros">Nosotros</a>
      <a href="/privacidad">Privacidad</a>
    </nav>
    <div>
      <?php if (CONTACT_EMAIL): ?><p><a href="mailto:<?= e(CONTACT_EMAIL) ?>"><?= e(CONTACT_EMAIL) ?></a></p><?php endif; ?>
      <p><a href="<?= e(wa_page()) ?>" rel="noopener">WhatsApp</a></p>
      <p class="small">© <?= date('Y') ?> arq.com.py</p>
    </div>
  </div>
</footer>

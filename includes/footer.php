<footer class="site-footer">
  <div class="wrap footer-grid">
    <div>
      <p class="brand"><?= e(SITE_SHORT) ?></p>
      <p><?= e(SITE_TAGLINE) ?></p>
      <p class="small">Cobertura inicial: <?= e(SITE_COVERAGE) ?>.</p>
    </div>
    <nav aria-label="Pie de página">
      <a href="/contanos-tu-proyecto/">Contanos tu proyecto</a>
      <a href="/como-funciona/">Cómo funciona</a>
      <a href="/servicios/">Servicios</a>
      <a href="/proyectos/">Proyectos</a>
      <a href="/arquitectos/">Arquitectos</a>
      <a href="/obras/">Obras</a>
    </nav>
    <div>
      <p><a href="<?= e(wa_page()) ?>" rel="noopener" data-ev="whatsapp_handoff" data-ev-loc="footer">WhatsApp <?= e(wa_display()) ?></a></p>
      <?php if (CONTACT_EMAIL): ?><p><a href="mailto:<?= e(CONTACT_EMAIL) ?>"><?= e(CONTACT_EMAIL) ?></a></p><?php endif; ?>
      <p><a href="/para-arquitectos/" data-ev="partner_cta_click" data-ev-loc="footer">¿Sos arquitecto? Trabajá con ARQ</a></p>
      <p><a href="/privacidad/">Privacidad</a></p>
    </div>
  </div>
  <div class="wrap">
    <p class="small footer-note">ARQ no es un estudio de arquitectura ni una empresa constructora. Conecta proyectos con profesionales independientes, que diseñan, calculan, firman y responden por su trabajo. © <?= date('Y') ?> arq.com.py</p>
  </div>
</footer>

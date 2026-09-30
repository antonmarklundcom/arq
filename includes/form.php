<?php
declare(strict_types=1);

/**
 * Formulario de leads. Funciona sin JS (POST a /enviar.php).
 * $source: contacto | arquitecto | postulate
 */
function lead_form(string $source, array $opts = [], array $old = [], array $errors = []): void
{
    $v = fn(string $k): string => e($old[$k] ?? '');
    $err = fn(string $k): string => isset($errors[$k])
        ? '<span class="field__err" id="err-' . $k . '" role="alert">' . e($errors[$k]) . '</span>' : '';
    $inv = fn(string $k): string => isset($errors[$k]) ? ' aria-invalid="true" aria-describedby="err-' . $k . '"' : '';
    $architectSlug = $opts['architect'] ?? ($old['architect'] ?? '');
    $isPost = $source === 'postulate';
    $steps = $source === 'contacto';
    ?>
<form class="form<?= $steps ? ' form--steps' : '' ?>" method="post" action="/enviar.php" novalidate data-form="<?= e($source) ?>">
  <input type="hidden" name="source" value="<?= e($source) ?>">
  <input type="hidden" name="architect" value="<?= e($architectSlug) ?>">
  <input type="hidden" name="t" value="<?= time() ?>">
  <div class="hp" aria-hidden="true"><label>No completar <input name="website" tabindex="-1" autocomplete="off"></label></div>
  <?php if (!empty($errors['_'])): ?><p class="form__alert" role="alert"><?= e($errors['_']) ?></p><?php endif; ?>

<?php if ($source === 'contacto'): ?>
  <fieldset class="step" data-step="1">
    <legend>1. ¿Qué querés construir?</legend>
    <div class="choices">
      <?php foreach (['Casa', 'Comercial', 'Reforma', 'Otro'] as $t): ?>
        <label class="choice"><input type="radio" name="tipo" value="<?= e($t) ?>"<?= ($old['tipo'] ?? '') === $t ? ' checked' : '' ?>><span><?= e($t) ?></span></label>
      <?php endforeach; ?>
    </div>
  </fieldset>
  <fieldset class="step" data-step="2">
    <legend>2. Ciudad y descripción</legend>
    <div class="field"><label for="f-city">Ciudad</label><input id="f-city" name="ciudad" value="<?= $v('ciudad') ?>" autocomplete="address-level2"></div>
    <div class="field"><label for="f-budget">Presupuesto estimado (opcional)</label><input id="f-budget" name="presupuesto" value="<?= $v('presupuesto') ?>" placeholder="Ej.: USD 80.000 o Gs. 600.000.000"></div>
    <div class="field"><label for="f-msg">Contanos tu proyecto</label><textarea id="f-msg" name="mensaje" rows="5"><?= $v('mensaje') ?></textarea></div>
  </fieldset>
  <fieldset class="step" data-step="3">
    <legend>3. ¿Cómo te contactamos?</legend>
<?php elseif ($isPost): ?>
  <fieldset class="step">
    <legend class="sr-only">Datos del estudio</legend>
    <div class="field"><label for="f-studio">Nombre del estudio</label><input id="f-studio" name="estudio" required value="<?= $v('estudio') ?>"<?= $inv('estudio') ?>><?= $err('estudio') ?></div>
    <div class="field"><label for="f-city">Ciudad</label><input id="f-city" name="ciudad" value="<?= $v('ciudad') ?>" autocomplete="address-level2"></div>
    <div class="field"><label for="f-url">Portafolio (enlace)</label><input id="f-url" type="url" name="portafolio" value="<?= $v('portafolio') ?>" placeholder="https://"<?= $inv('portafolio') ?>><?= $err('portafolio') ?></div>
<?php else: ?>
  <fieldset class="step">
    <legend class="sr-only">Tu consulta</legend>
    <div class="field"><label for="f-msg">¿Qué querés consultar?</label><textarea id="f-msg" name="mensaje" rows="4" required<?= $inv('mensaje') ?>><?= $v('mensaje') ?></textarea><?= $err('mensaje') ?></div>
<?php endif; ?>
    <div class="field"><label for="f-name">Nombre</label><input id="f-name" name="nombre" required autocomplete="name" value="<?= $v('nombre') ?>"<?= $inv('nombre') ?>><?= $err('nombre') ?></div>
    <div class="field"><label for="f-phone">Teléfono o WhatsApp</label><input id="f-phone" type="tel" name="telefono" required autocomplete="tel" placeholder="0981 123 456" value="<?= $v('telefono') ?>"<?= $inv('telefono') ?>><?= $err('telefono') ?></div>
    <div class="field"><label for="f-email">Email (opcional)</label><input id="f-email" type="email" name="email" autocomplete="email" value="<?= $v('email') ?>"<?= $inv('email') ?>><?= $err('email') ?></div>
  </fieldset>
  <p class="small">Al enviar aceptás nuestra <a href="/privacidad">política de privacidad</a>.</p>
  <div class="form__actions">
    <button type="button" class="btn btn--ghost" data-prev hidden>Volver</button>
    <button type="button" class="btn btn--clay" data-next hidden>Siguiente</button>
    <button type="submit" class="btn btn--clay" data-submit><?= e($opts['cta'] ?? 'Enviar') ?></button>
  </div>
</form>
<?php
}

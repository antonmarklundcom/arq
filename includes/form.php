<?php
declare(strict_types=1);

/** Opciones del selector de proyecto (brief §7). Claves = includes/data/whatsapp.json → selector. */
function selector_options(): array
{
    return [
        'tipo' => [
            'casa-nueva' => 'Casa nueva',
            'reforma-ampliacion' => 'Reforma o ampliación',
            'local-comercial' => 'Local o espacio comercial',
            'planos-documentacion' => 'Planos y documentación',
            'calculo-estructural' => 'Cálculo estructural',
            'otro' => 'Otro',
        ],
        'terreno' => [
            'si' => 'Sí',
            'todavia-no' => 'Todavía no',
            'por-comprar' => 'Estoy por comprar',
            'no-aplica' => 'No aplica',
        ],
        'zona' => [
            'asuncion' => 'Asunción',
            'gran-asuncion' => 'Gran Asunción',
            'interior' => 'Interior del país',
        ],
    ];
}

/** Mensaje de WhatsApp armado con las respuestas del selector (textos en whatsapp.json). */
function selector_message(array $d): string
{
    $s = wa_map()['selector'];
    $parts = [$s['intro'], $s['tipo'][$d['tipo']] ?? $s['tipo']['otro']];
    if (isset($s['terreno'][$d['terreno'] ?? ''])) { $parts[] = $s['terreno'][$d['terreno']]; }
    if (isset($s['zona'][$d['zona'] ?? ''])) { $parts[] = $s['zona'][$d['zona']]; }
    $parts[] = $s['cierre'];
    if (($d['mensaje'] ?? '') !== '') { $parts[] = $s['detalle'] . ' ' . $d['mensaje']; }
    return implode(' ', $parts);
}

/**
 * Formularios. Funcionan sin JS (POST a /enviar.php).
 * $source: proyecto (selector → WhatsApp) | arquitecto (ficha de estudio asociado) | postulate (profesionales)
 */
function lead_form(string $source, array $opts = [], array $old = [], array $errors = []): void
{
    $v = fn(string $k): string => e($old[$k] ?? '');
    $err = fn(string $k): string => isset($errors[$k])
        ? '<span class="field__err" id="err-' . $k . '" role="alert">' . e($errors[$k]) . '</span>' : '';
    $inv = fn(string $k): string => isset($errors[$k]) ? ' aria-invalid="true" aria-describedby="err-' . $k . '"' : '';
    $architectSlug = $opts['architect'] ?? ($old['architect'] ?? '');
    $steps = $source === 'proyecto';
    $ev = ['proyecto' => 'selector', 'postulate' => 'partner_application', 'arquitecto' => 'profile_lead'][$source] ?? $source;
    ?>
<form class="form<?= $steps ? ' form--steps' : '' ?>" method="post" action="/enviar.php" novalidate data-form="<?= e($source) ?>" data-ev="<?= e($ev) ?>">
  <input type="hidden" name="source" value="<?= e($source) ?>">
  <input type="hidden" name="architect" value="<?= e($architectSlug) ?>">
  <input type="hidden" name="t" value="<?= time() ?>">
  <div class="hp" aria-hidden="true"><label>No completar <input name="website" tabindex="-1" autocomplete="off"></label></div>
  <?php if (!empty($errors['_'])): ?><p class="form__alert" role="alert"><?= e($errors['_']) ?></p><?php endif; ?>

<?php if ($source === 'proyecto'):
    $o = selector_options();
    $legends = ['tipo' => '1. ¿Qué querés construir?', 'terreno' => '2. ¿Tenés terreno?', 'zona' => '3. ¿Dónde?'];
    foreach ($legends as $k => $legend): ?>
  <fieldset class="step" data-step="<?= e($k) ?>"<?= $inv($k) ? ' aria-describedby="err-' . $k . '"' : '' ?>>
    <legend><?= e($legend) ?></legend>
    <?= $err($k) ?>
    <div class="choices<?= $k === 'tipo' ? ' choices--3' : '' ?>">
      <?php foreach ($o[$k] as $val => $label): ?>
        <label class="choice"><input type="radio" name="<?= e($k) ?>" value="<?= e($val) ?>"<?= ($old[$k] ?? '') === $val ? ' checked' : '' ?><?= $k === 'tipo' ? ' required' : '' ?>><span><?= e($label) ?></span></label>
      <?php endforeach; ?>
    </div>
    <?php if ($k === 'zona'): ?>
    <details class="optional"<?= ($old['nombre'] ?? '') . ($old['telefono'] ?? '') . ($old['mensaje'] ?? '') !== '' ? ' open' : '' ?>>
      <summary>Si querés, sumá tu nombre y un detalle (opcional)</summary>
      <div class="field"><label for="f-name">Nombre</label><input id="f-name" name="nombre" autocomplete="name" value="<?= $v('nombre') ?>"></div>
      <div class="field"><label for="f-phone">Teléfono o WhatsApp</label><input id="f-phone" type="tel" name="telefono" autocomplete="tel" placeholder="Tu número, por si el WhatsApp no llega" value="<?= $v('telefono') ?>"<?= $inv('telefono') ?>><?= $err('telefono') ?></div>
      <div class="field"><label for="f-msg">Algo más sobre el proyecto</label><textarea id="f-msg" name="mensaje" rows="3" maxlength="600"><?= $v('mensaje') ?></textarea></div>
    </details>
    <?php endif; ?>
  </fieldset>
<?php endforeach; ?>
  <p class="small">Al continuar se abre WhatsApp con tu consulta ya escrita. Guardamos estas respuestas para derivar tu proyecto; ver la <a href="/privacidad/">política de privacidad</a>.</p>
  <div class="form__actions">
    <button type="button" class="btn btn--ghost-ink" data-prev hidden>Volver</button>
    <button type="button" class="btn btn--clay" data-next hidden>Siguiente</button>
    <button type="submit" class="btn btn--clay btn--wa" data-submit><?= wa_icon() ?><span><?= e($opts['cta'] ?? 'Seguir en WhatsApp') ?></span></button>
  </div>
</form>
<?php return; endif; ?>

<?php if ($source === 'postulate'): ?>
  <fieldset class="step">
    <legend class="sr-only">Datos del estudio</legend>
    <div class="field"><label for="f-studio">Nombre del estudio o profesional</label><input id="f-studio" name="estudio" required value="<?= $v('estudio') ?>"<?= $inv('estudio') ?>><?= $err('estudio') ?></div>
    <div class="field"><label for="f-mat">Matrícula o registro profesional</label><input id="f-mat" name="matricula" value="<?= $v('matricula') ?>" placeholder="Número y entidad, si corresponde"></div>
    <div class="field"><label for="f-serv">Servicios que ofrecés</label><input id="f-serv" name="servicios" value="<?= $v('servicios') ?>" placeholder="Ej.: anteproyecto, planos municipales, cálculo"></div>
    <div class="field"><label for="f-city">Ciudad y zona de trabajo</label><input id="f-city" name="ciudad" value="<?= $v('ciudad') ?>" autocomplete="address-level2"></div>
    <div class="field"><label for="f-url">Portafolio (enlace)</label><input id="f-url" type="url" name="portafolio" value="<?= $v('portafolio') ?>" placeholder="https://"<?= $inv('portafolio') ?>><?= $err('portafolio') ?></div>
<?php else: ?>
  <fieldset class="step">
    <legend class="sr-only">Tu consulta</legend>
    <div class="field"><label for="f-msg">¿Qué querés consultar?</label><textarea id="f-msg" name="mensaje" rows="4" required<?= $inv('mensaje') ?>><?= $v('mensaje') ?></textarea><?= $err('mensaje') ?></div>
<?php endif; ?>
    <div class="field"><label for="f-name">Nombre</label><input id="f-name" name="nombre" required autocomplete="name" value="<?= $v('nombre') ?>"<?= $inv('nombre') ?>><?= $err('nombre') ?></div>
    <div class="field"><label for="f-phone">Teléfono o WhatsApp</label><input id="f-phone" type="tel" name="telefono" required autocomplete="tel" placeholder="Tu número de WhatsApp" value="<?= $v('telefono') ?>"<?= $inv('telefono') ?>><?= $err('telefono') ?></div>
    <div class="field"><label for="f-email">Email (opcional)</label><input id="f-email" type="email" name="email" autocomplete="email" value="<?= $v('email') ?>"<?= $inv('email') ?>><?= $err('email') ?></div>
  </fieldset>
  <p class="small">Al enviar aceptás nuestra <a href="/privacidad/">política de privacidad</a>.</p>
  <div class="form__actions">
    <button type="submit" class="btn btn--clay" data-submit><?= e($opts['cta'] ?? 'Enviar') ?></button>
  </div>
</form>
<?php
}

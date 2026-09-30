<?php
declare(strict_types=1);

/**
 * Escenas vectoriales de la home (brief §8.4–§8.5, §9). Sin imágenes ni peticiones externas:
 * dibujo en planta de la "Casa ARQ" conceptual. Cuando lleguen las fotos (docs/imagery-manifest.json)
 * la imagen va encima, dentro del mismo contenedor data-slot, y la escena queda como respaldo.
 */

/** Lote vacío con la sombra de una casa que todavía no existe, líneas de replanteo y columnas. */
function scene_hero(): string
{
    // Planta de la casa (invisible): barra larga este-oeste con galería al norte + barra corta al sur.
    // Sol de la 1 p. m.: alto, apenas al oeste del norte → la sombra cae corta hacia el sur-sureste.
    $l = 'M-360,-210 L300,-210 L300,300 L140,300 L140,60 L-360,60 Z';
    $lines = [
        ['h', -210, -450, 390], ['h', -120, -450, 390], ['h', 60, -450, 390], ['h', 300, 60, 390],
        ['v', -360, -290, 140], ['v', 300, -290, 380], ['v', 140, -40, 380],
    ];
    $svgLines = '';
    foreach ($lines as $i => [$o, $at, $from, $to]) {
        $d = $o === 'h' ? "M$from,$at L$to,$at" : "M$at,$from L$at,$to";
        $svgLines .= '<path class="sc-line sc-line--' . $o . '" style="--i:' . $i . '" d="' . $d . '"/>';
    }
    $cols = '';
    for ($i = 0; $i < 7; $i++) {
        $x = -360 + $i * (640 / 6);
        $cols .= '<rect class="sc-col" style="--i:' . $i . '" x="' . round($x - 7, 1) . '" y="-217" width="14" height="14"/>';
    }
    $stakes = '';
    foreach ([[-450, -210], [390, -210], [-450, 60], [390, 60], [390, 300], [-360, -290], [300, -290], [140, 380]] as [$x, $y]) {
        $stakes .= '<rect class="sc-stake" x="' . ($x - 4) . '" y="' . ($y - 4) . '" width="8" height="8"/>';
    }
    return <<<SVG
<svg class="scene scene--hero" viewBox="0 0 1600 1000" preserveAspectRatio="xMidYMid slice" aria-hidden="true" focusable="false">
  <defs>
    <pattern id="sc-laterite" width="14" height="14" patternUnits="userSpaceOnUse" patternTransform="rotate(-12)">
      <rect width="14" height="14" fill="#3d1d13"/><circle cx="3" cy="4" r="1" fill="#4d2618"/><circle cx="10" cy="11" r=".8" fill="#2f160e"/>
    </pattern>
    <pattern id="sc-brick" width="24" height="12" patternUnits="userSpaceOnUse">
      <rect width="24" height="12" fill="#5a2a1a"/><path d="M0 11.5H24M12 0V6M0 6V12M24 6V12" stroke="#141210" stroke-width="1.2"/>
    </pattern>
  </defs>
  <g class="sc-plan" transform="translate(1010 470) rotate(-12)">
    <g class="sc-lot">
      <rect x="-560" y="-380" width="1120" height="800" fill="url(#sc-laterite)"/>
      <rect x="-560" y="-380" width="1120" height="800" fill="none" stroke="#F4F1EA" stroke-opacity=".22"/>
      <rect x="-560" y="-380" width="26" height="560" fill="url(#sc-brick)"/>
      <circle cx="-400" cy="270" r="112" fill="#2a130c"/>
      <circle cx="430" cy="-290" r="58" fill="#2a130c"/>
    </g>
    <g class="sc-shadow">
      <path d="$l" transform="translate(38 52)" fill="#0d0907"/>
      <ellipse cx="-362" cy="322" rx="112" ry="100" fill="#0d0907" opacity=".8"/>
      <ellipse cx="450" cy="-262" rx="58" ry="52" fill="#0d0907" opacity=".8"/>
    </g>
    <g class="sc-set">$svgLines $stakes</g>
    <g class="sc-cols">$cols</g>
    <g class="sc-north" transform="translate(470 330) rotate(12)">
      <path d="M0,-34 L9,0 L0,-8 L-9,0 Z" fill="#F4F1EA" fill-opacity=".55"/>
      <text x="0" y="22" text-anchor="middle">N</text>
    </g>
  </g>
</svg>
SVG;
}

/** Galería en sombra al mediodía: piso rojo al sol, franja de sombra de la losa y siete columnas. */
function scene_gallery(): string
{
    // Borde de la losa: de (0,340) a (1600,310). Columnas justo adentro de la sombra;
    // su sombra sale al piso asoleado, larga y hacia el sureste (sol de las dos de la tarde).
    $cols = '';
    for ($i = 0; $i < 7; $i++) {
        $x = 110 + $i * 232;
        $edge = 340 - ($x / 1600) * 30;
        $y = $edge - 58;
        $cols .= '<path d="M' . $x . ',' . round($edge, 1) . ' L' . ($x + 30) . ',' . round($edge, 1) . ' L' . ($x + 150) . ',' . round($edge + 250, 1) . ' L' . ($x + 120) . ',' . round($edge + 250, 1) . ' Z" fill="#140d0a" opacity=".78"/>'
            . '<rect x="' . $x . '" y="' . round($y, 1) . '" width="30" height="30" fill="#1e1612" stroke="#F4F1EA" stroke-opacity=".22"/>';
    }
    return <<<SVG
<svg class="scene scene--gallery" viewBox="0 0 1600 686" preserveAspectRatio="xMidYMid slice" aria-hidden="true" focusable="false">
  <defs>
    <linearGradient id="sc-floor" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#7a301c"/><stop offset="1" stop-color="#a23d24"/></linearGradient>
    <pattern id="sc-joints" width="160" height="160" patternUnits="userSpaceOnUse" patternTransform="rotate(-1.1)"><path d="M0 .5H160M.5 0V160" stroke="#141210" stroke-opacity=".12"/></pattern>
  </defs>
  <rect width="1600" height="686" fill="url(#sc-floor)"/>
  <rect width="1600" height="686" fill="url(#sc-joints)"/>
  <path class="sc-slab" d="M0,0 H1600 V310 L0,340 Z" fill="#0d0907"/>
  $cols
  <path d="M0,340 L1600,310" stroke="#F4F1EA" stroke-opacity=".3"/>
</svg>
SVG;
}

/** Luz de la tarde a través de una celosía de ladrillo: manchas de luz en damero sobre el piso. */
function scene_celosia(): string
{
    return <<<SVG
<svg class="scene scene--celosia" viewBox="0 0 1600 700" preserveAspectRatio="xMidYMid slice" aria-hidden="true" focusable="false">
  <defs>
    <pattern id="sc-light" width="150" height="96" patternUnits="userSpaceOnUse" patternTransform="translate(900 120) skewX(-38) rotate(-8)">
      <rect x="10" y="10" width="56" height="28" fill="#F0B08A"/><rect x="85" y="58" width="56" height="28" fill="#F0B08A"/>
    </pattern>
    <radialGradient id="sc-fade" cx=".74" cy=".58" r=".5"><stop offset="0" stop-color="#fff"/><stop offset=".55" stop-color="#777"/><stop offset="1" stop-color="#000"/></radialGradient>
    <mask id="sc-mask"><rect width="1600" height="700" fill="url(#sc-fade)"/></mask>
    <radialGradient id="sc-glow" cx=".74" cy=".58" r=".45"><stop offset="0" stop-color="#b5442a" stop-opacity=".35"/><stop offset="1" stop-color="#b5442a" stop-opacity="0"/></radialGradient>
  </defs>
  <rect width="1600" height="700" fill="#17100d"/>
  <rect width="1600" height="700" fill="url(#sc-glow)"/>
  <rect class="sc-light" width="1600" height="700" fill="url(#sc-light)" mask="url(#sc-mask)" opacity=".9"/>
</svg>
SVG;
}

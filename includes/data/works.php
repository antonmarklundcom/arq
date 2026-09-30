<?php
declare(strict_types=1);

/**
 * Obras. 'architects' = slugs de includes/data/architects.php.
 * 'example' => true = contenido de muestra, no real.
 * 'tone' = variante de patrón de ladrillo para el placeholder (1-4).
 */
return [
    [
        'slug' => 'bienal-venecia-2016',
        'title' => 'Bienal de Venecia 2016: León de Oro',
        'type' => 'Reconocimiento',
        'city' => 'Venecia (participación de Paraguay)',
        'year' => '2016',
        'summary' => 'El León de Oro que Solano Benítez y Gabinete de Arquitectura llevaron a Paraguay.',
        'body' => [
            'En la 15.ª Muestra Internacional de Arquitectura de la Bienal de Venecia (2016), Solano Benítez y Gabinete de Arquitectura recibieron el León de Oro. El reconocimiento puso a la arquitectura paraguaya de ladrillo en el mapa internacional.',
        ],
        'architects' => ['gabinete-de-arquitectura'],
        'sources' => ['La Biennale di Venezia, 15th International Architecture Exhibition (2016)'],
        'tone' => 1,
        'example' => false,
    ],
    [
        'slug' => 'casa-ejemplo-ladrillo',
        'title' => 'Casa de Ejemplo en Ladrillo',
        'type' => 'Vivienda',
        'city' => 'Asunción',
        'year' => '',
        'summary' => 'Obra de muestra para revisar el formato de una ficha de vivienda. No es una obra real.',
        'body' => ['Ficha de muestra. Reemplazala con datos reales: programa, materiales, superficie, año y créditos.'],
        'architects' => ['estudio-ejemplo-uno', 'estudio-ejemplo-dos'],
        'sources' => [],
        'tone' => 2,
        'example' => true,
    ],
    [
        'slug' => 'centro-ejemplo-cultural',
        'title' => 'Centro Cultural de Ejemplo',
        'type' => 'Cultural',
        'city' => 'Asunción',
        'year' => '',
        'summary' => 'Obra de muestra para revisar el formato de una ficha cultural. No es una obra real.',
        'body' => ['Ficha de muestra. Reemplazala con datos reales.'],
        'architects' => ['estudio-ejemplo-uno'],
        'sources' => [],
        'tone' => 3,
        'example' => true,
    ],
    [
        'slug' => 'pabellon-ejemplo-encarnacion',
        'title' => 'Pabellón de Ejemplo',
        'type' => 'Comercial',
        'city' => 'Encarnación',
        'year' => '',
        'summary' => 'Obra de muestra para revisar el formato de una ficha comercial. No es una obra real.',
        'body' => ['Ficha de muestra. Reemplazala con datos reales.'],
        'architects' => ['estudio-ejemplo-dos'],
        'sources' => [],
        'tone' => 4,
        'example' => true,
    ],
];

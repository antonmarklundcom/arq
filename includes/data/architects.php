<?php
declare(strict_types=1);

/**
 * Arquitectos y estudios. Contenido como datos.
 * 'example' => true  = contenido de ejemplo, NO real (se muestra con la marca "Ejemplo").
 * 'partner' => true solo para estudios verificados (matrícula, portafolio propio con permiso,
 *   acuerdo firmado; ver brief §6.4). Solo ellos reciben consultas desde su ficha.
 * Nunca agregar personas, citas ni credenciales sin fuente verificable.
 */
return [
    [
        'slug' => 'gabinete-de-arquitectura',
        'name' => 'Gabinete de Arquitectura',
        'type' => 'Estudio',
        'city' => 'Asunción',
        'people' => ['Solano Benítez', 'Gloria Cabral'],
        'summary' => 'Estudio asunceno liderado por Solano Benítez, referencia mundial en arquitectura de ladrillo.',
        'bio' => [
            'Gabinete de Arquitectura es un estudio con base en Asunción, asociado al trabajo de Solano Benítez y Gloria Cabral. Su obra explora las posibilidades constructivas del ladrillo cocido, el material más presente de la arquitectura paraguaya.',
            'En 2016 Solano Benítez recibió el León de Oro de la Bienal de Arquitectura de Venecia por la participación de Gabinete de Arquitectura en la exposición principal, curada por Alejandro Aravena.',
        ],
        'facts' => [
            ['2016', 'León de Oro, Bienal de Arquitectura de Venecia (Solano Benítez / Gabinete de Arquitectura)'],
        ],
        'quote' => null,
        'sources' => ['Bienal de Venecia 2016, La Biennale di Venezia (labiennale.org)'],
        'works' => ['bienal-venecia-2016'],
        'partner' => false, // referencia editorial, no es estudio asociado a ARQ
        'example' => false,
    ],
    [
        'slug' => 'estudio-ejemplo-uno',
        'name' => 'Estudio de Ejemplo Uno',
        'type' => 'Estudio',
        'city' => 'Asunción',
        'people' => [],
        'summary' => 'Perfil de muestra para mostrar cómo se ve un estudio en el directorio. No es un estudio real.',
        'bio' => [
            'Este perfil es un ejemplo para mostrar el formato de una ficha. Cuando un estudio real se postula y es aprobado, este texto se reemplaza por su biografía, sus obras y su manifiesto.',
        ],
        'facts' => [],
        'quote' => null,
        'sources' => [],
        'works' => ['casa-ejemplo-ladrillo', 'centro-ejemplo-cultural'],
        'partner' => false,
        'example' => true,
    ],
    [
        'slug' => 'estudio-ejemplo-dos',
        'name' => 'Estudio de Ejemplo Dos',
        'type' => 'Estudio',
        'city' => 'Ciudad del Este',
        'people' => [],
        'summary' => 'Perfil de muestra: así se ve la ficha de un estudio con obras vinculadas. No es un estudio real.',
        'bio' => [
            'Ficha de muestra. El directorio vincula cada estudio con sus obras y cada obra con sus autores; este ejemplo sirve para revisar esos vínculos.',
        ],
        'facts' => [],
        'quote' => null,
        'sources' => [],
        'works' => ['casa-ejemplo-ladrillo', 'pabellon-ejemplo-encarnacion'],
        'partner' => false,
        'example' => true,
    ],
];

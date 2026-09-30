<?php
declare(strict_types=1);

/**
 * Controlador frontal. En Hostinger .htaccess manda acá toda URL que no sea
 * un archivo; en local lo carga router.php. Rutas: includes/routes.php.
 */
require_once __DIR__ . '/includes/lib.php';
require_once __DIR__ . '/includes/form.php';

dispatch(rawurldecode(parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/'));

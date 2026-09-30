<?php
declare(strict_types=1);

/**
 * Único lugar con datos del negocio y secretos de configuración.
 * Los secretos se leen de .env (no versionado) o del entorno.
 */
(function (): void {
    $file = dirname(__DIR__) . '/.env';
    if (!is_readable($file)) {
        return;
    }
    foreach (file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) ?: [] as $line) {
        if ($line[0] === '#' || !str_contains($line, '=')) {
            continue;
        }
        [$k, $v] = explode('=', $line, 2);
        $_ENV[trim($k)] = trim($v, " \t\"'");
    }
})();

function env(string $key, string $default = ''): string
{
    $v = $_ENV[$key] ?? getenv($key);
    return ($v === false || $v === null || $v === '') ? $default : (string)$v;
}

const SITE_NAME     = 'MONOGRAFÍA · arq.com.py';
const SITE_SHORT    = 'MONOGRAFÍA';
const SITE_TAGLINE  = 'Directorio de la arquitectura paraguaya';
const SITE_LOCALE   = 'es-PY';
define('SITE_URL', rtrim(env('SITE_URL', 'https://arq.com.py'), '/'));

// Contacto: completar en .env (ver docs/owner-todo.md).
// WhatsApp: solo dígitos. Sin WHATSAPP_NUMBER en .env se usa el número por defecto.
define('WHATSAPP_NUMBER', preg_replace('/\D/', '', env('WHATSAPP_NUMBER', '595992279599')) ?: '595992279599');
define('CONTACT_EMAIL', env('CONTACT_EMAIL'));
define('NOTIFY_EMAIL', env('NOTIFY_EMAIL', CONTACT_EMAIL));

// VenderCRM (clave nunca en el repo)
const CRM_ENDPOINT = 'https://crm.clientes.com.py/api/v1/leads';
define('CRM_API_KEY', env('VENDERCRM_API_KEY', env('VCRM_API_KEY')));

const STORAGE_DIR = __DIR__ . '/../storage';

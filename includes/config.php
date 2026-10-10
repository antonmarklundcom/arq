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

const SITE_NAME     = 'ARQ.com.py';
const SITE_SHORT    = 'ARQ';
const SITE_TAGLINE  = 'ARQ conecta proyectos en Paraguay con arquitectos e ingenieros independientes, según el alcance, la ubicación y la especialidad necesaria.';
const SITE_COVERAGE = 'Asunción y Gran Asunción';
const SITE_LOCALE   = 'es-PY';
define('SITE_URL', rtrim(env('SITE_URL', 'https://arq.com.py'), '/'));

// Contacto: completar en .env (ver docs/owner-todo.md).
// WhatsApp: solo dígitos. Sin WHATSAPP_NUMBER en .env se usa el número por defecto.
define('WHATSAPP_NUMBER', preg_replace('/\D/', '', env('WHATSAPP_NUMBER', '595992279599')) ?: '595992279599');
define('CONTACT_EMAIL', env('CONTACT_EMAIL'));
define('NOTIFY_EMAIL', env('NOTIFY_EMAIL', CONTACT_EMAIL));

// VenderCRM (clave nunca en el repo)
require_once dirname(__DIR__) . '/lib/vendercrm-config.php';
$canonicalEnv = ['VENDERCRM_URL'=>getenv('VENDERCRM_URL'), 'VENDERCRM_API_KEY'=>getenv('VENDERCRM_API_KEY'), 'VENDERCRM_CONFIG_FILE'=>getenv('VENDERCRM_CONFIG_FILE')];
// Verified historical key-only setting remains in the legacy fallback.
if (!$canonicalEnv['VENDERCRM_URL']) $canonicalEnv['VENDERCRM_API_KEY'] = false;
$crmConfigurationInvalid = false;
try { $canonicalCrm = \VenderCRM\Config::optional(dirname(__DIR__), $canonicalEnv); }
catch (RuntimeException $error) {
    error_log('arq: invalid server CRM configuration');
    $canonicalCrm = null;
    $crmConfigurationInvalid = true;
}
define('CRM_ENDPOINT', $crmConfigurationInvalid ? '' : ($canonicalCrm ? $canonicalCrm->endpoint() : 'https://crm.clientes.com.py/api/v1/leads'));
define('CRM_API_KEY', $crmConfigurationInvalid ? '' : ($canonicalCrm ? $canonicalCrm->apiKey() : env('VENDERCRM_API_KEY', env('VCRM_API_KEY'))));

const STORAGE_DIR = __DIR__ . '/../storage';

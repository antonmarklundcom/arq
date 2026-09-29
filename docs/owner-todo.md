# Pendientes del dueño

## Decisión de stack
PLAN.md pedía Astro + GSAP. Se construyó en **HTML + PHP plano** (sin build, sin base de datos) para subirlo tal cual a Hostinger. La paleta, tipografía, estructura de sitio y reglas del plan se mantienen. El movimiento (Lenis/GSAP, revelado con clip-path, parallax) no está: solo hay revelado suave y un asentamiento del hero, con `prefers-reduced-motion` respetado. Queda para una pasada de pulido.

## Configuración (.env, no versionado)
`SITE_URL`, `CONTACT_EMAIL`, `NOTIFY_EMAIL`, `WHATSAPP_NUMBER` (solo dígitos), `VENDERCRM_API_KEY`. Sin clave de CRM los leads igual se guardan en `storage/leads.csv` (y por email si hay `NOTIFY_EMAIL`). Revisar `storage/form.log` si no llegan leads. Agregar `<script src="{CRM_URL}/vc-attribution.js" defer>` cuando se tenga la URL del CRM.

## Fuentes
No se pudieron descargar (red bloqueada). Bajar **Fraunces** y **Archivo** (variable, latin, woff2) a `assets/fonts/` y crear `assets/fonts/fonts.css` con los `@font-face`; el sitio lo carga solo si existe. Mientras tanto usa Georgia y la fuente del sistema.

## Contenido de ejemplo (`'example' => true`, marcado "Ejemplo" y `noindex`, fuera del sitemap)
- Arquitectos: `estudio-ejemplo-uno`, `estudio-ejemplo-dos`.
- Obras: `casa-ejemplo-ladrillo`, `centro-ejemplo-cultural`, `pabellon-ejemplo-encarnacion`.
Reemplazar por estudios y obras reales (con autorización) en `includes/data/`.

## Contenido real sembrado (verificar redacción con la fuente)
- Gabinete de Arquitectura / Solano Benítez y Gloria Cabral, León de Oro, Bienal de Venecia 2016. Fuente: La Biennale di Venezia. Se puede ampliar con obras, año de fundación y citas con fuente.

## Fotos necesarias (no se generó ninguna imagen; hoy hay placeholders de ladrillo en CSS)
- Hero de inicio: ladrillo monumental, tratamiento duotono ink + clay (1920x1080+).
- Una foto principal por obra (4:3, mín. 1600 px) con su texto alternativo.
- Retrato o imagen por estudio.
- Imagen Open Graph 1200x630 (agregar `og:image` en `includes/lib.php`).
- Favicon PNG/ICO opcional (hoy hay `assets/img/favicon.svg`).

## Otros
- Privacidad: texto base, que lo revise un abogado.
- Definir document root y que `includes/`, `storage/`, `docs/` no sean públicos (el `.htaccess` los bloquea).
- Contadores del hero cuentan solo entradas verificadas.

## Deploy por Git (hPanel → Avanzado → GIT)
1. Repositorio `antonmarklundcom/arq`, rama `main`, ruta de instalación vacía (= `public_html`). `public_html` tiene que estar vacío en el primer deploy (borrá `default.php` o los archivos del sitio viejo).
2. Copiá la URL del webhook de Hostinger a GitHub → Settings → Webhooks (evento push): cada merge redeploya solo.
3. Los archivos ignorados por Git (`config.php`, `.env`, `storage/`) no viajan: creálos una sola vez por el administrador de archivos y no se pisan en los deploys siguientes.
4. Después del primer deploy, verificá que `/docs/`, `/.git/HEAD` y `/PLAN.md` den 403/404.

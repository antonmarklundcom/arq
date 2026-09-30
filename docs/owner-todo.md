# Pendientes del dueño

Actualizado en la ventana B (2026-09-30). Fuente de verdad: `docs/seo/ARQ-COM-PY-MASTER-BUSINESS-DESIGN-SEO-BRIEF.md`.
URLs: `docs/seo/arq-urls.md`. Informe de la ventana: `docs/BUILD-REPORT-2026-09-30.md`.

## Hecho en la ventana B
- Dirección resuelta: **el brief maestro gana** sobre PLAN.md (directorio de prestigio). Se mantiene el look MONOGRAFÍA y `/arquitectos/` + `/obras/` como hub de arquitectos. Marca: **ARQ**.
- Fuentes Fraunces y Archivo autoalojadas en `assets/fonts/` (antes: pendiente).
- Páginas de la fase 1 del brief: inicio, selector `/contanos-tu-proyecto/`, `/como-funciona/`, `/servicios/` + 4 servicios, `/proyectos/` + casa nueva + reforma o ampliación, `/para-arquitectos/`, `/terminos/`, privacidad reescrita.
- Selector: guarda el lead (CSV + CRM + email) y redirige a WhatsApp con el mensaje armado.
- Rutas con barra final y 301 (`/contacto`, `/postulate`, `/nosotros`, URLs del documento de estructura viejo).
- WhatsApp: número por defecto `595992279599` si `.env` no define otro; un mensaje por página en `includes/data/whatsapp.json`.
- Herramientas de QA en `tools/` (`tools/gates.sh`).
- Plan de imágenes en `docs/imagery-manifest.json` (19 imágenes, ~27 créditos), **sin generar**.

## Solo Anton puede hacerlo

### En el servidor (Hostinger)
- Crear `.env` en `public_html` (no viaja con Git): `SITE_URL=https://arq.com.py`, `WHATSAPP_NUMBER` (solo dígitos; si arq tiene su propio número, ponelo acá; si no, queda 595992279599), `CONTACT_EMAIL`, `NOTIFY_EMAIL`, `VENDERCRM_API_KEY` (la clave del sitio `arq` de la tabla de VenderCRM; nunca en el repo).
- Crear `storage/` con permiso de escritura (ahí van `leads.csv` y `form.log`).
- Deploy por Git: hPanel → Avanzado → GIT, repo `antonmarklundcom/arq`, rama `main`, ruta vacía. Copiar el webhook a GitHub → Settings → Webhooks (push). `public_html` vacío en el primer deploy.
- Después del primer deploy: una consulta real de punta a punta (selector → WhatsApp, y que el lead llegue al CRM y al email). Verificar que `/docs/`, `/pages/home.php`, `/includes/config.php`, `/.git/HEAD` y `/PLAN.md` den 403/404.
- En el entorno de Claude Code: permitir `arq.com.py`, `obra.com.py` y `*.cloudfront.net` (Network access → Allowed domains) para poder hacer la auditoría en vivo y bajar imágenes.

### Legal y negocio (brief §19–§20)
- Revisión de un abogado de `/privacidad/` y `/terminos/` (hoy dicen "texto base").
- Razón social y RUC del operador (se publican en `/terminos/` §1).
- Plazo de conservación de datos (se publica en `/privacidad/`).
- Modelo de ingresos y condiciones comerciales con los profesionales (brief §6.5). Ninguna página lo menciona.
- Territorio inicial exacto, disciplinas disponibles, compromiso de tiempo de respuesta, proceso de reclamos.
- Procedimiento de verificación por disciplina. Para arquitectos: lista de socios del CAP (Colegio de Arquitectos del Paraguay). Definir cuál se usa para ingenieros.
- Plataforma de analítica y consentimiento (los CTA ya tienen `data-ev` / `data-ev-loc`).

### Contenido
- **Profesionales reales** con matrícula verificada y permiso para publicar su obra: se cargan en `includes/data/architects.php` con `'partner' => true` (solo ellos reciben consultas desde su ficha). Hasta entonces `/arquitectos/` muestra el estado vacío del brief.
- Gabinete de Arquitectura es una ficha **editorial** (fuente: La Biennale di Venezia 2016), no un estudio asociado. Revisar redacción.
- Ejemplos (`'example' => true`, noindex): `estudio-ejemplo-uno`, `estudio-ejemplo-dos`, `casa-ejemplo-ladrillo`, `centro-ejemplo-cultural`, `pabellon-ejemplo-encarnacion`. Reemplazar o borrar cuando haya fichas reales.
- Revisar dos frases operativas que escribimos según el brief: "esa conversación la lleva una persona" (cómo funciona) y "si tu consulta no encuentra un profesional adecuado, te lo vamos a decir" (términos §4).
- Imágenes: escribir **"Generate image"** en el chat cuando el entorno tenga `*.cloudfront.net` permitido. Costo estimado en `docs/imagery-manifest.json`.
- Favicon PNG/ICO opcional (hoy `assets/img/favicon.svg`).
- Agregar `<script src="{CRM_URL}/vc-attribution.js" defer>` cuando se tenga la URL del CRM (hoy no se carga nada de terceros).

## Otros
- Movimiento hecho (C3): el hero muestra la sombra de la casa conceptual sobre el lote vacío (dibujo vectorial animado, sin librerías), más la galería al mediodía, la luz de la celosía y la barra fija con un CTA. Cuando lleguen las fotos se ponen encima de esas escenas.
- Guías de la fase 2 y páginas de zona: ver `docs/NEXT-WINDOW-PROMPT.md`. Zonas solo con cobertura real.

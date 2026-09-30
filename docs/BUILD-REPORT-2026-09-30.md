# Build report — window B, 2026-09-30

Director: Opus session. Page writing and the font task: Sonnet subagents (one per page), each reviewed and edited by the director.
No Fable anywhere.

## Decision taken
Three plans conflicted: PLAN.md (July, a prestige directory, which is what was built), the MASTER BRIEF (25 Aug, demand generation and matching), and the older structure doc (`/planos/`, `/carpeta/`…).
Applied the owner default: **the MASTER BRIEF wins**. The MONOGRAFÍA look stays. `/arquitectos/` and `/obras/` stay as the brief's architects hub. Example entries stay noindex. The brand is ARQ.
The mapping from the old URLs is in `docs/seo/arq-urls.md`.

## PRs (all merged to main after green gates)
| Phase | PR | Content |
|---|---|---|
| A0 | [#3](https://github.com/antonmarklundcom/arq/pull/3) | QA tools ported from carpinteria and adapted to PHP; WhatsApp message map; baseline audit; VenderCRM rules (phone as +595, idempotency key per submission) |
| A1 | [#4](https://github.com/antonmarklundcom/arq/pull/4) | Self-hosted Fraunces (opsz) + Archivo (wght), latin woff2, both normal files preloaded |
| A2 | [#5](https://github.com/antonmarklundcom/arq/pull/5) | `docs/seo/arq-urls.md`, the master brief and structure doc copied into `docs/seo/`, a supersession note in PLAN.md |
| A3a | [#6](https://github.com/antonmarklundcom/arq/pull/6) | Front controller + route table, trailing slash, 301s, selector → server capture → 303 WhatsApp, home per brief §9, services hub + 4 services, cómo funciona, proyectos hub + casa nueva + reforma |
| A3b | [#7](https://github.com/antonmarklundcom/arq/pull/7) | Para arquitectos (full), términos with the intermediation notice, privacy rewritten for the selector, URL rows set to live |
| A5 | [#8](https://github.com/antonmarklundcom/arq/pull/8) | `docs/imagery-manifest.json`: 19 slots, prompts, ~27 credits estimated, **nothing generated** |
| Finish | this PR | owner-todo, this report, next-window prompt |

The A3 split differs slightly from the plan. Services link to /como-funciona/, /proyectos/… and the selector on every page, so a services-only PR could not pass linkcheck. A3a therefore carries the foundation and every page those link to. A3b carries the partner page, the terms and the privacy rewrite.

## Gate output (final run on main content, `tools/gates.sh`)
```
VERIFY OK   (php -l; every sitemap URL 200 with title ≤ 60, description 120–155, 1 H1, canonical, JSON-LD;
             404s; 301s for every redirect + slashless forms; .htaccess ↔ routes.php parity; private paths 403;
             selector POST → 303 wa.me/595992279599; honeypot; 422 validation)
php -l OK
linkcheck: 671 internal refs in 24 pages, 0 broken, 0 redirected
overlap: OK — 16 page(s) checked against 16
check-wa: OK — 24 pages, 24 distinct messages, number 595992279599
pw-check: 38 renders (19 pages × 2, 1366 and 390): console errors 0, failed requests 0, broken images 0,
          overflow 0, third-party hosts none, small tap targets 0
audit: 18 URLs → docs/audit/audit-after.json
seo-diff: 9 URLs, 89 differences, 0 failing
          (title changes approved in docs/audit/approved-titles.tsv; moved URLs in docs/audit/redirects.tsv;
           home no longer links editorial entries — approved in docs/audit/approved-changes.tsv)
ALL GATES GREEN
```

## Live sitemap (18 URLs)
`/`, `/contanos-tu-proyecto/`, `/como-funciona/`, `/servicios/`, `/servicios/anteproyecto-arquitectonico/`,
`/servicios/planos-documentacion-municipal/`, `/servicios/calculo-estructural/`, `/servicios/direccion-de-proyecto/`,
`/proyectos/`, `/proyectos/casa-nueva/`, `/proyectos/reforma-ampliacion/`, `/arquitectos/`, `/obras/`,
`/para-arquitectos/`, `/privacidad/`, `/terminos/`, `/obras/bienal-venecia-2016/`, `/arquitectos/gabinete-de-arquitectura/`.
"Live" means on `main`; the site itself is live only after the Hostinger Git deploy.

## NOT RUN
- **Live audit and live-check of arq.com.py**: the egress proxy answers 403 for arq.com.py (`audit: NOT RUN — fetch failed`). Only the local baseline `docs/audit/audit-before.json` exists.
- **`linkcheck --external`** (obra.com.py links): same proxy block. The obra URLs (`/`, `/casas/`, `/reformas/`) were checked against `antonmarklundcom/obra` main `app/routes.php` instead.
- **A4 keyword map**: the keyword-library MCP is not connected in this session (no `list_projects` for keywords), so A4 was skipped as instructed. No volumes or group IDs are claimed anywhere.
- **Higgsfield cost preflight**: `models_explore` and `generate_image get_cost` timed out (60 s, twice). The estimate uses the skill's measured rates.
- **Image generation**: not requested ("Generate image" not given), and it would be blocked anyway: `curl -sI *.cloudfront.net` → 403.
- **Real end-to-end lead test into VenderCRM**: not done from here (no .env on the dev server, and it would create a real CRM contact). Owner step after deploy.

## Things fixed along the way
- The form placeholder `0981 123 456` looked like a real PY mobile number and was replaced.
- On /contacto the radio inputs were absolutely positioned at 100 % width and overflowed on desktop.
- The header, brand link, footer and service heading links were under 44 px.
- The `hidden` attribute was overridden by `.btn { display: inline-flex }`, so all three stepper buttons showed on step 1.
- Gabinete de Arquitectura had a "Contactá a…" form that implied it was an ARQ partner. It is now an editorial reference with no form, and `enviar.php` only accepts `architect` slugs of partners.
- The old partner page said "Sin costo de postulación" (a price claim, and the revenue model is undecided). Removed.
- A budget field with USD/Gs examples on the contact form. Removed: the brief puts budget in the WhatsApp qualification.
- Tool bug: HEAD fetches left response bodies unread and crashed undici. Fixed in `tools/lib.mjs`.

# arq.com.py — canonical URL list

**Source of truth:** `docs/seo/ARQ-COM-PY-MASTER-BUSINESS-DESIGN-SEO-BRIEF.md` (the MASTER BRIEF, 25 Aug 2026,
copied from antonmarklundcom/carpinteria `b53d23f`). URLs follow brief §11.3.

**Owner direction (window B):** the MASTER BRIEF wins over `PLAN.md` (July, directory model) and over
`arq-com-py-site-structure.md` (older URL set). The MONOGRAFÍA look stays. `/arquitectos/` and `/obras/`
stay and serve as the brief's architects hub. Example entries stay `noindex` until they are real.

**Rules for sister sites (obra, carpinteria, …):** link only to rows with status **live**. Use the exact
URL with its trailing slash. A row marked *planned* or *not planned* may 404 or redirect.

Status key: **live** = in the sitemap on `main`, 200. *planned* = agreed, not built yet. *not planned* =
deliberately not built; the reason is in the note. *301* = redirect kept permanently (listed in `.htaccess`,
`includes/routes.php` and `docs/audit/redirects.tsv`).

Trailing slash: every page URL ends in `/` (brief §14, "trailing-slash consistency"). The slashless
form 301s to it.

## 1. Pages

| URL | Status | Phase | Note |
|---|---|---|---|
| `/` | **live** | — | Brand and conversion page. H1 per brief §11.4 |
| `/contanos-tu-proyecto/` | **live** | A3 | Three-step project selector (§7) → `enviar.php` → WhatsApp |
| `/como-funciona/` | **live** | A3 | How ARQ works and the independent-professional boundary |
| `/servicios/` | **live** | A3 | Hub of the four services |
| `/servicios/anteproyecto-arquitectonico/` | **live** | A3 | |
| `/servicios/planos-documentacion-municipal/` | **live** | A3 | |
| `/servicios/calculo-estructural/` | **live** | A3 | |
| `/servicios/direccion-de-proyecto/` | **live** | A3 | |
| `/proyectos/` | **live** | A3 | Hub of project-intent pages |
| `/proyectos/casa-nueva/` | **live** | A3 | |
| `/proyectos/reforma-ampliacion/` | **live** | A3 | |
| `/proyectos/local-comercial/` | *planned* | Phase 2 | Needs a verified partner for commercial work |
| `/proyectos/evaluar-un-terreno/` | *planned* | Phase 2 | |
| `/para-arquitectos/` | **live** | A3 | Partner information and application |
| `/arquitectos/` | **live** | — | Architects hub. Designed empty state for partners + editorial references |
| `/arquitectos/gabinete-de-arquitectura/` | **live** | — | Editorial reference with a named source. **Not** an ARQ partner |
| `/arquitectos/[perfil-verificado]/` | *planned* | Phase 2 | Only with verified registration (CAP member list) and consent |
| `/obras/` | **live** | — | Works index kept per owner. Real entries only in the sitemap |
| `/obras/bienal-venecia-2016/` | **live** | — | Sourced (La Biennale di Venezia) |
| `/obras/[slug]/`, `/arquitectos/estudio-ejemplo-*/` | noindex | — | Example entries, marked "Ejemplo", outside the sitemap |
| `/guias/` | **live** | C1 | Guides hub |
| `/guias/que-incluye-un-anteproyecto/` | **live** | C1 | |
| `/guias/como-elegir-arquitecto/` | **live** | C1 | |
| `/guias/antes-de-comprar-un-terreno/` | **live** | C1 | |
| `/guias/planos-para-construir-en-asuncion/` | **live** | C1 (PR 2) | |
| `/guias/cuando-se-necesita-calculo-estructural/` | **live** | C1 (PR 2) | In §17, not in §11.3 |
| `/guias/orientacion-y-sombra-casa-paraguay/` | **live** | C1 (PR 2) | |
| `/guias/cuanto-cobra-un-arquitecto-en-paraguay/` | *not planned* | — | Price content (brief §11.3); out of scope without the owner |
| `/zonas/asuncion/`, `/zonas/gran-asuncion/` | *not planned* | — | Brief §11.3: only with real partner coverage |
| `/privacidad/` | **live** | — | Base text; lawyer review pending |
| `/terminos/` | **live** | A3 | Terms + matching disclaimer |
| `/gracias/` | noindex | — | Thank-you page for the partner and profile forms |

## 2. Existing URLs that move (301)

| Old URL | → New URL | When |
|---|---|---|
| `/contacto` | `/contanos-tu-proyecto/` | live |
| `/postulate` | `/para-arquitectos/` | live |
| `/nosotros` | `/como-funciona/` | live |
| `/obras`, `/arquitectos`, `/privacidad`, `/gracias`, `/obras/x`, `/arquitectos/x` (any slashless path) | same path + `/` | A3 |

`/arquitectos` keeps working for carpinteria's `/cocinas/` and `/placares/` links: 301 → `/arquitectos/`.
Carpinteria can update the href to `https://arq.com.py/arquitectos/` to save the hop.

## 3. Old structure-doc URLs → brief equivalent

`arq-com-py-site-structure.md` listed an older URL set that obra.com.py mentions as text. None of these
URLs was ever live. Those with a clear equivalent get a 301 so a typed or copied link still lands.

| Structure doc | Brief equivalent | Handling |
|---|---|---|
| `/planos/` | `/servicios/planos-documentacion-municipal/` | 301 (live) |
| `/carpeta/` | `/servicios/planos-documentacion-municipal/` | 301 (live) |
| `/diseno/` | `/servicios/anteproyecto-arquitectonico/` | 301 (live) |
| `/estructural/` | `/servicios/calculo-estructural/` | 301 (live) |
| `/como-trabajamos/` | `/como-funciona/` | 301 (live) |
| `/cotizar/` | `/contanos-tu-proyecto/` | 301 (live) |
| `/comercial/` | `/proyectos/local-comercial/` | *planned*. 404 until that page exists |
| `/proyectos/` (portfolio) | `/obras/` | In the brief `/proyectos/` is the project-intent hub, not a portfolio |
| `/regularizacion/` | — | *not planned*: brief §11.2 says "only if verified partners genuinely provide it" |
| `/renders/` | — | *not planned*: renders are part of the anteproyecto; no stand-alone page |
| `/interiores/` | — | *not planned*: not in the brief; carpinteria keeps linking to `/arquitectos/` |
| `/estilos/`, `/minimalista/`, `/moderna/` | — | *not planned*: style cluster not in the brief. Revisit with keyword data (A4) as `/guias/` |

## 4. Cross-links out of arq

| From | To | Anchor idea |
|---|---|---|
| `/proyectos/casa-nueva/` | `https://obra.com.py/casas/` | ¿Ya tenés planos y querés construir? |
| `/proyectos/reforma-ampliacion/` | `https://obra.com.py/reformas/` | ¿Ya sabés qué reformar? |
| service pages (where it fits) | `https://obra.com.py/` | ¿Ya querés construir? |

Obra URLs were checked against `antonmarklundcom/obra` main (`app/routes.php`) on 2026-09-30. They were
not checked live: the egress proxy blocks obra.com.py and arq.com.py in this environment.

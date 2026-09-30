# Prompt for window C (arq.com.py)

Paste below into a new Claude Code session on antonmarklundcom/arq. Director: Opus. Subagents: Sonnet only (medium for page writing, low for mechanical edits), one subagent per page. Never Fable.

---

You are the build director for arq.com.py, window C. Work autonomously; fix what you find instead of reporting it. One PR per phase, merged to main only after `tools/gates.sh` ends with ALL GATES GREEN. Stop only for the decisions marked ANTON.

Read first: `docs/BUILD-REPORT-2026-09-30.md`, `docs/owner-todo.md`, `docs/seo/arq-urls.md`, `docs/seo/ARQ-COM-PY-MASTER-BUSINESS-DESIGN-SEO-BRIEF.md` (source of truth), `includes/routes.php`, `includes/lib.php` (page helpers: faq_html, wa_cta, selector_cta, cta_band, related, obra_link, disclaimer_html), `tools/README.md`. The page-writing spec used in window B is reproduced in section "Page spec" below.

Local: `php -S localhost:8000 router.php`. QA: `cd tools && npm ci` once, then `tools/gates.sh`. Playwright uses /opt/pw-browsers; never run `playwright install`. Live tools: `NODE_USE_ENV_PROXY=1`.

HARD RULES (copy into every subagent prompt)
1. Spanish es-PY with voseo. No prices, no "gratis"/"sin costo", no guaranteed plazos, approvals or outcomes.
2. Never claim ARQ designs or built anything. Never invent architects, works, reviews, awards or numbers. Real facts need a named source. Conceptual images are labelled as conceptual.
3. WhatsApp only via `includes/data/whatsapp.json` (one distinct message per page; add the entry before the page). Number from config (default 595992279599). Any other Paraguayan mobile number anywhere fails `tools/check-wa.mjs`.
4. No third-party requests at runtime.
5. Every new page: add it to `routes()` in includes/routes.php (sitemap follows), unique title ≤ 60 ending "| ARQ", one H1, description 120–155, canonical with trailing slash; FAQ schema only with a visible FAQ (pass 'faq' to page_start and render faq_html); no LocalBusiness/Review schema.
6. No URL deleted or renamed without a 301 in `redirects()` (includes/routes.php) AND `.htaccess` AND `docs/audit/redirects.tsv`; verify.sh checks the first two match. New title changes need a line in `docs/audit/approved-titles.tsv`.

C0 CHECK (you): if `curl -sI https://arq.com.py` works now, run `NODE_USE_ENV_PROXY=1 node tools/live-check.mjs` and `node tools/audit.mjs https://arq.com.py docs/audit/audit-live.json`; also `node tools/linkcheck.mjs --external`. Record results. If still blocked, write NOT RUN and continue.

C1 IMAGES (only if Anton has written "Generate image" in the chat AND `curl -sI` to a *.cloudfront.net URL returns 200): follow the higgsfield-image-pipeline skill against `docs/imagery-manifest.json` (gpt_image_2_5 sunburst; home-hero first, approve, then the rest with the same Casa ARQ). Convert with webimg (AVIF+WebP, names from the manifest), replace the `.brick` placeholders by `data-slot`, width/height on every img, lazy below the fold, preload only the hero, add `og:image` in `page_start()`, caption `brand_concept` images per brief §19. Update the manifest (`url`, `job_id`, `ledger_checked`, `download_status`) in the same PR. Otherwise skip.

C2 GUIDES (brief §17 Phase 2; Sonnet medium, one per page): `/guias/` hub + the six guides: que-incluye-un-anteproyecto, como-elegir-arquitecto, antes-de-comprar-un-terreno, planos-para-construir-en-asuncion, cuando-se-necesita-calculo-estructural, orientacion-y-sombra-casa-paraguay (slugs per brief §11.3 where given). Article schema only with a real author/reviewer — ANTON: name a qualified reviewer or publish without author schema (default: no author schema, "Contenido orientativo" note). Link each guide from the related service page. If the keyword-library MCP answers `list_projects`, first build `docs/seo/arq-keyword-map.md` (real group IDs + PY volumes vs brief §11.2 and the 60 terms in `docs/seo/arq-com-py-site-structure.md`) and order the guides by volume.

C3 MOTION POLISH (you, Opus): brief §9.01 shadow-film hero within the §14 performance limits (≤ 120 KB hero, reduced-motion static, at most two stages on mobile). No GSAP/Lenis unless measurement proves it is needed.

C4 PARTNERS (only when Anton supplies real, verified partners with consent): add them to includes/data/architects.php with `'partner' => true`, ProfilePage schema, real portraits/works with credits. Never before.

NOT IN SCOPE without ANTON: zone pages (/zonas/…) — only with real coverage; /proyectos/local-comercial/ and /proyectos/evaluar-un-terreno/ — only with a verified partner for that work; any price or fee content.

FINISH: update docs/owner-todo.md, write docs/BUILD-REPORT-<date>.md (PRs, gate output, NOT RUN) and a new docs/NEXT-WINDOW-PROMPT.md. Final message to Anton: PR links, the arq-urls.md "live" list, and what only he can do.

## Page spec (for subagents)
Each page: 700–1,100 words of useful, specific content — plain-language answer near the top; what it includes; what you need to start; the steps (`ol.numbered`); municipal context for Asunción and Gran Asunción in general terms (each municipality defines its own requirements; the professional confirms the current list; ARQ does no trámites); ARQ's role in page-specific words ("Te conectamos con…", never "Realizamos…"); 4–6 FAQs; `wa_cta()` + `selector_cta()` near the top; `related()` with 2–4 internal links; one soft `obra_link()` where it fits; `cta_band()` at the end. Markup reference: `pages/servicios.php`. Verify with php -l, curl 200, one H1, title/description lengths, word count, and a grep for gratis|sin costo|garantiz|USD|Gs\.|digit runs.

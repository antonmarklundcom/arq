# Prompt for window C (arq.com.py) — Sonnet director

Paste everything below the line into a new Claude Code session on antonmarklundcom/arq, with the model set to Sonnet 5.5.
All Opus work is done (foundation, routing, selector, Phase-1 pages, hero/motion). Window C is Sonnet-only.

---

You are the build director for arq.com.py, window C. Model: Sonnet 5.5. Subagents are Sonnet only (medium for page writing, low for mechanical edits), one subagent per page. Never Fable, never Opus. Work autonomously; fix what you find instead of reporting it. One PR per phase to main, merged only after `tools/gates.sh` ends with ALL GATES GREEN. Stop only for decisions marked ANTON.

Read first, in this order: `docs/BUILD-REPORT-2026-09-30.md` (including the addendum), `docs/owner-todo.md`, `docs/seo/arq-urls.md`, `docs/seo/ARQ-COM-PY-MASTER-BUSINESS-DESIGN-SEO-BRIEF.md` (source of truth), `includes/routes.php`, `includes/lib.php` (page helpers: faq_html, wa_cta, selector_cta, cta_band, related, obra_link, disclaimer_html), `includes/scenes.php`, `tools/README.md`, and `pages/servicios/calculo-estructural.php` as the reference for a finished content page.

Local: `php -S localhost:8000 router.php`. QA: `cd tools && npm ci` once, then `tools/gates.sh`. Playwright uses /opt/pw-browsers; never run `playwright install`. Live tools: `NODE_USE_ENV_PROXY=1`.

HARD RULES (copy into every subagent prompt)
1. Spanish es-PY with voseo. No prices, no "gratis"/"sin costo", no guaranteed plazos, approvals or outcomes.
2. Never claim ARQ designs or builds anything; matching language only ("Te conectamos con profesionales que…"). Never invent architects, works, reviews, awards, statistics or numbers. Real facts need a named source. Conceptual images are labelled as conceptual. Municipal requirements only in general terms ("cada municipalidad define sus requisitos; el profesional confirma la lista vigente"), no ordinance numbers, fees or office names.
3. WhatsApp only via `includes/data/whatsapp.json` (add a distinct message for every new page before building it). Number from config (default 595992279599). No other Paraguayan mobile number anywhere, not even in docs (`tools/check-wa.mjs` scans them).
4. No third-party requests at runtime.
5. Every new page: add it to `routes()` in includes/routes.php (the sitemap follows), unique title ≤ 60 chars ending "| ARQ", exactly one H1, description 120–155 chars, canonical with trailing slash; FAQ schema only with a visible FAQ (pass 'faq' to page_start and render faq_html); no LocalBusiness/Review/AggregateRating schema.
6. No URL deleted or renamed without a 301 in `redirects()` (includes/routes.php) AND `.htaccess` AND `docs/audit/redirects.tsv`. Title changes on existing URLs need a line in `docs/audit/approved-titles.tsv`.

REVIEW DUTY (the gates cannot do this): before each merge, read every new page's visible text yourself (`curl` the page and read it) and remove any claim about ARQ's operations, results, speed, coverage or partners that is not already stated in the brief or owner-todo, any "regularización" promise, and any sentence that reads like a guarantee. Keep the page between 700 and 1,100 words.

C0 LIVE CHECK (you): if `curl -sI https://arq.com.py` returns an HTTP response from the site (not a proxy 403), run `NODE_USE_ENV_PROXY=1 node tools/live-check.mjs`, `NODE_USE_ENV_PROXY=1 node tools/audit.mjs https://arq.com.py docs/audit/audit-live.json` and `NODE_USE_ENV_PROXY=1 node tools/linkcheck.mjs --external`. Fix anything that is a repo problem; list anything that is a server problem for Anton. If still blocked, write NOT RUN and continue.

C1 GUIDES (brief §17 Phase 2; one Sonnet subagent per page, you review each): `/guias/` hub + six guides, URLs per brief §11.3:
- /guias/que-incluye-un-anteproyecto/
- /guias/como-elegir-arquitecto/
- /guias/antes-de-comprar-un-terreno/
- /guias/planos-para-construir-en-asuncion/
- /guias/cuando-se-necesita-calculo-estructural/ (not in §11.3 but in §17; add it)
- /guias/orientacion-y-sombra-casa-paraguay/
Each guide answers its question near the top, then goes deeper than the matching service page without repeating it (link to it instead; `tools/overlap.mjs` fails on repeated paragraphs). No Article author schema unless ANTON names a real qualified reviewer (default: none, with a visible "Contenido orientativo, revisalo con un profesional" note). Link every guide from its related service/project page (one sentence + link) and add "Guías" to the footer nav. Update `docs/seo/arq-urls.md` rows to live in the same PR. If the keyword-library MCP answers `list_projects`, first build `docs/seo/arq-keyword-map.md` (real group IDs + Paraguay volumes vs brief §11.2 and the 60 terms in `docs/seo/arq-com-py-site-structure.md`) and use it for titles; otherwise note NOT RUN and keep the §11.2 wording. Two PRs: hub + 3 guides, then 3 guides.

C2 IMAGES (only if Anton has written "Generate image" in the chat AND `curl -sI` to any https://*.cloudfront.net URL returns 200; otherwise skip and say so): follow the higgsfield-image-pipeline skill against `docs/imagery-manifest.json` (gpt_image_2_5, variant sunburst, settings per row; home-hero first — show it to Anton and wait for approval — then the rest keeping the same conceptual house). Check the ledger per the skill. Convert with webimg to AVIF + WebP using the manifest file names and alt text. Placement: put a `<picture>` inside each existing `data-slot` container, absolutely positioned above the SVG scene (keep the scene as fallback; do not delete includes/scenes.php), width/height on every img, `loading="lazy"` below the fold, preload only the home hero, add `og:image` (1200×630) in `page_start()`, and render the `caption_required` text in small type under every brand_concept image where it could be read as real work. Update the manifest (`url`, `job_id`, `ledger_checked`, `download_status`, `actual_spend_credits`) in the same PR. Keep the manifest PR separate from the images PR.

C3 PARTNERS (only when Anton supplies real, verified partners with consent — never before): add each to `includes/data/architects.php` with `'partner' => true`, verified matrícula noted with its source, real works with permission and correct credits; ProfilePage schema on their profile; they then receive inquiries through their profile form.

NOT IN SCOPE without ANTON: zone pages (/zonas/…), /proyectos/local-comercial/, /proyectos/evaluar-un-terreno/, any price or fee content, any change to the visual design or the hero scenes.

FINISH: update docs/owner-todo.md (done / still open), write docs/BUILD-REPORT-<date>.md (PRs, gate output, NOT RUN) and a fresh docs/NEXT-WINDOW-PROMPT.md. Final message to Anton: PR links, the arq-urls.md "live" list, image status, and what only he can do.

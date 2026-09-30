# QA tools (not deployed)

Ported from antonmarklundcom/carpinteria `tools/` and adapted to the PHP site: every tool starts
`php -S 127.0.0.1:<port> router.php` itself (tools/lib.mjs `startServer`) and checks what PHP renders.
Playwright uses the preinstalled Chromium in /opt/pw-browsers — never run `playwright install`.

    cd tools && npm ci          # once
    tools/gates.sh              # every merge gate, in order (add --no-pw to skip Playwright)

| Tool | Gate |
|---|---|
| `../verify.sh` | php -l, every sitemap URL 200, title ≤ 60, description 120–155, 1 H1, canonical, JSON-LD, 404s, anti-spam |
| `linkcheck.mjs` | 0 broken and 0 redirected internal links (crawls noindex pages linked from the site too); `--external` fetches *.com.py links |
| `overlap.mjs` | 0 paragraphs repeated between pages (8-word shingles) |
| `check-wa.mjs` | one WhatsApp number (595992279599 unless .env says otherwise), every CTA message from `includes/data/whatsapp.json`, no other PY mobile number anywhere, selector 303 hand-off |
| `pw-check.mjs --strict` | 1366 and 390: no overflow, no broken images, tap targets ≥ 44px, 0 third-party requests, 0 console errors |
| `audit.mjs` + `seo-diff.mjs` | SEO snapshot vs `docs/audit/audit-before.json`; title changes need a line in `docs/audit/approved-titles.tsv`, moved URLs a line in `docs/audit/redirects.tsv` |
| `live-check.mjs` | after deploy: `NODE_USE_ENV_PROXY=1 node tools/live-check.mjs` |

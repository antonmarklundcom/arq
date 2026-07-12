# ARQ.COM.PY — Master Project Plan

> Written by the planning model (Fable 5). Every build session MUST read this file first.
> Execution models per phase are listed in the Phase Table. Do not deviate from the
> creative direction without the owner's approval.

## 1. What this is

**arq.com.py** — the definitive showcase of Paraguayan architecture and its architects.
A prestige directory that connects **obras** (works of architecture) with **arquitectos**
(the studios/people behind them), plus strong lead generation via forms.

Two audiences, one flywheel:
1. **Clients** (people who want to build) → browse works → find the architect → send an inquiry (lead).
2. **Architects** → land on the site and think *"WOW, I want to be on this"* → apply to be listed
   ("Postulá tu estudio") → which is itself a lead and grows the catalog.

Success bar: it must look and feel like a $100k website. Restraint, not decoration.

## 2. Creative direction — "MONOGRAFÍA"

The site is a living architecture monograph — a museum catalog, not a listing portal.
Paraguay's architecture is world-famous for one thing above all: **brick**. Solano Benítez /
Gabinete de Arquitectura won the Golden Lion at the 2016 Venice Biennale for Paraguayan
brickwork. The design honors that: red earth, fired clay, ink on paper.

### Palette
- `--paper`: #F4F1EA (warm off-white, gallery wall)
- `--ink`: #141210 (near-black, editorial)
- `--clay`: #B5442A (fired-brick red — THE accent, used sparingly: rules, numbers, hover states, CTAs)
- `--stone`: #8A8378 (muted secondary text)
- Dark sections invert to ink background with paper text (hero, footer, featured bands).

### Typography
- Display: **Fraunces** (Google Fonts) — huge, tight-tracked, optical sizing on. Hero headline 10–14vw.
- Body/UI: **Archivo** (Google Fonts, made in Latin America — deliberate choice). Wide tracking uppercase for labels.
- Prestige devices: numbered entries (`N° 001`), thin rules, `SELECCIÓN 2026` eyebrow labels,
  oversized folio numbers on profiles. Every architect profile reads like a magazine feature, not a card in a grid.

### Motion language (scroll-website skill territory)
- Slow, heavy, confident. Ease `cubic-bezier(0.16, 1, 0.3, 1)`, durations 0.8–1.2s.
- Lines/rules draw in on scroll; images reveal with clip-path curtains; headlines rise word-by-word.
- Subtle parallax on hero imagery. NO bounce, NO spin, NO gradient blobs, NO glassmorphism.
- Respect `prefers-reduced-motion`.

### The hero (home page, full viewport height)
Full-bleed dark hero, 100svh. A slow Ken-Burns / parallax image of monumental Paraguayan
brickwork (duotone-treated: ink + clay). On top:
- Eyebrow: `ARQUITECTURA DEL PARAGUAY — SELECCIÓN 2026`
- Headline in Fraunces, ~12vw, two lines, e.g. **"La arquitectura que el mundo mira."**
- Sub-line + two CTAs: `Explorar obras` (primary, clay) / `Encontrá tu arquitecto` (ghost).
- Bottom edge: thin rule + scroll cue + live counters (`34 estudios · 120 obras`).
- Words rise on load; image scales from 1.08→1 over ~2s.

### Language
Spanish (es-PY, use "vos" forms in CTAs: *Postulá*, *Encontrá*, *Contanos*). No English UI.

## 3. Site map

- `/` — Home: hero → featured works band → "Cómo funciona" → featured architects → editorial strip → lead form CTA → footer
- `/obras` — works index (filter by city/type) · `/obras/[slug]` — work detail, credits linking to its architects
- `/arquitectos` — directory · `/arquitectos/[slug]` — profile: portrait, manifesto quote, their works, **inquiry form**
- `/contacto` — main lead-gen page: multi-step form ("¿Qué querés construir?")
- `/postulate` — architects apply to be listed (the honor/flywheel page — sell the prestige hard here)

Works ↔ architects are many-to-many via slug references in frontmatter/JSON. Every work
credits its architects with links; every profile lists its works. That's the "connect
architecture with architect" requirement.

## 4. Tech stack (decided — don't relitigate)

- **Astro** (static output) + vanilla TS + **GSAP ScrollTrigger + Lenis** for scroll experience.
  Zero-JS by default, perfect Lighthouse, deploys as plain files to Hostinger.
- Content: Astro content collections (`src/content/arquitectos/*.md`, `src/content/obras/*.md`).
  Seed with ~8 realistic sample architects + ~16 works (placeholder images from picsum/local,
  duotone-treated with CSS; owner swaps in real photography later).
- **Forms/backend**: static site + ONE `api/lead.php` endpoint (Hostinger shared hosting runs PHP):
  validates, honeypot + time-trap anti-spam, appends to `leads.csv` outside webroot, sends
  email notification. Client-side: progressive multi-step UX, works without JS as plain POST.
- No framework churn, no CMS for v1, no database.

## 5. Phase table — WHO BUILDS WHAT

Rule of thumb: **Opus 4.8** for anything where *taste* decides the outcome (design system,
hero, motion, final polish). **Sonnet 5** for structured, well-specified build work.
Phases are ordered; each is one session. Commit + push at the end of every phase.

| # | Phase | Model | Notes |
|---|-------|-------|-------|
| 0 | Master plan (this file) | Fable 5 | ✅ done |
| 1 | Scaffold + design system: Astro init, fonts, tokens (palette/type/spacing as CSS custom props), base layout, nav, footer | **Opus 4.8** | Foundation of the look — worth Opus |
| 2 | Home page: full-height hero + full scroll experience. **Invoke the `scroll-website` skill.** | **Opus 4.8** | The $100k moment. Biggest session |
| 3 | Content collections + seed data: schemas, 8 architects, 16 works, cross-references | Sonnet 5 | Mechanical, well-specified |
| 4 | `/obras` + `/arquitectos` index & detail pages, cross-linking, filters | Sonnet 5 | Follow phase-1 design system strictly |
| 5 | Lead gen: `/contacto` multi-step form, per-architect inquiry, `/postulate`, `api/lead.php`, anti-spam | Sonnet 5 | |
| 6 | SEO + performance: meta/OG per page, sitemap, structured data (LocalBusiness/Person), es-PY lang, image optimization, Lighthouse ≥95 | Sonnet 5 | |
| 7 | Polish pass: motion refinement, responsive QA (390px/768px/1440px), hover states, dark bands, micro-details | **Opus 4.8** | Second taste checkpoint |
| 8 | Deploy: build, Hostinger upload instructions (or FTP script), form endpoint smoke test | Sonnet 5 | |

### Paste-ready prompts per phase

- **P1 (Opus):** "Read PLAN.md. Do Phase 1: scaffold the Astro project and build the design system exactly per §2 and §4. Commit and push to the designated branch."
- **P2 (Opus):** "Read PLAN.md. Do Phase 2: build the home page with the full-height hero and scroll experience per §2. Use the scroll-website skill. Commit and push."
- **P3–P6, P8 (Sonnet):** "Read PLAN.md. Do Phase N per the phase table. Follow the existing design system — do not invent new styles. Commit and push."
- **P7 (Opus):** "Read PLAN.md. Do Phase 7: polish pass across the whole site — motion, responsive, micro-details. Screenshot-verify key pages if possible. Commit and push."

## 6. Lead-gen spec (Phase 5 detail)

1. **Main form `/contacto`** — 3 steps: (a) project type: Casa / Comercial / Reforma / Otro,
   as large clickable cards; (b) city + budget range (optional, PYG/USD toggle) + description;
   (c) name, email/WhatsApp. Progress rule animates in clay. Success state is designed, not an alert.
2. **Per-architect inquiry** on every profile: "Contactá a [Estudio]" — short form, tagged with the architect slug.
3. **`/postulate`** — for architects: sell the honor ("Un lugar entre los mejores"), fields:
   studio, city, portfolio URL, email. This grows supply AND is a lead.
4. All three POST to `api/lead.php` with a `source` field. Honeypot field + min-3s time trap. No CAPTCHAs.
5. CTAs to `/contacto` appear: hero, after featured works, footer band on every page.

## 7. Hard rules for all sessions

- Read this file before touching code. Do not redesign; execute.
- Spanish UI only. Voseo in CTAs.
- No UI libraries (no Tailwind UI/shadcn/Bootstrap). Hand-rolled CSS on the token system.
- Images always duotone/treated — never raw stock-photo look.
- Ship each phase working: `npm run build` must pass before every push.
- Branch: `claude/arq-paraguay-architect-site-5m7gpq`. Never push elsewhere.

# Build report — window C, 2026-09-30

Director: Sonnet 5.5. Six Sonnet subagents (medium), one per guide. No Opus, no Fable.

## PRs (merged after `tools/gates.sh` ended ALL GATES GREEN)
| Phase | PR | Content |
|---|---|---|
| C1 | [#11](https://github.com/antonmarklundcom/arq/pull/11) | `/guias/` hub + anteproyecto, elegir arquitecto, terreno; footer "Guías"; links from anteproyecto, casa nueva, cómo funciona |
| C1 | [#12](https://github.com/antonmarklundcom/arq/pull/12) | planos para construir en Asunción, cálculo estructural, orientación y sombra; hub updated; links from planos, cálculo, casa nueva, reforma |
| Finish | this PR | owner-todo, this report, next-window prompt |

## Director review (before each merge)
Read every guide's rendered text. Removed: the "presupuesto de referencia" ask and budget wording, a loose sentence on the lot, "requiere un título" stated as fact (now "normalmente"), "el número final" in a comparison, a claim that a solar study is "natural part of anteproyecto" (now "suele formar parte"). The ARQ verification sentence in "cómo elegir arquitecto" matches `/como-funciona/` and brief §8. Fixed `acuerdes` to voseo. Each guide got its own visible "orientativo" note (overlap gate forbids one repeated note).

## Gate output (final run, PR 2 content)
`VERIFY OK`, `php -l OK`, linkcheck 0 broken, overlap OK (20 pages), check-wa OK (31 pages, 31 distinct messages), pw-check 0 console errors / 0 overflow / no third-party hosts / 0 small taps, seo-diff 0 failing, `ALL GATES GREEN`.

## NOT RUN
- **C0 live check** (`live-check`, `audit` on arq.com.py, `linkcheck --external`): `curl -sI https://arq.com.py` returns 403 from the egress proxy.
- **Keyword map** (`docs/seo/arq-keyword-map.md`): no keyword-library MCP in this session. Titles keep the brief §11.2 wording.
- **C2 images**: "Generate image" not written in this chat, and `*.cloudfront.net` is not reachable. Nothing generated, no credits spent.
- **C3 partners**: none supplied.

## Notes
- The brief's `/guias/cuanto-cobra-un-arquitecto-en-paraguay/` is price content and was not built (recorded as not planned in `arq-urls.md`).
- Guides word counts are about 850–1,000 words of prose; FAQ and related blocks are extra.

# Phase L2-D — Importar por producto (segment pages). Sonnet session. Lane 2, parallel with the other L2 phases.

Read ONLY: this file, `plan.md` §1, §2, §4, §3.B2, the phase table and §9, and
`docs/log/T1.md`. Do not read the rest of the plan, other phases' logs or KNOWN-ISSUES.md.
Execute under the autonomy protocol §4. Build nothing outside the plan.

Owns (plus the §4.9 append-only exceptions: `docs/log/L2-D.md`, a `/* == L2-D == */` block at
the END of `assets/css/site.css`, appended lines in `docs/facts-to-verify.md`):
- `content/segmentos/productos.php`
- `importar/<slug>/**` (not `importar/index.php`)

Hard limits (lane 2): no changes to `lib/**`, `partials/**`, `templates/**`, `enviar.php`,
`router.php`, `.htaccess`, `verify.sh`, `deploy/**`, the CSS tokens, the loader files,
`content/lead-values.php`, `content/pages.php`, or another phase's files. Never add
or remove a slug — fill the `'draft' => true` records T1 created and delete the `draft` key.
Blocked → workaround + Backlog note in your log, or `docs/decisions-needed.md` and end (§4.4).

Budget: one session, ≤ 90 min. Polish cap §4.13. PR body ≤ 25 lines, written once.

Phase rules:
- Branch `phase/L2-D` off latest main. WIP commit every 30 min.
- Copy rules plan §4.16 (usted, answer in the first 100 words, no invented figures — unknowns
  go to `docs/facts-to-verify.md` and read "consulte el monto vigente").
- Fan-out §4.17: write ONE exemplar record fully, then parallel Sonnet subagents for the rest,
  each given the exemplar, the key shape and its target keywords; you review and run verify.
- 10 segment pages "Importar <producto> de China a Paraguay". Traps must be product-specific
  (tallas y etiquetado for ropa, homologación for celulares, seguridad de juguetes, falsificaciones
  for zapatillas, repuestos originales vs. alternativos) — no generic filler shared across pages.
- Regulatory claims (certifications, permits) → facts-to-verify unless you can cite the source.
- Re-runnable: continue from the first record still marked `draft`.

Exit: no `'draft' => true` left in your files; 10 segment pages full; meta descriptions unique; verify green on
repo and zip; `docs/log/L2-D.md` written; PR merged green. Screenshots: CI artifact.

## After this phase
Follow `prompts/_handoff.md`. Lane 2 spawns nothing — end with your phase report.

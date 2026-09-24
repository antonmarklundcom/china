# Phase L2-A — Compras online (Temu/Shein/Alibaba). Sonnet session. Lane 2, parallel with the other L2 phases.

Read ONLY: this file, `plan.md` §1, §2, §4, §3.A, the phase table and §9, and
`docs/log/T1.md`. Do not read the rest of the plan, other phases' logs or KNOWN-ISSUES.md.
Execute under the autonomy protocol §4. Build nothing outside the plan.

Owns (plus the §4.9 append-only exceptions: `docs/log/L2-A.md`, a `/* == L2-A == */` block at
the END of `assets/css/site.css`, appended lines in `docs/facts-to-verify.md`):
- `content/guias/compras.php`, `content/services/compras.php`
- `comprar/<slug>/**` (not `comprar/index.php`), `servicios/asesoria-compras-online/**`

Hard limits (lane 2): no changes to `lib/**`, `partials/**`, `templates/**`, `enviar.php`,
`router.php`, `.htaccess`, `verify.sh`, `deploy/**`, the CSS tokens, the loader files,
`content/lead-values.php`, `content/pages.php`, or another phase's files. Never add
or remove a slug — fill the `'draft' => true` records T1 created and delete the `draft` key.
Blocked → workaround + Backlog note in your log, or `docs/decisions-needed.md` and end (§4.4).

Budget: one session, ≤ 90 min. Polish cap §4.13. PR body ≤ 25 lines, written once.

Phase rules:
- Branch `phase/L2-A` off latest main. WIP commit every 30 min.
- Copy rules plan §4.16 (usted, answer in the first 100 words, no invented figures — unknowns
  go to `docs/facts-to-verify.md` and read "consulte el monto vigente").
- Fan-out §4.17: write ONE exemplar record fully, then parallel Sonnet subagents for the rest,
  each given the exemplar, the key shape and its target keywords; you review and run verify.
- Targets (docs/keyword-research.md): temu paraguay 9,900 · shein paraguay 6,600 · alibaba
  paraguay / alibaba en paraguay 720+720 · aliexpress paraguay 2,400 (+81 %) · 1688 en español ~130 · courier china paraguay 40.
  Search intent is "does it ship here, how long, how much tax, which casilla" — answer that.
- Never imply partnership with Temu/Shein/Alibaba. Affiliate ids per plan §3.A via the
  record's `affiliates` key only. Link `/herramientas/calculadora-compras-online/`.
- `alibaba-paraguay` is the bridge to B2B: close with "¿quiere importar para vender?" → §3.B.
- Re-runnable: continue from the first record still marked `draft`.

Exit: no `'draft' => true` left in your files; 8 guides ≥ 900 words with steps + FAQ, 1 service full; meta descriptions unique; verify green on
repo and zip; `docs/log/L2-A.md` written; PR merged green. Screenshots: CI artifact.

## After this phase
Follow `prompts/_handoff.md`. Lane 2 spawns nothing — end with your phase report.

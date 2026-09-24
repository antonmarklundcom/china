# Phase L2-C — Importar de China (services + guides). Sonnet session. Lane 2, parallel with the other L2 phases.

Read ONLY: this file, `plan.md` §1, §2, §4, §3.B, the phase table and §9, and
`docs/log/T1.md`. Do not read the rest of the plan, other phases' logs or KNOWN-ISSUES.md.
Execute under the autonomy protocol §4. Build nothing outside the plan.

Owns (plus the §4.9 append-only exceptions: `docs/log/L2-C.md`, a `/* == L2-C == */` block at
the END of `assets/css/site.css`, appended lines in `docs/facts-to-verify.md`):
- `content/services/importar.php`, `content/guias/importar.php`
- `servicios/{agente-de-compras-china,inspeccion-de-calidad,flete-maritimo-contenedor,flete-aereo-china,importacion-llave-en-mano}/**`
- `guias/<slug>/**` for the §3.B guide slugs

Hard limits (lane 2): no changes to `lib/**`, `partials/**`, `templates/**`, `enviar.php`,
`router.php`, `.htaccess`, `verify.sh`, `deploy/**`, the CSS tokens, the loader files,
`content/lead-values.php`, `content/pages.php`, or another phase's files. Never add
or remove a slug — fill the `'draft' => true` records T1 created and delete the `draft` key.
Blocked → workaround + Backlog note in your log, or `docs/decisions-needed.md` and end (§4.4).

Budget: one session, ≤ 90 min. Polish cap §4.13. PR body ≤ 25 lines, written once.

Phase rules:
- Branch `phase/L2-C` off latest main. WIP commit every 30 min.
- Copy rules plan §4.16 (usted, answer in the first 100 words, no invented figures — unknowns
  go to `docs/facts-to-verify.md` and read "consulte el monto vigente").
- Fan-out §4.17: write ONE exemplar record fully, then parallel Sonnet subagents for the rest,
  each given the exemplar, the key shape and its target keywords; you review and run verify.
- This is the money cluster (top-of-page bids 9–17 kr). Services follow the template service
  brief: fear → mechanism → service, three checklists, specific process, no price claims.
- Pillar `como-importar-de-china-a-paraguay`: ≥ 1,500 words, numbered steps from supplier search
  to delivery in Asunción/CDE, linking every §3.B service and the two import tools.
- We coordinate; licensed partners execute (plan §1.4). Say so plainly.
- Re-runnable: continue from the first record still marked `draft`.

Exit: no `'draft' => true` left in your files; 5 services + 8 guides full; meta descriptions unique; verify green on
repo and zip; `docs/log/L2-C.md` written; PR merged green. Screenshots: CI artifact.

## After this phase
Follow `prompts/_handoff.md`. Lane 2 spawns nothing — end with your phase report.

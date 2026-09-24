# Phase L2-E — Aduana (guides + despacho service). Sonnet session. Lane 2, parallel with the other L2 phases.

Read ONLY: this file, `plan.md` §1, §2, §4, §3.C, the phase table and §9, and
`docs/log/T1.md`. Do not read the rest of the plan, other phases' logs or KNOWN-ISSUES.md.
Execute under the autonomy protocol §4. Build nothing outside the plan.

Owns (plus the §4.9 append-only exceptions: `docs/log/L2-E.md`, a `/* == L2-E == */` block at
the END of `assets/css/site.css`, appended lines in `docs/facts-to-verify.md`):
- `content/services/aduana.php`, `content/guias/aduana.php`
- `aduana/<slug>/**` (not `aduana/index.php`), `servicios/despacho-aduanero/**`

Hard limits (lane 2): no changes to `lib/**`, `partials/**`, `templates/**`, `enviar.php`,
`router.php`, `.htaccess`, `verify.sh`, `deploy/**`, the CSS tokens, the loader files,
`content/lead-values.php`, `content/pages.php`, or another phase's files. Never add
or remove a slug — fill the `'draft' => true` records T1 created and delete the `draft` key.
Blocked → workaround + Backlog note in your log, or `docs/decisions-needed.md` and end (§4.4).

Budget: one session, ≤ 90 min. Polish cap §4.13. PR body ≤ 25 lines, written once.

Phase rules:
- Branch `phase/L2-E` off latest main. WIP commit every 30 min.
- Copy rules plan §4.16 (usted, answer in the first 100 words, no invented figures — unknowns
  go to `docs/facts-to-verify.md` and read "consulte el monto vigente").
- Fan-out §4.17: write ONE exemplar record fully, then parallel Sonnet subagents for the rest,
  each given the exemplar, the key shape and its target keywords; you review and run verify.
- Targets: aduana paraguay 8,100 (navigational — give the practical answer + link the official
  DNA site), aduana argentina paraguay 880, despachante de aduana paraguay 110, lista de
  despachantes 40, precio de despacho aduanero 30, regimen de turismo, NCM.
- Every record sets `disclaimer => true` (plan §1.4). Never copy the DNA logo, colours or wording
  that implies we are the authority. Never state a limit, rate or fee without a source link.
- The despachantes list renders "próximamente" + lead form until Anton supplies partners (§7.5).
- Re-runnable: continue from the first record still marked `draft`.

Exit: no `'draft' => true` left in your files; 7 guides + 1 service full, all with the official-source disclaimer; meta descriptions unique; verify green on
repo and zip; `docs/log/L2-E.md` written; PR merged green. Screenshots: CI artifact.

## After this phase
Follow `prompts/_handoff.md`. Lane 2 spawns nothing — end with your phase report.

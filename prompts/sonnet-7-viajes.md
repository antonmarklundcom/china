# Phase L2-F — Viajar y negocios (Cantón, visa, travel). Sonnet session. Lane 2, parallel with the other L2 phases.

Read ONLY: this file, `plan.md` §1, §2, §4, §3.D, the phase table and §9, and
`docs/log/T1.md`. Do not read the rest of the plan, other phases' logs or KNOWN-ISSUES.md.
Execute under the autonomy protocol §4. Build nothing outside the plan.

Owns (plus the §4.9 append-only exceptions: `docs/log/L2-F.md`, a `/* == L2-F == */` block at
the END of `assets/css/site.css`, appended lines in `docs/facts-to-verify.md`):
- `content/services/viajes.php`, `content/guias/viajes.php`
- `viajar-a-china/<slug>/**` (not the hub), `feria-de-canton/**`, `servicios/{visa-china,tour-negocios-china}/**`

Hard limits (lane 2): no changes to `lib/**`, `partials/**`, `templates/**`, `enviar.php`,
`router.php`, `.htaccess`, `verify.sh`, `deploy/**`, the CSS tokens, the loader files,
`content/lead-values.php`, `content/pages.php`, or another phase's files. Never add
or remove a slug — fill the `'draft' => true` records T1 created and delete the `draft` key.
Blocked → workaround + Backlog note in your log, or `docs/decisions-needed.md` and end (§4.4).

Budget: one session, ≤ 90 min. Polish cap §4.13. PR body ≤ 25 lines, written once.

Phase rules:
- Branch `phase/L2-F` off latest main. WIP commit every 30 min.
- Copy rules plan §4.16 (usted, answer in the first 100 words, no invented figures — unknowns
  go to `docs/facts-to-verify.md` and read "consulte el monto vigente").
- Fan-out §4.17: write ONE exemplar record fully, then parallel Sonnet subagents for the rest,
  each given the exemplar, the key shape and its target keywords; you review and run verify.
- Visa: Paraguayan passport holders apply through a Chinese mission in a neighbouring country;
  which one, fees and timing → facts-to-verify unless cited from the mission's own site.
  `disclaimer => true` on visa pages.
- Canton Fair: phases, sectors per phase, how to register as a buyer; exact 2026/2027 dates
  only with a link to the official fair site. The tour service is a waitlist (tier A).
- Travel guide: eSIM, VPN, Alipay/WeChat Pay for foreigners, apps — affiliate ids per §3.D.
- Re-runnable: continue from the first record still marked `draft`.

Exit: no `'draft' => true` left in your files; 2 services + 6 guides full; meta descriptions unique; verify green on
repo and zip; `docs/log/L2-F.md` written; PR merged green. Screenshots: CI artifact.

## After this phase
Follow `prompts/_handoff.md`. Lane 2 spawns nothing — end with your phase report.

# Phase L2-G — Pages + blog. Sonnet session. Lane 2, parallel with the other L2 phases.

Read ONLY: this file, `plan.md` §1, §2, §4, §3.E, the phase table and §9, and
`docs/log/T1.md`. Do not read the rest of the plan, other phases' logs or KNOWN-ISSUES.md.
Execute under the autonomy protocol §4. Build nothing outside the plan.

Owns (plus the §4.9 append-only exceptions: `docs/log/L2-G.md`, a `/* == L2-G == */` block at
the END of `assets/css/site.css`, appended lines in `docs/facts-to-verify.md`):
- `content/blog.php`, `blog/**`
- `sobre/**`, `para-empresas/**`, `afiliados/**`, `aviso-legal/**`
- in `content/pages.php`: ONLY the `sections` of the keys `/sobre/`, `/para-empresas/`, `/afiliados/`, `/aviso-legal/`

Hard limits (lane 2): no changes to `lib/**`, `partials/**`, `templates/**`, `enviar.php`,
`router.php`, `.htaccess`, `verify.sh`, `deploy/**`, the CSS tokens, the loader files,
`content/lead-values.php`, `content/pages.php` (except the four page keys listed in Owns), or another phase's files. Never add
or remove a slug — fill the `'draft' => true` records T1 created and delete the `draft` key.
Blocked → workaround + Backlog note in your log, or `docs/decisions-needed.md` and end (§4.4).

Budget: one session, ≤ 90 min. Polish cap §4.13. PR body ≤ 25 lines, written once.

Phase rules:
- Branch `phase/L2-G` off latest main. WIP commit every 30 min.
- Copy rules plan §4.16 (usted, answer in the first 100 words, no invented figures — unknowns
  go to `docs/facts-to-verify.md` and read "consulte el monto vigente").
- Fan-out §4.17: write ONE exemplar record fully, then parallel Sonnet subagents for the rest,
  each given the exemplar, the key shape and its target keywords; you review and run verify.
- `/para-empresas/` sells to couriers, despachantes, sourcing agents and travel agencies:
  what they get (qualified leads by cluster, featured slot), how to apply. No prices.
- `/afiliados/` and `/aviso-legal/`: plain disclosure that we earn commissions and are not an
  official body; link DNA, DNIT and the relevant official sites.
- 4 blog articles per plan §3.E; any statistic needs a cited public source or is left out.
- Re-runnable: continue from the first record still marked `draft`.

Exit: no `'draft' => true` left in your files; 4 pages + 4 articles full; meta descriptions unique; verify green on
repo and zip; `docs/log/L2-G.md` written; PR merged green. Screenshots: CI artifact.

## After this phase
Follow `prompts/_handoff.md`. Lane 2 spawns nothing — end with your phase report.

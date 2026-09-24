# Phase L2-B — Herramientas (calculators). Opus session. Lane 2, parallel with the other L2 phases.

Read ONLY: this file, `plan.md` §1, §2, §4, §3.T, the phase table and §9, and
`docs/log/T1.md`. Do not read the rest of the plan, other phases' logs or KNOWN-ISSUES.md.
Execute under the autonomy protocol §4. Build nothing outside the plan.

Owns (plus the §4.9 append-only exceptions: `docs/log/L2-B.md`, a `/* == L2-B == */` block at
the END of `assets/css/site.css`, appended lines in `docs/facts-to-verify.md`):
- `content/tools/*.php`, `herramientas/<slug>/**` (not the hub), `assets/js/tools/**`
- `tests/tools-*.mjs`

Hard limits (lane 2): no changes to `lib/**`, `partials/**`, `templates/**`, `enviar.php`,
`router.php`, `.htaccess`, `verify.sh`, `deploy/**`, the CSS tokens, the loader files,
`content/lead-values.php`, `content/pages.php`, or another phase's files. Never add
or remove a slug — fill the `'draft' => true` records T1 created and delete the `draft` key.
Blocked → workaround + Backlog note in your log, or `docs/decisions-needed.md` and end (§4.4).

Budget: one session, ≤ 90 min. Polish cap §4.13. PR body ≤ 25 lines, written once.

Phase rules:
- Branch `phase/L2-B` off latest main. WIP commit every 30 min.
- Copy rules plan §4.16 (usted, answer in the first 100 words, no invented figures — unknowns
  go to `docs/facts-to-verify.md` and read "consulte el monto vigente").
- Fan-out §4.17: write ONE exemplar record fully, then parallel Sonnet subagents for the rest,
  each given the exemplar, the key shape and its target keywords; you review and run verify.
- Load `paraguay-business-apps` (if listed). All money via `window.Market.fmtMoney`; rates are
  user inputs, defaults from `market_table()` only if present there, else empty with a
  "consulte el monto vigente" hint and a facts-to-verify line.
- Show the formula under each result (CIF = FOB + flete + seguro, etc.). Round only for display.
- One scripted interaction test per tool in `tests/tools-<slug>.mjs`, asserting ≥ 3 known
  input→output cases. Tools work without the lead form; the "pedí cotización real" CTA follows
  the result.
- No fan-out (3 tools, money math): build them yourself.
- Re-runnable: continue from the first record still marked `draft`.

Exit: no `'draft' => true` left in your files; 3 tools compute correctly (tests pass), each with 200–300 words of intro + FAQ; meta descriptions unique; verify green on
repo and zip; `docs/log/L2-B.md` written; PR merged green. Screenshots: CI artifact.

## After this phase
Follow `prompts/_handoff.md`. Lane 2 spawns nothing — end with your phase report.

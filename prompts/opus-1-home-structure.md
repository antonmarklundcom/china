# Phase T1 — Structure, stubs and home. Opus session. Lane 1 (last lane 1 phase).

Read ONLY: this file, `plan.md` §1, §2, §3, §4, §5.T1, the phase table and §9, and
`docs/log/T0.md`. Execute under the autonomy protocol §4. Build nothing outside the plan.

Owns: see the T1 row of the phase table. You are the only phase allowed to change templates,
add partials, and write `content/pages.php`, `content/lead-values.php`, `content/ui.php`,
`content/nav.php` and the four loader files.

Budget: one session, ≤ 90 min.

Phase rules:
- Branch `phase/T1` off latest main. WIP commit every 30 min.
- Load `paraguay-business-apps` (if listed), `vendercrm-lead-capture` for the lead values.
- Do plan §5.T1 steps 1–7 in order. The loader split (step 1) and the stubs (step 2) are the
  contract every lane 2 phase builds on: after this phase no lane 2 phase adds a slug. Write
  the ownership comment "owned by phase L2-x" at the top of each cluster file.
- Stub copy must be verify-green (titles ≤ limits, unique meta descriptions) but obviously
  provisional; mark each stub record `'draft' => true` so lane 2 can find them with grep.
- Affiliate box + disclaimer partial: prefix locals, `unset()`, escape with `e()`.
- Palette: plan §5.T1 step 5; check AA contrast of `--accent-text` on `--bg` and `--surface`.
- No images (plan §1.7).

Exit: every §3 URL returns 200; `grep -rn "'draft' => true" content/` lists every lane 2 record;
verify green on repo and zip; `docs/facts-to-verify.md` exists; `docs/log/T1.md`; PR merged.

## After this phase
Follow `prompts/_handoff.md`. Create the watcher Routine (`prompts/_watcher.md`, Sonnet,
hourly, fresh session per firing), then spawn at once: `sonnet-2-compras-online.md` (Sonnet),
`opus-3-herramientas.md` (Opus), `sonnet-4-importar.md` (Sonnet), `sonnet-6-aduana.md` (Sonnet).
The watcher starts `sonnet-5-productos.md`, `sonnet-7-viajes.md`, `sonnet-8-paginas-blog.md`.

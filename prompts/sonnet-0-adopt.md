# Phase T0 — Adopt the template. Sonnet session. Lane 1.

Read ONLY: this file, `plan.md` §1, §4, §5.T0 and the phase table. Execute under the autonomy
protocol §4. Build nothing outside the plan.

Owns: the whole repo (bootstrap phase).

Budget: one session, ≤ 30 min.

Steps:
1. Bootstrap `main` (origin has none): if `git ls-remote origin main` is empty, create `main` from
   `origin/claude/nifty-curie-a53n4x` and `git push -u origin main`. Skip if main already exists.
2. `git checkout -b phase/T0 origin/main`. `git remote add template
   https://github.com/antonmarklundcom/php-site-template && git fetch template &&
   git merge template/main --allow-unrelated-histories`. On conflict keep this repo's
   `plan.md`, `prompts/*.md` (except take the template's `_handoff.md`, `_watcher.md`), `docs/*`.
3. Follow the template README "Start a new site" steps 2–20 with the values in plan §5.T0.
   Keep `ui.php` in Spanish; replace `needs` with the four chips in plan §5.T1 step 2 only if
   quick — T1 owns them otherwise. Delete ALL example content.
4. Do not touch tokens, fonts or the homepage beyond what verify needs — T1 owns them.
5. Re-runnable: check what exists on the branch first.

Exit: `./verify.sh` green on the repo AND on the unzipped `deploy/make-zip.sh` output; no
`'example' => true` left; `docs/log/T0.md` written; PR merged green.

## After this phase
Follow `prompts/_handoff.md`. Next: `prompts/opus-1-home-structure.md`, model Opus.

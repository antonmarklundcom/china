# Phase LP — Link pass and closing report. Sonnet session. Runs after every L2 PR is merged.

Read ONLY: this file, `plan.md` §1, §3, §4, §6, the phase table and §9, and every
`docs/log/L2-*.md`. Execute under the autonomy protocol §4.

Owns: the `related[]`, `guides[]`, `articles[]`, `toolLinks[]`, `affiliates[]` keys of any
record in `content/**`; `content/nav.php`; the home "más leídas" list in `content/pages.php`;
`KNOWN-ISSUES.md`; `docs/log/LP.md`. Nothing else — no copy rewrites.

Budget: one session, ≤ 60 min.

Phase rules:
- Branch `phase/LP` off latest main.
- Cross-cluster links: every `/comprar/` guide → the import pillar + the compras tool; every
  import service → ≥ 2 guides + 1 tool; every product page → pillar + agente de compras;
  every `/aduana/` guide → despacho-aduanero; viajes ↔ feria-de-canton ↔ tour-negocios-china.
- Apply the one-line wishes other phases left in `docs/decisions-needed.md` if they are links;
  leave anything else for Anton.
- Promote still-open cross-phase items from the L2 logs to `KNOWN-ISSUES.md`.

Exit: no orphan page (every URL linked from ≥ 2 others); verify green on repo and zip;
`docs/log/LP.md`; PR merged green.

## After this phase
Delete the watcher Routine (`delete_trigger`). Then STOP with the closing report to Anton:
live-ready URL count, the full `docs/facts-to-verify.md` list, the empty affiliate ids, the §7
inputs still missing, and the deploy steps (`nextjs-deploy-hostinger` does not apply — upload the
`deploy/make-zip.sh` zip to the Hostinger slot).

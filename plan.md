# plan.md — China ↔ Paraguay: comprar, importar, aduana, viajar

> **Build mode changed (2026-09-24):** Anton asked for the whole site to be built in one
> Opus session with one PR per step, instead of the spawned phase sessions below. The phase
> table stays as the work breakdown; guides live under their cluster hub
> (`/comprar/`, `/importar/`, `/aduana/`, `/viajar-a-china/`, plus `/feria-de-canton/`).

HTML+PHP site built from `antonmarklundcom/php-site-template` (market `py`, Spanish, "usted" register),
phased autonomous build per the `phased-autonomous-build` skill, template profile.
Keyword evidence: `docs/keyword-research.md` (Google KWP, location Paraguay, Sept 2026).

## Phase table

| ID | Lane | Model | Prompt file | Plan § | Owns | Depends on |
|---|---|---|---|---|---|---|
| T0 | 1 | Sonnet | `prompts/sonnet-0-adopt.md` | §2, §5.T0 | whole repo (bootstrap) | — |
| T1 | 1 | Opus | `prompts/opus-1-home-structure.md` | §2, §3, §5.T1 | `index.php`, `content/{site,ui,nav,pages,lead-values,affiliates}.php`, the split loaders `content/{services,guias,tools,segmentos}.php`, every `content/*/` cluster file as a STUB, `partials/affiliate-box.php`, `partials/disclaimer-oficial.php`, all route dirs (stub route files), `assets/css/site.css` tokens | T0 |
| L2-A | 2 | Sonnet | `prompts/sonnet-2-compras-online.md` | §3.A | `content/guias/compras.php`, `content/services/compras.php`, `comprar/<slug>/**` (not the hub `comprar/index.php`), `servicios/asesoria-compras-online/**` | T1 |
| L2-B | 2 | Opus | `prompts/opus-3-herramientas.md` | §3.T | `content/tools/*.php`, `herramientas/<slug>/**`, `assets/js/tools/**`, `tests/tools-*.mjs` | T1 |
| L2-C | 2 | Sonnet | `prompts/sonnet-4-importar.md` | §3.B | `content/services/importar.php`, `content/guias/importar.php`, `servicios/{agente-de-compras-china,inspeccion-de-calidad,flete-maritimo-contenedor,flete-aereo-china,importacion-llave-en-mano}/**`, `guias/<slug>/**` | T1 |
| L2-D | 2 | Sonnet | `prompts/sonnet-5-productos.md` | §3.B2 | `content/segmentos/productos.php`, `importar/<slug>/**` | T1 |
| L2-E | 2 | Sonnet | `prompts/sonnet-6-aduana.md` | §3.C | `content/services/aduana.php`, `content/guias/aduana.php`, `aduana/<slug>/**`, `servicios/despacho-aduanero/**` | T1 |
| L2-F | 2 | Sonnet | `prompts/sonnet-7-viajes.md` | §3.D | `content/services/viajes.php`, `content/guias/viajes.php`, `viajar-a-china/<slug>/**`, `feria-de-canton/**`, `servicios/{visa-china,tour-negocios-china}/**` | T1 |
| L2-G | 2 | Sonnet | `prompts/sonnet-8-paginas-blog.md` | §3.E | `content/blog.php`, `blog/**`, `sobre/**`, `para-empresas/**`, `afiliados/**`, `aviso-legal/**` | T1 |
| LP | — | Sonnet | `prompts/sonnet-9-link-pass.md` | §3, §6 | cross-links in any `content/**` record, `content/nav.php`, `KNOWN-ISSUES.md` | all L2 |

`content/pages.php` and `content/lead-values.php` are written COMPLETE in T1 and are read-only in
lane 2 (L2-G fills only the `sections` of its own page keys — the one shared-file exception, those
keys are listed in its prompt). Model ids: Opus `claude-opus-5-5`, Sonnet `claude-sonnet-5`
(re-check in the `claude-api` skill at spawn time).

---

## 1. Decisions already made — do not re-litigate

1. **One site, four clusters** under one domain: (A) Compras online — Temu/Shein/Alibaba/1688 to
   Paraguay; (B) Importar de China — B2B services, guides, product pages; (C) Aduana — practical
   customs guides + despachante lead-gen; (D) Viajar y negocios — Feria de Cantón, visa, travel.
2. **Priority is by the KWP data**, not the original idea: A (temu 9,900 + shein 6,600 + alibaba
   ~1,500/mo) is the traffic engine; B (high CPC, 5–17 kr top bids) is the money engine; C
   (aduana paraguay 8,100, aduana argentina paraguay 880) is traffic + despachante leads; D is
   small in PY volume but high ticket (Cantón trips, visa service). Tourism-only content is
   limited to one guide set; it is not a cluster of its own.
3. **Money comes from leads and affiliates, not ads.** AdSense is off at launch (backlog item once
   traffic > 30k/mo). Lead forms → VenderCRM via the template's `enviar.php`; partners who fulfil
   are §7 inputs.
4. **We are a private information + intermediary site, never official.** No page may look like
   the Dirección Nacional de Aduanas (DNA) or an embassy. Every `/aduana/` page and the visa
   page render `partials/disclaimer-oficial.php` with a link to the official source. We do not
   clear goods ourselves: customs clearance is by a licensed despachante partner.
5. **Stack:** php-site-template, market `py`, Hostinger shared hosting, no database. The
   despachante/courier "directory" is a curated content array, not a listings app.
6. **No invented facts.** Tax rates, courier import rules, Canton Fair dates, visa steps and
   partner names stay `null` / "consulte el monto vigente" and go into `docs/facts-to-verify.md`
   until Anton confirms them. Affiliate URLs are `null` until Anton has the account; the
   affiliate box hides.
7. **No image generation in any phase.** Anton triggers imagery himself ("Generate image").
   Pages ship with the template's typographic layout and the placeholder OG image.
8. **Neutral politics.** Paraguay recognises Taiwan; the site states facts that matter to the
   reader (no PRC embassy in Asunción → visa via a third country) without commentary.
9. **Domain `china.com.py`, brand name "China-Paraguay"** (logo wordmark "China-Paraguay",
   domain shown under it). `content/site.php`: name "China-Paraguay", domain `china.com.py`.
10. **Other domains:** aduna.com.py — not bought. **aduana.com.py — bought**; at launch it 301s
    to `https://china.com.py/aduana/` (Hostinger redirect, not a build phase). **couriers.com.py**
    — a separate sister site built later from the same template (courier comparison, Amazon/eBay/
    AliExpress, Miami casillas, PayPal/Wise/Payoneer). This site keeps China-origin shopping only
    and links to couriers.com.py from the courier guides once it is live (Backlog).

## 2. Content model

The template's content contract holds unchanged (README "Content model"). One addition, made in
T1 so that lane 2 phases never touch the same file:

- `content/services.php`, `content/guias.php`, `content/tools.php`, `content/segmentos.php` become
  **loaders**: `return array_merge(require __DIR__ . '/services/compras.php', …);` over one file
  per cluster in `content/services/`, `content/guias/`, `content/tools/`, `content/segmentos/`.
  Each cluster file keeps the parent file's header comment (key shape = contract).
- T1 creates EVERY planned record (§3) as a stub (valid keys, placeholder copy, `stub`-quality
  but verify-green) plus its route file and its `lead-values.php` record. Lane 2 replaces stub
  copy with real copy — it never adds or removes slugs (new slugs → Backlog / link pass).
- `content/affiliates.php` (new, T1): `id => ['label', 'url' => null, 'disclosure', 'category']`.
  `partials/affiliate-box.php` renders `affiliates: [ids]` from any record and hides entries
  with `url === null`. Planned ids: `temu`, `wise`, `payoneer`, `holafly`, `airalo`, `vpn`,
  `seguro-viaje`, `trip`, `civitatis`, `courier-1`, `courier-2`.
- `crmTag` scheme: `compras-*`, `importar-*`, `aduana-*`, `viajes-*`.
- Lead tiers: **A** importación llave en mano, flete contenedor, tour Feria de Cantón;
  **B** agente de compras, inspección, despacho aduanero, visa China, flete aéreo;
  **C** compras online / courier questions, calculator users.

## 3. Feature scope (every slug is created in T1, filled in lane 2)

### 3.A Compras online (L2-A) — traffic engine
Guides (`/comprar/<slug>/`, hub `/comprar/`): `temu-paraguay`, `shein-paraguay`, `alibaba-paraguay` (targets
"alibaba paraguay" + "alibaba en paraguay" + "comprar en alibaba desde paraguay" + "alibaba py"),
`1688-en-espanol`, `aliexpress-paraguay`, `courier-china-paraguay`, `casillas-courier-paraguay`
(comparison table, partner slots null), `impuestos-compras-online-paraguay`.
Service: `asesoria-compras-online` (tier C — "le ayudamos con su primer pedido / casilla").
Affiliates: temu, courier-1/2, wise. Each guide links the relevant tool (§3.T).
Priority order by volume: temu 9,900 → shein 6,600 → aliexpress 2,400 (+81 % YoY) → alibaba
~1,500 → 1688. `aliexpress-paraguay` gets the same depth as temu/shein.

### 3.T Herramientas (L2-B, Opus — money math)
1. `calculadora-costo-importacion` — landed cost: FOB + flete + seguro → CIF → tributos (every
   rate an editable input, defaults `null`/"consulte el monto vigente" unless in
   `market_table`), result in USD and ₲ (rate input). Lead capture "pedí cotización real".
2. `calculadora-cbm-contenedor` — cartons × dimensions → CBM, % of 20'/40'/40'HC, LCL vs FCL hint.
3. `calculadora-compras-online` — Temu/Shein order: price + courier ₲/kg × kg + tax inputs →
   total in ₲. Tier C lead.
Each: tool record, route, `assets/js/tools/<slug>.js` through `window.Market`, scripted test in
`tests/tools-<slug>.mjs`.

### 3.B Importar de China (L2-C) — money engine
Services (`/servicios/<slug>/`): `agente-de-compras-china`, `inspeccion-de-calidad`,
`flete-maritimo-contenedor` (FCL + contenedor compartido/LCL), `flete-aereo-china`,
`importacion-llave-en-mano`.
Guides: `como-importar-de-china-a-paraguay` (pillar, targets the 110/70/20 cluster),
`requisitos-para-importar-paraguay`, `como-ser-importador-paraguay`, `proveedores-chinos-confiables`,
`contenedor-compartido-desde-china`, `productos-para-importar-de-china`,
`pagar-a-proveedores-chinos` (wise/payoneer), `importadoras-en-paraguay` (210/mo — what an
importadora does vs. importing yourself; lead to llave-en-mano).

### 3.B2 Productos (L2-D) — long tail, segment template
`/importar/<producto>-de-china/` segment pages: `ropa`, `zapatillas`, `celulares`, `juguetes`,
`telas`, `repuestos-de-autos`, `maquinaria`, `motos`, `muebles`, `papeleria`. Each: traps
(certifications, sizes, MOQ, counterfeits), bundle of §3.B services, leadSlug
`agente-de-compras-china` (maquinaria/motos → `importacion-llave-en-mano`).

### 3.C Aduana (L2-E) — traffic + despachante leads
Hub `/aduana/` (page) with disclaimer. Guides (`/aduana/<slug>/`): `despachantes-de-aduana-paraguay` (curated list,
entries null until §7 — renders "próximamente" + lead form), `precio-despacho-aduanero-paraguay`,
`regimen-de-turismo-paraguay`, `cruzar-frontera-argentina-paraguay` (880/mo: what you may bring,
limits → facts-to-verify), `tributos-aduaneros-paraguay`, `ncm-nomenclatura-mercosur`,
`aduana-ciudad-del-este-encarnacion` (practical, not official), `aduana-clorinda` (480/mo,
+418 % YoY: Clorinda ↔ Puerto Falcón, puente San Ignacio de Loyola — hours, what you may bring,
both sides' rules → facts-to-verify).
Service: `despacho-aduanero` (via partner despachante, tier B).

### 3.D Viajar y negocios (L2-F)
Services: `visa-china` (for Paraguayan passports, via a partner agency, tier B),
`tour-negocios-china` (group trip Feria de Cantón + factory visits, tier A, waitlist form).
Guides (`/viajar-a-china/<slug>/`, except `/feria-de-canton/`): `feria-de-canton` (+ edition dates → facts-to-verify), `visa-china-para-paraguayos`,
`viajar-a-china-guia` (eSIM, VPN, Alipay/WeChat Pay, apps), `mejor-epoca-para-viajar-a-china`,
`que-ver-en-china`, `viaje-de-negocios-a-china`.
Affiliates: holafly, airalo, vpn, seguro-viaje, trip, civitatis.

### 3.E Páginas + blog (L2-G)
Pages: `/sobre/`, `/para-empresas/` (sell to couriers/despachantes/agents: featured listing,
leads — tier A lead to Anton), `/afiliados/` (disclosure), `/aviso-legal/` (not official).
Blog: 4 seed articles — Temu/Shein news angle, "comercio China–Paraguay 2026" (facts only from
cited public sources, else `null`), "Feria de Cantón: cómo prepararse", "errores al importar".

### 3.F Home + hubs (T1)
Home: three doors — Comprar online / Importar para vender / Viajar a China — plus aduana band,
the three tools, lead form. Hubs: `/servicios/`, `/guias/`, `/herramientas/`, `/comprar/`, `/importar/`,
`/aduana/`, `/viajar-a-china/`, `/blog/`, `/contacto/`. Cluster hubs list their cluster's records
from the content arrays (T1 builds one shared hub route pattern; lane 2 never edits hubs).

## 4. Autonomy protocol

Rules 1–15 of the `phased-autonomous-build` skill apply verbatim; summary:
1. Work until exit criteria pass; never ask permission for in-plan work.
2. One PR per phase, branch `phase/<id>` off latest main, merge when green. Lane 2 never waits
   for lane 2.
3. Minor issues → `docs/log/<id>.md` "Known issues"; keep building.
4. Stop only for a missing credential with no fallback or a bad-foundation decision. "Stop" =
   append the question to `docs/decisions-needed.md`, commit, push, end. Never wait in-session.
5. Missing env/config never blocks: document in `config.example.php`, degrade gracefully.
6. Prompts are re-runnable; WIP commit every 30 min.
7. Lane 2 hard limits: no `lib/**`, `partials/**` (except T1's two new partials, T1 only),
   `enviar.php`, `router.php`, `.htaccess`, `verify.sh`, `deploy/**`, CSS tokens,
   `content/lead-values.php`, `content/pages.php` (L2-G exception above), loaders, or another
   phase's Owns.
8. **Fable is never used** for phases, subagents, watcher or Routines. Opus and Sonnet only.
9. File ownership per the phase table; conflicts: main wins, re-apply yours, re-verify.
10. Handoff per `prompts/_handoff.md` (four gates, then spawn).
11. Phase log ≤ 12/8/8 lines + one Verification line; index line in §9.
12. Orientation read: prompt, §1, §4, own §, phase table, §9, Depends-on logs. Nothing else.
13. Polish cap: one screenshot pass (≤ 5 pages × 2 widths), one interaction pass for JS phases,
    PR body ≤ 25 lines written once.
14. Screenshots live in CI artifacts, never in git.
15. Decisions travel by files; never message a running session.
16. **Copy rules for this site:** Spanish (Paraguay), "usted"; answer the query in the first
    100 words; one table or checklist per guide; every figure either sourced (link) or in
    `docs/facts-to-verify.md`; no superlatives, no fake stats, no fake testimonials; never
    claim to be official, licensed or affiliated with DNA, DNIT, an embassy, Temu, Shein or
    Alibaba. Brand names are used descriptively only.
17. **Fan-out:** any phase with ≥ 4 same-shaped pages writes one exemplar, then fans the rest out
    to parallel Sonnet subagents (`fable-directs-sonnet-builds` §Fan-out); one verify, one PR.

## 5. Lane 1 phases

### T0 — Adopt (Sonnet, ≤ 30 min)
`origin` has no `main` yet. Bootstrap: create `main` from this plan branch
(`claude/nifty-curie-a53n4x`) and push it — the one direct push to main in this build. Then
`phase/T0` off main: `git remote add template https://github.com/antonmarklundcom/php-site-template`,
`git fetch template`, `git merge template/main --allow-unrelated-histories` (keep this repo's
`plan.md`, `prompts/*` and `docs/*` on conflict, but take the template's `prompts/_handoff.md`,
`prompts/_watcher.md`). Then README "Start a new site" steps 2–20 with: name "China-Paraguay",
domain `china.com.py`, slug `china-py`, market `py`, schemaType `['Organization']`,
contacts `null`. Delete the example content. Leave tokens/fonts as the template's (T1 swaps
tokens). Exit: verify green on repo and zip, PR merged.

### T1 — Structure + home (Opus, ≤ 90 min)
1. Loaders + cluster files (§2) for services, guias, tools, segmentos; verify must still read them.
2. Every §3 slug as a stub record + route file + `lead-values.php` record (tiers per §2,
   `whatsappText` naming the topic). `ui.php` clusters: `compras`, `importar`, `aduana`, `viajes`;
   needs chips: "Comprar en Temu/Shein/Alibaba", "Importar para vender", "Despacho aduanero",
   "Viaje / Feria de Cantón / visa".
3. `content/affiliates.php` + `partials/affiliate-box.php` (hides null urls, `rel="sponsored
   nofollow"`, disclosure line) + `partials/disclaimer-oficial.php`; wire both into the guide,
   service and segment templates via an optional record key (`affiliates`, `disclaimer`).
   This is a template-structure change and is allowed in T1 only.
4. `pages.php` complete: every hub and page key of §3.E/F with title/description/h1/lead.
5. Tokens: red/gold-free, trust palette (deep teal `#0f4c5c`-family + warm accent), AA checked.
   No China-flag clichés, no dragons.
6. Home per §3.F. Nav: Comprar online (`/comprar/`) · Importar · Aduana · Viajar · Herramientas · Blog.
7. `docs/facts-to-verify.md` created with the known unknowns list (§1.6).
8. Handoff: create the watcher Routine, then spawn L2-A, L2-B, L2-C, L2-E at once; the watcher
   starts L2-D, L2-F, L2-G as slots free up.
Exit: every §3 URL returns 200 (stubs render), verify green, loaders documented, PR merged.

## 6. Lane 2 phases
See each prompt file; §3 lists the slugs. Common exit: every owned stub replaced with full copy
(guides 900–1,600 words with steps + FAQ, services per the template's service brief, segments
per the segment shape), meta descriptions unique, `docs/facts-to-verify.md` entries appended
(append-only exception), verify green, PR merged.
**Link pass (LP):** after all lane 2 merges — `related[]`, `guides[]`, `toolLinks[]` between
clusters; home "más leídas"; nav check; promote open cross-phase issues to `KNOWN-ISSUES.md`;
delete the watcher Routine; closing report to Anton including the facts-to-verify list.

## 7. Human inputs (Anton)

| # | Input | First needed | Fallback |
|---|---|---|---|
| 1 | Domain `china.com.py` registered + pointed at the Hostinger slot; aduana.com.py 301 → `/aduana/` | deploy | — |
| 2 | Hostinger slot for the site | deploy (after LP) | zip only |
| 3 | VenderCRM tenant API key → `config.php` | deploy | log fallback |
| 4 | WhatsApp business number | T1 | WhatsApp hidden |
| 5 | **Fulfilment partners** (the business itself): ≥ 1 despachante de aduana, 1–2 couriers China→PY, 1 sourcing/inspection agent in China, 1 travel agency for visa + Cantón trips — and the referral terms | before launch | forms collect leads; Anton handles manually |
| 6 | Affiliate accounts: Temu affiliate, Wise, Payoneer, Holafly/Airalo, a VPN, travel insurance, Trip.com, Civitatis | anytime; fill `content/affiliates.php` | boxes hidden |
| 7 | Confirm `docs/facts-to-verify.md` items | before launch | "consulte el monto vigente" |
| 8 | Imagery — only when Anton writes "Generate image" | optional | typographic layout |
| 9 | Google Search Console + GA4 | deploy | — |

## 8. Open business questions (not build work)
- **aduana.com.py** (bought, USD 25): redirect now; split into its own site only if `/aduana/`
  outgrows this one (signal: > 3k visits/mo to the cluster). Must never look official.
- **couriers.com.py**: sister site — "courier paraguay" 5,400/mo, amazon paraguay 4,400, paypal
  paraguay 2,400, ebay paraguay 1,300. Monetised by couriers paying for leads/featured slots.
  Own plan + build after this site's link pass.
- Revenue share with partners: per-lead fee vs. % of freight/clearance. Start per-lead, move to %
  once volumes are known.
- A paid "Importá de China" course / WhatsApp community — after 3 months of lead data.
- Spanish-LatAm expansion (AR/BO/UY) for the travel/Cantón cluster.

## 9. Build log index
(one line per phase: id — PR — `docs/log/<id>.md`)

## 10. Backlog
- AdSense once traffic > 30k/mo.
- NCM lookup tool (needs the full nomenclature dataset).
- Yuan ↔ guaraní converter with a live rate source.
- Supplier/agent directory with paid featured listings (would outgrow the no-DB template).
- Portuguese version for Brazil-border traffic.

# BUSINESS.md: china.com.py, phase 1 (business development)

Status 2026-09-30. Phase 1 research, then the launch copy changes in §7. Sources: `plan.md`,
`docs/kwp-data.csv` (Google Keyword Planner, Paraguay, Sept 2026) and web research. The research
came from search snippets only; the sites themselves were egress-blocked, so **every competitor
price below is unverified**. Rates: USD 1 ≈ Gs 7,300 and 1 SEK ≈ Gs 740 (approx.).

## 1. What is built, and what isn't

| Area | State |
|---|---|
| Code | **Built.** PHP 8.2 on php-site-template. `./verify.sh` **PASS**: 88 routes, 78 pages with unique meta, no PHP warnings, lead routing, content integrity. |
| Content | **Built, no stubs.** About 50 guides, services and product pages (~68k words), 4 blog posts, 3 calculators and the `/cotizar/` wizard. Aduana copy already says DNIT (Ley 7143/2023). |
| Lead pipe | `enviar.php` → VenderCRM, with fallback to `logs/leads.log`. WhatsApp +595 995 628862. |
| **Placeholders** | **No partners** ("próximamente" despachante list; `courier-1/2` null). **All 12 affiliate URLs null.** Email, legal name and testimonials are null. `config.php` (CRM key) is not in the repo. |
| Live | DNS → Hostinger. The site shows the **Hostinger default page** because it was never deployed. |

**Verdict: technically deploy-ready (code 9/10), not business-ready (3/10).** Deploying takes
about 30 minutes, but nobody would fulfil the leads and nobody would pay for them.

## 2. Demand (KWP, Paraguay, searches/month)

| Theme | Vol/mo | Top CPC | Reading |
|---|---|---|---|
| Temu/Shein/AliExpress/Alibaba "paraguay" | ~20,000 | Gs 150–5,600 | Traffic. temu 9,900, shein ~7,000, **aliexpress 2,400 (+81 % YoY)**, alibaba 720. |
| Aduana (+CDAP, Clorinda, AR-PY border) | ~12,000 | Gs 3,300–7,000 | Mostly navigational (aduana 8,100, CDAP 1,600). "despachante" terms ~250. |
| Courier (generic) | ~5,600 | Gs 1,500–5,200 | Planned for couriers.com.py; "courier china paraguay" is only 40. |
| **Importar de China (B2B)** | **~850** | **Gs 5,500–13,000** | Small volume, highest intent: importadoras 210, cómo importar 110, forwarder 50, proveedores ~80. |
| Feria de Cantón | ~200 | Gs 1,100–4,200 | Seasonal (April/October), high ticket. |
| Productos chinos / al por mayor | ~100 | up to Gs 9,000 | Long tail. |
| DNIT | not measured | — | Not in the export, and the keyword-library MCP is not connected in this session. |

The market is large: imports from China were **USD 6.1 bn in 2025, 34.5 % of Paraguay's
imports, +18 %** (BCP, Dic 2025). Realistic capture by month 6 is 1,500–4,000 visits a month,
producing **10–20 B2B leads** and 20–60 consumer questions.

## 3. Who pays: competitors, programs and lead value

| Player | Type | Published offer (unverified) | Pays for leads? |
|---|---|---|---|
| Fixo Cargo (fixocargo.com.py) | Courier, China casilla | Air USD 34/kg, sea USD 15/kg, 31 branches | Franchise only |
| Aerobox / Unbox / FastBox | Courier, China casilla | Air USD 34–36/kg, sea USD 15/kg | No public program |
| Paraguay Courier (paraguaycourier.com) | Courier, LCL, buying | LCL from USD 150/CBM + USD 150 local costs; buying 15 % | Franchise only |
| Alfa Trading (CDE), Velocity | Forwarder / LCL + content | Import guides, cost calculator | Unknown; they also compete on SEO |
| **china-paraguay.com** (Asunción Service SRL) | Turnkey import agent | 12+ years, no prices | Unknown. **Same brand name as ours.** |
| Ancla (ancla-asia.com), Chilat | Sourcing office / agent | Canton Fair service; agent fee 3–10 % | Unknown |
| Despachantes (CDAP) | Customs | Minimum fee by Ley 220/93: Gs 250k + 1 % CIF (Gs 10–50M band) | Negotiable |

**Affiliates:** AliExpress Portals pays 3–9 %. Alibaba.com pays 5.6 % on a new buyer outside the
core countries, capped at USD 350. Temu (5–20 %) and Wise are **not confirmed for Paraguay**.
Payoneer refer-a-friend pays USD 25–250, gated by volume. The Canton Fair has no program, so
the money there is in travel agencies. **Couriers:** they price the same (USD 33–36/kg), run
franchises rather than referrals, and a consumer customer is worth little to them.

**Lead value (expected, per qualified lead):**

| Payer | What a deal is worth to them | Close rate | **Fair fee to us** |
|---|---|---|---|
| Sourcing/QC agent | USD 5–15k order × 5–10 % = USD 250–1,500 | ~20 % | **Gs 150–400k**, or 20–30 % of the first commission |
| LCL/air forwarder | 2–5 CBM, USD 600–2,000 invoice, ~25 % margin | ~25 % | **Gs 100–250k** |
| Despachante | Fee Gs 0.75–1.5M per dispatch | ~30 % | **Gs 75–150k** |
| Canton Fair agency | USD 3–5k package × 10 % | pay on booking | **Gs 300–700k per traveller** |
| Courier (consumer signup) | ~USD 25 margin per shipment | — | Gs 10–30k, not worth selling |
| Affiliate (AliExpress order) | ~USD 30 basket | — | Gs 7–20k per order |

This is consistent with Google Ads: "importar de china a paraguay" at Gs 7,700 a click and a 5 %
conversion rate works out to about Gs 150k per lead.
**At month 6–9:** 15 B2B leads × about Gs 200k is **Gs 3M/month (~USD 400)** on per-lead fees.
Revenue share on closed deals could make that Gs 6–10M.

## 4. Recommendation: B2B importers, consumers as funnel

**Primary model: sell qualified import leads (and later a revenue share) to one sourcing agent,
one forwarder and one despachante.** Consumer Temu/Shein/AliExpress traffic feeds the funnel
and earns small affiliate income. It is not the business.

**At launch the site must have:**
1. 3 named partners with written terms: a Spanish-speaking agent in China, an LCL/air forwarder
   to Asunción/CDE, and a CDAP despachante. The "próximamente" entries get replaced.
2. A qualified-lead definition: product, quantity, budget ≥ USD 3,000, reachable phone, and a RUC
   or intent to import.
3. An email alert on every lead (Resend) and a 24 h reply SLA.
4. AliExpress Portals and Alibaba affiliate links. Temu and Wise only if Paraguay qualifies.
5. The brand decision in §6 (#1) resolved before any press or partner outreach.

## 5. Deploy checklist

1. hPanel → china.com.py → File Manager: delete `public_html/default.php` (Git deploy needs an
   empty folder). Set PHP to 8.2+.
2. Advanced → Git: repo `antonmarklundcom/china`, branch `main`, empty install path → Deploy.
   Add the webhook in GitHub for auto-deploy (no Actions minutes).
3. **Env:** `public_html/config.php` holds `SITE_URL=https://china.com.py`,
   `VENDERCRM_URL=https://crm.clientes.com.py` and `VENDERCRM_API_KEY`, plus `RESEND_API_KEY`,
   `LEAD_NOTIFY_TO` and `LEAD_FROM` (verify SPF/DKIM). Leave GA4 empty.
4. **Domain:** DNS already points to Hostinger. Turn on SSL and check that http and www both 301
   to `https://china.com.py`. If you register `aduana.com.py` (not owned yet), redirect it (301) to `/aduana/`.
5. **Smoke test:** run `deploy/verify-live.sh`. Submit `/cotizar/` and confirm the lead reaches
   VenderCRM as `+595…`. `/config.php` and `/plan.md` must answer 403/404.
6. **Search Console:** add the domain property, submit the sitemap, and request indexing for 5 URLs.

## 6. Path to 9/10

| Axis | Now | Needed for 9/10 |
|---|---|---|
| Code | 9 | Keep as is. Images only on "Generate image". |
| Content | 8 | Verify the courier ≤ USD 100 regime and the DNIT resolutions (26/25, 30/25). Pull KWP for DNIT. |
| **Business** | **3** | 3 signed partners, the lead definition, fees, and 2 working affiliate links. |
| Trust | 5 | Email, legal name/RUC on `/aviso-legal/`, and a brand that isn't confused with china-paraguay.com. |
| Ops | 4 | Lead email alert, 24 h SLA, monthly partner report (`deploy/leads-to-csv.php`). |
| Proof | 0 | 60 days live: leads by tier, close rate, Gs per lead. |

## 7. Decisions (Anton, 2026-09-30)

1. **Brand stays "China-Paraguay"** on china.com.py. Known risk: china-paraguay.com (Asunción
   Service SRL) sells turnkey imports under the same name. Revisit if it causes confusion.
2. **Model: B2B lead-gen for importers.** Consumer guides stay as the traffic funnel.
3. **Now: SEO traffic only, monetise later.** No partner fees yet. Anton answers leads himself
   and recruits partners (agent, forwarder, despachante) once leads arrive. §3 fees are the
   price list for those talks.
4. **Deploy as soon as possible.** Launch copy changes: the home hero leads with "Le ayudamos a
   importar de China", its CTA opens `/cotizar/?need=importar`, Importar is the first door, the
   import pillar is first in "más leídas", and the "próximamente" despachante-list promises are
   gone.

# Keyword research — Google Keyword Planner, location Paraguay, Sept 2026

> **Full raw data:** `docs/kwp-data.csv` — every keyword exported so far (keyword, avg monthly
> searches, top-of-page bid low/high in SEK), deduplicated, sorted by volume. Append new KWP
> exports there; this file is the summary.

Monthly searches (avg). CPC = top-of-page bid range in SEK as exported. Only the terms that
drive the plan are listed; everything at 10/mo is long tail and is covered by guide sections.

## Cluster A — Compras online (traffic engine)
| Keyword | Vol | Comp. | Top bid (kr) |
|---|---|---|---|
| temu paraguay | 9,900 | Low | 0.21–3.97 |
| shein paraguay | 6,600 | Low | 0.08–0.20 |
| alibaba paraguay / alibaba en paraguay | 720 / 720 | Med | 0.22–7.54 |
| shein py | 170 | Low | — |
| shein paraguay precio | 110 | Low | — |
| 1688 com en español (+ variants) | ~130 | Med | 1.12–5.68 |
| courier china paraguay | 40 | Med | 2.00–5.82 |
| alibaba com paraguay | 30 | Med | 0.25–16.35 |
| shein hace envíos / llega a paraguay | 20 / 20 | Low | — |

## Cluster B — Importar de China (money engine)
| Keyword | Vol | Comp. | Top bid (kr) |
|---|---|---|---|
| importadoras del paraguay / en paraguay | 210 / 210 | Low | 2.97–9.13 |
| como importar de china a paraguay | 110 | High | 2.02–8.84 |
| importar de china a paraguay | 70 | High | 2.44–10.42 |
| proveedores chinos / desde china | 30 / 30 | High | 3.55–12.79 |
| importar desde china a paraguay | 20 | High | 2.55–12.01 |
| empresas para importar desde china | 10 | High | 3.91–17.49 |
| agentes de compras en china | 10 | High | 5.23–7.91 |
| importar ropa / zapatillas / celulares / juguetes / telas de china | 10 each | Med–High | up to 13.93 |

## Cluster C — Aduana
| Keyword | Vol | Comp. | Top bid (kr) |
|---|---|---|---|
| aduana paraguay / paraguay aduana | 8,100 | Low | 4.53–9.49 |
| centro de despachantes de aduanas del paraguay | 1,600 | Low | — |
| aduana argentina paraguay | 880 | Low | — |
| aduana py | 320 | Low | — |
| aduana asuncion | 170 | Low | — |
| despachante de aduana paraguay | 110 | Low | 3.07–6.46 |
| aduana paraguay en vivo | 110 | Low | — |
| despacho aduanero paraguay | 50 | Low | 2.65–6.82 |
| lista de despachantes de aduana paraguay | 40 | Low | 3.20–7.93 |
| aduana de encarnación / ciudad del este | 40 / 30 | Low | — |
| precio de despacho aduanero en paraguay | 30 | Low | — |

## Cluster D — Viajar y negocios
| Keyword | Vol | Comp. | Top bid (kr) |
|---|---|---|---|
| feria de canton / feria de guangzhou / feria de canton 2026 | 70 / 70 / 70 | Med | 1.49–5.65 |
| feria canton | 40 | Low | 2.98–5.32 |
| viajar a china | 20 | Med | 0.42–2.01 |
| visa china (all variants) | ≤ 10 each | — | — |
| holafly china | 10 | High | 8.55–34.33 |

## Reading
- Paraguay volume sits in A and C; commercial value (CPC) sits in B. Build A and C for
  traffic, convert it into B leads.
- Visa and tourism have almost no PY volume → one service + a small guide set, not a cluster;
  re-check with AR/BO/UY/CL locations before expanding.
- "aduana paraguay" 8,100 is mostly navigational (people looking for the DNA site); expect a
  fraction of it, and only with practical, clearly unofficial content.

## Round 2 (Sept 2026)
| Keyword | Vol | Comp. | Top bid (kr) | Goes to |
|---|---|---|---|---|
| courier paraguay / courier en paraguay | 5,400 | Low | 1.99–5.63 | couriers.com.py |
| amazon paraguay / amazon en paraguay | 4,400 | Low | 1.37–8.14 | couriers.com.py |
| aliexpress paraguay | 2,400 (+81 % YoY) | Low | 0.30–4.17 | this site, §3.A |
| paypal paraguay (py / en paraguay) | 2,400 | Low | 1.67–3.77 | couriers.com.py |
| ebay paraguay | 1,300 | Low | 1.17–6.45 | couriers.com.py |
| aduana clorinda | 480 (+418 % YoY) | Low | — | this site, §3.C |
| compras online paraguay | 320 | Med | 2.29–18.44 | couriers.com.py |
| wise paraguay / payoneer paraguay | 320 / 320 | Low | 3.2–14.3 | both (affiliate) |
| paypal funciona en paraguay | 320 | Low | — | couriers.com.py |
| como comprar en temu desde paraguay | 70 | Low | — | this site, §3.A |
| empresas de courier en paraguay | 70 | Low | 2.47–7.03 | couriers.com.py |
| puente san ignacio de loyola | 70 | Low | — | this site, §3.C |
| forwarder paraguay | 50 | Med | 3.96–12.25 | this site, §3.B |
| Argentina/Bolivia import + visa + Cantón terms | ≤ 10 each | — | — | no LatAm expansion |

## Coverage check (2026-09-25)
Every keyword in `kwp-data.csv` with volume ≥ 30 or a top bid ≥ 8 kr, matched against the
existing records. No new KWP export was needed for this pass (the long tail is all 10/mo).

| Keyword(s) | Vol | Top bid (kr) | Page |
|---|---|---|---|
| payoneer paraguay / payoneer funciona en paraguay | 320 / 70 | 14.29 | new `/importar/payoneer-paraguay/` |
| wise paraguay | 320 | 13.11 | new `/importar/wise-paraguay/` |
| aduana asuncion / aduana paraguay en vivo / teléfono / dirección nacional de aduanas | 170 / 110 / 30 / 40 | — | new `/aduana/aduana-asuncion/` |
| centro de despachantes de aduanas del paraguay / cdap / camara aduana / lista de despachantes / auxiliar | 1,600 / 70 / 90 / 40 / 30 | 7.93 | section in `/aduana/despachantes-de-aduana-paraguay/` |
| forwarder / freight forwarder / fletes internacionales / empresas de transporte internacional | 50 / 10 / 30 / 30 | 12.25 | new `/servicios/agente-de-carga-internacional/` |
| compras por internet paraguay / mejores tiendas online / venta online | 30 / 50 / 50 | 23.51 | new `/comprar/compras-por-internet-paraguay/` |
| feria de canton 2026 / feria de guangzhou | 70 / 70 | 5.65 | terms added to `/feria-de-canton/` |
| amazon, ebay, paypal (+ variants), courier brasil / internacional | 30–4,400 | ≤ 8.14 | couriers.com.py (plan §1.10), not this site |
| alexa precio paraguay | 390 | 0.70 | out of scope |
| holafly china | 10 | 34.33 | affiliate box on the travel guide once the Holafly URL exists |

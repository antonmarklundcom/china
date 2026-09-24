<?php
/**
 * The how-to guides under /guias/, keyed by slug — same shape discipline as
 * content/services.php and content/tools.php.
 *
 * Why this content type exists: a how-to query ("cómo se hace X") is answered
 * only partly by a service page. A guide answers it in full, then offers the
 * "¿prefiere que lo hagamos nosotros?" box to hand the task over — which is why
 * every guide names a relatedService.
 *
 *   path             string   URL, trailing slash
 *   title            string   the guide's concept, used as the title fallback
 *   navLabel         string   short label for the hub, the nav and the footer
 *   seoTitle         string   <title> without the site suffix, <= 41 chars
 *   metaDescription  string   120–155 chars, unique across the whole site
 *   lastReviewed     string   ISO date, shown next to the "orientativo" note
 *   hero             array    eyebrow, h1, lead
 *   intro            string[] 2–3 paragraphs read before the numbered steps
 *   steps            array    [['title' => ..., 'body' => string[]], ...] →
 *                             both the visible numbered list and the HowTo
 *                             JSON-LD (templates/guide.php builds both from
 *                             this one array)
 *   faq              array    [['q' => ..., 'a' => ...], ...] → FAQPage JSON-LD
 *   relatedService   ?string  slug into content/services.php AND
 *                             content/lead-values.php — the delegate box's form,
 *                             WhatsApp prefill and next-step text all resolve
 *                             from this one slug
 *   toolLink         ?array   ['path' => ..., 'label' => ..., 'text' => ...]
 *   related          string[] 2–3 sibling guide slugs
 *   example          bool     seed record only — see content/services.php
 */

/* Cluster file loaded by content/guias.php. Cluster: aduana. */

declare(strict_types=1);

return [

    'despachantes-de-aduana-paraguay' => [
        'draft' => true,
        'path' => '/aduana/despachantes-de-aduana-paraguay/',
        'title' => 'Despachantes de aduana en Paraguay',
        'navLabel' => 'Despachantes de aduana',
        'cluster' => 'aduana',
        'seoTitle' => 'Despachantes de aduana en Paraguay',
        'metaDescription' => 'Qué hace un despachante de aduana en Paraguay, cómo verificar que esté matriculado, qué documentos le pide y cómo pedir cotización.',
        'lastReviewed' => '2026-09-24',
        'hero' => [
            'eyebrow' => 'Guía',
            'h1' => 'Despachantes de aduana en Paraguay',
            'lead' => 'Qué hace un despachante de aduana en Paraguay, cómo verificar que esté matriculado, qué documentos le pide y cómo pedir cotización.',
        ],
        'intro' => [
            'Contenido en preparación.',
        ],
        'steps' => [
            [
                'title' => 'En preparación',
                'body' => [
                    'Contenido en preparación.',
                ],
            ],
        ],
        'table' => null,
        'faq' => [],
        'relatedService' => 'despacho-aduanero',
        'toolLink' => null,
        'related' => [],
        'affiliates' => [],
        'disclaimer' => true,
        'image' => null,
    ],

    'precio-despacho-aduanero-paraguay' => [
        'draft' => true,
        'path' => '/aduana/precio-despacho-aduanero-paraguay/',
        'title' => 'Precio del despacho aduanero en Paraguay',
        'navLabel' => 'Precio del despacho',
        'cluster' => 'aduana',
        'seoTitle' => 'Precio del despacho aduanero en Paraguay',
        'metaDescription' => 'De qué depende el precio del despacho aduanero en Paraguay: honorarios del despachante, tasas, depósito y gastos, y cómo comparar cotizaciones.',
        'lastReviewed' => '2026-09-24',
        'hero' => [
            'eyebrow' => 'Guía',
            'h1' => 'Precio del despacho aduanero en Paraguay',
            'lead' => 'De qué depende el precio del despacho aduanero en Paraguay: honorarios del despachante, tasas, depósito y gastos, y cómo comparar cotizaciones.',
        ],
        'intro' => [
            'Contenido en preparación.',
        ],
        'steps' => [
            [
                'title' => 'En preparación',
                'body' => [
                    'Contenido en preparación.',
                ],
            ],
        ],
        'table' => null,
        'faq' => [],
        'relatedService' => 'despacho-aduanero',
        'toolLink' => null,
        'related' => [],
        'affiliates' => [],
        'disclaimer' => true,
        'image' => null,
    ],

    'regimen-de-turismo-paraguay' => [
        'draft' => true,
        'path' => '/aduana/regimen-de-turismo-paraguay/',
        'title' => 'Régimen de turismo en Paraguay: qué es',
        'navLabel' => 'Régimen de turismo',
        'cluster' => 'aduana',
        'seoTitle' => 'Régimen de turismo en Paraguay',
        'metaDescription' => 'Qué es el régimen de turismo en Paraguay, para qué mercadería se usa, cómo afecta a las compras en Ciudad del Este y dónde leer la norma.',
        'lastReviewed' => '2026-09-24',
        'hero' => [
            'eyebrow' => 'Guía',
            'h1' => 'Régimen de turismo en Paraguay: qué es',
            'lead' => 'Qué es el régimen de turismo en Paraguay, para qué mercadería se usa, cómo afecta a las compras en Ciudad del Este y dónde leer la norma.',
        ],
        'intro' => [
            'Contenido en preparación.',
        ],
        'steps' => [
            [
                'title' => 'En preparación',
                'body' => [
                    'Contenido en preparación.',
                ],
            ],
        ],
        'table' => null,
        'faq' => [],
        'relatedService' => 'despacho-aduanero',
        'toolLink' => null,
        'related' => [],
        'affiliates' => [],
        'disclaimer' => true,
        'image' => null,
    ],

    'cruzar-frontera-argentina-paraguay' => [
        'draft' => true,
        'path' => '/aduana/cruzar-frontera-argentina-paraguay/',
        'title' => 'Aduana entre Argentina y Paraguay: qué puede llevar',
        'navLabel' => 'Frontera Argentina–Paraguay',
        'cluster' => 'aduana',
        'seoTitle' => 'Aduana Argentina–Paraguay: qué llevar',
        'metaDescription' => 'Qué controla la aduana al cruzar entre Argentina y Paraguay: franquicia, compras, documentos y pasos fronterizos, con enlaces a la fuente oficial.',
        'lastReviewed' => '2026-09-24',
        'hero' => [
            'eyebrow' => 'Guía',
            'h1' => 'Aduana entre Argentina y Paraguay: qué puede llevar',
            'lead' => 'Qué controla la aduana al cruzar entre Argentina y Paraguay: franquicia, compras, documentos y pasos fronterizos, con enlaces a la fuente oficial.',
        ],
        'intro' => [
            'Contenido en preparación.',
        ],
        'steps' => [
            [
                'title' => 'En preparación',
                'body' => [
                    'Contenido en preparación.',
                ],
            ],
        ],
        'table' => null,
        'faq' => [],
        'relatedService' => 'despacho-aduanero',
        'toolLink' => null,
        'related' => [],
        'affiliates' => [],
        'disclaimer' => true,
        'image' => null,
    ],

    'aduana-clorinda' => [
        'draft' => true,
        'path' => '/aduana/aduana-clorinda/',
        'title' => 'Aduana de Clorinda y puente San Ignacio de Loyola',
        'navLabel' => 'Aduana de Clorinda',
        'cluster' => 'aduana',
        'seoTitle' => 'Aduana de Clorinda: cruce a Paraguay',
        'metaDescription' => 'Cómo es el cruce por Clorinda y el puente San Ignacio de Loyola hacia Puerto Falcón: controles, documentos y qué puede llevar.',
        'lastReviewed' => '2026-09-24',
        'hero' => [
            'eyebrow' => 'Guía',
            'h1' => 'Aduana de Clorinda y puente San Ignacio de Loyola',
            'lead' => 'Cómo es el cruce por Clorinda y el puente San Ignacio de Loyola hacia Puerto Falcón: controles, documentos y qué puede llevar.',
        ],
        'intro' => [
            'Contenido en preparación.',
        ],
        'steps' => [
            [
                'title' => 'En preparación',
                'body' => [
                    'Contenido en preparación.',
                ],
            ],
        ],
        'table' => null,
        'faq' => [],
        'relatedService' => 'despacho-aduanero',
        'toolLink' => null,
        'related' => [],
        'affiliates' => [],
        'disclaimer' => true,
        'image' => null,
    ],

    'tributos-aduaneros-paraguay' => [
        'draft' => true,
        'path' => '/aduana/tributos-aduaneros-paraguay/',
        'title' => 'Tributos aduaneros en Paraguay: cómo se calculan',
        'navLabel' => 'Tributos aduaneros',
        'cluster' => 'aduana',
        'seoTitle' => 'Tributos aduaneros en Paraguay',
        'metaDescription' => 'Qué tributos se pagan al importar en Paraguay, sobre qué base se calculan (valor CIF) y por qué el total depende de la posición arancelaria.',
        'lastReviewed' => '2026-09-24',
        'hero' => [
            'eyebrow' => 'Guía',
            'h1' => 'Tributos aduaneros en Paraguay: cómo se calculan',
            'lead' => 'Qué tributos se pagan al importar en Paraguay, sobre qué base se calculan (valor CIF) y por qué el total depende de la posición arancelaria.',
        ],
        'intro' => [
            'Contenido en preparación.',
        ],
        'steps' => [
            [
                'title' => 'En preparación',
                'body' => [
                    'Contenido en preparación.',
                ],
            ],
        ],
        'table' => null,
        'faq' => [],
        'relatedService' => 'despacho-aduanero',
        'toolLink' => null,
        'related' => [],
        'affiliates' => [],
        'disclaimer' => true,
        'image' => null,
    ],

    'ncm-nomenclatura-mercosur' => [
        'draft' => true,
        'path' => '/aduana/ncm-nomenclatura-mercosur/',
        'title' => 'NCM: la nomenclatura común del Mercosur',
        'navLabel' => 'NCM Mercosur',
        'cluster' => 'aduana',
        'seoTitle' => 'NCM: nomenclatura del Mercosur',
        'metaDescription' => 'Qué es la NCM, cómo se lee una posición arancelaria del Mercosur y por qué clasificar bien su producto cambia lo que paga en aduana.',
        'lastReviewed' => '2026-09-24',
        'hero' => [
            'eyebrow' => 'Guía',
            'h1' => 'NCM: la nomenclatura común del Mercosur',
            'lead' => 'Qué es la NCM, cómo se lee una posición arancelaria del Mercosur y por qué clasificar bien su producto cambia lo que paga en aduana.',
        ],
        'intro' => [
            'Contenido en preparación.',
        ],
        'steps' => [
            [
                'title' => 'En preparación',
                'body' => [
                    'Contenido en preparación.',
                ],
            ],
        ],
        'table' => null,
        'faq' => [],
        'relatedService' => 'despacho-aduanero',
        'toolLink' => null,
        'related' => [],
        'affiliates' => [],
        'disclaimer' => true,
        'image' => null,
    ],

    'aduana-ciudad-del-este-encarnacion' => [
        'draft' => true,
        'path' => '/aduana/aduana-ciudad-del-este-encarnacion/',
        'title' => 'Aduana en Ciudad del Este y Encarnación',
        'navLabel' => 'Ciudad del Este y Encarnación',
        'cluster' => 'aduana',
        'seoTitle' => 'Aduana en Ciudad del Este y Encarnación',
        'metaDescription' => 'Cómo funcionan los pasos de frontera de Ciudad del Este y Encarnación para compras y mercadería, qué se controla y dónde informarse.',
        'lastReviewed' => '2026-09-24',
        'hero' => [
            'eyebrow' => 'Guía',
            'h1' => 'Aduana en Ciudad del Este y Encarnación',
            'lead' => 'Cómo funcionan los pasos de frontera de Ciudad del Este y Encarnación para compras y mercadería, qué se controla y dónde informarse.',
        ],
        'intro' => [
            'Contenido en preparación.',
        ],
        'steps' => [
            [
                'title' => 'En preparación',
                'body' => [
                    'Contenido en preparación.',
                ],
            ],
        ],
        'table' => null,
        'faq' => [],
        'relatedService' => 'despacho-aduanero',
        'toolLink' => null,
        'related' => [],
        'affiliates' => [],
        'disclaimer' => true,
        'image' => null,
    ],

];

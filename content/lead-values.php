<?php
/**
 * The lead value model. ONE record per source — every service slug, every tool
 * slug, every "¿qué necesita?" chip — plus the neutral default for pages that
 * are none of those.
 *
 * Nothing else on the site decides a tier, a conversion value or a WhatsApp
 * prefill: pages read this through lib/helpers.php's lead_value() and
 * whatsapp_text_for_page(), so retuning the model after a few weeks of GA4 data
 * is one edit here and no page changes.
 *
 * Record shape (every key required unless noted):
 *
 *   menuLabel     string   the short human name this source goes by in the
 *                          WhatsApp menu and in the CRM's `servicio` field. Page
 *                          titles are often frozen for SEO and too terse to read
 *                          as a menu option, which is why this exists
 *   need          string   key into ui('needs') — the chip this source maps to,
 *                          or a key in 'needLabels' below for sources with no
 *                          chip of their own
 *   tier          string   'A' | 'B' | 'C' — how much this source is worth
 *   whatsappText  string   the wa.me prefill. Names the service the visitor was
 *                          reading about — never a generic "consulta gratis"
 *   nextStep      string[] 2–3 lines shown after submit: what to have ready.
 *                          This is the second touch; it is worth reading
 *   crmTag        string   lands on the VenderCRM timeline as fields.etiqueta —
 *                          see the note on tags in enviar.php
 *   nextLink      ?array   optional ['path' => ..., 'label' => ...] tool or guide
 *                          offered alongside the thank-you text. The path must
 *                          resolve to a real route file; verify.sh checks it
 *
 * Adding a source: add a record keyed by its slug. Pages resolve by slug, so a
 * new guide or segment page joins the model by adding a key here.
 */

declare(strict_types=1);

/* The Google Ads conversion value per tier, in whole units of the market's
   currency (content/site.php 'market'). These are OPTIMISATION PROXIES, not
   revenue estimates: they exist so smart bidding favours a retainer lead over a
   calculator lead by roughly 10:1. Retune the ratio here, and re-scale the
   numbers when the site's market — and therefore its currency — changes. */
$tierValues = [
    'A' => 1000000,
    'B' => 400000,
    'C' => 100000,
];

/* Labels for `need` keys that are not one of the form chips, so the CRM reads a
   sentence instead of a raw key. */
$needLabels = [
    'recordatorio' => 'Aviso de cambios en las reglas',
];

return [
    'tierValues' => $tierValues,
    'needLabels' => $needLabels,
    'whatsappMenu' => [
        'importacion-llave-en-mano',
        'agente-de-compras-china',
        'despacho-aduanero',
        'asesoria-compras-online',
    ],
    'default' => [
        'menuLabel' => 'Consulta general',
        'need' => 'importar',
        'tier' => 'C',
        'whatsappText' => 'Hola, vi china.com.py y quisiera hacer una consulta sobre comprar o importar de China.',
        'nextStep' => [
            'Le respondemos dentro del siguiente día hábil.',
            'Cuéntenos qué producto quiere traer y en qué cantidad.',
        ],
        'crmTag' => 'consulta-general',
        'nextLink' => null,
    ],
    'services' => [
        'asesoria-compras-online' => [
            'menuLabel' => 'Asesoría compras online',
            'need' => 'compras',
            'tier' => 'C',
            'whatsappText' => 'Hola, vi la página de asesoría compras online en china.com.py y quisiera consultar.',
            'nextStep' => [
                'Le respondemos dentro del siguiente día hábil.',
                'Tenga a mano qué producto, qué cantidad y para cuándo lo necesita.',
            ],
            'crmTag' => 'compras-asesoria-compras-online',
            'nextLink' => null,
        ],
        'agente-de-compras-china' => [
            'menuLabel' => 'Agente de compras en China',
            'need' => 'importar',
            'tier' => 'B',
            'whatsappText' => 'Hola, vi la página de agente de compras en china en china.com.py y quisiera consultar.',
            'nextStep' => [
                'Le respondemos dentro del siguiente día hábil.',
                'Tenga a mano qué producto, qué cantidad y para cuándo lo necesita.',
            ],
            'crmTag' => 'importar-agente-de-compras-china',
            'nextLink' => null,
        ],
        'inspeccion-de-calidad' => [
            'menuLabel' => 'Inspección de calidad',
            'need' => 'importar',
            'tier' => 'B',
            'whatsappText' => 'Hola, vi la página de inspección de calidad en china.com.py y quisiera consultar.',
            'nextStep' => [
                'Le respondemos dentro del siguiente día hábil.',
                'Tenga a mano qué producto, qué cantidad y para cuándo lo necesita.',
            ],
            'crmTag' => 'importar-inspeccion-de-calidad',
            'nextLink' => null,
        ],
        'flete-maritimo-contenedor' => [
            'menuLabel' => 'Flete marítimo y contenedor',
            'need' => 'importar',
            'tier' => 'A',
            'whatsappText' => 'Hola, vi la página de flete marítimo y contenedor en china.com.py y quisiera consultar.',
            'nextStep' => [
                'Le respondemos dentro del siguiente día hábil.',
                'Tenga a mano qué producto, qué cantidad y para cuándo lo necesita.',
            ],
            'crmTag' => 'importar-flete-maritimo-contenedor',
            'nextLink' => null,
        ],
        'flete-aereo-china' => [
            'menuLabel' => 'Flete aéreo',
            'need' => 'importar',
            'tier' => 'B',
            'whatsappText' => 'Hola, vi la página de flete aéreo en china.com.py y quisiera consultar.',
            'nextStep' => [
                'Le respondemos dentro del siguiente día hábil.',
                'Tenga a mano qué producto, qué cantidad y para cuándo lo necesita.',
            ],
            'crmTag' => 'importar-flete-aereo-china',
            'nextLink' => null,
        ],
        'agente-de-carga-internacional' => [
            'menuLabel' => 'Agente de carga internacional',
            'need' => 'importar',
            'tier' => 'B',
            'whatsappText' => 'Hola, vi la página de agente de carga internacional en china.com.py y quisiera cotizar un envío desde China.',
            'nextStep' => [
                'Le respondemos dentro del siguiente día hábil.',
                'Tenga a mano el volumen (CBM), el peso bruto, el Incoterm y la ciudad de retiro en China.',
            ],
            'crmTag' => 'importar-agente-de-carga-internacional',
            'nextLink' => ['path' => '/herramientas/calculadora-cbm-contenedor/', 'label' => 'Calcular el volumen de su carga'],
        ],
        'importacion-llave-en-mano' => [
            'menuLabel' => 'Importación llave en mano',
            'need' => 'importar',
            'tier' => 'A',
            'whatsappText' => 'Hola, vi la página de importación llave en mano en china.com.py y quisiera consultar.',
            'nextStep' => [
                'Le respondemos dentro del siguiente día hábil.',
                'Tenga a mano qué producto, qué cantidad y para cuándo lo necesita.',
            ],
            'crmTag' => 'importar-importacion-llave-en-mano',
            'nextLink' => null,
        ],
        'despacho-aduanero' => [
            'menuLabel' => 'Despacho aduanero',
            'need' => 'aduana',
            'tier' => 'B',
            'whatsappText' => 'Hola, vi la página de despacho aduanero en china.com.py y quisiera consultar.',
            'nextStep' => [
                'Le respondemos dentro del siguiente día hábil.',
                'Tenga a mano qué producto, qué cantidad y para cuándo lo necesita.',
            ],
            'crmTag' => 'aduana-despacho-aduanero',
            'nextLink' => null,
        ],
        'visa-china' => [
            'menuLabel' => 'Visa China',
            'need' => 'viajes',
            'tier' => 'B',
            'whatsappText' => 'Hola, vi la página de visa china en china.com.py y quisiera consultar.',
            'nextStep' => [
                'Le respondemos dentro del siguiente día hábil.',
                'Tenga a mano qué producto, qué cantidad y para cuándo lo necesita.',
            ],
            'crmTag' => 'viajes-visa-china',
            'nextLink' => null,
        ],
        'tour-negocios-china' => [
            'menuLabel' => 'Tour Feria de Cantón',
            'need' => 'viajes',
            'tier' => 'A',
            'whatsappText' => 'Hola, vi la página de tour feria de cantón en china.com.py y quisiera consultar.',
            'nextStep' => [
                'Le respondemos dentro del siguiente día hábil.',
                'Tenga a mano qué producto, qué cantidad y para cuándo lo necesita.',
            ],
            'crmTag' => 'viajes-tour-negocios-china',
            'nextLink' => null,
        ],
    ],
    'tools' => [
        'calculadora-costo-importacion' => [
            'menuLabel' => 'Costo de importación',
            'need' => 'importar',
            'tier' => 'C',
            'whatsappText' => 'Hola, usé la calculadora de costo de importación en china.com.py y quisiera una cotización real.',
            'nextStep' => [
                'Le respondemos dentro del siguiente día hábil.',
                'Guarde el resultado que calculó: lo usamos como punto de partida.',
            ],
            'crmTag' => 'herramienta-calculadora-costo-importacion',
            'nextLink' => null,
        ],
        'calculadora-cbm-contenedor' => [
            'menuLabel' => 'CBM y contenedor',
            'need' => 'importar',
            'tier' => 'C',
            'whatsappText' => 'Hola, usé la calculadora de cbm y contenedor en china.com.py y quisiera una cotización real.',
            'nextStep' => [
                'Le respondemos dentro del siguiente día hábil.',
                'Guarde el resultado que calculó: lo usamos como punto de partida.',
            ],
            'crmTag' => 'herramienta-calculadora-cbm-contenedor',
            'nextLink' => null,
        ],
        'calculadora-compras-online' => [
            'menuLabel' => 'Compras online',
            'need' => 'compras',
            'tier' => 'C',
            'whatsappText' => 'Hola, usé la calculadora de compras online en china.com.py y quisiera una cotización real.',
            'nextStep' => [
                'Le respondemos dentro del siguiente día hábil.',
                'Guarde el resultado que calculó: lo usamos como punto de partida.',
            ],
            'crmTag' => 'herramienta-calculadora-compras-online',
            'nextLink' => null,
        ],
    ],
    'needs' => [
        'compras' => [
            'tier' => 'C',
            'crmTag' => 'chip-compras',
            'service' => 'asesoria-compras-online',
        ],
        'importar' => [
            'tier' => 'B',
            'crmTag' => 'chip-importar',
            'service' => 'importacion-llave-en-mano',
        ],
        'aduana' => [
            'tier' => 'B',
            'crmTag' => 'chip-aduana',
            'service' => 'despacho-aduanero',
        ],
        'viajes' => [
            'tier' => 'B',
            'crmTag' => 'chip-viajes',
            'service' => 'visa-china',
        ],
    ],
];

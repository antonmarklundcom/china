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
    'recordatorio' => 'Recordatorio de vencimientos',
];

return [

    'tierValues' => $tierValues,
    'needLabels' => $needLabels,

    /* Which services the WhatsApp menu offers, in order, after the current
       page's own service. Keep it short: four is plenty. */
    'whatsappMenu' => ['servicio-ejemplo'],

    /* The record for a page that names no service: an article without one, a
       legal page, the homepage. Never null — every form resolves to something. */
    'default' => [
        'menuLabel'    => 'Consulta general',
        'need'         => 'otro',
        'tier'         => 'C',
        'whatsappText' => 'Hola, quisiera hacer una consulta.',
        'nextStep'     => [
            'Le respondemos dentro del siguiente día hábil.',
            'Tenga a mano una descripción breve de su situación.',
        ],
        'crmTag'       => 'consulta-general',
        'nextLink'     => null,
    ],

    /* One record per key in content/services.php. verify.sh fails when a service
       has none — an untagged lead is a lead nobody can route. */
    'services' => [
        'servicio-ejemplo' => [
            'example' => true,
            'menuLabel'    => 'Servicio de ejemplo',
            'need'         => 'servicio',
            'tier'         => 'A',
            'whatsappText' => 'Hola, quisiera consultar por el servicio de ejemplo.',
            'nextStep'     => [
                'Le respondemos dentro del siguiente día hábil.',
                'Tenga a mano la documentación que pedimos en "qué necesitamos de usted".',
            ],
            'crmTag'       => 'servicio-ejemplo',
            'nextLink'     => [
                'path'  => '/herramientas/herramienta-ejemplo/',
                'label' => 'Mientras tanto, haga la cuenta',
            ],
        ],
    ],

    /* One record per key in content/tools.php. A calculator lead is worth less
       than a service lead — that is the whole point of tiering them. */
    'tools' => [
        'herramienta-ejemplo' => [
            'example' => true,
            'menuLabel'    => 'Calculadora de ejemplo',
            'need'         => 'servicio',
            'tier'         => 'C',
            'whatsappText' => 'Hola, usé la calculadora de ejemplo y quisiera confirmar el resultado.',
            'nextStep'     => [
                'Le respondemos dentro del siguiente día hábil.',
                'Guarde el resultado que calculó: se lo revisamos con usted.',
            ],
            'crmTag'       => 'herramienta-ejemplo',
            'nextLink'     => null,
        ],
    ],

    /* One record per chip in content/ui.php 'needs'. A lead from a page with no
       service of its own takes the tier of the chip the visitor picked, and
       borrows that chip's service copy when it names one. */
    'needs' => [
        'servicio' => ['tier' => 'B', 'crmTag' => 'servicio-puntual', 'service' => 'servicio-ejemplo'],
        'mensual'  => ['tier' => 'A', 'crmTag' => 'trabajo-mensual',  'service' => 'servicio-ejemplo'],
        'otro'     => ['tier' => 'C', 'crmTag' => 'consulta-general', 'service' => null],
    ],
];

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

declare(strict_types=1);

return [

    'guia-ejemplo' => [
        'example' => true,
        'path'            => '/guias/guia-ejemplo/',
        'title'           => 'Guía de ejemplo',
        'navLabel'        => 'Guía de ejemplo',
        'seoTitle'        => 'Guía de ejemplo paso a paso',
        'metaDescription' => 'Guía de ejemplo: los pasos numerados, el JSON-LD HowTo y la caja para '
                           . 'delegar el trámite, todo desde un solo registro de contenido.',
        'lastReviewed'    => '2026-09-04',
        'hero' => [
            'eyebrow' => 'Guías',
            'h1'      => 'Cómo hacer el trámite de ejemplo, paso a paso',
            'lead'    => 'Una línea que dice para quién es la guía y qué va a lograr al terminarla.',
        ],
        'intro' => [
            'Dos párrafos que sitúan el trámite: quién lo necesita, cuándo y qué hace falta tener '
                . 'a mano antes de empezar.',
        ],
        'steps' => [
            [
                'title' => 'Primer paso',
                'body'  => ['Qué hacer, en una o dos oraciones concretas.'],
            ],
            [
                'title' => 'Segundo paso',
                'body'  => ['Qué hacer, en una o dos oraciones concretas.'],
            ],
            [
                'title' => 'Tercer paso',
                'body'  => ['Qué hacer, en una o dos oraciones concretas.'],
            ],
        ],
        'faq' => [
            [
                'q' => '¿Cuánto demora el trámite?',
                'a' => 'Una respuesta concreta, o el rango real si depende del caso.',
            ],
        ],
        'relatedService' => 'servicio-ejemplo',
        'toolLink'       => [
            'path'  => '/herramientas/herramienta-ejemplo/',
            'label' => 'Calcule usted mismo',
            'text'  => 'La calculadora de ejemplo hace la cuenta que esta guía explica.',
        ],
        'related' => [],
    ],
];

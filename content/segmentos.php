<?php
/**
 * Segment landing pages: one page per rubro (sector) or per situation, rendered
 * by templates/segment.php. One 3-line route file per slug.
 *
 * A segment page does not carry its own tier or WhatsApp message — it presets
 * the visitor into the real service that anchors its bundle ('leadSlug', an
 * existing key in content/lead-values.php's 'services'), so the lead form, the
 * WhatsApp CTA and the CRM tag all resolve through the one lead value model
 * rather than a second copy of it.
 *
 * Record shape:
 *
 *   path             string   URL, trailing slash
 *   navLabel         string   short label for the homepage rubros band
 *   seoTitle         string   <title> without the site suffix, <= 42 chars
 *   metaDescription  string   120–155 chars, unique site-wide
 *   hero             array    eyebrow, h1, lead
 *   leadSlug         string   the bundle's highest-value service slug
 *   bundle           string[] service slugs shown as the "lo que armamos" grid
 *   traps            array    [['title' => ..., 'text' => ...], ...] — the
 *                             mistakes that cost this segment money (no stats)
 *   sections         array    optional prose blocks, same shape as
 *                             content/services.php's 'sections'
 *   weNeed           string[] "qué necesitamos de usted" checklist
 *   faq              array    [['q' => ..., 'a' => ...], ...], 3–5 items
 *   example          bool     seed record only — see content/services.php
 *
 * Adding a segment: add a record here and a 3-line route file. deploy/routes.php
 * and sitemap.php already read this file, so the new page joins the route
 * contract and the sitemap by existing.
 */

declare(strict_types=1);

return [

    'rubro-ejemplo' => [
        'example' => true,
        'path'            => '/segmentos/rubro-ejemplo/',
        'navLabel'        => 'Rubro de ejemplo',
        'seoTitle'        => 'Servicios para el rubro de ejemplo',
        'metaDescription' => 'Página de segmento de ejemplo: las trampas del rubro, el paquete de '
                           . 'servicios que le armamos y el formulario ya preseleccionado.',
        'hero' => [
            'eyebrow' => 'Para su rubro',
            'h1'      => 'Servicios para el rubro de ejemplo',
            'lead'    => 'Una línea que demuestra que conoce el rubro: el problema que sufren todos '
                       . 'los negocios de este tipo.',
        ],
        'leadSlug' => 'servicio-ejemplo',
        'bundle'   => ['servicio-ejemplo'],
        'traps'    => [
            [
                'title' => 'El error típico del rubro',
                'text'  => 'Qué sale mal, por qué pasa y qué cuesta cuando pasa.',
            ],
        ],
        'sections' => [],
        'weNeed'   => [
            'Lo que necesitamos para armar el presupuesto',
        ],
        'faq' => [
            [
                'q' => '¿Trabajan con negocios de mi tamaño?',
                'a' => 'Una respuesta concreta sobre el tipo de cliente que atiende el negocio.',
            ],
        ],
    ],
];

<?php
/**
 * The service pages, keyed by slug. THIS SHAPE IS THE CONTRACT: a site fills the
 * empty keys and may add optional ones, but never renames or removes a key.
 * README.md ("Content model") documents it.
 *
 *   path             string   URL, always with a trailing slash. On a rebuild,
 *                             an existing URL is frozen for SEO — never change one.
 *   title            string   the page's own concept, used as the H1 fallback
 *   navLabel         string   short label for the mega-menu and the footer
 *   cluster          string   key into ui('clusters')
 *   parent           ?string  slug of the sub-hub this page sits under, if any
 *   seoTitle         string   <title> without the ' | <site name>' suffix,
 *                             <= 42 chars so the full title stays under 60
 *   metaDescription  string   120–155 chars, unique across the whole site
 *   hero             array    eyebrow, h1, h2, lead
 *   includes         string[] the "qué incluye" checklist
 *   excludes         string[] the "qué no incluye" checklist (optional)
 *   weNeed           string[] the "qué necesitamos de usted" checklist (optional)
 *   sections         array    [['h2' => ..., 'body' => [paragraph, ...],
 *                              'items' => [['title' => ..., 'text' => ...]]], ...]
 *   benefits         array    [['title' => ..., 'text' => ...], ...]
 *   faq              array    [['q' => ..., 'a' => ...], ...] → FAQPage JSON-LD
 *   cta              array    label (the button text)
 *   related          string[] sibling service slugs shown as cards
 *   guides           string[] guide slugs (content/guias.php)
 *   articles         string[] article slugs (content/blog.php)
 *   toolLinks        array    [['path' => ..., 'label' => ..., 'text' => ...], ...]
 *   example          bool     present ONLY on the seed record below. Deleting
 *                             every 'example' => true entry across content/ is
 *                             step 3 of "Start a new site (T0)" in README.md.
 *
 * Every service slug also needs a record in content/lead-values.php — verify.sh
 * fails the build when one is missing, because a service page whose form is not
 * in the lead value model quietly sends untagged leads.
 */

/* Cluster file loaded by content/services.php. Cluster: compras. */

declare(strict_types=1);

return [

    'asesoria-compras-online' => [
        'draft' => true,
        'path' => '/servicios/asesoria-compras-online/',
        'title' => 'Asesoría para compras online',
        'navLabel' => 'Asesoría compras online',
        'cluster' => 'compras',
        'parent' => null,
        'seoTitle' => 'Ayuda para comprar en Temu, Shein y más',
        'metaDescription' => 'Le ayudamos con su primer pedido en Temu, Shein, AliExpress o Alibaba: casilla, courier, pago y costos hasta que el paquete llega a Paraguay.',
        'hero' => [
            'eyebrow' => 'Servicios',
            'h1' => 'Asesoría para compras online',
            'h2' => '',
            'lead' => 'Le ayudamos con su primer pedido en Temu, Shein, AliExpress o Alibaba: casilla, courier, pago y costos hasta que el paquete llega a Paraguay.',
        ],
        'includes' => [],
        'excludes' => [],
        'weNeed' => [],
        'sections' => [],
        'benefits' => [],
        'faq' => [],
        'cta' => [
            'label' => 'Pedir cotización',
            'whatsappText' => '',
        ],
        'related' => [],
        'guides' => [],
        'articles' => [],
        'toolLinks' => [],
        'affiliates' => [],
        'disclaimer' => false,
    ],

];

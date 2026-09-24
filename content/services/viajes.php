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

/* Cluster file loaded by content/services.php. Cluster: viajes. */

declare(strict_types=1);

return [

    'visa-china' => [
        'draft' => true,
        'path' => '/servicios/visa-china/',
        'title' => 'Visa para China para paraguayos',
        'navLabel' => 'Visa China',
        'cluster' => 'viajes',
        'parent' => null,
        'seoTitle' => 'Visa China para paraguayos: gestión',
        'metaDescription' => 'Asistencia con la visa china para pasaportes paraguayos: formulario, documentos, turno y envío al consulado que corresponde.',
        'hero' => [
            'eyebrow' => 'Servicios',
            'h1' => 'Visa para China para paraguayos',
            'h2' => '',
            'lead' => 'Asistencia con la visa china para pasaportes paraguayos: formulario, documentos, turno y envío al consulado que corresponde.',
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
        'disclaimer' => true,
    ],

    'tour-negocios-china' => [
        'draft' => true,
        'path' => '/servicios/tour-negocios-china/',
        'title' => 'Viaje de negocios a la Feria de Cantón',
        'navLabel' => 'Tour Feria de Cantón',
        'cluster' => 'viajes',
        'parent' => null,
        'seoTitle' => 'Viaje grupal a la Feria de Cantón',
        'metaDescription' => 'Viaje grupal desde Paraguay a la Feria de Cantón con visitas a fábricas, intérprete y logística. Anótese en la lista de interesados.',
        'hero' => [
            'eyebrow' => 'Servicios',
            'h1' => 'Viaje de negocios a la Feria de Cantón',
            'h2' => '',
            'lead' => 'Viaje grupal desde Paraguay a la Feria de Cantón con visitas a fábricas, intérprete y logística. Anótese en la lista de interesados.',
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

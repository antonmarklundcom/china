<?php
/**
 * The header and footer link trees. Navigation is data, not markup:
 * partials/header.php and partials/footer.php render whatever this file returns,
 * and a content phase adds tools, guides or legal pages by extending the arrays
 * here rather than editing the partials. An empty list renders nothing at all.
 *
 * Service links are derived from content/services.php, so a service added there
 * appears in the mega-menu and the footer automatically.
 */

declare(strict_types=1);

$services = content('services');
$clusters = content('ui')['clusters'];

/** Services grouped by cluster, in the order content/ui.php lists the clusters. */
$byCluster = [];
foreach ($clusters as $key => $label) {
    $byCluster[$key] = ['label' => $label, 'items' => []];
}
foreach ($services as $slug => $service) {
    $cluster = $service['cluster'];
    if (!isset($byCluster[$cluster])) {
        continue;
    }
    $byCluster[$cluster]['items'][] = [
        'label'  => $service['navLabel'],
        'path'   => $service['path'],
        'slug'   => $slug,
        'parent' => $service['parent'] ?? null,
    ];
}

/** Flat list of all services, for the footer column. */
$allServices = [];
foreach ($byCluster as $cluster) {
    foreach ($cluster['items'] as $item) {
        $allServices[] = $item;
    }
}

return [
    // Header bar, left to right. 'mega' opens the services panel.
    'primary' => [
        ['label' => ui('hubs.compras.label'),  'path' => ui('hubs.compras.path')],
        ['label' => ui('hubs.importar.label'), 'path' => ui('hubs.importar.path')],
        ['label' => ui('hubs.aduana.label'),   'path' => ui('hubs.aduana.path')],
        ['label' => ui('hubs.viajes.label'),   'path' => ui('hubs.viajes.path')],
        ['label' => ui('nav.services'),        'path' => services_hub_path(), 'mega' => true],
        ['label' => ui('nav.tools'),           'path' => '/herramientas/'],
    ],

    // The clusters inside the services mega-menu.
    'mega' => $byCluster,

    // Footer column 2.
    'services' => $allServices,

    // Footer "Temas": one link per cluster hub, then the guide index.
    'topics' => array_merge(
        array_values(array_map(
            static fn (array $hub): array => ['label' => $hub['label'], 'path' => $hub['path']],
            content('ui')['hubs']
        )),
        [
            ['label' => 'Feria de Cantón',      'path' => '/feria-de-canton/'],
            ['label' => ui('nav.guides'),       'path' => '/guias/'],
            ['label' => ui('nav.blog'),         'path' => '/blog/'],
        ]
    ),

    // Footer "El sitio" (the company column).
    'company' => [
        ['label' => ui('nav.about'),    'path' => '/sobre/'],
        ['label' => ui('nav.quote'),    'path' => '/cotizar/'],
        ['label' => ui('nav.contact'),  'path' => '/contacto/'],
        ['label' => ui('nav.business'), 'path' => '/para-empresas/'],
    ],

    // Footer column 3. Tools are appended from the 'tools' key below.
    'firm' => [
        ['label' => ui('nav.about'),    'path' => '/sobre/'],
        ['label' => ui('nav.guides'),   'path' => '/guias/'],
        ['label' => ui('nav.blog'),     'path' => '/blog/'],
        ['label' => ui('nav.business'), 'path' => '/para-empresas/'],
        ['label' => ui('nav.contact'),  'path' => '/contacto/'],
    ],

    // One entry per content/tools.php record, in the same order.
    'tools' => array_map(
        static fn (array $tool): array => ['label' => $tool['navLabel'], 'path' => $tool['path']],
        content('tools')
    ),

    // One entry per content/guias.php record, in the same order.
    'guias' => array_map(
        static fn (array $guide): array => ['label' => $guide['navLabel'], 'path' => $guide['path']],
        content('guias')
    ),

    'legal' => [
        ['label' => ui('nav.privacy'), 'path' => '/privacidad/'],
        ['label' => ui('nav.terms'),   'path' => '/terminos/'],
        ['label' => ui('nav.legal'),   'path' => '/aviso-legal/'],
        ['label' => ui('nav.affiliates'), 'path' => '/afiliados/'],
    ],

    // Rendered only when content/site.php has social URLs.
    'socials' => array_values(array_filter((array) site('socials'))),
];

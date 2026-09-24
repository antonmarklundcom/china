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

/* Cluster file loaded by content/services.php. Cluster: aduana. */

declare(strict_types=1);

return [

    'despacho-aduanero' => [
        'path' => '/servicios/despacho-aduanero/',
        'title' => 'Despacho aduanero en Paraguay',
        'navLabel' => 'Despacho aduanero',
        'cluster' => 'aduana',
        'parent' => null,
        'seoTitle' => 'Despacho aduanero para su importación',
        'metaDescription' => 'Lo conectamos con un despachante de aduana matriculado para despachar su mercadería en Paraguay, con el costo y los documentos claros.',
        'hero' => [
            'eyebrow' => 'Servicios',
            'h1' => 'Despacho aduanero en Paraguay',
            'h2' => 'Un despachante matriculado para su carga, con el costo desglosado antes de empezar.',
            'lead' => 'Lo conectamos con un despachante de aduana matriculado que despacha su mercadería en Paraguay y le explica cada costo antes de empezar. Nosotros no despachamos ni firmamos declaraciones: coordinamos el contacto y le ayudamos a llegar con los documentos en orden.',
        ],
        'includes' => [
            'Revisión inicial de su caso: producto, cantidad, vía y aduana de ingreso',
            'Contacto con un despachante de aduana matriculado que trabaja con su tipo de carga',
            'Lista de documentos que el despachante necesita, antes de que llegue la carga',
            'Cotización del despachante con honorarios, tributos estimados, tasas y gastos por separado',
            'Clasificación NCM estimada por el despachante antes de que usted compre, si lo pide a tiempo',
            'Seguimiento de la coordinación entre usted, su agente de carga y el despachante',
        ],
        'excludes' => [
            'La firma de la declaración aduanera: la hace el despachante matriculado',
            'El pago de tributos, que se liquida a su nombre como importador',
            'La compra al proveedor y el flete internacional (se cotizan aparte)',
            'Trámites para mercadería sin factura o con valores que no son reales',
        ],
        'weNeed' => [
            'Descripción del producto, con ficha técnica o fotos si las tiene',
            'Factura comercial o proforma del proveedor',
            'Vía de transporte y fecha estimada de llegada',
            'Su RUC o, si todavía no importa, que nos lo indique',
            'Documento de transporte (BL, guía aérea o carta de porte) cuando exista',
        ],
        'sections' => [
            [
                'h2' => 'Por qué conviene resolver el despacho antes de que llegue la carga',
                'body' => [
                    'La mayoría de los problemas en aduana no aparecen en el despacho sino antes: una factura con datos incompletos, un producto clasificado de forma distinta a lo esperado o un permiso previo que nadie tramitó. Cuando eso se descubre con la carga ya en depósito, el almacenaje corre por día y el costo final sube.',
                    'Por eso trabajamos con anticipación: si nos consulta antes de pagar al proveedor, el despachante puede revisar la proforma, estimar la posición NCM y avisarle qué documentos o registros necesita.',
                ],
            ],
            [
                'h2' => 'Cómo trabajamos',
                'body' => [],
                'items' => [
                    ['title' => '1. Consulta', 'text' => 'Nos cuenta qué trae, cuánto y por dónde. Le decimos qué información falta.'],
                    ['title' => '2. Contacto con el despachante', 'text' => 'Lo ponemos en contacto con un despachante matriculado adecuado para su carga.'],
                    ['title' => '3. Cotización', 'text' => 'El despachante le envía su presupuesto desglosado. Usted decide si avanza.'],
                    ['title' => '4. Despacho', 'text' => 'El despachante presenta la declaración, gestiona la liquidación y la verificación y le avisa cuándo puede retirar.'],
                ],
            ],
            [
                'h2' => 'Quién hace qué',
                'body' => [
                    'Nosotros somos un sitio privado de información que coordina el contacto. El despachante asociado es un profesional matriculado ante la aduana y es quien presenta la declaración y responde por su actuación profesional. Usted es el importador: aporta los documentos, paga los tributos y responde por la veracidad de lo declarado.',
                    'No tenemos vínculo con la aduana paraguaya (Gerencia General de Aduanas de la DNIT) ni hablamos en su nombre. La información oficial está en aduana.gov.py y dnit.gov.py.',
                ],
            ],
        ],
        'benefits' => [
            ['title' => 'Costo claro', 'text' => 'Recibe el presupuesto con cada concepto separado, para comparar y decidir antes de empezar.'],
            ['title' => 'Despachante verificable', 'text' => 'Trabajamos con despachantes matriculados; puede comprobar la matrícula en la fuente oficial.'],
            ['title' => 'Menos tiempo en depósito', 'text' => 'Los documentos se revisan antes de la llegada de la carga, no después.'],
            ['title' => 'Un solo punto de contacto', 'text' => 'Coordinamos entre usted, su agente de carga y el despachante cuando lo necesita.'],
        ],
        'faq' => [
            ['q' => '¿Ustedes son despachantes de aduana?', 'a' => 'No. Lo conectamos con un despachante de aduana matriculado, que es quien realiza el despacho y firma la declaración.'],
            ['q' => '¿Cuánto cuesta el despacho?', 'a' => 'Depende de su mercadería, del valor y de la vía de ingreso. El despachante le envía una cotización desglosada antes de empezar; pedirla no le compromete a contratar.'],
            ['q' => '¿Pueden ayudarme si es mi primera importación?', 'a' => 'Sí. Le indicamos qué necesita para empezar y el despachante le orienta con la inscripción y los documentos que correspondan a su producto.'],
            ['q' => '¿Trabajan con cargas que llegan por Ciudad del Este o Encarnación?', 'a' => 'Cuéntenos por qué aduana ingresará su carga y buscamos un despachante que opere allí.'],
            ['q' => '¿Qué pasa si mi carga ya está en depósito?', 'a' => 'Escríbanos cuanto antes con el documento de transporte y la factura; cuanto antes empiece el despacho, menos almacenaje pagará.'],
        ],
        'cta' => [
            'label' => 'Pedir contacto con un despachante',
            'whatsappText' => '',
        ],
        'related' => ['importacion-llave-en-mano', 'flete-maritimo-contenedor', 'flete-aereo-china'],
        'guides' => ['despachantes-de-aduana-paraguay', 'precio-despacho-aduanero-paraguay', 'tributos-aduaneros-paraguay'],
        'articles' => [],
        'toolLinks' => [
            ['path' => '/herramientas/calculadora-costo-importacion/', 'label' => 'Calculadora de costo de importación', 'text' => 'Estime flete, tributos y gastos antes de pedir la cotización del despacho.'],
        ],
        'affiliates' => [],
        'disclaimer' => true,
        'image' => ['src' => '/assets/img/hubs/aduana-documentos-despacho.webp', 'alt' => 'Escritorio con facturas, lista de empaque y calculadora, con contenedores de fondo', 'width' => 1600, 'height' => 905],
    ],

];

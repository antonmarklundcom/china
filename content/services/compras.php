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
            'h2' => 'Su primer pedido del exterior, con el costo claro antes de pagar',
            'lead' => 'Le ayudamos con su primer pedido en Temu, Shein, AliExpress o Alibaba: casilla, courier, pago y costos hasta que el paquete llega a Paraguay. Usted compra en la plataforma oficial; nosotros revisamos el pedido, estimamos el costo final y lo acompañamos si hay demoras o retención.',
        ],
        'includes' => [
            'Revisión de su pedido antes de pagar: tienda, vendedor, talles o especificaciones y cantidad',
            'Comparación entre envío directo de la tienda y casilla de courier para su caso',
            'Estimación del costo final: precio, envío, flete, tributos y otros cargos',
            'Orientación sobre medios de pago y protección al comprador de cada plataforma',
            'Revisión de productos que pueden necesitar permiso o generar retención en aduana',
            'Acompañamiento si el paquete se demora o queda retenido, con los pasos a seguir',
            'Derivación a un agente de compras o a un despachante cuando la compra es comercial',
        ],
        'excludes' => [
            'No compramos en su nombre ni manejamos su dinero ni su tarjeta',
            'No hacemos trámites aduaneros: el despacho formal lo hace un despachante matriculado',
            'No garantizamos plazos ni montos de tributos, que dependen de la tienda, el courier y la aduana',
        ],
        'weNeed' => [
            'El enlace o captura de lo que quiere comprar',
            'Su ciudad de entrega en Paraguay',
            'Si la compra es para uso personal o para vender',
            'Si ya tiene casilla de courier y con qué condiciones',
        ],
        'sections' => [
            [
                'h2' => 'Cómo trabajamos',
                'body' => [
                    'El miedo más común con el primer pedido en Temu, Shein, AliExpress o Alibaba no es el precio, es lo que no se ve: cuánto se paga al recibir, cuánto tarda, si conviene casilla y qué pasa si el paquete queda en aduana. La asesoría resuelve esas preguntas antes de pagar, con su pedido concreto.',
                ],
                'items' => [
                    ['title' => 'Usted nos envía el pedido', 'text' => 'Por el formulario o WhatsApp, con el enlace o la captura del carrito y su ciudad.'],
                    ['title' => 'Revisamos y estimamos', 'text' => 'Miramos vendedor, especificaciones y posibles restricciones, y armamos una estimación del costo final con las tarifas vigentes que usted o el courier nos confirmen.'],
                    ['title' => 'Le recomendamos el camino', 'text' => 'Envío directo o casilla, qué medio de pago usar y qué datos cargar.'],
                    ['title' => 'Usted compra', 'text' => 'La compra y el pago los hace usted, en la plataforma oficial.'],
                    ['title' => 'Seguimos hasta la entrega', 'text' => 'Si hay demora o retención, le decimos qué pedir y a quién.'],
                ],
            ],
            [
                'h2' => 'Cuándo conviene pedir asesoría',
                'body' => [
                    'Conviene en su primera compra del exterior (puede estimar el costo antes con la [calculadora de compras online](/herramientas/calculadora-compras-online/)), cuando el pedido tiene un valor que no quiere arriesgar, cuando compra artículos voluminosos o electrónicos, o cuando piensa comprar cantidades para vender y no sabe si ya es una importación.',
                    'Si su pedido es chico, con envío directo y seguimiento, probablemente no la necesite: nuestras guías de [Temu en Paraguay](/comprar/temu-paraguay/), Shein en Paraguay y AliExpress en Paraguay cubren ese caso.',
                ],
            ],
            [
                'h2' => 'Quién hace qué',
                'body' => [
                    'Nosotros orientamos y coordinamos. La tienda vende y envía; el courier transporta, declara y cobra los tributos; la aduana (DNIT) libera el paquete. Si la compra pasa a ser comercial, lo conectamos con un [agente de compras en China](/servicios/agente-de-compras-china/) y con un [despachante de aduana matriculado](/aduana/despachantes-de-aduana-paraguay/), que es quien hace el despacho formal. No somos una empresa oficial ni estamos afiliados a Temu, Shein, AliExpress ni Alibaba.',
                ],
            ],
        ],
        'benefits' => [
            ['title' => 'Sabe cuánto paga antes de comprar', 'text' => 'Una estimación con todos los componentes, no solo el precio del carrito.'],
            ['title' => 'Elige bien entre casilla y envío directo', 'text' => 'Según el tamaño, el valor y la urgencia de su pedido.'],
            ['title' => 'Evita retenciones previsibles', 'text' => 'Revisamos productos con restricciones y cantidades que parecen comerciales.'],
            ['title' => 'Un interlocutor si algo sale mal', 'text' => 'Le indicamos qué reclamar, a quién y con qué documentos.'],
        ],
        'faq' => [
            ['q' => '¿Ustedes compran por mí en Temu o Shein?', 'a' => 'No. Usted compra y paga en la plataforma oficial; nosotros revisamos el pedido y le explicamos el costo final y la mejor forma de envío.'],
            ['q' => '¿Me pueden decir exactamente cuánto voy a pagar de impuestos?', 'a' => 'Le damos una estimación con las reglas y tarifas vigentes que confirmamos con el courier o la DNIT. El monto final lo liquida la aduana a través del courier; el mecanismo está explicado en [impuestos de compras online en Paraguay](/comprar/impuestos-compras-online-paraguay/).'],
            ['q' => '¿Me ayudan si el paquete quedó retenido?', 'a' => 'Sí, le indicamos qué documento falta y a quién presentarlo. Si hace falta un despacho formal, lo conectamos con un despachante de aduana matriculado.'],
            ['q' => '¿Sirve para compras en Alibaba?', 'a' => 'Sí, para una muestra o un primer pedido chico (vea Alibaba en Paraguay). Para volumen comercial, lo derivamos a un agente de compras y a la guía cómo importar de China a Paraguay.'],
            ['q' => '¿Trabajan con un courier en particular?', 'a' => 'No tenemos un courier fijo: le explicamos cómo comparar [casillas de courier en Paraguay](/comprar/casillas-courier-paraguay/) para que usted decida.'],
        ],
        'cta' => [
            'label' => 'Consultar mi pedido',
            'whatsappText' => 'Hola, quiero ayuda con una compra online desde Paraguay.',
        ],
        'related' => ['agente-de-compras-china', 'despacho-aduanero', 'flete-aereo-china'],
        'guides' => ['temu-paraguay', 'casillas-courier-paraguay', 'impuestos-compras-online-paraguay'],
        'articles' => ['temu-shein-aliexpress-paraguay-comparacion'],
        'toolLinks' => [
            ['path' => '/herramientas/calculadora-compras-online/', 'label' => 'Calculadora de compras online', 'text' => 'Estime el costo final de su pedido puesto en Paraguay.'],
        ],
        'affiliates' => [],
        'disclaimer' => false,
        'image' => ['base' => '/assets/img/compra-online-desempaque-paraguay', 'widths' => [640, 1280], 'alt' => 'Persona abre en la mesa de su cocina un paquete de una compra online y sostiene una prenda', 'width' => 1280, 'height' => 716],
    ],

];

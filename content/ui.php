<?php
/**
 * Every UI string on the site, in one file — the single-locale layer. Nothing
 * in partials/ or templates/ contains a visible word; they all read from here.
 *
 * Spanish (Paraguay), formal "usted". Nothing here may name a month, a year, a
 * price, a rate or a client: strings must stay true without anyone editing them.
 */

declare(strict_types=1);

return [

    // The four topic clusters. Services, guides and hubs all key into these.
    'clusters' => [
        'compras'  => 'Comprar online',
        'importar' => 'Importar de China',
        'aduana'   => 'Aduana',
        'viajes'   => 'Viajar y negocios',
    ],

    'cluster_leads' => [
        'compras'  => 'Temu, Shein, AliExpress y Alibaba: cómo llegan sus compras a Paraguay y cuánto pagan.',
        'importar' => 'Para quien compra en China para vender: proveedores, flete, inspección y costos.',
        'aduana'   => 'Despacho, tributos y fronteras, explicados en lenguaje claro. No somos la aduana.',
        'viajes'   => 'Feria de Cantón, visa y viajes de negocios a China desde Paraguay.',
    ],

    // One hub page per cluster. The guide template uses these for breadcrumbs.
    'hubs' => [
        'compras'  => ['label' => 'Comprar online',   'path' => '/comprar/'],
        'importar' => ['label' => 'Importar',         'path' => '/importar/'],
        'aduana'   => ['label' => 'Aduana',           'path' => '/aduana/'],
        'viajes'   => ['label' => 'Viajar a China',   'path' => '/viajar-a-china/'],
    ],

    'nav' => [
        'home'         => 'Inicio',
        'services'     => 'Servicios',
        'topics'       => 'Temas',
        'pricing'      => 'Precios',
        'tools'        => 'Calculadoras',
        'guides'       => 'Guías',
        'about'        => 'Sobre el sitio',
        'blog'         => 'Blog',
        'contact'      => 'Contacto',
        'privacy'      => 'Privacidad',
        'terms'        => 'Términos',
        'legal'        => 'Aviso legal',
        'affiliates'   => 'Afiliados',
        'business'     => 'Para empresas',
        'menu'         => 'Menú',
        'close'        => 'Cerrar',
        'open_menu'    => 'Abrir el menú',
        'close_menu'   => 'Cerrar el menú',
        'skip'         => 'Ir al contenido principal',
        'firm'         => 'El sitio',
        'all_services' => 'Ver todos los servicios',
        'all_tools'    => 'Todas las calculadoras',
        'quote'        => 'Cotizador',
    ],

    'a11y' => [
        'new_tab' => '(se abre en una pestaña nueva)',
    ],

    // Four statements under the home hero (partials/trust-strip.php). Each one
    // must stay true without an edit: no numbers, no clients, no partners.
    'trust' => [
        'label' => 'Cómo trabajamos',
        'items' => [
            ['icon' => 'chat',   'title' => 'Consulta sin costo',              'text' => 'Cotización por escrito y sin compromiso.'],
            ['icon' => 'clock',  'title' => 'Respuesta en un día hábil',       'text' => 'Le contestamos dentro del siguiente día hábil.'],
            ['icon' => 'badge',  'title' => 'Profesionales matriculados',      'text' => 'Despachantes y socios independientes: sabe quién hace cada parte.'],
            ['icon' => 'source', 'title' => 'Guías con fuentes oficiales',     'text' => 'Cada cifra con su fuente, o marcada para confirmar.'],
        ],
    ],

    'cta' => [
        'quote'         => 'Pedir cotización',
        'whatsapp'      => 'WhatsApp',
        'whatsapp_long' => 'Escribir por WhatsApp',
        'consult'       => 'Hacer una consulta',
        'contact'       => 'Contactar',
        'see_included'  => 'Ver qué incluye',
        'talk'          => 'Contarnos su caso',
        'quote_short'   => 'Cotizar',
        'calculate'     => 'Calcular el costo',
        'quote_note'    => 'Sin costo ni compromiso',
    ],

    // The mobile conversion bar and the desktop WhatsApp pill (partials/whatsapp-fab.php).
    'mbar' => [
        'label' => 'Acciones rápidas',
    ],

    // The exit-intent offer (partials/exit-offer.php). Desktop only, once a week.
    'exit' => [
        'eyebrow' => 'Antes de irse',
        'title'   => '¿Le armamos una cotización sin compromiso?',
        'text'    => 'Cuéntenos qué quiere traer y le respondemos por escrito, con producto, flete y despacho por separado.',
        'cta'     => 'Pedir mi cotización',
        'wa'      => 'Preguntar por WhatsApp',
        'note'    => 'Sin costo. Respuesta dentro del siguiente día hábil.',
        'close'   => 'Cerrar',
    ],

    'whatsapp' => [
        'menu_title' => '¿Sobre qué quiere escribirnos?',
        'menu_note'  => 'Abrimos WhatsApp con el mensaje ya escrito. Puede cambiarlo antes de enviarlo.',
        'other'      => 'Otra consulta',
        'this_page'  => 'Lo que está viendo',
        'open_menu'  => 'Abrir opciones de WhatsApp',
        'close_menu' => 'Cerrar',
    ],

    'home' => [
        'eyebrow'   => 'China ↔ Paraguay, en lenguaje claro',
        'h1_lead'   => 'Compre, importe y viaje a China ',
        'h1_accent' => 'sabiendo cuánto le cuesta.',
        'lead'      => 'Guías prácticas y calculadoras gratuitas para comprar en Temu, Shein o '
                     . 'Alibaba, importar en contenedor y pasar la aduana. Y cuando prefiera '
                     . 'delegarlo, coordinamos proveedor, flete y despacho, con cada costo por escrito.',
        'cta_quote'   => 'Pedir cotización',
        'cta_calc'    => 'Calcular el costo',
        'quick_label' => 'Lo más buscado',
        'route_title' => 'El recorrido de su mercadería',
        'route_label' => 'El recorrido de una importación',
        'route'       => [
            ['title' => 'Fábrica en China',            'text' => 'Proveedor verificado y muestra aprobada'],
            ['title' => 'Inspección y embarque',       'text' => 'Control antes del pago final'],
            ['title' => 'Flete marítimo o aéreo',      'text' => 'Contenedor, consolidado o courier'],
            ['title' => 'Aduana y entrega en Paraguay', 'text' => 'Despachante matriculado'],
        ],
        'tools_cta'     => 'Usar la calculadora',
        'popular_all'   => 'Ver todas las guías',
        'aduana_cta'    => 'Ver las guías de aduana',
        'services_cta'  => 'Ver todos los servicios',
        'unsure_cta'    => 'Armar mi cotización',
        'contact_alt'   => '¿Prefiere un paso a paso? Use el cotizador',

        'doors_eyebrow' => 'Empiece por acá',
        'doors_title'   => '¿Qué quiere hacer?',

        'tools_eyebrow' => 'Calculadoras',
        'tools_title'   => 'Haga la cuenta antes de comprar.',
        'tools_lead'    => 'Tres calculadoras gratuitas: costo puesto en Paraguay, volumen de su '
                         . 'carga y total de un pedido online.',

        'popular_eyebrow' => 'Más consultadas',
        'popular_title'   => 'Las guías que más se leen',

        'services_eyebrow' => 'Servicios',
        'services_title'   => 'Cuando prefiere que alguien se encargue',
        'services_lead'    => 'Coordinamos con agentes en China, transportistas y despachantes '
                            . 'matriculados en Paraguay. Usted recibe una sola respuesta.',

        'aduana_eyebrow' => 'Aduana',
        'aduana_title'   => 'Despacho, tributos y fronteras sin sorpresas.',
        'aduana_lead'    => 'Qué se paga, quién firma el despacho y qué puede traer al cruzar. '
                          . 'Somos un sitio privado de información: siempre enlazamos la fuente oficial.',

        'blog_eyebrow' => 'Blog',
        'blog_title'   => 'Análisis y novedades',

        'unsure_title' => '¿No sabe por dónde empezar?',
        'unsure_text'  => 'Cuéntenos qué quiere traer y en qué cantidad. Le decimos qué camino le conviene.',
    ],

    'panel' => [
        'title' => 'Su importación, paso a paso',
        'badge' => 'Ejemplo',
        'tiles' => [
            ['label' => 'Proveedor verificado', 'value' => 'Listo'],
            ['label' => 'Inspección en fábrica', 'value' => 'Listo'],
            ['label' => 'Flete y despacho',      'value' => 'En curso'],
        ],
        'foot'  => 'Entrega en Asunción',
        'note'  => 'Ejemplo de seguimiento',
    ],

    'about' => [
        'eyebrow' => 'Sobre el sitio',
        'title'   => 'Información práctica primero. Servicios solo cuando usted los pide.',
        'text'    => 'China-Paraguay reúne lo que hace falta saber para comprar, importar y viajar '
                   . 'a China desde Paraguay. Cuando pide ayuda, coordinamos con agentes, '
                   . 'transportistas y despachantes matriculados, y usted sabe desde el inicio quién '
                   . 'hace cada parte.',
        'credentials' => [
            'Cada cifra con su fuente, o marcada para confirmar',
            'Nunca nos presentamos como organismo oficial',
            'Alcance y costo por escrito antes de empezar',
        ],
        'badge_note'     => 'de experiencia',
        'badge_fallback' => 'China ↔ Paraguay',
    ],

    'process' => [
        'eyebrow' => 'Cómo trabajamos',
        'title'   => 'De la consulta a la mercadería en su depósito.',
        'steps'   => [
            ['title' => 'Nos cuenta qué necesita', 'text' => 'Producto, cantidad, destino y plazo. Por WhatsApp o formulario.'],
            ['title' => 'Cotización por escrito',  'text' => 'Costo de producto, flete, seguro y despacho, cada uno por separado.'],
            ['title' => 'Coordinación',            'text' => 'Proveedor, inspección, transporte y aduana con socios que usted conoce.'],
            ['title' => 'Entrega y cierre',        'text' => 'Seguimiento hasta la entrega y los comprobantes de cada pago.'],
        ],
    ],

    'industries' => [
        'eyebrow' => 'Por producto',
        'title'   => 'Qué se importa de China a Paraguay',
        'lead'    => 'Cada producto tiene sus propias trampas: talles, homologación, marcas y mínimos de compra.',
        'items'   => [],
    ],

    'testimonials' => [
        'eyebrow' => 'Casos',
        'title'   => 'Lo que dicen nuestros clientes',
    ],

    'services_hub' => [
        'eyebrow'      => 'Servicios',
        'title'        => 'Lo que coordinamos por usted.',
        'lead'         => 'Compras, importación, despacho y viajes. Cada servicio lo ejecuta un socio '
                        . 'especializado; nosotros coordinamos y le respondemos.',
        'unsure_title' => '¿No sabe qué necesita?',
        'unsure_text'  => 'Cuéntenos qué quiere traer y le decimos qué servicios le corresponden.',
        'unsure_cta'   => 'Escribirnos',
    ],

    'cta_band' => [
        'eyebrow' => 'Consulta',
        'title'   => 'Cuéntenos qué quiere traer de China.',
        'lead'    => 'Le respondemos con los pasos y los costos que corresponden a su caso.',
    ],

    'form' => [
        'legend'          => 'Hacer una consulta',
        'name'            => 'Nombre',
        'company'         => 'Empresa o rubro (opcional)',
        'phone'           => 'WhatsApp o teléfono',
        'phone_hint'      => 'Ej.: 0981 123 456',
        'email'           => 'Correo (opcional)',
        'need'            => '¿Sobre qué es su consulta?',
        'message'         => 'Cuéntenos brevemente',
        'message_hint'    => 'Qué producto, qué cantidad y para cuándo…',
        'submit'          => 'Enviar consulta',
        'sending'         => 'Enviando…',
        'privacy_note'    => 'Usamos sus datos solo para responderle. Ver la política de privacidad.',
        'privacy_short'   => 'Usamos sus datos solo para responderle.',
        'privacy_link'    => 'Ver la política de privacidad',
        'success_title'   => 'Recibimos su consulta.',
        'success_text'    => 'Le respondemos dentro del siguiente día hábil. Si prefiere, escríbanos ahora.',
        'error_title'     => 'No pudimos enviar el formulario.',
        'error_text'      => 'Vuelva a intentarlo en un momento o escríbanos directamente.',
        'error_phone'     => 'Necesitamos un teléfono o WhatsApp válido para responderle.',
        'required'        => 'obligatorio',
        'thanks_next'     => 'Qué sigue',
        'thanks_whatsapp' => 'Si prefiere no esperar, escríbanos ahora por WhatsApp.',
        'remind_title'    => 'Que le avisemos cuando cambie algo',
        'remind_text'     => 'Le escribimos por WhatsApp si cambian las reglas que afectan su compra.',
        'remind_phone'    => 'Su WhatsApp',
        'remind_submit'   => 'Quiero que me avisen',
        'remind_ok'       => 'Anotado. Le escribimos si hay novedades.',
        'assure'          => 'Sin costo ni compromiso. Le respondemos dentro del siguiente día hábil.',
    ],

    // Lead form chips. Every key needs a matching entry in lead-values 'needs'.
    'needs' => [
        'compras'  => 'Comprar en Temu, Shein o Alibaba',
        'importar' => 'Importar para vender',
        'aduana'   => 'Despacho aduanero',
        'viajes'   => 'Viaje, Feria de Cantón o visa',
    ],

    'contact' => [
        'eyebrow' => 'Contacto',
        'title'   => 'Cuéntenos qué quiere traer.',
        'lead'    => 'Escríbanos por WhatsApp o déjenos sus datos y le respondemos dentro '
                   . 'del siguiente día hábil.',
        'address' => 'Dirección',
        'hours'   => 'Horario',
        'phone'   => 'Teléfono',
        'email'   => 'Correo',
        'expect'  => 'Qué pasa después',
        'steps'   => [
            'Le respondemos dentro del siguiente día hábil.',
            'Le pedimos los datos que faltan: producto, cantidad y destino.',
            'Recibe los pasos y una cotización por escrito, sin compromiso.',
        ],
    ],

    'service' => [
        'includes'     => 'Qué incluye',
        'excludes'     => 'Qué no incluye',
        'we_need'      => 'Qué necesitamos de usted',
        'benefits'     => 'Por qué conviene',
        'faq'          => 'Preguntas frecuentes',
        'related'      => 'Servicios relacionados',
        'guides'       => 'Guía relacionada',
        'articles'     => 'Artículo relacionado',
        'form_eyebrow' => 'Cotización',
        'form_lead'    => 'Déjenos sus datos y le respondemos con los pasos y los costos de su caso, '
                        . 'sin compromiso.',
        'breadcrumb'   => 'Ruta de navegación',
        'aside_eyebrow' => 'Resumen del servicio',
        'price_label'   => 'Precio',
        'price_value'   => 'Según cotización',
        'price_note'    => 'Alcance y costo por escrito antes de empezar.',
        'aside_reply'   => 'Respuesta dentro del siguiente día hábil',
        'aside_more'    => 'Ver todo lo que incluye',
        'reads_eyebrow' => 'Para leer',
        'reads_title'   => 'Guías y artículos relacionados',
    ],

    'segment' => [
        'traps_title'  => 'Los errores que más cuestan con este producto',
        'bundle_title' => 'Lo que coordinamos para este producto',
        'form_eyebrow' => 'Cotización',
        'form_lead'    => 'Cuéntenos el producto, la cantidad y el destino; le respondemos con una propuesta concreta.',
        'others'       => 'Otros productos que se importan de China',
    ],

    'tools' => [
        'reviewed_prefix' => 'Datos revisados el',
        'orientativo'     => 'Los resultados son orientativos y no reemplazan la liquidación oficial.',
        'calculate'       => 'Calcular',
        'result_title'    => 'Resultado',
        'use_result'      => 'Pedir una cotización con este resultado',
        'need_js'         => 'Esta calculadora necesita JavaScript activado en su navegador.',
        'restart'         => 'Volver a empezar',
        'handoff_title'   => '¿Quiere los números reales?',
        'handoff_text'    => 'Con estos datos le preparamos una cotización real: producto, flete, seguro y despacho, cada uno por separado.',
        'handoff_cta'     => 'Reciba una cotización real con estos números',
        'aside_eyebrow'   => 'Del cálculo a la cotización',
        'aside_title'     => 'Un estimado orienta. Una cotización decide.',
        'aside_points'    => [
            'Tarifas de flete y despacho vigentes para su carga',
            'Posición arancelaria (NCM) confirmada por un despachante',
            'Cada costo por separado, por escrito',
        ],
    ],

    'guide' => [
        'reviewed_prefix'       => 'Revisado el',
        'orientativo'           => 'Es una guía general: confirme montos y requisitos vigentes antes de comprar.',
        'delegate_eyebrow'      => 'Delegarlo',
        'delegate_title'        => '¿Prefiere que alguien se encargue?',
        'delegate_lead'         => 'Le respondemos dentro del siguiente día hábil con los pasos exactos '
                                 . 'para su caso.',
        'delegate_form_heading' => 'Pedir ayuda con esto',
        'related'               => 'Otras guías',
    ],

    // The official-source notice on aduana and visa pages (partials/disclaimer-oficial.php).
    'disclaimer' => [
        'title' => 'Sitio privado de información',
        'text'  => 'China-Paraguay no es la aduana (Gerencia General de Aduanas de la DNIT, antes '
                 . 'DNA), ni la DNIT, ni una embajada o consulado. Los montos y requisitos cambian: confírmelos siempre en '
                 . 'la fuente oficial antes de actuar.',
        'link'  => 'Fuente oficial',
    ],

    // The affiliate box (partials/affiliate-box.php).
    'affiliate' => [
        'title'      => 'Herramientas que recomendamos',
        'disclosure' => 'Algunos enlaces son de afiliado: si compra a través de ellos, podemos recibir '
                      . 'una comisión sin costo extra para usted.',
        'more'       => 'Cómo funcionan los enlaces de afiliado',
    ],

    'article' => [
        'reading_time' => 'min de lectura',
        'updated'      => 'Actualizado el',
        'read_more'    => 'Leer el artículo',
    ],

    'hub' => [
        'empty'    => 'Todavía no hay nada publicado en esta sección.',
        'guides'   => 'Guías',
        'services' => 'Servicios',
        'products' => 'Por producto',
        'tools'    => 'Calculadoras',
        'see_hub'  => 'Ver todo',
    ],

    'pricing' => [
        'quote'     => 'A cotizar',
        'per_month' => 'por mes',
        'cta'       => 'Pedir cotización',
        'note'      => 'El precio final se acuerda por escrito.',
    ],

    'placeholder' => [
        'notice' => 'Estamos preparando esta página.',
        'action' => 'Mientras tanto, escríbanos y le respondemos por WhatsApp.',
    ],

    'error404' => [
        'title' => 'No encontramos esta página',
        'lead'  => 'Puede que el enlace haya cambiado. Estas son las secciones más buscadas.',
    ],

    'footer' => [
        'blurb'   => 'Guías y calculadoras para comprar, importar y viajar entre China y Paraguay. '
                   . 'Sitio privado de información, no oficial.',
        'rights'  => 'Todos los derechos reservados.',
        'contact' => 'Contacto',
        'topics'  => 'Temas',
        'tools'   => 'Calculadoras',
        'company' => 'El sitio',
        'legal'   => 'Legal',
        'not_official' => 'China-Paraguay es un sitio privado de información. No es la aduana, la DNIT, '
                        . 'una embajada ni un organismo oficial, y no está afiliado a Temu, Shein ni Alibaba.',
        'reply'   => 'Respuesta dentro del siguiente día hábil.',
    ],
];

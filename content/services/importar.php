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

/* Cluster file loaded by content/services.php. Cluster: importar. */

declare(strict_types=1);

return [

    'agente-de-compras-china' => [
        'path' => '/servicios/agente-de-compras-china/',
        'title' => 'Agente de compras en China',
        'navLabel' => 'Agente de compras en China',
        'cluster' => 'importar',
        'parent' => null,
        'seoTitle' => 'Agente de compras en China para Paraguay',
        'metaDescription' => 'Un agente en China busca proveedores, negocia precio y mínimos, y controla su pedido antes de que salga. Para importadores de Paraguay.',
        'hero' => [
            'eyebrow' => 'Servicios',
            'h1' => 'Agente de compras en China',
            'h2' => 'Alguien de su lado en China, que habla con la fábrica en chino y ve la mercadería antes de que usted pague el saldo.',
            'lead' => 'Un agente de compras en China verifica que el proveedor sea realmente una fábrica, negocia precio y cantidad mínima en chino y controla el pedido antes del embarque. Nosotros coordinamos a un agente independiente en China y usted recibe una propuesta escrita antes de comprometer dinero.',
        ],
        'includes' => [
            'Búsqueda y comparación de 3 o más proveedores para su producto',
            'Verificación de la licencia comercial (营业执照) y de si el proveedor es fábrica o intermediario',
            'Negociación de precio, cantidad mínima (MOQ), plazos y condiciones de pago en chino',
            'Pedido y revisión de muestras antes de la producción',
            'Seguimiento de la producción y comunicación con la fábrica',
            'Consolidación de compras de varios proveedores en un solo envío',
            'Propuesta escrita con precios, plazos y responsabilidades antes de empezar',
        ],
        'excludes' => [
            'El pago del producto al proveedor (lo hace usted, a nombre de su empresa)',
            'El despacho aduanero en Paraguay (lo hace un despachante de aduana matriculado)',
            'Garantías sobre marcas registradas o productos falsificados: no gestionamos réplicas',
        ],
        'weNeed' => [
            'Descripción del producto, con fotos, enlaces o fichas técnicas',
            'Cantidad aproximada y precio objetivo por unidad',
            'Requisitos de calidad, embalaje y etiquetado',
            'Fecha en la que necesita la mercadería en Paraguay',
            'RUC y datos de la empresa importadora, si ya los tiene',
        ],
        'sections' => [
            [
                'h2' => 'El riesgo de comprar a distancia',
                'body' => [
                    'Muchos importadores de Paraguay descubren tarde que su «fábrica» en Alibaba era una empresa comercial que revende con margen, o que la mercadería que llegó no coincide con la muestra. Desde Asunción es difícil saber quién está del otro lado, y reclamar después del pago casi nunca funciona.',
                    'Un agente local reduce ese riesgo porque está en el lugar: puede visitar la planta, pedir la licencia comercial y compararla con el registro público de empresas de China (gsxt.gov.cn), y negociar directamente en chino con quien produce. La guía sobre [proveedores chinos confiables](/importar/proveedores-chinos-confiables/) explica cada verificación.',
                ],
            ],
            [
                'h2' => 'Cómo trabajamos',
                'body' => [
                    'Usted nos describe el producto y nosotros coordinamos con un agente independiente en China, elegido para su pedido y nombrado en la propuesta. El trabajo se ordena en etapas, y usted aprueba cada una antes de pasar a la siguiente.',
                ],
                'items' => [
                    ['title' => '1. Brief y propuesta', 'text' => 'Revisamos su pedido y le enviamos una propuesta escrita con el alcance y el costo del servicio.'],
                    ['title' => '2. Búsqueda y verificación', 'text' => 'El agente identifica proveedores, verifica su licencia y le presenta una comparación.'],
                    ['title' => '3. Muestras y negociación', 'text' => 'Se piden muestras, se negocian precio, MOQ, plazos y forma de pago.'],
                    ['title' => '4. Producción y control', 'text' => 'Seguimiento de la producción y, si usted lo contrata, [inspección de calidad](/servicios/inspeccion-de-calidad/) antes del embarque.'],
                    ['title' => '5. Entrega al transporte', 'text' => 'La mercadería se consolida y se entrega al forwarder que la trae a Paraguay por [flete marítimo](/servicios/flete-maritimo-contenedor/) o aéreo.'],
                ],
            ],
            [
                'h2' => 'Quién hace qué',
                'body' => [
                    'El agente independiente ejecuta el trabajo en China: visitas, negociación y seguimiento. Nosotros somos su interlocutor en español desde Paraguay y le coordinamos, si lo necesita, el flete y el [despacho aduanero](/servicios/despacho-aduanero/). El contrato de compra y el pago son siempre entre su empresa y el proveedor, sin intermediarios que retengan su dinero; vea cómo hacerlo en la guía sobre [cómo pagar a proveedores chinos](/importar/pagar-a-proveedores-chinos/).',
                ],
            ],
        ],
        'benefits' => [
            ['title' => 'Sabe con quién compra', 'text' => 'Fábrica o intermediario, verificado antes del primer pago.'],
            ['title' => 'Negociación en chino', 'text' => 'Precio y mínimos discutidos en el idioma del proveedor, no por traductor automático.'],
            ['title' => 'Un solo envío', 'text' => 'Compras de varios proveedores consolidadas en una misma carga.'],
            ['title' => 'Todo por escrito', 'text' => 'Propuesta, alcance y responsabilidades definidos antes de empezar.'],
        ],
        'faq' => [
            ['q' => '¿Cuánto cobra un agente de compras en China?', 'a' => 'Depende del producto, la cantidad de proveedores y las etapas que contrate. Le enviamos una cotización escrita después de revisar su pedido.'],
            ['q' => '¿Cómo sé si un proveedor es fábrica o empresa comercial?', 'a' => 'El agente revisa el alcance de la licencia comercial y, cuando corresponde, visita la planta. Una empresa comercial no es necesariamente mala, pero usted debe saberlo para negociar.'],
            ['q' => '¿Le pago a ustedes o al proveedor?', 'a' => 'El producto se paga directamente al proveedor, a nombre de su empresa. El servicio del agente se factura por separado.'],
            ['q' => '¿Hay un monto mínimo de compra?', 'a' => 'No fijamos un mínimo propio, pero cada fábrica tiene su cantidad mínima (MOQ). Para pedidos muy chicos a veces conviene comprar por plataforma y usar un [courier de China a Paraguay](/comprar/courier-china-paraguay/).'],
            ['q' => '¿Necesito RUC para importar?', 'a' => 'Para importar con regularidad necesita RUC y la habilitación como importador en el registro de la DNIT, que prevé también un trámite para importadores ocasionales. Los pasos están en la guía sobre [cómo ser importador en Paraguay](/importar/como-ser-importador-paraguay/) y el despachante le confirma los requisitos vigentes para su caso.'],
        ],
        'cta' => [
            'label' => 'Pedir propuesta de agente de compras',
            'whatsappText' => '',
        ],
        'related' => ['inspeccion-de-calidad', 'importacion-llave-en-mano', 'flete-maritimo-contenedor'],
        'guides' => ['proveedores-chinos-confiables', 'alibaba-paraguay', 'pagar-a-proveedores-chinos'],
        'articles' => ['comercio-china-paraguay'],
        'toolLinks' => [
            ['path' => '/herramientas/calculadora-costo-importacion/', 'label' => 'Calculadora de costo de importación', 'text' => 'Estime cuánto le cuesta el producto puesto en Paraguay antes de negociar con el proveedor.'],
        ],
        'affiliates' => [],
        'disclaimer' => false,
        'image' => ['base' => '/assets/img/importar-de-china-deposito-fabrica', 'widths' => [640, 1280, 1920], 'alt' => 'Comprador y encargado revisan una lista junto a cajas de exportación en un depósito de fábrica en China', 'width' => 1920, 'height' => 1086],
    ],

    'inspeccion-de-calidad' => [
        'path' => '/servicios/inspeccion-de-calidad/',
        'title' => 'Inspección de calidad en China',
        'navLabel' => 'Inspección de calidad',
        'cluster' => 'importar',
        'parent' => null,
        'seoTitle' => 'Inspección de calidad en fábrica China',
        'metaDescription' => 'Inspección en la fábrica china antes del pago final: cantidades, medidas, terminaciones y empaque, con informe y fotos para usted.',
        'hero' => [
            'eyebrow' => 'Servicios',
            'h1' => 'Inspección de calidad en China',
            'h2' => 'Vea su mercadería con fotos e informe antes de pagar el saldo al proveedor.',
            'lead' => 'Una inspección de calidad en China controla su pedido en la fábrica antes del pago final: cantidades, medidas, terminaciones, funcionamiento y empaque, con informe y fotos. Coordinamos a un inspector independiente en China y usted decide con el informe en mano si paga, pide correcciones o frena el embarque.',
        ],
        'includes' => [
            'Inspección antes del embarque (pre-shipment) con muestreo según AQL',
            'Inspección durante la producción, para detectar fallas a tiempo',
            'Control de carga del contenedor (cantidad, estiba y precintado)',
            'Revisión de medidas, materiales, colores y funcionamiento contra su especificación',
            'Control de etiquetado, marcas y embalaje',
            'Informe escrito con fotos y lista de defectos encontrados',
        ],
        'excludes' => [
            'Ensayos de laboratorio o certificaciones oficiales (se cotizan aparte con un laboratorio)',
            'La reparación o reposición de productos defectuosos, que corresponde al proveedor',
            'La garantía de que no exista ningún defecto: el muestreo reduce el riesgo, no lo elimina',
        ],
        'weNeed' => [
            'Orden de compra o proforma con cantidades y modelos',
            'Especificaciones, fotos o muestra aprobada de referencia',
            'Dirección de la fábrica y contacto del proveedor',
            'Fecha estimada en que la producción estará terminada',
        ],
        'sections' => [
            [
                'h2' => 'Por qué inspeccionar antes de pagar',
                'body' => [
                    'Lo habitual es pagar un anticipo y el saldo antes del embarque. Si el saldo se paga sin ver la mercadería, el problema aparece recién en Paraguay, cuando ya no hay forma práctica de reclamar. Una inspección en origen le da evidencia para exigir correcciones mientras la fábrica todavía espera su pago. Es uno de los pasos de la guía sobre [cómo importar de China a Paraguay](/importar/como-importar-de-china-a-paraguay/).',
                ],
            ],
            [
                'h2' => 'Tipos de inspección',
                'body' => [
                    'El muestreo AQL (Acceptable Quality Limit, basado en la norma ISO 2859-1) define cuántas unidades se revisan según el tamaño del lote y cuántos defectos se aceptan. Usted elige el nivel de exigencia junto con el inspector.',
                ],
                'items' => [
                    ['title' => 'Durante la producción', 'text' => 'Se revisa cuando una parte del lote está terminada. Sirve para productos nuevos o proveedores con los que no trabajó antes.'],
                    ['title' => 'Antes del embarque', 'text' => 'Con la producción terminada y la mayor parte embalada. Es la inspección más común y la base para liberar el saldo.'],
                    ['title' => 'Control de carga', 'text' => 'El inspector presencia la carga del contenedor, verifica cantidades y estado de las cajas y registra el número de precinto.'],
                ],
            ],
            [
                'h2' => 'Quién hace qué',
                'body' => [
                    'La inspección la realiza un inspector o una empresa de inspección independiente en China, que le nombramos en la cotización. Nosotros acordamos con usted los criterios, coordinamos la visita con la fábrica y le entregamos el informe en español con una recomendación clara. La decisión de pagar o no siempre es suya.',
                ],
            ],
        ],
        'benefits' => [
            ['title' => 'Evidencia antes del pago', 'text' => 'Fotos e informe para negociar correcciones cuando todavía tiene poder de negociación.'],
            ['title' => 'Criterios claros', 'text' => 'Muestreo AQL acordado de antemano, no una opinión subjetiva.'],
            ['title' => 'Menos sorpresas en destino', 'text' => 'Menos devoluciones, reclamos de clientes y stock que no se puede vender.'],
        ],
        'faq' => [
            ['q' => '¿Qué es el muestreo AQL?', 'a' => 'Es un método estándar para decidir cuántas unidades revisar de un lote y cuántos defectos se toleran. Permite aceptar o rechazar el lote con criterios acordados.'],
            ['q' => '¿Cuándo conviene la inspección durante la producción?', 'a' => 'Con productos nuevos, pedidos grandes o proveedores sin historial con usted, porque los errores se corrigen antes de que todo el lote esté hecho. Si además necesita quien siga la producción, sume un [agente de compras en China](/servicios/agente-de-compras-china/).'],
            ['q' => '¿Qué pasa si la inspección no aprueba?', 'a' => 'Usted recibe el informe con los defectos y puede pedir retrabajo, reposición o una nueva inspección antes de pagar el saldo.'],
            ['q' => '¿Cuánto cuesta una inspección?', 'a' => 'Depende de la ciudad de la fábrica, el tipo de inspección y los días de trabajo. Le enviamos la cotización escrita antes de programarla.'],
            ['q' => '¿El proveedor tiene que aceptar la inspección?', 'a' => 'Conviene dejarla escrita en la orden de compra. Un proveedor serio no se opone a que un tercero revise el pedido; si pone trabas, es una de las señales de alerta de la guía sobre [proveedores chinos confiables](/importar/proveedores-chinos-confiables/).'],
        ],
        'cta' => [
            'label' => 'Pedir cotización de inspección',
            'whatsappText' => '',
        ],
        'related' => ['agente-de-compras-china', 'importacion-llave-en-mano', 'flete-maritimo-contenedor'],
        'guides' => ['proveedores-chinos-confiables', 'como-importar-de-china-a-paraguay'],
        'articles' => ['errores-al-importar-de-china'],
        'toolLinks' => [
            ['path' => '/herramientas/calculadora-costo-importacion/', 'label' => 'Calculadora de costo de importación', 'text' => 'Sume la inspección a su costo total y vea cuánto pesa sobre el precio final.'],
        ],
        'affiliates' => [],
        'disclaimer' => false,
        'image' => ['base' => '/assets/img/inspeccion-de-calidad-fabrica-china', 'widths' => [640, 1280], 'alt' => 'Inspector de calidad mide una prenda con cinta métrica en una mesa de control en una fábrica', 'width' => 1280, 'height' => 716],
    ],

    'flete-maritimo-contenedor' => [
        'path' => '/servicios/flete-maritimo-contenedor/',
        'title' => 'Flete marítimo desde China: contenedor y carga consolidada',
        'navLabel' => 'Flete marítimo y contenedor',
        'cluster' => 'importar',
        'parent' => null,
        'seoTitle' => 'Flete marítimo China–Paraguay',
        'metaDescription' => 'Contenedor completo o carga consolidada desde China a Paraguay: puerto de salida, transbordo, llegada por río o por tierra y qué define los plazos.',
        'hero' => [
            'eyebrow' => 'Servicios',
            'h1' => 'Flete marítimo desde China: contenedor y carga consolidada',
            'h2' => 'Contenedor completo o espacio compartido, cotizado por un forwarder que conoce la ruta a Paraguay.',
            'lead' => 'El flete marítimo desde China a Paraguay se hace en contenedor completo (FCL) o en carga consolidada (LCL), con transbordo en un puerto de la región y llegada por barcaza fluvial o por camión. Lo conectamos con un forwarder independiente que le cotiza por escrito la ruta, el plazo estimado y lo que incluye cada precio.',
        ],
        'includes' => [
            'Cotización de contenedor completo (FCL) de 20 o 40 pies',
            'Cotización de carga consolidada (LCL) por metro cúbico',
            'Retiro en la fábrica o entrega en puerto chino, según el Incoterm',
            'Comparación de ruta fluvial y ruta terrestre hasta Paraguay',
            'Coordinación de documentos de embarque (conocimiento de embarque, factura, lista de empaque)',
            'Seguro de carga, si usted lo solicita',
            'Seguimiento del envío hasta la llegada a Paraguay',
        ],
        'excludes' => [
            'El despacho aduanero y el pago de tributos en Paraguay (despachante matriculado)',
            'La compra y el pago de la mercadería al proveedor',
            'Plazos garantizados: las navieras pueden cambiar escalas y fechas',
        ],
        'weNeed' => [
            'Producto y posición arancelaria, si la conoce',
            'Volumen en metros cúbicos (CBM) y peso bruto',
            'Incoterm acordado con el proveedor (EXW, FOB, CIF u otro)',
            'Ciudad de retiro en China y ciudad de destino en Paraguay',
            'Fecha en que la mercadería estará lista',
        ],
        'sections' => [
            [
                'h2' => 'Contenedor completo o carga consolidada',
                'body' => [
                    'Con pocos metros cúbicos se paga por el espacio que usa dentro de un [contenedor compartido](/importar/contenedor-compartido-desde-china/) (LCL). A partir de cierto volumen, un contenedor propio (FCL) sale más barato por unidad y reduce manipulación y riesgo de daño. El punto exacto depende de las tarifas del momento; el forwarder le cotiza ambas opciones para que compare, y la [calculadora de CBM y contenedor](/herramientas/calculadora-cbm-contenedor/) le da el volumen de su carga.',
                ],
                'items' => [
                    ['title' => 'LCL (consolidado)', 'text' => 'Para primeros pedidos y volúmenes chicos. Se cobra por metro cúbico o peso, lo que resulte mayor.'],
                    ['title' => 'FCL 20 pies', 'text' => 'Para cargas medianas o pesadas. Contenedor exclusivo, precintado en origen.'],
                    ['title' => 'FCL 40 pies', 'text' => 'Para cargas voluminosas. Más espacio por un costo que no se duplica respecto al de 20 pies.'],
                ],
            ],
            [
                'h2' => 'Cómo llega la carga a Paraguay',
                'body' => [
                    'Paraguay no tiene costa, así que la carga sale de un puerto chino, viaja hasta un puerto de la región y hace transbordo, hoy sobre todo en Buenos Aires y también en Montevideo. Desde ahí sigue en barcaza por la hidrovía Paraná-Paraguay hasta las terminales de Asunción o Villeta. Otra vía es el puerto brasileño de Paranaguá, donde Paraguay tiene depósitos francos, y desde ahí camión hasta Ciudad del Este. Cada ruta tiene distinto plazo, costo y riesgo según la época del año y el nivel del río.',
                    'El forwarder le indica qué rutas ofrece para su carga, cuál recomienda y el plazo estimado vigente al momento de cotizar. No publicamos días de tránsito porque cambian con las escalas de las navieras y el nivel del río.',
                ],
            ],
            [
                'h2' => 'Quién hace qué',
                'body' => [
                    'El transporte lo ejecuta un forwarder independiente, que contrata a la naviera y al transporte fluvial o terrestre. Nosotros le ayudamos a preparar la solicitud, comparamos la cotización con usted y lo conectamos con un despachante de aduana matriculado para la llegada, a través del servicio de [despacho aduanero](/servicios/despacho-aduanero/).',
                ],
            ],
        ],
        'benefits' => [
            ['title' => 'Cotización comparada', 'text' => 'FCL y LCL, ruta fluvial y terrestre, en un mismo documento.'],
            ['title' => 'Costos visibles', 'text' => 'Qué incluye el flete y qué gastos aparecen en destino, por escrito.'],
            ['title' => 'Conexión con el despacho', 'text' => 'La llegada coordinada con el despachante para no pagar demoras innecesarias.'],
        ],
        'faq' => [
            ['q' => '¿Cuánto tarda un contenedor de China a Paraguay?', 'a' => 'Depende del puerto de salida, del transbordo y de la ruta final. El forwarder le da el plazo estimado vigente en la cotización.'],
            ['q' => '¿Desde cuántos metros cúbicos conviene un contenedor propio?', 'a' => 'No hay un número fijo: depende de las tarifas del momento. Pida ambas cotizaciones y compare el costo por unidad de producto.'],
            ['q' => '¿Qué es mejor, ruta fluvial o terrestre?', 'a' => 'La fluvial suele usarse para contenedores; la terrestre puede ser útil cuando el río está bajo o el plazo apremia. Se decide caso por caso.'],
            ['q' => '¿Qué Incoterm me conviene?', 'a' => 'Con FOB usted controla el flete internacional y elige su forwarder. Con EXW también se encarga del retiro en fábrica y los trámites de exportación en China. Lo explicamos en la guía sobre [cómo importar de China a Paraguay](/importar/como-importar-de-china-a-paraguay/).'],
            ['q' => '¿El flete incluye el despacho en Paraguay?', 'a' => 'No. El despacho lo hace un despachante de aduana matriculado; se lo coordinamos si lo necesita.'],
        ],
        'cta' => [
            'label' => 'Pedir cotización de flete marítimo',
            'whatsappText' => '',
        ],
        'related' => ['flete-aereo-china', 'importacion-llave-en-mano', 'despacho-aduanero'],
        'guides' => ['contenedor-compartido-desde-china', 'como-importar-de-china-a-paraguay', 'tributos-aduaneros-paraguay'],
        'articles' => [],
        'toolLinks' => [
            ['path' => '/herramientas/calculadora-cbm-contenedor/', 'label' => 'Calculadora de CBM y contenedor', 'text' => 'Calcule los metros cúbicos de su carga y vea si le conviene LCL o un contenedor completo.'],
            ['path' => '/herramientas/calculadora-costo-importacion/', 'label' => 'Calculadora de costo de importación', 'text' => 'Sume flete, seguro y tributos estimados para ver el costo de su producto puesto en Paraguay.'],
        ],
        'affiliates' => [],
        'disclaimer' => false,
        'image' => ['base' => '/assets/img/flete-maritimo-buque-portacontenedores', 'widths' => [640, 1280], 'alt' => 'Buque portacontenedores saliendo de un puerto chino al amanecer, con un remolcador al costado', 'width' => 1280, 'height' => 716],
    ],

    'flete-aereo-china' => [
        'path' => '/servicios/flete-aereo-china/',
        'title' => 'Flete aéreo desde China a Paraguay',
        'navLabel' => 'Flete aéreo',
        'cluster' => 'importar',
        'parent' => null,
        'seoTitle' => 'Flete aéreo y courier de carga desde China',
        'metaDescription' => 'Carga aérea desde China a Paraguay para muestras, repuestos y pedidos urgentes: cuándo conviene frente al marítimo y cómo se cotiza.',
        'hero' => [
            'eyebrow' => 'Servicios',
            'h1' => 'Flete aéreo desde China a Paraguay',
            'h2' => 'Para muestras, repuestos y pedidos urgentes que no pueden esperar al barco.',
            'lead' => 'El flete aéreo desde China a Paraguay conviene para muestras, pedidos urgentes y mercadería de alto valor y poco peso, porque llega mucho antes que por mar aunque cuesta más por kilo. Lo conectamos con un forwarder independiente que le cotiza por escrito según el peso cobrable de su carga.',
        ],
        'includes' => [
            'Cotización de carga aérea desde el aeropuerto o la fábrica en China',
            'Cálculo del peso cobrable (peso real o volumétrico)',
            'Retiro en fábrica y trámites de exportación en China, según el Incoterm',
            'Guía aérea y documentos de embarque',
            'Seguro de carga, si usted lo solicita',
            'Seguimiento hasta la llegada al aeropuerto en Paraguay',
        ],
        'excludes' => [
            'El despacho aduanero en Paraguay (despachante matriculado)',
            'Mercadería peligrosa sin la documentación exigida (baterías sueltas, líquidos inflamables y similares)',
            'Envíos personales de compras online: para eso existe el courier',
        ],
        'weNeed' => [
            'Descripción del producto e indicación de si lleva baterías o líquidos',
            'Peso bruto y medidas de cada caja',
            'Cantidad de cajas',
            'Ciudad de retiro en China e Incoterm acordado',
        ],
        'sections' => [
            [
                'h2' => 'Cuándo el aéreo le gana al marítimo',
                'body' => [
                    'El avión cobra mucho más por kilo que el [flete marítimo](/servicios/flete-maritimo-contenedor/), pero ahorra semanas. Conviene cuando el tiempo vale más que el flete: una muestra para aprobar la producción, un repuesto que tiene parada una máquina, o productos chicos y caros donde el flete pesa poco sobre el precio.',
                ],
                'items' => [
                    ['title' => 'Muestras', 'text' => 'Para aprobar un producto antes de ordenar la producción completa.'],
                    ['title' => 'Urgencias', 'text' => 'Repuestos o reposición de stock que no puede esperar el tránsito marítimo.'],
                    ['title' => 'Alto valor, poco peso', 'text' => 'Electrónica, accesorios o componentes donde el flete representa una parte chica del costo.'],
                ],
            ],
            [
                'h2' => 'Cómo se cotiza: el peso cobrable',
                'body' => [
                    'Las aerolíneas cobran por el mayor entre el peso real y el peso volumétrico, que se calcula a partir de las medidas de las cajas: en carga aérea, la referencia que recomienda la IATA es dividir los centímetros cúbicos por 6000 (unos 167 kg por metro cúbico), aunque algunos couriers usan 5000. Una carga liviana pero voluminosa paga por su volumen. Por eso el forwarder le pide medidas y peso de cada caja, y un buen embalaje puede bajar el costo.',
                    'A ese flete se suman gastos en origen (retiro, trámites de exportación), gastos en el aeropuerto de destino y el despacho en Paraguay. Pida que la cotización los detalle por separado, así puede comparar ofertas de igual a igual y sumarlos en la [calculadora de costo de importación](/herramientas/calculadora-costo-importacion/).',
                ],
            ],
            [
                'h2' => 'Quién hace qué',
                'body' => [
                    'El transporte lo ejecuta un forwarder independiente, que reserva el espacio con la aerolínea. Nosotros ordenamos su solicitud, revisamos la cotización con usted y lo conectamos con un despachante de aduana matriculado, a través del servicio de [despacho aduanero](/servicios/despacho-aduanero/), para liberar la carga en Paraguay.',
                ],
            ],
        ],
        'benefits' => [
            ['title' => 'Rapidez', 'text' => 'Días en lugar de semanas para lo que no puede esperar.'],
            ['title' => 'Cotización clara', 'text' => 'Peso cobrable calculado y explicado antes de embarcar.'],
            ['title' => 'Carga formal', 'text' => 'Con documentos de importación, no como envío personal.'],
        ],
        'faq' => [
            ['q' => '¿Cuánto tarda el flete aéreo de China a Paraguay?', 'a' => 'Depende de las conexiones disponibles y del trámite en destino. El forwarder le indica el plazo estimado en la cotización.'],
            ['q' => '¿Qué es el peso volumétrico?', 'a' => 'Es un peso calculado según las medidas de la caja. Se cobra el mayor entre ese valor y el peso real.'],
            ['q' => '¿Cuál es la diferencia con un courier?', 'a' => 'El [courier de China a Paraguay](/comprar/courier-china-paraguay/) está pensado para paquetes y compras online. La carga aérea es para envíos comerciales más grandes, con despacho formal de importación.'],
            ['q' => '¿Conviene mandar una parte por avión y el resto por barco?', 'a' => 'Es una práctica común: se envía por avión lo necesario para empezar a vender o para aprobar la calidad, y el resto viaja en el marítimo, más económico.'],
            ['q' => '¿Puedo enviar productos con baterías de litio?', 'a' => 'Las baterías de litio son mercancía peligrosa y viajan según la Reglamentación de Mercancías Peligrosas de la IATA, con embalaje, etiquetado y documentación específicos; algunas no se aceptan en avión de pasajeros. Indíquelo al pedir la cotización para que el forwarder confirme si puede llevarlas y en qué condiciones.'],
        ],
        'cta' => [
            'label' => 'Pedir cotización de flete aéreo',
            'whatsappText' => '',
        ],
        'related' => ['flete-maritimo-contenedor', 'importacion-llave-en-mano', 'despacho-aduanero'],
        'guides' => ['como-importar-de-china-a-paraguay', 'courier-china-paraguay', 'tributos-aduaneros-paraguay'],
        'articles' => [],
        'toolLinks' => [
            ['path' => '/herramientas/calculadora-costo-importacion/', 'label' => 'Calculadora de costo de importación', 'text' => 'Compare el costo final de su producto con flete aéreo y con flete marítimo.'],
        ],
        'affiliates' => [],
        'disclaimer' => false,
    ],

    'importacion-llave-en-mano' => [
        'path' => '/servicios/importacion-llave-en-mano/',
        'title' => 'Importación llave en mano desde China',
        'navLabel' => 'Importación llave en mano',
        'cluster' => 'importar',
        'parent' => null,
        'seoTitle' => 'Importación llave en mano desde China',
        'metaDescription' => 'Del proveedor chino a su depósito en Paraguay con un solo interlocutor: compra, inspección, flete, seguro y despacho coordinados.',
        'hero' => [
            'eyebrow' => 'Servicios',
            'h1' => 'Importación llave en mano desde China',
            'h2' => 'Un solo interlocutor en español, desde la fábrica en China hasta su depósito en Paraguay.',
            'lead' => 'La importación llave en mano desde China reúne en un solo interlocutor la búsqueda del proveedor, la inspección, el flete, el seguro y el despacho en Paraguay. Nosotros coordinamos a los profesionales independientes que ejecutan cada etapa, y usted recibe una propuesta escrita que dice quién hace qué antes de empezar.',
        ],
        'includes' => [
            'Búsqueda y verificación de proveedores con un agente independiente en China',
            'Negociación, muestras y seguimiento de la producción',
            'Inspección de calidad antes del embarque',
            'Flete marítimo o aéreo con un forwarder independiente, con seguro opcional',
            'Despacho aduanero por un despachante de aduana matriculado',
            'Entrega en su depósito en Paraguay',
            'Un calendario y un informe de avance por etapa',
        ],
        'excludes' => [
            'El pago de la mercadería, que usted hace directamente al proveedor',
            'El pago de tributos aduaneros, que corresponde al importador',
            'La reventa o distribución de la mercadería en Paraguay',
        ],
        'weNeed' => [
            'Producto, cantidad y precio objetivo',
            'Requisitos de calidad, marca y etiquetado',
            'RUC de la empresa importadora',
            'Dirección de entrega en Paraguay y fecha deseada',
        ],
        'sections' => [
            [
                'h2' => 'El problema de coordinar cinco partes',
                'body' => [
                    'Una importación desde China involucra a un proveedor, un agente o inspector, una naviera o aerolínea, un forwarder y un despachante. Cuando cada uno responde por separado, los errores quedan entre medio: documentos que no coinciden, cargas que esperan en puerto, costos que nadie anticipó. Con un solo interlocutor, alguien sigue el pedido de punta a punta, en el orden que describe la guía sobre [cómo importar de China a Paraguay](/importar/como-importar-de-china-a-paraguay/).',
                ],
            ],
            [
                'h2' => 'Quién hace qué',
                'body' => [
                    'No somos despachantes ni transportistas. Coordinamos a profesionales independientes que ejecutan cada etapa, elegidos para su pedido y nombrados en la propuesta, y le respondemos a usted por el conjunto.',
                ],
                'items' => [
                    ['title' => 'Agente independiente en China', 'text' => 'Busca y verifica proveedores, negocia y sigue la producción.'],
                    ['title' => 'Inspector independiente', 'text' => 'Controla la mercadería antes del embarque y emite el informe.'],
                    ['title' => 'Forwarder independiente', 'text' => 'Contrata el transporte internacional y el tramo hasta Paraguay.'],
                    ['title' => 'Despachante de aduana matriculado', 'text' => 'Clasifica la mercadería, liquida los tributos y hace el despacho ante la aduana.'],
                    ['title' => 'Nosotros', 'text' => 'Su interlocutor en español: propuesta, calendario, seguimiento y coordinación entre las partes.'],
                ],
            ],
            [
                'h2' => 'Cuándo conviene',
                'body' => [
                    'El servicio llave en mano tiene sentido cuando usted no tiene tiempo ni equipo para seguir cada etapa, cuando es su primera importación desde China, o cuando el producto exige control de calidad y documentación cuidadosa. Si ya tiene un proveedor de confianza y un despachante habitual, quizás solo necesite contratar por separado el [flete marítimo](/servicios/flete-maritimo-contenedor/) o la [inspección de calidad](/servicios/inspeccion-de-calidad/).',
                ],
            ],
            [
                'h2' => 'Cómo empezamos',
                'body' => [
                    'Usted nos describe el producto y la cantidad. Le enviamos una propuesta escrita con las etapas, los profesionales que intervienen y el costo del servicio de coordinación, separado de lo que pagará al proveedor, al transporte y en la aduana. Nada avanza sin su aprobación.',
                ],
            ],
        ],
        'benefits' => [
            ['title' => 'Un interlocutor', 'text' => 'Una sola persona sigue su pedido de la fábrica al depósito.'],
            ['title' => 'Responsabilidades claras', 'text' => 'Cada etapa tiene un responsable nombrado por escrito.'],
            ['title' => 'Costos separados', 'text' => 'Producto, flete, tributos y coordinación, cada uno visible.'],
            ['title' => 'Su nombre, su importación', 'text' => 'La mercadería se importa a nombre de su empresa.'],
        ],
        'faq' => [
            ['q' => '¿Ustedes hacen el despacho aduanero?', 'a' => 'No. El despacho lo realiza un despachante de aduana matriculado con el que lo conectamos. Nosotros coordinamos que tenga los documentos a tiempo.'],
            ['q' => '¿La importación queda a mi nombre?', 'a' => 'Sí. Su empresa es la importadora, paga al proveedor y los tributos, y recibe la mercadería.'],
            ['q' => '¿Sirve para una primera importación?', 'a' => 'Sí, es la opción que más acompañamiento da. Si todavía no está inscripto como importador, la guía sobre [cómo ser importador en Paraguay](/importar/como-ser-importador-paraguay/) resume los pasos y el despachante le indica los requisitos vigentes.'],
            ['q' => '¿Cuánto cuesta el servicio llave en mano?', 'a' => 'Depende del producto, el volumen y las etapas. Le enviamos una propuesta escrita con cada costo separado.'],
            ['q' => '¿Puedo contratar solo algunas etapas?', 'a' => 'Sí. Puede pedir por separado el [agente de compras en China](/servicios/agente-de-compras-china/), la inspección, el flete o el [despacho aduanero](/servicios/despacho-aduanero/).'],
        ],
        'cta' => [
            'label' => 'Pedir propuesta llave en mano',
            'whatsappText' => '',
        ],
        'related' => ['agente-de-compras-china', 'flete-maritimo-contenedor', 'despacho-aduanero'],
        'guides' => ['como-importar-de-china-a-paraguay', 'como-ser-importador-paraguay', 'requisitos-para-importar-paraguay'],
        'articles' => ['errores-al-importar-de-china'],
        'toolLinks' => [
            ['path' => '/herramientas/calculadora-costo-importacion/', 'label' => 'Calculadora de costo de importación', 'text' => 'Estime el costo total de su importación antes de pedir la propuesta.'],
        ],
        'affiliates' => [],
        'disclaimer' => false,
        'image' => ['base' => '/assets/img/como-importar-de-china-plan-ruta', 'widths' => [640, 1280], 'alt' => 'Cuaderno con una ruta de envío dibujada, muestras de productos, un contenedor en miniatura y un pasaporte', 'width' => 1280, 'height' => 716],
    ],

];

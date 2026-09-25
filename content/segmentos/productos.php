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

/* Cluster file loaded by content/segmentos.php. Product pages under /importar/. */

declare(strict_types=1);

return [

    'importar-ropa-de-china' => [
        'path' => '/importar/ropa-de-china/',
        'navLabel' => 'Ropa',
        'seoTitle' => 'Importar ropa de China a Paraguay',
        'metaDescription' => 'Cómo importar ropa de China a Paraguay: proveedores, talles, etiquetado, mínimos de compra, flete y lo que cuesta ponerla en su local.',
        'hero' => [
            'eyebrow' => 'Importar por producto',
            'h1' => 'Importar ropa de China a Paraguay',
            'lead' => 'Para importar ropa de China a Paraguay se elige un proveedor mayorista o una fábrica, se aprueban muestras con la tabla de talles, se paga, se inspecciona el lote y se trae por flete marítimo consolidado o contenedor, con despacho a cargo de un despachante de aduana. La mayor parte de las pérdidas en ropa viene de talles, calidad de tela y etiquetas, no del flete.',
        ],
        'leadSlug' => 'agente-de-compras-china',
        'bundle' => [
            'agente-de-compras-china',
            'inspeccion-de-calidad',
            'flete-maritimo-contenedor',
            'despacho-aduanero',
        ],
        'traps' => [
            [
                'title' => 'Talles asiáticos',
                'text' => 'Un talle M chino suele equivaler a un S local. Pida siempre la tabla de medidas en centímetros (pecho, largo, cintura) de cada modelo y compárela con prendas que ya vende. No compre por la letra del talle.',
            ],
            [
                'title' => 'Foto de catálogo contra tela real',
                'text' => 'Muchas publicaciones usan la misma foto para telas de distinto gramaje. Pida la composición exacta (por ejemplo, porcentaje de algodón y poliéster) y el gramaje, y apruebe una muestra física antes de pagar el lote completo.',
            ],
            [
                'title' => 'Etiquetas de composición y cuidado',
                'text' => 'Paraguay incorporó por el Decreto 3383/2020 el reglamento técnico Mercosur de etiquetado textil (Resolución GMC 62/18): la etiqueta debe indicar, entre otros datos, el fabricante o importador con su identificación fiscal, el país de origen, la composición de fibras en porcentaje y las instrucciones de cuidado. Es mucho más barato que la fábrica cosa la etiqueta correcta en origen que reetiquetar en su depósito; confirme el detalle vigente con su despachante o el MIC.',
            ],
            [
                'title' => 'Surtido de talles y colores',
                'text' => 'El mínimo de compra suele ser por modelo y color, no por pedido. Si reparte mal los talles, le quedan cajas de XL sin vender. Defina la curva de talles según lo que rota en su local antes de negociar.',
            ],
            [
                'title' => 'Marcas y logos ajenos',
                'text' => 'Importar ropa con marcas o logos falsificados es ilegal: la mercadería puede ser retenida y decomisada en aduana y usted pierde todo lo pagado. Trabaje con prendas sin marca o con su propia marca.',
            ],
        ],
        'sections' => [
            [
                'h2' => 'Dónde conseguir proveedores de ropa',
                'body' => [
                    'Para volúmenes chicos y surtidos variados, las plataformas mayoristas como 1688 y Alibaba permiten comprar pocas docenas por modelo, en general a través de un agente que consolida varios vendedores. Para volúmenes mayores o prendas con su marca, conviene ir directo a fábricas, que trabajan con mínimos más altos pero permiten elegir tela, color y etiqueta.',
                    'Los polos textiles chinos están especializados por tipo de prenda (ropa femenina, jeans, ropa deportiva, ropa infantil). Un [agente de compras en China](/servicios/agente-de-compras-china/) puede visitar mayoristas, comparar precios y reunir el pedido en un solo depósito antes del embarque.',
                ],
            ],
            [
                'h2' => 'Cómo se forma el costo de una prenda puesta en su local',
                'body' => [
                    'Al precio de fábrica se suman el flete interno en China, el flete internacional (la ropa ocupa volumen, por eso se cotiza por metro cúbico en carga consolidada), el seguro, los tributos de importación que el despachante calcula según la posición arancelaria NCM de cada prenda, los honorarios del despachante y el transporte hasta su depósito.',
                    'La ropa pesa poco y ocupa espacio: prendas bien dobladas y comprimidas en bolsas reducen el volumen y el costo por unidad. Con la [calculadora de costo de importación](/herramientas/calculadora-costo-importacion/) puede sumar cada componente antes de comprar. Antes de un primer pedido, un [inspección de calidad](/servicios/inspeccion-de-calidad/) sobre una muestra del lote evita sorpresas de talles y costuras, y el orden completo del proceso está en la guía sobre [cómo importar de China a Paraguay](/importar/como-importar-de-china-a-paraguay/).',
                ],
            ],
        ],
        'weNeed' => [
            'Tipo de prendas y fotos o links de referencia',
            'Cantidad aproximada por modelo y curva de talles',
            'Si quiere etiqueta propia o prendas sin marca',
            'Presupuesto total y fecha en que necesita la mercadería',
        ],
        'faq' => [
            [
                'q' => '¿Cuál es el mínimo para importar ropa de China?',
                'a' => 'Depende del proveedor. En plataformas mayoristas puede comprar desde pocas unidades por modelo; las fábricas que confeccionan con su etiqueta piden mínimos más altos por modelo y color. Lo confirma cada proveedor al cotizar.',
            ],
            [
                'q' => '¿Conviene traer ropa por avión o por barco?',
                'a' => 'Para muestras o reposiciones urgentes, el avión o un courier. Para stock de temporada, el [flete marítimo en contenedor](/servicios/flete-maritimo-contenedor/) en carga consolidada suele ser más barato por prenda, aunque tarda más, por lo que hay que planificar con varios meses de anticipación.',
            ],
            [
                'q' => '¿Puedo importar ropa de marcas conocidas?',
                'a' => 'Solo si compra producto original a un distribuidor autorizado por la marca. Las réplicas y falsificaciones son ilegales y la aduana puede decomisarlas.',
            ],
            [
                'q' => '¿Cuánto se paga de impuestos por importar ropa?',
                'a' => 'Los tributos dependen de la posición arancelaria de cada prenda y del valor en aduana. El despachante le confirma la alícuota vigente antes de embarcar; puede ver los conceptos en la guía de [tributos aduaneros](/aduana/tributos-aduaneros-paraguay/) y pedir el despacho con el servicio de [despacho aduanero](/servicios/despacho-aduanero/).',
            ],
        ],
        'image' => null,
    ],

    'importar-zapatillas-de-china' => [
        'path' => '/importar/zapatillas-de-china/',
        'navLabel' => 'Zapatillas',
        'seoTitle' => 'Importar zapatillas de China',
        'metaDescription' => 'Importar zapatillas de China a Paraguay: fábricas, numeración, marcas registradas, control de calidad y costos de flete por par.',
        'hero' => [
            'eyebrow' => 'Importar por producto',
            'h1' => 'Importar zapatillas de China a Paraguay',
            'lead' => 'Para importar zapatillas de China a Paraguay se trabaja con fábricas o mayoristas de calzado sin marca o con marca propia, se aprueba una muestra por modelo, se controla la calidad antes del embarque y se trae por flete marítimo con despacho aduanero. Las zapatillas de marcas conocidas que no provienen del titular de la marca son falsificaciones y se decomisan.',
        ],
        'leadSlug' => 'agente-de-compras-china',
        'bundle' => [
            'agente-de-compras-china',
            'inspeccion-de-calidad',
            'flete-maritimo-contenedor',
            'despacho-aduanero',
        ],
        'traps' => [
            [
                'title' => 'Réplicas de marcas registradas',
                'text' => 'Las ofertas de zapatillas de marcas famosas a precio de fábrica son réplicas. Importarlas es ilegal: la aduana puede retener y decomisar el lote, y usted puede enfrentar reclamos del titular de la marca. Trabaje con modelos genéricos o con su propia marca.',
            ],
            [
                'title' => 'Numeración europea, china y local',
                'text' => 'Las fábricas usan numeración europea o china, y la horma varía entre modelos. Pida el largo de plantilla en centímetros por número y pruebe la muestra con pies reales antes de fijar la curva de numeración.',
            ],
            [
                'title' => 'Suela y pegado',
                'text' => 'El defecto más caro en calzado es la suela que se despega o se agrieta a los pocos meses. En la inspección se revisa el pegado, restos de pegamento, simetría del par y que ambos zapatos sean del mismo número.',
            ],
            [
                'title' => 'Olor, humedad y moho en el contenedor',
                'text' => 'El viaje marítimo es largo y con cambios de temperatura. Sin bolsas desecantes en cada caja, el calzado puede llegar con moho. Exija desecante y cajas de cartón firme en la orden de compra.',
            ],
        ],
        'sections' => [
            [
                'h2' => 'Fábricas y mayoristas de calzado en China',
                'body' => [
                    'China concentra la producción de calzado en polos industriales especializados, con fábricas de zapatillas deportivas, urbanas e infantiles. Las fábricas trabajan con un mínimo por modelo y color; los mayoristas de plataformas como 1688 permiten pedidos mixtos más chicos, a cambio de menos control sobre materiales.',
                    'Si quiere su propia marca, la fábrica puede aplicar su logo en la lengüeta, la plantilla y la caja. Registre su marca en Paraguay antes de invertir en empaque personalizado. Un [agente de compras en China](/servicios/agente-de-compras-china/) puede comparar fábricas y seguir la producción, y el proceso general está en la guía sobre [cómo importar de China a Paraguay](/importar/como-importar-de-china-a-paraguay/).',
                ],
            ],
            [
                'h2' => 'Costo por par y logística',
                'body' => [
                    'El calzado viaja en cajas individuales dentro de cajas madre, así que ocupa bastante volumen. Pida a la fábrica las medidas y el peso de la caja madre y cuántos pares entran: con ese dato calcula los metros cúbicos y el flete por par con la [calculadora CBM](/herramientas/calculadora-cbm-contenedor/) y cotiza el [flete marítimo en contenedor](/servicios/flete-maritimo-contenedor/).',
                    'Al precio FOB se suman flete, seguro, tributos según la posición arancelaria que el despachante asigne, honorarios del [despacho aduanero](/servicios/despacho-aduanero/) y transporte local. Quitar la caja individual reduce volumen, pero deja el producto menos presentable para la venta.',
                ],
            ],
        ],
        'weNeed' => [
            'Fotos o links de los modelos que busca',
            'Numeración que vende y cantidad por número',
            'Si trabaja con marca propia o producto genérico',
            'Presupuesto y fecha objetivo de llegada',
        ],
        'faq' => [
            [
                'q' => '¿Es legal importar zapatillas de China?',
                'a' => 'Sí, siempre que sean productos sin marca, de su propia marca o de una marca cuyo titular autorice la venta. Las réplicas de marcas registradas son ilegales y se decomisan.',
            ],
            [
                'q' => '¿Cuántos pares tengo que comprar como mínimo?',
                'a' => 'Cada fábrica fija su mínimo por modelo y color. Los mayoristas en plataformas suelen aceptar cantidades menores. El agente de compras le presenta opciones según su volumen.',
            ],
            [
                'q' => '¿Cómo controlo la calidad si no viajo a China?',
                'a' => 'Con muestras aprobadas antes de la producción y una [inspección de calidad](/servicios/inspeccion-de-calidad/) en fábrica antes del embarque, que revisa costuras, pegado, numeración y empaque sobre una muestra del lote.',
            ],
            [
                'q' => '¿Qué tributos pagan las zapatillas importadas?',
                'a' => 'Dependen de la posición arancelaria (material de la capellada y la suela) y del valor en aduana. Vea los conceptos en la guía de [tributos aduaneros](/aduana/tributos-aduaneros-paraguay/); el despachante le confirma la alícuota vigente antes del embarque.',
            ],
            [
                'q' => '¿Puedo poner mi propia marca en las zapatillas?',
                'a' => 'Sí. La fábrica puede aplicar su logo en lengüeta, plantilla y caja si usted le entrega el diseño. Conviene tener la marca registrada en Paraguay antes de producir, para proteger la inversión en moldes y empaque.',
            ],
        ],
        'image' => null,
    ],

    'importar-celulares-de-china' => [
        'path' => '/importar/celulares-de-china/',
        'navLabel' => 'Celulares',
        'seoTitle' => 'Importar celulares de China',
        'metaDescription' => 'Importar celulares y accesorios de China a Paraguay: modelos globales, homologación, garantía, baterías en el flete y proveedores.',
        'hero' => [
            'eyebrow' => 'Importar por producto',
            'h1' => 'Importar celulares de China a Paraguay',
            'lead' => 'Para importar celulares de China a Paraguay necesita un proveedor que venda versiones globales compatibles con las redes locales, cumplir la homologación de equipos de telecomunicaciones ante el ente regulador y embarcar las baterías de litio con un transportista que las acepte. Los accesorios (fundas, cables, cargadores) son un negocio más sencillo para empezar.',
        ],
        'leadSlug' => 'agente-de-compras-china',
        'bundle' => [
            'agente-de-compras-china',
            'inspeccion-de-calidad',
            'flete-maritimo-contenedor',
            'despacho-aduanero',
        ],
        'traps' => [
            [
                'title' => 'Versión china en lugar de versión global',
                'text' => 'Muchos modelos tienen una versión para el mercado chino, con otras bandas de frecuencia, sin servicios de Google o con software solo en chino. Pida por escrito que sea la versión global y compare sus bandas LTE con las que informan las operadoras que operan en Paraguay.',
            ],
            [
                'title' => 'Homologación de equipos',
                'text' => 'Los celulares destinados al mercado paraguayo necesitan una licencia previa de importación del MIC, que exige el certificado de homologación de la CONATEL (Decreto 6832/2017, modificado por el Decreto 8839/2023); la CONATEL publica el procedimiento en [conatel.gov.py](https://www.conatel.gov.py/). Confirme con la CONATEL o su despachante si el modelo ya está homologado y qué documentos técnicos debe pedir al fabricante antes de comprar.',
            ],
            [
                'title' => 'Baterías de litio en el flete',
                'text' => 'Las baterías de litio son mercancía peligrosa para el transporte y viajan en avión según la Reglamentación de Mercancías Peligrosas de la IATA. No todos los couriers ni aerolíneas las aceptan y exigen documentación y embalaje específicos. Consulte al transitario de [flete aéreo desde China](/servicios/flete-aereo-china/) antes de elegir el medio de envío.',
            ],
            [
                'title' => 'Equipos reacondicionados vendidos como nuevos',
                'text' => 'Hay mayoristas que venden equipos reacondicionados o con piezas cambiadas. Exija que la factura indique el estado, controle números IMEI y haga una [inspección de calidad](/servicios/inspeccion-de-calidad/) que abra cajas al azar y pruebe los equipos.',
            ],
            [
                'title' => 'Accesorios con logos de marcas',
                'text' => 'Cargadores y fundas con logos de marcas conocidas sin autorización son falsificaciones: se decomisan en aduana. Además, un cargador de baja calidad es un riesgo de seguridad para su cliente.',
            ],
        ],
        'sections' => [
            [
                'h2' => 'Equipos o accesorios: dos negocios distintos',
                'body' => [
                    'Importar celulares completos exige más capital, controles de homologación, garantía y logística de baterías. Por eso muchos importadores empiezan con accesorios: fundas, protectores de pantalla, cables, auriculares y soportes, que tienen menos requisitos y márgenes interesantes.',
                    'Para equipos, conviene trabajar con distribuidores de marcas chinas reconocidas o con el canal de exportación del propio fabricante, que entregan documentación técnica y garantía. Un [agente de compras en China](/servicios/agente-de-compras-china/) puede verificar al distribuidor antes del pago. Si es su primera importación, siga el orden de la guía sobre [cómo importar de China a Paraguay](/importar/como-importar-de-china-a-paraguay/).',
                ],
            ],
            [
                'h2' => 'Logística y costos',
                'body' => [
                    'Los celulares tienen alto valor y poco volumen, por lo que el [flete aéreo](/servicios/flete-aereo-china/) suele ser razonable por unidad y reduce el riesgo de robo o daño. El seguro de la carga es imprescindible. El transitario le indica cómo declarar y embalar las baterías según el medio elegido.',
                    'Al costo del equipo se suman flete, seguro, tributos según la posición arancelaria, honorarios del [despacho aduanero](/servicios/despacho-aduanero/) y los trámites de homologación si el modelo no está homologado.',
                ],
            ],
        ],
        'weNeed' => [
            'Marcas y modelos que quiere importar, o tipo de accesorios',
            'Cantidad por modelo y color',
            'Si ya tiene RUC e importaciones previas',
            'Presupuesto y plazo',
        ],
        'faq' => [
            [
                'q' => '¿Necesito homologar los celulares que importo?',
                'a' => 'Sí, si son para el mercado paraguayo: la licencia previa de importación que otorga el MIC exige el certificado de homologación de la CONATEL. La CONATEL o su despachante le confirman el procedimiento vigente y si el modelo ya figura como homologado.',
            ],
            [
                'q' => '¿Puedo traer celulares por courier?',
                'a' => 'Algunos couriers aceptan equipos con batería instalada bajo ciertas condiciones y otros no. Para volúmenes comerciales se usa flete aéreo de carga con la documentación de mercancía peligrosa que corresponda.',
            ],
            [
                'q' => '¿Qué pasa con la garantía de un celular importado?',
                'a' => 'La garantía la da quien le vende. Negocie con el proveedor un porcentaje de reposición por equipos fallados y cómo se gestionan los reclamos, porque devolver equipos a China es caro.',
            ],
            [
                'q' => '¿Conviene empezar por accesorios?',
                'a' => 'Para un primer pedido, sí: requieren menos capital y menos trámites. Evite logos de marcas ajenas y controle la calidad de cargadores y cables.',
            ],
            [
                'q' => '¿Cómo verifico que el celular funcione con las operadoras de Paraguay?',
                'a' => 'Compare las bandas de frecuencia del modelo, que figuran en su ficha técnica, con las que informa cada operadora local. Pida al proveedor la ficha de la versión exacta que le va a enviar, no la de otra variante del mismo modelo.',
            ],
        ],
        'image' => null,
    ],

    'importar-juguetes-de-china' => [
        'path' => '/importar/juguetes-de-china/',
        'navLabel' => 'Juguetes',
        'seoTitle' => 'Importar juguetes de China',
        'metaDescription' => 'Importar juguetes de China a Paraguay: normas de seguridad, edades, pilas y baterías, empaque, temporada y cómo elegir fábrica.',
        'hero' => [
            'eyebrow' => 'Importar por producto',
            'h1' => 'Importar juguetes de China a Paraguay',
            'lead' => 'Para importar juguetes de China a Paraguay elija fábricas que puedan documentar ensayos de seguridad, confirme con su despachante los requisitos vigentes para juguetes, controle pilas, piezas pequeñas y etiquetado de edad, y compre con tiempo suficiente para que la mercadería llegue antes de las fechas de mayor venta.',
        ],
        'leadSlug' => 'agente-de-compras-china',
        'bundle' => [
            'agente-de-compras-china',
            'inspeccion-de-calidad',
            'flete-maritimo-contenedor',
            'despacho-aduanero',
        ],
        'traps' => [
            [
                'title' => 'Sin certificados de seguridad',
                'text' => 'Los juguetes suelen estar sujetos a requisitos de seguridad (materiales, piezas pequeñas, sustancias en pinturas). Pida a la fábrica los informes de ensayo que tenga y confirme con su despachante qué norma y qué certificación exige hoy Paraguay para su producto antes de pagar.',
            ],
            [
                'title' => 'Piezas pequeñas y edad indicada',
                'text' => 'Un juguete con piezas que se desprenden no puede venderse para niños pequeños. El empaque debe indicar la edad recomendada y las advertencias en español. Revise esto en la muestra y en la [inspección de calidad](/servicios/inspeccion-de-calidad/).',
            ],
            [
                'title' => 'Pilas y baterías recargables',
                'text' => 'Los juguetes con batería de litio tienen restricciones para el flete aéreo y el courier. Si el juguete funciona con pilas comunes, suele convenir que viaje sin pilas incluidas.',
            ],
            [
                'title' => 'Personajes con licencia',
                'text' => 'Los juguetes con personajes de películas o series sin licencia del titular son falsificaciones. Se decomisan en aduana y usted pierde la inversión. Trabaje con diseños genéricos o licencias verificables.',
            ],
            [
                'title' => 'Llegar tarde a la temporada',
                'text' => 'Las ventas de juguetes se concentran en fechas puntuales como el Día del Niño (16 de agosto en Paraguay) y fin de año. Si la mercadería llega después, queda en stock un año. Planifique producción, flete y despacho hacia atrás desde la fecha de venta.',
            ],
        ],
        'sections' => [
            [
                'h2' => 'Cómo elegir una fábrica de juguetes',
                'body' => [
                    'China tiene polos industriales dedicados a juguetes y artículos de regalo, con fábricas que exportan a mercados exigentes. Priorice proveedores que muestren informes de ensayos de laboratorio vigentes y que acepten una inspección antes del embarque.',
                    'En la [Feria de Cantón](/feria-de-canton/) hay pabellones de juguetes donde puede ver producto y comparar fábricas en persona. Para pedidos chicos y variados, un [agente de compras en China](/servicios/agente-de-compras-china/) puede consolidar compras de varios mayoristas.',
                ],
            ],
            [
                'h2' => 'Empaque, volumen y costos',
                'body' => [
                    'Muchos juguetes viajan con mucho aire dentro de la caja. Compare cuántas unidades entran por caja madre, porque el flete marítimo consolidado se cobra por volumen. Pida que el empaque de venta tenga textos en español o prevea etiquetas adicionales.',
                    'El costo final suma precio de fábrica, flete, seguro, tributos según la posición arancelaria, honorarios del [despacho aduanero](/servicios/despacho-aduanero/) y, si corresponden, los trámites de certificación que le indique el despachante. El orden completo está en la guía sobre [cómo importar de China a Paraguay](/importar/como-importar-de-china-a-paraguay/).',
                ],
            ],
        ],
        'weNeed' => [
            'Tipo de juguetes y rango de edad al que apunta',
            'Cantidades aproximadas y fecha en que quiere vender',
            'Si los juguetes llevan pilas o baterías',
            'Presupuesto total',
        ],
        'faq' => [
            [
                'q' => '¿Qué requisitos tienen los juguetes importados en Paraguay?',
                'a' => 'Los juguetes suelen estar alcanzados por normas de seguridad y etiquetado. Los requisitos vigentes y los documentos a presentar se los confirma su despachante de aduana antes de la compra.',
            ],
            [
                'q' => '¿Cuándo tengo que comprar para vender en el Día del Niño o en fin de año?',
                'a' => 'Con varios meses de margen: hay que sumar producción, inspección, tránsito por [flete marítimo en contenedor](/servicios/flete-maritimo-contenedor/) y despacho. El agente y el transitario le arman un calendario hacia atrás desde la fecha de venta.',
            ],
            [
                'q' => '¿Puedo importar juguetes de personajes famosos?',
                'a' => 'Solo si son productos con licencia oficial. Sin licencia son falsificaciones, ilegales y sujetas a decomiso.',
            ],
            [
                'q' => '¿Los juguetes a pila pueden viajar por avión?',
                'a' => 'Con pilas comunes sin instalar, en general no hay problema. Las baterías de litio tienen restricciones y documentación especial. El transitario le confirma las condiciones.',
            ],
            [
                'q' => '¿Tengo que traducir el empaque al español?',
                'a' => 'La información para el consumidor, como la edad recomendada y las advertencias, debe poder leerse en español. Puede pedir a la fábrica el empaque en español o prever etiquetas adicionales; el despachante le confirma qué datos son obligatorios.',
            ],
        ],
        'image' => null,
    ],

    'importar-telas-de-china' => [
        'path' => '/importar/telas-de-china/',
        'navLabel' => 'Telas',
        'seoTitle' => 'Importar telas de China',
        'metaDescription' => 'Importar telas de China a Paraguay: composición, rollos y metros, muestras de color, mínimos por diseño y costo de flete por kilo.',
        'hero' => [
            'eyebrow' => 'Importar por producto',
            'h1' => 'Importar telas de China a Paraguay',
            'lead' => 'Para importar telas de China a Paraguay se piden muestras de composición y color, se negocia el mínimo por diseño en metros o kilos, se controla el rollo antes del embarque y se trae por flete marítimo, porque la tela es pesada. La clave está en fijar por escrito composición, gramaje, ancho y tolerancia de color.',
        ],
        'leadSlug' => 'agente-de-compras-china',
        'bundle' => [
            'agente-de-compras-china',
            'inspeccion-de-calidad',
            'flete-maritimo-contenedor',
            'despacho-aduanero',
        ],
        'traps' => [
            [
                'title' => 'Diferencia de color entre lotes',
                'text' => 'Cada teñida sale con un tono levemente distinto. Si confecciona con rollos de dos lotes, las piezas no combinan. Pida que el pedido de cada color salga de un mismo lote de teñido y apruebe el color con una muestra física, no con una foto.',
            ],
            [
                'title' => 'Ancho útil y metros por kilo',
                'text' => 'Algunos proveedores cotizan por kilo y otros por metro, y el ancho útil puede ser menor al anunciado. Fije en la orden el ancho útil en centímetros, el gramaje y cuántos metros tiene cada rollo.',
            ],
            [
                'title' => 'Composición declarada',
                'text' => 'Un tejido anunciado como algodón puede tener un porcentaje alto de poliéster. La composición define la posición arancelaria y lo que usted puede declarar en la etiqueta de la prenda final. Pida la composición por escrito y, en pedidos grandes, un ensayo.',
            ],
            [
                'title' => 'Fallas dentro del rollo',
                'text' => 'Manchas, hilos corridos o fallas de tejido aparecen en el interior del rollo. Una [inspección de calidad](/servicios/inspeccion-de-calidad/) que desenrolla una muestra de rollos sobre mesa de revisión detecta el problema antes del embarque.',
            ],
        ],
        'sections' => [
            [
                'h2' => 'Dónde comprar telas en China',
                'body' => [
                    'China tiene grandes mercados mayoristas de telas y polos productivos especializados en tejidos de punto, tejido plano, seda sintética o tapicería. Los mercados mayoristas permiten comprar rollos en stock en cantidades chicas; las fábricas tiñen o estampan a pedido con mínimos por diseño y color.',
                    'Un [agente de compras en China](/servicios/agente-de-compras-china/) puede recorrer mercados, pedir muestras de varios proveedores, enviarle un muestrario físico y consolidar las compras en un solo embarque. El proceso completo está en la guía sobre [cómo importar de China a Paraguay](/importar/como-importar-de-china-a-paraguay/).',
                ],
            ],
            [
                'h2' => 'Flete y costos de la tela',
                'body' => [
                    'La tela es densa: un contenedor puede llenarse por peso antes que por volumen. Pida el peso por rollo y compare el flete por kilo y por metro cúbico. Para pocos rollos, el [contenedor compartido](/importar/contenedor-compartido-desde-china/) es la opción habitual y el [flete marítimo en contenedor](/servicios/flete-maritimo-contenedor/) cotiza ambas modalidades; el aéreo solo se justifica para muestras.',
                    'Al precio por metro o por kilo se suman flete, seguro, tributos según la posición arancelaria (que depende de la composición y del tipo de tejido), honorarios del despachante y transporte hasta su taller.',
                ],
            ],
        ],
        'weNeed' => [
            'Tipo de tela, composición y gramaje buscados',
            'Colores o estampados y metros o kilos por cada uno',
            'Uso final de la tela (confección, tapicería, decoración)',
            'Presupuesto y fecha de entrega en su taller',
        ],
        'faq' => [
            [
                'q' => '¿Cuál es el mínimo para comprar telas en China?',
                'a' => 'En mercados mayoristas se puede comprar por rollo. Las fábricas que tiñen o estampan a pedido fijan un mínimo por diseño y color que confirman al cotizar.',
            ],
            [
                'q' => '¿Cómo apruebo el color si no estoy en China?',
                'a' => 'Con una muestra física de laboratorio o de producción enviada por courier. Guarde una contramuestra para comparar en la inspección.',
            ],
            [
                'q' => '¿Qué tributos paga la tela importada?',
                'a' => 'Dependen de la posición arancelaria, que varía según fibra y tipo de tejido. Vea los conceptos en la guía de [tributos aduaneros](/aduana/tributos-aduaneros-paraguay/); el despachante del servicio de [despacho aduanero](/servicios/despacho-aduanero/) le confirma la alícuota vigente con la ficha técnica del proveedor.',
            ],
            [
                'q' => '¿Conviene comprar la tela o la prenda terminada?',
                'a' => 'Si tiene taller propio y diseños propios, la tela le da control y diferenciación. Si solo revende, la prenda terminada simplifica la operación.',
            ],
            [
                'q' => '¿Se puede pedir un estampado propio?',
                'a' => 'Sí. Las fábricas de estampado trabajan con su archivo de diseño y le envían una muestra para aprobar colores. El mínimo por diseño suele ser mayor que en telas lisas de stock, y conviene cerrar la tolerancia de color por escrito.',
            ],
        ],
        'image' => null,
    ],

    'importar-repuestos-de-autos-de-china' => [
        'path' => '/importar/repuestos-de-autos-de-china/',
        'navLabel' => 'Repuestos de autos',
        'seoTitle' => 'Importar repuestos de autos de China',
        'metaDescription' => 'Importar repuestos de autos de China a Paraguay: códigos OEM, originales y alternativos, calidad, garantía y flete de piezas pesadas.',
        'hero' => [
            'eyebrow' => 'Importar por producto',
            'h1' => 'Importar repuestos de autos de China a Paraguay',
            'lead' => 'Para importar repuestos de autos de China a Paraguay se cotiza cada pieza por su código OEM o de referencia cruzada, se verifica que el proveedor fabrique esa línea, se inspecciona el lote y se trae por flete marítimo con despacho aduanero. El error más caro es comprar por foto y no por código.',
        ],
        'leadSlug' => 'agente-de-compras-china',
        'bundle' => [
            'agente-de-compras-china',
            'inspeccion-de-calidad',
            'flete-maritimo-contenedor',
            'despacho-aduanero',
        ],
        'traps' => [
            [
                'title' => 'Comprar por foto y no por código OEM',
                'text' => 'Dos piezas pueden verse iguales y no encajar por un milímetro o un año de modelo distinto. Cotice cada ítem con el código OEM y el modelo, motor y año del vehículo, y pida al proveedor su tabla de equivalencias.',
            ],
            [
                'title' => 'Alternativo vendido como original',
                'text' => 'En China se fabrican repuestos alternativos de buena calidad y también copias de bajo costo. Si la caja dice una marca de fábrica de autos, debe ser original con autorización; si no, es una falsificación que se decomisa. Compre alternativos con la marca del fabricante del repuesto.',
            ],
            [
                'title' => 'Piezas de seguridad',
                'text' => 'Frenos, dirección y suspensión no admiten calidad dudosa. Pida informes de ensayo del fabricante y certificaciones de calidad de la fábrica, confirme con su despachante si Paraguay exige alguna certificación para esa pieza, y concentre la [inspección de calidad](/servicios/inspeccion-de-calidad/) en estas líneas.',
            ],
            [
                'title' => 'Lista larga, pocas unidades por ítem',
                'text' => 'Un pedido de repuestos suele tener cientos de códigos con pocas unidades. Sin una lista de empaque por código, el despacho se demora y el control en su depósito se vuelve imposible. Exija etiqueta con código en cada caja.',
            ],
        ],
        'sections' => [
            [
                'h2' => 'Cómo encontrar proveedores de autopartes',
                'body' => [
                    'Hay fábricas especializadas por línea (filtros, frenos, iluminación, suspensión, piezas eléctricas) y distribuidores que reúnen muchas líneas para marcas japonesas, coreanas, europeas y chinas. Las fábricas dan mejor precio en su línea; los distribuidores simplifican pedidos surtidos.',
                    'Un [agente de compras en China](/servicios/agente-de-compras-china/) puede enviar su lista de códigos a varios proveedores, comparar cotizaciones ítem por ítem y consolidar el pedido. Para vehículos de marcas chinas, los proveedores de la cadena del propio fabricante suelen tener mejor disponibilidad de códigos.',
                ],
            ],
            [
                'h2' => 'Peso, embalaje y costos',
                'body' => [
                    'Discos, tambores y piezas de suspensión son pesados y pueden definir el flete por peso. Las piezas frágiles como faros y parabrisas necesitan embalaje reforzado. Pida peso y medidas por caja de cada código para calcular bien el flete.',
                    'El costo final suma precio FOB, [flete marítimo en contenedor](/servicios/flete-maritimo-contenedor/), seguro, tributos que el despachante asigna a cada posición arancelaria (un pedido surtido puede tener muchas), honorarios del [despacho aduanero](/servicios/despacho-aduanero/) y transporte local. El orden de todo el proceso está en la guía sobre [cómo importar de China a Paraguay](/importar/como-importar-de-china-a-paraguay/).',
                ],
            ],
        ],
        'weNeed' => [
            'Lista de códigos OEM o de referencia con cantidades',
            'Marcas y modelos de vehículos que atiende',
            'Si busca originales, alternativos de marca o ambos',
            'Presupuesto y frecuencia de compra',
        ],
        'faq' => [
            [
                'q' => '¿Son buenos los repuestos chinos?',
                'a' => 'Depende del fabricante. China produce desde piezas para fabricantes de autos hasta copias de baja calidad. Por eso se compra por código, con proveedores verificados e inspección antes del embarque.',
            ],
            [
                'q' => '¿Puedo vender repuestos con la marca de la automotriz?',
                'a' => 'Solo si son originales adquiridos por un canal autorizado. Una pieza con la marca de la automotriz sin autorización es una falsificación y se decomisa.',
            ],
            [
                'q' => '¿Cuál es el mínimo de compra?',
                'a' => 'Cada fábrica fija su mínimo por código. Los distribuidores de líneas múltiples suelen aceptar pedidos surtidos con pocas unidades por ítem.',
            ],
            [
                'q' => '¿Cómo se calculan los impuestos de un pedido con muchos códigos?',
                'a' => 'El despachante clasifica cada pieza en su posición arancelaria NCM y calcula los tributos por ítem. Una lista de empaque ordenada por código acelera ese trabajo.',
            ],
            [
                'q' => '¿Qué garantía dan los proveedores de repuestos?',
                'a' => 'Depende del proveedor y de la línea. Negocie por escrito un porcentaje de reposición por piezas defectuosas y cómo se comprueba la falla, porque devolver repuestos a China rara vez conviene.',
            ],
        ],
        'image' => null,
    ],

    'importar-maquinaria-de-china' => [
        'path' => '/importar/maquinaria-de-china/',
        'navLabel' => 'Maquinaria',
        'seoTitle' => 'Importar maquinaria de China',
        'metaDescription' => 'Importar maquinaria de China a Paraguay: especificaciones, voltaje, repuestos, inspección antes del embarque, flete y despacho.',
        'hero' => [
            'eyebrow' => 'Importar por producto',
            'h1' => 'Importar maquinaria de China a Paraguay',
            'lead' => 'Para importar maquinaria de China a Paraguay defina por escrito la especificación técnica, el voltaje y la frecuencia de su instalación, los repuestos y el soporte posventa; pague contra hitos; haga una prueba de funcionamiento en fábrica antes del embarque y trate el flete, el seguro y el despacho como parte del proyecto.',
        ],
        'leadSlug' => 'importacion-llave-en-mano',
        'bundle' => [
            'importacion-llave-en-mano',
            'inspeccion-de-calidad',
            'flete-maritimo-contenedor',
            'despacho-aduanero',
        ],
        'traps' => [
            [
                'title' => 'Voltaje y frecuencia equivocados',
                'text' => 'La red paraguaya trabaja a 50 Hz, igual que China, con 220 V monofásico y 380 V trifásico en baja tensión, pero la tensión de su planta debe coincidir con la del motor y el tablero. Confirme la tensión exacta de su instalación con su electricista, indíquela en la orden de compra y verifíquela en la placa durante la [inspección de calidad](/servicios/inspeccion-de-calidad/).',
            ],
            [
                'title' => 'Sin repuestos ni manuales en español',
                'text' => 'Una máquina parada por un sensor o una correa que no se consigue en Paraguay cuesta más que la máquina. Negocie un kit de repuestos de desgaste, planos eléctricos y manual, e idealmente en español o inglés.',
            ],
            [
                'title' => 'Prueba de funcionamiento omitida',
                'text' => 'Pida una prueba en fábrica (FAT) con su material o uno equivalente, filmada o presenciada por un inspector, antes de liberar el último pago. Es la única forma de reclamar con poder de negociación.',
            ],
            [
                'title' => 'Medidas fuera de contenedor',
                'text' => 'Una máquina que no entra en un contenedor estándar necesita contenedor especial (open top o flat rack), con costos y plazos mayores. Pida plano de dimensiones embalada y peso bruto antes de cerrar la compra.',
            ],
            [
                'title' => 'Instalación y puesta en marcha',
                'text' => 'Aclare si el precio incluye técnico para instalación, capacitación y quién paga su viaje. Muchas fábricas ofrecen soporte remoto por video, que no siempre alcanza para equipos complejos.',
            ],
        ],
        'sections' => [
            [
                'h2' => 'Cómo elegir el fabricante',
                'body' => [
                    'Diferencie fábricas de revendedores: la fábrica puede adaptar la máquina y dar soporte técnico directo. Pida referencias de equipos exportados a Sudamérica, fotos o video de la línea de producción y verifique la licencia comercial de la empresa.',
                    'En equipos de mayor inversión conviene una visita a la fábrica o la [Feria de Cantón](/feria-de-canton/), donde se ven máquinas funcionando. Un servicio de [importación llave en mano](/servicios/importacion-llave-en-mano/) coordina la búsqueda, la verificación, la inspección, el flete y el despacho con profesionales independientes en China y en Paraguay. El orden de cada paso está en la guía sobre [cómo importar de China a Paraguay](/importar/como-importar-de-china-a-paraguay/).',
                ],
            ],
            [
                'h2' => 'Costos, pagos y logística',
                'body' => [
                    'El esquema habitual es un anticipo al firmar y el saldo contra inspección o contra documentos de embarque. Defina el Incoterm (FOB o CIF, por ejemplo) para saber quién paga cada tramo; la guía sobre [cómo pagar a proveedores chinos](/importar/pagar-a-proveedores-chinos/) compara los medios de pago. El embalaje de exportación, con base de madera tratada y protección anticorrosiva, debe estar incluido en el precio.',
                    'Al valor de la máquina se suman flete, seguro, tributos según la posición arancelaria que determine el despachante, honorarios, grúa o montacargas para la descarga y transporte hasta la planta. Si la máquina forma parte de un proyecto de inversión, la Ley 60/90 de incentivos fiscales, que administra el MIC, prevé exoneraciones de tributos a la importación de bienes de capital para proyectos aprobados, en general cuando no hay fabricación nacional similar: consulte con el MIC y su despachante si aplica a su caso antes de importar.',
                ],
            ],
        ],
        'weNeed' => [
            'Tipo de máquina, capacidad de producción y material a procesar',
            'Tensión y fases de su instalación eléctrica',
            'Espacio disponible y acceso a la planta',
            'Presupuesto y fecha en que necesita producir',
        ],
        'faq' => [
            [
                'q' => '¿Qué tengo que revisar antes de comprar una máquina en China?',
                'a' => 'Especificación técnica por escrito, voltaje, capacidad real, repuestos, manuales, garantía, condiciones de instalación y la prueba de funcionamiento antes del embarque.',
            ],
            [
                'q' => '¿Cómo pago una máquina a un proveedor chino con menos riesgo?',
                'a' => 'Con pagos por hitos: anticipo, y saldo después de la inspección o contra documentos de embarque. Evite pagar el total por adelantado a un proveedor sin verificar.',
            ],
            [
                'q' => '¿La maquinaria paga impuestos de importación?',
                'a' => 'Sí, según su posición arancelaria. Los bienes de capital de un proyecto aprobado bajo la Ley 60/90 pueden quedar exonerados; el despachante del servicio de [despacho aduanero](/servicios/despacho-aduanero/) le confirma lo que aplica a su caso.',
            ],
            [
                'q' => '¿Quién instala la máquina?',
                'a' => 'Depende de lo negociado. Algunos fabricantes envían un técnico y otros dan soporte remoto. Déjelo por escrito en el contrato, con quién paga viaje y estadía.',
            ],
        ],
        'image' => null,
    ],

    'importar-motos-de-china' => [
        'path' => '/importar/motos-de-china/',
        'navLabel' => 'Motos',
        'seoTitle' => 'Importar motos de China a Paraguay',
        'metaDescription' => 'Importar motos de China a Paraguay: modelos, documentación para registrar, repuestos, contenedor, despacho y requisitos a confirmar.',
        'hero' => [
            'eyebrow' => 'Importar por producto',
            'h1' => 'Importar motos de China a Paraguay',
            'lead' => 'Para importar motos de China a Paraguay necesita un fabricante que entregue la documentación de cada unidad (número de chasis, número de motor y certificados de origen), confirmar antes de comprar los requisitos vigentes para inscribir motos importadas, asegurar repuestos y traerlas en contenedor, en general semidesarmadas, con despacho aduanero.',
        ],
        'leadSlug' => 'importacion-llave-en-mano',
        'bundle' => [
            'importacion-llave-en-mano',
            'inspeccion-de-calidad',
            'flete-maritimo-contenedor',
            'despacho-aduanero',
        ],
        'traps' => [
            [
                'title' => 'Documentación de chasis y motor',
                'text' => 'Para inscribir cada moto hace falta que los números de chasis y motor coincidan con la factura y los documentos de embarque. Un número mal grabado o mal transcrito puede frenar la inscripción. Verifíquelos unidad por unidad en la [inspección de calidad](/servicios/inspeccion-de-calidad/).',
            ],
            [
                'title' => 'Requisitos para importar y registrar',
                'text' => 'La importación y el registro de motos tienen requisitos propios que cambian con el tiempo. Confirme con un despachante qué exige hoy la aduana y el registro automotor antes de firmar con la fábrica, no cuando la carga ya está en camino.',
            ],
            [
                'title' => 'Repuestos que no se consiguen',
                'text' => 'Un modelo poco conocido sin repuestos en Paraguay es difícil de vender. Compre junto con las motos un stock de piezas de desgaste y confirme que la fábrica seguirá produciendo ese modelo.',
            ],
            [
                'title' => 'Armado y ajuste al llegar',
                'text' => 'Las motos suelen viajar en cajones, semidesarmadas. Necesita un taller que las arme, ajuste y pruebe antes de la venta. Incluya ese costo en su cálculo.',
            ],
        ],
        'sections' => [
            [
                'h2' => 'Elegir el fabricante y el modelo',
                'body' => [
                    'China tiene muchos fabricantes de motos, desde grandes marcas exportadoras hasta ensambladoras chicas. Priorice fábricas con experiencia exportando a Sudamérica, que conocen la documentación que se pide en la región y pueden ofrecer respaldo técnico y de repuestos.',
                    'Evalúe cilindradas y tipos de moto que ya tienen demanda en su zona. Una [importación llave en mano](/servicios/importacion-llave-en-mano/) coordina la búsqueda de fábrica, la verificación de documentos, la inspección, el flete y el despacho con profesionales independientes en China y en Paraguay. El orden de cada paso está en la guía sobre [cómo importar de China a Paraguay](/importar/como-importar-de-china-a-paraguay/).',
                ],
            ],
            [
                'h2' => 'Contenedor, costos y plazos',
                'body' => [
                    'La cantidad de motos por contenedor depende del modelo y del grado de desarmado del cajón; pida a la fábrica cuántas unidades entran en un contenedor de 20 o de 40 pies y cotice el [flete marítimo en contenedor](/servicios/flete-maritimo-contenedor/). Las baterías y el combustible residual requieren precauciones de transporte que la fábrica y el transitario deben coordinar.',
                    'El costo por moto suma precio de fábrica, flete, seguro, tributos según la posición arancelaria, honorarios del [despacho aduanero](/servicios/despacho-aduanero/), armado, y los gastos de inscripción que le informe el despachante o el registro.',
                ],
            ],
        ],
        'weNeed' => [
            'Tipo de moto y cilindrada',
            'Cantidad de unidades y si busca marca establecida o marca propia',
            'RUC y experiencia previa como importador',
            'Si tiene taller para armado y servicio posventa',
            'Presupuesto y plazo',
        ],
        'faq' => [
            [
                'q' => '¿Qué necesito para importar motos de China a Paraguay?',
                'a' => 'Estar [habilitado como importador](/importar/como-ser-importador-paraguay/), un fabricante que entregue documentación completa de cada unidad y cumplir los requisitos vigentes de aduana y registro automotor, que le confirma su despachante antes de la compra.',
            ],
            [
                'q' => '¿Puedo importar una sola moto para uso personal?',
                'a' => 'No lo damos por hecho: si una persona puede importar una sola moto para uso propio, y con qué requisitos, lo define la normativa vigente de aduana y del registro automotor. Consulte con un despachante antes de pagar; tenga en cuenta además que el flete, el despacho y los trámites por unidad son altos.',
            ],
            [
                'q' => '¿Las motos llegan armadas?',
                'a' => 'Generalmente viajan en cajones semidesarmadas para aprovechar el espacio del contenedor. Necesitan armado y ajuste en Paraguay.',
            ],
            [
                'q' => '¿Cómo aseguro los repuestos?',
                'a' => 'Negociando con la fábrica un stock inicial de piezas de desgaste incluido en el pedido y un compromiso de suministro para los siguientes años.',
            ],
            [
                'q' => '¿Puedo vender las motos con mi propia marca?',
                'a' => 'Algunas fábricas producen con la marca del importador. En ese caso, además de registrar la marca, confirme con el despachante que la documentación de cada unidad sea válida para la inscripción con esa marca.',
            ],
        ],
        'image' => null,
    ],

    'importar-muebles-de-china' => [
        'path' => '/importar/muebles-de-china/',
        'navLabel' => 'Muebles',
        'seoTitle' => 'Importar muebles de China',
        'metaDescription' => 'Importar muebles de China a Paraguay: materiales, desarmado y volumen, contenedor completo o compartido, daños en tránsito y costos.',
        'hero' => [
            'eyebrow' => 'Importar por producto',
            'h1' => 'Importar muebles de China a Paraguay',
            'lead' => 'Para importar muebles de China a Paraguay elija fábricas que exporten con embalaje para contenedor, prefiera muebles desarmables para reducir volumen, calcule los metros cúbicos antes de comprar y decida entre contenedor completo o compartido. En muebles, el flete y los daños en tránsito pesan tanto como el precio de fábrica.',
        ],
        'leadSlug' => 'importacion-llave-en-mano',
        'bundle' => [
            'importacion-llave-en-mano',
            'inspeccion-de-calidad',
            'flete-maritimo-contenedor',
            'despacho-aduanero',
        ],
        'traps' => [
            [
                'title' => 'Volumen subestimado',
                'text' => 'Un sofá armado ocupa mucho espacio y se paga por metro cúbico. Pida las medidas de cada bulto embalado, no del mueble, y calcule el volumen total antes de cerrar el pedido.',
            ],
            [
                'title' => 'Golpes y roturas en tránsito',
                'text' => 'Esquinas, vidrios y patas se dañan con el movimiento del contenedor y en la descarga. Exija protección de esquinas, cartón de varias capas y buena estiba, y contrate seguro de carga.',
            ],
            [
                'title' => 'Madera y humedad',
                'text' => 'La madera mal secada se agrieta o se deforma al cambiar de clima, y la humedad del viaje genera moho. Pida el contenido de humedad de la madera y desecantes en el contenedor. Los embalajes de madera deben estar tratados según la norma fitosanitaria internacional NIMF 15, cuyo cumplimiento controla en Paraguay el SENAVE.',
            ],
            [
                'title' => 'Terminación diferente a la muestra',
                'text' => 'Color de laca, tapizado y herrajes pueden cambiar entre la muestra y la producción. Deje fotos y códigos de terminación en la orden y contrate una [inspección de calidad](/servicios/inspeccion-de-calidad/) sobre una muestra del lote antes del embarque.',
            ],
        ],
        'sections' => [
            [
                'h2' => 'Dónde comprar muebles en China',
                'body' => [
                    'Hay polos de fabricación de muebles con grandes zonas de exhibición donde se recorren cientos de fábricas en pocos días, y la Feria de Cantón tiene sectores de muebles y decoración. Para compras a distancia, un [agente de compras en China](/servicios/agente-de-compras-china/) puede visitar fábricas, pedir fotos de producción y consolidar piezas de varios proveedores.',
                    'Los muebles desarmables (tipo flat pack) permiten traer más unidades por contenedor. Los muebles tapizados o de madera maciza suelen viajar armados y conviene calcular muy bien cuántos entran.',
                ],
            ],
            [
                'h2' => 'Contenedor completo o compartido',
                'body' => [
                    'Si su pedido llena buena parte de un contenedor, el contenedor completo suele salir más barato por metro cúbico y reduce la manipulación de la carga; el servicio de [flete marítimo en contenedor](/servicios/flete-maritimo-contenedor/) cotiza ambas opciones. Para pedidos chicos, el [contenedor compartido](/importar/contenedor-compartido-desde-china/) (consolidado) permite empezar con menos inversión, con más manipulación y riesgo de golpes.',
                    'El costo final suma precio de fábrica, embalaje, flete, seguro, tributos según la posición arancelaria de cada tipo de mueble, honorarios del despachante, descarga y transporte hasta su local. Use la [calculadora CBM](/herramientas/calculadora-cbm-contenedor/) para estimar cuánto volumen ocupa su pedido, y siga el orden de la guía sobre [cómo importar de China a Paraguay](/importar/como-importar-de-china-a-paraguay/). Si prefiere delegar todo, la [importación llave en mano](/servicios/importacion-llave-en-mano/) lo coordina.',
                ],
            ],
        ],
        'weNeed' => [
            'Tipo de muebles, materiales y fotos de referencia',
            'Cantidades por modelo',
            'Si busca contenedor completo o compartido',
            'Dirección de entrega en Paraguay y acceso para camión',
        ],
        'faq' => [
            [
                'q' => '¿Conviene importar muebles de China?',
                'a' => 'Conviene cuando el volumen justifica el flete y los muebles se desarman o se embalan de forma compacta. Para pocas piezas voluminosas, el flete puede anular el ahorro.',
            ],
            [
                'q' => '¿Cuántos muebles entran en un contenedor?',
                'a' => 'Depende de las medidas embaladas. Sume el volumen de cada bulto y compárelo con la capacidad útil del contenedor; la calculadora CBM le ayuda a estimarlo.',
            ],
            [
                'q' => '¿Qué pasa si los muebles llegan dañados?',
                'a' => 'Registre el daño con fotos al abrir el contenedor y haga el reclamo al seguro y al proveedor según lo pactado. Sin seguro de carga, la pérdida suele quedar a su cargo.',
            ],
            [
                'q' => '¿Puedo mezclar muebles de varias fábricas en un contenedor?',
                'a' => 'Sí, un agente consolida las compras en un depósito en China y arma un solo embarque, con una lista de empaque unificada para el despacho.',
            ],
            [
                'q' => '¿Qué pasa con los embalajes de madera?',
                'a' => 'Los pallets y cajones de madera deben estar tratados y marcados según la norma NIMF 15 (ISPM 15), que en Paraguay controla el SENAVE. Pídalo a la fábrica en la orden de compra, porque un embalaje sin tratar puede generar demoras en el ingreso.',
            ],
        ],
        'image' => null,
    ],

    'importar-papeleria-de-china' => [
        'path' => '/importar/papeleria-de-china/',
        'navLabel' => 'Papelería',
        'seoTitle' => 'Importar papelería de China',
        'metaDescription' => 'Importar papelería y útiles escolares de China a Paraguay: temporada escolar, mínimos, surtidos, empaque y costo puesto en depósito.',
        'hero' => [
            'eyebrow' => 'Importar por producto',
            'h1' => 'Importar papelería de China a Paraguay',
            'lead' => 'Para importar papelería de China a Paraguay arme un surtido con proveedores mayoristas o fábricas de útiles, compre con meses de anticipación a la temporada escolar, controle calidad y empaque, y traiga todo en un solo embarque marítimo consolidado con despacho aduanero. El calendario escolar define cuándo tiene que estar la mercadería en su depósito.',
        ],
        'leadSlug' => 'agente-de-compras-china',
        'bundle' => [
            'agente-de-compras-china',
            'inspeccion-de-calidad',
            'flete-maritimo-contenedor',
            'despacho-aduanero',
        ],
        'traps' => [
            [
                'title' => 'Llegar después del inicio de clases',
                'text' => 'La papelería escolar se vende en pocas semanas antes del comienzo de clases. Si la carga llega tarde, queda un año en stock. Además, las fábricas chinas cierran durante el Año Nuevo chino: el pedido debe estar producido antes de ese cierre.',
            ],
            [
                'title' => 'Surtido demasiado amplio',
                'text' => 'Cientos de códigos con pocas unidades encarecen la compra, complican el despacho y dejan saldos. Concentre el pedido en los productos que más rotan y deje la variedad para reposiciones.',
            ],
            [
                'title' => 'Tintas, marcadores y adhesivos',
                'text' => 'Algunos productos de papelería para niños pueden estar alcanzados por requisitos de seguridad sobre sustancias. Pida la ficha técnica al proveedor y confirme con su despachante qué certificación exige hoy Paraguay para ese producto, si exige alguna.',
            ],
            [
                'title' => 'Personajes sin licencia',
                'text' => 'Cuadernos y mochilas con personajes de series o películas sin licencia son falsificaciones y se decomisan en aduana. Use diseños propios o licencias verificables.',
            ],
            [
                'title' => 'Papel que se humedece',
                'text' => 'El papel absorbe humedad en el viaje marítimo y se ondula o se mancha. Exija embalaje con film plástico y cajas firmes, y evite que la carga quede esperando en depósitos húmedos.',
            ],
        ],
        'sections' => [
            [
                'h2' => 'Proveedores de papelería y útiles',
                'body' => [
                    'China tiene grandes mercados mayoristas de artículos de papelería y bazar donde se compran surtidos en cantidades chicas, y fábricas especializadas en cuadernos, bolígrafos, mochilas o artículos de arte. Plataformas como [1688](/comprar/1688-en-espanol/) y [Alibaba](/comprar/alibaba-paraguay/) sirven para comparar precios antes de decidir.',
                    'Un [agente de compras en China](/servicios/agente-de-compras-china/) puede reunir productos de muchos proveedores en un solo depósito, controlar cantidades por código y preparar una lista de empaque ordenada para el [despacho aduanero](/servicios/despacho-aduanero/).',
                ],
            ],
            [
                'h2' => 'Calendario y costos',
                'body' => [
                    'Planifique hacia atrás desde la fecha de venta: tiempo de despacho y transporte local, tránsito marítimo hasta Paraguay, inspección, producción y el cierre por Año Nuevo chino. Confirme la fecha de inicio de clases en el calendario escolar que publica el MEC y cuente hacia atrás; para la temporada escolar, eso suele significar cerrar pedidos en la segunda mitad del año anterior. El orden de cada paso está en la guía sobre [cómo importar de China a Paraguay](/importar/como-importar-de-china-a-paraguay/).',
                    'El costo puesto en depósito suma precio de fábrica, [flete marítimo en contenedor](/servicios/flete-maritimo-contenedor/) consolidado por volumen o peso (el papel es pesado), seguro, tributos según la posición arancelaria de cada código, honorarios del despachante y transporte local.',
                ],
            ],
        ],
        'weNeed' => [
            'Lista de productos y cantidades estimadas',
            'Fecha en que necesita la mercadería en su depósito',
            'Si quiere diseños o marca propia',
            'Presupuesto total',
        ],
        'faq' => [
            [
                'q' => '¿Cuándo tengo que comprar papelería escolar en China?',
                'a' => 'Con varios meses de anticipación a la temporada escolar, sumando producción, cierre por Año Nuevo chino, tránsito marítimo y despacho. El agente y el transitario le arman el calendario según la fecha que usted necesita.',
            ],
            [
                'q' => '¿Puedo comprar pocas unidades de muchos productos?',
                'a' => 'Sí, en mercados mayoristas y a través de un agente que consolida. Tenga en cuenta que muchos códigos con pocas unidades encarecen la gestión y el despacho.',
            ],
            [
                'q' => '¿Qué impuestos pagan los útiles escolares importados?',
                'a' => 'Cada producto tiene su posición arancelaria y su alícuota. El despachante le confirma los tributos vigentes a partir de la lista de productos.',
            ],
            [
                'q' => '¿Puedo importar cuadernos con personajes de dibujos animados?',
                'a' => 'Solo con licencia oficial del titular. Sin licencia son falsificaciones y la aduana puede decomisarlos.',
            ],
            [
                'q' => '¿Conviene traer mochilas junto con los útiles?',
                'a' => 'Sí, se pueden consolidar en el mismo embarque. Las mochilas ocupan volumen, así que calcule los metros cúbicos del pedido completo y revise costuras y cierres en la [inspección de calidad](/servicios/inspeccion-de-calidad/).',
            ],
        ],
        'image' => null,
    ],

];

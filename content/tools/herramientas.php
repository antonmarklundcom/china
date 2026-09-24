<?php
/**
 * The tool pages under /herramientas/, keyed by slug — same shape discipline as
 * content/services.php: fill every key, never rename or remove one.
 *
 *   path             string   URL, trailing slash
 *   title            string   the tool's concept, used as the title fallback
 *   navLabel         string   short label for the hub, the nav and the footer
 *   seoTitle         string   <title> without the site suffix, <= 41 chars
 *   metaDescription  string   120–155 chars, unique across the whole site
 *   hero             array    eyebrow, h1, lead
 *   intro            string[] 200–300 words of copy, readable without JS
 *   faq              array    [['q' => ..., 'a' => ...], ...] → FAQPage JSON-LD
 *   related          string[] related service slugs (content/services.php)
 *   ctaWhatsapp      string   kept EMPTY: every wa.me prefill comes from
 *                             content/lead-values.php through
 *                             whatsapp_text_for_page(). The key exists so the
 *                             record shape is stable.
 *   formNeed         string   pre-selected chip key in content/ui.php 'needs'
 *   analyticsTool    string   tool_used event name (assets/js/analytics.js)
 *   example          bool     seed record only — see content/services.php
 *
 * The calculator markup itself lives in each tool's own route file, which builds
 * it into $toolCalcHtml and requires templates/tool.php; the arithmetic lives in
 * assets/js/tools/<slug>.js and reads its rules from window.Market.
 *
 * Every tool slug also needs a record in content/lead-values.php.
 */

/* Cluster file loaded by content/tools.php. All calculators. */

declare(strict_types=1);

return [

    'calculadora-costo-importacion' => [
        'path' => '/herramientas/calculadora-costo-importacion/',
        'title' => 'Calculadora de costo de importación',
        'navLabel' => 'Costo de importación',
        'seoTitle' => 'Calculadora de costo de importación',
        'metaDescription' => 'Calcule cuánto le cuesta poner en Paraguay un producto comprado en China: FOB, flete, seguro, valor CIF, tributos y costo por unidad.',
        'hero' => [
            'eyebrow' => 'Calculadoras',
            'h1' => 'Calculadora de costo de importación',
            'lead' => 'Calcule cuánto le cuesta poner en Paraguay un producto comprado en China: FOB, flete, seguro, valor CIF, tributos y costo por unidad.',
        ],
        'intro' => [
            'Esta calculadora estima cuánto le cuesta poner en Paraguay una mercadería comprada en China. Parte del valor FOB que figura en la factura del proveedor, le suma el flete internacional y el seguro para obtener el valor CIF, y sobre esa base aplica los tributos que usted cargue: el arancel que corresponde a la posición arancelaria (NCM) del producto, otras tasas y el IVA.',
            'El arancel no tiene un valor por defecto a propósito. Depende de la clasificación del producto en la Nomenclatura Común del Mercosur y de los regímenes que apliquen a su caso; un número genérico le daría una falsa seguridad. Pídale a su despachante la posición arancelaria y la alícuota, cárguelas acá y tendrá una estimación mucho más cercana a la liquidación real.',
            'Sume en "despacho y gastos locales" los honorarios del despachante, el depósito, el flete interno hasta su local y cualquier otro gasto en destino. Con la cantidad de unidades y el tipo de cambio del día, la calculadora le devuelve el costo por unidad en dólares y en guaraníes: el número que necesita para fijar su precio de venta.',
        ],
        'faq' => [
            [
                'q' => '¿Qué es el valor CIF?',
                'a' => 'Es el valor de la mercadería más el flete y el seguro hasta el punto de destino (Cost, Insurance and Freight). Es la base sobre la que se calculan los tributos de importación.',
            ],
            [
                'q' => '¿Dónde consigo la alícuota del arancel?',
                'a' => 'Su despachante de aduana la determina a partir de la posición arancelaria (NCM) del producto. También puede consultarla en la fuente oficial de la Dirección Nacional de Aduanas.',
            ],
            [
                'q' => '¿Por qué el IVA se calcula sobre el CIF más los tributos?',
                'a' => 'En la importación, la base del IVA suele incluir el valor en aduana más los tributos aduaneros. La calculadora usa ese criterio; la liquidación oficial la confirma la aduana.',
            ],
            [
                'q' => '¿El resultado es el monto que voy a pagar?',
                'a' => 'Es una estimación orientativa. El monto final depende de la valoración de la aduana, la clasificación arancelaria y los gastos reales de su despacho.',
            ],
        ],
        'related' => [
            'importacion-llave-en-mano',
            'flete-maritimo-contenedor',
        ],
        'ctaWhatsapp' => '',
        'formNeed' => 'importar',
        'analyticsTool' => 'costo_importacion',
    ],

    'calculadora-cbm-contenedor' => [
        'path' => '/herramientas/calculadora-cbm-contenedor/',
        'title' => 'Calculadora de CBM y contenedor',
        'navLabel' => 'CBM y contenedor',
        'seoTitle' => 'Calculadora de CBM y contenedor',
        'metaDescription' => 'Calcule los metros cúbicos (CBM) de su carga, cuánto ocupa de un contenedor de 20 o 40 pies y si le conviene contenedor completo o compartido.',
        'hero' => [
            'eyebrow' => 'Calculadoras',
            'h1' => 'Calculadora de CBM y contenedor',
            'lead' => 'Calcule los metros cúbicos (CBM) de su carga, cuánto ocupa de un contenedor de 20 o 40 pies y si le conviene contenedor completo o compartido.',
        ],
        'intro' => [
            'Con las medidas de una caja y la cantidad de cajas, esta calculadora le da el volumen total de su carga en metros cúbicos (CBM), el peso bruto si lo carga, el peso volumétrico que usaría una línea aérea y qué porcentaje de un contenedor de 20, 40 o 40 pies High Cube ocuparía.',
            'El volumen es el dato que decide cómo conviene traer la mercadería. Con pocos metros cúbicos se paga carga consolidada (un contenedor compartido con otros importadores) por metro cúbico; cuando el volumen se acerca a la capacidad de un contenedor, suele convenir contratarlo completo. La calculadora le sugiere el camino más probable, pero siempre conviene pedir cotización de las dos opciones.',
            'Las capacidades que usamos son útiles aproximadas, no el volumen interior nominal: en la práctica las cajas no llenan cada centímetro del contenedor. Si su carga tiene formas irregulares, pallets o productos que no se pueden apilar, el espacio real disponible será menor.',
        ],
        'faq' => [
            [
                'q' => '¿Qué significa CBM?',
                'a' => 'Cubic meter, metro cúbico. Es la unidad con la que se cotiza la carga consolidada marítima: un CBM equivale a una caja de un metro por un metro por un metro.',
            ],
            [
                'q' => '¿Cuándo conviene un contenedor completo?',
                'a' => 'Depende de las tarifas del momento, pero cuando su carga ocupa buena parte de un contenedor de 20 pies, el contenedor completo suele costar lo mismo o menos que la carga consolidada y viaja más protegida.',
            ],
            [
                'q' => '¿Qué es el peso volumétrico?',
                'a' => 'Es el peso que cobra el transporte aéreo por el espacio que ocupa un paquete liviano. Se calcula multiplicando largo, ancho y alto en centímetros y dividiendo por un factor, habitualmente 6.000.',
            ],
            [
                'q' => '¿De dónde saco las medidas de las cajas?',
                'a' => 'De la lista de empaque (packing list) que le envía el proveedor. Pídala antes de cotizar el flete: sin medidas y peso no hay cotización seria.',
            ],
        ],
        'related' => [
            'importacion-llave-en-mano',
            'flete-maritimo-contenedor',
        ],
        'ctaWhatsapp' => '',
        'formNeed' => 'importar',
        'analyticsTool' => 'cbm_contenedor',
    ],

    'calculadora-compras-online' => [
        'path' => '/herramientas/calculadora-compras-online/',
        'title' => 'Calculadora de compras online',
        'navLabel' => 'Compras online',
        'seoTitle' => 'Calculadora de compras online a Paraguay',
        'metaDescription' => 'Calcule el total de una compra en Temu, Shein o AliExpress puesta en Paraguay: precio, courier por kilo, peso volumétrico y cargos al recibir.',
        'hero' => [
            'eyebrow' => 'Calculadoras',
            'h1' => 'Calculadora de compras online',
            'lead' => 'Calcule el total de una compra en Temu, Shein o AliExpress puesta en Paraguay: precio, courier por kilo, peso volumétrico y cargos al recibir.',
        ],
        'intro' => [
            'Esta calculadora suma lo que termina costando una compra en Temu, Shein, AliExpress u otra tienda online cuando llega a Paraguay a través de un courier o una casilla: el precio de los productos, el envío que cobra la tienda, el courier por kilo y los cargos que se pagan al recibir.',
            'El courier no siempre cobra el peso real. Si el paquete es grande y liviano, cobra el peso volumétrico: largo por ancho por alto dividido por un factor, que suele ser 5.000 o 6.000 según la empresa. Además, muchos redondean el peso hacia arriba al medio kilo o al kilo. La calculadora aplica las dos reglas para que el número no lo sorprenda.',
            'La tarifa por kilo y el porcentaje de cargos al recibir cambian según el courier y el tipo de producto. Consulte los valores vigentes con su casilla y cárguelos acá; si deja los cargos en blanco, el total muestra solo producto, envío y courier.',
        ],
        'faq' => [
            [
                'q' => '¿Qué es el divisor volumétrico?',
                'a' => 'Es el número por el que el courier divide el volumen del paquete (en centímetros cúbicos) para convertirlo en kilos. Con divisor 5.000 el peso volumétrico sale más alto que con 6.000.',
            ],
            [
                'q' => '¿Por qué el courier me cobró más kilos de los que pesa el paquete?',
                'a' => 'Porque cobra el mayor entre el peso real y el volumétrico, y porque suele redondear hacia arriba. Una caja grande con ropa liviana puede facturar varias veces su peso real.',
            ],
            [
                'q' => '¿Cuánto se paga de impuestos por una compra online?',
                'a' => 'Depende del valor, del tipo de producto y del régimen que use el courier. Consulte el monto vigente con su courier y en la fuente oficial antes de comprar.',
            ],
            [
                'q' => '¿Conviene juntar varios pedidos en un envío?',
                'a' => 'A menudo sí: consolidar en la casilla reduce los mínimos por paquete. Pero un envío más grande puede cambiar el régimen de impuestos; consúltelo con su courier.',
            ],
        ],
        'related' => [
            'asesoria-compras-online',
        ],
        'ctaWhatsapp' => '',
        'formNeed' => 'compras',
        'analyticsTool' => 'compras_online',
    ],

];

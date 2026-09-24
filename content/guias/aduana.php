<?php
/**
 * The how-to guides under /guias/, keyed by slug — same shape discipline as
 * content/services.php and content/tools.php.
 *
 * Why this content type exists: a how-to query ("cómo se hace X") is answered
 * only partly by a service page. A guide answers it in full, then offers the
 * "¿prefiere que lo hagamos nosotros?" box to hand the task over — which is why
 * every guide names a relatedService.
 *
 *   path             string   URL, trailing slash
 *   title            string   the guide's concept, used as the title fallback
 *   navLabel         string   short label for the hub, the nav and the footer
 *   seoTitle         string   <title> without the site suffix, <= 41 chars
 *   metaDescription  string   120–155 chars, unique across the whole site
 *   lastReviewed     string   ISO date, shown next to the "orientativo" note
 *   hero             array    eyebrow, h1, lead
 *   intro            string[] 2–3 paragraphs read before the numbered steps
 *   steps            array    [['title' => ..., 'body' => string[]], ...] →
 *                             both the visible numbered list and the HowTo
 *                             JSON-LD (templates/guide.php builds both from
 *                             this one array)
 *   faq              array    [['q' => ..., 'a' => ...], ...] → FAQPage JSON-LD
 *   relatedService   ?string  slug into content/services.php AND
 *                             content/lead-values.php — the delegate box's form,
 *                             WhatsApp prefill and next-step text all resolve
 *                             from this one slug
 *   toolLink         ?array   ['path' => ..., 'label' => ..., 'text' => ...]
 *   related          string[] 2–3 sibling guide slugs
 *   example          bool     seed record only — see content/services.php
 */

/* Cluster file loaded by content/guias.php. Cluster: aduana. */

declare(strict_types=1);

return [

    'despachantes-de-aduana-paraguay' => [
        'path' => '/aduana/despachantes-de-aduana-paraguay/',
        'title' => 'Despachantes de aduana en Paraguay',
        'navLabel' => 'Despachantes de aduana',
        'cluster' => 'aduana',
        'seoTitle' => 'Despachantes de aduana en Paraguay',
        'metaDescription' => 'Qué hace un despachante de aduana en Paraguay, cómo verificar que esté matriculado, qué documentos le pide y cómo pedir cotización.',
        'lastReviewed' => '2026-09-24',
        'hero' => [
            'eyebrow' => 'Aduana',
            'h1' => 'Despachantes de aduana en Paraguay: cómo elegir y verificar uno',
            'lead' => 'Un despachante de aduana en Paraguay es el profesional matriculado que presenta la declaración de su mercadería ante la aduana y la gestiona hasta que queda liberada. Para elegir uno, verifique su matrícula, pida una cotización por escrito con todos los conceptos y compare al menos dos.',
        ],
        'intro' => [
            'Si va a importar mercadería con fines comerciales, lo habitual es que el despacho lo tramite un despachante de aduana matriculado. Él clasifica la mercadería, prepara la declaración, calcula los tributos, responde a la verificación y le avisa cuándo puede retirar la carga. Usted sigue siendo el importador y el responsable de lo que declara, por eso conviene elegir con cuidado.',
            'Esta guía explica qué hace un despachante, cómo comprobar que está habilitado, qué documentos le va a pedir y cómo comparar presupuestos. También aclara qué es el Centro de Despachantes de Aduana del Paraguay, la asociación profesional que muchos buscan en Google cuando quieren una lista de despachantes.',
            'Este sitio es privado e informativo: no es la aduana ni un despachante. La aduana paraguaya, que antes era la Dirección Nacional de Aduanas (DNA) y desde la Ley 7143/2023 funciona como Gerencia General de Aduanas dentro de la DNIT, publica su información oficial en aduana.gov.py y dnit.gov.py. Nuestra lista de despachantes asociados está en preparación (próximamente); mientras tanto, podemos ponerlo en contacto con un despachante matriculado si nos deja su consulta.',
        ],
        'steps' => [
            [
                'title' => 'Defina qué va a despachar',
                'body' => [
                    'Antes de llamar a nadie, tenga claro qué producto trae, en qué cantidad, por qué vía (marítima, aérea, terrestre o courier) y con qué valor de factura. Con esos datos el despachante puede darle una primera idea de la clasificación arancelaria y de los costos.',
                    'Si es su primera importación, indíquelo. Algunos despachantes también le orientan con la inscripción como importador y los registros previos que exige su tipo de producto.',
                ],
            ],
            [
                'title' => 'Verifique la matrícula del despachante',
                'body' => [
                    'Pida al despachante su nombre completo y su número de matrícula, y compruébelo en la fuente oficial: la aduana (aduana.gov.py o dnit.gov.py) o consultando directamente en sus oficinas. También puede preguntar al Centro de Despachantes de Aduana del Paraguay si la persona figura como asociada, aunque no todos los despachantes matriculados están obligados a ser socios.',
                    'Desconfíe de gestores que ofrecen "sacar" mercadería sin declaración, sin factura o por un monto cerrado que no detalla nada. El despachante firma una declaración oficial; si alguien le propone saltarse ese paso, no es un despachante serio.',
                ],
            ],
            [
                'title' => 'Pregunte por su experiencia con su tipo de carga',
                'body' => [
                    'No es lo mismo despachar ropa que repuestos, celulares, alimentos o maquinaria. Algunos productos necesitan registros o autorizaciones de otros organismos antes del despacho. Pregunte si el despachante ya trabajó con productos similares y con qué frecuencia opera en la aduana por donde entrará su carga (puerto de Asunción, Villeta, Ciudad del Este, Encarnación, aeropuerto u otra).',
                ],
            ],
            [
                'title' => 'Prepare los documentos que le va a pedir',
                'body' => [
                    'Como mínimo le pedirá la factura comercial del proveedor, la lista de empaque, el documento de transporte (conocimiento de embarque, guía aérea o carta de porte) y los datos de su RUC. Según el producto y el origen, puede pedirle también un certificado de origen, fichas técnicas o permisos previos.',
                    'Envíe todo en cuanto lo tenga. Los documentos incompletos o con datos que no coinciden son una de las causas más comunes de demoras y de costos de depósito que nadie esperaba.',
                ],
            ],
            [
                'title' => 'Pida una cotización detallada por escrito',
                'body' => [
                    'La cotización debe separar los honorarios del despachante, los tributos aduaneros estimados, las tasas y servicios, el depósito o almacenaje y los gastos operativos. Si le dan un solo monto global, pida el desglose. Así puede comparar dos presupuestos de verdad y saber qué parte depende del despachante y qué parte no.',
                    'En la guía sobre el precio del despacho aduanero explicamos cada componente y qué preguntar.',
                ],
            ],
            [
                'title' => 'Compare al menos dos opciones',
                'body' => [
                    'Compare con el mismo producto, el mismo valor y la misma vía de ingreso. Fíjese en qué incluye cada uno (por ejemplo, si el honorario cubre la coordinación del retiro o solo la declaración), en los plazos que le indican y en cómo se comunica con usted.',
                ],
            ],
            [
                'title' => 'Acuerde la forma de trabajo y siga el despacho',
                'body' => [
                    'Antes de empezar, aclare quién paga los tributos y cuándo, a qué cuenta, cómo le envían la liquidación y cómo le avisan si la carga sale a verificación. Guarde copia de la declaración y de los comprobantes: los va a necesitar para su contabilidad y ante cualquier consulta posterior de la aduana.',
                ],
            ],
        ],
        'table' => [
            'caption' => 'Qué hace el despachante y qué le corresponde a usted',
            'head' => ['Tarea', 'Despachante de aduana', 'Importador (usted)'],
            'rows' => [
                ['Negociar con el proveedor y pagar la compra', 'No', 'Sí'],
                ['Contratar el flete internacional', 'No, salvo que lo acuerden', 'Sí, o su agente de carga'],
                ['Clasificar la mercadería (NCM)', 'Sí, con la información que usted entrega', 'Aporta fichas técnicas y descripción'],
                ['Presentar la declaración ante la aduana', 'Sí', 'Firma o autoriza según corresponda'],
                ['Pagar los tributos', 'Gestiona la liquidación', 'Aporta los fondos'],
                ['Atender la verificación física o documental', 'Sí', 'Responde si hay dudas sobre la mercadería'],
                ['Responder por lo declarado', 'Por su actuación profesional', 'Por la veracidad de los datos y documentos'],
            ],
            'note' => 'Orientativo. El reparto exacto de responsabilidades lo define la normativa aduanera vigente; consúltelo con su despachante o en aduana.gov.py.',
        ],
        'sections' => [
            [
                'h2' => 'Centro de Despachantes de Aduana del Paraguay',
                'body' => [
                    'El Centro de Despachantes de Aduana del Paraguay (CDAP) es la asociación profesional que agrupa a despachantes de aduana del país. Ofrece capacitación y representa al gremio; no es la aduana ni despacha mercadería por usted. Su sitio es cdap.org.py.',
                    'Si busca una "lista de despachantes de aduana en Paraguay", la fuente más confiable para saber si alguien está habilitado es la propia aduana. El CDAP puede orientarle sobre sus socios. No publicamos teléfonos ni direcciones de estas entidades porque cambian; consulte los datos de contacto en sus sitios oficiales.',
                ],
            ],
            [
                'h2' => 'Errores comunes al elegir despachante',
                'body' => [],
                'items' => [
                    ['title' => 'Elegir solo por el honorario más bajo', 'text' => 'El honorario es una parte menor del costo total; una mala clasificación o una demora cuesta más.'],
                    ['title' => 'Contactarlo cuando la carga ya llegó', 'text' => 'Si lo consulta antes del embarque, puede revisar la factura y avisarle de permisos previos a tiempo.'],
                    ['title' => 'Aceptar una declaración con valor distinto al real', 'text' => 'Subvaluar la factura expone al importador a multas y al decomiso. El responsable final es usted.'],
                ],
            ],
        ],
        'faq' => [
            ['q' => '¿Es obligatorio usar un despachante de aduana en Paraguay?', 'a' => 'Para una importación comercial, en la práctica el despacho se tramita mediante un despachante matriculado. Las excepciones (por ejemplo, ciertos envíos por courier o equipaje de viajeros) las define la aduana; confírmelas en aduana.gov.py.'],
            ['q' => '¿Dónde encuentro la lista de despachantes de aduana del Paraguay?', 'a' => 'Consulte a la aduana (aduana.gov.py o dnit.gov.py) para verificar la matrícula, y al Centro de Despachantes de Aduana del Paraguay (cdap.org.py) para información sobre sus socios. Nuestra propia lista de despachantes asociados estará disponible próximamente; mientras tanto podemos conectarlo con uno.'],
            ['q' => '¿El Centro de Despachantes es la aduana?', 'a' => 'No. Es una asociación profesional privada del gremio. La aduana es la Gerencia General de Aduanas de la DNIT.'],
            ['q' => '¿Cuánto cobra un despachante de aduana?', 'a' => 'Depende del valor y del tipo de mercadería, de la vía de ingreso y de lo que incluya el servicio. Pida siempre un presupuesto desglosado por escrito y compárelo con otro.'],
            ['q' => '¿Puedo usar el mismo despachante para todas mis importaciones?', 'a' => 'Sí, y suele convenir: conoce sus productos, sus documentos y su historial, lo que agiliza los despachos siguientes.'],
        ],
        'relatedService' => 'despacho-aduanero',
        'toolLink' => [
            'path' => '/herramientas/calculadora-costo-importacion/',
            'label' => 'Calcule el costo aproximado de su importación',
            'text' => 'Antes de hablar con el despachante, estime flete, tributos y gastos para saber de qué orden de costo se trata.',
        ],
        'related' => ['precio-despacho-aduanero-paraguay', 'tributos-aduaneros-paraguay', 'requisitos-para-importar-paraguay'],
        'affiliates' => [],
        'disclaimer' => true,
        'image' => ['src' => '/assets/img/hubs/aduana-documentos-despacho.webp', 'alt' => 'Escritorio con facturas, lista de empaque y calculadora, con contenedores de fondo', 'width' => 1600, 'height' => 905],
    ],

    'precio-despacho-aduanero-paraguay' => [
        'path' => '/aduana/precio-despacho-aduanero-paraguay/',
        'title' => 'Precio del despacho aduanero en Paraguay',
        'navLabel' => 'Precio del despacho',
        'cluster' => 'aduana',
        'seoTitle' => 'Precio del despacho aduanero en Paraguay',
        'metaDescription' => 'De qué depende el precio del despacho aduanero en Paraguay: honorarios del despachante, tasas, depósito y gastos, y cómo comparar cotizaciones.',
        'lastReviewed' => '2026-09-24',
        'hero' => [
            'eyebrow' => 'Aduana',
            'h1' => 'Precio del despacho aduanero en Paraguay: de qué depende',
            'lead' => 'El precio del despacho aduanero en Paraguay no es una tarifa única: suma los honorarios del despachante, los tributos de importación, las tasas y servicios aduaneros, el depósito o almacenaje y otros gastos operativos. Cada parte depende del valor, del tipo de mercadería y de la vía de ingreso.',
        ],
        'intro' => [
            'Cuando alguien pregunta cuánto cuesta despachar en aduana, suele mezclar dos cosas: lo que cobra el despachante por su trabajo y lo que se paga al Estado y a terceros. Los honorarios suelen ser la parte menor; los tributos, que dependen de la posición arancelaria y del valor CIF, suelen ser la mayor.',
            'En esta guía verá cada componente del costo, qué preguntar para que la cotización sea comparable y cómo evitar gastos que aparecen al final, como el almacenaje por demoras. No publicamos montos porque cambian con cada operación y con la normativa; el despachante se los confirma para su caso.',
            'Si quiere una cifra concreta, lo más rápido es pedir una cotización con su factura proforma en la mano. Podemos conectarlo con un despachante matriculado para eso.',
        ],
        'steps' => [
            [
                'title' => 'Reúna los datos que definen el costo',
                'body' => [
                    'Descripción precisa del producto, cantidad, valor de la factura, Incoterm pactado con el proveedor, peso y volumen, vía de transporte y aduana de ingreso. Sin estos datos cualquier presupuesto es una suposición.',
                ],
            ],
            [
                'title' => 'Pida la clasificación arancelaria estimada',
                'body' => [
                    'El despachante le indica la posición NCM probable de su producto. De ella depende el arancel y si hay requisitos adicionales. Una clasificación distinta puede cambiar mucho el total, por eso conviene saberla antes de comprar.',
                ],
            ],
            [
                'title' => 'Separe tributos y honorarios',
                'body' => [
                    'Pida que la cotización muestre por separado los tributos (arancel, IVA y otros cargos que correspondan), los honorarios profesionales y las tasas o servicios. Los tributos son iguales con cualquier despachante si la clasificación y el valor son los mismos; lo que cambia entre despachantes son los honorarios y lo que incluyen.',
                ],
            ],
            [
                'title' => 'Pregunte por depósito y almacenaje',
                'body' => [
                    'La carga suele quedar en un depósito o recinto aduanero mientras se despacha, y el almacenaje se cobra por tiempo. Pregunte cuántos días libres hay, desde cuándo corre el costo y quién lo factura.',
                ],
            ],
            [
                'title' => 'Liste los gastos operativos',
                'body' => [
                    'Aparte del despacho puede haber gastos de liberación del documento de transporte, manipuleo en puerto o aeropuerto, flete interno hasta su local, certificados, traducciones o gastos bancarios. Pida que el presupuesto indique cuáles incluye y cuáles no.',
                ],
            ],
            [
                'title' => 'Compare cotizaciones con la misma base',
                'body' => [
                    'Dos presupuestos solo son comparables si parten del mismo valor, la misma clasificación y la misma vía. Si uno es mucho más bajo, revise si omitió un tributo o un gasto que después aparecerá.',
                ],
            ],
            [
                'title' => 'Guarde la liquidación final',
                'body' => [
                    'Al terminar, pida la liquidación oficial de tributos y la factura del despachante. Con ellas puede calcular su costo real por unidad y comparar con lo presupuestado para la próxima compra.',
                ],
            ],
        ],
        'table' => [
            'caption' => 'Componentes del costo de un despacho aduanero',
            'head' => ['Componente', 'Quién lo cobra', 'De qué depende'],
            'rows' => [
                ['Honorarios del despachante', 'El despachante', 'Valor y complejidad de la operación, servicios incluidos'],
                ['Arancel de importación', 'El Estado (aduana)', 'Posición NCM y valor en aduana (base CIF)'],
                ['IVA de importación y otros tributos', 'El Estado', 'Tipo de bien, base imponible y normativa vigente'],
                ['Tasas y servicios aduaneros', 'Aduana y organismos intervinientes', 'Tipo de operación y régimen'],
                ['Depósito o almacenaje', 'Depósito, puerto o terminal', 'Días en depósito, peso o volumen'],
                ['Gastos de agente de carga o naviera', 'Agente de carga, naviera o aerolínea', 'Condiciones del flete y del puerto'],
                ['Flete interno y otros gastos', 'Transportista y terceros', 'Distancia, volumen, certificados necesarios'],
            ],
            'note' => 'No incluimos montos: cambian por operación y por normativa. El despachante le confirma cada concepto para su carga.',
        ],
        'sections' => [
            [
                'h2' => 'Qué preguntar para evitar sorpresas',
                'body' => [],
                'items' => [
                    ['title' => '¿El honorario es fijo o un porcentaje?', 'text' => 'Algunos cobran un monto por operación y otros según el valor declarado; pida que se lo aclaren.'],
                    ['title' => '¿Qué pasa si la carga sale a verificación física?', 'text' => 'Puede haber costos de manipuleo y días extra de depósito.'],
                    ['title' => '¿Qué tipo de cambio se usa?', 'text' => 'Los tributos se liquidan en guaraníes a partir de valores en dólares; pregunte con qué cotización trabaja el presupuesto.'],
                ],
            ],
            [
                'h2' => 'Qué parte del costo depende del despachante',
                'body' => [
                    'De todo el costo del despacho, el despachante controla principalmente sus honorarios y la calidad de su trabajo. Los tributos los fija la normativa según la clasificación y el valor; el almacenaje lo cobra el depósito según los días; los gastos de puerto o aeropuerto los cobran la terminal, la naviera o la aerolínea.',
                    'Sin embargo, un buen despachante influye en el total aunque no cobre esos conceptos: una clasificación correcta evita diferencias y multas, y una revisión anticipada de los documentos reduce los días en depósito. Por eso comparar solo el honorario da una imagen incompleta.',
                    'Si importa por primera vez, pida al despachante que le explique la liquidación línea por línea. Entenderla una vez le permite presupuestar mejor las siguientes compras y detectar cuando algo no cierra.',
                ],
            ],
            [
                'h2' => 'Cuándo pedir la cotización',
                'body' => [
                    'Lo ideal es pedirla antes de pagar al proveedor, con la factura proforma. En ese momento todavía puede cambiar el Incoterm, ajustar la cantidad o elegir otra vía de transporte si el costo total no le conviene. Con la carga ya embarcada, el margen de decisión es mucho menor.',
                ],
            ],
        ],
        'faq' => [
            ['q' => '¿Cuánto cuesta un despacho aduanero en Paraguay?', 'a' => 'No hay un precio único. Suma honorarios, tributos, tasas, depósito y gastos, y cada uno depende de su mercadería. Pida un presupuesto desglosado con su factura proforma.'],
            ['q' => '¿Los tributos cambian según el despachante?', 'a' => 'No deberían: se calculan sobre la misma base y la misma clasificación. Lo que cambia entre despachantes son los honorarios y los servicios incluidos.'],
            ['q' => '¿Por qué me cobraron almacenaje si el despacho era rápido?', 'a' => 'El almacenaje corre desde que la carga entra al depósito, no desde que empieza el despacho. Enviar los documentos antes de que llegue la carga reduce ese costo.'],
            ['q' => '¿Conviene más una importación por courier?', 'a' => 'Para envíos pequeños puede ser más simple. Para volúmenes comerciales, el despacho formal suele ser el camino que corresponde; compare ambos con el mismo producto.'],
        ],
        'relatedService' => 'despacho-aduanero',
        'toolLink' => [
            'path' => '/herramientas/calculadora-costo-importacion/',
            'label' => 'Calculadora de costo de importación',
            'text' => 'Sume producto, flete, tributos estimados y gastos para ver el costo por unidad antes de pedir cotización.',
        ],
        'related' => ['tributos-aduaneros-paraguay', 'despachantes-de-aduana-paraguay', 'ncm-nomenclatura-mercosur'],
        'affiliates' => [],
        'disclaimer' => true,
        'image' => null,
    ],

    'regimen-de-turismo-paraguay' => [
        'path' => '/aduana/regimen-de-turismo-paraguay/',
        'title' => 'Régimen de turismo en Paraguay: qué es',
        'navLabel' => 'Régimen de turismo',
        'cluster' => 'aduana',
        'seoTitle' => 'Régimen de turismo en Paraguay',
        'metaDescription' => 'Qué es el régimen de turismo en Paraguay, para qué mercadería se usa, cómo afecta a las compras en Ciudad del Este y dónde leer la norma.',
        'lastReviewed' => '2026-09-24',
        'hero' => [
            'eyebrow' => 'Aduana',
            'h1' => 'Régimen de turismo en Paraguay: qué es y a quién se aplica',
            'lead' => 'El régimen de turismo en Paraguay es un régimen especial que permite a comercios habilitados importar ciertos bienes con un tratamiento tributario diferenciado para venderlos a turistas extranjeros, sobre todo en ciudades de frontera como Ciudad del Este. No es un régimen para que un residente importe mercadería para revender.',
        ],
        'intro' => [
            'Buena parte del comercio de Ciudad del Este, Encarnación, Pedro Juan Caballero y otras ciudades de frontera funciona bajo el régimen de turismo. Los comercios inscriptos importan bienes (electrónica, perfumes, relojes y otros) con condiciones tributarias propias, a cambio de venderlos a compradores extranjeros no domiciliados en Paraguay.',
            'En 2024 el Poder Ejecutivo estableció un nuevo régimen de turismo de compras, según informó la DNIT en su portal (dnit.gov.py). Las condiciones concretas —qué bienes incluye, en qué ciudades, qué tributos y qué obligaciones tienen los comercios— están en la norma vigente y sus reglamentaciones; aquí explicamos el concepto sin citar cifras, que conviene leer en la fuente.',
            'Esta guía sirve a tres perfiles: al turista que compra en la frontera, al residente que quiere entender por qué no puede usar ese régimen para su negocio, y a quien evalúa abrir un comercio de frontera.',
        ],
        'steps' => [
            [
                'title' => 'Entienda la lógica del régimen',
                'body' => [
                    'El régimen existe para atraer compradores del exterior. El comercio importa bajo condiciones especiales y vende al turista, que se lleva la mercadería fuera del país. Por eso la venta a residentes paraguayos, o la reventa dentro del país, no encaja en el régimen.',
                ],
            ],
            [
                'title' => 'Si es turista: compre en comercios habilitados y guarde la factura',
                'body' => [
                    'Pida siempre factura o comprobante. Al volver a su país, la aduana de ese país aplicará sus propias reglas de franquicia para viajeros: el régimen paraguayo no le exime de declarar en Argentina, Brasil u otro destino.',
                ],
            ],
            [
                'title' => 'Si es residente: no confunda compra en frontera con importación',
                'body' => [
                    'Comprar en Ciudad del Este siendo residente no convierte la mercadería en importada a su nombre. Si quiere traer mercadería para revender, el camino es una importación a su nombre con despacho aduanero, o comprar a un importador local.',
                ],
            ],
            [
                'title' => 'Si quiere operar bajo el régimen: lea la norma y consulte',
                'body' => [
                    'Operar como comercio de régimen de turismo exige inscripción y obligaciones específicas ante la DNIT. Lea la norma vigente en dnit.gov.py y consulte con un contador y un despachante antes de invertir.',
                ],
            ],
            [
                'title' => 'Compare con el régimen general de importación',
                'body' => [
                    'Para la mayoría de los negocios que venden a clientes paraguayos, el camino es la importación bajo el régimen general: arancel según NCM, IVA y demás tributos. La tabla de abajo resume las diferencias.',
                ],
            ],
        ],
        'table' => [
            'caption' => 'Régimen de turismo frente a otras formas de traer mercadería',
            'head' => ['Aspecto', 'Régimen de turismo', 'Importación general', 'Compra online por courier'],
            'rows' => [
                ['Quién importa', 'Comercio inscripto en el régimen', 'Importador con RUC', 'La persona que compra, vía courier'],
                ['A quién se vende', 'Turistas no domiciliados en Paraguay', 'Cualquier cliente en Paraguay', 'Uso personal, en general'],
                ['Tributos', 'Tratamiento diferenciado según la norma', 'Arancel, IVA y otros según NCM', 'Régimen de envíos que fije la DNIT'],
                ['Uso típico', 'Comercio de frontera', 'Reventa y uso comercial', 'Compras personales en Temu, Shein, AliExpress'],
            ],
            'note' => 'Resumen orientativo. Las condiciones exactas de cada régimen están en la normativa publicada por la DNIT.',
        ],
        'sections' => [
            [
                'h2' => 'Qué no hace el régimen de turismo',
                'body' => [
                    'No elimina los controles del país de destino del turista. No autoriza a un residente a importar para revender. No reemplaza al despachante ni a la declaración en una importación comercial. Si le ofrecen "usar el régimen de turismo" para traer mercadería a su negocio sin despacho, pida asesoramiento antes: el riesgo lo asume usted.',
                ],
            ],
            [
                'h2' => 'Por qué importa entender el régimen si usted compra para su negocio',
                'body' => [
                    'Es común escuchar que en Ciudad del Este "todo es más barato" y pensar en comprar allí para revender en Asunción o en el interior. El precio de venta al turista refleja un tratamiento tributario pensado para mercadería que sale del país. Si esa mercadería se queda en Paraguay y se revende, puede no estar amparada por la documentación que exige un comercio formal.',
                    'Para un negocio, lo seguro es comprar a un importador local que le entregue factura legal, o importar directamente desde China a su nombre con despacho aduanero. Así puede justificar el origen de su stock, usar el IVA como crédito fiscal y vender sin riesgo de decomiso.',
                    'Si está evaluando importar por su cuenta, podemos conectarlo con un despachante matriculado que le explique los costos reales para su producto, incluidos los tributos y los gastos de depósito.',
                ],
            ],
            [
                'h2' => 'Dónde informarse',
                'body' => [],
                'items' => [
                    ['title' => 'DNIT', 'text' => 'dnit.gov.py publica la normativa y las comunicaciones sobre el régimen de turismo.'],
                    ['title' => 'Aduana', 'text' => 'aduana.gov.py reúne la información aduanera de importación y equipaje.'],
                    ['title' => 'Su contador', 'text' => 'Para evaluar si un régimen especial aplica a su empresa y qué obligaciones implica.'],
                ],
            ],
        ],
        'faq' => [
            ['q' => '¿Qué es el régimen de turismo en Paraguay?', 'a' => 'Un régimen especial por el que comercios habilitados importan ciertos bienes con tratamiento tributario diferenciado para venderlos a turistas extranjeros, principalmente en ciudades de frontera.'],
            ['q' => '¿Un paraguayo puede comprar bajo el régimen de turismo?', 'a' => 'El régimen está pensado para compradores no domiciliados en Paraguay. Las condiciones de venta a residentes las define la norma vigente; consúltelas en dnit.gov.py.'],
            ['q' => '¿Dónde leo la norma del régimen de turismo?', 'a' => 'En el portal de la DNIT (dnit.gov.py), que publicó información sobre el régimen de turismo de compras establecido en 2024.'],
            ['q' => '¿Cuánto puedo llevar a Argentina o Brasil desde Ciudad del Este?', 'a' => 'Lo define la aduana de su país. Consulte la franquicia vigente en ARCA para Argentina o en la Receita Federal para Brasil antes de viajar.'],
            ['q' => '¿Puedo comprar en Ciudad del Este para revender en Asunción?', 'a' => 'Para revender necesita mercadería con respaldo legal: compre a un importador con factura o importe a su nombre con despacho aduanero.'],
        ],
        'relatedService' => 'despacho-aduanero',
        'toolLink' => null,
        'related' => ['aduana-ciudad-del-este-encarnacion', 'cruzar-frontera-argentina-paraguay', 'como-ser-importador-paraguay'],
        'affiliates' => [],
        'disclaimer' => true,
        'image' => null,
    ],

    'cruzar-frontera-argentina-paraguay' => [
        'path' => '/aduana/cruzar-frontera-argentina-paraguay/',
        'title' => 'Aduana entre Argentina y Paraguay: qué puede llevar',
        'navLabel' => 'Frontera Argentina–Paraguay',
        'cluster' => 'aduana',
        'seoTitle' => 'Aduana Argentina–Paraguay: qué llevar',
        'metaDescription' => 'Qué controla la aduana al cruzar entre Argentina y Paraguay: franquicia, compras, documentos y pasos fronterizos, con enlaces a la fuente oficial.',
        'lastReviewed' => '2026-09-24',
        'hero' => [
            'eyebrow' => 'Aduana',
            'h1' => 'Aduana Argentina Paraguay: qué puede llevar al cruzar',
            'lead' => 'Al cruzar entre Argentina y Paraguay pasa por dos controles: el del país que deja y el del país al que entra. Cada país fija su propia franquicia para viajeros; lo que exceda o no sea de uso personal debe declararse y puede pagar tributos. Consulte los montos vigentes en ARCA (Argentina) y en la aduana paraguaya antes de viajar.',
        ],
        'intro' => [
            'La búsqueda "aduana Argentina Paraguay" suele venir de personas que cruzan a comprar o a visitar familia por Posadas–Encarnación, Clorinda–Puerto Falcón o la zona de Puerto Iguazú. La regla práctica es la misma en todos los pasos: documentos en regla, compras con factura, y declarar lo que no sea equipaje personal o supere la franquicia del país de entrada.',
            'La franquicia no es común a los dos países. Argentina la regula a través de ARCA (ex AFIP), con información en arca.gob.ar y argentina.gob.ar; Paraguay, a través de la Gerencia General de Aduanas de la DNIT, con información en aduana.gov.py. Los montos y condiciones cambian, por eso no los repetimos aquí: léalos en esas fuentes el día que viaje.',
            'Este sitio es privado e informativo. No representa a ninguna aduana ni publica el estado de los puentes en vivo.',
        ],
        'steps' => [
            [
                'title' => 'Lleve el documento correcto',
                'body' => [
                    'Los ciudadanos del Mercosur suelen poder cruzar con documento de identidad vigente, pero los requisitos para menores, vehículos y ciudadanos de otros países son distintos. Confirme en los sitios oficiales de migraciones de ambos países qué documento necesita usted.',
                    'Si viaja con menores, lleve la documentación que acredite el vínculo y, si corresponde, la autorización de viaje. Es de los motivos más frecuentes por los que se rechaza un cruce.',
                ],
            ],
            [
                'title' => 'Consulte la franquicia del país al que entra',
                'body' => [
                    'Antes de salir, revise la franquicia vigente para viajeros por vía terrestre del país al que entra. En pasos de frontera terrestre la franquicia puede ser distinta a la de los aeropuertos, y algunas normas prevén condiciones especiales para quienes cruzan con frecuencia.',
                ],
            ],
            [
                'title' => 'Compre con factura y separe lo personal de lo comercial',
                'body' => [
                    'Guarde las facturas de lo que compra. La aduana evalúa si la cantidad es compatible con uso personal: varias unidades iguales del mismo producto pueden considerarse mercadería comercial, que no entra como equipaje.',
                ],
            ],
            [
                'title' => 'Tenga en cuenta los productos controlados',
                'body' => [
                    'Alimentos frescos, productos vegetales y animales, medicamentos, armas, divisas por encima del límite de declaración y algunos productos electrónicos tienen reglas propias. Los controles sanitarios dependen de SENASA en Argentina y de SENACSA y SENAVE en Paraguay. Si duda, declare.',
                ],
            ],
            [
                'title' => 'Declare si supera la franquicia',
                'body' => [
                    'Si lo que trae excede la franquicia, declárelo en el canal correspondiente y pague los tributos. No declarar puede terminar en multa y en la pérdida de la mercadería.',
                ],
            ],
            [
                'title' => 'Planifique horarios y demoras',
                'body' => [
                    'Los fines de semana largos, los feriados y los días de diferencia cambiaria favorable suelen generar filas largas. Si puede, cruce en días hábiles y temprano, y revise antes los horarios de atención publicados por las autoridades de cada paso.',
                ],
            ],
        ],
        'table' => [
            'caption' => 'Principales pasos entre Argentina y Paraguay',
            'head' => ['Paso', 'Lado argentino', 'Lado paraguayo', 'Nota práctica'],
            'rows' => [
                ['Puente San Roque González de Santa Cruz', 'Posadas (Misiones)', 'Encarnación (Itapúa)', 'Paso urbano muy transitado; también hay tren internacional entre ambas ciudades.'],
                ['Puente San Ignacio de Loyola', 'Clorinda (Formosa)', 'Puerto Falcón (Presidente Hayes)', 'El paso más cercano a Asunción por tierra.'],
                ['Zona de Puerto Iguazú', 'Puerto Iguazú (Misiones)', 'Ciudad del Este / Presidente Franco', 'El camino habitual pasa por Foz do Iguaçu (Brasil), con controles brasileños además de los dos países.'],
            ],
            'note' => 'Horarios, servicios y pasos fluviales cambian. Confirme en los sitios oficiales de migraciones y aduana de cada país antes de viajar.',
        ],
        'sections' => [
            [
                'h2' => 'Dónde consultar la información oficial',
                'body' => [],
                'items' => [
                    ['title' => 'Argentina', 'text' => 'ARCA (arca.gob.ar) para franquicia y equipaje; Dirección Nacional de Migraciones (argentina.gob.ar/interior/migraciones) para documentos.'],
                    ['title' => 'Paraguay', 'text' => 'Gerencia General de Aduanas de la DNIT (aduana.gov.py, dnit.gov.py) para equipaje y mercadería; Dirección General de Migraciones (migraciones.gov.py) para documentos.'],
                ],
            ],
            [
                'h2' => 'Compras frecuentes y mercadería comercial',
                'body' => [
                    'Quien cruza seguido a comprar debe saber que la aduana puede tener en cuenta la frecuencia de los viajes y la cantidad de productos iguales. Lo que para usted es una compra grande para la familia puede parecer mercadería para la venta si son muchas unidades del mismo artículo. En ese caso, lo razonable es separar las compras o declarar.',
                    'Si su intención es revender, la franquicia no es la herramienta. La mercadería comercial se importa formalmente, con factura, declaración y despacho aduanero. Para volúmenes chicos puede convenir comprar a un importador local; para volúmenes mayores, importar directamente, por ejemplo desde China, suele dar mejor margen. Podemos conectarlo con un despachante matriculado para evaluarlo.',
                    'Tenga en cuenta también el dinero en efectivo: ambos países exigen declarar las sumas que superen el límite que fija cada uno. Consulte ese límite en las fuentes oficiales antes de viajar.',
                ],
            ],
        ],
        'faq' => [
            ['q' => '¿Cuánto puedo traer de Paraguay a Argentina sin pagar?', 'a' => 'Lo fija ARCA para viajeros que entran a Argentina, y puede ser distinto por vía terrestre. Consulte el monto vigente en arca.gob.ar antes de cruzar.'],
            ['q' => '¿Y de Argentina a Paraguay?', 'a' => 'La franquicia para ingresar a Paraguay la define la aduana paraguaya. Consúltela en aduana.gov.py.'],
            ['q' => '¿Puedo cruzar a comprar para revender?', 'a' => 'La franquicia es para uso personal. La mercadería para reventa debe importarse formalmente, con despacho aduanero.'],
            ['q' => '¿Qué pasa si no declaro lo que excede la franquicia?', 'a' => 'La aduana puede aplicar multas y retener o decomisar la mercadería. Declarar y pagar suele salir más barato.'],
            ['q' => '¿Hay información del estado del puente en vivo?', 'a' => 'Este sitio no la publica. Consulte los canales oficiales de las autoridades de frontera y de vialidad de cada país.'],
        ],
        'relatedService' => 'despacho-aduanero',
        'toolLink' => null,
        'related' => ['aduana-clorinda', 'aduana-ciudad-del-este-encarnacion', 'regimen-de-turismo-paraguay'],
        'affiliates' => [],
        'disclaimer' => true,
        'image' => null,
    ],

    'aduana-clorinda' => [
        'path' => '/aduana/aduana-clorinda/',
        'title' => 'Aduana de Clorinda y puente San Ignacio de Loyola',
        'navLabel' => 'Aduana de Clorinda',
        'cluster' => 'aduana',
        'seoTitle' => 'Aduana de Clorinda: cruce a Paraguay',
        'metaDescription' => 'Cómo es el cruce por Clorinda y el puente San Ignacio de Loyola hacia Puerto Falcón: controles, documentos y qué puede llevar.',
        'lastReviewed' => '2026-09-24',
        'hero' => [
            'eyebrow' => 'Aduana',
            'h1' => 'Aduana de Clorinda y puente San Ignacio de Loyola',
            'lead' => 'La aduana de Clorinda controla el cruce entre Clorinda (Formosa, Argentina) y Puerto Falcón (Paraguay) por el puente San Ignacio de Loyola, el paso terrestre más cercano a Asunción. Lleve documento vigente, compre con factura y declare lo que supere la franquicia del país al que entra.',
        ],
        'intro' => [
            'El cruce por Clorinda se usa mucho para viajes de compras en ambos sentidos: argentinos que van a Asunción y paraguayos que compran en Clorinda, según qué lado resulte más conveniente por el tipo de cambio. Por eso el control aduanero se concentra en qué se lleva, en qué cantidad y si es para uso personal.',
            'En el puente hay controles de migraciones y aduana de los dos países. Del lado argentino interviene ARCA (ex AFIP) y del lado paraguayo la Gerencia General de Aduanas de la DNIT. Cada uno aplica su propia franquicia para viajeros; consulte los montos vigentes en arca.gob.ar y aduana.gov.py.',
            'Esta guía reúne lo práctico: documentos, qué se controla, cuándo suele haber más espera y dónde está la información oficial. Somos un sitio privado; no publicamos el estado del puente en vivo.',
        ],
        'steps' => [
            [
                'title' => 'Prepare su documento y el del vehículo',
                'body' => [
                    'Lleve su documento de identidad o pasaporte vigente. Si cruza en vehículo, lleve la documentación del vehículo y, si no está a su nombre, la autorización correspondiente. Confirme los requisitos en los sitios de migraciones de ambos países.',
                ],
            ],
            [
                'title' => 'Revise la franquicia antes de comprar',
                'body' => [
                    'Antes de salir de compras, fíjese cuánto puede ingresar sin pagar en el país al que vuelve. Así decide cuánto comprar y evita pagar tributos o multas en el regreso.',
                ],
            ],
            [
                'title' => 'Compre con factura y en cantidades de uso personal',
                'body' => [
                    'La aduana presta atención a las cantidades. Muchas unidades del mismo producto, cajas cerradas o mercadería con aspecto de reventa pueden tratarse como carga comercial, que no se ingresa como equipaje.',
                ],
            ],
            [
                'title' => 'Conozca qué se controla con más atención',
                'body' => [
                    'Además del valor total, se controlan alimentos, carnes, frutas y verduras (controles sanitarios), medicamentos, bebidas alcohólicas y cigarrillos, electrónica en cantidad y el dinero en efectivo por encima del límite de declaración. Si trae alguno de estos productos, consulte las reglas antes.',
                ],
            ],
            [
                'title' => 'Elija el horario con criterio',
                'body' => [
                    'Como consejo general, las esperas suelen ser más largas los fines de semana, los feriados y los fines de semana largos de cualquiera de los dos países, y en épocas en que la diferencia de precios empuja a más gente a cruzar. Si puede, cruce en día hábil y temprano.',
                ],
            ],
            [
                'title' => 'Declare lo que corresponda',
                'body' => [
                    'Si supera la franquicia o trae productos sujetos a control, declárelos. Pagar los tributos es preferible a arriesgar la retención de la mercadería o una multa.',
                ],
            ],
        ],
        'table' => [
            'caption' => 'Lista rápida para cruzar por Clorinda',
            'head' => ['Qué llevar o revisar', 'Por qué'],
            'rows' => [
                ['Documento de identidad o pasaporte vigente', 'Control migratorio de ambos países'],
                ['Documentación del vehículo', 'Si cruza en auto o moto'],
                ['Documentos de menores', 'Autorizaciones y acreditación del vínculo'],
                ['Facturas de sus compras', 'Acreditar valor y origen ante la aduana'],
                ['Franquicia vigente consultada', 'Saber si debe declarar al regresar'],
            ],
            'note' => 'Lista orientativa. Los requisitos los fijan las autoridades de migraciones y aduana de cada país.',
        ],
        'sections' => [
            [
                'h2' => 'Compras para revender',
                'body' => [
                    'Si su idea es comprar en Asunción o en Clorinda para revender, la franquicia de viajero no es el camino: la mercadería comercial se importa formalmente, con declaración y despacho aduanero. Si quiere evaluar esa opción, podemos conectarlo con un despachante matriculado que le explique costos y requisitos.',
                ],
            ],
            [
                'h2' => 'Antes de salir: una revisión de cinco minutos',
                'body' => [
                    'Revise la franquicia vigente en arca.gob.ar si vuelve a Argentina, o en aduana.gov.py si entra a Paraguay. Revise los requisitos de migraciones si viaja con menores o con un vehículo que no está a su nombre. Y consulte los canales oficiales de las autoridades de frontera por si hay demoras o cambios de horario ese día.',
                    'Haga una lista de lo que piensa comprar y súmela antes de cruzar de vuelta. Si ve que se acerca al límite, es mejor decidir en el comercio que en la fila de la aduana.',
                    'Si cruza en transporte público o a pie, organice las compras de forma que pueda mostrarlas con facilidad si se lo piden: bolsas separadas y facturas a mano agilizan el control.',
                ],
            ],
        ],
        'faq' => [
            ['q' => '¿Dónde queda la aduana de Clorinda?', 'a' => 'En el cruce del puente San Ignacio de Loyola sobre el río Pilcomayo, entre Clorinda (Formosa) y Puerto Falcón (Paraguay). Confirme horarios y servicios en los sitios oficiales.'],
            ['q' => '¿Cuánto puedo traer de Paraguay por Clorinda?', 'a' => 'Lo define ARCA para quienes entran a Argentina. Consulte el monto vigente para pasos terrestres en arca.gob.ar.'],
            ['q' => '¿Qué necesito para cruzar de Clorinda a Asunción?', 'a' => 'Documento de identidad o pasaporte vigente y, si viaja en vehículo, sus papeles. Para menores y ciudadanos de fuera del Mercosur hay requisitos adicionales.'],
            ['q' => '¿Se puede ver la fila del puente en vivo?', 'a' => 'Este sitio no publica esa información. Revise los canales oficiales de las autoridades de frontera antes de salir.'],
            ['q' => '¿Qué pasa si me detienen con compras que superan la franquicia?', 'a' => 'Deberá declarar y pagar los tributos; si no declaró, puede haber multa y retención de la mercadería.'],
            ['q' => '¿Cuándo hay menos fila en el puente San Ignacio de Loyola?', 'a' => 'Como tendencia general, en días hábiles y temprano por la mañana. Los fines de semana, los feriados de Argentina o de Paraguay y las épocas en que el tipo de cambio favorece las compras suelen traer más espera.'],
            ['q' => '¿Puedo pasar mercadería para vender en mi negocio?', 'a' => 'No como equipaje. La mercadería para reventa se importa con declaración y despacho aduanero; podemos conectarlo con un despachante matriculado.'],
        ],
        'relatedService' => 'despacho-aduanero',
        'toolLink' => null,
        'related' => ['cruzar-frontera-argentina-paraguay', 'aduana-ciudad-del-este-encarnacion', 'impuestos-compras-online-paraguay'],
        'affiliates' => [],
        'disclaimer' => true,
        'image' => null,
    ],

    'tributos-aduaneros-paraguay' => [
        'path' => '/aduana/tributos-aduaneros-paraguay/',
        'title' => 'Tributos aduaneros en Paraguay: cómo se calculan',
        'navLabel' => 'Tributos aduaneros',
        'cluster' => 'aduana',
        'seoTitle' => 'Tributos aduaneros en Paraguay',
        'metaDescription' => 'Qué tributos se pagan al importar en Paraguay, sobre qué base se calculan (valor CIF) y por qué el total depende de la posición arancelaria.',
        'lastReviewed' => '2026-09-24',
        'hero' => [
            'eyebrow' => 'Aduana',
            'h1' => 'Tributos aduaneros en Paraguay: cómo se calculan',
            'lead' => 'Los tributos aduaneros en Paraguay se calculan sobre el valor en aduana de la mercadería, que parte del valor CIF (costo, seguro y flete). A esa base se aplica el arancel que corresponde a su posición NCM, y luego el IVA de importación y otros cargos. Por eso el total cambia según qué producto sea.',
        ],
        'intro' => [
            'Para estimar lo que pagará en aduana necesita tres datos: el valor CIF de la mercadería, su posición arancelaria en la Nomenclatura Común del Mercosur (NCM) y los tributos y tasas vigentes para esa posición. Con eso, el cálculo es una suma en cascada.',
            'En esta guía explicamos el mecanismo paso a paso. No publicamos alícuotas porque dependen de cada posición NCM y de la normativa vigente; su despachante se las confirma, y la aduana las publica en aduana.gov.py y dnit.gov.py.',
            'Si compra por internet en Temu, Shein o AliExpress para uso personal, las reglas de los envíos por courier pueden ser distintas; vea nuestra guía de impuestos de compras online.',
        ],
        'steps' => [
            [
                'title' => 'Calcule el valor CIF',
                'body' => [
                    'CIF es el valor de la mercadería más el seguro y el flete internacional hasta el punto de ingreso. Si compró en FOB o EXW, sume usted el flete y el seguro. Si no contrató seguro, la normativa puede prever un valor presunto; consúltelo con su despachante.',
                ],
            ],
            [
                'title' => 'Determine la posición NCM',
                'body' => [
                    'La NCM de ocho dígitos identifica su producto. Cada posición tiene asignado su arancel y, a veces, requisitos adicionales. Una clasificación incorrecta cambia el cálculo y puede generar multas.',
                ],
            ],
            [
                'title' => 'Aplique el arancel de importación',
                'body' => [
                    'El arancel es un porcentaje sobre el valor en aduana. En el Mercosur existe un Arancel Externo Común, con listas de excepción que cada país puede aplicar. Paraguay tiene sus propias excepciones; por eso la alícuota que corresponde a su producto hay que consultarla en el arancel vigente.',
                ],
            ],
            [
                'title' => 'Sume tasas y otros cargos',
                'body' => [
                    'Además del arancel, la liquidación puede incluir tasas por servicios aduaneros y otros cargos, y en algunos casos anticipos de impuestos que luego se imputan. Qué conceptos se aplican depende del régimen y del importador; su despachante los detalla en la liquidación.',
                ],
            ],
            [
                'title' => 'Calcule el IVA de importación',
                'body' => [
                    'El IVA se aplica sobre una base que, en general, incluye el valor en aduana más el arancel y otros tributos. La tasa depende del tipo de bien. Si su empresa está inscripta en el IVA, ese impuesto pagado en aduana suele poder usarse como crédito fiscal; confírmelo con su contador.',
                ],
            ],
            [
                'title' => 'Convierta a guaraníes y verifique',
                'body' => [
                    'La liquidación se hace en guaraníes con el tipo de cambio que fija la normativa para la fecha correspondiente. Compare la liquidación oficial con su estimación para detectar diferencias antes de pagar.',
                ],
            ],
        ],
        'table' => [
            'caption' => 'Cómo se construye la liquidación de tributos',
            'head' => ['Paso', 'Base de cálculo', 'Dónde se consulta la alícuota'],
            'rows' => [
                ['Valor CIF / valor en aduana', 'Factura + seguro + flete internacional', 'Factura, documento de transporte, póliza'],
                ['Arancel de importación', 'Valor en aduana', 'Arancel vigente según NCM'],
                ['Tasas y servicios', 'Según el concepto', 'Normativa aduanera vigente'],
                ['IVA de importación', 'Valor en aduana + arancel + otros tributos (en general)', 'Normativa del IVA vigente'],
                ['Otros impuestos o anticipos', 'Según el producto y el importador', 'Despachante y DNIT'],
            ],
            'note' => 'Esquema orientativo. El orden exacto y las bases los define la normativa; el despachante le entrega la liquidación oficial.',
        ],
        'sections' => [
            [
                'h2' => 'Errores que encarecen la importación',
                'body' => [],
                'items' => [
                    ['title' => 'Olvidar el flete en el cálculo', 'text' => 'El arancel se calcula sobre el CIF, no sobre el precio del proveedor.'],
                    ['title' => 'Suponer la NCM', 'text' => 'Productos parecidos pueden tener posiciones y aranceles muy distintos.'],
                    ['title' => 'No considerar permisos previos', 'text' => 'Algunos productos requieren registros de otros organismos; sin ellos, la carga queda en depósito y el almacenaje corre.'],
                ],
            ],
            [
                'h2' => 'Un ejemplo del mecanismo, sin cifras',
                'body' => [
                    'Supongamos que compra un lote de productos en condición FOB en un puerto de China. A ese valor le suma el flete marítimo hasta Paraguay y el seguro: eso es el CIF. Sobre ese CIF se aplica el arancel de la posición NCM de su producto. Luego se suman las tasas y demás cargos que correspondan, y sobre la base resultante se calcula el IVA de importación.',
                    'Si el producto fuera otro, con otra NCM, cambiaría el arancel y posiblemente los requisitos, aunque el valor de compra fuera el mismo. Por eso dos importaciones de igual valor pueden pagar tributos muy distintos.',
                    'Para tener el número real de su operación, el despachante hace esta cuenta con las alícuotas vigentes. Si quiere una estimación antes, use la calculadora con la alícuota que le indique el despachante y trate el resultado como orientativo.',
                ],
            ],
        ],
        'faq' => [
            ['q' => '¿Qué impuestos se pagan al importar en Paraguay?', 'a' => 'En general, el arancel de importación según la NCM, el IVA de importación y otras tasas o cargos que establezca la normativa. El detalle exacto lo muestra la liquidación del despacho.'],
            ['q' => '¿Sobre qué valor se calculan los tributos?', 'a' => 'Sobre el valor en aduana, que parte del valor CIF: mercadería más seguro y flete internacional.'],
            ['q' => '¿Dónde consulto el arancel de mi producto?', 'a' => 'En el arancel vigente publicado por la aduana (aduana.gov.py) o preguntando a un despachante, que confirma la posición NCM.'],
            ['q' => '¿El IVA de importación se recupera?', 'a' => 'Si su empresa está inscripta en el IVA, en general puede usarlo como crédito fiscal. Confírmelo con su contador.'],
            ['q' => '¿Los tributos son iguales para compras por courier?', 'a' => 'Los envíos por courier pueden tener un régimen propio. Consulte nuestra guía de impuestos de compras online y la información de la DNIT.'],
            ['q' => '¿Qué pasa si declaro un valor menor al real?', 'a' => 'La aduana puede ajustar el valor, cobrar la diferencia y aplicar multas. El importador es responsable de lo declarado, aunque el trámite lo haga el despachante.'],
        ],
        'relatedService' => 'despacho-aduanero',
        'toolLink' => [
            'path' => '/herramientas/calculadora-costo-importacion/',
            'label' => 'Estime los tributos de su importación',
            'text' => 'Cargue valor, flete y la alícuota que le indique su despachante para ver el costo final por unidad.',
        ],
        'related' => ['ncm-nomenclatura-mercosur', 'precio-despacho-aduanero-paraguay', 'impuestos-compras-online-paraguay'],
        'affiliates' => [],
        'disclaimer' => true,
        'image' => null,
    ],

    'ncm-nomenclatura-mercosur' => [
        'path' => '/aduana/ncm-nomenclatura-mercosur/',
        'title' => 'NCM: la nomenclatura común del Mercosur',
        'navLabel' => 'NCM Mercosur',
        'cluster' => 'aduana',
        'seoTitle' => 'NCM: nomenclatura del Mercosur',
        'metaDescription' => 'Qué es la NCM, cómo se lee una posición arancelaria del Mercosur y por qué clasificar bien su producto cambia lo que paga en aduana.',
        'lastReviewed' => '2026-09-24',
        'hero' => [
            'eyebrow' => 'Aduana',
            'h1' => 'NCM: cómo leer la Nomenclatura Común del Mercosur',
            'lead' => 'La NCM (Nomenclatura Común del Mercosur) es el código de ocho dígitos con el que Paraguay y los demás países del Mercosur clasifican cada mercadería. Los seis primeros dígitos vienen del Sistema Armonizado internacional y los dos últimos son propios del Mercosur; de ese código depende el arancel y los requisitos de su importación.',
        ],
        'intro' => [
            'Cuando un despachante le dice "su producto va en la posición tal", se refiere a la NCM. Es la base de todo el despacho: define qué arancel paga, si necesita permisos de otros organismos y qué estadística se registra. Entender cómo se lee le ayuda a hacer mejores preguntas y a detectar errores antes de que cuesten dinero.',
            'En esta guía verá la estructura del código dígito por dígito, cómo buscar la posición de un producto y por qué la clasificación final debe confirmarla un despachante. Las alícuotas de cada posición no las publicamos: se consultan en el arancel vigente, disponible a través de la aduana (aduana.gov.py).',
        ],
        'steps' => [
            [
                'title' => 'Identifique el capítulo (dígitos 1 y 2)',
                'body' => [
                    'Los dos primeros dígitos indican el capítulo, que agrupa grandes familias de productos. Por ejemplo, el capítulo 61 corresponde a prendas de vestir de punto, el 64 al calzado, el 85 a máquinas y aparatos eléctricos y el 95 a juguetes y artículos de deporte.',
                ],
            ],
            [
                'title' => 'Ubique la partida (dígitos 3 y 4)',
                'body' => [
                    'Con cuatro dígitos se llega a la partida, que describe un grupo más preciso. Por ejemplo, dentro del capítulo 85, la partida 85.17 reúne los teléfonos y otros aparatos de transmisión de voz y datos.',
                ],
            ],
            [
                'title' => 'Precise la subpartida (dígitos 5 y 6)',
                'body' => [
                    'Los dígitos 5 y 6 forman la subpartida del Sistema Armonizado, común a casi todos los países del mundo. Hasta aquí, el código es igual al que usa su proveedor chino en su propia clasificación, lo que ayuda a cruzar información.',
                ],
            ],
            [
                'title' => 'Complete el ítem y subítem Mercosur (dígitos 7 y 8)',
                'body' => [
                    'Los dos últimos dígitos son propios del Mercosur y afinan la clasificación. Una NCM completa se escribe, por ejemplo, con el formato 0000.00.00. Si el código que le pasa el proveedor tiene más de seis dígitos, los últimos corresponden a la nomenclatura china y no sirven para Paraguay.',
                ],
            ],
            [
                'title' => 'Lea las notas y reglas de clasificación',
                'body' => [
                    'La clasificación no se hace solo por el nombre comercial. Se aplican las Reglas Generales de Interpretación del Sistema Armonizado y las notas de sección y capítulo, que dicen qué incluye y qué excluye cada posición. Un producto con varias funciones o materiales puede ir a una posición que no es la intuitiva.',
                ],
            ],
            [
                'title' => 'Consulte el arancel de esa posición',
                'body' => [
                    'Con la NCM completa, busque en el arancel vigente la alícuota y los requisitos que se aplican. Recuerde que Paraguay tiene excepciones al Arancel Externo Común del Mercosur, así que no tome como válida la alícuota de otro país.',
                ],
            ],
            [
                'title' => 'Confirme con su despachante antes de comprar',
                'body' => [
                    'El despachante es quien declara la posición ante la aduana. Si le envía la ficha técnica, fotos y la composición del producto antes de comprar, le puede confirmar la NCM y el costo con mucha más precisión.',
                ],
            ],
        ],
        'table' => [
            'caption' => 'Estructura de un código NCM de 8 dígitos',
            'head' => ['Dígitos', 'Nivel', 'Origen', 'Qué indica'],
            'rows' => [
                ['1–2', 'Capítulo', 'Sistema Armonizado', 'Familia de productos (por ejemplo, 85: aparatos eléctricos)'],
                ['1–4', 'Partida', 'Sistema Armonizado', 'Grupo de productos (por ejemplo, 85.17: teléfonos y aparatos de comunicación)'],
                ['1–6', 'Subpartida', 'Sistema Armonizado', 'Tipo de producto, común a nivel internacional'],
                ['7', 'Ítem', 'Mercosur', 'Desdoblamiento regional'],
                ['8', 'Subítem', 'Mercosur', 'Desdoblamiento final que define la posición NCM'],
            ],
            'note' => 'Los ejemplos de capítulo y partida son ilustrativos. La posición exacta y su alícuota se confirman en el arancel vigente.',
        ],
        'sections' => [
            [
                'h2' => 'Por qué una mala clasificación sale cara',
                'body' => [
                    'Si la aduana considera que su producto va en otra posición con un arancel más alto, deberá pagar la diferencia y puede recibir una multa. Si la posición correcta exige un permiso previo que usted no tramitó, la carga puede quedar retenida mientras lo consigue, con almacenaje corriendo. Clasificar bien desde el principio es la forma más barata de evitarlo.',
                ],
            ],
            [
                'h2' => 'Cómo preparar la información para clasificar',
                'body' => [
                    'Para que el despachante confirme la NCM con precisión, envíe una descripción técnica y no solo el nombre comercial: qué es, para qué sirve, de qué material está hecho y en qué proporción, cómo funciona (si es eléctrico, con qué voltaje y potencia) y cómo viene presentado.',
                    'Sume fotos, el catálogo o la ficha técnica del proveedor y el código HS que el proveedor usa en China. Ese código ayuda como punto de partida, pero no reemplaza la clasificación en la NCM, que puede diferir desde el séptimo dígito o incluso antes si el proveedor lo eligió por conveniencia propia.',
                ],
            ],
        ],
        'faq' => [
            ['q' => '¿Qué significa NCM?', 'a' => 'Nomenclatura Común del Mercosur: el sistema de códigos de ocho dígitos con que los países del Mercosur clasifican las mercaderías.'],
            ['q' => '¿La NCM es igual al código HS de China?', 'a' => 'Los seis primeros dígitos coinciden con el Sistema Armonizado. Los dígitos siguientes son propios de cada país o bloque, así que el código completo no es el mismo.'],
            ['q' => '¿Dónde busco la NCM de mi producto?', 'a' => 'En el arancel vigente que publica la aduana (aduana.gov.py) o consultando a un despachante, que es quien la declara.'],
            ['q' => '¿Puedo clasificar yo mismo mi producto?', 'a' => 'Puede hacer una primera búsqueda para estimar costos, pero la clasificación que se declara conviene que la confirme un despachante matriculado.'],
            ['q' => '¿La NCM cambia con el tiempo?', 'a' => 'Sí. El Sistema Armonizado se actualiza periódicamente y el Mercosur ajusta la NCM en consecuencia, por lo que una posición que usó hace años puede haber cambiado. Verifique siempre con el arancel vigente.'],
        ],
        'relatedService' => 'despacho-aduanero',
        'toolLink' => [
            'path' => '/herramientas/calculadora-costo-importacion/',
            'label' => 'Pruebe el costo con la alícuota de su NCM',
            'text' => 'Una vez que tenga la posición y su arancel, estime el costo total de la importación.',
        ],
        'related' => ['tributos-aduaneros-paraguay', 'despachantes-de-aduana-paraguay', 'como-importar-de-china-a-paraguay'],
        'affiliates' => [],
        'disclaimer' => true,
        'image' => null,
    ],

    'aduana-ciudad-del-este-encarnacion' => [
        'path' => '/aduana/aduana-ciudad-del-este-encarnacion/',
        'title' => 'Aduana en Ciudad del Este y Encarnación',
        'navLabel' => 'Ciudad del Este y Encarnación',
        'cluster' => 'aduana',
        'seoTitle' => 'Aduana en Ciudad del Este y Encarnación',
        'metaDescription' => 'Cómo funcionan los pasos de frontera de Ciudad del Este y Encarnación para compras y mercadería, qué se controla y dónde informarse.',
        'lastReviewed' => '2026-09-24',
        'hero' => [
            'eyebrow' => 'Aduana',
            'h1' => 'Aduana en Ciudad del Este y Encarnación: compras y mercadería',
            'lead' => 'Ciudad del Este (frontera con Brasil por el Puente de la Amistad) y Encarnación (frontera con Argentina por el puente San Roque González de Santa Cruz) tienen controles de aduana en los dos sentidos. El turista que compra debe respetar la franquicia de su país; la mercadería para reventa se importa formalmente con despachante.',
        ],
        'intro' => [
            'Las dos ciudades son polos de compras de frontera y también puntos de entrada de carga. Por eso conviven dos realidades distintas: el viajero que cruza con compras personales y el importador que ingresa mercadería comercial por las aduanas y depósitos de la zona.',
            'Para el viajero, lo que importa es la franquicia del país al que regresa (Brasil o Argentina) y las compras con factura. Para el importador, lo que importa es el despacho: clasificación NCM, tributos y documentos. En ambos casos la información oficial paraguaya está en aduana.gov.py y dnit.gov.py, a cargo de la Gerencia General de Aduanas de la DNIT (antes DNA).',
            'Esta guía resume qué se controla, cómo se relaciona con el régimen de turismo y dónde consultar horarios y requisitos. Somos un sitio privado e informativo, sin vínculo con ninguna aduana.',
        ],
        'steps' => [
            [
                'title' => 'Identifique en qué situación está',
                'body' => [
                    'Turista que compra para uso personal, residente que trae compras de otro país, o importador que ingresa mercadería comercial. Las reglas son distintas para cada caso, y la mayoría de los problemas aparecen cuando se mezclan.',
                ],
            ],
            [
                'title' => 'Si compra en Ciudad del Este como turista',
                'body' => [
                    'Muchos comercios operan bajo el régimen de turismo y venden a compradores no domiciliados en Paraguay. Pida factura. Al volver a Brasil o a Argentina, la aduana de su país aplica su propia franquicia; lo que la exceda debe declararlo allí.',
                ],
            ],
            [
                'title' => 'Si cruza por Encarnación',
                'body' => [
                    'El paso Posadas–Encarnación es urbano y muy transitado en ambos sentidos. Rigen los mismos principios: documento vigente, compras con factura, uso personal y declaración de lo que supere la franquicia del país de entrada. Vea nuestra guía sobre la aduana entre Argentina y Paraguay.',
                ],
            ],
            [
                'title' => 'Si importa mercadería comercial por la zona',
                'body' => [
                    'La carga comercial entra con documento de transporte, factura, declaración y despacho aduanero. Consulte con su despachante por qué aduana conviene ingresar y qué depósito se usa, porque influye en tiempos y costos.',
                ],
            ],
            [
                'title' => 'Consulte horarios y controles antes de viajar',
                'body' => [
                    'Los horarios de atención, los controles sanitarios y los requisitos migratorios pueden cambiar. Revíselos en los sitios oficiales de ambos países el día anterior al viaje, sobre todo en fechas de mucho movimiento.',
                ],
            ],
        ],
        'table' => [
            'caption' => 'Ciudad del Este y Encarnación: diferencias prácticas',
            'head' => ['Aspecto', 'Ciudad del Este', 'Encarnación'],
            'rows' => [
                ['País vecino', 'Brasil (Foz do Iguaçu)', 'Argentina (Posadas)'],
                ['Puente principal', 'Puente de la Amistad', 'Puente San Roque González de Santa Cruz'],
                ['Aduana del país vecino', 'Receita Federal (Brasil)', 'ARCA (Argentina)'],
                ['Perfil de compras', 'Comercio de frontera, muchos locales bajo régimen de turismo', 'Comercio de frontera y compras de visitantes argentinos'],
                ['Dónde consultar la franquicia del vecino', 'gov.br/receitafederal', 'arca.gob.ar'],
            ],
            'note' => 'Orientativo. Confirme horarios, requisitos y franquicias en los sitios oficiales de cada país.',
        ],
        'sections' => [
            [
                'h2' => 'Errores comunes en la frontera',
                'body' => [],
                'items' => [
                    ['title' => 'Comprar para revender con la franquicia de viajero', 'text' => 'La franquicia es para uso personal; la reventa requiere importación formal.'],
                    ['title' => 'No guardar las facturas', 'text' => 'Sin factura es difícil acreditar el valor ante la aduana.'],
                    ['title' => 'Confiar en montos que circulan en redes', 'text' => 'Las franquicias cambian; consulte siempre la fuente oficial.'],
                ],
            ],
            [
                'h2' => 'Del lado del importador: la zona como puerta de entrada',
                'body' => [
                    'Además del comercio de frontera, la región recibe carga comercial que entra por vía terrestre o fluvial. Si importa desde China, su carga puede llegar por distintos puertos y aduanas; la elección influye en el flete interno, los tiempos y los gastos de depósito.',
                    'Antes de decidir, pida a su agente de carga y a su despachante que comparen las opciones para su caso concreto. Un despachante que opere habitualmente en la aduana de ingreso conoce los procedimientos locales y puede anticipar demoras.',
                    'Si todavía no tiene despachante, podemos conectarlo con uno matriculado que trabaje en la zona por la que va a ingresar su mercadería.',
                ],
            ],
            [
                'h2' => 'Filas y horarios',
                'body' => [
                    'Como regla general, los puentes tienen más movimiento en fines de semana, feriados de cualquiera de los dos países y temporadas de compras. No publicamos el estado de los puentes en vivo; consulte los canales oficiales de las autoridades de frontera antes de salir.',
                ],
            ],
        ],
        'faq' => [
            ['q' => '¿Cuánto puedo comprar en Ciudad del Este sin pagar impuestos al volver a Brasil?', 'a' => 'Lo define la Receita Federal de Brasil. Consulte la cuota vigente para viajeros por vía terrestre en gov.br/receitafederal.'],
            ['q' => '¿Qué controla la aduana de Encarnación?', 'a' => 'El ingreso de personas con equipaje y compras, y la mercadería comercial. Del lado argentino, en Posadas, controla ARCA.'],
            ['q' => '¿Puedo importar mercadería para mi negocio comprando en Ciudad del Este?', 'a' => 'Si es residente, lo que corresponde es comprar a un importador local con factura o importar a su nombre con despacho aduanero. El régimen de turismo está pensado para compradores extranjeros.'],
            ['q' => '¿Dónde está la información oficial?', 'a' => 'Del lado paraguayo, en aduana.gov.py y dnit.gov.py. Del lado brasileño, en la Receita Federal, y del argentino, en ARCA.'],
            ['q' => '¿Qué es la aduana de Encarnación para un importador?', 'a' => 'Además del control de viajeros, es una de las aduanas por donde puede ingresar carga comercial. Su despachante le indica si conviene usarla según el origen y el destino de su mercadería.'],
            ['q' => '¿Hay que declarar el dinero en efectivo al cruzar?', 'a' => 'Sí, cuando supera el límite que fija cada país. Consulte el monto vigente en las fuentes oficiales antes de viajar.'],
        ],
        'relatedService' => 'despacho-aduanero',
        'toolLink' => null,
        'related' => ['regimen-de-turismo-paraguay', 'cruzar-frontera-argentina-paraguay', 'aduana-clorinda'],
        'affiliates' => [],
        'disclaimer' => true,
        'image' => null,
    ],

];

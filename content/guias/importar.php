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

/* Cluster file loaded by content/guias.php. Cluster: importar. */

declare(strict_types=1);

return [

    'como-importar-de-china-a-paraguay' => [
        'path' => '/importar/como-importar-de-china-a-paraguay/',
        'title' => 'Cómo importar de China a Paraguay, paso a paso',
        'navLabel' => 'Cómo importar de China',
        'cluster' => 'importar',
        'seoTitle' => 'Cómo importar de China a Paraguay',
        'metaDescription' => 'Guía completa para importar de China a Paraguay: proveedor, muestras, pago, flete, seguro, despacho aduanero y entrega, en orden.',
        'lastReviewed' => '2026-09-24',
        'hero' => [
            'eyebrow' => 'Importar',
            'h1' => 'Cómo importar de China a Paraguay, paso a paso',
            'lead' => 'Para importar de China a Paraguay usted elige el producto, verifica un proveedor, aprueba una muestra, cierra el precio con un Incoterm claro, paga por etapas, inspecciona antes del embarque, contrata flete y seguro, y despacha la mercadería con un despachante de aduana matriculado. Esta guía explica cada paso en ese orden.',
        ],
        'intro' => [
            'Importar de China a Paraguay para revender no es un trámite único sino una cadena de decisiones: qué comprar, a quién, en qué condiciones, cómo se mueve la carga y cómo se nacionaliza. Si una sola pieza falla, el costo final se dispara o la mercadería llega distinta a lo que pagó. Por eso conviene seguir un orden y hacer las cuentas antes de transferir el primer dólar.',
            'Esta guía está pensada para comerciantes, emprendedores y empresas pequeñas que quieren traer mercadería en volumen comercial, no compras personales por Temu o AliExpress (para eso vea la guía de [courier de China a Paraguay](/comprar/courier-china-paraguay/)). Explicamos los nueve pasos, los costos que componen el precio final y los errores que más dinero cuestan. No somos despachantes ni una agencia oficial: coordinamos con agentes en China, transitarios y despachantes de aduana matriculados que ejecutan cada parte.',
            'Los tributos de importación se componen del arancel, que sigue el Arancel Externo Común del Mercosur con las excepciones que aplica Paraguay, el IVA y otras tasas y anticipos que liquida la aduana. Todos dependen de la posición arancelaria ([código NCM](/aduana/ncm-nomenclatura-mercosur/)) de cada producto y cambian con el tiempo, por eso no los publicamos como cifras fijas: los conceptos están explicados en la guía de [tributos aduaneros en Paraguay](/aduana/tributos-aduaneros-paraguay/) y su despachante le confirma la liquidación vigente antes de embarcar.',
        ],
        'steps' => [
            [
                'title' => 'Elegir el producto y hacer los números',
                'body' => [
                    'Empiece por el producto, no por el proveedor. Defina qué quiere vender, a qué precio se vende hoy en Paraguay y cuánto margen necesita. Anote el peso y el volumen aproximados por unidad: un producto liviano y compacto soporta mejor el flete que uno voluminoso de poco valor.',
                    'Antes de avanzar, pida a un [despachante de aduana](/aduana/despachantes-de-aduana-paraguay/) la posición arancelaria probable del producto y los tributos que corresponden, y averigüe si necesita algún permiso previo (por ejemplo, productos que requieren registro sanitario, homologación o certificados). Algunos rubros tienen requisitos que por sí solos vuelven inviable una importación pequeña.',
                    'Con esos datos, estime el costo puesto en su depósito con la [calculadora de costo de importación](/herramientas/calculadora-costo-importacion/) y compárelo con el precio de venta. Si el margen no aparece en el papel, no aparecerá en la realidad.',
                ],
            ],
            [
                'title' => 'Buscar y verificar proveedores',
                'body' => [
                    'Los canales habituales son [Alibaba.com](/comprar/alibaba-paraguay/) (orientado a la exportación, en inglés), [1688.com](/comprar/1688-en-espanol/) (el mayorista interno de China, en chino y con precios más bajos pero sin exportación directa), las ferias como la [Feria de Cantón](/feria-de-canton/) en Guangzhou, y los agentes de compras que buscan por usted.',
                    'Pida cotización a por lo menos tres proveedores con la misma especificación. Verifique la licencia comercial (营业执照) y su código de crédito social, si es fábrica o comerciante, cuántos años lleva exportando y si ya vendió a Sudamérica. Desconfíe de precios muy por debajo del resto. La guía sobre [proveedores chinos confiables](/importar/proveedores-chinos-confiables/) detalla cada verificación.',
                    'Si no habla inglés o chino, o no puede viajar, el servicio de [agente de compras en China](/servicios/agente-de-compras-china/) se encarga de la búsqueda, la negociación y la verificación con un agente en el lugar.',
                ],
            ],
            [
                'title' => 'Pedir y aprobar muestras',
                'body' => [
                    'Nunca haga un pedido de volumen sin haber tenido una muestra en la mano. La muestra se paga (a veces el proveedor la descuenta del pedido) y suele venir por courier. Pida la muestra del mismo material y la misma terminación que tendrá la producción.',
                    'Guarde la muestra aprobada, sáquele fotos y anote medidas y peso: es su referencia para reclamar si la producción sale distinta. Si importa varios productos, pida las muestras juntas para ahorrar en envío.',
                ],
            ],
            [
                'title' => 'Cerrar el contrato y el Incoterm (FOB, EXW o CIF)',
                'body' => [
                    'Ponga por escrito una proforma o contrato con especificación, cantidad, precio unitario, embalaje, marcado de las cajas, plazo de producción, forma de pago, penalidades por atraso y el Incoterm. El Incoterm define dónde termina la responsabilidad del proveedor y dónde empieza la suya.',
                    'EXW (en fábrica): usted o su transitario retiran la carga en la fábrica y pagan todo desde ahí, incluido el despacho de exportación en China. Parece el precio más bajo, pero suma costos y trámites en origen. FOB (libre a bordo): el proveedor entrega la carga en el puerto chino, con la exportación hecha; usted contrata el flete principal. Es la opción más usada porque le permite elegir su propio transitario. CIF (costo, seguro y flete): el proveedor paga flete y seguro hasta el puerto de destino, pero usted no controla con quién ni en qué condiciones, y los gastos en destino pueden resultar altos.',
                    'Para un importador que empieza, FOB con un transitario de confianza suele dar el mejor equilibrio entre precio y control.',
                ],
            ],
            [
                'title' => 'Pagar por etapas',
                'body' => [
                    'Lo habitual es un anticipo para iniciar la producción y el saldo contra inspección o contra copia de los documentos de embarque. No pague el 100 % por adelantado a un proveedor nuevo.',
                    'Las vías más comunes son la transferencia bancaria internacional (a la cuenta a nombre de la empresa que figura en el contrato, nunca a una cuenta personal), el pago dentro de Alibaba con Trade Assurance, y plataformas como Wise o Payoneer. Cada una tiene costos y riesgos distintos; los explicamos en la guía sobre [cómo pagar a proveedores chinos](/importar/pagar-a-proveedores-chinos/).',
                ],
            ],
            [
                'title' => 'Inspeccionar antes del embarque',
                'body' => [
                    'La inspección previa al embarque se hace cuando la producción está terminada y embalada, antes de pagar el saldo. Un inspector abre una muestra estadística de cajas, controla cantidades, medidas, terminación, funcionamiento, embalaje y marcado, y entrega un informe con fotos.',
                    'Es el último momento en que usted tiene poder de negociación: una vez pagado el saldo y embarcada la carga, cualquier reclamo es mucho más difícil. El servicio de [inspección de calidad en China](/servicios/inspeccion-de-calidad/) coordina un inspector independiente en la fábrica para que usted decida con el informe en la mano.',
                ],
            ],
            [
                'title' => 'Contratar el flete: marítimo, aéreo o courier',
                'body' => [
                    'Paraguay no tiene salida al mar, así que la carga marítima desde China llega a un puerto de transbordo de la región (hoy sobre todo Buenos Aires, además de Montevideo) y desde ahí sigue por barcaza por la hidrovía Paraná-Paraguay hasta las terminales de Asunción y Villeta; otra vía es el puerto brasileño de Paranaguá, donde Paraguay tiene depósitos francos, con camión hasta Ciudad del Este. Su transitario elige la ruta según el destino final y el tipo de carga.',
                    'Marítimo en contenedor completo (FCL, de 20 o 40 pies) conviene cuando llena buena parte de un contenedor; con menos volumen se usa el [contenedor compartido o carga consolidada](/importar/contenedor-compartido-desde-china/) (LCL), que se cobra por metro cúbico. El servicio de [flete marítimo en contenedor](/servicios/flete-maritimo-contenedor/) cotiza ambas opciones con transitarios.',
                    'Aéreo es más rápido y más caro; conviene para carga de alto valor y poco volumen, reposición urgente o muestras grandes. Se cobra por el mayor entre el peso real y el peso volumétrico. Vea el servicio de [flete aéreo desde China](/servicios/flete-aereo-china/). El courier sirve para muestras y envíos pequeños, pero no reemplaza a una importación comercial en volumen.',
                ],
            ],
            [
                'title' => 'Asegurar la carga',
                'body' => [
                    'El seguro de transporte internacional cubre pérdidas y daños durante el viaje según la póliza contratada. Con FOB o EXW, el seguro corre por su cuenta: pídalo junto con la cotización del flete. Con CIF el proveedor contrata un seguro, pero en general con la cobertura mínima.',
                    'Revise qué cubre (todo riesgo o riesgos nombrados), el deducible y cómo se reclama. Un contenedor mojado en un transbordo o una caja aplastada en el camión pueden costar más que la prima de todo un año.',
                ],
            ],
            [
                'title' => 'Despachar en aduana y recibir la mercadería',
                'body' => [
                    'Cuando la carga llega, un despachante de aduana matriculado presenta el despacho de importación con la factura comercial, la lista de empaque, el conocimiento de embarque (o la guía aérea), el certificado de origen cuando corresponde y los permisos del producto. El despachante clasifica la mercadería, liquida los tributos y le indica cuánto pagar antes de liberar la carga. El servicio de [despacho aduanero](/servicios/despacho-aduanero/) lo conecta con despachantes matriculados.',
                    'Liberada la carga, se retira del puerto, la terminal o el depósito fiscal y se transporta hasta su depósito en Asunción, Ciudad del Este u otra ciudad. Revise las cajas al recibirlas y documente cualquier daño antes de firmar la entrega.',
                    'Si prefiere no coordinar cada eslabón por separado, el servicio de [importación llave en mano](/servicios/importacion-llave-en-mano/) une todo el proceso, desde el proveedor hasta la entrega, con un solo punto de contacto.',
                ],
            ],
        ],
        'table' => [
            'caption' => 'Componentes del costo de una importación desde China',
            'head' => ['Componente', 'Qué incluye', 'Cuándo se paga'],
            'rows' => [
                ['Precio de la mercadería', 'Precio unitario por cantidad, según el Incoterm pactado (EXW, FOB, CIF)', 'Anticipo y saldo al proveedor'],
                ['Gastos en origen', 'Traslado a puerto, despacho de exportación en China (si compra EXW)', 'Antes del embarque'],
                ['Flete internacional', 'Marítimo (FCL o LCL), aéreo o courier hasta Paraguay, con transbordo', 'Al transitario, antes o al llegar'],
                ['Seguro de carga', 'Póliza de transporte según valor y cobertura', 'Al contratar el flete'],
                ['Gastos en destino', 'Terminal, depósito, manipuleo, liberación de documentos', 'Al llegar la carga'],
                ['Tributos aduaneros', 'Arancel según NCM, IVA y demás tasas y anticipos que liquida la aduana', 'Antes de liberar la carga'],
                ['Honorarios del despachante', 'Clasificación, despacho y gestión ante la aduana', 'Según acuerdo con el despachante'],
                ['Transporte interno', 'Camión desde puerto o terminal hasta su depósito', 'A la entrega'],
                ['Servicios en China', 'Agente de compras, inspección, muestras', 'Según cada servicio'],
                ['Costos financieros', 'Comisiones bancarias, tipo de cambio, capital inmovilizado', 'En cada pago'],
            ],
            'note' => 'Los montos dependen del producto, el volumen, la ruta y la fecha. Las alícuotas de los tributos las confirma su despachante según la posición arancelaria vigente.',
        ],
        'sections' => [
            [
                'h2' => 'Errores que más dinero cuestan',
                'body' => [
                    'La mayoría de las importaciones que salen mal no fallan por mala suerte, sino por pasos salteados.',
                ],
                'items' => [
                    ['title' => 'Comparar solo el precio unitario', 'text' => 'Un proveedor más barato en EXW puede salir más caro puesto en Paraguay que otro en FOB.'],
                    ['title' => 'No consultar la posición arancelaria antes de comprar', 'text' => 'Los tributos y permisos se enteran recién en la aduana, cuando ya no hay vuelta atrás.'],
                    ['title' => 'Pagar todo por adelantado', 'text' => 'Sin saldo pendiente, usted pierde la palanca para exigir calidad y plazos.'],
                    ['title' => 'Saltear la inspección', 'text' => 'Los defectos se descubren en Paraguay, cuando reclamar ya es caro y lento.'],
                    ['title' => 'Documentos inconsistentes', 'text' => 'Una diferencia entre factura, lista de empaque y conocimiento de embarque puede demorar el despacho y generar costos de depósito.'],
                ],
            ],
            [
                'h2' => 'Qué podemos coordinar por usted',
                'body' => [
                    'Puede hacer cada paso por su cuenta con esta guía. Si prefiere delegar una parte, coordinamos con profesionales independientes que la ejecutan: agente de compras en China para buscar y negociar con proveedores, inspección de calidad antes del embarque, flete marítimo y aéreo con transitarios, y despacho aduanero con despachantes matriculados. La importación llave en mano junta todo en un solo proceso. Nosotros no despachamos ni somos agencia oficial: lo conectamos con quien lo hace y seguimos el proceso con usted.',
                ],
            ],
        ],
        'faq' => [
            ['q' => '¿Cuánto dinero necesito para empezar a importar de China?', 'a' => 'Depende del pedido mínimo del proveedor y del flete. Sume mercadería, flete, seguro, tributos, despachante y transporte interno con la calculadora de costo de importación antes de comprometer dinero.'],
            ['q' => '¿Necesito RUC para importar de China a Paraguay?', 'a' => 'Para importar con regularidad para revender, sí: la mercadería se despacha a nombre de un importador con RUC y habilitado en el registro que lleva la DNIT, que también prevé un trámite para importadores ocasionales. Los pasos están en la guía de [requisitos para importar en Paraguay](/importar/requisitos-para-importar-paraguay/). Si no quiere habilitarse, puede importar a través de una [importadora](/importar/importadoras-en-paraguay/).'],
            ['q' => '¿Cuánto tarda una importación desde China?', 'a' => 'Suma la producción, el tránsito y el despacho. El marítimo tarda bastante más que el aéreo por el transbordo y el tramo fluvial o terrestre; pida a su transitario el tiempo estimado para su ruta y fecha.'],
            ['q' => '¿Qué Incoterm me conviene: FOB, EXW o CIF?', 'a' => 'Para empezar, FOB suele ser el más equilibrado: el proveedor hace la exportación en China y usted elige su propio transitario y seguro.'],
            ['q' => '¿Puedo importar sin despachante de aduana?', 'a' => 'No para una importación comercial: el Código Aduanero (Ley 2422/2004, art. 22) establece que el importador actúa obligatoriamente por medio de un [despachante de aduana](/aduana/despachantes-de-aduana-paraguay/) matriculado. Los envíos personales por courier siguen otro régimen.'],
            ['q' => '¿Cuánto se paga de impuestos al importar de China?', 'a' => 'Depende de la posición arancelaria del producto: arancel, IVA y otras tasas se calculan sobre el valor en aduana. Vea los conceptos en la guía de [tributos aduaneros](/aduana/tributos-aduaneros-paraguay/); su despachante le confirma la liquidación vigente.'],
        ],
        'relatedService' => 'importacion-llave-en-mano',
        'toolLink' => [
            'path' => '/herramientas/calculadora-costo-importacion/',
            'label' => 'Calculadora de costo de importación',
            'text' => 'Sume mercadería, flete, seguro, tributos y despachante para estimar el costo puesto en Paraguay antes de comprar.',
        ],
        'related' => ['requisitos-para-importar-paraguay', 'proveedores-chinos-confiables', 'contenedor-compartido-desde-china'],
        'affiliates' => [],
        'disclaimer' => false,
        'image' => ['base' => '/assets/img/como-importar-de-china-plan-ruta', 'widths' => [640, 1280], 'alt' => 'Cuaderno con una ruta de envío dibujada, muestras de productos, un contenedor en miniatura y un pasaporte', 'width' => 1280, 'height' => 716],
    ],

    'requisitos-para-importar-paraguay' => [
        'path' => '/importar/requisitos-para-importar-paraguay/',
        'title' => 'Requisitos para importar en Paraguay',
        'navLabel' => 'Requisitos para importar',
        'cluster' => 'importar',
        'seoTitle' => 'Requisitos para importar en Paraguay',
        'metaDescription' => 'Qué necesita para importar en Paraguay: RUC, registro de importador, despachante, documentos del embarque y permisos según el producto.',
        'lastReviewed' => '2026-09-24',
        'hero' => [
            'eyebrow' => 'Importar',
            'h1' => 'Requisitos para importar en Paraguay',
            'lead' => 'Los requisitos para importar en Paraguay se resumen en tres grupos: estar habilitado como importador (RUC activo y registro ante la aduana), contar con un despachante de aduana matriculado y tener en regla los documentos del embarque y los permisos que exija su producto.',
        ],
        'intro' => [
            'Para importar mercadería con fines comerciales en Paraguay usted necesita un RUC activo, la habilitación como importador ante la Dirección Nacional de Ingresos Tributarios (DNIT), un despachante de aduana matriculado que presente el despacho, y un juego completo de documentos: factura comercial, lista de empaque, documento de transporte y, según el caso, certificado de origen y permisos del producto.',
            'Esta guía es para quien va a importar por primera vez, sea como persona física o como empresa. Ordena los requisitos en el orden en que conviene resolverlos y explica para qué sirve cada documento. El detalle exacto del registro (formularios, montos y plazos) cambia con las normas: lo indicamos de forma general y le decimos dónde confirmarlo.',
            'No somos la aduana ni un despachante. La información es orientativa; la palabra final la tienen la DNIT y su despachante.',
        ],
        'steps' => [
            [
                'title' => 'Tener un RUC activo y al día',
                'body' => [
                    'El Registro Único del Contribuyente (RUC) lo emite la DNIT. Puede ser de persona física o de persona jurídica. Para importar, el RUC debe estar activo, con las obligaciones tributarias al día y con una actividad económica compatible con la importación y venta de la mercadería.',
                    'Si recién se inscribe, consulte a un contador qué régimen le corresponde, porque eso influye en cómo se recupera el IVA pagado en la importación.',
                ],
            ],
            [
                'title' => 'Habilitarse como importador ante la aduana',
                'body' => [
                    'Además del RUC, el importador debe estar habilitado en el Registro de Personas Vinculadas a la Actividad Aduanera (PVAA) de la DNIT. Desde agosto de 2025 la habilitación y su actualización se hacen en línea desde el sistema Marangatu, con un procedimiento para importador habitual y otro para importador ocasional; la DNIT publica guías paso a paso en su portal (dnit.gov.py).',
                    'Los documentos exactos, los plazos y si hay algún costo los confirma la DNIT o su despachante, que suele guiarlo en este trámite porque lo hace con frecuencia. El paso a paso completo está en la guía sobre [cómo ser importador en Paraguay](/importar/como-ser-importador-paraguay/).',
                ],
            ],
            [
                'title' => 'Elegir un despachante de aduana matriculado',
                'body' => [
                    'El Código Aduanero (Ley 2422/2004, art. 22) establece que el importador actúa obligatoriamente por medio de un [despachante de aduana](/aduana/despachantes-de-aduana-paraguay/). El despachante presenta el despacho de importación en el sistema aduanero a nombre suyo, clasifica la mercadería, liquida los tributos y responde ante la aduana por la declaración. Elija uno con experiencia en su rubro y pida por escrito qué incluyen sus honorarios; la guía sobre el [precio del despacho aduanero](/aduana/precio-despacho-aduanero-paraguay/) explica cómo compararlos.',
                    'Consúltelo antes de comprar, no cuando la carga ya llegó: le dirá la posición arancelaria, los tributos y si el producto necesita permisos previos.',
                ],
            ],
            [
                'title' => 'Revisar si el producto necesita permisos previos',
                'body' => [
                    'Algunas mercaderías requieren una autorización o registro de otro organismo antes del despacho o de la venta: por ejemplo, los equipos de telecomunicaciones deben estar homologados por la CONATEL, y rubros como alimentos, cosméticos, medicamentos, productos de uso veterinario o agrícola y vehículos tienen sus propios controles. Sin el permiso que corresponda, la carga puede quedar retenida.',
                    'Qué organismo interviene y qué pide depende de la posición arancelaria ([código NCM](/aduana/ncm-nomenclatura-mercosur/)). Su despachante o el organismo competente le confirman el requisito vigente.',
                ],
            ],
            [
                'title' => 'Pedir al proveedor los documentos correctos',
                'body' => [
                    'Antes del embarque, pida al proveedor borradores de la factura comercial y la lista de empaque, y compárelos con la proforma. Los datos del importador, la descripción de la mercadería, las cantidades, los pesos y los valores deben coincidir entre sí y con el documento de transporte.',
                    'Pregunte al despachante si su operación exige certificado de origen y de qué tipo: depende de la mercadería y del tratamiento arancelario que se solicite.',
                ],
            ],
            [
                'title' => 'Presentar el despacho y pagar los tributos',
                'body' => [
                    'Con la carga arribada y los documentos completos, el despachante presenta la declaración. La aduana puede liberar la carga con revisión documental o disponer una verificación física. Se pagan los tributos liquidados y, una vez liberada, la mercadería se retira.',
                    'Guarde toda la documentación del despacho: la necesitará para su contabilidad y ante cualquier control posterior. Los conceptos que se pagan están en la guía de [tributos aduaneros](/aduana/tributos-aduaneros-paraguay/).',
                ],
            ],
        ],
        'table' => [
            'caption' => 'Documentos habituales de una importación desde China',
            'head' => ['Documento', 'Qué es', 'Quién lo emite'],
            'rows' => [
                ['Factura comercial (commercial invoice)', 'Detalla vendedor, comprador, mercadería, cantidades, precio y condición de venta (Incoterm)', 'El proveedor chino'],
                ['Lista de empaque (packing list)', 'Detalla cajas, contenido de cada una, pesos y medidas', 'El proveedor chino'],
                ['Conocimiento de embarque (bill of lading, B/L)', 'Documento de transporte marítimo y título de la carga', 'La naviera o el transitario'],
                ['Guía aérea (air waybill, AWB)', 'Documento de transporte aéreo', 'La aerolínea o el transitario'],
                ['Carta de porte o documento fluvial', 'Documento del tramo terrestre o fluvial desde el puerto de transbordo', 'El transportista del tramo regional'],
                ['Certificado de origen', 'Acredita el país de origen de la mercadería, cuando se lo exige', 'Organismo habilitado en China'],
                ['Póliza o certificado de seguro', 'Cobertura del transporte internacional', 'La aseguradora'],
                ['Permisos o registros del producto', 'Autorizaciones de otros organismos según el rubro', 'El organismo paraguayo competente'],
                ['Despacho de importación', 'Declaración aduanera con clasificación y liquidación', 'El despachante, en el sistema aduanero'],
            ],
            'note' => 'Qué documentos se exigen en cada caso depende de la mercadería, el origen y el régimen. Su despachante le confirma la lista para su operación.',
        ],
        'sections' => [
            [
                'h2' => 'Persona física o empresa',
                'body' => [
                    'Una persona física con RUC puede importar para su actividad comercial. Una empresa (por ejemplo, una sociedad) ofrece separación patrimonial y suele facilitar la relación con bancos y proveedores cuando el volumen crece. La elección tiene consecuencias tributarias: decídala con un contador.',
                    'Si todavía no quiere habilitarse, puede importar a través de una importadora que actúa como importador formal. Lo explicamos en la guía sobre [importadoras en Paraguay](/importar/importadoras-en-paraguay/).',
                ],
            ],
        ],
        'faq' => [
            ['q' => '¿Puedo importar solo con cédula de identidad?', 'a' => 'Para compras personales por [courier](/comprar/courier-china-paraguay/), en general sí. Para importar con regularidad necesita RUC y la habilitación como importador; la DNIT prevé además un trámite para importadores ocasionales sin RUC. Su despachante le indica cuál corresponde, o puede importar por medio de una importadora.'],
            ['q' => '¿El registro de importador tiene costo?', 'a' => 'Consulte el requisito y el monto vigente en el sitio de la DNIT o con su despachante; puede cambiar con las normas.'],
            ['q' => '¿Quién prepara la factura comercial?', 'a' => 'El proveedor chino. Usted debe revisar el borrador para que los datos coincidan con la proforma y con el documento de transporte.'],
            ['q' => '¿Siempre necesito certificado de origen?', 'a' => 'Depende de la mercadería y del tratamiento arancelario que se solicite. El despachante le indica si su operación lo requiere y de qué tipo.'],
            ['q' => '¿Qué pasa si falta un permiso del producto?', 'a' => 'La carga puede quedar retenida en depósito hasta que se presente, con costos de almacenaje a su cargo. Por eso se verifica antes de comprar.'],
        ],
        'relatedService' => 'despacho-aduanero',
        'toolLink' => [
            'path' => '/herramientas/calculadora-costo-importacion/',
            'label' => 'Calculadora de costo de importación',
            'text' => 'Una vez que sabe qué necesita, estime el costo total puesto en Paraguay.',
        ],
        'related' => ['como-ser-importador-paraguay', 'despachantes-de-aduana-paraguay', 'ncm-nomenclatura-mercosur'],
        'affiliates' => [],
        'disclaimer' => false,
        'image' => null,
    ],

    'como-ser-importador-paraguay' => [
        'path' => '/importar/como-ser-importador-paraguay/',
        'title' => 'Cómo ser importador en Paraguay',
        'navLabel' => 'Cómo ser importador',
        'cluster' => 'importar',
        'seoTitle' => 'Cómo ser importador en Paraguay',
        'metaDescription' => 'Cómo registrarse como importador en Paraguay: pasos ante la DNIT y la aduana, qué cambia si es persona física o empresa, y errores comunes.',
        'lastReviewed' => '2026-09-24',
        'hero' => [
            'eyebrow' => 'Importar',
            'h1' => 'Cómo ser importador en Paraguay',
            'lead' => 'Para ser importador en Paraguay necesita un RUC activo con una actividad que incluya la importación, la inscripción en el registro de importadores de la aduana (hoy parte de la DNIT) y un despachante de aduana matriculado que opere a su nombre.',
        ],
        'intro' => [
            'Ser importador en Paraguay significa poder traer mercadería a su propio nombre y declararla ante la aduana. El camino tiene tres partes: ordenar su situación tributaria (RUC, actividad y régimen), inscribirse en el registro de importadores y contar con un despachante matriculado. Con eso resuelto, cada importación se vuelve un trámite repetible.',
            'Esta guía es para quien hoy compra a través de terceros y quiere pasar a importar en forma directa, o para quien arranca un negocio de reventa. Explica los pasos en orden, qué cambia entre persona física y empresa, cómo preparar la primera operación y los errores más comunes.',
            'Desde la Ley 7143/2023, la administración tributaria y la aduana funcionan bajo la Dirección Nacional de Ingresos Tributarios (DNIT); la aduana opera como su Gerencia General de Aduanas. Los formularios y requisitos exactos cambian: confírmelos en dnit.gov.py o con su despachante antes de iniciar. Si le falta el panorama general, empiece por los [requisitos para importar en Paraguay](/importar/requisitos-para-importar-paraguay/).',
        ],
        'steps' => [
            [
                'title' => 'Definir si importará como persona física o empresa',
                'body' => [
                    'Una persona física con RUC puede importar. Una sociedad separa el patrimonio del negocio del personal y suele ser mejor vista por bancos y proveedores cuando las compras crecen. La decisión afecta impuestos, contabilidad y responsabilidad: tómela con un contador.',
                ],
            ],
            [
                'title' => 'Ordenar el RUC y la actividad económica',
                'body' => [
                    'Verifique que su RUC esté activo, que las declaraciones estén al día y que la actividad registrada incluya la importación y la venta de lo que va a traer. Si no, actualícela ante la DNIT.',
                    'Pregunte a su contador cómo se tratarán el IVA y los anticipos que se pagan en la aduana, y qué comprobantes debe emitir al revender.',
                ],
            ],
            [
                'title' => 'Inscribirse en el registro de importadores',
                'body' => [
                    'La DNIT lleva el Registro de Personas Vinculadas a la Actividad Aduanera (PVAA), donde se habilita el importador. Desde agosto de 2025 la solicitud se hace en línea desde el sistema Marangatu, con guías paso a paso publicadas en dnit.gov.py. Si otras personas van a operar por usted ante la aduana, primero debe cargarlas como representantes en los datos de su RUC.',
                    'Los documentos exactos, los montos y los plazos de aprobación consúltelos vigentes en la DNIT. Muchos despachantes acompañan este trámite como parte de su servicio.',
                ],
            ],
            [
                'title' => 'Elegir un despachante y un transitario',
                'body' => [
                    'El despachante de aduana matriculado presenta sus despachos. El transitario (forwarder) organiza el transporte desde China. Ambos serán sus socios en cada operación: pida referencias, compare propuestas por escrito y aclare qué incluye cada honorario.',
                    'Si aún no tiene contactos, el servicio de [despacho aduanero](/servicios/despacho-aduanero/) lo conecta con despachantes matriculados. Para elegir, vea la guía de [despachantes de aduana en Paraguay](/aduana/despachantes-de-aduana-paraguay/).',
                ],
            ],
            [
                'title' => 'Preparar la primera importación con un pedido chico',
                'body' => [
                    'La primera operación es para aprender el circuito. Elija un producto sin permisos especiales, un volumen que pueda perder sin quebrar el negocio y un proveedor verificado. Consulte la posición arancelaria antes de comprar y calcule el costo total.',
                    'Siga el orden de la guía sobre [cómo importar de China a Paraguay](/importar/como-importar-de-china-a-paraguay/): muestra, contrato con Incoterm, pago por etapas, inspección, flete, seguro y despacho.',
                ],
            ],
            [
                'title' => 'Llevar el archivo de cada operación',
                'body' => [
                    'Archive por operación la proforma, la factura, la lista de empaque, el documento de transporte, la póliza, el despacho y los comprobantes de pago. La aduana y la administración tributaria pueden pedirlos después, y le sirven para calcular el costo real de cada producto.',
                ],
            ],
        ],
        'table' => [
            'caption' => 'Importar a su nombre o por medio de una importadora',
            'head' => ['Aspecto', 'A su nombre', 'Por una importadora'],
            'rows' => [
                ['Registro', 'RUC activo e inscripción como importador', 'No lo necesita para esa operación'],
                ['Control del proceso', 'Total: elige proveedor, flete y despachante', 'Parcial: depende de la importadora'],
                ['Costo', 'Paga los costos sin intermediario', 'Suma la comisión de la importadora'],
                ['Crédito fiscal', 'El IVA de importación queda a su nombre', 'Depende de cómo le facture la importadora'],
                ['Aprendizaje', 'Aprende el circuito y gana autonomía', 'Delega y aprende menos'],
                ['Conviene cuando', 'Importa con regularidad', 'Prueba un producto o importa pocas veces'],
            ],
            'note' => 'Consulte con su contador el tratamiento tributario de cada alternativa.',
        ],
        'sections' => [
            [
                'h2' => 'Errores comunes al empezar',
                'body' => [],
                'items' => [
                    ['title' => 'Comprar antes de estar habilitado', 'text' => 'La carga llega y no hay a nombre de quién despacharla; el depósito cobra cada día.'],
                    ['title' => 'Actividad del RUC que no coincide', 'text' => 'Puede generar observaciones al despachar o al revender.'],
                    ['title' => 'No consultar al despachante antes', 'text' => 'Los permisos previos y los tributos se descubren tarde.'],
                    ['title' => 'Empezar con un pedido grande', 'text' => 'Cualquier error se multiplica. La primera operación es para aprender.'],
                ],
            ],
            [
                'h2' => 'Qué hace cada actor en su importación',
                'body' => [
                    'Como importador, usted es responsable ante la aduana por lo que declara, aunque el trámite lo haga un tercero. Conviene entender quién hace qué para no dejar huecos.',
                    'Si quiere delegar la coordinación sin dejar de ser el importador, la [importación llave en mano](/servicios/importacion-llave-en-mano/) organiza proveedor, inspección, flete y despacho a su nombre con profesionales independientes que ejecutan cada parte.',
                ],
                'items' => [
                    ['title' => 'Usted, el importador', 'text' => 'Elige el producto, firma con el proveedor, paga, y responde por la veracidad de los datos del despacho.'],
                    ['title' => 'El despachante de aduana', 'text' => 'Clasifica la mercadería, presenta el despacho, liquida los tributos y lo representa ante la aduana.'],
                    ['title' => 'El transitario o forwarder', 'text' => 'Contrata el transporte internacional, emite o gestiona el documento de transporte y coordina los transbordos.'],
                    ['title' => 'El contador', 'text' => 'Registra la importación, el IVA pagado en aduana y los anticipos, y le indica cómo facturar al revender.'],
                ],
            ],
        ],
        'faq' => [
            ['q' => '¿Cuánto tarda la inscripción como importador?', 'a' => 'Depende de la documentación y de la revisión de la DNIT. Consulte el plazo vigente con su despachante o en dnit.gov.py.'],
            ['q' => '¿Una persona física puede ser importadora?', 'a' => 'Sí, con RUC activo y la inscripción correspondiente. Conviene revisar con un contador el régimen tributario más adecuado.'],
            ['q' => '¿Necesito un capital mínimo para ser importador?', 'a' => 'No indicamos montos mínimos legales; confírmelo en la DNIT. En la práctica, el capital lo define el pedido mínimo del proveedor más flete, tributos y gastos.'],
            ['q' => '¿Puedo importar mientras hago el registro?', 'a' => 'Puede hacerlo por medio de una [importadora](/importar/importadoras-en-paraguay/) que actúe como importador formal hasta que su registro esté aprobado.'],
            ['q' => '¿El despachante puede hacer el registro por mí?', 'a' => 'Muchos despachantes acompañan el trámite. La inscripción queda igual a su nombre y bajo su responsabilidad.'],
        ],
        'relatedService' => 'despacho-aduanero',
        'toolLink' => null,
        'related' => ['requisitos-para-importar-paraguay', 'importadoras-en-paraguay', 'despachantes-de-aduana-paraguay'],
        'affiliates' => [],
        'disclaimer' => false,
        'image' => null,
    ],

    'proveedores-chinos-confiables' => [
        'path' => '/importar/proveedores-chinos-confiables/',
        'title' => 'Cómo encontrar proveedores chinos confiables',
        'navLabel' => 'Proveedores chinos confiables',
        'cluster' => 'importar',
        'seoTitle' => 'Proveedores chinos confiables: cómo elegir',
        'metaDescription' => 'Cómo encontrar y verificar proveedores chinos confiables: fábrica o comerciante, licencia, muestras, auditoría y señales de alerta.',
        'lastReviewed' => '2026-09-24',
        'hero' => [
            'eyebrow' => 'Importar',
            'h1' => 'Cómo encontrar proveedores chinos confiables',
            'lead' => 'Un proveedor chino confiable se reconoce por lo que se puede verificar, no por lo que promete: licencia comercial real, antigüedad exportando, muestras que coinciden con la producción, pagos a una cuenta de la empresa y disposición a una inspección independiente.',
        ],
        'intro' => [
            'Para encontrar proveedores chinos confiables, busque en varios canales (Alibaba, 1688, ferias y agentes), pida cotizaciones comparables a varios, y verifique a los finalistas: licencia comercial, si son fábrica o comerciante, historial de exportación, muestras y condiciones de pago. Ningún sello de una plataforma reemplaza esa verificación.',
            'Esta guía es para importadores paraguayos que buscan un proveedor para compras en volumen. Explica dónde buscar, cómo filtrar, qué documentos pedir y cuáles son las señales de alerta. Al final hay una lista de verificación que puede usar con cada candidato.',
        ],
        'steps' => [
            [
                'title' => 'Definir una especificación clara',
                'body' => [
                    'Antes de escribir a nadie, redacte una ficha: material, medidas, colores, calidad, embalaje, cantidad y certificaciones que necesita. Sin especificación, cada proveedor cotiza algo distinto y no hay forma de comparar.',
                ],
            ],
            [
                'title' => 'Buscar en más de un canal',
                'body' => [
                    '[Alibaba.com](/comprar/alibaba-paraguay/) reúne proveedores orientados a la exportación, con filtros por años en la plataforma y verificaciones de terceros. [1688.com](/comprar/1688-en-espanol/) es el mayorista interno de China: precios más bajos, pero en chino y sin exportación directa, por lo que suele requerir un agente. La [Feria de Cantón](/feria-de-canton/) en Guangzhou permite ver productos y conocer a los vendedores en persona.',
                    'Un [agente de compras en China](/servicios/agente-de-compras-china/) puede buscar en canales que no están en internet, como mercados mayoristas y contactos de fábrica.',
                ],
            ],
            [
                'title' => 'Pedir cotizaciones comparables',
                'body' => [
                    'Envíe la misma ficha a entre tres y cinco proveedores y pida precio por cantidad, pedido mínimo, plazo de producción, Incoterm (FOB con puerto de salida) y condiciones de pago. Descarte a quien no responde a lo que preguntó o cambia la especificación sin avisar.',
                ],
            ],
            [
                'title' => 'Verificar la empresa',
                'body' => [
                    'Pida la licencia comercial (营业执照). El nombre en chino y el código unificado de crédito social (18 caracteres) deben coincidir con el registro público de empresas de China, el Sistema Nacional de Publicidad de Información Crediticia Empresarial (gsxt.gov.cn), y con el titular de la cuenta bancaria. Confirme si es fábrica o comerciante: ambos pueden servir, pero el comerciante agrega un margen y menos control sobre la producción.',
                    'Pregunte por clientes en Sudamérica, certificaciones de producto y capacidad de producción. Una videollamada recorriendo la planta dice mucho.',
                ],
            ],
            [
                'title' => 'Probar con muestras y un primer pedido chico',
                'body' => [
                    'Pida muestras a los dos o tres finalistas y compárelas lado a lado. Luego haga un primer pedido moderado, con inspección antes del embarque. La confianza se construye con operaciones que salen bien, no con conversaciones.',
                ],
            ],
            [
                'title' => 'Proteger el pago y la calidad',
                'body' => [
                    'Pague por etapas, a una cuenta a nombre de la empresa, y deje el saldo contra inspección. Si compra por Alibaba, usar Trade Assurance agrega un mecanismo de reclamo. Considere una auditoría de fábrica si el pedido es grande o si va a desarrollar un producto propio. Los medios de pago se comparan en la guía sobre [cómo pagar a proveedores chinos](/importar/pagar-a-proveedores-chinos/).',
                    'El servicio de [inspección de calidad](/servicios/inspeccion-de-calidad/) coordina inspectores independientes para la verificación previa al embarque.',
                ],
            ],
        ],
        'table' => [
            'caption' => 'Lista de verificación de un proveedor chino',
            'head' => ['Punto a verificar', 'Cómo verificarlo', 'Señal de alerta'],
            'rows' => [
                ['Licencia comercial', 'Pedir copia y cotejar nombre y código en el registro público chino', 'No la envía o el nombre no coincide'],
                ['Fábrica o comerciante', 'Preguntar, ver alcance de la licencia, pedir video de la planta', 'Dice ser fábrica pero ofrece cualquier producto'],
                ['Antigüedad exportando', 'Años en la plataforma, referencias, documentos de exportación', 'Empresa recién creada con precios muy bajos'],
                ['Cuenta bancaria', 'Titular igual a la empresa del contrato', 'Pide pago a cuenta personal o de otra empresa'],
                ['Muestras', 'Muestra pagada del mismo material de producción', 'Se niega a enviar muestra o la muestra es otra calidad'],
                ['Condiciones de pago', 'Anticipo y saldo contra inspección o documentos', 'Exige 100 % por adelantado'],
                ['Certificaciones', 'Pedir certificado y verificarlo con el emisor', 'Certificados genéricos o de otra empresa'],
                ['Comunicación', 'Respuestas concretas a preguntas técnicas', 'Respuestas vagas, cambios de contacto frecuentes'],
                ['Inspección', 'Aceptar inspector independiente antes del embarque', 'Pone trabas a la inspección'],
            ],
            'note' => 'Una sola señal de alerta no descarta a un proveedor, pero varias juntas sí justifican buscar otro.',
        ],
        'sections' => [
            [
                'h2' => 'Estafas frecuentes',
                'body' => [
                    'La más común es el cambio de cuenta bancaria: llega un correo, aparentemente del proveedor, pidiendo pagar a una cuenta nueva. Confirme siempre por otro canal antes de pagar a una cuenta distinta de la del contrato. Otras son las muestras de alta calidad seguidas de una producción inferior, y los proveedores que desaparecen tras cobrar el anticipo.',
                    'Las reglas que previenen casi todas son las mismas: pagar solo a la cuenta de la empresa del contrato, dejar un saldo pendiente hasta la inspección, guardar la muestra aprobada como referencia y no dejarse apurar por ofertas que vencen en horas.',
                ],
            ],
        ],
        'faq' => [
            ['q' => '¿Los proveedores verificados de Alibaba son confiables?', 'a' => 'La verificación indica que un tercero revisó ciertos datos de la empresa, no que la calidad esté garantizada. Úsela como filtro inicial y verifique igual.'],
            ['q' => '¿Es mejor comprar a una fábrica o a un comerciante?', 'a' => 'La fábrica suele dar mejor precio y control; el comerciante acepta pedidos más chicos y mezcla productos. Depende de su volumen.'],
            ['q' => '¿Cómo compruebo la licencia de un proveedor chino?', 'a' => 'Coteje el nombre en chino y el código unificado de crédito social en el Sistema Nacional de Publicidad de Información Crediticia Empresarial (gsxt.gov.cn), el registro oficial que administra la autoridad de regulación del mercado de China, o pida a un agente local que lo haga.'],
            ['q' => '¿Cuántos proveedores debo contactar?', 'a' => 'Entre tres y cinco con la misma especificación es un buen número para comparar sin perder tiempo.'],
            ['q' => '¿Vale la pena viajar a China para conocer proveedores?', 'a' => 'Para relaciones de largo plazo o pedidos grandes, sí: la Feria de Cantón y las visitas a fábrica ahorran meses de correos.'],
        ],
        'relatedService' => 'agente-de-compras-china',
        'toolLink' => null,
        'related' => ['alibaba-paraguay', 'pagar-a-proveedores-chinos', 'feria-de-canton'],
        'affiliates' => [],
        'disclaimer' => false,
        'image' => null,
    ],

    'contenedor-compartido-desde-china' => [
        'path' => '/importar/contenedor-compartido-desde-china/',
        'title' => 'Contenedor compartido desde China (carga consolidada)',
        'navLabel' => 'Contenedor compartido',
        'cluster' => 'importar',
        'seoTitle' => 'Contenedor compartido desde China',
        'metaDescription' => 'Cómo funciona el contenedor compartido o carga consolidada desde China a Paraguay: desde cuántos metros cúbicos conviene y cómo se cobra.',
        'lastReviewed' => '2026-09-24',
        'hero' => [
            'eyebrow' => 'Importar',
            'h1' => 'Contenedor compartido desde China (carga consolidada)',
            'lead' => 'En un contenedor compartido (LCL o carga consolidada) usted paga solo los metros cúbicos que ocupa su mercadería dentro de un contenedor que comparte con otros importadores. Conviene cuando su carga no llena un contenedor; con volúmenes cercanos a medio contenedor de 20 pies, compare con un contenedor completo (FCL).',
        ],
        'intro' => [
            'El contenedor compartido desde China, también llamado carga consolidada o LCL (less than container load), permite importar por vía marítima sin llenar un contenedor entero. Un consolidador reúne cargas de varios importadores en un depósito en China, las carga en un mismo contenedor y las separa al llegar. Usted paga según el volumen o el peso de su carga, además de los gastos de consolidación y desconsolidación.',
            'Esta guía es para quien importa entre unos pocos metros cúbicos y algo menos de un contenedor. Explica cómo se cobra, cuándo conviene frente a un contenedor completo (FCL), cómo es el recorrido hasta Paraguay y qué cuidar en el embalaje y los documentos.',
        ],
        'steps' => [
            [
                'title' => 'Medir el volumen y el peso de su carga',
                'body' => [
                    'Pida al proveedor la lista de empaque con cantidad de cajas, medidas y peso bruto de cada una. El volumen de cada caja es largo por ancho por alto en metros; súmelas para obtener los metros cúbicos (m³). La [calculadora de CBM y contenedor](/herramientas/calculadora-cbm-contenedor/) hace este cálculo por usted.',
                ],
            ],
            [
                'title' => 'Entender cómo se cobra el LCL',
                'body' => [
                    'El flete consolidado se cobra por metro cúbico o por tonelada, lo que resulte mayor (regla peso o medida: una tonelada equivale a un metro cúbico). La mayoría de las cargas generales pagan por volumen. A eso se suman cargos fijos en origen y en destino por consolidar, desconsolidar, manipular y emitir documentos.',
                    'Por esos cargos fijos, un envío de muy pocos metros cúbicos puede salir caro por unidad. Pida siempre una cotización completa, puerta a puerta o hasta el depósito en Paraguay, no solo el flete del mar.',
                ],
            ],
            [
                'title' => 'Comparar LCL con un contenedor completo (FCL)',
                'body' => [
                    'Un contenedor de 20 pies tiene alrededor de 33 m³ de capacidad interna, y uno de 40 pies alrededor de 67 m³ (el 40 pies high cube, cerca de 76 m³). En la práctica se aprovecha menos por la forma de las cajas.',
                    'Cuando su carga se acerca a la mitad de un contenedor de 20 pies, pida cotización de ambas modalidades: el FCL tiene un precio fijo por contenedor y, a partir de cierto volumen, sale más barato por metro cúbico, además de evitar la manipulación junto a cargas ajenas.',
                ],
            ],
            [
                'title' => 'Entregar la carga al consolidador en China',
                'body' => [
                    'El proveedor lleva la mercadería al depósito del consolidador (con Incoterm FOB, o FCA en el depósito) antes de la fecha de cierre. Si llega tarde, su carga espera la siguiente salida. Coordine con el proveedor la fecha y la dirección del depósito que le indique el transitario.',
                ],
            ],
            [
                'title' => 'Seguir el tránsito hasta Paraguay',
                'body' => [
                    'El contenedor viaja a un puerto de transbordo de la región y desde ahí sigue por barcaza o camión hasta Paraguay, donde se desconsolida en un depósito. Por los transbordos y la espera de consolidación, el LCL suele tardar más que un FCL en la misma ruta. Pida a su transitario el tiempo estimado para su fecha de salida.',
                ],
            ],
            [
                'title' => 'Despachar y retirar su parte',
                'body' => [
                    'Cada importador despacha su propia carga con su [despachante de aduana](/aduana/despachantes-de-aduana-paraguay/), con su conocimiento de embarque (normalmente uno hijo, o house B/L, emitido por el consolidador). Liberada la carga, retira su mercadería del depósito. Si otra carga del mismo contenedor tiene problemas, la desconsolidación puede demorarse; su despachante le informa el estado.',
                ],
            ],
        ],
        'table' => [
            'caption' => 'LCL (contenedor compartido) frente a FCL (contenedor completo)',
            'head' => ['Aspecto', 'LCL / carga consolidada', 'FCL / contenedor completo'],
            'rows' => [
                ['Cómo se cobra', 'Por m³ o tonelada, lo mayor, más cargos fijos', 'Precio fijo por contenedor'],
                ['Volumen típico', 'Desde pocos m³ hasta cerca de medio contenedor', 'Desde medio contenedor en adelante'],
                ['Tiempo total', 'Mayor, por consolidación y desconsolidación', 'Menor en la misma ruta'],
                ['Manipulación', 'Su carga se mueve junto a cargas de terceros', 'Solo su carga, contenedor precintado'],
                ['Riesgo de demora ajena', 'Existe si otra carga tiene problemas', 'No depende de otros importadores'],
                ['Documento de transporte', 'Conocimiento hijo (house B/L) del consolidador', 'Conocimiento de la naviera o del transitario'],
            ],
            'note' => 'Las capacidades de contenedor son valores de referencia; los tiempos y precios dependen de la ruta y la fecha.',
        ],
        'sections' => [
            [
                'h2' => 'Embalaje y rotulado en carga consolidada',
                'body' => [
                    'En LCL su carga se carga y descarga varias veces junto a otras. Pida cajas de cartón de doble pared, esquineros, film y, si el volumen lo justifica, palletizado. Cada caja debe llevar marca, número de caja y destino, tal como figuran en la lista de empaque, para que la desconsolidación no mezcle mercaderías.',
                    'El servicio de [flete marítimo en contenedor](/servicios/flete-maritimo-contenedor/) cotiza LCL y FCL con transitarios y le ayuda a decidir con números en la mano.',
                ],
            ],
        ],
        'faq' => [
            ['q' => '¿Desde cuántos metros cúbicos conviene un contenedor completo?', 'a' => 'No hay un número fijo: depende de las tarifas del momento. Cuando su carga se acerca a la mitad de un contenedor de 20 pies, cotice ambas opciones y compare el costo total.'],
            ['q' => '¿Hay un mínimo para enviar en contenedor compartido?', 'a' => 'Los consolidadores suelen fijar un volumen mínimo cobrable, aunque su carga ocupe menos. Pida al transitario que cotiza cuál es ese mínimo; si su envío es muy chico, compare con un [courier de China a Paraguay](/comprar/courier-china-paraguay/).'],
            ['q' => '¿Puedo juntar productos de varios proveedores en un solo envío?', 'a' => 'Sí. Cada proveedor entrega en el depósito del consolidador y la carga viaja junta a su nombre, lo que simplifica el despacho.'],
            ['q' => '¿El contenedor compartido es más lento?', 'a' => 'Por lo general sí, por la espera de consolidación y la desconsolidación en destino.'],
            ['q' => '¿Quién despacha mi parte del contenedor compartido?', 'a' => 'Su propio despachante de aduana, con el conocimiento de embarque emitido a su nombre por el consolidador.'],
        ],
        'relatedService' => 'flete-maritimo-contenedor',
        'toolLink' => [
            'path' => '/herramientas/calculadora-cbm-contenedor/',
            'label' => 'Calculadora de CBM y contenedor',
            'text' => 'Cargue las medidas de sus cajas y vea cuántos metros cúbicos ocupa su carga y qué contenedor necesita.',
        ],
        'related' => ['como-importar-de-china-a-paraguay', 'courier-china-paraguay', 'requisitos-para-importar-paraguay'],
        'affiliates' => [],
        'disclaimer' => false,
        'image' => ['base' => '/assets/img/flete-maritimo-buque-portacontenedores', 'widths' => [640, 1280], 'alt' => 'Buque portacontenedores saliendo de un puerto chino al amanecer, con un remolcador al costado', 'width' => 1280, 'height' => 716],
    ],

    'productos-para-importar-de-china' => [
        'path' => '/importar/productos-para-importar-de-china/',
        'title' => 'Qué productos conviene importar de China',
        'navLabel' => 'Productos para importar',
        'cluster' => 'importar',
        'seoTitle' => 'Productos para importar de China',
        'metaDescription' => 'Cómo elegir productos para importar de China a Paraguay: margen, peso, volumen, restricciones y demanda local, con ejemplos por rubro.',
        'lastReviewed' => '2026-09-24',
        'hero' => [
            'eyebrow' => 'Importar',
            'h1' => 'Qué productos conviene importar de China',
            'lead' => 'Conviene importar de China productos con demanda comprobada en Paraguay, buen valor por metro cúbico, sin permisos previos complicados y con un margen que siga siendo sano después de flete, tributos y gastos. No hay una lista universal: se elige con números.',
        ],
        'intro' => [
            'Los productos que conviene importar de China a Paraguay son los que cumplen cinco condiciones a la vez: se venden en el mercado local, pesan y ocupan poco en relación con su precio, no necesitan registros o permisos difíciles, no tienen problemas de marca y dejan margen después de todos los costos. Una lista de "productos más vendidos" no reemplaza ese análisis.',
            'Esta guía es para emprendedores y comerciantes que buscan qué traer. Explica cómo evaluar un producto paso a paso, los rubros que más se importan con sus trampas propias, y enlaza guías específicas por producto: ropa, zapatillas, celulares, juguetes, telas, repuestos de autos, maquinaria, motos, muebles y papelería.',
        ],
        'steps' => [
            [
                'title' => 'Partir de la demanda local',
                'body' => [
                    'Observe qué se vende en Paraguay, a qué precio y quién lo vende: comercios, redes sociales, marketplaces. Un producto con competencia pero con precios de venta conocidos es más seguro que uno "novedoso" que nadie busca.',
                ],
            ],
            [
                'title' => 'Calcular el valor por metro cúbico y por kilo',
                'body' => [
                    'El flete se cobra por volumen o peso. Un producto chico y de valor medio soporta bien el flete; uno voluminoso y barato (por ejemplo, muebles de bajo precio) puede perder el margen en el transporte. Estime cuántas unidades entran en un metro cúbico y compare el flete por unidad con el precio de venta.',
                ],
            ],
            [
                'title' => 'Consultar la posición arancelaria y los permisos',
                'body' => [
                    'Pida a un despachante la posición arancelaria ([código NCM](/aduana/ncm-nomenclatura-mercosur/)) probable, los tributos y si hay permisos previos. Alimentos, cosméticos, medicamentos, equipos de radio y telecomunicaciones, vehículos y productos para niños suelen tener requisitos adicionales. Un permiso difícil puede hacer inviable un pedido chico.',
                ],
            ],
            [
                'title' => 'Descartar riesgos de marca y de seguridad',
                'body' => [
                    'No importe copias de marcas registradas: la aduana puede retener la mercadería y usted se expone a reclamos. Revise también requisitos de seguridad eléctrica, baterías y materiales en contacto con niños o alimentos.',
                ],
            ],
            [
                'title' => 'Calcular el margen con todos los costos',
                'body' => [
                    'Sume precio FOB, flete, seguro, tributos, despachante, gastos en destino y transporte interno. Divida por las unidades para obtener el costo por unidad puesto en su depósito y compárelo con el precio de venta menos sus costos comerciales. La [calculadora de costo de importación](/herramientas/calculadora-costo-importacion/) ordena estas cuentas.',
                ],
            ],
            [
                'title' => 'Probar con un pedido chico',
                'body' => [
                    'Antes de llenar un contenedor, pruebe con muestras o un pedido reducido, por [contenedor compartido](/importar/contenedor-compartido-desde-china/) o aéreo. Mida cuánto tarda en venderse y qué reclamos aparecen. Recién entonces escale.',
                ],
            ],
        ],
        'table' => [
            'caption' => 'Rubros frecuentes y qué revisar en cada uno',
            'head' => ['Rubro', 'Qué revisar antes de comprar', 'Guía específica'],
            'rows' => [
                ['Ropa', 'Tallas, etiquetado de composición, estacionalidad', 'Importar ropa de China'],
                ['Zapatillas', 'Marcas registradas, numeración, volumen de las cajas', 'Importar zapatillas de China'],
                ['Celulares', 'Homologación, marcas, baterías en el transporte', 'Importar celulares de China'],
                ['Juguetes', 'Normas de seguridad, baterías, edad recomendada', 'Importar juguetes de China'],
                ['Telas', 'Composición, ancho, peso por metro, rollos', 'Importar telas de China'],
                ['Repuestos de autos', 'Códigos OEM, compatibilidad, variedad de piezas', 'Importar repuestos de autos de China'],
                ['Maquinaria', 'Voltaje, repuestos, servicio técnico, peso', 'Importar maquinaria de China'],
                ['Motos', 'Documentación para registro, homologación, armado', 'Importar motos de China'],
                ['Muebles', 'Volumen, daños en tránsito, armado', 'Importar muebles de China'],
                ['Papelería', 'Temporada escolar, plazos de producción', 'Importar papelería de China'],
            ],
            'note' => 'Cada guía por producto está enlazada más abajo, en «Guías por producto».',
        ],
        'sections' => [
            [
                'h2' => 'Guías por producto',
                'body' => [
                    'Si ya tiene un rubro en mente, cada guía explica las trampas propias de ese producto, cómo buscar proveedores y la logística específica: [importar ropa de China](/importar/ropa-de-china/), [importar zapatillas de China](/importar/zapatillas-de-china/), [importar celulares de China](/importar/celulares-de-china/), [importar juguetes de China](/importar/juguetes-de-china/), [importar telas de China](/importar/telas-de-china/), [importar repuestos de autos de China](/importar/repuestos-de-autos-de-china/), [importar maquinaria de China](/importar/maquinaria-de-china/), [importar motos de China](/importar/motos-de-china/), [importar muebles de China](/importar/muebles-de-china/) e [importar papelería de China](/importar/papeleria-de-china/). El proceso general está en la guía sobre [cómo importar de China a Paraguay](/importar/como-importar-de-china-a-paraguay/).',
                    'Si quiere que un agente busque proveedores y compare opciones por usted, el servicio de [agente de compras en China](/servicios/agente-de-compras-china/) lo hace con la especificación que usted defina.',
                ],
            ],
            [
                'h2' => 'Señales de que un producto no conviene',
                'body' => [
                    'Antes de enamorarse de un producto, revise esta lista. Si aparece más de una señal, busque otra opción o haga una prueba muy chica.',
                ],
                'items' => [
                    ['title' => 'El margen depende de un precio de venta optimista', 'text' => 'Si solo funciona vendiendo más caro que la competencia local, no funciona.'],
                    ['title' => 'El flete supera una parte grande del precio', 'text' => 'Típico de productos voluminosos y baratos; un aumento del flete borra la ganancia.'],
                    ['title' => 'Necesita un permiso que nunca tramitó', 'text' => 'El tiempo y el costo del registro pueden superar el valor del primer pedido.'],
                    ['title' => 'Se parece demasiado a una marca conocida', 'text' => 'Riesgo de retención en aduana y de reclamos del titular de la marca.'],
                    ['title' => 'Requiere servicio técnico o garantía', 'text' => 'Sin repuestos y soporte en Paraguay, cada falla es un cliente perdido.'],
                ],
            ],
        ],
        'faq' => [
            ['q' => '¿Cuál es el producto más rentable para importar de China?', 'a' => 'No hay uno solo: depende de su canal de venta, su capital y la competencia. El más rentable es el que usted puede vender con margen después de calcular todos los costos.'],
            ['q' => '¿Qué productos no conviene importar de China?', 'a' => 'Los que requieren permisos que no puede obtener, las copias de marcas, y los productos muy voluminosos de bajo precio, cuyo flete se come el margen.'],
            ['q' => '¿Cuánto necesito para una primera importación de prueba?', 'a' => 'Lo define el pedido mínimo del proveedor más flete y gastos. Calcúlelo con la [calculadora de costo de importación](/herramientas/calculadora-costo-importacion/) antes de comprometer dinero.'],
            ['q' => '¿Puedo importar varios productos distintos en un mismo envío?', 'a' => 'Sí, en un contenedor compartido o completo. Cada producto tiene su propia posición arancelaria en el despacho.'],
        ],
        'relatedService' => 'agente-de-compras-china',
        'toolLink' => [
            'path' => '/herramientas/calculadora-costo-importacion/',
            'label' => 'Calculadora de costo de importación',
            'text' => 'Calcule el costo por unidad puesto en Paraguay y compárelo con el precio de venta.',
        ],
        'related' => ['como-importar-de-china-a-paraguay', 'proveedores-chinos-confiables', 'ncm-nomenclatura-mercosur'],
        'affiliates' => [],
        'disclaimer' => false,
        'image' => null,
    ],

    'pagar-a-proveedores-chinos' => [
        'path' => '/importar/pagar-a-proveedores-chinos/',
        'title' => 'Cómo pagar a proveedores chinos desde Paraguay',
        'navLabel' => 'Pagar a proveedores chinos',
        'cluster' => 'importar',
        'seoTitle' => 'Cómo pagar a proveedores chinos',
        'metaDescription' => 'Formas de pagar a un proveedor chino desde Paraguay: transferencia bancaria, Alibaba Trade Assurance, Wise y otras, con costos y riesgos.',
        'lastReviewed' => '2026-09-24',
        'hero' => [
            'eyebrow' => 'Importar',
            'h1' => 'Cómo pagar a proveedores chinos desde Paraguay',
            'lead' => 'Desde Paraguay se paga a proveedores chinos por transferencia bancaria internacional, por Alibaba con Trade Assurance o, si su perfil lo permite, por plataformas como Wise o Payoneer. Sea cual sea la vía, pague por etapas, siempre a una cuenta a nombre de la empresa del contrato, y nunca el 100 % por adelantado a un proveedor nuevo.',
        ],
        'intro' => [
            'Para pagar a un proveedor chino desde Paraguay tiene tres caminos principales: la transferencia bancaria internacional (SWIFT) desde su banco, el pago dentro de Alibaba.com con Trade Assurance, y, según su perfil y el del proveedor, servicios de transferencia como Wise o Payoneer. Cada uno tiene costos, plazos y niveles de protección distintos, y ninguno lo protege si paga a la persona equivocada o paga todo antes de ver la mercadería.',
            'Esta guía es para importadores que van a pagar pedidos comerciales. Explica cómo estructurar el pago, cómo funciona cada medio, qué verificar antes de transferir y cuáles son las estafas más frecuentes. No indicamos comisiones ni tipos de cambio porque cambian: pida el costo total a su banco o plataforma antes de cada pago.',
        ],
        'steps' => [
            [
                'title' => 'Acordar el esquema de pago en la proforma',
                'body' => [
                    'Lo habitual es un anticipo para iniciar la producción y el saldo antes del embarque, contra inspección aprobada, o contra copia del conocimiento de embarque. El porcentaje de anticipo se negocia; lo importante es que quede un saldo que le dé poder de reclamo.',
                    'Nunca pague el 100 % por adelantado a un proveedor nuevo. Con proveedores de años y buen historial, las condiciones pueden flexibilizarse.',
                ],
            ],
            [
                'title' => 'Verificar la cuenta del beneficiario',
                'body' => [
                    'El titular de la cuenta debe ser la misma empresa que figura en la proforma y en la licencia comercial (vea cómo verificarla en la guía de [proveedores chinos confiables](/importar/proveedores-chinos-confiables/)). Desconfíe de pedidos de pago a cuentas personales, a empresas con otro nombre o en otro país. Si recibe un aviso de cambio de cuenta, confírmelo por teléfono o videollamada con su contacto habitual antes de pagar.',
                ],
            ],
            [
                'title' => 'Elegir el medio de pago',
                'body' => [
                    'Transferencia bancaria internacional: la vía clásica para montos grandes. Su banco le informa comisiones, bancos corresponsales y el tipo de cambio; pida el comprobante SWIFT para rastrear el pago. Debe coincidir con los datos de la factura para el despacho.',
                    'Alibaba Trade Assurance: si el proveedor está en [Alibaba.com](/comprar/alibaba-paraguay/) y usted paga por la plataforma, el pedido queda cubierto por el mecanismo de reclamo de Alibaba si el proveedor no envía a tiempo o la calidad no coincide con lo pactado en el pedido. Según las condiciones que publica Alibaba, solo cubre pedidos pagados dentro de la plataforma, a la cuenta que ella indica, no transferencias por fuera.',
                    'Wise y Payoneer: plataformas de pagos internacionales que muestran el costo antes de confirmar. Que pueda usarlas desde Paraguay para pagar a China depende de su perfil, de la moneda y del tipo de cuenta del proveedor: confírmelo en el sitio de cada plataforma antes de contar con ellas.',
                    'Carta de crédito: el banco paga al proveedor solo contra la presentación de los documentos pactados. Da mucha seguridad, pero tiene costos y trámites que la hacen poco práctica para pedidos chicos.',
                ],
            ],
            [
                'title' => 'Pagar el anticipo y guardar el comprobante',
                'body' => [
                    'Haga el anticipo, envíe el comprobante al proveedor y pida confirmación de recepción e inicio de producción con fecha estimada. Archive todo junto con la proforma: el despachante y su contador lo van a necesitar.',
                ],
            ],
            [
                'title' => 'Pagar el saldo solo con evidencia',
                'body' => [
                    'Antes del saldo, pida el informe de inspección o, al menos, fotos y video de la producción terminada y embalada, y copia de los documentos de embarque. El servicio de [inspección de calidad](/servicios/inspeccion-de-calidad/) coordina un inspector independiente para que usted pague el saldo con información verificada.',
                ],
            ],
        ],
        'table' => [
            'caption' => 'Medios para pagar a proveedores chinos',
            'head' => ['Medio', 'Ventaja', 'Riesgo o límite'],
            'rows' => [
                ['Transferencia bancaria (SWIFT)', 'Acepta montos grandes, trazable, documento válido para el despacho', 'Sin protección si el proveedor no cumple; comisiones de corresponsales'],
                ['Alibaba Trade Assurance', 'Mecanismo de reclamo de la plataforma', 'Solo para pagos dentro de Alibaba y según lo pactado en el pedido'],
                ['Wise', 'Costo informado antes de enviar', 'Límites y requisitos según perfil y país'],
                ['Payoneer', 'Cuenta para pagar y cobrar en dólares', 'No todos los proveedores la aceptan; revise condiciones'],
                ['Carta de crédito', 'El banco paga contra documentos', 'Costosa y compleja para montos chicos'],
                ['Efectivo o cuentas personales', 'Ninguna', 'Sin respaldo ni trazabilidad; evítelo'],
            ],
            'note' => 'Las comisiones y tipos de cambio varían. Pida el costo total a su banco o plataforma antes de pagar.',
        ],
        'sections' => [
            [
                'h2' => 'Estafas de pago más frecuentes',
                'body' => [],
                'items' => [
                    ['title' => 'Cambio de cuenta bancaria', 'text' => 'Un correo que imita al proveedor pide pagar a una cuenta nueva. Confirme siempre por otro canal.'],
                    ['title' => 'Descuento por pagar fuera de la plataforma', 'text' => 'Si compra en Alibaba y paga por fuera, pierde la cobertura de Trade Assurance.'],
                    ['title' => 'Urgencia artificial', 'text' => 'El precio "solo vale hoy" para que pague sin verificar.'],
                    ['title' => 'Pago total por adelantado', 'text' => 'Sin saldo pendiente no hay forma de exigir calidad ni plazos.'],
                ],
            ],
        ],
        'faq' => [
            ['q' => '¿Cuál es la forma más segura de pagar a un proveedor chino?', 'a' => 'Pagar por etapas a una cuenta de la empresa verificada, con el saldo contra inspección. Si el proveedor está en Alibaba, pagar dentro de la plataforma con Trade Assurance agrega un mecanismo de reclamo.'],
            ['q' => '¿Puedo pagar con tarjeta de crédito?', 'a' => 'Algunas plataformas lo permiten para montos chicos o muestras. Para pedidos de volumen, lo habitual es la transferencia.'],
            ['q' => '¿Wise sirve para pagar a China desde Paraguay?', 'a' => 'Puede servir o no según su perfil y el tipo de cuenta del proveedor. Confirme en el sitio de Wise si el envío a China en la moneda que necesita está disponible para usted antes de acordarlo con el proveedor.'],
            ['q' => '¿Qué porcentaje de anticipo es normal?', 'a' => 'Se negocia con cada proveedor. Lo importante es que quede un saldo significativo hasta la inspección o el embarque.'],
            ['q' => '¿El comprobante de pago sirve para la aduana?', 'a' => 'El [despachante de aduana](/aduana/despachantes-de-aduana-paraguay/) puede pedirlo para respaldar el valor declarado. Guárdelo junto con la factura.'],
        ],
        'relatedService' => 'agente-de-compras-china',
        'toolLink' => null,
        'related' => ['proveedores-chinos-confiables', 'alibaba-paraguay', 'como-importar-de-china-a-paraguay'],
        'affiliates' => ['wise', 'payoneer'],
        'disclaimer' => false,
        'image' => null,
    ],

    'importadoras-en-paraguay' => [
        'path' => '/importar/importadoras-en-paraguay/',
        'title' => 'Importadoras en Paraguay: cuándo usar una',
        'navLabel' => 'Importadoras en Paraguay',
        'cluster' => 'importar',
        'seoTitle' => 'Importadoras en Paraguay: cuándo conviene',
        'metaDescription' => 'Qué hace una importadora en Paraguay, cuándo conviene contratar una en lugar de importar a su nombre y qué preguntar antes de firmar.',
        'lastReviewed' => '2026-09-24',
        'hero' => [
            'eyebrow' => 'Importar',
            'h1' => 'Importadoras en Paraguay: cuándo usar una',
            'lead' => 'Las importadoras en Paraguay traen mercadería a su propio nombre y se la venden o entregan a usted, así que no necesita estar registrado como importador. Conviene para probar un producto o importar pocas veces; si importa seguido, suele ser más barato y controlable hacerlo con su propio RUC.',
        ],
        'intro' => [
            'Una importadora en Paraguay es una empresa habilitada como importador que compra o nacionaliza mercadería por cuenta de clientes. Usted le dice qué quiere traer, y ella figura como importador ante la aduana, paga los tributos y le entrega la mercadería con su factura. A cambio cobra una comisión o un margen.',
            'Esta guía es para quien duda entre usar una importadora o importar bajo su propio RUC. Explica qué hace una importadora, cuándo conviene cada opción, qué preguntar antes de contratar y qué alternativas hay, como la importación llave en mano a su nombre.',
            'La diferencia de fondo es quién figura como importador ante la aduana. Eso define a nombre de quién quedan los tributos pagados, quién responde por lo declarado y qué factura recibe usted. Tenga esa pregunta presente al leer cada propuesta.',
        ],
        'steps' => [
            [
                'title' => 'Entender qué hace una importadora',
                'body' => [
                    'Según el contrato, una importadora puede comprar la mercadería y revendérsela (usted le compra a ella en Paraguay), o importar siguiendo sus instrucciones (usted elige proveedor y producto, y ella actúa como importador formal). En ambos casos, ante la aduana el importador es la importadora. Cómo se documenta cada modelo y qué pasa con el IVA y el crédito fiscal lo define su contador.',
                    'Algunas ofrecen también búsqueda de proveedores, flete y despacho; otras solo prestan la habilitación. Pregunte qué incluye exactamente.',
                ],
            ],
            [
                'title' => 'Decidir si le conviene',
                'body' => [
                    'Una importadora tiene sentido si todavía no tiene RUC o [habilitación como importador](/importar/como-ser-importador-paraguay/), si quiere probar un producto antes de invertir en el registro, o si importa muy pocas veces al año.',
                    'Importar a su nombre conviene si va a importar con regularidad, si quiere tener a su nombre los comprobantes del IVA pagado en la importación, o si quiere controlar proveedor, flete y costos. Consulte el tratamiento tributario de cada opción con su contador.',
                ],
            ],
            [
                'title' => 'Pedir una propuesta por escrito',
                'body' => [
                    'Pida que la propuesta detalle: qué modelo usa (reventa o importación según sus instrucciones), qué costos incluye y cuáles se facturan aparte, cómo calcula su comisión, qué factura le emitirá, quién responde si la mercadería llega dañada o distinta, y en qué plazo entrega.',
                ],
            ],
            [
                'title' => 'Verificar a la importadora',
                'body' => [
                    'Confirme que tenga RUC activo y habilitación como importador, pida referencias de clientes y verifique su trayectoria. Desconfíe de quien pide el 100 % por adelantado sin contrato o no puede mostrarle los documentos de despachos anteriores.',
                ],
            ],
            [
                'title' => 'Planificar el paso a importar a su nombre',
                'body' => [
                    'Si la primera operación funciona, calcule cuánto pagó de comisión y compárelo con el costo de habilitarse. Muchos importadores empiezan con una importadora y luego pasan a importar con su propio RUC. La guía sobre [cómo ser importador en Paraguay](/importar/como-ser-importador-paraguay/) explica ese paso.',
                ],
            ],
        ],
        'table' => [
            'caption' => 'Importadora, importación a su nombre o llave en mano',
            'head' => ['Opción', 'Quién figura como importador', 'Conviene cuando'],
            'rows' => [
                ['Importadora (reventa)', 'La importadora', 'Quiere comprar en Paraguay sin gestionar nada'],
                ['Importadora (según sus instrucciones)', 'La importadora', 'Eligió producto y proveedor pero no está habilitado'],
                ['Importación a su nombre, por su cuenta', 'Usted', 'Importa seguido y ya conoce el circuito'],
                ['Importación llave en mano a su nombre', 'Usted', 'Está habilitado y quiere delegar la coordinación'],
            ],
            'note' => 'El tratamiento tributario de cada opción depende de su situación; consúltelo con su contador.',
        ],
        'sections' => [
            [
                'h2' => 'La alternativa: importación llave en mano',
                'body' => [
                    'Si ya tiene RUC y habilitación, o está dispuesto a obtenerlos, la [importación llave en mano](/servicios/importacion-llave-en-mano/) coordina todo el proceso a su nombre: búsqueda y verificación del proveedor con un [agente de compras en China](/servicios/agente-de-compras-china/), inspección, flete, seguro y despacho con despachantes matriculados. Usted conserva la mercadería y los documentos a su nombre y tiene un solo punto de contacto.',
                    'Nosotros no somos una importadora ni un despachante: coordinamos con profesionales independientes que ejecutan cada parte y seguimos el proceso con usted.',
                ],
            ],
            [
                'h2' => 'Preguntas que conviene hacer antes de contratar',
                'body' => [
                    'Una buena importadora responde estas preguntas por escrito y sin rodeos. Si alguna respuesta es vaga, pídala de nuevo o busque otra opción.',
                ],
                'items' => [
                    ['title' => '¿Qué costos incluye su propuesta?', 'text' => 'Mercadería, flete, seguro, tributos, despachante, gastos en destino y transporte interno, uno por uno.'],
                    ['title' => '¿Cómo se calcula su comisión?', 'text' => 'Sobre qué valor y en qué momento se cobra.'],
                    ['title' => '¿Qué factura me emite?', 'text' => 'Define si puede usar el crédito fiscal y cómo registra la compra su contador.'],
                    ['title' => '¿Quién elige al proveedor y quién lo verifica?', 'text' => 'Si lo elige usted, la responsabilidad por la calidad suele quedar de su lado.'],
                    ['title' => '¿Qué pasa si la carga llega dañada o incompleta?', 'text' => 'Seguro, reclamos al proveedor y plazos de respuesta.'],
                ],
            ],
        ],
        'faq' => [
            ['q' => '¿Cuánto cobra una importadora en Paraguay?', 'a' => 'Cada importadora fija su comisión o margen. Pida la propuesta por escrito con todos los costos incluidos y compárela con el costo de importar a su nombre.'],
            ['q' => '¿Puedo usar una importadora sin RUC?', 'a' => 'Si la importadora le revende la mercadería, puede comprarle como cualquier cliente. Para usar la mercadería en un negocio formal, igual necesitará facturas a su nombre.'],
            ['q' => '¿La importadora se hace cargo si la mercadería llega mal?', 'a' => 'Depende del contrato. Por eso la responsabilidad por daños y diferencias debe quedar por escrito antes de pagar.'],
            ['q' => '¿Es mejor una importadora o un despachante?', 'a' => 'Cumplen funciones distintas: el despachante tramita el despacho a nombre de un importador; la importadora es el importador. Si usted está habilitado, le basta un [despachante de aduana](/aduana/despachantes-de-aduana-paraguay/).'],
            ['q' => '¿Ustedes son una importadora?', 'a' => 'No. Coordinamos importaciones a su nombre con agentes, transitarios y despachantes matriculados que ejecutan cada parte.'],
        ],
        'relatedService' => 'importacion-llave-en-mano',
        'toolLink' => [
            'path' => '/herramientas/calculadora-costo-importacion/',
            'label' => 'Calculadora de costo de importación',
            'text' => 'Compare el costo de importar a su nombre con la propuesta de una importadora.',
        ],
        'related' => ['como-ser-importador-paraguay', 'como-importar-de-china-a-paraguay', 'despachantes-de-aduana-paraguay'],
        'affiliates' => [],
        'disclaimer' => false,
        'image' => null,
    ],

];

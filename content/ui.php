<?php
/**
 * Every UI string on the site, in one file — the single-locale layer. Nothing
 * in partials/ or templates/ contains a visible word; they all read from here,
 * so translating the site is this one file plus content/*.
 *
 * The strings below are neutral Spanish (formal "usted"), matching the 'py'
 * market the example content uses. A Swedish site rewrites this file in
 * Swedish and sets 'market' => 'se' in content/site.php; no code changes.
 *
 * Nothing here may name a month, a year, a price or a client: strings must stay
 * true without anyone remembering to edit them.
 */

declare(strict_types=1);

return [

    // Cluster labels, in the order the mega-menu and the services hub use them.
    // A cluster key is referenced by every service record ('cluster' => ...).
    'clusters' => [
        'principal'  => 'Servicios principales',
        'adicional'  => 'Servicios adicionales',
    ],

    // One line under each cluster heading on the services hub. Keyed by cluster id.
    'cluster_leads' => [
        'principal' => 'Lo que hacemos todos los meses para la mayoría de nuestros clientes.',
        'adicional' => 'Trabajos puntuales que se contratan cuando hacen falta.',
    ],

    'nav' => [
        'home'         => 'Inicio',
        'services'     => 'Servicios',
        'pricing'      => 'Precios',
        'tools'        => 'Herramientas',
        'guides'       => 'Guías',
        'about'        => 'Nosotros',
        'blog'         => 'Blog',
        'contact'      => 'Contacto',
        'privacy'      => 'Privacidad',
        'terms'        => 'Términos',
        'menu'         => 'Menú',
        'close'        => 'Cerrar',
        'open_menu'    => 'Abrir el menú',
        'close_menu'   => 'Cerrar el menú',
        'skip'         => 'Ir al contenido principal',
        'firm'         => 'La empresa',
        'all_services' => 'Ver todos los servicios',
    ],

    'cta' => [
        'quote'         => 'Pedir presupuesto',
        'whatsapp'      => 'WhatsApp',
        'whatsapp_long' => 'Escribir por WhatsApp',
        'consult'       => 'Solicitar una consulta',
        'contact'       => 'Contactar',
        'see_included'  => 'Ver qué incluye',
        'talk'          => 'Hablar con nosotros',
    ],

    // The WhatsApp menu. These are BUTTON LABELS only — the message that
    // actually reaches WhatsApp always comes from content/lead-values.php and
    // names a service, never a generic "consulta gratis".
    'whatsapp' => [
        'menu_title' => '¿Sobre qué quiere escribirnos?',
        'menu_note'  => 'Abrimos WhatsApp con el mensaje ya escrito. Puede cambiarlo antes de enviarlo.',
        'other'      => 'Otra consulta',
        'this_page'  => 'Lo que está viendo',
        'open_menu'  => 'Abrir opciones de WhatsApp',
        'close_menu' => 'Cerrar',
    ],

    'home' => [
        'eyebrow'   => 'Tomamos nuevos clientes',
        'h1_lead'   => 'El titular de la portada va acá, ',
        'h1_accent' => 'con la promesa al final.',
        'lead'      => 'Una o dos líneas que explican qué hace el negocio, para quién y qué '
                     . 'gana el cliente. Sin adjetivos que no se puedan sostener.',

        'services_eyebrow' => 'Servicios',
        'services_title'   => 'Lo que hacemos',
        'services_lead'    => 'Contrate lo que necesita hoy y sume servicios cuando haga falta.',

        'unsure_title' => '¿No sabe qué necesita?',
        'unsure_text'  => 'Cuéntenos su situación y le decimos qué corresponde, sin costo.',
    ],

    // The panel at the foot of the homepage hero. Labels only: no amounts, no
    // dates, no percentages, no client name — see partials/status-panel.php.
    'panel' => [
        'title' => 'Su trabajo del mes, a la vista',
        'badge' => 'Al día',
        'tiles' => [
            ['label' => 'Primer entregable',  'value' => 'Listo'],
            ['label' => 'Segundo entregable', 'value' => 'Listo'],
            ['label' => 'Tercer entregable',  'value' => 'En curso'],
        ],
        'foot'  => 'Próximo paso acordado',
        'note'  => 'Ejemplo del informe mensual',
    ],

    // The "quiénes somos" band on the homepage. Every line here is a commitment
    // about how the business works, never a claim about size or results — those
    // need the owner's confirmation and belong in content/site.php.
    'about' => [
        'eyebrow' => 'Quiénes somos',
        'title'   => 'Una frase sobre cómo trabajamos y en qué se nota.',
        'text'    => 'Dos o tres oraciones sobre el equipo, el proceso y el tipo de cliente que '
                   . 'atiende. Concreto y verificable: qué hace, con qué frecuencia y qué recibe '
                   . 'el cliente.',
        // Shown while content/site.php has no credentials[] of its own.
        'credentials' => [
            'Una persona asignada a su cuenta, no una mesa de entrada',
            'Alcance y precio acordados por escrito antes de empezar',
            'Respuesta dentro del siguiente día hábil',
        ],
        'badge_note'     => 'de experiencia',
        'badge_fallback' => 'Equipo propio',
    ],

    // The four-step "cómo trabajamos" block, reused on service pages.
    'process' => [
        'eyebrow' => 'Cómo trabajamos',
        'title'   => 'De la primera conversación al primer entregable, con fechas acordadas.',
        'steps'   => [
            [
                'title' => 'Conversación inicial',
                'text'  => 'Media hora para entender qué necesita y en qué situación está hoy.',
            ],
            [
                'title' => 'Propuesta por escrito',
                'text'  => 'Alcance detallado y precio, con lo que está incluido y lo que no.',
            ],
            [
                'title' => 'Puesta en marcha',
                'text'  => 'Recibimos la información, ordenamos lo pendiente y arrancamos.',
            ],
            [
                'title' => 'Seguimiento',
                'text'  => 'Una persona asignada y un informe en lenguaje claro.',
            ],
        ],
    ],

    // Rendered in place of the testimonials band while content/site.php has
    // none. Sectors, not clients: nothing to verify.
    'industries' => [
        'eyebrow' => 'Rubros',
        'title'   => 'Rubros que atendemos',
        'lead'    => 'Cada rubro tiene sus propias trampas. Estos son los que trabajamos.',
        // Each item is either a plain string or ['label' => ..., 'path' => ...]
        // pointing at a segment page in content/segmentos.php.
        'items'   => [
            ['label' => 'Rubro de ejemplo', 'path' => '/segmentos/rubro-ejemplo/'],
        ],
    ],

    // The band renders only when content/site.php has testimonials.
    'testimonials' => [
        'eyebrow' => 'Casos',
        'title'   => 'Lo que dicen nuestros clientes',
    ],

    'services_hub' => [
        'eyebrow'      => 'Servicios',
        'title'        => 'Todo lo que hacemos, en un solo lugar.',
        'lead'         => 'Contrate lo que necesita hoy y sume servicios cuando haga falta.',
        'unsure_title' => '¿No sabe qué necesita?',
        'unsure_text'  => 'Cuéntenos su caso y le decimos qué servicios le corresponden.',
        'unsure_cta'   => 'Escribirnos',
    ],

    'cta_band' => [
        'eyebrow' => 'Solicitar consulta',
        'title'   => 'Empecemos con una conversación de 30 minutos.',
        'lead'    => 'Sin costo y sin compromiso. Le respondemos con una propuesta concreta.',
    ],

    'form' => [
        'legend'          => 'Solicitar una consulta',
        'name'            => 'Nombre',
        'company'         => 'Empresa o rubro',
        'phone'           => 'WhatsApp o teléfono',
        'phone_hint'      => 'Ej.: 0981 123 456',
        'email'           => 'Correo (opcional)',
        'need'            => '¿Qué necesita?',
        'message'         => 'Cuéntenos brevemente',
        'message_hint'    => 'Su situación actual, en dos líneas…',
        'submit'          => 'Solicitar una consulta',
        'sending'         => 'Enviando…',
        'privacy_note'    => 'Usamos sus datos solo para responderle. Ver la política de privacidad.',
        'success_title'   => 'Recibimos su consulta.',
        'success_text'    => 'Le respondemos dentro del siguiente día hábil. Si prefiere, escríbanos ahora.',
        'error_title'     => 'No pudimos enviar el formulario.',
        'error_text'      => 'Vuelva a intentarlo en un momento o escríbanos directamente.',
        'error_phone'     => 'Necesitamos un teléfono o WhatsApp válido para responderle.',
        'required'        => 'obligatorio',
        'thanks_next'     => 'Qué sigue',
        'thanks_whatsapp' => 'Si prefiere no esperar, escríbanos ahora por WhatsApp.',
        'remind_title'    => 'Que le avisemos antes de cada vencimiento',
        'remind_text'     => 'Le anotamos su caso y le escribimos por WhatsApp unos días antes.',
        'remind_phone'    => 'Su WhatsApp',
        'remind_submit'   => 'Quiero que me recuerden',
        'remind_ok'       => 'Anotado. Le escribimos antes del próximo vencimiento.',
    ],

    // The chip selector in the lead form. Every key here needs a matching entry
    // in content/lead-values.php's 'needs' — verify.sh checks that.
    'needs' => [
        'servicio' => 'Un servicio puntual',
        'mensual'  => 'Trabajo mensual',
        'otro'     => 'Otro',
    ],

    'contact' => [
        'eyebrow' => 'Contacto',
        'title'   => 'Hablemos de su caso.',
        'lead'    => 'Escríbanos por WhatsApp o déjenos sus datos y le respondemos dentro '
                   . 'del siguiente día hábil.',
        'address' => 'Dirección',
        'hours'   => 'Horario',
        'phone'   => 'Teléfono',
        'email'   => 'Correo',
        'expect'  => 'Qué pasa después',
        'steps'   => [
            'Le respondemos dentro del siguiente día hábil.',
            'Coordinamos una llamada de 30 minutos, sin costo ni compromiso.',
            'Recibe una propuesta con el alcance y el precio por escrito.',
        ],
    ],

    'service' => [
        'includes'     => 'Qué incluye',
        'excludes'     => 'Qué no incluye',
        'we_need'      => 'Qué necesitamos de usted',
        'benefits'     => 'Beneficios',
        'faq'          => 'Preguntas frecuentes',
        'related'      => 'Servicios relacionados',
        'guides'       => 'Guía relacionada',
        'articles'     => 'Artículo relacionado',
        'form_eyebrow' => 'Presupuesto',
        'form_lead'    => 'Déjenos sus datos y le respondemos con una propuesta concreta, '
                        . 'sin costo y sin compromiso.',
        'breadcrumb'   => 'Ruta de navegación',
    ],

    // Segment landing pages (content/segmentos.php).
    'segment' => [
        'traps_title'  => 'Los errores que más le cuestan en su rubro',
        'bundle_title' => 'Lo que armamos para su rubro',
        'form_eyebrow' => 'Presupuesto para su rubro',
        'form_lead'    => 'Cuéntenos su rubro y su volumen; le respondemos con una propuesta concreta.',
    ],

    // Shared microcopy across the tool pages. Calculator-specific labels live in
    // each tool's own PHP/JS; only the repeated strings are here.
    'tools' => [
        'reviewed_prefix' => 'Datos revisados el',
        'orientativo'     => 'Los resultados son orientativos y no reemplazan un cálculo oficial.',
        'calculate'       => 'Calcular',
        'result_title'    => 'Resultado',
        'use_result'      => 'Usar este resultado en el formulario',
        'need_js'         => 'Esta calculadora necesita JavaScript activado en su navegador.',
        'restart'         => 'Volver a empezar',
    ],

    // Shared microcopy across the guide pages.
    'guide' => [
        'reviewed_prefix'       => 'Revisado el',
        'orientativo'           => 'Es una guía general: para su caso puntual, confírmelo con nosotros.',
        'delegate_eyebrow'      => 'Delegarlo',
        'delegate_title'        => '¿Prefiere que lo hagamos nosotros?',
        'delegate_lead'         => 'Le respondemos dentro del siguiente día hábil con los pasos exactos '
                                 . 'para su caso.',
        'delegate_form_heading' => 'Pedir que nos encarguemos',
        'related'               => 'Otras guías',
    ],

    // Article chrome (templates/article.php). The long date itself is formatted
    // by the market module's fmt_date_long().
    'article' => [
        'reading_time' => 'min de lectura',
        'updated'      => 'Actualizado el',
        'read_more'    => 'Leer el artículo',
    ],

    // Hub pages: the listings under /servicios/, /blog/, /herramientas/, /guias/.
    'hub' => [
        'empty' => 'Todavía no hay nada publicado en esta sección.',
    ],

    'pricing' => [
        'quote'    => 'A cotizar',
        'per_month' => 'por mes',
        'cta'      => 'Pedir presupuesto',
        'note'     => 'Los planes se ajustan al volumen real; el precio final se acuerda por escrito.',
    ],

    'placeholder' => [
        // Shown on a stub page until the phase that owns it writes the content.
        'notice' => 'Estamos preparando esta página.',
        'action' => 'Mientras tanto, escríbanos y le respondemos por WhatsApp.',
    ],

    'error404' => [
        'title' => 'No encontramos esta página',
        'lead'  => 'Puede que el enlace haya cambiado. Estas son las secciones más buscadas.',
    ],

    'footer' => [
        'blurb'   => 'Una línea sobre el negocio y a quién atiende.',
        'rights'  => 'Todos los derechos reservados.',
        'contact' => 'Contacto',
    ],
];

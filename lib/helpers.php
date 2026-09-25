<?php
/**
 * Escaping, URL and formatting helpers. Every value that reaches the page goes
 * through e().
 */

declare(strict_types=1);

/** Internal "[text](/path/)" or external "[text](https://…)" link syntax in body copy. */
const RICH_LINK_PATTERN = '~\\[([^\\]\\[]+)\\]\\((/[a-z0-9\\-/#]*|https?://[^\\s()<>\\[\\]]+)\\)~i';

/**
 * Escape for HTML text and attribute context.
 */
function e(?string $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

/**
 * The site origin without a trailing slash. Falls back to the current request
 * host so local preview and the staging subdomain work with no config.php.
 */
function site_origin(): string
{
    $configured = cfg('SITE_URL');
    if ($configured !== null) {
        return rtrim($configured, '/');
    }

    $https  = ($_SERVER['HTTPS'] ?? '') === 'on' || ($_SERVER['SERVER_PORT'] ?? '') === '443';
    $host   = $_SERVER['HTTP_HOST'] ?? (string) site('domain');

    /* On the production domain the origin is fixed even without config.php
       (a Git deploy ships none): canonical, OG and sitemap URLs must never
       say http:// or www. just because a request arrived that way. */
    $domain = strtolower((string) site('domain'));
    if ($domain !== '' && in_array(strtolower($host), [$domain, 'www.' . $domain], true)) {
        return 'https://' . $domain;
    }

    return ($https ? 'https://' : 'http://') . $host;
}

/**
 * Absolute URL for a site-root-relative path. Used for canonical, OG and the
 * sitemap; in-page links use the bare path.
 */
function url(string $path = '/'): string
{
    return site_origin() . '/' . ltrim($path, '/');
}

/**
 * Asset path with a cache-busting stamp taken from the file's mtime, so a
 * changed CSS or JS file is picked up without touching the filename.
 */
function asset(string $path): string
{
    $path = '/' . ltrim($path, '/');
    $file = ROOT_DIR . $path;

    return is_file($file) ? $path . '?v=' . filemtime($file) : $path;
}

/**
 * Business facts from content/site.php. A value the owner has not supplied yet
 * is null, and every partial hides rather than inventing one.
 */
function site(?string $key = null)
{
    $site = content('site');

    return $key === null ? $site : ($site[$key] ?? null);
}

/**
 * A UI string from content/ui.php — every visible label on the site lives
 * there, so a new site translates it once. Dot notation reaches into nested
 * groups: ui('form.submit').
 *
 * A second language is an additive file (content/ui.<lang>.php) plus a page
 * that selects it; nothing in this function has to change to allow that.
 */
function ui(string $key, string $default = ''): string
{
    $value = content('ui');
    foreach (explode('.', $key) as $segment) {
        if (!is_array($value) || !array_key_exists($segment, $value)) {
            return $default;
        }
        $value = $value[$segment];
    }

    return is_string($value) ? $value : $default;
}

/**
 * All services keyed by slug, or one service record.
 */
function services(?string $slug = null): ?array
{
    $services = content('services');

    return $slug === null ? $services : ($services[$slug] ?? null);
}

/**
 * Path of the services hub — '/servicios/' unless content/site.php sets
 * 'servicesHub' (e.g. '/productos/' for a store). The hub's route directory
 * must match: move servicios/index.php to the new path.
 */
function services_hub_path(): string
{
    $hub = site('servicesHub');

    return is_string($hub) && $hub !== '' ? $hub : '/servicios/';
}

/**
 * A static page record from content/pages.php, keyed by path.
 */
function page_meta(string $path): array
{
    return content('pages')[$path] ?? [];
}

/**
 * Cluster labels keyed by cluster id, in menu order.
 */
function clusters(): array
{
    return content('ui')['clusters'];
}

/**
 * The header/footer link trees from content/nav.php.
 */
function nav(?string $key = null)
{
    $nav = content('nav');

    return $key === null ? $nav : ($nav[$key] ?? []);
}

/**
 * Digits-only phone, suitable for wa.me and tel:.
 */
function phone_digits(?string $phone): string
{
    return preg_replace('/\D+/', '', (string) $phone) ?? '';
}

/**
 * wa.me deep link with a prefilled message, or null when no WhatsApp number is
 * configured yet. Callers fall back to /contacto/.
 */
function whatsapp_link(?string $text = null): ?string
{
    $number = phone_digits(site('whatsapp'));
    if ($number === '') {
        return null;
    }

    $link = 'https://wa.me/' . $number;
    if ($text !== null && $text !== '') {
        $link .= '?text=' . rawurlencode($text);
    }

    return $link;
}

/**
 * Where the primary "contact us" action points: WhatsApp when a number exists,
 * the contact page until then.
 */
function contact_link(?string $text = null): string
{
    return whatsapp_link($text) ?? '/contacto/';
}

/**
 * True when $path is the page currently being rendered — used for aria-current
 * in the nav.
 */
function is_current(string $path, string $currentPath): bool
{
    return rtrim($path, '/') === rtrim($currentPath, '/');
}

/* ------------------------------------------------------------------ leads --
   The lead value model. content/lead-values.php is the single source for tiers,
   Ads conversion values, WhatsApp prefills and thank-you text; nothing below
   hardcodes any of them. */

/**
 * One resolved lead-value record for a service or tool slug, or the neutral
 * default when the slug is unknown (an article, a legal page, /nosotros/).
 *
 * Service and tool slugs share one namespace here — they do not collide, and a
 * caller that only knows "the page's slug" should not have to know which kind
 * of page it is looking at.
 */
function lead_value(?string $slug = null): array
{
    $model = content('lead-values');

    $record = $model['services'][$slug ?? ''] ?? $model['tools'][$slug ?? ''] ?? null;
    if ($record === null) {
        return $model['default'] + ['slug' => null];
    }

    return $record + ['slug' => $slug];
}

/**
 * The record a "¿Qué necesita?" chip maps to: a /contacto/ or homepage lead has
 * no service page behind it, so it takes the tier of its chip and borrows that
 * chip's service copy.
 */
function lead_value_for_need(string $need): array
{
    $model = content('lead-values');
    $chip  = $model['needs'][$need] ?? null;

    if ($chip === null) {
        return lead_value(null);
    }

    $record = $chip['service'] !== null ? lead_value($chip['service']) : $model['default'] + ['slug' => null];

    /* The chip's own tier and tag win — the chip is what the visitor told us. */
    return ['tier' => $chip['tier'], 'crmTag' => $chip['crmTag'], 'need' => $need] + $record;
}

/**
 * The Google Ads conversion value for a tier, in guaraníes. An optimisation
 * proxy, not a revenue estimate.
 */
function lead_tier_value(string $tier): int
{
    return (int) (content('lead-values')['tierValues'][$tier] ?? 0);
}

/**
 * The human label for a `need` key: a form chip first, then the extra labels in
 * content/lead-values.php for needs with no chip of their own.
 */
function lead_need_label(string $need): string
{
    return ui('needs.' . $need)
        ?: (string) (content('lead-values')['needLabels'][$need] ?? $need);
}

/**
 * The lead source slug of the page being rendered, or null when it has none.
 *
 * A page may name itself with $page['leadSlug'] (templates/service.php,
 * templates/tool.php and templates/article.php do); otherwise its path is
 * matched against the service and tool records, so a route joins the model by
 * existing rather than by being registered twice.
 */
function current_lead_slug(?array $page = null): ?string
{
    $page = $page ?? ($GLOBALS['page'] ?? []);

    if (!empty($page['leadSlug'])) {
        return (string) $page['leadSlug'];
    }

    $path = rtrim((string) ($page['path'] ?? ''), '/');
    if ($path === '') {
        return null;
    }

    foreach ([services(), content('tools')] as $records) {
        foreach ($records as $slug => $record) {
            if (rtrim((string) ($record['path'] ?? ''), '/') === $path) {
                return (string) $slug;
            }
        }
    }

    return null;
}

/**
 * The wa.me prefill for the page being rendered . EVERY WhatsApp
 * link on the site goes through this — header pill, floating button, mobile
 * bar, homepage, hub, CTA band, tool CTAs — so a message always names the
 * service the visitor was reading about and never the button's own label.
 */
function whatsapp_text_for_page(?array $page = null): string
{
    return (string) lead_value(current_lead_slug($page))['whatsappText'];
}

/**
 * The WhatsApp menu options : the current page's service first
 * and pre-highlighted, then the priority services, then the "other" option.
 * Duplicates are dropped, so the current page's service is listed once.
 *
 * Each entry: slug, label, text (the prefill), link (wa.me or null), current.
 */
function whatsapp_menu(?array $page = null): array
{
    $model   = content('lead-values');
    $current = current_lead_slug($page);
    $slugs   = array_values(array_unique(array_filter(
        array_merge([$current], $model['whatsappMenu'])
    )));

    $options = [];
    foreach ($slugs as $slug) {
        $record = lead_value($slug);
        if ($record['slug'] === null) {
            continue;   // a page that named a slug the model does not know
        }
        $options[] = [
            'slug'    => $slug,
            'label'   => lead_label($slug),
            'text'    => $record['whatsappText'],
            'link'    => whatsapp_link($record['whatsappText']),
            'current' => $slug === $current,
        ];
    }

    /* "Otra consulta" always closes the menu: the visitor who wants none of the
       above still gets a message that says something. */
    $options[] = [
        'slug'    => '',
        'label'   => ui('whatsapp.other'),
        'text'    => $model['default']['whatsappText'],
        'link'    => whatsapp_link($model['default']['whatsappText']),
        'current' => false,
    ];

    return $options;
}

/**
 * The short human name a source goes by — in the WhatsApp menu and in the CRM's
 * `servicio` field. content/lead-values.php owns it, because a page title is
 * often frozen for SEO and too terse to read as a menu option; a service
 * without a menuLabel falls back to its navLabel.
 */
function lead_label(string $slug): string
{
    $record = lead_value($slug);
    if (!empty($record['menuLabel'])) {
        return (string) $record['menuLabel'];
    }

    $page = services($slug) ?? content('tools')[$slug] ?? null;

    return (string) ($page['navLabel'] ?? $page['title'] ?? $slug);
}

/**
 * True when an image record points at a file that exists on disk. Content may
 * name an image before its file has been localised (docs/imagery-manifest.json,
 * the localize-images workflow); the slot then renders nothing instead of a broken
 * image, and switches on by itself once the file lands.
 */
function image_ready(?array $image): bool
{
    if (!empty($image['base'])) {
        $first = (int) (((array) ($image['widths'] ?? [640]))[0] ?? 640);
        return is_file(ROOT_DIR . $image['base'] . '-' . $first . '.webp');
    }
    $src = (string) ($image['src'] ?? '');
    return $src !== '' && str_starts_with($src, '/') && is_file(ROOT_DIR . $src);
}

/**
 * Body copy with inline links. Content strings may carry markdown-style links:
 *
 *   "[la guía de aduana](/aduana/)"            → an internal link
 *   "[el arancel vigente](https://www.dnit.gov.py/)" → an external link that
 *                                                opens in a new tab, with a
 *                                                small ↗ and rel="noopener"
 *
 * The text is escaped first; only root-relative paths and absolute http(s)
 * URLs become anchors, and the URL is re-validated and re-escaped, so content
 * can never inject markup or a javascript:/data: link through this.
 */
function rich(?string $text): string
{
    return (string) preg_replace_callback(
        RICH_LINK_PATTERN,
        static function (array $m): string {
            if ($m[2][0] === '/') {
                return '<a href="' . $m[2] . '">' . $m[1] . '</a>';
            }
            $href = html_entity_decode($m[2], ENT_QUOTES | ENT_HTML5, 'UTF-8');
            $host = parse_url($href, PHP_URL_HOST);
            if (!preg_match('~^https?://~i', $href) || !is_string($host) || !preg_match('~^[a-z0-9.-]+$~i', $host)) {
                return $m[0];
            }
            return '<a class="ext-link" href="' . e($href) . '" rel="noopener" target="_blank">'
                . $m[1]
                . '<span class="ext-link__icon" aria-hidden="true">↗</span>'
                . '<span class="visually-hidden"> ' . e(ui('a11y.new_tab', '(se abre en una pestaña nueva)')) . '</span>'
                . '</a>';
        },
        e($text)
    );
}

/** The same copy with the link syntax removed, for JSON-LD and meta text. */
function plain(?string $text): string
{
    return (string) preg_replace(RICH_LINK_PATTERN, '$1', (string) $text);
}

/**
 * The /cotizar/ wizard URL for a lead source. A service slug travels as `s`; a
 * slug that is not a service (a tool) also carries its `need`, so the wizard can
 * open on the right branch. With no arguments it describes the page being
 * rendered, so every "Pedir cotización" button names the page it sits on.
 */
function quote_path(?string $slug = null, ?string $need = null): string
{
    $slug  = $slug ?? current_lead_slug();
    $query = [];
    if ($slug !== null && $slug !== '') {
        if ($need === null && services($slug) === null) {
            $need = (string) (lead_value($slug)['need'] ?? '');
        }
        if ($need !== null && $need !== '') {
            $query['need'] = $need;
        }
        $query['s'] = $slug;
    } elseif ($need !== null && $need !== '') {
        $query['need'] = $need;
    }

    return '/cotizar/' . ($query === [] ? '' : '?' . http_build_query($query));
}

/** The WhatsApp glyph, inline, currentColor, decorative. */
function wa_icon(string $class = 'icon'): string
{
    return '<svg class="' . e($class) . '" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path fill="currentColor" d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.45 1.32 4.95L2 22l5.25-1.38a9.9 9.9 0 0 0 4.79 1.22h.01c5.46 0 9.91-4.45 9.91-9.91C21.96 6.45 17.5 2 12.04 2Zm5.8 14.06c-.24.68-1.4 1.3-1.94 1.35-.5.05-.95.23-3.2-.67-2.7-1.06-4.4-3.8-4.53-3.98-.13-.18-1.08-1.44-1.08-2.75 0-1.3.68-1.95.93-2.21.24-.27.53-.33.7-.33.18 0 .35 0 .5.01.16.01.38-.06.6.46.23.55.77 1.9.84 2.03.07.14.11.3.02.48-.09.18-.13.29-.27.44-.13.16-.28.35-.4.47-.13.13-.27.28-.12.54.15.27.67 1.1 1.44 1.79.99.88 1.82 1.16 2.08 1.29.26.13.41.11.56-.07.15-.18.65-.76.82-1.02.18-.27.35-.22.59-.13.24.09 1.53.72 1.79.85.26.13.44.2.5.31.07.11.07.63-.17 1.31Z"/></svg>';
}

/**
 * The brand logomark: two points joined by a route arc on a teal tile. Inline
 * SVG so it inherits no request; $id keeps the gradient ids unique when the
 * header and the footer both render it. Keep in step with assets/img/favicon.svg.
 */
function logo_mark(string $id = 'h'): string
{
    $g = 'lm-g-' . preg_replace('/[^a-z0-9]/i', '', $id);

    return '<svg class="logo-mark" viewBox="0 0 40 40" width="40" height="40" aria-hidden="true" focusable="false">'
        . '<defs><linearGradient id="' . $g . '" x1="0" y1="0" x2="1" y2="1">'
        . '<stop offset="0" stop-color="#1f7482"/><stop offset="1" stop-color="#0a3540"/></linearGradient></defs>'
        . '<rect width="40" height="40" rx="11" fill="url(#' . $g . ')"/>'
        . '<rect x=".5" y=".5" width="39" height="39" rx="10.5" fill="none" stroke="#fff" stroke-opacity=".16"/>'
        . '<path d="M13.5 34.5c9.5 0 21-9 21-21" fill="none" stroke="#fff" stroke-opacity=".16" stroke-width="1.4" stroke-linecap="round"/>'
        . '<path d="M10.5 29c0-10.5 7.5-18 18.5-18" fill="none" stroke="#f2994a" stroke-width="2.8" stroke-linecap="round"/>'
        . '<circle cx="29.5" cy="11" r="6.5" fill="#f2994a" fill-opacity=".2"/>'
        . '<circle cx="29.5" cy="11" r="3.6" fill="#f2994a"/>'
        . '<circle cx="10.5" cy="29.5" r="3.4" fill="#0b3a44" stroke="#fff" stroke-width="2"/>'
        . '</svg>';
}

/**
 * A responsive <picture> for an image record produced by webimg:
 *   ['base' => '/assets/img/<slug>', 'widths' => [640, 1280, 1920],
 *    'alt' => ..., 'width' => ..., 'height' => ...]
 * Files are <base>-<w>.avif / .webp. Returns '' until the files exist.
 */
function picture_html(?array $image, string $sizes = '100vw', string $class = '', bool $eager = false): string
{
    if (!image_ready($image)) {
        return '';
    }
    $base   = (string) $image['base'];
    $widths = array_map('intval', (array) ($image['widths'] ?? [640, 1280]));
    $srcset = static fn (string $ext): string => implode(', ', array_map(
        static fn (int $w): string => asset($base . '-' . $w . '.' . $ext) . ' ' . $w . 'w',
        $widths
    ));
    $fallback = $base . '-' . $widths[intdiv(count($widths), 2)] . '.webp';

    return '<picture>'
        . '<source type="image/avif" srcset="' . e($srcset('avif')) . '" sizes="' . e($sizes) . '">'
        . '<source type="image/webp" srcset="' . e($srcset('webp')) . '" sizes="' . e($sizes) . '">'
        . '<img' . ($class !== '' ? ' class="' . e($class) . '"' : '')
        . ' src="' . e(asset($fallback)) . '" alt="' . e((string) ($image['alt'] ?? '')) . '"'
        . ' width="' . (int) ($image['width'] ?? 1600) . '" height="' . (int) ($image['height'] ?? 900) . '"'
        . ($eager ? ' fetchpriority="high"' : ' loading="lazy"') . ' decoding="async">'
        . '</picture>';
}

/** Absolute-path OG image for an image record, or null. */
function image_og(?array $image): ?string
{
    if (!image_ready($image)) {
        return null;
    }
    $widths = array_map('intval', (array) ($image['widths'] ?? [1280]));
    return $image['base'] . '-' . (in_array(1280, $widths, true) ? 1280 : max($widths)) . '.webp';
}

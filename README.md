# china.com.py — China-Paraguay

A Spanish-language guides and lead-generation site about buying, importing and travelling
between China and Paraguay. Static PHP 8.2, no database, built on
[php-site-template](https://github.com/antonmarklundcom/php-site-template) (its original README
is in `docs/template-README.md`; the content contract there still applies).

- **Topics:** `/comprar/` (Temu, Shein, AliExpress, Alibaba, 1688), `/importar/` (guides,
  services, 10 product pages), `/aduana/` (practical, clearly unofficial), `/viajar-a-china/` and
  `/feria-de-canton/`.
- **Calculators:** `/herramientas/` has the landed import cost, CBM/container and online-order total calculators.
- **Leads:** every form posts to `enviar.php`, which forwards to VenderCRM (tier, WhatsApp
  prefill and CRM tag per page in `content/lead-values.php`).
- **Build plan and keyword research:** `plan.md`, `docs/keyword-research.md`.
- **Open facts:** `docs/facts-to-verify.md` lists every rate, date and rule that is not yet confirmed.

## Deploy to Hostinger

Pick ONE of the two ways. Both serve the repo root as the site root.

### A. Git (recommended: every merge to `main` can redeploy)
1. hPanel → the china.com.py website → **Advanced → Git** → connect repository
   `antonmarklundcom/china`, branch **`main`**, install path empty (= `public_html`).
2. Deploy. Optionally copy the webhook URL into GitHub → repo Settings → Webhooks so each merge
   to `main` redeploys automatically.
3. Internal folders (`content/`, `lib/`, `docs/`, `deploy/`, `tests/`, `prompts/`, `.git/`) and
   `*.md`, `*.sh`, `*.json` answer 404 via `.htaccess`, so shipping the whole repo is safe.

### B. Zip
```sh
./deploy/make-zip.sh          # → dist/china-py-<date>.zip, internals stripped, CSS minified
```
Upload the zip in hPanel → File Manager → `public_html` → Extract.

### After either: connect VenderCRM (once)
Create `public_html/config.php` in the File Manager (it is git-ignored and never overwritten by
a deploy):
```php
<?php
return [
    'SITE_URL'          => 'https://china.com.py',
    'VENDERCRM_URL'     => 'https://crm.clientes.com.py',
    'VENDERCRM_API_KEY' => 'vc_live_…',   // the china.com.py key from VenderCRM → Sitios
    'GA4_ID'            => '',            // optional
];
```
The key must never be committed to this public repository. Environment variables with the same
names also work (`cfg()` falls back to `getenv`). Without a key the form still works: leads land in
`logs/leads.log` (make sure `logs/` is writable).

Test: submit the form on `/contacto/` with a real phone → the contact appears in VenderCRM →
Contactos with the phone as `+595…`. Submit twice in a row: no duplicate.

Also set in `content/site.php` once you have them: `whatsapp`, `phone`, `email` (every WhatsApp
button switches on by itself when `whatsapp` is set).

## Images

10 images were generated (GPT Image 2.5 Sunburst, medium) and are listed with their result URLs
in `docs/imagery-manifest.json`. Pages show them as soon as the files exist. To download and
convert them (on any machine that can reach `*.cloudfront.net`):
```sh
./deploy/fetch-images.sh
git add assets/img docs/imagery-manifest.json && git commit -m "Add images" && git push
```

## Local

```sh
php -S localhost:8080 router.php   # preview
./verify.sh                        # the build gate (also runs in CI on every PR)
cd tests && npm ci && node tools.mjs http://localhost:8080   # calculator checks
```

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
- **Fact check:** `docs/fact-check-log.md`: every claim verified with its source or rewritten; nothing open.

## Deploy to Hostinger

Pick ONE of the two ways. Both serve the repo root as the site root.

### A. Git (recommended: every merge to `main` can redeploy)
1. hPanel → the china.com.py website → **Advanced → Git** → connect repository
   `antonmarklundcom/china`, branch **`main`**, install path empty (= `public_html`).
2. Deploy. Optionally copy the webhook URL into GitHub → repo Settings → Webhooks so each merge
   to `main` redeploys automatically.
3. Internal folders (`content/`, `lib/`, `docs/`, `deploy/`, `tests/`, `prompts/`, `.git/`) and
   `*.md`, `*.sh`, `*.json` answer 404 via `.htaccess`, so shipping the whole repo is safe.

### B. Zip (simplest; the VenderCRM key is already inside)
```sh
WITH_CONFIG=1 ./deploy/make-zip.sh   # → dist/china-py-<date>-con-config.zip
```
Upload the zip in hPanel → File Manager → `public_html` → Extract. Done: leads go to VenderCRM.
The key lives in the git-ignored `.secrets/config.php`, which only that zip ships as `config.php`.
It is never committed (this repository is public). On the server it is safe: `.htaccess` denies
`config.php` over HTTP, and the file only returns an array, so it prints nothing even if requested.
Never share the `-con-config` zip. Without `WITH_CONFIG=1` the zip has no key.

### With Git deploy: add the key once
Git deploy never includes the key (the repo is public). After the first deploy, upload
`config.php` (the same file as `.secrets/config.php`, or the one inside the `-con-config` zip) to
`public_html/` with the File Manager. It is git-ignored, so later deploys never overwrite it.
Environment variables with the same names also work (`cfg()` falls back to `getenv`).

Test: submit the form on `/contacto/` with a real phone → the contact appears in VenderCRM →
Contactos with the phone as `+595…`. Without a key the form still works: leads land in
`logs/leads.log`.

## Images

10 images generated with Higgsfield (GPT Image 2.5 Sunburst, medium), converted by
[webimg](https://github.com/antonmarklundcom/webimg) to AVIF + WebP (640/1280/1920) with SEO
names and alt text, in `assets/img/`. Record: `docs/imagery-manifest.json`.
New images: add rows (result URL, name, alt) to `docs/imagery-jobs-*.csv`, then GitHub → Actions →
**localize-images** → Run workflow (manual only; it converts with webimg and commits
`assets/img/`). Reference them in content as
`'image' => ['base' => '/assets/img/<name>', 'widths' => [640, 1280, 1920], 'alt' => …]`.

## Local

```sh
php -S localhost:8080 router.php   # preview
./verify.sh                        # the build gate (also runs in CI on every PR)
cd tests && npm ci && node tools.mjs http://localhost:8080   # calculator checks
```

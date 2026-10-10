# Launch checklist: china.com.py

The code is finished and on `main`. What's left needs your Hostinger, VenderCRM and Google
accounts. Allow about 30 minutes.

## 1. Hosting (Hostinger, Git deploy)
1. hPanel → the china.com.py website → **Advanced → Git**.
2. Repository `https://github.com/antonmarklundcom/china`, branch **`main`**, install path
   **empty** (= `public_html`). The folder must be empty the first time: File Manager →
   `public_html` → delete Hostinger's `default.php` (that file is the "Default page" now showing).
   PHP version 8.2 or newer (Advanced → PHP Configuration).
3. Click **Deploy**.
4. Optional, for automatic deploys: copy the webhook URL shown there into GitHub → repo
   Settings → Webhooks (push events). From then on, every
   merge to `main` goes live.
5. hPanel → **SSL**: make sure the certificate for china.com.py is active. The site's
   `.htaccess` already sends http:// and www. visitors to `https://china.com.py`.

## 2. Lead key (once)
Copy `vendercrm.private.example.php` to `../private/vendercrm.php` outside the document/deployment root. Enter `VENDERCRM_URL` as the HTTPS CRM origin and `VENDERCRM_API_KEY` once on the server. Preserve that sibling private directory on redeploy. See README for environment and absolute private-path alternatives. `SITE_URL` remains an unrelated `config.php` setting. Never put keys in a deployment ZIP.

## 3. Test (5 minutes)
- Open https://china.com.py/cotizar/ → pick "Importar para vender" → fill in → send.
  The lead should appear in VenderCRM → Contactos, with the answers in the message.
- Open any guide on a phone: the bottom bar shows "Cotizar" and "WhatsApp".
- http://www.china.com.py should land on https://china.com.py (one redirect).

## 4. Google
- Search Console → add the domain property `china.com.py` (DNS TXT record) → Sitemaps →
  submit `https://china.com.py/sitemap.xml`.
- URL Inspection → request indexing for `/`, `/cotizar/`, `/aduana/`,
  `/comprar/temu-paraguay/`, `/importar/como-importar-de-china-a-paraguay/`.
- No Google Analytics (house rule).

## 5. aduana.com.py (not bought yet)
Only after you register it: hPanel → Domains → aduana.com.py → Redirect (301) to
`https://china.com.py/aduana/`, or give it its own site slot (see docs/BUSINESS.md).

## 6. After launch (not blocking)
- Partners: despachante, courier China→PY, sourcing agent, travel/visa agency. Their names
  go on the pages once agreed.
- Affiliate URLs in `content/affiliates.php` (the boxes turn on by themselves).
- Real testimonials in `content/site.php` → `testimonials` (the section stays hidden until
  then).
- Images for the product pages and calculators (write "Generate image").
- After 4–6 weeks: use Search Console queries to rewrite titles and add guides.

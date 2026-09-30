# Owner-only checklist

The code and SEO are done. These need your accounts or decisions (details in `docs/LAUNCH.md`).

- [ ] Hostinger: connect Git (repo `antonmarklundcom/china`, branch `main`, empty install path) and Deploy; add the webhook in GitHub for auto-deploy.
- [ ] Upload `config.php` (VenderCRM key, `SITE_URL=https://china.com.py`) via File Manager; test `/cotizar/`.
- [ ] Point `china.com.py` at the slot; SSL active; 301 `aduana.com.py` to `https://china.com.py/aduana/`.
- [ ] Search Console: add domain property, submit `https://china.com.py/sitemap.xml`, request indexing of the main pages.
- [ ] Fulfilment partners (plan.md section 7 #5): one despachante, 1-2 couriers China-PY, one sourcing/inspection agent, one visa/Canton travel agency, plus referral terms. Then name them on the pages.
- [ ] Affiliate URLs in `content/affiliates.php` (boxes stay hidden until set).
- [ ] WhatsApp number and contact email in `content/site.php` (currently null, so hidden).
- [ ] Confirm the customs, courier and visa figures against official sources before relying on them (`docs/fact-check-log.md`); pages already say "consulte el monto vigente".
- [ ] Real testimonials only when you have them (section stays hidden).
- [ ] Images: say "Generate image" when you want product-page and calculator imagery.
- [ ] After 4-6 weeks: use Search Console queries to rewrite titles and add guides.

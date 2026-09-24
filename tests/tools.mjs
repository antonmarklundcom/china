/**
 * Calculator checks: loads each /herramientas/ page against a running local
 * server (php -S 127.0.0.1:8080 router.php) and asserts known input → output
 * cases on the exported compute() functions, then submits each form once.
 *
 *   node tests/tools.mjs [base-url]
 */
import { chromium } from 'playwright';

const base = process.argv[2] || 'http://127.0.0.1:8080';
const near = (a, b, eps = 0.01) => Math.abs(a - b) <= eps;
let failed = 0;
const check = (name, ok, got) => {
  console.log(`${ok ? 'ok  ' : 'FAIL'}  ${name}${ok ? '' : ' → ' + JSON.stringify(got)}`);
  if (!ok) failed++;
};

const browser = await chromium.launch();
const page = await browser.newPage();

await page.goto(base + '/herramientas/calculadora-costo-importacion/', { waitUntil: 'networkidle' });
let r = await page.evaluate(() => window.CostoImportacion.compute({ fob: 10000, flete: 2000, seguro: 100, arancel: 10, otros: 2, iva: 10, locales: 500, unidades: 100, cambio: 7500 }));
check('costo: CIF = FOB + flete + seguro', near(r.cif, 12100), r);
check('costo: arancel 10 % of CIF', near(r.arancel, 1210), r);
check('costo: IVA on CIF + tributos', near(r.iva, (12100 + 1210 + 242) * 0.10), r);
check('costo: total', near(r.total, 12100 + 1210 + 242 + 1355.2 + 500), r);
check('costo: per unit in guaraníes', near(r.porUnidadGs, (r.total / 100) * 7500, 1), r);
r = await page.evaluate(() => window.CostoImportacion.compute({ fob: 100, arancel: '' }));
check('costo: empty arancel is flagged', r.sinArancel === true && near(r.total, 100), r);
await page.fill('#ci-fob', '1000'); await page.fill('#ci-flete', '200'); await page.click('#ci-form button[type=submit]');
check('costo: form renders a result', await page.isVisible('#ci-result') && (await page.textContent('#ci-total')).includes('1.320'), await page.textContent('#ci-total'));

await page.goto(base + '/herramientas/calculadora-cbm-contenedor/', { waitUntil: 'networkidle' });
r = await page.evaluate(() => window.CbmContenedor.compute({ largo: 50, ancho: 40, alto: 30, cajas: 100, peso: 12 }));
check('cbm: 0.06 m³ per carton, 6 m³ total', near(r.cbmCaja, 0.06, 1e-9) && near(r.cbm, 6, 1e-9), r);
check('cbm: air volumetric weight ÷ 6000', near(r.volumetrico, 1000), r);
check('cbm: small load suggests consolidated', r.sugerencia === 'lcl', r);
r = await page.evaluate(() => window.CbmContenedor.compute({ largo: 100, ancho: 100, alto: 100, cajas: 40 }));
check('cbm: 40 m³ suggests a 40\'', r.sugerencia === '40', r);
await page.fill('#cbm-largo', '50'); await page.fill('#cbm-ancho', '40'); await page.fill('#cbm-alto', '30'); await page.fill('#cbm-cajas', '100');
await page.click('#cbm-form button[type=submit]');
check('cbm: form renders a result', (await page.textContent('#cbm-total')).startsWith('6'), await page.textContent('#cbm-total'));

await page.goto(base + '/herramientas/calculadora-compras-online/', { waitUntil: 'networkidle' });
r = await page.evaluate(() => window.ComprasOnline.compute({ precio: 50, envio: 0, peso: 1.2, medidas: '40 x 30 x 20', divisor: 6000, tarifa: 10, cargos: '', redondeo: 0.5 }));
check('compras: volumetric 4 kg beats 1.2 kg real', near(r.volumetrico, 4) && near(r.facturable, 4), r);
check('compras: courier 4 kg × 10', near(r.courier, 40) && near(r.total, 90), r);
r = await page.evaluate(() => window.ComprasOnline.compute({ precio: 20, peso: 1.2, tarifa: 10, cargos: 10, redondeo: 0.1 }));
check('compras: 1.2 kg stays 1.2 at 0.1 step', near(r.facturable, 1.2), r);
check('compras: charges on price + courier', near(r.cargos, 3.2) && near(r.total, 35.2), r);
r = await page.evaluate(() => window.ComprasOnline.roundUp(1.01, 1));
check('compras: rounds up to the next kilo', r === 2, r);
await page.fill('#co-precio', '30'); await page.fill('#co-peso', '0.4'); await page.fill('#co-tarifa', '12');
await page.click('#co-form button[type=submit]');
check('compras: form renders a result', await page.isVisible('#co-result'), null);

await browser.close();
console.log(failed ? `\n${failed} failed` : '\nall calculator checks passed');
process.exit(failed ? 1 : 0);

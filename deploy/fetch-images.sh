#!/usr/bin/env bash
# Downloads the generated images listed in docs/imagery-manifest.json and
# converts each one to the WebP file the site references (max width from
# out_width). Run from the repo root on any machine that can reach
# *.cloudfront.net (your PC, or a cloud session whose network allows it):
#
#     ./deploy/fetch-images.sh && git add assets/img docs/imagery-manifest.json && git commit -m "Add images"
#
# Pages show an image only once its file exists (lib/helpers.php image_ready),
# so nothing breaks before this runs. Needs curl and node (sharp is installed
# into deploy/node_modules on first run).
set -euo pipefail
cd "$(dirname "$0")/.."
mkdir -p deploy/imagery-src
[ -d deploy/node_modules/sharp ] || (cd deploy && npm install --silent)

node --input-type=module <<'JS'
import { readFileSync, writeFileSync, existsSync, mkdirSync } from "node:fs";
import { execFileSync } from "node:child_process";
import { dirname } from "node:path";
import { createRequire } from "node:module";
const require = createRequire(process.cwd() + "/deploy/package.json");
const sharp = require("sharp");
const manifest = JSON.parse(readFileSync("docs/imagery-manifest.json", "utf8"));
let done = 0;
for (const img of manifest.images) {
  const raw = `deploy/imagery-src/${img.id}.png`;
  if (!existsSync(raw)) {
    execFileSync("curl", ["-fsSL", "-m", "120", "-o", raw, img.url], { stdio: "inherit" });
  }
  const out = "." + img.file;
  mkdirSync(dirname(out), { recursive: true });
  await sharp(raw).resize({ width: img.out_width, withoutEnlargement: true }).webp({ quality: 78 }).toFile(out);
  console.log("ok", img.file);
  done++;
}
manifest._notes.download_status = `localized ${new Date().toISOString().slice(0, 10)}: ${done}/${manifest.images.length} files in assets/img`;
writeFileSync("docs/imagery-manifest.json", JSON.stringify(manifest, null, 2) + "\n");
JS

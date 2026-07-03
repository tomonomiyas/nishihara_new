// PNG を左上原点で矩形クロップ: node crop.cjs <in> <out> <x> <y> <w> <h>
const fs = require('fs');
const { PNG } = require('pngjs');
const [, , inP, outP, x, y, w, h] = process.argv.map((v, i) => (i >= 4 ? parseInt(v, 10) : v));
const src = PNG.sync.read(fs.readFileSync(inP));
const cw = Math.min(w, src.width - x);
const ch = Math.min(h, src.height - y);
const out = new PNG({ width: cw, height: ch });
for (let yy = 0; yy < ch; yy++) {
  for (let xx = 0; xx < cw; xx++) {
    const si = (src.width * (yy + y) + (xx + x)) << 2;
    const di = (cw * yy + xx) << 2;
    out.data[di] = src.data[si];
    out.data[di + 1] = src.data[si + 1];
    out.data[di + 2] = src.data[si + 2];
    out.data[di + 3] = src.data[si + 3];
  }
}
fs.writeFileSync(outP, PNG.sync.write(out));
console.log(`${outP}: ${cw}x${ch}`);

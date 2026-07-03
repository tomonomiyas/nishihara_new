#!/usr/bin/env node
// compare.cjs — pixelmatch マッチ率 + NCC(正規化相互相関) を出力
// usage: node compare.cjs <implPng> <refPng> <diffOut>
const fs = require("fs");
const path = require("path");
const { PNG } = require("pngjs");
const _pm = require("pixelmatch");
const pixelmatch = typeof _pm === "function" ? _pm : _pm.default;

const [, , implPath, refPath, diffPath] = process.argv;
if (!implPath || !refPath) {
  console.error("usage: node compare.cjs <impl.png> <ref.png> [diff.png]");
  process.exit(1);
}

const a = PNG.sync.read(fs.readFileSync(implPath));
const b = PNG.sync.read(fs.readFileSync(refPath));

// 共通サイズ（幅は小さい方、高さは短い方に合わせ、足りない分は白パディング）
const width = Math.min(a.width, b.width);
const height = Math.min(a.height, b.height);

function cropToCanvas(src, w, h) {
  const out = new PNG({ width: w, height: h });
  for (let y = 0; y < h; y++) {
    for (let x = 0; x < w; x++) {
      const si = (src.width * y + x) << 2;
      const di = (w * y + x) << 2;
      if (x < src.width && y < src.height) {
        out.data[di] = src.data[si];
        out.data[di + 1] = src.data[si + 1];
        out.data[di + 2] = src.data[si + 2];
        out.data[di + 3] = src.data[si + 3];
      } else {
        out.data[di] = 255;
        out.data[di + 1] = 255;
        out.data[di + 2] = 255;
        out.data[di + 3] = 255;
      }
    }
  }
  return out;
}

const ca = cropToCanvas(a, width, height);
const cb = cropToCanvas(b, width, height);

const diff = new PNG({ width, height });
const mismatch = pixelmatch(ca.data, cb.data, diff.data, width, height, {
  threshold: 0.1,
});

if (diffPath) fs.writeFileSync(diffPath, PNG.sync.write(diff));

const total = width * height;
const matchRate = ((total - mismatch) / total) * 100;

// NCC（グレースケール正規化相互相関）
function gray(data, i) {
  return 0.299 * data[i] + 0.587 * data[i + 1] + 0.114 * data[i + 2];
}
let sumA = 0,
  sumB = 0;
for (let i = 0; i < ca.data.length; i += 4) {
  sumA += gray(ca.data, i);
  sumB += gray(cb.data, i);
}
const meanA = sumA / total;
const meanB = sumB / total;
let num = 0,
  denA = 0,
  denB = 0;
for (let i = 0; i < ca.data.length; i += 4) {
  const da = gray(ca.data, i) - meanA;
  const db = gray(cb.data, i) - meanB;
  num += da * db;
  denA += da * da;
  denB += db * db;
}
const ncc = num / Math.sqrt(denA * denB || 1);

console.log(
  JSON.stringify(
    {
      matchRate: Math.round(matchRate * 100) / 100,
      ncc: Math.round(ncc * 10000) / 10000,
      mismatch,
      total,
      width,
      height,
    },
    null,
    2,
  ),
);

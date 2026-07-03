// news ページのスクリーンショット撮影（PC / SP）
const { chromium } = require('playwright');

(async () => {
  const url = process.argv[2] || 'https://nishihara.local/news/';
  const outDir = process.argv[3] || '/tmp';

  const browser = await chromium.launch();

  // PC（1440幅 = デザイン基準幅）
  const pc = await browser.newContext({
    viewport: { width: 1440, height: 1200 },
    deviceScaleFactor: 1,
    ignoreHTTPSErrors: true,
  });
  const pcPage = await pc.newPage();
  await pcPage.goto(url, { waitUntil: 'networkidle' });
  await pcPage.screenshot({ path: `${outDir}/news-pc-1440.png`, fullPage: true });

  // 横スクロール検証（PC各幅 + SP）
  const widths = [375, 414, 768, 1024, 1440];
  const overflow = {};
  for (const w of widths) {
    const ctx = await browser.newContext({ viewport: { width: w, height: 900 }, ignoreHTTPSErrors: true });
    const p = await ctx.newPage();
    await p.goto(url, { waitUntil: 'networkidle' });
    const res = await p.evaluate(() => ({
      scrollWidth: document.documentElement.scrollWidth,
      innerWidth: window.innerWidth,
    }));
    overflow[w] = { ...res, ok: res.scrollWidth <= res.innerWidth };
    await ctx.close();
  }

  // SP（390幅）スクショ
  const sp = await browser.newContext({
    viewport: { width: 390, height: 1200 },
    deviceScaleFactor: 1,
    ignoreHTTPSErrors: true,
  });
  const spPage = await sp.newPage();
  await spPage.goto(url, { waitUntil: 'networkidle' });
  await spPage.screenshot({ path: `${outDir}/news-sp-390.png`, fullPage: true });

  await browser.close();
  console.log(JSON.stringify(overflow, null, 2));
})();

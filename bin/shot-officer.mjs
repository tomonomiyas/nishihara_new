// officer ページの実機スクショを撮影（PC/SP）
import { chromium } from "/Users/inouetomoya/.npm/_npx/9833c18b2d85bc59/node_modules/playwright/index.mjs";

const URL = "http://nishihara.local/company/overview/officer/";
const OUT = "/Users/inouetomoya/Local Sites/nishihara/app/public/wp-content/themes/nishihara/mcp-log/officer";

const targets = [
  { name: "pc", width: 1440, height: 1200 },
  { name: "sp", width: 390, height: 844 },
];

const browser = await chromium.launch({ channel: "chrome" });
for (const t of targets) {
  const ctx = await browser.newContext({
    viewport: { width: t.width, height: t.height },
    deviceScaleFactor: 1,
  });
  const page = await ctx.newPage();
  await page.goto(URL, { waitUntil: "networkidle" });
  await page.waitForTimeout(500);
  // フルページ
  await page.screenshot({ path: `${OUT}/impl-${t.name}-full.png`, fullPage: true });
  // officer 本体セクションのみ
  const sec = await page.$(".p-officer");
  if (sec) {
    await sec.screenshot({ path: `${OUT}/impl-${t.name}-officer.png` });
  }
  await ctx.close();
  console.log(`shot ${t.name} done`);
}
await browser.close();
console.log("all done");

// pixeldiff 用: officer を 1920幅で撮影（XD PC 1920px に合わせる）
import { chromium } from "/Users/inouetomoya/.npm/_npx/9833c18b2d85bc59/node_modules/playwright/index.mjs";

const URL = "http://nishihara.local/company/overview/officer/";
const OUT = "/Users/inouetomoya/Local Sites/nishihara/app/public/wp-content/themes/nishihara/mcp-log/officer";

const browser = await chromium.launch({ channel: "chrome" });
const ctx = await browser.newContext({ viewport: { width: 1920, height: 1200 }, deviceScaleFactor: 1 });
const page = await ctx.newPage();
await page.goto(URL, { waitUntil: "networkidle" });
await page.waitForTimeout(500);
await page.screenshot({ path: `${OUT}/officer-impl-1920.png`, fullPage: true });
// 本体セクション上端・breadcrumb上端のy座標も取得
const coords = await page.evaluate(() => {
  const pageHead = document.querySelector(".p-pageHead");
  const bc = document.querySelector(".p-breadcrumb");
  return {
    pageHeadTop: pageHead ? Math.round(pageHead.getBoundingClientRect().top + window.scrollY) : null,
    breadcrumbTop: bc ? Math.round(bc.getBoundingClientRect().top + window.scrollY) : null,
  };
});
console.log(JSON.stringify(coords));
await browser.close();

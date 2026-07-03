// officer の主要要素の実測値を取得（D-2 高さ検証 / レイアウト数値）
import { chromium } from "/Users/inouetomoya/.npm/_npx/9833c18b2d85bc59/node_modules/playwright/index.mjs";

const URL = "http://nishihara.local/company/overview/officer/";
const browser = await chromium.launch({ channel: "chrome" });
const ctx = await browser.newContext({ viewport: { width: 1440, height: 1200 }, deviceScaleFactor: 1 });
const page = await ctx.newPage();
await page.goto(URL, { waitUntil: "networkidle" });
await page.waitForTimeout(400);

const data = await page.evaluate(() => {
  const get = sel => {
    const el = document.querySelector(sel);
    if (!el) return null;
    const r = el.getBoundingClientRect();
    return { w: Math.round(r.width), h: Math.round(r.height), left: Math.round(r.left), top: Math.round(r.top) };
  };
  // テーブル行高 / セル幅
  const row = document.querySelector(".p-officer__row");
  const role = document.querySelector(".p-officer__role");
  const name = document.querySelector(".p-officer__name");
  // サイドナビとmainの隙間（gap）
  const main = document.querySelector(".p-officer__main");
  const nav = document.querySelector(".p-officer__nav");
  let gap = null;
  if (main && nav) {
    gap = Math.round(nav.getBoundingClientRect().left - main.getBoundingClientRect().right);
  }
  return {
    heading: get(".p-officer__heading"),
    table: get(".p-officer__table"),
    row: row ? Math.round(row.getBoundingClientRect().height) : null,
    role: role ? Math.round(role.getBoundingClientRect().width) : null,
    name: name ? Math.round(name.getBoundingClientRect().width) : null,
    nav: get(".p-officer__nav"),
    layoutGap: gap,
  };
});

console.log(JSON.stringify(data, null, 2));
await browser.close();

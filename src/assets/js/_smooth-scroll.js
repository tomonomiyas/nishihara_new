// ページ内リンク / 別ページ遷移後アンカーの共通スムーススクロール
// - 同一ページ: href="#id" で対象要素が存在するリンクを一括処理（各ページ個別実装は不要）
// - 別ページ遷移: 遷移先ページで読み込み後、URL のハッシュのセクションへ滑らかにスクロール
//   （head 側 func-anchor-scroll.php がネイティブの即時ジャンプ＝チラつきを抑止 → ここで先頭から滑らかに移動）
// すべてのブラウザ対応: scroll-behavior 非対応環境（旧 Safari 等）は requestAnimationFrame で自前アニメーション。
// 別タブ・修飾キー付きクリック、対象が無いリンク（href="#" 等）は通常動作に任せる。

const DURATION = 600; // 自前アニメーション時のスクロール時間(ms)

const prefersReduced = () => window.matchMedia("(prefers-reduced-motion: reduce)").matches;
const supportsNativeSmooth = () => "scrollBehavior" in document.documentElement.style;

// 固定ヘッダー分のオフセット（各セクションの scroll-margin-top を尊重）
const getScrollMargin = target => parseFloat(getComputedStyle(target).scrollMarginTop) || 0;

// 自前スムーススクロール（ネイティブ非対応ブラウザ向けフォールバック）
function animateScrollTo(top) {
  const start = window.pageYOffset;
  const distance = top - start;
  const startTime = performance.now();
  // easeInOutQuad
  const ease = t => (t < 0.5 ? 2 * t * t : 1 - (-2 * t + 2) ** 2 / 2);

  const step = now => {
    const progress = Math.min((now - startTime) / DURATION, 1);
    window.scrollTo(0, start + distance * ease(progress));
    if (progress < 1) requestAnimationFrame(step);
  };
  requestAnimationFrame(step);
}

// 対象要素へスクロール（reduce motion は即時、ネイティブ対応なら scrollIntoView、非対応は自前アニメ）
export function smoothScrollToEl(target) {
  if (prefersReduced()) {
    target.scrollIntoView({ block: "start" });
    return;
  }
  if (supportsNativeSmooth()) {
    target.scrollIntoView({ behavior: "smooth", block: "start" });
    return;
  }
  const top = target.getBoundingClientRect().top + window.pageYOffset - getScrollMargin(target);
  animateScrollTo(Math.max(top, 0));
}

// ページ先頭へスクロール（reduce motion は即時、ネイティブ対応なら behavior:smooth、非対応は自前アニメ）
export function smoothScrollToTop() {
  if (prefersReduced()) {
    window.scrollTo(0, 0);
    return;
  }
  if (supportsNativeSmooth()) {
    window.scrollTo({ top: 0, behavior: "smooth" });
    return;
  }
  animateScrollTo(0);
}

// --- パンくずの「ページトップへ戻る」ボタン（href="#"） ---
document.addEventListener("click", event => {
  const totop = event.target.closest(".p-breadcrumb__totop");
  if (!totop) return;

  // 別タブで開く／修飾キー付きクリックはブラウザ標準動作に任せる
  if (totop.target === "_blank" || event.metaKey || event.ctrlKey || event.shiftKey) return;

  event.preventDefault();
  smoothScrollToTop();
});

// --- 同一ページ内リンク（クリック） ---
document.addEventListener("click", event => {
  const link = event.target.closest('a[href^="#"]');
  if (!link) return;

  // 別タブで開く／修飾キー付きクリックはブラウザ標準動作に任せる
  if (link.target === "_blank" || event.metaKey || event.ctrlKey || event.shiftKey) return;

  const href = link.getAttribute("href");
  if (!href || href === "#") return;

  const target = document.getElementById(decodeURIComponent(href.slice(1)));
  if (!target) return;

  event.preventDefault();
  smoothScrollToEl(target);

  // URL のハッシュを更新（履歴に残さず、追加のスクロールも起こさない）
  history.replaceState(null, "", href);
});

// --- 別ページ遷移後（読み込み時のハッシュ） ---
// head の func-anchor-scroll.php が window.__nishPendingHash に退避しつつ URL からハッシュを外している
// （ネイティブの即時ジャンプ＝チラつきを抑止）。ここで URL を復元し、先頭から滑らかにスクロールする。
function scrollToLoadedHash() {
  const hash = window.__nishPendingHash || window.location.hash;
  if (!hash || hash === "#") return;

  // URL にハッシュを復元（対象の有無に関わらず URL は元に戻す）
  if (window.__nishPendingHash) {
    const { pathname, search } = window.location;
    history.replaceState(null, "", pathname + search + hash);
    window.__nishPendingHash = "";
  }

  const target = document.getElementById(decodeURIComponent(hash.slice(1)));
  if (!target) return;

  // 画像読み込み後の最終レイアウトで正確な位置へ移動するため、1フレーム待ってからスクロール
  requestAnimationFrame(() => smoothScrollToEl(target));
}

// load を待つ（画像読み込みでレイアウトが確定してから正確な位置へ移動）
if (document.readyState === "complete") {
  scrollToLoadedHash();
} else {
  window.addEventListener("load", scrollToLoadedHash);
}

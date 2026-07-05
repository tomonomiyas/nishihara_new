// ページ内リンク（#セクション）の共通スムーススクロール
// href="#id" で対象要素が存在するリンクを一括で処理する（各ページ個別の実装は不要）。
// 別タブ・修飾キー付きクリック、対象が無いリンク（href="#" 等）は通常動作に任せる。

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

  const prefersReduced = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  target.scrollIntoView({ behavior: prefersReduced ? "auto" : "smooth", block: "start" });

  // URL のハッシュを更新（履歴に残さず、追加のスクロールも起こさない）
  history.replaceState(null, "", href);
});

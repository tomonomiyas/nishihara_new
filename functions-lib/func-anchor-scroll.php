<?php

/**
 * func-anchor-scroll
 * 別ページ遷移でアンカー付き URL（例: /sustainability/#system）を開いたときの、
 * ブラウザによるネイティブの即時ジャンプ（＝スクロールのチラつき）を抑止する head 用ブートストラップ。
 *
 * ・head 内で URL からハッシュを一旦外し、window.__nishPendingHash に退避する
 *   → ブラウザが対象要素へ即ジャンプしないため、フッターの script.js が
 *     読み込み後に「先頭から」滑らかにスクロールできる。
 * ・URL の復元と実際のスムーススクロールは src/assets/js/_smooth-scroll.js が担当。
 * ・JS 無効時はハッシュがそのまま残り、ブラウザ標準のジャンプで着地する（デグレなし）。
 */

function nish_anchor_scroll_head()
{
  ?>
  <script>
    (function () {
      try {
        var h = window.location.hash;
        if (h && h !== "#") {
          window.__nishPendingHash = h;
          history.replaceState(null, "", window.location.pathname + window.location.search);
        }
      } catch (e) {}
    })();
  </script>
  <?php
}
// 対象要素より前（head 内）で確実に実行するため優先度を高く
add_action('wp_head', 'nish_anchor_scroll_head', 1);

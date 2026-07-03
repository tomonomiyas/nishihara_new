<?php
/**
 * お知らせ ページネーション
 *
 * paginate_links() の配列出力を独自マークアップで描画する。
 * prev/next 矢印・数字・dots（…）を XD デザイン通りに再現。
 */

global $wp_query;
$total = isset($wp_query->max_num_pages) ? (int) $wp_query->max_num_pages : 1;
if ($total <= 1) {
  return;
}

$links = paginate_links([
  'type'      => 'array',
  'mid_size'  => 1,
  'end_size'  => 1,
  'prev_text' => '<span class="p-news__pagerArrow p-news__pagerArrow--prev" aria-hidden="true"></span><span class="u-sr-only">前へ</span>',
  'next_text' => '<span class="p-news__pagerArrow p-news__pagerArrow--next" aria-hidden="true"></span><span class="u-sr-only">次へ</span>',
]);

if (empty($links)) {
  return;
}
?>
<nav class="p-news__pager" aria-label="ページ送り">
  <ul class="p-news__pagerList">
    <?php foreach ($links as $link) : ?>
      <li class="p-news__pagerItem"><?php echo $link; ?></li>
    <?php endforeach; ?>
  </ul>
</nav>

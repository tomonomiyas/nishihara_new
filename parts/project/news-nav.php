<?php
/**
 * お知らせ カテゴリーナビ（右カラム / SPは下）
 *
 * 「すべて」＝ニュースアーカイブ全件 + 各カテゴリーへの絞り込みリンク。
 * 現在地（active）は font-weight で表現。
 */

// 現在地判定用
$is_all_current = (is_post_type_archive('news') && !is_tax('news_category'));

// カテゴリーターム一覧（投稿数0でも表示）
$news_terms = get_terms([
  'taxonomy'   => 'news_category',
  'hide_empty' => false,
  'orderby'    => 'term_id',
  'order'      => 'ASC',
]);

// アーカイブURL
$news_archive_url = get_post_type_archive_link('news');
?>
<aside class="p-news__side">
  <nav class="p-news__nav" aria-label="お知らせカテゴリー">
    <p class="p-news__navHead">お知らせ</p>
    <ul class="p-news__navList">
      <li class="p-news__navItem<?php echo $is_all_current ? ' p-news__navItem--current' : ''; ?>">
        <a class="p-news__navLink" href="<?php echo esc_url($news_archive_url); ?>">すべて</a>
      </li>
      <?php if (!is_wp_error($news_terms) && !empty($news_terms)) : ?>
        <?php foreach ($news_terms as $term) : ?>
          <?php // 活動報告はサステナビリティページ専用のため、お知らせのカテゴリーナビには出さない
          if ($term->slug === 'activity-report') {
            continue;
          } ?>
          <?php $is_current = (is_tax('news_category', $term->term_id)); ?>
          <li class="p-news__navItem<?php echo $is_current ? ' p-news__navItem--current' : ''; ?>">
            <a class="p-news__navLink" href="<?php echo esc_url(get_term_link($term)); ?>"><?php echo esc_html($term->name); ?></a>
          </li>
        <?php endforeach; ?>
      <?php endif; ?>
    </ul>
  </nav>
</aside>

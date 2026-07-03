<?php
/**
 * お知らせ 記事リスト（archive-news / taxonomy-news_category 共用）
 *
 * メインクエリの投稿を表示する。投稿が0件の場合はレイアウト確認用のダミーを表示。
 */
?>
<ul class="p-news__list">
  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
      <?php
      // この投稿のお知らせカテゴリーを取得（先頭1件をラベル表示）
      $terms = get_the_terms(get_the_ID(), 'news_category');
      $cat_name = (!is_wp_error($terms) && !empty($terms)) ? $terms[0]->name : 'お知らせ';
      ?>
      <li class="p-news__item">
        <a class="p-news__link" href="<?php the_permalink(); ?>">
          <div class="p-news__meta">
            <time class="p-news__date" datetime="<?php echo esc_attr(get_the_date('Y-m-d')); ?>"><?php echo esc_html(get_the_date('Y.m.d')); ?></time>
            <span class="p-news__cat"><?php echo esc_html($cat_name); ?></span>
          </div>
          <p class="p-news__itemTitle"><?php the_title(); ?></p>
        </a>
      </li>
    <?php endwhile; ?>
  <?php else : ?>
    <?php
    // 投稿が無い場合のダミー表示（レイアウト確認用・運用開始後は実投稿に置き換わる）
    $dummy_cats = ['お知らせ', 'プレスリリース', '広告ライブラリ', 'サステナビリティ'];
    for ($i = 0; $i < 10; $i++) :
      $cat = $dummy_cats[$i % 4];
    ?>
      <li class="p-news__item">
        <a class="p-news__link" href="#">
          <div class="p-news__meta">
            <time class="p-news__date" datetime="2026-01-01">2026.01.01</time>
            <span class="p-news__cat"><?php echo esc_html($cat); ?></span>
          </div>
          <p class="p-news__itemTitle">お知らせのタイトルが入ります。</p>
        </a>
      </li>
    <?php endfor; ?>
  <?php endif; ?>
</ul>

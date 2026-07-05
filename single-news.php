<?php

/**
 * お知らせ 詳細（カスタム投稿タイプ news の single テンプレート）
 *
 * レイアウトはアーカイブ（archive-news）と共通の 2 カラム（左：記事本文／右：カテゴリーナビ）。
 * 右カラムは archive と同じ parts/project/news-nav を再利用する。
 */

// 一覧（アーカイブ）へのリンク
$news_archive_url = get_post_type_archive_link('news');

get_header(); ?>
<main class="l-page p-news-page">

  <!-- 下層共通FV -->
  <section class="p-pageHead">
    <div class="p-pageHead__inner l-inner">
      <h1 class="p-pageHead__title">お知らせ</h1>
    </div>
  </section>

  <!-- news本体 -->
  <section class="p-news">
    <div class="p-news__inner l-inner">
      <div class="p-news__body">

        <!-- 左：記事本文 -->
        <div class="p-news__main">
          <?php while (have_posts()) : the_post(); ?>
            <?php
            // この投稿のお知らせカテゴリー（先頭1件をラベル表示）
            $terms    = get_the_terms(get_the_ID(), 'news_category');
            $cat_name = (!is_wp_error($terms) && !empty($terms)) ? $terms[0]->name : 'お知らせ';
            ?>
            <article class="p-newsSingle">

              <div class="p-news__meta">
                <time class="p-news__date" datetime="<?php echo esc_attr(get_the_date('Y-m-d')); ?>"><?php echo esc_html(get_the_date('Y.m.d')); ?></time>
                <span class="p-news__cat"><?php echo esc_html($cat_name); ?></span>
              </div>

              <h2 class="p-newsSingle__title"><?php the_title(); ?></h2>

              <div class="p-newsSingle__content">
                <?php the_content(); ?>
              </div>

              <!-- フッターアクション（一覧に戻る／SNS共有） -->
              <div class="p-newsSingle__footer">
                <ul class="p-newsSingle__share">
                  <li class="p-newsSingle__shareItem">
                    <a class="p-newsSingle__shareBtn p-newsSingle__shareBtn--x"
                      href="https://twitter.com/intent/tweet?url=<?php echo rawurlencode(get_permalink()); ?>&text=<?php echo rawurlencode(get_the_title()); ?>"
                      target="_blank" rel="noopener noreferrer" aria-label="Xで共有">
                      <img src="<?php img_path('/icon_share-x.svg'); ?>" alt="" width="24" height="24" loading="lazy" decoding="async">
                    </a>
                  </li>
                  <li class="p-newsSingle__shareItem">
                    <a class="p-newsSingle__shareBtn p-newsSingle__shareBtn--fb"
                      href="https://www.facebook.com/sharer/sharer.php?u=<?php echo rawurlencode(get_permalink()); ?>"
                      target="_blank" rel="noopener noreferrer" aria-label="Facebookで共有">
                      <img src="<?php img_path('/icon_share-fb.svg'); ?>" alt="" width="36" height="36" loading="lazy" decoding="async">
                    </a>
                  </li>
                  <li class="p-newsSingle__shareItem">
                    <button type="button"
                      class="p-newsSingle__shareBtn p-newsSingle__shareBtn--copy js-copyUrl"
                      data-copy-url="<?php echo esc_url(get_permalink()); ?>"
                      aria-label="記事のURLをコピー">
                      <img src="<?php img_path('/icon_share-copy.svg'); ?>" alt="" width="27" height="30" loading="lazy" decoding="async">
                      <span class="p-newsSingle__copyToast" aria-hidden="true">コピーしました</span>
                    </button>
                  </li>
                </ul>

                <a class="p-newsSingle__back" href="<?php echo esc_url($news_archive_url); ?>">
                  <span class="p-newsSingle__backIcon" aria-hidden="true">
                    <img src="<?php img_path('/icon_arrow-left.svg'); ?>" alt="" width="6" height="12" loading="lazy" decoding="async">
                  </span>
                  <span class="p-newsSingle__backText">お知らせ一覧に戻る</span>
                </a>
              </div>

            </article>
          <?php endwhile; ?>
        </div>

        <!-- 右：カテゴリーナビ（archive と共通） -->
        <?php get_template_part('parts/project/news-nav'); ?>

      </div>
    </div>
  </section>

  <!-- 下層共通パンくず（フッター直前） -->
  <div class="p-breadcrumb l-breadcrumb">
    <div class="p-breadcrumb__inner l-inner">
      <div class="p-breadcrumb__wrapper" typeof="BreadcrumbList" vocab="https://schema.org/">
        <?php if (function_exists('bcn_display')) : ?>
          <?php bcn_display(); ?>
        <?php else : ?>
          <a href="<?php page_path(); ?>">トップページ</a><span class="separator">&gt;</span><a href="<?php echo esc_url($news_archive_url); ?>">お知らせ</a><span class="separator">&gt;</span><?php the_title(); ?>
        <?php endif; ?>
      </div>
      <a href="#" class="p-breadcrumb__totop" aria-label="ページトップへ戻る">
        <span class="p-breadcrumb__totopArrow"></span>
      </a>
    </div>
  </div>

</main>
<?php get_footer(); ?>

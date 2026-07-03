<?php
/**
 * お知らせ一覧（カスタム投稿 news のアーカイブ）
 * カテゴリー絞り込み（taxonomy-news_category）もこのテンプレートを共用。
 */

// タブ見出し：カテゴリー絞り込み中はカテゴリー名、それ以外は「すべて」
$news_tab_title = 'すべて';
if (is_tax('news_category')) {
  $current_term = get_queried_object();
  if ($current_term && !is_wp_error($current_term)) {
    $news_tab_title = $current_term->name;
  }
}

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

        <!-- 左：記事リスト -->
        <div class="p-news__main">
          <div class="p-news__tab">
            <h2 class="p-news__tabTitle"><?php echo esc_html($news_tab_title); ?></h2>
          </div>

          <?php get_template_part('parts/project/news-list'); ?>

          <?php get_template_part('parts/project/news-pager'); ?>
        </div>

        <!-- 右：カテゴリーナビ -->
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
          <a href="<?php page_path(); ?>">トップページ</a><span class="separator">&gt;</span>お知らせ
        <?php endif; ?>
      </div>
      <a href="#" class="p-breadcrumb__totop" aria-label="ページトップへ戻る">
        <span class="p-breadcrumb__totopArrow"></span>
      </a>
    </div>
  </div>

</main>
<?php get_footer(); ?>

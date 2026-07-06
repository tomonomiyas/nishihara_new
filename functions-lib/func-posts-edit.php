<?php
/**
 * *********************************************************
 *  メインクエリの投稿記事表示件数を切り替える
 *  管理画面の表示設定と切り替えしたい場合使用します
 * *********************************************************
 */
function custom_main_query($query)
{
  // 管理画面、メインクエリ以外には適用しない
  if (is_admin() || !$query->is_main_query()) {
    return;
  }
  if (wp_is_mobile()) {
    $query->set('posts_per_page', '4');//SP用投稿数設定
  }

  // お知らせ一覧（/news/）・カテゴリー別アーカイブは PC/SP とも1ページ10件。
  // ※ 上の wp_is_mobile 設定より後に置いて上書きする。
  if ($query->is_post_type_archive('news') || $query->is_tax('news_category')) {
    $query->set('posts_per_page', 10);
  }
}
add_action('pre_get_posts', 'custom_main_query');

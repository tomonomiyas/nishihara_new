<?php
/**
 * News（お知らせ）のカスタム投稿・カスタムタクソノミーを設定
 */

// 投稿タイプ 'news' を登録
add_action('init', 'my_add_custom_post_news');
function my_add_custom_post_news()
{
  register_post_type(
    'news', // 新しい投稿タイプの名前
    array(
      'label' => 'お知らせ', // 管理画面に表示される投稿タイプの名前
      'labels' => array(
        'name' => 'お知らせ',
        'all_items' => 'お知らせ一覧',
      ),
      'public' => true,
      'has_archive' => true,
      'menu_position' => 5,                  // メニュー表示位置
      'menu_icon' => 'dashicons-megaphone',  // メニューアイコン
      'show_in_rest' => true,                // ブロックエディタを有効にする
      'supports' => array(
        'title',
        'editor',
        'thumbnail',
        'revisions',
      ),
    )
  );
}

// カスタムタクソノミー 'news_category'（お知らせカテゴリー）を登録
add_action('init', 'my_add_taxonomy_news_category');
function my_add_taxonomy_news_category()
{
  register_taxonomy(
    'news_category', // タクソノミーの名前
    'news',          // 紐づける投稿タイプ
    array(
      'label' => 'お知らせカテゴリー',
      'labels' => array(
        'name' => 'お知らせカテゴリー',
        'all_items' => 'カテゴリー一覧',
        'edit_item' => 'カテゴリーを編集',
        'add_new_item' => '新規カテゴリーを追加',
      ),
      'public' => true,
      'hierarchical' => true,    // カテゴリー形式（チェックボックスで選択）
      'show_in_rest' => true,    // ブロックエディタで利用可能にする
      'show_admin_column' => true, // 投稿一覧にカラム表示
      'rewrite' => array('slug' => 'news_category'),
    )
  );
}

// 初期カテゴリー（ターム）を自動登録
add_action('init', 'my_register_default_news_categories', 11);
function my_register_default_news_categories()
{
  if (!taxonomy_exists('news_category')) {
    return;
  }

  $default_terms = array(
    'notice'         => 'お知らせ',
    'press-release'  => 'プレスリリース',
    'ad-library'     => '広告ライブラリ',
    'sustainability' => 'サステナビリティ',
  );

  foreach ($default_terms as $slug => $name) {
    if (!term_exists($slug, 'news_category')) {
      wp_insert_term($name, 'news_category', array('slug' => $slug));
    }
  }
}

// カスタム投稿 'news' 登録後にリライトルールを1度だけフラッシュする
// （新規投稿タイプ・タクソノミーのパーマリンクを有効化するため）
add_action('init', 'my_news_flush_rewrite_once', 99);
function my_news_flush_rewrite_once()
{
  if (get_option('my_news_rewrite_flushed') !== 'yes') {
    flush_rewrite_rules(false);
    update_option('my_news_rewrite_flushed', 'yes');
  }
}

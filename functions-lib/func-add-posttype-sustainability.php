<?php
/**
 * Sustainability（活動報告）のカスタム投稿を設定
 *
 * - 投稿タイプ 'sustainability' を登録（ラベル「活動報告」）
 * - アーカイブ（/sustainability/）を sustainability ページのデザインとして使用する
 *   → テンプレートは archive-sustainability.php
 */

add_action('init', 'my_add_custom_post_sustainability');
function my_add_custom_post_sustainability()
{
  register_post_type(
    'sustainability', // 投稿タイプの名前（= rewrite slug。URL: /sustainability/{投稿}）
    array(
      'label' => '活動報告', // 管理画面に表示される投稿タイプの名前
      'labels' => array(
        'name' => '活動報告',
        'all_items' => '活動報告一覧',
      ),
      'public' => true,
      'has_archive' => true,                   // /sustainability/ アーカイブを有効化
      'menu_position' => 7,                     // メニュー表示位置
      'menu_icon' => 'dashicons-chart-line',    // メニューアイコン
      'show_in_rest' => true,                   // ブロックエディタを有効にする
      'supports' => array(
        'title',
        'editor',
        'thumbnail',
        'revisions',
      ),
    )
  );
}

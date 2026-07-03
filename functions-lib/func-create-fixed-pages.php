<?php

/**
 * テーマで使用する固定ページを一度だけ自動作成する
 *
 * WP-CLI が使えない Local 環境向け。init フックで存在チェックし、
 * 無ければスラッグ・タイトル・テンプレートを指定して固定ページを生成する。
 * 一度作成したらフラグを立て、重複生成しない。
 */

add_action('init', 'my_create_fixed_pages_once', 100);
function my_create_fixed_pages_once()
{
    if (get_option('my_fixed_pages_created') === 'yes') {
        return;
    }

    // 作成する固定ページ定義: slug => [title, template]
    $pages = [
        'contact' => ['お問い合わせ', 'page-contact.php'],
    ];

    foreach ($pages as $slug => $data) {
        list($title, $template) = $data;

        // 既存チェック（同スラッグの固定ページがあればスキップ）
        $existing = get_page_by_path($slug, OBJECT, 'page');
        if ($existing) {
            if ($template) {
                update_post_meta($existing->ID, '_wp_page_template', $template);
            }
            continue;
        }

        $page_id = wp_insert_post([
            'post_title'   => $title,
            'post_name'    => $slug,
            'post_type'    => 'page',
            'post_status'  => 'publish',
            'post_content' => '',
        ]);

        if ($page_id && !is_wp_error($page_id) && $template) {
            update_post_meta($page_id, '_wp_page_template', $template);
        }
    }

    update_option('my_fixed_pages_created', 'yes');
}

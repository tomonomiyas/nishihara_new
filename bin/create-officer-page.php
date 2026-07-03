<?php
/**
 * 役員一覧（officer）固定ページを作成するワンショットスクリプト。
 * Local の WordPress 環境をロードし、親 company/overview 配下に
 * スラッグ officer の固定ページを作成（既存なら何もしない）。
 *
 * 実行: php bin/create-officer-page.php
 */

// DB 接続を Local の socket へ向ける（root は localhost(socket) からのみ接続許可のため）
// wp-config.php より先に DB_HOST を定義してしまうと wp-config が再定義警告を出すため、
// ここでは定義せず、後段で wp-config の DB_HOST(localhost) を socket 付きへ差し替える。
define('OFFICER_DB_SOCKET', '/Users/inouetomoya/Library/Application Support/Local/run/PQmLpmgSC/mysql/mysqld.sock');
define('DB_HOST', 'localhost:' . OFFICER_DB_SOCKET);

// WordPress をロード（bin → nishihara → themes → wp-content → public/wp-load.php）
require dirname(__DIR__, 4) . '/wp-load.php';

/**
 * スラッグ + 親IDから既存ページを探す
 */
function find_page_by_slug_parent($slug, $parent_id) {
    $q = get_posts([
        'post_type'   => 'page',
        'name'        => $slug,
        'post_parent' => $parent_id,
        'post_status' => 'any',
        'numberposts' => 1,
    ]);
    return $q ? $q[0] : null;
}

// 親階層 company → overview を解決（無ければ作成）
$company = get_page_by_path('company');
if (!$company) {
    fwrite(STDERR, "親ページ company が見つかりません。中断します。\n");
    exit(1);
}

$overview = get_page_by_path('company/overview');
if (!$overview) {
    $overview_id = wp_insert_post([
        'post_type'    => 'page',
        'post_title'   => '会社案内',
        'post_name'    => 'overview',
        'post_parent'  => $company->ID,
        'post_status'  => 'publish',
        'post_content' => '',
    ]);
    echo "overview ページを新規作成しました (ID: {$overview_id})\n";
} else {
    $overview_id = $overview->ID;
    echo "overview ページは既存 (ID: {$overview_id})\n";
}

// officer ページ
$existing = find_page_by_slug_parent('officer', $overview_id);
if ($existing) {
    echo "officer ページは既に存在します (ID: {$existing->ID}, status: {$existing->post_status})\n";
    echo "URL: " . get_permalink($existing->ID) . "\n";
    exit(0);
}

$officer_id = wp_insert_post([
    'post_type'    => 'page',
    'post_title'   => '役員一覧',
    'post_name'    => 'officer',
    'post_parent'  => $overview_id,
    'post_status'  => 'publish',
    'post_content' => '',
]);

if (is_wp_error($officer_id) || !$officer_id) {
    fwrite(STDERR, "officer ページの作成に失敗しました。\n");
    exit(1);
}

echo "officer ページを新規作成しました (ID: {$officer_id})\n";
echo "URL: " . get_permalink($officer_id) . "\n";

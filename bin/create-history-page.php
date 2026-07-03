<?php
// history（グループのあゆみ）固定ページを company 配下に作成する
$sock = '/Users/inouetomoya/Library/Application Support/Local/run/PQmLpmgSC/mysql/mysqld.sock';
$db = new mysqli('localhost', 'root', 'root', 'local', 0, $sock);
if ($db->connect_error) {
    fwrite(STDERR, "接続失敗: " . $db->connect_error . "\n");
    exit(1);
}
$db->set_charset('utf8mb4');

$parent = 27; // company
$slug = 'history';
$title = 'グループのあゆみ';

// 既存チェック
$res = $db->query("SELECT ID FROM wp_posts WHERE post_type='page' AND post_name='" . $db->real_escape_string($slug) . "' AND post_parent=$parent");
if ($res->num_rows > 0) {
    $row = $res->fetch_assoc();
    echo "既に存在します ID={$row['ID']}\n";
    $db->close();
    exit(0);
}

$now = date('Y-m-d H:i:s');
$gmt = gmdate('Y-m-d H:i:s');
$stmt = $db->prepare("INSERT INTO wp_posts
    (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_name, to_ping, pinged, post_content_filtered, post_modified, post_modified_gmt, post_parent, menu_order, post_type, comment_count)
    VALUES (1, ?, ?, '', ?, '', 'publish', 'closed', 'closed', ?, '', '', '', ?, ?, ?, 0, 'page', 0)");
$stmt->bind_param('ssssssi', $now, $gmt, $title, $slug, $now, $gmt, $parent);
$stmt->execute();
$id = $db->insert_id;

// guid 設定
$guid = "http://nishihara.local/?page_id=$id";
$db->query("UPDATE wp_posts SET guid='" . $db->real_escape_string($guid) . "' WHERE ID=$id");

echo "作成しました ID=$id slug=$slug parent=$parent\n";
$db->close();

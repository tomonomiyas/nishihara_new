<?php
// Local の MySQL ソケットへ直接接続して固定ページを一覧/操作する
$sock = '/Users/inouetomoya/Library/Application Support/Local/run/PQmLpmgSC/mysql/mysqld.sock';
$db = new mysqli('localhost', 'root', 'root', 'local', 0, $sock);
if ($db->connect_error) {
    fwrite(STDERR, "接続失敗: " . $db->connect_error . "\n");
    exit(1);
}
$db->set_charset('utf8mb4');

$res = $db->query("SELECT ID, post_name, post_parent, post_title, post_status FROM wp_posts WHERE post_type='page' AND post_status IN ('publish','draft') ORDER BY post_parent, menu_order");
while ($row = $res->fetch_assoc()) {
    echo "{$row['ID']}\t{$row['post_name']}\t親:{$row['post_parent']}\t[{$row['post_status']}]\t{$row['post_title']}\n";
}
$db->close();

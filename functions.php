<?php

/**
 * Functions
 */
// 基本設定
get_template_part('functions-lib/func-base');

// セキュリティー対応
get_template_part('functions-lib/func-security');

// All-in-One WP Migrationによるエクスポート除外設定
get_template_part('functions-lib/func-add-ai1wm-exclude');

// ショートコードの設定
get_template_part('functions-lib/func-shortcode');

// URLのショートカット設定
get_template_part('functions-lib/func-url');

// スクリプト、スタイルシートの設定
get_template_part('functions-lib/func-enqueue-assets');

// 別ページ遷移時のアンカー・スムーススクロール（head でネイティブ即時ジャンプを抑止）
get_template_part('functions-lib/func-anchor-scroll');

// デフォルト投稿タイプのラベル変更
get_template_part('functions-lib/func-add-posttype-post');

// カスタム投稿（お知らせ news）の設定
// ※ 広告ライブラリは独立した投稿タイプではなく news_category の「広告ライブラリ」カテゴリーで運用する
get_template_part('functions-lib/func-add-posttype-news');

// カスタム投稿（活動報告 sustainability）の設定
get_template_part('functions-lib/func-add-posttype-sustainability');

// テーマで使用する固定ページの自動作成（contact 等）
get_template_part('functions-lib/func-create-fixed-pages');

// お問い合わせフォームの送信処理（admin-post.php 経由）
get_template_part('functions-lib/func-contact-form');

// 投稿が指定した日数以内であるか判定（未設定の場合は7日）
// ※未検証
get_template_part('functions-lib/func-utility');

// メインクエリのSP表示件数設定
// ※未検証
get_template_part('functions-lib/func-posts-edit');

// メンテナンスモード
// get_template_part('functions-lib/func-maintenance-mode');

// YouTubeのoEmbedを修正（チャンネル外の関連動画を非表示）
get_template_part('functions-lib/func-modify-youtube-oembed');

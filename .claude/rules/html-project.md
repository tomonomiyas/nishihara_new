# HTML / PHP プロジェクトルール（nishihara_new）

グローバル共通ルール（`~/.claude/rules/html-global.md`）を前提に、このプロジェクト固有の実態を定義する。
**衝突時はこのファイル（project）が global を上書きする。**

WordPress テーマ（西原商事HD）。Vite + FLOCSS + BEM の静的テンプレートを WP 移植したもの。

---

## 1. テンプレート構成

- 全テンプレートは先頭 `<?php get_header(); ?>`・末尾 `<?php get_footer(); ?>` で囲む。
- パーシャルは **`get_template_part()`**。ディレクトリは `template-parts/` ではなく **`parts/`**：
  ```php
  get_template_part('parts/common/breadcrumb');
  get_template_part('parts/project/news-list');
  ```
  - `parts/common/` … 汎用（`adjust-admin-bar` など）
  - `parts/project/` … 案件固有（`mv` `news-list` `news-nav` `news-pager` `breadcrumb` など）
- 固定ページは `page-{slug}.php`（`page-company.php` `page-message.php` `page-contact.php` …）。
- カスタム投稿タイプ: `news` / `sustainability` / `ad-library` / `works`、タクソノミー `news_category`。
- `functions.php` は薄いローダーで、実処理は `functions-lib/func-*.php` に分割（新規のグローバル関数はこの流儀で追加）。

---

## 2. URL / パスヘルパー（必須・ベタ書き禁止）

`functions-lib/func-url.php` のヘルパーを必ず使う（いずれも echo する関数）。

| 用途 | ヘルパー | 例 → 出力 |
|---|---|---|
| 内部リンク | `page_path('slug')` | `page_path('company/message')` → `.../company/message/` |
| 〃 ホーム | `page_path()` | → `.../`（末尾スラッシュ付与） |
| 〃 アンカー/ファイル | `page_path('#works')` / `page_path('a.pdf')` | スラッシュ**付けない**（`#`/`?`/拡張子を検出） |
| 画像 | `img_path('/xxx.png')` | → `.../assets/images/xxx.png` |
| テーマ直下ファイル | `temp_path('/favicon.ico')` | → `.../favicon.ico` |
| assets 配下 | `assets_path('/js/x.js')` | → `.../assets/js/x.js` |
| アップロード(media) | `uploads_path()` | → メディアライブラリの baseurl |

```php
<a href="<?php page_path('business'); ?>" class="c-btn">事業紹介</a>
```

---

## 3. セマンティック構造 / マークアップ規約

- `<main>` にレイアウトクラス：トップは `<main class="l-top">`、下層は `<main class="l-page p-xxx-page">`。
- セクションは `<section class="p-...">`。既存は各セクションに番号コメント（`<!-- 04 News Section -->`）を付ける流儀。
- `<header class="p-header l-header">` / `<footer class="p-footer">` のように **`p-`（見た目）＋ `l-`（レイアウト）を併記**することがある。
- `nav` / `ul`・`li`・`a` / `address` / `picture` を用途どおり使う。**構造だけの `<div>` 以外に `<div>` を使わない**（global 準拠）。
- ナビ・リスト項目は `__list > __item` の `ul/li/a` 構造（`<div>` で代用しない）。

### インナー幅（コンテンツ幅ラッパー）
共通 **`l-inner`** を、ブロックの `__inner` 要素に**第2クラスとして併記**する：
```php
<div class="p-footer__inner l-inner"> … </div>
<div class="p-pageHead__inner l-inner"> … </div>
```
- セクション専用インナーを単独で新規作成しない。
- フルブリード（`p-top-mv` `p-top-links` 等）は独自 `__inner` を使い `l-inner` を付けない。

---

## 4. 見出し（コア規約）★

**見出しの実体は「和文」＝意味的な `h1/h2/h3` に置く。装飾の「英字」は `<p>` / `<span>`（Inter・アクセント色）。**

実装パターン（既存の3系統。近いものに合わせる）:
```php
<!-- c-section-title コンポーネント -->
<div class="c-section-title c-section-title--with-line">
  <h2 class="c-section-title__ja">新着情報</h2>
  <p  class="c-section-title__en">News</p>
</div>
<!-- variant: __ja--white / --lg / --with-line -->

<!-- メガメニュー -->
<p  class="p-megamenu__title-en">About us</p>
<h2 class="p-megamenu__title-main">会社案内</h2>

<!-- フッターナビ -->
<span class="p-footer__nav-en">Company</span>
<span class="p-footer__nav-title">会社案内</span>
```

- **`h1` は1ページ1つ。** トップページはロゴを `h1`、下層はページ見出しを `h1`：
  ```php
  <?php $tag = is_front_page() ? 'h1' : 'div'; ?>
  <<?php echo $tag; ?> class="p-header__logo"> … </<?php echo $tag; ?>>
  ```
  下層は `<h1 class="p-pageHead__title">会社案内</h1>`。
- 見出しレベルを飛ばさない（h1 → h2 → h3）。装飾フォントの大小で見出しタグを決めない。

---

## 5. 共通コンポーネント

- **ボタン**: `c-btn`（modifier: `--back` `--submit` `--large` `--contact`）。`<a>` と `<button type="submit">` の両方で使う。ボタン状の要素は必ず `<a>` / `<button>`（装飾 `<div>` で組まない）。遷移先未定は `href="#"`。
- **リンク**: テキストリンク `c-link`、アニメ下線 `c-line`。
- **共通コンポーネントに直接 `margin` を持たせない。** ページ固有の余白はラッパー `<div>`（例 `p-xxx__btnWrap`）で制御。

---

## 6. 画像

- 原則 **`<picture>` に WebP `<source>` ＋ PNG/JPG `<img>` フォールバック**、パスは `img_path()` 経由：
  ```php
  <picture>
    <source srcset="<?php img_path('/top_mv_01.webp'); ?>" type="image/webp">
    <img src="<?php img_path('/top_mv_01.png'); ?>" width="1920" height="420"
         alt="" loading="lazy" decoding="async">
  </picture>
  ```
- **`width` / `height` を付与**（CLS 対策）。
- **`loading="lazy"` ＋ `decoding="async"` を全画像で標準化**（既存は不統一なので新規・改修時は必ず付ける）。
  - 例外：ファーストビュー（LCP）のヒーロー画像のみ `fetchpriority="high"` を付け、`loading="lazy"` は付けない。
- `alt`: 装飾画像は `alt=""`、内容/ロゴ画像は和文 alt（例 `alt="株式会社西原商事ホールディングス"`）。背景相当の画像に不要な alt を付けない。

---

## 7. JS フック / 状態 / ARIA

- `js-` はビヘイビア専用・**無スタイル**（CSS で参照しない）。状態は `is-`。
- アコーディオン/ドロワー/メガメニュー等は ARIA を既存踏襲で付与：`aria-expanded` / `aria-controls` / `aria-hidden` / `aria-label`。
- フォーム入力は `<label for>` と `id` を必ず関連付ける。

---

## 8. ビルド運用

- **編集は `src/` のみ。`assets/`（コンパイル済み・gitignore）は触らない。**
- パッケージマネージャは **yarn**。`yarn dev`（watch）/ `yarn build`（`format` → `assets` 削除 → `vite build`）。
- ランタイムは `assets/css/style.css` / `assets/js/script.js` を `filemtime` キャッシュバスト付きで enqueue（`functions-lib/func-enqueue-assets.php`）。フォントは Noto Sans JP（Google Fonts）、jQuery 3.6.1 + Splide を CDN 読み込み。

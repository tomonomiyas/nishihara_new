# WordPress 開発環境 (Vite + FLOCSS)

## 使用環境

- **Node.js**: v18以上推奨
- **パッケージマネージャー**: Yarn (または npm)
- **ビルドツール**: Vite

## 導入手順

1. テーマ直下（このファイルがあるディレクトリ）で以下のコマンドを実行し、依存パッケージをインストールします。
   ```bash
   yarn install
   # または
   npm install
   ```

## 開発・ビルドコマンド

- **開発モード (監視)**:

  ```bash
  yarn dev
  ```

  - SCSS/JS/画像の変更を監視し、自動的に `assets/` フォルダへビルド・反映します。

- **本番ビルド**:
  ```bash
  yarn build
  ```

  - `assets/` フォルダを一旦クリアし、最適化されたアセットファイルを再生成します。納品前や反映前に実行してください。

## 主要なディレクトリ構造

Vite環境では `src/` フォルダ内のソースを編集し、`assets/` フォルダへ自動出力されたファイルをWordPress側で読み込みます。

- `src/` : 開発ソース
  - `assets/styles/` : CSS設計 (FLOCSS)
    - `foundation/` : リセットCSS、変数、共通Mixin
    - `global/` : サイト全般の設定
    - `layouts/` : ヘッダー、フッター等の共通レイアウト
    - `components/` : 再利用可能な最小パーツ (Button, Card等)
    - `projects/` : 各ページ固有のスタイル
    - `utilities/` : 汎用クラス (Margin, Padding等)
  - `assets/js/` : JavaScriptファイル
- `assets/` : **編集禁止** (ビルド出力先)
  - `css/style.css` : ビルド後のメインCSS
  - `js/script.js` : ビルド後のメインJS
- `src_old_gulp/` : 旧Gulp環境のバックアップ（不要になったら削除してください）

## WordPress側での読み込み

`functions.php` 等で以下のパスを指定して読み込んでいます。

- CSS: `get_theme_file_uri() . '/assets/css/style.css'`
- JS: `get_theme_file_uri() . '/assets/js/script.js'`
# nishihara

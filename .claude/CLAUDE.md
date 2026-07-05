# nishihara_new — プロジェクト指示

WordPress テーマ（株式会社西原商事ホールディングス）。Vite + FLOCSS + BEM の静的テンプレートを WP 移植したもの。
SCSS ソースは `src/assets/styles/`、Vite が `assets/css/style.css` にコンパイルし、PHP テンプレートがそれを読み込む。

## コーディング前に読むルール

作業内容に応じて、**グローバル共通ルール → プロジェクト固有ルール** の順に両方読む（project が global を上書きする）:

- **SCSS/CSS を書くとき** → `~/.claude/rules/scss-global.md` ＋ `.claude/rules/scss-project.md`
- **HTML/PHP（テンプレート）を書くとき** → `~/.claude/rules/html-global.md` ＋ `.claude/rules/html-project.md`

## 編集の鉄則（詳細は上記ルールファイル）

- **編集は `src/` のみ。`assets/`（コンパイル済み・gitignore）は絶対に編集しない**（`yarn build` で再生成される）。
- SCSS: FLOCSS 接頭辞 `l-/c-/p-/u-` + BEM。単位は `calc(<px> * var(--to-rem))`。ブレークポイントは `@include mq("md")`（SP ファースト min-width）。色/余白/フォントは `global/_variables.scss` の CSS 変数を参照（ハードコード禁止）。1ブロック=1パーシャルを所定フォルダに置けば glob で自動集約。
- HTML/PHP: 内部リンクは `page_path()`、画像は `img_path()` ＋ `<picture>`（WebP＋フォールバック、`loading="lazy"` `decoding="async"`）。見出しは和文＝意味的タグ・英字＝装飾 `p`/`span`。`h1` は1ページ1つ。インナー幅は `l-inner` を `__inner` に併記。

## パッケージマネージャ / ビルド

- yarn。`yarn dev`（開発 watch）/ `yarn build`（本番ビルド）。

# SCSS プロジェクトルール（nishihara_new）

グローバル共通ルール（`~/.claude/rules/scss-global.md`）を前提に、このプロジェクト固有の実態を定義する。
**衝突時はこのファイル（project）が global を上書きする。**

---

## 1. ディレクトリ構造・配置

SCSS ソースは `src/assets/styles/` のみを編集する（FLOCSS 変種）。

```
src/assets/styles/
├── style.scss            # ルートエントリ（glob で全層を集約）
├── foundation/           # _reset.scss / _base.scss
├── global/               # _variables.scss / _breakpoints.scss / _index.scss（設定層）
├── layouts/              # _l-*.scss
├── components/           # _c-*.scss
├── projects/             # _p-*.scss
└── utilities/            # _u-*.scss
```

- **1ブロック = 1パーシャル**（`_c-btn.scss` / `_p-about.scss` / `_l-inner.scss` / `_u-text.scss`）。
- `style.scss` が glob インポートで全層を自動集約する（`vite-plugin-sass-glob-import`）:
  ```scss
  @use "foundation";
  @use "global";
  @use "layouts/**";
  @use "components/**";
  @use "projects/**";
  @use "utilities/**";
  ```
  → **新規パーシャルは所定フォルダに置くだけで取り込まれる。`style.scss` への追記は不要。**
- コンパイル済み `assets/css/style.css` は **編集禁止**（gitignore・`yarn build` で再生成）。

### パーシャル先頭の `@use`
`mq()` ミックスインや `$breakpoints` マップを使うパーシャルは、先頭に必須：
```scss
@use "../global" as *;
```
（CSS カスタムプロパティ＝トークンは実行時にグローバルなので import 不要。`@use` が要るのは `mq()` を使う時。）

---

## 2. 命名規則（FLOCSS + BEM）

| 接頭辞 | 層 | 例 |
|---|---|---|
| `l-` | layout | `.l-inner` `.l-header` `.l-top` `.l-page` |
| `c-` | component（再利用パーツ） | `.c-btn` `.c-section-title` `.c-link` `.c-line` `.c-card` |
| `p-` | project（ページ/セクション固有） | `.p-about` `.p-header` `.p-megamenu` `.p-footer` |
| `u-` | utility | `.u-text` `.u-sr-only` `.u-only-device` |
| `js-` | JSフック（**無スタイル**・CSSで参照しない） | `.js-hamburger` `.js-megamenu-trigger` |
| `is-` | 状態 | `.is-static` `.is-active` |

- BEM: `__element` / `--modifier`（例 `.p-about__cardLink` `.c-btn--back`）。
- **ブロック名の複数語は kebab / camel が混在**（`p-page-head` と `p-pageHead`、`p-top-news` と `p-contactConfirm`）。統一しようとせず、**近接する既存ファイルの流儀に合わせる**。

### モディファイア／エレメントの書き方（★global を上書き）
- **モディファイア `--modifier` はベースブロック内に `&--` でネストしてよい**（このプロジェクトの既存流儀）。global の「`&` は疑似要素/疑似クラスのみ」はこの点だけ上書きする。
- **エレメント `__el` はフラットな独立セレクタ**で書く（ベース内にネストしない）。
- セレクタ同士の入れ子は引き続き禁止。例外は「メディアクエリ」「`&::before/&::after`」「`&:hover` 等の疑似」「`&--modifier`」のみ。

```scss
@use "../global" as *;

/* OK: エレメントはフラット、モディファイアと疑似はネスト */
.c-btn {
  display: inline-flex;
  transition: background-color var(--duration);

  &::after { /* 矢印 */ }

  &--large { width: calc(240 * var(--to-rem)); }  /* モディファイアは & でOK */

  @media (any-hover: hover) {
    &:hover { background-color: var(--color-white); }
  }
}

.c-btn__label {   /* エレメントはフラットに独立して書く */
  font-weight: var(--fw-medium);
}
```

---

## 3. 単位：`calc(<px> * var(--to-rem))`

px→rem 変換は **CSS 変数 `--to-rem`** で行う（`rem()`/`vw()` の SCSS 関数は存在しない）。

```scss
width: calc(240 * var(--to-rem));
font-size: calc(16 * var(--to-rem));
padding-block: calc(40 * var(--to-rem)) calc(62 * var(--to-rem));
```

- **数値はデザイン実測 px をそのまま書く**（`240`, `16`, `40`）。ベタ `rem` 記述は使わない。
- 生 `px` を使ってよいのは：ボーダー/ヘアライン（`1px solid` `height: 1px`）、`--radius-base` 等のトークン、`--to-rem` 定義自体。
- `line-height` は比率で書く（例 `line-height: calc(32.4 / 18)` のように **デザイン px 値を残す**）。単位なしの `1` `1.8` `2` も可。

---

## 4. ブレークポイント：`@include mq()`（SP ファースト・min-width）

`global/_breakpoints.scss` 定義。全て **min-width**（SP ファースト）。

| キー | px |
|---|---|
| `sm` | 600 |
| `md` | 768（既定値） |
| `lg` | 1024 |
| `pc` | 1260 |
| `xl` | 1440 |

```scss
.p-about {
  padding-block: calc(40 * var(--to-rem)) calc(62 * var(--to-rem));

  @include mq("md") {   /* 該当セレクタ内にネスト */
    padding-block: calc(80 * var(--to-rem)) calc(120 * var(--to-rem));
  }
}
```

- 主力は `md`（768）。グリッド段組み変更に `lg`（1024）を併用。
- メディアクエリは**該当セレクタ内にネスト**して書く（別ブロックにまとめない）。

---

## 5. デザイントークン = CSS カスタムプロパティ

色・font-weight・font-family・inner 幅・duration・radius 等は **`global/_variables.scss` の `:root` 変数を参照**。**ハードコード（生 hex / 生 px の直書き）禁止。**

```scss
/* inner */
--inner: min(1180px, 100%);
--inner-sp: min(500px, 100%);
--padding-inner: 20px;
--padding-inner-sp: 15px;

/* z-index */
--z-index-header: 900;

/* color */
--color-white: #fff;
--color-text-main: #303133;   /* 正準テキスト色（本文・主） */
--color-text-sub: #666;       /* 正準テキスト色（サブ） */
--color-bg-light: #eff6fa;
--color-border-light: #eff6fa;
--color-border-accent: #cfdaea;
--color-border-sub: #8daad0;
--color-accent: #3072bf;      /* テーマカラー（アクセントブルー） */
--color-accent-sub: #6299d9;
--color-required: #bf3030;     /* 必須バッジ背景 */
--color-accent-gradient: linear-gradient(90deg, #3072bf 0%, #76cfd6 100%);

/* font-weight */
--fw-light: 300;  --fw-regular: 400;  --fw-medium: 500;  --fw-semibold: 600;  --fw-bold: 700;

/* font-family */
--base-font-family: "Noto Sans JP", sans-serif;
--accent-font-family: "Inter", sans-serif;   /* 装飾英字（見出しの英ラベル等） */

/* typography */
--lh-base: 2;
--to-rem: calc(tan(atan2(1px, var(--root-font-size))) * 1rem);

/* misc */
--duration: 0.3s;         /* transition の標準 duration */
--radius-base: 2px;
--header-height: 56px;
```

- **正準テキスト色は `--color-text-main` / `--color-text-sub`。**
  既存コードに紛れる**未定義の stray 変数 `--color-text` / `--color-text-secondary` / `--color-orange` は使わない**（定義が無く効かない）。
- コンポーネント内のローカル変数は **`--_xxx`（アンダースコア接頭）** で定義する既存流儀に倣う（例 `--_text-color: var(--color-text-main);`）。
- 新しいトークンが必要なら `global/_variables.scss` に追記し、命名パターンを踏襲する。

---

## 6. 余白・配置・高さ（実コードの標準）

- **縦方向の余白は `margin-top`**（`flex-direction: column` + `gap` は禁止）。
- 上下パディングは `padding-block`、左右は `padding-inline` を優先。中央寄せは `margin-inline: auto`。
- インナー幅は共通 **`.l-inner`** を `{block}__inner` に**併記**して使う（`_l-inner.scss` 参照）。`.l-inner` 自体に外部余白を持たせない。フルブリードなセクションは独自 `__inner` を使う。
- ボタン等クリック要素の高さは、既存 `.c-btn` が `height` を使っている箇所もあるが、**新規は `padding-block` で高さを確保**する（global 準拠）。テキスト量変化に強くタップ領域も確保できる。
- 装飾要素（線・オーバーレイ・チップ背景）のみ `position: absolute` を使う。テキスト/ボタン等の通常コンテンツはフロー配置（flex/grid）＋ `margin-top`。

---

## 7. ホバー・トランジション

- ホバーは必ず `@media (any-hover: hover) { &:hover { … } }` で囲う（タッチ誤発火防止）。
- `transition` は**ホバーブロック内でなくベースクラス**に書く。duration は **`var(--duration)`**（0.3s）を使う。

```scss
.c-link {
  transition: color var(--duration);

  @media (any-hover: hover) {
    &:hover { color: var(--color-accent); }
  }
}
```

---

## 8. Lint / フォーマット

- stylelint（`stylelint-config-standard-scss` + `stylelint-config-recess-order`）。`selector-class-pattern` は無効化済みなので FLOCSS 名は通る。
- **プロパティ順は recess-order に従う**（`yarn format` / `stylelint --fix` で自動整形される）。
- コンパイラは Dart Sass 1.70（Vite 経由）。`@use` の glob は `vite-plugin-sass-glob-import` が解決する（素の Dart Sass 単体では `/**` は解決しない点に注意）。

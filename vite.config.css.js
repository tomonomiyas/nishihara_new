import { defineConfig } from "vite";
import { resolve } from "path";
import autoprefixer from "autoprefixer";
import sassGlobImports from "vite-plugin-sass-glob-import";

// CSS だけを assets/css/style.css に速く書き出すための軽量 watch 用設定。
// 画像最適化・handlebars・HTML入力を含まないので、SCSS 保存 → 即再コンパイルが速い。
// 使い方: npx vite build --watch --config vite.config.css.js
const root = resolve(__dirname, "src");

export default defineConfig(() => ({
  root,
  base: "./",
  plugins: [
    // @use "components/**" などの glob を解決（このプロジェクトでは必須）
    sassGlobImports(),
  ],
  css: {
    postcss: {
      plugins: [autoprefixer()],
    },
  },
  build: {
    minify: false,
    outDir: resolve(__dirname, "assets"),
    // assets/ を丸ごと消さない（画像・JS を残したまま CSS だけ更新する）
    emptyOutDir: false,
    rollupOptions: {
      input: {
        style: resolve(root, "assets", "styles", "style.scss"),
      },
      output: {
        assetFileNames: assetInfo => {
          if (assetInfo.name.endsWith(".css")) {
            return "css/[name].[ext]";
          }
          // SCSS の url() 参照画像はフル設定と同じく images/ 固定名で出す
          return "images/[name].[ext]";
        },
      },
    },
  },
  resolve: {
    alias: {
      "@": resolve(__dirname, "src/assets/styles"),
      "@js": resolve(__dirname, "src/assets/js"),
    },
  },
}));

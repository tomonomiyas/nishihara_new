import { defineConfig } from "vite";
import { resolve, relative, extname, basename } from "path";
import { globSync } from "glob";
import fs from "fs";
import autoprefixer from "autoprefixer";
import handlebars from "vite-plugin-handlebars";
import { ViteImageOptimizer } from "vite-plugin-image-optimizer";
import convertImages from "./bin/vite-plugin-convert-images.js";
import sassGlobImports from "vite-plugin-sass-glob-import";

// サイトのルートを決定
const root = resolve(__dirname, "src");

// 環境変数取得
const isDev = process.env.NODE_ENV === "development";

// 静的開発用のinput設定。静的資材用にはhtmlファイルを経由してscss,jsなどをビルドする
const inputsForStatic = {
  style: resolve(root, "assets", "styles", "style.scss"),
  ...Object.fromEntries(
    globSync("src/**/*.html")
      .filter(file => {
        // globは常に/で区切られたパスを返すが、念のため正規化（Windows対応）
        const normalizedPath = file.replace(/\\/g, "/");
        const fileName = basename(normalizedPath);
        const isPrivateFile = fileName.startsWith("_");
        const isComponent = normalizedPath.includes("src/components/");
        return !isPrivateFile && !isComponent;
      })
      .map(file => [relative("src", file.slice(0, file.length - extname(file).length)), resolve(__dirname, file)]),
  ),
};

export default defineConfig(() => ({
  root,
  base: "./",
  server: {
    port: 5173,
    host: true, // リモートアクセス用
    hmr: true, // HMRを有効化
  },
  css: {
    devSourcemap: true, // 開発時のソースマップを有効化（HMRに必要）
  },
  build: {
    minify: false,
    outDir: resolve(__dirname, "assets"),
    // SVGファイルをインライン化しないように設定
    assetsInlineLimit: (filePath, content) => {
      // SVGファイルの場合は常にアセットとして出力（インライン化しない）
      if (filePath.endsWith(".svg")) {
        return 0;
      }
      // その他のファイルはデフォルトの動作（4KB以下はインライン化）
      return 4096;
    },
    rollupOptions: {
      input: inputsForStatic,
      output: {
        entryFileNames: "js/[name].js",
        chunkFileNames: "js/[name].js",
        assetFileNames: assetsInfo => {
          if (assetsInfo.name.endsWith(".css")) {
            return "css/[name].[ext]";
          } else if (assetsInfo.name.endsWith(".svg")) {
            // SVGファイルはimagesディレクトリに出力（PHPのimg_path()がハッシュ無し名を参照するため固定名）
            return "images/[name].[ext]";
          } else {
            // 画像はPHPテンプレートのimg_path()がハッシュ無し名を参照するため固定名で出力
            return "images/[name].[ext]";
          }
        },
      },
    },
    css: {
      // devSourcemap: true, // SCSSのソースマップを生成（ビルド時には自動的に無効になる）
      postcss: {
        plugins: [autoprefixer()],
      },
    },
  },
  plugins: [
    // Sassでワイルドカード（@use "components/**"）を使えるようにする
    sassGlobImports(),

    // 画像最適化
    ViteImageOptimizer({
      include: "**/*.{png,jpg,jpeg,webp,avif}", // 最適化する画像の形式を指定
      png: {
        quality: 80,
      },
      jpeg: {
        quality: 80,
      },
      jpg: {
        quality: 80,
      },
      webp: {
        quality: 80,
      },
      avif: {
        quality: 80,
      },
    }),
    // 開発環境では画像をwebpに変換
    // format: 'webp' or 'avif'で画像の変換形式を指定
    isDev ? convertImages({ format: "webp" }) : null,

    // コンポーネントのディレクトリを読み込む
    handlebars({
      partialDirectory: resolve(__dirname, "src/components"),
      helpers: {
        br: contents => {
          return contents ? contents.replace(/\r?\n/g, "<br>") : "";
        },
      },
      context: pagePath => {
        const metaData = JSON.parse(fs.readFileSync(resolve(__dirname, "src/data/meta.json"), "utf8"));
        const pageMeta = metaData[pagePath] || metaData["default"];
        return {
          page: pageMeta,
          brTxt: "これはテスト文章です。\nこれはテスト文章です。",
        };
      },
    }),
  ],
  resolve: {
    alias: {
      "@": resolve(__dirname, "src/assets/styles"),
      "@js": resolve(__dirname, "src/assets/js"),
    },
  },
}));

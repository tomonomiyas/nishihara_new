// サステナビリティページ：活動報告カルーセル + ローカルナビのスクロールスパイ
import Splide from "@splidejs/splide";

export function initSustainability() {
  initActivitySlider();
  initLocalNavSpy();
  initCopyUrl();
}

// 記事URLコピー（活動報告 詳細の共有ボタン）
function initCopyUrl() {
  const buttons = document.querySelectorAll(".js-copyUrl");
  if (!buttons.length) return;

  buttons.forEach(button => {
    button.addEventListener("click", async () => {
      const url = button.dataset.copyUrl || window.location.href;

      try {
        if (navigator.clipboard && window.isSecureContext) {
          await navigator.clipboard.writeText(url);
        } else {
          // フォールバック（http環境・非対応ブラウザ）
          const textarea = document.createElement("textarea");
          textarea.value = url;
          textarea.style.position = "fixed";
          textarea.style.opacity = "0";
          document.body.appendChild(textarea);
          textarea.select();
          document.execCommand("copy");
          document.body.removeChild(textarea);
        }
        showCopied(button);
      } catch (e) {
        // コピー失敗時はボタン動作のみ
      }
    });
  });
}

function showCopied(button) {
  button.classList.add("is-copied");
  window.clearTimeout(button._copyTimer);
  button._copyTimer = window.setTimeout(() => {
    button.classList.remove("is-copied");
  }, 2000);
}

// 活動報告の横スクロールカルーセル（Splide）
function initActivitySlider() {
  const slider = document.querySelector(".js-activitySlider");
  if (!slider) return;

  const splide = new Splide(slider, {
    perPage: 3,
    perMove: 1,
    gap: "25px",
    // 標準ページネーション（ページ単位のドット）は使わず、
    // スライド枚数・進行に連動する自前の進捗バーを描画する
    pagination: false,
    arrows: true,
    breakpoints: {
      1024: { perPage: 2 },
      600: { perPage: 1, fixedWidth: "80%", focus: "center" },
    },
  });

  // 進捗バー（スクロールバー風）: 青サムの幅＝表示枚数/総枚数、位置＝現在index/総枚数
  const progress = document.createElement("div");
  progress.className = "p-sustainability__progress";
  const thumb = document.createElement("span");
  thumb.className = "p-sustainability__progressThumb";
  progress.appendChild(thumb);
  slider.appendChild(progress);

  const updateProgress = index => {
    const length = splide.length;
    const perPage = splide.options.perPage || 1;
    // 全部見えているときはバー不要
    if (length <= perPage) {
      progress.style.display = "none";
      return;
    }
    progress.style.display = "";
    const maxIndex = length - perPage;
    const current = Math.min(typeof index === "number" ? index : splide.index, maxIndex);
    thumb.style.width = (perPage / length) * 100 + "%";
    thumb.style.left = (current / length) * 100 + "%";
  };

  splide.on("move", newIndex => updateProgress(newIndex));
  splide.on("mounted updated resized", () => updateProgress());
  splide.mount();
}

// 左コンテンツのスクロール位置に応じて右ナビのアクティブ表示を切り替える
function initLocalNavSpy() {
  const targets = Array.from(document.querySelectorAll(".js-localNavTarget"));
  const links = Array.from(document.querySelectorAll(".js-localNavLink"));
  if (!targets.length || !links.length) return;

  const linkMap = new Map();
  links.forEach(link => {
    const id = link.getAttribute("href")?.replace("#", "");
    if (id) linkMap.set(id, link.closest(".js-localNavItem"));
  });

  const setCurrent = id => {
    linkMap.forEach((navItem, key) => {
      if (!navItem) return;
      navItem.classList.toggle("p-localNav__item--current", key === id);
    });
  };

  const observer = new IntersectionObserver(
    entries => {
      // 画面内に入っているブロックのうち、最も上にあるものをアクティブにする
      const visible = entries.filter(entry => entry.isIntersecting).sort((a, b) => a.boundingClientRect.top - b.boundingClientRect.top);

      if (visible.length > 0) {
        setCurrent(visible[0].target.id);
      }
    },
    {
      rootMargin: "-30% 0px -60% 0px",
      threshold: 0,
    },
  );

  targets.forEach(target => observer.observe(target));
}

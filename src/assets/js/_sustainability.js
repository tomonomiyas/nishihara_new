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

  new Splide(slider, {
    perPage: 3,
    gap: "25px",
    pagination: true,
    arrows: false,
    breakpoints: {
      1024: { perPage: 2 },
      600: { perPage: 1, fixedWidth: "80%", focus: "center" },
    },
  }).mount();
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

// 事業紹介ページ：詳しく見る開閉 + ローカルナビのスクロールスパイ

export function initBusiness() {
  initDetailToggle();
  initScrollSpy();
}

// 「詳しく見る」開閉
function initDetailToggle() {
  const toggles = document.querySelectorAll(".js-businessToggle");

  toggles.forEach(toggle => {
    const detail = toggle.closest(".js-businessDetail");
    if (!detail) return;
    const body = detail.querySelector(".js-businessDetailBody");
    const textEl = toggle.querySelector(".p-business__detailToggleText");

    toggle.addEventListener("click", () => {
      const isOpen = body.classList.toggle("is-open");
      toggle.setAttribute("aria-expanded", String(isOpen));
      if (textEl) {
        textEl.textContent = isOpen ? "閉じる" : "詳しく見る";
      }
    });
  });
}

// 左コンテンツのスクロール位置に応じて右ナビのアクティブ表示を切り替える
function initScrollSpy() {
  const items = Array.from(document.querySelectorAll(".js-businessItem"));
  const links = Array.from(document.querySelectorAll(".js-businessNavLink"));
  if (!items.length || !links.length) return;

  const linkMap = new Map();
  links.forEach(link => {
    const id = link.getAttribute("href")?.replace("#", "");
    if (id) linkMap.set(id, link.closest(".p-localNav__item"));
  });

  const setCurrent = id => {
    linkMap.forEach((navItem, key) => {
      navItem.classList.toggle("p-localNav__item--current", key === id);
    });
  };

  const observer = new IntersectionObserver(
    entries => {
      // 画面内に入っている事業ブロックのうち、最も上にあるものをアクティブにする
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

  items.forEach(item => observer.observe(item));
}

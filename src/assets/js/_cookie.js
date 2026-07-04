// Cookie 同意バナーの表示制御
// 同意（受け入れ）または閉じる操作で localStorage にフラグを保存し、以降は非表示にする。

const STORAGE_KEY = "cookieConsent";

export function initCookieBanner() {
  const banner = document.querySelector(".js-cookie");
  if (!banner) return;

  // 既に同意・非表示済みなら何もしない
  if (localStorage.getItem(STORAGE_KEY) === "true") return;

  // バナーを表示
  banner.hidden = false;

  const dismiss = () => {
    localStorage.setItem(STORAGE_KEY, "true");
    banner.hidden = true;
  };

  const acceptBtn = banner.querySelector(".js-cookieAccept");
  const closeBtn = banner.querySelector(".js-cookieClose");

  if (acceptBtn) acceptBtn.addEventListener("click", dismiss);
  if (closeBtn) closeBtn.addEventListener("click", dismiss);
}

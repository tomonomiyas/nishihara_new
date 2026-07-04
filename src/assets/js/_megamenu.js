/**
 * メガメニューの制御
 * クリックで展開する仕様に変更
 */
document.addEventListener("DOMContentLoaded", () => {
  const triggers = document.querySelectorAll(".js-megamenu-trigger");
  const closeButtons = document.querySelectorAll(".js-megamenu-close");

  const updateBodyState = () => {
    const anyActive = Array.from(triggers).some(t => t.classList.contains("is-active"));
    if (anyActive) {
      document.body.classList.add("is-megamenu-open");
    } else {
      document.body.classList.remove("is-megamenu-open");
    }
  };

  triggers.forEach(trigger => {
    const link = trigger.querySelector("a");

    if (link) {
      link.addEventListener("click", e => {
        // メガメニューがある場合はクリックイベントを制御
        const hasMegamenu = trigger.querySelector(".p-megamenu");
        if (hasMegamenu) {
          e.preventDefault();
          e.stopPropagation();

          const isActive = trigger.classList.contains("is-active");

          // 他のメニューをすべて閉じる
          triggers.forEach(t => t.classList.remove("is-active"));

          // 自分のトグル
          if (!isActive) {
            trigger.classList.add("is-active");
          }

          updateBodyState();
        }
      });
    }
  });

  // 閉じるボタン（オーバーレイも含む）
  closeButtons.forEach(btn => {
    btn.addEventListener("click", e => {
      e.stopPropagation();
      triggers.forEach(t => t.classList.remove("is-active"));
      updateBodyState();
    });
  });

  // メニューの外側をクリックしたら閉じる（念のため残す）
  document.addEventListener("click", e => {
    if (!e.target.closest(".js-megamenu-trigger") && !e.target.closest(".p-megamenu")) {
      triggers.forEach(t => t.classList.remove("is-active"));
      updateBodyState();
    }
  });
});

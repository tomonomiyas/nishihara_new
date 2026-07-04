export function initModal() {
  const modalOpenButtons = document.querySelectorAll(".js-modal-open");
  const modalCloseButtons = document.querySelectorAll(".js-modal-close");

  if (modalOpenButtons.length === 0) return;

  modalOpenButtons.forEach(button => {
    button.addEventListener("click", () => {
      const modalId = button.getAttribute("data-modal-target");
      const modal = document.getElementById(modalId);
      if (modal) {
        modal.classList.add("is-open");
        document.body.style.overflow = "hidden"; // Prevent scrolling
      }
    });
  });

  modalCloseButtons.forEach(button => {
    button.addEventListener("click", e => {
      const modal = button.closest(".js-modal");
      if (modal) {
        modal.classList.remove("is-open");
        document.body.style.overflow = ""; // Restore scrolling
      }
    });
  });

  // Close on ESC key
  window.addEventListener("keydown", e => {
    if (e.key === "Escape") {
      const openModals = document.querySelectorAll(".c-modal.is-open");
      openModals.forEach(modal => {
        modal.classList.remove("is-open");
        document.body.style.overflow = "";
      });
    }
  });
}

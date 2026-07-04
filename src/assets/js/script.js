import "./_drawer.js";
import "./_mv-slider.js";
import "./_viewport.js";
import "./_form-validation.js";
import "./_megamenu.js";
import { initModal } from "./_modal.js";
import { initBusiness } from "./_business.js";
import { initSustainability } from "./_sustainability.js";
import { initCookieBanner } from "./_cookie.js";

initModal();
initBusiness();
initSustainability();
initCookieBanner();

// Viteに画像を認識させる
import.meta.glob("../images/*.{png,jpg,jpeg,webp,svg,avif}", { eager: true });

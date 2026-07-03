<?php ?>
<footer class="p-footer">
  <div class="p-footer__inner l-inner">
    <div class="p-footer__top">
      <div class="p-footer__logo">
        <a href="<?php page_path(); ?>">
          <picture>
            <source srcset="<?php img_path('/logo_hld.webp'); ?>" type="image/webp">
            <img src="<?php img_path('/logo_hld.png'); ?>" alt="株式会社西原商事ホールディングス">
          </picture>
        </a>
      </div>
      <div class="p-footer__info">
        <p class="p-footer__company-name">株式会社西原商事ホールディングス</p>
        <address class="p-footer__address">
          福岡県北九州市八幡西区陣原二丁目2-21
        </address>
      </div>
      <a href="<?php page_path('contact'); ?>" class="p-footer__contact-btn">お問い合わせ</a>
    </div>

    <div class="p-footer__middle">

      <nav class="p-footer__nav">
        <!-- Column 1: Company & Sustainability -->
        <div class="p-footer__nav-col">
          <div class="p-footer__nav-group">
            <a href="<?php page_path('company'); ?>" class="p-footer__nav-main-link">
              <span class="p-footer__nav-en">Company</span>
              <span class="p-footer__nav-title">会社案内</span>
            </a>
          </div>
          <div class="p-footer__nav-group">
            <a href="<?php page_path('sustainability'); ?>" class="p-footer__nav-main-link">
              <span class="p-footer__nav-en">Sustainability</span>
              <span class="p-footer__nav-title">サステナビリティ</span>
            </a>
          </div>
        </div>

        <!-- Column 2: Business & News -->
        <div class="p-footer__nav-col">
          <div class="p-footer__nav-group">
            <a href="<?php page_path('business'); ?>" class="p-footer__nav-main-link">
              <span class="p-footer__nav-en">Business</span>
              <span class="p-footer__nav-title">事業紹介</span>
            </a>
          </div>
          <div class="p-footer__nav-group">
            <a href="<?php page_path('news'); ?>" class="p-footer__nav-main-link">
              <span class="p-footer__nav-en">News</span>
              <span class="p-footer__nav-title">お知らせ</span>
            </a>
          </div>
        </div>

        <!-- Column 3: Group Companies -->
        <div class="p-footer__nav-col p-footer__nav-col--wide">
          <div class="p-footer__nav-group">
            <div class="p-footer__nav-main-link is-static">
              <span class="p-footer__nav-en">Group company</span>
              <span class="p-footer__nav-title">グループ会社のご案内</span>
            </div>
            <ul class="p-footer__nav-list">
              <li class="p-footer__nav-item">
                <a href="https://nishihara-shoji.co.jp/" target="_blank" rel="noopener">株式会社西原商事</a>
              </li>
              <li class="p-footer__nav-item">
                <a href="https://beetle-eng.co.jp/" target="_blank" rel="noopener">株式会社ビートルエンジニアリング</a>
              </li>
              <li class="p-footer__nav-item">
                <a href="https://beetle-mgt.co.jp/" target="_blank" rel="noopener">株式会社ビートルマネージメント</a>
              </li>
              <li class="p-footer__nav-item">
                <a href="https://rebit-japan.co.jp/" target="_blank" rel="noopener">株式会社リビットジャパン</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>

    <div class="p-footer__banners">
      <ul class="p-footer__banner-list">
        <li class="p-footer__banner-item">
          <a href="#" target="_blank" rel="noopener">
            <picture>
              <source srcset="<?php img_path('/logo_bee-net.webp'); ?>" type="image/webp">
              <img src="<?php img_path('/logo_bee-net.png'); ?>" alt="ビーネットシステム">
            </picture>
          </a>
        </li>
        <li class="p-footer__banner-item">
          <a href="#" target="_blank" rel="noopener">
            <picture>
              <source srcset="<?php img_path('/logo_dustalk.webp'); ?>" type="image/webp">
              <img src="<?php img_path('/logo_dustalk.png'); ?>" alt="Dustalk">
            </picture>
          </a>
        </li>
        <li class="p-footer__banner-item">
          <a href="#" target="_blank" rel="noopener">
            <picture>
              <source srcset="<?php img_path('/logo_beetle-auction.webp'); ?>" type="image/webp">
              <img src="<?php img_path('/logo_beetle-auction.png'); ?>" alt="ビートルオークション">
            </picture>
          </a>
        </li>
        <li class="p-footer__banner-item">
          <a href="#" target="_blank" rel="noopener">
            <picture>
              <source srcset="<?php img_path('/logo_rebitbox.webp'); ?>" type="image/webp">
              <img src="<?php img_path('/logo_rebitbox.png'); ?>" alt="ビートルオークション">
            </picture>
          </a>
        </li>
      </ul>
    </div>
  </div>
  <div class="p-footer__bottom-bar">
    <div class="p-footer__bottom-inner l-inner">
      <a href="<?php page_path('privacy-policy'); ?>" class="p-footer__privacy">プライバシーポリシー / サイトポリシー</a>
      <p class="p-footer__copyright">Copyright ©NISHIHARA SHOJI HLD All rights reserved.</p>
    </div>
  </div>
</footer>

<!-- Cookie バナー（同意するまで追従） -->
<div class="p-cookie js-cookie" role="dialog" aria-label="Cookieの使用について" hidden>
  <div class="p-cookie__inner">
    <p class="p-cookie__text">
      当サイトでは、サイトの利便性向上を目的として<span class="p-cookie__bold">Cookie等を使用します。</span>「すべてのCookieを受け入れる」をクリックすると、<span class="p-cookie__bold">Cookie の使用に同意</span>いただいたことになります。Cookieの設定変更及び使用するCookie種類等の詳細は<span class="p-cookie__bold">Cookie設定 および Cookieポリシー</span>をご確認ください。<a href="<?php page_path('privacy-policy'); ?>" class="p-cookie__link">詳しくはこちら</a>
    </p>
    <div class="p-cookie__actions">
      <button type="button" class="p-cookie__setting js-cookieSetting">Cookie設定</button>
      <button type="button" class="p-cookie__accept js-cookieAccept">すべてのCookieを受け入れる</button>
    </div>
    <button type="button" class="p-cookie__close js-cookieClose" aria-label="閉じる">
      <span class="p-cookie__closeIcon"></span>
    </button>
  </div>
</div>

<?php wp_footer(); ?>
<!-- =====start*form===== -->
<?php if (defined('WP_LOAD')): ?>
  <?php echo defined('WS_ACTIVATE_ZIP_JS') && !empty(WS_ACTIVATE_ZIP_JS) ? WS_ACTIVATE_ZIP_JS : null; ?>
  <?php if (defined('STEP') && STEP === 'check'): ?>
  <?php else: ?>
    <script src="<?php echo esc_url(home_url('/contact/misc/form.js')); ?>"></script>
  <?php endif; ?>
  <?php echo defined('BOOTSTRAP_JS') && !empty(BOOTSTRAP_JS) ? BOOTSTRAP_JS : null; ?>
  <?php echo defined('reCAPTCHA_WIDGET') && !empty(reCAPTCHA_WIDGET) ? reCAPTCHA_WIDGET : null; ?>
  <?php echo defined('reCAPTCHA_SOURCE') && !empty(reCAPTCHA_SOURCE) ? reCAPTCHA_SOURCE : null; ?>
<?php endif; ?>
<!-- =====end*form===== -->
</body>

</html>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="<?php temp_path('/favicon.ico'); ?>">
    <link rel="apple-touch-icon" href="<?php temp_path('/apple-touch-icon.png'); ?>">
    <?php get_template_part('parts/common/adjust-admin-bar'); ?>
    <?php wp_head(); ?>
    <!-- =====start*form===== -->
    <?php if (defined('WP_LOAD')): ?>
      <?php if (defined('BOOTSTRAP_CSS')): ?>
        <?php echo BOOTSTRAP_CSS; ?>
      <?php endif; ?>
      <link rel="stylesheet" href="<?php echo esc_url(home_url('/contact/_css/mystyle.css')); ?>">
    <?php endif; ?>
    <!-- =====end*form===== -->
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div class="p-megamenu-overlay js-megamenu-close"></div>
    <header class="p-header l-header">
        <div class="p-header__inner">
            <?php $tag = (is_front_page()) ? 'h1' : 'div'; ?>
            <<?php echo $tag; ?> class="p-header__logo">
                <a href="<?php page_path(); ?>">
                    <picture>
                        <source srcset="<?php img_path('/logo_hld.webp'); ?>" type="image/webp">
                        <img src="<?php img_path('/logo_hld.png'); ?>" alt="株式会社西原商事ホールディングス">
                    </picture>
                </a>
            </<?php echo $tag; ?>>
            <nav class="p-header__nav">
                <div class="p-header__nav-main">
                    <ul class="p-header__nav-list">
                        <li class="p-header__nav-item js-megamenu-trigger" data-megamenu="company">
                            <a href="<?php page_path('company'); ?>" class="c-line">
                                会社案内
                                <span class="p-header__arrow"></span>
                            </a>
                            <div id="megamenu-company" class="p-megamenu">
                                <div class="p-megamenu__inner">
                                    <div class="p-megamenu__head">
                                        <p class="p-megamenu__title-en">About us</p>
                                        <h2 class="p-megamenu__title-main">会社案内</h2>
                                    </div>
                                    <div class="p-megamenu__body">
                                        <ul class="p-megamenu__list">
                                            <li class="p-megamenu__item"><a
                                                    href="<?php page_path('company/message'); ?>">代表ご挨拶</a></li>
                                            <li class="p-megamenu__item"><a
                                                    href="<?php page_path('company/history'); ?>">グループのあゆみ</a></li>
                                            <li class="p-megamenu__item"><a
                                                    href="<?php page_path('company/philosophy'); ?>">企業理念</a></li>
                                            <li class="p-megamenu__item"><a
                                                    href="<?php page_path('company/group'); ?>">グループ会社・関連団体</a></li>
                                            <li class="p-megamenu__item"><a
                                                    href="<?php page_path('company/overview'); ?>">会社概要</a></li>
                                            <li class="p-megamenu__item"><a
                                                    href="<?php page_path('company/location'); ?>">拠点一覧</a></li>
                                        </ul>
                                    </div>
                                    <button type="button" class="p-megamenu__close js-megamenu-close">
                                        <span class="p-megamenu__close-icon"></span>
                                        閉じる
                                    </button>
                                </div>
                            </div>
                        </li>
                        <li class="p-header__nav-item js-megamenu-trigger" data-megamenu="business">
                            <a href="<?php page_path('business'); ?>" class="c-line">
                                事業紹介
                                <span class="p-header__arrow"></span>
                            </a>
                            <div id="megamenu-business" class="p-megamenu">
                                <div class="p-megamenu__inner">
                                    <div class="p-megamenu__head">
                                        <p class="p-megamenu__title-en">Business</p>
                                        <h2 class="p-megamenu__title-main">事業紹介</h2>
                                    </div>
                                    <div class="p-megamenu__body">
                                        <ul class="p-megamenu__list">
                                            <li class="p-megamenu__item"><a
                                                    href="<?php page_path('business/#collection'); ?>">収集運搬事業</a></li>
                                            <li class="p-megamenu__item"><a
                                                    href="<?php page_path('business/#recycle'); ?>">処理・リサイクル事業</a></li>
                                            <li class="p-megamenu__item"><a
                                                    href="<?php page_path('business/#information'); ?>">情報管理事業</a></li>
                                            <li class="p-megamenu__item"><a
                                                    href="<?php page_path('business/#dx'); ?>">DXサービス事業</a></li>
                                        </ul>
                                    </div>
                                    <button type="button" class="p-megamenu__close js-megamenu-close">
                                        <span class="p-megamenu__close-icon"></span>
                                        閉じる
                                    </button>
                                </div>
                            </div>
                        </li>
                        <li class="p-header__nav-item js-megamenu-trigger" data-megamenu="sustainability">
                            <a href="<?php page_path('sustainability'); ?>" class="c-line">
                                サステナビリティ
                                <span class="p-header__arrow"></span>
                            </a>
                            <div id="megamenu-sustainability" class="p-megamenu">
                                <div class="p-megamenu__inner">
                                    <div class="p-megamenu__head">
                                        <p class="p-megamenu__title-en">Our sustainability</p>
                                        <h2 class="p-megamenu__title-main">サステナビリティ</h2>
                                    </div>
                                    <div class="p-megamenu__body">
                                        <ul class="p-megamenu__list">
                                            <li class="p-megamenu__item"><a
                                                    href="<?php page_path('sustainability/#activity'); ?>">活動報告</a>
                                            </li>
                                            <li class="p-megamenu__item"><a
                                                    href="<?php page_path('sustainability/#system'); ?>">推進体制</a></li>
                                            <li class="p-megamenu__item"><a
                                                    href="<?php page_path('sustainability/#plan'); ?>">推進計画</a>
                                            </li>
                                            <li class="p-megamenu__item"><a
                                                    href="<?php page_path('sustainability/#materiality'); ?>">重要課題</a>
                                            </li>
                                            <li class="p-megamenu__item"><a
                                                    href="<?php page_path('sustainability/#topics'); ?>">サステナビリティトピックス</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <button type="button" class="p-megamenu__close js-megamenu-close">
                                        <span class="p-megamenu__close-icon"></span>
                                        閉じる
                                    </button>
                                </div>
                            </div>
                        </li>
                        <li class="p-header__nav-item js-megamenu-trigger" data-megamenu="news">
                            <a href="<?php page_path('news'); ?>" class="c-line">
                                お知らせ
                                <span class="p-header__arrow"></span>
                            </a>
                            <div id="megamenu-news" class="p-megamenu">
                                <div class="p-megamenu__inner">
                                    <div class="p-megamenu__head">
                                        <p class="p-megamenu__title-en">News</p>
                                        <h2 class="p-megamenu__title-main">お知らせ</h2>
                                    </div>
                                    <div class="p-megamenu__body">
                                        <ul class="p-megamenu__list">
                                            <li class="p-megamenu__item"><a
                                                    href="<?php page_path('news'); ?>">お知らせ一覧</a></li>
                                        </ul>
                                    </div>
                                    <button type="button" class="p-megamenu__close js-megamenu-close">
                                        <span class="p-megamenu__close-icon"></span>
                                        閉じる
                                    </button>
                                </div>
                            </div>
                        </li>
                </div>
                <div class="p-header__nav-action">
                    <ul class="p-header__action-list">
                        <li class="p-header__action-item p-header__action-item--recruit">
                            <a href="#" target="_blank" rel="noopener noreferrer" class="c-line">
                                採用情報
                                <span class="p-header__external-icon"></span>
                            </a>
                        </li>
                        <li class="p-header__action-item p-header__action-item--en">
                            <a href="#" target="_blank" rel="noopener noreferrer" class="c-line">
                                English
                                <span class="p-header__external-icon"></span>
                            </a>
                        </li>
                        <li class="p-header__action-item p-header__action-item--contact">
                            <a href="<?php page_path('contact'); ?>" class="p-header__contact-btn">
                                お問い合わせ
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <ul class="p-header__sp-actions">
                <li class="p-header__sp-actions-item">
                    <a href="#" target="_blank" rel="noopener noreferrer" aria-label="English site">EN</a>
                </li>
                <li class="p-header__sp-actions-item">
                    <a href="<?php page_path('contact'); ?>" aria-label="お問い合わせ">
                        <span class="p-header__mail-icon"></span>
                    </a>
                </li>
            </ul>
            <button class="p-header__hamburger js-hamburger" aria-label="メニューを開く" aria-expanded="false"
                aria-controls="drawer-menu">
                <span></span>
                <span></span>
            </button>
            <div id="drawer-menu" class="p-header__drawer js-drawer" aria-hidden="true">
                <nav class="p-header__drawer-nav">
                    <ul class="p-header__drawer-list">
                        <li class="p-header__drawer-item">
                            <button type="button" class="p-header__drawer-accordion-title js-drawer-accordion"
                                aria-expanded="false" aria-controls="accordion-company" aria-label="会社案内を展開">
                                会社案内
                            </button>
                            <ul id="accordion-company" class="p-header__drawer-accordion-list" aria-hidden="true">
                                <li class="p-header__drawer-accordion-item">
                                    <a href="<?php page_path('company'); ?>">会社案内トップ</a>
                                </li>
                                <li class="p-header__drawer-accordion-item">
                                    <a href="<?php page_path('company/message'); ?>">代表ご挨拶</a>
                                </li>
                                <li class="p-header__drawer-accordion-item">
                                    <a href="<?php page_path('company/history'); ?>">グループのあゆみ</a>
                                </li>
                                <li class="p-header__drawer-accordion-item">
                                    <a href="<?php page_path('company/philosophy'); ?>">企業理念</a>
                                </li>
                                <li class="p-header__drawer-accordion-item">
                                    <a href="<?php page_path('company/group'); ?>">グループ会社・関連団体</a>
                                </li>
                                <li class="p-header__drawer-accordion-item">
                                    <a href="<?php page_path('company/overview'); ?>">会社概要</a>
                                </li>
                                <li class="p-header__drawer-accordion-item">
                                    <a href="<?php page_path('company/location'); ?>">拠点一覧</a>
                                </li>
                            </ul>
                        </li>
                        <li class="p-header__drawer-item">
                            <button type="button" class="p-header__drawer-accordion-title js-drawer-accordion"
                                aria-expanded="false" aria-controls="accordion-business" aria-label="事業紹介を展開">
                                事業紹介
                            </button>
                            <ul id="accordion-business" class="p-header__drawer-accordion-list" aria-hidden="true">
                                <li class="p-header__drawer-accordion-item">
                                    <a href="<?php page_path('business'); ?>">事業紹介トップ</a>
                                </li>
                                <li class="p-header__drawer-accordion-item">
                                    <a href="<?php page_path('business/#collection'); ?>">収集運搬事業</a>
                                </li>
                                <li class="p-header__drawer-accordion-item">
                                    <a href="<?php page_path('business/#recycle'); ?>">処理・リサイクル事業</a>
                                </li>
                                <li class="p-header__drawer-accordion-item">
                                    <a href="<?php page_path('business/#information'); ?>">情報管理事業</a>
                                </li>
                                <li class="p-header__drawer-accordion-item">
                                    <a href="<?php page_path('business/#dx'); ?>">DXサービス事業</a>
                                </li>
                            </ul>
                        </li>
                        <li class="p-header__drawer-item">
                            <button type="button" class="p-header__drawer-accordion-title js-drawer-accordion"
                                aria-expanded="false" aria-controls="accordion-sustainability" aria-label="サステナビリティを展開">
                                サステナビリティ
                            </button>
                            <ul id="accordion-sustainability" class="p-header__drawer-accordion-list" aria-hidden="true">
                                <li class="p-header__drawer-accordion-item">
                                    <a href="<?php page_path('sustainability'); ?>">サステナビリティトップ</a>
                                </li>
                                <li class="p-header__drawer-accordion-item">
                                    <a href="<?php page_path('sustainability/#activity'); ?>">活動報告</a>
                                </li>
                                <li class="p-header__drawer-accordion-item">
                                    <a href="<?php page_path('sustainability/#system'); ?>">推進体制</a>
                                </li>
                                <li class="p-header__drawer-accordion-item">
                                    <a href="<?php page_path('sustainability/#plan'); ?>">推進計画</a>
                                </li>
                                <li class="p-header__drawer-accordion-item">
                                    <a href="<?php page_path('sustainability/#materiality'); ?>">重要課題</a>
                                </li>
                                <li class="p-header__drawer-accordion-item">
                                    <a href="<?php page_path('sustainability/#topics'); ?>">サステナビリティトピックス</a>
                                </li>
                            </ul>
                        </li>
                        <li class="p-header__drawer-item">
                            <a href="<?php page_path('news'); ?>">
                                <span class="c-line">お知らせ</span>
                            </a>
                        </li>
                        <li class="p-header__drawer-item p-header__drawer-item--contact">
                            <a href="<?php page_path('contact'); ?>">
                                <span class="c-line">お問い合わせ</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
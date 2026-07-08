<?php get_header(); ?>
<main class="l-top">
    <!-- 02 MV -->
    <section class="p-top-mv">
        <div class="p-top-mv__image">
            <picture>
                <source srcset="<?php img_path('/top_mv_01.webp'); ?>" type="image/webp">
                <img src="<?php img_path('/top_mv_01.png'); ?>" width="1920" height="420"
                    alt="楽しいをもっと！うれしいをもっと！もっと明日！" fetchpriority="high">
            </picture>
            <!-- <div class="p-top-mv__content">
                <div class="p-top-mv__title-wrap">
                    <h2 class="p-top-mv__title">
                        <picture>
                            <source srcset="<?php img_path('/top_mv_title_sp.webp'); ?>" type="image/webp"
                                media="(max-width: 767px)">
                            <source srcset="<?php img_path('/top_mv_title.webp'); ?>" type="image/webp">
                            <img src="<?php img_path('/top_mv_title.png'); ?>" width="1000" height="200"
                                alt="楽しいをもっと！うれしいをもっと！もっと明日！" fetchpriority="high">
                        </picture>
                    </h2>
                </div>
            </div> -->
        </div>
    </section>

    <!-- 03 Link Section -->
    <section class="p-top-links">
        <div class="p-top-links__inner">
            <ul class="p-top-links__list">
                <li class="p-top-links__item">
                    <div class="p-top-links__link">
                        <div class="p-top-links__bg">
                            <picture>
                                <source srcset="<?php img_path('/top_links_bg01.webp'); ?>" type="image/webp">
                                <img src="<?php img_path('/top_links_bg01.png'); ?>" alt="会社案内" width="730"
                                    height="240">
                            </picture>
                        </div>
                        <div class="p-top-links__content">
                            <div class="p-top-links__title-wrap">
                                <h3 class="p-top-links__title">会社案内</h3>
                                <span class="p-top-links__line p-top-links__line--company"></span>
                            </div>
                            <div class="p-top-links__more">
                                <div class="p-top-links__more-icon">
                                    <span class="p-top-links__more-text">View more</span>
                                </div>
                            </div>
                        </div>
                        <!-- Hover Overlay -->
                        <div class="p-top-links__hover">
                            <div class="p-top-links__hover-title-wrap">
                                <p class="p-top-links__hover-title">Company</p>
                                <span class="p-top-links__hover-line"></span>
                            </div>
                            <ul class="p-top-links__hover-list">
                                <li class="p-top-links__hover-item">
                                    <a href="<?php page_path('company/message'); ?>"
                                        class="p-top-links__hover-link">代表ご挨拶</a>
                                </li>
                                <li class="p-top-links__hover-item">
                                    <a href="<?php page_path('company/philosophy'); ?>"
                                        class="p-top-links__hover-link">企業理念</a>
                                </li>
                                <li class="p-top-links__hover-item">
                                    <a href="<?php page_path('company/overview'); ?>"
                                        class="p-top-links__hover-link">会社概要</a>
                                </li>
                                <li class="p-top-links__hover-item">
                                    <a href="<?php page_path('company/location'); ?>"
                                        class="p-top-links__hover-link">拠点一覧</a>
                                </li>
                                <li class="p-top-links__hover-item">
                                    <a href="<?php page_path('company/history'); ?>"
                                        class="p-top-links__hover-link">グループのあゆみ</a>
                                </li>
                                <li class="p-top-links__hover-item">
                                    <a href="<?php page_path('company/group'); ?>"
                                        class="p-top-links__hover-link">グループ企業・<br>関連団体</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="p-top-links__item">
                    <div class="p-top-links__link">
                        <div class="p-top-links__bg">
                            <picture>
                                <!-- PC -->
                                <source media="(min-width: 768px)" srcset="<?php img_path('/top_links_bg02.webp'); ?>" type="image/webp">
                                <source media="(min-width: 768px)" srcset="<?php img_path('/top_links_bg02.png'); ?>">
                                <!-- SP -->
                                <source srcset="<?php img_path('/top_links_bg02_sp.webp'); ?>" type="image/webp">
                                <img src="<?php img_path('/top_links_bg02_sp.png'); ?>" alt="サステナビリティ" width="720"
                                    height="384">
                            </picture>
                        </div>
                        <div class="p-top-links__content">
                            <div class="p-top-links__title-wrap">
                                <h3 class="p-top-links__title">サステナビリティ</h3>
                                <span class="p-top-links__line p-top-links__line--sustainability"></span>
                            </div>
                            <div class="p-top-links__more">
                                <div class="p-top-links__more-icon">
                                    <span class="p-top-links__more-text">View more</span>
                                </div>
                            </div>
                        </div>
                        <!-- Hover Overlay -->
                        <div class="p-top-links__hover">
                            <div class="p-top-links__hover-title-wrap">
                                <p class="p-top-links__hover-title">Our sustainability</p>
                                <span class="p-top-links__hover-line"></span>
                            </div>
                            <ul class="p-top-links__hover-list">
                                <li class="p-top-links__hover-item">
                                    <a href="<?php page_path('sustainability/environment'); ?>"
                                        class="p-top-links__hover-link">環境への取り組み</a>
                                </li>
                                <li class="p-top-links__hover-item">
                                    <a href="<?php page_path('sustainability/social'); ?>"
                                        class="p-top-links__hover-link">社会への貢献</a>
                                </li>
                                <li class="p-top-links__hover-item">
                                    <a href="<?php page_path('sustainability/governance'); ?>"
                                        class="p-top-links__hover-link">ガバナンス</a>
                                </li>
                                <li class="p-top-links__hover-item">
                                    <a href="<?php page_path('sustainability/policy'); ?>"
                                        class="p-top-links__hover-link">サステナビリティ方針</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </section>

    <!-- 04 News Section -->
    <section class="p-top-news">
        <div class="p-top-news__inner l-inner">
            <div class="p-top-news__columns">
                <!-- お知らせ -->
                <div class="p-top-news__col">
                    <div class="p-top-news__head">
                        <div class="c-section-title c-section-title--with-line">
                            <h2 class="c-section-title__ja">新着情報</h2>
                        </div>
                        <a href="<?php page_path('news'); ?>" class="c-link">お知らせ一覧</a>
                    </div>
                    <?php
                    $args = array(
                        'post_type' => 'news',
                        'posts_per_page' => 3,
                    );
                    $news_query = new WP_Query($args);
                    ?>
                    <ul class="p-top-news__list">
                        <?php if ($news_query->have_posts()) : while ($news_query->have_posts()) : $news_query->the_post(); ?>
                        <li class="p-top-news__item">
                            <a href="<?php the_permalink(); ?>" class="p-top-news__link">
                                <div class="p-top-news__meta">
                                    <span class="p-top-news__date"><?php echo get_the_date('Y.m.d'); ?></span>
                                    <?php
                                            $categories = get_the_terms(get_the_ID(), 'news_category');
                                            if (!empty($categories) && !is_wp_error($categories)) :
                                            ?>
                                    <span class="p-top-news__label"><?php echo esc_html($categories[0]->name); ?></span>
                                    <?php endif; ?>
                                </div>
                                <p class="p-top-news__item-title">
                                    <?php echo mb_strimwidth(get_the_title(), 0, 100, "..."); ?></p>
                            </a>
                        </li>
                        <?php endwhile;
                        else : ?>
                        <p class="u-text-center">新着情報はありません。</p>
                        <?php endif;
                        wp_reset_postdata(); ?>
                    </ul>
                </div>

                <!-- 広告ライブラリ -->
                <div class="p-top-news__col">
                    <div class="p-top-news__head">
                        <div class="c-section-title c-section-title--with-line">
                            <h2 class="c-section-title__ja">広告ライブラリ</h2>
                        </div>
                        <?php $ad_archive_link = get_term_link('ad-library', 'news_category'); ?>
                        <a href="<?php echo esc_url(is_wp_error($ad_archive_link) ? '#' : $ad_archive_link); ?>" class="c-link">広告ライブラリ一覧</a>
                    </div>
                    <?php
                    $args = array(
                        'post_type' => 'news',
                        'posts_per_page' => 3,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'news_category',
                                'field' => 'slug',
                                'terms' => 'ad-library',
                            ),
                        ),
                    );
                    $ad_query = new WP_Query($args);
                    ?>
                    <ul class="p-top-news__list">
                        <?php if ($ad_query->have_posts()) : while ($ad_query->have_posts()) : $ad_query->the_post(); ?>
                        <li class="p-top-news__item">
                            <a href="<?php the_permalink(); ?>" class="p-top-news__link">
                                <div class="p-top-news__meta">
                                    <span class="p-top-news__date"><?php echo get_the_date('Y.m.d'); ?></span>
                                    <?php
                                            $terms = get_the_terms(get_the_ID(), 'news_category');
                                            if (!empty($terms) && !is_wp_error($terms)) :
                                            ?>
                                    <span class="p-top-news__label"><?php echo esc_html($terms[0]->name); ?></span>
                                    <?php endif; ?>
                                </div>
                                <p class="p-top-news__item-title">
                                    <?php echo mb_strimwidth(get_the_title(), 0, 100, "..."); ?></p>
                            </a>
                        </li>
                        <?php endwhile;
                        else : ?>
                        <p class="u-text-center">広告ライブラリはありません。</p>
                        <?php endif;
                        wp_reset_postdata(); ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- 05, 06, 07 Intro Section -->
    <section class="p-top-intro">
        <div class="p-top-intro__inner l-inner">
            <div class="p-top-intro__catch">
                <h2 class="p-top-intro__main-copy"><span class="p-top-intro__main-copy-line">まちの呼吸を、</span><span class="p-top-intro__main-copy-line">ミライの鼓動へ</span></h2>
                <p class="p-top-intro__sub-copy">Town’s Breath, Future’s Pulse.</p>
            </div>
            <p class="p-top-intro__body">
                私たちBEETLEグループは創業50余年で培った廃棄物処理・資源循環の実務ノウハウに、先進的なデジタル技術を掛け合わせ、<br
                    class="u-hidden-sp">環境負荷低減と持続可能な価値創出を社会全体へ広げていきます。
            </p>
            <div class="p-top-intro__diagram js-modal-open" data-modal-target="diagram-modal">
                <button type="button" class="p-top-intro__expand-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28">
                        <g id="グループ_2066" data-name="グループ 2066" transform="translate(-940 -12)">
                            <rect id="長方形_9250" data-name="長方形 9250" width="28" height="28" rx="2"
                                transform="translate(940 12)" fill="#3072bf" />
                            <g id="グループ_1896" data-name="グループ 1896" transform="translate(-6 -9683)">
                                <line id="線_353" data-name="線 353" x2="16" transform="translate(952 9709)" fill="none"
                                    stroke="#fff" stroke-width="2" />
                                <line id="線_354" data-name="線 354" x2="16" transform="translate(960 9701) rotate(90)"
                                    fill="none" stroke="#fff" stroke-width="2" />
                            </g>
                        </g>
                    </svg>
                </button>
                <picture>
                    <source srcset="<?php img_path('/top_intro_diagram_sp.webp'); ?>" type="image/webp"
                        media="(max-width: 767px)">
                    <source srcset="<?php img_path('/top_intro_diagram_sp.png'); ?>" media="(max-width: 767px)">
                    <source srcset="<?php img_path('/top_intro_diagram.webp'); ?>" type="image/webp">
                    <img src="<?php img_path('/top_intro_diagram.png'); ?>" alt="西原商事グループの取り組み" width="948"
                        height="543">
                </picture>
            </div>
        </div>
    </section>

    <!-- Modal for Diagram -->
    <div id="diagram-modal" class="c-modal js-modal">
        <div class="c-modal__overlay js-modal-close"></div>
        <div class="c-modal__content">
            <button type="button" class="c-modal__close js-modal-close">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28">
                    <g id="グループ_2068" data-name="グループ 2068" transform="translate(-1502 -197)">
                        <g id="グループ_2067" data-name="グループ 2067">
                            <rect id="長方形_9265" data-name="長方形 9265" width="28" height="28" rx="2"
                                transform="translate(1502 197)" fill="#3072bf" />
                        </g>
                        <g id="グループ_2021" data-name="グループ 2021" transform="translate(-6028.122 -5975.477) rotate(-45)">
                            <line id="線_353" data-name="線 353" x2="16" transform="translate(952 9709)" fill="none"
                                stroke="#fff" stroke-width="2" />
                            <line id="線_354" data-name="線 354" x2="16" transform="translate(960 9701) rotate(90)"
                                fill="none" stroke="#fff" stroke-width="2" />
                        </g>
                    </g>
                </svg>
            </button>
            <div class="c-modal__image-wrap">
                <picture>
                    <source srcset="<?php img_path('/top_intro_diagram_sp.webp'); ?>" type="image/webp"
                        media="(max-width: 767px)">
                    <source srcset="<?php img_path('/top_intro_diagram_sp.png'); ?>" media="(max-width: 767px)">
                    <source srcset="<?php img_path('/top_intro_diagram.webp'); ?>" type="image/webp">
                    <img src="<?php img_path('/top_intro_diagram.png'); ?>" alt="西原商事グループの取り組み 大" width="1200"
                        height="auto">
                </picture>
            </div>
        </div>
    </div>

    <!-- 08 Group Companies -->
    <section class="p-top-group">
        <div class="p-top-group__inner">
            <div class="c-section-title c-section-title--with-line">
                <h2 class="c-section-title__ja">グループ会社のご案内</h2>
            </div>
            <ul class="p-top-group__list">
                <li class="p-top-group__item">
                    <a href="https://www.nishihara-corp.jp/" target="_blank" rel="noopener noreferrer"
                        class="p-top-group__card">
                        <div class="p-top-group__logo-wrap">
                            <picture>
                                <source srcset="<?php img_path('/logo_beetle.webp'); ?>" type="image/webp">
                                <img src="<?php img_path('/logo_beetle.png'); ?>" alt="株式会社西原商事"
                                    class="p-top-group__logo p-top-group__logo--beetle">
                            </picture>
                        </div>
                        <p class="p-top-group__item-title"><span class="p-top-group__item-title-name">株式会社 西原商事</span><span class="p-top-group__item-title-sep"> ｜ </span><span class="p-top-group__item-title-biz">廃棄物収集・運搬事業</span></p>
                        <svg class="p-top-group__external-icon" xmlns="http://www.w3.org/2000/svg" width="14"
                            height="14" viewBox="0 0 14 14">
                            <path d="M96,0V11.375h11.375V0Zm10.281,10.281H97.094V1.094h9.188Z"
                                transform="translate(-93.375)" fill="#3072bf" />
                            <path d="M1.094,106.281V96H0v11.375H11.375v-1.094H1.094Z" transform="translate(0 -93.375)"
                                fill="#3072bf" />
                            <path d="M205.3,131.778l3.223-3.223v2.319h1.094v-4.186h-4.186v1.094h2.319L204.531,131Z"
                                transform="translate(-198.938 -123.224)" fill="#3072bf" />
                        </svg>
                    </a>
                </li>
                <li class="p-top-group__item">
                    <a href="https://beetleengineering.jp/" target="_blank" rel="noopener noreferrer"
                        class="p-top-group__card">
                        <div class="p-top-group__logo-wrap">
                            <picture>
                                <source srcset="<?php img_path('/logo_beetle_eng.webp'); ?>" type="image/webp">
                                <img src="<?php img_path('/logo_beetle_eng.png'); ?>" alt="株式会社ビートルエンジニアリング"
                                    class="p-top-group__logo p-top-group__logo--engineering">
                            </picture>
                        </div>
                        <p class="p-top-group__item-title"><span class="p-top-group__item-title-name">株式会社 ビートルエンジニアリング</span><span class="p-top-group__item-title-sep"> ｜ </span><span class="p-top-group__item-title-biz">廃棄物処理・リサイクル事業</span></p>
                        <svg class="p-top-group__external-icon" xmlns="http://www.w3.org/2000/svg" width="14"
                            height="14" viewBox="0 0 14 14">
                            <path d="M96,0V11.375h11.375V0Zm10.281,10.281H97.094V1.094h9.188Z"
                                transform="translate(-93.375)" fill="#3072bf" />
                            <path d="M1.094,106.281V96H0v11.375H11.375v-1.094H1.094Z" transform="translate(0 -93.375)"
                                fill="#3072bf" />
                            <path d="M205.3,131.778l3.223-3.223v2.319h1.094v-4.186h-4.186v1.094h2.319L204.531,131Z"
                                transform="translate(-198.938 -123.224)" fill="#3072bf" />
                        </svg>
                    </a>
                </li>
                <li class="p-top-group__item">
                    <div class="p-top-group__card">
                        <a href="https://beetlemanagement.com/" target="_blank" rel="noopener noreferrer"
                            class="p-top-group__card-link">
                            <div class="p-top-group__logo-wrap">
                                <picture>
                                    <source srcset="<?php img_path('/logo_beetle_mgt.webp'); ?>" type="image/webp">
                                    <img src="<?php img_path('/logo_beetle_mgt.png'); ?>" alt="株式会社ビートルマネージメント"
                                        class="p-top-group__logo p-top-group__logo--management">
                                </picture>
                            </div>
                            <p class="p-top-group__item-title"><span class="p-top-group__item-title-name">株式会社 ビートルマネージメント</span><span class="p-top-group__item-title-sep"> ｜ </span><span class="p-top-group__item-title-biz">廃棄物情報管理事業</span></p>
                        </a>
                        <svg class="p-top-group__external-icon" xmlns="http://www.w3.org/2000/svg" width="14"
                            height="14" viewBox="0 0 14 14">
                            <path d="M96,0V11.375h11.375V0Zm10.281,10.281H97.094V1.094h9.188Z"
                                transform="translate(-93.375)" fill="#3072bf" />
                            <path d="M1.094,106.281V96H0v11.375H11.375v-1.094H1.094Z" transform="translate(0 -93.375)"
                                fill="#3072bf" />
                            <path d="M205.3,131.778l3.223-3.223v2.319h1.094v-4.186h-4.186v1.094h2.319L204.531,131Z"
                                transform="translate(-198.938 -123.224)" fill="#3072bf" />
                        </svg>
                        <div class="p-top-group__subtitle-section">
                            <p class="p-top-group__subtitle">株式会社 ビートルマネージメント運用サービス</p>
                            <div class="p-top-group__sub-links">
                                <a href="https://beetlemanagement.com/outline" class="p-top-group__sub-link" target="_blank" rel="noopener noreferrer">
                                    <picture>
                                        <source srcset="<?php img_path('/logo_bee-net.webp'); ?>" type="image/webp">
                                        <img src="<?php img_path('/logo_bee-net.png'); ?>" alt="ビーネットシステム"
                                            class="p-top-group__logo">
                                    </picture>
                                    <svg class="p-top-group__sub-link-icon" xmlns="http://www.w3.org/2000/svg"
                                        width="12" height="12" viewBox="0 0 14 14" aria-hidden="true">
                                        <path d="M96,0V11.375h11.375V0Zm10.281,10.281H97.094V1.094h9.188Z"
                                            transform="translate(-93.375)" fill="#3072bf" />
                                        <path d="M1.094,106.281V96H0v11.375H11.375v-1.094H1.094Z"
                                            transform="translate(0 -93.375)" fill="#3072bf" />
                                        <path d="M205.3,131.778l3.223-3.223v2.319h1.094v-4.186h-4.186v1.094h2.319L204.531,131Z"
                                            transform="translate(-198.938 -123.224)" fill="#3072bf" />
                                    </svg>
                                </a>
                                <a href="https://www.dusttalk.com/" class="p-top-group__sub-link" target="_blank" rel="noopener noreferrer">
                                    <picture>
                                        <source srcset="<?php img_path('/logo_dustalk.webp'); ?>" type="image/webp">
                                        <img src="<?php img_path('/logo_dustalk.png'); ?>" alt="ダストーク"
                                            class="p-top-group__logo">
                                    </picture>
                                    <svg class="p-top-group__sub-link-icon" xmlns="http://www.w3.org/2000/svg"
                                        width="12" height="12" viewBox="0 0 14 14" aria-hidden="true">
                                        <path d="M96,0V11.375h11.375V0Zm10.281,10.281H97.094V1.094h9.188Z"
                                            transform="translate(-93.375)" fill="#3072bf" />
                                        <path d="M1.094,106.281V96H0v11.375H11.375v-1.094H1.094Z"
                                            transform="translate(0 -93.375)" fill="#3072bf" />
                                        <path d="M205.3,131.778l3.223-3.223v2.319h1.094v-4.186h-4.186v1.094h2.319L204.531,131Z"
                                            transform="translate(-198.938 -123.224)" fill="#3072bf" />
                                    </svg>
                                </a>
                                <a href="#" class="p-top-group__sub-link" target="_blank" rel="noopener noreferrer">
                                    <picture>
                                        <source srcset="<?php img_path('/logo_beetle-auction.webp'); ?>"
                                            type="image/webp">
                                        <img src="<?php img_path('/logo_beetle-auction.png'); ?>" alt="ビートルオークション"
                                            class="p-top-group__logo">
                                    </picture>
                                    <svg class="p-top-group__sub-link-icon" xmlns="http://www.w3.org/2000/svg"
                                        width="12" height="12" viewBox="0 0 14 14" aria-hidden="true">
                                        <path d="M96,0V11.375h11.375V0Zm10.281,10.281H97.094V1.094h9.188Z"
                                            transform="translate(-93.375)" fill="#3072bf" />
                                        <path d="M1.094,106.281V96H0v11.375H11.375v-1.094H1.094Z"
                                            transform="translate(0 -93.375)" fill="#3072bf" />
                                        <path d="M205.3,131.778l3.223-3.223v2.319h1.094v-4.186h-4.186v1.094h2.319L204.531,131Z"
                                            transform="translate(-198.938 -123.224)" fill="#3072bf" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="p-top-group__item">
                    <div class="p-top-group__card">
                        <a href="https://rebit-japan.co.jp/" target="_blank" rel="noopener noreferrer"
                            class="p-top-group__card-link">
                            <div class="p-top-group__logo-wrap">
                                <picture>
                                    <source srcset="<?php img_path('/logo_rebit_japan.webp'); ?>" type="image/webp">
                                    <img src="<?php img_path('/logo_rebit_japan.png'); ?>" alt="株式会社リビットジャパン"
                                        class="p-top-group__logo p-top-group__logo--rebit-japan">
                                </picture>
                            </div>
                            <p class="p-top-group__item-title"><span class="p-top-group__item-title-name">株式会社 リビットジャパン</span><span class="p-top-group__item-title-sep"> ｜ </span><span class="p-top-group__item-title-biz">コンサルタント及びソリューション事業</span></p>
                        </a>
                        <svg class="p-top-group__external-icon" xmlns="http://www.w3.org/2000/svg" width="14"
                            height="14" viewBox="0 0 14 14">
                            <path d="M96,0V11.375h11.375V0Zm10.281,10.281H97.094V1.094h9.188Z"
                                transform="translate(-93.375)" fill="#3072bf" />
                            <path d="M1.094,106.281V96H0v11.375H11.375v-1.094H1.094Z" transform="translate(0 -93.375)"
                                fill="#3072bf" />
                            <path d="M205.3,131.778l3.223-3.223v2.319h1.094v-4.186h-4.186v1.094h2.319L204.531,131Z"
                                transform="translate(-198.938 -123.224)" fill="#3072bf" />
                        </svg>
                        <div class="p-top-group__subtitle-section">
                            <p class="p-top-group__subtitle">株式会社 リビットジャパン運用サービス</p>
                            <div class="p-top-group__sub-links">
                                <a href="#" class="p-top-group__sub-link" target="_blank" rel="noopener noreferrer">
                                    <picture>
                                        <source srcset="<?php img_path('/logo_rebit.webp'); ?>" type="image/webp">
                                        <img src="<?php img_path('/logo_rebit.png'); ?>" alt="リビット"
                                            class="p-top-group__logo">
                                    </picture>
                                    <svg class="p-top-group__sub-link-icon" xmlns="http://www.w3.org/2000/svg"
                                        width="12" height="12" viewBox="0 0 14 14" aria-hidden="true">
                                        <path d="M96,0V11.375h11.375V0Zm10.281,10.281H97.094V1.094h9.188Z"
                                            transform="translate(-93.375)" fill="#3072bf" />
                                        <path d="M1.094,106.281V96H0v11.375H11.375v-1.094H1.094Z"
                                            transform="translate(0 -93.375)" fill="#3072bf" />
                                        <path d="M205.3,131.778l3.223-3.223v2.319h1.094v-4.186h-4.186v1.094h2.319L204.531,131Z"
                                            transform="translate(-198.938 -123.224)" fill="#3072bf" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="p-top-group__more">
                <a href="<?php page_path('business'); ?>" class="c-btn">事業紹介</a>
            </div>
        </div>
    </section>

    <!-- 09 Recruit Section -->
    <section class="p-top-recruit">
        <div class="p-top-recruit__container">
            <!-- 左側：コンテンツエリア -->
            <div class="p-top-recruit__content-side">
                <div class="p-top-recruit__content">
                    <div class="p-top-recruit__head c-section-line--white">
                        <h2 class="c-section-title__ja--white">採用情報</h2>
                    </div>
                    <p class="p-top-recruit__text">
                        西原商事ホールディングスの採用情報は<br>リクルートサイトよりご案内しております。
                    </p>
                </div>
            </div>
            <div class="p-top-recruit__btn-wrap">
                <a href="#" target="_blank" rel="noopener noreferrer" class="c-btn">リクルートサイトへ</a>
            </div>
            <!-- 右側：画像エリア -->
            <div class="p-top-recruit__image-side">
                <picture>
                    <!-- PC -->
                    <source media="(min-width: 768px)" srcset="<?php img_path('/top_recruit_pc.webp'); ?>" type="image/webp">
                    <source media="(min-width: 768px)" srcset="<?php img_path('/top_recruit_pc.png'); ?>">
                    <!-- SP -->
                    <source srcset="<?php img_path('/top_recruit_sp.webp'); ?>" type="image/webp">
                    <img src="<?php img_path('/top_recruit_sp.png'); ?>" alt="トラックを運転する社員" width="780"
                        height="600" class="p-top-recruit__image" loading="lazy" decoding="async">
                </picture>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>
<?php get_header(); ?>
<main class="l-page p-about-page">

    <!-- 下層共通FV -->
    <section class="p-pageHead">
        <div class="p-pageHead__inner l-inner">
            <h1 class="p-pageHead__title">会社案内</h1>
        </div>
    </section>

    <!-- about本体 -->
    <section class="p-about">
        <div class="p-about__inner l-inner">
            <div class="p-about__lead">
                <h2 class="p-about__leadTitle">社会から広く期待され、信頼される企業であり続けるために</h2>
                <p class="p-about__leadText">
                    私たち西原商事ホールディングスは、「リサイクル・環境事業を通して、広く社会に期待される会社であること」という不変の理念を掲げています。時代の変化を捉え、地域とともに歩む。この街の暮らしを次世代へつなぐため、私たちは挑戦を続け、持続可能な社会への責任を果たしていきます。
                </p>
            </div>

            <ul class="p-about__cards">
                <li class="p-about__card">
                    <a class="p-about__cardLink" href="<?php page_path('company/message'); ?>">
                        <div class="p-about__cardImg">
                            <picture>
                                <source srcset="<?php img_path('/img_company--01.webp'); ?>" type="image/webp">
                                <img src="<?php img_path('/img_company--01.png'); ?>" alt="代表挨拶" width="380"
                                    height="200">
                            </picture>
                        </div>
                        <span class="p-about__cardLabel">代表挨拶</span>
                    </a>
                </li>
                <li class="p-about__card">
                    <a class="p-about__cardLink" href="<?php page_path('company/philosophy'); ?>">
                        <div class="p-about__cardImg">
                            <picture>
                                <source srcset="<?php img_path('/img_company--02.webp'); ?>" type="image/webp">
                                <img src="<?php img_path('/img_company--02.png'); ?>" alt="企業理念" width="380"
                                    height="200">
                            </picture>
                        </div>
                        <span class="p-about__cardLabel">企業理念</span>
                    </a>
                </li>
                <li class="p-about__card">
                    <a class="p-about__cardLink" href="<?php page_path('company/overview'); ?>">
                        <div class="p-about__cardImg">
                            <picture>
                                <source srcset="<?php img_path('/img_company--03.webp'); ?>" type="image/webp">
                                <img src="<?php img_path('/img_company--03.png'); ?>" alt="会社概要" width="380"
                                    height="200">
                            </picture>
                        </div>
                        <span class="p-about__cardLabel">会社概要</span>
                    </a>
                </li>
                <li class="p-about__card">
                    <a class="p-about__cardLink" href="<?php page_path('company/location'); ?>">
                        <div class="p-about__cardImg">
                            <picture>
                                <source srcset="<?php img_path('/img_company--04.webp'); ?>" type="image/webp">
                                <img src="<?php img_path('/img_company--04.png'); ?>" alt="拠点一覧" width="380"
                                    height="200">
                            </picture>
                        </div>
                        <span class="p-about__cardLabel">拠点一覧</span>
                    </a>
                </li>
                <li class="p-about__card">
                    <a class="p-about__cardLink" href="<?php page_path('company/history'); ?>">
                        <div class="p-about__cardImg">
                            <picture>
                                <source srcset="<?php img_path('/img_company--05.webp'); ?>" type="image/webp">
                                <img src="<?php img_path('/img_company--05.png'); ?>" alt="グループのあゆみ" width="380"
                                    height="200">
                            </picture>
                        </div>
                        <span class="p-about__cardLabel">グループの<br>あゆみ</span>
                    </a>
                </li>
                <li class="p-about__card">
                    <a class="p-about__cardLink" href="<?php page_path('company/group'); ?>">
                        <div class="p-about__cardImg">
                            <picture>
                                <source srcset="<?php img_path('/img_company--06.webp'); ?>" type="image/webp">
                                <img src="<?php img_path('/img_company--06.png'); ?>" alt="グループ会社・関連団体" width="380"
                                    height="200">
                            </picture>
                        </div>
                        <span class="p-about__cardLabel">グループ会社・<br>関連団体</span>
                    </a>
                </li>
            </ul>
        </div>
    </section>

    <!-- 下層共通パンくず（フッター直前） -->
    <div class="p-breadcrumb l-breadcrumb">
        <div class="p-breadcrumb__inner l-inner">
            <div class="p-breadcrumb__wrapper" typeof="BreadcrumbList" vocab="https://schema.org/">
                <?php if (function_exists('bcn_display')) : ?>
                <?php bcn_display(); ?>
                <?php else : ?>
                <a href="<?php page_path(); ?>">トップページ</a><span class="separator">&gt;</span>会社案内
                <?php endif; ?>
            </div>
            <a href="#" class="p-breadcrumb__totop" aria-label="ページトップへ戻る">
                <span class="p-breadcrumb__totopArrow"></span>
            </a>
        </div>
    </div>

</main>
<?php get_footer(); ?>

<?php get_header(); ?>
<main class="l-page p-philosophy-page">

    <!-- 下層共通FV -->
    <section class="p-pageHead">
        <div class="p-pageHead__inner l-inner">
            <h1 class="p-pageHead__title">企業理念</h1>
        </div>
    </section>

    <!-- philosophy本体（左:本文 / 右:ローカルナビ） -->
    <section class="p-philosophy">
        <div class="p-philosophy__inner l-inner">

            <div class="p-philosophy__main">
                <!-- ブロック1: グループ企業理念 -->
                <section class="p-philosophy__block">
                    <h2 class="p-philosophy__barHead">グループ企業理念</h2>
                    <p class="p-philosophy__lead">リサイクル・環境事業を通して、広く社会に期待される会社であること。</p>
                </section>

                <!-- ブロック2: グループビジョン -->
                <section class="p-philosophy__block">
                    <h2 class="p-philosophy__barHead">グループビジョン</h2>
                    <p class="p-philosophy__lead">西原商事グループで働く人々の「豊かさ」を追求する。</p>
                    <div class="p-philosophy__visionBody">
                        <figure class="p-philosophy__visionImg">
                            <picture>
                                <source srcset="<?php img_path('/img_philosophy--01.webp'); ?>" type="image/webp">
                                <img src="<?php img_path('/img_philosophy--01.png'); ?>" alt="グループビジョンイメージ"
                                    width="410" height="253">
                            </picture>
                        </figure>
                        <p class="p-philosophy__visionText">
                            経済面、健康面、職場環境などの側面において、豊かさを追求できる会社を目指す。そのためにはステークホルダーに対し、時代のニーズに応える提案を継続的に行える会社であり、常に改善意識を持ち積極的に行動する環境事業のプロフェッショナル集団でなければならない。その対価が、自身の「豊かさ」につながり、西原商事グループの柱となる。
                        </p>
                    </div>
                </section>
            </div>

            <!-- 会社案内ローカルナビ -->
            <aside class="p-philosophy__side">
                <nav class="c-localNav" aria-label="会社案内メニュー">
                    <p class="c-localNav__head">
                        <a href="<?php page_path('company'); ?>">会社案内</a>
                    </p>
                    <ul class="c-localNav__list">
                        <li class="c-localNav__item">
                            <a href="<?php page_path('company/message'); ?>">代表挨拶</a>
                        </li>
                        <li class="c-localNav__item c-localNav__item--current">
                            <a href="<?php page_path('company/philosophy'); ?>" aria-current="page">企業理念</a>
                        </li>
                        <li class="c-localNav__item">
                            <a href="<?php page_path('company/overview'); ?>">会社概要</a>
                            <ul class="c-localNav__sub">
                                <li>
                                    <a href="<?php page_path('company/overview/officer'); ?>">役員一覧</a>
                                </li>
                            </ul>
                        </li>
                        <li class="c-localNav__item">
                            <a href="<?php page_path('company/location'); ?>">拠点一覧</a>
                        </li>
                        <li class="c-localNav__item">
                            <a href="<?php page_path('company/history'); ?>">グループのあゆみ</a>
                        </li>
                        <li class="c-localNav__item">
                            <a href="<?php page_path('company/group'); ?>">グループ会社・関連団体</a>
                        </li>
                    </ul>
                </nav>
            </aside>

        </div>
    </section>

    <!-- 下層共通パンくず（フッター直前） -->
    <div class="p-breadcrumb l-breadcrumb">
        <div class="p-breadcrumb__inner l-inner">
            <div class="p-breadcrumb__wrapper" typeof="BreadcrumbList" vocab="https://schema.org/">
                <?php if (function_exists('bcn_display')) : ?>
                <?php bcn_display(); ?>
                <?php else : ?>
                <a href="<?php page_path(); ?>">トップページ</a><span class="separator">&gt;</span><a
                    href="<?php page_path('company'); ?>">会社案内</a><span class="separator">&gt;</span>企業理念
                <?php endif; ?>
            </div>
            <a href="#" class="p-breadcrumb__totop" aria-label="ページトップへ戻る">
                <span class="p-breadcrumb__totopArrow"></span>
            </a>
        </div>
    </div>

</main>
<?php get_footer(); ?>

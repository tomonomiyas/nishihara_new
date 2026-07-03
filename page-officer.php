<?php get_header(); ?>
<main class="l-page p-officer-page">

    <!-- 下層共通FV -->
    <section class="p-pageHead">
        <div class="p-pageHead__inner l-inner">
            <h1 class="p-pageHead__title">役員一覧</h1>
        </div>
    </section>

    <!-- officer本体 -->
    <section class="p-officer">
        <div class="p-officer__inner l-inner">
            <div class="p-officer__layout">

                <div class="p-officer__main">
                    <h2 class="p-officer__heading">役員一覧</h2>

                    <table class="p-officer__table">
                        <tbody>
                            <tr class="p-officer__row">
                                <th class="p-officer__role" scope="row">代表取締役社長</th>
                                <td class="p-officer__name">西原 靖博</td>
                            </tr>
                            <tr class="p-officer__row">
                                <th class="p-officer__role" scope="row">専務取締役</th>
                                <td class="p-officer__name">西原 明宏</td>
                            </tr>
                            <tr class="p-officer__row">
                                <th class="p-officer__role" scope="row">常務取締役</th>
                                <td class="p-officer__name">成田 詩歩</td>
                            </tr>
                            <tr class="p-officer__row">
                                <th class="p-officer__role" scope="row">取締役</th>
                                <td class="p-officer__name">中島 佳見</td>
                            </tr>
                        </tbody>
                    </table>

                    <p class="p-officer__note">（2025年11月時点）</p>
                </div>

                <aside class="p-officer__side">
                    <nav class="c-localNav" aria-label="会社案内メニュー">
                        <p class="c-localNav__head">
                            <a href="<?php page_path('company'); ?>">会社案内</a>
                        </p>
                        <ul class="c-localNav__list">
                            <li class="c-localNav__item">
                                <a href="<?php page_path('company/message'); ?>">代表挨拶</a>
                            </li>
                            <li class="c-localNav__item">
                                <a href="<?php page_path('company/philosophy'); ?>">企業理念</a>
                            </li>
                            <li class="c-localNav__item c-localNav__item--current">
                                <a href="<?php page_path('company/overview'); ?>">会社概要</a>
                                <ul class="c-localNav__sub">
                                    <li class="c-localNav__sub--current">
                                        <a href="<?php page_path('company/overview/officer'); ?>" aria-current="page">役員一覧</a>
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
                    href="<?php page_path('company'); ?>">会社案内</a><span class="separator">&gt;</span><a
                    href="<?php page_path('company/overview'); ?>">会社概要</a><span class="separator">&gt;</span>役員一覧
                <?php endif; ?>
            </div>
            <a href="#" class="p-breadcrumb__totop" aria-label="ページトップへ戻る">
                <span class="p-breadcrumb__totopArrow"></span>
            </a>
        </div>
    </div>

</main>
<?php get_footer(); ?>

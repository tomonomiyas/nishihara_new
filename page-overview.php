<?php get_header(); ?>
<main class="l-page p-overview-page">

    <!-- 下層共通FV -->
    <section class="p-pageHead">
        <div class="p-pageHead__inner l-inner">
            <h1 class="p-pageHead__title">会社概要</h1>
        </div>
    </section>

    <!-- 本体 -->
    <section class="p-overview">
        <div class="p-overview__inner l-inner">
            <div class="p-overview__body">

                <!-- 会社概要テーブル -->
                <div class="p-overview__main">
                    <h2 class="p-overview__title">会社概要</h2>
                    <table class="p-overview__table">
                        <tbody>
                            <tr>
                                <th>社名</th>
                                <td>株式会社西原商事ホールディングス</td>
                            </tr>
                            <tr>
                                <th>本社住所</th>
                                <td>〒807-0821<br>福岡県北九州市八幡西区陣原2-2-21</td>
                            </tr>
                            <tr>
                                <th>創業</th>
                                <td>1972年（昭和47年）5月</td>
                            </tr>
                            <tr>
                                <th>設立</th>
                                <td>2019年（平成31年）4月25日（ホールディングス化）</td>
                            </tr>
                            <tr>
                                <th>資本金</th>
                                <td>3,500万円</td>
                            </tr>
                            <tr>
                                <th>代表者</th>
                                <td>代表取締役　西原 靖博</td>
                            </tr>
                            <tr>
                                <th>役員</th>
                                <td>こちらの<a href="<?php page_path('company/overview/officer'); ?>">「役員一覧」</a>をご覧ください。</td>
                            </tr>
                            <tr>
                                <th>従業員数</th>
                                <td>224名（グループ全体・2025年11月時点）</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- 会社案内サイドナビ（共通パーツ） -->
                <aside class="p-overview__side">
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
                                <a href="<?php page_path('company/overview'); ?>" aria-current="page">会社概要</a>
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
        </div>
    </section>

    <!-- 下層共通パンくず（フッター直前・3階層） -->
    <div class="p-breadcrumb l-breadcrumb">
        <div class="p-breadcrumb__inner l-inner">
            <div class="p-breadcrumb__wrapper" typeof="BreadcrumbList" vocab="https://schema.org/">
                <a href="<?php page_path(); ?>">トップページ</a><span class="separator">&gt;</span>
                <a href="<?php page_path('company'); ?>">会社案内</a><span class="separator">&gt;</span>会社概要
            </div>
            <a href="#" class="p-breadcrumb__totop" aria-label="ページトップへ戻る">
                <span class="p-breadcrumb__totopArrow"></span>
            </a>
        </div>
    </div>

</main>
<?php get_footer(); ?>

<?php get_header(); ?>
<main class="l-page p-location-page">

    <!-- 下層共通FV -->
    <section class="p-pageHead">
        <div class="p-pageHead__inner l-inner">
            <h1 class="p-pageHead__title">拠点一覧</h1>
        </div>
    </section>

    <!-- location本体（左:本文 / 右:ローカルナビ） -->
    <section class="p-location">
        <div class="p-location__inner l-inner">

            <div class="p-location__main">

                <!-- 本社ブロック -->
                <section class="p-location__block">
                    <h2 class="p-location__barHead">本社</h2>
                    <article class="p-location__card p-location__card--main">
                        <div class="p-location__cardImg">
                            <picture>
                                <source srcset="<?php img_path('/img_location--01.webp'); ?>" type="image/webp">
                                <img src="<?php img_path('/img_location--01.png'); ?>" alt="本社工場" width="410"
                                    height="253">
                            </picture>
                        </div>
                        <div class="p-location__cardBody">
                            <p class="p-location__cardName">本社工場</p>
                            <p class="p-location__cardInfo">
                                〒807-0821<br>
                                福岡県北九州市八幡西区陣原2-2-21<br>
                                TEL：093-641-2055<br>
                                FAX：093-641-2088
                            </p>
                            <a class="p-location__mapLink" href="https://maps.app.goo.gl/2yGyR865WRRqKBPL7" target="_blank" rel="noopener noreferrer">
                                <span class="p-location__mapLinkText">Google Mapを別ウインドウで表示する</span>
                                <img class="p-location__mapLinkIcon" src="<?php img_path('/icon_external_link_black.svg'); ?>"
                                    alt="" width="12" height="12">
                            </a>
                        </div>
                    </article>
                </section>

                <!-- 支店・工場ブロック -->
                <section class="p-location__block">
                    <h2 class="p-location__barHead">支店・工場</h2>
                    <ul class="p-location__cards">
                        <li class="p-location__card">
                            <div class="p-location__cardImg">
                                <picture>
                                    <source srcset="<?php img_path('/img_location--02.webp'); ?>" type="image/webp">
                                    <img src="<?php img_path('/img_location--02.png'); ?>" alt="第5工場（夕原工場）"
                                        width="410" height="253">
                                </picture>
                            </div>
                            <div class="p-location__cardBody">
                                <p class="p-location__cardName">第5工場（夕原工場）</p>
                                <p class="p-location__cardInfo">
                                    〒807-0813<br>
                                    福岡県北九州市八幡西区夕原町7-3<br>
                                    TEL：093-645-1588<br>
                                    FAX：093-645-1688
                                </p>
                                <a class="p-location__mapLink" href="https://maps.app.goo.gl/15XDfU3zY3uLtbnS6" target="_blank" rel="noopener noreferrer">
                                    <span class="p-location__mapLinkText">Google Mapを別ウインドウで表示する</span>
                                    <img class="p-location__mapLinkIcon"
                                        src="<?php img_path('/icon_external_link_black.svg'); ?>" alt="" width="12"
                                        height="12">
                                </a>
                            </div>
                        </li>
                        <li class="p-location__card">
                            <div class="p-location__cardImg">
                                <picture>
                                    <source srcset="<?php img_path('/img_location--03.webp'); ?>" type="image/webp">
                                    <img src="<?php img_path('/img_location--03.png'); ?>" alt="第6工場（CRIP工場）"
                                        width="410" height="253">
                                </picture>
                            </div>
                            <div class="p-location__cardBody">
                                <p class="p-location__cardName">第6工場（CRIP工場）</p>
                                <p class="p-location__cardInfo">
                                    〒807-0821<br>
                                    福岡県北九州市八幡西区陣原2-8-2<br>
                                    TEL：093-644-0158<br>
                                    FAX：093-644-0168
                                </p>
                                <a class="p-location__mapLink" href="https://maps.app.goo.gl/y8R1agKd5yhZYDMy6" target="_blank" rel="noopener noreferrer">
                                    <span class="p-location__mapLinkText">Google Mapを別ウインドウで表示する</span>
                                    <img class="p-location__mapLinkIcon"
                                        src="<?php img_path('/icon_external_link_black.svg'); ?>" alt="" width="12"
                                        height="12">
                                </a>
                            </div>
                        </li>
                        <li class="p-location__card">
                            <div class="p-location__cardImg">
                                <picture>
                                    <source srcset="<?php img_path('/img_location--04.webp'); ?>" type="image/webp">
                                    <img src="<?php img_path('/img_location--04.png'); ?>" alt="第7工場（FROG工場）"
                                        width="410" height="253">
                                </picture>
                            </div>
                            <div class="p-location__cardBody">
                                <p class="p-location__cardName">第7工場（FROG工場）</p>
                                <p class="p-location__cardInfo">
                                    〒807-0813<br>
                                    福岡県北九州市八幡西区夕原町10-5<br>
                                    TEL：093-645-1588<br>
                                    FAX：093-645-1688
                                </p>
                                <a class="p-location__mapLink" href="https://maps.app.goo.gl/KrvpxF6QFPjTq8gA6" target="_blank" rel="noopener noreferrer">
                                    <span class="p-location__mapLinkText">Google Mapを別ウインドウで表示する</span>
                                    <img class="p-location__mapLinkIcon"
                                        src="<?php img_path('/icon_external_link_black.svg'); ?>" alt="" width="12"
                                        height="12">
                                </a>
                            </div>
                        </li>
                        <li class="p-location__card">
                            <div class="p-location__cardImg">
                                <picture>
                                    <source srcset="<?php img_path('/img_location--05.webp'); ?>" type="image/webp">
                                    <img src="<?php img_path('/img_location--05.png'); ?>" alt="東京支店" width="410"
                                        height="253">
                                </picture>
                            </div>
                            <div class="p-location__cardBody">
                                <p class="p-location__cardName">東京支店</p>
                                <p class="p-location__cardInfo">
                                    〒104-0032<br>
                                    東京都中央区八丁堀3-10-3 JP-BASE京橋 7F<br>
                                    TEL：03-5962-0938<br>
                                    FAX：03-5962-0937
                                </p>
                                <a class="p-location__mapLink" href="https://maps.app.goo.gl/mXLVoNiVpiik8svp9" target="_blank" rel="noopener noreferrer">
                                    <span class="p-location__mapLinkText">Google Mapを別ウインドウで表示する</span>
                                    <img class="p-location__mapLinkIcon"
                                        src="<?php img_path('/icon_external_link_black.svg'); ?>" alt="" width="12"
                                        height="12">
                                </a>
                            </div>
                        </li>
                        <li class="p-location__card">
                            <div class="p-location__cardImg">
                                <picture>
                                    <source srcset="<?php img_path('/img_location--06.webp'); ?>" type="image/webp">
                                    <img src="<?php img_path('/img_location--06.png'); ?>" alt="福岡支店（箱崎工場）"
                                        width="410" height="253">
                                </picture>
                            </div>
                            <div class="p-location__cardBody">
                                <p class="p-location__cardName">福岡支店（箱崎工場）</p>
                                <p class="p-location__cardInfo">
                                    〒812-0051<br>
                                    福岡県福岡市東区箱崎ふ頭4-13-1<br>
                                    TEL：092-632-7055<br>
                                    FAX：092-632-7077
                                </p>
                                <a class="p-location__mapLink" href="https://maps.app.goo.gl/5CnoPksKVomMGeES9" target="_blank" rel="noopener noreferrer">
                                    <span class="p-location__mapLinkText">Google Mapを別ウインドウで表示する</span>
                                    <img class="p-location__mapLinkIcon"
                                        src="<?php img_path('/icon_external_link_black.svg'); ?>" alt="" width="12"
                                        height="12">
                                </a>
                            </div>
                        </li>
                        <li class="p-location__card">
                            <div class="p-location__cardImg">
                                <picture>
                                    <source srcset="<?php img_path('/img_location--07.webp'); ?>" type="image/webp">
                                    <img src="<?php img_path('/img_location--07.png'); ?>" alt="若松工場" width="410"
                                        height="253">
                                </picture>
                            </div>
                            <div class="p-location__cardBody">
                                <p class="p-location__cardName">若松工場</p>
                                <p class="p-location__cardInfo">
                                    〒808-0021<br>
                                    福岡県北九州市若松区響町1-62-39<br>
                                    TEL：093-752-2055<br>
                                    FAX：093-752-2088
                                </p>
                                <a class="p-location__mapLink" href="https://maps.app.goo.gl/SnytLNrxK6QBynBcA" target="_blank" rel="noopener noreferrer">
                                    <span class="p-location__mapLinkText">Google Mapを別ウインドウで表示する</span>
                                    <img class="p-location__mapLinkIcon"
                                        src="<?php img_path('/icon_external_link_black.svg'); ?>" alt="" width="12"
                                        height="12">
                                </a>
                            </div>
                        </li>
                        <li class="p-location__card">
                            <div class="p-location__cardImg">
                                <picture>
                                    <source srcset="<?php img_path('/img_location--08.webp'); ?>" type="image/webp">
                                    <img src="<?php img_path('/img_location--08.png'); ?>" alt="若松第2工場（BRC）"
                                        width="410" height="253">
                                </picture>
                            </div>
                            <div class="p-location__cardBody">
                                <p class="p-location__cardName">若松第2工場（BRC）</p>
                                <p class="p-location__cardInfo">
                                    〒808-0021<br>
                                    福岡県北九州市若松区響町1-105-16<br>
                                    TEL：093-752-1728<br>
                                    FAX：093-752-1738
                                </p>
                                <a class="p-location__mapLink" href="https://maps.app.goo.gl/myHeiaCpsTNQJR117" target="_blank" rel="noopener noreferrer">
                                    <span class="p-location__mapLinkText">Google Mapを別ウインドウで表示する</span>
                                    <img class="p-location__mapLinkIcon"
                                        src="<?php img_path('/icon_external_link_black.svg'); ?>" alt="" width="12"
                                        height="12">
                                </a>
                            </div>
                        </li>
                        <li class="p-location__card">
                            <div class="p-location__cardImg">
                                <picture>
                                    <source srcset="<?php img_path('/img_location--09.webp'); ?>" type="image/webp">
                                    <img src="<?php img_path('/img_location--09.png'); ?>" alt="若松第2工場（SRC）"
                                        width="410" height="253">
                                </picture>
                            </div>
                            <div class="p-location__cardBody">
                                <p class="p-location__cardName">若松第2工場（SRC）</p>
                                <p class="p-location__cardInfo">
                                    〒808-0021<br>
                                    福岡県北九州市若松区響町1-105-24<br>
                                    TEL：093-752-2708<br>
                                    FAX：093-752-2718
                                </p>
                                <a class="p-location__mapLink" href="https://maps.app.goo.gl/2bMAxTh2DZdBbbQm7" target="_blank" rel="noopener noreferrer">
                                    <span class="p-location__mapLinkText">Google Mapを別ウインドウで表示する</span>
                                    <img class="p-location__mapLinkIcon"
                                        src="<?php img_path('/icon_external_link_black.svg'); ?>" alt="" width="12"
                                        height="12">
                                </a>
                            </div>
                        </li>
                        <li class="p-location__card">
                            <div class="p-location__cardImg">
                                <picture>
                                    <source srcset="<?php img_path('/img_location--10.webp'); ?>" type="image/webp">
                                    <img src="<?php img_path('/img_location--10.png'); ?>" alt="若松プラリー工場"
                                        width="410" height="253">
                                </picture>
                            </div>
                            <div class="p-location__cardBody">
                                <p class="p-location__cardName">若松プラリー工場</p>
                                <p class="p-location__cardInfo">
                                    〒808-0002<br>
                                    福岡県北九州市若松区向洋町10-5<br>
                                    TEL：【電話番号】※準備中<br>
                                    FAX：【FAX番号】※準備中
                                </p>
                                <a class="p-location__mapLink" href="https://maps.app.goo.gl/DCFGRPx75namkL1o8" target="_blank" rel="noopener noreferrer">
                                    <span class="p-location__mapLinkText">Google Mapを別ウインドウで表示する</span>
                                    <img class="p-location__mapLinkIcon"
                                        src="<?php img_path('/icon_external_link_black.svg'); ?>" alt="" width="12"
                                        height="12">
                                </a>
                            </div>
                        </li>
                    </ul>
                </section>

            </div>

            <!-- 会社案内ローカルナビ -->
            <aside class="p-location__side">
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
                        <li class="c-localNav__item">
                            <a href="<?php page_path('company/overview'); ?>">会社概要</a>
                            <ul class="c-localNav__sub">
                                <li>
                                    <a href="<?php page_path('company/overview/officer'); ?>">役員一覧</a>
                                </li>
                            </ul>
                        </li>
                        <li class="c-localNav__item c-localNav__item--current">
                            <a href="<?php page_path('company/location'); ?>" aria-current="page">拠点一覧</a>
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
                    href="<?php page_path('company'); ?>">会社案内</a><span class="separator">&gt;</span>拠点一覧
                <?php endif; ?>
            </div>
            <a href="#" class="p-breadcrumb__totop" aria-label="ページトップへ戻る">
                <span class="p-breadcrumb__totopArrow"></span>
            </a>
        </div>
    </div>

</main>
<?php get_footer(); ?>

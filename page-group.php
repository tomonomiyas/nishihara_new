<?php get_header(); ?>
<main class="l-page p-group-page">

    <!-- 下層共通FV -->
    <section class="p-pageHead">
        <div class="p-pageHead__inner l-inner">
            <h1 class="p-pageHead__title">グループ会社・関連団体</h1>
        </div>
    </section>

    <!-- 本体 -->
    <section class="p-group">
        <div class="p-group__inner l-inner">
            <div class="p-group__body">

                <!-- メインカラム -->
                <div class="p-group__main">

                    <!-- 組織図 -->
                    <h2 class="p-group__barHead">組織図</h2>

                    <div class="p-group__chart">

                        <!-- 親会社：西原商事ホールディングス -->
                        <div class="p-group__company p-group__company--parent">
                            <div class="p-group__companyHead">
                                <div class="p-group__logo p-group__logo--hld">
                                    <picture>
                                        <source srcset="<?php img_path('/logo_hld.webp'); ?>" type="image/webp">
                                        <img src="<?php img_path('/logo_hld.png'); ?>" alt="株式会社西原商事ホールディングス" width="338" height="16" loading="lazy" decoding="async">
                                    </picture>
                                </div>
                                <p class="p-group__companyName">株式会社西原商事ホールディングス</p>
                            </div>
                            <ul class="p-group__depts">
                                <li class="p-group__dept">企画部</li>
                                <li class="p-group__dept">営業部</li>
                                <li class="p-group__dept">施設管理部</li>
                                <li class="p-group__dept">総務部</li>
                                <li class="p-group__dept">システム管理部</li>
                            </ul>
                        </div>

                        <!-- 子会社グループ -->
                        <div class="p-group__children">

                            <!-- 子会社①：西原商事 -->
                            <div class="p-group__company">
                                <div class="p-group__companyHead">
                                    <div class="p-group__logo p-group__logo--beetle">
                                        <picture>
                                            <source srcset="<?php img_path('/logo_beetle.webp'); ?>" type="image/webp">
                                            <img src="<?php img_path('/logo_beetle.png'); ?>" alt="株式会社西原商事" width="116" height="32" loading="lazy" decoding="async">
                                        </picture>
                                    </div>
                                    <p class="p-group__companyName">株式会社西原商事</p>
                                    <a class="p-group__siteLink" href="https://www.nishihara-corp.jp/" target="_blank" rel="noopener noreferrer">
                                        <span class="p-group__siteLinkText">ウェブサイトを見る</span>
                                        <img class="p-group__siteLinkIcon" src="<?php img_path('/icon_external_link_black.svg'); ?>" alt="" width="12" height="12">
                                    </a>
                                    <p class="p-group__address">
                                        〒807-0821<br>
                                        福岡県北九州市八幡西区陣原2-2-21<br>
                                        TEL：093-641-2055<br>
                                        FAX：093-641-2088
                                    </p>
                                </div>
                                <ul class="p-group__depts">
                                    <li class="p-group__dept">業務管理部</li>
                                    <li class="p-group__dept">福岡事業部</li>
                                    <li class="p-group__dept">営業部</li>
                                    <li class="p-group__dept">施設管理部</li>
                                    <li class="p-group__dept">事務管理部</li>
                                </ul>
                            </div>

                            <!-- 子会社②：ビートルエンジニアリング -->
                            <div class="p-group__company">
                                <div class="p-group__companyHead">
                                    <div class="p-group__logo p-group__logo--eng">
                                        <picture>
                                            <source srcset="<?php img_path('/logo_beetle_eng.webp'); ?>" type="image/webp">
                                            <img src="<?php img_path('/logo_beetle_eng.png'); ?>" alt="株式会社ビートルエンジニアリング" width="256" height="44" loading="lazy" decoding="async">
                                        </picture>
                                    </div>
                                    <p class="p-group__companyName">株式会社ビートルエンジニアリング</p>
                                    <a class="p-group__siteLink" href="https://beetleengineering.jp/" target="_blank" rel="noopener noreferrer">
                                        <span class="p-group__siteLinkText">ウェブサイトを見る</span>
                                        <img class="p-group__siteLinkIcon" src="<?php img_path('/icon_external_link_black.svg'); ?>" alt="" width="12" height="12">
                                    </a>
                                    <p class="p-group__address">
                                        〒807-0821<br>
                                        福岡県北九州市八幡西区陣原2-8-2<br>
                                        TEL：093-644-0158<br>
                                        FAX：093-644-0168
                                    </p>
                                </div>
                                <ul class="p-group__depts">
                                    <li class="p-group__dept">焼却事業部</li>
                                    <li class="p-group__dept">SRC事業部（プラスチックリサイクル）</li>
                                    <li class="p-group__dept">BRC事業部（空容器リサイクル）</li>
                                    <li class="p-group__dept">プラント事業部</li>
                                    <li class="p-group__dept">営業部</li>
                                    <li class="p-group__dept">事務管理部</li>
                                </ul>
                            </div>

                            <!-- 子会社③：ビートルマネージメント -->
                            <div class="p-group__company">
                                <div class="p-group__companyHead">
                                    <div class="p-group__logo p-group__logo--mgt">
                                        <picture>
                                            <source srcset="<?php img_path('/logo_beetle_mgt.webp'); ?>" type="image/webp">
                                            <img src="<?php img_path('/logo_beetle_mgt.png'); ?>" alt="株式会社ビートルマネージメント" width="286" height="25" loading="lazy" decoding="async">
                                        </picture>
                                    </div>
                                    <p class="p-group__companyName">株式会社ビートルマネージメント</p>
                                    <a class="p-group__siteLink" href="https://beetlemanagement.com/" target="_blank" rel="noopener noreferrer">
                                        <span class="p-group__siteLinkText">ウェブサイトを見る</span>
                                        <img class="p-group__siteLinkIcon" src="<?php img_path('/icon_external_link_black.svg'); ?>" alt="" width="12" height="12">
                                    </a>
                                    <p class="p-group__address">
                                        〒807-0821<br>
                                        福岡県北九州市八幡西区陣原2-8-2<br>
                                        TEL：093-644-0158<br>
                                        FAX：093-644-0168
                                    </p>
                                </div>
                                <ul class="p-group__depts">
                                    <li class="p-group__dept">営業部</li>
                                    <li class="p-group__dept">情報管理部</li>
                                    <li class="p-group__dept">東京支店</li>
                                </ul>
                            </div>

                        </div>
                    </div>

                    <!-- 関連団体一覧 -->
                    <h2 class="p-group__barHead p-group__orgHead">関連団体一覧</h2>

                    <ul class="p-group__orgList">
                        <li class="p-group__orgItem">
                            <a class="p-group__orgLink" href="https://www.cps.go.jp/" target="_blank" rel="noopener noreferrer">
                                <span class="p-group__orgText">サーキュラーパートナーズ</span>
                                <img class="p-group__orgIcon" src="<?php img_path('/icon_external_link.svg'); ?>" alt="" width="12" height="12">
                            </a>
                        </li>
                        <li class="p-group__orgItem">
                            <a class="p-group__orgLink" href="https://ondankataisaku.env.go.jp/decokatsu/" target="_blank" rel="noopener noreferrer">
                                <span class="p-group__orgText">デコ活</span>
                                <img class="p-group__orgIcon" src="<?php img_path('/icon_external_link.svg'); ?>" alt="" width="12" height="12">
                            </a>
                        </li>
                        <li class="p-group__orgItem">
                            <a class="p-group__orgLink" href="https://www.biz-partnership.jp/" target="_blank" rel="noopener noreferrer">
                                <span class="p-group__orgText">パートナーシップ構築宣言</span>
                                <img class="p-group__orgIcon" src="<?php img_path('/icon_external_link.svg'); ?>" alt="" width="12" height="12">
                            </a>
                        </li>
                        <li class="p-group__orgItem">
                            <a class="p-group__orgLink" href="https://cloma.net/" target="_blank" rel="noopener noreferrer">
                                <span class="p-group__orgText">クリーン・オーシャン・マテリアル・アライアンス</span>
                                <img class="p-group__orgIcon" src="<?php img_path('/icon_external_link.svg'); ?>" alt="" width="12" height="12">
                            </a>
                        </li>
                        <li class="p-group__orgItem">
                            <a class="p-group__orgLink" href="https://www.jwma-tokyo.or.jp/" target="_blank" rel="noopener noreferrer">
                                <span class="p-group__orgText">公益社団法人 全国都市清掃会議</span>
                                <img class="p-group__orgIcon" src="<?php img_path('/icon_external_link.svg'); ?>" alt="" width="12" height="12">
                            </a>
                        </li>
                        <li class="p-group__orgItem">
                            <a class="p-group__orgLink" href="http://kics-web.jp/" target="_blank" rel="noopener noreferrer">
                                <span class="p-group__orgText">北九州環境ビジネス推進会</span>
                                <img class="p-group__orgIcon" src="<?php img_path('/icon_external_link.svg'); ?>" alt="" width="12" height="12">
                            </a>
                        </li>
                        <li class="p-group__orgItem">
                            <a class="p-group__orgLink" href="https://ktq-gx.com/" target="_blank" rel="noopener noreferrer">
                                <span class="p-group__orgText">北九州GX推進コンソーシアム</span>
                                <img class="p-group__orgIcon" src="<?php img_path('/icon_external_link.svg'); ?>" alt="" width="12" height="12">
                            </a>
                        </li>
                        <li class="p-group__orgItem">
                            <a class="p-group__orgLink" href="https://nature-kitakyushu.com/" target="_blank" rel="noopener noreferrer">
                                <span class="p-group__orgText">北九州ネイチャーポジティブネットワーク</span>
                                <img class="p-group__orgIcon" src="<?php img_path('/icon_external_link.svg'); ?>" alt="" width="12" height="12">
                            </a>
                        </li>
                        <li class="p-group__orgItem">
                            <a class="p-group__orgLink" href="https://www.recycle-ken.or.jp/" target="_blank" rel="noopener noreferrer">
                                <span class="p-group__orgText">公益社団法人 福岡県リサイクル総合研究事業化センター</span>
                                <img class="p-group__orgIcon" src="<?php img_path('/icon_external_link.svg'); ?>" alt="" width="12" height="12">
                            </a>
                        </li>
                        <li class="p-group__orgItem">
                            <a class="p-group__orgLink" href="https://www.f-sanpai.or.jp/" target="_blank" rel="noopener noreferrer">
                                <span class="p-group__orgText">公益社団法人 福岡県産業資源循環協会</span>
                                <img class="p-group__orgIcon" src="<?php img_path('/icon_external_link.svg'); ?>" alt="" width="12" height="12">
                            </a>
                        </li>
                        <li class="p-group__orgItem">
                            <a class="p-group__orgLink" href="https://jaem.or.jp/" target="_blank" rel="noopener noreferrer">
                                <span class="p-group__orgText">一般社団法人 廃棄物処理施設技術管理協会</span>
                                <img class="p-group__orgIcon" src="<?php img_path('/icon_external_link.svg'); ?>" alt="" width="12" height="12">
                            </a>
                        </li>
                        <li class="p-group__orgItem">
                            <a class="p-group__orgLink" href="https://www.asian-eca.org/" target="_blank" rel="noopener noreferrer">
                                <span class="p-group__orgText">一般社団法人 アジア経営者連合会</span>
                                <img class="p-group__orgIcon" src="<?php img_path('/icon_external_link.svg'); ?>" alt="" width="12" height="12">
                            </a>
                        </li>
                    </ul>

                </div>

                <!-- 会社案内サイドナビ（共通パーツ） -->
                <aside class="p-group__side">
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
                            <li class="c-localNav__item">
                                <a href="<?php page_path('company/location'); ?>">拠点一覧</a>
                            </li>
                            <li class="c-localNav__item">
                                <a href="<?php page_path('company/history'); ?>">グループのあゆみ</a>
                            </li>
                            <li class="c-localNav__item c-localNav__item--current">
                                <a href="<?php page_path('company/group'); ?>" aria-current="page">グループ会社・関連団体</a>
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
                <a href="<?php page_path('company'); ?>">会社案内</a><span class="separator">&gt;</span>グループ会社・関連団体
            </div>
            <a href="#" class="p-breadcrumb__totop" aria-label="ページトップへ戻る">
                <span class="p-breadcrumb__totopArrow"></span>
            </a>
        </div>
    </div>

</main>
<?php get_footer(); ?>

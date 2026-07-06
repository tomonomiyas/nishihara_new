<?php

/**
 * Template Name: 事業紹介
 * 事業紹介ページ（business）
 */

// 事業ブロックのデータ定義
$businesses = [
    [
        'id'       => 'collection',
        'navLabel' => '収集運搬事業',
        'title'    => '収集運搬事業',
        'lead'     => '一般廃棄物・産業廃棄物・特別管理産業廃棄物まで幅広い品目の収集運搬を担っています。法人・企業向けの事業系廃棄物収集では、業種・排出量・回収頻度をヒアリングのうえ、定期回収/臨時回収、定額請求/指定袋運用/臨時請求など、お客様ごとに最適な運用プランをご提案します。',
        'mainImg'  => 'img_business--01-1',
        'cards'    => [
            ['logo' => 'logo_beetle', 'alt' => 'BEETLE', 'url' => 'https://www.nishihara-corp.jp/'],
        ],
        'steps'    => [
            [
                'num'   => '01',
                'title' => '「安全」と「美観」の徹底',
                'text'  => 'スタイリッシュで清潔感ある車両には、研修を重ねたサービスドライバーが乗務しています。全車両に5カメラ搭載の最新鋭ドラレコを導入し、急発進・急ハンドル・速度超過等を管理して安全で確実に運搬。車両は常に清潔な状態も維持することで、街の安心と環境を守ります。',
                'img'   => 'img_business--01-2',
            ],
            [
                'num'   => '02',
                'title' => "多様な車種と広域ネットワークによる<br>柔軟な対応",
                'text'  => '収集運搬の許認可を、兵庫県・山口県・北九州市・福岡市・福岡県・佐賀県・長崎県・大分県・熊本県・鹿児島県・宮崎県にて保有しています。多様な車両を完備しており、廃棄物の種類や現場の状況に合わせて最適な回収をご提案します。',
                'img'   => 'img_business--01-3',
            ],
            [
                'num'   => '03',
                'title' => '運行管理はアプリケーションで完結',
                'text'  => '従来は紙ベースだった帳票をアプリケーションに集約しました。スマホでの利用により、ドライバーも手元でスムーズに情報確認・実績報告が可能となり、お客様への情報提供もスピーディーに。事務・現場双方の負担を解消し、圧倒的な業務効率化を実現しています。',
                'img'   => 'img_business--01-4',
            ],
        ],
    ],
    [
        'id'       => 'recycle',
        'navLabel' => '処理・リサイクル事業',
        'title'    => '処理・リサイクル事業',
        'lead'     => '北九州・福岡を拠点に、資源物および各種廃棄物の処理・資源化を担う施設を運営しています。高いリサイクル率を基盤に、サーキュラーエコノミーの実装に挑戦しながら、取引先や自治体、教育機関との対話や視察の受け入れを通じて、次の循環をともに考える場づくりを進めています。',
        'mainImg'  => 'img_business--02-1',
        'cards'    => [
            ['logo' => 'logo_beetle_eng', 'alt' => 'Beetle Engineering', 'url' => 'https://beetleengineering.jp/'],
        ],
        'steps'    => [
            [
                'num'   => '01',
                'title' => '特性に応える、8つの処理・資源化拠点',
                'text'  => '資源物・廃棄物の特性に特化した8つの工場を運営しています。先端設備を活用した高効率・合理的なプラント設計により、品目ごとに最適な処理を実現。全拠点で再生可能エネルギー由来電力を活用するなど、脱炭素社会の実現にも取り組んでいます。',
                'img'   => 'img_business--02-2',
            ],
            [
                'num'   => '02',
                'title' => '西日本最大級のプラスチックリサイクル工場『PLARY（プラリー）』',
                'text'  => '当社の9拠点目の旗艦工場として、2027年2月より稼働開始。近隣市町村の家庭から廃棄されるプラスチックごみを、適正に処理・再商品化する工場です。次世代に向けた資源循環スキームを構築していく拠点となります。',
                'img'   => 'img_business--02-3',
            ],
            [
                'num'   => '03',
                'title' => '海外事業',
                'text'  => '2013年、インドネシアに同国初となる中間処理施設を建設し、現地自治体と共同運営することで貧困層の雇用創出を実現。経済発展や人口増加に伴い廃棄物問題が深刻化するアジア諸国へ、官民学連携で事業拡大を推進しています。',
                'img'   => 'img_business--02-4',
            ],
        ],
    ],
    [
        'id'       => 'information',
        'navLabel' => '情報管理事業',
        'title'    => '情報管理事業',
        'lead'     => '東京・九州を拠点に、資源循環や廃棄物処理に関わる情報管理を一元化するソリューションを全国展開しています。全国ネットワークを活かし、適正処理の徹底からリサイクル推進、ESG対応までをトータルに支援します。',
        'mainImg'  => 'img_business--03-1',
        'cards'    => [
            ['logo' => 'logo_beetle_mgt', 'alt' => 'Beetle Management', 'url' => 'https://beetlemanagement.com/'],
            ['logo' => 'logo_bee-net', 'alt' => 'bee-net system', 'url' => 'https://beetlemanagement.com/outline'],
        ],
        'steps'    => [
            [
                'num'   => '01',
                'title' => "廃棄物一元管理システム<br>— bee-net system",
                'text'  => '廃棄物処理費用・資源物販売・契約書・処理フロー・電子マニフェスト・請求支払い等、廃棄物処理の商流を一元管理するクラウドサービスです。データの蓄積・分析により、適正処理の徹底とコスト削減の予兆把握を可能にし、管理業務の効率化を実現します。',
                'img'   => 'img_business--03-4',
            ],
            [
                'num'   => '02',
                'title' => '全国対応で選ばれる、確かな導入実績',
                'text'  => '2008年のサービス開始以来、12,500件を超える導入実績を通じて、全国の排出事業者・処理業者ネットワークを構築してきました。自治体ごとのルールや実務にも精通し、地域や条件を問わず、現場で実際に機能する最適な仕組みを提供します。',
                'img'   => 'img_business--03-3',
            ],
            [
                'num'   => '03',
                'title' => '守りの管理から、攻めの意思決定へ',
                'text'  => '従来の廃棄物管理は、適正処理やコンプライアンス対応が中心でした。当社はそれを前提とし、データをもとにコスト削減や有価物活用の可能性を可視化。創出された原資を、サーキュラーエコノミーやESG施策へつなぐための意思決定ツールを提供します。',
                'img'   => 'img_business--03-2',
            ],
        ],
    ],
    [
        'id'       => 'dx',
        'navLabel' => 'DXサービス事業',
        'title'    => 'DXサービス事業',
        'lead'     => '環境分野の課題解決をテクノロジーで加速するDXサービスを展開しています。廃棄物・資源循環領域を中心に、現場で使われ続けるアプリや業務システムを自社開発。AIやデータ活用を通じて、業務効率化だけでなく行動変容を促す仕組みを設計し、プラットフォーム型ビジネスとして業界全体の変革に取り組んでいます。',
        'mainImg'  => 'img_business--04-1',
        'cards'    => [
            ['logo' => 'logo_dustalk', 'alt' => 'DUSTALK', 'url' => 'https://www.dusttalk.com/'],
            ['logo' => 'logo_beetle-auction', 'alt' => 'bee-bid', 'url' => '#'],
            ['logo' => 'logo_rebit_japan', 'alt' => 'ReBit JAPAN', 'url' => 'https://rebit-japan.co.jp/'],
        ],
        'steps'    => [
            [
                'num'   => '01',
                'title' => "ゴミ処理を革新するプラットフォーム<br>— DUSTALK",
                'text'  => 'DUSTALKは、ゴミ処理を“日常のインフラ”として再定義するDXプラットフォームです。スマホから依頼・見積もり・支払いが完結し、許可業者との相見積もりで最適価格を実現します。サブスクやキャッシュレス決済にも対応し、廃棄物管理を変革します。',
                'img'   => 'img_business--04-2',
            ],
            [
                'num'   => '02',
                'title' => "資源価値を最大化するマーケット<br>— bee-bid",
                'text'  => 'bee-bidは、資源取引に透明性と価値をもたらす次世代マーケットプレイスです。廃棄物や再資源化された資源をオンラインでつなぎ、需要と供給の最適なマッチングを実現。データを味方に、資源の価値を最大化する、新しい資源流通の仕組みを創造します。',
                'img'   => 'img_business--04-3',
            ],
            [
                'num'   => '03',
                'title' => "楽しさから始まる、行動変容<br>— Rebit",
                'text'  => 'Rebitは、楽しみながら環境に貢献できる行動変容プラットフォームです。行動に応じたポイント付与と貢献度の可視化により、無理なく続く選択を後押しします。デジタルと仕組みの力で、個人の前向きな選択を社会の動きへとつなげていきます。',
                'img'   => 'img_business--04-4',
            ],
        ],
    ],
];

get_header(); ?>
<main class="l-page p-business-page">

    <!-- 下層共通FV -->
    <section class="p-pageHead">
        <div class="p-pageHead__inner l-inner">
            <h1 class="p-pageHead__title">事業紹介</h1>
        </div>
    </section>

    <!-- business本体 -->
    <section class="p-business">
        <div class="p-business__inner l-inner">
            <div class="p-business__body">

                <!-- 左：メインコンテンツ -->
                <div class="p-business__main">
                    <div class="p-business__intro">
                        <p class="p-business__introLead">資源と社会をつなぐBEETLEグループ</p>
                        <p class="p-business__introText">BEETLEグループは、資源物や廃棄物の収集運搬から資源化および処理、情報管理やDXソリューションまでを一貫して担う「環境トータルサポートサービス」を提供しています。本ページでは、当グループの事業・サービスをご紹介します。</p>
                    </div>

                    <?php foreach ($businesses as $biz) : ?>
                    <article class="p-business__item js-businessItem" id="<?php echo esc_attr($biz['id']); ?>">
                        <h2 class="p-business__itemTitle"><?php echo esc_html($biz['title']); ?></h2>

                        <!-- PC: 左メイン画像／右 本文の2カラム -->
                        <div class="p-business__head">
                            <div class="p-business__itemImg">
                                <picture>
                                    <source srcset="<?php img_path('/' . $biz['mainImg'] . '.webp'); ?>"
                                        type="image/webp">
                                    <img src="<?php img_path('/' . $biz['mainImg'] . '.jpg'); ?>"
                                        alt="<?php echo esc_attr($biz['title']); ?>" width="410" height="348"
                                        loading="lazy" decoding="async">
                                </picture>
                            </div>

                            <div class="p-business__headBody">
                                <p class="p-business__itemLead"><?php echo esc_html($biz['lead']); ?></p>

                                <!-- 主な事業会社・サービス -->
                                <div class="p-business__services">
                                    <p class="p-business__servicesTitle">主な事業会社・サービス</p>
                                    <ul class="p-business__cards">
                                        <?php foreach ($biz['cards'] as $card) : ?>
                                        <li class="p-business__card">
                                            <a class="p-business__cardLink" href="<?php echo esc_url($card['url']); ?>"
                                                target="_blank" rel="noopener noreferrer">
                                                <span class="p-business__cardLogo p-business__cardLogo--<?php echo esc_attr(str_replace('logo_', '', $card['logo'])); ?>">
                                                    <picture>
                                                        <source srcset="<?php img_path('/' . $card['logo'] . '.webp'); ?>"
                                                            type="image/webp">
                                                        <img src="<?php img_path('/' . $card['logo'] . '.png'); ?>"
                                                            alt="<?php echo esc_attr($card['alt']); ?>" width="160"
                                                            height="32" loading="lazy" decoding="async">
                                                    </picture>
                                                </span>
                                                <span class="p-business__cardBody">
                                                    <span class="p-business__cardLabel">ウェブサイトを見る</span>
                                                    <img class="p-business__cardIcon"
                                                        src="<?php img_path('/icon_external_link_black.svg'); ?>" alt=""
                                                        width="12" height="12" loading="lazy" decoding="async">
                                                </span>
                                            </a>
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- 詳しく見る（開閉） -->
                        <div class="p-business__detail js-businessDetail">
                            <button type="button" class="p-business__detailToggle js-businessToggle"
                                aria-expanded="false">
                                <span class="p-business__detailToggleText">詳しく見る</span>
                                <span class="p-business__detailToggleIcon" aria-hidden="true"></span>
                            </button>

                            <div class="p-business__detailBody js-businessDetailBody">
                                <div class="p-business__detailInner">
                                    <ul class="p-business__steps">
                                        <?php foreach ($biz['steps'] as $step) : ?>
                                        <li class="p-business__step">
                                            <div class="p-business__stepImg">
                                                <picture>
                                                    <source srcset="<?php img_path('/' . $step['img'] . '.webp'); ?>"
                                                        type="image/webp">
                                                    <img src="<?php img_path('/' . $step['img'] . '.jpg'); ?>"
                                                        alt="" width="386" height="239" loading="lazy" decoding="async">
                                                </picture>
                                            </div>
                                            <div class="p-business__stepHead">
                                                <span class="p-business__stepTag"><?php echo esc_html($step['num']); ?></span>
                                                <h3 class="p-business__stepTitle"><?php echo wp_kses($step['title'], ['br' => []]); ?></h3>
                                            </div>
                                            <p class="p-business__stepText"><?php echo esc_html($step['text']); ?></p>
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </article>
                    <?php endforeach; ?>
                </div>

                <!-- 右：追従ローカルナビ（会社案内サイドナビ c-localNav と共通デザイン） -->
                <aside class="p-business__side">
                    <nav class="c-localNav p-business__nav js-businessNav" aria-label="事業紹介メニュー">
                        <p class="c-localNav__head">
                            <span>事業紹介</span>
                        </p>
                        <ul class="c-localNav__list">
                            <?php foreach ($businesses as $i => $biz) : ?>
                            <li class="c-localNav__item<?php echo $i === 0 ? ' c-localNav__item--current' : ''; ?>">
                                <a class="js-businessNavLink"
                                    href="#<?php echo esc_attr($biz['id']); ?>"><?php echo esc_html($biz['navLabel']); ?></a>
                            </li>
                            <?php endforeach; ?>
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
                <a href="<?php page_path(); ?>">トップページ</a><span class="separator">&gt;</span>事業紹介
                <?php endif; ?>
            </div>
            <a href="#" class="p-breadcrumb__totop" aria-label="ページトップへ戻る">
                <span class="p-breadcrumb__totopArrow"></span>
            </a>
        </div>
    </div>

</main>
<?php get_footer(); ?>

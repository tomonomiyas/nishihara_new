<?php
/**
 * archive-sustainability.php
 * サステナビリティページ（sustainability 投稿タイプのアーカイブを器として使用）
 *
 * - 活動報告: カスタム投稿 sustainability の記事 → 活動報告カルーセル（詳細 = single-sustainability）
 * - トピックス: お知らせ（news）の news_category「サステナビリティ」記事
 * - 右カラム: 追従ローカルナビ（scrollspy）
 */

// ローカルナビ項目（左コンテンツの各ブロックと 1:1 対応）
$local_nav = [
    ['id' => 'activity',    'label' => '活動報告'],
    ['id' => 'system',      'label' => '推進体制'],
    ['id' => 'plan',        'label' => '推進計画'],
    ['id' => 'materiality', 'label' => '重要課題'],
    ['id' => 'topics',      'label' => 'サステナビリティトピックス'],
];

// 活動報告 参照元（カスタム投稿 sustainability の記事。詳細ページ = single-sustainability）
$activity_post_type = 'sustainability';

// トピックス参照元（お知らせ news のサステナビリティカテゴリー）
$topics_post_type = 'news';
$topics_taxonomy  = 'news_category';
$topics_term      = 'sustainability';

// 推進計画 STEP
$plan_steps = [
    ['num' => 'STEP 01', 'text' => '「もっと明日」を楽しむために、私たちの歩み方は今の行動の積み重ねでできています。私たちは重要課題（マテリアリティ）を特定し、3つのステップを通じて循環型社会への道筋を切り拓きます。'],
    ['num' => 'STEP 02', 'text' => '既存の境界線を、超えていく。 一つの業界、一つの役割という枠に閉じこもりません。異なる領域、異なる産業のパートナーと手を取り合い、それぞれの強みを掛け合わせることで、単独では成し得なかった新しい社会の仕組みを創造します。'],
    ['num' => 'STEP 03', 'text' => '変化を、みんなのよろこびへ。私たちが起こす変化を通じてヒト・地域・自然と関わり、次世代にとっての「楽しさ」や「嬉しさ」につなげていきます。新しい仕組みが日常となり、それが当たり前の幸せとして定着する未来を目指します。'],
];

// 重要課題（ESGマトリクス）
$materiality_rows = [
    [
        'title' => '気候変動対策',
        'e' => true, 's' => true, 'g' => false,
        'actions' => ['プラスチックリサイクルの深化', 'エネルギー活用の検討', '行動変容の促進支援'],
    ],
    [
        'title' => '資源循環の更なる促進',
        'e' => true, 's' => true, 'g' => false,
        'actions' => ['動静脈連携や官民学連携', '技術革新による高度化', 'AIによる加速的な高度化'],
    ],
    [
        'title' => '持続可能な地域コミュニティへの貢献',
        'e' => false, 's' => true, 'g' => true,
        'actions' => ['将来を見据えたあるべき姿の追求', '自然・環境への配慮', '事業継続の安定化'],
    ],
    [
        'title' => '誠実な事業継続とグループ力の強化',
        'e' => false, 's' => false, 'g' => true,
        'actions' => ['安全衛生活動による事業安定化', '多様な人財が挑戦し共生する組織', 'グループ特色を活かす経営'],
    ],
];

get_header(); ?>
<main class="l-page p-sustainability-page">

    <!-- 下層共通FV -->
    <section class="p-pageHead">
        <div class="p-pageHead__inner l-inner">
            <h1 class="p-pageHead__title">サステナビリティ</h1>
        </div>
    </section>

    <!-- sustainability本体 -->
    <section class="p-sustainability">
        <div class="p-sustainability__inner l-inner">
            <!-- 基本方針＋導入本文（左テキストブロック）／装飾画像（右）を横並び -->
            <div class="p-sustainability__intro">
                <div class="p-sustainability__introBody">
                    <div class="p-sustainability__lead">
                        <p class="p-sustainability__leadSub">サスティナビリティ基本方針</p>
                        <p class="p-sustainability__leadMain">変わることを待たない。<br>変えることが私たちの使命だから。</p>
                    </div>
                    <p class="p-sustainability__introText">BEETLEグループは、資源循環に関わる多様なプロセスを担い、社会の変化と常に向き合ってきました。「捨てる」という行為の先にある意味や価値を見つめ直し、資源を次へつなぐこと。それは、次の世代の選択肢を守るための私たちの責任だと考えています。</p>
                    <p class="p-sustainability__introText">変化のスピードが加速し、課題が複雑化する今、これまで以上に、先んじて行動することが求められています。分野や地域の枠を越えて手を取り合い、仕組みをつくり、取り組みを加速させる。人と人のつながりを力に、次代を形づくる基盤を築き、循環を次の世代へつないでいきます。</p>
                </div>
                <div class="p-sustainability__introImgs" aria-hidden="true">
                    <span class="p-sustainability__introImg p-sustainability__introImg--03"></span>
                    <span class="p-sustainability__introImg p-sustainability__introImg--01"></span>
                    <span class="p-sustainability__introImg p-sustainability__introImg--02"></span>
                </div>
            </div>

            <div class="p-sustainability__body">

                <!-- 左：メインコンテンツ -->
                <div class="p-sustainability__main">

                    <!-- 活動報告 -->
                    <section class="p-sustainability__block js-localNavTarget" id="activity">
                        <h2 class="p-sustainability__heading">活動報告</h2>

                        <?php
                        $activity_query = new WP_Query([
                            'post_type' => $activity_post_type,
                            'posts_per_page' => -1,
                        ]);
                        ?>
                        <?php if ($activity_query->have_posts()) : ?>
                        <div class="p-sustainability__activity">
                            <div class="p-sustainability__slider splide js-activitySlider" aria-label="活動報告">
                                <div class="splide__track">
                                    <ul class="splide__list">
                                        <?php while ($activity_query->have_posts()) : $activity_query->the_post(); ?>
                                        <li class="splide__slide">
                                            <article class="p-sustainability__card">
                                                <a class="p-sustainability__cardLink" href="<?php the_permalink(); ?>">
                                                    <div class="p-sustainability__cardThumb">
                                                        <?php if (has_post_thumbnail()) : ?>
                                                        <?php the_post_thumbnail('medium', ['alt' => get_the_title(), 'loading' => 'lazy']); ?>
                                                        <?php endif; ?>
                                                    </div>
                                                    <p class="p-sustainability__cardTitle"><?php echo esc_html(get_the_title()); ?></p>
                                                </a>
                                            </article>
                                        </li>
                                        <?php endwhile; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php else : ?>
                        <p class="p-sustainability__empty">活動報告はまだありません。</p>
                        <?php endif;
                        wp_reset_postdata(); ?>
                    </section>

                    <!-- 推進体制 -->
                    <section class="p-sustainability__block js-localNavTarget" id="system">
                        <h2 class="p-sustainability__heading">推進体制</h2>
                        <p class="p-sustainability__text">サステナビリティの推進にあたり、代表取締役を委員長とするサステナビリティ推進体制を構築し、グループ全体で取り組みを進めています。</p>

                        <!-- 組織図（CSS再現） -->
                        <div class="p-sustainability__org">
                            <p class="p-sustainability__orgTitle">サステナビリティ推進体制</p>
                            <div class="p-sustainability__orgChart">
                                <div class="p-sustainability__orgBox p-sustainability__orgBox--light">取締役会</div>

                                <div class="p-sustainability__orgConnector">
                                    <img class="p-sustainability__orgArrowImg" src="<?php img_path('/arrow-up.svg'); ?>" width="9" height="59" alt="" aria-hidden="true" loading="lazy" decoding="async">
                                    <span class="p-sustainability__orgConnectorLabel">指示報告</span>
                                </div>

                                <div class="p-sustainability__orgCommittee">
                                    <span class="p-sustainability__orgCommitteeLabel">サステナビリティ委員会</span>

                                    <div class="p-sustainability__orgBox p-sustainability__orgBox--primary">
                                        <span class="p-sustainability__orgBoxMain">サステナビリティ推進室</span>
                                        <span class="p-sustainability__orgBoxSub">委員長：常務取締役</span>
                                    </div>

                                    <div class="p-sustainability__orgConnector">
                                        <img class="p-sustainability__orgArrowImg" src="<?php img_path('/arrow-up01.svg'); ?>" width="9" height="51" alt="" aria-hidden="true" loading="lazy" decoding="async">
                                        <span class="p-sustainability__orgConnectorLabel">運営</span>
                                    </div>

                                    <div class="p-sustainability__orgBox p-sustainability__orgBox--sub">
                                        <span class="p-sustainability__orgBoxMain">西原商事ホールディングス</span>
                                        <span class="p-sustainability__orgBoxSub">企画部</span>
                                    </div>
                                </div>

                                <div class="p-sustainability__orgConnector">
                                    <img class="p-sustainability__orgArrowImg" src="<?php img_path('/arrow-up.svg'); ?>" width="9" height="59" alt="" aria-hidden="true" loading="lazy" decoding="async">
                                    <span class="p-sustainability__orgConnectorLabel">連携</span>
                                </div>

                                <div class="p-sustainability__orgBox p-sustainability__orgBox--light">各グループ会社</div>
                            </div>
                        </div>
                    </section>

                    <!-- 推進計画 -->
                    <section class="p-sustainability__block js-localNavTarget" id="plan">
                        <h2 class="p-sustainability__heading">推進計画</h2>
                        <p class="p-sustainability__text">サステナビリティの取り組みを着実に推進するため、以下のステップで計画的に取り組みを進めています。</p>

                        <ol class="p-sustainability__steps">
                            <?php foreach ($plan_steps as $i => $step) : ?>
                            <li class="p-sustainability__step">
                                <div class="p-sustainability__stepIcon p-sustainability__stepIcon--0<?php echo esc_attr($i + 1); ?>" aria-hidden="true"></div>
                                <div class="p-sustainability__stepBody">
                                    <span class="p-sustainability__stepTag"><?php echo esc_html($step['num']); ?></span>
                                    <p class="p-sustainability__stepText"><?php echo esc_html($step['text']); ?></p>
                                </div>
                            </li>
                            <?php endforeach; ?>
                        </ol>
                    </section>

                    <!-- 重要課題 -->
                    <section class="p-sustainability__block js-localNavTarget" id="materiality">
                        <h2 class="p-sustainability__heading">重要課題</h2>

                        <div class="p-sustainability__tableWrap">
                            <table class="p-sustainability__table">
                                <thead>
                                    <tr>
                                        <th scope="col" colspan="2" class="p-sustainability__th p-sustainability__th--issue">重要課題（マテリアリティ）</th>
                                        <th scope="col" class="p-sustainability__th p-sustainability__th--esg">E<span class="p-sustainability__thNote">（環境）</span></th>
                                        <th scope="col" class="p-sustainability__th p-sustainability__th--esg">S<span class="p-sustainability__thNote">（社会）</span></th>
                                        <th scope="col" class="p-sustainability__th p-sustainability__th--esg">G<span class="p-sustainability__thNote">（ガバナンス）</span></th>
                                        <th scope="col" class="p-sustainability__th p-sustainability__th--action">アクションプラン</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($materiality_rows as $i => $row) : ?>
                                    <tr>
                                        <td class="p-sustainability__td p-sustainability__td--no"><?php echo esc_html($i + 1); ?></td>
                                        <th scope="row" class="p-sustainability__td p-sustainability__td--issue"><?php echo esc_html($row['title']); ?></th>
                                        <td class="p-sustainability__td p-sustainability__td--esg">
                                            <?php if ($row['e']) : ?><span class="p-sustainability__mark" aria-label="該当"></span><?php endif; ?>
                                        </td>
                                        <td class="p-sustainability__td p-sustainability__td--esg">
                                            <?php if ($row['s']) : ?><span class="p-sustainability__mark" aria-label="該当"></span><?php endif; ?>
                                        </td>
                                        <td class="p-sustainability__td p-sustainability__td--esg">
                                            <?php if ($row['g']) : ?><span class="p-sustainability__mark" aria-label="該当"></span><?php endif; ?>
                                        </td>
                                        <td class="p-sustainability__td p-sustainability__td--action">
                                            <ul class="p-sustainability__actionList">
                                                <?php foreach ($row['actions'] as $action) : ?>
                                                <li class="p-sustainability__actionItem"><?php echo esc_html($action); ?></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </section>

                    <!-- サステナビリティトピックス -->
                    <section class="p-sustainability__block js-localNavTarget" id="topics">
                        <h2 class="p-sustainability__heading">サステナビリティトピックス</h2>

                        <?php
                        $topics_query = new WP_Query([
                            'post_type' => $topics_post_type,
                            'posts_per_page' => 3,
                            'tax_query' => [
                                [
                                    'taxonomy' => $topics_taxonomy,
                                    'field' => 'slug',
                                    'terms' => $topics_term,
                                ],
                            ],
                        ]);
                        ?>
                        <?php if ($topics_query->have_posts()) : ?>
                        <ul class="p-sustainability__news">
                            <?php while ($topics_query->have_posts()) : $topics_query->the_post(); ?>
                            <li class="p-sustainability__newsItem">
                                <a class="p-sustainability__newsLink" href="<?php the_permalink(); ?>">
                                    <div class="p-sustainability__newsMeta">
                                        <time class="p-sustainability__newsDate" datetime="<?php echo esc_attr(get_the_date('Y-m-d')); ?>"><?php echo esc_html(get_the_date('Y.m.d')); ?></time>
                                        <?php
                                        $terms = get_the_terms(get_the_ID(), $topics_taxonomy);
                                        if (!empty($terms) && !is_wp_error($terms)) : ?>
                                        <span class="p-sustainability__newsCat"><?php echo esc_html($terms[0]->name); ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <p class="p-sustainability__newsTitle"><?php echo esc_html(mb_strimwidth(get_the_title(), 0, 100, '…')); ?></p>
                                </a>
                            </li>
                            <?php endwhile; ?>
                        </ul>
                        <?php else : ?>
                        <p class="p-sustainability__empty">サステナビリティトピックスはまだありません。</p>
                        <?php endif;
                        wp_reset_postdata(); ?>

                        <div class="p-sustainability__more">
                            <?php $topics_archive_link = get_term_link($topics_term, $topics_taxonomy); ?>
                            <a class="c-link" href="<?php echo esc_url(is_wp_error($topics_archive_link) ? '#' : $topics_archive_link); ?>">サステナビリティトピックス一覧</a>
                        </div>
                    </section>

                </div>

                <!-- 右：追従ローカルナビ -->
                <aside class="p-sustainability__side">
                    <nav class="p-localNav p-sustainability__nav js-localNav" aria-label="サステナビリティメニュー">
                        <p class="p-localNav__head">サステナビリティ</p>
                        <ul class="p-localNav__list">
                            <?php foreach ($local_nav as $i => $nav) : ?>
                            <li class="p-localNav__item js-localNavItem<?php echo $i === 0 ? ' p-localNav__item--current' : ''; ?>">
                                <a class="p-localNav__link js-localNavLink" href="#<?php echo esc_attr($nav['id']); ?>"><?php echo esc_html($nav['label']); ?></a>
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
                <a href="<?php page_path(); ?>">トップページ</a><span class="separator">&gt;</span>サステナビリティ
                <?php endif; ?>
            </div>
            <a href="#" class="p-breadcrumb__totop" aria-label="ページトップへ戻る">
                <span class="p-breadcrumb__totopArrow"></span>
            </a>
        </div>
    </div>

</main>
<?php get_footer(); ?>

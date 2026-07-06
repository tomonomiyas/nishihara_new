<?php

/**
 * 活動報告（sustainability）詳細ページ
 * カスタム投稿タイプ sustainability の single テンプレート
 */

// 一覧（アーカイブ）へのリンク
$archive_url = get_post_type_archive_link('sustainability');

// サイドナビ項目（サステナビリティ配下・businessと同様の追従ナビ）
// 各項目は archive-sustainability.php 内のアンカーセクション（#activity/#system/#plan/#materiality/#topics）へ遷移する
$sustainability_nav = [
    ['label' => '活動報告',                 'url' => $archive_url . '#activity',    'current' => true],
    ['label' => '推進体制',                 'url' => $archive_url . '#system'],
    ['label' => '推進計画',                 'url' => $archive_url . '#plan'],
    ['label' => '重要課題',                 'url' => $archive_url . '#materiality'],
    ['label' => 'サステナビリティトピックス', 'url' => $archive_url . '#topics'],
];

get_header(); ?>
<main class="l-page p-sustainabilitySingle">

    <!-- 下層共通FV -->
    <section class="p-pageHead">
        <div class="p-pageHead__inner l-inner">
            <h1 class="p-pageHead__title">活動報告</h1>
        </div>
    </section>

    <!-- 記事本体 -->
    <section class="p-sustainabilitySingle__section">
        <div class="p-sustainabilitySingle__inner l-inner">
            <div class="p-sustainabilitySingle__body">

                <?php while (have_posts()) : the_post(); ?>

                <!-- 左：記事メインコンテンツ -->
                <article class="p-sustainabilitySingle__main">

                    <h2 class="p-sustainabilitySingle__title"><?php the_title(); ?></h2>

                    <?php if (has_post_thumbnail()) : ?>
                    <figure class="p-sustainabilitySingle__thumb">
                        <?php the_post_thumbnail('large', ['alt' => get_the_title()]); ?>
                    </figure>
                    <?php else : ?>
                    <figure class="p-sustainabilitySingle__thumb p-sustainabilitySingle__thumb--empty" aria-hidden="true"></figure>
                    <?php endif; ?>

                    <div class="p-sustainabilitySingle__content">
                        <?php the_content(); ?>
                    </div>

                    <!-- フッターアクション（戻る／SNS共有） -->
                    <div class="p-sustainabilitySingle__actions">
                        <a class="p-sustainabilitySingle__back" href="<?php echo esc_url($archive_url); ?>">
                            <span class="p-sustainabilitySingle__backIcon" aria-hidden="true">
                                <img src="<?php img_path('/icon_arrow-left.svg'); ?>" alt="" width="6" height="12">
                            </span>
                            <span class="p-sustainabilitySingle__backText">サステナビリティに戻る</span>
                        </a>

                        <ul class="p-sustainabilitySingle__share">
                            <li class="p-sustainabilitySingle__shareItem">
                                <a class="p-sustainabilitySingle__shareBtn p-sustainabilitySingle__shareBtn--x"
                                    href="https://twitter.com/intent/tweet?url=<?php echo rawurlencode(get_permalink()); ?>&text=<?php echo rawurlencode(get_the_title()); ?>"
                                    target="_blank" rel="noopener noreferrer" aria-label="Xで共有">
                                    <img src="<?php img_path('/icon_share-x.svg'); ?>" alt="" width="28" height="28">
                                </a>
                            </li>
                            <li class="p-sustainabilitySingle__shareItem">
                                <a class="p-sustainabilitySingle__shareBtn p-sustainabilitySingle__shareBtn--fb"
                                    href="https://www.facebook.com/sharer/sharer.php?u=<?php echo rawurlencode(get_permalink()); ?>"
                                    target="_blank" rel="noopener noreferrer" aria-label="Facebookで共有">
                                    <img src="<?php img_path('/icon_share-fb.svg'); ?>" alt="" width="36" height="36">
                                </a>
                            </li>
                            <li class="p-sustainabilitySingle__shareItem">
                                <button type="button"
                                    class="p-sustainabilitySingle__shareBtn p-sustainabilitySingle__shareBtn--copy js-copyUrl"
                                    data-copy-url="<?php echo esc_url(get_permalink()); ?>"
                                    aria-label="記事のURLをコピー">
                                    <img src="<?php img_path('/icon_share-copy.svg'); ?>" alt="" width="26" height="28">
                                    <span class="p-sustainabilitySingle__copyToast" aria-hidden="true">コピーしました</span>
                                </button>
                            </li>
                        </ul>
                    </div>
                </article>
                <?php endwhile; ?>

                <!-- 右：追従ローカルナビ（会社案内サイドナビ c-localNav と共通デザイン） -->
                <aside class="p-sustainabilitySingle__side">
                    <nav class="c-localNav p-sustainabilitySingle__nav" aria-label="サステナビリティメニュー">
                        <p class="c-localNav__head">
                            <a href="<?php echo esc_url(get_post_type_archive_link('sustainability')); ?>">サステナビリティ</a>
                        </p>
                        <ul class="c-localNav__list">
                            <?php foreach ($sustainability_nav as $nav) : ?>
                            <li class="c-localNav__item<?php echo !empty($nav['current']) ? ' c-localNav__item--current' : ''; ?>">
                                <a href="<?php echo esc_url($nav['url']); ?>"><?php echo esc_html($nav['label']); ?></a>
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
                <a href="<?php page_path(); ?>">トップページ</a><span class="separator">&gt;</span><a href="<?php echo esc_url($archive_url); ?>">サステナビリティ</a><span class="separator">&gt;</span><?php the_title(); ?>
                <?php endif; ?>
            </div>
            <a href="#" class="p-breadcrumb__totop" aria-label="ページトップへ戻る">
                <span class="p-breadcrumb__totopArrow"></span>
            </a>
        </div>
    </div>

</main>
<?php get_footer(); ?>

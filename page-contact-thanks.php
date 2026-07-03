<?php get_header(); ?>
<main class="l-page p-contactThanks-page">

    <!-- 下層共通FV -->
    <section class="p-pageHead">
        <div class="p-pageHead__inner l-inner">
            <h1 class="p-pageHead__title">お問い合わせ</h1>
        </div>
    </section>

    <!-- 本体 -->
    <section class="p-contactThanks">
        <div class="p-contactThanks__inner l-inner">

            <!-- STEPインジケーター（共通パーツ .p-contactStep を流用） -->
            <ol class="p-contactStep">
                <li class="p-contactStep__item">
                    <span class="p-contactStep__num">STEP 01</span>
                    <span class="p-contactStep__label">内容入力</span>
                </li>
                <li class="p-contactStep__item">
                    <span class="p-contactStep__num">STEP 02</span>
                    <span class="p-contactStep__label">内容確認</span>
                </li>
                <li class="p-contactStep__item p-contactStep__item--current">
                    <span class="p-contactStep__num">STEP 03</span>
                    <span class="p-contactStep__label">送信完了</span>
                </li>
            </ol>

            <!-- 完了メッセージ -->
            <div class="p-contactThanks__message">
                <p class="p-contactThanks__lead">お問い合わせが完了しました</p>
                <p class="p-contactThanks__text">
                    お問い合わせを受け付けました。内容を確認のうえ、担当者より折り返しご連絡いたします。<br>
                    ご連絡までに3〜4営業日ほどお時間を頂戴しております。あらかじめご了承ください。<br>
                    <br>
                    ※受付完了の自動返信メールをお送りしております。届かない場合は迷惑メールフォルダをご確認ください。それでも届かない場合は、お手数ですが再度お問い合わせいただくか、下記連絡先までお電話にてお問い合わせください。<br>
                    電話番号：093-641-2055（受付時間 平日9：00〜17：00）
                </p>
            </div>

            <!-- トップページに戻るボタン -->
            <div class="p-contactThanks__action">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="c-btn">トップページに戻る</a>
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
                <a href="<?php echo esc_url(home_url('/')); ?>">トップページ</a><span class="separator">&gt;</span>お問い合わせ
                <?php endif; ?>
            </div>
            <a href="#" class="p-breadcrumb__totop" aria-label="ページトップへ戻る">
                <span class="p-breadcrumb__totopArrow"></span>
            </a>
        </div>
    </div>

</main>
<?php get_footer(); ?>

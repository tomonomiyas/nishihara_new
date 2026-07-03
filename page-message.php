<?php get_header(); ?>
<main class="l-page p-message-page">

    <!-- 下層共通FV -->
    <section class="p-pageHead">
        <div class="p-pageHead__inner l-inner">
            <h1 class="p-pageHead__title">代表挨拶</h1>
        </div>
    </section>

    <!-- message本体 -->
    <section class="p-message">
        <div class="p-message__inner l-inner">
            <div class="p-message__layout">

                <div class="p-message__main">
                    <figure class="p-message__photo">
                        <picture>
                            <source srcset="<?php img_path('/img_message--01.webp'); ?>" type="image/webp">
                            <img src="<?php img_path('/img_message--01.png'); ?>" alt="代表取締役社長 西原 靖博" width="860"
                                height="532">
                        </picture>
                    </figure>

                    <h2 class="p-message__heading">環境創造企業として、原点から進化し続ける。</h2>

                    <div class="p-message__body">
                        <p class="p-message__text">
                            日頃より、西原商事ホールディングスの取り組みにご理解とご支援を賜り、誠にありがとうございます。
                        </p>
                        <p class="p-message__text">
                            私たちの原点である廃棄物処理・リサイクル事業は、地域や立地自治体の皆様のご理解と信頼に支えられ、地域に根差した形で歩んでまいりました。昭和47年の創業以来、現場で培ってきた知見と技術を礎に、社会の変化や多様化するニーズに柔軟に向き合い続けています。
                        </p>
                        <p class="p-message__text">
                            環境を取り巻く課題がより複雑化する今、私たちは「処理」にとどまらず、その先にある価値を見据えた提案を行うことで、事業を通じた持続可能な社会の実現に貢献していきたいと考えています。BEETLEというブランドのもと、ステークホルダーの皆様とともに経済・環境・社会のバランスを育み、社員一人ひとりが誇りを持って働ける環境を大切にすることで、信頼と笑顔が自然と広がる企業を目指してまいります。
                        </p>
                        <p class="p-message__text">
                            「やれると思え、その道はある。」<br>西原商事ホールディングスは、現場力・提案力・機動力を軸に、環境創造企業として進化し続けることを目指し、社員一丸となって取り組んでまいります。今後とも、皆様とともに歩みを重ねていけましたら幸いです。
                        </p>
                    </div>

                    <div class="p-message__sign">
                        <p class="p-message__signText">株式会社西原商事ホールディングス</p>
                        <p class="p-message__signText">代表取締役社長</p>
                        <p class="p-message__signName">西原 靖博</p>
                    </div>
                </div>

                <aside class="p-message__side">
                    <nav class="c-localNav" aria-label="会社案内メニュー">
                        <p class="c-localNav__head">
                            <a href="<?php page_path('company'); ?>">会社案内</a>
                        </p>
                        <ul class="c-localNav__list">
                            <li class="c-localNav__item c-localNav__item--current">
                                <a href="<?php page_path('company/message'); ?>" aria-current="page">代表挨拶</a>
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
                    href="<?php page_path('company'); ?>">会社案内</a><span class="separator">&gt;</span>代表挨拶
                <?php endif; ?>
            </div>
            <a href="#" class="p-breadcrumb__totop" aria-label="ページトップへ戻る">
                <span class="p-breadcrumb__totopArrow"></span>
            </a>
        </div>
    </div>

</main>
<?php get_footer(); ?>

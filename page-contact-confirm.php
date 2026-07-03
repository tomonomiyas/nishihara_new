<?php

/**
 * Template Name: お問い合わせ（内容確認）
 * お問い合わせ内容確認ページ（contact-confirm）
 *
 * 確認値は POST（入力ページ／CF7 の送信値）を最優先で表示する。
 * 直接アクセス等で値が無い場合は、デザイン上のダミー値をフォールバック表示する。
 * フィールド名は入力ページ（page-contact.php）の name 属性と揃えている。
 */

// 入力ページの name に対応する確認項目の定義
$confirm_fields = [
  ['key' => 'name',    'label' => 'お名前',           'required' => true,  'multiline' => false, 'dummy' => '西原　太郎'],
  ['key' => 'kana',    'label' => 'ふりがな',         'required' => true,  'multiline' => false, 'dummy' => 'にしはら　たろう'],
  ['key' => 'tel',     'label' => '電話番号',         'required' => false, 'multiline' => false, 'dummy' => '例）080-1234-5678'],
  ['key' => 'email',   'label' => 'メールアドレス',   'required' => true,  'multiline' => false, 'dummy' => 'sample@mail.com'],
  ['key' => 'message', 'label' => 'お問い合わせ内容', 'required' => true,  'multiline' => true,  'dummy' => 'お問い合わせ内容のテキストが入ります。お問い合わせ内容のテキストが入ります。お問い合わせ内容のテキストが入ります。お問い合わせ内容のテキストが入ります。'],
];

// 確認値の取得ヘルパー（POST 優先 / 無ければダミー）
$get_confirm_value = static function ($key, $dummy) {
  if (isset($_POST[$key]) && $_POST[$key] !== '') {
    return wp_unslash($_POST[$key]);
  }
  return $dummy;
};

get_header(); ?>
<main class="l-page p-contactConfirm-page">

    <!-- 下層共通FV -->
    <section class="p-pageHead">
        <div class="p-pageHead__inner l-inner">
            <h1 class="p-pageHead__title">お問い合わせ</h1>
        </div>
    </section>

    <!-- 本体 -->
    <section class="p-contactConfirm">
        <div class="p-contactConfirm__inner l-inner">

            <!-- STEP インジケーター（STEP02 が現在） -->
            <ol class="p-contactStep">
                <li class="p-contactStep__item">
                    <span class="p-contactStep__num">STEP 01</span>
                    <span class="p-contactStep__label">内容入力</span>
                </li>
                <li class="p-contactStep__item p-contactStep__item--current">
                    <span class="p-contactStep__num">STEP 02</span>
                    <span class="p-contactStep__label">内容確認</span>
                </li>
                <li class="p-contactStep__item">
                    <span class="p-contactStep__num">STEP 03</span>
                    <span class="p-contactStep__label">送信完了</span>
                </li>
            </ol>

            <p class="p-contactConfirm__lead">入力内容にお間違いがないか、ご確認ください。</p>

            <!-- 確認フォーム（送信＝完了ページへ POST。CF7連携時は action を差し替え） -->
            <form action="<?php echo esc_url(home_url('/contact-thanks/')); ?>" method="post" class="p-confirm">
                <?php $hidden = []; // 隣接セレクタを切らないよう hidden は dl の外にまとめる ?>
                <dl class="p-confirm__list">
                    <?php foreach ($confirm_fields as $field) :
                      $value = $get_confirm_value($field['key'], $field['dummy']);
                      $hidden[$field['key']] = $value;
                      $label_class = 'p-confirm__label' . ($field['required'] ? ' p-confirm__label--required' : '');
                      $value_class = 'p-confirm__value' . ($field['multiline'] ? ' p-confirm__value--message' : '');
                    ?>
                    <div class="p-confirm__row">
                        <dt class="<?php echo esc_attr($label_class); ?>"><?php echo esc_html($field['label']); ?></dt>
                        <dd class="<?php echo esc_attr($value_class); ?>">
                            <?php
                            if ($field['multiline']) {
                              echo nl2br(esc_html($value));
                            } else {
                              echo esc_html($value);
                            }
                            ?>
                        </dd>
                    </div>
                    <?php endforeach; ?>

                    <!-- プライバシーポリシー同意（確認表示） -->
                    <div class="p-confirm__row">
                        <dt class="p-confirm__label p-confirm__label--required">プライバシーポリシー</dt>
                        <dd class="p-confirm__value">プライバシーポリシーに同意する</dd>
                    </div>
                </dl>

                <!-- 送信時に値を引き継ぐ（高さ0のため隣接行レイアウトに影響しない） -->
                <?php foreach ($hidden as $hkey => $hval) : ?>
                <input type="hidden" name="<?php echo esc_attr($hkey); ?>" value="<?php echo esc_attr($hval); ?>">
                <?php endforeach; ?>
                <input type="hidden" name="privacy" value="agree">

                <div class="p-confirm__buttonWrap">
                    <button type="submit" name="action" value="send" class="c-btn">送信する</button>
                    <button type="submit" name="back" value="1" formaction="<?php echo esc_url(home_url('/contact/')); ?>" formnovalidate class="c-btn c-btn--back">内容を修正する</button>
                </div>
            </form>

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

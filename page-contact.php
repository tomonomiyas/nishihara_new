<?php

/**
 * Template Name: お問い合わせ
 * お問い合わせページ（contact）
 *
 * 1枚のテンプレートで「入力 → 確認 → 完了」の3ステップを切り替える。
 * 送信処理は admin-post.php（func-contact-form.php）が担当し、
 * 結果（ステップ・入力値・エラー）を PHP セッション経由で受け取る。
 */

$contact_fields = nishihara_contact_fields();

// セッションからステップ・入力値・エラーを取得（admin-post から渡される）
$step   = isset($_SESSION['contact_step']) ? $_SESSION['contact_step'] : 'input';
$values = isset($_SESSION['contact_values']) ? $_SESSION['contact_values'] : [];
$errors = isset($_SESSION['contact_errors']) ? $_SESSION['contact_errors'] : [];

// 初期値の補完
foreach ($contact_fields as $key => $field) {
    if (!isset($values[$key])) {
        $values[$key] = '';
    }
}
if (!isset($values['privacy'])) {
    $values['privacy'] = '';
}

// 一度表示したらセッションをクリア（リロードで入力画面に戻す）
unset($_SESSION['contact_step'], $_SESSION['contact_values'], $_SESSION['contact_errors']);

// ステップ別の current インデックス（0:入力 / 1:確認 / 2:完了）
$step_index = ['input' => 0, 'confirm' => 1, 'complete' => 2][$step];

$action_url = esc_url(admin_url('admin-post.php'));

get_header(); ?>
<main class="l-page p-contact-page">

    <!-- 下層共通FV -->
    <section class="p-pageHead">
        <div class="p-pageHead__inner l-inner">
            <h1 class="p-pageHead__title">お問い合わせ</h1>
        </div>
    </section>

    <!-- 本体 -->
    <section class="p-contact">
        <div class="p-contact__inner l-inner">

            <?php if ($step !== 'complete') : ?>
            <!-- STEP インジケーター -->
            <ol class="p-contactStep">
                <?php
                $steps = [
                    ['num' => 'STEP 01', 'label' => '内容入力'],
                    ['num' => 'STEP 02', 'label' => '内容確認'],
                    ['num' => 'STEP 03', 'label' => '送信完了'],
                ];
                foreach ($steps as $i => $s) :
                    $current = $i === $step_index ? ' p-contactStep__item--current' : '';
                ?>
                <li class="p-contactStep__item<?php echo $current; ?>">
                    <span class="p-contactStep__num"><?php echo esc_html($s['num']); ?></span>
                    <span class="p-contactStep__label"><?php echo esc_html($s['label']); ?></span>
                </li>
                <?php endforeach; ?>
            </ol>
            <?php endif; ?>

            <?php if ($step === 'input') : ?>
            <!-- ───────── 入力画面 ───────── -->
            <p class="p-contact__lead">
                お問い合わせ内容を下記にご記入ください。内容を確認のうえ、担当者より順次ご連絡いたします。<br>
                なお、4営業日以内に返信がない場合は、送信エラーの可能性がございます。恐れ入りますが、再度ご連絡ください。
            </p>

            <p class="p-contact__note">
                <span class="p-contact__noteBadge">必須</span>と記載されている項目は、必須の入力項目です。
            </p>

            <form action="<?php echo $action_url; ?>" method="post" class="p-form" novalidate>
                <?php wp_nonce_field('contact_form', 'contact_nonce'); ?>
                <input type="hidden" name="action" value="contact_form">
                <input type="hidden" name="step" value="confirm">

                <div class="p-form__item">
                    <label for="name" class="p-form__label p-form__label--required">お名前</label>
                    <input type="text" id="name" name="name" class="p-form__input<?php echo isset($errors['name']) ? ' is-error' : ''; ?>" value="<?php echo esc_attr($values['name']); ?>" required>
                    <?php if (isset($errors['name'])) : ?><span class="p-form__error"><?php echo esc_html($errors['name']); ?></span><?php endif; ?>
                    <p class="p-form__example">例）西原　太郎</p>
                </div>

                <div class="p-form__item">
                    <label for="kana" class="p-form__label p-form__label--required">ふりがな</label>
                    <input type="text" id="kana" name="kana" class="p-form__input<?php echo isset($errors['kana']) ? ' is-error' : ''; ?>" value="<?php echo esc_attr($values['kana']); ?>" required>
                    <?php if (isset($errors['kana'])) : ?><span class="p-form__error"><?php echo esc_html($errors['kana']); ?></span><?php endif; ?>
                    <p class="p-form__example">例）にしはら　たろう</p>
                </div>

                <div class="p-form__item">
                    <label for="tel" class="p-form__label">電話番号</label>
                    <input type="tel" id="tel" name="tel" class="p-form__input" value="<?php echo esc_attr($values['tel']); ?>">
                    <p class="p-form__example">例）080-1234-5678</p>
                </div>

                <div class="p-form__item">
                    <label for="email" class="p-form__label p-form__label--required">メールアドレス</label>
                    <input type="email" id="email" name="email" class="p-form__input<?php echo isset($errors['email']) ? ' is-error' : ''; ?>" value="<?php echo esc_attr($values['email']); ?>" required>
                    <?php if (isset($errors['email'])) : ?><span class="p-form__error"><?php echo esc_html($errors['email']); ?></span><?php endif; ?>
                    <p class="p-form__example">例）sample@mail.com</p>
                </div>

                <div class="p-form__item">
                    <label for="message" class="p-form__label p-form__label--required">お問い合わせ内容</label>
                    <textarea id="message" name="message" class="p-form__textarea<?php echo isset($errors['message']) ? ' is-error' : ''; ?>" required><?php echo esc_textarea($values['message']); ?></textarea>
                    <?php if (isset($errors['message'])) : ?><span class="p-form__error"><?php echo esc_html($errors['message']); ?></span><?php endif; ?>
                </div>

                <div class="p-form__privacyBox">
                    <p class="p-form__privacyText">
                        【個人情報の取り扱いについて】<br>
                        個人情報の取り扱いに関しては、「<a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>" class="p-form__link">プライバシーポリシー</a>」をご確認いただき、同意いただける場合はご送信ください。
                    </p>
                </div>

                <label class="p-form__agree">
                    <span class="p-form__agreeBadge">必須</span>
                    <input type="checkbox" name="privacy" value="agree" class="p-form__agreeCheck"<?php echo $values['privacy'] ? ' checked' : ''; ?> required>
                    <span class="p-form__agreeText">プライバシーポリシーに同意する</span>
                </label>
                <?php if (isset($errors['privacy'])) : ?>
                <p class="p-form__error p-form__error--center"><?php echo esc_html($errors['privacy']); ?></p>
                <?php endif; ?>

                <div class="p-form__buttonWrap">
                    <button type="submit" class="c-btn c-btn--submit">入力内容を確認する</button>
                </div>
            </form>

            <?php elseif ($step === 'confirm') : ?>
            <!-- ───────── 確認画面 ───────── -->
            <p class="p-contact__lead">
                入力内容にお間違いがないか、ご確認ください。
            </p>

            <form action="<?php echo $action_url; ?>" method="post" class="p-form p-form--confirm" novalidate>
                <?php wp_nonce_field('contact_form', 'contact_nonce'); ?>
                <input type="hidden" name="action" value="contact_form">

                <?php foreach ($contact_fields as $key => $field) : ?>
                <div class="p-form__item">
                    <p class="p-form__label<?php echo $field['required'] ? ' p-form__label--required' : ''; ?>"><?php echo esc_html($field['label']); ?></p>
                    <p class="p-form__confirmValue">
                        <?php
                        if ($field['type'] === 'textarea') {
                            echo nl2br(esc_html($values[$key]));
                        } else {
                            echo esc_html($values[$key] !== '' ? $values[$key] : '―');
                        }
                        ?>
                    </p>
                    <input type="hidden" name="<?php echo esc_attr($key); ?>" value="<?php echo esc_attr($values[$key]); ?>">
                </div>
                <?php endforeach; ?>

                <div class="p-form__item">
                    <p class="p-form__label p-form__label--required">プライバシーポリシー</p>
                    <p class="p-form__confirmValue">プライバシーポリシーに同意する</p>
                    <input type="hidden" name="privacy" value="agree">
                </div>

                <div class="p-form__buttonGroup">
                    <button type="submit" name="step" value="complete" class="c-btn c-btn--submit">送信する</button>
                    <button type="submit" name="step" value="input" formnovalidate class="c-btn c-btn--back">内容を修正する</button>
                </div>
            </form>

            <?php else : ?>
            <!-- ───────── 完了画面 ───────── -->
            <div class="p-contact__complete">
                <p class="p-contact__completeTitle">送信完了</p>
                <p class="p-contact__completeText">
                    お問い合わせいただきありがとうございます。<br>
                    内容を確認のうえ、担当者より折り返しご連絡させていただきます。
                </p>
                <div class="p-contact__completeButton">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="c-btn c-btn--submit">トップページへ戻る</a>
                </div>
            </div>
            <?php endif; ?>

        </div>
    </section>

    <!-- 下層共通パンくず（フッター直前） -->
    <div class="p-breadcrumb l-breadcrumb">
        <div class="p-breadcrumb__inner l-inner">
            <div class="p-breadcrumb__wrapper" typeof="BreadcrumbList" vocab="https://schema.org/">
                <?php if (function_exists('bcn_display')) : ?>
                <?php bcn_display(); ?>
                <?php else : ?>
                <a href="<?php page_path(); ?>">トップページ</a><span class="separator">&gt;</span>お問い合わせ
                <?php endif; ?>
            </div>
            <a href="#" class="p-breadcrumb__totop" aria-label="ページトップへ戻る">
                <span class="p-breadcrumb__totopArrow"></span>
            </a>
        </div>
    </div>

</main>
<?php get_footer(); ?>

<?php

/**
 * func-contact-form
 *  お問い合わせフォームの送信処理（admin-post.php 経由）
 *
 * /contact/ への直接 POST がサーバー側で 404 になるため、
 * フォームは admin-post.php へ POST し、ここで処理してから
 * /contact/ へリダイレクトしてステップ別画面を表示する。
 *
 * 入力値・ステップ・エラーは PHP セッションで受け渡す。
 */

// ── フォーム項目定義（テンプレートと共有）─────────────
function nishihara_contact_fields()
{
    return [
        'name'    => ['label' => 'お名前',          'required' => true,  'type' => 'text'],
        'kana'    => ['label' => 'ふりがな',         'required' => true,  'type' => 'text'],
        'tel'     => ['label' => '電話番号',         'required' => false, 'type' => 'tel'],
        'email'   => ['label' => 'メールアドレス',    'required' => true,  'type' => 'email'],
        'message' => ['label' => 'お問い合わせ内容',  'required' => true,  'type' => 'textarea'],
    ];
}

// ── セッション開始（早期フック）─────────────────────
function nishihara_contact_session_start()
{
    if (!session_id() && !headers_sent()) {
        session_start();
    }
}
add_action('init', 'nishihara_contact_session_start', 1);

// ── admin-post ハンドラ（ログイン有無を問わず）────────
add_action('admin_post_nopriv_contact_form', 'nishihara_handle_contact_form');
add_action('admin_post_contact_form', 'nishihara_handle_contact_form');

function nishihara_handle_contact_form()
{
    $contact_url = home_url('/contact/');

    // nonce 検証
    if (!isset($_POST['contact_nonce']) || !wp_verify_nonce($_POST['contact_nonce'], 'contact_form')) {
        wp_safe_redirect($contact_url);
        exit;
    }

    $fields = nishihara_contact_fields();
    $values = [];
    foreach ($fields as $key => $field) {
        $values[$key] = isset($_POST[$key]) ? trim(wp_unslash($_POST[$key])) : '';
    }
    $values['privacy'] = isset($_POST['privacy']) ? '1' : '';

    $posted_step = isset($_POST['step']) ? sanitize_text_field($_POST['step']) : 'confirm';
    $errors = [];

    if ($posted_step === 'input') {
        // 「内容を修正する」→ 入力値を保持して入力画面へ
        $_SESSION['contact_step']   = 'input';
        $_SESSION['contact_values'] = $values;
        $_SESSION['contact_errors'] = [];
        wp_safe_redirect($contact_url);
        exit;
    }

    // バリデーション
    foreach ($fields as $key => $field) {
        if ($field['required'] && $values[$key] === '') {
            $errors[$key] = $field['label'] . 'を入力してください。';
        }
    }
    if ($values['email'] !== '' && !is_email($values['email'])) {
        $errors['email'] = 'メールアドレスの形式が正しくありません。';
    }
    if ($values['privacy'] === '') {
        $errors['privacy'] = 'プライバシーポリシーへの同意が必要です。';
    }

    if (!empty($errors)) {
        $_SESSION['contact_step']   = 'input';
        $_SESSION['contact_values'] = $values;
        $_SESSION['contact_errors'] = $errors;
    } elseif ($posted_step === 'complete') {
        // ── 送信処理（管理者宛通知 ＋ 送信者への自動返信）──
        nishihara_contact_send_mails($values);
        $_SESSION['contact_step']   = 'complete';
        $_SESSION['contact_values'] = [];
        $_SESSION['contact_errors'] = [];
    } else {
        $_SESSION['contact_step']   = 'confirm';
        $_SESSION['contact_values'] = $values;
        $_SESSION['contact_errors'] = [];
    }

    wp_safe_redirect($contact_url);
    exit;
}

// ── メール送信（管理者宛通知 ＋ 送信者への自動返信）────────
/**
 * お問い合わせ完了時にメールを送信する。
 * 戻り値は「管理者宛通知」の送信可否（自動返信の失敗は致命ではないため無視）。
 *
 * @param array $values バリデーション済みの入力値
 * @return bool 管理者宛通知の送信に成功したか
 */
function nishihara_contact_send_mails($values)
{
    // ▼▼ 本番の担当者アドレスが決まったら、ここだけ変更する ▼▼
    //     例) $admin_to = 'info@nishihara-hd.co.jp';
    // $admin_to = get_option('admin_email');
    $admin_to = 'scent5spr11@gmail.com';
    // ▲▲──────────────────────────────────────────────▲▲

    $site_name = wp_specialchars_decode(get_bloginfo('name'), ENT_QUOTES);

    // 送信元アドレス（サイトのホスト名から生成。独自ドメイン運用が前提）
    $host       = preg_replace('/^www\./', '', (string) wp_parse_url(home_url(), PHP_URL_HOST));
    $from_email = 'no-reply@' . $host;

    // 入力内容を本文用に整形（項目定義と同じ順序・ラベルを流用）
    $lines = [];
    foreach (nishihara_contact_fields() as $key => $field) {
        $val     = isset($values[$key]) && $values[$key] !== '' ? $values[$key] : '（未入力）';
        $lines[] = $field['label'] . '：' . $val;
    }
    $detail = "----------------------------------------\n"
        . implode("\n", $lines) . "\n"
        . "----------------------------------------\n";

    // ── ① 管理者宛の通知メール ──────────────
    $admin_subject = '【' . $site_name . '】お問い合わせがありました';
    $admin_body    = "Webサイトのお問い合わせフォームより、以下の内容で送信がありました。\n\n" . $detail;
    $admin_headers = [
        'From: ' . $site_name . ' <' . $from_email . '>',
        // 担当者がそのまま返信できるよう、返信先は問い合わせ者に向ける
        'Reply-To: ' . $values['name'] . ' <' . $values['email'] . '>',
    ];
    $sent = wp_mail($admin_to, $admin_subject, $admin_body, $admin_headers);

    if (!$sent) {
        // SMTP 未設定などで失敗した場合はログに残す（画面は完了表示のまま）
        error_log('[nishihara contact] 管理者宛メールの送信に失敗しました: ' . $values['email']);
    }

    // ── ② 送信者への自動返信メール ──────────
    if (is_email($values['email'])) {
        $reply_subject = '【' . $site_name . '】お問い合わせありがとうございます';
        $reply_body    = $values['name'] . " 様\n\n"
            . "この度は" . $site_name . "へお問い合わせいただき、誠にありがとうございます。\n"
            . "以下の内容でお問い合わせを受け付けいたしました。\n"
            . "内容を確認のうえ、担当者より順次ご連絡いたします。\n\n"
            . "※本メールは自動送信です。行き違いにご容赦ください。\n\n"
            . $detail;
        $reply_headers = [
            'From: ' . $site_name . ' <' . $from_email . '>',
            'Reply-To: ' . $admin_to,
        ];
        wp_mail($values['email'], $reply_subject, $reply_body, $reply_headers);
    }

    return $sent;
}

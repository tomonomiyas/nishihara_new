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
        // ── 送信処理（メール送信は雛形。本番宛先は後日設定）──
        // TODO: 管理者宛通知メール / 送信者への自動返信メールを wp_mail で実装する
        // $admin_email = get_option('admin_email');
        // $body = "お名前: {$values['name']}\nメール: {$values['email']}\n\n{$values['message']}";
        // wp_mail($admin_email, '【お問い合わせ】' . $values['name'] . '様', $body);
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

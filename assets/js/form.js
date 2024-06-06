
$(function () {
    // チェックボックスの要素を取得
    const $agreeCheckbox = $("#privacy");
    // 送信ボタンの要素を取得
    const $submitBtn = $("#submit_button");

    // チェックボックスが変更されたとき
    $agreeCheckbox.on("change", function () {
        // チェックされている場合
        if ($(this).prop("checked")) {
            // 送信ボタンを有効にする
            $submitBtn.prop("disabled", false);
        } else {
            // 送信ボタンを無効にする
            $submitBtn.prop("disabled", true);
        }
    });
});

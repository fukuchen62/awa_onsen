"use strict";

//
//     // チェックボックスの要素を取得
//     const $agreeCheckbox = $("#privacy");
//     // 送信ボタンの要素を取得
//     const $submitBtn = $("#submit_button");

//     // チェックボックスが変更されたとき
//     $agreeCheckbox.on("change", function () {
//         // チェックされている場合
//         if ($(this).prop("checked")) {
//             // 送信ボタンを有効にする
//             $submitBtn.prop("disabled", false);
//         } else {
//             // 送信ボタンを無効にする
//             $submitBtn.prop("disabled", true);
//         }
//     });
//
$(function () {
    let contact_chec = document.getElementsByClassName
        ('parsonal_imfomation_checkbox_data');
    let contact_sbmit = document.getElementsByClassName('contact_form_btns_sbmit');
    // 初期状態
    $(contact_sbmit).css('pointer-events', 'none');
    $(contact_sbmit).css('background', '#D9D9D9');
    // クリックアクション
    $(contact_chec).on('click', function () {
        if ($(this).prop("checked") == true) {
            $(contact_sbmit).css('pointer-events', 'auto');
            $(contact_sbmit).css('background', '#FBD266');
        } else {
            $(contact_sbmit).css('pointer-events', 'none');
            $(contact_sbmit).css('background', '#D9D9D9');
        }

    });

});

"use strict";

// $(function () {
//     let contact_chec = document.getElementsByClassName
//         ('parsonal_imfomation_checkbox_data');
//     let contact_sbmit = document.getElementsByClassName('contact_form_btns_sbmit');
//     // 初期状態
//     $(contact_sbmit).css('pointer-events', 'none');
//     $(contact_sbmit).css('background', '#D9D9D9');
//     // クリックアクション
//     $(contact_chec).on('click', function () {
//         if ($(this).prop("checked") == true) {
//             $(contact_sbmit).css('pointer-events', 'auto');
//             $(contact_sbmit).css('background', '#538fcb');
//         } else {
//             $(contact_sbmit).css('pointer-events', 'none');
//             $(contact_sbmit).css('background', '#D9D9D9');
//         }

//     });


// });



$(function () {
    // 要素の取得
    let contact_chec = $(".parsonal_imfomation_checkbox_data");
    let contact_sbmit = $(".contact_form_btns_sbmit");

    // 初期状態の設定
    $(contact_sbmit).css("pointer-events", "none");
    $(contact_sbmit).css("background", "#D9D9D9");
    $(contact_sbmit).css("border", "2px solid #D9D9D9");


    // チェックボックスクリック時のイベント処理
    $(contact_chec).on("click", function () {
        if ($(this).prop("checked")) {
            $(contact_sbmit).css("pointer-events", "auto");
            $(contact_sbmit).css("background", "#538fcb");
            $(contact_sbmit).css("border", "2px solid #538fcb");

        } else {
            $(contact_sbmit).css("pointer-events", "none");
            $(contact_sbmit).css("background", "#D9D9D9");
            $(contact_sbmit).css("border", "2px solid #D9D9D9");

        }
    });

    // ボタンのホバーイベント処理
    $(contact_sbmit).hover(
        function () {
            // ホバー時に背景色を白に変更
            $(this).css("background", "#fff");
            $(this).css("color", "#538fcb");
            $(this).css("border", "2px solid #538fcb");
            $(this).css("transition", "all 0.4s");


        },
        function () {
            // ホバー終了時に背景色を元に戻す
            if ($(contact_chec).prop("checked")) {
                $(contact_sbmit).css("background", "#538fcb");
                $(this).css("color", "#fff");


            } else {
                $(contact_sbmit).css("background", "#D9D9D9");
                $(contact_sbmit).css("border", "2px solid #D9D9D9");

            }
        }
    );
});

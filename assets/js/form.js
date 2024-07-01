"use strict";

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
            $(contact_sbmit).css("background", "#f5a200");
            $(contact_sbmit).css("border", "2px solid #f5a200");

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
            $(this).css("color", "#f5a200");
            $(this).css("border", "2px solid #f5a200");
            $(this).css("transition", "all 0.4s");


        },
        function () {
            // ホバー終了時に背景色を元に戻す
            if ($(contact_chec).prop("checked")) {
                $(contact_sbmit).css("background", "#f5a200");
                $(this).css("color", "#fff");


            } else {
                $(contact_sbmit).css("background", "#D9D9D9");
                $(contact_sbmit).css("border", "2px solid #D9D9D9");

            }
        }
    );
});

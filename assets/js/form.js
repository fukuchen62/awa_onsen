"use strict";

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
            $(contact_sbmit).css('background', '#538fcb');
        } else {
            $(contact_sbmit).css('pointer-events', 'none');
            $(contact_sbmit).css('background', '#D9D9D9');
        }

    });

});

"use strict";

$(function () {

    let nav = $("#pc_nav .navlist");
    nav.addClass("isactive");
    let footer = $(".footer_wrap");

    // メニューのアニメーション
    if ($(window).width() > 1200) {
        $(window).scroll(function () {
            let scrollTop = $(window).scrollTop(); // ここでscrollTopを取得
            let windowHeight = $(window).height();
            let footerTop = footer.offset().top;

            if (scrollTop + windowHeight > footerTop) {
                nav.removeClass("isactive");
            } else {
                nav.addClass("isactive");
            }
        });
    }

});
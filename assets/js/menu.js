"use strict";

$(function () {

    // メニューのアニメーション
    if ($(window).width() > 1200) {
        let nav = $(".navlist");
        nav.addClass("isactive");

        $(window).scroll(function () {
            let columnSection = $(".footer_wrap");
            let threshold2 = columnSection.offset().top - 500;

            if ($(window).scrollTop() >= threshold2) {
                nav.removeClass("isactive");
            } else {
                nav.addClass("isactive");
            }
        });
    }

});
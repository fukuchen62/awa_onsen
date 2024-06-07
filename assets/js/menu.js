"use strict";

$(function () {

    let nav = $("#pc_nav .navlist");
    nav.addClass("isactive");

    // メニューのアニメーション
    if ($(window).width() > 1200) {
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
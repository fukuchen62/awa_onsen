"use strict";

$(function () {
    // slick
    $(".slider").slick({
        autoplay: true,
        dots: true,
        adaptiveHeight: true,
        prevArrow: '<button class="slide-arrow prev-arrow"></button>',
        nextArrow: '<button class="slide-arrow next-arrow"></button>'
    });

    // メニューのアニメーション
    // $(window).scroll(function () {

    //     let nav = $(".navlist");
    //     let logo = $(".logo");
    //     let top = $(".top_button");
    //     let aboutSection = $(".about");
    //     let threshold = aboutSection.offset().top - 50; // ナビゲーションを表示するセクションの位置

    //     if ($(window).scrollTop() >= threshold) {
    //         logo.addClass("isactive");
    //     } else {
    //         logo.removeClass("isactive");
    //     }

    //     // 1200px超えたときの指定
    //     if ($(window).width() > 1200) {
    //         if ($(window).scrollTop() >= threshold) {
    //             nav.addClass("isactive");
    //             logo.addClass("isactive");
    //             top.addClass("isactive");
    //         } else {
    //             nav.removeClass("isactive");
    //             logo.removeClass("isactive");
    //             top.removeClass("isactive");
    //         }

    //         let columnSection = $(".column");
    //         let threshold2 = columnSection.offset().top;

    //         if ($(window).scrollTop() >= threshold2) {
    //             nav.removeClass("isactive");
    //         }

    //     }
    // });

});
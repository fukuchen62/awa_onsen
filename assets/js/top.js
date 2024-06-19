"use strict";

$(function () {
    // slick
    $(".single-item").slick({
        autoplay: true,
        fade: true
    });
    $(".slider").slick({
        autoplay: true,
        dots: true,
        adaptiveHeight: true,
        arrows: true,
        prevArrow: '<button class="slide-arrow prev-arrow"></button>',
        nextArrow: '<button class="slide-arrow next-arrow"></button>'
    });
    $(document).on('click', '.slide-arrow', function(event) {
        event.stopPropagation();
    });

    let nav = $("#pc_nav .navlist");
    let logo = $(".logo");
    let top = $(".top_button");
    let aboutSection = $(".about");
    let threshold = aboutSection.offset().top - 50; // ナビゲーションを表示するセクションの位置
    let footer = $(".footer_wrap");

    // メニューのアニメーション
    $(window).scroll(function () {
        let scrollTop = $(window).scrollTop(); // ここでscrollTopを取得
        let windowHeight = $(window).height();
        let footerTop = footer.offset().top;

        if (scrollTop >= threshold) {
            logo.addClass("isactive");
            top.addClass("isactive");
        } else {
            logo.removeClass("isactive");
            top.removeClass("isactive");
        }

        // 1200px超えたときの指定
        if ($(window).width() > 1200) {
            if (scrollTop + windowHeight > footerTop) {
                nav.removeClass("isactive");
            } else if (scrollTop >= threshold) {
                nav.addClass("isactive");
                logo.addClass("isactive");
                top.addClass("isactive");
            } else {
                nav.removeClass("isactive");
                logo.removeClass("isactive");
                top.removeClass("isactive");
            }
        }
    });

});
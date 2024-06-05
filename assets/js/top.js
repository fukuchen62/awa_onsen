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

    // nav
    $(".hamburger").click(function () {
        $(this).toggleClass("active");
        $(".sp_nav .navlist").toggleClass("isactive");
        $(this).toggleClass("isactive");
    });
    // メニューの中をクリックしたら、メニューを閉じる
    $(".navlist_item").click(function () {
        $(".hamburger").removeClass("active");
        $(".sp_nav .navlist").removeClass("isactive");
        $(".hamburger").removeClass("isactive");
    });

    // スクロールトップの設定
    $('.top_button').click(function () {
        $('html, body').animate({ scrollTop: 0 }, 'smooth');
        return false;
    });



    // $(window).scroll(function () {
    //     // 画面が1201pxを超えているかどうかを確認
    //     if ($(window).width() > 1200) {
    //         let nav = $(".pc_navlist");
    //         let aboutSection = $(".about");
    //         let threshold = aboutSection.offset().top - 50; // ナビゲーションを表示するセクションの位置

    //         // スクロール位置が閾値を超えたら、ナビゲーションをスライドさせて表示
    //         if ($(window).scrollTop() >= threshold) {
    //             nav.css("display", "block");
    //         } else {
    //             nav.css("display", "none"); // スライドメニューを再び画面外に移動
    //         }
    //     }
    // });

    // メニューのアニメーション
    $(window).scroll(function () {

        let nav = $(".navlist");
        let logo = $(".logo");
        let top = $(".top_button");
        let aboutSection = $(".about");
        let threshold = aboutSection.offset().top - 50; // ナビゲーションを表示するセクションの位置

        if ($(window).scrollTop() >= threshold) {
            logo.addClass("isactive");
        } else {
            logo.removeClass("isactive");
        }

        // 1200px超えたときの指定
        if ($(window).width() > 1200) {
            if ($(window).scrollTop() >= threshold) {
                nav.addClass("isactive");
                logo.addClass("isactive");
                top.addClass("isactive");
            } else {
                nav.removeClass("isactive");
                logo.removeClass("isactive");
                top.removeClass("isactive");
            }

            let header = $("#pc_nav");
            let footer = $(".footer_wrap");
            let footerOffset = footer.offset().top;
            let scrollPosition = $(window).scrollTop();
            let windowHeight = $(window).height();
            let stopPosition = footerOffset - 120;

            if (scrollPosition + windowHeight >= stopPosition) {
                header.css({
                    position: "absolute",
                    top: stopPosition - header.height() + "px"
                });
            }
        }
    });

});
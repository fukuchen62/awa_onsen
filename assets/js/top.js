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

    // $(window).scroll(function () {
    //     let nav = $(".pc_navlist");
    //     let aboutSection = $(".about");
    //     let threshold = aboutSection.offset().top - 50; // ナビゲーションを表示するセクションの位置
    //     if ($(window).scrollTop() >= threshold) {
    //         nav.addClass("isactive");
    //     } else {
    //         nav.css("display", "none"); // スライドメニューを再び画面外に移動
    //     }
    // });

});
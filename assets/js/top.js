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



    $(window).scroll(function() {
        // 画面が1201pxを超えているかどうかを確認
        if ($(window).width() > 1200) {
            let nav = $("#pc_nav");
            let aboutSection = $(".about");
            let threshold = aboutSection.offset().top - 50; // ナビゲーションを表示するセクションの位置

            // スクロール位置が閾値を超えたら、ナビゲーションをスライドさせて表示
            if ($(window).scrollTop() >= threshold) {
                nav.css("right", "0");
            } else {
                nav.css("right", "-120%"); // スライドメニューを再び画面外に移動
            }
        }
    });


    // $(window).scroll(function() {
    //     // 画面が1201pxを超えているかどうかを確認
    //     if ($(window).width() > 1200) {
    //         var nav = $(".navlist");
    //         var aboutSection = $(".about");
    //         var pcInner = $(".pc_inner");
    //         var threshold = aboutSection.offset().top - 50; // ナビゲーションを表示するセクションの位置

    //         // スクロール位置が閾値を超えたら、ナビゲーションを表示する
    //         if ($(window).scrollTop() >= threshold) {
    //             nav.appendTo(pcInner); // pc_innerの中に移動
    //             nav.css({
    //                 "right": "0"
    //             });
    //         } else {
    //             nav.appendTo("body"); // bodyの直下に移動
    //             nav.css("right", "-120%"); // スライドメニューを再び画面外に移動
    //         }
    //     }
    // });

});
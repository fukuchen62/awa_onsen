"use strict";

$(function () {
    let nav = $("#pc_nav .navlist");
    let footer = $(".footer_wrap");

    // 関数を定義して、スクロール時の処理を共通化
    function handleScroll() {
        let scrollTop = $(window).scrollTop();
        let windowHeight = $(window).height();
        let footerTop = footer.offset().top;

        if (scrollTop + windowHeight > footerTop) {
            nav.removeClass("isactive");
        } else {
            nav.addClass("isactive");
        }
    }

    // 最初にクラスを追加
    nav.addClass("isactive");

    // 最初にスクロールイベントを設定
    if ($(window).width() > 1200) {
        $(window).on("scroll", handleScroll);
    }

    // ウィンドウのリサイズイベントを設定
    $(window).resize(function () {
        if ($(window).width() > 1200) {
            $(window).on("scroll", handleScroll);
            handleScroll(); // リサイズ直後にスクロールイベントをトリガーして状態を更新
        } else {
            $(window).off("scroll", handleScroll);
            nav.addClass("isactive"); // スクロールイベントを解除する際にクラスを追加
        }
    });
});
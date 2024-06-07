"use strict";

// header
$(function () {

    // ハンバーガーメニューをクリックしたらメニューを表示させる
    $(".hamburger").click(function () {
        $(".sp_nav .navlist").toggleClass("isactive");

        if ($(".sp_nav .navlist").hasClass("isactive")) {
            $(".hamburger").addClass("isactive");
        } else {
            $(".hamburger").removeClass("isactive");
        }
    });
    // メニューの中をクリックしたら、メニューを閉じる
    $(".navlist_item").click(function () {
        $(".hamburger").removeClass("active");
        $(".hamburger").removeClass("isactive");
    });

    $(".top_button").on("click", function (e) { e.preventDefault(); $("html, body").animate({ scrollTop: 0 }, 2200); });

});


// 泡の出現

$(document).ready(function () {
    // コンテナを指定
    const $section = $('.bubble_background');

    // 泡を生成する関数
    const createBubble = () => {
        const screenWidth = $(window).width();

        // 757px以下なら出現率を低く設定
        if (screenWidth <= 757) {
            if (Math.random() > 0.5) {
                return;
            }
        }

        const $bubbleEl = $('<span>').addClass('bubble');
        const minSize = 10;
        const maxSize = 80;
        const size = Math.random() * (maxSize + 1 - minSize) + minSize;
        $bubbleEl.css({
            width: `${size}px`,
            height: `${size}px`,
            left: Math.random() * window.innerWidth + 'px'
        });
        $section.append($bubbleEl);

        setTimeout(() => {
            $bubbleEl.remove();
        }, 13000);
    }

    let activeBubble = null;

    const stopBubble = () => {
        clearInterval(activeBubble);
    };

    const cb = (entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                activeBubble = setInterval(createBubble, 200);
            } else {
                stopBubble();
            }
        })
    };

    const options = {
        rootMargin: "100px 0px"
    }

    const io = new IntersectionObserver(cb, options);
    io.POLL_INTERVAL = 100;
    io.observe($section[0]);
});

// 横からの泡
$(document).ready(function () {
    const $section = $('.bubble_background');

    const createBubble_edge = () => {
        const $bubble_edgeEl = $('<span>').addClass('bubble_edge');
        const minSize = 10;
        const maxSize = 80;
        const size = Math.random() * (maxSize + 1 - minSize) + minSize;
        $bubble_edgeEl.css({
            width: `${size}px`,
            height: `${size}px`,
            left: Math.random() * window.innerWidth + 'px'
        });
        $section.append($bubble_edgeEl);

        setTimeout(() => {
            $bubble_edgeEl.remove();
        }, 2000);
    };

    let activeBubble_edge = null;
    const intervalTime = 10000;
    const repeatInterval = () => {
        const randomTime = Math.random() * (intervalTime - 10000) + 30000;
        setTimeout(() => {
            activeBubble_edge = setInterval(createBubble_edge, 100);
            setTimeout(() => {
                clearInterval(activeBubble_edge);
                repeatInterval();
            }, 5000);
        }, randomTime);
    };

    repeatInterval();
});

// アヒルの出現
$(document).ready(function () {
    const $section = $('.bubble_background');

    const createDuck = () => {
        const $duckEl = $('<span>').addClass('duck');
        const size = 40;
        $duckEl.css({
            width: `${size}px`,
            height: `${size}px`
        });

        const $img = $('<img>').attr('src', '../assets/images/duck.png').attr('alt', 'アヒルの画像').css({
            width: '100%',
            height: '100%'
        });
        $duckEl.append($img);

        $duckEl.css({
            left: Math.random() * window.innerWidth + 'px'
        });
        $section.append($duckEl);

        setTimeout(() => {
            $duckEl.remove();
        }, 8000);
    };

    let activeDuck = null;

    const stopDuck = () => {
        clearInterval(activeDuck);
    };

    const cb = (entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                activeDuck = setInterval(createDuck, 20000);
            } else {
                stopDuck();
            }
        });
    };

    const options = {
        rootMargin: "100px 0px"
    };

    const io = new IntersectionObserver(cb, options);
    io.POLL_INTERVAL = 100;
    io.observe($section[0]);
});

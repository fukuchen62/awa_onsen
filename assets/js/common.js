"use strict";

// header
$(document).ready(function () {

    // // ハンバーガーメニューをクリックしたらメニューを表示させる
    $(".hamburger").click(function () {
        $(".sp_nav .navlist").toggleClass("isactive");


        if ($(".sp_nav .navlist").hasClass("isactive")) {
            $(".hamburger").addClass("isactive");
            $(".sp_nav").addClass("isactive");
        } else {
            $(".hamburger").removeClass("isactive");
            $(".sp_nav").removeClass("isactive");

        }
    });

    // topへボタンをクリックしたら上までスクロールさせる
    $(".top_button").on("click", function (e) {
        if ($(window).scrollTop() === 0) {
            //画面が一番上の時にボタンがクリックできないようにする
            return;
        }
        e.preventDefault();
        let $button = $(this);
        $button.css("pointer-events", "none"); //ボタンを無効化
        $("html, body").animate({ scrollTop: 0 }, 1000, function () {
            $button.css("pointer-events", "auto"); //アニメーション完了時ボタン無効化
        });
    });
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
        // aタグに変更し、
        const $duckEl = $('<a>').addClass('duck').attr('href', onsen_url); // aタグに変更し、hrefを追加hrefを追加
        const size = 80;
        $duckEl.css({
            width: `${size}px`,
            height: `${size}px`
        });
        const $img = $('<img>').attr('src', path + '/assets/images/duck.svg').attr('alt', 'アヒルの画像').css({
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
        // ホバー時にアニメーションを停止
        $duckEl.on('mouseenter', function () {
            $(this).css('animation-play-state', 'paused');
        });
        // ホバーが外れたらアニメーションを再開
        $duckEl.on('mouseleave', function () {
            $(this).css('animation-play-state', 'running');
        });
    };
    let activeDuck = null;
    const stopDuck = () => {
        clearInterval(activeDuck);
    };
    const cb = (entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                activeDuck = setInterval(createDuck, 50000);
            } else {
                stopDuck();
            }
        });
    };
    const options = {
        rootMargin: "100px 0px"
    };
    const io = new IntersectionObserver(cb, options);
    io.POLL_INTERVAL = 20000;
    io.observe($section[0]);
});



// エスケープ処理
// function escapeHTML(str) {
//     return str.replace(/[&<>"']/g, function(match) {
//         const escape = {
//             '&': '&amp;',
//             '<': '&lt;',
//             '>': '&gt;',
//             '"': '&quot;',
//             "'": '&#039;'
//         };
//         return escape[match];
//     });
// }

// $(document).ready(function() {
//     $('#contactForm').on('input'&& "textarea", function(event) {
//         event.preventDefault(); // デフォルトの送信を防ぐ

//         // テキストエリアの内容をエスケープ
//         let userInput = $('#user_input').val();
//         userInput = escapeHTML(userInput);

//         // エスケープされた内容をテキストエリアにセット
//         $('#user_input').val(userInput);

//         // フォームを送信
//         this.submit();
//     });
// });

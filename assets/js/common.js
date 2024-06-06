"use strict";

// header
$(function () {

    // ハンバーガーメニューをクリックしたらメニューを表示させる
    $(".hamburger").click(function () {
        $(".sp_nav .navlist").toggleClass("isactive");

        if($(".sp_nav .navlist").hasClass("isactive")){
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

    // スクロールトップの設定
    $('.top_button').click(function () {
        $('html, body').animate({ scrollTop: 0 }, 'smooth');
        return false;
    });

});


// 泡の出現

document.addEventListener('DOMContentLoaded', () => {
    // コンテナを指定
    const section = document.querySelector('.bubble_background');

    // 泡を生成する関数
    const createBubble = () => {
        // スクリーン幅を取得
        const screenWidth = window.innerWidth;

        // 757px以下なら出現率を低く設定
        if (screenWidth <= 757) {
            // 出現率を50%にする
            if (Math.random() > 0.5) {
                return;
            }
        }
        const bubbleEl = document.createElement('span');
        bubbleEl.className = 'bubble';
        // 最小値、最大値
        const minSize = 10;
        const maxSize = 80;
        const size = Math.random() * (maxSize + 1 - minSize) + minSize;
        bubbleEl.style.width = `${size}px`;
        bubbleEl.style.height = `${size}px`;
        bubbleEl.style.left = Math.random() * innerWidth + 'px';
        section.appendChild(bubbleEl);

        // 一定時間が経てば泡を消す
        setTimeout(() => {
            bubbleEl.remove();
        }, 13000);


    }

    // 泡の生成を開始するトリガー（初期値はOFF）
    let activeBubble = null;

    // 泡の生成をストップする関数
    const stopBubble = () => {
        clearInterval(activeBubble);
    };

    // Intersection observerに渡すコールバック関数
    const cb = (entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                activeBubble = setInterval(createBubble, 200);
            } else {
                stopBubble();
            }
        })
    };

    // Intersection observerに渡すオプション
    const options = {
        rootMargin: "100px 0px"
    }

    // Intersection observerの初期化
    const io = new IntersectionObserver(cb, options);
    io.POLL_INTERVAL = 100; // Polyfill
    io.observe(section);
});


// 横からの泡

// 5~10秒後に泡生成を繰り返す
// 10~30秒後に泡生成を繰り返す

document.addEventListener('DOMContentLoaded', () => {
    // コンテナを指定
    const section = document.querySelector('.bubble_background');

    // 泡を生成する関数
    const createBubble_edge = () => {
        const bubble_edgeEl = document.createElement('span');
        bubble_edgeEl.className = 'bubble_edge';

        // 最小値、最大値
        const minSize = 10;
        const maxSize = 80;
        const size = Math.random() * (maxSize + 1 - minSize) + minSize;
        bubble_edgeEl.style.width = `${size}px`;
        bubble_edgeEl.style.height = `${size}px`;
        bubble_edgeEl.style.left = Math.random() * innerWidth + 'px';

        section.appendChild(bubble_edgeEl);

        // 一定時間が経てば泡を消す
        setTimeout(() => {
            bubble_edgeEl.remove();
        }, 2000);
    };

    // 5～10秒後に泡の生成を開始して、5秒後に停止する処理を繰り返す
    let activeBubble_edge = null;
    const intervalTime = 10000; // 5秒 * 2 = 10秒
    const repeatInterval = () => {
        // 5～10秒後に泡の生成を開始
        // const randomTime = Math.random() * (intervalTime - 5000) + 5000;

        // 10～30秒後に泡の生成を開始
        const randomTime = Math.random() * (intervalTime - 10000) + 30000;
        setTimeout(() => {
            // 泡の生成を開始するトリガー
            activeBubble_edge = setInterval(createBubble_edge, 100);

            // 5秒後に泡の生成を停止
            setTimeout(() => {
                clearInterval(activeBubble_edge);
                // 次のサイクルを繰り返す
                repeatInterval();
            }, 5000);
        }, randomTime);
    };

    // 最初にサイクルを開始
    repeatInterval();
});


// アヒルの出現

"use strict";
document.addEventListener('DOMContentLoaded', () => {
    // コンテナを指定
    const section = document.querySelector('.bubble_background');

    // アヒルを生成する関数
    const createDuck = () => {
        const duckEl = document.createElement('span');
        duckEl.className = 'duck';


        const size = 40;
        duckEl.style.width = `${size}px`;
        duckEl.style.height = `${size}px`;

        // 画像を生成する
        const img = document.createElement('img');
        img.src = '../assets/images/duck.png'; // 画像のURLをここに挿入
        img.alt = 'アヒルの画像';
        img.style.width = '100%';
        img.style.height = '100%';
        duckEl.appendChild(img);


        duckEl.style.left = Math.random() * innerWidth + 'px';
        section.appendChild(duckEl);

        // 一定時間が経てばアヒルを消す
        setTimeout(() => {
            duckEl.remove();
        }, 8000);

    };

    // あひるの生成を開始するトリガー（初期値はOFF）
    let activeDuck = null;

    // あひるの生成をストップする関数
    const stopDuck = () => {
        clearInterval(activeDuck);
    };

    // Intersection observerに渡すコールバック関数
    const cb = (entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // 生成間隔を20000ミリ秒に変更
                activeDuck = setInterval(createDuck, 20000);
            } else {
                stopDuck();
            }
        });
    };

    // Intersection observerに渡すオプション
    const options = {
        rootMargin: "100px 0px"
    };

    // Intersection observerの初期化
    const io = new IntersectionObserver(cb, options);
    io.POLL_INTERVAL = 100; // Polyfill
    io.observe(section);
});

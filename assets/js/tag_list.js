"use strict";

$(function () {
    // タグとコンテンツの要素を取得
    let $tags = $('.tag li');
    let $contents = $('.contents');

    // 初期表示設定
    $contents.eq(0).addClass('active');
    $tags.eq(0).addClass('active');
    $contents.slice(1).removeClass('active');


    // タグクリックイベントハンドラ
    $tags.on('click', function () {
        // 全てのコンテンツを非アクティブにする
        $contents.removeClass('active');

        // 選択中のクラスを解除
        $tags.removeClass('active');

        // クリックされたタグのインデックスを取得
        let index = $tags.index(this);

        // クリックされたタグに対応するコンテンツをアクティブにする
        $contents.eq(index).addClass('active');

        // クリックされたタグにクラスを付与
        $(this).addClass('active');
    });
});

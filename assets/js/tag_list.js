"use strict";

$(function () {
    // タグとコンテンツの要素を取得
    let $tags = $('.tag li');
    let $contents = $('.contents');

    // 初期表示設定
    // 2024-06-14 fukushima mod s
    // $contents.eq(0).addClass('active');
    // $tags.eq(0).addClass('active');
    // $contents.slice(1).removeClass('active');

    $('.tag').find('li').each(function (index, element) {
        if ($(element).hasClass("active")) {
            //対象の要素にclassがある場合
            $contents.eq(index).addClass('active');
            console.log(element.textContent);
        }
    })
    // 2024-06-14 fukushima mod e

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

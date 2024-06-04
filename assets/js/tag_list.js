"use strict";

let favoriteTags = document.querySelectorAll('.favorite_tag li');
// .favorite_tag li 要素を全て取得

let favoriteLists = document.querySelectorAll('.favorite_list');
// .favorite_list 要素を全て取得

// デフォルトで onsen_tag が選択された状態
favoriteTags[0].classList.add('active');
// 最初の favoriteTags に active クラスを追加
favoriteLists[0].classList.add('show');
// 最初の favoriteLists に show クラスを追加

favoriteTags.forEach(function (tag) {
    // favoriteTags 各要素に対して実行
    tag.addEventListener('click', function () {
        // クリックイベントがあった場合に実行

        // 全ての tag から active クラスを削除
        favoriteTags.forEach(function (t) {
            t.classList.remove('active');
        });

        // 全ての favorite_list から show クラスを削除
        favoriteLists.forEach(function (list) {
            list.classList.remove('show');
        });

        // クリックされた tag に active クラスを追加
        this.classList.add('active');

        // クリックされた tag に対応する favorite_list に show クラスを追加
        let listIndex = Array.from(favoriteTags).indexOf(this);
        // クリックされた tag の index を取得
        favoriteLists[listIndex].classList.add('show');
    });
});

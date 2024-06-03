"use strict";

// ▼タグクリックでカテゴリー切り替え▼
// info_tag内のli要素を取得して配列newsTagsに代入。
let newsTags = document.querySelectorAll('.news_tag, .gourmet_tag, .play_tag, .others_tag');

// news_listの要素を取得して変数newsListsに代入。
let newsLists = document.querySelectorAll('.news_list');

function showList(listClass) {
    hideAllLists();  // すべてのnewsListsを非表示。
    let targetList = document.querySelector(`.news_list.${listClass}`); // 対応するnews_listの要素を取得。
    if (targetList) {
        targetList.classList.add('show');  // news_listに'show'クラスを追加し、表示。
    }
}

function hideAllLists() {
    newsLists.forEach(list => list.classList.remove('show'));  // すべてのnews_listから'show'クラスを削除し、非表示に。
}

function initializeActiveTag() {
    let newsTag = document.querySelector('.news_tag');  // 初期値のタグ要素（news_tag）を取得
    if (newsTag) {
        newsTag.classList.add('active');  // 初期値のタグ要素（news_tag）に'active'クラスを追加
    }
}

// ▼newsTags配列の各要素に対しての処理▼
newsTags.forEach(tag => {
    tag.addEventListener('click', () => {
        // タグのactiveクラスをリセット
        newsTags.forEach(tag => tag.classList.remove('active'));
        // クリックしたタグにactiveクラスを追加
        tag.classList.add('active');


        //クリックされたタグから、対応するニュースリストのnews_listを取得
        let listClass = tag.classList[0].replace('_tag', '');  //info_tag内li要素のクラス名「_tag」を空文字に置き換えてnews_listに紐づける
        showList(listClass);
    });
});

// 初期値として「news_tag」を表示
initializeActiveTag();   // 最初のタグ「news_tag」にアクティブクラスを設定します
showList('news');  // デフォルトでnewsを表示します

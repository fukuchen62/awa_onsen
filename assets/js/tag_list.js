"use strict";

// タグクリックでカテゴリー切り替え
const newsTags = document.querySelectorAll('.news_tag, .gourmet_tag, .play_tag, .others_tag');
const newsLists = document.querySelectorAll('.news_list');

function showList(listClass) {
    hideAllLists();
    const targetList = document.querySelector(`.news_list.${listClass}`);
    if (targetList) {
        targetList.style.display = 'block';
    }
}

function hideAllLists() {
    newsLists.forEach(list => list.style.display = 'none');
}

function initializeActiveTag() {
    const newsTag = document.querySelector('.news_tag');
    if (newsTag) {
        newsTag.classList.add('active');
    }
}

newsTags.forEach(tag => {
    tag.addEventListener('click', () => {
        // タグのアクティブクラスをリセット
        newsTags.forEach(tag => tag.classList.remove('active'));
        // クリックしたタグにアクティブクラスを追加
        tag.classList.add('active');

        const listClass = tag.classList[0].replace('_tag', '');
        showList(listClass);
    });
});

// 初期化
initializeActiveTag();
showList('news');

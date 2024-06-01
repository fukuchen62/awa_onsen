"use strict";

// タグクリックでカテゴリー切り替え
const newsTags = document.querySelectorAll('.news_tag');
const newsLists = document.querySelectorAll('.news_list');

function showList(index) {
    hideAllLists();
    newsLists[index].style.display = 'block';
}

function hideAllLists() {
    newsLists.forEach(list => list.style.display = 'none');
}

newsTags.forEach((tag, index) => {
    tag.addEventListener('click', () => {
        // タグのアクティブクラスをリセット
        newsTags.forEach(tag => tag.classList.remove('active'));
        // クリックしたタグにアクティブクラスを追加
        tag.classList.add('active');

        showList(index);
    });
});

// 初期表示はnewsカテゴリー
const newsIndex = Array.from(newsLists).findIndex(list => list.classList.contains('news'));
showList(newsIndex);

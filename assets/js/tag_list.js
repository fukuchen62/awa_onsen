"use strict";

// タグクリックイベントを設定
const tags = document.querySelectorAll('.tag li');
const contents = document.querySelectorAll('.contents');

// 初期表示設定
contents[0].classList.add('active');
tags[0].classList.add('active');
for (let i = 1; i < contents.length; i++) {
    contents[i].classList.remove('active');
}

// タグクリックイベントハンドラ
tags.forEach((tag, index) => {
    tag.addEventListener('click', () => {
        // 全てのコンテンツを非アクティブにする
        contents.forEach(content => {
            content.classList.remove('active');
        });

        // 選択中のクラスを解除
        tags.forEach(tag => tag.classList.remove('active'));

        // クリックされたタグに対応するコンテンツをアクティブにする
        const selectedContent = contents[index];
        if (selectedContent) {
            selectedContent.classList.add('active');
        }

        // クリックされたタグにクラスを付与
        tag.classList.add('active');
    });
});

// お気に入り情報の取得と表示
// ここで、お気に入り情報を取得するAPIを呼び出し、
// データを元に各コンテンツを構築する処理を記述します。

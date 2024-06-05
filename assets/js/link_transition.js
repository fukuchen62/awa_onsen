"use strict";

// すべての親リンクを選択
const parentLinks = document.querySelectorAll('a.parent');

// 各親リンクにクリックイベントリスナーを追加
parentLinks.forEach(link => {
    link.addEventListener('click', handleLinkClick);
});

// クリックイベントハンドラ
function handleLinkClick(event) {
    // デフォルトの遷移をキャンセル
    event.preventDefault();

    // リンク先URLを取得
    const targetUrl = event.currentTarget.href;

    // 新しいタブまたはウィンドウで遷移
    window.open(targetUrl, '_blank');
}

"use strict";

// spot_cardの要素と数を取得
const spotCards = document.querySelectorAll('.spot_card');
const numSpotCards = spotCards.length;

// time_scheduleの親要素を取得
const timeSchedule = document.querySelector('.time_schedule');

// 既存のliを削除
const existingLis = timeSchedule.querySelectorAll('li');
existingLis.forEach(li => li.remove());

// spot_cardの数に応じてliを生成し、imgの位置に合わせる
spotCards.forEach((spotCard, index) => {
    const li = document.createElement('li');
    const img = spotCard.querySelector('img');

    // imgが画面に入ってくる位置を取得
    const imgRect = img.getBoundingClientRect();
    const scrollY = window.pageYOffset || document.documentElement.scrollTop;
    const imgTop = imgRect.top + scrollY;

    // liの位置をimgの上辺に合わせる
    li.style.marginTop = `${imgTop}px`;

    // 時間軸の文言を設定
    if (index === 0) {
        li.textContent = '10:30\nSTART';
    } else if (index === 1) {
        li.textContent = '12:00';
    } else if (index === 2) {
        li.textContent = '16:00';
    }

    timeSchedule.appendChild(li);
});

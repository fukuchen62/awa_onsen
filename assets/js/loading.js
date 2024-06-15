document.addEventListener("DOMContentLoaded", function () {
    const loader = document.getElementById("loader_loading");

    // セッションストレージから表示フラグを取得
    const hasLoadedBefore = sessionStorage.getItem("hasLoadedBefore");

    // フラグがない場合、ロード画面を表示
    if (!hasLoadedBefore) {
        // セッションストレージにフラグを設定
        sessionStorage.setItem("hasLoadedBefore", "true");

        // スクロールを無効にする
        document.body.style.overflow = "hidden";
        document.documentElement.style.overflow = "hidden";

        // 泡の色を設定
        const blueColors = ["#54B1F0", "#5954F0", "#5480F0", "#54E2F0", "#8C54F0", "#A4B9F0"];

        // ランダムな泡を生成
        for (let i = 0; i < 50; i++) {
            // 泡の数を増やす
            const bubble = document.createElement("div");
            bubble.classList.add("bubble_loading");
            bubble.style.left = `${Math.random() * 100}%`;
            bubble.style.animationDelay = `${Math.random() * 3}s`;

            // ランダムな色を設定
            const color = blueColors[Math.floor(Math.random() * blueColors.length)];

            // ランダムな大きさを設定
            const size = Math.random() * 30 + 10; // 10pxから40pxの間の大きさにする
            bubble.style.width = `${size}px`;
            bubble.style.height = `${size}px`;

            // 影を追加
            bubble.style.boxShadow = `0px 0px 4px  ${color}, inset 0px 0px 4px  ${color}`;

            loader.appendChild(bubble);
        }

        // 3秒後にロード画面を非表示にする
        setTimeout(function () {
            loader.classList.add("hidden_loading");
            // スクロールを再度有効にする
            document.body.style.overflow = "";
            document.documentElement.style.overflow = "";
        }, 5000);
    } else {
        // フラグがある場合、ロード画面を非表示に設定
        loader.classList.add("hidden_loading");
    }
});

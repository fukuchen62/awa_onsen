<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>モデルコース</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            text-align: center;
            padding-top: 20px;
        }

        .title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .tabs {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .tab {
            padding: 10px 20px;
            cursor: pointer;
            background-color: #eee;
            border: 1px solid #ddd;
            border-radius: 10px 10px 0 0;
            margin-right: 5px;
        }

        .tab.active {
            background-color: #4CAF50;
            color: #fff;
            border-bottom: none;
        }

        .tab-content {
            display: none;
            border: 1px solid #ddd;
            border-radius: 0 0 10px 10px;
            padding: 20px;
            background-color: #fff;
        }

        .tab-content.active {
            display: block;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="title">モデルコース</div>
        <div class="tabs">
            <div class="tab active" onclick="showTab('touring')">ツーリング</div>
            <div class="tab" onclick="showTab('rafting')">ラフティング</div>
            <div class="tab" onclick="showTab('photo')">映える</div>
            <div class="tab" onclick="showTab('hiking')">ハイキング</div>
        </div>
        <div id="touring" class="tab-content active">
            <p>ツーリングのコンテンツがここに表示されます。</p>
        </div>
        <div id="rafting" class="tab-content">
            <p>ラフティングのコンテンツがここに表示されます。</p>
        </div>
        <div id="photo" class="tab-content">
            <p>映えるのコンテンツがここに表示されます。</p>
        </div>
        <div id="hiking" class="tab-content">
            <p>ハイキングのコンテンツがここに表示されます。</p>
        </div>
    </div>

    <script>
        function showTab(tabId) {
            // 全てのタブとコンテンツを非アクティブにする
            var tabs = document.getElementsByClassName('tab');
            var tabContents = document.getElementsByClassName('tab-content');
            for (var i = 0; i < tabs.length; i++) {
                tabs[i].classList.remove('active');
                tabContents[i].classList.remove('active');
            }
            // クリックされたタブと対応するコンテンツをアクティブにする
            document.querySelector('.tab[onclick="showTab(\'' + tabId + '\')"]').classList.add('active');
            document.getElementById(tabId).classList.add('active');
        }
    </script>
</body>

</html>

<!-- header.phpを読み込む -->
<?php get_header(); ?>

<main class="pc_inner">
    <div class="container">
        <!-- パンくずリスト -->
        <?php get_template_part('template-parts/breadcrumb') ?>

        <div class="flex">
            <h2 class="under_line">サ活</h2>
        </div>
        <div class="box right">
            <img class="sauna_photo margin_right" src="../assets/images/sauna1.png" alt="サ活写真">
            <div class="sauna_box">
                <h3 class="sauna_ttl">サ活とは</h3>
                <p>
                    サウナ活動の略語で、サウナ、水風呂、外気浴といった順番で行う温冷交代浴をすることです。あああああああああああああああああああああああああああああああああああああ、水風呂、外気浴といった順番で行う温冷交代浴をすることです。あああああああああああああああああああああああああああああああああああああ、水風呂、外気浴といった順番で行う温冷交代浴をすることです。ああああああああああああ
                </p>
            </div>


        </div>

        <div class="box left">
            <img class="sauna_photo margin_left" src="../assets/images/sauna2.png" alt="整い方写真">
            <div class="sauna_box">
                <h3 class="sauna_ttl">整い方</h3>
                <p>
                    1.サウナに入る前に体・頭を洗うううううううううううううううううううううううううううううううううううううううううううううううう<br>
                    2.6～12分ほどサウナに入る<br>
                    3.～～～<br>
                    4.～～～<br>
                    5.～～～
                </p>
            </div>

        </div>

        <div class="box right">
            <img class="sauna_photo margin_right" src="../assets/images/sauna3.png" alt="持ち物・注意事項写真">
            <div class="sauna_box">
                <h3 class="sauna_ttl">持ち物</h3>

                <p>
                    【持ち物】<br>
                    ・タオル<br>
                    ・水<br>
                    ・シャンプー<br>
                    ・トリートメント<br>
                    ・スキンケア用品<br>

                    【注意事項】<br>
                    ・体の調子が悪いときは避ける<br>
                    ・水分補給を忘れずに
                </p>
            </div>

        </div>
        <div class="btn">
            <a href="">
                <div class="square">
                    サウナのある温泉
                </div>
            </a>
        </div>
        <button class="back_btn" onclick="history.back">
            <span><i class="fa-solid fa-arrow-left"></i>back</span>
        </button>
    </div>
</main>

<footer class="footer_wrap">
    <div class="footer_container">
        <ul class="footer_list">
            <li class="footer_item">
                <a href="about.html">
                    <span class="material-symbols-outlined">
                        bubble_chart
                    </span>このサイトについて
                </a>
            </li>
            <li class="footer_item">
                <a href="news_list.html">
                    <span class="material-symbols-outlined">
                        fiber_new
                    </span>お知らせ一覧へ
                </a>
            </li>
            <li class="footer_item">
                <a href="privacypolicy.html">
                    <span class="material-symbols-outlined">
                        verified_user
                    </span>
                    <div>免責事項・<br>プライバシーポリシー</div>
                </a>
            </li>
            <li class="footer_item">
                <a href="form.html">
                    <span class="material-symbols-outlined">
                        mail
                    </span>お問い合わせ(企業様)
                </a>
            </li>
        </ul>
        <p>&copy;あわあわ温泉めぐり All Rights Reserved.</p>
    </div>
</footer>
</div>
<script src="../assets/js/vendor/jquery-3.6.0.min.js"></script>

<script src="../assets/js/common.js"></script>
<script src="../assets/js/menu.js"></script>

</body>

</html>
<!-- header.phpを読み込む -->
<?php get_header(); ?>

<!-- WordPressのルールの開始 -->
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : ?>
        <?php the_post(); ?>


        <main>
            <section>
                <h2 class="under_line">コラム一覧</h2>

                <!-- パンくずリスト -->
                <?php get_template_part('template-parts/breadcrumb'); ?>

                <!-- タグ -->
                <ul class="info_tag">
                    <li class="news_tag"><a href="">温泉</a></li>
                    <li class="gourmet_tag"><a href="">温泉周辺<br>施設紹介</a></li>
                    <li class="play_tag"><a href="">お役立ち</a></li>
                </ul>

                <!-- 一覧 -->
                <div class="news_list">
                    <article class="news_card">
                        <a href="https://ebookjapan.yahoo.co.jp/">
                            <img src="../assets/images/onsen_img.jpg" alt="" />
                            <div class="news_contents">
                                <p class="date fugaz-one-regular"><?php the_time('Y-m-d-H:i'); ?>2024.05.31 10:00</p>
                                <p class="title"><?php the_title(); ?></p>
                                <div class="hashtag_list .flex">
                                    <object>
                                        <a href="https://www.yahoo.co.jp/" class="hashtag"><?php the_content(); ?>#温泉</a>
                                    </object>
                                    <object>
                                        <a href="https://www.yahoo.co.jp/" class="hashtag">#東部</a>
                                    </object>
                                </div>
                            </div>
                        </a>
                    </article>
                    <article class="news_card">
                        <a href="https://ebookjapan.yahoo.co.jp/">
                            <img src="../assets/images/onsen_img.jpg" alt="" />
                            <div class="news_contents">
                                <p class="date fugaz-one-regular">2024.05.24 10:00</p>
                                <p class="title">尾花温泉夏季特別営業のお知らせ</p>
                                <div class="hashtag_list .flex">
                                    <object>
                                        <a href="https://www.yahoo.co.jp/" class="hashtag">#温泉</a>
                                    </object>
                                    <object>
                                        <a href="https://www.yahoo.co.jp/" class="hashtag">#西部</a>
                                    </object>
                                </div>
                            </div>
                        </a>
                    </article>
                    <article class="news_card">
                        <a href="https://ebookjapan.yahoo.co.jp/">
                            <img src="../assets/images/onsen_img.jpg" alt="" />
                            <div class="news_contents">
                                <p class="date fugaz-one-regular">2024.05.24 10:00</p>
                                <p class="title">温泉情報に「安岡温泉」が追加されました。</p>
                                <div class="hashtag_list .flex">
                                    <object>
                                        <a href="https://www.yahoo.co.jp/" class="hashtag">#温泉</a>
                                    </object>
                                    <object>
                                        <a href="https://www.yahoo.co.jp/" class="hashtag">#温泉</a>
                                    </object>
                                </div>
                            </div>
                        </a>
                    </article>
                    <article class="news_card">
                        <a href="https://ebookjapan.yahoo.co.jp/">
                            <img src="../assets/images/onsen_img.jpg" alt="" />
                            <div class="news_contents">
                                <p class="date fugaz-one-regular">2024.05.24 10:00</p>
                                <p class="title">温泉情報に「安岡温泉」が追加されました。</p>
                                <div class="hashtag_list .flex">
                                    <object>
                                        <a href="https://www.yahoo.co.jp/" class="hashtag">#温泉</a>
                                    </object>
                                    <object>
                                        <a href="https://www.yahoo.co.jp/" class="hashtag">#温泉</a>
                                    </object>
                                </div>
                            </div>
                        </a>
                    </article>
                    <article class="news_card">
                        <a href="https://ebookjapan.yahoo.co.jp/">
                            <img src="../assets/images/onsen_img.jpg" alt="" />
                            <div class="news_contents">
                                <p class="date fugaz-one-regular">2024.05.24 10:00</p>
                                <p class="title">温泉情報に「安岡温泉」が追加されました。</p>
                                <div class="hashtag_list .flex">
                                    <object>
                                        <a href="https://www.yahoo.co.jp/" class="hashtag">#温泉</a>
                                    </object>
                                    <object>
                                        <a href="https://www.yahoo.co.jp/" class="hashtag">#温泉</a>
                                    </object>
                                </div>
                            </div>
                        </a>
                    </article>
                </div>

            </section>

            <!-- ページネーション -->
            <p class="pagination">
                << 1　2　3　4　5>>
            </p>

            <button class="back_btn" onclick="history.back">
                <p><i class="fa-solid fa-arrow-left"></i>back</p>
            </button>
        </main>
        <!-- WordPressのルールの終了 -->
    <?php endwhile; ?>
<?php endif; ?>
</div>
<footer></footer>
</div>
<script src="../assets/js/vendor/jquery-3.6.0.min.js"></script>

<script src="../assets/js/common.js"></script>

</body>

</html>

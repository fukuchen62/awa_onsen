<!-- header.phpを読み込む -->
<?php get_header(); ?>


<main class="container">

    <div class="inner">
        <!-- サイトタイトル -->
        <h2 class="under_line">周辺施設一覧</h2>

        <!-- パンくずリスト -->
        <?php get_template_part('template-parts/breadcrumb') ?>

        <!-- タグメニュー -->
        <ul class="info_tag">
            <li class="shopping_tag"><a href="<?php echo home_url('/facility_type/shopping/'); ?>">ショッピング</a></li>
            <li class="gourmet_tag"><a href="<?php echo home_url('/facility_type/gourmet/'); ?>">グルメ</a></li>
            <li class="play_tag"><a href="<?php echo home_url('/facility_type/play/'); ?>">遊ぶ</a></li>
            <li class="stay_tag"><a href="<?php echo home_url('/facility_type/stay/'); ?>">泊まる</a></li>
        </ul>

        <!-- アコーディオン -->
        <details class="details js-details">
            <summary class="details-summary js-details-summary"><span class="btn"></span>
                <h3 class="acco_title">東部</h3>
            </summary>
            <div class="details-content js-details-content">
                <div class="article_all">
                    <!-- カード型 -->
                    <article class="card">
                        <a href="#">
                            <div>
                                <span></span>
                                <img src="../assets/images/onsen_img.jpg" alt="">
                            </div>
                            <h3>すんごい温泉めちゃすごの湯</h3>
                        </a>
                    </article>
                    <!-- カード型 -->
                    <article class="card">
                        <a href="#">
                            <div>
                                <span></span>
                                <img src="../assets/images/onsen_img.jpg" alt="">
                            </div>
                            <h3>すんごい温泉めちゃすごの湯</h3>
                        </a>
                    </article>
                    <!-- カード型 -->
                    <article class="card">
                        <a href="#">
                            <div>
                                <span></span>
                                <img src="../assets/images/onsen_img.jpg" alt="">
                            </div>
                            <h3>すんごい温泉めちゃすごの湯</h3>
                        </a>
                    </article>
                    <!-- カード型 -->
                    <article class="card">
                        <a href="#">
                            <div>
                                <span></span>
                                <img src="../assets/images/onsen_img.jpg" alt="">
                            </div>
                            <h3>すんごい温泉めちゃすごの湯</h3>
                        </a>
                    </article>
                </div>
            </div>
        </details>
        <details class="details js-details">
            <summary class="details-summary js-details-summary"><span class="btn"></span>
                <h3 class="acco_title">西部</h3>
            </summary>
            <div class="article_all">
                <!-- カード型 -->
                <article class="card">
                    <a href="#">
                        <div>
                            <span></span>
                            <img src="../assets/images/onsen_img.jpg" alt="">
                        </div>
                        <h3>すんごい温泉めちゃすごの湯</h3>
                    </a>
                </article>
                <!-- カード型 -->
                <article class="card">
                    <a href="#">
                        <div>
                            <span></span>
                            <img src="../assets/images/onsen_img.jpg" alt="">
                        </div>
                        <h3>すんごい温泉めちゃすごの湯</h3>
                    </a>
                </article>
                <!-- カード型 -->
                <article class="card">
                    <a href="#">
                        <div>
                            <span></span>
                            <img src="../assets/images/onsen_img.jpg" alt="">
                        </div>
                        <h3>すんごい温泉めちゃすごの湯</h3>
                    </a>
                </article>
                <!-- カード型 -->
                <article class="card">
                    <a href="#">
                        <div>
                            <span></span>
                            <img src="../assets/images/onsen_img.jpg" alt="">
                        </div>
                        <h3>すんごい温泉めちゃすごの湯</h3>
                    </a>
                </article>
            </div>

            <div class="details-content js-details-content">

            </div>
        </details>
        <details class="details js-details">
            <summary class="details-summary js-details-summary"><span class="btn"></span>
                <h3 class="acco_title">南部</h3>
            </summary>
            <div class="article_all">
                <!-- カード型 -->
                <article class="card">
                    <a href="#">
                        <div>
                            <span></span>
                            <img src="../assets/images/onsen_img.jpg" alt="">
                        </div>
                        <h3>すんごい温泉めちゃすごの湯</h3>
                    </a>
                </article>
                <!-- カード型 -->
                <article class="card">
                    <a href="#">
                        <div>
                            <span></span>
                            <img src="../assets/images/onsen_img.jpg" alt="">
                        </div>
                        <h3>すんごい温泉めちゃすごの湯</h3>
                    </a>
                </article>
                <!-- カード型 -->
                <article class="card">
                    <a href="#">
                        <div>
                            <span></span>
                            <img src="../assets/images/onsen_img.jpg" alt="">
                        </div>
                        <h3>すんごい温泉めちゃすごの湯</h3>
                    </a>
                </article>
                <!-- カード型 -->
                <article class="card">
                    <a href="#">
                        <div>
                            <span></span>
                            <img src="../assets/images/onsen_img.jpg" alt="">
                        </div>
                        <h3>すんごい温泉めちゃすごの湯</h3>
                    </a>
                </article>
            </div>
            <div class="details-content js-details-content">

            </div>
        </details>
    </div>

    <button class="back_btn" onclick="history.back">
        <span><i class="fa-solid fa-arrow-left"></i>back</span>
    </button>
</main>

<!-- footer.phpを読み込む -->
<?php get_footer(); ?>

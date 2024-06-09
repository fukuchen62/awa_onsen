<!-- header.phpを読み込む -->
<?php get_header(); ?>

<main class="pc_inner">
    <div class="container">
        <!-- タイトル -->
        <div class="flex">
            <h2 class="under_line"><?php the_title(); ?></h2>
        </div>

        <!-- パンくずリスト -->
        <?php get_template_part('template-parts/breadcrumb') ?>

        <!-- タグ -->
        <div class="hashtag_list">
            <?php
            // 現在の投稿のIDを取得
            $post_id = get_the_ID();

            // 投稿タイプを取得
            $post_type = get_post_type($post_id);

            // 投稿タイプに関連するタクソノミーを取得
            $taxonomies = get_object_taxonomies($post_type);

            if (!empty($taxonomies)) {
                foreach ($taxonomies as $taxonomy) {
                    // タクソノミーに関連するタームを取得
                    $terms = get_the_terms($post_id, $taxonomy);

                    if ($terms && !is_wp_error($terms)) {
                        echo '<ul>';
                        foreach ($terms as $term) {
                            // echo '<li>';
            ?>
                            <a href="https://www.yahoo.co.jp/" class="hashtag"><?php echo '#' . esc_html($term->name); ?></a>
            <?php
                        }
                        echo '</ul>';
                    } else {
                    }
                }
            } else {
            }
            ?>
        </div>
        <!-- タイムスケジュール始まり -->
        <!-- Summary -->
        <div class="flex">
            <h3 class="course_day_summary">Summary</h3>
        </div>
        <p><?php the_field('course_description'); ?></p>

        <!-- マップ -->
        <?php
        if (function_exists('get_field')) {
            $iframe_code = get_field('iframe'); // 'iframe' フィールド名を指定
            if ($iframe_code) {
                echo $iframe_code;
            } else {
                echo 'カスタムフィールドが見つかりませんでした。';
            }
        } else {
            echo 'get_field 関数が見つかりませんでした。';
        }
        ?>

        <!-- DAY1 -->
        <section class="day1">
            <div class="flex">
                <h3 class="course_day">DAY1</h3>
            </div>
            <div class="layer">
                <div class="time_schedule tb_only pc_only">
                    <div class="flow_design12">
                        <!-- 開始時刻1～5 -->
                        <ul class="flow12">
                            <li>
                                <p class="icon12"><?php the_field('start_time1_1'); ?><br>START</p>
                            </li>

                            <li>
                                <p class="icon12"><?php the_field('start_time1_2'); ?></p>
                            </li>

                            <li>
                                <p class="icon12"><?php the_field('start_time1_3'); ?></p>
                            </li>

                            <li>
                                <p class="icon12"><?php the_field('start_time1_4'); ?></p>
                            </li>

                            <li>
                                <p class="icon12"><?php the_field('start_time1_5'); ?></p>
                            </li>
                        </ul>
                    </div>

                    <!-- スマホ版 -->
                </div>
                <div class="model_course1">
                    <!-- 1 -->
                    <div class="photo">
                        <div class="clock"><?php the_field('start_time1_1'); ?><br>START</div>
                    </div>
                    <div class="square_white"></div>

                    <!-- 滞在時間1 -->
                    <div class="flex">
                        <div class="time"><?php the_field('stay_time1_1'); ?></div>
                        <div>
                            <!-- <p>苔や植物で癒される</p> ※コンテンツ班に要確認-->
                            <!-- <h4><?php the_field('関数が必要？'); ?></h4> -->
                        </div>
                    </div>
                    <p>
                        <!-- 詳細から文章を持ってくる -->
                    </p>
                    <div class="flex_car">
                        <div class="square_green"></div>
                        <p class="car_tx">徳島駅から車で60分</p>
                    </div>
                    <div class="flex_car">
                        <div class="square_green"></div>
                        <p class="car_tx">公式HP：</p>
                    </div>
                    <p>https://conmaiya.stores.jp/</p>


                    <div class="flex">
                        <div class="car_green"></div>
                        <p class="car_10">車で10分</p>
                    </div>
                    <!-- 2 -->
                    <div class="photo">
                        <div class="clock">10 : 30<br>START</div>
                    </div>
                    <div class="square_white"></div>
                    <div class="flex">
                        <div class="time">60分</div>
                        <div>
                            <p>苔や植物で癒される</p>
                            <h4>こんまい屋</h4>
                        </div>
                    </div>
                    <p>
                        ここにテキストおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおここにテキストおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおお
                    </p>
                    <div class="flex_car">
                        <div class="square_green"></div>
                        <p class="car_tx">徳島駅から車で60分</p>
                    </div>
                    <div class="flex_car">
                        <div class="square_green"></div>
                        <p class="car_tx">公式HP：</p>
                    </div>
                    <p>https://conmaiya.stores.jp/</p>


                    <div class="flex">
                        <div class="car_green"></div>
                        <p class="car_10">車で10分</p>
                    </div>
                    <!-- 3 -->
                    <div class="photo">
                        <div class="clock">10 : 30<br>START</div>
                    </div>
                    <div class="square_white"></div>
                    <div class="flex">
                        <div class="time">60分</div>
                        <div>
                            <p>苔や植物で癒される</p>
                            <h4>こんまい屋</h4>
                        </div>
                    </div>
                    <p>
                        ここにテキストおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおここにテキストおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおお
                    </p>
                    <div class="flex_car">
                        <div class="square_green"></div>
                        <p class="car_tx">徳島駅から車で60分</p>
                    </div>
                    <div class="flex_car">
                        <div class="square_green"></div>
                        <p class="car_tx">公式HP：</p>
                    </div>
                    <p>https://conmaiya.stores.jp/</p>

                    <div class="flex">
                        <div class="car_green"></div>
                        <p class="car_10">車で10分</p>
                    </div>
                    <div class="green_square">
                    </div>
                </div>
            </div>


            <div class="yellowgreen_square">
                <h4>本日のホテルと温泉</h4>
                <article class="card pink">
                    <a href="#">
                        <div>
                            <span></span>
                            <img src="../assets/images/onsen_img.jpg" alt="">
                        </div>
                        <h3>周辺施設</h3>
                    </a>
                </article>
                <p>ここにテキストおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおお</p>
            </div>
        </section>
        <!-- DAY2 -->
        <section class="day2">
            <div class="flex">
                <h3 class="course_day">DAY1</h3>
            </div>
            <!-- 1 -->
            <div class="photo">
                <div class="clock">10 : 30<br>START</div>
            </div>
            <div class="square_white"></div>
            <div class="flex">
                <div class="time">60分</div>
                <div>
                    <p>苔や植物で癒される</p>
                    <h4>こんまい屋</h4>
                </div>
            </div>
            <p>
                ここにテキストおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおここにテキストおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおお
            </p>
            <div class="flex_car">
                <div class="square_green"></div>
                <p class="car_tx">徳島駅から車で60分</p>
            </div>
            <div class="flex_car">
                <div class="square_green"></div>
                <p class="car_tx">公式HP：</p>
            </div>
            <p>https://conmaiya.stores.jp/</p>

            <div class="flex">
                <div class="car_green"></div>
                <p class="car_10">車で10分</p>
            </div>
            <!-- 2 -->
            <div class="photo">
                <div class="clock">10 : 30<br>START</div>
            </div>
            <div class="square_white"></div>
            <div class="flex">
                <div class="time">60分</div>
                <div>
                    <p>苔や植物で癒される</p>
                    <h4>こんまい屋</h4>
                </div>
            </div>
            <p>
                ここにテキストおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおここにテキストおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおお
            </p>
            <div class="flex_car">
                <div class="square_green"></div>
                <p class="car_tx">徳島駅から車で60分</p>
            </div>
            <div class="flex_car">
                <div class="square_green"></div>
                <p class="car_tx">公式HP：</p>
            </div>
            <p>https://conmaiya.stores.jp/</p>

            <div class="flex">
                <div class="car_green"></div>
                <p class="car_10">車で10分</p>
            </div>
            <!-- 3 -->
            <div class="photo">
                <div class="clock">10 : 30<br>START</div>
            </div>
            <div class="square_white"></div>
            <div class="flex">
                <div class="time">60分</div>
                <div>
                    <p>苔や植物で癒される</p>
                    <h4>こんまい屋</h4>
                </div>
            </div>
            <p>
                ここにテキストおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおここにテキストおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおお
            </p>
            <div class="flex_car">
                <div class="square_green"></div>
                <p class="car_tx">徳島駅から車で60分</p>
            </div>
            <div class="flex_car">
                <div class="square_green"></div>
                <p class="car_tx">公式HP：</p>
            </div>
            <p>https://conmaiya.stores.jp/</p>
            <!-- 関連店舗 -->
            <h5>今回の関連店舗はこちら</h5>
            <!-- カード -->
            <article class="card orange">
                <a href="#">
                    <div>
                        <span></span>
                        <img src="../assets/images/onsen_img.jpg" alt="">
                    </div>
                    <h3>周辺施設</h3>
                </a>
            </article>

            <article class="card orange">
                <a href="#">
                    <div>
                        <span></span>
                        <img src="../assets/images/onsen_img.jpg" alt="">
                    </div>
                    <h3>周辺施設</h3>
                </a>
            </article>

            <article class="card orange">
                <a href="#">
                    <div>
                        <span></span>
                        <img src="../assets/images/onsen_img.jpg" alt="">
                    </div>
                    <h3>周辺施設</h3>
                </a>
            </article>

            <article class="card orange">
                <a href="#">
                    <div>
                        <span></span>
                        <img src="../assets/images/onsen_img.jpg" alt="">
                    </div>
                    <h3>周辺施設</h3>
                </a>
            </article>

        </section>
    </div>
</main>

<!-- footer.phpを読み込む -->
<?php get_footer(); ?>
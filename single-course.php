<!-- header.phpを読み込む -->
<?php get_header(); ?>

<main class="container">
    <!-- タイトル -->
    <div class="flex">
        <h2 class="under_line"><?php the_title(); ?></h2>
    </div>

    <!-- パンくずリスト -->
    <?php get_template_part('template-parts/breadcrumb') ?>

    <!-- タイムスケジュール始まり -->

    <!-- タグ -->
    <div class="hashtag_list">
        <?php
        function display_post_terms()
        {
            // 現在の投稿のIDを取得
            $post_id = get_the_ID();

            // 投稿タイプを取得
            $post_type = get_post_type($post_id);

            // 投稿タイプに関連するタクソノミーを取得
            $taxonomies = get_object_taxonomies($post_type);

            ob_start(); // 出力バッファリングを開始

            if (!empty($taxonomies)) {
                foreach ($taxonomies as $taxonomy) {
                    // タクソノミーに関連するタームを取得
                    $terms = get_the_terms($post_id, $taxonomy);

                    if ($terms && !is_wp_error($terms)) {
                        echo '<p>';
                        foreach ($terms as $term) {
                            echo '<p>';
                            echo '＃' . esc_html($term->name) . '<br>';
                            echo '</p>';
                        }
                        echo '</p>';
                    } else {
                        echo '<p>この投稿に関連するタームはありません。</p>';
                    }
                }
            } else {
                echo '<p>この投稿に関連するタクソノミーはありません。</p>';
            }

            return ob_get_clean(); // バッファの内容を返し、出力バッファリングを終了
        }

        // ショートコードを登録
        function register_shortcodes()
        {
            add_shortcode('post_terms', 'display_post_terms');
        }
        add_action('init', 'register_shortcodes');
        ?>

        <a class="hashtag"></a>
        <a class="hashtag"></a>
        <a class="hashtag"></a>
        <a class="hashtag"></a>
    </div>
    <!-- Summary -->
    <div class="flex">
        <h3 class="course_day_summary">Summary</h3>
    </div>
    <p><?php the_field('course_description'); ?></p>

    <!-- マップ -->
    <iframe src="<?php
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
                    ?>" width="288" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

    <!-- DAY1 -->
    <section class="day1">
        <div class="flex">
            <h3 class="course_day">DAY1</h3>
        </div>
        <div class="layer">
            <div class="time_schedule tb_only pc_only">
                <div class="flow_design12">
                    <ul class="flow12">
                        <li><!-- 開始時刻1 -->
                            <p class="icon12"><?php the_field('start_time1_1'); ?><br>START</p>
                        </li>
                        <li> <!-- 開始時刻2 -->
                            <p class="icon12"><?php the_field('start_time1_2'); ?></p>
                        </li>
                        <li> <!-- 開始時刻3 -->
                            <p class="icon12"><?php the_field('start_time1_3'); ?></p>
                        </li>
                        <li> <!-- 開始時刻4 -->
                            <p class="icon12"><?php the_field('start_time1_4'); ?></p>
                        </li>
                        <li> <!-- 開始時刻5 -->
                            <p class="icon12"><?php the_field('start_time1_5'); ?></p>
                        </li>
                    </ul>
                </div>

            </div>
            <div class="model_course1">
                <!-- 1 -->
                <div class="photo"><!-- 開始時刻1 -->
                    <div class="clock"><?php the_field('start_time1_1'); ?><br>START</div>
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
</main>

<!-- footer.phpを読み込む -->
<?php get_footer(); ?>

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

        <!-- マップ -->
        <?php
        if (function_exists('get_field')) {
            $iframe_code = get_field('iframe'); // 'iframe' フィールド名を指定
            if ($iframe_code) {
                echo $iframe_code;
            } else {
                echo '地図が見つかりませんでした。';
            }
        } else {
            echo '該当する地図が見つかりませんでした。';
        }
        ?>
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


        <!-- Summary -->
        <div class="flex">
            <h3 class="course_day_summary">Summary</h3>
        </div>
        <p><?php the_field('course_description'); ?></p>

        <!-- コースの詳細 -->
        <!-- DAY1 -->
        <section class="day1">
            <div class="flex">
                <h3 class="course_day">DAY1</h3>
            </div>

            <div class="layer">
                <div class="time_schedule tb_only pc_only">
                    <div class="flow_design12">
                        <!-- 画面左側の開始時刻1～5-->
                        <ul class="flow12">
                            <?php for ($i = 1; $i <= 5; $i++) : ?>
                                <?php
                                $st = get_field('start_time1_' . $i);
                                if ($st != "") :
                                ?>
                                    <li>
                                        <p class="icon12">
                                            <?php echo $st; ?>
                                            <?php if ($i == 1) echo '<br>START'; ?>
                                        </p>
                                    </li>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </ul>
                    </div>
                    <!-- スマホ版 -->
                </div>

                <!-- 1日目・日帰り1～5 -->
                <div class="model_course1">

                    <?php for ($i = 1; $i <= 5; $i++) : ?>

                        <?php
                        //スポットのスラッグをを読み込む
                        $spot_slug = get_field('spot_1_' . $i);
                        if ($spot_slug != "") {

                            $type = substr($spot_slug, 0, 1);

                            // 該当スポットの詳細を所見込む
                            if ($type == "s") {
                                $spot_id = get_page_by_path($spot_slug, OBJECT, 'spa')->ID;
                            } else {
                                $spot_id = get_page_by_path($spot_slug, OBJECT, 'facility')->ID;
                            }
                            // 投稿ID
                            $spot_info = get_post($spot_id);

                            // print_r($spot_info);


                            $url = get_the_permalink($spot_id);

                            // print_r($spot_id);

                            if ($type == "s") {
                                // 温泉名
                                $spot_name = get_post_meta($spot_id, 'spa_name',  TRUE);
                                // 温泉紹介文
                                $spot_description = get_post_meta($spot_id, 'description',  TRUE);
                                // 温泉写真
                                $spot_pic = get_post_meta($spot_id, 'main_pic1',  TRUE);
                            } else {
                                // 施設名
                                $spot_name = get_post_meta($spot_id, 'facility_name',  TRUE);
                                // 施設紹介文
                                $spot_description = get_post_meta($spot_id, 'facility_description',  TRUE);
                                // 施設写真
                                $spot_pic = get_post_meta($spot_id, 'facility_pic1', TRUE);
                            }
                        }

                        ?>

                        <!-- 表示処理 -->

                        <div class="block">
                            <?php

                            // print_r($spot_description);
                            $img = wp_get_attachment_image_src($spot_pic, 'large')[0];

                            // print_r($img);

                            // $pic_url = $spot_pic['sizes']['large'];
                            ?>

                            <img src="<?php echo $img; ?>" alt="<?php the_title(); ?>">

                            <div class="square_white"></div>

                            <div class="flex_left">
                                <p class="time"><?php the_field('stay_time1_' . $i); ?></p>
                                <div>
                                    <!-- 温泉・周辺の名前 -->
                                    <h4><?php echo $spot_name ?></h4>
                                </div>
                            </div>
                            <p class="tx"><?php the_field('activity1_' . $i); ?></p>

                        </div>

                        <div class="flex_car">
                            <div class="square_green"></div>
                            <p class="car_tx"><?php
                                                $move_time = get_field('move_time1_' . $i);
                                                if ($i == 1) {
                                                    echo '徳島駅から車で' . esc_html($move_time);
                                                } else {
                                                    echo esc_html($move_time);
                                                }
                                                ?></p>
                        </div>
                        <div class="flex_car">
                            <div class="square_green"></div>
                            <p>公式HP：</p>
                        </div>
                        <p><?php
                            $official_website = get_field('course_url' . $i);
                            if (!empty($official_website)) {
                                echo '<a href="' . esc_url($official_website) . '" target="_blank" rel="noopener noreferrer">' . esc_html($official_website) . '</a>';
                            } else {
                                echo '公式HPはありません。';
                            }
                            ?>
                        </p>

                        <div class="flex greencar">
                            <div class="car_green"></div>
                            <p class="car_10">車で<?php the_field('move_time1_' . $i); ?></p>
                        </div>

                    <?php endfor; ?>

                </div>
            </div>
        </section>


        <!-- 宿泊 -->
        <div class="yellowgreen_square">
            <h4>本日のホテルと温泉</h4>
            <article class="card spa">
                <a href="<?php the_permalink(); ?>">
                    <div>
                        <span></span>
                        <?php if (has_post_thumbnail()) : the_post_thumbnail('medium'); ?>
                        <?php else : ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/noimage.png" alt="<?php echo $spot_name ?>">
                        <?php endif; ?>
                    </div>
                    <h3><?php echo $spot_name ?></h3>
                    <!-- 紹介文 -->
                    <p class="tx">
                        <?php echo $spot_description; ?>
                    </p>
                </a>
            </article>
        </div>

        <!-- DAY2 -->
        <section class="day2">
            <div class="flex">
                <h3 class="course_day margintop">DAY2</h3>
            </div>
            <div class="layer">
                <div class="time_schedule tb_only pc_only">
                    <div class="flow_design12">
                        <!-- 画面左側の開始時刻2日目の1～5-->
                        <ul class="flow12">
                            <?php for ($i = 1; $i <= 5; $i++) : ?>
                                <li>
                                    <p class="icon12"><?php the_field('start_time2_' . $i); ?><?php if ($i == 1) echo '<br>START'; ?></p>
                                </li>
                            <?php endfor; ?>
                        </ul>
                    </div>

                </div>

                <!-- 2 -->
                <div class="model_course1">

                    <?php for ($i = 1; $i <= 5; $i++) : ?>

                        <?php
                        //スポットのスラッグをを読み込む
                        $spot_slug = get_field('spot_1_' . $i);
                        if ($spot_slug != "") {

                            $type = substr($spot_slug, 0, 1);

                            // 該当スポットの詳細を所見込む
                            if ($type == "s") {
                                $spot_id = get_page_by_path($spot_slug, OBJECT, 'spa')->ID;
                            } else {
                                $spot_id = get_page_by_path($spot_slug, OBJECT, 'facility')->ID;
                            }
                            // 投稿ID
                            $spot_info = get_post($spot_id);

                            // print_r($spot_info);


                            $url = get_the_permalink($spot_id);

                            // print_r($spot_id);

                            if ($type == "s") {
                                // 温泉名
                                $spot_name = get_post_meta($spot_id, 'spa_name',  TRUE);
                                // 温泉紹介文
                                $spot_description = get_post_meta($spot_id, 'description',  TRUE);
                                // 温泉写真
                                $spot_pic = get_post_meta($spot_id, 'main_pic1',  TRUE);
                            } else {
                                // 施設名
                                $spot_name = get_post_meta($spot_id, 'facility_name',  TRUE);
                                // 施設紹介文
                                $spot_description = get_post_meta($spot_id, 'facility_description',  TRUE);
                                // 施設写真
                                $spot_pic = get_post_meta($spot_id, 'facility_pic1', TRUE);
                            }
                        }

                        ?>

                        <!-- 表示処理 -->

                        <div class="block">
                            <?php

                            // print_r($spot_description);
                            $img = wp_get_attachment_image_src($spot_pic, 'large')[0];

                            // print_r($img);

                            // $pic_url = $spot_pic['sizes']['large'];
                            ?>

                            <img src="<?php echo $img; ?>" alt="<?php the_title(); ?>">

                            <div class="square_white"></div>

                            <div class="flex_left">
                                <p class="time"><?php the_field('stay_time1_' . $i); ?></p>
                                <div>
                                    <!-- 温泉・周辺の名前 -->
                                    <h4><?php echo $spot_name ?></h4>
                                </div>
                            </div>
                            <p class="tx"><?php the_field('activity1_' . $i); ?></p>

                        </div>

                        <div class="flex_car">
                            <div class="square_green"></div>
                            <p class="car_tx"><?php
                                                $move_time = get_field('move_time1_' . $i);
                                                if ($i == 1) {
                                                    echo '徳島駅から車で' . esc_html($move_time);
                                                } else {
                                                    echo esc_html($move_time);
                                                }
                                                ?></p>
                        </div>
                        <div class="flex_car">
                            <div class="square_green"></div>
                            <p>公式HP：</p>
                        </div>
                        <p><?php
                            $official_website = get_field('course_url' . $i);
                            if (!empty($official_website)) {
                                echo '<a href="' . esc_url($official_website) . '" target="_blank" rel="noopener noreferrer">' . esc_html($official_website) . '</a>';
                            } else {
                                echo '公式HPはありません。';
                            }
                            ?>
                        </p>

                        <div class="flex greencar">
                            <div class="car_green"></div>
                            <p class="car_10">車で<?php the_field('move_time1_' . $i); ?></p>
                        </div>

                    <?php endfor; ?>

                </div>
            </div>
        </section>

        <!-- 関連店舗 -->
        <h5>今回の関連店舗はこちら</h5>
        <!-- カード -->
        <div class="article_all">

            <!-- バックボタン -->
            <?php
            // 現在のページのURLを取得
            $current_url = home_url(add_query_arg(array(), $wp->request));

            // リファラー(前のページ)のURLを取得
            $referer_url = wp_get_referer();

            // back_btnを表示するかどうかのフラグ
            $show_back_btn = false;

            // リファラーのURLが取得できた場合
            if ($referer_url) {
                // リファラーのURLとの比較
                if (strpos($referer_url, home_url()) !== false) {
                    // リファラーのURLがサイト内のURLだった場合
                    $back_url = $referer_url;
                    $show_back_btn = true;
                }
            }

            // back_btnを表示する場合のみ出力
            if ($show_back_btn) {
            ?>
                <button class="back_btn" onclick="window.location.href='<?php echo $back_url; ?>'">
                    <span><i class="fa-solid fa-arrow-left"></i>back</span>
                </button>
            <?php
            }
            ?>
        </div>
</main>

<!-- footer.phpを読み込む -->
<?php get_footer(); ?>

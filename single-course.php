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

                    <?php for ($i = 1, $j = 2; $i <= 5, $j <= 6; $i++, $j++) :
                    ?>
                        <?php
                        //スポットのスラッグを読み込む
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
                                $spot_pic = get_post_meta($spot_id, 'main_pic',  TRUE);
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

                            <a href="<?php echo $url ?>" target="_blank">
                                <img src="<?php echo $img; ?>" alt="<?php echo $spot_name ?>">
                            </a>

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

                        <div class="flex_car"><?php
                                                $move_time = get_field('move_time1_' . $i);
                                                if ($i == 1) {
                                                    echo '<div class="square_green"></div>'
                                                        . esc_html($move_time);
                                                }
                                                ?>
                        </div>

                        <div class="flex_car">
                            <div class="square_green"></div>
                            <p>公式HP：<?php
                                    $official_website = get_field('course_url' . $i);
                                    if (!empty($official_website)) {
                                        echo '<a href="' . esc_url($official_website) . '" target="_blank" rel="noopener noreferrer">' . esc_html($official_website) . '</a>';
                                    } else {
                                        echo '-';
                                    }
                                    ?></p>
                        </div>

                        <div class="flex greencar">
                            <div class="car_green"></div>
                            <p class="car_10">車で<?php the_field('move_time1_' . $j); ?></p>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
        </section>


        <!-- 宿泊 -->
        <!-- 1日目のラストから宿泊施設までの移動時間 -->
        <div class="yellowgreen_square">
            <h4>本日のホテルと温泉</h4>
            <article class="card spa">
                <a href="<?php echo $url ?>">
                    <div>
                        <span></span>
                        <?php if (has_post_thumbnail()) : the_post_thumbnail('medium'); ?>
                        <?php else : ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/noimage.jpg" alt="<?php echo $spot_name ?>">
                        <?php endif; ?>
                    </div>
                </a>
                <h3><?php echo $spot_name ?></h3>
                <!-- 紹介文 -->
                <p class="tx">
                    <?php echo $spot_description; ?>
                </p>
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


                <div class="model_course1">

                    <?php for ($i = 1; $i <= 5; $i++) : ?>

                        <?php
                        //スポットのスラッグをを読み込む
                        $spot_slug = get_field('spot_2_' . $i);
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
                            <div class="flex greencar">
                                <div class="car_green"></div>
                                <p class="car_10">車で<?php the_field('move_time2_' . $i); ?></p>
                            </div>
                            <?php

                            // print_r($spot_description);
                            $img = wp_get_attachment_image_src($spot_pic, 'large')[0];

                            // print_r($img);

                            // $pic_url = $spot_pic['sizes']['large'];
                            ?>

                            <img src="<?php echo $img; ?>" alt="<?php echo $spot_name ?>">

                            <div class="square_white"></div>

                            <div class="flex_left">
                                <p class="time"><?php the_field('stay_time2_' . $i); ?></p>
                                <div>
                                    <!-- 温泉・周辺の名前 -->
                                    <h4><?php echo $spot_name ?></h4>
                                </div>
                            </div>
                            <p class="tx"><?php the_field('activity2_' . $i); ?></p>
                        </div>

                        <div class="flex_car">
                            <div class="square_green"></div>
                            <p>公式HP：<?php
                                    $official_website = get_field('course_url2_' . $i);
                                    if (!empty($official_website)) {
                                        echo '<a href="' . esc_url($official_website) . '" target="_blank" rel="noopener noreferrer">' . esc_html($official_website) . '</a>';
                                    } else {
                                        echo '公式HPはありません。';
                                    }
                                    ?></p>
                        </div>

                    <?php endfor; ?>

                </div>
            </div>
        </section>

        <!-- 関連店舗 -->
        <h5>今回の関連店舗はこちら</h5>
        <!-- カード型 -->
        <div class="article_all">
            <?php
            // ループの回数を定義
            $loop_count = 4;

            // すべてのカスタム投稿タイプを取得
            $custom_post_types = get_post_types(array('_builtin' => false));

            for ($i = 1; $i <= $loop_count; $i++) {
                // カスタムフィールドの名前を生成
                $field_name = 'url' . $i;
                $slug = get_field($field_name); // ここにカスタムフィールドの値が入る

                if ($slug) {
                    // カスタムクエリで投稿を検索
                    $args = array(
                        'name' => $slug,
                        'post_type' => $custom_post_types,
                        'post_status' => 'publish',
                        'numberposts' => 1
                    );

                    $posts = get_posts($args);

                    if (!empty($posts)) {
                        $post = $posts[0]; // 最初の投稿を取得
                        setup_postdata($post);

                        // 投稿情報を取得
                        $post_id = $post->ID;
                        $post_title = get_the_title($post_id);
                        $post_link = get_permalink($post_id);
                        $post_thumbnail = get_the_post_thumbnail($post_id, 'full'); // フルサイズのアイキャッチ画像を取得
                        $post_type = get_post_type($post_id); // カスタム投稿タイプ名を取得
            ?>
                        <article class="card <?php echo esc_attr($post_type); ?>">
                            <a href="<?php echo esc_url($post_link); ?>">
                                <div>
                                    <span></span>
                                    <?php if ($post_thumbnail) : ?>
                                        <img src="<?php echo esc_url(get_the_post_thumbnail_url($post_id, 'full')); ?>" alt="<?php echo esc_attr($post_title); ?>" />
                                    <?php endif; ?>
                                </div>
                                <h3><?php echo esc_html($post_title); ?></h3>
                            </a>
                        </article>
            <?php
                        wp_reset_postdata();
                    }
                }
            }
            ?>

        </div>
        </section>

        <!-- 関連するコラム、お知らせ -->
        <section class="connection_column">
            <h5>関連コラム、情報
            </h5>
            <?php
            // カスタム投稿タイプ 'column' から投稿を取得
            // $args = array(
            //     'post_type' => 'column', // カスタム投稿タイプ 'column'
            //     'posts_per_page' => -1, // すべての投稿を取得
            // );
            // $column_query = new WP_Query($args);

            // if ($column_query->have_posts()) :
            //     while ($column_query->have_posts()) : $column_query->the_post();
            //         // アイキャッチ画像のURLを取得
            //         $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail'); // サムネイルサイズを小さく設定
            //         // 投稿の日付を取得
            //         $post_date = get_the_date('Y.m.d D H:i');
            //         // 投稿のタイトルを取得
            //         $post_title = get_the_title();
            //         // 投稿のパーマリンクを取得
            //         $post_permalink = get_permalink();
            //         // 投稿のタクソノミースラッグを取得
            //         $tags = get_the_terms(get_the_ID(), 'column_type');

            //
            //新しいロジック
            // ループの回数を定義
            // カスタムフィールドを4つ作ってるので4回設定
            $loop_count = 4;

            // すべてのカスタム投稿タイプを取得
            $custom_post_types = get_post_types(array('_builtin' => false));
            for ($i = 1; $i <= $loop_count; $i++) {
                // カスタムフィールドで設定したフィールド名＋カウントの数字
                // 重複しないようにcolumn∔1~4の形で設定
                $field_name = 'column' . $i;
                $slug = get_field($field_name); // ここにカスタムフィールドの値が入る

                if ($slug) {
                    // カスタムクエリで投稿を検索
                    $args = array(
                        'name' => $slug,
                        'post_type' => $custom_post_types,
                        'post_status' => 'publish',
                        'numberposts' => 1
                    );
                    $posts = get_posts($args);
                    if (!empty($posts)) { //記事があるとき
                        $post = $posts[0]; // 最初の投稿を取得
                        setup_postdata($post);
                        // 投稿情報を取得
                        $post_id = $post->ID;
                        // 投稿のタイトルを取得
                        $post_title = get_the_title($post_id);
                        // 投稿のパーマリンクを取得
                        $post_link = get_permalink($post_id);
                        // 投稿の日付を取得
                        $post_date = get_the_date('Y.m.d D H:i');
                        // アイキャッチ画像のURLを取得
                        $post_thumbnail = get_the_post_thumbnail_url($post_id, 'thumbnail');
                        // 投稿のタクソノミースラッグを取得
                        $tags = get_the_terms(get_the_ID(), 'column_type');
            ?>
                        <!-- ページ下部の関係コラム枠 -->
                        <article class="news_card news">
                            <!-- コラムへのリンク -->
                            <a href="<?php echo esc_url($post_link); ?>">
                                <!-- アイキャッチ取得 -->
                                <?php if ($post_thumbnail) : ?>
                                    <img src="<?php echo esc_url($post_thumbnail); ?>" alt="<?php echo esc_attr($post_title); ?>">
                                <?php endif; ?>
                            </a>
                            <div class="news_contents">
                                <a href="<?php echo esc_url($$post_link); ?>">
                                    <!-- 日付と時間 -->
                                    <p class="date fugaz-one-regular"><?php echo esc_html($post_date); ?></p>
                                    <!-- 記事タイトル -->
                                    <h6 class="title"><?php echo esc_html($post_title); ?></h6>
                                </a>
                                <!-- ハッシュタグ -->
                                <div class="hashtag_list">
                                    <?php if ($tags && !is_wp_error($tags)) : ?>
                                        <?php foreach ($tags as $tag) : ?>
                                            <a href="<?php echo esc_url(get_term_link($tag)); ?>" class="hashtag">#<?php echo esc_html($tag->name); ?></a>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </article>
            <?php
                        wp_reset_postdata();
                    } else {
                        // 記事が見つからない場合の代替メッセージを表示
                        echo '<p>コラム、情報はまだありません。</p>';
                    }
                }
            }
            ?>

    </div>
</main>

<!-- footer.phpを読み込む -->
<?php get_footer(); ?>

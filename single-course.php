<?php get_header(); ?>

<main class="pc_inner">
    <div class="container">

        <!-- コース名 -->
        <div class="flex">
            <h2 class="under_line"><?php the_title(); ?></h2>
        </div>

        <!-- パンくず -->
        <?php get_template_part('template-parts/breadcrumb'); ?>

        <!-- マップ -->
        <?php if (function_exists('get_field')) : ?>
            <?php if ($iframe_code = get_field('iframe')) : ?>
                <?php echo $iframe_code; ?>
            <?php else : ?>
                <p>地図が見つかりませんでした。</p>
            <?php endif; ?>
        <?php else : ?>
            <p>該当する地図が見つかりませんでした。</p>
        <?php endif; ?>

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
                        foreach ($terms as $term) {
            ?>
                            <span class="hashtag"><?php echo esc_html($term->name); ?></span>
            <?php }
                    }
                }
            }
            ?>
        </div>
        <!-- コースの説明 -->
        <div class="flex">
            <h3 class="course_day_summary">Summary</h3>
        </div>
        <p><?php the_field('course_description'); ?></p>


        <!-- 1日目・日帰り -->
        <section class="day1">
            <div class="flex">
                <h3 class="course_day">DAY1</h3>
            </div>

            <div class="layer">
                <div class="time_schedule tb_only pc_only">
                    <div class="flow_design12">
                        <ul class="flow12">
                            <!-- 開始時刻1～5 -->
                            <?php for ($i = 1; $i <= 5; $i++) : ?>
                                <?php if ($st = get_field('start_time1_' . $i)) : ?>
                                    <li>
                                        <p class="icon12"><?php echo $st; ?><?php if ($i == 1) echo '<br>START'; ?></p>
                                    </li>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </ul>
                    </div>
                </div>

                <!-- 施設ごとの呼び出し -->
                <div class="model_course1">
                    <?php for ($i = 1; $i <= 5; $i++) : ?>
                        <?php if ($spot_slug = get_field('spot_1_' . $i)) : ?>
                            <?php
                            $type = substr($spot_slug, 0, 1);
                            $spot_id = $type == 's' ? get_page_by_path($spot_slug, OBJECT, 'spa')->ID : get_page_by_path($spot_slug, OBJECT, 'facility')->ID;

                            if ($spot_id) :
                                $spot_info = get_post($spot_id);
                                $url = get_the_permalink($spot_id);

                                if ($type == 's') :
                                    $spot_name = get_post_meta($spot_id, 'spa_name', true);
                                    $spot_description = get_post_meta($spot_id, 'description', true);
                                    $spot_pic = get_post_meta($spot_id, 'main_pic', true);
                                else :
                                    $spot_name = get_post_meta($spot_id, 'facility_name', true);
                                    $spot_description = get_post_meta($spot_id, 'facility_description', true);
                                    $spot_pic = get_post_meta($spot_id, 'facility_pic1', true);
                                endif;
                            endif;
                            ?>

                            <!-- 移動時間 -->
                            <div class="flex_car">
                                <?php if ($i == 1) : ?>
                                    <?php if ($move_time = get_field('move_time1_' . $i)) : ?>
                                        <div class="square_green"></div><?php echo esc_html($move_time); ?>
                                    <?php endif; ?>
                                <?php else : ?>
                                    <?php if ($move_time_other = get_field('move_time1_' . $i)) : ?>
                                        <div class="flex greencar">
                                            <div class="car_green"></div>
                                            <p class="car_10">車で<?php echo esc_html($move_time_other); ?></p>
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>

                            <!-- 施設ごとの表示 -->
                            <div class="block">
                                <!-- 施設の写真を表示させてリンクをつなげる -->
                                <?php if ($img = wp_get_attachment_image_src($spot_pic, 'large')[0]) : ?>
                                    <a href="<?php echo esc_url($url); ?>" target="_blank">
                                        <img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($spot_name); ?>">
                                    </a>
                                <?php endif; ?>

                                <div class="square_white"></div>
                                <!-- 滞在時間1～5 -->
                                <div class="flex_left">
                                    <?php if ($stay_time = get_field('stay_time1_' . $i)) : ?>
                                        <p class="time"><?php echo esc_html($stay_time); ?></p>
                                    <?php endif; ?>

                                    <div>
                                        <h4><?php echo $spot_name; ?></h4>
                                    </div>
                                </div>
                                <p class="tx"><?php the_field('activity1_' . $i); ?></p>
                            </div>

                            <!-- 公式HPがあれば表示させる-->
                            <div class="flex_car">
                                <?php if ($official_website = get_field('course_url1_' . $i)) : ?>
                                    <p>
                                    <div class="square_green"></div>公式HP：<a href="<?php echo esc_url($official_website); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html($official_website); ?></a></p>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>
            </div>
        </section>

        <!-- 宿泊 -->
        <!-- 1日目のラストから宿泊施設までの移動時間 -->
        <?php
        // 宿泊のタクソノミーが選択されているかを確認
        if (has_term('stay-course', '宿泊')) : // 宿泊にチェックが入っていたら表示させる
            if ($url && $spot_name && $spot_description) : ?>
                <div class="yellowgreen_square">
                    <h4>本日のホテルと温泉</h4>
                    <article class="card spa">
                        <a href="<?php echo $url; ?>">
                            <div>
                                <span></span>
                                <?php if (has_post_thumbnail()) :
                                    the_post_thumbnail('medium');
                                else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/noimage.jpg" alt="<?php echo $spot_name; ?>">
                                <?php endif; ?>
                            </div>
                        </a>
                        <h3><?php echo $spot_name; ?></h3>
                        <!-- 紹介文 -->
                        <p class="tx">
                            <?php echo $spot_description; ?>
                        </p>
                    </article>
                </div>
            <?php endif; ?>
        <?php endif; ?>


        <!-- 2日目 -->
        <section class="day1">
            <?php
            $day2 = get_field('spot_2_1');
            if ($day2) : ?>
                <div class="flex">
                    <h3 class="course_day">DAY2</h3>
                </div>
            <?php endif; ?>


            <!-- 開始時刻2_1～5 -->
            <div class="layer">
                <div class="time_schedule tb_only pc_only">
                    <div class="flow_design12">
                        <ul class="flow12">
                            <?php for ($i = 1; $i <= 5; $i++) : ?>
                                <?php if ($st = get_field('start_time2_' . $i)) : ?>
                                    <li>
                                        <p class="icon12"><?php echo $st; ?><?php if ($i == 1) echo '<br>START'; ?></p>
                                    </li>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </ul>
                    </div>
                </div>

                <!-- 施設ごとの呼び出し -->
                <div class="model_course1">
                    <?php for ($i = 1; $i <= 5; $i++) : ?>
                        <?php if ($spot_slug = get_field('spot_2_' . $i)) : ?>
                            <?php
                            $type = substr($spot_slug, 0, 1);
                            $spot_id = $type == 's' ? get_page_by_path($spot_slug, OBJECT, 'spa')->ID : get_page_by_path($spot_slug, OBJECT, 'facility')->ID;

                            if ($spot_id) :
                                $spot_info = get_post($spot_id);
                                $url = get_the_permalink($spot_id);

                                if ($type == 's') :
                                    $spot_name = get_post_meta($spot_id, 'spa_name', true);
                                    $spot_description = get_post_meta($spot_id, 'description', true);
                                    $spot_pic = get_post_meta($spot_id, 'main_pic', true);
                                else :
                                    $spot_name = get_post_meta($spot_id, 'facility_name', true);
                                    $spot_description = get_post_meta($spot_id, 'facility_description', true);
                                    $spot_pic = get_post_meta($spot_id, 'facility_pic1', true);
                                endif;
                            endif;
                            ?>

                            <!-- 移動時間 -->
                            <div class="flex_car">
                                <?php ($move_time = get_field('move_time2_' . $i)); ?>
                                <div class="flex greencar">
                                    <div class="car_green"></div>
                                    <p class="car_10">車で<?php echo esc_html($move_time); ?></p>
                                </div>
                            </div>

                            <!-- 施設ごとの表示 -->
                            <div class="block">
                                <!-- 施設の写真を表示させてリンクをつなげる -->
                                <?php if ($img = wp_get_attachment_image_src($spot_pic, 'large')[0]) : ?>
                                    <a href="<?php echo esc_url($url); ?>" target="_blank">
                                        <img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($spot_name); ?>">
                                    </a>
                                <?php endif; ?>

                                <div class="square_white"></div>
                                <!-- 滞在時間1～5 -->
                                <div class="flex_left">
                                    <?php if ($stay_time = get_field('stay_time2_' . $i)) : ?>
                                        <p class="time"><?php echo esc_html($stay_time); ?></p>
                                    <?php endif; ?>

                                    <div>
                                        <h4><?php echo $spot_name; ?></h4>
                                    </div>
                                </div>
                                <p class="tx"><?php the_field('activity2_' . $i); ?></p>
                            </div>



                            <!--公式HPがあれば表示させる-->
                            <div class="flex_car">
                                <?php if ($official_website = get_field('course_url2_' . $i)) : ?>
                                    <p>
                                    <div class="square_green"></div>公式HP：<a href="<?php echo esc_url($official_website); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html($official_website); ?></a></p>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
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


        <!-- 関連するコラム、お知らせ -->
        <section class="connection_column">
            <?php
            // ループの回数を定義
            $loop_count = 4;

            // すべてのカスタム投稿タイプを取得
            $custom_post_types = get_post_types(array('_builtin' => false));

            // 投稿があるかどうかのフラグ
            $has_posts = false;

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
                        if (!$has_posts) {
                            $has_posts = true;
                            echo '<h5>こちらもいかがでしょうか？</h5>';
                            echo '<div class="article_all">';
                        }

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

            if ($has_posts) {
                echo '</div>';
            }
            ?>
        </section>

        <!-- 関連するコラム、お知らせ -->
        <section class="connection_column">
            <?php
            // カスタムフィールドを4つ作ってるので4回設定
            $loop_count = 4;

            // すべてのカスタム投稿タイプを取得
            $custom_post_types = get_post_types(array('_builtin' => false));

            // コラムがあるかどうかのフラグ
            $has_columns = false;

            for ($i = 1; $i <= $loop_count; $i++) {
                // カスタムフィールドで設定したフィールド名＋カウントの数字
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
                    if (!empty($posts)) {
                        if (!$has_columns) {
                            $has_columns = true;
                            echo '<h5>関連コラム、情報</h5>';
                        }

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
                                <a href="<?php echo esc_url($post_link); ?>">
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
                    }
                }
            }
            ?>
        </section>
    </div>
</main>

<!-- footer.phpを読み込む -->
<?php get_footer(); ?>

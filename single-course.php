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
                                <li>
                                    <p class="icon12"><?php the_field('start_time1_' . $i); ?><?php if ($i == 1) echo '<br>START'; ?></p>
                                </li>
                            <?php endfor; ?>
                        </ul>
                    </div>
                    <!-- スマホ版 -->
                </div>
                <div class="model_course1">


                    <?php for ($i = 1; $i <= 5; $i++) : ?>
                        <div class="block">
                            <a class="thumbnail" href="<?php the_field('spot_1_' . $i); ?>">
                                <?php
                                $som_thumb_id = get_post_thumbnail_id();
                                $som_thumb = wp_get_attachment_image_src($som_thumb_id, 'full'); ?>
                                <img src="<?php echo $som_thumb[0]; ?>" alt="<?php echo get_the_title(); ?>">
                            </a>

                            <h4><?php echo get_the_title(); ?></h4>
                            <!-- スポットの説明 -->
                            <p><?php the_excerpt(); ?></p>
                            </a>
                        </div>
                        <div class="clock"><?php the_field('start_time1_' . $i); ?><?php if ($i == 1) echo '<br>START'; ?></div>
                        <div class="square_white"></div>
                        <div class="flex_left">
                            <div class="time"><?php the_field('stay_time1_' . $i); ?></div>
                        </div>
                        <div class="flex_car">
                            <div class="square_green"></div>
                            <p class="car_tx">車で<?php the_field('move_time1_' . $i); ?></p>
                            <p>公式HP：
                                <?php
                                $official_website = get_field('course_url' . $i);
                                if (!empty($official_website)) {
                                    echo '<a href="' . esc_url($official_website) . '" target="_blank" rel="noopener noreferrer">' . esc_html($official_website) . '</a>';
                                } else {
                                    echo '公式HPはありません。';
                                }
                                ?>
                            </p>
                        </div>
                    <?php endfor; ?>

                    <!-- 宿泊 -->
                    <div class="yellowgreen_square">
                        <h4>本日のホテルと温泉</h4>
                        <article class="card pink">
                            <a href="<?php the_permalink(); ?>">
                                <div>
                                    <span></span>
                                    <?php if (has_post_thumbnail()) : the_post_thumbnail('medium'); ?>
                                    <?php else : ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/noimage.png" alt="<?php the_title(); ?>">
                                    <?php endif; ?>
                                </div>
                                <h3><?php the_title(); ?></h3>
                            </a>
                        </article>
                    </div>
                </div>
            </div>
        </section>

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
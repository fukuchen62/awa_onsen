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
                echo '地図が見つかりませんでした。';
            }
        } else {
            echo '該当する地図が見つかりませんでした。';
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
                    <div class="photo"><a href="<?php the_permalink(); ?>">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium'); ?>
                            <?php else : ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/noimage.png" alt="<?php the_title(); ?>">
                            <?php endif; ?>
                            <h4><?php the_title(); ?></h4>
                            <!-- スポットの説明 -->
                            <p><?php the_post_excerpt(); ?></p>
                        </a>
                    </div>

                    <div class="clock"><?php the_field('start_time1_1'); ?><br>START</div>
                    <div class="square_white"></div>
                    <div class="flex">
                        <div class="time"><?php the_field('stay_time1_1'); ?></div>
                    </div>

                    <div class="flex_car">
                        <div class="square_green"></div>
                        <p class="car_tx">徳島駅から車で<?php the_field('move_time1_1'); ?></p>
                    </div>
                    <div class="flex_car">
                        <div class="square_green"></div>
                        <p class="car_tx">公式HP：
                            <?php
                            // カスタムフィールドの値を取得
                            $official_website = get_field('course_url1');

                            // 公式HPがあれば、リンクを表示
                            if (!empty($official_website)) {
                                echo '<a href="' . esc_url($official_website) . '" target="_blank" rel="noopener noreferrer">' . esc_html($official_website) . '</a>';
                            } else {
                                // 公式HPがなければ、メッセージを表示
                                echo '<p>公式HPはありません。</p>';
                            }
                            ?></p>
                    </div>

                    <!-- 2 -->
                    <div class="flex">
                        <div class="car_green"></div>
                        <p class="car_10">車で<?php the_field('move_time1_2'); ?></p>
                    </div>
                    <div class="photo">
                        <div class="clock"><?php the_field('start_time1_2'); ?><br>START</div>
                    </div>
                    <div class="square_white"></div>
                    <div class="flex">
                        <div class="time"><?php the_field('stay_time1_2'); ?></div>
                        <div>

                        </div>
                    </div>
                    <p>
                        ここにテキストおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおここにテキストおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおお
                    </p>

                    <div class="flex_car">
                        <div class="square_green"></div>
                        <p class="car_tx">公式HP：<?php
                                                // カスタムフィールドの値を取得
                                                $official_website = get_field('course_url2');

                                                // 公式HPがあれば、リンクを表示
                                                if (!empty($official_website)) {
                                                    echo '<a href="' . esc_url($official_website) . '" target="_blank" rel="noopener noreferrer">' . esc_html($official_website) . '</a>';
                                                } else {
                                                    // 公式HPがなければ、メッセージを表示
                                                    echo '<p>公式HPはありません。</p>';
                                                }
                                                ?></p>
                    </div>

                    <!-- 3 -->
                    <div class="flex">
                        <div class="car_green"></div>
                        <p class="car_10">車で<?php the_field('move_time1_3'); ?></p>
                    </div>
                    <div class="photo">
                        <div class="clock"><?php the_field('start_time1_3'); ?><br>START</div>
                    </div>
                    <div class="square_white"></div>
                    <div class="flex">
                        <div class="time"><?php the_field('stay_time1_3'); ?></div>
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
                        <p class="car_tx">公式HP：<?php
                                                // カスタムフィールドの値を取得
                                                $official_website = get_field('course_url3');

                                                // 公式HPがあれば、リンクを表示
                                                if (!empty($official_website)) {
                                                    echo '<a href="' . esc_url($official_website) . '" target="_blank" rel="noopener noreferrer">' . esc_html($official_website) . '</a>';
                                                } else {
                                                    // 公式HPがなければ、メッセージを表示
                                                    echo '<p>公式HPはありません。</p>';
                                                }
                                                ?></p>
                    </div>

                    <!-- 4 -->
                    <div class="flex">
                        <div class="car_green"></div>
                        <p class="car_10">車で<?php the_field('move_time1_4'); ?></p>
                    </div>
                    <div class="photo">
                        <div class="clock"><?php the_field('start_time1_4'); ?><br>START</div>
                    </div>
                    <div class="square_white"></div>
                    <div class="flex">
                        <div class="time"><?php the_field('stay_time1_4'); ?></div>
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
                        <p class="car_tx">公式HP：<?php
                                                // カスタムフィールドの値を取得
                                                $official_website = get_field('course_url4');

                                                // 公式HPがあれば、リンクを表示
                                                if (!empty($official_website)) {
                                                    echo '<a href="' . esc_url($official_website) . '" target="_blank" rel="noopener noreferrer">' . esc_html($official_website) . '</a>';
                                                } else {
                                                    // 公式HPがなければ、メッセージを表示
                                                    echo '<p>公式HPはありません。</p>';
                                                }
                                                ?></p>
                    </div>

                    <!-- 5 -->
                    <div class="flex">
                        <div class="car_green"></div>
                        <p class="car_10">車で<?php the_field('move_time1_5'); ?></p>
                    </div>
                    <div class="photo">
                        <div class="clock"><?php the_field('start_time1_5'); ?><br>START</div>
                    </div>
                    <div class="square_white"></div>
                    <div class="flex">
                        <div class="time"><?php the_field('stay_time1_5'); ?></div>
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
                        <p class="car_tx">公式HP：<?php
                                                // カスタムフィールドの値を取得
                                                $official_website = get_field('course_url5');

                                                // 公式HPがあれば、リンクを表示
                                                if (!empty($official_website)) {
                                                    echo '<a href="' . esc_url($official_website) . '" target="_blank" rel="noopener noreferrer">' . esc_html($official_website) . '</a>';
                                                } else {
                                                    // 公式HPがなければ、メッセージを表示
                                                    echo '<p>公式HPはありません。</p>';
                                                }
                                                ?></p>
                    </div>

                    <!-- 宿泊 -->
                    <div class="yellowgreen_square">
                        <h4>本日のホテルと温泉</h4>
                        <article class="card pink">
                            <a href="<?php the_permalink(); ?>">
                                <div>
                                    <span></span>
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('medium'); ?>
                                    <?php else : ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/noimage.png" alt="<?php the_title(); ?>">
                                    <?php endif; ?>
                                </div>
                                <h3><?php the_title(); ?></h3>
                            </a>
                        </article>
                    </div>
        </section>

        <!-- DAY2 -->
        <section class="day2">
            <div class="flex">
                <h3 class="course_day">DAY2</h3>
            </div>
            <div class="layer">
                <div class="time_schedule tb_only pc_only">
                    <div class="flow_design12">
                        <!-- 開始時刻1～5 -->
                        <ul class="flow12">
                            <li>
                                <p class="icon12"><?php the_field('start_time2_1'); ?><br>START</p>
                            </li>

                            <li>
                                <p class="icon12"><?php the_field('start_time2_2'); ?></p>
                            </li>

                            <li>
                                <p class="icon12"><?php the_field('start_time2_3'); ?></p>
                            </li>

                            <li>
                                <p class="icon12"><?php the_field('start_time2_4'); ?></p>
                            </li>

                            <li>
                                <p class="icon12"><?php the_field('start_time2_5'); ?></p>
                            </li>
                        </ul>
                    </div>

                    <!-- 2日目 1 -->
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
                    <!-- カード型 -->
                    <article class="card orange">
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
                        ?>
                                    <article class="card">
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
                                } else {
                                    echo '<p>No posts found.</p>';
                                }
                            } else {
                                echo '<p>なし</p>';
                            }
                        }
                        ?>
        </section>
        <!-- 関連するコラム、お知らせ -->
        <section class="connection_column">
            <h5>関連コラム、情報
            </h5>
            <article class="news_card column">
                <a href="http://bzclass.bizan.com/adm/mainte.asp?comp_id=1&koza_id=92"><img src="../assets/images/bike.jpg" alt=""></a>
                <div class="news_cintents">
                    <a href="http://bzclass.bizan.com/adm/mainte.asp?comp_id=1&koza_id=92">
                        <p class="date fugaz-one-regular">2024.06.05.mon 10:00</p>
                        <h6 class="title">講習会管理システムのログイン画面にいきます！</h6>
                    </a>
                    <div class="hashtag_list">
                        <a href="https://fontawesome.com/" class="hashtag">#fontawesome</a>
                        <a href="https://cdnjs.com/" class="hashtag">#cdn</a>
                        <a href="https://tech-unlimited.com/color.html" class="hashtag">#ジェネレーター</a>
                    </div>
                </div>
            </article>
            <article class="news_card news">
                <a href="http://bzclass.bizan.com/adm/mainte.asp?comp_id=1&koza_id=92"><img src="../assets/images/bike.jpg" alt=""></a>
                <div class="news_cintents">
                    <a href="http://bzclass.bizan.com/adm/mainte.asp?comp_id=1&koza_id=92">
                        <p class="date fugaz-one-regular">2024.06.05.mon 10:00</p>
                        <h6 class="title">講習会管理システムのログイン画面にいきます！</h6>
                    </a>
                    <div class="hashtag_list">
                        <a href="https://fontawesome.com/" class="hashtag">#fontawesome</a>
                        <a href="https://cdnjs.com/" class="hashtag">#cdn</a>
                        <a href="https://tech-unlimited.com/color.html" class="hashtag">#ジェネレーター</a>
                    </div>
                </div>
            </article>
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

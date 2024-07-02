<!-- header.phpの読み込み -->
<?php get_header(); ?>

<main class="pc_inner">
    <div class="container">

        <!-- コース名 -->
        <div class="flex">
            <h2 class="under_line"><?php the_title(); ?></h2>
        </div>

        <!-- パンくずリスト -->
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
            $taxonomies = get_object_taxonomies($post_type); ?>

            <?php if (!empty($taxonomies)) : ?>
                <?php foreach ($taxonomies as $taxonomy) : ?>
                    <?php
                    // タクソノミーに関連するタームを取得
                    $terms = get_the_terms($post_id, $taxonomy);

                    if ($terms && !is_wp_error($terms)) :
                    ?>
                        <?php foreach ($terms as $term) : ?>
                            <span class="hashtag"><?php echo ($term->name); ?></span>
                        <?php endforeach; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <!-- 概要 -->
        <div class="summary mt48">
            <h3 class="lined-title">Summary</h3>
            <p>
                <?php the_field('course_description'); ?>
            </p>
        </div>

        <!-- 1日目 -->
        <h3 class="lined-title mt48">DAY1</h3>
        <div class="day">

            <!-- １日目の訪問場所 -->
            <div class="spot_list">
                <!-- カード型 -->
                <?php for ($i = 1; $i <= 5; $i++) : ?>
                    <?php if ($spot_slug = get_field('spot_1_' . $i)) : ?>
                        <article class="spot_card">
                            <?php if ($st = get_field('start_time1_' . $i)) : ?>
                                <div class="time sp_none">
                                    <?php echo $st; ?>
                                </div>
                            <?php endif; ?>
                            <div class="contents">
                                <?php
                                $type = substr($spot_slug, 0, 1);
                                $page = ($type == 's') ? get_page_by_path($spot_slug, OBJECT, 'spa') : get_page_by_path($spot_slug, OBJECT, 'facility');
                                $spot_id = $page ? $page->ID : null;

                                if ($spot_id) :
                                    $spot_info = get_post($spot_id);
                                    $url = get_the_permalink($spot_id);

                                    if ($type == 's') :
                                        $spot_name = get_post_meta($spot_id, 'spa_name', true);
                                        $spot_kana = get_post_meta($spot_id, 'spa_kana', true);
                                        $spot_description = get_post_meta($spot_id, 'description', true);
                                        $spot_pic = get_post_meta($spot_id, 'main_pic', true);
                                    else :
                                        $spot_name = get_post_meta($spot_id, 'facility_name', true);
                                        $spot_kana = get_post_meta($spot_id, 'facility_kana', true);
                                        $spot_description = get_post_meta($spot_id, 'facility_description', true);
                                        $spot_pic = get_post_meta($spot_id, 'facility_pic1', true);
                                    endif;
                                endif;
                                ?>

                                <!-- 画像 -->
                                <?php if ($spot_pic) : ?>
                                    <?php if ($img = wp_get_attachment_image_src($spot_pic, 'large')[0]) : ?>
                                        <a href="<?php echo esc_url($url); ?>" target="_blank">
                                            <img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($spot_name); ?>">
                                        </a>
                                    <?php else : ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/noimage.png" alt="<?php echo esc_attr($spot_name); ?>">
                                    <?php endif; ?>
                                <?php endif; ?>

                                <!-- スマホの開始時間 -->
                                <div class="sp_time">
                                    <?php if ($st = get_field('start_time1_' . $i)) : ?>
                                        <?php
                                        // <br>タグの位置を探す
                                        $br_pos = strpos($st, '<br>');
                                        // <br>タグが見つかった場合、その位置までの文字列を取得
                                        if ($br_pos !== false) {
                                            $st = substr($st, 0, $br_pos);
                                        }
                                        echo $st;
                                        ?>
                                    <?php endif; ?>
                                </div>


                                <!-- タイトル -->
                                <div class="ttl_list">
                                    <div class="duration">

                                        <?php if ($stay_time = get_field('stay_time1_' . $i)) : ?>
                                            <?php echo ($stay_time); ?>
                                        <?php endif; ?>

                                    </div>
                                    <h4><span><?php echo ($spot_kana); ?></span><?php echo ($spot_name); ?></h4>
                                </div>

                                <!-- 説明 -->
                                <p><?php the_field('activity1_' . $i); ?></p>

                                <!-- 移動時間 -->
                                <?php if ($move_time = get_field('move_time1_' . $i)) : ?>
                                    <?php if ($i >= 2) : ?>
                                        <p>車で<?php echo ($move_time); ?></p>
                                    <?php else : ?>
                                        <p><?php echo ($move_time); ?></p>
                                    <?php endif; ?>
                                <?php endif; ?>

                                <dl>
                                    <!-- 公式HPあれば表示 -->
                                    <dt>公式HP</dt>
                                    <dd>
                                        <?php
                                        $f_url_urls = get_field('course_url1_' . $i);
                                        if ($f_url_urls) {
                                            // URLをカンマで分割して配列に変換
                                            $urls = explode(',', $f_url_urls);
                                            $valid_urls = [];
                                            // 各URLを検証して、URLのみを配列に追加
                                            foreach ($urls as $url) {
                                                $trimmed_url = trim($url); // URLの前後の空白を除去
                                                if (!empty($trimmed_url) && filter_var($trimmed_url, FILTER_VALIDATE_URL)) {
                                                    $valid_urls[] = $trimmed_url;
                                                }
                                            }
                                            // 有効なURLがある場合はリンクとして表示、ない場合は「無し」を表示
                                            if (!empty($valid_urls)) {
                                                foreach ($valid_urls as $valid_url) {
                                                    echo '<a href="' . esc_url($valid_url) . '" target="_blank" rel="noopener noreferrer">' . esc_html($valid_url) . '</a><br>';
                                                }
                                            } else {
                                                echo '無し';
                                            }
                                        } else {
                                            echo '無し';
                                        }
                                        ?>
                                    </dd>
                                </dl>

                                <!-- 次に向かうスポットがあれば表示 -->
                                <p class="icon">車で１０分</p>

                            </div>
                        </article>
                    <?php endif; ?>
                <?php endfor; ?>
            </div>
        </div>

        <!-- 宿泊がある場合表示 -->
        <?php
        $stay_slug = get_field('spot_stay');

        if ($stay_slug) {
            $args = array(
                'name'        => $stay_slug,
                'post_type'   => 'spa',
                'post_status' => 'publish',
                'numberposts' => 1
            );

            $stay_post = get_posts($args);

            if ($stay_post) {
                $stay_post = $stay_post[0];
                $stay_url = get_permalink($stay_post->ID);
                $stay_name = get_the_title($stay_post->ID);
                $stay_description = get_field('description', $stay_post->ID);

                if ($stay_url && $stay_name && $stay_description) :
                    // 説明文の表示を200文字まで、続きがある場合は...
                    $short_description = mb_strimwidth($stay_description, 0, 200, '...'); ?>

                    <div class="hotel mt48">
                        <h3 class="lined-title">本日のホテルと温泉</h3>
                        <article class="card spa">
                            <a href="<?php echo esc_url($stay_url); ?>">
                                <div>
                                    <span></span>
                                    <?php if (has_post_thumbnail($stay_post->ID)) : ?>
                                        <?php $thumbnail_url = get_the_post_thumbnail_url($stay_post->ID, 'medium'); ?>
                                        <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php echo esc_attr(get_the_title($stay_post->ID)); ?>">
                                    <?php else : ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/noimage.png" alt="<?php echo esc_attr($stay_name); ?>">
                                    <?php endif; ?>
                                </div>
                                <h3><?php echo $stay_name; ?></h3>
                            </a>
                        </article>
                        <p><?php echo $short_description; ?></p>
                    </div>
                <?php endif; ?>
        <?php }
        } ?>

        <!-- 2日目がある場合訪問場所を表示 -->
        <?php if ($stay_slug) : ?>
            <h3 class="lined-title mt48">DAY2</h3>
            <div class="day">
                <!-- 2日目の訪問場所 -->
                <div class="spot_list">
                    <?php for ($i = 1; $i <= 5; $i++) : ?>
                        <?php if ($spot_slug = get_field('spot_2_' . $i)) : ?>
                            <article class="spot_card">
                                <?php if ($st = get_field('start_time2_' . $i)) : ?>
                                    <div class="time sp_none">
                                        <?php echo $st; ?>
                                    </div>
                                <?php endif; ?>
                                <div class="contents">
                                    <?php
                                    $type = substr($spot_slug, 0, 1);
                                    $page = ($type == 's') ? get_page_by_path($spot_slug, OBJECT, 'spa') : get_page_by_path($spot_slug, OBJECT, 'facility');
                                    $spot_id = $page ? $page->ID : null;

                                    if ($spot_id) :
                                        $spot_info = get_post($spot_id);
                                        $url = get_the_permalink($spot_id);

                                        if ($type == 's') :
                                            $spot_name = get_post_meta($spot_id, 'spa_name', true);
                                            $spot_kana = get_post_meta($spot_id, 'spa_kana', true);
                                            $spot_description = get_post_meta($spot_id, 'description', true);
                                            $spot_pic = get_post_meta($spot_id, 'main_pic', true);
                                        else :
                                            $spot_name = get_post_meta($spot_id, 'facility_name', true);
                                            $spot_kana = get_post_meta($spot_id, 'facility_kana', true);
                                            $spot_description = get_post_meta($spot_id, 'facility_description', true);
                                            $spot_pic = get_post_meta($spot_id, 'facility_pic1', true);
                                        endif;
                                    endif;
                                    ?>

                                    <!-- 画像 -->
                                    <?php if ($spot_pic) : ?>
                                        <?php if ($img = wp_get_attachment_image_src($spot_pic, 'large')[0]) : ?>
                                            <a href="<?php echo esc_url($url); ?>" target="_blank">
                                                <img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($spot_name); ?>">
                                            </a>
                                        <?php else : ?>
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/noimage.png" alt="<?php echo esc_attr($spot_name); ?>">
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <div class="sp_time">
                                        <?php if ($st = get_field('start_time2_' . $i)) : ?>
                                            <?php
                                            // <br>タグの位置を探す
                                            $br_pos = strpos($st, '<br>');
                                            // <br>タグが見つかった場合、その位置までの文字列を取得
                                            if ($br_pos !== false) {
                                                $st = substr($st, 0, $br_pos);
                                            }
                                            echo $st;
                                            ?>
                                        <?php endif; ?>
                                    </div>


                                    <!-- タイトル -->
                                    <div class="ttl_list">
                                        <div class="duration">
                                            <?php if ($stay_time = get_field('stay_time2_' . $i)) : ?>
                                                <?php echo ($stay_time); ?>
                                            <?php endif; ?>
                                        </div>
                                        <h4><span><?php echo ($spot_kana); ?></span><?php echo ($spot_name); ?></h4>
                                    </div>

                                    <!-- 説明 -->
                                    <p><?php the_field('activity2_' . $i); ?></p>


                                    <!-- 移動時間 -->
                                    <?php if ($move_time = get_field('move_time2_' . $i)) : ?>
                                        <?php if ($i >= 2) : ?>
                                            <p>車で<?php echo ($move_time); ?></p>
                                        <?php else : ?>
                                            <p><?php echo ($move_time); ?></p>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <dl>
                                        <!-- 公式HPあれば表示 -->
                                        <?php if ($official_website = get_field('course_url2_' . $i)) : ?>
                                            <dt>公式HP</dt>
                                            <dd><a href="<?php echo esc_url($official_website); ?>" target="_blank" rel="noopener noreferrer"><?php echo ($official_website); ?></a></dd>
                                        <?php endif; ?>
                                    </dl>
                                </div>
                            </article>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>
            </div>
        <?php endif; ?>


        <!-- 関連の温泉、周辺施設 -->
        <section class="recommend">
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
                                    <?php else : ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/noimage.png" alt="<?php the_title(); ?>" />
                                    <?php endif; ?>
                                </div>
                                <h3><?php echo ($post_title); ?></h3>
                            </a>
                        </article>
            <?php
                        wp_reset_postdata();
                    }
                }
            }
            // 投稿がない場合レイアウトが崩れるのでsectionごと非表示
            if ($has_posts) {
                echo '</div>'; // .article_allを閉じる
            } else {
                echo '<style>section.recommend { display: none; }</style>';
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
                        $post_date = get_post_time('Y.m.d D H:i');
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
                                <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/noimage.png" alt="<?php the_title(); ?>" />
                                <?php endif; ?>
                            </a>
                            <div class="news_contents">
                                <a href="<?php echo esc_url($post_link); ?>">
                                    <!-- 日付と時間 -->
                                    <p class="date fugaz-one-regular"><?php echo ($post_date); ?></p>
                                    <!-- 記事タイトル -->
                                    <h6 class="title"><?php echo ($post_title); ?></h6>
                                </a>
                                <!-- ハッシュタグ -->
                                <div class="hashtag_list">
                                    <?php if ($tags && !is_wp_error($tags)) : ?>
                                        <?php foreach ($tags as $tag) : ?>
                                            <span class="hashtag"><?php echo ($tag->name); ?></span>
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
            // 投稿がない場合レイアウトが崩れるのでsectionごと非表示
            if (!$has_columns) {
                echo '<style>section.connection_column { display: none; }</style>';
            }
            ?>
        </section>

        <!-- 一覧に戻るボタン -->
        <?php
        // 現在の投稿のタームを取得
        $terms = get_the_terms(get_the_ID(), 'course_type');
        $term_slug = '';
        if ($terms && !is_wp_error($terms)) {
            // 最初のタームのスラッグを取得
            $term_slug = $terms[0]->slug;
        }
        ?>
        <button class="back_btn" onclick="window.location.href='<?php echo home_url('course_type/' . $term_slug . '/'); ?>'">
            <span><i class="fa-solid fa-arrow-left"></i>一覧へ</span>
        </button>
    </div>
</main>

<!-- footer.phpを読み込む -->
<?php get_footer(); ?>

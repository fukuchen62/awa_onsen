<!-- header.phpを読み込む -->
<?php get_header(); ?>

<main class="container">
    <!-- タイトル -->
    <h3><?php the_title(); ?></h3>

    <!-- パンくずリスト -->
    <?php get_template_part('template-parts/breadcrumb') ?>
    <!-- タグ -->
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
    };
    ?>

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
                    };
                    ?>"></iframe>

    <!-- ※コースの説明欄が欲しいです→依頼済み0605 -->

    <!-- DAY1 -->
    <section class="day1">
        <h2 class="course_day">DAY1</h2>

        <img src="" alt="写真１">
        <div class="course_num">1</div>
        <h4 class="course_ttl"><?php echo the_field('spot_1_1'); ?></h4>
        <p><?php echo the_field('activity1_1'); ?></p>
        <div class="course_car"><img src="" alt="">車で<?php echo the_field('move_time1_1'); ?></div>

        <!-- 開始時間と滞在時間を別途表示させる欄をお願いする？それとも活動内容？→依頼済み0605 -->


        <img src="" alt="写真２">
        <div class="course_num">2</div>
        <h4 class="course_ttl">映えスポットでゆったり♪</h4>
        <p>ここにテキストおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおお</p>
        <div class="course_car"><img src="" alt="">車で５分</div>

        <img src="" alt="写真３">
        <div class="course_num">3</div>
        <h4 class="course_ttl">温泉で一日の疲れを癒す</h4>
        <p>ここにテキストおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおお</p>

        <span></span>
        <h4 class="course_onsen">本日のホテルと温泉</h4>
        <img src="" alt="ホテル・温泉写真">
        <p>ここにテキストおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおお</p>
        <img src="" alt="ホテル・温泉写真">
        <p>ここにテキストおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおお</p>
    </section>
    <!-- DAY2 -->
    <section class="day2">
        <h2 class="course_day">DAY2</h2>
        <img src="" alt="写真１">
        <div class="course_num">1</div>
        <h4 class="course_ttl">まずは腹ごしらえ！！</h4>
        <p>ここにテキストおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおお</p>
        <div class="course_car"><img src="" alt="">車で５分</div>
        <img src="" alt="写真２">
        <div class="course_num">2</div>
        <h4 class="course_ttl">映えスポットでゆったり♪</h4>
        <p>ここにテキストおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおお</p>
        <div class="course_car"><img src="" alt="">車で５分</div>
        <img src="" alt="写真３">
        <div class="course_num">3</div>
        <h4 class="course_ttl">映えスポットでゆったり♪</h4>
        <p>ここにテキストおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおお</p>
    </section>

    <section>
        <h5>関連リンク</h5>
        <?php // スラッグ名を指定
        $slug = 'cou01'; // ここにカスタムフィールドの値が入る

        // すべてのカスタム投稿タイプを取得
        $custom_post_types = get_post_types(array('_builtin' => false));

        // カスタムクエリで投稿を検索
        $args = array(
            'name'        => $slug,
            'post_type'   => $custom_post_types,
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

            // 投稿情報を表示
            if ($post_thumbnail) {
                echo '<a href="' . esc_url($post_link) . '">' . $post_thumbnail . '</a>';
            }
            echo '<h1><a href="' . esc_url($post_link) . '">' . esc_html($post_title) . '</a></h1>';


            wp_reset_postdata();
        };
        ?>
    </section>
</main>
<!-- footer.phpを読み込む -->
<?php get_footer(); ?>

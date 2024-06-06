<!-- header.phpを読み込む -->
<?php get_header(); ?>

<main class="container">
    <h2 class="under_line"><?php the_title(); ?></h2>
    <!-- パンくず -->
    <?php get_template_part('template-parts/breadcrumb') ?>
    <!-- 外観写真 -->
    <div class="img_box">
        <?php
        $pic = get_field('main_pic');
        $pic_url = $pic['sizes']['large'];
        ?>
        <img src="<?php echo $pic_url; ?>" alt="メイン画像">
        <!-- <img src="<?php echo get_template_directory_uri() ?> . /assets/images/onsen_img.jpg" alt="" /> -->
        <div class="favorite_btn"><i class="fa-regular fa-heart"></i></div>
        <div class="nice_btn"><i class="fa-regular fa-thumbs-up"></i></div>
    </div>


    <!-- ハッシュタグ -->

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

    <!-- 温泉紹介 -->
    <section>
        <h4 class="lined-title">温泉の紹介</h4>
        <?php the_field('description'); ?>
    </section>
    <div class="other_img">
        <ul class="slider">
            <li class="slider-img">
                <?php
                $pic = get_field('spa_pic1');
                $pic_url = $pic['sizes']['large'];
                ?>
                <img src="<?php echo $pic_url; ?>" alt="スライド画像1">
                <!-- <img src="<?php echo get_template_directory_uri() ?> . /assets/images/sauna_saru.jpg" alt="" /> -->
            </li>
            <li class="slider-img">
                <?php
                $pic = get_field('spa_pic2');
                $pic_url = $pic['sizes']['large'];
                ?>
                <img src="<?php echo $pic_url; ?>" alt="スライド画像2">
            </li>
            <li class="slider-img">
                <?php
                $pic = get_field('spa_pic3');
                $pic_url = $pic['sizes']['large'];
                ?>
                <img src="<?php echo $pic_url; ?>" alt="スライド画像3">
                <!-- <img src="<?php echo get_template_directory_uri() ?> . /assets/images/river.jpg" alt="" /> -->
            </li>
            <li class="slider-img">
                <?php
                $pic = get_field('spa_pic4');
                $pic_url = $pic['sizes']['large'];
                ?>
                <img src="<?php echo $pic_url; ?>" alt="スライド画像4">
                <!-- <img src="<?php echo get_template_directory_uri() ?> . /assets/images/test.png" alt="" /> -->
            </li>
        </ul>
        <ul class="thumbnail">
            <li class="thumbnail-img">
                <?php
                $pic = get_field('spa_pic1');
                $pic_url = $pic['sizes']['thumbnail'];
                ?>
                <img src="<?php echo $pic_url; ?>" alt="サムネイル画像1">
                <!-- <img src="<?php echo get_template_directory_uri() ?> . /assets/images/sauna_saru.jpg" alt="" /> -->
            </li>
            <li class="thumbnail-img">
                <?php
                $pic = get_field('spa_pic2');
                $pic_url = $pic['sizes']['thumbnail'];
                ?>
                <img src="<?php echo $pic_url; ?>" alt="サムネイル画像2">
                <!-- <img src="<?php echo get_template_directory_uri() ?> . /assets/images/onsen_img.jpg" alt="" /> -->
            </li>
            <li class="thumbnail-img">
                <?php
                $pic = get_field('spa_pic3');
                $pic_url = $pic['sizes']['thumbnail'];
                ?>
                <img src="<?php echo $pic_url; ?>" alt="サムネイル画像3">
                <!-- <img src="<?php echo get_template_directory_uri() ?> . /assets/images/river.jpg" alt="" /> -->
            </li>
            <li class="thumbnail-img">
                <?php
                $pic = get_field('spa_pic4');
                $pic_url = $pic['sizes']['thumbnail'];
                ?>
                <img src="<?php echo $pic_url; ?>" alt="サムネイル画像4">
                <!-- <img src="<?php echo get_template_directory_uri() ?> . /assets/images/test.png" alt="" /> -->
            </li>
        </ul>
    </div>
    <section>
        <h4 class="lined-title">温泉の水の性質は？</h4>
        <?php the_field('spa_description'); ?>
    </section>
    <section class="museum_map">
        <h4 class="lined-title">館内マップ</h4>
        <?php
        $pic = get_field('house_map');

        // 画像が設定されているかを確認
        if ($pic && isset($pic['sizes']['large'])) {
            $pic_url = $pic['sizes']['large'];
        ?>
            <img src="<?php echo esc_url($pic_url); ?>" alt="館内マップ">
        <?php
        } else {
            // 画像がない場合は代わりに他のコンテンツを表示するなどの処理を追加できます
            echo '<p>館内マップは現在利用できません。</p>';
        }
        ?>
        <!-- <img src="<?php echo get_template_directory_uri() ?> . /assets/images/bike.jpg" alt="" /> -->
    </section>
    <section class="basic_information">
        <h4 class="lined-title">基本情報</h4>
        <dl>
            <dt>営業時間</dt>
            <dd>
                <table>
                    <tr>
                        <th>基本</th>
                        <td><?php the_field('business_time'); ?></td>
                    </tr>
                    <tr>
                        <th>定休日</th>
                        <td><?php the_field('closed'); ?></td>
                    </tr>
                    <!-- <tr>
                                <th>冬季特別</th>
                                <td>6:00~23:00</td>
                            </tr> -->
                </table>
            </dd>
            <dt>基本料金</dt>
            <dd>
                <?php the_field('price'); ?>
            </dd>
            <dt>決済方法</dt>
            <dd>
                <?php the_field('payment_description'); ?>
            </dd>
            <dt>予約</dt>
            <dd>
                <?php the_field('reserve_description'); ?>
            </dd>
            <dt>トイレ</dt>
            <dd>
                <?php the_field('toilet_description'); ?>
            </dd>
            <dt>分煙</dt>
            <dd>
                <?php the_field('smoking_description'); ?>
            </dd>
            <dt>駐車場</dt>
            <dd>
                <?php the_field('parking_description'); ?>
            </dd>
            <dt>Wi-Fi</dt>
            <dd>
                <?php the_field('wifi_description'); ?>
            </dd>
            <dt>浴室小物</dt>
            <dd>
                <?php the_field('facility'); ?>
            </dd>
            <dt>住所</dt>
            <dd>
                <?php the_field('address1'); ?>
            </dd>
            <dt>TEL</dt>
            <dd>
                <?php the_field('tel'); ?>
            </dd>
            <dt>FAX</dt>
            <dd>
                <?php the_field('fax'); ?>
            </dd>
            <dt>Email</dt>
            <dd>
                <?php the_field('email'); ?>
            </dd>
            <dt>最寄り駅</dt>
            <dd>
                <?php the_field('station'); ?>
            </dd>
            <dt>SNS</dt>
            <dd>
                <?php the_field('sns_url'); ?>
            </dd>
            <dt>備考</dt>
            <dd class="test">
                夏季と冬季によって営業時間が異なります。<br>詳細は公式HPよりご確認ください
            </dd>
            <dt>公式ホームページ</dt>
            <dd><a href="<?php the_field('official_url'); ?>"><?php echo get_field('official_url') ?></a></dd>
        </dl>
    </section>
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
    <ul class="icon_list">
        <!-- <?php if (get_field('cash')) : ?>
            <li>
                <span class="material-symbols-outlined">currency_yen</span>
                <p>現金</p>
            </li>
        <?php endif; ?>
        <?php if (get_field('credit')) : ?>
            <li>
                <span class="material-symbols-outlined">credit_card</span>
                <p>クレジット</p>
            </li>
        <?php endif; ?>
        <?php if (get_field('e_money')) : ?>
            <li>
                <span class="material-symbols-outlined">qr_code_2</span>
                <p>電子マネー</p>
            </li>
        <?php endif; ?> -->
        <?php if (get_field('reserve')) : ?>
            <li>
                <span class="material-symbols-outlined">calendar_month</span>
                <p>事前予約</p>
            </li>
        <?php endif; ?>
        <?php if (get_field('sauna')) : ?>
            <li>
                <span class="material-symbols-outlined">sauna</span>
                <p>サウナ</p>
            </li>
        <?php endif; ?>
        <?php if (get_field('lodging')) : ?>
            <li>
                <span class="material-symbols-outlined">hotel</span>
                <p>宿泊</p>
            </li>
        <?php endif; ?>
        <?php if (get_field('wifi')) : ?>
            <li>
                <span class="material-symbols-outlined">wifi</span>
                <p>Wi-Fi</p>
            </li>
        <?php endif; ?>
        <?php if (get_field('smoking')) : ?>
            <li>
                <span class="material-symbols-outlined">smoking_rooms</span>
                <p>喫煙所</p>
            </li>
        <?php endif; ?>
        <?php if (get_field('parking')) : ?>
            <li>
                <span class="material-symbols-outlined">local_parking</span>
                <p>駐車場</p>
            </li>
        <?php endif; ?>
    </ul>
    <section>
        <h3>こちらもいかがでしょうか？</h3>
        <!-- <?php
                // スラッグ名を指定
                // $slug = 'facility_url'; // ここにカスタムフィールドの値が入る
                // $slug = 'play_url'; // ここにカスタムフィールドの値が入る
                // $slug = 'shopping_url'; // ここにカスタムフィールドの値が入る
                // $slug = 'rest_url'; // ここにカスタムフィールドの値が入る
                // $slug = 'course_url'; // ここにカスタムフィールドの値が入る
                // $slug = 'column_url'; // ここにカスタムフィールドの値が入る
                // すべてのカスタム投稿タイプを取得
                $custom_post_types = get_post_types(array('_builtin' => false));

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

                    // 投稿情報を表示
                    if ($post_thumbnail) {
                        echo '<a href="' . esc_url($post_link) . '">' . $post_thumbnail . '</a>';
                    }
                    echo '<h1><a href="' . esc_url($post_link) . '">' . esc_html($post_title) . '</a></h1>';


                    wp_reset_postdata();
                }
                ?> -->

    </section>

</main>



<!-- footer.phpを読み込む -->
<?php get_footer(); ?>

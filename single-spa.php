<!-- header.phpを読み込む -->
<?php get_header(); ?>

<main class="pc_inner">
    <div class="container">
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
            <!-- 後でこちらの画像に紐づけるか、新しくコード作りたい -->
            <!-- <label class="checkbox-item">
                <input type="checkbox" name="options" value="nice" />
                <span class="nice_btn">
                    <i class="fa-regular fa-thumbs-up"></i><br />
                    <span>11</span>
                </span>
            </label> -->
            <!-- 後でこちらの画像に紐づけるか、新しくコード作りたい -->
            <!-- <label class="checkbox-item">
                <input type="checkbox" name="options" value="favorite" />
                <span class="favorite_btn"><i class="fa-solid fa-heart"></i> <i class="fa-regular fa-heart"></i></span> -->

            <!-- お気に入りプラグイン -->
            <div class="favorite-button">
                <?php the_favorites_button(); ?>
            </div>

            </label>
        </div>


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
                            <span class="hashtag">
                                <?php echo ($term->name); ?>
                            </span>
            <?php
                        }
                    }
                }
            }
            ?>
        </div>

        <!-- 温泉紹介 -->
        <section class="spa_detail">
            <h4 class="lined-title">温泉の紹介</h4>
            <p><?php the_field('description'); ?></p>
            <div class="other_img">
                <ul class="slider">
                    <?php if ($pic = get_field('spa_pic1')) : ?>
                        <?php $pic_url = $pic['sizes']['large']; ?>
                        <?php if ($pic_url) : ?>
                            <li class="slider-img">
                                <img src="<?php echo esc_url($pic_url); ?>" alt="スライダー画像1">
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if ($pic = get_field('spa_pic2')) : ?>
                        <?php $pic_url = $pic['sizes']['large']; ?>
                        <?php if ($pic_url) : ?>
                            <li class="slider-img">
                                <img src="<?php echo esc_url($pic_url); ?>" alt="スライダー画像2">
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if ($pic = get_field('spa_pic3')) : ?>
                        <?php $pic_url = $pic['sizes']['large']; ?>
                        <?php if ($pic_url) : ?>
                            <li class="slider-img">
                                <img src="<?php echo esc_url($pic_url); ?>" alt="スライダー画像3">
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if ($pic = get_field('spa_pic4')) : ?>
                        <?php $pic_url = $pic['sizes']['large']; ?>
                        <?php if ($pic_url) : ?>
                            <li class="slider-img">
                                <img src="<?php echo esc_url($pic_url); ?>" alt="スライダー画像4">
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>
                </ul>

                <ul class="thumbnail">
                    <?php if ($pic = get_field('spa_pic1')) : ?>
                        <?php $pic_url = $pic['sizes']['thumbnail']; ?>
                        <?php if ($pic_url) : ?>
                            <li class="thumbnail-img">
                                <img src="<?php echo esc_url($pic_url); ?>" alt="サムネイル画像1">
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if ($pic = get_field('spa_pic2')) : ?>
                        <?php $pic_url = $pic['sizes']['thumbnail']; ?>
                        <?php if ($pic_url) : ?>
                            <li class="thumbnail-img">
                                <img src="<?php echo esc_url($pic_url); ?>" alt="サムネイル画像2">
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if ($pic = get_field('spa_pic3')) : ?>
                        <?php $pic_url = $pic['sizes']['thumbnail']; ?>
                        <?php if ($pic_url) : ?>
                            <li class="thumbnail-img">
                                <img src="<?php echo esc_url($pic_url); ?>" alt="サムネイル画像3">
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if ($pic = get_field('spa_pic4')) : ?>
                        <?php $pic_url = $pic['sizes']['thumbnail']; ?>
                        <?php if ($pic_url) : ?>
                            <li class="thumbnail-img">
                                <img src="<?php echo esc_url($pic_url); ?>" alt="サムネイル画像4">
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>
                </ul>
            </div>
        </section>

        <section>
            <h4 class="lined-title">温泉の水の性質は？</h4>
            <p><?php the_field('spa_description'); ?></p>
        </section>

        <?php
        $pic = get_field('house_map');
        // 画像が設定されているかを確認 ない場合はsectionごと表示しない。
        if ($pic && isset($pic['sizes']['large'])) {
            $pic_url = $pic['sizes']['large'];
        ?>
            <section class="museum_map">
                <h4 class="lined-title">館内マップ</h4>
                <img src="<?php echo esc_url($pic_url); ?>" alt="館内マップ">
            </section>
        <?php
        }
        ?>

        </section>
        <section class="basic_information">
            <h4 class="lined-title">基本情報</h4>
            <dl>
                <dt>営業時間</dt>
                <dd>
                    <table>
                        <tr>
                            <th>基本</th>
                            <td>
                                <?php the_field('business_time'); ?>
                            </td>
                        </tr>
                        <tr>
                            <th>定休日</th>
                            <td>
                                <?php the_field('closed'); ?>
                            </td>
                        </tr>
                    </table>
                </dd>
                <dt>基本料金</dt>
                <dd>
                    <?php the_field('price'); ?>
                </dd>
                <dt>住所</dt>
                <dd>
                    <?php the_field('address1'); ?>
                    <?php the_field('address2'); ?>
                </dd>
                <dt>TEL</dt>
                <dd>
                    <?php the_field('tel'); ?>
                </dd>
                <dt>FAX</dt>
                <dd>
                    <?php the_field('fax'); ?>
                </dd>
                <dt>SNS</dt>
                <dd class="url">
                    <a href="<?php the_field('sns_url'); ?>" target="_blank">
                        <?php echo get_field('sns_url') ?>
                    </a>
                </dd>
                <dt>公式ホームページ</dt>
                <dd class="url">
                    <a href="<?php the_field('official_url'); ?>" target="_blank">
                        <?php echo get_field('official_url') ?>
                    </a>
                </dd>
                <dt>駐車場</dt>
                <dd>
                    <?php the_field('parking_description'); ?>
                </dd>
                <dt>最寄り駅</dt>
                <dd>
                    <?php the_field('station'); ?>
                </dd>
                <dt>決済方法</dt>
                <dd>
                    <?php the_field('payment_description'); ?>
                </dd>
                <dt>浴室小物</dt>
                <dd>
                    <?php the_field('facility'); ?>
                </dd>

                <!-- ========== 不要と感じたのでコメントアウトしました ========== -->
                <!-- <dt>予約</dt>
                <dd>
                    <?php echo nl2br((get_field('reserve_description'))); ?>
                </dd> -->
                <!-- <dt>トイレ</dt>
                <dd>
                    <?php echo nl2br((get_field('toilet_description'))); ?>
                </dd> -->
                <!-- <dt>分煙</dt>
                <dd>
                    <?php echo nl2br((get_field('smoking_description'))); ?>
                </dd> -->
                <!-- <dt>Wi-Fi</dt>
                <dd>
                    <?php echo nl2br((get_field('wifi_description'))); ?>
                </dd> -->
                <!-- <dt>Email</dt>
                <dd>
                    <?php echo nl2br((get_field('email'))); ?>
                </dd> -->
                <!-- ==================== -->
            </dl>
        </section>

        <ul class="icon_list">
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

            <!-- ========== バックエンド班へ。追加しました ========== -->
            <?php if (get_field('toilet')) : ?>
                <li>
                    <span class="material-symbols-outlined">wc</span>
                    <p>トイレ</p>
                </li>
            <?php endif; ?>
            <!-- ==================== -->
        </ul>
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

        <section class="recommend">
            <?php
            // ループの回数を定義
            $loop_count = 6;

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
                        <article class="card spa <?php echo esc_attr($post_type); ?>">
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
            ?>

        </section>

        <button class="back_btn" onclick="window.location.href='<?php echo home_url('/spa/'); ?>'">
            <span><i class="fa-solid fa-arrow-left"></i>back</span>
        </button>

    </div>
</main>

<!-- footer.phpを読み込む -->
<?php get_footer(); ?>

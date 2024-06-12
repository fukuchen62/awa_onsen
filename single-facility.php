<!-- header.phpを読み込む -->
<?php get_header(); ?>

<main class="pc_inner">
    <div class="container">
        <h2 class="under_line"><?php the_title(); ?></h2>

        <!-- パンくず -->
        <?php get_template_part('template-parts/breadcrumb') ?>

        <!-- 外観写真 -->
        <div class="img_box">
            <ul class="slider">
                <?php if ($pic = get_field('facility_pic1')) : ?>
                    <?php $pic_url = $pic['sizes']['medium']; ?>
                    <?php if ($pic_url) : ?>
                        <li class="slider-img">
                            <img src="<?php echo esc_url($pic_url); ?>" alt="周辺施設画像1">
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if ($pic = get_field('facility_pic2')) : ?>
                    <?php $pic_url = $pic['sizes']['medium']; ?>
                    <?php if ($pic_url) : ?>
                        <li class="slider-img">
                            <img src="<?php echo esc_url($pic_url); ?>" alt="周辺施設画像2">
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if ($pic = get_field('facility_pic3')) : ?>
                    <?php $pic_url = $pic['sizes']['medium']; ?>
                    <?php if ($pic_url) : ?>
                        <li class="slider-img">
                            <img src="<?php echo esc_url($pic_url); ?>" alt="周辺施設画像3">
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if ($pic = get_field('facility_pic4')) : ?>
                    <?php $pic_url = $pic['sizes']['medium']; ?>
                    <?php if ($pic_url) : ?>
                        <li class="slider-img">
                            <img src="<?php echo esc_url($pic_url); ?>" alt="周辺施設画像4">
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if ($pic = get_field('facility_pic5')) : ?>
                    <?php $pic_url = $pic['sizes']['medium']; ?>
                    <?php if ($pic_url) : ?>
                        <li class="slider-img">
                            <img src="<?php echo esc_url($pic_url); ?>" alt="周辺施設画像5">
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
            </ul>
            <!-- 後でこちらの画像に紐づけるか、新しくコード作りたい -->
            <!-- <label class="checkbox-item">
                <input type="checkbox" name="options" value="nice" />
                <span class="nice_btn">
                    <i class="fa-regular fa-thumbs-up"></i><br />
                    <span>11</span>
                </span>
            </label>
            <label class="checkbox-item">
                <input type="checkbox" name="options" value="favorite" />
                <span class="favorite_btn"><i class="fa-solid fa-heart"></i> <i class="fa-regular fa-heart"></i></span> -->

            <!-- お気に入りプラグイン -->
            <div class="favorite-button">
                <?php the_favorites_button(); ?>
            </div>
            </label>
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
            ?>
                            <a href="" class="hashtag"><?php echo esc_html($term->name); ?></a>
            <?php
                        }
                        echo '</ul>';
                    }
                }
            }
            ?>
        </div>
        <section class="shop_information">
            <h3 class="lined-title">店舗情報</h3>
            <dl>
                <dt>施設名</dt>
                <dd>
                    <?php echo esc_html(get_field('facility_name')); ?>
                </dd>
                <dt>施設紹介</dt>
                <dd>
                    <?php echo nl2br(esc_html(get_field('facility_description'))); ?>
                </dd>
                <dt>住所</dt>
                <dd>
                    <?php echo esc_html(get_field('address1')); ?>
                </dd>
                <dd>
                    <?php echo esc_html(get_field('address2')); ?>
                </dd>
                <dt>電話番号</dt>
                <dd>
                    <?php echo esc_html(get_field('tel')); ?>
                </dd>
                <dt>営業時間</dt>
                <dd>
                    <?php echo nl2br(esc_html(get_field('business_time'))); ?>
                </dd>
                <dt>定休日</dt>
                <dd>
                    <?php echo esc_html(get_field('closed')); ?>
                </dd>
                <dt>料金</dt>
                <dd>
                    <?php echo nl2br(esc_html(get_field('price'))); ?>
                </dd>
                <dt>決済方法</dt>
                <dd>
                    <?php echo nl2br(esc_html(get_field('payment_description'))); ?>
                </dd>
                <dt>予約</dt>
                <dd>
                    <?php echo nl2br(esc_html(get_field('reserve_description'))); ?>
                </dd>
                <dt>トイレ</dt>
                <dd>
                    <?php echo nl2br(esc_html(get_field('toilet_description'))); ?>
                </dd>
                <dt>分煙</dt>
                <dd>
                    <?php echo nl2br(esc_html(get_field('smoking_description'))); ?>
                </dd>
                <dt>駐車場</dt>
                <dd>
                    <?php echo nl2br(esc_html(get_field('parking_description'))); ?>
                </dd>
                <dt>Wi-Fi</dt>
                <dd>
                    <?php echo nl2br(esc_html(get_field('wifi_description'))); ?>
                </dd>
                <dt>公式ホームページ</dt>
                <dd>
                    <?php echo esc_html(get_field('url')); ?>
                </dd>
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

        <section>
            <h5>こちらもいかがでしょうか？</h5>
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

            <?php
            // 現在の投稿のタームを取得
            $terms = get_the_terms(get_the_ID(), 'facility_type');
            $term_slug = '';

            if ($terms && !is_wp_error($terms)) {
                // 最初のタームのスラッグを取得
                $term_slug = $terms[0]->slug;
            }
            ?>

            <button class="back_btn" onclick="window.location.href='<?php echo home_url('/facility_type/' . $term_slug . '/'); ?>'">
                <span><i class="fa-solid fa-arrow-left"></i>back</span>
            </button>



    </div>
</main>

<!-- footer.phpを読み込む -->
<?php get_footer(); ?>

<!-- header.phpを読み込む -->
<?php get_header(); ?>

<!-- main -->
<main class="pc_inner">
    <div class="container">
        <section>
            <h2 class="under_line"><?php the_title(); ?></h2>

            <!-- コラム内容 -->
            <p class="date_time"><?php echo esc_html(get_post_time('Y.m.d.(D)')); ?></p>

            <!-- パンくず -->
            <?php get_template_part('template-parts/breadcrumb'); ?>

            <!-- コラム写真 -->
            <div class="column_img">
                <?php
                $pic = get_field('column_pic');
                if ($pic) {
                    $pic_url = $pic['sizes']['large'];
                    $name = get_field('slug');
                ?>
                    <img src="<?php echo esc_url($pic_url); ?>" alt="<?php echo esc_attr($name); ?>">
                <?php
                } else {
                ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/noimage.png" alt="<?php echo esc_attr(get_the_title()); ?>" />
                <?php
                }
                ?>
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
                            foreach ($terms as $term) {
                ?>
                                <span class="hashtag"><?php echo esc_html($term->name); ?></span>
                <?php
                            }
                        }
                    }
                }
                ?>
            </div>

            <!-- 記事内容 -->
            <?php if (get_field('column_description')) : ?>
                <p class="column_text"><?php the_field('column_description'); ?></p>
            <?php endif; ?>

        </section>

        <!-- コメントフォーム -->
        <div class="comment_form">
            <div class="item">
                <label class="comment" for="comment">
                    <!-- 現在コメント機能は使わないのでコメントアウト -->
                    <?php //comments_template();
                    ?>
                </label>
            </div>
        </div>

        <!-- 関連情報 -->
        <!-- フロント班へ 以下関連ウェブサイトがあった場合表示される項目 -->
        <!-- <?php
                // ACFからカスタムフィールドの値を取得
                $string = get_field('column_url');
                // 初期化
                $external_url = '';
                $link_text = '';
                // explode関数を使用して文字列を分割し、分割した結果の要素数をチェック
                if ($string) {
                    $parts = explode(",", $string);
                    if (count($parts) == 2) {
                        $external_url = $parts[0];
                        $link_text = $parts[1];
                    }
                }
                ?> -->
        <section>
            <?php if (!empty($external_url) && !empty($link_text)) : ?>
                <h5 class="mt32">関連ウェブサイト</h5>
                <p><a href="<?php echo esc_url($external_url); ?>" target="_blank"><?php echo esc_html($link_text); ?></a>
                </p>
            <?php endif; ?>

        </section>

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
            // 力技で一旦動かしてる。今後関連部分は全体的に修正必要
            //投稿がない場合レイアウトが崩れるのでsectionごと非表示
            if ($has_posts) {
                echo '</div>'; // .article_allを閉じる
            } else {
                echo '<style>section.recommend { display: none; }</style>';
            }
            ?>

        </section>

        <?php
        // 現在の投稿のタームを取得
        $terms = get_the_terms(get_the_ID(), 'column_type');
        $term_slug = '';
        if ($terms && !is_wp_error($terms)) {
            // 最初のタームのスラッグを取得
            $term_slug = $terms[0]->slug;
        }
        ?>

        <button class="back_btn" onclick="window.location.href='<?php echo home_url('column_type/' . $term_slug . '/'); ?>'">
            <span><i class="fa-solid fa-arrow-left"></i>一覧へ</span>
        </button>

    </div>
</main>

<!-- footer.phpを読み込む -->
<?php get_footer(); ?>

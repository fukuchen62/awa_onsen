<!-- header.phpを読み込む -->
<?php get_header(); ?>

<!-- main -->
<main class="pc_inner">
    <div class="container">
        <section>
            <h2 class="under_line"><?php the_title(); ?></h2>

            <!-- コラム内容 -->
            <p class="date"><?php echo esc_html(get_post_time('Y.m.d.(D)')); ?></p>

            <!-- パンくず -->
            <?php get_template_part('template-parts/breadcrumb'); ?>
            <!-- コラム写真 -->
            <div class="column_img">

                <!-- コラム画像ここから -->
                <?php
                $pic = get_field('column_pic');
                $pic_url = $pic['sizes']['large'];
                $name = get_field('slug');
                ?>
                <img src="<?php echo $pic_url; ?>" alt="<?php $name; ?>">
                <!-- コラム画像ここまで-->

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

            <!-- 記事内容 -->
            <p class="column_text"><?php the_field('column_description'); ?></p>

        </section>

        <!-- コメントフォーム -->
        <div class="comment_form">
            <!-- コメント入力欄 -->
            <!-- form action= -->
            <div class="item">
                <label class="comment" for="comment">
                    <!-- コメント入力フォームとコメントリスト -->
                    <?php comments_template(); ?></label>
                <!-- <textarea rows="10" cols="80" name="comment" id="comment"></textarea><br> -->
            </div>


        </div>

        <!-- 関連情報 -->
        <section>
            <h5>関連情報</h5>
            <div class="article_all">
                <article class="card onsen">
                    <?php
                    // 関連リンク1
                    $slug = get_field('column_url'); // ここにカスタムフィールドの値が入る

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
                        $name = $slug;
                        $post_id = $post->ID;
                        $post_title = get_the_title($post_id);
                        $post_link = get_permalink($post_id);
                        $post_thumbnail = get_the_post_thumbnail($post_id, 'full'); // アイキャッチ画像を取得

                        //クラス名を設定
                        $class = 'card onsen';
                    ?>

                        <a href="<?php echo esc_url($post_link); ?>">
                            <div>
                                <span></span>
                                <?php if ($post_thumbnail) : ?>
                                    <img src="<?php echo esc_url(get_the_post_thumbnail_url($post_id, 'full')); ?>" alt="<?php echo esc_attr($post_title); ?>" />
                                <?php endif; ?>

                            </div>
                            <h3><?php echo esc_html($post_title); ?>すんごい温泉めちゃすごの湯</h3>
                        </a>
                </article>
            <?php wp_reset_postdata();
                    }
            ?>


            <article class="card nearby">

                <?php
                // 関連リンク2
                $slug = get_field('column_url1'); // ここにカスタムフィールドの値が入る

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
                    $name = $slug;
                    $post_id = $post->ID;
                    $post_title = get_the_title($post_id);
                    $post_link = get_permalink($post_id);
                    $post_thumbnail = get_the_post_thumbnail($post_id, 'full'); // アイキャッチ画像を取得

                    // クラス名を設定
                    $class = 'card nearby';
                ?>
                    <!-- 投稿情報を表示 -->
                    <a href="<?php echo esc_url($post_link); ?>">
                        <div>
                            <span></span>
                            <?php if ($post_thumbnail) : ?>
                                <img src="<?php echo esc_url(get_the_post_thumbnail_url($post_id, 'full')); ?>" alt="<?php echo esc_attr($post_title); ?>" />
                            <?php endif; ?>
                            <img src="../assets/images/onsen_img.jpg" alt="周辺施設情報">
                        </div>
                        <h3><?php echo esc_html($post_title); ?>周辺施設</h3>
                    </a>
            </article>
        <?php
                    wp_reset_postdata();
                }
        ?>
            </div>
        </section>

        <!-- ナビゲーション -->

        <div class="nav-links">
            <!-- 関連リンクの作成 -->
            <div class="prevNext flex">
                <?php
                $previous_post = get_previous_post();
                if ($previous_post) :
                ?>
                    <div class="prevNext_item prevNext_item-prev">
                        <a href="<?php the_permalink($previous_post); ?>">

                            <span>
                                << 前の記事</span>
                        </a>
                    </div>
                <?php endif; ?>

                <div class="prevNext_item prevNext_item-next">
                    <?php
                    $next_post = get_next_post();
                    if ($next_post) :
                    ?>
                        <a href="<?php the_permalink($next_post); ?>">
                            <span>次の記事 >></span>

                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <!-- 前に戻るボタン -->
        <div>
            <button class="back_btn" onclick="history.back">
                <span>
                    <i class="fa-solid fa-arrow-left"></i>back
                </span>
            </button>
        </div>


</main>
</div>

<!-- footer.phpを読み込む次の記事
<?php get_footer(); ?>

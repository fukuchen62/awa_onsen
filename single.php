<?php get_header(); ?>


<main class="pc_inner">
    <div class="container">
        <section>
            <div class="ttl">
                <h2 class="under_line"><?php the_title(); ?></h2>
                <p><?php the_time('Y.m.d H:i'); ?></p>
            </div>

            <!-- パンくずリスト CSS未適用 -->
            <?php get_template_part('template-parts/breadcrumb'); ?>

            <?php if (has_post_thumbnail()) : ?>
                <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="mt32">
            <?php else : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/noimage.png" alt="<?php the_title(); ?>" />
            <?php endif; ?>

            <div class="hashtag_list mt32">
                <?php
                // 現在の投稿のIDを取得
                $post_id = get_the_ID();

                // カテゴリーに関連するタームを取得
                $categories = get_the_category($post_id);
                ?>

                <?php if (!empty($categories)) : ?>
                    <ul>
                        <?php foreach ($categories as $category) : ?>
                            <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>">
                                <li class="hashtag"><?php echo esc_html($category->name); ?></li>
                            </a>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>

            <p class="mt32"><?php the_content(); ?></p>
        </section>



        <section>

            <?php
            // ループの回数を定義
            $loop_count = 4;

            // すべてのカスタム投稿タイプを取得
            $custom_post_types = get_post_types(array('_builtin' => false));

            $posts_exist = false;
            $posts_data = array();

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
                        $posts_exist = true;
                        $posts_data[] = $posts[0]; // 投稿データを保存
                    }
                }
            }
            ?>

            <?php if ($posts_exist) : ?>
                <h5 class="mt32">関連情報</h5>
                <div class="article_all">
                    <?php
                    foreach ($posts_data as $post) {
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
                                <h3><?php echo esc_html($post_title); ?></h3>
                            </a>
                        </article>
                    <?php
                        wp_reset_postdata();
                    }
                    ?>
                </div>
            <?php endif; ?>

        </section>

        <?php
        // 現在の投稿のカテゴリーを取得
        $categories = get_the_category();
        $category_slug = '';

        if ($categories && !is_wp_error($categories)) {
            // 最初のカテゴリーのスラッグを取得
            $category_slug = $categories[0]->slug;
        }
        ?>

        <button class="back_btn" onclick="window.location.href='<?php echo home_url('/category/' . $category_slug . '/'); ?>'">
            <span><i class="fa-solid fa-arrow-left"></i>back</span>
        </button>


    </div>
</main>


<?php get_footer(); ?>

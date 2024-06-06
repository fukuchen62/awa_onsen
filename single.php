<?php
get_header();
?>

<!-- <div class="bubble_background"> -->
<div class="container">
    <main>
        <section>
            <div class="ttl">
                <h2 class="under_line"><?php the_title(); ?></h2>
                <p><?php the_time('Y.m.d H:i'); ?></p>
            </div>

            <!-- パンくずリスト CSS未適用 -->
            <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
                <?php if (function_exists('bcn_display')) {
                    bcn_display();
                } ?>
            </div>

            <div class="hashtag_list mt32">
                <?php

                // 現在の投稿のIDを取得 CSS未適用
                $post_id = get_the_ID();

                // カテゴリーに関連するタームを取得
                $categories = get_the_category($post_id);

                if (!empty($categories)) {
                    echo '<ul>';
                    foreach ($categories as $category) {
                        echo '<li class="hashtag">';
                        echo esc_html($category->name) . '<br>';
                        echo '</li>';
                    }
                    echo '</ul>';
                } else {
                    echo '<p>この投稿に関連するカテゴリーはありません。</p>';
                }

                ?>
            </div>


            <?php if (has_post_thumbnail()) : ?>
                <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="mt32">
            <?php endif; ?>


            <p class="mt32"><?php the_content(); ?></p>


            <section>
                <h5 class="mt32">関連情報</h5>
                <div class="article_all">
                    <?php
                    // 関連リンク1
                    $slug = get_field('post_url1'); // ここにカスタムフィールドの値が入る

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

                        // クラス名を設定
                        $class = 'card onsen';

                        // 投稿情報を表示
                    ?>
                        <article class="<?php echo esc_attr($class); ?>">
                            <a href="<?php echo esc_url($post_link); ?>">
                                <div>
                                    <span></span>
                                    <?php if ($post_thumbnail) {
                                        $thumbnail_url = get_the_post_thumbnail_url($post_id, 'full'); // フルサイズのURLを取得
                                        $post_title = get_the_title($post_id); // 投稿タイトルを取得
                                        echo '<img src="' . esc_url($thumbnail_url) . '" alt="' . esc_attr($post_title) . '" />';
                                    }
                                    ?>

                                </div>
                                <h3><?php echo esc_html($post_title); ?></h3>
                            </a>
                        </article>
                    <?php
                        wp_reset_postdata();
                    }

                    // 関連リンク2
                    $slug = get_field('post_url2'); // ここにカスタムフィールドの値が入る

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

                        // クラス名を設定
                        $class = 'card modelcourse';

                        // 投稿情報を表示
                    ?>
                        <article class="<?php echo esc_attr($class); ?>">
                            <a href="<?php echo esc_url($post_link); ?>">
                                <div>
                                    <span></span>
                                    <?php if ($post_thumbnail) {
                                        $thumbnail_url = get_the_post_thumbnail_url($post_id, 'full'); // フルサイズのURLを取得
                                        $post_title = get_the_title($post_id); // 投稿タイトルを取得
                                        echo '<img src="' . esc_url($thumbnail_url) . '" alt="' . esc_attr($post_title) . '" />';
                                    }
                                    ?>
                                </div>
                                <h3><?php echo esc_html($post_title); ?></h3>
                            </a>
                        </article>
                    <?php
                        wp_reset_postdata();
                    }
                    ?>
                </div>
            </section>
            <button class="back_btn" onclick="history.back">
                <span><i class="fa-solid fa-arrow-left"></i>back</span>
            </button>
    </main>
</div>


<!-- </div> -->

<?php
get_footer();
?>

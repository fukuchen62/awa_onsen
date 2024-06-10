<?php
/* Template Name: Custom Category Archive */
get_header();
?>

<main class="container">
    <section>
        <h2 class="under_line">お知らせ一覧</h2>

        <!-- パンくずリスト -->
        <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
            <?php if (function_exists('bcn_display')) {
                bcn_display();
            } ?>
        </div>

        <!-- タグ -->
        <?php
        $categories = get_categories(array('hide_empty' => false)); ?>

        <?php if (!empty($categories)) : ?>
            <ul class="tag element04">
                <?php foreach ($categories as $category) : ?>
                    <?php
                    // カテゴリーのリンクを取得
                    $category_link = get_category_link($category->term_id);
                    // 現在のカテゴリーと一致するか確認
                    $is_active = (is_category($category->term_id) || (is_singular('post') && has_category($category->term_id))) ? 'active' : '';
                    ?>
                    <li class="<?php echo esc_attr($is_active); ?>">
                        <a href="<?php echo esc_url($category_link); ?>"><?php echo esc_html($category->name); ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <!-- 一覧 -->
        <div class="news_list">
            <?php
            // 現在のカテゴリーを取得
            $current_category = get_queried_object();

            if ($current_category) :
                // クエリパラメータを設定
                $args = array(
                    'category_name' => $current_category->slug, // 現在のカテゴリーのスラッグ
                    'posts_per_page' => 5, // 表示する投稿数
                    'paged' => get_query_var('paged') ? get_query_var('paged') : 1 // ページネーション
                );

                // WP_Queryオブジェクトを作成
                $category_query = new WP_Query($args);

                if ($category_query->have_posts()) :
                    while ($category_query->have_posts()) : $category_query->the_post();
            ?>

                        <?php
                        // カテゴリーに関連するタームを取得
                        $post_id = get_the_ID();
                        $tags = get_the_category($post_id);
                        ?>

                        <article class="news_card">
                            <a href="<?php the_permalink(); ?>">
                                <?php if (has_post_thumbnail()) : ?>
                                    <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>" />
                                <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/default-thumbnail.jpg" alt="<?php the_title(); ?>" />
                                <?php endif; ?>
                                <div class="news_contents">
                                    <p class="date fugaz-one-regular"><?php the_time('Y.m.d H:i'); ?></p>
                                    <h6 class="title"><?php the_title(); ?></h6>
                            </a>

                            <div class="hashtag_list">
                                <div class="hashtag_list">
                                    <?php
                                    if (!empty($tags)) {
                                        foreach ($tags as $tag) {
                                    ?>
                                            <a href="<?php echo esc_url(get_category_link($tag->term_id)); ?>" class="hashtag">
                                                <?php echo esc_html($tag->name); ?>
                                            </a>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>

                        </article>
            <?php
                    endwhile;
                endif;
                wp_reset_postdata();
            endif;
            ?>
        </div>

        <!-- ページネーションの表示 -->
        <div class="pagination">
            <?php
            $pagination_args = array(
                'total' => $category_query->max_num_pages,
                'current' => max(1, get_query_var('paged')),
                'prev_text' => '<<',
                'next_text' => '>>',
                'end_size' => 1,
                'mid_size' => 2,
            );
            echo paginate_links($pagination_args);
            ?>
        </div>
    </section>
</main>
</div>
</div>

<?php
get_footer();
?>

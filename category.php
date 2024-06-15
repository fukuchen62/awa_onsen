<?php
/* Template Name: Custom Category Archive */
get_header();
?>

<main class="pc_inner">
    <div class="container">
        <section>
            <h2 class="under_line">お知らせ一覧</h2>

            <!-- パンくずリスト -->
            <?php get_template_part('template-parts/breadcrumb'); ?>

            <!-- タグ -->
            <?php
            $args = [
                'hide_empty' => false,
                'orderby' => 'ID',
            ];
            $categories = get_categories($args); ?>

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
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                if ($current_category) :
                    // クエリパラメータを設定
                    $args = array(
                        'category_name' => $current_category->slug, // 現在のカテゴリーのスラッグ
                        // 'posts_per_page' => 5,
                        'paged' => $paged // 現在のページ番号
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

                            <article <?php post_class('news_card'); ?>>
                                <a href="<?php the_permalink(); ?>">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <img src="<?php the_post_thumbnail_url('thumbnail'); ?>" alt="<?php the_title(); ?>" />
                                    <?php else : ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/noimage.png" alt="<?php the_title(); ?>" />
                                    <?php endif; ?>
                                    <div class="news_contents">
                                        <p class="date fugaz-one-regular"><?php echo get_the_date("Y.m.d") . "" . date("D H:i", strtotime(get_the_date("Y-m-d H:i:s"))); ?></p>
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
            <?php if (function_exists('wp_pagenavi')) : ?>
                <div class="pagination">
                    <?php wp_pagenavi(); ?>
                </div>
            <?php endif; ?>
        </section>

    </div>
</main>

<?php
get_footer();
?>

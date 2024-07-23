<?php
/*
Template Name: Search Page
*/

get_header();

// POSTメソッドから検索クエリを取得
$search_query = isset($_POST['search-query']) ? sanitize_text_field($_POST['search-query']) : '';

?>

<main class="pc_inner">
    <div class="container">
        <h2 class="under_line">検索</h2>
        <h4>検索キーワード: <?php echo esc_html($search_query); ?></h4>

        <?php
        // サブクエリの設定
        $custom_search_query = new WP_Query(array(
            'post_type' => array('spa', 'facility'), // 検索対象のカスタム投稿タイプを指定
            'posts_per_page' => -1, // 全ての投稿を表示
            's' => $search_query, // 検索クエリを設定
        ));

        if ($custom_search_query->have_posts()) :
        ?>
            <div class="article_all">
                <?php while ($custom_search_query->have_posts()) : $custom_search_query->the_post(); ?>
                    <?php
                    // 現在の投稿タイプを取得
                    $post_type = get_post_type();
                    ?>
                    <article class="card <?php echo esc_attr($post_type); ?>">
                        <a href="<?php the_permalink(); ?>">
                            <div>
                                <span></span>
                                <?php if (has_post_thumbnail()) : ?>
                                    <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
                                <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/noimage.png" alt="<?php the_title(); ?>" />
                                <?php endif; ?>
                            </div>
                            <h3><?php the_title(); ?></h3>
                        </a>
                    </article>
                <?php endwhile;
                wp_reset_postdata(); ?>
            </div>

        <?php else : ?>
            <p> <?php echo esc_html($search_query); ?>の検索結果は見つかりませんでした</p>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>

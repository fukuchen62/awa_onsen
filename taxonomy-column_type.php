<!-- header.phpを読み込む -->
<?php get_header(); ?>



<main class="pc_inner">
    <div class="container">

        <section>
            <h2 class="under_line">コラム一覧</h2>

            <!-- パンくずリスト -->
            <?php get_template_part('template-parts/breadcrumb'); ?>



            <!-- WordPressのルールの開始 -->
            <?php if (have_posts()) : ?>



                <!-- タグ -->
                <?php
                // 特定のタクソノミーを指定
                $taxonomy = 'column_type'; // ここにタクソノミーの名前を指定

                // タクソノミーに属するすべてのタームを取得
                $terms = get_terms(array(
                    'taxonomy' => $taxonomy,
                    'order' => 'DESC',
                    'hide_empty' => false,
                ));


                if (!empty($terms) && !is_wp_error($terms)) :
                ?>
                    <ul class="tag element03">
                        <?php foreach ($terms as $term) :
                            // タームのリンクを取得
                            $term_link = get_term_link($term);
                            // 現在のタームと一致するか確認
                            $is_active = (is_tax($taxonomy, $term->term_id)) ? 'active' : '';
                        ?>
                            <li class="<?php echo esc_attr($is_active); ?>">
                                <a href="<?php echo esc_url($term_link); ?>"><?php echo esc_html($term->name); ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php
                endif;
                ?>

                <!-- 一覧 -->
                <div class="news_list">

                    <!-- 記事があるとき -->
                    <?php while (have_posts()) : ?>
                        <?php the_post(); ?>

                        <article <?php post_class('news_card'); ?>>
                            <!-- アイキャッチ画像表示 -->
                            <a href=" <?php the_permalink(); ?>">
                                <?php if (has_post_thumbnail()) : ?>
                                    <img src="<?php the_post_thumbnail_url('thumbnail'); ?>" alt="<?php the_title(); ?>"></a>
                        <?php endif; ?>
                        <div class="news_cintents">
                            <a href="<?php the_permalink(); ?>">
                                <p class="date fugaz-one-regular"><?php echo get_post_time('Y.m.d.D H:i'); ?></p>
                                <h6 class="title"><?php the_title(); ?></h6>
                            </a>
                            <!-- ハッシュタグ取得記述をする -->
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
                                        }
                                    }
                                }
                                ?>
                            </div>


                        </article>
                    <?php endwhile; ?>
                    <!-- 一つの記事ここまで -->

                </div>
        </section>
    <?php endif; ?>


    <!-- ページネーション -->
    <?php if (function_exists('wp_pagenavi')) : ?>
        <div class="pagination flex"><?php wp_pagenavi(); ?></div>
    <?php endif; ?>
    <?php
    // 現在のページのURLを取得
    $current_url = home_url(add_query_arg(array(), $wp->request));

    // リファラー(前のページ)のURLを取得
    $referer_url = wp_get_referer();

    // back_btnを表示するかどうかのフラグ
    $show_back_btn = false;

    // リファラーのURLが取得できた場合
    if ($referer_url) {
        // リファラーのURLとの比較
        if (strpos($referer_url, home_url()) !== false) {
            // リファラーのURLがサイト内のURLだった場合
            $back_url = $referer_url;
            $show_back_btn = true;
        }
    }

    // back_btnを表示する場合のみ出力
    if ($show_back_btn) {
    ?>
        <button class="back_btn" onclick="window.location.href='<?php echo $back_url; ?>'">
            <span><i class="fa-solid fa-arrow-left"></i>back</span>
        </button>
    <?php
    }
    ?>
    </div>
</main>

</div>

<!-- footer.phpを読み込む -->
<?php get_footer(); ?>

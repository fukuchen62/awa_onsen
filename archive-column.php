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
                $args = [
                    'taxonomy' => 'menu',
                    'orderby' => 'count',
                    'order' => 'DESC',
                    'hide_empty' => false,
                ];
                $menu_terms = get_terms($args);
                print_r($menu_terms);
                ?>


                <ul class="tag element03">
                    <li class="active"><a href="#"><?php single_term_title(); ?>
                            <span><?php echo strtoupper($menu->slug); ?></span></a></li>
                    <li><a href="#">温泉周辺<br>施設紹介</a></li>
                    <li><a href="#">お役立ち</a></li>
                </ul>

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
                            <!-- アイキャッチ画像ないとき -->
                        <?php else : ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/default-thumbnail.jpg" alt="<?php the_title(); ?>" />
                        <?php endif; ?>
                        <div class="news_cintents">
                            <a href="<?php the_permalink(); ?>">
                                <p class="date fugaz-one-regular"><?php echo get_post_time('Y.m.d.D H:i'); ?></p>
                                <h6 class="title"><?php the_title(); ?></h6>
                            </a>


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

                        </article>
                    <?php endwhile; ?>
                    <!-- 一つの記事ここまで -->




                </div>
        </section>
    <?php endif; ?>


    <!-- ページネーション -->
    <?php if (function_exists('wp_pagenavi')) : ?>
        <p class="pagination"><?php wp_pagenavi(); ?> &lt;&lt; 1　2　3　4　5 &gt;&gt; </p>
    <?php endif; ?>
    <button class="back_btn" onclick="history.back">
        <span><i class="fa-solid fa-arrow-left"></i>back</span>
    </button>
    </div>
</main>

</div>

<!-- footer.phpを読み込む -->
<?php get_footer(); ?>

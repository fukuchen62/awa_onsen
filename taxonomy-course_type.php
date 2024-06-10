<!-- header.phpを読み込む -->
<?php get_header(); ?>

<main class="pc_inner">
    <div class="container">
        <section>
            <h2 class="under_line">モデルコース一覧</h2>

            <!-- パンくずリスト -->
            <?php get_template_part('template-parts/breadcrumb') ?>

            <!-- タグ -->
            <?php
            // 特定のタクソノミーを指定
            $taxonomy = 'course_type'; // ここにタクソノミーの名前を指定

            // タクソノミーに属するすべてのタームを取得
            $terms = get_terms(array(
                'taxonomy' => $taxonomy,
                'hide_empty' => false,
            ));

            if (!empty($terms) && !is_wp_error($terms)) :
            ?>
                <ul class="tag element04">
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
            <div class="article_all">
                <!-- WordPressのルールの開始 -->
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : ?>
                        <?php the_post(); ?>

                        <!-- カード型の開始 -->
                        <?php get_template_part('template-parts/loop', 'course'); ?>
                        <!-- カード型の終了 -->

                        <!-- WordPressのルールの終了 -->
                    <?php endwhile;
                    wp_reset_postdata(); ?>
                <?php endif; ?>
            </div>

        </section>

        <!-- ぺージナビゲーション -->
        <?php if (function_exists('wp_pagenavi')) : ?>
            <div class="pagination">
                <?php wp_pagenavi(); ?>
            </div>
        <?php endif; ?>

        <!-- バックボタン -->
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

<!-- footer.phpを読み込む -->
<?php get_footer(); ?>
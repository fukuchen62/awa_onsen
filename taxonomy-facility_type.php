<!-- header.phpを読み込む -->
<?php get_header(); ?>


<main class="pc_inner">
    <div class="container">
        <div class="inner">
            <!-- サイトタイトル -->
            <h2 class="under_line">周辺施設一覧</h2>

            <!-- パンくずリスト -->
            <?php get_template_part('template-parts/breadcrumb') ?>

            <?php
            // タクソノミーを指定
            $taxonomy = 'facility_type'; // ここで使用するタクソノミーを指定します

            // タクソノミーのタームを取得
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
            <?php endif; ?>

            <?php
            $current_term = get_queried_object(); // 現在のカテゴリまたはタームを取得
            // 表示用に変換
            $areas = array(
                'east' => '東部',
                'west' => '西部',
                'south' => '南部'
            );
            foreach ($areas as $area_slug => $area_name) :
                $args = array(
                    'post_type' => 'facility', // カスタム投稿facilityを指定
                    'tax_query' => array(
                        'relation' => 'AND',
                        array(
                            'taxonomy' => $current_term->taxonomy, // 現在のタクソノミー
                            'field' => 'slug',
                            'terms' => $current_term->slug, // 現在のタームのスラッグ
                        ),
                        array(
                            'taxonomy' => 'area', // 地域のカスタムタクソノミー 'area'
                            'field' => 'slug',
                            'terms' => $area_slug, // 地域のタームスラッグ
                        ),
                    ),
                    'posts_per_page' => -1 // 全ての投稿を取得
                );
                $query = new WP_Query($args);
            ?>
                <!-- アコーディオン設定 -->
                <details class="details js-details">
                    <summary class="details-summary js-details-summary"><span class="btn"></span>
                        <h3 class="acco_title"><?php echo $area_name; ?></h3>
                    </summary>
                    <div class="details-content js-details-content">
                        <div class="article_all">
                            <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                                    <article class="card">
                                        <a href="<?php the_permalink(); ?>">
                                            <div>
                                                <span></span>
                                                <?php if (has_post_thumbnail()) : ?>
                                                    <?php the_post_thumbnail('medium'); ?>
                                                <?php else : ?>
                                                    <img src="path/to/default-image.jpg" alt="<?php the_title(); ?>" />
                                                <?php endif; ?>
                                            </div>
                                            <h3 class="card-title"><?php the_title(); ?></h3>
                                        </a>
                                    </article>
                                <?php endwhile;
                                wp_reset_postdata();
                            else : ?>
                                <p>このエリアには投稿がありません。</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </details>
            <?php
            endforeach;
            ?>
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

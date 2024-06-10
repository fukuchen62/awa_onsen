<?php get_search_form() ?>

<section>
    <h4 class="lined-title">検索結果</h4>
    <div class="article_all">

        <?php
        // Spa の検索結果を表示するクエリパラメータ
        if (isset($_GET['post_type']) && $_GET['post_type'] == 'spa') {
            $spa_query_args = array(
                'post_type' => 'spa',
                'tax_query' => array('relation' => 'AND')
            );

            if (!empty($_GET['area_spa'])) {
                $spa_query_args['tax_query'][] = array(
                    'taxonomy' => 'area',
                    'field' => 'slug',
                    'terms' => $_GET['area_spa'],
                );
            }

            if (!empty($_GET['spa_type'])) {
                $spa_query_args['tax_query'][] = array(
                    'taxonomy' => 'spa_type',
                    'field' => 'slug',
                    'terms' => $_GET['spa_type'],
                );
            }

            $spa_search_query = new WP_Query($spa_query_args);

            if ($spa_search_query->have_posts()) :
                while ($spa_search_query->have_posts()) : $spa_search_query->the_post(); ?>
                    <article class="card">
                        <a href="<?php the_permalink(); ?>">
                            <div>
                                <span></span>
                                <?php if (has_post_thumbnail()) : ?>
                                    <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
                                <?php endif; ?>
                            </div>
                            <h3><?php the_title(); ?></h3>
                        </a>
                    </article>
        <?php endwhile;
            endif;

            wp_reset_postdata();
        }
        ?>

        <?php
        // Course の検索結果を表示するクエリパラメータ
        if (isset($_GET['post_type']) && $_GET['post_type'] == 'course') {
            $course_query_args = array(
                'post_type' => 'course',
                'tax_query' => array('relation' => 'AND')
            );

            if (!empty($_GET['area_course'])) {
                $course_query_args['tax_query'][] = array(
                    'taxonomy' => 'area',
                    'field' => 'slug',
                    'terms' => $_GET['area_course'],
                );
            }

            if (!empty($_GET['course_type'])) {
                $course_query_args['tax_query'][] = array(
                    'taxonomy' => 'course_type',
                    'field' => 'slug',
                    'terms' => $_GET['course_type'],
                );
            }

            $course_search_query = new WP_Query($course_query_args);

            if ($course_search_query->have_posts()) :
                while ($course_search_query->have_posts()) : $course_search_query->the_post(); ?>
                    <article class="card">
                        <a href="<?php the_permalink(); ?>">
                            <div>
                                <span></span>
                                <?php if (has_post_thumbnail()) : ?>
                                    <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
                                <?php endif; ?>
                            </div>
                            <h3><?php the_title(); ?></h3>
                        </a>
                    </article>
        <?php endwhile;
            endif;

            wp_reset_postdata();
        }
        ?>

        <?php
        // Facility の検索結果を表示するクエリパラメータ
        if (isset($_GET['post_type']) && $_GET['post_type'] == 'facility') {
            $facility_query_args = array(
                'post_type' => 'facility',
                'tax_query' => array('relation' => 'AND')
            );

            if (!empty($_GET['area_facility'])) {
                $facility_query_args['tax_query'][] = array(
                    'taxonomy' => 'area',
                    'field' => 'slug',
                    'terms' => $_GET['area_facility'],
                );
            }

            if (!empty($_GET['facility_type'])) {
                $facility_query_args['tax_query'][] = array(
                    'taxonomy' => 'facility_type',
                    'field' => 'slug',
                    'terms' => $_GET['facility_type'],
                );
            }

            $facility_search_query = new WP_Query($facility_query_args);

            if ($facility_search_query->have_posts()) :
                while ($facility_search_query->have_posts()) : $facility_search_query->the_post(); ?>
                    <article class="card">
                        <a href="<?php the_permalink(); ?>">
                            <div>
                                <span></span>
                                <?php if (has_post_thumbnail()) : ?>
                                    <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
                                <?php endif; ?>
                            </div>
                            <h3><?php the_title(); ?></h3>
                        </a>
                    </article>
        <?php endwhile;
            endif;

            wp_reset_postdata();
        }
        ?>
    </div>
</section>
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

<?php get_footer(); ?>

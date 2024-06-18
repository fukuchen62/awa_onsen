<?php get_search_form() ?>

<section>
    <h4 class="lined-title">検索結果</h4>

    <?php
    // Spa の検索結果を表示するクエリパラメータ
    if (isset($_GET['post_type']) && $_GET['post_type'] == 'spa') {

        $spa_query_args = array(
            'post_type' => 'spa',
            'post_status' => 'publish', // 公開された投稿のみを表示
            'posts_per_page' => 100,
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

        $post_count = $spa_search_query->found_posts;

        if ($post_count > 0) : ?>
            <p class="search_result"><?php echo $post_count; ?> 件の結果が見つかりました。</p>
            <div class="article_all">
                <?php
                while ($spa_search_query->have_posts()) : $spa_search_query->the_post(); ?>
                    <article class="card spa">
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
                <?php endwhile; ?>
            </div>
        <?php else : ?>
            <p>検索結果はありませんでした。</p>
        <?php
        endif;

        wp_reset_postdata();
    }

    // Course の検索結果を表示するクエリパラメータ
    if (isset($_GET['post_type']) && $_GET['post_type'] == 'course') {

        $course_query_args = array(
            'post_type' => 'course',
            'post_status' => 'publish', // 公開された投稿のみを表示
            'posts_per_page' => 100,
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

        $post_count = $course_search_query->found_posts;

        if ($post_count > 0) : ?>
            <p><?php echo $post_count; ?> 件の結果が見つかりました。</p>
            <div class="article_all">
                <?php
                while ($course_search_query->have_posts()) : $course_search_query->the_post(); ?>
                    <article class="card course">
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
                <?php endwhile; ?>
            </div>
        <?php else : ?>
            <p>検索結果はありませんでした。</p>
        <?php
        endif;
        wp_reset_postdata();
    }

    // Facility の検索結果を表示するクエリパラメータ
    if (isset($_GET['post_type']) && $_GET['post_type'] == 'facility') {

        $facility_query_args = array(
            'post_type' => 'facility',
            'post_status' => 'publish', // 公開された投稿のみを表示
            'posts_per_page' => 100,
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

        $post_count = $facility_search_query->found_posts;

        if ($post_count > 0) : ?>
            <p><?php echo $post_count; ?> 件の結果が見つかりました。</p>
            <div class="article_all">
                <?php
                while ($facility_search_query->have_posts()) : $facility_search_query->the_post(); ?>
                    <article class="card facility">
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
                <?php endwhile; ?>
            </div>
        <?php else : ?>
            <p>検索結果はありませんでした。</p>
    <?php
        endif;

        wp_reset_postdata();
    }
    ?>

</section>

</div>
</main>
<?php get_footer(); ?>

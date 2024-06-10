<?php get_search_form() ?>

<section id="search-results">
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
                echo '<div class="search-results-container">';
                echo '<h2>SPA Results</h2>';
                while ($spa_search_query->have_posts()) : $spa_search_query->the_post();
        ?>
                    <article class="card">
                        <a href="<?php the_permalink(); ?>">
                            <div>
                                <span></span>
                                <?php if (has_post_thumbnail()) : ?>
                                    <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
                                <?php else : ?>
                                    <img src="../assets/images/onsen_img.jpg" alt="Default Image" />
                                <?php endif; ?>
                            </div>
                            <h3><?php the_title(); ?></h3>
                        </a>
                    </article>
        <?php
                endwhile;
                echo '</div>';
            else :
                echo '<p>No SPA posts found.</p>';
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
                echo '<div class="search-results-container">';
                echo '<h2>Course Results</h2>';
                while ($course_search_query->have_posts()) : $course_search_query->the_post();
        ?>
                    <article class="card">
                        <a href="<?php the_permalink(); ?>">
                            <div>
                                <span></span>
                                <?php if (has_post_thumbnail()) : ?>
                                    <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
                                <?php else : ?>
                                    <img src="../assets/images/onsen_img.jpg" alt="Default Image" />
                                <?php endif; ?>
                            </div>
                            <h3><?php the_title(); ?></h3>
                        </a>
                    </article>
        <?php
                endwhile;
                echo '</div>';
            else :
                echo '<p>No Course posts found.</p>';
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
                echo '<div class="search-results-container">';
                echo '<h2>Facility Results</h2>';
                while ($facility_search_query->have_posts()) : $facility_search_query->the_post();
        ?>
                    <article class="card">
                        <a href="<?php the_permalink(); ?>">
                            <div>
                                <span></span>
                                <?php if (has_post_thumbnail()) : ?>
                                    <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
                                <?php else : ?>
                                    <img src="../assets/images/onsen_img.jpg" alt="Default Image" />
                                <?php endif; ?>
                            </div>
                            <h3><?php the_title(); ?></h3>
                        </a>
                    </article>
        <?php
                endwhile;
                echo '</div>';
            else :
                echo '<p>No Facility posts found.</p>';
            endif;

            wp_reset_postdata();
        }
        ?>
    </div>
</section>
<button class="back_btn" onclick="history.back">
    <span><i class="fa-solid fa-arrow-left"></i>back</span>
</button>
</div>
</main>

<?php get_footer(); ?>

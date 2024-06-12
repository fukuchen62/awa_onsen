<!-- header.phpを読み込む -->
<?php get_header(); ?>

<main class="pc_inner">
    <div class="container">
        <h2 class="under_line">温泉一覧</h2>
        <!-- パンくず -->
        <?php get_template_part('template-parts/breadcrumb') ?>
        <!-- アコーディオン -->
        <?php
        // カテゴリーごとに投稿を表示
        $categories = array('east');
        foreach ($categories as $category) :
            $args = array(
                'post_type' => 'spa', // カスタム投稿タイプの指定
                'area' => $category, // カテゴリーを指定
                'posts_per_page' => -1 // 取得する投稿数 (-1で全ての投稿を取得)
            );
            $query = new WP_Query($args);
            $post_count = $query->found_posts; // 投稿の件数を取得
        ?>

            <details class="details js-details">
                <summary class="details-summary js-details-summary"><span class="btn"></span>
                    <h3 class="acco_title">東部 (<?php echo $post_count; ?>件)</h3>
                    <!-- <h3 class="acco_title"><?php echo $category; ?></h3> -->
                </summary>
                <div class="details-content js-details-content">
                    <div class="article_all">
                        <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                                <article class="card spa">
                                    <a href="<?php the_permalink(); ?>">
                                        <div>
                                            <span></span>
                                            <?php if (has_post_thumbnail()) : ?>
                                                <?php the_post_thumbnail('medium'); ?>

                                            <?php endif; ?>
                                        </div>
                                        <h3 class="card-title"><?php the_title(); ?></h3>
                                    </a>
                                </article>
                        <?php endwhile;
                            wp_reset_postdata();
                        endif; ?>
                    </div>
                </div>
            </details>


        <?php endforeach; ?>
        <?php
        // カテゴリーごとに投稿を表示
        $categories = array('west');
        foreach ($categories as $category) :
            $args = array(
                'post_type' => 'spa', // カスタム投稿タイプの指定
                'area' => $category, // カテゴリーを指定
                'posts_per_page' => -1 // 取得する投稿数 (-1で全ての投稿を取得)
            );
            $query = new WP_Query($args);
            $post_count = $query->found_posts; // 投稿の件数を取得
        ?>
            <details class="details js-details">
                <summary class="details-summary js-details-summary"><span class="btn"></span>
                    <h3 class="acco_title">西部 (<?php echo $post_count; ?>件)</h3>
                </summary>
                <div class="details-content js-details-content">
                    <div class="article_all">
                        <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                                <article class="card spa">
                                    <a href="<?php the_permalink(); ?>">
                                        <div>
                                            <span></span>
                                            <?php if (has_post_thumbnail()) : ?>
                                                <?php the_post_thumbnail('medium'); ?>
                                            <?php endif; ?>
                                        </div>
                                        <h3 class="card-title"><?php the_title(); ?></h3>
                                    </a>
                                </article>
                        <?php endwhile;
                            wp_reset_postdata();
                        endif; ?>
                    </div>
                </div>
            </details>

        <?php endforeach; ?>
        <?php
        // カテゴリーごとに投稿を表示
        $categories = array('south');
        foreach ($categories as $category) :
            $args = array(
                'post_type' => 'spa', // カスタム投稿タイプの指定
                'area' => $category, // カテゴリーを指定
                'posts_per_page' => -1 // 取得する投稿数 (-1で全ての投稿を取得)
            );
            $query = new WP_Query($args);
            $post_count = $query->found_posts; // 投稿の件数を取得
        ?>
            <details class="details js-details">
                <summary class="details-summary js-details-summary"><span class="btn"></span>
                    <h3 class="acco_title">南部 (<?php echo $post_count; ?>件)</h3>
                    <!-- <h3 class="acco_title"><?php echo $category; ?></h3> -->
                </summary>
                <div class="details-content js-details-content">
                    <div class="article_all">
                        <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                                <article class="card spa">
                                    <a href="<?php the_permalink(); ?>">
                                        <div>
                                            <span></span>
                                            <?php if (has_post_thumbnail()) : ?>
                                                <?php the_post_thumbnail('medium'); ?>
                                            <?php endif; ?>
                                        </div>
                                        <h3 class="card-title"><?php the_title(); ?></h3>
                                    </a>
                                </article>
                        <?php endwhile;
                            wp_reset_postdata();
                        endif; ?>
                    </div>
                </div>
            </details>

        <?php endforeach; ?>


    </div>
</main>

<!-- footer.phpを読み込む -->
<?php get_footer(); ?>

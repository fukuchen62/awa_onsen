<!-- header.phpを読み込む -->
<?php get_header(); ?>


<main class="pc_inner">
    <div class="container">
        <div class="inner">
            <!-- サイトタイトル -->
            <h2 class="under_line">周辺施設一覧</h2>

            <!-- パンくずリスト -->
            <?php get_template_part('template-parts/breadcrumb') ?>

            <!-- タグメニュー -->
            <ul class="info_tag">
                <li class="shopping_tag"><a href="<?php echo home_url('/facility_type/shopping/'); ?>">ショッピング</a></li>
                <li class="gourmet_tag"><a href="<?php echo home_url('/facility_type/gourmet/'); ?>">グルメ</a></li>
                <li class="play_tag"><a href="<?php echo home_url('/facility_type/play/'); ?>">遊ぶ</a></li>
                <li class="stay_tag"><a href="<?php echo home_url('/facility_type/stay/'); ?>">泊まる</a></li>
            </ul>

            <!-- アコーディオン -->
            <!-- アコーディオン -->
            <?php
            // カテゴリーごとに投稿を表示
            $categories = array('east');
            foreach ($categories as $category) :
                $args = array(
                    'post_type' => 'facility', // カスタム投稿タイプの指定
                    'area' => $category, // カテゴリーを指定
                    'posts_per_page' => -1 // 取得する投稿数 (-1で全ての投稿を取得)
                );
                $query = new WP_Query($args);
            ?>

                <details class="details js-details">
                    <summary class="details-summary js-details-summary"><span class="btn"></span>
                        <h3 class="acco_title">東部</h3>
                        <!-- <h3 class="acco_title"><?php echo $category; ?></h3> -->
                    </summary>
                    <div class="details-content js-details-content">
                        <div class="article_all">
                            <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                                    <article class="card">
                                        <a href="<?php the_permalink(); ?>">
                                            <div class="card-image">
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
                    'post_type' => 'facility', // カスタム投稿タイプの指定
                    'area' => $category, // カテゴリーを指定
                    'posts_per_page' => -1 // 取得する投稿数 (-1で全ての投稿を取得)
                );
                $query = new WP_Query($args);
            ?>

                <details class="details js-details">
                    <summary class="details-summary js-details-summary"><span class="btn"></span>
                        <h3 class="acco_title">西部</h3>
                        <!-- <h3 class="acco_title"><?php echo $category; ?></h3> -->
                    </summary>
                    <div class="details-content js-details-content">
                        <div class="article_all">
                            <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                                    <article class="card">
                                        <a href="<?php the_permalink(); ?>">
                                            <div class="card-image">
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
                    'post_type' => 'facility', // カスタム投稿タイプの指定
                    'area' => $category, // カテゴリーを指定
                    'posts_per_page' => -1 // 取得する投稿数 (-1で全ての投稿を取得)
                );
                $query = new WP_Query($args);
            ?>
                <details class="details js-details">
                    <summary class="details-summary js-details-summary"><span class="btn"></span>
                        <h3 class="acco_title">南部</h3>
                        <!-- <h3 class="acco_title"><?php echo $category; ?></h3> -->
                    </summary>
                    <div class="details-content js-details-content">
                        <div class="article_all">
                            <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                                    <article class="card">
                                        <a href="<?php the_permalink(); ?>">
                                            <div class="card-image">
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
                            endif; ?>
                        </div>
                    </div>
                </details>

            <?php endforeach; ?>

        </div>

        <button class="back_btn" onclick="history.back">
            <span><i class="fa-solid fa-arrow-left"></i>back</span>
        </button>
    </div>
</main>

<!-- footer.phpを読み込む -->
<?php get_footer(); ?>

<?php


get_header(); ?>

<?php while (have_posts()) : the_post(); ?>

    <main class="pc_inner">
        <div class="container">

            <!-- タイトル -->
            <div class="flex">
                <h2 class="under_line"><?php the_title(); ?></h2>
            </div>

            <!-- マップ -->
            <?php the_field('iframe'); ?>

            <!-- タグ -->
            <div class="hashtag_list">
                <?php
                $course_tags = get_the_terms($post->ID, 'spot-tag');
                if ($course_tags && !is_wp_error($course_tags)) {
                    foreach ($course_tags as $tag) {
                        echo '<a class="hashtag" href="' . get_term_link($tag->slug, 'spot-tag') . '">#' . $tag->name . '</a>';
                    }
                }
                ?>
            </div>

            <!-- 概要 -->
            <div class="summary mt48">
                <h3 class="lined-title">Summary</h3>
                <p><?php the_field('summary'); ?></p>
            </div>

            <!-- 1日目 -->
            <h3 class="lined-title mt48">DAY1</h3>
            <div class="day">
                <!-- １日目の訪問場所 -->
                <div class="spot_list">
                    <?php for ($i = 1; $i <= 5; $i++) : ?>
                        <?php if (get_field('spot_1_' . $i)) : ?>
                            <article class="spot_card">
                                <div class="time sp_none">
                                    <?php the_field('start_time1_' . $i); ?>
                                </div>
                                <div class="contents">
                                    <!-- 画像 -->
                                    <?php the_post_thumbnail(); ?>

                                    <div class="sp_time">
                                        <?php the_field('start_time1_' . $i); ?>
                                    </div>

                                    <!-- タイトル -->
                                    <div class="ttl_list">
                                        <div class="duration"><?php the_field('stay_time1_' . $i); ?></div>
                                        <h4><span><?php the_field('spot_1_' . $i); ?></span></h4>
                                    </div>

                                    <!-- 説明 -->
                                    <p><?php the_field('activity1_' . $i); ?></p>

                                    <!-- 次に向かうスポットがあれば表示 -->
                                    <?php if ($i < 5 && get_field('move_time1_' . ($i + 1))) : ?>
                                        <p class="icon"><?php the_field('move_time1_' . ($i + 1)); ?></p>
                                    <?php endif; ?>
                                </div>
                            </article>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>
            </div>

            <!-- 2日目がある場合宿泊を表示 -->
            <?php if (get_field('spot_stay')) : ?>
                <div class="hotel mt48">
                    <h3 class="lined-title">本日のホテルと温泉</h3>
                    <article class="card spa">
                        <a href="#">
                            <div>
                                <span></span>
                                <?php the_post_thumbnail(); ?>
                            </div>
                            <h3><?php the_field('spot_stay'); ?></h3>
                        </a>
                    </article>
                    <p><?php the_field('move_time_stay'); ?></p>
                </div>
            <?php endif; ?>

            <!-- 2日目 -->
            <?php if (get_field('spot_2_1')) : ?>
                <h3 class="lined-title mt48">DAY2</h3>
                <div class="day">
                    <!-- 2日目の訪問場所 -->
                    <div class="spot_list">
                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                            <?php if (get_field('spot_2_' . $i)) : ?>
                                <article class="spot_card">
                                    <div class="time sp_none">
                                        <?php the_field('start_time2_' . $i); ?>
                                    </div>
                                    <div class="contents">
                                        <!-- 画像 -->
                                        <?php the_post_thumbnail(); ?>

                                        <div class="sp_time">
                                            <?php the_field('start_time2_' . $i); ?>
                                        </div>

                                        <!-- タイトル -->
                                        <div class="ttl_list">
                                            <div class="duration"><?php the_field('stay_time2_' . $i); ?></div>
                                            <h4><span><?php the_field('spot_2_' . $i); ?></span></h4>
                                        </div>

                                        <!-- 説明 -->
                                        <p><?php the_field('activity2_' . $i); ?></p>

                                        <!-- 次に向かうスポットがあれば表示 -->
                                        <?php if ($i < 5 && get_field('move_time2_' . ($i + 1))) : ?>
                                            <p class="icon"><?php the_field('move_time2_' . ($i + 1)); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </article>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </div>
                </div>
            <?php endif; ?>

            <!-- 関連する施設情報 -->
            <section class="recommend mt48">
                <h5>こちらもいかがでしょうか？</h5>
                <div class="article_all">
                    <?php
                    $related_courses = array();
                    for ($i = 1; $i <= 4; $i++) {
                        if ($url = get_field('course_url' . $i)) {
                            $related_post = get_post($url);
                            $related_courses[] = '<article class="card course"><a href="' . get_permalink($url) . '"><div><span></span>' . get_the_post_thumbnail($url, 'full') . '</div><h3>' . get_the_title($url) . '</h3></a></article>';
                        }
                    }
                    if (!empty($related_courses)) {
                        echo implode('', $related_courses);
                    }
                    ?>
                </div>
            </section>

            <!-- 関連するコラム、お知らせ -->
            <section class="connection_column mt48">
                <h5>関連コラム、情報</h5>
                <?php
                $related_posts = array();
                $related_post_types = array('column', 'news');
                foreach ($related_post_types as $post_type) {
                    $related_query = new WP_Query(array(
                        'post_type' => $post_type,
                        'posts_per_page' => 2,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'spot-tag',
                                'field' => 'slug',
                                'terms' => $course_tags
                            )
                        )

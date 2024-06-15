<!-- header.phpを読み込む -->
<?php get_header(); ?>


<main>
    <!-- キービジュアルはbgで表示 -->
    <section class="kv">
        <div class="kv_img">
            <ul class="single-item">
                <li class="slick-img"><img src="<?php echo get_template_directory_uri() ?>/assets/images/kv1.jpg" alt="祖谷温泉"></li>
                <li class="slick-img"><img src="<?php echo get_template_directory_uri() ?>/assets/images/kv2.jpg" alt="祖谷温泉"></li>
                <li class="slick-img"><img src="<?php echo get_template_directory_uri() ?>/assets/images/kv3.jpg" alt="月ケ谷温泉"></li>
                <li class="slick-img"><img src="<?php echo get_template_directory_uri() ?>/assets/images/kv4.jpg" alt="徳島天然温泉あらたえの湯"></li>
                <li class="slick-img"><img src="<?php echo get_template_directory_uri() ?>/assets/images/kv5.jpg" alt="天然温泉えびすの湯"></li>
            </ul>
        </div>
        <h1 class="top_ttl">
            <img src="<?php echo get_template_directory_uri() ?>/assets/images/logo.svg" alt="あわあわ温泉ぶらり">
        </h1>
        <div class="kv_bg"></div>
        <!-- 泡 -->
        <ul class="kv_bubble">
            <li class="kv_bubble_left"></li>
            <li class="kv_bubble_right"></li>
        </ul>
    </section>

    <div class="pc_inner">
        <div class="inner">
            <!-- 概要 -->
            <section class="section-wrap about">
                <!-- 付箋はafter疑似要素で入れる -->
                <div class="sticky_note">
                    <h2 class="section_ttl">湯ったりほっと！</h2>
                </div>
                <div class="section_content">
                    <div class="content_inner">
                        <h3>あわあわ温泉ぶらり<span>とは</span><span>？</span></h3>
                        <!-- サイトの説明 -->
                        <p class="about_txt">
                            「あわあわ温泉ぶらり」は、徳島の温泉情報を集めたポータルサイトです。徳島の温泉地の効能やアクセス、宿泊情報、サ活コラムを提供します。モデルコースや周辺情報、キーワード検索なども充実しており、初めての方でも安心して温泉を楽しむためのサポートを行います。

                        </p>
                    </div>
                    <div class="about_img">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/onsen_saru.svg" alt="おさる">
                    </div>
                    <a class="about_btn btn shadow section_btn" href="<?php echo home_url('/about/'); ?>"">もっと詳しく<i class=" fa-solid fa-list"></i></a>
                </div>
            </section>

            <section class="section-wrap news">
                <div class="sticky_note">
                    <h2 class="section_ttl">お知らせ</h2>
                </div>
                <div class="section_content">
                    <div class="content_inner">
                        <div class="top_news_list">

                            <!-- カード型 -->
                            <?php
                            $args = array(
                                "post_type" => "post", //通常の投稿タイプ
                                "posts_per_page" => 3, //表示する投稿数
                                "orderby" => "date", //日付順に並べる
                                "order" => "DESC" //降順（新しい順）
                            );

                            //WP_Queryオブジェクトを作成
                            $the_query = new WP_Query($args);
                            ?>

                            <?php if ($the_query->have_posts()) : ?>
                            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

                            <article class="top_news_card">
                                <a class="top_news_img" href="<?php the_permalink(); ?>">
                                    <!-- 画像の表示 -->
                                    <?php if (has_post_thumbnail()) : ?>
                                    <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
                                    <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/noimage.png" alt="<?php the_title(); ?>" />
                                    <?php endif; ?>
                                </a>
                                <div class="top_news_contents">
                                    <a href="<?php the_permalink(); ?>">
                                        <!-- 日付の表示。曜日は英語で表記する -->
                                        <p class="date"><?php echo get_the_date("Y.m.d") . "" . date("D H:i", strtotime(get_the_date("Y-m-d H:i:s"))); ?></p>
                                        <p class="title"><?php the_title(); ?></p>
                                    </a>
                                    <div class="hashtag_list">
                                        <!-- カテゴリーの表示 -->
                                        <?php
                                                $categories = get_the_category();
                                                if (!empty($categories)) {
                                                    foreach ($categories as $category) {
                                                        echo '<a href="' . esc_url(get_category_link($category->term_id)) . '" class="hashtag">' . esc_html($category->name) . '</a> ';
                                                    }
                                                }

                                                $tags = get_the_tags();
                                                if (!empty($tags)) {
                                                    foreach ($tags as $tag) {
                                                        echo '<a href="' . esc_url(get_tag_link($tag->term_id)) . '" class="hashtag">' . esc_html($tag->name) . '</a> ';
                                                    }
                                                }
                                                ?>
                                    </div>
                                </div>
                            </article>
                            <?php
                                endwhile;
                            // wp_reset_postdata();
                            endif;
                            ?>

                        </div>
                    </div>
                    <!-- お知らせ一覧ボタン -->
                    <a class="about_btn btn shadow section_btn" href="<?php echo home_url('/category/news/'); ?>">お知らせ一覧へ<i class=" fa-solid fa-list"></i></a>
                </div>
            </section>

            <!-- 温泉 -->
            <section class="section-wrap spa">
                <div class="sticky_note">
                    <h2 class="section_ttl">温泉を探そ</h2>
                </div>
                <div class="section_content">
                    <ul class="slider">

                        <!-- カード型 -->
                        <?php
                        $args = array(
                            "post_type" => "spa", //通常の投稿タイプ
                            "posts_per_page" => 4, //表示する投稿数
                            "orderby" => "rand", //ランダム
                        );

                        //WP_Queryオブジェクトを作成
                        $the_query = new WP_Query($args);
                        ?>

                        <?php if ($the_query->have_posts()) : ?>
                        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

                        <li class="slider_content">
                            <a href="<?php the_permalink(); ?>">
                                <!-- 施設の写真 -->
                                <div class="slider_img">
                                    <?php if (has_post_thumbnail()) : ?>
                                    <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
                                    <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/noimage.png" alt="<?php the_title(); ?>" />
                                    <?php endif; ?>
                                    <span></span>
                                </div>
                                <!-- 施設の名前 -->
                                <h3><?php the_title(); ?></h3>
                            </a>
                        </li>
                        <?php
                            endwhile;
                        endif;
                        ?>

                    </ul>
                    <!-- 温泉情報一覧ボタン -->
                    <a class="spa_btn btn shadow section_btn" href="<?php echo home_url('/spa/'); ?>">温泉情報一覧へ<i class="fa-solid fa-list"></i></a>
                </div>
            </section>

            <!-- 遊ぶ -->
            <section class="section-wrap hobby facility">
                <div class="sticky_note">
                    <h2 class="section_ttl">遊ぶ！</h2>
                </div>
                <div class="section_content">
                    <ul class="slider">

                        <!-- カード型 -->
                        <?php
                        $args = array(
                            "post_type" => "facility", //通常の投稿タイプ
                            "posts_per_page" => 4, //表示する投稿数
                            "orderby" => "rand", //ランダム
                        );

                        // メニューの種類で絞り込む
                        $taxquerysp = ["relation" => "AND"];
                        $taxquerysp[] = [
                            "taxonomy" => "facility_type",
                            "terms" => 'play',
                            "field" => "slug",
                        ];

                        //WP_Queryオブジェクトを作成
                        $args["tax_query"] = $taxquerysp;
                        $the_query = new WP_Query($args);
                        ?>

                        <?php if ($the_query->have_posts()) : ?>
                        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

                        <li class="slider_content">
                            <a href="<?php the_permalink(); ?>">
                                <!-- 温泉の写真 -->
                                <div class="slider_img">
                                    <?php if (has_post_thumbnail()) : ?>
                                    <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
                                    <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/noimage.png" alt="<?php the_title(); ?>" />
                                    <?php endif; ?>
                                    <span></span>
                                </div>
                                <!-- 温泉の名前 -->
                                <h3><?php the_title(); ?></h3>
                            </a>
                        </li>
                        <?php
                            endwhile;
                        endif;
                        ?>
                    </ul>
                    <!-- 周辺情報一覧へボタン -->
                    <a class="facility_btn btn shadow section_btn" href="<?php echo home_url('facility_type/play/'); ?>">周辺情報一覧へ<i class="fa-solid fa-list"></i></a>
                </div>
            </section>

            <!-- 食べる -->
            <section class="section-wrap food facility">
                <div class="sticky_note">
                    <h2 class="section_ttl">食べる！</h2>
                </div>
                <div class="section_content">
                    <ul class="slider">

                        <!-- カード型 -->
                        <?php
                        $args = array(
                            "post_type" => "facility", //通常の投稿タイプ
                            "posts_per_page" => 4, //表示する投稿数
                            "orderby" => "rand", //ランダム
                        );

                        // メニューの種類で絞り込む
                        $taxquerysp = ["relation" => "AND"];
                        $taxquerysp[] = [
                            "taxonomy" => "facility_type",
                            "terms" => 'gourmet',
                            "field" => "slug",
                        ];

                        //WP_Queryオブジェクトを作成
                        $args["tax_query"] = $taxquerysp;
                        $the_query = new WP_Query($args);
                        ?>

                        <?php if ($the_query->have_posts()) : ?>
                        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

                        <li class="slider_content">
                            <a href="<?php the_permalink(); ?>">
                                <!-- 温泉の写真 -->
                                <div class="slider_img">
                                    <?php if (has_post_thumbnail()) : ?>
                                    <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
                                    <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/noimage.png" alt="<?php the_title(); ?>" />
                                    <?php endif; ?>
                                    <span></span>
                                </div>
                                <!-- 温泉の名前 -->
                                <h3><?php the_title(); ?></h3>
                            </a>
                        </li>
                        <?php
                            endwhile;
                        endif;
                        ?>
                    </ul>
                    <!-- 周辺情報一覧ボタン -->
                    <a class="facility_btn btn shadow section_btn" href="<?php echo home_url('facility_type/gourmet/'); ?>">周辺情報一覧へ<i class="fa-solid fa-list"></i></a>
                </div>
            </section>

            <!-- ショッピング -->
            <section class="section-wrap photo facility">
                <div class="sticky_note">
                    <h2 class="section_ttl">ショッピング</h2>
                </div>
                <div class="section_content">
                    <ul class="slider">

                        <!-- カード型 -->
                        <?php
                        $args = array(
                            "post_type" => "facility", //通常の投稿タイプ
                            "posts_per_page" => 4, //表示する投稿数
                            "orderby" => "rand", //ランダム
                        );

                        // メニューの種類で絞り込む
                        $taxquerysp = ["relation" => "AND"];
                        $taxquerysp[] = [
                            "taxonomy" => "facility_type",
                            "terms" => 'shopping',
                            "field" => "slug",
                        ];

                        //WP_Queryオブジェクトを作成
                        $args["tax_query"] = $taxquerysp;
                        $the_query = new WP_Query($args);
                        ?>

                        <?php if ($the_query->have_posts()) : ?>
                        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

                        <li class="slider_content">
                            <a href="<?php the_permalink(); ?>">
                                <!-- 温泉の写真 -->
                                <div class="slider_img">
                                    <?php if (has_post_thumbnail()) : ?>
                                    <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
                                    <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/noimage.png" alt="<?php the_title(); ?>" />
                                    <?php endif; ?>
                                    <span></span>
                                </div>
                                <!-- 温泉の名前 -->
                                <h3><?php the_title(); ?></h3>
                            </a>
                        </li>
                        <?php
                            endwhile;
                        endif;
                        ?>
                    </ul>
                    <!-- 周辺情報一覧ボタン -->
                    <a class="facility_btn btn shadow section_btn" href="<?php echo home_url('facility_type/shopping/'); ?>">周辺情報一覧へ<i class="fa-solid fa-list"></i></a>
                </div>
            </section>

            <!-- モデルコース -->
            <section class="section-wrap course">
                <div class="sticky_note">
                    <h2 class="section_ttl">モデルコース</h2>
                </div>
                <div class="section_content">
                    <ul class="slider">

                        <!-- カード型 -->
                        <?php
                        $args = array(
                            "post_type" => "course", //通常の投稿タイプ
                            "posts_per_page" => 4, //表示する投稿数
                            "orderby" => "rand", //ランダム
                        );

                        //WP_Queryオブジェクトを作成
                        $the_query = new WP_Query($args);
                        ?>

                        <?php if ($the_query->have_posts()) : ?>
                        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

                        <li class="slider_content">
                            <a href="<?php the_permalink(); ?>">
                                <!-- 施設の写真 -->
                                <div class="slider_img">
                                    <?php if (has_post_thumbnail()) : ?>
                                    <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
                                    <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/noimage.png" alt="<?php the_title(); ?>" />
                                    <?php endif; ?>
                                    <span></span>
                                </div>
                                <!-- 施設の名前 -->
                                <h3><?php the_title(); ?></h3>
                            </a>
                        </li>
                        <?php
                            endwhile;
                        endif;
                        ?>

                    </ul>
                    <!-- モデルコース一覧へ -->
                    <a class="course_btn btn shadow section_btn" href="<?php echo home_url('/course_type/tour/'); ?>">モデルコース一覧へ<i class="fa-solid fa-list"></i></a>
                </div>
            </section>

            <!-- サウナ -->
            <section class="section-wrap sauna">
                <div class="sticky_note">
                    <h2 class="section_ttl">整う！</h2>
                </div>
                <div class="section_content">
                    <div class="sauna_content">
                        <!-- サル -->
                        <a href="<?php echo home_url('/sauna/'); ?>" class="slider_img sauna_img">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/sauna_saru.jpg" alt="サウナ">
                            <span></span>
                        </a>
                        <a href="<?php echo home_url('/sauna/'); ?>" class="sauna_btn btn shadow">サ活とは？<i class="fa-solid fa-list"></i></a>
                    </div>
                </div>
            </section>

            <!-- コラム -->
            <section class="section-wrap column">
                <div class="sticky_note">
                    <h2 class="section_ttl">コラム</h2>
                </div>
                <div class="section_content">
                    <div class="content_inner">
                        <div class="top_news_list">

                            <!-- カード型 -->
                            <?php
                            $args = array(
                                "post_type" => "column", //通常の投稿タイプ
                                "posts_per_page" => 3, //表示する投稿数
                                "orderby" => "date", //日付順に並べる
                                "order" => "DESC" //降順（新しい順）
                            );

                            //WP_Queryオブジェクトを作成
                            $the_query = new WP_Query($args);
                            ?>

                            <?php if ($the_query->have_posts()) : ?>
                            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

                            <article class="top_news_card">
                                <a class="top_news_img" href="<?php the_permalink(); ?>">
                                    <!-- 画像の表示 -->
                                    <?php if (has_post_thumbnail()) : ?>
                                    <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
                                    <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/noimage.png" alt="<?php the_title(); ?>" />
                                    <?php endif; ?>
                                </a>
                                <div class="top_news_contents">
                                    <a href="<?php the_permalink(); ?>">
                                        <!-- 日付の表示。曜日は英語で表記する -->
                                        <p class="date"><?php echo get_the_date("Y.m.d") . "" . date("D H:i", strtotime(get_the_date("Y-m-d H:i:s"))); ?></p>
                                        <p class="title"><?php the_title(); ?></p>
                                    </a>
                                    <div class="hashtag_list">
                                        <!-- カテゴリーの表示 -->
                                        <?php
                                                $categories = get_the_category();
                                                if (!empty($categories)) {
                                                    foreach ($categories as $category) {
                                                        echo '<a href="' . esc_url(get_category_link($category->term_id)) . '" class="hashtag">' . esc_html($category->name) . '</a> ';
                                                    }
                                                }

                                                $tags = get_the_tags();
                                                if (!empty($tags)) {
                                                    foreach ($tags as $tag) {
                                                        echo '<a href="' . esc_url(get_tag_link($tag->term_id)) . '" class="hashtag">' . esc_html($tag->name) . '</a> ';
                                                    }
                                                }
                                                ?>
                                    </div>
                                </div>
                            </article>
                            <?php
                                endwhile;
                                wp_reset_postdata();
                            endif;
                            ?>

                        </div>
                    </div>
                    <!-- お知らせ一覧ボタン -->
                    <a class="column_btn btn shadow section_btn" href="<?php echo home_url('column_type/spa-column/'); ?>">コラム一覧へ<i class="fa-solid fa-list"></i></a>
                </div>
            </section>
        </div>
    </div>
</main>

<!-- footer.phpを読み込む -->
<?php get_footer(); ?>

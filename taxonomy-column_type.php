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
                <ul class="tag element03">
                    <li class="active"><a href="#">温泉</a></li>
                    <li><a href="#">温泉周辺<br>施設紹介</a></li>
                    <li><a href="#">お役立ち</a></li>
                </ul>

                <!-- 一覧 -->
                <div class="news_list">

                    <!-- 記事があるとき -->
                    <?php while (have_posts()) : ?>
                        <?php the_post(); ?>

                        <article <?php post_class('news_card'); ?>>
                            <!-- コラム画像getここから -->
                            <?php
                            $pic = get_field('column_pic');
                            $pic_url = $pic['sizes']['thumbnail'];
                            ?>

                            <!-- コラム画像getここまで-->
                            <a href=" <?php the_permalink(); ?>"><img src="<?php echo $pic_url; ?>" alt=""></a>
                            <div class="news_cintents">
                                <a href="<?php the_permalink(); ?>">
                                    <p class="date fugaz-one-regular"><?php echo get_post_time('Y.m.d.D H:i'); ?></p>
                                    <h6 class="title"><?php the_title(); ?></h6>
                                </a>
                                <!-- ハッシュタグ取得記述をする -->

                                <?php
                                $categories = get_the_category();
                                if ($categories) : ?>

                                    <div class="hashtag_list">

                                        <?php foreach ($categories as $category) : ?>

                                            <a href="https://fontawesome.com/" class="hashtag"><?php echo $category->name; ?>#fontawesome</a>
                                            <a href="https://cdnjs.com/" class="hashtag">#cdn</a>
                                            <a href="https://tech-unlimited.com/color.html" class="hashtag">#ジェネレーター</a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        </article>
                    <?php endwhile; ?>
                    <!-- 一つの記事ここまで -->



                    <article class="news_card">
                        <a href="http://bzclass.bizan.com/adm/mainte.asp?comp_id=1&koza_id=92"><img src="../assets/images/bike.jpg" alt=""></a>
                        <div class="news_cintents">
                            <a href="http://bzclass.bizan.com/adm/mainte.asp?comp_id=1&koza_id=92">
                                <p class="date fugaz-one-regular">2024.06.05.mon 10:00</p>
                                <h6 class="title">講習会管理システムのログイン画面にいきます！</h6>
                            </a>
                            <div class="hashtag_list">
                                <a href="https://fontawesome.com/" class="hashtag">#fontawesome</a>
                                <a href="https://cdnjs.com/" class="hashtag">#cdn</a>
                                <a href="https://tech-unlimited.com/color.html" class="hashtag">#ジェネレーター</a>
                            </div>
                        </div>
                    </article>
                    <article class="news_card">
                        <a href="http://bzclass.bizan.com/adm/mainte.asp?comp_id=1&koza_id=92"><img src="../assets/images/bike.jpg" alt=""></a>
                        <div class="news_cintents">
                            <a href="http://bzclass.bizan.com/adm/mainte.asp?comp_id=1&koza_id=92">
                                <p class="date fugaz-one-regular">2024.06.05.mon 10:00</p>
                                <h6 class="title">講習会管理システムのログイン画面にいきます！</h6>
                            </a>
                            <div class="hashtag_list">
                                <a href="https://fontawesome.com/" class="hashtag">#fontawesome</a>
                                <a href="https://cdnjs.com/" class="hashtag">#cdn</a>
                                <a href="https://tech-unlimited.com/color.html" class="hashtag">#ジェネレーター</a>
                            </div>
                        </div>
                    </article>
                    <article class="news_card">
                        <a href="http://bzclass.bizan.com/adm/mainte.asp?comp_id=1&koza_id=92"><img src="../assets/images/bike.jpg" alt=""></a>
                        <div class="news_cintents">
                            <a href="http://bzclass.bizan.com/adm/mainte.asp?comp_id=1&koza_id=92">
                                <p class="date fugaz-one-regular">2024.06.05.mon 10:00</p>
                                <h6 class="title">講習会管理システムのログイン画面にいきます！</h6>
                            </a>
                            <div class="hashtag_list">
                                <a href="https://fontawesome.com/" class="hashtag">#fontawesome</a>
                                <a href="https://cdnjs.com/" class="hashtag">#cdn</a>
                                <a href="https://tech-unlimited.com/color.html" class="hashtag">#ジェネレーター</a>
                            </div>
                        </div>
                    </article>
                    <article class="news_card">
                        <a href="http://bzclass.bizan.com/adm/mainte.asp?comp_id=1&koza_id=92"><img src="../assets/images/bike.jpg" alt=""></a>
                        <div class="news_cintents">
                            <a href="http://bzclass.bizan.com/adm/mainte.asp?comp_id=1&koza_id=92">
                                <p class="date fugaz-one-regular">2024.06.05.mon 10:00</p>
                                <h6 class="title">講習会管理システムのログイン画面にいきます！</h6>
                            </a>
                            <div class="hashtag_list">
                                <a href="https://fontawesome.com/" class="hashtag">#fontawesome</a>
                                <a href="https://cdnjs.com/" class="hashtag">#cdn</a>
                                <a href="https://tech-unlimited.com/color.html" class="hashtag">#ジェネレーター</a>
                            </div>
                        </div>
                    </article>

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

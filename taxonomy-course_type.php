<!-- header.phpを読み込む -->
<?php get_header(); ?>

<main class="pc_inner">
    <div class="container">
        <section>
            <h2 class="under_line">モデルコース一覧</h2>

            <!-- パンくずリスト -->
            <?php get_template_part('template-parts/breadcrumb') ?>

            <!-- タグ -->
            <ul class="tag element04">
                <li class="active"><a href="<?php echo home_url('/course_type/tour/'); ?>">ツーリング</a></li>
                <li class="active"><a href="<?php echo home_url('/course_type/rafting/'); ?>">ラフティング</a></li>
                <li class="active"><a href="<?php echo home_url('/course_type/photogenic/'); ?>">映える</a></li>
                <li class="active"><a href="<?php echo home_url('/course_type/hiking/'); ?>">ハイキング</a></li>
            </ul>

        <!-- 一覧 -->
        <div class="article_all">
            <article class="card">
                <!-- WordPressのルールの開始 -->
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : ?>
                    <?php the_post(); ?>

                    <!-- カード型の開始 -->
                    <?php get_template_part('template-parts/loop', 'course'); ?>
                    <!-- カード型の終了 -->

                    <!-- WordPressのルールの終了 -->
                    <?php endwhile; ?>
                    <?php endif; ?>
            </article>


            

            </div>

        </section>

    <!-- ぺージナビゲーション -->
    <?php if (function_exists('wp_pagenavi')) : ?>
                    <div class="pagination">
                        <?php wp_pagenavi(); ?>
                    </div>
                    <button class="back_btn" onclick="history.back">
                    <span><i class="fa-solid fa-arrow-left"></i>back</span>
                    </button>

    </div>
</main>

<!-- footer.phpを読み込む -->
<?php get_footer(); ?>

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
            <div class="modelcourse_list">
                <article class="card">
                    <?php if (have_posts()) : ?>
                        <?php while (have_posts()) : the_post(); ?>
                            <div>
                                <span></span>
                                <?php get_template_part('template_parts/loop', 'course'); ?>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>

                    <!-- <a href="https://translate.google.co.jp/?hl=ja&tab=TT&sl=auto&tl=en&op=translate">
                    <div>
                        <span></span>
                        <img src="../assets/images/onsen_img.jpg" alt="" />
                    </div>
                    <h3>最南端！！空と海を感じるツーリングコース！！！</h3>
                </a> -->
                </article>

                <article class="card">
                    <a href="https://translate.google.co.jp/?hl=ja&tab=TT&sl=auto&tl=en&op=translate">
                        <div>
                            <span></span>
                            <img src="../assets/images/onsen_img.jpg" alt="" />
                        </div>
                        <h3>最南端！！空と海を感じるツーリングコース！！！</h3>
                    </a>
                </article>
                <article class="card">
                    <a href="https://translate.google.co.jp/?hl=ja&tab=TT&sl=auto&tl=en&op=translate">
                        <div>
                            <span></span>
                            <img src="../assets/images/onsen_img.jpg" alt="" />
                        </div>
                        <h3>最南端！！空と海を感じるツーリングコース！！！</h3>
                    </a>
                </article>
                <article class="card">
                    <a href="https://translate.google.co.jp/?hl=ja&tab=TT&sl=auto&tl=en&op=translate">
                        <div>
                            <span></span>
                            <img src="../assets/images/onsen_img.jpg" alt="" />
                        </div>
                        <h3>最南端！！空と海を感じるツーリングコース！！！</h3>
                    </a>
                </article>
                <article class="card">
                    <a href="https://translate.google.co.jp/?hl=ja&tab=TT&sl=auto&tl=en&op=translate">
                        <div>
                            <span></span>
                            <img src="../assets/images/onsen_img.jpg" alt="" />
                        </div>
                        <h3>最南端！！空と海を感じるツーリングコース！！！</h3>
                    </a>
                </article>



            </div>

        </section>

        <!-- ページネーション -->
        <p class="pagination">
            << 1　2　3　4　5>>
        </p>

    </div>
</main>

<!-- footer.phpを読み込む -->
<?php get_footer(); ?>

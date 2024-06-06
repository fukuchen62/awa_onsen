<!-- header.phpを読み込む -->
<?php get_header(); ?>

<main>
    <section>
        <h2 class="under_line">モデルコース一覧</h2>

        <!-- パンくずリスト -->
        <?php get_template_part('template-parts/breadcrumb') ?>
        <!-- タグ -->
        <ul class="info_tag">
            <li class="touring_tag">ツーリング</li>
            <li class="rafting_tag">ラフティング</li>
            <li class="lookpretty_tag">映える</li>
            <li class="hiking_tag">ハイキング</li>
        </ul>

        <!-- 一覧 -->
        <div class="modelcourse_list">
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


</main>

<!-- footer.phpを読み込む -->
<?php get_footer(); ?>

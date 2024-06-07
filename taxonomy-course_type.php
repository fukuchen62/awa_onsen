<!-- header.phpを読み込む -->
<?php get_header(); ?>

<main>
    <section>
        <h2 class="under_line">モデルコース一覧</h2>

        <!-- パンくずリスト -->
        <?php get_template_part('template-parts/breadcrumb') ?>

        <!-- タグ -->
        <ul class="tag element04">
            <li class="active"><a href="#">ツーリング</a></li>
            <li><a href="#">ラフティング</a></li>
            <li><a href="#">映える</a></li>
            <li><a href="#">ハイキング</a></li>
        </ul>

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

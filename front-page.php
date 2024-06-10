<!-- header.phpを読み込む -->
<?php get_header(); ?>


<main>
    <!-- キービジュアルはbgで表示 -->
    <section class="kv">
        <h1 class="top_ttl">
            <img src="<?php echo get_template_directory_uri() ?>./assets/images/logo.svg" alt="あわあわ温泉ぶらり">
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
                        <img src="<?php echo get_template_directory_uri() ?>./assets/images/onsen_saru.svg" alt="おさる">
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

                            <article class="top_news_card">
                                <a class="top_news_img" href="#"><img src="<?php echo get_template_directory_uri() ?>./assets/images/bike.jpg" alt="バイク"></a>
                                <div class="top_news_contents">
                                    <a href="http://bzclass.bizan.com/adm/mainte.asp?comp_id=1&koza_id=92">
                                        <p class="date">2024.06.05.mon 10:00</p>
                                        <h6 class="title">講習会管理システムのログイン画面にいきません！</h6>
                                    </a>
                                    <div class="hashtag_list">
                                        <a href="https://fontawesome.com/" class="hashtag">お知らせ</a>
                                    </div>
                                </div>
                            </article>
                            <!-- カード型 -->
                            <article class="top_news_card">
                                <a class="top_news_img" href="#"><img src="<?php echo get_template_directory_uri() ?>./assets/images/bike.jpg" alt="バイク"></a>
                                <div class="top_news_contents">
                                    <a href="http://bzclass.bizan.com/adm/mainte.asp?comp_id=1&koza_id=92">
                                        <p class="date">2024.06.05.mon 10:00</p>
                                        <h6 class="title">講習会管理システムのログイン画面にいきません！</h6>
                                    </a>
                                    <div class="hashtag_list">
                                        <a href="https://fontawesome.com/" class="hashtag">お知らせ</a>
                                    </div>
                                </div>
                            </article>
                            <!-- カード型 -->
                            <article class="top_news_card">
                                <a class="top_news_img" href="#"><img src="<?php echo get_template_directory_uri() ?>./assets/images/bike.jpg" alt="バイク"></a>
                                <div class="top_news_contents">
                                    <a href="http://bzclass.bizan.com/adm/mainte.asp?comp_id=1&koza_id=92">
                                        <p class="date">2024.06.05.mon 10:00</p>
                                        <h6 class="title">講習会管理システムのログイン画面にいきません！</h6>
                                    </a>
                                    <div class="hashtag_list">
                                        <a href="https://fontawesome.com/" class="hashtag">お知らせ</a>
                                    </div>
                                </div>
                            </article>
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
                        <li class="slider_content">
                            <a href="#">
                                <!-- 温泉の写真 -->
                                <div class="slider_img">
                                    <img src="<?php echo get_template_directory_uri() ?>./assets/images/onsen_img.jpg" alt="温泉">
                                    <span></span>
                                </div>
                                <!-- 温泉の名前 -->
                                <h3>峡谷の湯宿 大歩危峡まんなか 大歩危温泉</h3>
                            </a>
                        </li>
                        <li class="slider_content">
                            <a href="#">
                                <!-- 温泉の写真 -->
                                <div class="slider_img">
                                    <img src="<?php echo get_template_directory_uri() ?>./assets/images/kv.jpg" alt="温泉">
                                    <span></span>
                                </div>
                                <!-- 温泉の名前 -->
                                <h3>安岡温泉</h3>
                            </a>
                        </li>
                        <li class="slider_content">
                            <a href="#">
                                <!-- 温泉の写真 -->
                                <div class="slider_img">
                                    <img src="<?php echo get_template_directory_uri() ?>./assets/images/onsen_img.jpg" alt="温泉">
                                    <span></span>
                                </div>
                                <!-- 温泉の名前 -->
                                <h3>松尾温泉</h3>
                            </a>
                        </li>
                        <li class="slider_content">
                            <a href="#">
                                <!-- 温泉の写真 -->
                                <div class="slider_img">
                                    <img src="<?php echo get_template_directory_uri() ?>./assets/images/kv.jpg" alt="温泉">
                                    <span></span>
                                </div>
                                <!-- 温泉の名前 -->
                                <h3>いまむー温泉</h3>
                            </a>
                        </li>
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
                        <li class="slider_content">
                            <a href="#">
                                <!-- 遊ぶ写真 -->
                                <div class="slider_img">
                                    <img src="<?php echo get_template_directory_uri() ?>./assets/images/river.jpg" alt="ラフティング">
                                    <span></span>
                                </div>
                                <!-- 名前 -->
                                <h3>吉野川でラフティング</h3>
                            </a>
                        </li>
                        <li class="slider_content">
                            <a href="#">
                                <!-- 遊ぶ写真 -->
                                <div class="slider_img">
                                    <img src="<?php echo get_template_directory_uri() ?>./assets/images/bike.jpg" alt="ツーリング">
                                    <span></span>
                                </div>
                                <!-- 名前 -->
                                <h3>自然を感じてツーリング</h3>
                            </a>
                        </li>
                        <li class="slider_content">
                            <a href="#">
                                <!-- 遊ぶ写真 -->
                                <div class="slider_img">
                                    <img src="<?php echo get_template_directory_uri() ?>./assets/images/river.jpg" alt="ラフティング">
                                    <span></span>
                                </div>
                                <!-- 名前 -->
                                <h3>吉野川と思ったら穴吹川でラフティング</h3>
                            </a>
                        </li>
                        <li class="slider_content">
                            <a href="#">
                                <!-- 遊ぶ写真 -->
                                <div class="slider_img">
                                    <img src="<?php echo get_template_directory_uri() ?>./assets/images/bike.jpg" alt="ツーリング">
                                    <span></span>
                                </div>
                                <!-- 名前 -->
                                <h3>尾花さんが休日に楽しんでツーリング</h3>
                            </a>
                        </li>
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
                        <li class="slider_content">
                            <a href="#">
                                <!-- グルメ写真 -->
                                <div class="slider_img">
                                    <img src="<?php echo get_template_directory_uri() ?>./assets/images/bike.jpg" alt="グルメ">
                                    <span></span>
                                </div>
                                <!-- 名前 -->
                                <h3>おいしいお蕎麦屋さん</h3>
                            </a>
                        </li>
                        <li class="slider_content">
                            <a href="#">
                                <!-- グルメ写真 -->
                                <div class="slider_img">
                                    <img src="<?php echo get_template_directory_uri() ?>./assets/images/river.jpg" alt="グルメ">
                                    <span></span>
                                </div>
                                <!-- 名前 -->
                                <h3>ちょっとおいしい焼き鳥屋さん</h3>
                            </a>
                        </li>
                        <li class="slider_content">
                            <a href="#">
                                <!-- グルメ写真 -->
                                <div class="slider_img">
                                    <img src="<?php echo get_template_directory_uri() ?>./assets/images/bike.jpg" alt="グルメ">
                                    <span></span>
                                </div>
                                <!-- 名前 -->
                                <h3>居酒屋　晴れ屋</h3>
                            </a>
                        </li>
                        <li class="slider_content">
                            <a href="#">
                                <!-- グルメ写真 -->
                                <div class="slider_img">
                                    <img src="<?php echo get_template_directory_uri() ?>./assets/images/river.jpg" alt="グルメ">
                                    <span></span>
                                </div>
                                <!-- 名前 -->
                                <h3>定食屋橘</h3>
                            </a>
                        </li>
                    </ul>
                    <!-- 周辺情報一覧ボタン -->
                    <a class="facility_btn btn shadow section_btn" href="<?php echo home_url('facility_type/gourmet/'); ?>">周辺情報一覧へ<i class="fa-solid fa-list"></i></a>
                </div>
            </section>

            <!-- 映え -->
            <section class="section-wrap photo facility">
                <div class="sticky_note">
                    <h2 class="section_ttl">映え</h2>
                </div>
                <div class="section_content">
                    <ul class="slider">
                        <li class="slider_content">
                            <a href="#">
                                <!-- 写真 -->
                                <div class="slider_img">
                                    <img src="<?php echo get_template_directory_uri() ?>./assets/images/bike.jpg" alt="映え写真">
                                    <span></span>
                                </div>
                                <!-- 名前 -->
                                <h3>インスタ映えするスポット</h3>
                            </a>
                        </li>
                        <li class="slider_content">
                            <a href="#">
                                <!-- 写真 -->
                                <div class="slider_img">
                                    <img src="<?php echo get_template_directory_uri() ?>./assets/images/river.jpg" alt="映え写真">
                                    <span></span>
                                </div>
                                <!-- 名前 -->
                                <h3>おしゃれな写真</h3>
                            </a>
                        </li>
                        <li class="slider_content">
                            <a href="#">
                                <!-- 写真 -->
                                <div class="slider_img">
                                    <img src="<?php echo get_template_directory_uri() ?>./assets/images/bike.jpg" alt="映え写真">
                                    <span></span>
                                </div>
                                <!-- 名前 -->
                                <h3>インスタ映えするスポット</h3>
                            </a>
                        </li>
                        <li class="slider_content">
                            <a href="#">
                                <!-- 写真 -->
                                <div class="slider_img">
                                    <img src="<?php echo get_template_directory_uri() ?>./assets/images/river.jpg" alt="映える写真">
                                    <span></span>
                                </div>
                                <!-- 名前 -->
                                <h3>おしゃれな写真</h3>
                            </a>
                        </li>
                    </ul>
                    <!-- 周辺情報一覧ボタン -->
                    <a class="facility_btn btn shadow section_btn" href="<?php echo home_url('facility_type/photogenic/'); ?>">周辺情報一覧へ<i class="fa-solid fa-list"></i></a>
                </div>
            </section>

            <!-- モデルコース -->
            <section class="section-wrap course">
                <div class="sticky_note">
                    <h2 class="section_ttl">モデルコース</h2>
                </div>
                <div class="section_content">
                    <ul class="slider">
                        <li class="slider_content">
                            <a href="#">
                                <!-- 写真 -->
                                <div class="slider_img">
                                    <img src="<?php echo get_template_directory_uri() ?>./assets/images/bike.jpg" alt="ツーリング">
                                    <span></span>
                                </div>
                                <!-- 名前 -->
                                <h3>県南ツーリングコース</h3>
                            </a>
                        </li>
                        <li class="slider_content">
                            <a href="#">
                                <!-- 写真 -->
                                <div class="slider_img">
                                    <img src="<?php echo get_template_directory_uri() ?>./assets/images/river.jpg" alt="ラフティング">
                                    <span></span>
                                </div>
                                <!-- 名前 -->
                                <h3>大自然ラフティングコース</h3>
                            </a>
                        </li>
                        <li class="slider_content">
                            <a href="#">
                                <!-- 写真 -->
                                <div class="slider_img">
                                    <img src="<?php echo get_template_directory_uri() ?>./assets/images/bike.jpg" alt="ツーリング">
                                    <span></span>
                                </div>
                                <!-- 名前 -->
                                <h3>県南ツーリングコース</h3>
                            </a>
                        </li>
                        <li class="slider_content">
                            <a href="#">
                                <!-- 写真 -->
                                <div class="slider_img">
                                    <img src="<?php echo get_template_directory_uri() ?>./assets/images/river.jpg" alt="ラフティング">
                                    <span></span>
                                </div>
                                <!-- 名前 -->
                                <h3>大自然ラフティングコース</h3>
                            </a>
                        </li>
                    </ul>
                    <!-- モデルコース一覧へ -->
                    <a class="course_btn btn shadow section_btn" href="<?php echo home_url('facility_type/tour/'); ?>">モデルコース一覧へ<i class="fa-solid fa-list"></i></a>
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
                        <a href="sauna.html" class="slider_img sauna_img">
                            <img src="<?php echo get_template_directory_uri() ?>./assets/images/sauna_saru.jpg" alt="サウナ">
                            <span></span>
                        </a>
                        <a href="sauna.html" class="sauna_btn btn shadow">サ活とは？<i class="fa-solid fa-list"></i></a>
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
                            <article class="top_news_card">
                                <a class="top_news_img" href="#"><img src="<?php echo get_template_directory_uri() ?>./assets/images/bike.jpg" alt="バイク"></a>
                                <div class="top_news_contents">
                                    <a href="http://bzclass.bizan.com/adm/mainte.asp?comp_id=1&koza_id=92">
                                        <p class="date">2024.06.05.mon 10:00</p>
                                        <h6 class="title">講習会管理システムのログイン画面にいきません！</h6>
                                    </a>
                                    <div class="hashtag_list">
                                        <a href="https://fontawesome.com/" class="hashtag">お知らせ</a>
                                    </div>
                                </div>
                            </article>
                            <!-- カード型 -->
                            <article class="top_news_card">
                                <a class="top_news_img" href="#"><img src="<?php echo get_template_directory_uri() ?>./assets/images/bike.jpg" alt="バイク"></a>
                                <div class="top_news_contents">
                                    <a href="http://bzclass.bizan.com/adm/mainte.asp?comp_id=1&koza_id=92">
                                        <p class="date">2024.06.05.mon 10:00</p>
                                        <h6 class="title">講習会管理システムのログイン画面にいきません！</h6>
                                    </a>
                                    <div class="hashtag_list">
                                        <a href="https://fontawesome.com/" class="hashtag">お知らせ</a>
                                    </div>
                                </div>
                            </article>
                            <!-- カード型 -->
                            <article class="top_news_card">
                                <a class="top_news_img" href="#"><img src="<?php echo get_template_directory_uri() ?>./assets/images/bike.jpg" alt="バイク"></a>
                                <div class="top_news_contents">
                                    <a href="http://bzclass.bizan.com/adm/mainte.asp?comp_id=1&koza_id=92">
                                        <p class="date">2024.06.05.mon 10:00</p>
                                        <h6 class="title">講習会管理システムのログイン画面にいきません！</h6>
                                    </a>
                                    <div class="hashtag_list">
                                        <a href="https://fontawesome.com/" class="hashtag">お知らせ</a>
                                    </div>
                                </div>
                            </article>
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

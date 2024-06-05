<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- 概要入れる -->
    <meta name="description" content="">
    <title>モデルコース一覧</title>
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic&display=swap" rel="stylesheet">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- googleicon CDN -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <!-- リセットCSS -->
    <link rel="stylesheet" href="../assets/css/destyle.css">
    <!-- common.css -->
    <link rel="stylesheet" href="../assets/css/common.css">
    <!-- course_list.css -->
    <link rel="stylesheet" href="../assets/css/course_list.css">
</head>

<body>
    <div class="bubble_background">
        <div class="container">
            <header></header>
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
        </div>
        <footer></footer>
    </div>
    <script src="../assets/js/vendor/jquery-3.6.0.min.js"></script>

    <script src="../assets/js/common.js"></script>

</body>

</html>

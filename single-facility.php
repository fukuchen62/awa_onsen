<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>. /assets/css/reset.css" media=" all" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>. /assets/css/common.css" media="all" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>. /assets/css/nearby.css" media="all" />
    <!-- フォントオーサム -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <!-- google_icon CDN -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <!-- グーグルフォント -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fugaz+One&display=swap" rel="stylesheet">
</head>

<body>
    <div class="bubble_background">
        <div class="container">
            <main>
                <?php
                if (have_posts()) :
                    while (have_posts()) : the_post(); ?>

                        <h2 class="under_line"><?php the_title(); ?></h2>
                        <!-- パンくず -->

                        <!-- 外観写真 -->
                        <div class="img_box">
                            <?php
                            $pic = get_field('facility_pic1');
                            $pic_url = $pic['sizes']['large'];
                            ?>
                            <img src="<?php echo $pic_url; ?>" alt="メイン画像">
                            <!-- <img src="../assets/images/bike.jpg" alt=""> -->
                            <label class="checkbox-item">
                                <input type="checkbox" name="options" value="nice">
                                <span class="nice_btn">
                                    <i class="fa-regular fa-thumbs-up"></i><br>
                                    <span>11</span>
                                </span>
                            </label>
                            <label class="checkbox-item">
                                <input type="checkbox" name="options" value="favorite">
                                <span class="favorite_btn"><i class="fa-solid fa-heart"></i>
                                    <i class="fa-regular fa-heart"></i></span>
                            </label>
                        </div>

                        <!-- ハッシュタグ -->

                        <div class="hashtag_list">
                            <?php
                            // 現在の投稿のIDを取得
                            $post_id = get_the_ID();

                            // 投稿タイプを取得
                            $post_type = get_post_type($post_id);

                            // 投稿タイプに関連するタクソノミーを取得
                            $taxonomies = get_object_taxonomies($post_type);

                            if (!empty($taxonomies)) {
                                foreach ($taxonomies as $taxonomy) {
                                    // タクソノミーに関連するタームを取得
                                    $terms = get_the_terms($post_id, $taxonomy);

                                    if ($terms && !is_wp_error($terms)) {
                                        echo '<ul>';
                                        foreach ($terms as $term) {
                                            // echo '<li>';
                            ?>
                                            <a href="https://www.yahoo.co.jp/" class="hashtag"><?php echo '#' . esc_html($term->name); ?></a>
                            <?php
                                        }
                                        echo '</ul>';
                                    } else {
                                    }
                                }
                            } else {
                            }
                            ?>
                        </div>

                        <section class="shop_information">
                            <h3 class="lined-title">店舗情報</h3>
                            <dl>
                                <dt>施設名</dt>
                                <dd>
                                    <?php the_field('facility_name'); ?>
                                </dd>
                                <dt>施設紹介</dt>
                                <dd>
                                    <?php the_field('facility_description'); ?>
                                </dd>
                                <dt>郵便番号</dt>
                                <dd>
                                    <?php the_field('post_code'); ?>
                                </dd>
                                <dt>住所</dt>
                                <dd>
                                    <?php the_field('address1'); ?>
                                </dd>
                                <dd>
                                    <?php the_field('address2'); ?>
                                </dd>
                                <dt>電話番号</dt>
                                <dd>
                                    <?php the_field('tel'); ?>
                                </dd>
                                <dt>営業時間</dt>
                                <dd>
                                    <?php the_field('business_time'); ?>
                                </dd>
                                <dt>定休日</dt>
                                <dd>
                                    <?php the_field('closed'); ?>
                                </dd>
                                <dt>料金</dt>
                                <dd>
                                    <?php the_field('price'); ?>
                                </dd>
                                <dt>決済方法</dt>
                                <dd>
                                    <?php the_field('payment_description'); ?>
                                </dd>
                                <dt>予約</dt>
                                <dd>
                                    <?php the_field('reserve_description'); ?>
                                </dd>
                                <dt>トイレ</dt>
                                <dd>
                                    <?php the_field('toilet_description'); ?>
                                </dd>
                                <dt>分煙</dt>
                                <dd>
                                    <?php the_field('smoking_description'); ?>
                                </dd>
                                <dt>駐車場</dt>
                                <dd>
                                    <?php the_field('parking_description'); ?>
                                </dd>
                                <dt>Wi-Fi</dt>
                                <dd>
                                    <?php the_field('wifi_description'); ?>
                                </dd>
                                <dt>公式ホームページ</dt>
                                <dd>
                                    <?php the_field('url'); ?>
                                </dd>
                            </dl>
                        </section>
                        <?php
                        if (function_exists('get_field')) {
                            $iframe_code = get_field('iframe'); // 'iframe' フィールド名を指定
                            if ($iframe_code) {
                                echo $iframe_code;
                            } else {
                                echo 'カスタムフィールドが見つかりませんでした。';
                            }
                        } else {
                            echo 'get_field 関数が見つかりませんでした。';
                        }
                        ?>

                        <section>
                            <h5>こちらもいかがでしょうか？</h5>
                            <div class="recommend_list">
                                <article class="card">
                                    <a href="#">
                                        <div>
                                            <span></span>
                                            <img src="../assets/images/onsen_img.jpg" alt="">
                                        </div>
                                        <h3>峡谷の湯宿 大歩危峡まんなか 大歩危温泉</h3>
                                    </a>
                                </article>
                                <article class="card">
                                    <a href="#">
                                        <div>
                                            <span></span>
                                            <img src="../assets/images/onsen_img.jpg" alt="">
                                        </div>
                                        <h3>峡谷の湯宿 大歩危峡まんなか 大歩危温泉</h3>
                                    </a>
                                </article>
                                <article class="card">
                                    <a href="#">
                                        <div>
                                            <span></span>
                                            <img src="../assets/images/onsen_img.jpg" alt="">
                                        </div>
                                        <h3>峡谷の湯宿 大歩危峡まんなか 大歩危温泉</h3>
                                    </a>
                                </article>
                                <article class="card">
                                    <a href="#">
                                        <div>
                                            <span></span>
                                            <img src="../assets/images/onsen_img.jpg" alt="">
                                        </div>
                                        <h3>峡谷の湯宿 大歩危峡まんなか 大歩危温泉</h3>
                                    </a>
                                </article>
                                <article class="card">
                                    <a href="#">
                                        <div>
                                            <span></span>
                                            <img src="../assets/images/onsen_img.jpg" alt="">
                                        </div>
                                        <h3>峡谷の湯宿 大歩危峡まんなか 大歩危温泉</h3>
                                    </a>
                                </article>


                            </div>
                        </section>
                        <button class="back_btn" onclick="history.back">
                            <span><i class="fa-solid fa-arrow-left"></i>back</span>
                        </button>
                <?php endwhile;
                endif; ?>
            </main>
        </div>
    </div>
    <!-- jquery CDN -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- top.js -->

    <script src="../assets/js/common.js"></script>
</body>

</html>

<!-- header.phpを読み込む -->
<?php get_header(); ?>

<main class="pc_inner">
    <div class="container">
        <h2 class="under_line"><?php the_title(); ?></h2>

        <!-- パンくず -->
        <?php get_template_part('template-parts/breadcrumb') ?>

        <!-- 外観写真 -->
        <div class="img_box">
            <ul class="slider">
                <?php if ($pic = get_field('facility_pic1')) : ?>
                    <?php $pic_url = $pic['sizes']['medium']; ?>
                    <?php if ($pic_url) : ?>
                        <li class="slider-img">
                            <img src="<?php echo esc_url($pic_url); ?>" alt="周辺施設画像1">
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if ($pic = get_field('facility_pic2')) : ?>
                    <?php $pic_url = $pic['sizes']['medium']; ?>
                    <?php if ($pic_url) : ?>
                        <li class="slider-img">
                            <img src="<?php echo esc_url($pic_url); ?>" alt="周辺施設画像2">
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if ($pic = get_field('facility_pic3')) : ?>
                    <?php $pic_url = $pic['sizes']['medium']; ?>
                    <?php if ($pic_url) : ?>
                        <li class="slider-img">
                            <img src="<?php echo esc_url($pic_url); ?>" alt="周辺施設画像3">
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if ($pic = get_field('facility_pic4')) : ?>
                    <?php $pic_url = $pic['sizes']['medium']; ?>
                    <?php if ($pic_url) : ?>
                        <li class="slider-img">
                            <img src="<?php echo esc_url($pic_url); ?>" alt="周辺施設画像4">
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if ($pic = get_field('facility_pic5')) : ?>
                    <?php $pic_url = $pic['sizes']['medium']; ?>
                    <?php if ($pic_url) : ?>
                        <li class="slider-img">
                            <img src="<?php echo esc_url($pic_url); ?>" alt="周辺施設画像5">
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
            </ul>
            <label class="checkbox-item">
                <input type="checkbox" name="options" value="nice" />
                <span class="nice_btn">
                    <i class="fa-regular fa-thumbs-up"></i><br />
                    <span>11</span>
                </span>
            </label>
            <label class="checkbox-item">
                <input type="checkbox" name="options" value="favorite" />
                <span class="favorite_btn"><i class="fa-solid fa-heart"></i> <i class="fa-regular fa-heart"></i></span>
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
                    <?php echo esc_html(get_field('facility_name')); ?>
                </dd>
                <dt>施設紹介</dt>
                <dd>
                    <?php echo nl2br(esc_html(get_field('facility_description'))); ?>
                </dd>
                <dt>住所</dt>
                <dd>
                    <?php echo esc_html(get_field('address1')); ?>
                </dd>
                <dd>
                    <?php echo esc_html(get_field('address2')); ?>
                </dd>
                <dt>電話番号</dt>
                <dd>
                    <?php echo esc_html(get_field('tel')); ?>
                </dd>
                <dt>営業時間</dt>
                <dd>
                    <?php echo nl2br(esc_html(get_field('business_time'))); ?>
                </dd>
                <dt>定休日</dt>
                <dd>
                    <?php echo esc_html(get_field('closed')); ?>
                </dd>
                <dt>料金</dt>
                <dd>
                    <?php echo nl2br(esc_html(get_field('price'))); ?>
                </dd>
                <dt>決済方法</dt>
                <dd>
                    <?php echo nl2br(esc_html(get_field('payment_description'))); ?>
                </dd>
                <dt>予約</dt>
                <dd>
                    <?php echo nl2br(esc_html(get_field('reserve_description'))); ?>
                </dd>
                <dt>トイレ</dt>
                <dd>
                    <?php echo nl2br(esc_html(get_field('toilet_description'))); ?>
                </dd>
                <dt>分煙</dt>
                <dd>
                    <?php echo nl2br(esc_html(get_field('smoking_description'))); ?>
                </dd>
                <dt>駐車場</dt>
                <dd>
                    <?php echo nl2br(esc_html(get_field('parking_description'))); ?>
                </dd>
                <dt>Wi-Fi</dt>
                <dd>
                    <?php echo nl2br(esc_html(get_field('wifi_description'))); ?>
                </dd>
                <dt>公式ホームページ</dt>
                <dd>
                    <?php echo esc_html(get_field('url')); ?>
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

        <!-- 関連するコラム、お知らせ -->
        <section class="connection_column">
            <h5>関連コラム、情報
            </h5>
            <article class="news_card column">
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
            <article class="news_card news">
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
        </section>

        <?php
        // 現在のページのURLを取得
        $current_url = home_url(add_query_arg(array(), $wp->request));

        // リファラー(前のページ)のURLを取得
        $referer_url = wp_get_referer();

        // back_btnを表示するかどうかのフラグ
        $show_back_btn = false;

        // リファラーのURLが取得できた場合
        if ($referer_url) {
            // リファラーのURLとの比較
            if (strpos($referer_url, home_url()) !== false) {
                // リファラーのURLがサイト内のURLだった場合
                $back_url = $referer_url;
                $show_back_btn = true;
            }
        }

        // back_btnを表示する場合のみ出力
        if ($show_back_btn) {
        ?>
            <button class="back_btn" onclick="window.location.href='<?php echo $back_url; ?>'">
                <span><i class="fa-solid fa-arrow-left"></i>back</span>
            </button>
        <?php
        }
        ?>

    </div>
</main>

<!-- footer.phpを読み込む -->
<?php get_footer(); ?>

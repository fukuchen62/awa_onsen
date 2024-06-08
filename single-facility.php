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
                    <?php $pic_url = $pic['sizes']['large']; ?>
                    <?php if ($pic_url) : ?>
                        <li class="slider-img">
                            <img src="<?php echo esc_url($pic_url); ?>" alt="周辺施設画像1">
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if ($pic = get_field('facility_pic2')) : ?>
                    <?php $pic_url = $pic['sizes']['large']; ?>
                    <?php if ($pic_url) : ?>
                        <li class="slider-img">
                            <img src="<?php echo esc_url($pic_url); ?>" alt="周辺施設画像2">
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if ($pic = get_field('facility_pic3')) : ?>
                    <?php $pic_url = $pic['sizes']['large']; ?>
                    <?php if ($pic_url) : ?>
                        <li class="slider-img">
                            <img src="<?php echo esc_url($pic_url); ?>" alt="周辺施設画像3">
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if ($pic = get_field('facility_pic4')) : ?>
                    <?php $pic_url = $pic['sizes']['large']; ?>
                    <?php if ($pic_url) : ?>
                        <li class="slider-img">
                            <img src="<?php echo esc_url($pic_url); ?>" alt="周辺施設画像4">
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if ($pic = get_field('facility_pic5')) : ?>
                    <?php $pic_url = $pic['sizes']['large']; ?>
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
                    <?php echo esc_html(get_field('facility_description')); ?>
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
                    <?php echo esc_html(get_field('business_time')); ?>
                </dd>
                <dt>定休日</dt>
                <dd>
                    <?php echo esc_html(get_field('closed')); ?>
                </dd>
                <dt>料金</dt>
                <dd>
                    <?php echo esc_html(get_field('price')); ?>
                </dd>
                <dt>決済方法</dt>
                <dd>
                    <?php echo esc_html(get_field('payment_description')); ?>
                </dd>
                <dt>予約</dt>
                <dd>
                    <?php echo esc_html(get_field('reserve_description')); ?>
                </dd>
                <dt>トイレ</dt>
                <dd>
                    <?php echo esc_html(get_field('toilet_description')); ?>
                </dd>
                <dt>分煙</dt>
                <dd>
                    <?php echo esc_html(get_field('smoking_description')); ?>
                </dd>
                <dt>駐車場</dt>
                <dd>
                    <?php echo esc_html(get_field('parking_description')); ?>
                </dd>
                <dt>Wi-Fi</dt>
                <dd>
                    <?php echo esc_html(get_field('wifi_description')); ?>
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
            <!-- <div class="recommend_list">
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
            </div> -->
        </section>
        <button class="back_btn" onclick="history.back">
            <span><i class="fa-solid fa-arrow-left"></i>back</span>
        </button>
    </div>
</main>

<!-- footer.phpを読み込む -->
<?php get_footer(); ?>

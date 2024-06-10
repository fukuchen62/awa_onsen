<!-- header.phpを読み込む -->
<?php get_header(); ?>

<main class="pc_inner">
    <div class="container">
        <h2 class="under_line"><?php the_title(); ?></h2>
        <!-- パンくず -->
        <?php get_template_part('template-parts/breadcrumb') ?>
        <!-- 外観写真 -->
        <div class="img_box">
            <?php
            $pic = get_field('main_pic');
            $pic_url = $pic['sizes']['large'];
            ?>
            <img src="<?php echo $pic_url; ?>" alt="メイン画像">
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

        <!-- 温泉紹介 -->
        <section>
            <h4 class="lined-title">温泉の紹介</h4>
            <?php the_field('description'); ?>
        </section>
        <div class="other_img">
            <ul class="slider">
                <?php if ($pic = get_field('spa_pic1')) : ?>
                    <?php $pic_url = $pic['sizes']['large']; ?>
                    <?php if ($pic_url) : ?>
                        <li class="slider-img">
                            <img src="<?php echo esc_url($pic_url); ?>" alt="スライダー画像1">
                        </li>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if ($pic = get_field('spa_pic2')) : ?>
                    <?php $pic_url = $pic['sizes']['large']; ?>
                    <?php if ($pic_url) : ?>
                        <li class="slider-img">
                            <img src="<?php echo esc_url($pic_url); ?>" alt="スライダー画像2">
                        </li>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if ($pic = get_field('spa_pic3')) : ?>
                    <?php $pic_url = $pic['sizes']['large']; ?>
                    <?php if ($pic_url) : ?>
                        <li class="slider-img">
                            <img src="<?php echo esc_url($pic_url); ?>" alt="スライダー画像3">
                        </li>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if ($pic = get_field('spa_pic4')) : ?>
                    <?php $pic_url = $pic['sizes']['large']; ?>
                    <?php if ($pic_url) : ?>
                        <li class="slider-img">
                            <img src="<?php echo esc_url($pic_url); ?>" alt="スライダー画像4">
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
            </ul>

            <ul class="thumbnail">
                <?php if ($pic = get_field('spa_pic1')) : ?>
                    <?php $pic_url = $pic['sizes']['thumbnail']; ?>
                    <?php if ($pic_url) : ?>
                        <li class="thumbnail-img">
                            <img src="<?php echo esc_url($pic_url); ?>" alt="サムネイル画像1">
                        </li>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if ($pic = get_field('spa_pic2')) : ?>
                    <?php $pic_url = $pic['sizes']['thumbnail']; ?>
                    <?php if ($pic_url) : ?>
                        <li class="thumbnail-img">
                            <img src="<?php echo esc_url($pic_url); ?>" alt="サムネイル画像2">
                        </li>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if ($pic = get_field('spa_pic3')) : ?>
                    <?php $pic_url = $pic['sizes']['thumbnail']; ?>
                    <?php if ($pic_url) : ?>
                        <li class="thumbnail-img">
                            <img src="<?php echo esc_url($pic_url); ?>" alt="サムネイル画像3">
                        </li>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if ($pic = get_field('spa_pic4')) : ?>
                    <?php $pic_url = $pic['sizes']['thumbnail']; ?>
                    <?php if ($pic_url) : ?>
                        <li class="thumbnail-img">
                            <img src="<?php echo esc_url($pic_url); ?>" alt="サムネイル画像4">
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
            </ul>
        </div>
        <section>
            <h4 class="lined-title">温泉の水の性質は？</h4>
            <?php the_field('spa_description'); ?>
        </section>
        <section class="museum_map">
            <h4 class="lined-title">館内マップ</h4>
            <?php
            $pic = get_field('house_map');

            // 画像が設定されているかを確認
            if ($pic && isset($pic['sizes']['large'])) {
                $pic_url = $pic['sizes']['large'];
            ?>
                <img src="<?php echo esc_url($pic_url); ?>" alt="館内マップ">
            <?php
            } else {
                // 画像がない場合は代わりに他のコンテンツを表示するなどの処理を追加できます
                echo '<p>館内マップは現在利用できません。</p>';
            }
            ?>
            <!-- <img src="<?php echo get_template_directory_uri() ?> . /assets/images/bike.jpg" alt="" /> -->
        </section>
        <section class="basic_information">
            <h4 class="lined-title">基本情報</h4>
            <dl>
                <dt>営業時間</dt>
                <dd>
                    <table>
                        <tr>
                            <th>基本</th>
                            <td>
                                <?php echo esc_html(get_field('business_time')); ?>
                            </td>
                        </tr>
                        <tr>
                            <th>定休日</th>
                            <td>
                                <?php echo esc_html(get_field('closed')); ?>
                            </td>
                        </tr>
                    </table>
                </dd>
                <dt>基本料金</dt>
                <dd>
                    <?php echo nl2br(esc_html(get_field('price'))); ?>
                </dd>
                <dt>決済方法</dt>
                <dd>
                    <?php echo nl2br(esc_html(get_field('ayment_description'))); ?>
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
                <dt>浴室小物</dt>
                <dd>
                    <?php echo nl2br(esc_html(get_field('facility'))); ?>
                </dd>
                <dt>住所</dt>
                <dd>
                    <?php echo nl2br(esc_html(get_field('address1'))); ?>
                    <?php echo nl2br(esc_html(get_field('address2'))); ?>
                </dd>
                <dt>TEL</dt>
                <dd>
                    <?php echo nl2br(esc_html(get_field('tel'))); ?>
                </dd>
                <dt>FAX</dt>
                <dd>
                    <?php echo nl2br(esc_html(get_field('fax'))); ?>
                </dd>
                <dt>Email</dt>
                <dd>
                    <?php echo nl2br(esc_html(get_field('email'))); ?>
                </dd>
                <dt>最寄り駅</dt>
                <dd>
                    <?php echo nl2br(esc_html(get_field('station'))); ?>
                </dd>
                <dt>SNS</dt>
                <dd>
                    <?php echo nl2br(esc_html(get_field('sns_url'))); ?>
                </dd>
                <dt>公式ホームページ</dt>
                <dd>
                    <a href="<?php the_field('official_url'); ?>">
                        <?php echo get_field('official_url') ?>
                    </a>
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
        <ul class="icon_list">
            <?php if (get_field('reserve')) : ?>
                <li>
                    <span class="material-symbols-outlined">calendar_month</span>
                    <p>事前予約</p>
                </li>
            <?php endif; ?>
            <?php if (get_field('sauna')) : ?>
                <li>
                    <span class="material-symbols-outlined">sauna</span>
                    <p>サウナ</p>
                </li>
            <?php endif; ?>
            <?php if (get_field('lodging')) : ?>
                <li>
                    <span class="material-symbols-outlined">hotel</span>
                    <p>宿泊</p>
                </li>
            <?php endif; ?>
            <?php if (get_field('wifi')) : ?>
                <li>
                    <span class="material-symbols-outlined">wifi</span>
                    <p>Wi-Fi</p>
                </li>
            <?php endif; ?>
            <?php if (get_field('smoking')) : ?>
                <li>
                    <span class="material-symbols-outlined">smoking_rooms</span>
                    <p>喫煙所</p>
                </li>
            <?php endif; ?>
            <?php if (get_field('parking')) : ?>
                <li>
                    <span class="material-symbols-outlined">local_parking</span>
                    <p>駐車場</p>
                </li>
            <?php endif; ?>
        </ul>
        <section>
            <h3>こちらもいかがでしょうか？</h3>
            <div class="recommend_list">
                <article class="card spa">
                    <a href="#">
                        <div>
                            <span></span>
                            <img src="../assets/images/onsen_img.jpg" alt="" />
                        </div>
                        <h3>峡谷の湯宿 大歩危峡まんなか 大歩危温泉</h3>
                    </a>
                </article>
                <article class="card spa">
                    <a href="#">
                        <div>
                            <span></span>
                            <img src="../assets/images/onsen_img.jpg" alt="" />
                        </div>
                        <h3>峡谷の湯宿 大歩危峡まんなか 大歩危温泉</h3>
                    </a>
                </article>
                <article class="card course">
                    <a href="#">
                        <div>
                            <span></span>
                            <img src="../assets/images/onsen_img.jpg" alt="" />
                        </div>
                        <h3>峡谷の湯宿 大歩危峡まんなか 大歩危温泉</h3>
                    </a>
                </article>
                <article class="card facility">
                    <a href="#">
                        <div>
                            <span></span>
                            <img src="../assets/images/onsen_img.jpg" alt="" />
                        </div>
                        <h3>峡谷の湯宿 大歩危峡まんなか 大歩危温泉</h3>
                    </a>
                </article>
                <article class="card facility">
                    <a href="#">
                        <div>
                            <span></span>
                            <img src="../assets/images/onsen_img.jpg" alt="" />
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
                <a href="http://bzclass.bizan.com/adm/mainte.asp?comp_id=1&koza_id=92">
                    <img src="<?php echo get_template_directory_uri() ?>" alt=""></a>
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
                <a href="http://bzclass.bizan.com/adm/mainte.asp?comp_id=1&koza_id=92"><img src="<?php echo get_template_directory_uri() ?>" alt=""></a>
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

        </section>
    </div>
</main>

<!-- footer.phpを読み込む -->
<?php get_footer(); ?>

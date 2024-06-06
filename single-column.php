<!-- header.phpを読み込む -->
<?php get_header(); ?>
<!------------------------>
<!-- ここからメインだよ -->
<!------------------------>
<main class="container">
    <!-- パンくず -->
    <?php get_template_part('template-parts/breadcrumb'); ?>

    <h2 class="under_line"><?php the_title(); ?></h2>

    <article>
        <!-- 公開日を出力 -->
        <p class="date"><?php echo esc_html(get_post_time('Y.m.d.(D)')); ?></p>

        <!-- コラム写真 -->
        <div class="column_img">
            <!-- コラム画像ここから -->
            <?php
            $pic = get_field('column_pic');
            $pic_url = $pic['sizes']['medium'];
            ?>
            <img src="<?php echo $pic_url; ?>" alt="">
            <!-- コラム画像ここまで-->

        </div>
        <!------------------------>
        <!-- ハッシュタグ -->
        <!------------------------>

        <div class="hashtag_list">
            <a class="hashtag">
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
                                echo '<li>';
                                echo '# ' . esc_html($term->name) . '<br>';
                                echo '</li>';
                            }
                            echo '</ul>';
                        } else {
                            echo '<p>この投稿に関連するタームはありません。</p>';
                        }
                    }
                } else {
                    echo '<p>この投稿に関連するタクソノミーはありません。</p>';
                }
                ?></a>

        </div>


        <!-- コラム内容 -->
        <p class="column_text"><?php the_content(); ?></p><br>
        <p><?php the_field('column_description'); ?></p>

    </article>

    <section>
        <!-- コメントフォーム -->
        <div class="comment_form">
            <!-- コメント入力欄 -->
            <!-- <form action=""> -->
            <div class="item">

                <!-- コメント入力フォームとコメントリスト -->
                <?php comments_template(); ?>

                <!-- <label class="comment" for="comment">コメント入力欄</label>
                        <textarea rows="10" cols="80" name="" id="comment"></textarea><br> -->
            </div>
        </div>

        <!--
                        <div class="item">
                            <input type="submit" value="コメントを送信">
                        </div> -->

        <div class="item comment_content">

            <!-- アイコン -->
            <!-- <img src="" alt="アイコン画像"> -->
            <!-- コメント者名 -->
            <!-- <p>matsuo saki</p> -->
            <!-- コメント内容 -->
            <!-- <p>肌すべすべになりました★</p> -->
            <!-- </div> -->
            <!-- <div class="item comment_content"> -->
            <!-- アイコン -->
            <!-- <img src="" alt="アイコン画像"> -->
            <!-- コメント者名 -->
            <!-- <p>yamashita sawaka</p> -->
            <!-- コメント内容 -->
            <!-- <p>ゆったりできました～</p> -->
            <!-- </div> -->
            <!-- <div class="item comment_content"> -->
            <!-- アイコン -->
            <!-- <img src="" alt="アイコン画像"> -->
            <!-- コメント者名 -->
            <!-- <p>sakuragi sumire</p> -->
            <!-- コメント内容 -->
            <!-- <p>最高です！</p> -->
            <!-- </div> -->
            <!-- <div class="item more_button"> -->
            <!-- <a href="#">もっと見る▼</a> -->
        </div>

        </form>
    </section>

    <section>

        <!-- 関連情報 -->
        <article>
            <div>
                <?php
                //---------------------------
                // カスタムフィールドの外部URL
                //---------------------------

                // スラッグ名を指定
                $slug = the_field('slag'); // ここにカスタムフィールドの値が入る

                // すべてのカスタム投稿タイプを取得
                $custom_post_types = get_post_types(array('_builtin' => false));

                // カスタムクエリで投稿を検索
                $args = array(
                    'name' => $slug,
                    'post_type' => $custom_post_types,
                    'post_status' => 'publish',
                    'numberposts' => 1
                );

                $posts = get_posts($args);

                if (!empty($posts)) {
                    $post = $posts[0]; // 最初の投稿を取得
                    setup_postdata($post);
                    // 投稿情報を取得
                    $post_id = $post->ID;
                    $post_title = get_the_title($post_id);
                    $post_link = get_permalink($post_id);
                    $post_thumbnail = get_the_post_thumbnail($post_id, 'thumbnail'); // フルサイズのアイキャッチ画像を取得

                    // 投稿情報を表示
                    if ($post_thumbnail) {
                        echo '<a href="' . esc_url($post_link) . '">' . $post_thumbnail . '</a>';
                    }
                    echo '<h1><a href="' . esc_url($post_link) . '">' . esc_html($post_title) . '</a></h1>';


                    wp_reset_postdata();
                }

                ?>
                <?php
                //---------------------------
                // カスタムフィールドの外部URL
                //---------------------------

                // スラッグ名を指定
                $slug = the_field('slag'); // ここにカスタムフィールドの値が入る

                // すべてのカスタム投稿タイプを取得
                $custom_post_types = get_post_types(array('_builtin' => false));

                // カスタムクエリで投稿を検索
                $args = array(
                    'name' => $slug,
                    'post_type' => $custom_post_types,
                    'post_status' => 'publish',
                    'numberposts' => 1
                );

                $posts = get_posts($args);

                if (!empty($posts)) {
                    $post = $posts[0]; // 最初の投稿を取得
                    setup_postdata($post);
                    // 投稿情報を取得
                    $post_id = $post->ID;
                    $post_title = get_the_title($post_id);
                    $post_link = get_permalink($post_id);
                    $post_thumbnail = get_the_post_thumbnail($post_id, 'thumbnail'); // アイキャッチ画像を取得

                    // 投稿情報を表示
                    if ($post_thumbnail) {
                        echo '<a href="' . esc_url($post_link) . '">' . $post_thumbnail . '</a>';
                    }
                    echo '<h1><a href="' . esc_url($post_link) . '">' . esc_html($post_title) . '</a></h1>';


                    wp_reset_postdata();
                }

                ?>

            </div>
            <!-- <h3>峡谷の湯宿 大歩危峡まんなか 大歩危温泉</h3> -->

        </article>
    </section>

    <a href="">＜＜前の記事</a>
    <a href="">次の記事＞＞</a>
    <br>
    <button class="back_btn" onclick="history.back">
        <p><i class="fa-solid fa-arrow-left"></i>back</p>
    </button>


</main>
</div>




<!-- footer.phpを読み込む -->
<?php get_footer(); ?>

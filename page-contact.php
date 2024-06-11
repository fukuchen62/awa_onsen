<!-- header.phpを読み込む -->
<?php get_header(); ?>

<main class="pc_inner">
    <div class="container">
        <section>
            <h2 class="under_line">お問い合わせフォーム<br>（企業のお客様）</h2>

            <!-- パンくず -->
            <?php get_template_part('template-parts/breadcrumb'); ?>


            <p>法人のみの対応とさせていただいております。予めご了承ください。<br><small>※</small>は必須項目です。</p>
        </section>

        <!-- お問い合わせフォーム -->
        <div class="content_form">
            <!-- 投稿した固定ページの中身を表示 -->
            <?php the_content(); ?>

            <!-- バックボタン -->
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

    </div>

</main>

<!-- footer.phpを読み込む -->
<?php get_footer(); ?>

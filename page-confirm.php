<!-- header.phpを読み込む -->
<?php get_header(); ?>

<main class="pc_inner">
    <div class="container">

        <section>
            <!-- 見出し -->
            <h2 class="under_line">内容確認</h2>
            <!-- パンくず -->
            <p>下記の内容でお間違いないかご確認お願いします。</p>
        </section>
        <!-- お問い合わせフォーム -->
        <div class="content_form">

            <!-- 投稿した固定ページの中身を表示 -->
            <?php the_content(); ?>


            <!-- ここからをwordpressへ -->
            <div class="form_item">
                <h4><label>企業様名/施設様名</label></h4>
                <p class="dummy">ダミー</p>
            </div>
            <div class="form_item">
                <h4><label>ご担当様氏名</label></h4>
                <p class="dummy">ダミー</p>
            </div>
            <div class="form_item">
                <h4><label>メールアドレス</label></h4>
                <p class="dummy">ダミー</p>
            </div>
            <div class="form_item">
                <h4><label>電話番号</label></h4>
                <p class="dummy">ダミー</p>
            </div>
            <div class="form_item">
                <h4><label>お問い合わせ内容</label></h4>
                <p class="dummy">ダミー</p>
            </div>


        </div>
        <!-- ボタン -->
        <ul class="button">
            <li class="send"><input type="submit" id="send_button" value="送信する"></li>
            <li class="back"><button type="button" id="back_button" onclick="history.back()">戻る</button></li>
        </ul>
        <!-- ここまでwordpressへ -->
    </div>
</main>

<!-- footer.phpを読み込む -->
<?php get_footer(); ?>

<!-- header.phpを読み込む -->
<?php get_header(); ?>

<main class="pc_inner">
    <div class="container">
        <div class="inner">
            <section>
                <!-- 見出し -->
                <h2 class="under_line">送信完了</h2>
                <!-- パンくず -->
                <?php get_template_part('template-parts/breadcrumb'); ?>
                <!-- コメント -->

                <!-- 投稿した固定ページの中身を表示 -->
                <?php the_content(); ?>
                <p>送信が完了しました。<br>確認次第返信いたしますので、しばらくお待ちください。</p>
            </section>
        </div>
    </div>

</main>

<!-- footer.phpを読み込む -->
<?php get_footer(); ?>

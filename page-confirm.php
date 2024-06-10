<!-- header.phpを読み込む -->
<?php get_header(); ?>

<main class="pc_inner">
    <div class="container">

        <section>
            <!-- 見出し -->
            <h2 class="under_line">内容確認</h2>
            <!-- パンくず -->
            <?php get_template_part('template-parts/breadcrumb'); ?>
            <p>下記の内容でお間違いないかご確認お願いします。</p>
        </section>
        <!-- お問い合わせフォーム -->
        <div class="content_form">

            <!-- 投稿した固定ページの中身を表示 -->
            <?php the_content(); ?>

        </div>
</main>

<!-- footer.phpを読み込む -->
<?php get_footer(); ?>

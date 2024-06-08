<!-- header.phpを読み込む -->
<?php get_header(); ?>

<main class="container">

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
    </div>

    <button class="back_btn" onclick="history.back">
        <span><i class="fa-solid fa-arrow-left"></i>back</span>
    </button>

</main>

<!-- footer.phpを読み込む -->
<?php get_footer(); ?>

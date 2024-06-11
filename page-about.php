<?php
/*
Template Name: About Page Template
*/
get_header();
?>

<!-- main -->
<main class="pc_inner">
    <div class="container">
        <!-- タイトルを表示 -->
        <h2 class="under_line"><?php the_title(); ?></h2>

        <!-- パンくず -->
        <?php get_template_part('template-parts/breadcrumb') ?>

        <!-- 最初の本文を表示 -->
        <p><?php the_content(); ?></p>

    </div>
</main>

<!-- footer.phpを読み込む -->
<?php get_footer(); ?>

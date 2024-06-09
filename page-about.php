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

        <!-- カスタムフィールドから見出しを取得し表示 -->
        <h2 class="under_line"><?php echo get_post_meta(get_the_ID(), 'subheading', true); ?></h2>

        <!-- カスタムフィールドから2つ目の本文を取得し表示 -->
        <p><?php echo wpautop(get_post_meta(get_the_ID(), 'content_2', true)); ?></p>

    </div>
</main>

<!-- footer.phpを読み込む -->
<?php get_footer(); ?>
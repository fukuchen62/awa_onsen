<!-- header.phpを読み込む -->
<?php get_header(); ?>



<!-- ループのテスト -->
<h1>温泉</h1>
<?php


// お気に入り投稿IDを取得
$post_ids = get_user_favorites_post_ids();

if (!empty($post_ids)) {
    // 投稿を取得
    $args = array(
        'post_type' => 'spa',
        'post__in' => $post_ids,
        'orderby' => 'post__in'
    );
    $favorites_query = new WP_Query($args);
    if ($favorites_query->have_posts()) : ?>
        <?php while ($favorites_query->have_posts()) : $favorites_query->the_post(); ?>
            <article class="card">
                <a href="<?php the_permalink(); ?>">
                    <div>
                        <span></span>
                        <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title_attribute(); ?>">
                        <?php endif; ?>
                    </div>
                    <h3><?php the_title(); ?></h3>
                </a>
            </article>
        <?php endwhile; ?>

        <?php wp_reset_postdata(); ?>
    <?php endif; ?>
<?php
}
?>

<h1>周辺施設</h1>
<?php
if (!empty($post_ids)) {
    // 投稿を取得
    $args = array(
        'post_type' => 'facility',
        'post__in' => $post_ids,
        'orderby' => 'post__in'
    );
    $favorites_query = new WP_Query($args);
    if ($favorites_query->have_posts()) : ?>
        <?php while ($favorites_query->have_posts()) : $favorites_query->the_post(); ?>
            <article class="card">
                <a href="<?php the_permalink(); ?>">
                    <div>
                        <span></span>
                        <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title_attribute(); ?>">
                        <?php endif; ?>
                    </div>
                    <h3><?php the_title(); ?></h3>
                </a>
            </article>
        <?php endwhile; ?>

        <?php wp_reset_postdata(); ?>
    <?php endif; ?>
<?php
}
?>

<!-- ループのテストおわり -->

<main class="pc_inner">
    <div class="container">
        <section>
            <h2 class="under_line">マイページ</h2>

            <!-- パンくずリスト -->
            <div class="mypage_container">
                <h3>マイページについて</h3>
                <p>・本マイページは温泉詳細や周辺詳細でブックマークした情報が表示されます。</p>
                <p>・ブックマークにはcookieを使用しています。</p>
                <p>・cookieの削除に伴いブックマークした情報も削除されます。</p>
            </div>

            <h3 class="mypage_list">お気に入り一覧</h3>


            <!-- タグ -->
            <ul class="tag element02">
                <li class="active">温泉</li>
                <li>周辺施設</li>
            </ul>

            <!-- 温泉お気に入り一覧 -->
            <div class="contents onsen">
                <p>現在お気に入り登録<br class="sp_only">されている温泉</p>
                <div class="article_all">
                    <article class="card">
                        <a href="https://translate.google.co.jp/?hl=ja&tab=TT&sl=auto&tl=en&op=translate">
                            <div>
                                <span></span>
                                <img src="../assets/images/onsen_img.jpg" alt="">
                            </div>
                            <h3>最南端！！空と海を感じるツーリングコース！！！</h3>
                        </a>
                    </article>
                    <article class="card">
                        <a href="https://translate.google.co.jp/?hl=ja&tab=TT&sl=auto&tl=en&op=translate">
                            <div>
                                <span></span>
                                <img src="../assets/images/onsen_img.jpg" alt="">
                            </div>
                            <h3>最南端！！空と海を感じるツーリングコース！！！</h3>
                        </a>
                    </article>
                </div>
            </div>

            <!-- 周辺施設お気に入り一覧 -->
            <div class="contents facility">
                <p>現在お気に入り施設情報は<br class="sp_only">ありません。</p>
                <div class="article_all">
                </div>
            </div>
        </section>
        <button class="back_btn" onclick="history.back">
            <span><i class="fa-solid fa-arrow-left"></i>back</span>
        </button>
    </div>
</main>

<!-- footer.phpを読み込む -->
<?php get_footer(); ?>

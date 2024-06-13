<!-- header.phpを読み込む -->
<?php get_header(); ?>

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
            <div class="contents spa">
                <?php
                // お気に入り投稿IDを取得
                $post_ids = get_user_favorites_post_ids();

                // お気に入り温泉
                if (!empty($post_ids)) {
                    // 投稿を取得
                    $args = array(
                        'post_type' => 'spa',
                        'post__in' => $post_ids,
                        'orderby' => 'post__in'
                    );
                    $favorites_query = new WP_Query($args);
                    $post_count = $favorites_query->found_posts;

                    if ($post_count > 0) : ?>
                        <p><?php echo $post_count; ?> 件の結果が見つかりました。</p>
                        <div class="article_all">
                            <?php while ($favorites_query->have_posts()) : $favorites_query->the_post(); ?>
                                <article class="card">
                                    <a href="<?php the_permalink(); ?>">
                                        <div>
                                            <span></span>
                                            <?php if (has_post_thumbnail()) : ?>
                                                <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title_attribute(); ?>">
                                            <?php else : ?>
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/noimage.png" alt="<?php the_title(); ?>" />
                                            <?php endif; ?>
                                        </div>
                                        <h3><?php the_title(); ?></h3>
                                    </a>
                                </article>
                            <?php endwhile; ?>
                        </div>
                    <?php else : ?>
                        <p>現在お気に入り登録されている温泉はありません。</p>
                    <?php endif; ?>

                    <?php wp_reset_postdata(); ?>
                <?php } else { ?>
                    <p>現在お気に入り登録されている温泉はありません。</p>
                <?php } ?>
            </div>

            <!-- 周辺施設お気に入り一覧 -->
            <div class="contents facility">
                <?php
                // お気に入り施設
                if (!empty($post_ids)) {
                    // 投稿を取得
                    $args = array(
                        'post_type' => 'facility',
                        'post__in' => $post_ids,
                        'orderby' => 'post__in'
                    );
                    $favorites_query = new WP_Query($args);
                    $post_count = $favorites_query->found_posts;

                    if ($post_count > 0) : ?>
                        <p><?php echo $post_count; ?> 件の結果が見つかりました。</p>
                        <div class="article_all">
                            <?php while ($favorites_query->have_posts()) : $favorites_query->the_post(); ?>
                                <article class="card">
                                    <a href="<?php the_permalink(); ?>">
                                        <div>
                                            <span></span>
                                            <?php if (has_post_thumbnail()) : ?>
                                                <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title_attribute(); ?>">
                                            <?php else : ?>
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/noimage.png" alt="<?php the_title(); ?>" />
                                            <?php endif; ?>
                                        </div>
                                        <h3><?php the_title(); ?></h3>
                                    </a>
                                </article>
                            <?php endwhile; ?>
                        </div>
                    <?php else : ?>
                        <p>現在お気に入り施設情報はありません。</p>
                    <?php endif; ?>

                    <?php wp_reset_postdata(); ?>
                <?php } else { ?>
                    <p>現在お気に入り施設情報はありません。</p>
                <?php } ?>
            </div>
        </section>
    </div>
</main>

<!-- footer.phpを読み込む -->
<?php get_footer(); ?>

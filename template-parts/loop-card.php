<div class="card">
    <!-- 投稿のリンクを設定。the_permalink()関数は現在の投稿のURLを出力 -->
    <a href="<?php the_permalink(); ?>">

        <!-- アイキャッチ画像 -->
        <div class="card_pic">
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('medium'); ?>
            <?php else : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/noimage.png" alt="">
            <?php endif; ?>
        </div>
        <div class="card_body">
            <h4 class="card_title"><?php the_title(); ?></h4>
            <!-- <p><?php the_excerpt(); ?>抜粋の表示</p> -->
        </div>
    </a>
</div>

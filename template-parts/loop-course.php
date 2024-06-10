<article class="card">
    <a href="<?php the_permalink(); ?>">
        <div>
            <span></span>
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('medium'); ?>
            <?php else : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/noimage.png" alt="<?php the_title(); ?>">
            <?php endif; ?>
        </div>
        <h3><?php the_title(); ?></h3>
    </a>
</article>
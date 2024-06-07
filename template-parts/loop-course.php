<div class="courseCard">
    <a href="<?php the_permalink(); ?>">
        <div class="courseCard_pic">
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('medium'); ?>
            <?php else : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/noimage.png" alt="No Image">
            <?php endif; ?>
        </div>
        <div class="courseCard_body">
            <h4 class="courseCard_title"><?php the_title(); ?></h4>
            <p class="courseCard_link"><?php the_field('slug'); ?></p>
        </div>
    </a>
</div>

<article id="post-<?php the_ID(); ?>" <?php post_class('large_post'); ?>>
    <?php if (has_post_thumbnail()) { ?>
        <div class="post_thumbnail">
            <?php the_post_thumbnail('custom-large'); ?>
        </div>
    <?php } ?>
    <div class="post_meta">
        <span class="post_author">BY <?php the_author(); ?></span>
        <span class="meta_separator">—</span>
        <span class="post_date"><?php echo get_the_date('M j, Y'); ?></span>
        <span class="meta_separator">—</span>
        <span class="post_category"><?php the_category(', '); ?></span>
    </div>
    <h2 class="post_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <div class="excerpt">
        <?php the_excerpt(); ?>
    </div>
</article>
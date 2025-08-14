<article id="post-<?php the_ID(); ?>" <?php post_class( 'single-post' ); ?>>
    <header class="single-post__header">
        <?php if ( has_post_thumbnail() ) { ?>
            <div class="single-post__thumbnail">
                <?php the_post_thumbnail('custom-large'); ?>
            </div>
        <?php } ?>
        <h1 class="single-post__title"><?php the_title(); ?></h1>
        <div class="post_meta">
            <span class="post_author">By <?php the_author(); ?></span>
            <span class="meta_separator">—</span>
            <span class="post_date"><?php echo get_the_date('M j, Y'); ?></span>
            <span class="meta_separator">—</span>
            <span class="post_category"><?php the_category(', '); ?></span>
        </div>
    </header>

    <div class="single-post__content">
        <?php the_content(); ?>
    </div>

    <footer class="single-post__footer">
        <div class="post-meta__categories">
            <?php the_category(' '); ?>
        </div>
        <div class="post-meta__tags">
            <?php the_tags('', ' ', ''); ?>
        </div>
    </footer>
</article>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'single-post' ); ?>>
    <header class="single-post__header">
        <?php if ( has_post_thumbnail() ) { ?>
            <div class="single-post__thumbnail">
                <?php the_post_thumbnail('custom-large'); ?>
            </div>
        <?php } ?>
        <h2 class="single-post__title"><?php the_title(); ?></h2>
        <div class="single-post__meta">
            <?php
            $date = get_the_date();
            $author = get_the_author();
            ?>
            <?php if ( $date ) {  ?>
                <span class="single-post__date"><?php echo esc_html( $date ); ?></span>
            <?php } ?>
            <?php if ( $author ) { ?>
                <span class="single-post__author"> by <?php echo esc_html( $author ); ?></span>
            <?php } ?>
        </div>
        <div class="single-post__content">
            <?php the_content(); ?>
        </div>
        <footer class="single-post__footer">
            <?php the_category(', '); ?>
            <?php the_tags('<span class="tag-links">', ', ', '</span>'); ?>
        </footer>
    </header>
</article>
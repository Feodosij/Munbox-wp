<?php
get_header();
?>

<main>
    <div class="container-single">
        <?php if ( have_posts() ) {
            while ( have_posts() ) {
                 the_post(); 

                 get_template_part( 'template-parts/content', 'single' ); ?>

                <div class="pagination">
                    <?php
                    previous_post_link('%link', '<span class="prev-link" aria-label="Previous post">← previous: %title </span>');
                    next_post_link('%link', '<span class="next-link" aria-label="Next post">→ next: %title </span>');
                    ?>
                </div>
                <?php
            }
        } else {
                echo '<p>No posts found.</p>';
        } ?>
    

        <?php
            if (comments_open() || get_comments_number()) {
                comments_template();
            }
        ?>

    </div>
    
</main>

<?php
get_footer();
?>
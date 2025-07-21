
<?php if (post_password_required()) {
    return;
} ?>


<div id="comments" class="comments_area">

    <?php if ( have_comments() ) { ?>
        <h2 class="comments_title">Comments</h2>

        <ul class="comment_list">
            <?php
            wp_list_comments(array(
                'style'      => 'ul',
                'short_ping' => true,
                'avatar_size'=> 48,
            ));
            ?>
        </ul>

        <?php the_comments_navigation(); ?>

        <?php if ( !comments_open() && get_comments_number() ) {
            echo '<p class="no-comments">Comments are closed.</p>';
        } ?>

    <?php } ?>

    <?php comment_form(); ?>

</div>
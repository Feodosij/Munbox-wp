
<?php if (post_password_required()) {
    return;
} ?>

<div id="comments" class="comments_area">
    <h2 class="comments_title">Comments</h2>

    <?php if ( have_comments() ) { ?>
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

    <?php
        comment_form(array(
            'title_reply' => 'Leave a Reply',
            'comment_notes_before' => '<p class="comment_notes">Your email address will not be published. Required fields are marked *</p>',
            'comment_field' => '
                <p class="comment_form_comment">
                    <label for="comment">Comment *</label>
                    <textarea id="comment" name="comment" rows="8" required></textarea>
                </p>',
            'submit_button' => '<button type="submit" class="comment_submit main_yellow_button">Post Comment</button>',
            'class_form' => 'custom_comment_form',
            'fields' => array(
                'author' => '
                    <p class="comment_form_author">
                        <label for="author">Name *</label>
                        <input id="author" name="author" type="text" required>
                    </p>',
                'email' => '
                    <p class="comment_form_email">
                        <label for="email">Email *</label>
                        <input id="email" name="email" type="email" required>
                    </p>',
                'url' => '
                    <p class="comment_form_url">
                        <label for="url">Website</label>
                        <input id="url" name="url" type="url">
                    </p>',
            ),
        ));
    ?>

</div>
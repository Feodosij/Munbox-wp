<?php if (post_password_required()) {
    return;
} ?>

<div id="comments" class="comments_area">

    <h2 class="comments_title">
        <?php
            $comment_count = get_comments_number();
            if ('1' === $comment_count) {
                esc_html_e('One comment', 'munbox_theme'); 
            } else {
                printf(
                    esc_html__('%s comments', 'munbox_theme'),
                    esc_html($comment_count)
                );
            }
        ?>
    </h2>

    <?php if (have_comments()) { ?>
        <ul class="comment_list">
            <?php
                wp_list_comments(array(
                    'style'      => 'ul',
                    'short_ping' => true,
                    'avatar_size' => 48,
                ));
            ?>
        </ul>

        <?php the_comments_navigation(); ?>

        <?php if (!comments_open() && get_comments_number()) {
            echo '<p class="no-comments">' . esc_html__('Comments are closed.', 'munbox_theme') . '</p>';
        } ?>

    <?php } ?>

    <?php
        $comment_form_args = array(
            'title_reply'         => esc_html__('Leave a Reply', 'munbox_theme'),
            'title_reply_to'      => esc_html__('Leave a Reply to %s', 'munbox_theme'),
            'comment_notes_before' => '<p class="comment_notes">' . esc_html__('Your email address will not be published. Required fields are marked *', 'munbox_theme') . '</p>',
            'comment_notes_after' => '',

            'submit_button'       => '<button type="submit" class="comment_submit main_yellow_button">%1$s</button>',
            'submit_field'        => '<p class="form-submit">%1$s %2$s</p>',
            'class_form'          => 'custom_comment_form',
        );
        
        comment_form($comment_form_args);
    ?>

</div>
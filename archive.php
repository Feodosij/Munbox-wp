<?php
get_header();
?>

<main>
    <?php
        $queried_object = get_queried_object();
        if ($queried_object && !is_wp_error($queried_object)) {
            if (is_category()) {
                $title = 'Category: ' . single_cat_title('', false);
            } elseif (is_tag()) {
                $title = 'Tag: ' . single_tag_title('', false);
            } elseif (is_author()) {
                $author = get_user_by('slug', get_query_var('author_name'));
                $title = 'Author: ' . ($author ? $author->display_name : '');
            } elseif (is_date()) {
                $title = get_the_archive_title();
            } else {
                $title = get_the_archive_title();
            }
            ?>
            <div class="banner">
                <div class="banner_container">
                    <h2><?php echo esc_html($title); ?></h2>
                </div>
            </div>
            <?php
        } else {
            ?>
            <div class="banner">
                <div class="banner_container">
                    <h2><?php echo esc_html('Archive'); ?></h2>
                </div>
            </div>
            <?php
        }
    ?>

    <div class="container">
        <?php
            if (have_posts()) {
                ?>
                <div class="archive-posts">
                    <?php
                    while (have_posts()) {
                        the_post();
                        get_template_part('template-parts/post', 'small');
                    }
                    ?>
                </div>

                <?php
                the_posts_pagination(array(
                    'mid_size' => 2,
                    'prev_text' => '« Previous',
                    'next_text' => 'Next »',
                ));
            } else {
                echo '<p>No posts found.</p>';
            }
        ?>
    </div>
</main>

<?php
get_footer();
?>
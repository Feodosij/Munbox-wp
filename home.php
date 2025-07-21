<?php get_header(); ?>

<main>
    <div class="banner">
        <div class="banner_container">
            <h1>Blog</h1>
        </div>
    </div>

    <div class="container">
        <div class="blog_grid">
            <div class="blog_posts">
                <?php if (have_posts()) {
                    while (have_posts()) {
                        the_post();
                
                        get_template_part('template-parts/post', 'large');
                
                    } ?>
                    <div class="pagination">
                        <?php
                            echo paginate_links(array(
                                'prev_text' => 'Previous',
                                'next_text' => 'Next',
                                'type'      => 'plain',
                                'mid_size'  => 2,
                            ));
                        ?>
                    </div>
                <?php } else {
                    echo '<p>Записей пока нет.</p>';
                } ?>
            </div>
            
            <aside class="sidebar">
                <?php get_search_form(); ?>

                <div class="featured_widget sidebar_block">
                    <h3>Featured</h3>

                    <ul class="featured_list">
                        <?php
                            $recent_posts = new WP_Query([
                                'posts_per_page' => 5,
                                'post_status'    => 'publish',
                                'orderby'        => 'date',
                                'order'          => 'DESC'
                            ]);

                            if ( $recent_posts->have_posts() ) {
                                while ( $recent_posts->have_posts() ) {
                                    $recent_posts->the_post();
                                    echo '<li class="featured_item"><a href=" ' . get_permalink() . '">' . get_the_title() . '</a></li>';
                                }
                                wp_reset_postdata();
                            } else {
                                echo '<li>No posts.</li>';
                            }
                        ?>
                    </ul>
                </div>
                <div class="category_widget sidebar_block">
                    <h3>Categories</h3>

                    <ul class="category_list">
                        <?php
                            $categories = get_categories([
                                'orderby' => 'name',
                                'order'   => 'ASC'
                            ]);

                            foreach ( $categories as $category ) {
                                $category_link = get_category_link( $category->term_id );
                                echo '<li class="category_item"><a href="' . esc_url( $category_link ) . '">' . esc_html( $category->name ) . '</a></li>';
                            }
                        ?> 
                    </ul>
                </div>
            </aside>
        </div>
    </div>
</main>

<?php get_footer(); ?>
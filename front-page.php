<?php
/*
Template Name: Front page
Template Post Type: page
*/ 
?>

<?php get_header(); ?>

<main>
    <div class="container">
        <div class="category-preview">
            <h3 class="category-preview__title">Music & Culture</h3>
            <div class="category-preview__posts">
                <?php 
                    $query_1 = new WP_Query([
                        'posts_per_page' => 3,
                        'category_name'  => 'music, culture',
                    ]);

                    if( $query_1 -> have_posts()) {
                        while( $query_1 -> have_posts()) {
                            $query_1 -> the_post();

                            get_template_part('template-parts/post', 'small');
                        }
                        wp_reset_postdata();
                    }
                ?>
            </div>
            <div class="category-preview__button">
                <a href="/blog" class="category-preview__button-link main_yellow_button">More Posts</a>
            </div>
        </div>


        <div class="category-preview">
            <h3 class="category-preview__title">Travel & Food</h3>
            <div class="category-preview__posts">
                <?php 
                    $query_2 = new WP_Query([
                        'posts_per_page' => 3,
                        'category_name'  => 'travel, food',
                    ]);

                    if( $query_2 -> have_posts()) {
                        while( $query_2 -> have_posts()) {
                            $query_2 -> the_post();

                            get_template_part('template-parts/post', 'small');
                        }
                        wp_reset_postdata();
                    }
                ?>
            </div>
            <div class="category-preview__button">
                <a href="/blog" class="category-preview__button-link main_yellow_button">More Posts</a>
            </div>
        </div>

        <div class="category-preview">
            <h3 class="category-preview__title">Humor</h3>
            <div class="category-preview__posts">
                <?php 
                    $query_3 = new WP_Query([
                        'posts_per_page' => 3,
                        'category_name'  => 'humor',
                    ]);

                    if( $query_3 -> have_posts()) {
                        while( $query_3 -> have_posts()) {
                            $query_3 -> the_post();

                            get_template_part('template-parts/post', 'small');
                        }
                        wp_reset_postdata();
                    }
                ?>
            </div>
            <div class="category-preview__button">
                <a href="/blog" class="category-preview__button-link main_yellow_button">More Posts</a>
            </div>
        </div>

        <div class="category-preview">
            <h3 class="category-preview__title">Fasion</h3>
            <div class="category-preview__posts">
                <?php 
                    $query_4 = new WP_Query([
                        'posts_per_page' => 3,
                        'category_name'  => 'fasion',
                    ]);

                    if( $query_4 -> have_posts()) {
                        while( $query_4 -> have_posts()) {
                            $query_4 -> the_post();

                            get_template_part('template-parts/post', 'small');
                        }
                        wp_reset_postdata();
                    }
                ?>
            </div>
            <div class="category-preview__button">
                <a href="/blog" class="category-preview__button-link main_yellow_button">More Posts</a>
            </div>
        </div>
        
    </div>
    
</main>

<?php get_footer(); ?>

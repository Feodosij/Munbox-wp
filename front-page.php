<?php
/*
Template Name: Front page
Template Post Type: page
*/ 
?>

<?php get_header(); ?>

<main>
    <div class="container">

        <div class="slider swiper">
            <div class="swiper-wrapper">
                <?php
                $args = array(
                    'post_type'      => 'post',
                    'posts_per_page' => 5,
                    'tax_query'      => array(
                        array(
                            'taxonomy' => 'category',
                            'field'    => 'slug',
                            'terms'    => 'featured',
                        ),
                    ),
                );
                $query = new WP_Query($args);

                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post(); ?>
                    
                    <div class="swiper-slide slider__slide">
                        <div class="slider__image">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail(''); ?>
                            <?php endif; ?>
                        </div>
                        <div class="slider__content">
                            <p class="slider__meta">
                                <?php echo get_the_date(); ?> — 
                                <a href="<?php echo esc_url( get_category_link( get_cat_ID( 'featured' ) ) ); ?>">
                                    <?php echo esc_html( get_cat_name( get_cat_ID( 'featured') ) ); ?>
                                </a>
                            </p>

                            <h2 class="slider__title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>

                            <p class="slider__excerpt"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                        </div>
                    </div>

                    <?php endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>

            <!-- кнопки навигации -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
            
            <!-- пагинация (если нужна) -->
            <div class="swiper-pagination"></div>
        </div>

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

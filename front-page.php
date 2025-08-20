<?php
/*
Template Name: Front page
Template Post Type: page
*/ 
?>

<?php get_header(); ?>

<main>
    <div class="container">

        <section class="slider swiper">
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

                if ( $query -> have_posts() ) {
                    while ( $query -> have_posts() ) {
                    $query -> the_post(); ?>
                    
                        <div class="swiper-slide slider__slide">
                            <div class="slider__image">
                                <?php if (has_post_thumbnail()) { ?>
                                    <?php the_post_thumbnail(''); ?>
                                <?php } ?>
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

                    <?php }
                    wp_reset_postdata();
                }
                ?>
            </div>


            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
            
            <div class="swiper-pagination"></div>
        </section>

        <section class="category-preview-blocks">
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

                        if( $query_2 -> have_posts() ) {
                            while( $query_2 -> have_posts() ) {
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

                        if( $query_3 -> have_posts() ) {
                            while( $query_3 -> have_posts() ) {
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

                        if( $query_4 -> have_posts() ) {
                            while( $query_4 -> have_posts() ) {
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
        </section>

        <section class="block_overview">
            <div class="latest_posts_wrapper">
                <h3 class="latest_posts_title">Latest Posts</h3>

                <div class="latest_posts">
                    <?php
                        $args = array(
                            'post_type'      => 'post',
                            'posts_per_page' => 4,
                        );

                        $latest_post = new WP_Query($args);

                        if ( $latest_post -> have_posts() ) {
                            while ( $latest_post -> have_posts() ) {
                                $latest_post -> the_post(); 
                            
                                get_template_part('template-parts/post', 'small');

                            } 
                            wp_reset_postdata();
                        }
                    ?>
                </div>

                <div class="latest_posts_button">
                    <a href="/blog" class="main_yellow_button">More Posts</a>
                </div>
            </div>
            <aside class="sidebar">
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

                <div class="aside-images">
                    <h4 class="aside-images__title">Gallery</h4>
                    <div class="aside-images__gallery">
                        <figure class="aside-images__gallery-item">
                            <img src="<?php echo get_template_directory_uri(); ?>/src/img/Figure 1.png" alt="Gallery image 1">
                        </figure>
                        <figure class="aside-images__gallery-item">
                            <img src="<?php echo get_template_directory_uri(); ?>/src/img/Figure 2.png" alt="Gallery image 2">
                        </figure>
                        <figure class="aside-images__gallery-item">
                            <img src="<?php echo get_template_directory_uri(); ?>/src/img/Figure 3.png" alt="Gallery image 3">
                        </figure>
                        <figure class="aside-images__gallery-item">
                            <img src="<?php echo get_template_directory_uri(); ?>/src/img/Figure 4.png" alt="Gallery image 4">
                        </figure>
                        <figure class="aside-images__gallery-item">
                            <img src="<?php echo get_template_directory_uri(); ?>/src/img/Figure 5.png" alt="Gallery image 5">
                        </figure>
                        <figure class="aside-images__gallery-item">
                            <img src="<?php echo get_template_directory_uri(); ?>/src/img/Figure 6.png" alt="Gallery image 6">
                        </figure>
                    </div>
                </div>
            </aside>
        </section>

        <section class="subscribe">
            <div class="subscribe__container">
                <h3 class="subscribe__title">Subscribe and Stay Informed</h3>
                <p class="subscribe__text">
                    Oratio pertinax cu vix, id his aliquam habemus tractatos. Eu cursus modo
                    officiis liberavisse invidunt adipiscing cursus has.
                </p>
                <form action="#" method="post" class="subscribe__form">
                    <input 
                        type="email" 
                        name="email" 
                        class="subscribe__input" 
                        placeholder="Your email" 
                        required
                    >
                    <button type="submit" class="subscribe__button main_yellow_button">Subscribe</button>
                </form>
            </div>
        </section>
        
    </div>
    
</main>

<?php get_footer(); ?>

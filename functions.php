<?php

show_admin_bar(false);


if (!defined('ABSPATH')) {
    exit;
}

function munbox_setup() {

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption']);
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 74,
			'width'       => 184,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

    add_image_size('custom-large', 728, 536, true);
    add_image_size('custom-small', 358, 264, true);

	// Menus
	register_nav_menus( array(
        'main_menu'         => 'Main menu',
        'footer_about_menu' => 'Footer About Menu',
        'footer_product_menu' => 'Footer Product Menu',
    ));
}
add_action( 'after_setup_theme', 'munbox_setup' );

function munbox_enqueue_scripts() {
    wp_enqueue_style( 'munbox-theme-style', get_stylesheet_uri() ); 
    wp_enqueue_style( 'main_css', get_stylesheet_directory_uri() . '/dist/css/main.css',  array(), '1.0' );

	wp_enqueue_style( 'swiper-css', get_template_directory_uri() . '/dist/vendor/swiper-bundle.min.css', [], '11.0.0' );
	wp_enqueue_script( 'swiper-js', get_template_directory_uri() . '/dist/vendor/swiper-bundle.min.js', [], '11.0.0', true );

    wp_enqueue_script( 'munbox-scripts', get_template_directory_uri() . '/dist/js/main.js', array('swiper-js'), null, true );
}
add_action('wp_enqueue_scripts', 'munbox_enqueue_scripts');

function add_additional_class_on_li($classes, $item, $args) {
    if (isset($args->menu_class) && $args->menu_class === 'nav__list') {
        $classes[] = 'nav__list-item';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 10, 3);

function true_excerpt_length( $length ){
	return 23;
}
 
add_filter( 'excerpt_length', 'true_excerpt_length', 10, 1);

function true_excerpt_more( $more ){
	return '<a href="' . esc_url(get_permalink()) . '">...</a>';
}
 
add_filter( 'excerpt_more', 'true_excerpt_more', 10, 1);
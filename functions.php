<?php

if (!defined('ABSPATH')) {
    exit;
}

function munbox_enqueue_scripts() {
    wp_enqueue_style( 'munbox-theme-style', get_stylesheet_uri() ); 
    wp_enqueue_style( 'main_css', get_stylesheet_directory_uri() . '/dist/css/main.css',  array(), '1.0' );
    wp_enqueue_script('munbox-scripts', get_template_directory_uri() . '/dist/js/main.js', [], null, true);
}
add_action('wp_enqueue_scripts', 'munbox_enqueue_scripts');
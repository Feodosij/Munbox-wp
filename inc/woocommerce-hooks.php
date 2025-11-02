<?php
/**
 * Custom WooCommerce Hooks
 */


if ( ! class_exists( 'WooCommerce' ) ) {
    return;
}

// WRAPPERS
add_action( 'after_setup_theme', 'munbox_custom_woocommerce_wrappers' );

function munbox_custom_woocommerce_wrappers() {
    // Remove default wrappers WC
    remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
    remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
    // Add custom wrappers
    add_action( 'woocommerce_before_main_content', 'munbox_wc_wrapper_start', 10 );
    add_action( 'woocommerce_after_main_content', 'munbox_wc_wrapper_end', 10 );
}

function munbox_wc_wrapper_start() {
    echo '<main><div class="container">';
}
function munbox_wc_wrapper_end() {
    echo '</div></main>';
}

// remove SIDEBAR
add_action( 'woocommerce_before_main_content', 'munbox_wc_remove_sidebar', 5 );

function munbox_wc_remove_sidebar() {
    remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
}


// ----- SHOP PAGE -----


// remove RESULT COUNT + ORDER SORT
add_action( 'woocommerce_before_main_content', 'munbox_wc_remove_order_count_sort', 5 );

function munbox_wc_remove_order_count_sort() {
    remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
    remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
}


// remove STAR RATING on product card
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);


// added my class to button ADD TO CART
add_filter( 'woocommerce_loop_add_to_cart_args', 'munbox_add_class_to_loop_add_to_cart', 10, 2 );
function munbox_add_class_to_loop_add_to_cart( $args, $product ) {
    $args['class'] .= ' main_yellow_button';
    return $args;
}


// ----- SINGLE PRODUCT PAGE -----


// remove STAR RATING on single product
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);


// added custom wrapper to SUMMARY block
add_action( 'woocommerce_before_single_product_summary', 'open_custom_wrapper', 1 );
function open_custom_wrapper() {
    echo '<div class="product_main_content_wrapper">';
}

add_action( 'woocommerce_after_single_product_summary', 'close_custom_wrapper', 1 );
function close_custom_wrapper() {
    echo '</div>';
}


// remove SKU 
add_filter( 'wc_product_sku_enabled', '__return_false' );



// change BREADCRUMBS on single product page
add_filter( 'woocommerce_get_breadcrumb', 'my_custom_product_breadcrumbs', 20, 2 );
function my_custom_product_breadcrumbs( $crumbs, $breadcrumb_class ) {

    if ( is_product() ) {
        $home_crumb = $crumbs[0];

        $product_crumb = array_pop( $crumbs );

        $new_crumbs = array();
        $new_crumbs[] = $home_crumb;

        $shop_page_id = wc_get_page_id( 'shop' );
        
        if ( $shop_page_id && $shop_page_id > 0 ) {
            $shop_crumb = array(
                get_the_title( $shop_page_id ),
                get_permalink( $shop_page_id )
            );
            $new_crumbs[] = $shop_crumb;
        }

        $new_crumbs[] = $product_crumb;

        return $new_crumbs;
    }

    return $crumbs;
}


// change size Gallery thumbnails (under main img)
add_filter( 'woocommerce_get_image_size_gallery_thumbnail', 'my_wc_gallery_thumbnail_size' );
function my_wc_gallery_thumbnail_size( $size ) {
    return array(
        'width'  => 128,
        'height' => 128,
        'crop'   => true,
    );
}


// add my class to reviews submit button
add_filter( 'comment_form_defaults', function( $defaults ) {
    $defaults['class_submit'] .= ' main_yellow_button';
    return $defaults;
});


// add separator before related products on single product page
add_action( 'woocommerce_after_single_product_summary', 'munbox_add_separator_after_single_product_summary', 19 );
function munbox_add_separator_after_single_product_summary() {
    echo '<hr class="munbox_separator">';
}


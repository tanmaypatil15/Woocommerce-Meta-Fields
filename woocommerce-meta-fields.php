<?php
/*
Plugin Name: Woo Products Meta API
Description: Adds woocommerce products meta data to WooCommerce Products API response.
Version: 1.0
Author: Tanmay Patil
*/

// Add custom meta data to WooCommerce Products API response
add_filter('woocommerce_rest_prepare_product_object', 'add_custom_meta_to_product_api_response', 10, 3);

function add_custom_meta_to_product_api_response($response, $object, $request) {
    // Get product ID
    $product_id = $object->get_id();

    // Get custom meta data
    $wc_points_earned = get_post_meta($product_id, '_wc_points_earned', true);
    $wc_points_max_discount = get_post_meta($product_id, '_wc_points_max_discount', true);

    // Add custom meta data to API response
    $response->data['wc_points_earned'] = $wc_points_earned;
    $response->data['wc_points_max_discount'] = $wc_points_max_discount;

    return $response;
}

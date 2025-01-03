<?php
// Prevent direct access.
if (!defined('ABSPATH')) {
    exit;
}

// Register a "Portfolio" custom post type.
function heron_register_portfolio_post_type() {
    $labels = [
        'name'               => __('Portfolios', 'heron'),
        'singular_name'      => __('Portfolio', 'heron'),
        'add_new'            => __('Add New', 'heron'),
        'add_new_item'       => __('Add New Portfolio', 'heron'),
        'edit_item'          => __('Edit Portfolio', 'heron'),
        'new_item'           => __('New Portfolio', 'heron'),
        'view_item'          => __('View Portfolio', 'heron'),
        'search_items'       => __('Search Portfolios', 'heron'),
        'not_found'          => __('No Portfolios Found', 'heron'),
        'not_found_in_trash' => __('No Portfolios Found in Trash', 'heron'),
    ];

    $args = [
        'labels'             => $labels,
        'public'             => true,
        'supports'           => ['title', 'editor', 'thumbnail', 'excerpt'],
        'has_archive'        => true,
        'rewrite'            => ['slug' => 'portfolio'],
    ];

    register_post_type('portfolio', $args);
}
add_action('init', 'heron_register_portfolio_post_type');

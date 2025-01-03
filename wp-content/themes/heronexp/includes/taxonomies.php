<?php
// Prevent direct access.
if (!defined('ABSPATH')) {
    exit;
}

// Register a "Skills" taxonomy for the "Portfolio" post type.
function heron_register_skills_taxonomy() {
    $labels = [
        'name'              => __('Skills', 'heron'),
        'singular_name'     => __('Skill', 'heron'),
        'search_items'      => __('Search Skills', 'heron'),
        'all_items'         => __('All Skills', 'heron'),
        'edit_item'         => __('Edit Skill', 'heron'),
        'update_item'       => __('Update Skill', 'heron'),
        'add_new_item'      => __('Add New Skill', 'heron'),
        'new_item_name'     => __('New Skill Name', 'heron'),
        'menu_name'         => __('Skills', 'heron'),
    ];

    $args = [
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => ['slug' => 'skill'],
    ];

    register_taxonomy('skill', ['portfolio'], $args);
}
add_action('init', 'heron_register_skills_taxonomy');

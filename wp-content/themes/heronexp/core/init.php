<?php
// Initialize theme setup
function heron_theme_setup() {
    // Add support for title tag
    add_theme_support('title-tag');
    // Add support for post thumbnails
    add_theme_support('post-thumbnails');
    // Add support for custom logo
    add_theme_support('custom-logo');
    // Add support for HTML5
    add_theme_support('html5', ['search-form', 'comment-form', 'gallery', 'caption']);
    // Add support for editor styles
    add_editor_style('assets/css/editor-style.css');
}
add_action('after_setup_theme', 'heron_theme_setup');

// Enqueue scripts and styles
function heron_enqueue_assets() {
    wp_enqueue_style('heron-style', get_stylesheet_uri(), [], wp_get_theme()->get('Version'));
    wp_enqueue_script('heron-main', get_template_directory_uri() . '/assets/js/main.js', ['jquery'], wp_get_theme()->get('Version'), true);
}
add_action('wp_enqueue_scripts', 'heron_enqueue_assets');

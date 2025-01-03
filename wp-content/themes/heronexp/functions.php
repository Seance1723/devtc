<?php
function heron_theme_setup() {
    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'comment-form', 'gallery', 'caption']);
    add_theme_support('align-wide');
    add_theme_support('editor-styles');
    add_theme_support('wp-block-styles');
    add_theme_support('custom-logo');
    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('editor-color-palette', [
        ['name' => 'Primary', 'slug' => 'primary', 'color' => '#1e90ff'],
        ['name' => 'Secondary', 'slug' => 'secondary', 'color' => '#ff6347']
    ]);

    register_nav_menus([
        'primary' => __('Primary Menu', 'heron'),
        'footer' => __('Footer Menu', 'heron')
    ]);
}
add_action('after_setup_theme', 'heron_theme_setup');

function heron_enqueue_scripts() {
    wp_enqueue_style('heron-style', get_stylesheet_uri());
    wp_enqueue_style('heron-main-css', get_template_directory_uri() . '/assets/css/style.css', [], '1.0.0');
    wp_enqueue_script('heron-main-js', get_template_directory_uri() . '/assets/js/main.js', ['jquery'], '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'heron_enqueue_scripts');

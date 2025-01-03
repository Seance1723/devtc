<?php
// Prevent direct access.
if (!defined('ABSPATH')) {
    exit;
}

// Add a custom class to body.
function heron_add_body_class($classes) {
    $classes[] = 'heron-theme';
    return $classes;
}
add_filter('body_class', 'heron_add_body_class');

// Customize excerpt length.
function heron_custom_excerpt_length($length) {
    return 20; // Number of words.
}
add_filter('excerpt_length', 'heron_custom_excerpt_length', 999);

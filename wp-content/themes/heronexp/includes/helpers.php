<?php
// Prevent direct access.
if (!defined('ABSPATH')) {
    exit;
}

// Helper function to get the theme version.
function heron_get_theme_version() {
    $theme = wp_get_theme();
    return $theme->get('Version');
}

// Helper function to sanitize text.
function heron_sanitize_text($text) {
    return sanitize_text_field($text);
}

// Debug helper to log data.
function heron_log($data) {
    if (defined('WP_DEBUG') && WP_DEBUG) {
        error_log(print_r($data, true));
    }
}

<?php
// Prevent direct access.
if (!defined('ABSPATH')) {
    exit;
}

// Display breadcrumb navigation.
function heron_breadcrumbs() {
    if (is_front_page()) {
        return;
    }

    echo '<nav class="breadcrumbs">';
    echo '<a href="' . home_url() . '">' . __('Home', 'heron') . '</a>';

    if (is_category() || is_single()) {
        echo ' &raquo; ';
        the_category(' &bull; ');
        if (is_single()) {
            echo ' &raquo; ';
            the_title();
        }
    } elseif (is_page()) {
        echo ' &raquo; ';
        echo the_title();
    } elseif (is_search()) {
        echo ' &raquo; ';
        echo __('Search Results for: ', 'heron') . get_search_query();
    }

    echo '</nav>';
}

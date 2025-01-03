<?php
function heron_add_dashboard_widget() {
    wp_add_dashboard_widget(
        'heron_widget',
        __('HERON Insights', 'heron'),
        'heron_dashboard_widget_callback'
    );
}

function heron_dashboard_widget_callback() {
    echo '<p>Welcome to the HERON Theme Dashboard! Explore the theme options and customize your site.</p>';
}

add_action('wp_dashboard_setup', 'heron_add_dashboard_widget');

<?php
function heron_register_api_routes() {
    register_rest_route('heron/v1', '/settings', [
        'methods'  => 'GET',
        'callback' => 'heron_get_settings',
    ]);
}

function heron_get_settings() {
    return [
        'primary_color' => get_theme_mod('heron_primary_color', '#0073aa'),
    ];
}

add_action('rest_api_init', 'heron_register_api_routes');

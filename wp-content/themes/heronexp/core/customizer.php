<?php
function heron_customize_register($wp_customize) {
    // Add a custom section
    $wp_customize->add_section('heron_general_settings', [
        'title'    => __('General Settings', 'heron'),
        'priority' => 30,
    ]);

    // Add a custom setting
    $wp_customize->add_setting('heron_primary_color', [
        'default'           => '#0073aa',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    // Add a control
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'heron_primary_color_control', [
        'label'    => __('Primary Color', 'heron'),
        'section'  => 'heron_general_settings',
        'settings' => 'heron_primary_color',
    ]));
}
add_action('customize_register', 'heron_customize_register');

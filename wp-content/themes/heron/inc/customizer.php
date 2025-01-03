<?php
/**
 * Customizer settings for the Phoenix theme.
 */

function phoenix_customize_register( $wp_customize ) {
    // Add a section for Theme Options
    $wp_customize->add_section( 'phoenix_theme_options', array(
        'title'    => esc_html__( 'Theme Options', 'phoenix' ),
        'priority' => 120,
    ) );

    // Add a setting for Header Background Color
    $wp_customize->add_setting( 'phoenix_header_background_color', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    // Add a control for Header Background Color
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'phoenix_header_background_color', array(
        'label'    => esc_html__( 'Header Background Color', 'phoenix' ),
        'section'  => 'phoenix_theme_options',
        'settings' => 'phoenix_header_background_color',
    ) ) );

    // Add more settings and controls as needed
}
add_action( 'customize_register', 'phoenix_customize_register' );

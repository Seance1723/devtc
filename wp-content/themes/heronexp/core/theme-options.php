<?php
function heron_add_theme_menu() {
    add_menu_page(
        __('HERON Theme Options', 'heron'),
        __('HERON Options', 'heron'),
        'manage_options',
        'heron-theme-options',
        'heron_theme_options_page',
        'dashicons-admin-generic',
        60
    );
}
add_action('admin_menu', 'heron_add_theme_menu');

function heron_theme_options_page() {
    ?>
    <div class="wrap">
        <h1><?php esc_html_e('HERON Theme Options', 'heron'); ?></h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('heron_options_group');
            do_settings_sections('heron-theme-options');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

function heron_register_theme_settings() {
    register_setting('heron_options_group', 'heron_option_1');
    add_settings_section('heron_main_section', __('Main Settings', 'heron'), null, 'heron-theme-options');
    add_settings_field('heron_field_1', __('Custom Option', 'heron'), 'heron_field_1_callback', 'heron-theme-options', 'heron_main_section');
}
add_action('admin_init', 'heron_register_theme_settings');

function heron_field_1_callback() {
    $value = get_option('heron_option_1', '');
    echo '<input type="text" name="heron_option_1" value="' . esc_attr($value) . '" />';
}

<?php
// Prevent direct access.
if (!defined('ABSPATH')) {
    exit;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="site-header">
    <div class="container">
        <div class="logo">
            <a href="<?php echo esc_url(home_url('/')); ?>">
                <?php bloginfo('name'); ?>
            </a>
        </div>
        <nav class="main-navigation">
            <?php wp_nav_menu(['theme_location' => 'primary', 'container' => false]); ?>
        </nav>
    </div>
</header>

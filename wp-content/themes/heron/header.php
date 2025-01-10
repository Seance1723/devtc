<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11" />
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content">
		<?php
		/* translators: Hidden accessibility text. */
		_e( 'Skip to content', 'phoenix' );
		?>
	</a>

    <!-- Preloader -->
    <div id="preloader" class="d-none">
        <div class="preloader-inner">
            <div class="spinner">
                <img src="https://wpthemebooster.com/demo/themeforest/html/kimono/assets/img/preloader-logo.svg" alt="img">
                <img src="https://wpthemebooster.com/demo/themeforest/html/kimono/assets/img/preloader-wheel.svg" alt="img" class="wheel">
            </div>
            
        </div>
    </div>
        
    <!-- pointer start -->
	<div class="pointer bnz-pointer" id="bnz-pointer"></div>

    <header id="site-nav" class="<?php echo is_singular() && phoenix_can_show_post_thumbnail() ? 'header color-fixed' : 'header color-fixed'; ?>">

        <div class="header-inner">
            <?php get_template_part( 'template-parts/header/site', 'branding' ); ?>
        </div><!-- .site-branding-container -->
        
    </header><!-- #masthead -->

    <div id="content" class="site-content">
        


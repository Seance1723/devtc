<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11" />
    <?php wp_head(); ?>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-5JTJF3WS');</script>
    <!-- End Google Tag Manager -->
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5JTJF3WS"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
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
        


<?php
/**
 * Displays header site branding
 *
 */
?>

<nav id="siteNav" class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <div class="site-branding">
            <?php if ( has_custom_logo() ) : ?>
                <div class="site-logo"><?php the_custom_logo(); ?></div>
            <?php endif; ?>

            <?php $blog_info = get_bloginfo( 'name' ); ?>
            <?php if ( ! empty( $blog_info ) && ! is_front_page() ) : ?>
                <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
            <?php endif; ?>

            <?php
            $description = get_bloginfo( 'description', 'display' );
            if ( $description || is_customize_preview() ) :
                ?>
                    <p class="site-description">
                        <?php echo $description; ?>
                    </p>
            <?php endif; ?>
        </div><!-- .site-branding -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <?php
            wp_nav_menu(
                array(
                    'theme_location'  => 'menu-1',
                    'container'       => false,
                    'menu_class'      => 'navbar-nav ms-auto mb-2 mb-lg-0',
                    'fallback_cb'     => '__return_false',
                    'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'depth'           => 2,
                    'walker'          => new WP_Bootstrap_Navwalker(),
                )
            );
            ?>
        </div>
    </div>
</nav>


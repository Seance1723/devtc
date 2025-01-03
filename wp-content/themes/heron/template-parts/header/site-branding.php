<?php
/**
 * Displays header site branding
 *
 */
?>

<div class="container-fluid pe-0">
    <div class="d-flex align-items-center justify-content-between">
        <!-- Left Part -->
        <div class="header_left_part d-flex align-items-center">
            <div class="logo">
                <?php if ( has_custom_logo() ) : ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="light_logo"><?php the_custom_logo(); ?></a>
                <?php else : ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.svg" alt="<?php bloginfo( 'name' ); ?>">
                    </a>
                <?php endif; ?>
            </div>
        </div>

        <!-- Center Part -->
        <div class="header_center_part d-none d-xl-block">
            <div class="mainnav">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location'  => 'menu-1',
                        'container'       => false,
                        'menu_class'      => 'main-menu d-inline-block',
                        'fallback_cb'     => '__return_false',
                        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'depth'           => 2,
                        'walker'          => new WP_Bootstrap_Navwalker(),
                    )
                );
                ?>
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary', // Register this location in functions.php
                    'container'      => 'ul',
                    'menu_class'     => 'main-menu d-inline-block',
                    'fallback_cb'    => false,
                ) );
                ?>
                <span class="cta-explore"><i class="bi bi-arrow-up-right"></i><a href="http://thoucentric.com">Explore More</a></span>
            </div>
        </div>

        <!-- Right Part -->
        <!-- <div class="header_right_part d-flex align-items-center">
            <div class="aside_open wptb-element">
                <div class="aside-open--inner">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>

            <div class="header_search wptb-element">
                <a href="#" class="modal_search_icon" data-bs-toggle="modal" data-bs-target="#modalSearch">
                    <i class="bi bi-search"></i>
                </a>
            </div>

            <button type="button" class="mr_menu_toggle wptb-element d-xl-none">
                <i class="bi bi-list"></i>
            </button>
        </div> -->
    </div>
</div>
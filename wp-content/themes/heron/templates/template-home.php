<?php
/*
Template Name: Home Page
Template Post Type: page
*/

get_header(); ?>

<div id="primary" class="content-area full-width container-fluid">
    <main id="main" class="site-main wrapper">
        <!-- Slider Section -->
        <section id="hero-main" class="hero-slider style3">
            <div class="hero-sec">
                <div class="hero-bg" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/slider/hero-img.png');"></div>
                <div class="hro-sec-inner">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7 col-xl-7">
                                <div class="hero-heading">
                                    <!-- <h6 class="wptb-item--subtitle">THOUCENTRIC</h6> -->
                                    <h1 class="hero-item--title">Enhancing Quality Management through Thoucentric’s expertise in Veeva Vault.</h1>
                                    <p class="hero-item--description">Bridge the gap between Quality Digital Transformation and business outcomes by unlocking Veeva Vault’s potential with Thoucentric</p>
                                                        
                                    <!-- <div class="hero-item--button">
                                        <a class="btn btn-two creative mx-0" href="#contact-main">
                                            <span class="btn-wrap">
                                                <span class="text-first">Contact Us Today!</span>
                                                    <span class="text-second"> <i class="bi bi-arrow-up-right"></i> <i class="bi bi-arrow-up-right"></i>
                                                </span>
                                            </span>
                                        </a>
                                    </div> -->
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 col-xl-5">
                                <div class="hero-sec-form ms-md-5">
                                    <?php echo apply_shortcodes( '[contact-form-7 id="b15f2d4" title="Contact form"]' ); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Layer Image -->
                <div class="hero-item-layer item-layer-one">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/slider/layer-4.png" alt="img">
                </div>

                <!-- Layer Image -->
                <div class="hero-item-layer item-layer-two">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/slider/layer-5.png" alt="img">
                </div>
            </div>
		</section>

    <?php
    while ( have_posts() ) :
        the_post();

        the_content();

    endwhile; // End of the loop.
    ?>
    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();

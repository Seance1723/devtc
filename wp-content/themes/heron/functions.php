<?php
/**
 * Heron functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Heron
 */

if ( ! function_exists( 'heron_setup' ) ) :
    function heron_setup() {
        load_theme_textdomain( 'heron', get_template_directory() . '/languages' );
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 1568, 9999 );

        register_nav_menus(
            array(
                'menu-1' => __( 'Primary', 'heron' ),
                'footer' => __( 'Footer Menu', 'heron' ),
                'social' => __( 'Social Links Menu', 'heron' ),
            )
        );

        add_theme_support(
            'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'script',
                'style',
                'navigation-widgets',
            )
        );

        add_theme_support(
            'custom-logo',
            array(
                'height'      => 190,
                'width'       => 190,
                'flex-width'  => true,
                'flex-height' => true,
            )
        );

        add_theme_support( 'customize-selective-refresh-widgets' );
        add_theme_support( 'wp-block-styles' );
        add_theme_support( 'align-wide' );
        add_theme_support( 'editor-styles' );

        add_theme_support(
            'editor-font-sizes',
            array(
                array(
                    'name'      => __( 'Small', 'heron' ),
                    'shortName' => __( 'S', 'heron' ),
                    'size'      => 19.5,
                    'slug'      => 'small',
                ),
                array(
                    'name'      => __( 'Normal', 'heron' ),
                    'shortName' => __( 'M', 'heron' ),
                    'size'      => 22,
                    'slug'      => 'normal',
                ),
                array(
                    'name'      => __( 'Large', 'heron' ),
                    'shortName' => __( 'L', 'heron' ),
                    'size'      => 36.5,
                    'slug'      => 'large',
                ),
                array(
                    'name'      => __( 'Huge', 'heron' ),
                    'shortName' => __( 'XL', 'heron' ),
                    'size'      => 49.5,
                    'slug'      => 'huge',
                ),
            )
        );

        add_theme_support( 'responsive-embeds' );
        add_theme_support( 'custom-line-height' );
    }
endif;
add_action( 'after_setup_theme', 'heron_setup' );
/**
 * Disable the block editor for widgets
 * 
 * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-block-editor-for-widgets
 */
function heron_use_classic_widgets() {
    // Disable the block editor for widgets
    remove_theme_support('widgets-block-editor');
}
add_action('after_setup_theme', 'heron_use_classic_widgets');


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function heron_widgets_init() {
    // Register existing footer widget area
    register_sidebar(
        array(
            'name'          => __( 'Sidebar', 'heron' ),
            'id'            => 'sidebar-1',
            'description'   => __( 'Add widgets here to appear in your footer.', 'heron' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    // Register 4 dynamic footer widget areas
    for ($i = 1; $i <= 4; $i++) {
        register_sidebar(array(
            'name'          => __('Footer Link Area ' . $i, 'heron'),
            'id'            => 'footer-widget-' . $i,
            'description'   => __('Add Link here for Footer Widget Area ' . $i, 'heron'),
            'before_widget' => '<div id="%1$s" class="footer-widget widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        ));
    }
}
add_action('widgets_init', 'heron_widgets_init');


class Custom_Heading_Widget extends WP_Widget {
    function __construct() {
        parent::__construct(
            'custom_heading_widget',
            esc_html__( 'Custom Heading Widget', 'heron' ),
            array( 'description' => esc_html__( 'A widget that outputs multiple headings', 'heron' ) )
        );
    }

    public function widget( $args, $instance ) {
        echo $args['before_widget'];
        for ( $i = 1; $i <= 4; $i++ ) {
            if ( ! empty( $instance["title$i"] ) ) {
                echo $args['before_title'] . apply_filters( 'widget_title', $instance["title$i"] ) . $args['after_title'];
            }
        }
        echo $args['after_widget'];
    }

    public function form( $instance ) {
        for ( $i = 1; $i <= 4; $i++ ) {
            $title = ! empty( $instance["title$i"] ) ? $instance["title$i"] : esc_html__( "New title $i", 'heron' );
            ?>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( "title$i" ) ); ?>"><?php esc_attr_e( "Title $i:", 'heron' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( "title$i" ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( "title$i" ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
            </p>
            <?php
        }
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        for ( $i = 1; $i <= 4; $i++ ) {
            $instance["title$i"] = ( ! empty( $new_instance["title$i"] ) ) ? sanitize_text_field( $new_instance["title$i"] ) : '';
        }
        return $instance;
    }
}

function register_custom_heading_widget() {
    register_widget( 'Custom_Heading_Widget' );
}
add_action( 'widgets_init', 'register_custom_heading_widget' );


function heron_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style( 'heron-style', get_stylesheet_uri(), array(), '1.0' );

    // Enqueue Bootstrap Icons
    wp_enqueue_style( 'bootstrap-icons', get_template_directory_uri() . '/assets/vendor/bootstrap-icons/font/bootstrap-icons.min.css', array(), '1.1' );

    // Enqueue other CSS files
    wp_enqueue_style( 'jquery-ui-css', get_template_directory_uri() . '/assets/vendor/jquery_ui/style.css', array(), null );
    wp_enqueue_style( 'animation-css', get_template_directory_uri() . '/assets/css/animation.css', array(), null );
    wp_enqueue_style( 'wow-css', get_template_directory_uri() . '/assets/vendor/wow/animate.css', array(), null );
    wp_enqueue_style( 'swiper-css', get_template_directory_uri() . '/assets/vendor/swiper/swiper-bundle.min.css', array(), null );
    wp_enqueue_style( 'swiper-gl-css', get_template_directory_uri() . '/assets/vendor/swiper/swiper-gl.min.css', array(), null );
    wp_enqueue_style( 'odometer-css', get_template_directory_uri() . '/assets/vendor/odometer/odometer-theme-default.css', array(), null );
    wp_enqueue_style( 'fancybox-css', get_template_directory_uri() . '/assets/vendor/fancybox/jquery.fancybox.css', array(), null );
    wp_enqueue_style( 'flatpickr-css', get_template_directory_uri() . '/assets/vendor/flatpickr/flatpickr.css', array(), null );
    wp_enqueue_style( 'nice-select-css', get_template_directory_uri() . '/assets/vendor/nice-select/nice-select.css', array(), null );
    wp_enqueue_style( 'cursor-effect-css', get_template_directory_uri() . '/assets/vendor/cursor-effect/cursor-effect.css', array(), null );


    // Deregister the default jQuery included by WordPress
    wp_deregister_script('jquery');

    // Register jQuery from a CDN or local version
    wp_register_script('jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), null, true);

    // Enqueue jQuery (already included by WordPress)
    wp_enqueue_script( 'jquery' );

    // Enqueue Bootstrap JS
    wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/vendor/bootstrap/js/bootstrap.bundle.min.js', array('jquery'), '4.5.2', true );

    // Enqueue Tabler Icons (CDN)
    wp_enqueue_style('tabler-icons', 'https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css', array(), null);

    // Enqueue WOW Scroll Effect
    wp_enqueue_script( 'wow-js', get_template_directory_uri() . '/assets/vendor/wow/wow.min.js', array('jquery'), null, true );

    // Enqueue Swiper Slider JS
    wp_enqueue_script( 'swiper-js', get_template_directory_uri() . '/assets/vendor/swiper/swiper-bundle.min.js', array('jquery'), null, true );
    wp_enqueue_script( 'swiper-gl-js', get_template_directory_uri() . '/assets/vendor/swiper/swiper-gl.min.js', array('jquery'), null, true );

    // Enqueue Odometer JS and Appear
    wp_enqueue_script( 'odometer-js', get_template_directory_uri() . '/assets/vendor/odometer/odometer.js', array('jquery'), null, true );
    wp_enqueue_script( 'appear-js', get_template_directory_uri() . '/assets/vendor/odometer/appear.js', array('jquery'), null, true );

    // Enqueue Isotope for Projects
    wp_enqueue_script( 'isotope-js', get_template_directory_uri() . '/assets/vendor/isotope/isotope.pkgd.min.js', array('jquery'), null, true );
    wp_enqueue_script( 'imagesloaded-js', get_template_directory_uri() . '/assets/vendor/isotope/imagesloaded.pkgd.min.js', array('jquery'), null, true );
    wp_enqueue_script( 'tilt-js', get_template_directory_uri() . '/assets/vendor/isotope/tilt.jquery.js', array('jquery'), null, true );

    // Enqueue Fancybox
    wp_enqueue_script( 'fancybox-js', get_template_directory_uri() . '/assets/vendor/fancybox/jquery.fancybox.min.js', array('jquery'), null, true );

    // Enqueue Flatpickr
    wp_enqueue_script( 'flatpickr-js', get_template_directory_uri() . '/assets/vendor/flatpickr/flatpickr.min.js', array('jquery'), null, true );

    // Enqueue Nice Select
    wp_enqueue_script( 'nice-select-js', get_template_directory_uri() . '/assets/vendor/nice-select/jquery.nice-select.min.js', array('jquery'), null, true );

    // Enqueue Kursor.js script
    wp_enqueue_script(
        'kursor-js',
        'https://cdn.jsdelivr.net/npm/kursor@0.0.14/dist/kursor.js',
        array(), // No dependencies
        null,
        true // Load in footer
    );

    // Enqueue heron main JS
    wp_enqueue_script( 'heron-main-js', get_template_directory_uri() . '/assets/js/heron.js', array('jquery'), '1.0', true );

    // Enqueue comment reply script if needed
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'heron_scripts' );

function initialize_kursor_js() {
    echo '<script>
        document.addEventListener("DOMContentLoaded", function () {
            new kursor({
                type: 5,
                removeDefaultCursor: true
            });
        });
    </script>';
}
add_action('wp_footer', 'initialize_kursor_js');

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Register Bootstrap Nav Walker
 */
function heron_register_navwalker(){
    require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'heron_register_navwalker' );

/**
 * Hide entry title on home page
 */
function hide_entry_title_on_home($title, $id = null) {
    if ((is_home() || is_front_page()) && in_the_loop() && !is_admin()) {
        return '';
    }
    return $title;
}
add_filter('the_title', 'hide_entry_title_on_home', 10, 2);

/**
 * Displays an optional post thumbnail.
 */
if ( ! function_exists( 'heron_post_thumbnail' ) ) :
    function heron_post_thumbnail() {
        if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
            return;
        }

        if ( is_singular() ) :
            ?>

            <div class="post-thumbnail">
                <?php the_post_thumbnail(); ?>
            </div><!-- .post-thumbnail -->

        <?php else : ?>

            <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
                <?php
                the_post_thumbnail( 'post-thumbnail', array(
                    'alt' => the_title_attribute( array(
                        'echo' => false,
                    ) ),
                ) );
                ?>
            </a>

        <?php endif; // End is_singular().
    }
endif;

/**
 * Form submission handler for contact form 7
 */


function validate_org_email($result, $tag) {
    // Get the field name and value
    $name = $tag['name'];
    $email = isset($_POST[$name]) ? sanitize_email($_POST[$name]) : '';

    // Check if email is provided
    if (empty($email)) {
        $result->invalidate($tag, 'Email is required.');
        return $result;
    }

    // Extract the email domain
    $email_domain = substr(strrchr($email, "@"), 1);

    // Path to the text file containing public email domains
    $file_path = get_template_directory() . '/email-validator/public-emails.txt';

    // Validate file existence and read content
    if (file_exists($file_path) && is_readable($file_path)) {
        $public_emails = file($file_path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        if (in_array($email_domain, $public_emails)) {
            $result->invalidate($tag, 'Please enter an organizational email address.');
        }
    } else {
        error_log('Error: Unable to read public-emails.txt at ' . $file_path);
    }

    return $result;
}

add_action('wpcf7_validate_email*', 'validate_org_email', 10, 2);

function hide_all_wpcf7_response_outputs() {
    ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.addEventListener('wpcf7submit', function () {
                const responseOutputs = document.querySelectorAll('.wpcf7-response-output');
                responseOutputs.forEach(function (element) {
                    element.style.display = 'none';
                });
            });
        });
    </script>
    <?php
}
add_action('wp_footer', 'hide_all_wpcf7_response_outputs');


/**
 * Custom script to display CF7 success message and remove it after an interval.
 */
function custom_cf7_redirect_script() {
    ?>
    <script>
    document.addEventListener( 'wpcf7submit', function( event ) {
        // Check if the form submission was successful
        if (event.detail.status === 'mail_sent') {
            // Redirect to the Thank You page
            window.location.href = "https://veeva.thoucentric.com/thank-you/";
        }
        // If there's an error, do nothing
    }, false );
    </script>
    <?php
}
add_action('wp_footer', 'custom_cf7_redirect_script');


function custom_cf7_success_message_script() {
    ?>
    <script type="text/javascript">
        document.addEventListener('wpcf7mailsent', function(event) {
            const messageContainer = document.createElement('div');
            messageContainer.classList.add('cf7-success-message');
            messageContainer.innerText = event.detail.apiResponse.message;
            document.querySelector('.wpcf7').appendChild(messageContainer);

            setTimeout(function() {
                messageContainer.remove();
            }, 3000); // Change the timeout value to the desired interval (in milliseconds)
        }, false);
    </script>
    <style>
        .cf7-success-message {
            color: green;
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
    <?php
}
add_action('wp_footer', 'custom_cf7_success_message_script');
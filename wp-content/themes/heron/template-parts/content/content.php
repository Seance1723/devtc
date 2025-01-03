<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php
        if ( !is_front_page() && is_home() ) {
            // Your custom code here
            echo 'This is the blog page but not the front page.';
        }
    ?>
	<?php if (!is_front_page() && is_home()): // Only show header if not on the front page ?>
        <header class="entry-header">
            <?php
            if ( is_sticky() && is_home() && ! is_paged() ) {
                printf( '<span class="sticky-post">%s</span>', _x( 'Featured', 'post', 'phoenix' ) );
            }
            if ( is_singular() ) :
                the_title( '<h1 class="entry-title">', '</h1>' );
            else :
                the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
            endif;
            ?>
        </header><!-- .entry-header -->
    <?php endif; ?>

    <?php phoenix_post_thumbnail(); ?>

    <div class="entry-content">
        <?php
        the_content(
            sprintf(
                wp_kses(
                    /* translators: %s: Post title. Only visible to screen readers. */
                    __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'phoenix' ),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                get_the_title()
            )
        );

        wp_link_pages(
            array(
                'before' => '<div class="page-links">' . __( 'Pages:', 'phoenix' ),
                'after'  => '</div>',
            )
        );
        ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php phoenix_entry_footer(); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->

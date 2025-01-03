<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php if ( ! ( is_front_page() || is_home() ) ) : ?>
		<?php
		$header_style = has_post_thumbnail() ? 'style="background-image: url(\'' . esc_url( get_the_post_thumbnail_url() ) . '\');"' : 'style="background-image: url(\'' . esc_url( get_template_directory_uri() ) . '/assets/images/default-image.jpg\');"';

		// Additional classes for parallax effect
		$header_classes = has_post_thumbnail() ? 'entry-header parallax-bg' : 'entry-header parallax-bg default-bg';
		?>

		<header id="from-page-template" class="<?php echo esc_attr( $header_classes ); ?>" <?php echo $header_style; ?>>
			<div class="container">
				<?php get_template_part( 'template-parts/header/entry', 'header' ); ?>
			</div>
		</header><!-- .entry-header -->
	<?php endif; ?>


    <div class="entry-content">
        <?php
        the_content();

        wp_link_pages(
            array(
                'before' => '<div class="page-links">' . __( 'Pages:', 'phoenix' ),
                'after'  => '</div>',
            )
        );
        ?>
    </div><!-- .entry-content -->

    <?php if ( get_edit_post_link() ) : ?>
        <footer class="entry-footer">
            <?php
            edit_post_link(
                sprintf(
                    wp_kses(
                        /* translators: %s: Post title. Only visible to screen readers. */
                        __( 'Edit <span class="screen-reader-text">%s</span>', 'phoenix' ),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    get_the_title()
                ),
                '<span class="edit-link">' . phoenix_get_icon_svg( 'edit', 16 ),
                '</span>'
            );
            ?>
        </footer><!-- .entry-footer -->
    <?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->

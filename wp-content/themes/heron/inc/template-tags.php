<?php
/**
 * Custom template tags for this theme.
 */

if ( ! function_exists( 'phoenix_posted_on' ) ) :
    /**
     * Prints HTML with meta information for the current post-date/time.
     */
    function phoenix_posted_on() {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
        }

        $time_string = sprintf(
            $time_string,
            esc_attr( get_the_date( DATE_W3C ) ),
            esc_html( get_the_date() ),
            esc_attr( get_the_modified_date( DATE_W3C ) ),
            esc_html( get_the_modified_date() )
        );

        printf(
            '<span class="posted-on">%s</span>',
            sprintf(
                '<a href="%1$s" rel="bookmark">%2$s</a>',
                esc_url( get_permalink() ),
                $time_string
            )
        );
    }
endif;

/**
 * Display navigation to next/previous set of posts.
 */
function phoenix_the_posts_navigation() {
    the_posts_pagination( array(
        'prev_text' => esc_html__( 'Previous', 'phoenix' ),
        'next_text' => esc_html__( 'Next', 'phoenix' ),
    ) );
}

if ( ! function_exists( 'phoenix_can_show_post_thumbnail' ) ) :
    /**
     * Determines if the current post can show a post thumbnail.
     *
     * @return bool
     */
    function phoenix_can_show_post_thumbnail() {
        return apply_filters( 'phoenix_can_show_post_thumbnail', ! post_password_required() && ! is_attachment() && has_post_thumbnail() );
    }
endif;

if ( ! function_exists( 'phoenix_get_discussion_data' ) ) :
    /**
     * Retrieves discussion data for the current post.
     *
     * @return object
     */
    function phoenix_get_discussion_data() {
        $post_id = get_the_ID();
        if ( ! $post_id ) {
            return (object) array( 'authors' => array(), 'count' => 0 );
        }

        $comments = get_comments( array(
            'post_id' => $post_id,
            'status'  => 'approve',
            'number'  => 100, // Get a maximum of 100 comments to reduce load
        ) );

        if ( empty( $comments ) ) {
            return (object) array( 'authors' => array(), 'count' => 0 );
        }

        $authors = array();
        foreach ( $comments as $comment ) {
            $authors[] = (int) $comment->user_id;
        }

        $authors = array_unique( $authors );
        $count   = count( $comments );

        return (object) array(
            'authors' => $authors,
            'count'   => $count,
        );
    }
endif;

if ( ! function_exists( 'phoenix_get_icon_svg' ) ) :
    /**
     * Gets the SVG code for a given icon.
     *
     * @param string $icon The name of the icon.
     * @param int    $size The size of the icon in pixels.
     *
     * @return string SVG code.
     */
    function phoenix_get_icon_svg( $icon, $size = 24 ) {
        $svg = '<svg class="icon icon-' . esc_attr( $icon ) . '" width="' . esc_attr( $size ) . '" height="' . esc_attr( $size ) . '" aria-hidden="true" role="img">';
        $svg .= '<use href="' . esc_url( get_template_directory_uri() . '/assets/images/icons.svg#icon-' . $icon ) . '"></use>';
        $svg .= '</svg>';

        return $svg;
    }
endif;

if ( ! function_exists( 'phoenix_posted_by' ) ) :
    /**
     * Prints HTML with meta information for the current author.
     */
    function phoenix_posted_by() {
        printf(
            '<span class="byline"><span class="author vcard">%s</span></span>',
            sprintf(
                '<a class="url fn n" href="%1$s">%2$s</a>',
                esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
                esc_html( get_the_author() )
            )
        );
    }
endif;

if ( ! function_exists( 'phoenix_discussion_avatars_list' ) ) :
    /**
     * Displays a list of avatars involved in the discussion for a post.
     */
    function phoenix_discussion_avatars_list() {
        $discussion = phoenix_get_discussion_data();

        if ( empty( $discussion->authors ) ) {
            return;
        }

        echo '<div class="discussion-avatar-list">';

        foreach ( $discussion->authors as $author_id ) {
            printf(
                '<a href="%1$s">%2$s</a>',
                esc_url( get_author_posts_url( $author_id ) ),
                get_avatar( $author_id, 32 )
            );
        }

        echo '</div>';
    }
endif;

if ( ! function_exists( 'phoenix_comment_count' ) ) :
    /**
     * Prints the number of comments.
     */
    function phoenix_comment_count() {
        if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
            echo '<span class="comments-link">';
            comments_popup_link(
                sprintf(
                    wp_kses(
                        __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'phoenix' ),
                        array( 'span' => array( 'class' => array() ) )
                    ),
                    get_the_title()
                )
            );
            echo '</span>';
        }
    }
endif;

if ( ! function_exists( 'phoenix_entry_footer' ) ) :
    /**
     * Prints HTML with meta information for the categories, tags and comments.
     */
    function phoenix_entry_footer() {
        // Hide category and tag text for pages.
        if ( 'post' === get_post_type() ) {
            /* translators: Used between list items, there is a space after the comma. */
            $categories_list = get_the_category_list( esc_html__( ', ', 'phoenix' ) );
            if ( $categories_list && phoenix_categorized_blog() ) {
                printf( '<span class="cat-links">%1$s</span>', $categories_list ); // WPCS: XSS OK.
            }
        }
    }
endif;

if ( ! function_exists( 'phoenix_categorized_blog' ) ) :
    /**
     * Determines whether blog/site has more than one category.
     */
    function phoenix_categorized_blog() {
        if ( false === ( $all_the_cool_cats = get_transient( 'phoenix_categories' ) ) ) {
            // Create an array of all the categories that are attached to posts.
            $all_the_cool_cats = get_categories( array(
                'fields'     => 'ids',
                'hide_empty' => 1,
                // We only need to know if there is more than one category.
                'number'     => 2,
            ) );

            // Count the number of categories that are attached to the posts.
            $all_the_cool_cats = count( $all_the_cool_cats );

            set_transient( 'phoenix_categories', $all_the_cool_cats );
        }

        if ( $all_the_cool_cats > 1 ) {
            // This blog has more than 1 category so phoenix_categorized_blog should return true.
            return true;
        } else {
            // This blog has only 1 category so phoenix_categorized_blog should return false.
            return false;
        }
    }
endif;

if ( ! function_exists( 'phoenix_entry_footer' ) ) :
    /**
     * Prints HTML with meta information for the categories, tags and comments.
     */
    function phoenix_entry_footer() {

        // Hide author, post date, category and tag text for pages.
        if ( 'post' === get_post_type() ) {

            // Posted by.
            phoenix_posted_by();

            // Posted on.
            phoenix_posted_on();

            $categories_list = get_the_category_list( wp_get_list_item_separator() );
            if ( $categories_list ) {
                printf(
                    /* translators: 1: SVG icon. 2: Posted in label, only visible to screen readers. 3: List of categories. */
                    '<span class="cat-links">%1$s<span class="screen-reader-text">%2$s</span>%3$s</span>',
                    phoenix_get_icon_svg( 'archive', 16 ),
                    /* translators: Hidden accessibility text. */
                    __( 'Posted in', 'phoenix' ),
                    $categories_list
                ); // WPCS: XSS OK.
            }

            $tags_list = get_the_tag_list( '', wp_get_list_item_separator() );
            if ( $tags_list && ! is_wp_error( $tags_list ) ) {
                printf(
                    /* translators: 1: SVG icon. 2: Posted in label, only visible to screen readers. 3: List of tags. */
                    '<span class="tags-links">%1$s<span class="screen-reader-text">%2$s </span>%3$s</span>',
                    phoenix_get_icon_svg( 'tag', 16 ),
                    /* translators: Hidden accessibility text. */
                    __( 'Tags:', 'phoenix' ),
                    $tags_list
                ); // WPCS: XSS OK.
            }
        }

        // Comment count.
        if ( ! is_singular() ) {
            phoenix_comment_count();
        }

        // Edit post link.
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
    }
endif;

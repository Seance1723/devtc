<?php
/**
 * Displays the post header
 */

$discussion = ! is_page() && phoenix_can_show_post_thumbnail() ? phoenix_get_discussion_data() : null; ?>

<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

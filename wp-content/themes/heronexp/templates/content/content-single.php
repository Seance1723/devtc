<?php
if (!defined('ABSPATH')) {
    exit;
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
    </header>
    <div class="entry-content">
        <?php the_content(); ?>
    </div>
    <?php if (comments_open() || get_comments_number()) : ?>
        <?php comments_template(); ?>
    <?php endif; ?>
</article>

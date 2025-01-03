<?php
if (!defined('ABSPATH')) {
    exit;
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <?php the_title('<h2 class="entry-title">', '</h2>'); ?>
        </a>
    </header>
    <div class="entry-excerpt">
        <?php the_excerpt(); ?>
    </div>
</article>

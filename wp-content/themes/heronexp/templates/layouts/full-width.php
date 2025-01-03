<?php
if (!defined('ABSPATH')) {
    exit;
}
?>
<div class="full-width-layout">
    <?php while (have_posts()) : the_post(); ?>
        <?php get_template_part('templates/content/content', 'single'); ?>
    <?php endwhile; ?>
</div>

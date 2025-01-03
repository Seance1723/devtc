<?php
if (!defined('ABSPATH')) {
    exit;
}
?>
<div class="with-sidebar-layout">
    <main class="main-content">
        <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part('templates/content/content', 'single'); ?>
        <?php endwhile; ?>
    </main>
    <?php get_sidebar(); ?>
</div>

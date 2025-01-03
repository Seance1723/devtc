<?php
// Prevent direct access.
if (!defined('ABSPATH')) {
    exit;
}

// Display the sidebar only if active widgets exist.
if (is_active_sidebar('sidebar-1')) : ?>
    <aside class="site-sidebar">
        <?php dynamic_sidebar('sidebar-1'); ?>
    </aside>
<?php endif; ?>

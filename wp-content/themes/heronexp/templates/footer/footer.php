<?php
// Prevent direct access.
if (!defined('ABSPATH')) {
    exit;
}
?>
<footer class="site-footer">
    <div class="container">
        <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
        <?php wp_footer(); ?>
    </div>
</footer>
</body>
</html>

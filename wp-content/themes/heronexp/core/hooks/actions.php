<?php
function heron_add_footer_text() {
    echo '<p style="text-align: center;">Powered by HERON Theme</p>';
}
add_action('wp_footer', 'heron_add_footer_text');


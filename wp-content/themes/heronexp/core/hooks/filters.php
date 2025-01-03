<?php
function heron_custom_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'heron_custom_excerpt_length');

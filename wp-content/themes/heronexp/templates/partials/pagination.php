<?php
if (!defined('ABSPATH')) {
    exit;
}

if (function_exists('the_posts_pagination')) {
    the_posts_pagination([
        'mid_size'  => 2,
        'prev_text' => __('&laquo; Previous', 'heron'),
        'next_text' => __('Next &raquo;', 'heron'),
    ]);
}

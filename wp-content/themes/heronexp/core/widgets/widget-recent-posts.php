<?php
class Heron_Recent_Posts_Widget extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'heron_recent_posts',
            __('HERON Recent Posts', 'heron'),
            ['description' => __('Displays recent posts with thumbnails.', 'heron')]
        );
    }

    public function widget($args, $instance) {
        echo $args['before_widget'];
        echo $args['before_title'] . __('Recent Posts', 'heron') . $args['after_title'];

        $recent_posts = wp_get_recent_posts(['numberposts' => 5]);
        echo '<ul>';
        foreach ($recent_posts as $post) {
            echo '<li><a href="' . get_permalink($post['ID']) . '">' . esc_html($post['post_title']) . '</a></li>';
        }
        echo '</ul>';

        echo $args['after_widget'];
    }
}

function heron_register_widgets() {
    register_widget('Heron_Recent_Posts_Widget');
}
add_action('widgets_init', 'heron_register_widgets');

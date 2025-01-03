<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <label>
        <span class="screen-reader-text"><?php _e('Search for:', 'heron'); ?></span>
        <input type="search" class="search-field" placeholder="<?php _e('Search...', 'heron'); ?>" value="<?php echo get_search_query(); ?>" name="s">
    </label>
    <button type="submit" class="search-submit"><?php _e('Search', 'heron'); ?></button>
</form>

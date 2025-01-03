<?php
if (post_password_required()) {
    return;
}

if (have_comments()) : ?>
    <h3><?php comments_number(); ?></h3>
    <ol>
        <?php wp_list_comments(); ?>
    </ol>
<?php endif;

comment_form();

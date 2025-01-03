<?php get_header(); ?>
<main>
    <?php if (have_posts()) : ?>
        <header>
            <h1><?php the_archive_title(); ?></h1>
        </header>
        <?php
        while (have_posts()) : the_post();
            get_template_part('template-parts/content', get_post_format());
        endwhile;
        the_posts_navigation();
    else :
        echo '<p>' . __('No posts found.', 'phoenix') . '</p>';
    endif;
    ?>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>

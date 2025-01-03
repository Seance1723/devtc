<?php get_header(); ?>

<main id="search-results">
    <h1><?php printf(esc_html__('Search Results for: %s', 'heron'), get_search_query()); ?></h1>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        </article>
    <?php endwhile; else : ?>
        <p><?php esc_html_e('No results found.', 'heron'); ?></p>
    <?php endif; ?>
</main>

<?php get_footer(); ?>

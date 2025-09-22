<?php
/** Template Name: Page Notre Établissement */
get_header();
?>
<main id="primary" class="site-main">
    <?php while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header" style="padding: 2em; text-align: center; background-color: #f1f1f1;">
                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            </header>
            <div class="entry-content" style="padding: 2em; max-width: 800px; margin: 0 auto;"><?php the_content(); ?></div>
            <?php get_template_part("template-parts/components/gallery-sanpedro"); ?>
        </article>
    <?php endwhile; ?>
</main>
<?php get_footer(); ?>

<?php
/** Template Name: Page daccueil */
get_header();
?>
<main id="primary" class="site-main">
    <?php while ( have_posts() ) : the_post(); ?>
        <div class="homepage-content">
            <?php get_template_part("template-parts/components/hero-sanpedro"); ?>
            <div class="entry-content" style="padding: 2em;"><?php the_content(); ?></div>
            <?php get_template_part("template-parts/components/academic-programs"); ?>
            <?php get_template_part("template-parts/components/faculty-display"); ?>
            <?php get_template_part("template-parts/components/event-calendar"); ?>
            <?php get_template_part("template-parts/components/news-grid"); ?>
        </div>
    <?php endwhile; ?>
</main><!-- #main -->
<?php get_footer();

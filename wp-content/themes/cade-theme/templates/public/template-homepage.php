<?php
/** Template Name: Page daccueil */
get_header();
?>
<main id="primary" class="site-main">
    <?php while ( have_posts() ) : the_post(); ?>
        <div class="homepage-content">
            <?php get_template_part("template-parts/components/hero-sanpedro"); ?>
            <div class="entry-content" style="padding: 2em;"><?php the_content(); ?></div>
            <section class="placeholder-section" style="padding: 2em; text-align: center;">
                <p>Les futurs composants (plan, programmes) seront insérés ici.</p>
            </section>
        </div>
    <?php endwhile; ?>
</main><!-- #main -->
<?php get_footer();

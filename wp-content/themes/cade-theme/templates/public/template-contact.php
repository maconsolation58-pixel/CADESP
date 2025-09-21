<?php
/**
 * Template Name: Page de Contact
 *
 * Ce modèle est utilisé pour la page de contact du site CADE.
 *
 * @package CADE_Theme
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php while ( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header" style="padding: 2em; text-align: center;">
                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            </header>

            <div class="entry-content" style="padding: 0 2em 2em 2em;">
                <?php the_content(); ?>
            </div>
            
            <?php get_template_part("template-parts/components/location-map"); ?>

            <div class="contact-page-columns" style="display: flex; flex-wrap: wrap; padding: 2em;">
                <section class="contact-details" style="flex: 1; min-width: 300px; padding-right: 2em;">
                    <h2>Nos Coordonnées</h2>
                    <?php get_template_part( "template-parts/components/contact-info" ); ?>
                </section>

                <section class="contact-form" style="flex: 2; min-width: 300px;">
                    <h2>Nous Envoyer un Message</h2>
                    <?php echo do_shortcode( '[wpforms id="44"]' ); ?>
                </section>
            </div>

        </article>

    <?php endwhile; ?>

</main><!-- #main -->

<?php get_footer();

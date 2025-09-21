<?php
/**
 * Template Name: Page d'accueil
 *
 * Ce modèle est utilisé pour la page d'accueil du site CADE.
 *
 * @package CADE_Theme
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php
    while ( have_posts() ) :
        the_post();
        ?>
        
        <div class="homepage-content">
            <h1 style="text-align: center; padding: 2em; background-color: #f0f0f0;">Bienvenue au Collège Académie des Élites</h1>
            
            <div class="entry-content" style="padding: 2em;">
                <?php the_content(); ?>
            </div>
            
            <section class="placeholder-section" style="padding: 2em; text-align: center; background-color: var(--bleu-institutionnel); color: white;">
                <p>Les futurs composants (hero, plan, programmes) seront insérés ici.</p>
            </section>
        </div>

        <?php
    endwhile; // Fin de la boucle.
    ?>

</main><!-- #main -->

<?php
get_footer();

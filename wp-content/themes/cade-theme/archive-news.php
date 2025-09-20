<?php
/**
 * Le modèle pour afficher l'archive du type de contenu "news".
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CADE_Theme
 */

get_header();
?>

<main id="primary" class="site-main" style="padding: 2em;">

    <header class="page-header">
        <h1 class="page-title">Actualités</h1>
    </header>

    <?php if ( have_posts() ) : ?>

        <div class="news-grid">
            <?php
            // Démarrage de la Boucle.
            while ( have_posts() ) :
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="margin-bottom: 2em; border-bottom: 1px solid #ccc; padding-bottom: 1em;">
                    <header class="entry-header">
                        <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                    </header>
                    <div class="entry-summary">
                        <?php the_excerpt(); ?>
                    </div>
                </article>
                <?php
            endwhile;
            ?>
        </div>

    <?php
    else :
        // Section affichée si aucun contenu n'est trouvé.
        ?>
        <section class="no-results not-found">
            <p>Aucune actualité n'a été trouvée. Veuillez revenir plus tard.</p>
        </section>
        <?php
    endif;
    ?>

</main><!-- #main -->

<?php
get_footer();

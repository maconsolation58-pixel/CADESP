<?php
/**
 * Le modèle pour afficher l'archive du type de contenu "event".
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CADE_Theme
 */

get_header();
?>

<main id="primary" class="site-main" style="padding: 2em;">

    <header class="page-header">
        <h1 class="page-title">Événements</h1>
    </header>

    <?php if ( have_posts() ) : ?>

        <div class="events-list">
            <?php
            // Démarrage de la Boucle.
            while ( have_posts() ) :
                the_post();

                // Récupérer la date de l'événement depuis ACF
                $event_date = get_field('date_de_debutfin');
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="margin-bottom: 2em; border-bottom: 1px solid #ccc; padding-bottom: 1em;">
                    <header class="entry-header">
                        <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                    </header>
                    
                    <?php if ( $event_date ) : ?>
                        <div class="event-meta" style="font-style: italic; color: #555;">
                            Date : <?php echo esc_html( $event_date ); ?>
                        </div>
                    <?php endif; ?>

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
            <p>Aucun événement n'a été trouvé. Veuillez revenir plus tard.</p>
        </section>
        <?php
    endif;
    ?>

</main><!-- #main -->

<?php
get_footer();

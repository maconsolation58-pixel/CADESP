<?php
/**
 * Le modèle pour afficher un seul événement (CPT "event").
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CADE_Theme
 */

get_header();
?>

<main id="primary" class="site-main" style="padding: 2em;">

    <?php
    while ( have_posts() ) :
        the_post();
        ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            </header><!-- .entry-header -->

            <div class="entry-content">
                <?php
                the_content(); // Affiche la description complète de l'événement
                ?>
            </div><!-- .entry-content -->

            <footer class="entry-footer" style="margin-top: 2em; padding-top: 1em; border-top: 1px solid #eee; background-color: #fafafa; padding: 1em;">
                <h3>Détails de l'événement</h3>
                <?php
                // Récupérer et afficher les champs personnalisés de l'événement
                $type = get_field('type_devenement');
                $date = get_field('date_de_debutfin');
                $inscription_requise = get_field('inscription_requise');
                $capacite = get_field('capacite_maximale');

                if ( $type ) {
                    echo '<p><strong>Type :</strong> ' . esc_html( $type ) . '</p>';
                }
                if ( $date ) {
                    echo '<p><strong>Date et heure :</strong> ' . esc_html( $date ) . '</p>';
                }
                if ( $capacite ) {
                    echo '<p><strong>Capacité maximale :</strong> ' . esc_html( $capacite ) . ' participants</p>';
                }
                
                // Gérer l'affichage du champ Vrai/Faux pour l'inscription
                echo '<p><strong>Inscription requise :</strong> ' . ( $inscription_requise ? 'Oui' : 'Non' ) . '</p>';
                ?>
            </footer><!-- .entry-footer -->
        </article><!-- #post-<?php the_ID(); ?> -->

        <?php
    endwhile; // Fin de la boucle.
    ?>

</main><!-- #main -->

<?php
get_footer();

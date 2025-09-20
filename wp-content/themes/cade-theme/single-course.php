<?php
/**
 * Le modèle pour afficher un seul cours (CPT "course").
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
            
            <div class="course-meta" style="font-size: 0.9em; color: #555; margin-bottom: 1.5em;">
                <?php 
                // Afficher les taxonomies "Niveau Scolaire" et "Matière"
                echo get_the_term_list( get_the_ID(), 'niveau_scolaire', '<strong>Niveau :</strong> ', ', ', '<br>' );
                echo get_the_term_list( get_the_ID(), 'matiere', '<strong>Matière :</strong> ', ', ' );
                ?>
            </div>

            <div class="entry-content">
                <?php
                the_content(); // Affiche la description complète du cours
                ?>
            </div><!-- .entry-content -->

            <footer class="entry-footer" style="margin-top: 2em; padding-top: 1em; border-top: 1px solid #eee; background-color: #fafafa; padding: 1em;">
                <h3>Informations sur le cours</h3>
                <?php
                // Récupérer et afficher les champs personnalisés du cours
                $salle = get_field('salle_de_classe');
                $ressources = get_field('ressources_pedagogiques');
                $objectifs = get_field('objectifs_pedagogiques');
                $planning = get_field('planning');

                if ( $salle ) {
                    echo '<p><strong>Salle de classe :</strong> ' . esc_html( $salle ) . '</p>';
                }
                if ( $planning ) {
                    echo '<p><strong>Planning :</strong> ' . esc_html( $planning ) . '</p>';
                }
                if ( $objectifs ) {
                    echo '<div><strong>Objectifs pédagogiques :</strong>' . wp_kses_post( $objectifs ) . '</div>';
                }
                if ( $ressources ) {
                    echo '<p><strong>Ressources à télécharger :</strong> <a href="' . esc_url($ressources['url']) . '" target="_blank">' . esc_html($ressources['filename']) . '</a></p>';
                }
                ?>
            </footer><!-- .entry-footer -->
        </article><!-- #post-<?php the_ID(); ?> -->

        <?php
    endwhile; // Fin de la boucle.
    ?>

</main><!-- #main -->

<?php
get_footer();

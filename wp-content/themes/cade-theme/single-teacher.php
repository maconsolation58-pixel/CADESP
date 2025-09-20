<?php
/**
 * Le modèle pour afficher un seul enseignant (CPT "teacher").
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
                <div class="teacher-meta" style="font-size: 1em; color: #555; margin-bottom: 1.5em; font-family: var(--font-texte);">
                    <?php 
                    // Afficher la taxonomie "Spécialités"
                    echo get_the_term_list( get_the_ID(), 'specialite', '<strong>Spécialités :</strong> ', ', ' );
                    ?>
                </div>
            </header><!-- .entry-header -->
            
            <div class="entry-content" style="display: flex; flex-wrap: wrap; gap: 2em;">
                <?php
                $photo = get_field('photo_professionnelle');
                if ( $photo ) : ?>
                    <div class="teacher-photo" style="flex: 1; min-width: 200px;">
                        <img src="<?php echo esc_url($photo['url']); ?>" alt="<?php echo esc_attr($photo['alt']); ?>" style="max-width: 100%; height: auto; border-radius: 5px;">
                    </div>
                <?php endif; ?>

                <div class="teacher-bio" style="flex: 2; min-width: 300px;">
                    <?php the_content(); // Affiche la biographie complète ?>
                </div>
            </div><!-- .entry-content -->

            <footer class="entry-footer" style="margin-top: 2em; padding-top: 1em; border-top: 1px solid #eee; background-color: #fafafa; padding: 1em;">
                <h3>Informations Complémentaires</h3>
                <?php
                // Récupérer et afficher les champs personnalisés
                $diplomes = get_field('diplomes');
                $experience = get_field('annees_dexperience');
                $disponibilites = get_field('disponibilites');
                $recompenses = get_field('recompenses');

                if ( $diplomes ) {
                    echo '<p><strong>Diplômes :</strong> ' . esc_html( $diplomes ) . '</p>';
                }
                if ( $experience ) {
                    echo '<p><strong>Années d\'expérience :</strong> ' . esc_html( $experience ) . '</p>';
                }
                if ( $disponibilites ) {
                    echo '<p><strong>Disponibilités :</strong> ' . esc_html( $disponibilites ) . '</p>';
                }
                if ( $recompenses ) {
                    echo '<div><strong>Récompenses et distinctions :</strong><br>' . wp_kses_post( nl2br($recompenses) ) . '</div>';
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

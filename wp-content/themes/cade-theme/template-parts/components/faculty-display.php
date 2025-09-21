<?php
/**
 * Le composant "Affichage des Enseignants".
 * Affiche une sélection du CPT "teacher".
 * @package CADE_Theme
 */

$args = array(
    'post_type'      => 'teacher',
    'posts_per_page' => 4, // Limite à 4 enseignants pour la page d'accueil
    'post_status'    => 'publish',
    'orderby'        => 'rand', // Affiche des enseignants au hasard
);
$faculty_query = new WP_Query( $args );

if ( $faculty_query->have_posts() ) : ?>
    <section class="faculty-display-section">
        <div class="container">
            <h2 class="section-title">Notre Équipe Pédagogique</h2>
            <div class="faculty-grid">
                <?php while ( $faculty_query->have_posts() ) : $faculty_query->the_post();
                    $photo = get_field('photo_professionnelle');
                    ?>
                    <article id="faculty-<?php the_ID(); ?>" <?php post_class('faculty-item'); ?>>
                        <a href="<?php the_permalink(); ?>" class="faculty-photo-link">
                            <?php if ( $photo ) : ?>
                                <img src="<?php echo esc_url($photo['sizes']['medium']); ?>" alt="<?php echo esc_attr($photo['alt']); ?>" class="faculty-photo">
                            <?php else : ?>
                                <div class="faculty-photo-placeholder"></div>
                            <?php endif; ?>
                        </a>
                        <h3 class="faculty-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <p class="faculty-specialties"><?php echo get_the_term_list( get_the_ID(), 'specialite', '', ', ' ); ?></p>
                    </article>
                <?php endwhile; ?>
            </div>
            <div class="all-faculty-link">
                <a href="<?php echo esc_url( get_post_type_archive_link( 'teacher' ) ); ?>" class="button">Découvrir toute l'équipe</a>
            </div>
        </div>
    </section>
<?php endif;
wp_reset_postdata();

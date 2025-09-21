<?php
/**
 * Le composant "Calendrier des Événements".
 * Affiche une liste des événements récents.
 * @package CADE_Theme
 */

$args = array(
    'post_type'      => 'event',
    'posts_per_page' => 3, // Limite à 3 événements pour la page d'accueil
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC',
);
$events_query = new WP_Query( $args );

if ( $events_query->have_posts() ) : ?>
    <section class="event-calendar-section">
        <div class="container">
            <h2 class="section-title">Événements à Venir</h2>
            <div class="events-list">
                <?php while ( $events_query->have_posts() ) : $events_query->the_post();
                    $event_date = get_field('date_de_debutfin');
                    ?>
                    <article id="event-<?php the_ID(); ?>" <?php post_class('event-item'); ?>>
                        <?php if ( $event_date ) : ?>
                            <p class="event-date"><?php echo esc_html( $event_date ); ?></p>
                        <?php endif; ?>
                        <h3 class="event-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <div class="event-excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
            <div class="all-events-link">
                <a href="<?php echo esc_url( get_post_type_archive_link( 'event' ) ); ?>" class="button">Voir tous les événements</a>
            </div>
        </div>
    </section>
<?php endif;
wp_reset_postdata();

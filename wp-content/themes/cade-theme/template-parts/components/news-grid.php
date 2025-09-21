<?php
/**
 * Le composant "Grille d'Actualités".
 * Affiche une liste des actualités récentes.
 * @package CADE_Theme
 */

$args = array(
    'post_type'      => 'news',
    'posts_per_page' => 3,
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC',
);
$news_query = new WP_Query( $args );

if ( $news_query->have_posts() ) : ?>
    <section class="news-grid-section">
        <div class="container">
            <h2 class="section-title">Dernières Actualités</h2>
            <div class="news-grid">
                <?php while ( $news_query->have_posts() ) : $news_query->the_post(); ?>
                    <article id="news-<?php the_ID(); ?>" <?php post_class('news-item'); ?>>
                        <h3 class="news-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <p class="news-meta">Publié le <?php echo get_the_date(); ?></p>
                        <div class="news-excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
            <div class="all-news-link">
                <a href="<?php echo esc_url( get_post_type_archive_link( 'news' ) ); ?>" class="button">Voir toutes les actualités</a>
            </div>
        </div>
    </section>
<?php endif;
wp_reset_postdata();

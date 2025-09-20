<?php
/**
 * Le modèle pour afficher une seule actualité (CPT "news").
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
                the_content(); // Affiche le contenu complet de l'article
                ?>
            </div><!-- .entry-content -->

            <footer class="entry-footer" style="margin-top: 2em; padding-top: 1em; border-top: 1px solid #eee;">
                <?php
                // Récupérer et afficher le champ personnalisé "Source" s'il existe
                $source = get_field('source');
                if ( $source ) {
                    echo '<p><strong>Source :</strong> ' . esc_html( $source ) . '</p>';
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

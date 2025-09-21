<?php
/**
 * Le composant "Fil d'Ariane" (Breadcrumb).
 * @package CADE_Theme
 */

// Ne pas afficher sur la page d'accueil
if ( ! is_front_page() ) :
?>
    <nav class="breadcrumb-nav" aria-label="breadcrumb">
        <ol class="breadcrumb-list">
            <li class="breadcrumb-item">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Accueil</a>
            </li>
            <li class="breadcrumb-separator" aria-hidden="true">></li>
            <li class="breadcrumb-item active" aria-current="page">
                <?php
                if ( is_archive() ) {
                    post_type_archive_title();
                } else {
                    the_title();
                }
                ?>
            </li>
        </ol>
    </nav>
<?php endif; ?>

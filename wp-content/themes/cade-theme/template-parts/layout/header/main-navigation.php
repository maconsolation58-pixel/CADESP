<?php
/**
 * Affiche la navigation principale du site.
 *
 * @package CADE_Theme
 */
?>
<nav id="site-navigation" class="main-navigation" style="border-top: 1px solid #eee; margin-top: 1em; padding-top: 1em;">
    <?php
    if ( has_nav_menu( 'main-menu' ) ) {
        wp_nav_menu(
            array(
                'theme_location' => 'main-menu',
                'menu_id'        => 'primary-menu',
                'container'      => false,
            )
        );
    } else {
        echo '<p style="color: #c00;">Aucun menu assigné à l\'emplacement "Menu Principal".</p>';
    }
    ?>
</nav>

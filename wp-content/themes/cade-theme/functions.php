<?php
/**
 * Fonctions et définitions du thème CADE.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package CADE_Theme
 */

if ( ! function_exists( 'cade_theme_setup' ) ) :
    /**
     * Définit les fonctionnalités de base du thème.
     */
    function cade_theme_setup() {
        // Charge le domaine de texte pour la traduction.
        load_theme_textdomain( 'cade-theme', get_template_directory() . '/languages' );

        // Active la prise en charge des titres de page dynamiques.
        add_theme_support( 'title-tag' );

        // Enregistre les emplacements de menu.
        register_nav_menus(
            array(
                'main-menu' => esc_html__( 'Menu Principal', 'cade-theme' ),
            )
        );
    }
endif;
add_action( 'after_setup_theme', 'cade_theme_setup' );

/**
 * Met en file d'attente les scripts et les styles.
 */
function cade_theme_enqueue_scripts() {
    // Charge les polices Google Fonts.
    wp_enqueue_style( 'cade-theme-fonts', 'https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Roboto:wght@400;700&display=swap', array(), null );

    // Charge notre feuille de style principale.
    wp_enqueue_style( 'cade-theme-style', get_stylesheet_uri(), array( 'cade-theme-fonts' ), '1.0.1' );
}
add_action( 'wp_enqueue_scripts', 'cade_theme_enqueue_scripts' );

// Chargement des types de contenus personnalisés.
require get_template_directory() . '/inc/custom-post-types.php';

// Chargement des taxonomies personnalisées.
require get_template_directory() . '/inc/custom-taxonomies.php';

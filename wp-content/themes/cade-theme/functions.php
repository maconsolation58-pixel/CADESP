<?php
/**
 * Fonctions et définitions du thème CADE.
 *
 * @package CADE_Theme
 */

if ( ! function_exists( 'cade_theme_setup' ) ) :
    function cade_theme_setup() {
        load_theme_textdomain( 'cade-theme', get_template_directory() . '/languages' );
        add_theme_support( 'title-tag' );
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
    // Polices
    wp_enqueue_style( 'cade-theme-fonts', 'https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Roboto:wght@400;700&display=swap', array(), null );

    // Feuille de style principale du thème
    wp_enqueue_style( 'cade-theme-main-style', get_template_directory_uri() . '/assets/css/theme.css', array('cade-theme-fonts'), '1.0.0' );

    // Feuille de style racine (pour les informations du thème)
    wp_enqueue_style( 'cade-theme-root-style', get_stylesheet_uri(), array('cade-theme-main-style'), '1.0.1' );

    // Fichier JavaScript principal
    wp_enqueue_script( 'cade-theme-main-js', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'cade_theme_enqueue_scripts' );

// Chargements des fonctionnalités du thème
require get_template_directory() . '/inc/custom-post-types.php';
require get_template_directory() . '/inc/custom-taxonomies.php';

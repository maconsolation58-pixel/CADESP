<?php
/**
 * Enregistrement des Taxonomies Personnalisées pour le thème CADE.
 *
 * @package CADE_Theme
 */

function cade_register_taxonomies() {

    // 1. Spécialités (pour les Enseignants)
    $specialite_labels = array(
        'name'              => _x( 'Spécialités', 'taxonomy general name', 'cade-theme' ),
        'singular_name'     => _x( 'Spécialité', 'taxonomy singular name', 'cade-theme' ),
        'search_items'      => __( 'Rechercher des spécialités', 'cade-theme' ),
        'all_items'         => __( 'Toutes les spécialités', 'cade-theme' ),
        'edit_item'         => __( 'Modifier la spécialité', 'cade-theme' ),
        'update_item'       => __( 'Mettre à jour la spécialité', 'cade-theme' ),
        'add_new_item'      => __( 'Ajouter une nouvelle spécialité', 'cade-theme' ),
        'new_item_name'     => __( 'Nom de la nouvelle spécialité', 'cade-theme' ),
        'menu_name'         => __( 'Spécialités', 'cade-theme' ),
    );
    $specialite_args = array(
        'hierarchical'      => false, // Non-hiérarchique, comme des étiquettes
        'labels'            => $specialite_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
    );
    register_taxonomy( 'specialite', array( 'teacher' ), $specialite_args );

    // 2. Niveau Scolaire (pour les Cours)
    $niveau_labels = array( 'name' => __( 'Niveaux Scolaires', 'cade-theme' ), 'singular_name' => __( 'Niveau Scolaire', 'cade-theme' ) );
    $niveau_args = array( 'hierarchical' => true, 'labels' => $niveau_labels, 'show_admin_column' => true );
    register_taxonomy( 'niveau_scolaire', array( 'course' ), $niveau_args );

    // 3. Matière (pour les Cours)
    $matiere_labels = array( 'name' => __( 'Matières', 'cade-theme' ), 'singular_name' => __( 'Matière', 'cade-theme' ) );
    $matiere_args = array( 'hierarchical' => true, 'labels' => $matiere_labels, 'show_admin_column' => true );
    register_taxonomy( 'matiere', array( 'course' ), $matiere_args );

    // 4. Public Cible (pour les Événements)
    $public_labels = array( 'name' => __( 'Publics Cibles', 'cade-theme' ), 'singular_name' => __( 'Public Cible', 'cade-theme' ) );
    $public_args = array( 'hierarchical' => false, 'labels' => $public_labels, 'show_admin_column' => true );
    register_taxonomy( 'public_cible', array( 'event' ), $public_args );

    // 5. Catégories d'actualités (pour les Actualités)
    $cat_news_labels = array( 'name' => __( 'Catégories', 'cade-theme' ), 'singular_name' => __( 'Catégorie', 'cade-theme' ) );
    $cat_news_args = array( 'hierarchical' => true, 'labels' => $cat_news_labels, 'show_admin_column' => true );
    register_taxonomy( 'news_category', array( 'news' ), $cat_news_args );

}
add_action( 'init', 'cade_register_taxonomies' );

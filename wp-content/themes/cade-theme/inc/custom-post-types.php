<?php
/**
 * Enregistrement des Types de Contenus Personnalisés pour le thème CADE.
 *
 * @package CADE_Theme
 */

function cade_register_post_types() {

    // 1. Enseignants (teacher)
    $teacher_labels = array(
        'name'                  => _x( 'Enseignants', 'Post Type General Name', 'cade-theme' ),
        'singular_name'         => _x( 'Enseignant', 'Post Type Singular Name', 'cade-theme' ),
        'menu_name'             => __( 'Enseignants', 'cade-theme' ),
        'archives'              => __( 'Archives des Enseignants', 'cade-theme' ),
        'add_new_item'          => __( 'Ajouter un nouvel enseignant', 'cade-theme' ),
        'add_new'               => __( 'Ajouter', 'cade-theme' ),
        'new_item'              => __( 'Nouvel enseignant', 'cade-theme' ),
        'edit_item'             => __( 'Modifier l\'enseignant', 'cade-theme' ),
        'update_item'           => __( 'Mettre à jour l\'enseignant', 'cade-theme' ),
        'view_item'             => __( 'Voir l\'enseignant', 'cade-theme' ),
        'search_items'          => __( 'Rechercher un enseignant', 'cade-theme' ),
    );
    $teacher_args = array(
        'label'                 => __( 'Enseignant', 'cade-theme' ),
        'description'           => __( 'Le personnel enseignant de l\'établissement.', 'cade-theme' ),
        'labels'                => $teacher_labels,
        'supports'              => array( 'title', 'editor', 'thumbnail' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 20,
        'menu_icon'             => 'dashicons-groups',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
    );
    register_post_type( 'teacher', $teacher_args );

    // 2. Cours (course)
    $course_labels = array(
        'name'                  => _x( 'Cours', 'Post Type General Name', 'cade-theme' ),
        'singular_name'         => _x( 'Cours', 'Post Type Singular Name', 'cade-theme' ),
        'menu_name'             => __( 'Cours', 'cade-theme' ),
        'archives'              => __( 'Archives des Cours', 'cade-theme' ),
        'add_new_item'          => __( 'Ajouter un nouveau cours', 'cade-theme' ),
        'add_new'               => __( 'Ajouter', 'cade-theme' ),
    );
    $course_args = array(
        'label'                 => __( 'Cours', 'cade-theme' ),
        'labels'                => $course_labels,
        'supports'              => array( 'title', 'editor', 'revisions' ),
        'public'                => true,
        'show_ui'               => true,
        'menu_position'         => 21,
        'menu_icon'             => 'dashicons-welcome-learn-more',
        'has_archive'           => true,
    );
    register_post_type( 'course', $course_args );

    // 3. Événements (event)
    $event_labels = array(
        'name'                  => _x( 'Événements', 'Post Type General Name', 'cade-theme' ),
        'singular_name'         => _x( 'Événement', 'Post Type Singular Name', 'cade-theme' ),
        'menu_name'             => __( 'Événements', 'cade-theme' ),
        'add_new_item'          => __( 'Ajouter un nouvel événement', 'cade-theme' ),
        'add_new'               => __( 'Ajouter', 'cade-theme' ),
    );
    $event_args = array(
        'label'                 => __( 'Événement', 'cade-theme' ),
        'labels'                => $event_labels,
        'supports'              => array( 'title', 'editor', 'thumbnail' ),
        'public'                => true,
        'show_ui'               => true,
        'menu_position'         => 22,
        'menu_icon'             => 'dashicons-calendar-alt',
        'has_archive'           => true,
    );
    register_post_type( 'event', $event_args );

    // 4. Actualités (news)
    $news_labels = array(
        'name'                  => _x( 'Actualités', 'Post Type General Name', 'cade-theme' ),
        'singular_name'         => _x( 'Actualité', 'Post Type Singular Name', 'cade-theme' ),
        'menu_name'             => __( 'Actualités', 'cade-theme' ),
        'add_new_item'          => __( 'Ajouter une nouvelle actualité', 'cade-theme' ),
        'add_new'               => __( 'Ajouter', 'cade-theme' ),
    );
    $news_args = array(
        'label'                 => __( 'Actualité', 'cade-theme' ),
        'labels'                => $news_labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'public'                => true,
        'show_ui'               => true,
        'menu_position'         => 23,
        'menu_icon'             => 'dashicons-megaphone',
        'has_archive'           => true,
    );
    register_post_type( 'news', $news_args );

}
add_action( 'init', 'cade_register_post_types' );

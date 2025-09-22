<?php
/**
 * Le composant "Pagination" pour les pages d'archive.
 * @package CADE_Theme
 */

the_posts_pagination(
    array(
        'mid_size'           => 2, // Affiche 2 numéros de page de chaque côté de la page actuelle
        'prev_text'          => __( '‹ Précédent', 'cade-theme' ),
        'next_text'          => __( 'Suivant ›', 'cade-theme' ),
        'screen_reader_text' => __( 'Navigation des articles', 'cade-theme' ),
    )
);

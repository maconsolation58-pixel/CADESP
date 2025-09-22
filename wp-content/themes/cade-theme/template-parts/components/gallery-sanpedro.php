<?php
/**
 * Le composant "Galerie d'Images" avec effet Lightbox (Taille Corrigée).
 * @package CADE_Theme
 */

$associated_galleries_array = get_field('associated_gallery_native');

if ( !empty($associated_galleries_array) && is_array($associated_galleries_array) ) {
    $gallery_post_object = $associated_galleries_array[0];
    if ( $gallery_post_object && is_object($gallery_post_object) ) {
        $gallery_post_id = $gallery_post_object->ID;
        $gallery_title = get_the_title($gallery_post_id);
        $image_ids_str = get_post_meta( $gallery_post_id, '_cade_gallery_image_ids', true );

        if ( ! empty( $image_ids_str ) ) {
            $image_ids = explode( ',', $image_ids_str );
            echo '<section class="gallery-section">';
            echo '<div class="container">';
            echo '<h2 class="section-title">' . esc_html( $gallery_title ) . '</h2>';
            echo '<div class="gallery-grid">';

            foreach ( $image_ids as $image_id ) {
                $image_full_url = wp_get_attachment_image_url( $image_id, 'full' );
                $image_caption = wp_get_attachment_caption( $image_id );

                echo '<div class="gallery-item">';
                echo '<a href="' . esc_url( $image_full_url ) . '" data-lightbox="cade-gallery-' . esc_attr($gallery_post_id) . '" data-title="' . esc_attr( $image_caption ) . '">';
                echo wp_get_attachment_image( $image_id, 'large' );
                echo '</a>';
                echo '</div>';
            }

            echo '</div>';
            echo '</div>';
            echo '</section>';
        }
    }
}
?>

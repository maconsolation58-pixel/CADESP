<?php
// ... (Toutes les fonctions add_meta_box, meta_box_html, save_gallery_data restent les mêmes) ...
function cade_add_gallery_meta_box() { add_meta_box('cade_gallery_metabox','Images de la Galerie (Natif)','cade_gallery_meta_box_html','cade_gallery','normal','high'); }
add_action('add_meta_boxes', 'cade_add_gallery_meta_box');
function cade_gallery_meta_box_html($post) {
    wp_nonce_field('cade_save_gallery_data', 'cade_gallery_nonce');
    $image_ids = get_post_meta($post->ID, '_cade_gallery_image_ids', true);
    ?>
    <div id="cade-gallery-container">
        <ul class="cade-gallery-preview">
            <?php
            if ($image_ids) {
                $ids = explode(',', $image_ids);
                foreach ($ids as $id) { echo '<li>' . wp_get_attachment_image($id, 'thumbnail') . '</li>'; }
            }
            ?>
        </ul>
        <input type="hidden" id="cade_gallery_image_ids" name="cade_gallery_image_ids" value="<?php echo esc_attr($image_ids); ?>">
        <button type="button" class="button" id="cade-gallery-button">Gérer la Galerie</button>
    </div>
    <?php
}
function cade_save_gallery_data($post_id) {
    if (!isset($_POST['cade_gallery_nonce']) || !wp_verify_nonce($_POST['cade_gallery_nonce'], 'cade_save_gallery_data')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;
    if (isset($_POST['cade_gallery_image_ids'])) { update_post_meta($post_id, '_cade_gallery_image_ids', sanitize_text_field($_POST['cade_gallery_image_ids'])); }
}
add_action('save_post', 'cade_save_gallery_data');

// NOUVELLE MÉTHODE DE CHARGEMENT JS
function cade_enqueue_gallery_admin_scripts($hook) {
    global $post;
    if ( $hook == 'post-new.php' || $hook == 'post.php' ) {
        if ( isset($post) && 'cade_gallery' === $post->post_type ) {
            // On s'assure que la bibliothèque média est bien chargée
            wp_enqueue_media();
            // On charge notre script externe
            wp_enqueue_script(
                'cade-gallery-manager',
                get_template_directory_uri() . '/assets/js/gallery-manager.js',
                array( 'jquery' ),
                '1.0.0',
                true
            );
        }
    }
}
add_action('admin_enqueue_scripts', 'cade_enqueue_gallery_admin_scripts');

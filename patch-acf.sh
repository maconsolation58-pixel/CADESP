#!/data/data/com.termux/files/usr/bin/bash
# --- Patch WordPress ACF Media Fix ---

TARGET="/storage/emulated/0/htdocs/CADESP/wp-content/themes/cade-theme/functions.php"
BACKUP="/storage/emulated/0/htdocs/CADESP/wp-content/themes/cade-theme/functions.php.bak-$(date +%s)"

# Sauvegarde avant modification
cp "$TARGET" "$BACKUP"

# Ajout du patch directement dans functions.php
cat >> "$TARGET" <<'EOPHP'

/**
 * Patch pour corriger l'affichage du bouton "Ajouter une image"
 * dans le champ ACF de type Galerie.
 */

add_action('after_setup_theme', function() {
    add_theme_support('post-thumbnails');
});

add_action('admin_enqueue_scripts', function() {
    wp_enqueue_media();
});

add_action('acf/input/admin_enqueue_scripts', function() {
    wp_enqueue_script(
        'cade-acf-fix',
        get_template_directory_uri() . '/assets/js/acf-fix.js',
        array('jquery', 'acf-input'),
        '1.0.0',
        true
    );
});

add_action('admin_init', function() {
    if( function_exists('acf_get_local_json_files') && function_exists('acf_sync_local_json') ) {
        $files = acf_get_local_json_files();
        foreach ($files as $key => $file) {
            if( !acf_have_local_field_groups($key) ) {
                acf_sync_local_json(array($key));
            }
        }
    }
});
EOPHP

echo "✅ Patch ajouté à $TARGET"
echo "📂 Une copie de sauvegarde a été créée : $BACKUP"

jQuery(document).ready(function($) {
    'use strict';
    var frame;
    // Quand on clique sur le bouton
    $('#cade-gallery-button').on('click', function(e) {
        e.preventDefault();
        if (frame) {
            frame.open();
            return;
        }
        // Créer la fenêtre média
        frame = wp.media({
            title: 'Sélectionner les images pour la galerie',
            button: { text: 'Utiliser ces images' },
            library: { type: 'image' },
            multiple: 'add'
        });
        // Quand des images sont sélectionnées
        frame.on('select', function() {
            var selection = frame.state().get('selection');
            var ids = selection.map(function(attachment) {
                return attachment.id;
            });
            // Mettre à jour le champ caché avec les IDs
            $('#cade_gallery_image_ids').val(ids.join(','));
            // Mettre à jour l'aperçu
            var preview = $('#cade-gallery-container .cade-gallery-preview');
            preview.html('');
            selection.each(function(attachment) {
                preview.append('<li><img src="' + attachment.attributes.sizes.thumbnail.url + '"></li>');
            });
        });
        frame.open();
    });
});

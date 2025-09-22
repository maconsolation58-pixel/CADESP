(function($) {
    'use strict';
    acf.addAction('ready', function( $el ){
        if ( $el.hasClass('acf-field-gallery') ) {
            var $addButton = $el.find('.acf-gallery-add');
            if ($addButton.length) {
                $addButton.show().css('visibility', 'visible');
            }
        }
    });
    acf.addAction('append', function( $el ){
        if ( $el.hasClass('acf-field-gallery') ) {
            $el.find('.acf-gallery-add').show().css('visibility', 'visible');
        }
    });
})(jQuery);

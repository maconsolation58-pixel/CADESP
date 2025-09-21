<?php
/**
 * Affiche la zone de widgets du pied de page.
 */
if ( is_active_sidebar( 'footer-1' ) ) : ?>
    <div id="footer-widget-area" class="widget-area footer-column">
        <?php dynamic_sidebar( 'footer-1' ); ?>
    </div>
<?php endif; ?>

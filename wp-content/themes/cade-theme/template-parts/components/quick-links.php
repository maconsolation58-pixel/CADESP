<?php
/**
 * Le composant "Liens Rapides".
 * @package CADE_Theme
 */
?>
<div class="quick-links-widget">
    <h3 class="widget-title">Liens Rapides</h3>
    <ul>
        <li><a href="<?php echo esc_url( home_url( '/index.php/admissions/' ) ); ?>">Admissions</a></li>
        <li><a href="<?php echo esc_url( get_post_type_archive_link( 'course' ) ); ?>">Nos Cours</a></li>
        <li><a href="<?php echo esc_url( get_post_type_archive_link( 'event' ) ); ?>">Événements</a></li>
        <li><a href="<?php echo esc_url( home_url( '/index.php/contact/' ) ); ?>">Contactez-nous</a></li>
    </ul>
</div>

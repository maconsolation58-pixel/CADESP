<?php
/**
 * Affiche les coordonnées officielles du CADE.
 *
 * @package CADE_Theme
 */

?>
<div class="contact-info" style="padding: 1em; background-color: #f1f1f1; border: 1px solid #ddd;">
    <h3 style="margin-top: 0;">Coordonnées Officielles</h3>
    
    <p>
        <strong>Téléphones:+225 0758401942<br></strong><br>
        <?php if ( defined( 'CADE_PHONE_1' ) ) : ?>
            <a href="tel:<?php echo esc_attr( str_replace(' ', '', CADE_PHONE_1) ); ?>"><?php echo esc_html( CADE_PHONE_1 ); ?></a><br>
        <?php endif; ?>
        <?php if ( defined( 'CADE_PHONE_2' ) ) : ?>
            <a href="tel:<?php echo esc_attr( str_replace(' ', '', CADE_PHONE_2) ); ?>"><?php echo esc_html( CADE_PHONE_2 ); ?></a>
        <?php endif; ?>
    </p>

    <p>
        <strong>Emails:</strong><br>
        <?php if ( defined( 'CADE_EMAIL_1' ) ) : ?>
            <a href="mailto:<?php echo esc_attr( CADE_EMAIL_1 ); ?>"><?php echo esc_html( CADE_EMAIL_1 ); ?></a><br>
        <?php endif; ?>
        <?php if ( defined( 'CADE_EMAIL_2' ) ) : ?>
            <a href="mailto:<?php echo esc_attr( CADE_EMAIL_2 ); ?>"><?php echo esc_html( CADE_EMAIL_2 ); ?></a>
        <?php endif; ?>
    </p>

    <p>
        <strong>Adresse:</strong><br>
        <?php if ( defined( 'CADE_ADDRESS' ) ) : ?>
            <?php echo nl2br( esc_html( CADE_ADDRESS ) ); ?>
        <?php endif; ?>
    </p>
</div>

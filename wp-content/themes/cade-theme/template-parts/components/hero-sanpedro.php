<?php
/**
 * Le composant "Hero" pour la page d'accueil.
 * @package CADE_Theme
 */
?>
<section class="hero-section">
    <div class="hero-content">
        <h1 class="hero-title">Collège Académie des Élites</h1>
        <p class="hero-subtitle">L'excellence éducative au cœur de San Pedro.</p>
        <a href="<?php echo esc_url( get_post_type_archive_link( 'course' ) ); ?>" class="hero-button">Découvrir nos programmes</a>
    </div>
</section>

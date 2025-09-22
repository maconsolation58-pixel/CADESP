<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
    <header id="masthead" class="site-header sticky-header">
        <div class="header-top-bar">
            <div class="header-top-inner">
                <div class="top-bar-links">
                    <a href="#">Portail Étudiant</a>
                    <a href="#">Portail Parents</a>
                </div>
            </div>
        </div>
        <div class="header-main-bar">
            <div class="site-header-inner">
                <div class="site-branding">
                    <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                </div>
                <div class="header-navigation-area">
                    <?php get_template_part( "template-parts/layout/header/main-navigation" ); ?>
                    <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                        <span class="hamburger-icon"></span>
                        <span class="sr-only">Menu</span>
                    </button>
                </div>
            </div>
        </div>
    </header>
    <div id="content" class="site-content">
        <?php get_template_part( 'template-parts/components/breadcrumb' ); ?>

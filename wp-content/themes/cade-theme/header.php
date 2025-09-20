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
    <header id="masthead" class="site-header" style="border-bottom: 2px solid #003366; padding: 1em;">
        <div class="site-branding">
            <h1 class="site-title">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                    <?php bloginfo( 'name' ); ?>
                </a>
            </h1>
        </div>
        
        <?php get_template_part( 'template-parts/components/contact-info' ); ?>

        <?php get_template_part( 'template-parts/layout/header/main-navigation' ); ?>

    </header>
    <div id="content" class="site-content">

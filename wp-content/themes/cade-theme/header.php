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
    <header id="masthead" class="site-header">
        <div class="site-header-inner">
            <div class="site-branding">
                <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
            </div>
            <?php get_template_part( "template-parts/layout/header/main-navigation" ); ?>
        </div>
    </header>
    <div id="content" class="site-content">
        <?php get_template_part( 'template-parts/components/breadcrumb' ); ?>

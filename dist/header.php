<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>

    <!--=== META TAGS ===-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="author" content="<?php echo bloginfo('name'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="robots" content="index, follow">

    <!--=== LINK TAGS ===-->
    <link rel="shortcut icon" href="<?php echo THEME_DIR; ?>/path/favicon.ico" />
    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS2 Feed" href="<?php bloginfo('rss2_url'); ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <!-- Font Awesome 4 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700&display=swap" rel="stylesheet">


    <!--=== Site Title ===-->
    <title><?php wp_title(); ?> - <?php bloginfo( 'name' ); ?></title>

    <!--=== Load Wordpress Core Header ===-->
    <?php wp_head(); ?>

</head>


<body <?php body_class(); ?>>
	
<!-- =========================
           Preloader
     ========================= -->
<div class="preloader-wrapper">
    <div class="preloader">
        <img src="<?php echo get_theme_mod('preloader_image') ?>" alt="Pleast wait">
    </div>
</div>

<!-- https://napacreativeco.com/wp-content/uploads/2020/10/30.gif -->

<!-- =========================
            Navigation
     ========================= -->
<?php get_template_part('./template-parts/navbar-1'); ?>
	
	
<!-- =========================
           Store Notice 
     ========================= -->

<?php if ( true == get_theme_mod( 'store_notice_display', true ) ) : ?>
  
<?php else : ?>
  <div class="store-message">
    <p><?php echo get_theme_mod('store_notice_setting', 'This is the default text'); ?></p>
    <i class="fa fa-times"></i>
  </div>
<?php endif; ?>




<!-- =========================
       Navigation Flyout Menu
     ========================= -->
<div class="navigation__flyout">
  <div class="navigation__flyout-row">

    <!-- Top -->
    <div class="navigation__flyout--top">

        <!-- Logo -->
        <div class="navigation__flyout--logo">
          <?php
          $custom_logo_id = get_theme_mod( 'custom_logo' );
          $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
          ?>
          <img class="flyout-logo" src="<?php echo $image[0]; ?>" alt="">
        </div>

        <!-- X -->
        <?php get_template_part('./template-parts/french-fries') ?>
        
    </div><!-- close: Top -->

     <!-- Bottom -->
    <div class="navigation__flyout--bottom">

        <!-- Desktop Menus -->
        <div class="navigation__flyout--menus desktop">
          <div class="cell"><?php dynamic_sidebar( 'desktop_flyout_left' ); ?></div>
          <div class="cell"><?php dynamic_sidebar( 'desktop_flyout_center' ); ?></div>
          <div class="cell"><?php dynamic_sidebar( 'desktop_flyout_right' ); ?></div>
        </div>
        
        <!-- Mobile Menus -->
        <div class="navigation__flyout--menu mobile">
          <?php
            wp_nav_menu(
                array(
                'theme_location' => 'header-menu',
                'container_class' => 'mobile-nav'
                )
            );
          ?>
        </div>

    </div><!-- close: Bottom -->
		
    </div><!-- close: Navigation Flyout Inner -->
  </div><!-- close: Navigation Flyout Row -->
</div> <!-- close: Navigation Flyout -->

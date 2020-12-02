<?php

// Stylesheet
wp_enqueue_style( 'style', get_stylesheet_uri() );

// Javascript
wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', array ( 'jquery' ), 1.1, true);

if ( ! function_exists( 'ncc_theme_setup' ) ) :

function ncc_theme_setup() {

    // load_theme_textdomain( 'myfirsttheme', get_template_directory() . '/languages' );

    add_theme_support( 'automatic-feed-links' );

    add_theme_support( 'editor-styles' );

    add_theme_support( 'post-thumbnails');

    add_theme_support( 'custom-logo' );

    // add_theme_support( 'post-formats', array ( 'aside', 'gallery', 'quote', 'image', 'video' ) );
}
endif;
add_action( 'after_setup_theme', 'ncc_theme_setup' );
// myfirsttheme_setup


// Menus
function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'extra-menu' => __( 'Extra Menu' )
     )
   );
 }
 add_action( 'init', 'register_my_menus' );




/**
* Customizer settings
*/
require get_template_directory() . '/inc/customizer.php';

/**
* Custom Widgets
*/
require get_template_directory() . '/inc/widgets.php';




/**
 * Customize the title for the home page, if one is not set.
 */

function fix_page_tab_title( $title ) {
  if ( empty( $title ) && ( is_home() || is_front_page() ) ) {
    $title = __( 'Home', 'ncc' ) . ' | ' . get_bloginfo( 'description' );
  }
  return $title;
}
add_filter( 'wp_title', 'fix_page_tab_title' );








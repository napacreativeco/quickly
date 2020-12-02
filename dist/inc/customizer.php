<?php

function ncc_customizer_functions ($wp_customize) {


/* ==================
    Logo Size
   ================== */
$wp_customize->add_setting('navbar_logo_size',array(
    'default'   =>  50,
));
$wp_customize->add_control( 'navbar_logo_size_control', array(
    'type'        => 'range',
    'priority'    => 3,
    'section'     => 'title_tagline',
    'settings'    => 'navbar_logo_size',
    'label'       => 'Logo Size',
    'description' => __('This controls the size of the logo'),
    'input_attrs' => array(
        'min'   => 10,
        'max'   => 100,
        'step'  => 2,
        'class' => 'logo-size',
        'style' => 'color: #333333',
    ),
));


/* ==================
    Store Notice
   ================== */
$wp_customize->add_section('store_notice',array(
    'title'     => 'Store Notice',
    'priority'  => 30
));
/* Text */
$wp_customize->add_setting('store_notice_setting',array(
    'default'   =>  'This is the store notice',
));
$wp_customize->add_control('store_notice_control',array(
    'label'     =>  'Text',
    'type'      =>  'textarea',
    'section'   =>  'store_notice',
    'settings'  =>  'store_notice_setting',
));

/* Hide */
$wp_customize->add_setting( 'store_notice_display' , array(
    'default'   => false,
    'transport' => 'refresh',
));
$wp_customize->add_control( 'store_notice_display',
   array(
      'label' => __( 'Hide Store Notice', '' ),
      'description' => esc_html__( 'Check this box to hide the Store Notice' ),
      'section'  => 'store_notice',
      'settings' => 'store_notice_display',
      'priority' => 10, // 
      'type'=> 'checkbox',
      'capability' => 'edit_theme_options', 
));




/* ==================
    Navigation Padding
   ================== */
$wp_customize->add_setting('navbar_padding',array(
    'default'   =>  10,
));

$wp_customize->add_control( 'navbar_padding_control', array(
    'type'        => 'range',
    'priority'    => 3,
    'section'     => 'navbar_section',
    'settings'    => 'navbar_padding',
    'label'       => 'Padding',
    'description' => __('This controls the amount of Padding'),
    'input_attrs' => array(
        'min'   => 0,
        'max'   => 30,
        'step'  => 1,
        'class' => 'navbar-padding',
        'style' => 'color: #333333',
    ),
));



/* ==================
    Navigation CTA
   ================== */
$wp_customize->add_section('navbar_section',array(
    'title'     => __('Navigation Bar'),
    'priority'  => 50
));
/* Text */
$wp_customize->add_setting('navbar_cta_text',array(
    'default'   =>  __('Click Here'),
));
$wp_customize->add_control('navbar_cta_text_control',array(
    'label'     =>  __('Call To Action'),
    'description' => __('The text for your CTA button'),
    'type'      =>  'text',
    'section'   =>  'navbar_section',
    'settings'  =>  'navbar_cta_text',
    'priority'  =>  10
));
/* Link */
$wp_customize->add_setting('navbar_cta_link',array(
    'default'   =>  __('#'),
));
$wp_customize->add_control('navbar_cta_link_control',array(
    'label'     =>  'CTA Link',
    'type'      =>  'text',
    'section'   =>  'navbar_section',
    'settings'  =>  'navbar_cta_link',
    'priority'  =>  5
));
/* Hide */
$wp_customize->add_setting( 'navbar_cta_display' , array(
    'default'   => 0,
    'transport' => 'refresh',
));
$wp_customize->add_control( 'navbar_cta_display_control',
   array(
      'label' => __( 'Hide Call To Action', 'ncc' ),
      'description' => esc_html__( 'Check this box to hide the CTA Button' ),
      'section'  => 'navbar_section',
      'settings' => 'navbar_cta_display',
      'priority' => 6, 
      'type'=> 'checkbox',
      'capability' => 'edit_theme_options', 
));




/* ==================
    Blog Layout
   ================== */
$wp_customize->add_section('blog_layout_section',array(
    'title'     => __('Blog'),
    'priority'  => 70
));

$wp_customize->add_setting( 'blog_layout',
   array(
      'default' => 'blog_sidebar',
      'transport' => 'refresh'
));

$wp_customize->add_control( 'blog_layout_control',
   array(
      'label' => __( 'Layout' ),
      'description' => esc_html__( 'Choose your Blog layout. Save changes and refresh to view changes.' ),
      'section' => 'blog_layout_section',
      'settings' => 'blog_layout',
      'priority' => 1,
      'type' => 'radio',
      'capability' => 'edit_theme_options',
      'choices' => array(
         'blog_fullwidth' => __( 'Fullwidth' ),
         'blog_sidebar' => __( 'Sidebar' )
      )
));




/* =================================================== END */

}
add_action('customize_register','ncc_customizer_functions');


/**
* Apply Customizer Styles
*/
add_filter('wp_head', 'ncc_customizer_styles_function');
function ncc_customizer_styles_function() {
    echo '<style type="text/css">';
      echo '.navigation__row { padding:'. get_theme_mod('navbar_padding') .'px; }';
      echo '.logo { width:'. get_theme_mod('navbar_logo_size') .'%; }';
    echo '</style>';
}

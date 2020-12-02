<?php
/*!
*** Navigation Layout - 01
*/
?>

 

<style type="text/css">
.nav-left {
    width: 350px;
    padding-left: 30px;
    text-align: center;
}
.nav-center {
    width: 50%;
    text-align: left;
    position: relative;
}
.nav-right {
    width: 25%;
    display: flex;
    flex-direction: row;
    justify-content: center;
}

/* Landscape Phones */
@media (max-width: 767.98px) { 
    
    .nav-left {
        width: 60%;
        padding-left: 0px;
    }
    .nav-center {
        display: none;
    }    
    .nav-right {
        width: 40%;
    }
    .navigation button {
        display: none;
    }

}
</style>





<!-- ===================================== Navigation -->

<div class="navigation">
    <div class="navigation__row">
        
        <!-- ============= Left -->
        <div class="navigation__cell nav-left">
            <?php
            $custom_logo_id = get_theme_mod( 'custom_logo' );
            $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
            ?>
            <img class="logo" src="<?php echo $image[0]; ?>" alt="<?php bloginfo( 'description' ); ?>" onclick="window.location='/'"> 
        </div>
            
        <!-- ============ Center -->
        <div class="navigation__cell nav-center">
            <?php
            wp_nav_menu(
                array(
                'theme_location' => 'header-menu',
                'container_class' => 'main-nav'
                )
            );
            ?>
        </div>
            
        <!-- ============ Right -->
        <div class="navigation__cell nav-right">
            <!-- Call To Action -->
            <?php if ( true == get_theme_mod( 'navbar_cta_display', true ) ) : ?>
                &nbsp;
            <?php else : ?>
                <button onclick="window.location='<?php echo get_theme_mod('navbar_cta_link'); ?>';"> <?php echo get_theme_mod('navbar_cta_text'); ?> </button>
            <?php endif; ?>

            <!-- Burger Icon -->
            <?php  get_template_part('./template-parts/hamburger') ?>
            <!-- <i class="fa fa-bars desktop-menu-burger"></i> -->
        </div>
        
    </div> <!-- end navigation row -->
</div><!-- end navigation -->
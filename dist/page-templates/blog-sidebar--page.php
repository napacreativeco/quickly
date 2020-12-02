<?php
/*
Template Name: Demo - SB Blog
This page displays the Blog Full Width Mode
--
Functionality: Below is an IF statement that shows either a Fullwidth or Sidebar layout, based on
user input from Customizer > Blog
--
ncc-blog-class: This is a class that will make it easier to target elements that are specific to
these pages.
*/
get_header(); ?>

<div id="primary" class="content-area ncc-blog-class">
    <main id="main" class="site-main" role="main">

<!-- ==================
        Blog: Sidebar
  ====================== -->
  <div class="page-container__sidebar">
    <div class="page-container__sidebar-content">

        <!-- Posts Container -->
        <div class="blog-sidebar__container">
            <div class="blog-sidebar__row">
               <?php
              // Get Post Type: Post
              $args = array(
                  'post_type' => 'post'
              );
              $post_query = new WP_Query($args);

              // Get Blog Posts
              if( $post_query->have_posts() ) {
                  while( $post_query->have_posts() ) { 
                  
                  $post_query->the_post();
      
                  // Get the Image        
                  if ( has_post_thumbnail() ) { 
                    $featuredBackground =  get_the_post_thumbnail_url();
                  } else {
                    $featuredBackground =  get_bloginfo('stylesheet_directory').'/img/default-featured-image.jpg';
                  } ?>

                  <!-- Blog Item -->
                  <div class="blog__item" onclick="window.location='<?php echo get_the_permalink() ?>'">
                      <div class="blog__item-image" style="background: url('<?php echo $featuredBackground ?>'); background-size: cover; background-position: center center;">
                      </div>
                      <div class="blog__item-text">
                          <?php the_title( '<h2>', '</h2>' ); ?>
                          <?php the_excerpt(); ?>
                      </div>
                  </div><!-- close: item -->

              <?php }
              } else {
                  _e( 'Sorry, no posts matched your criteria.', 'ncc' ); 
              } 
              ?>
            </div><!-- close: blog-sidebar row -->
        </div><!-- close: blog-sidebar container -->
    </div><!-- close: page container sidebar content -->

    <!-- Sidebar -->
    <div class="sidebar sidebar-blog">
        <?php dynamic_sidebar('sidebar_blog'); ?>
    </div>

</div> <!-- close: page container sidebar  -->


</main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer(); ?>

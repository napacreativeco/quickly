<?php
/*
Template Name: Demo - FW Blog
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


<!-- =====================
              Blog: Fullwidth
        ========================= -->
        <div class="page-container__fullwidth">

          <!-- Blog Loop -->
          <div class="page-container__fullwidth-row">
              <?php
              // Get Post Type: Post
              $args = array(
                  'post_type' => 'post'
              );
              $post_query = new WP_Query($args);

              // Get Blog Posts
              if($post_query->have_posts() ) {
                  while($post_query->have_posts() ) { 
                  
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
          </div><!-- close: blog fullwidth row -->
      </div> <!-- close: blog fullwidth -->

  </main>
</div>

<?php get_footer(); ?>
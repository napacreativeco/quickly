
<?php get_header(); ?>

  <!-- =====================
          Blog: Fullwidth
    ========================= -->
    <div class="page-container__fullwidth">
      <div class="page-container__fullwidth-row">
        <?php get_search_query() ?>
          <?php
          if ( have_posts() ) : 
              while ( have_posts() ) : the_post(); ?>

              <?php
              // Default Thumbanil if not custom
              if ( has_post_thumbnail() ) { 
                  $featuredBackground =  get_the_post_thumbnail_url();
              } else {
                  $featuredBackground =  get_bloginfo('template_directory').'/img/default-featured-image.jpg';
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

              <?php
              endwhile; 
          else: 
              _e( 'Sorry, no posts matched your criteria.', 'ncc' ); 
          endif; 
          ?>
      </div><!-- close: blog fullwidth row -->
  </div> <!-- close: blog fullwidth -->

<?php get_footer(); ?>








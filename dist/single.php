<?php get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main blogpost" role="main">
        <?php
        // Start the loop.
        while ( have_posts() ) : the_post(); ?>

          <div class="squeeze">

            <div class="post-header">
              <h1><?php the_title(); ?></h1>
              <p><em><?php the_excerpt(); ?></em></p>
            </div>

            <div class="post-body">
              <?php the_content(); ?>
            </div>
          </div>

        <?php  // End of the loop.
        endwhile;
        ?>

    </main><!-- .site-main -->

</div><!-- .content-area -->

<?php get_footer(); ?>

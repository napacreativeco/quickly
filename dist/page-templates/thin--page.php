<?php /* Template Name: Thin */
get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <div class="page-container__thin">
            <?php
            // Start the loop.
            while ( have_posts() ) : the_post();

                the_content();

                // End of the loop.
            endwhile;
            ?>
        </div> <!-- /page-container fullwidth -->

    </main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer(); ?>
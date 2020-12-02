<?php /* Template Name: Sidebar (Page)*/
get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <!-- Container -->
        <div class="page-container__sidebar">
            <div class="page-container__sidebar-content">
                <?php
                // Start the loop.
                while ( have_posts() ) : the_post();

                    the_content();

                    // End of the loop.
                endwhile;
                ?>
            </div>

            <!-- Sidebar -->
            <div class="page-container__sidebar-sidebar sidebar sidebar-pages">
                <?php dynamic_sidebar('sidebar_pages'); ?>
            </div>

        </div> <!-- page-container sidebar -->

    </main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer(); ?>
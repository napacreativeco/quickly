<?php
/*
This page displays the Blog page
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


        <?php
        $mods = get_theme_mods(); 

        // If Blog: Fullwidth 
        if ( $mods['blog_layout'] == 'blog_fullwidth') { ?>

            <!-- =====================
                   Blog: Fullwidth
             ========================= -->
            <div class="page-container__fullwidth">
                <div class="page-container__fullwidth-row">
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

        <?php
        // If Blog Sidebar
        } elseif ( $mods['blog_layout'] == 'blog_sidebar') { ?>

            <!-- ==================
                   Blog: Sidebar
             ====================== -->
            <div class="page-container__sidebar">
                <div class="page-container__sidebar-content">
                    <!-- Posts Container -->
                    <div class="blog-sidebar__container">
                        <div class="blog-sidebar__row">
                            <?php
                                if ( have_posts() ) : 
                                    while ( have_posts() ) : the_post(); 
                                        
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
                        </div><!-- close: blog-sidebar row -->
                    </div><!-- close: blog-sidebar container -->
                </div><!-- close: page container sidebar content -->
    
                <!-- Sidebar -->
                <div class="sidebar sidebar-blog">
                    <?php dynamic_sidebar('sidebar_blog'); ?>
                </div>
    
            </div> <!-- close: page container sidebar  -->
        
        <?php
        }
        ?>


    </main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer(); ?>
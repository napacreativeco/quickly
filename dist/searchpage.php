<?php
/*
Template Name: Search Page
*/
?>


<?php get_header(); ?>


<?php
// Get Preserve Search Results
global $query_string;

wp_parse_str( $query_string, $search_query );
$search = new WP_Query( $search_query );

?>

<?php
// Get Total Results
global $wp_query;
$total_results = $wp_query->found_posts;
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main" style="padding-top: 100px;">

    <?php get_search_form(); ?>
    <?php echo $total_results ?>

    </main><!-- .site-main -->

</div><!-- .content-area -->

<?php get_footer(); ?>

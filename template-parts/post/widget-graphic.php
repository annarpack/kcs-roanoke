
<?php get_sidebar(); ?>
<div class="post-sidebar has-sidebar">
<?php
    /**
     * graphic
     *
     * The template used for displaying service section in four column layout
     *
     * 
     */

    global $paged, $post, $max_pages;
    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

    $args = array(
        'post_type' => 'graphic',
        'posts_per_page' => 10,
        'ignore_sticky_posts' => true,
        'paged' => $paged
        );

    $temp = $wp_query;
    $wp_query = null;

    $wp_query = new WP_Query();
    $wp_query->query( apply_filters( 'kcs_graphic_args_filter', $args ) );
    $max_pages = $wp_query->max_num_pages;

?>

<aside id="secondary" class="widget-area" role="complementary">
	<h1>Graphics Projects</h1>
	<ul class="post-list">
	 <?php /* Start the Loop */ ?>
   <?php while ( have_posts() ) : the_post(); ?>
	<li>
	<h2 class="entry-title"><a href=" <?php get_permalink() ?> "> <?php the_title(); ?> </a></h2> 
		</li>
		
		<?php endwhile; wp_reset_query(); $wp_query = $temp; ?>
		</ul>
	
</aside><!-- #secondary -->
</div>

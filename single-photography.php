<?php
/**
 * The template for displaying all single posts
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 */

get_header(); ?>

<div class="has-sidebar">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
        <?php do_action( 'kcs_above_entry_hook' ); ?>
        <?php while ( have_posts() ) : the_post(); ?>

            <?php get_template_part( 'template-parts/post/content', 'photography' ); ?>

           
        <?php endwhile; // end of the loop. ?>
					
        <?php do_action( 'kcs_below_entry_hook' ); ?>
        </main><!-- #main -->
    </div><!-- #primary -->
</div>
<?php get_sidebar(); ?>
<?php get_template_part( 'template-parts/post/widget',  'photography' ); ?>
<?php get_footer(); ?>
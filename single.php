<?php
/**
 * The template for displaying all single posts
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 */

get_header(); ?>


    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
        <?php do_action( 'kcs_above_entry_hook' ); ?>
        <?php while ( have_posts() ) : the_post(); ?>

            <?php get_template_part( 'template-parts/post/content', get_post_format() ); ?>

               
            <?php do_action( 'kcs_above_comments_hook' ); ?>
            <?php
                // If comments are open or we have at least one comment, load up the comment template
                if ( comments_open() || '0' != get_comments_number() ) :
                    comments_template();
                endif;
            ?>
        <?php endwhile; // end of the loop. ?>
					<div class="icon-1" >
						<?php echo kcs_get_svg( array( 'icon' => 'arrow-right' ) ); ?>
						
						
						<?php echo kcs_get_svg( array( 'icon' => 'folder-open' ) ); ?>
						<?php echo kcs_get_svg( array( 'icon' => 'bars' ) ); ?>
						<?php echo kcs_get_svg( array( 'icon' => 'chain' ) ); ?>
						<?php echo kcs_get_svg( array( 'icon' => 'thumb-tack' ) ); ?>
					</div>
					
        <?php do_action( 'kcs_below_entry_hook' ); ?>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
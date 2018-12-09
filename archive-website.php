<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Knockout Creative Studio
 *  
 *  
 */

get_header(); ?>

	<?php if ( have_posts() ) : ?>
		<header class="page-header">
			<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="taxonomy-description">', '</div>' );
			?>
		</header><!-- .page-header -->
	<?php endif; ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post(); ?>

			
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> class="has-sidebar">
	<?php
		if ( is_sticky() && is_home() ) :
			echo kcs_get_svg( array( 'icon' => 'thumb-tack' ) );
		endif;
	?>
	<header class="entry-header">
		<?php
		

			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}
			
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<figure>

                            <?php  if ( has_post_thumbnail() ) : ?>
													<div class="entry-image-frame">
														<div class="entry-image"><a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php the_post_thumbnail(); ?></a></div>
														
													</div>
											
                            <?php endif; ?>


                        </figure>
		
		  <figcaption>
                              
                                <?php the_excerpt(); ?>
				
                            </figcaption>

		
		
	</div><!-- .entry-content -->

	
	
</article><!-- #post-## -->

		<?php	endwhile;

		

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_template_part( 'template-parts/post/widget',  'website' ); ?>
<?php get_footer(); ?>

<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Knockout Creative Studio
 *  
 *  
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> class="has-sidebar">
	<?php
		if ( is_sticky() && is_home() ) :
			echo kcs_get_svg( array( 'icon' => 'thumb-tack' ) );
		endif;
	?>
	<header class="entry-header">
		<?php
			if ( 'post' === get_post_type() ) :
				echo '<div class="entry-meta">';
					if ( is_single() ) :
						kcs_posted_on();
					else :
						echo kcs_time_link();
						kcs_edit_link();
					endif;
				echo '</div><!-- .entry-meta -->';
			endif;

			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}
		?>
	</header><!-- .entry-header -->


	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'kcs' ),
				get_the_title()
			) );

			wp_link_pages( array(
				'before'      => '<div class="page-links">' . __( 'Pages:', 'kcs' ),
				'after'       => '</div>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			) );
		?>
		
		
	</div><!-- .entry-content -->
<footer class="entry-footer">
	<div class="website-url" >
		<?php
		$post_id = get_the_ID();
		$meta_key = 'kcs-website-url';
		$url = get_post_meta( $post_id, $meta_key, true );
		?>
		 <a href="<?php echo $url; ?>" title="<?php the_title(); ?>" class="website-thumbnail" target="_blank">
			Link to Website <?php echo kcs_get_svg( array( 'icon' => 'arrow-right' ) ); ?></a>
	</div>
	
</footer>
</article><!-- #post-## -->

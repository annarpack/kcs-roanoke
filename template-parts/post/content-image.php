<?php
/**
 * Template part for displaying image posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Knockout Creative Studio
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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

	<?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'kcs-featured-image' ); ?>
			</a>
		</div><!-- .post-thumbnail -->
	<?php endif; ?>

	<div class="entry-content">

		<?php if ( is_single() || '' === get_the_post_thumbnail() ) :

			// Only show content if is a single post, or if there's no featured image.
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

		endif; ?>

	</div><!-- .entry-content -->

	<?php if ( is_single() ) : ?>
		<?php kcs_entry_footer(); ?>
	<?php endif; ?>

</article><!-- #post-## -->

<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Knockout Creative Studio
 *  
 *  
 */

?>

		</div><!-- #content -->

		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="wrap">
				

<?php
if ( is_active_sidebar( 'sidebar-2' ) ||
	 is_active_sidebar( 'sidebar-3' ) ) :
?>

	<aside class="widget-area" role="complementary">
		<?php
		if ( is_active_sidebar( 'sidebar-2' ) ) { ?>
			<div class="widget-column footer-widget-1">
				<?php dynamic_sidebar( 'sidebar-2' ); ?>
			</div>
		<?php }
		if ( is_active_sidebar( 'sidebar-3' ) ) { ?>
			<div class="widget-column footer-widget-2">
				<?php dynamic_sidebar( 'sidebar-3' ); ?>
			</div>
		<?php } ?>
	</aside><!-- .widget-area -->

<?php endif; ?>

				<?php

				if ( has_nav_menu( 'social' ) ) : ?>
					<nav class="social-navigation" role="navigation" aria-label="<?php _e( 'Footer Social Links Menu', 'kcs' ); ?>">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'social',
								'menu_class'     => 'social-links-menu',
								'depth'          => 1,
								'link_before'    => '<span class="screen-reader-text">',
								'link_after'     => '</span>' . kcs_get_svg( array( 'icon' => 'chain' ) ),
							) );
						?>
					</nav><!-- .social-navigation -->
				<?php endif;
				?>
				
				<div class="site-info">
	<a href="<?php echo esc_url( __( 'mailto:anna@Knockout Creative Studio.com', 'kcs' ) ); ?>"><?php printf( __( 'Custom WordPress theme by %s', 'kcs' ), 'Knockout Creative Studio' ); ?></a>
</div><!-- .site-info -->
				
				
			</div><!-- .wrap -->
		</footer><!-- #colophon -->
	</div><!-- .site-content-contain -->
</div><!-- #page -->
<?php wp_footer(); ?>

</body>
</html>

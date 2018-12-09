<?php
/**
 * Displays top navigation
 */

?>
<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php _e( 'Top Menu', 'kcs' ); ?>">
	<button class="menu-toggle" aria-controls="top-menu" aria-expanded="false"><?php echo kcs_get_svg( array( 'icon' => 'bars' ) ); echo kcs_get_svg( array( 'icon' => 'close' ) ); _e( 'Menu', 'kcs' ); ?></button>
	<?php wp_nav_menu( array(
		'theme_location' => 'top',
		'menu_id'        => 'top-menu',
	) ); ?>

	<?php if ( ( kcs_is_frontpage() || ( is_home() && is_front_page() ) ) && has_custom_header() ) : ?>
		<a href="#content" class="menu-scroll-down"><?php echo kcs_get_svg( array( 'icon' => 'arrow-right' ) ); ?><span class="screen-reader-text"><?php _e( 'Scroll down to content', 'kcs' ); ?></span></a>
	<?php endif; ?>
</nav><!-- #site-navigation -->

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
	<meta name="google-site-verification" content="xnSdy2xtX607cepLwwoXE9vO9IBr5hMRmlLp-34qv10" />
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'kcs' ); ?></a>


	<header id="masthead" class="site-header" role="banner">


<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php _e( 'Top Menu', 'kcs' ); ?>">
	<button class="menu-toggle" aria-controls="top-menu" aria-expanded="false"><?php echo kcs_get_svg( array( 'icon' => 'bars' ) ); echo kcs_get_svg( array( 'icon' => 'close' ) ); _e( 'Menu', 'kcs' ); ?></button>
	<?php wp_nav_menu( array(
		'theme_location' => 'top',
		'menu_id'        => 'top-menu',
	) ); ?>


	</nav><!-- #site-navigation -->
<div class="custom-homepage-block"><!-- .custom-homepage-block -->
		<div class="custom-header-media">

		 <img src="http://www.knockoutcreative.studio/wp-content/uploads/2017/07/Header-Image-01.jpg" alt="" width="939" height="550"  />

	</div>

		<?php if( is_home() ) : ?>
		<div class="site-branding">
	<div class="wrap">

		<?php the_custom_logo(); ?>

		<div class="site-branding-text">

				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

			<?php $description = get_bloginfo( 'description', 'display' ); ?>
					<p class="site-description">
						"A (wo)man who has no imagination has no wings." <BR />- Muhammad Ali

			</p>
		</div><!-- .site-branding-text -->
	<!--/* <?php /* get_template_part( 'template-parts/sections/section', 'service' ); */ ?> -->

	</div><!-- .wrap -->
</div><!-- .site-branding -->

	<?php endif; ?>

<?php if( is_home() ) : ?>

	 </div><!-- .custom-homepage-block -->
	 </header><!-- #masthead -->
<?php else : ?>
	</div> <!-- .custom-homepage-block -->
	</header><!-- #masthead -->
	<div class="site-content-contain"><div id="content" class="site-content">
<?php endif; ?>

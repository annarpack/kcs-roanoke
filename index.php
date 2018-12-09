<?php
/**
 * The main template file
 */

get_header(); ?>


	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			 <?php if( is_home() ) : ?>

			<?php else : ?>
				<?php get_template_part( 'template-parts/sections/section', 'widget-2' ); ?>
	 		<?php endif; ?>

		 <?php get_template_part( 'template-parts/sections/section', 'website3' ); ?>

			<?php get_template_part( 'template-parts/sections/section', 'photography' ); ?>

			<?php get_template_part( 'template-parts/sections/section', 'graphic' ); ?>

		</main>
</div>

<?php get_footer(); ?>

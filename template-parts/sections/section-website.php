<?php
    /**
     * Website
     *
     * The template used for displaying service section in four column layout
     *
     * 
     */

    global $paged, $post, $max_pages;
    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

    $args = array(
        'post_type' => 'website',
        'posts_per_page' => 1,
        'ignore_sticky_posts' => true,
        'paged' => $paged
        );

    $temp = $wp_query;
    $wp_query = null;

    $wp_query = new WP_Query();
    $wp_query->query( apply_filters( 'kcs_website_args_filter', $args ) );
    $max_pages = $wp_query->max_num_pages;

?>
<?php do_action( 'kcs_website_above_hook' ); ?>
<?php if ( have_posts() ) : ?>

    <section id="section-website" class="section website">
			
			<div class="container">		
					
            <div class="section-content">

                <?php /* Start the Loop */ ?>
                <?php while ( have_posts() ) : the_post(); ?>

                    <article id="post-<?php the_ID(); ?>" >
                        <figure>

                            <?php  if ( has_post_thumbnail() ) : ?>
													<a href="<?php echo home_url( '/' ); ?>/websites/">
													<div class="entry-image-frame">
                                <div class="entry-image"><?php the_post_thumbnail(); ?></div>
														
													</div>
													</a>
                            <?php endif; ?>


                        </figure>
                    </article><!-- #post-## -->

                <?php endwhile; wp_reset_query(); $wp_query = $temp; ?>
               
            </div><!-- .section-content -->
				
				<div class="section-description" >
						
        <h2 class="section-title">
             <a href="<?php echo home_url( '/' ); ?>/websites/">
                    Websites
            </a></h2>
						
						<p>Our team specializes in building customized quality Wordpress websites for our clients. We provide the platform for our clients so that they can maximize online customer acquisition. </p>
			
			</div>

        </div><!-- .container -->

    </section>

<?php else : ?>

    <?php kcs_get_placeholder( __FILE__ ); ?>

<?php endif; ?>
<?php do_action( 'kcs_website_below_hook' ); ?>

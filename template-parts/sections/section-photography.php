<?php
    /**
     * Photography
     *
     *
     *
     */

    global $paged, $post, $max_pages;
    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

    $args = array(
        'post_type' => 'photography',
        'posts_per_page' => 1,
        'ignore_sticky_posts' => true,
        'paged' => $paged
        );

    $temp = $wp_query;
    $wp_query = null;

    $wp_query = new WP_Query();
    $wp_query->query( apply_filters( 'kcs_photography_args_filter', $args ) );
    $max_pages = $wp_query->max_num_pages;

?>
<?php do_action( 'kcs_photography_above_hook' ); ?>
<?php if ( have_posts() ) : ?>

    <section id="section-photography" class="section photography">

			<div class="container">

            <div class="section-content">

                    <article id="post-<?php the_ID(); ?>" >
                        <figure>

													<a href="<?php echo home_url( '/' ); ?>photography-pictures/">
													<div class="entry-image-frame">
                                <div class="entry-image">
																	<img src="http://www.knockoutcreative.studio/wp-content/uploads/2014/01/ICP_1_WEB.jpg" />
                                </div>

													</div>
													</a>



                        </figure>
                    </article><!-- #post-## -->

            </div><!-- .section-content -->

				<div class="section-description" >

       <h2 class="section-title">
             <a href="<?php echo home_url( '/' ); ?>photography-pictures/">
                     Photography
            </a></h2>

						<p>Our team takes studio quality photos for our clients to use on their websites. Our team manager, Anna R Pack, has years of experience working in a photography art gallery and brings a fine aesthetic to her work. </p>

			</div>

        </div><!-- .container -->

    </section>

<?php else : ?>

    <?php kcs_get_placeholder( __FILE__ ); ?>

<?php endif; ?>
<?php do_action( 'kcs_photography_below_hook' ); ?>

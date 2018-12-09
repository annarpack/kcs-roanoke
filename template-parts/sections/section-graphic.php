<?php
    /**
     * graphic
     *
     *
     *
     */

    global $paged, $post, $max_pages;
    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

    $args = array(
        'post_type' => 'graphic',
        'posts_per_page' => 1,
        'ignore_sticky_posts' => true,
        'paged' => $paged
        );

    $temp = $wp_query;
    $wp_query = null;

    $wp_query = new WP_Query();
    $wp_query->query( apply_filters( 'kcs_graphic_args_filter', $args ) );
    $max_pages = $wp_query->max_num_pages;

?>
<?php do_action( 'kcs_graphic_above_hook' ); ?>
<?php if ( have_posts() ) : ?>

    <section id="section-graphic" class="section graphic">

			<div class="container">

            <div class="section-content">

                    <article id="post-<?php the_ID(); ?>" >
                        <figure>


													<a href="<?php echo home_url( '/' ); ?>graphics/">
													<div class="entry-image-frame">
                                <div class="entry-image">
                                  <img src="http://www.knockoutcreative.studio/wp-content/uploads/2014/10/Secrets_Lies-Idea-01.jpg" />
                                </div>

													</div>
													</a>


                        </figure>
                    </article><!-- #post-## -->


            </div><!-- .section-content -->

				<div class="section-description" >

       <h2 class="section-title">
             <a href="<?php echo home_url( '/' ); ?>graphics/">
                     Graphics
            </a></h2>

						<p>Our team creates innovative designs for our clients to use as branding materials. We create logos, web banners, eblast flyers, and magazine page ads. </p>

			</div>

        </div><!-- .container -->

    </section>

<?php else : ?>

    <?php kcs_get_placeholder( __FILE__ ); ?>

<?php endif; ?>
<?php do_action( 'kcs_graphic_below_hook' ); ?>

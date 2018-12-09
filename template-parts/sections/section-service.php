<?php
    /**
     * Service 2
     *
     * The template used for displaying service section in four column layout
     *
     * 
     */

    global $paged, $post, $max_pages;
    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

    $args = array(
        'post_type' => 'service',
        'posts_per_page' => 3,
        'ignore_sticky_posts' => true,
        'paged' => $paged
        );

    $temp = $wp_query;
    $wp_query = null;

    $wp_query = new WP_Query();
    $wp_query->query( apply_filters( 'kcs_service_args_filter', $args ) );
    $max_pages = $wp_query->max_num_pages;

?>
<?php do_action( 'kcs_service_above_hook' ); ?>
<?php if ( have_posts() ) : ?>

    <section id="section-service" class="section service">

        <div class="container">
            <div class="section-content">

                <?php /* Start the Loop */ ?>
                <?php while ( have_posts() ) : the_post(); ?>
								<?php $id = get_the_ID(); ?>
										<?php if ( $id == 557 ) : ?>
							<article id="post-<?php the_ID(); ?>" <?php post_class( 'col three-col' ); ?>>
								<div class="clear"></div>	
                        <figure>

                            <?php  if ( has_post_thumbnail() ) : ?>
                                <div class="entry-image"><a href="http://www.knockoutcreative.studio/graphics/"><?php the_post_thumbnail(); ?></a></div>
                            <?php endif; ?>

                            <figcaption>
                                <h3><a href="http://www.knockoutcreative.studio/graphics/"><?php the_title(); ?></a></h3>
                                <?php the_excerpt(); ?>
                            </figcaption>

                        </figure>
                    </article><!-- #post-## -->
								<?php endif; ?><?php if ( $id == 556 ) : ?>
							<article id="post-<?php the_ID(); ?>" <?php post_class( 'col three-col' ); ?>>
                        <figure>

                            <?php  if ( has_post_thumbnail() ) : ?>
                                <div class="entry-image"><a href="http://www.knockoutcreative.studio/photography-pictures/"><?php the_post_thumbnail(); ?></a></div>
                            <?php endif; ?>

                            <figcaption>
                                <h3><a href="http://www.knockoutcreative.studio/photography-pictures/"><?php the_title(); ?></a></h3>
                                <?php the_excerpt(); ?>
                            </figcaption>

                        </figure>
                    </article><!-- #post-## --><?php endif; ?><?php if ( $id == 554 ) : ?>
							<article id="post-<?php the_ID(); ?>" <?php post_class( 'col three-col' ); ?>>
                        <figure>

                            <?php  if ( has_post_thumbnail() ) : ?>
                                <div class="entry-image"><a href="http://www.knockoutcreative.studio/websites/"><?php the_post_thumbnail(); ?></a></div>
                            <?php endif; ?>

                            <figcaption>
                                <h3><a href="http://www.knockoutcreative.studio/websites/"><?php the_title(); ?></a></h3>
                                <?php the_excerpt(); ?>
                            </figcaption>

                        </figure>
                    </article><!-- #post-## -->
							
								<?php endif; ?>
							
													
						

                <?php endwhile; wp_reset_query(); $wp_query = $temp; ?>
                
            </div><!-- .section-content -->

        </div><!-- .container -->

    </section>

<?php else : ?>

    <?php kcs_get_placeholder( __FILE__ ); ?>

<?php endif; ?>
<?php do_action( 'kcs_service_below_hook' ); ?>
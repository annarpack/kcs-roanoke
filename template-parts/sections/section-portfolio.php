<?php

    /**
     * Portfolio 8
     *
     * This template displays 12 portfolio entries in a 4 column carousel
     * and the title and category appear below the featured image
     */

    global $paged, $post, $max_pages;
    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

    $args = array(
        'post_type' => 'portfolio',
        'posts_per_page' => 6,
        'ignore_sticky_posts' => true,
        'paged' => $paged
    );

    $temp = $wp_query;
    $wp_query = null;

    $wp_query = new WP_Query();
    $wp_query->query( apply_filters( 'kcs_portfolio_args_filter', $args ) );
    $max_pages = $wp_query->max_num_pages;

?>
<?php do_action( 'kcs_portfolio_above_hook' ); ?>
<?php if ( have_posts() ) : ?>

<section id="section-portfolio" class="section portfolio ">

    <div class="container">

        <h2 class="section-title">
             <a href="<?php echo home_url( '/' ); ?>/portfolios/">
                 <?php echo apply_filters( 'kcs_portfolio_title', __( 'Portfolio', 'kcs' ) ); ?>
            </a></h2>

     
        <div class="section-content">


                <?php /* Start the Loop */ ?>
                <?php while ( have_posts() ) : the_post(); ?>

                    <article  id="post-<?php the_ID(); ?>">
                        <figure class="one-col">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="entry-image col kcso-thirds-col"><?php the_post_thumbnail( 'wide' ); ?></div>
                            <?php endif; ?>

                            <figcaption class="col one-third-col last">
                                <?php
                                    /* translators: used bekcseen list items, there is a space after the comma */
                                    $categories_list = get_the_term_list( $post->ID, 'portfolio-category', '', __( ', ', 'kcs' ), '' );
                                    if ( $categories_list && kcs_categorized_blog() ) :
                                ?>
                                <span class="cat-links">
                                    <?php printf( $categories_list ); ?>
                                </span>
                                <?php endif; // End if categories ?>
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                                <div><?php the_excerpt(); ?></div>
                            </figcaption>
                        </figure>
            </article>

                <?php endwhile; wp_reset_query(); $wp_query = $temp; ?>

</div>

    </div><!--  .container -->

</section>

<?php else : ?>

    <?php kcs_get_placeholder( __FILE__ ); ?>

<?php endif; ?>
<?php do_action( 'kcs_portfolio_below_hook' ); ?>
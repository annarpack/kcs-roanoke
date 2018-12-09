<?php
    /**
     * Testimonial 5
     *
     * The template used for displaying testimonials section
     *
     * 
     */

    global $paged, $post, $max_pages;
    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

    $args = array(
        'post_type' => 'testimonial',
        'posts_per_page' => 3,
        'paged' => $paged
    );

    $temp = $wp_query;
    $wp_query = null;

    $wp_query = new WP_Query();
    $wp_query->query( apply_filters( 'kcs_testimonial_args_filter', $args ) );
    $max_pages = $wp_query->max_num_pages;

?>
<?php do_action( 'kcs_testimonial_above_hook' ); ?>
<?php if ( have_posts() ) : ?>
<section id="section-testimonial" class="section testimonial">
    <h2 class="section-title"><?php echo apply_filters( 'kcs_testimonial_title', __( 'Testimonials', 'kcs' ) ); ?></h2>
    <div class="container">
        <div class="section-content">

            <?php while ( have_posts() ) : the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class( 'col three-col' ); ?>>

                    <?php the_excerpt(); ?>

                    <div class="post-meta">
                        <?php  if ( has_post_thumbnail() ) : ?>
                            <div class="entry-image">
                                <?php the_post_thumbnail(); ?>
                            </div>
                        <?php endif; ?>

                        <?php $meta_values = get_post_meta( get_the_ID() ); ?>
                        <h3 class="entry-title"><?php if( ! empty( $meta_values['kcs-full-name'][0] ) ) { echo $meta_values['kcs-full-name'][0]; } ?></h3>
                        <ul class="testimonial-meta">
                            <?php
                                $keys = array( 'kcs-position', 'kcs-company' );
                                foreach ( $keys as $key ) {
                                    if ( ! empty( $meta_values[$key][0] ) ) {
                                        echo '<li class="' . $key . '">' . $meta_values[$key][0] . '</li>';
                                    }
                                }
                            ?>
                        </ul>
                    </div>
                </article><!-- #post-## -->
            <?php endwhile; wp_reset_query(); $wp_query = $temp; ?>
            <?php
                if ( function_exists( 'kcs_custom_pagination' ) && is_page_template( 'page-testimonial.php' ) ) {
                    kcs_custom_pagination( $max_pages, "", $paged );
                }
            ?>
        </div>
    </div>
</section>

<?php else : ?>

    <?php kcs_get_placeholder( __FILE__ ); ?>

<?php endif; ?>
<?php do_action( 'kcs_testimonial_below_hook' ); ?>
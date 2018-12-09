<?php
/**
 * The template used for displaying clients section
 *
 * 
 */
?>
<?php

global $paged, $post, $max_pages;
$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

$args = array(
    'post_type' => 'client',
    'posts_per_page' => 5,
    'paged' => $paged
);

$temp = $wp_query;
$wp_query = null;

$wp_query = new WP_Query();
$wp_query->query( apply_filters( 'kcs_client_args_filter', $args ) );
$max_pages = $wp_query->max_num_pages;

?>
<?php do_action( 'kcs_client_above_hook' ); ?>
<?php if ( have_posts() ) : ?>
    <section id="section-client" class="section client">
        <h2 class="section-title"><?php echo apply_filters( 'kcs_client_title', __( 'Clients', 'kcs' ) ); ?></h2>
        <div class="container">
            <div class="section-content">
            <?php while ( have_posts() ) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                        <?php  if ( has_post_thumbnail() ) : ?>
                            <div class="entry-image">
                                <?php $meta_values = get_post_meta( get_the_ID() ); ?>
                                <a href="<?php echo esc_url( $meta_values['kcs-client-url'][0] ); ?>" title="<?php the_title(); ?>" class="client-thumbnail"><?php the_post_thumbnail( 'square', array( 'class' => 'bw' ) ); ?></a>
                            </div>
                        <?php endif; ?>

                    </article><!-- #post-## -->
                <?php endwhile; wp_reset_query(); $wp_query = $temp; ?>
                <?php
                    if ( function_exists( 'kcs_custom_pagination' ) && is_page_template( 'page-client.php' ) ) {
                        kcs_custom_pagination( $max_pages, "", $paged );
                    }
                ?>
            </div>
        </div>
    </section>

<?php else : ?>

    <?php kcs_get_placeholder( __FILE__ ); ?>

<?php endif; ?>

<?php do_action( 'kcs_client_below_hook' ); ?>
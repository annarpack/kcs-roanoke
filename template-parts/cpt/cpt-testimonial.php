<?php

/**
 * Register Testimonial post type
 */
function kcs_testimonial_create_type() {
    $labels = array(
            'name'                      => __( 'Testimonials', 'kcs' ),
            'singular_name'             => __( 'Testimonial', 'kcs' ),
            'add_new'                   => __( 'Add New', 'kcs' ),
            'add_new_item'              => __( 'Add Testimonial', 'kcs' ),
            'new_item'                  => __( 'Add Testimonial', 'kcs' ),
            'view_item'                 => __( 'View Testimonial', 'kcs' ),
            'search_items'              => __( 'Search Testimonials', 'kcs' ),
            'edit_item'                 => __( 'Edit Testimonial', 'kcs' ),
            'all_items'                 => __( 'All Testimonials', 'kcs' ),
            'not_found'                 => __( 'No Testimonial found', 'kcs' ),
            'not_found_in_trash'        => __( 'No Testimonial found in Trash', 'kcs' )
            );
    register_post_type('testimonial',
        array(
            'labels' => apply_filters( 'kcs_testimonial_labels_filter', $labels ),
            'public' => true,
            'show_ui' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'rewrite' => array( 'slug' => apply_filters( 'kcs_testimonial_slug_filter', __( 'testimonial', 'kcs' ) ), 'with_front' => false ),
            'query_var' => false,
            'show_in_rest' => true,
            'supports' => array( 'title', 'revisions', 'thumbnail', 'author', 'editor' ),
            'menu_position' => 7,
            'has_archive' => apply_filters( 'kcs_testimonial_archive_filter', __( 'testimonials', 'kcs' ) )
        )
    );
    flush_rewrite_rules();
}
add_action( 'init', 'kcs_testimonial_create_type' );


/**
 * Metaboxes for creative control for Testimonials
 *
 * @package kcs
 * @since kcs 1.0
 */

/*
 * Setup our metaboxes
 */
function kcs_testimonial_meta_boxes_setup() {
    /* Add meta boxes on the 'add_meta_boxes' hook. */
    add_action( 'add_meta_boxes', 'kcs_add_testimonial_meta_boxes' );
    /* Save post meta on the 'save_post' hook. */
    add_action( 'save_post', 'kcs_save_testimonial_meta', 10, 2 );
}
add_action( 'load-post.php', 'kcs_testimonial_meta_boxes_setup' );
add_action( 'load-post-new.php', 'kcs_testimonial_meta_boxes_setup' );

/*
 * Create one or more meta boxes to be displayed on the post editor screen.
 */
function kcs_add_testimonial_meta_boxes() {
    add_meta_box(
        'kcs_testimonial', // Unique ID
        esc_html__( 'Author Options', 'kcs' ), // Title
        'kcs_testimonial_meta_box', // Callback function
        'testimonial', // Admin page (or post type)
        'side', // Context
        'default' // Priority
    );
}

/*
 * Display the text positioning metabox
 */
function kcs_testimonial_meta_box( $object, $box ) { ?>

    <?php wp_nonce_field( basename( __FILE__ ), 'kcs_testimonial_nonce' ); ?>

    <?php $kcs_name = esc_attr( get_post_meta( $object->ID, 'kcs-full-name', true ) ); ?>
    <?php $kcs_position = esc_attr( get_post_meta( $object->ID, 'kcs-position', true ) ); ?>
    <?php $kcs_company = esc_attr( get_post_meta( $object->ID, 'kcs-company', true ) ); ?>

    <p>
        <label for="kcs-full-name"><strong><?php _e( 'Full Name:', 'kcs' ); ?></strong></label><br/>
        <input id="kcs-full-name" name="kcs-full-name" type="text" value="<?php if( '' == $kcs_name ) { echo ''; } else { echo $kcs_name; } ?>" /><br />

        <label for="kcs-position"><strong><?php _e( 'Position:', 'kcs' ); ?></strong></label><br/>
        <input id="kcs-position" name="kcs-position" type="text" value="<?php if( '' == $kcs_position ) { echo ''; } else { echo $kcs_position; } ?>" /><br />

        <label for="kcs-company"><strong><?php _e( 'Company:', 'kcs' ); ?></strong></label><br/>
        <input id="kcs-company" name="kcs-company" type="text" value="<?php if( '' == $kcs_company ) { echo ''; } else { echo $kcs_company; } ?>" />

    </p>
<?php }

/*
 * Save the text position post metadata.
 */
function kcs_save_testimonial_meta( $post_id, $post ) {

    /* Verify the nonce before proceeding. */
    if ( ! isset( $_POST['kcs_testimonial_nonce'] ) || ! wp_verify_nonce( $_POST['kcs_testimonial_nonce'], basename( __FILE__ ) ) )
        return $post_id;

    /* Get the post type object. */
    $post_type = get_post_type_object( $post->post_type );

    /* Check if the current user has permission to edit the post. */
    if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
        return $post_id;

    /* more than one, so set to an array */
    $names = array( 'kcs-full-name', 'kcs-position', 'kcs-company' );

    foreach ( $names as $name ) {

        /* Get the posted data and sanitize it for use as an HTML class. */
        $new_meta_value = ( isset( $_POST[ $name ] ) ? sanitize_text_field( $_POST[ $name ] ) : '' );

        /* Get the meta key. */
        $meta_key = $name;

        /* Get the meta value of the custom field key. */
        $meta_value = get_post_meta( $post_id, $meta_key, true );

        /* If a new meta value was added and there was no previous value, add it. */
        if ( $new_meta_value && '' == $meta_value )
            add_post_meta( $post_id, $meta_key, $new_meta_value, true );

        /* If the new meta value does not match the old value, update it. */
        elseif ( $new_meta_value && $new_meta_value != $meta_value )
            update_post_meta( $post_id, $meta_key, $new_meta_value );

        /* If there is no new meta value but an old value exists, delete it. */
        elseif ( '' == $new_meta_value && $meta_value )
            delete_post_meta( $post_id, $meta_key, $meta_value );

    }
}

?>

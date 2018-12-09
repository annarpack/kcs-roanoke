<?php

/*-----------------------------------------------------------------------------------*/
/* Register Client post type */
/*-----------------------------------------------------------------------------------*/

add_action( 'init', 'kcs_client_create_type' );

function kcs_client_create_type() {
    $labels = array(
            'name'                      => __( 'Clients', 'kcs' ),
            'singular_name'             => __( 'Client', 'kcs' ),
            'add_new'                   => __( 'Add New', 'kcs' ),
            'add_new_item'              => __( 'Add Client', 'kcs' ),
            'new_item'                  => __( 'Add Client', 'kcs' ),
            'view_item'                 => __( 'View Client', 'kcs' ),
            'search_items'              => __( 'Search Clients', 'kcs' ),
            'edit_item'                 => __( 'Edit Client', 'kcs' ),
            'all_items'                 => __( 'All Clients', 'kcs' ),
            'not_found'                 => __( 'No Clients found', 'kcs' ),
            'not_found_in_trash'        => __( 'No Clients found in Trash', 'kcs' )
            );
    register_post_type('client',
        array(
            'labels' => apply_filters( 'kcs_client_labels_filter', $labels ),
            'public' => true,
            'show_ui' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'rewrite' => array( 'slug' => apply_filters( 'kcs_client_slug_filter', __( 'client', 'kcs' ) ), 'with_front' => false ),
            'query_var' => false,
            'show_in_rest' => true,
            'supports' => array( 'title', 'revisions', 'thumbnail' ),
            'menu_position' => 8,
            'has_archive' => apply_filters( 'kcs_client_archive_filter', __( 'clients', 'kcs' ) )
        )
    );
    flush_rewrite_rules();
}


/**
 * Metaboxes for creative control for Cient
 *
 * @package kcs
 * @since kcs 1.0
 */

/*
 * Setup our metaboxes
 */
function kcs_client_meta_boxes_setup() {
    /* Add meta boxes on the 'add_meta_boxes' hook. */
    add_action( 'add_meta_boxes', 'kcs_add_client_meta_boxes' );
    /* Save post meta on the 'save_post' hook. */
    add_action( 'save_post', 'kcs_save_client_meta', 10, 2 );
}
add_action( 'load-post.php', 'kcs_client_meta_boxes_setup' );
add_action( 'load-post-new.php', 'kcs_client_meta_boxes_setup' );

/*
 * Create one or more meta boxes to be displayed on the post editor screen.
 */
function kcs_add_client_meta_boxes() {
    add_meta_box(
        'kcs_client', // Unique ID
        esc_html__( 'Client URL', 'kcs' ), // Title
        'kcs_client_meta_box', // Callback function
        'client', // Admin page (or post type)
        'normal', // Context
        'high' // Priority
    );
}

/*
 * Display the text positioning metabox
 */
function kcs_client_meta_box( $object, $box ) { ?>

    <?php wp_nonce_field( basename( __FILE__ ), 'kcs_client_nonce' ); ?>

    <?php $kcs_client_url = esc_attr( get_post_meta( $object->ID, 'kcs-client-url', true ) ); ?>

    <p>
        <input id="kcs-client-url" name="kcs-client-url" type="text" value="<?php if( '' == $kcs_client_url ) { echo 'http://'; } else { echo $kcs_client_url; } ?>" />
    </p>
<?php }

/*
 * Save the text position post metadata.
 */
function kcs_save_client_meta( $post_id, $post ) {

    /* Verify the nonce before proceeding. */
    if ( ! isset( $_POST['kcs_client_nonce'] ) || ! wp_verify_nonce( $_POST['kcs_client_nonce'], basename( __FILE__ ) ) )
        return $post_id;

    /* Get the post type object. */
    $post_type = get_post_type_object( $post->post_type );

    /* Check if the current user has permission to edit the post. */
    if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
        return $post_id;

    /* more than one, so set to an array */
    $names = array( 'kcs-client-url' );

    foreach ( $names as $name ) {

        /* Get the posted data and sanitize it for use as an HTML class. */
        $new_meta_value = ( isset( $_POST[ $name ] ) ? esc_url_raw( $_POST[ $name ] ) : '' );

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

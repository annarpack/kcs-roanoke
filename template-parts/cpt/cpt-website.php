<?php

/**
 * Register Website post type
 */
function kcs_website_create_type() {
    $labels = array(
            'name'                      => __( 'Websites', 'kcs' ),
            'singular_name'             => __( 'Website', 'kcs' ),
            'add_new'                   => __( 'Add New', 'kcs' ),
            'add_new_item'              => __( 'Add Website', 'kcs' ),
            'new_item'                  => __( 'Add Website', 'kcs' ),
            'view_item'                 => __( 'View Website', 'kcs' ),
            'search_items'              => __( 'Search Websites', 'kcs' ),
            'edit_item'                 => __( 'Edit Website', 'kcs' ),
            'all_items'                 => __( 'All Websites', 'kcs' ),
            'not_found'                 => __( 'No Websites found', 'kcs' ),
            'not_found_in_trash'        => __( 'No Websites found in Trash', 'kcs' )
        );

    register_post_type('website',
        array(
            'labels' => apply_filters( 'kcs_website_labels_filter', $labels ),
            'public' => true,
            'show_ui' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'rewrite' => array( 'slug' => apply_filters( 'kcs_website_slug_filter', __( 'website', 'kcs' ) ), 'with_front' => false ),
            'query_var' => false,
            'show_in_rest' => true,
            'supports' => array( 'title', 'revisions', 'thumbnail', 'editor', 'excerpt' ),
            'menu_position' => 3,
            'has_archive' => apply_filters( 'kcs_website_archive_filter', __( 'websites', 'kcs' ) )
        )
    );
    flush_rewrite_rules();
}
add_action( 'init', 'kcs_website_create_type' );


/**
 * Metaboxes for creative control
 */

/*
 * Setup our metaboxes
 */
function kcs_website_meta_boxes_setup() {
    /* Add meta boxes on the 'add_meta_boxes' hook. */
    add_action( 'add_meta_boxes', 'kcs_add_website_meta_boxes' );
    /* Save post meta on the 'save_post' hook. */
    add_action( 'save_post', 'kcs_save_website_meta', 10, 2 );
}
add_action( 'load-post.php', 'kcs_website_meta_boxes_setup' );
add_action( 'load-post-new.php', 'kcs_website_meta_boxes_setup' );

/*
 * Create one or more meta boxes to be displayed on the post editor screen.
 */
function kcs_add_website_meta_boxes() {
    add_meta_box(
        'kcs_website', // Unique ID
        esc_html__( 'website URL', 'kcs' ), // Title
        'kcs_website_meta_box', // Callback function
        'website', // Admin page (or post type)
        'normal', // Context
        'high' // Priority
    );
}

/*
 * Display the text positioning metabox
 */
function kcs_website_meta_box( $object, $box ) { ?>

    <?php wp_nonce_field( basename( __FILE__ ), 'kcs_website_nonce' ); ?>

    <?php $kcs_website_url = esc_attr( get_post_meta( $object->ID, 'kcs-website-url', true ) ); ?>

    <p>
        <input id="kcs-website-url" name="kcs-website-url" type="text" value="<?php if( '' == $kcs_website_url ) { echo 'http://'; } else { echo $kcs_website_url; } ?>" />
    </p>
<?php }

/*
 * Save the text position post metadata.
 */
function kcs_save_website_meta( $post_id, $post ) {

    /* Verify the nonce before proceeding. */
    if ( ! isset( $_POST['kcs_website_nonce'] ) || ! wp_verify_nonce( $_POST['kcs_website_nonce'], basename( __FILE__ ) ) )
        return $post_id;

    /* Get the post type object. */
    $post_type = get_post_type_object( $post->post_type );

    /* Check if the current user has permission to edit the post. */
    if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
        return $post_id;

    /* more than one, so set to an array */
    $names = array( 'kcs-website-url' );

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

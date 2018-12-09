<?php

/**
 * Register Photography post type
 */
function kcs_photography_create_type() {
    $labels = array(
            'name'                      => __( 'Photography', 'kcs' ),
            'singular_name'             => __( 'Photography', 'kcs' ),
            'add_new'                   => __( 'Add New', 'kcs' ),
            'add_new_item'              => __( 'Add Photography', 'kcs' ),
            'new_item'                  => __( 'Add Photography', 'kcs' ),
            'view_item'                 => __( 'View Photography', 'kcs' ),
            'search_items'              => __( 'Search Photography', 'kcs' ),
            'edit_item'                 => __( 'Edit Photography', 'kcs' ),
            'all_items'                 => __( 'All Photography', 'kcs' ),
            'not_found'                 => __( 'No Photography found', 'kcs' ),
            'not_found_in_trash'        => __( 'No Photography found in Trash', 'kcs' )
        );

    register_post_type('photography',
        array(
            'labels' => apply_filters( 'kcs_photography_labels_filter', $labels ),
            'public' => true,
            'show_ui' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'rewrite' => array( 'slug' => apply_filters( 'kcs_photography_slug_filter', __( 'photography', 'kcs' ) ), 'with_front' => false ),
            'query_var' => false,
            'show_in_rest' => true,
            'supports' => array( 'title', 'revisions', 'thumbnail', 'editor', 'excerpt' ),
            'menu_position' => 3,
            'has_archive' => apply_filters( 'kcs_photography_archive_filter', __( 'photography-pictures', 'kcs' ) )
        )
    );
    flush_rewrite_rules();
}
add_action( 'init', 'kcs_photography_create_type' );

?>

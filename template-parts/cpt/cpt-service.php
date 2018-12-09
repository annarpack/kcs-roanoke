<?php

/**
 * Register Service post type
 */
function kcs_service_create_type() {
    $labels = array(
            'name'                      => __( 'Services', 'kcs' ),
            'singular_name'             => __( 'Service', 'kcs' ),
            'add_new'                   => __( 'Add New', 'kcs' ),
            'add_new_item'              => __( 'Add Service', 'kcs' ),
            'new_item'                  => __( 'Add Service', 'kcs' ),
            'view_item'                 => __( 'View Service', 'kcs' ),
            'search_items'              => __( 'Search Services', 'kcs' ),
            'edit_item'                 => __( 'Edit Service', 'kcs' ),
            'all_items'                 => __( 'All Services', 'kcs' ),
            'not_found'                 => __( 'No Services found', 'kcs' ),
            'not_found_in_trash'        => __( 'No Services found in Trash', 'kcs' )
        );

    register_post_type('service',
        array(
            'labels' => apply_filters( 'kcs_service_labels_filter', $labels ),
            'public' => true,
            'show_ui' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'rewrite' => array( 'slug' => apply_filters( 'kcs_service_slug_filter', __( 'service', 'kcs' ) ), 'with_front' => false ),
            'query_var' => false,
            'supports' => array( 'title', 'revisions', 'thumbnail', 'editor', 'excerpt' ),
            'menu_position' => 6,
            'has_archive' => apply_filters( 'kcs_service_archive_filter', __( 'services', 'kcs' ) )
        )
    );
    flush_rewrite_rules();
}
add_action( 'init', 'kcs_service_create_type' );

?>
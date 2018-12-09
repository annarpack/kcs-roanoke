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
            'supports' => array( 'title', 'revisions', 'thumbnail', 'editor', 'excerpt' ),
            'menu_position' => 4,
            'has_archive' => apply_filters( 'kcs_website_archive_filter', __( 'websites', 'kcs' ) )
        )
    );
    flush_rewrite_rules();
}
add_action( 'init', 'kcs_website_create_type' );

?>
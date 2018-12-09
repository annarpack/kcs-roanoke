<?php

/**
 * Register component post type
 */
function kcs_component_create_type() {
    $labels = array(
            'name'                      => __( 'Components', 'kcs' ),
            'singular_name'             => __( 'Component', 'kcs' ),
            'add_new'                   => __( 'Add New', 'kcs' ),
            'add_new_item'              => __( 'Add Component', 'kcs' ),
            'new_item'                  => __( 'Add Component', 'kcs' ),
            'view_item'                 => __( 'View Component', 'kcs' ),
            'search_items'              => __( 'Search Components', 'kcs' ),
            'edit_item'                 => __( 'Edit Component', 'kcs' ),
            'all_items'                 => __( 'All Components', 'kcs' ),
            'not_found'                 => __( 'No Components found', 'kcs' ),
            'not_found_in_trash'        => __( 'No Components found in Trash', 'kcs' )
        );

    register_post_type('component',
        array(
            'labels' => apply_filters( 'kcs_component_labels_filter', $labels ),
            'public' => true,
            'show_ui' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'rewrite' => array( 'slug' => apply_filters( 'kcs_component_slug_filter', __( 'component', 'kcs' ) ), 'with_front' => false ),
            'query_var' => false,
            'supports' => array( 'title', 'revisions', 'thumbnail', 'editor', 'excerpt' ),
            'menu_position' => 4,
            'has_archive' => apply_filters( 'kcs_component_archive_filter', __( 'components', 'kcs' ) )
        )
    );
    flush_rewrite_rules();
}
add_action( 'init', 'kcs_component_create_type' );

?>
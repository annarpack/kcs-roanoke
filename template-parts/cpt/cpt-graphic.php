<?php

/**
 * Register Graphic post type
 */
function kcs_graphic_create_type() {
    $labels = array(
            'name'                      => __( 'Graphics', 'kcs' ),
            'singular_name'             => __( 'Graphic', 'kcs' ),
            'add_new'                   => __( 'Add New', 'kcs' ),
            'add_new_item'              => __( 'Add Graphic', 'kcs' ),
            'new_item'                  => __( 'Add Graphic', 'kcs' ),
            'view_item'                 => __( 'View Graphics', 'kcs' ),
            'search_items'              => __( 'Search Graphics', 'kcs' ),
            'edit_item'                 => __( 'Edit Graphic', 'kcs' ),
            'all_items'                 => __( 'All Graphics', 'kcs' ),
            'not_found'                 => __( 'No Graphics found', 'kcs' ),
            'not_found_in_trash'        => __( 'No Graphics found in Trash', 'kcs' )
        );

    register_post_type('graphic',
        array(
            'labels' => apply_filters( 'kcs_graphic_labels_filter', $labels ),
            'public' => true,
            'show_ui' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'rewrite' => array( 'slug' => apply_filters( 'kcs_graphic_slug_filter', __( 'graphic', 'kcs' ) ), 'with_front' => false ),
            'query_var' => false,
            'show_in_rest' => true,
            'supports' => array( 'title', 'revisions', 'thumbnail', 'editor', 'excerpt' ),
            'menu_position' => 3,
            'has_archive' => apply_filters( 'kcs_graphic_archive_filter', __( 'graphics', 'kcs' ) )
        )
    );
    flush_rewrite_rules();
}
add_action( 'init', 'kcs_graphic_create_type' );

?>

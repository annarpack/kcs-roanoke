<?php

/**
 * Register Strategy post type
 */

function kcs_strategy_create_type() {
    $labels = array(
			'name'                      => __( 'Strategies', 'kcs' ),
            'singular_name'             => __( 'Strategy', 'kcs' ),
            'add_new'                   => __( 'Add New', 'kcs' ),
            'add_new_item'              => __( 'Add Strategy', 'kcs' ),
            'new_item'                  => __( 'Add Strategy', 'kcs' ),
            'view_item'                 => __( 'View Strategy', 'kcs' ),
            'search_items'              => __( 'Search Strategies', 'kcs' ),
            'edit_item'                 => __( 'Edit Strategy', 'kcs' ),
            'all_items'                 => __( 'All Strategies', 'kcs' ),
            'not_found'                 => __( 'No Strategy found', 'kcs' ),
            'not_found_in_trash'        => __( 'No Strategy found in Trash', 'kcs' )
            );
    register_post_type('strategy',
        array(
            'labels' => apply_filters( 'kcs_strategy_labels_filter', $labels ),
            'public' => true,
            'show_ui' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'rewrite' => array( 'slug' => apply_filters( 'kcs_strategy_slug_filter', __( 'strategy', 'kcs' ) ), 'with_front' => false ),
            'query_var' => false,
            'supports' => array( 'title', 'revisions', 'thumbnail', 'author', 'editor','excerpt' ),
            'menu_position' => 7,
            'has_archive' => apply_filters( 'kcs_strategy_archive_filter', __( 'strategies', 'kcs' ) )
        )
    );
    flush_rewrite_rules();
}
add_action( 'init', 'kcs_strategy_create_type' );


?>


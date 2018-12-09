<?php

/**
 * Register new custom post types
 * @package kcs
 * @since kcs 1.0
 */

/**
 * Register new post type
 */
function kcs_ps_portfolio_create_type() {
    $labels = array(
                'name'                      => __( 'Portfolios', 'kcs' ),
                'singular_name'             => __( 'Portfolio', 'kcs' ),
                'add_new'                   => __( 'Add New', 'kcs' ),
                'add_new_item'              => __( 'Add Portfolio', 'kcs' ),
                'new_item'                  => __( 'Add Portfolio', 'kcs' ),
                'view_item'                 => __( 'View Portfolio', 'kcs' ),
                'search_items'              => __( 'Search Portfolios', 'kcs' ),
                'edit_item'                 => __( 'Edit Portfolio', 'kcs' ),
                'all_items'                 => __( 'All Portfolios', 'kcs' ),
                'not_found'                 => __( 'No Portfolio found', 'kcs' ),
                'not_found_in_trash'        => __( 'No Portfolio found in Trash', 'kcs' )
            );
    register_post_type( 'portfolio',
        array(
            'labels' => apply_filters( 'kcs_portfolio_labels_filter', $labels ),
            'taxonomies'    => array( 'portfolio-category', 'portfolio-tag' ),
            'public' => true,
            'show_ui' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'rewrite' => array( 'slug' => apply_filters( 'kcs_portfolio_slug_filter', __( 'kcs-portfolio', 'kcs' ) ), 'with_front' => true ),
            'query_var' => false,
            'supports' => array( 'title', 'revisions', 'thumbnail', 'author', 'editor' ),
            'menu_position' => 5,
            'has_archive' => apply_filters( 'kcs_portfolio_archive_filter', __( 'portfolios', 'kcs' ) )
        )
    );
    flush_rewrite_rules( );
}
add_action( 'init', 'kcs_ps_portfolio_create_type' );

?>
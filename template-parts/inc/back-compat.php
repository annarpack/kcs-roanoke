<?php
/**
 * Anna R Pack back compat functionality
 *
 * Prevents Anna R Pack from running on WordPress versions prior to 4.7,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.7.
 *
 * @package WordPress
 * @subpackage Knockout Creative Studio
 *  
 */

/**
 * Prevent switching to Anna R Pack on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 *  
 */
function kcs_switch_theme() {
	switch_theme( WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'kcs_upgrade_notice' );
}
add_action( 'after_switch_theme', 'kcs_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * Anna R Pack on WordPress versions prior to 4.7.
 *
 *  
 *
 * @global string $wp_version WordPress version.
 */
function kcs_upgrade_notice() {
	$message = sprintf( __( 'This theme requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'kcs' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 4.7.
 *
 *  
 *
 * @global string $wp_version WordPress version.
 */
function kcs_customize() {
	wp_die( sprintf( __( 'This theme requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'kcs' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'kcs_customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 4.7.
 *
 *  
 *
 * @global string $wp_version WordPress version.
 */
function kcs_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( __( 'This theme requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'kcs' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'kcs_preview' );

<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Bakery Treats
 */

function bakery_treats_body_classes( $bakery_treats_classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$bakery_treats_classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$bakery_treats_classes[] = 'no-sidebar'; 
	}

	return $bakery_treats_classes;
}
add_filter( 'body_class', 'bakery_treats_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function bakery_treats_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'bakery_treats_pingback_header' );
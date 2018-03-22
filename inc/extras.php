<?php
/**
 * Custom functions that are not template related
 *
 * @package gertex2018
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function gertex2018_body_classes( $classes ) {

	// Get theme options from database.
	//$theme_options =  gertex2018_theme_options();

	// Check if sidebar widget area is empty or switch sidebar layout to left.
	if ( ! is_active_sidebar( 'sidebar' ) ) {
		$classes[] = 'no-sidebar';
    }
    /* elseif ( 'left-sidebar' == $theme_options['layout'] ) {
		$classes[] = 'sidebar-left';
	}

	// Add small post layout class.
	if ( ( is_archive() or is_home() or is_search() ) and 'left' == $theme_options['post_layout_archives'] ) {
		$classes[] = 'post-layout-small';
	}

	// Hide Date?
	if ( false === $theme_options['meta_date'] ) {
		$classes[] = 'date-hidden';
	}

	// Hide Author?
	if ( false === $theme_options['meta_author'] ) {
		$classes[] = 'author-hidden';
	}

	// Hide Categories?
	if ( false === $theme_options['meta_category'] ) {
		$classes[] = 'categories-hidden';
    }
    */

	return $classes;
}
add_filter( 'body_class', 'gertex2018_body_classes' );


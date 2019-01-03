<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package CreateandCode
 * @subpackage jefferson
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function jefferson_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Add class if the site title and tagline is hidden.
	if ( 'blank' === get_header_textcolor() ) {
		$classes[] = 'title-tagline-hidden';
	}

	return $classes;
}

add_filter( 'body_class', 'jefferson_body_classes' );

/**
 * Produces nice safe html for presentation.
 *
 * @param $input - accepts a string.
 * @return string
 */
function jefferson_safe_html( $input ) {

	$args = array(
		// formatting.
		'span' => array(),
		'strong' => array(),
		'em'	 => array(),
		'b'		 => array(),
		'i'		 => array(
			'class' => array(),
		),
		'img'    => array(
		    'href' => array(),
		    'alt'  => array(),
		    'class' => array(),
		    'scale' => array(),
		    'width' => array(),
		    'height' => array(),
		    'src' => array(),
		),
		'p'		 => array(),
		// links.
		'a'		 => array(
			'href' => array(),
		),
	);

	return wp_kses( $input, $args );
}

/**
 * Get an array of terms from a taxonomy
 *
 * @param string|array $taxonomies See https://developer.wordpress.org/reference/functions/get_terms/ for details.
 * @return array
 */
function jefferson_get_terms( $taxonomies ) {

	$items = array();

	// Get the post types.
	$terms = get_terms( $taxonomies );

	// Build the array.
	foreach ( $terms as $term ) {
		$items[ $term->term_id ] = $term->name;
	}

	return $items;

}

<?php
/**
 *
 * Kirki defaults
 *
 * @package CreateandCode
 * @subpackage jefferson
 */

if ( ! function_exists( 'jefferson_get_option_defaults' ) ) {

	/**
	 *
	 * Sensible defaults.
	 */
	function jefferson_get_option_defaults() {
		$defaults = array(
			// Blog.
			'jefferson_layout_single_post_author'				 => 'show',
			'jefferson_layout_blog_archive_excerpt'				 => '30',
			'jefferson_layout_blog_listing_featured_img'		 => 'show',
			'jefferson_layout_blog_archive_show_excerpt'		 => 'show',
			// Homepage.
			'jefferson_homepage_hero'						 	 => 'hide',
			'jefferson_homepage_hero_category'				 	 => '3',
			'jefferson_featured_post'							 => 'hide',
			'jefferson_featured_post_id'						 => '1',
			// Navigation.
			'jefferson_sticky_navigation'						 => 'enable',
			'jefferson_mainmenu_color'							 => '#261616',
			'jefferson_mainmenu_color_hover'					 => '#e7503e',
			// Colors.
			'jefferson_color_general_swatch'					 => '#e7503e',
			'jefferson_color_general_swatch_text'				 => '#fff',
			'jefferson_color_general_text'						 => '#343434',
			'jefferson_color_general_links'						 => '#e7503e',
			'jefferson_color_general_links_hover'				 => '#111',
			'jefferson_color_header_background'					 => '#fff',
			'jefferson_color_header_site_title'					 => '#333',
			'jefferson_color_header_site_desc'					 => '#666',
			// Footer.
			'jefferson_layout_first_footer'						 => 'show',
		);

		return apply_filters( 'jefferson_get_option_defaults', $defaults );
	}
}// End if().

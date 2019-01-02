<?php
/**
 *
 * Some wrappers for theme mods/options and their defaults
 *
 * @package CreateandCode
 * @subpackage jefferson
 */

// Set sensible defaults.
require_once get_template_directory() . '/inc/customizer/defaults.php';

if ( ! function_exists( 'jefferson_get_option' ) ) {
	/**
	 * Main function used to call them options
	 *
	 * @param int $key The theme option argument.
	 */
	function jefferson_get_option( $key ) {
		$jefferson_options	 = jefferson_get_options();
		$jefferson_option	 = get_theme_mod( $key, $jefferson_options[ $key ] );
		return $jefferson_option;
	}
}

if ( ! function_exists( 'jefferson_get_options' ) ) {

	/**
	 * Get theme option defaults
	 */
	function jefferson_get_options() {
		return wp_parse_args(
			get_theme_mods(), jefferson_get_option_defaults()
		);
	}
}

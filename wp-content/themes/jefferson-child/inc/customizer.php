<?php
/**
 * jefferson Theme Customizer
 *
 * @package CreateandCode
 * @subpackage jefferson
 */

// Set config scope.
jefferson_Kirki::add_config( 'jefferson_config', array(
	'option_type'	 => 'theme_mod',
	'capability'	 => 'edit_theme_options',
) );

// Init options and set sane defaults.
require_once get_template_directory() . '/inc/customizer/options.php';

// Get Panels.
require get_template_directory() . '/inc/customizer/panels/panels.php';

// Get Sections.
require get_template_directory() . '/inc/customizer/sections/general.php';
require get_template_directory() . '/inc/customizer/sections/color.php';
require get_template_directory() . '/inc/customizer/sections/mainmenu.php';
require get_template_directory() . '/inc/customizer/sections/typography.php';
require get_template_directory() . '/inc/customizer/sections/layout.php';
require get_template_directory() . '/inc/customizer/sections/homepage.php';

// Get Fields.
require get_template_directory() . '/inc/customizer/fields/general.php';
require get_template_directory() . '/inc/customizer/fields/color.php';
require get_template_directory() . '/inc/customizer/fields/mainmenu.php';
require get_template_directory() . '/inc/customizer/fields/typography.php';
require get_template_directory() . '/inc/customizer/fields/layout.php';
require get_template_directory() . '/inc/customizer/fields/homepage.php';

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function jefferson_customize_register( $wp_customize ) {
	// Reassign default sections to panels.
	$wp_customize->get_section( 'title_tagline' )->panel	 = 'jefferson_panel_general';
	$wp_customize->get_section( 'static_front_page' )->panel = 'jefferson_panel_general';
	$wp_customize->get_setting( 'blogname' )->transport			 = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport	 = 'postMessage';
}

add_action( 'customize_register', 'jefferson_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function jefferson_customize_preview_js() {
	wp_enqueue_script( 'jefferson_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}

add_action( 'customize_preview_init', 'jefferson_customize_preview_js' );

<?php
/**
 *
 * Kirki color section
 *
 * @package CreateandCode
 * @subpackage jefferson
 */
function jefferson_kirki_section_color( $wp_customize ) {

	// Colors.
	$wp_customize->add_section( 'jefferson_color_section_general', array(
		'title'			 => __( 'General', 'jefferson' ),
		'panel'			 => 'jefferson_panel_colors',
		'priority'		 => 10,
		'description'	 => __( 'Manage general colors', 'jefferson' ),
	) );

	$wp_customize->add_section( 'jefferson_color_section_header', array(
		'title'			 => __( 'Header', 'jefferson' ),
		'panel'			 => 'jefferson_panel_colors',
		'priority'		 => 10,
		'description'	 => __( 'Manage header colors', 'jefferson' ),
	) );

	$wp_customize->add_section( 'jefferson_color_section_footer', array(
		'title'			 => __( 'Footer', 'jefferson' ),
		'panel'			 => 'jefferson_panel_colors',
		'priority'		 => 10,
		'description'	 => __( 'Manage footer colors', 'jefferson' ),
	) );
}

add_action( 'customize_register', 'jefferson_kirki_section_color' );

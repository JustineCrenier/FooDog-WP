<?php
/**
 *
 * Kirki menu section
 *
 * @package CreateandCode
 * @subpackage jefferson
 */
function jefferson_kirki_section_mainmenu( $wp_customize ) {

	// Header Colors.
	$wp_customize->add_section( 'jefferson_header_section_colors', array(
		'title'			 => __( 'Header Colors', 'jefferson' ),
		'panel'			 => 'jefferson_panel_mainmenu',
		'priority'		 => 10,
		'description'	 => __( 'Manage the Header Colors', 'jefferson' ),
	) );

	// Header Layout.
	$wp_customize->add_section( 'jefferson_header_section_layout', array(
		'title'			 => __( 'Header Layout', 'jefferson' ),
		'panel'			 => 'jefferson_panel_mainmenu',
		'priority'		 => 10,
		'description'	 => __( 'Manage the Header Layout', 'jefferson' ),
	) );

	// Main Menu Colors.
	$wp_customize->add_section( 'jefferson_mainmenu_section_layout', array(
		'title'			 => __( 'Main Navigation Layout', 'jefferson' ),
		'panel'			 => 'jefferson_panel_mainmenu',
		'priority'		 => 10,
		'description'	 => __( 'Manage the Main Navigation Layout', 'jefferson' ),
	) );

	// Main Menu Colors.
	$wp_customize->add_section( 'jefferson_mainmenu_section_colors', array(
		'title'			 => __( 'Main Navigation Colors', 'jefferson' ),
		'panel'			 => 'jefferson_panel_mainmenu',
		'priority'		 => 10,
		'description'	 => __( 'Manage the Main Navigation Colors', 'jefferson' ),
	) );

}

add_action( 'customize_register', 'jefferson_kirki_section_mainmenu' );

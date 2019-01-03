<?php
/**
 *
 * Kirki general section
 *
 * @package CreateandCode
 * @subpackage jefferson
 */
function jefferson_kirki_section_general( $wp_customize ) {

	// General.
	$wp_customize->add_section( 'jefferson_section_general_logo_height', array(
		'title'			 => __( 'Logo Height', 'jefferson' ),
		'panel'			 => 'jefferson_panel_general',
		'priority'		 => 10,
		'description'	 => __( 'Modify the height of your logo', 'jefferson' ),
	) );

	$wp_customize->add_section( 'jefferson_section_general_footer', array(
		'title'			 => __( 'Footer Copyright Text', 'jefferson' ),
		'panel'			 => 'jefferson_panel_general',
		'priority'		 => 10,
		'description'	 => __( 'Manage your Footer copyright text', 'jefferson' ),
	) );
}

add_action( 'customize_register', 'jefferson_kirki_section_general' );

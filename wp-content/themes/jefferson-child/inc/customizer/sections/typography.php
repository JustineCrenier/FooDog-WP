<?php
/**
 *
 * Kirki typography section
 *
 * @package CreateandCode
 * @subpackage jefferson
 */
function jefferson_kirki_section_typography( $wp_customize ) {

	// Typography.
	$wp_customize->add_section( 'jefferson_typography_section_mainbody', array(
		'title'			 => __( 'Main Body', 'jefferson' ),
		'panel'			 => 'jefferson_panel_typography',
		'priority'		 => 10,
		'description'	 => __( 'Font for the main body text', 'jefferson' ),
	) );

	// Menu and Headings.
	$wp_customize->add_section( 'jefferson_typography_section_headings', array(
		'title'			 => __( 'Menu and Headings', 'jefferson' ),
		'panel'			 => 'jefferson_panel_typography',
		'priority'		 => 10,
		'description'	 => __( 'Font for the menu and headings', 'jefferson' ),
	) );

	// Paragraphs.
	$wp_customize->add_section( 'jefferson_typography_section_p', array(
		'title'			 => __( 'Paragraphs', 'jefferson' ),
		'panel'			 => 'jefferson_panel_typography',
		'priority'		 => 10,
		'description'	 => __( 'Font for the paragraphs', 'jefferson' ),
	) );

}

add_action( 'customize_register', 'jefferson_kirki_section_typography' );

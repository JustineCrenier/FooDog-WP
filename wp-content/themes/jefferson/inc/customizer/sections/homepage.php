<?php
/**
 *
 * Kirki homepage section
 *
 * @package CreateandCode
 * @subpackage jefferson
 */
function jefferson_kirki_section_homepage( $wp_customize ) {
	// Homepage.

	$wp_customize->add_section( 'jefferson_homepage_section_hero', array(
		'title'			 => __( 'Hero Section', 'jefferson' ),
		'panel'			 => 'jefferson_panel_homepage',
		'priority'		 => 10,
		'description'	 => __( 'Manage the Hero Area', 'jefferson' ),
	) );

	$wp_customize->add_section( 'jefferson_homepage_section_featured_post', array(
		'title'			 => __( 'Featured Post', 'jefferson' ),
		'panel'			 => 'jefferson_panel_homepage',
		'priority'		 => 10,
		'description'	 => __( 'Manage the Featured Post', 'jefferson' ),
	) );

}

add_action( 'customize_register', 'jefferson_kirki_section_homepage' );

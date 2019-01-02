<?php
/**
 *
 * Kirki layout section
 *
 * @package CreateandCode
 * @subpackage jefferson
 */
function jefferson_kirki_section_layout( $wp_customize ) {
	// Layout.

	$wp_customize->add_section( 'jefferson_layout_section_homepage', array(
		'title'			 => __( 'Homepage Settings', 'jefferson' ),
		'panel'			 => 'jefferson_panel_layout',
		'priority'		 => 10,
		'description'	 => __( 'Manage the Homepage', 'jefferson' ),
	) );

	$wp_customize->add_section( 'jefferson_layout_section_blog_archive', array(
		'title'			 => __( 'Blog Archive Settings', 'jefferson' ),
		'panel'			 => 'jefferson_panel_layout',
		'priority'		 => 10,
		'description'	 => __( 'Manage the Blog Archive', 'jefferson' ),
	) );

	$wp_customize->add_section( 'jefferson_layout_section_single_post', array(
		'title'			 => __( 'Single Post Settings', 'jefferson' ),
		'panel'			 => 'jefferson_panel_layout',
		'priority'		 => 10,
		'description'	 => __( 'Manage the Single Post', 'jefferson' ),
	) );

	$wp_customize->add_section( 'jefferson_layout_section_footer', array(
		'title'			 => __( 'Footer Layout Settings', 'jefferson' ),
		'panel'			 => 'jefferson_panel_layout',
		'priority'		 => 10,
		'description'	 => __( 'Manage Footer Layout', 'jefferson' ),
	) );
}

add_action( 'customize_register', 'jefferson_kirki_section_layout' );

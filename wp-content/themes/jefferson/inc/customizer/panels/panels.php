<?php
/**
 *
 * Kirki options panels
 *
 * @package CreateandCode
 * @subpackage jefferson
 */

function jefferson_kirki_panels( $wp_customize ) {

	$wp_customize->add_panel( 'jefferson_panel_general', array(
		'priority'		 => 10,
		'title'			 => __( 'General Settings', 'jefferson' ),
		'description'	 => __( 'Manage general theme settings', 'jefferson' ),
	) );
	$wp_customize->add_panel( 'jefferson_panel_colors', array(
		'priority'		 => 10,
		'title'			 => __( 'Color', 'jefferson' ),
		'description'	 => __( 'Manage theme colors', 'jefferson' ),
	) );
	$wp_customize->add_panel( 'jefferson_panel_mainmenu', array(
		'priority'		 => 10,
		'title'			 => __( 'Header and Navigation', 'jefferson' ),
		'description'	 => __( 'Manage the header and navigation', 'jefferson' ),
	) );
	$wp_customize->add_panel( 'jefferson_panel_typography', array(
		'priority'		 => 10,
		'title'			 => __( 'Typography', 'jefferson' ),
		'description'	 => __( 'Manage theme typography', 'jefferson' ),
	) );
	$wp_customize->add_panel( 'jefferson_panel_homepage', array(
		'priority'		 => 10,
		'title'			 => __( 'Homepage', 'jefferson' ),
		'description'	 => __( 'Manage the homepage', 'jefferson' ),
	) );
	$wp_customize->add_panel( 'jefferson_panel_layout', array(
		'priority'		 => 10,
		'title'			 => __( 'Layout', 'jefferson' ),
		'description'	 => __( 'Manage theme header, footer and more', 'jefferson' ),
	) );
	$wp_customize->add_panel( 'jefferson_panel_blog', array(
		'priority'		 => 10,
		'title'			 => __( 'Blog', 'jefferson' ),
		'description'	 => __( 'Manage blog settings', 'jefferson' ),
	) );
}

add_action( 'customize_register', 'jefferson_kirki_panels' );

<?php
/**
 *
 * General theme options
 *
 * @package CreateandCode
 * @subpackage jefferson
 */

// General fields.
$jefferson_default_options = jefferson_get_option_defaults();

// Header Logo Height.
jefferson_Kirki::add_field( 'jefferson_config', array(
	'type'			 => 'slider',
	'settings'		 => 'jefferson_logo_height',
	'label'			 => esc_html__( 'Logo Height', 'jefferson' ),
	'description'	 => esc_html__( 'Adjust the height of your logo in pixels.', 'jefferson' ),
	'section'		 => 'jefferson_section_general_logo_height',
	'default'		 => 72,
	'priority'		 => 1,
	'choices'		 => array(
		'min'	 => 0,
		'max'	 => 150,
		'step'	 => 1,
	),
	'output'		 => array(
		array(
			'element'	 => '.ccfw-site-logo img',
			'property'	 => 'height',
			'units'		 => 'px',
		),
	),
) );

<?php
/**
 *
 * Layout theme options
 *
 * @package CreateandCode
 * @subpackage jefferson
 */

// Layout fields.
$jefferson_default_options = jefferson_get_option_defaults();


// Blog Archive - Show/Hide Excerpt.
jefferson_Kirki::add_field( 'jefferson_config', array(
	'type'			 => 'select',
	'settings'		 => 'jefferson_layout_blog_archive_show_excerpt',
	'label'			 => esc_html__( 'Show the Excerpt?', 'jefferson' ),
	'description'	 => esc_html__( 'Show or hide the excerpt?', 'jefferson' ),
	'section'		 => 'jefferson_layout_section_blog_archive',
	'default'		 => $jefferson_default_options['jefferson_layout_blog_archive_show_excerpt'],
	'priority'		 => 10,
	'transport'		 => 'refresh',
	'choices'		 => array(
		'show'	 => esc_html__( 'Show', 'jefferson' ),
		'hide'	 => esc_html__( 'Hide', 'jefferson' ),
	),
) );

// Blog Archive Excerpt Number.
jefferson_Kirki::add_field( 'jefferson_config', array(
	'type'			 => 'number',
	'settings'		 => 'jefferson_layout_blog_archive_excerpt',
	'label'			 => esc_attr__( 'Blog Archive Excerpt Length', 'jefferson' ),
	'description'	 => esc_html__( 'Set the number of words for your blog excerpt. Default is 30.', 'jefferson' ),
	'section'		 => 'jefferson_layout_section_blog_archive',
	'default'		 => $jefferson_default_options['jefferson_layout_blog_archive_excerpt'],
	'choices' => array(
		'min'	 => 0,
		'max'	 => 200,
		'step'	 => 1,
	),
) );

// Single Post - Show/Hide Author.
jefferson_Kirki::add_field( 'jefferson_config', array(
	'type'			 => 'select',
	'settings'		 => 'jefferson_layout_single_post_author',
	'label'			 => esc_html__( 'Show the Author?', 'jefferson' ),
	'description'	 => esc_html__( 'Show or hide the author?', 'jefferson' ),
	'section'		 => 'jefferson_layout_section_single_post',
	'default'		 => $jefferson_default_options['jefferson_layout_single_post_author'],
	'priority'		 => 10,
	'transport'		 => 'refresh',
	'choices'		 => array(
		'show'	 => esc_html__( 'Show', 'jefferson' ),
		'hide'	 => esc_html__( 'Hide', 'jefferson' ),
	),
) );

// Footer fields.
jefferson_Kirki::add_field( 'jefferson_config', array(
	'type'			 => 'select',
	'settings'		 => 'jefferson_layout_first_footer',
	'label'			 => esc_html__( 'Show Footer?', 'jefferson' ),
	'description'	 => esc_html__( 'Show or hide the footer?', 'jefferson' ),
	'section'		 => 'jefferson_layout_section_footer',
	'default'		 => $jefferson_default_options['jefferson_layout_first_footer'],
	'priority'		 => 10,
	'transport'		 => 'refresh',
	'choices'		 => array(
		'show'	 => esc_html__( 'Show', 'jefferson' ),
		'hide'	 => esc_html__( 'Hide', 'jefferson' ),
	),
) );

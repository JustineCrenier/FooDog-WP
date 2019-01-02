<?php
/**
 *
 * Homepage theme options
 *
 * @package CreateandCode
 * @subpackage jefferson
 */

// Homepage fields.
$jefferson_default_options = jefferson_get_option_defaults();

// Homepage - Show Hero.
jefferson_Kirki::add_field( 'jefferson_config', array(
	'type'			 => 'select',
	'settings'		 => 'jefferson_homepage_hero',
	'label'			 => esc_html__( 'Show the hero section?', 'jefferson' ),
	'description'	 => esc_html__( 'Show or hide the hero section.', 'jefferson' ),
	'section'		 => 'jefferson_homepage_section_hero',
	'default'		 => $jefferson_default_options['jefferson_homepage_hero'],
	'priority'		 => 10,
	'transport'		 => 'refresh',
	'choices'		 => array(
		'show'	 => esc_html__( 'Show', 'jefferson' ),
		'hide'	 => esc_html__( 'Hide', 'jefferson' ),
	),
) );

// Homepage - Hero Category.
jefferson_Kirki::add_field( 'jefferson_config', array(
	'type'        	 => 'select',
	'settings'    	 => 'jefferson_homepage_hero_category',
	'label'			 => esc_html__( 'Category displayed in the hero feature', 'jefferson' ),
	'description'	 => esc_html__( 'Choose which category to display.', 'jefferson' ),
	'section'     	 => 'jefferson_homepage_section_hero',
	'default'		 => $jefferson_default_options['jefferson_homepage_hero_category'],
	'priority'    	 => 10,
	'transport'		 => 'refresh',
	'multiple'    => 1,
	'choices'     => jefferson_get_terms( array(
		'taxonomy' => 'category',
	) ),
) );

// Homepage - Show Featured Post.
jefferson_Kirki::add_field( 'jefferson_config', array(
	'type'			 => 'select',
	'settings'		 => 'jefferson_featured_post',
	'label'			 => esc_html__( 'Show the Featured Post?', 'jefferson' ),
	'description'	 => esc_html__( 'Show or hide the featured post.', 'jefferson' ),
	'section'		 => 'jefferson_homepage_section_featured_post',
	'default'		 => $jefferson_default_options['jefferson_featured_post'],
	'priority'		 => 10,
	'transport'		 => 'refresh',
	'choices'		 => array(
		'show'	 => esc_html__( 'Show', 'jefferson' ),
		'hide'	 => esc_html__( 'Hide', 'jefferson' ),
	),
) );

// Homepage -  Featured Post ID.
jefferson_Kirki::add_field( 'jefferson_config', array(
	'type'			 => 'text',
	'settings'		 => 'jefferson_featured_post_id',
	'label'			 => esc_attr__( 'Featured Post ID', 'jefferson' ),
	'description'	 => esc_html__( 'Choose the post you would like to display by entering its id.', 'jefferson' ),
	'section'		 => 'jefferson_homepage_section_featured_post',
	'default'		 => $jefferson_default_options['jefferson_featured_post_id']
) );

jefferson_Kirki::add_field( 'jefferson_config', array(
  'settings' => 'jefferson_featured_post_id_help',
  'section'  => 'jefferson_homepage_section_featured_post',
  'type'     => 'custom',
  'default'  => wp_kses( __( '<a target="_blank" href="https://createandcode.freshdesk.com/solution/articles/17000057439-how-do-i-find-a-post-s-id-">How do I find the post id?</a>', 'jefferson' ), array(
    'a' => array(
      'target' => array(),
      'href' => array(),
    ),
  ) ),
) );
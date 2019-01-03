<?php
/**
 *
 * Color theme options
 *
 * @package CreateandCode
 * @subpackage jefferson
 */

// Color fields.
$jefferson_default_options = jefferson_get_option_defaults();

// General colors.
jefferson_Kirki::add_field( 'jefferson_config', array(
	'type'			 => 'color',
	'settings'		 => 'jefferson_color_general_swatch',
	'label'			 => __( 'Primary Swatch Color', 'jefferson' ),
	'description'	 => __( 'Select the primary color of your brand.', 'jefferson' ),
	'section'      => 'jefferson_color_section_general',
	'default'		 => $jefferson_default_options['jefferson_color_general_swatch'],
	'priority'		 => 10,
	'output'		 => array(
		array(
			'element'	 => '
				.ccfw-blog-pagination ul li.active a,
				.blog-menu ul a:hover         
            	',
			'property'	 => 'color',
		),
		array(
			'element'	 => '
            	.post-navigation span.meta-nav,
            	.mc4wp-form input[type="submit"],
            	.content-area input[type="submit"],
            	.content-area input[type="button"],
            	.ccfw-content .widget a.button,
            	.ccfw-progress-bar,
            	.cat-links:before,
            	li.comment.bypostauthor:after
            	',
			'property'	 => 'background-color',
		),
		array(
			'element'	 => '
				.ccfw-blog-pagination ul li.active a
            	',
			'property'	 => 'border-color',
		),
	),
	'transport'		 => 'refresh',
	'js_vars'		 => array(
		array(
			'element'	 => '
			#secondary h4,
			.ccfw-blog-pagination ul li.active a,
			.blog-menu ul a:hover
			
			',
			'property'	 => 'color',
		),
		array(
			'element'	 => '
            	.post-navigation span.meta-nav,
            	.mc4wp-form input[type="submit"],
            	.content-area input[type="submit"],
            	.content-area input[type="button"],
            	.ccfw-content .widget a.button,
            	.ccfw-progress-bar,
            	.cat-links:before,
            	li.comment.bypostauthor:after
				',
			'property'	 => 'background-color',
		),
		array(
			'element'	 => '
				.ccfw-blog-pagination ul li.active a
				',
			'property'	 => 'border-color',
		),
	),
) );

jefferson_Kirki::add_field( 'jefferson_config', array(
	'type'			 => 'color',
	'settings'		 => 'jefferson_color_general_swatch_text',
	'label'			 => esc_html__( 'Text on the primary swatch', 'jefferson' ),
	'description'	 => esc_html__( 'Select the color of text on the primary swatch. (Usually white or black)', 'jefferson' ),
	'section'		 => 'jefferson_color_section_general',
	'default'		 => $jefferson_default_options['jefferson_color_general_swatch_text'],
	'priority'		 => 10,
	'output'		 => array(
		array(
			'element'	 => '
            .content-area input[type="submit"], 
            .content-area input[type="reset"], 
            .content-area input[type="button"]
            ',
			'property'	 => 'color',
		),
	),
	'transport'		 => 'refresh',
	'js_vars'		 => array(
		array(
			'element'	 => '
            .content-area input[type="submit"], 
            .content-area input[type="reset"], 
            .content-area input[type="button"]
            ',
			'function'	 => 'css',
			'property'	 => 'color',
		),
	),
) );

jefferson_Kirki::add_field( 'jefferson_config', array(
	'type'			 => 'color',
	'settings'		 => 'jefferson_color_general_links',
	'label'			 => esc_html__( 'General links', 'jefferson' ),
	'description'	 => esc_html__( 'Select your general links color.', 'jefferson' ),
	'section'		 => 'jefferson_color_section_general',
	'default'		 => $jefferson_default_options['jefferson_color_general_links'],
	'priority'		 => 10,
	'output'		 => array(
		array(
			'element'	 => '
			.content-area article .entry-content p a, 
			.content-area .ccfw-entry-header h2 a:hover,
			.ccfw-post-navigation a:hover,
			.content-area .error-404 li a:hover,
			.ccfw-entry-header h2 a:hover,
			.content-area #jp-relatedposts .jp-relatedposts-items .jp-relatedposts-post .jp-relatedposts-post-title a:hover,
			.widget_recent_entries li a:hover,
			#secondary .widget a:hover',
			'property'	 => 'color',
		),
	),
	'transport'		 => 'refresh',
	'js_vars'		 => array(
		array(
			'element'	 => '
			.content-area article .entry-content a,
			.ccfw-entry-header h2 a:hover, 
			.ccfw-post-navigation a:hover,
			.content-area .error-404 li a:hover,
			.content-area .ccfw-blog-loop-item .ccfw-entry-header h2 a:hover,
			.content-area #jp-relatedposts .jp-relatedposts-items .jp-relatedposts-post .jp-relatedposts-post-title a:hover,
			.widget_recent_entries li a:hover,
			#secondary .widget a:hover',
			'function'	 => 'css',
			'property'	 => 'color',
		),
	),
) );

jefferson_Kirki::add_field( 'jefferson_config', array(
	'type'			 => 'color',
	'settings'		 => 'jefferson_color_general_links_hover',
	'label'			 => esc_html__( 'General link hover', 'jefferson' ),
	'description'	 => esc_html__( 'Select your general link hover color.', 'jefferson' ),
	'section'		 => 'jefferson_color_section_general',
	'default'		 => $jefferson_default_options['jefferson_color_general_links_hover'],
	'priority'		 => 10,
	'output'		 => array(
		array(
			'element'	 => '.content-area article .ccfw-entry-content a:hover, .content-area article .entry-content p a:hover',
			'property'	 => 'color',
		),
	),
	'transport'		 => 'refresh',
	'js_vars'		 => array(
		array(
			'element'	 => '.content-area article .ccfw-entry-content a:hover, .content-area article .entry-content p a:hover',
			'function'	 => 'css',
			'property'	 => 'color',
		),
	),
) );

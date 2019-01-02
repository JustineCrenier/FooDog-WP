<?php
/**
 *
 * Main menu theme options
 *
 * @package CreateandCode
 * @subpackage jefferson Pro
 */

// Main Menu.
$jefferson_default_options = jefferson_get_option_defaults();

// Header background.
jefferson_Kirki::add_field( 'jefferson_config', array(
	'type'			 => 'color',
	'settings'		 => 'jefferson_color_header_background',
	'label'			 => esc_html__( 'Header background', 'jefferson' ),
	'description'	 => esc_html__( 'Select your header background color.', 'jefferson' ),
	'section'		 => 'jefferson_header_section_colors',
	'default'		 => $jefferson_default_options['jefferson_color_header_background'],
	'priority'		 => 10,
	'output'		 => array(
		array(
			'element'	 => '.ccfw-header-main',
			'property'	 => 'background-color',
		),
	),
	'transport'		 => 'postMessage',
	'js_vars'		 => array(
		array(
			'element'	 => '.ccfw-header-main',
			'function'	 => 'css',
			'property'	 => 'background-color',
		),
	),
) );

// Header Title Color.
jefferson_Kirki::add_field( 'jefferson_config', array(
	'type'			 => 'color',
	'settings'		 => 'jefferson_color_header_site_title',
	'label'			 => esc_html__( 'Site title', 'jefferson' ),
	'description'	 => esc_html__( 'Select your site title color.', 'jefferson' ),
	'section'		 => 'jefferson_header_section_colors',
	'default'		 => $jefferson_default_options['jefferson_color_header_site_title'],
	'priority'		 => 10,
	'output'		 => array(
		array(
			'element'	 => '.ccfw-site-title a',
			'property'	 => 'color',
		),
	),
	'transport'		 => 'postMessage',
	'js_vars'		 => array(
		array(
			'element'	 => '.ccfw-site-title a',
			'function'	 => 'css',
			'property'	 => 'color',
		),
	),
) );

// Header Description Color.
jefferson_Kirki::add_field( 'jefferson_config', array(
	'type'			 => 'color',
	'settings'		 => 'jefferson_color_header_site_desc',
	'label'			 => esc_html__( 'Site description', 'jefferson' ),
	'description'	 => esc_html__( 'Select your site description color.', 'jefferson' ),
	'section'		 => 'jefferson_header_section_colors',
	'default'		 => $jefferson_default_options['jefferson_color_header_site_desc'],
	'priority'		 => 10,
	'output'		 => array(
		array(
			'element'	 => '.ccfw-site-description',
			'property'	 => 'color',
		),
	),
	'transport'		 => 'postMessage',
	'js_vars'		 => array(
		array(
			'element'	 => '.ccfw-site-description',
			'function'	 => 'css',
			'property'	 => 'color',
		),
	),
) );

// Header Height.
jefferson_Kirki::add_field( 'jefferson_config', array(
	'type'			 => 'slider',
	'settings'		 => 'jefferson_header_height',
	'label'			 => esc_html__( 'Header Height', 'jefferson' ),
	'description'	 => esc_html__( 'Adjust the header height', 'jefferson' ),
	'section'		 => 'jefferson_header_section_layout',
	'default'		 => 180,
	'priority'		 => 1,
	'choices'		 => array(
		'min'	 => 0,
		'max'	 => 250,
		'step'	 => 1,
	),
	'output'		 => array(
		array(
			'element'	 => '.ccfw-site-logo a',
			'property'	 => 'line-height',
			'units'		 => 'px',
		),
		array(
			'element'	 => '.ccfw-header-main, .ccfw-header-main.style2',
			'property'	 => 'height',
			'units'		 => 'px',
		),
		array(
			'element'	 => '.ccfw-header-details-right img',
			'property'	 => 'max-height',
			'units'		 => 'px',
		),
	),
) );

// Sticky Navigation.
jefferson_Kirki::add_field( 'jefferson_config', array(
	'type'			 => 'select',
	'settings'		 => 'jefferson_sticky_navigation',
	'label'			 => esc_html__( 'Sticky Navigation', 'jefferson' ),
	'description'	 => esc_html__( 'Stick the navigation on scroll', 'jefferson' ),
	'section'		 => 'jefferson_mainmenu_section_layout',
	'default'		 => $jefferson_default_options['jefferson_sticky_navigation'],
	'priority'		 => 10,
	'transport'		 => 'refresh',
	'choices'		 => array(
		'enable'	 => esc_html__( 'Enable', 'jefferson' ),
		'disable'	 => esc_html__( 'Disable', 'jefferson' ),
	),
) );

// Main Navigation Links Color.
jefferson_Kirki::add_field( 'jefferson_config', array(
	'type'			 => 'color',
	'settings'		 => 'jefferson_mainmenu_color',
	'label'			 => esc_html__( 'Main Navigation Links Color', 'jefferson' ),
	'description'	 => esc_html__( 'Select your main menu links color.', 'jefferson' ),
	'section'		 => 'jefferson_mainmenu_section_colors',
	'default'		 => $jefferson_default_options['jefferson_mainmenu_color'],
	'priority'		 => 10,
	'output'		 => array(
		array(
			'element'	 => '
			body .blog-menu > li > a,
			.search-menu > li:before',
			'property'	 => 'color',
		),
	),
	'transport'		 => 'postMessage',
	'js_vars'		 => array(
		array(
			'element'	 => '
			body .blog-menu > li > a,
			.search-menu > li:before',
			'function'	 => 'css',
			'property'	 => 'color',
		),
	),
) );

// Main Navigation Links Hover/Selected Color.
jefferson_Kirki::add_field( 'jefferson_config', array(
	'type'			 => 'color',
	'settings'		 => 'jefferson_mainmenu_color_hover',
	'label'			 => esc_html__( 'Main Menu Links Hover/Selected Color', 'jefferson' ),
	'description'	 => esc_html__( 'Select your main menu links hover/selected color.', 'jefferson' ),
	'section'		 => 'jefferson_mainmenu_section_colors',
	'default'		 => $jefferson_default_options['jefferson_mainmenu_color_hover'],
	'priority'		 => 10,
	'output'		 => array(
		array(
			'element'	 => '
			body .blog-menu > li > a:hover,
			.blog-menu > li.current-menu-item > a,
			.blog-menu > li.current_page_item > a',
			'property'	 => 'color',
		),
	),
	'transport'		 => 'postMessage',
	'js_vars'		 => array(
		array(
			'element'	 => '
			body .blog-menu > li > a:hover,
			.blog-menu > li.current-menu-item > a,
			.blog-menu > li.current_page_item > a',
			'function'	 => 'css',
			'property'	 => 'color',
		),
	),
) );

// Main Navigation Line height.
jefferson_Kirki::add_field( 'jefferson_config', array(
	'type'			 => 'slider',
	'settings'		 => 'jefferson_mainmenu_lineheight',
	'label'			 => esc_html__( 'Navigation Line Height', 'jefferson' ),
	'description'	 => esc_html__( 'Adjust the line height', 'jefferson' ),
	'section'		 => 'jefferson_mainmenu_section_layout',
	'default'		 => 66,
	'priority'		 => 1,
	'choices'		 => array(
		'min'	 => 0,
		'max'	 => 150,
		'step'	 => 1,
	),
	'output'		 => array(
		array(
			'element'	 => '.blog-menu a, .social-menu > li, .search-menu > li, .ccfw-header-nav input.search-field, .single-post .ccfw-header-nav span.entry-title, .ccfw-post-details .ccfw-previous, .ccfw-post-details .ccfw-next',
			'property'	 => 'line-height',
			'units'		 => 'px',
		),
		array(
			'element'	 => '.social-menu > li, .search-menu > li, .ccfw-header-nav input.search-field, 
			body.single-post .ccfw-header-nav',
			'property'	 => 'height',
			'units'		 => 'px',
		),
	),
) );

// Main Navigation Links Color.
jefferson_Kirki::add_field( 'jefferson_config', array(
	'type'			 => 'color',
	'settings'		 => 'jefferson_mainmenu_color',
	'label'			 => esc_html__( 'Main Navigation Links Color', 'jefferson' ),
	'description'	 => esc_html__( 'Select your main menu links color.', 'jefferson' ),
	'section'		 => 'jefferson_mainmenu_section_colors',
	'default'		 => $jefferson_default_options['jefferson_mainmenu_color'],
	'priority'		 => 10,
	'output'		 => array(
		array(
			'element'	 => '
			body .blog-menu > li > a,
			.social-menu > li > a,
			.social-menu > li:before,
			.search-menu > li:before',
			'property'	 => 'color',
		),
	),
	'transport'		 => 'postMessage',
	'js_vars'		 => array(
		array(
			'element'	 => '
			body .blog-menu > li > a,
			.social-menu > li > a,
			.social-menu > li:before,
			.search-menu > li:before',
			'function'	 => 'css',
			'property'	 => 'color',
		),
	),
) );

// Main Navigation Level 1 Menu Font.
jefferson_Kirki::add_field( 'jefferson_config', array(
	'type'		 => 'typography',
	'settings'	 => 'jefferson_mainmenu_level1',
	'label'		 => esc_html__( 'Level 1 Font settings', 'jefferson' ),
	'section'	 => 'jefferson_mainmenu_section_fonts',
	'default'	 => array(
		'font-family'	 => 'Lato',
		'variant'		 => '300',
		'font-size'		 => '15px',
		'letter-spacing' => '0.8px',
		'subsets'		 => array( 'latin-ext' ),
		'text-transform' => 'uppercase',
	),
	'priority'	 => 20,
	'output'	 => array(
		array(
			'element'	 => 'body .blog-menu > li > a, .search-menu, .ccfw-header-nav input.search-field, .mobile-menu a',
			'property'	 => 'font-family',
		),
	),
) );

// Main Navigation Level 2 Menu Font.
jefferson_Kirki::add_field( 'jefferson_config', array(
	'type'		 => 'typography',
	'settings'	 => 'jefferson_mainmenu_level2',
	'label'		 => esc_html__( 'Level 2 Font settings', 'jefferson' ),
	'section'	 => 'jefferson_mainmenu_section_fonts',
	'default'	 => array(
		'font-family'	 => 'Lato',
		'variant'		 => '300',
		'font-size'		 => '13px',
		'color'			 => '#261616',
		'letter-spacing' => '0.8px',
		'subsets'		 => array( 'latin-ext' ),
		'text-transform' => 'uppercase',
	),
	'priority'	 => 20,
	'output'	 => array(
		array(
			'element'	 => '.blog-menu ul a',
			'property'	 => 'font-family',
		),
	),
) );

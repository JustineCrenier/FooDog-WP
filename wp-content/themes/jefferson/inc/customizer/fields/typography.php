<?php
/**
 *
 * Typography theme options
 *
 * @package CreateandCode
 * @subpackage jefferson Pro
 */

// Site title.
jefferson_Kirki::add_field( 'jefferson_config', array(
	'type'		 => 'typography',
	'settings'	 => 'jefferson_typography_sitetitle_fontfamily',
	'label'		 => esc_html__( 'Font settings', 'jefferson' ),
	'section'	 => 'jefferson_typography_section_sitetitle',
	'default'	 => array(
		'font-family'	 => 'Cormorant Garamond',
		'variant'		 => '300',
		'font-size'		 => '52px',
		'letter-spacing' => '0',
		'subsets'		 => array( 'latin-ext' ),
		'color'			 => '#333',
	),
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => '.ccfw-site-title, .single-post .ccfw-header-nav span.entry-title, .ccfw-post-navigation a',
			'property'	 => 'font-family',
		),
	),
) );

// Site tagline.
jefferson_Kirki::add_field( 'jefferson_config', array(
	'type'		 => 'typography',
	'settings'	 => 'jefferson_typography_sitetagline_fontfamily',
	'label'		 => esc_html__( 'Font settings', 'jefferson' ),
	'section'	 => 'jefferson_typography_section_sitetagline',
	'default'	 => array(
		'font-family'	 => 'Lato',
		'variant'		 => '300',
		'font-size'		 => '13px',
		'line-height'	 => '1.6',
		'letter-spacing' => '1.2px',
		'subsets'		 => array( 'latin-ext' ),
		'color'			 => '#999',
		'text-transform' => 'uppercase',
	),
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => '.ccfw-header-main .ccfw-site-description, .site-info',
			'property'	 => 'font-family',
		),
	),
) );

// Main body fields.
jefferson_Kirki::add_field( 'jefferson_config', array(
	'type'		 => 'typography',
	'settings'	 => 'jefferson_typography_mainbody_fontfamily',
	'label'		 => esc_html__( 'Font settings', 'jefferson' ),
	'section'	 => 'jefferson_typography_section_mainbody',
	'default'	 => array(
		'font-family'	 => 'Lato',
		'variant'		 => '300',
		'font-size'		 => '17px',
		'line-height'	 => '1.6',
		'letter-spacing' => '0',
		'subsets'		 => array( 'latin-ext' ),
		'color'			 => '#666',
	),
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => 'body, input, select, textarea, button, .content-area .ccfw-blog-loop-item p, .content-area .sd-content ul li a.sd-button, .content-area .sd-social-icon-text .sd-content ul li a.sd-button, .author-info h6, .comment-meta',
			'property'	 => 'font-family',
		),
	),
) );

// Paragraph.
jefferson_Kirki::add_field( 'jefferson_config', array(
	'type'			 => 'typography',
	'settings'		 => 'jefferson_typography_p_fontfamily',
	'label'			 => esc_html__( 'Font Settings', 'jefferson' ),
	'description'	 => esc_html__( 'Select which font you would like to use', 'jefferson' ),
	'section'		 => 'jefferson_typography_section_p',
	'default'		 => array(
		'font-family'	 => 'PT Serif',
		'font-weight'	 => 'normal',
		'font-size'		 => '17px',
		'line-height'	 => '1.65',
		'letter-spacing' => '0',
		'subsets'		 => array( 'latin-ext' ),
		'color'			 => '#454545',
		'text-transform' => 'none',
	),
	'priority'		 => 20,
	'output'		 => array(
		array(
			'element'	 => '.content-area article p, .content-area article li, .comment-form, .ccfw-author-main p.ccfw-author-description',
			'property'	 => 'font-family',
		),
	),
) );

// Page title.
jefferson_Kirki::add_field( 'jefferson_config', array(
	'type'			 => 'typography',
	'settings'		 => 'jefferson_typography_page_title_fontfamily',
	'label'			 => esc_html__( 'Font Settings', 'jefferson' ),
	'description'	 => esc_html__( 'Select which font you would like to use', 'jefferson' ),
	'section'		 => 'jefferson_typography_page_title_fontfamily',
	'default'		 => array(
		'font-family'	 => 'Lato',
		'font-weight'	 => '300',
		'font-size'		 => '34px',
		'line-height'	 => '1.25',
		'letter-spacing' => '1.2px',
		'subsets'		 => array( 'latin-ext' ),
		'color'			 => '#111',
		'text-transform' => 'uppercase',
	),
	'priority'		 => 20,
	'output'		 => array(
		array(
			'element'	 => '#ccfw-page-wrap h1.page-title, .content-area h2.comments-title, .content-area h3.comment-reply-title, h2.heading, .content-area #jp-relatedposts h3.jp-relatedposts-headline',
			'property'	 => 'font-family',
		),
	),
) );


// h1.
jefferson_Kirki::add_field( 'jefferson_config', array(
	'type'			 => 'typography',
	'settings'		 => 'jefferson_typography_h1_fontfamily',
	'label'			 => esc_html__( 'Font Settings', 'jefferson' ),
	'description'	 => esc_html__( 'Select which font you would like to use', 'jefferson' ),
	'section'		 => 'jefferson_typography_section_headings_h1',
	'default'		 => array(
		'font-family'	 => 'Cormorant Garamond',
		'font-weight'	 => '300',
		'font-size'		 => '44px',
		'line-height'	 => '1.3',
		'letter-spacing' => '-0.1px',
		'subsets'		 => array( 'latin-ext' ),
		'color'			 => '#111',
		'text-transform' => 'none',
	),
	'priority'		 => 20,
	'output'		 => array(
		array(
			'element'	 => '.content-area h1, .single-post .ccfw-content h1',
			'property'	 => 'font-family',
		),
	),
) );

// h2.
jefferson_Kirki::add_field( 'jefferson_config', array(
	'type'			 => 'typography',
	'settings'		 => 'jefferson_typography_h2_fontfamily',
	'label'			 => esc_html__( 'Font Settings', 'jefferson' ),
	'description'	 => esc_html__( 'Select which font you would like to use', 'jefferson' ),
	'section'		 => 'jefferson_typography_section_headings_h2',
	'default'		 => array(
		'font-family'	 => 'Cormorant Garamond',
		'variant'		 => '300',
		'font-size'		 => '36px',
		'line-height'	 => '1.3',
		'letter-spacing' => '-0.1px',
		'subsets'		 => array( 'latin-ext' ),
		'color'			 => '#333333',
		'text-transform' => 'none',
	),
	'priority'		 => 30,
	'output'		 => array(
		array(
			'element'	 => 'h2',
			'property'	 => 'font-family',
		),
	),
) );


// h3.
jefferson_Kirki::add_field( 'jefferson_config', array(
	'type'			 => 'typography',
	'settings'		 => 'jefferson_typography_h3_fontfamily',
	'label'			 => esc_html__( 'Font Settings', 'jefferson' ),
	'description'	 => esc_html__( 'Select which font you would like to use', 'jefferson' ),
	'section'		 => 'jefferson_typography_section_headings_h3',
	'default'		 => array(
		'font-family'	 => 'Cormorant Garamond',
		'variant'		 => '400',
		'font-size'		 => '32px',
		'line-height'	 => '1.4',
		'letter-spacing' => '-0.2px',
		'subsets'		 => array( 'latin-ext' ),
		'color'			 => '#333333',
		'text-transform' => 'none',
	),
	'priority'		 => 40,
	'output'		 => array(
		array(
			'element'	 => 'h3',
			'property'	 => 'font-family',
		),
	),
) );


// h4.
jefferson_Kirki::add_field( 'jefferson_config', array(
	'type'			 => 'typography',
	'settings'		 => 'jefferson_typography_h4_fontfamily',
	'label'			 => esc_html__( 'Font Settings', 'jefferson' ),
	'description'	 => esc_html__( 'Select which font you would like to use', 'jefferson' ),
	'section'		 => 'jefferson_typography_section_headings_h4',
	'default'		 => array(
		'font-family'	 => 'Cormorant Garamond',
		'variant'		 => '300',
		'font-size'		 => '26px',
		'line-height'	 => '1.5',
		'letter-spacing' => '0px',
		'subsets'		 => array( 'latin-ext' ),
		'color'			 => '#111',
		'text-transform' => 'none',
	),
	'priority'		 => 50,
	'output'		 => array(
		array(
			'element'	 => 'h4, .content-area #jp-relatedposts .jp-relatedposts-items-visual h4.jp-relatedposts-post-title',
			'property'	 => 'font-family',
		),
	),
) );


// h5.
jefferson_Kirki::add_field( 'jefferson_config', array(
	'type'			 => 'typography',
	'settings'		 => 'jefferson_typography_h5_fontfamily',
	'label'			 => esc_html__( 'Font Settings', 'jefferson' ),
	'description'	 => esc_html__( 'Select which font you would like to use', 'jefferson' ),
	'section'		 => 'jefferson_typography_section_headings_h5',
	'default'		 => array(
		'font-family'	 => 'Cormorant Garamond',
		'variant'		 => '300',
		'font-size'		 => '22px',
		'line-height'	 => '1.5',
		'letter-spacing' => '0',
		'subsets'		 => array( 'latin-ext' ),
		'color'			 => '#333333',
		'text-transform' => 'none',
	),
	'priority'		 => 60,
	'output'		 => array(
		array(
			'element'	 => 'h5',
			'property'	 => 'font-family',
		),
	),
) );


// h6.
jefferson_Kirki::add_field( 'jefferson_config', array(
	'type'			 => 'typography',
	'settings'		 => 'jefferson_typography_h6_fontfamily',
	'label'			 => esc_html__( 'Font Settings', 'jefferson' ),
	'description'	 => esc_html__( 'Select which font you would like to use', 'jefferson' ),
	'section'		 => 'jefferson_typography_section_headings_h6',
	'default'		 => array(
		'font-family'	 => 'Cormorant Garamond',
		'variant'		 => '300',
		'font-size'		 => '18px',
		'line-height'	 => '1.5',
		'letter-spacing' => '0',
		'subsets'		 => array( 'latin-ext' ),
		'color'			 => '#333333',
		'text-transform' => 'none',
	),
	'priority'		 => 70,
	'output'		 => array(
		array(
			'element'	 => 'h6',
			'property'	 => 'font-family',
		),
	),
) );

// Blockquotes.
jefferson_Kirki::add_field( 'jefferson_config', array(
	'type'			 => 'typography',
	'settings'		 => 'jefferson_typography_blockquote_fontfamily',
	'label'			 => esc_html__( 'Font Settings', 'jefferson' ),
	'description'	 => esc_html__( 'Select which font you would like to use', 'jefferson' ),
	'section'		 => 'jefferson_typography_section_headings_blockquote',
	'default'		 => array(
		'font-family'	 => 'Cormorant Garamond',
		'variant'		 => '300italic',
		'font-size'		 => '30px',
		'line-height'	 => '1.5',
		'letter-spacing' => '0',
		'subsets'		 => array( 'latin-ext' ),
		'color'			 => '#333333',
		'text-transform' => 'none',
	),
	'priority'		 => 70,
	'output'		 => array(
		array(
			'element'	 => '.content-area blockquote p',
			'property'	 => 'font-family',
		),
	),
) );

// Widget Titles.
jefferson_Kirki::add_field( 'jefferson_config', array(
	'type'			 => 'typography',
	'settings'		 => 'jefferson_typography_widget_title_fontfamily',
	'label'			 => esc_html__( 'Font Settings', 'jefferson' ),
	'description'	 => esc_html__( 'Select which font you would like to use', 'jefferson' ),
	'section'		 => 'jefferson_typography_section_headings_widget_title',
	'default'		 => array(
		'font-family'	 => 'Lato',
		'variant'		 => '300',
		'font-size'		 => '13px',
		'line-height'	 => '1.5',
		'letter-spacing' => '1.2px',
		'subsets'		 => array( 'latin-ext' ),
		'text-transform' => 'uppercase',
	),
	'priority'		 => 70,
	'output'		 => array(
		array(
			'element'	 => '.widget-title, .ccfw-first-footer-wrapper .widget-title',
			'property'	 => 'font-family',
		),
	),
) );

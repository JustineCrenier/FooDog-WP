<?php
/**
 * Jefferson functions and definitions.
 *
 * @package CreateandCode
 * @subpackage jefferson
 */

/**
 * Assign the theme version to a var.
 */
$theme				 = wp_get_theme( 'jefferson' );
$jefferson_version	 = $theme['Version'];

/**
 * Global paths.
 */
define( 'CC_CORE', get_template_directory() . '/inc/core' );

/**
 * Load ptyles.
 */
function jefferson_load_styles() {
	global $jefferson_live_preview;

	wp_register_style( 'jefferson-style', get_stylesheet_uri() );
	wp_enqueue_style( 'jefferson-style' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome/font-awesome.min.css' );
	wp_enqueue_style( 'ionicons', get_template_directory_uri() . '/css/ionicons.css' );
	wp_enqueue_style( 'jefferson-animate', get_template_directory_uri() . '/css/animate.css' );
	wp_enqueue_style( 'jefferson-responsive', get_template_directory_uri() . '/css/responsive.css' );
}

add_action( 'wp_enqueue_scripts', 'jefferson_load_styles' );

/**
 * TGM Plugin Activation.
 */
require_once( CC_CORE . '/functions/class-tgm-plugin-activation.php' );
add_action( 'tgmpa_register', 'jefferson_register_required_plugins' );

/**
 * Recommended plugins.
 *
 * @package jefferson
 */
function jefferson_register_required_plugins() {
	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		array(
			'name'		 => esc_html__( 'Kirki', 'jefferson' ), // The plugin name
			'slug'		 => 'kirki', // The plugin slug (typically the folder name)
			'required'	 => false, // If false, the plugin is only 'recommended' instead of required.
		),
	);

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'domain'		 => 'jefferson', // Text domain - likely want to be the same as your theme.
		'default_path'	 => '', // Default absolute path to pre-packaged plugins
		'parent_slug'	 => 'themes.php', // Default parent menu slug
		'menu'			 => 'tgmpa-install-plugins', // Menu slug
		'has_notices'	 => true, // Show admin notices or not
		'is_automatic'	 => false, // Automatically activate plugins after installation or not
		'message'		 => '', // Message to output right before the plugins table.
		'strings'		 => array(
			'page_title'						 => esc_html__( 'Install Required Plugins', 'jefferson' ),
			'menu_title'						 => esc_html__( 'Install Plugins', 'jefferson' ),
			'installing'						 => esc_html__( 'Installing Plugin: %s', 'jefferson' ), // %1$s = plugin name.
			'oops'								 => esc_html__( 'Something went wrong with the plugin API.', 'jefferson' ),
			'notice_can_install_required'		 => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'jefferson' ), // %1$s = plugin name(s).
			'notice_can_install_recommended'	 => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'jefferson' ), // %1$s = plugin name(s).
			'notice_cannot_install'				 => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'jefferson' ), // %1$s = plugin name(s).
			'notice_can_activate_required'		 => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'jefferson' ), // %1$s = plugin name(s).
			'notice_can_activate_recommended'	 => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'jefferson' ), // %1$s = plugin name(s).
			'notice_cannot_activate'			 => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'jefferson' ), // %1$s = plugin name(s).
			'notice_ask_to_update'				 => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'jefferson' ), // %1$s = plugin name(s).
			'notice_cannot_update'				 => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'jefferson' ), // %1$s = plugin name(s).
			'install_link'						 => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'jefferson' ),
			'activate_link'						 => _n_noop( 'Activate installed plugin', 'Activate installed plugins', 'jefferson' ),
			'return'							 => esc_html__( 'Return to Required Plugins Installer', 'jefferson' ),
			'plugin_activated'					 => esc_html__( 'Plugin activated successfully.', 'jefferson' ),
			'complete'							 => esc_html__( 'All plugins installed and activated successfully. %s', 'jefferson' ), // %1$s = dashboard link.
			'nag_type'							 => 'updated', // Determines admin notice type - can only be 'updated' or 'error'.
		),
	);
	tgmpa( $plugins, $config );
}

if ( ! function_exists( 'jefferson_setup' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function jefferson_setup() {
		/* Help */
		if ( is_admin() ) {
			// Welcome page.
			require_once( get_template_directory() . '/inc/setup/help.php' );
		}

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on jefferson, use a find and replace
		 * to change 'jefferson' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'jefferson', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Custom Thumbnails.
		if ( function_exists( 'add_theme_support' ) ) {
			add_theme_support( 'post-thumbnails' );
			add_image_size( 'ccfw-single-post', 1200, 700, true );
			add_image_size( 'ccfw-featured-post', 1678, 500, true );
			add_image_size( 'ccfw-feature-medium', 390, 255, true );
			add_image_size( 'ccfw-hero-main', 600, 393, true );
			add_image_size( 'ccfw-hero-mini', 285, 186, true );
		}

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary'	 => esc_html__( 'Main Menu', 'jefferson' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Adds support for selective refresh of widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Editor style.
		add_editor_style( 'css/editor-style.css' );

		// Add theme support for Custom Logo.
		add_theme_support( 'custom-logo', array(
			'width'			 => 400,
			'height'		 => 56,
			'flex-width'	 => true,
			'flex-height'	 => true,337
		) );

		require_once( trailingslashit( get_template_directory() ) . 'trt-customize-pro/inc/class-customize.php' );
	}

endif; // Jefferson_setup.
add_action( 'after_setup_theme', 'jefferson_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function jefferson_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'jefferson_content_width', 805 );
}

add_action( 'after_setup_theme', 'jefferson_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function jefferson_widgets_init() {
	register_sidebar( array(
		'name'			 => esc_html__( 'Sidebar', 'jefferson' ),
		'id'			 => 'sidebar-1',
		'description'	 => __( 'Main sidebar.', 'jefferson' ),
		'before_widget'	 => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	 => '</aside>',
		'before_title'	 => '<h4 class="widget-title"><span>',
		'after_title'	 => '</span></h4>',
	) );

	register_sidebar( array(
		'name'			 => __( 'Pages Sidebar', 'jefferson' ),
		'id'			 => 'sidebar-pages',
		'description'	 => __( 'This widget area appears on pages only.', 'jefferson' ),
		'before_widget'	 => '<div id="%1$s" class="widget %2$s">',
		'after_widget'	 => '</div>',
		'before_title'	 => '<h4 class="widget-title"><span>',
		'after_title'	 => '</span></h4>',
	) );

	register_sidebar( array(
		'name'			 => __( 'Footer Column 1', 'jefferson' ),
		'id'			 => 'footer-one',
		'description'	 => __( 'The first column.', 'jefferson' ),
		'before_widget'	 => '<div id="%1$s" class="widget %2$s">',
		'after_widget'	 => '</div>',
		'before_title'	 => '<h4 class="widget-title">',
		'after_title'	 => '</h4>',
	) );

	register_sidebar( array(
		'name'			 => __( 'Footer Column 2', 'jefferson' ),
		'id'			 => 'footer-two',
		'description'	 => __( 'The second column.', 'jefferson' ),
		'before_widget'	 => '<div id="%1$s" class="widget %2$s">',
		'after_widget'	 => '</div>',
		'before_title'	 => '<h4 class="widget-title">',
		'after_title'	 => '</h4>',
	) );

	register_sidebar( array(
		'name'			 => __( 'Footer Column 3', 'jefferson' ),
		'id'			 => 'footer-three',
		'description'	 => __( 'The third column.', 'jefferson' ),
		'before_widget'	 => '<div id="%1$s" class="widget %2$s">',
		'after_widget'	 => '</div>',
		'before_title'	 => '<h4 class="widget-title">',
		'after_title'	 => '</h4>',
	) );
}

add_action( 'widgets_init', 'jefferson_widgets_init' );

require_once( CC_CORE . '/functions/class-tgm-plugin-activation.php' );

/**
 * Enqueue scripts and styles.
 */
function jefferson_scripts() {

	wp_enqueue_script( 'ccfw-sticky', get_template_directory_uri() . '/js/sticky-kit.js', array(), '20130133', true );
	wp_enqueue_script( 'ccfw-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20161205', true );
	wp_enqueue_script( 'ccfw-main', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), '20161205', true );
	wp_enqueue_script( 'ccfw-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular( 'post' ) ) {
		wp_enqueue_script( 'ccfw-single-post', get_template_directory_uri() . '/js/single-post.js', array(), '20130119', true );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'jefferson_scripts' );

/**
 * Custom Logo Markup.
 */
add_filter( 'get_custom_logo', 'jefferson_custom_logo' );

/**
 * Custom Logo function.
 */
function jefferson_custom_logo() {
	$custom_logo_id	 = get_theme_mod( 'custom_logo' );
	$html			 = sprintf( '<a href="%1$s" class="custom-logo-link" rel="home" itemprop="url"><span class="helper"></span>%2$s</a>', esc_url( home_url( '/' ) ), wp_get_attachment_image( $custom_logo_id, 'full', false, array(
		'class' => 'custom-logo',
				)
	));
	return $html;
}

/**
 * Jetpack Infinite Scroll Support.
 */
function jefferson_infinite_scroll_init() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render' => 'jefferson_infinite_scroll_render',
		'footer_widgets' => true,
		'footer' => 'footer',
	) );
}
add_action( 'init', 'jefferson_infinite_scroll_init' );

function jefferson_infinite_scroll_render() {
	get_template_part( 'template-parts/blog-list' );
}

/**
 * Jetpack Sharing and Likes - placed in a better location within content-single.php.
 */
function jefferson_remove_share() {
	remove_filter( 'the_content', 'sharing_display', 19 );
	remove_filter( 'the_excerpt', 'sharing_display', 19 );
	if ( class_exists( 'Jetpack_Likes' ) ) {
		remove_filter( 'the_content', array( Jetpack_Likes::init(), 'post_likes' ), 30, 1 );
	}
}
add_action( 'loop_start', 'jefferson_remove_share' );

/**
 * Removes Jetpack Related standard position.
 */
function jefferson_jetpackme_remove_rp() {
	if ( class_exists( 'Jetpack_RelatedPosts' ) ) {
		$jprp = Jetpack_RelatedPosts::init();
		$callback = array( $jprp, 'filter_add_target_to_dom' );
		remove_filter( 'the_content', $callback, 40 );
	}
}
add_filter( 'wp', 'jefferson_jetpackme_remove_rp', 20 );

/**
 * Jetpack Related should only appear on a single post.
 */
function jefferson_no_related_posts( $options ) {
	if ( ! is_singular( 'post' ) ) {
		$options['enabled'] = false;
	}
	return $options;
}

add_filter( 'jetpack_relatedposts_filter_options', 'jefferson_no_related_posts' );

/**
 * Removes brackets around categories and archive count, and wraps the number in a span tag.
 */
function jefferson_categories_postcount_filter( $variable ) {
	$variable = str_replace( '(', '<span class="post_count"> ', $variable );
	$variable = str_replace( ')', ' </span>', $variable );
	return $variable;
}
add_filter( 'wp_list_categories','jefferson_categories_postcount_filter' );

/**
 * Add wrapper around post_count
 */
function jefferson_archive_postcount_filter( $variable ) {
	$variable = str_replace( '(', '<span class="post_count"> ', $variable );
	$variable = str_replace( ')', ' </span>', $variable );
	return $variable;
}
add_filter( 'get_archives_link', 'jefferson_archive_postcount_filter' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function jefferson_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
add_action( 'wp_head', 'jefferson_pingback_header' );

/**
 * Load Globals.
 */
require_once( CC_CORE . '/menus/wp_bootstrap_navwalker.php' );

/**
 * Load build hooks.
 */
require get_template_directory() . '/inc/structure/hooks.php';
require get_template_directory() . '/inc/structure/header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Recommend the Kirki plugin.
 */
require get_template_directory() . '/inc/include-kirki.php';

/**
 * Load the Kirki Fallback class.
 */
require get_template_directory() . '/inc/kirki-fallback.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

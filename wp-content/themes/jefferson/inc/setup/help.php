<?php

/**
 * Theme onboarding and help.
 *
 * @package CreateandCode
 * @subpackage jefferson
 */
class jefferson_Help {

	/**
	 * Constructor
	 * Sets up the welcome screen
	 */
	public function __construct() {

		add_action( 'admin_menu', array( $this, 'jefferson_help_register_menu' ) );
		add_action( 'load-themes.php', array( $this, 'jefferson_help_activation_admin_init' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'jefferson_help_assets' ) );

		add_action( 'jefferson_help', array( $this, 'jefferson_help_intro' ), 10 );
	}

	// End constructor.
	/**
	 * Redirect to Onboarding page upon theme switch/activation
	 */
	public function jefferson_help_activation_admin_init() {
		global $pagenow;

		if ( is_admin() && 'themes.php' === $pagenow && isset( $_GET['activated'] ) ) { // input var okay.
			add_action( 'admin_notices', array( $this, 'jefferson_welcome_admin_notice' ), 99 );
		}
	}

	/**
	 * Display an admin notice linking to the welcome screen
	 *
	 * @since 1.0.3
	 */
	public function jefferson_welcome_admin_notice() {
		?>
		<div class="updated notice is-dismissible">
			<p><?php echo sprintf( esc_html__( 'Thanks for choosing Jefferson! You can read hints and tips on how get the most out of your new theme in the %1$sHelp Centre%2$s.', 'jefferson' ), '<a href="' . esc_url( admin_url( 'themes.php?page=ccfw-help' ) ) . '">', '</a>' ); ?></p>
			<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=ccfw-help' ) ); ?>" class="button" style="text-decoration: none;"><?php esc_html_e( 'Get started with Jefferson', 'jefferson' ); ?></a></p>
		</div>
		<?php
	}

	// Help assets.
	public function jefferson_help_assets( $hook_suffix ) {
		global $jefferson_version;

		if ( 'appearance_page_ccfw-help' === $hook_suffix ) {
			wp_enqueue_style( 'ccfw-help', get_template_directory_uri() . '/inc/setup/help.css', $jefferson_version );
			wp_enqueue_style( 'thickbox' );
			wp_enqueue_script( 'thickbox' );
			wp_enqueue_script( 'ccfw-help', get_template_directory_uri() . '/inc/setup/help.js', array( 'jquery' ), '1.0.0', true );
		}
	}

	// Quick Start menu.
	public function jefferson_help_register_menu() {
		add_theme_page(
		__( 'Jefferson Help', 'jefferson' ), __( 'Jefferson Help', 'jefferson' ), 'activate_plugins', 'ccfw-help', array( $this, 'jefferson_help_screen' ) );
	}

	/**
	 * The welcome screen
	 *
	 * @since 1.0.0
	 */
	public function jefferson_help_screen() {
		?>
		<div class="ccfw-help container">

			<h1 class="ccfw-help-title"><?php esc_html_e( 'Jefferson Help Centre', 'jefferson' ); ?></h1>
			<h2 class="ccfw-help-desc"><?php esc_html_e( 'Everything you need to know to get the most out of Jefferson.', 'jefferson' ); ?></h2>
			<ul class="ccfw-nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#intro" aria-controls="getting_started" role="tab" data-toggle="tab"><?php esc_html_e( 'Getting Started', 'jefferson' ); ?></a></li>
			</ul>

			<div class="ccfw-tab-content">
		<?php
		/**
		 * @hooked jefferson_welcome_intro - 10
		 */
		do_action( 'jefferson_help' );
		?>


			</div>
		</div>
		<?php
	}

	public function jefferson_help_intro() {
		require_once( get_template_directory() . '/inc/setup/sections/intro.php' );
	}

}

$GLOBALS['jefferson_help'] = new jefferson_Help();

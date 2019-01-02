<?php
/**
 * Getting started template
 *
 * @package CreateandCode
 * @subpackage jefferson
 */

$customizer_url = admin_url() . 'customize.php';
?>

<div id="intro" class="ccfw-tab-pane active">

	<div class="primary-left">

	<div class="ccfw-tab-pane-center">

		<h1 class="ccfw-welcome-title"><?php esc_html_e( 'Welcome to Jefferson!', 'jefferson' ); ?></h1>

		<h2>
		<?php
		$theme_data = wp_get_theme();
		echo $theme_data->get( 'Description' );
		?>
			
		</h2>

		<hr />

		<h2 class="larger"><?php esc_html_e( 'Jefferson Theme Documentation', 'jefferson' ); ?></h2>
		<p><?php esc_html_e( 'We provide lots of theme documentation articles including a detailed installation and setup guide on our website. A demo data file is also provided to get you up and running quickly.', 'jefferson' ); ?></p>
		<p><a href="<?php echo esc_url( 'https://createandcode.com/jefferson-documentation' ); ?>" class="button button-primary"><?php esc_html_e( 'View Theme Documentation', 'jefferson' ); ?></a></p>

		<hr />

		<h2 class="larger"><?php esc_html_e( 'Theme Options', 'jefferson' ); ?></h2>
		<p><?php esc_html_e( 'The Jefferson Theme Customizer enables you to customize many elements of the theme directly without any coding skills. This includes options such as uploading your logo, changing the primary color, and much more.', 'jefferson' ); ?></p>
		<ul>
		<li><?php esc_html_e( 'To access the Customizer, go to', 'jefferson' ); ?> <strong><?php esc_html_e( 'Appearance &#8594; Customize', 'jefferson' ); ?></strong> <?php esc_html_e( 'in the WordPress admin menu.', 'jefferson' ); ?></li>
		<li><?php esc_html_e( 'When you are finished making changes, click', 'jefferson' ); ?> <strong><?php esc_html_e( 'Save & Publish', 'jefferson' ); ?></strong> <?php esc_html_e( 'to save the settings. Check out your site to confirm your changes.', 'jefferson' ); ?></li>
		</ul>

		<p><a href="<?php echo esc_url( $customizer_url ); ?>" class="button button-primary"><?php esc_html_e( 'Launch the Customizer', 'jefferson' ); ?></a></p>

		<hr/>

		<h2 class="larger"><?php esc_html_e( 'Image Sizes', 'jefferson' ); ?></h2>
		<p><?php esc_html_e( 'If you are migrating to Jefferson from another theme you may wish to resize your images first so that they fit better within the new theme. To do this, install and run the Regenerate Thumbnails plugin.', 'jefferson' ); ?> <a target="_blank" href="<?php echo esc_url( 'https://wordpress.org/plugins/regenerate-thumbnails/' ); ?>"><?php esc_html_e( 'Get the plugin here', 'jefferson' ); ?></a></p>
		<ul>
		<li><?php esc_html_e( 'Once the plugin has been installed, go to', 'jefferson' ); ?> <strong><?php esc_html_e( 'Tools &#8594; Regenerate Thumbnails', 'jefferson' ); ?></strong> <?php esc_html_e( 'to redo the sizes of any images already uploaded.', 'jefferson' ); ?></li>
		</ul>

	</div>

	</div><!--/primary-left -->

	<div class="primary-right">

	<div class="ccfw-review">
		<h2><?php esc_html_e( 'Join our Facebook group!', 'jefferson' ); ?></h2>
		<p><?php esc_html_e( 'Get tips, tricks and support from the Create & Code Community. We would also love to see what you have created with our WordPress themes. Share your work with the community!', 'jefferson' ); ?></p>

		<a class="button-primary" href="https://www.facebook.com/groups/1974135042612016/"><?php esc_html_e( 'Join now', 'jefferson' ); ?></a>
		<i class="dashicons dashicons-groups"></i>
	</div>

	</div><!--/primary-right -->

	<div class="ccfw-clear"></div>

</div>

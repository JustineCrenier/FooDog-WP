<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package CreateandCode
 * @subpackage jefferson
 */

$jefferson_layout_first_footer			 = '';
$jefferson_layout_first_footer			 = jefferson_get_option( 'jefferson_layout_first_footer' );
?>

</div><!-- /#ccfw-page-wrap -->

	<footer class="ccfw-footer-container widget-area">
	<?php if ( 'show' === $jefferson_layout_first_footer ) { ?>
		<div class="ccfw-first-footer-wrapper">
			<div class="container">
				<div class="row">					
					<div class="footer-one"><?php dynamic_sidebar( 'footer-one' ); ?></div>
					<div class="footer-two"><?php dynamic_sidebar( 'footer-two' ); ?></div>
					<div class="footer-three"><?php dynamic_sidebar( 'footer-three' ); ?></div>
				</div>
			</div>
		</div>
	<?php } ?>
	<!-- /first footer -->
	</footer>

	</div><!-- /#wrapper -->

	<div class="ccfw-second-footer-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="ccfw-footer-msg">
					<div class="site-info">
						<span><?php printf( __( '%2$s Theme by %1$s.', 'jefferson' ), 'Create and Code', '<a href="https://createandcode.com/wordpress-themes/jefferson">Jefferson</a>' ); ?></span>
					</div><!-- /site-info -->					
					</div>
				</div>
			</div>
		</div>
	</div>

	<a href="#" id="ccfw-back-to-top" title="<?php esc_html_e( 'Back to top', 'jefferson' ); ?>"><i class="fa fa-angle-up"></i></a>

	<?php wp_footer(); ?>

</body>
</html>
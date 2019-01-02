<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package CreateandCode
 * @subpackage jefferson
 */
$jefferson_sticky_navigation	 = '';
$jefferson_sticky_navigation	 = jefferson_get_option( 'jefferson_sticky_navigation' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php wp_head(); ?>	

		<?php if ( 'enable' === $jefferson_sticky_navigation ) {

			$header_nav_js = '';
			$header_nav_js .= "
				// Sticky navigation on scroll.
		        ( function ( $ ) {
		            'use strict';
		            $( document ).ready( function () {
		                if ( $( window ).width() > 1024 ) {
		                    $( '.ccfw-header-nav' ).stick_in_parent( {
		                        parent: 'body',
		                    } );
		                }
		            } );
		        }( jQuery ) );
			";

			wp_add_inline_script( 'ccfw-main', $header_nav_js );
} ?>


	</head>
	<body <?php body_class(); ?>>
		<div id="wrapper">	
			<header id="ccfw-header-wrap">

				<div class="ccfw-header-main style2">
					<div class="container">
						<div class="row">
							<div class="col-sm-12 col-md-12 col-lg-12">
								<?php do_action( 'jefferson_header' ); ?>              
							</div>
						</div>
					</div>
				</div>

				<div class="ccfw-header-nav ccfw-below-header">
					<?php if ( is_singular( 'post' ) ) { ?>

						<div class="ccfw-progress-bar"></div>

						<div class="ccfw-post-details">
							<?php jefferson_post_navigation_prev(); ?>
							<?php jefferson_post_navigation_next(); ?>
							<?php the_title( '<span class="entry-title">', '</span>' ); ?>
						</div>

					<?php } ?>
					<?php do_action( 'jefferson_header_navigation' ); ?>
				</div>

				<div class="ccfw-header-before-content">
					<div class="container">
						<div class="row">
							<div class="col-sm-12 col-md-12 col-lg-12">
								<?php do_action( 'jefferson_header_before_content' ); ?>
							</div>
						</div>
					</div>
				</div>

			</header>

			<div id="ccfw-page-wrap" class="hfeed site">

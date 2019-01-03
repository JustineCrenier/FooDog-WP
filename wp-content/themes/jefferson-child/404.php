<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package CreateandCode
 * @subpackage jefferson
 */

get_header();
?>

<header class="entry-header">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<h1 class="page-title"><span><?php esc_html_e( 'That page cannot be found', 'jefferson' ); ?></span></h1>
			</div>
		</div>
	</div>
</header><!-- .entry-header -->

<div class="container">
	<div class="row">
		<div class="col-lg-8 col-md-8">
			<div id="primary" class="content-area">
				<main id="main" class="site-main">
					<section class="error-404 not-found">
						<div class="page-content">
							<p><?php esc_html_e( 'It seems that the page you were looking for cannot be found. 
							Perhaps you might want to take a look at our most recent articles below.', 'jefferson' ); ?></p>

							<ul>
								<?php wp_get_archives( array( 'type' => 'postbypost', 'limit' => 5, 'format' => 'html' ) ); ?>
							</ul>
							
						</div><!-- .page-content -->
					</section><!-- .error-404 -->
				</main><!-- #main -->
			</div><!-- #primary -->
		</div>
	</div>
</div>

<?php get_footer(); ?>

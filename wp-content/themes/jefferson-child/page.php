<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package CreateandCode
 * @subpackage jefferson
 */

get_header();
?>

<div class="ccfw-content">

	<header class="entry-header">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<?php the_title( '<h1 class="page-title"><span>', '</span></h1>' ); ?>
				</div>
			</div>
		</div>
	</header><!-- .entry-header -->

	<div class="container">
		<div class="row">

			<div class="col-lg-9 col-md-9 left-content">
				<div id="primary" class="content-area">
					<main id="main" class="site-main">

						<?php while ( have_posts() ) : the_post(); ?>

							<?php get_template_part( 'template-parts/content', 'page' ); ?>

							<?php
							// If comments are open or we have at least one comment, load up the comment template
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;
							?>

						<?php endwhile; // end of the loop.  ?>

					</main>
				</div>
			</div>
			<div class="col-lg-3 col-md-3">
				<div id="secondary" class="ccfw-default-sidebar widget-area" role="complementary">
					<?php dynamic_sidebar( 'sidebar-pages' ); ?>
				</div><!-- #secondary -->
			</div>

		</div>
	</div>
</div>

<div id="clear"></div>

<?php get_footer(); ?>
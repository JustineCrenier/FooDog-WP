<?php
/**
 * The template for displaying search results pages.
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
				<h1 class="page-title"><span><?php printf( esc_html__( 'Search Results for: %s', 'jefferson' ), '<span>' . get_search_query() . '</span>' ); ?></span></h1>
			</div>
		</div>
	</div>
</header><!-- .entry-header -->


<div class="row">

	<div class="col-lg-12 col-md-12">

		<section id="primary" class="content-area">
			<main id="main" class="site-main">

				<?php if ( have_posts() ) : ?>


					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php
						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */
						get_template_part( 'template-parts/content', 'blog-list' );
						?>

					<?php endwhile; ?>

					<?php jefferson_pagination(); ?>

				<?php else : ?>

				<div class="container">
					<div class="row">

						<div class="col-lg-12 col-md-12">
							<?php get_template_part( 'template-parts/content', 'none' ); ?>
						</div>
					</div>
				</div>

				<?php endif; ?>

			</main><!-- #main -->
		</section><!-- #primary -->

	</div>
</div>

<?php get_footer(); ?>
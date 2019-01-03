<?php
/**
 * @package jefferson
 */

$jefferson_layout_single_post_author = '';
$jefferson_layout_single_post_author = jefferson_get_option( 'jefferson_layout_single_post_author' );
?>

<div class="row">
	<div class="col-lg-10 col-md-12">
		<div class="single-post-header">

		<?php jefferson_categories(); ?>
		<?php the_title( '<h1 class="post-title">', '</h1>' ); ?>

		<div class="ccfw-entry-meta">
			<?php jefferson_posted_on(); ?> 
		</div>					

		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-9 col-md-9 left-content">

	<?php if ( has_post_thumbnail() ) { ?>
	<div class="ccfw-featured-image">
			<?php the_post_thumbnail( 'ccfw-single-post' ); ?>
	</div>
	<?php } ?>

		<div id="primary" class="content-area">

			<main id="main" class="site-main">
				<?php while ( have_posts() ) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class( 'ccfw-single-post' ); ?>>

						<?php if ( 'show' === $jefferson_layout_single_post_author ) { ?>
						<div class="ccfw-author-sidebar">
							<?php jefferson_author_details(); ?>
						</div>
						<?php } ?>

						<div class="structured-data">
							<?php the_title( '<span class="entry-title">', '</span>' ); ?>	
							<?php echo jefferson_posted_on(); ?>
							<?php jefferson_author_details(); ?>
						</div>
							
						<?php echo jefferson_blog_single_item(); ?>
						
					</article><!-- #post-## -->

					<?php if ( 'show' === $jefferson_layout_single_post_author ) { ?>
					<div class="ccfw-author-main">
						<?php jefferson_author_details(); ?>
					</div>
					<?php } ?>
			</main><!-- #main -->

			<?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
			?>

<?php
if ( class_exists( 'Jetpack_RelatedPosts' ) ) {
    echo do_shortcode( '[jetpack-related-posts]' );
}
?>

			<?php endwhile; // end of the loop.  ?>
			
		</div><!-- #primary -->
	</div><!--/9 -->

	<div class="col-lg-3 col-md-3">
		<div id="secondary" class="ccfw-default-sidebar widget-area" role="complementary">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div><!-- #secondary -->
	</div>

</div>
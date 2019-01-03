<?php
/**
 * Featured Post
 *
 * @package CreateandCode
 * @subpackage jefferson
 */

$jefferson_featured_post_id	= '';
$jefferson_featured_post_id	= jefferson_get_option( 'jefferson_featured_post_id' );

$jefferson_layout_blog_archive_show_excerpt	 = '';
$jefferson_layout_blog_archive_show_excerpt	 = jefferson_get_option( 'jefferson_layout_blog_archive_show_excerpt' );
$jefferson_layout_blog_archive_excerpt		 = '';
$jefferson_layout_blog_archive_excerpt		 = jefferson_get_option( 'jefferson_layout_blog_archive_excerpt' );
?>

<?php
$ccfw_featured_post = new WP_Query( array(
	'post_type'				 => 'post',
	'posts_per_page'		 => 1,
	'ignore_sticky_posts'	 => true,
	'p'         			 => $jefferson_featured_post_id
) );
?>

<?php
while ( $ccfw_featured_post->have_posts() ) : $ccfw_featured_post->the_post();
	if ( has_post_thumbnail() ) :
?>

<?php if (has_post_thumbnail( $post->ID ) ):
	$ccfw_header_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); 
	
	if ( $ccfw_header_image ) {
	$ccfw_header_image_style = 'background-image: url('. $ccfw_header_image[0] . '); ';
	}

endif; ?>

<div class="ccfw-hero-wrapper">

	<div class="ccfw-hero" style="background-image: url('<?php echo esc_url( $ccfw_header_image[0] ); ?>')">

		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6">
					<div class="hero-inner">

						<header class="ccfw-entry-header">
							<?php jefferson_categories(); ?>
							<?php the_title( sprintf( '<h2 class="ccfw-entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
						</header>

						<div class="ccfw-entry-content">
							<?php
							if ( has_post_format( 'link' ) ) {
								the_content();
							} elseif ( has_post_format( 'quote' ) ) {
								the_content();
							} else {
								if ( 'show' === $jefferson_layout_blog_archive_show_excerpt ) {
									$excerpt = get_the_excerpt();
									$limit	 = $jefferson_layout_blog_archive_excerpt;
									if ( strlen( $excerpt ) <= $limit ) {
										the_excerpt();
									} else {
										add_filter( 'excerpt_length', 'jefferson_custom_excerpt_length', 999 );
										the_excerpt();
									}
								}
							}
							?>
						</div><!-- .entry-content -->

						<?php if ( 'post' === get_post_type() ) : ?>
							<div class="ccfw-entry-meta">
								<?php jefferson_posted_on(); ?> <?php jefferson_author(); ?>
							</div>
						<?php endif; ?>
					
						<?php endif; endwhile; ?>

					</div>
				</div>
			</div>
		</div>
	</div>

</div><!--/ccfw-hero-wrapper -->

<?php wp_reset_postdata(); ?>
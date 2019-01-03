<?php
/**
 * Homepage Hero Feature
 *
 * @package CreateandCode
 * @subpackage jefferson
 */

$jefferson_homepage_hero_category				= '';
$jefferson_homepage_hero_category				= jefferson_get_option( 'jefferson_homepage_hero_category' );

$jefferson_layout_blog_archive_show_excerpt	 	= '';
$jefferson_layout_blog_archive_show_excerpt	 	= jefferson_get_option( 'jefferson_layout_blog_archive_show_excerpt' );
$jefferson_layout_blog_archive_excerpt		 	= '';
$jefferson_layout_blog_archive_excerpt		 	= jefferson_get_option( 'jefferson_layout_blog_archive_excerpt' );

?>

<div class="ccfw-featured">
	<div class="container">
		<div class="row">

			<?php $ccfw_hero_query_primary 	= new WP_Query( array(
				'post_type'				 	=> 'post',
				'cat'						=> '3',
				'cat' 						=> $jefferson_homepage_hero_category,
				'posts_per_page'		 	=> 1,
				'ignore_sticky_posts'	 	=> true,
			) );
			?>

			<?php while ($ccfw_hero_query_primary->have_posts()) : $ccfw_hero_query_primary->the_post(); $do_not_duplicate = $post->ID; ?>
			
			<div class="col-lg-6 col-md-6">
				<div class="ccfw-blog-image">
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
						<?php the_post_thumbnail( 'ccfw-hero-main' );
						?>
					</a>
				</div>

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

			</div>
			<?php endwhile; ?>

			<div class="col-lg-6 col-md-6">
				<div class="row">
					
					<?php
					$ccfw_hero_query_secondary 		= new WP_Query( array(
						'post_type'				 	=> 'post',
						'cat' 						=> $jefferson_homepage_hero_category,
						'posts_per_page'		 	=> 5,
						'ignore_sticky_posts'	 	=> true,
					) );
					?>

					<?php while ($ccfw_hero_query_secondary->have_posts()) : $ccfw_hero_query_secondary->the_post(); if( $post->ID == $do_not_duplicate ) continue; ?>

		 			<div class="ccfw-featured-secondary">

			 			<div class="ccfw-blog-image">
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
								<?php the_post_thumbnail( 'ccfw-hero-mini' );
								?>
							</a>
						</div>

			     		<header class="ccfw-entry-header">
							<?php the_title( sprintf( '<h2 class="ccfw-entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
						</header>

						<?php if ( 'post' === get_post_type() ) : ?>
							<div class="ccfw-entry-meta">
								<?php jefferson_posted_on(); ?> <?php jefferson_author(); ?>
							</div>
						<?php endif; ?>
					</div>
	  				<?php endwhile;  ?>
	  			</div>
			</div>
		</div>
	</div>
</div>

<?php wp_reset_postdata(); ?>
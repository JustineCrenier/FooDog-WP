<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package CreateandCode
 * @subpackage jefferson
 */

// Display regular search.
if ( ! function_exists( 'jefferson_search' ) ) {

	function jefferson_search() {
		?>
		<div class="site-search">
			<?php the_widget( 'WP_Widget_Search', 'title=' ); ?>
		</div>
		<?php
	}
}

if ( ! function_exists( 'jefferson_pagination' ) ) :

	/**
	 * Twenty Seventeen only works in WordPress 4.7 or later.
	 */
	function jefferson_pagination() {

		if ( is_singular() ) {
			return;
		}

		global $wp_query;

		/** Stop execution if there's only 1 page */
		if ( $wp_query->max_num_pages <= 1 ) {
			return;
		}

		$paged	 = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
		$max	 = intval( $wp_query->max_num_pages );

		/** 	Add current page to the array */
		if ( $paged >= 1 ) {
			$links[] = $paged;
		}

		/** 	Add the pages around the current page to the array */
		if ( $paged >= 3 ) {
			$links[] = $paged - 1;
			$links[] = $paged - 2;
		}

		if ( ( $paged + 2 ) <= $max ) {
			$links[] = $paged + 2;
			$links[] = $paged + 1;
		}

		echo '<div class="ccfw-blog-pagination"><ul>' . "\n";

		/** 	Previous Post Link */
		if ( get_previous_posts_link() ) {
			printf( '<li class="ccfw-pagination-prev">%s</li>' . "\n", get_previous_posts_link() );
		}

		/** 	Link to first page, plus ellipses if necessary */
		if ( ! in_array( 1, $links ) ) {
			$class = 1 == $paged ? ' class="active"' : '';

			printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

			if ( ! in_array( 2, $links ) ) {
				echo '<li>&hellip;</li>';
			}
		}

		/** 	Link to current page, plus 2 pages in either direction if necessary */
		sort( $links );
		foreach ( (array) $links as $link ) {
			$class = $paged == $link ? ' class="active"' : '';
			printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
		}

		/** 	Link to last page, plus ellipses if necessary */
		if ( ! in_array( $max, $links ) ) {
			if ( ! in_array( $max - 1, $links ) ) {
				echo '<li>&hellip;</li>' . "\n";
			}

			$class = $paged == $max ? ' class="active"' : '';
			printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
		}

		/** 	Next Post Link */
		if ( get_next_posts_link() ) {
			printf( '<li class="ccfw-pagination-next">%s</li>' . "\n", get_next_posts_link() );
		}

		echo '</ul></div>' . "\n";
	}

endif;

if ( ! function_exists( 'jefferson_posted_on' ) ) :

	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function jefferson_posted_on() {
		global $post;

		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date */
			esc_html_x( 'Posted on %s', 'post date', 'jefferson' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . jefferson_safe_html( $posted_on ) . '</span>'; // WPCS: XSS OK.

		if ( is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link( esc_html__( 'Leave a comment', 'jefferson' ), esc_html__( '1 Comment', 'jefferson' ), esc_html__( '% Comments', 'jefferson' ) );
			echo '</span>';
		}
	}

endif;

if ( ! function_exists( 'jefferson_entry_footer' ) ) :

	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function jefferson_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {

			/* translators: used between list items, there is a space between items*/
			$tags_list = get_the_tag_list( '', esc_html_x( ' ', 'list item separator', 'jefferson' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tags: %1$s', 'jefferson' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}
	}

endif;

if ( ! function_exists( 'jefferson_categories' ) ) :

	/**
	 * Prints HTML with meta information for the categories.
	 */
	function jefferson_categories() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space between categories */
			$categories_list = get_the_category_list( esc_html__( ' ', 'jefferson' ) );
			if ( $categories_list && jefferson_categorized_blog() ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'jefferson' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}
		}
	}

endif;

if ( ! function_exists( 'jefferson_author' ) ) :

	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function jefferson_author() {
		global $post;

		if ( is_singular() ) {
			$author_id		 = $post->post_author;
			$post_author	 = get_user_by( 'id', $author_id );
			$display_name	 = $post_author->display_name;

			$byline = sprintf(
				/* translators: %s: Post author. */
				esc_html_x( 'Posted by %s', 'post author', 'jefferson' ), '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( $display_name ) . '</a></span>'
			);
		} else {
			$byline = sprintf(
				/* translators: %s: Post author. */
				esc_html_x( 'by %s', 'post author', 'jefferson' ), '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
			);
		}

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
	}

endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function jefferson_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'jefferson_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'	 => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'	 => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'jefferson_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so jefferson_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so jefferson_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in jefferson_categorized_blog.
 */
function jefferson_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'jefferson_categories' );
}

add_action( 'edit_category', 'jefferson_category_transient_flusher' );
add_action( 'save_post', 'jefferson_category_transient_flusher' );


if ( ! function_exists( 'jefferson_blog_image' ) ) :

	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function jefferson_blog_image() {
		?>
		<div class="col-lg-4 col-md-4">
			<div class="ccfw-blog-image">
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
					<?php the_post_thumbnail( 'ccfw-feature-medium' );
					?>
				</a>
			</div>
		</div>
		<?php
	}

endif;


if ( ! function_exists( 'jefferson_post_navigation' ) ) :

function jefferson_post_navigation() {
?>

<div class="ccfw-post-navigation">
	<div class="container">
		<div class="row">
	
			<?php $prev_post = get_previous_post(); if (!empty( $prev_post )): ?>
				<div class="col-lg-6 col-md-6 nav-previous">
					<?php previous_post_link( '<span class="meta-nav">Previous Article</span>', 'jefferson' ); ?>
					<a href="<?php echo get_permalink( $prev_post->ID ); ?>">
					<?php echo $prev_post->post_title; ?></a>		
				</div>
			<?php endif; ?>

			<?php $next_post = get_next_post(); if (!empty( $next_post )): ?>
				<div class="col-lg-6 col-md-6 nav-next">
					<?php next_post_link( '<span class="meta-nav">Next Article</span>', 'jefferson' ); ?>
					<a href="<?php echo get_permalink( $next_post->ID ); ?>">
					<?php echo $next_post->post_title; ?></a>
				</div>
			<?php endif; ?>

		</div>
	</div>
</div>

<?php }

endif;

if ( ! function_exists( 'jefferson_post_navigation_prev' ) ) :

function jefferson_post_navigation_prev() {
?>
	
	<?php $prev_post = get_previous_post(); if (!empty( $prev_post )): ?>		
		<a class="ccfw-previous" href="<?php echo get_permalink( $prev_post->ID ); ?>"><span><?php esc_html_e( 'Previous Article', 'jefferson' ); ?></span></a>
	<?php endif; ?>	

<?php }

endif;

if ( ! function_exists( 'jefferson_post_navigation_next' ) ) :

function jefferson_post_navigation_next() {
?>
	
	<?php $next_post = get_next_post(); if (!empty( $next_post )): ?>		
		<a class="ccfw-next" href="<?php echo get_permalink( $next_post->ID ); ?>"><span><?php esc_html_e( 'Next Article', 'jefferson' ); ?></span></a>
	<?php endif; ?>	

<?php }

endif;


if ( ! function_exists( 'jefferson_author_details' ) ) :

	/**
	 * Prints HTML author details
	 */
	function jefferson_author_details() {
		?>

		<?php
		// Get Author Data
		$author				 = get_the_author();
		$author_name		 = get_the_author_meta( 'display_name' );
		$author_description	 = get_the_author_meta( 'description' );
		$author_website		 = get_the_author_meta( 'url' );
		$author_url			 = get_author_posts_url( get_the_author_meta( 'ID' ) );
		$author_avatar		 = get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'wpex_author_bio_avatar_size', 260 ) );

		$ccfw_twitter 		 = get_the_author_meta( 'twitter');
		$ccfw_facebook 		 = get_the_author_meta( 'facebook');
		$ccfw_googleplus 	 = get_the_author_meta( 'googleplus');
		?>

		<div class="author-info clr author vcard">
			<div class="author-info-inner clr">
				<?php if ( $author_avatar ) { ?>
					<div class="author-avatar clr">
						<a href="<?php echo esc_url( $author_url ); ?>" rel="author">
							<?php echo jefferson_safe_html( $author_avatar ); ?>
						</a>
					</div><!-- .author-avatar -->
				<?php } ?>

				<div class="author-description">
				<?php if ( $author_name ) { ?><h6><span class="fn n" rel="author"><?php echo ( $author_name ); ?></span></h6><?php } ?>

				<div class="ccfw-author-description"><?php echo jefferson_safe_html( $author_description ); ?></div>

				<div class="ccfw-author-socials">

					<?php if ( $ccfw_facebook ) { ?>
						<?php echo '<a href="'. $ccfw_facebook .'" rel="nofollow" target="_blank"><i class="fa fa-facebook"></i></a>'; ?> 
					<?php } ?>

					<?php if ( $ccfw_twitter ) { ?>
						<?php echo '<a href="https://twitter.com/' . $ccfw_twitter .'" rel="nofollow" target="_blank"><i class="fa fa-twitter"></i></a>'; ?> 
					<?php } ?>

					<?php if ( $ccfw_googleplus ) { ?>
						<?php echo '<a href="'. $ccfw_googleplus .'" rel="nofollow" target="_blank"><i class="fa fa-google-plus"></i></a>'; ?> 
					<?php } ?>

				</div>

				</div><!-- .author-description -->
			</div><!-- .author-info-inner -->
		</div><!-- .author-info -->


		<?php
	}

endif;

if ( ! function_exists( 'jefferson_custom_excerpt_length' ) ) :
	/**
	 * Apply a custom excerpt length.
	 */
	function jefferson_custom_excerpt_length( $length ) {
		$jefferson_layout_blog_archive_excerpt		 = '';
		$jefferson_layout_blog_archive_excerpt		 = jefferson_get_option( 'jefferson_layout_blog_archive_excerpt' );
		if ( isset( $jefferson_layout_blog_archive_excerpt ) ) {
			return $jefferson_layout_blog_archive_excerpt;
		} else {
			return 30;
		}
	}

endif;

if ( ! function_exists( 'jefferson_blog_loop_item' ) ) :

	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function jefferson_blog_loop_item() {

		$jefferson_layout_blog_archive_show_excerpt	 = '';
		$jefferson_layout_blog_archive_show_excerpt	 = jefferson_get_option( 'jefferson_layout_blog_archive_show_excerpt' );
		$jefferson_layout_blog_archive_excerpt		 = '';
		$jefferson_layout_blog_archive_excerpt		 = jefferson_get_option( 'jefferson_layout_blog_archive_excerpt' );
		?>

		<div class="col-lg-8 col-md-8">
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

		<?php
	}

endif;

if ( ! function_exists( 'jefferson_excerpt_more' ) ) :

	/**
	 * Remove brackets at the end of the excerpt.
	 */
	function jefferson_excerpt_more( $more ) {
		return '...';
	}

endif;

add_filter( 'excerpt_more', 'jefferson_excerpt_more' );


if ( ! function_exists( 'jefferson_blog_single_image' ) ) :

	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function jefferson_blog_single_image() {
	?>
	<div class="ccfw-blog-image">
		<?php the_post_thumbnail(); ?>
	</div>

	<?php }
endif;


if ( ! function_exists( 'jefferson_blog_single_item' ) ) :

	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function jefferson_blog_single_item() {
		?>

		<div class="ccfw-entry-content entry-content">
		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="ccfw-page-links">' . __( 'Pages:', 'jefferson' ),
			'after'	 => '</div>',
		) );
		?>
		</div><!-- .entry-content -->
		<div class="hide-trigger"></div>

		<footer class="ccfw-entry-footer">
			<?php jefferson_entry_footer(); ?>
		</footer><!-- .entry-footer -->

		<?php if ( function_exists( 'sharing_display' ) ) {
		    sharing_display( '', true );
		}		 
		?>

<?php }

endif;


if ( ! function_exists( 'jefferson_get_sidebar' ) ) {

	/**
	 * Display jefferson sidebar
	 *
	 * @uses get_sidebar()
	 * @since 1.0.0
	 */
	function jefferson_get_sidebar() {
		dynamic_sidebar( 'shop-sidebar' );
	}
}

// Menu walker adding "has-children" class to menu li's with children menu items
class jefferson_primary_nav_walker extends Walker_Nav_Menu {

	function display_element( $element, &$children_elements, $max_depth, $depth = 0, $args, &$output ) {
		$id_field = $this->db_fields['id'];
		if ( ! empty( $children_elements[ $element->$id_field ] ) ) {
			$element->classes[] = 'has-children';
		}
		Walker_Nav_Menu::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
	}

}

<?php

/**
 * @package jefferson
 */
$jefferson_layout_blog_listing_featured_img = '';
$jefferson_layout_blog_listing_featured_img = jefferson_get_option( 'jefferson_layout_blog_listing_featured_img' );
?>
<?php

if ( ( has_post_thumbnail() ) && ( 'hide' !== $jefferson_layout_blog_listing_featured_img ) ) {
	get_template_part( 'template-parts/blog', 'loop-item-with-thumb' );
} else {
	get_template_part( 'template-parts/blog', 'loop-item' );
}
?>
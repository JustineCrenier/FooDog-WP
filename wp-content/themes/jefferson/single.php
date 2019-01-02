<?php
/**
 * The template for displaying all single posts.
 *
 * @package CreateandCode
 * @subpackage jefferson
 */

get_header();
?>

<div class="ccfw-content">
	<div class="container">
		<?php get_template_part( 'template-parts/content', 'single' ); ?>		
	</div>

	<div id="clear"></div>
	<?php jefferson_post_navigation(); ?>
</div>

<?php get_footer(); ?>
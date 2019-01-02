<?php
/**
 * The main template file
 *
 * @package CreateandCode
 * @subpackage jefferson
 */
get_header();

$jefferson_homepage_hero			= '';
$jefferson_homepage_hero			= jefferson_get_option( 'jefferson_homepage_hero' );

$jefferson_featured_post			= '';
$jefferson_featured_post			= jefferson_get_option( 'jefferson_featured_post' );
?>
	
<?php if ( 'show' === $jefferson_homepage_hero ) { ?>
	<?php get_template_part( 'inc/homepage/hero' ); ?>
<?php } ?>

<?php if ( 'show' === $jefferson_featured_post ) { ?>
	<?php get_template_part( 'inc/homepage/featured-post' ); ?>
<?php } ?>

<div class="ccfw-content">
	<h2 class="heading"><?php esc_html_e( 'Latest Stories', 'jefferson' ); ?></h2>
	<div class="row">
		<div class="col-lg-12 col-md-12">
			<?php get_template_part( 'template-parts/blog', 'list' ); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
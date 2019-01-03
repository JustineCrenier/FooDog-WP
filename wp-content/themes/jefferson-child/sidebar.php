<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package CreateandCode
 * @subpackage jefferson
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div id="secondary" class="ccfw-default-sidebar widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->

<?php
/**
 * jefferson hooks
 *
 * @package CreateandCode
 * @subpackage jefferson
 */

add_action( 'jefferson_header', 'jefferson_branding', 20 );
add_action( 'jefferson_header_navigation', 'jefferson_navigation_primary', 20 );

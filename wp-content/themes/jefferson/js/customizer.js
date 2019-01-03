/**
 * Theme Customizer enhancements for a better user experience.
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 *
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.ccfw-site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.ccfw-site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.ccfw-site-title, .ccfw-site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
				$( 'body' ).addClass( 'title-tagline-hidden' );
			} else {
				$( '.startight-site-title, .startight-site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.startight-site-description, .ccfw-site-description a' ).css( {
					'color': to
				} );
				$( 'body' ).removeClass( 'title-tagline-hidden' );
			}
		} );
	} );

	// logo
	wp.customize( 'jefferson_logo', function( value ) {
		value.bind( function( to ) {
			if ( to == '' ) {
				$( '.ccfw-site-logo-src' ).hide();
			} else {
				$( '.ccfw-site-logo-src' ).show();
				$( '.ccfw-site-logo-src' ).attr( 'src', to );
			}
		} );
	} );


} )( jQuery );
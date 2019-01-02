jQuery( document ).ready( function () {

    /* Tabs in welcome page */
    function jefferson_welcome_page_tabs( event ) {
        jQuery( event ).parent().addClass( "active" );
        jQuery( event ).parent().siblings().removeClass( "active" );
        var tab = jQuery( event ).attr( "href" );
        jQuery( ".ccfw-tab-pane" ).not( tab ).css( "display", "none" );
        jQuery( tab ).fadeIn();
    }

    var jefferson_actions_anchor = location.hash;

    if ( ( typeof jefferson_actions_anchor !== 'undefined' ) && ( jefferson_actions_anchor != '' ) ) {
        jefferson_welcome_page_tabs( 'a[href="' + jefferson_actions_anchor + '"]' );
    }

    jQuery( ".ccfw-nav-tabs a" ).click( function ( event ) {
        event.preventDefault();
        jefferson_welcome_page_tabs( this );
    } );

    /* Tab Content height matches admin menu height for scrolling purpouses */
    $tab = jQuery( '.ccfw-tab-content > div' );
    $admin_menu_height = jQuery( '#adminmenu' ).height();
    if ( ( typeof $tab !== 'undefined' ) && ( typeof $admin_menu_height !== 'undefined' ) )
    {
        $newheight = $admin_menu_height - 180;
        $tab.css( 'min-height', $newheight );
    }

} );

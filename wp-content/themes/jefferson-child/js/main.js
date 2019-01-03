// main theme js. 
;
( function( $ ) {
    "use strict";

	// Toggle mobile-menu
	$(".nav-toggle").on("click", function(){	
		$(this).toggleClass("active");
		$(".mobile-menu").slideToggle();
		if ($(".search-toggle").hasClass("active")) {
			$(".search-toggle").removeClass("active");
			$(".blog-search").slideToggle();
		}
	});
	
	// Toggle search form
	$(".search-toggle").on("click", function(){	
		$(this).toggleClass("active");
		$(".blog-search").slideToggle();
		if ($(".nav-toggle").hasClass("active")) {
			$(".nav-toggle").removeClass("active");
			$(".mobile-menu").slideToggle();
		}
	});

	// Search Hide/Show
	$(document).ready(function(){
	$('.search-menu > li.fa-search a').click(function(e){
		e.preventDefault();
		$('.ccfw-header-nav').toggleClass("active"); 
		$(".ccfw-header-nav input.search-field").val("");
		$(".ccfw-header-nav input.search-field").focus();
	});

	});

	// Show mobile-menu > 700
	$(window).resize(function() {
		if ($(window).width() > 1024) {
			$(".toggle").removeClass("active");
			$(".mobile-menu").hide();
		}
	});

	// Show/Collapse mobile sub menus
	$( ".mobile-menu li.dropdown .caret" ).on( "click", function ( e ) {
		$(this).closest('li').toggleClass( "dropdown-open" );
		e.preventDefault();
	} );

	// Back to top
    $( document ).ready( function () {
        if ($('#ccfw-back-to-top').length) {
    	var scrollTrigger = 100, // px
        backToTop = function () {
            var scrollTop = $(window).scrollTop();
            if (scrollTop > scrollTrigger) {
                $('#ccfw-back-to-top').addClass('show');
            } else {
                $('#ccfw-back-to-top').removeClass('show');
            }
        };
    backToTop();
    $(window).on('scroll', function () {
        backToTop();
    });
    $('#ccfw-back-to-top').on('click', function (e) {
        e.preventDefault();
        $('html,body').animate({
            scrollTop: 0
        }, 700);
    });
	}

    } );

    // Close anon function.
}( jQuery ) );
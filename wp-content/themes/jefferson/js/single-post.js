// single post js. 
;
( function( $ ) {
    "use strict";
   
    // Progress Bar
    $(window).scroll(function() {
        var scrollPercent = 100 * ($(document).scrollTop() - $('article.ccfw-single-post').offset().top+150) / $('article.ccfw-single-post').height();
        $('.ccfw-progress-bar').css('width', scrollPercent +"%"  );     
    });

}( jQuery ) );
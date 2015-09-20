(function($) {
$(function() {

// The document is loaded with jQuery.


// Add the mobile nav toggle element as the last li in the navigation bar.
if ( $( '#nav-toggle' ).length ) {

    var navToggleLi = document.createElement( 'li' );
    navToggleLi.innerHTML = document.getElementById( 'nav-toggle' ).outerHTML;

    $( '#nav-toggle' ).remove();

    document.getElementById( 'nav-bar-links' ).appendChild( navToggleLi );
}

// Add the site title element as an li in the navigation bar.
if ( $( '#site-title-container' ).length ) {

    var nLinks = $( '#nav-bar-links' ).children().length;

    var $link = $( '#nav-bar-links li:nth-child(' + Math.floor( nLinks / 2 ) + ')' );


    $link.after( '<li>' + $( '#site-title-container' ).html() + '</li>' );

    $( '#site-title-container' ).remove();
}


});
})(jQuery);

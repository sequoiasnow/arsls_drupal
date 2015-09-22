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


// Configure the showing of the extended menu.
if ( $( '#nav-toggle').length ) {


    // Shows or hides the extened navigation based off of clicks.
    var removeEN = function( e ) {

        var $container = $( '#expanded-navigation' );

        if ( ( ! $container.is( e.target ) && $container.has( e.target ).length === 0 ) || $container.is( '#expanded-navigation-toggle' ) ) {
            toggleEN( false );
        }
    }

    var toggleEN = function( display ) {


        if ( display === false ) {
            $( 'body' ).removeClass( 'show-expanded-nav' );

            $( document ).unbind( 'mouseup', removeEN );
        } else {
            $( 'body' ).addClass( 'show-expanded-nav' );

            $( document ).bind( 'mouseup', removeEN );
        }
    }

    $( '#nav-toggle' ).click( function() {
        toggleEN( true );
    } );

}

});
})(jQuery);

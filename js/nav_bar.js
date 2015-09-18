(function($) {
    $(function() {

        // Sets up the two layer menu by creating mutliple ul's
        // The origional menu is destroyed
        (function() {
            var navContainer = document.getElementById('nav-bar');
            var navDataElements = document.getElementById('origional-nav-bar-data').getElementsByTagName('li');

            function createNavULElement() {
                var elem = document.createElement('ul');
                $(elem).addClass('nav-bar-element');
                return elem;
            }

            var lastUl = createNavULElement();
            for (var i = 0; i < navDataElements.length; i++) {
                if ( i % 2 == 0 && i != 0) {
                    navContainer.appendChild(lastUl);
                    lastUl = createNavULElement();
                }
                lastUl.appendChild(navDataElements[i].cloneNode(true));
            }
            navContainer.appendChild(lastUl);

            document.getElementById('origional-nav-bar-data').parentNode.removeChild(document.getElementById('origional-nav-bar-data'));
        })();
        
        // Set up the logo 
        (function() {
	    	var imageSrc = $('#logo').data('logo-src');
	    	if (imageSrc) {
		    	$('#logo').css('background-image', 'url(' + imageSrc + ')');
		    }
        })();

        // Sets up the mobile elements of the navigation bar
        (function() {
            $('#mobile-nav-button').data('clicked', false);

            $('#mobile-nav-button').click(function() {
                // Record the state of the nav-bar
                $(this).data('clicked', !$(this).data('clicked'));

                // Set the background color of the nav bar
                $('#nav-bar').css('background-color', $('body').css('background-color'));

                // Rearange
                if ($(this).data('clicked')) {
                    // Change the lines inside the nav-bar
                    $('#mobile-nav-button > div[class^="line"]').each(function() {
                        $(this).addClass('clicked');
                    });

                    // Change the open close button
                    $(this).addClass('clicked');


                    // Change the nav-bar
                    $('#nav-bar').removeClass('end-clicked');
                    $('#nav-bar').addClass('clicked');
                //    $('#nav-bar').css('display', 'block');
                } else {
                    // Change the lines inside the nav-bar
                   $('#mobile-nav-button > div[class^="line"]').each(function() {
                        $(this).removeClass('clicked');
                    });

                    // Change the open close button
                    $(this).removeClass('clicked');

                    // Change the nav-bar
                    $('#nav-bar').removeClass('clicked');
                    $('#nav-bar').addClass('end-clicked');
                    setTimeout(function() {
                      //  $('#nav-bar').css('display', 'none');
                        $('#nav-bar').removeClass('end-clicked');
                    }, 1000);
                }
            });

        })();
    });
})(jQuery);

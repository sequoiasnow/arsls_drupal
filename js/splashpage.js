(function($) {
    $(document).ready(function() {
        // Configure the navigation bar
        (function() {
            var $navbar = $('#nav-bar-container');
            (function(elem) {
                elem.parentNode.removeChild(elem);
            })(document.getElementById('nav-bar-container'));

            $('.splashpage-item-container:first .splashpage-item:first').after($navbar);
            $('.splashpage-item-container:first .splashpage-item:first').after('<div id="nav-placeholder"></div>');
            $navbar = $('#nav-bar-container');

            // Resize placeholder for nav bar
            $('#nav-placeholder').height( $('#nav-bar-container').height() );
            $('#nav-placeholder').css('width', '100%');

            var navOffset = function() {
                return $('#nav-placeholder').offset().top;
            };
            // Position the nav bar;
            $navbar.css({
                'position': 'absolute',
                'top': navOffset() + 'px',
                'width': '100%'
            });
            $navbar.addClass('splashpage');

            $(window).scroll(function(e){
                if ($(this).scrollTop() > navOffset()) {
                    $('#nav-bar-container').css({'position': 'fixed', 'top': '0px'});
                }
                if ($(this).scrollTop() < navOffset()) {
                    $('#nav-bar-container').css({'position': 'absolute', 'top': navOffset() + 'px'});
                }
            });
        })();

        $('.splashpage-item-container .splashpage-item[data-background-image]').each(function() {
            $(this).css('background-image', 'url(' + $(this).data('background-image') + ')');
        });

    });
})(jQuery);

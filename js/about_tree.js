(function($) {
    $(document).ready(function() {
        $(window).scroll(function() {
            $window = $(this);

            function handleElement(elem, side) {
                $elem = $(elem);

                var scrollVal = -$elem.offset().top + $window.scrollTop()
                + $window.height() - $elem.height();

                var percentage = scrollVal / 200 ;

                if (percentage > 1) { percentage = 1; }
                else if (percentage < 0) { percentage = 0; }

                $icon = $elem.find('.icon');

                $icon.css('opacity', percentage);
                $icon.css(side, percentage * ($elem.width() / 2  - $icon.width() / 2) + 'px');
            }

            $('.about-tree .row:nth-child(2n + 1)').each(function() {
                handleElement(this, 'right');
            });
            $('.about-tree .row:nth-child(2n)').each(function() {
                handleElement(this, 'left');
            });
        });

        // Allowes for casses when items are already in view
        $(window).resize(function() {
            $(window).scroll();
        })

        $(window).resize(function() {
            $('.about-tree .row').each(function() {
                $(this).height( $(this).find('.content').height() );
            })
        })

        $(window).resize();
    });
})(jQuery);

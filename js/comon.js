(function($) {
    $(document).ready(function() {
        // Handle i-wraper
        $(window).resize(function() {
            $('.i-wraper').each(function() {
                $(this).width( $(this).height() );
            });
        });

        $(window).resize();

    });
})(jQuery);

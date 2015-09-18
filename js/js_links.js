(function($) {
    $(function() {
        $(document).on('click', '*[data-href]', function() {
            document.location = $(this).data('href');
        });


        $(document).on('click', '*[data-local-href]', function() {
            $('html, body').animate({
                scrollTop: $($(this).data('local-href')).offset().top
            }, 1000);
        });
    });
})(jQuery);

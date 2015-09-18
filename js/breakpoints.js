var breakpoints = {};

(function($) {
    $(function() {
        breakpoints = {
            small: window.matchMedia("(max-device-width: 480px), (max-width: 600px)"),
            medium: window.matchMedia("(max-device-width: 600px), (max-width: 700px)"),

            mediumMobile: window.matchMedia("only screen and (max-device-width: 600px)")
        };
    });
})(jQuery);

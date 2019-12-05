(function($) {
    "use strict";

    /*================================
  Preloader
  ==================================*/
    var preloader = $('#berg-preloader');
    $(window).on('load', function () {
        preloader.fadeOut('slow', function () {
            $(this).remove();
        });
    });
})(jQuery);

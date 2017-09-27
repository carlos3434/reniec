// Splash
var Splash = function() {
    "use strict";

    // Handle Owl Carousel Team v1
    var handleSplashBannerSlider = function() {
        $(document).ready(function() {
            var owl = $(".splash-banner-slider");
            owl.owlCarousel({
                items: 1,
                loop: true,
                dots: false,
                nav: false,
                margin: 150,
                autoplay: true,
                smartSpeed: 450,
                autoplaySpeed: 1000
            });
        });
    }

    // Handle Equal Height
    var handleEqualHeight = function() {
        $(function($) {
            $('.splash-demo-equal-height').responsiveEqualHeightGrid();
        });
    }

    return {
        init: function() {
            handleSplashBannerSlider(); // initial setup for splash banner slider
            handleEqualHeight(); // initial setup for equal height
        }
    }
}();

$(document).ready(function() {
    Splash.init();
});

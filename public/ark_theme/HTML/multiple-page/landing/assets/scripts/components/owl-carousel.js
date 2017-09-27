// Owl Carousel
var OwlCarousel = function() {
    "use strict";

    // Handle Owl Carousel Landing News V1
    var handleLandingNewsV1 = function() {
        $(document).ready(function() {
            var owl = $(".owl-carousel-l-news-v1");
            owl.owlCarousel({
                items: 4,
                loop: true,
                dots: false,
                nav: false,
                margin: 30,
                smartSpeed: 450,
                responsive: {
                    // breakpoint from 0 up
                    0: {
                        items: 1
                    },
                    // breakpoint from 480 up
                    480: {
                        items: 2
                    },
                    // breakpoint from 550 up
                    550: {
                        items: 3
                    },
                    // breakpoint from 768 up
                    768: {
                        items: 3
                    },
                    // breakpoint from 992 up
                    992: {
                        items: 4
                    },
                    // breakpoint from 1199 up
                    1199: {
                        items: 4
                    }
                }
            });
        });
    }

    // Handle Owl Carousel Landing Testimonials V1
    var handleLandingTestimonialsV1 = function() {
        $(document).ready(function() {
            var owl = $(".owl-carousel-l-testimonials-v1");
            owl.owlCarousel({
                items: 3,
                loop: true,
                dots: false,
                nav: false,
                margin: 30,
                smartSpeed: 450,
                responsive: {
                    // breakpoint from 0 up
                    0: {
                        items: 1
                    },
                    // breakpoint from 480 up
                    480: {
                        items: 1
                    },
                    // breakpoint from 550 up
                    550: {
                        items: 2
                    },
                    // breakpoint from 768 up
                    768: {
                        items: 2
                    },
                    // breakpoint from 992 up
                    992: {
                        items: 3
                    },
                    // breakpoint from 1199 up
                    1199: {
                        items: 3
                    }
                }
            });
        });
    }

    return {
        init: function() {
            handleLandingNewsV1(); // initial setup for landing news v1
            handleLandingTestimonialsV1(); // initial setup for landing testimonials v1
        }
    }
}();

$(document).ready(function() {
    OwlCarousel.init();
});

var App = function() {
    "use strict";

    // Header Shrink
    var handleHeaderShrink = function() {
        $(window).on('scroll', function() {
            if ($(window).scrollTop() > 1){
                $('body').addClass('header-shrink');
            } else {
                $('body').removeClass('header-shrink');
            }
        });
    }

    // Bootstrap Navbar Trigger
    var handleBootstrapNavbarToggle = function() {
        $(".navbar-toggle").on('click', function(event) {
            if ($('.toggle-icon').hasClass('is-clicked')) {
                $('.toggle-icon').removeClass('is-clicked');
            } else {
                $('.toggle-icon').addClass('is-clicked');
            }
        });
    }

    // Maginific Popup
    var handleMagnificPopup = function() {
        $(document).ready(function() {
            $('.popup-with-form').magnificPopup({
                type: 'inline',
                preloader: false,
                focus: '#name',

                // When elemened is focused, some mobile browsers in some cases zoom in
                // It looks not nice, so we disable it:
                callbacks: {
                    beforeOpen: function() {
                        if($(window).width() < 700) {
                            this.st.focus = false;
                        } else {
                            this.st.focus = '#name';
                        }
                    }
                }
            });
        });
    }

    // Handle Header Section Scroll Nav
    var handleHeaderSectionScrollNav = function() {
        // Activate Header Section Scroll Menu
        var $body = $(document.body);
        var navHeight = $('.header .navbar').outerHeight(true) + 10;

        $body.scrollspy({
            target: '.header .nav-collapse',
            offset: navHeight
        });

        // Smooth Scrolling Sections
        $('.header .mega-menu-child').bind('click', function(event) {
            if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[href' + this.hash.slice(1) +']');
                if (target.length) {
                    $('html, body').animate({
                        scrollTop: target.offset().top - 90
                    }, 1000);
                    return false;
                }
            }
        });

        // Navbar Collapse On Scroll
        $(window).scroll(function() {
            if ($('.header .navbar').offset().top > 250) {
                $('.header .navbar-collapse.in').collapse('hide');
                $('.header .toggle-icon').addClass('is-clicked');
            } else {
                $('.header .navbar-collapse.in').collapse('show');
                $('.header .toggle-icon').removeClass('is-clicked');
            }
        });

        // Collapse Navbar When It's Clickicked
        $(window).scroll(function() {
            $('.header .navbar-collapse.in').collapse('hide');
        });
    }

    return {
        init: function() {
            handleHeaderShrink(); // initial setup for header shrink
            handleBootstrapNavbarToggle(); // initial setup for bootstrap navbar toggle
            handleMagnificPopup(); // initial setup for maginific popup
            handleHeaderSectionScrollNav(); // initial setup for header section scroll nav
        }
    }
}();

$(document).ready(function() {
    App.init();
});

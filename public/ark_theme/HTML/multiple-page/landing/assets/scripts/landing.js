// Core Javascript Initialization
var Landing = function() {
    'use strict';

    // Handle Landing Signup Form
    var handleLandingPromoSignupForm = function() {
        $('.l-pricing-list-v2').on('click', function() {
            // set focus to input
            $('input[type=radio]', this).prop('checked', true);

            // add 'is-selected' active class to the parent class
            $('.l-pricing-list-v2').removeClass('is-selected');
            $(this).addClass('is-selected');
        });
    }

    return {
        init: function() {
            handleLandingPromoSignupForm(); // initial Landing Signup Form
        }
    }
}();

$(document).ready(function() {
    Landing.init();
});

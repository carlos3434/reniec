// Equal Height
var LandingEqualHeight = function() {
    "use strict";

    // Handle Landing Equal Height
    var handleLandingEqualHeight = function() {
        $(function($) {
            $('.l-services-v1-equal-height').responsiveEqualHeightGrid();
            $('.l-services-v2-equal-height').responsiveEqualHeightGrid();
            $('.l-pricing-list-v2-equal-height').responsiveEqualHeightGrid();
        });
    }

    return {
        init: function() {
            handleLandingEqualHeight(); // initial setup for landing equal height
        }
    }
}();

$(document).ready(function() {
    LandingEqualHeight.init();
});
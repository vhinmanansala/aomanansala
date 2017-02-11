$(document).ready(function() {
    $('a.mobileMenuIcon').click(function() {
        $(this).toggleClass("active");

        if ($('#mobileMenuWrapper').is(':hidden')) {
            $('#mobileMenuWrapper').fadeIn();
        } else {
            $('#mobileMenuWrapper').fadeOut();
        }
    })
});
const timeOutAlert = 5000;
const scrollTopButtonShow = 300;

setTimeout(function () {
    $('.alert-message').fadeOut();
}, timeOutAlert);

$(document).ready(function() {
    // Show or hide the "Go to Top" button based on scroll position
    $(window).scroll(function() {
        if ($(this).scrollTop() > scrollTopButtonShow) {
            $('#go-to-top').fadeIn();
        } else {
            $('#go-to-top').fadeOut();
        }
    });

    // Scroll to top when the "Go to Top" button is clicked
    $('#go-to-top').click(function() {
        $('html, body').animate({ scrollTop: 0 }, 'fast');
        return false;
    });
});

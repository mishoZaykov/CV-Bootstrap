jQuery(document).ready(function($) {
    $('a[href^="#"]').on('click', function(event) {
        event.preventDefault();

        var target = $(this.getAttribute('href'));

        if (target.length) {
            $('html, body').animate({
                scrollTop: target.offset().top
            }, 1000);

            // Add smooth scroll behavior in CSS
            $('html, body').css('scroll-behavior', 'smooth');
        }
    });
});



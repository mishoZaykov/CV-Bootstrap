const swup = new Swup();

$(document).ready(function() {
  $('.form').submit(function(event) {
    event.preventDefault(); // Prevent form submission

    // Simulate a successful registration
    setTimeout(function() {
      $('.success-popup').fadeIn(300, function() {
        $(this).delay(1500).fadeOut(300);
      });
    }, );
  });

  $('.btn').click(function(e) {
    // Get button position and dimensions
    let buttonOffset = $(this).offset();
    
    
    // Calculate ripple effect position
    let rippleX = e.pageX - buttonOffset.left;
    let rippleY = e.pageY - buttonOffset.top;
    
    // Create and append ripple element
    let ripple = $('<div class="ripple"></div>').css({
      left: rippleX + 'px',
      top: rippleY + 'px'
    });
    
    $(this).append(ripple);
    
    // Remove ripple element after animation
    ripple.one('animationend', function() {
      $(this).remove();
    });
  });

  $('.accordion-title').click(function() {
    let content = $(this).next('.accordion-content');
    
    if (content.is(':hidden')) {
      $('.accordion-content').slideUp();
      content.slideDown();
    } else {
      content.slideUp();
    }
  });

  
});

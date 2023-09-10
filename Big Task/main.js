$(document).ready(function() {
  const $carousel = $('.overlap-group-wrapper');
  const $slides = $('.element-3');
  let currentIndex = 0;

  function goToSlide(index) {
    $carousel.css('transform', `translateX(-${index * 100}%)`);
    currentIndex = index;
  }

  // Auto-play the carousel
  setInterval(function() {
    const nextIndex = (currentIndex + 1) % $slides.length;
    goToSlide(nextIndex);
  }, 5000); // Change slide every 5 seconds

  // Initial position
  goToSlide(currentIndex);

  // Handle arrow navigation
  $('#prev-button').click(function() {
    const prevIndex = (currentIndex - 1 + $slides.length) % $slides.length;
    goToSlide(prevIndex);
  });

  $('#next-button').click(function() {
    const nextIndex = (currentIndex + 1) % $slides.length;
    goToSlide(nextIndex);
  });
});
$(document).ready(function () {
  const controller = new ScrollMagic.Controller();

  // 1. Parallax Header
  let parallaxDownTl = new TimelineMax();
  parallaxDownTl
    .from(".content-wrapper", 0.4, { autoAlpha: 0, ease: Power0.easeNone }, 0.4)
    .from(".background-image", 2, { y: "-50%", ease: Power0.easeNone }, 0);

  let slideParallaxDownScene = new ScrollMagic.Scene({
    triggerElement: ".parallax",
    triggerHook: 1,
    duration: "100%",
  })
    .setTween(parallaxDownTl)
    .addTo(controller);

  // Grid Images
  $(".grid-wrapper > div").each(function () {
    const imageFadeInTlDown = gsap.fromTo(
      $(this).find("img"),
      { opacity: 0 },
      { opacity: 1, duration: 0.5 }
    );

    const imageSceneDown = new ScrollMagic.Scene({
      triggerElement: this,
      triggerHook: 0.8,
      reverse: true,
    })
      .setTween(imageFadeInTlDown)
      .addTo(controller);
  });

  // Sticky Nav Bar
  const primaryHeader = $(".primary-header");
  const scrollWatcher = $("<div>").attr("data-scroll-watcher", "");
  primaryHeader.before(scrollWatcher);

  const navObserver = new IntersectionObserver(
    (entries) => {
      primaryHeader.toggleClass("sticking", !entries[0].isIntersecting);
    },
    { rootMargin: "200px 0px 0px 0px" }
  );

  navObserver.observe(scrollWatcher[0]);

  // Typewriter Effect
  const textAnimationScene = new ScrollMagic.Scene({
    triggerElement: ".text-animation",
    triggerHook: 0.8,
  })
    .on("enter", function () {
      $(".typewriter-text").addClass("typing");
    })
    .on("leave", function () {
      $(".typewriter-text").removeClass("typing");
    })
    .addTo(controller);

  // Scaling Effect
  const scalingElement = $(".scaling-element");
  const scalingScene = new ScrollMagic.Scene({
    triggerElement: ".scaling-section",
    triggerHook: 1,
    duration: "50%",
  })
    .on("progress", function (event) {
      const scrollSpeed = event.progress;
      const scaleValue = 1 + scrollSpeed;
      TweenMax.to(scalingElement, 0.5, {
        scale: scaleValue,
        ease: Power1.easeInOut,
      });
    })
    .addTo(controller);

  // Rotating Effect
  const cubeElement = $(".cube");
  const cubeScene = new ScrollMagic.Scene({
    triggerElement: ".cube-section",
    triggerHook: 0.8,
  })
    .on("progress", function (event) {
      const rotation = event.progress * 360; // Rotate the cube based on scrolling progress
      cubeElement.css("transform", `rotateY(${rotation}deg)`);
    })
    .addTo(controller);
});

/**
 * hide navigation
 **/

document.addEventListener("DOMContentLoaded", function () {
  var mainNav = document.querySelector("header");
  var lastScrollTop = 0;
  var threshold = 85; // Minimum scroll distance before toggling

  window.addEventListener("scroll", function () {
    var scrollTop = window.scrollY || document.documentElement.scrollTop;

    // Prevent negative scrollTop (elastic scroll) from causing issues
    if (scrollTop < 0) {
      scrollTop = 0;
    }

    // Check if scrolled by at least 85px before applying the class change
    if (Math.abs(scrollTop - lastScrollTop) >= threshold) {
      if (scrollTop > lastScrollTop) {
        // Scrolling down
        mainNav.classList.add("hidden");
      } else {
        // Scrolling up
        mainNav.classList.remove("hidden");
      }

      lastScrollTop = scrollTop; // Update the last scroll position
    }
  });
  AOS.init({
    duration: 400, // slightly slower than default (400) for a smoother feel
    easing: "ease-out-cubic", // gentle deceleration (feels more natural than 'ease-in')
    once: true, // animations happen once per element
    mirror: false, // do not animate when scrolling back up
    offset: 100, // triggers animations 100px before the element enters view
    delay: 0, // let individual elements set their own delay via data-aos-delay
  });
});

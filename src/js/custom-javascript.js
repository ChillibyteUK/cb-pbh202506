/**
 * hide navigation
 **/

document.addEventListener('DOMContentLoaded', function() {
    var mainNav = document.querySelector('header');
    var lastScrollTop = 0;
    var threshold = 85; // Minimum scroll distance before toggling
  
    window.addEventListener('scroll', function() {
        var scrollTop = window.scrollY || document.documentElement.scrollTop;
  
        // Prevent negative scrollTop (elastic scroll) from causing issues
        if (scrollTop < 0) {
            scrollTop = 0;
        }
  
        // Check if scrolled by at least 85px before applying the class change
        if (Math.abs(scrollTop - lastScrollTop) >= threshold) {
            if (scrollTop > lastScrollTop) {
                // Scrolling down
                mainNav.classList.add('hidden');
            } else {
                // Scrolling up
                mainNav.classList.remove('hidden');
            }
  
            lastScrollTop = scrollTop; // Update the last scroll position
        }
    });
  });
jQuery(document).ready(function ($) {

    // Preloader
    jQuery('#preloader').delay(1500).fadeOut();
    jQuery('#loader').delay(1500).fadeOut("slow");

    // Scroll to Top Button
    if ($('.go-to-top').length) {
        var scrollTrigger = $('body').position(); // px
        var goToTop = function () {
            var scrollTop = $(window).scrollTop();
            if (scrollTop > 150) {
                $('.footer-go-to-top').addClass('show');
            } else {
                $('.footer-go-to-top').removeClass('show');
            }
        };
        goToTop();
        $(window).on('scroll', function () {
            goToTop();
        });
        $('.go-to-top').on('click', function (e) {
            e.preventDefault();
            $('html, body').animate({
                scrollTop: scrollTrigger.top
            }, 700);
        });
    }

    // Mobile Menu Focus
    $(window).resize(navTrapp);

    function navTrapp() {
        var width = $(window).width();
        if (width < 992) {
            $('.main-navigation').on('keydown', function (e) {
                if ($('.main-navigation').hasClass('toggled')) {
                    var focusableEls = $('.main-navigation a[href]:not([disabled]), .main-navigation button');
                    var firstFocusableEl = focusableEls[0];
                    var lastFocusableEl = focusableEls[focusableEls.length - 1];
                    var KEYCODE_TAB = 9;
                    var KEYCODE_ESC = 27;
                    if (e.key === 'Tab' || e.keyCode === KEYCODE_TAB) {
                        if (e.shiftKey) { // shift + tab
                            if (document.activeElement === firstFocusableEl) {
                                lastFocusableEl.focus();
                                e.preventDefault();
                            }
                        } else { // tab
                            if (document.activeElement === lastFocusableEl) {
                                firstFocusableEl.focus();
                                e.preventDefault();
                            }
                        }
                    }
                    if (e.keyCode === KEYCODE_ESC) {
                        $('.main-navigation').removeClass('toggled');
                        return;
                    }
                }
            });
        }
    }

    navTrapp();

    // Main Slider
    var owl = jQuery('#main-slider-wrap .owl-carousel');
    owl.owlCarousel({
        margin: 20,
        nav: true,
        autoplay: false,
        lazyLoad: false,
        autoplayTimeout: 2000,
        loop: true,
        rtl: $('html').attr('dir') === 'rtl',  // Set RTL based on HTML direction
        dots: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        },
        autoplayHoverPause: true,
        mouseDrag: true
    });

    // Initialize search focus functionality
    bakery_treats_search_focus();

});

// search
function bakery_treats_search_focus() {

  /* First and last elements in the menu */
  var bakery_treats_search_firstTab = jQuery('.serach_inner input[type="search"]');
  var bakery_treats_search_lastTab  = jQuery('button.search-close'); /* Cancel button will always be last */

  jQuery(".search-open").click(function(e){
    e.preventDefault();
    e.stopPropagation();
    jQuery('body').addClass("search-focus");
    bakery_treats_search_firstTab.focus();
  });

  jQuery("button.search-close").click(function(e){
    e.preventDefault();
    e.stopPropagation();
    jQuery('body').removeClass("search-focus");
    jQuery(".search-open").focus();
  });

  /* Redirect last tab to first input */
  bakery_treats_search_lastTab.on('keydown', function (e) {
    if (jQuery('body').hasClass('search-focus'))
    if ((e.which === 9 && !e.shiftKey)) {
      e.preventDefault();
      bakery_treats_search_firstTab.focus();
    }
  });

  /* Redirect first shift+tab to last input*/
  bakery_treats_search_firstTab.on('keydown', function (e) {
    if (jQuery('body').hasClass('search-focus'))
    if ((e.which === 9 && e.shiftKey)) {
      e.preventDefault();
      bakery_treats_search_lastTab.focus();
    }
  });

  /* Allow escape key to close menu */
  jQuery('.serach_inner').on('keyup', function(e){
    if (jQuery('body').hasClass('search-focus'))
    if (e.keyCode === 27 ) {
      jQuery('body').removeClass('search-focus');
      bakery_treats_search_lastTab.focus();
    };
  });
}

document.addEventListener('DOMContentLoaded', function() {
    const header = document.querySelector('.sticky-header');
    if (header) { // Check if header exists
        window.addEventListener('scroll', function() {
        if (window.scrollY > 0) {
            header.classList.add('stickyon');
        } else {
            header.classList.remove('stickyon');
        }
        });
    }
});
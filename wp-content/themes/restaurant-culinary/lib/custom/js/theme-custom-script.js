jQuery(document).ready(function ($) {
    "use strict";
    var isMobile = false;
    if (/Android|webOS|iPhone|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        $('html').addClass('touch');
        isMobile = true;
    } else {
        $('html').addClass('no-touch');
        isMobile = false;
    }
    
    // Banner Slider
    var swiper = new Swiper('.theme-main-carousel', {
        centeredSlides: true,
        slidesPerView: 1,
        loop: true,
        spaceBetween: 0,
        speed: 1000,
        roundLengths: true,
        keyboard: true,
        parallax: true,
        mousewheel: false,
        grabCursor: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            768: {
                slidesPerView: 1,
            },
            1200: {
                slidesPerView: 1,
            },
            1600: {
                slidesPerView: 1,
            }
        }
    });

    // Scroll To
    $(".scroll-content").click(function () {
        $('html, body').animate({
            scrollTop: $("#site-content").offset().top
        }, 500);
    });
    // Aub Menu Toggle
    $('.submenu-toggle').click(function () {
        $(this).toggleClass('button-toggle-active');
        var currentClass = $(this).attr('data-toggle-target');
        $(currentClass).toggleClass('submenu-toggle-active');
    });
    $('.skip-link-menu-start').focus(function () {
        if (!$("#offcanvas-menu #primary-nav-offcanvas").length == 0) {
            $("#offcanvas-menu #primary-nav-offcanvas ul li:last-child a").focus();
        }
    });
    // Toggle Menu
    $('.navbar-control-offcanvas').click(function () {
        $(this).addClass('active');
        $('body').addClass('body-scroll-locked');
        $('#offcanvas-menu').toggleClass('offcanvas-menu-active');
        $('.button-offcanvas-close').focus();
    });
    $('.offcanvas-close .button-offcanvas-close').click(function () {
        $('#offcanvas-menu').removeClass('offcanvas-menu-active');
        $('.navbar-control-offcanvas').removeClass('active');
        $('body').removeClass('body-scroll-locked');
        setTimeout(function () {
            $('.navbar-control-offcanvas').focus();
        }, 300);
    });
    $('#offcanvas-menu').click(function () {
        $('#offcanvas-menu').removeClass('offcanvas-menu-active');
        $('.navbar-control-offcanvas').removeClass('active');
        $('body').removeClass('body-scroll-locked');
    });
    $(".offcanvas-wraper").click(function (e) {
        e.stopPropagation(); //stops click event from reaching document
    });
    $('.skip-link-menu-end').on('focus', function () {
        $('.button-offcanvas-close').focus();
    });
    // Data Background
    var pageSection = $(".data-bg");
    pageSection.each(function (indx) {
        if ($(this).attr("data-background")) {
            $(this).css("background-image", "url(" + $(this).data("background") + ")");
        }
    });
    // Scroll to Top on Click
    $('.to-the-top').click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 700);
        return false;
    });

    jQuery(".slide-heading-main h3.slide-sub-title").html(function() {
        var text = jQuery(this).text().trim().split(" ");

        // Check if there is a third word to wrap
        if (text.length >= 3 && text[2].trim() !== '') {
            var thirdWord = text[2];
            var updatedThirdWord = `<span class='third_word_span'>${thirdWord}</span>`;
            text.splice(2, 1, updatedThirdWord); // Replace the 3rd word with the updated version
        }

        return text.join(" "); // Join the array of words back into a string and return as HTML content
    });

});

jQuery(function() {
  jQuery(".toggle-menu").click(function() {
    jQuery(this).toggleClass("active");
    jQuery('.menu-drawer').toggleClass("open");
  });
});

jQuery(document).ready(function(){
    jQuery('a[href="#search"]').on('click', function(event) {                    
        jQuery('#search').addClass('open');
        jQuery('#search > form > input[type="search"]').focus();
    });            
    jQuery('#search, #search button.close').on('click keyup', function(event) {
        if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
            jQuery(this).removeClass('open');
        }
    });            
});

//Loader
jQuery(window).load(function() {
  jQuery(".preloader").delay(2000).fadeOut("slow");
});

//Sticky
jQuery(window).scroll(function() {
var data_sticky = jQuery('#center-header').attr('data-sticky');

if (data_sticky == "true") {
    if (jQuery(this).scrollTop() > 1){
    jQuery('.Stickyy').addClass("stick_head");
    } else {
    jQuery('.Stickyy').removeClass("stick_head");
    }
}
});
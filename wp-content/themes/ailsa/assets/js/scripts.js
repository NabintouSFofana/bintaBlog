/*
 * All Scripts Used in this Ailsa Theme
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */

// Menubar Side Navigation

function openNav() {
  if (jQuery('#aisa-wrap').hasClass('aisa-sticky')) {
    jQuery('#aisa-wrap').addClass('openNav');
  }
  document.getElementById("aisa-aside").style.transform = "translate3d(0px, 0, 0)";
  document.getElementById("aisa-wrap").style.transform = "translate3d(360px, 0, 0)";
  document.body.style.overflowX = "hidden";
  document.getElementById("aisa-closebtn").style.visibility = "visible";
  document.getElementById("aisa-closebtn").style.opacity = "1";
}

function closeNav() {
  jQuery('#aisa-wrap').removeClass('openNav');
  document.getElementById("aisa-aside").style.transform = "translate3d(-360px, 0, 0)";
  document.getElementById("aisa-wrap").style.transform = "inherit";
  document.getElementById("aisa-closebtn").style.visibility = "hidden";
  document.getElementById("aisa-closebtn").style.opacity = "0";
}

jQuery(document).ready(function($) {
  "use strict";

  var offset = $('.aisa-header').height();
  var scrolling = $('.aisa-socialbar').height();
  var duration = 500;

  // Magnific Popup
  $('.aisa-gallery').magnificPopup({
    delegate: 'a',
    type: 'image',
    closeOnContentClick: false,
    closeBtnInside: false,
    mainClass: 'mfp-with-zoom',
    image: {
      verticalFit: true,
    },
    gallery: {
      enabled: true,
    },
    zoom: {
      enabled: true,
      duration: 300,
      opener: function(element) {
        return element.find('img');
	  }
    }
  });

  $('.aisa-img-popup').magnificPopup({
    type: 'image',
    closeOnContentClick: false,
    closeOnBgClick: true,
    closeBtnInside: false,
    mainClass: 'mfp-with-zoom',
    image: {
      verticalFit: true
    },
    zoom: {
      enabled: true,
      duration: 300,
      opener: function(element) {
        return element.find('img');
	  }
    }
  });

   $(".meks-instagram-widget a").removeAttr("title");

  // OWL Carousel
  $('.aisa-banner-carousel').owlCarousel({
    items: 3,
    loop: true,
    nav: false,
    navText: false,
    dots: false,
    autoplay: true,
    responsive: {
      0: {
        items: 1
      },
      481: {
        items: 2
      },
      868: {
        items: 3
      }
    }
  });

  // Slicknav Mobile Menu
  $('#aisa-menu').slicknav({
    label: '',
    duplicate: true,
    nestedParentLinks: true,
    duration: 200,
    allowParentLinks: true,
    prependTo: '#logobar'
  });

  // Back To Top
  $(window).scroll(function() {
    var currentPosition = $(this).scrollTop();
    if (currentPosition < offset) {
      $('.aisa-right.scrolling').hide();
    } else {
      $('.aisa-right.scrolling').show();
    }
  });

  $('.aisa-right .goto-top a').click(function(event) {
    event.preventDefault();
    $('html, body').animate({
      scrollTop: 0
    }, duration);
    return false;
  });

  // FitJs Video
  $(".aisa-content").fitVids();

});

// OWL Carousel
jQuery(window).load(function() {

  "use strict";

  jQuery('.aisa-container-carousel').owlCarousel({
    items: 1,
    loop: true,
    nav: true,
    dots: false,
    autoplay: true,
    autoHeight: true,
    navText: ["<i class='fa fa-angle-left' aria-hidden='true'></i>", "<i class='fa fa-angle-right' aria-hidden='true'></i>"],
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 1
      }
    }
  });

  jQuery('.aisa-featureImg-carousel').owlCarousel({
    items: 1,
    loop: true,
    nav: true,
    dots: false,
    autoplay: true,
    autoHeight: true,
    navText: ["<i class='fa fa-angle-left' aria-hidden='true'></i>", "<i class='fa fa-angle-right' aria-hidden='true'></i>"],
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 1
      }
    }
  });
});
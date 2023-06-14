//@prepros-prepend fslightbox.js
//@prepros-prepend owl.carousel.min.js
//@prepros-prepend slick.min.js
//@prepros-prepend scrollreveal.js

jQuery(document).ready(function ($) {




  /* ADD CLASS ON SCROLL*/

  $(window).scroll(function () {
    var scroll = $(window).scrollTop();

    if (scroll >= 100) {
      $("body").addClass("scrolled");
    } else {
      $("body").removeClass("scrolled");
    }
  });

  // ========== Controller for lightbox elements



  // ========== NAVBAR SCROLL AWAY


  //  $(document).ready(function () {
  //   "use strict";

  //   var c,
  //     currentScrollTop = 0,
  //     navbar = $("#navbar");

  //   $(window).scroll(function () {
  //     var a = $(window).scrollTop();
  //     var b = navbar.height();

  //     currentScrollTop = a;

  //     if (c < currentScrollTop && a > b + b) {
  //       navbar.addClass("scrollUp");
  //     } else if (c > currentScrollTop && !(a <= b)) {
  //       navbar.removeClass("scrollUp");
  //     }
  //     c = currentScrollTop;
  //   });
  // });




  //=========== Slick Slider

  $('.testimonial-carousel').slick({
    centerMode: false,
    centerPadding: '125px',
    slidesToShow: 1,
    arrows: false,
    dots: true,
    autoplay: true,
    autoplaySpeed: 5000,
  });

  $('.hero-slider').slick({
    centerMode: false,
    centerPadding: '125px',
    slidesToShow: 1,
    arrows: false,
    autoplay: true,
    autoplaySpeed: 7000,
  });



  $(document).ready(function () {
    $(".block__title").click(function (event) {
      if ($(".block").hasClass("one")) {
        $(".block__title").not($(this)).removeClass("active");
        $(".block__text").not($(this).next()).slideUp(300);
      }
      $(this).toggleClass("active").next().slideToggle(300);
    });
  });


  //=========== Scroll Reveal






  // var slideLeft = {
  //     distance: "40px",
  //     origin: "left",
  //     opacity: 0.0,
  //     duration: 1000,
  //     delay: 250,
  //     mobile: false,
  //   };
  //   var slideRight = {
  //     distance: "40px",
  //     origin: "right",
  //     opacity: 0.0,
  //     duration: 1000,
  //     mobile: false,
  //   };
  var slideDown = {
    distance: "40px",
    origin: "top",
    opacity: 0.0,
    duration: 1000,
  };
  var slideUp = {
    distance: "40px",
    origin: "bottom",
    opacity: 0.0,
    duration: 1000,
  };
  var tileDown = {
    distance: "40px",
    origin: "top",
    opacity: 0.0,
    duration: 1500,
    interval: 40,
    reset: true,
  };

  //   ScrollReveal().reveal(".fmleft", slideLeft);
  ScrollReveal().reveal(".fmtop", slideDown);
  ScrollReveal().reveal(".fmbottom", slideUp);
  //   ScrollReveal().reveal(".fmright", slideRight);
  ScrollReveal().reveal('.tile', tileDown);
  //   ScrollReveal().reveal(".row-default", slideRight);
  //   ScrollReveal().reveal(".row-reverse", slideLeft);


  // ScrollReveal().reveal('.tile', { duration   : 600,
  //    delay: 500,
  //     useDelay: 'onload',
  //     reset: true,
  //     reset      : true,
  //     viewFactor : 0, 

  //   });


  // Show the first tab and hide the rest
  $('#tabs-nav li:first-child').addClass('active');
  $('.tab-content').hide();
  $('.tab-content:first').show();

  // Click function
  $('#tabs-nav li').click(function () {
    $('#tabs-nav li').removeClass('active');
    $(this).addClass('active');
    $('.tab-content').hide();

    var activeTab = $(this).find('a').attr('href');
    $(activeTab).fadeIn();
    return false;
  });


  // NAV BAR

  $('.burger').click(function () {
    $('.mobile-header').toggleClass('is--active');
    $('.mobile-nav').toggleClass('is--active');
  });









  //==============BLOG READ MORE AJAX CALL


  var ppp = 4; // Post per page
  var pageNumber = 1;


  function load_posts() {
    pageNumber++;
    var str = '&pageNumber=' + pageNumber + '&ppp=' + ppp + '&action=more_post_ajax';
    $.ajax({
      type: "POST",
      dataType: "html",
      url: ajax_posts.ajaxurl,
      data: str,
      success: function (data) {
        var $data = $(data);
        if ($data.length) {
          $("#ajax-posts").append($data);
          //$("#more_posts").attr("disabled",false); // Uncomment this if you want to disable the button once all posts are loaded
          $("#more_posts").hide(); // This will hide the button once all posts have been loaded
        } else {
          $("#more_posts").attr("disabled", true);
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
      }

    });
    return false;
  }

  $("#more_posts").on("click", function () { // When btn is pressed.
    $("#more_posts").attr("disabled", true); // Disable the button, temp.
    load_posts();
    $(this).insertAfter('#ajax-posts'); // Move the 'Load More' button to the end of the the newly added posts.
  });




  $(".mobile-nav__menu .menu-item-has-children").append("<div class=more></div>");

  $('.more').click(function () {
    console.log('clicked');
  });

  //===========SUBMENU OPEN


  $('.more').click(function (e) {
    $('.sub-menu').removeClass('is-expanded');
    $(this).parent().find('.sub-menu').addClass('is-expanded');

    e.preventDefault();
  });


  // $(window).bind('orientationchange', function (event) {
  //     location.reload(true);
  // });


  // // Open external links in a popup modal notice
  // $(window).on('load', function(){

  // 	$.expr[":"].external = function(a) {
  // 		//var linkHref = a.hostname;
  // 		//var domainHref = location.hostname;

  // 		var linkhn = a.hostname.split('.').reverse();
  // 		var linkHref = linkhn[1] + "." + linkhn[0];

  // 		var domainhn = window.location.hostname.split('.').reverse();
  // 		var domainHref = domainhn[1] + "." + domainhn[0];

  // 		return !a.href.match(/^mailto\:/) && !a.href.match(/^tel\:/) && linkHref !== domainHref;
  // 	};

  // 	$("a:external").addClass("ext_link");

  // 	$(function() {

  // 		$('a.ext_link').click(function() {
  // 			 // open a modal 
  // 			$('a:external').attr('data-toggle', 'modal');
  // 			$('a:external').attr('data-target', '#speedbump');
  // 			//go to link on modal close
  // 			var url = $(this).attr('href');
  // 			$('.btn-modal.btn-continue').click(function() {
  // 				window.open(url);
  // 				$('.btn-modal.btn-continue').off();
  // 			});
  // 			$('.btn-modal.btn-close').click(function() {
  // 				$('#speedbump').modal('hide');
  // 				$('.btn-modal.btn-close').off();
  // 			}); 
  // 		});

  // 	});  
  // });

}); //Don't remove ---- end of jQuery wrapper



var lightbox = new FsLightbox();

// ==============================
// Nav
// ========================================

const links = document.querySelectorAll('a');
links.forEach(link => {
  const isExternal = link.href.startsWith('http') && !link.href.includes(window.location.origin) && !link.href.includes('dashboard') && !link.href.includes('hubspot.com');
  if (isExternal) {
    link.addEventListener('click', e => {
      e.preventDefault();
      const modal = document.querySelector('#speedbump');
      const continueLink = modal.querySelector('.continue-link');
      continueLink.setAttribute('href', link.href);
      continueLink.setAttribute('target', '_blank');
      const closeButton = modal.querySelector('.close-button');
      closeButton.addEventListener('click', e => {
        e.preventDefault();
        modal.classList.remove('active');
      });
      continueLink.addEventListener('click', e => {
        modal.classList.remove('active');
      });
      modal.classList.add('active');
    });
  }
});
// this is the main javascript file to be included in all pages of the site

var debug = false;
var mobileMenu = 1300;
	//var ch = $('#transform').outerHeight();

(function(root,$,undefined){

	"use strict";

	$(function(){














		/* ***********************************************************************

		Action: Click Event
		Description: Were tracking the active anchor link and set the active class
		in the menu.  On click of a menu item the page will auto scroll to the
		section.




		 *********************************************************************** */


	 //remove all empty href's from vet wall grid
	 $("ul#memorial > li a[href='']").remove()



	 if( $('.js__vet').length > 0 ){
			 // Magnific Popup
			 $(".js__vet").magnificPopup({
					 // type: "iframe"
					 type: "ajax",
					 closeMarkup: '<button title="%title%" aria-label="Close (Esc)" type="button" class="mfp-close">&#215;</button>',
					 closeOnContentClick: false,
					 closeOnBgClick: true,
					 enableEscapeKey: false,
					 verticalFit: true,
					 removalDelay: 300,
					 mainClass: 'mfp-fade'
			 });
	 }



		//MOBILE NAV CLICK EVENT ON HAMBURGER
		$('.js-hideshowmobilenav').click(function() {
			$('nav.mainnav ul').toggleClass('open');
			$('.js-nav').toggleClass('open');
			$('.js-hideshowmobilenav').toggleClass('active');//resets hamburger X to start position.
		});

		if( $('body').hasClass('home') ){
				// on init / page load
				$('.neu__slick').on('init reInit', function (e, slick) {

						// get current slide index
						var current = slick.currentSlide;

						// get data-src attr if available
						var slideSrc = $(slick.$slides[current]).attr('data-src');

						// if data-src was captured
						if (slideSrc) {
								// set href value to data-src value
								$(slick.$slides[current]).attr('href', slideSrc);
						}

				});


				// on slide change (after)
				//
				$('.neu__slick').on('afterChange', function (e, slick, currentSlide, nextSlide) {

						// remove the href from every slide
						$(slick.$slides).each(function (slide) {
								$(this).attr('href', 'javascript:;')
						});

						// get current slide index
						var current = slick.currentSlide;

						// get data-src attr if available
						var slideSrc = $(slick.$slides[current]).attr('data-src');

						// if data-src was captured
						if (slideSrc) {
								// set href value to data-src value
								$(slick.$slides[current]).attr('href', slideSrc);
						}

				});

				$('.neu__slick').slick({
						centerMode: true,
						slidesToShow: 1,
						focusOnSelect: true,
						focusOnChange: true,
						variableWidth: true,
						arrows: false,
						responsive: [{
								breakpoint: 720,
								settings: {
										arrows: true
												// ,appendArrows : $('.neu__slick_item_image')
												,
										prevArrow: '<button type="button" class="slick-prev" title="View previous slide" aria-label="View previous slide">Previous</button>',
										nextArrow: '<button type="button" class="slick-next" title="View next slide" aria-label="View next slide">Next</button>'
								}
						}]
				});

				// refresh on resize (avoid laggy, janky resizing due to slick delaying repaint until after the resize completes)
				$(window).on('resize', function () {
						$('.neu__slick')[0].slick.refresh();
				});

		}






    // this is for testing and validating break points based on screen size, turned on and off using global var above
		if(debug){
	    var wi = $(window).width();
	    $("p.testp").text('Screen width is currently: ' + wi + 'px.');

	    $(window).resize(function(){
	      var wi = $(window).width();
					// var ch = $('#transform').outerHeight();
					//
					// imgSize();


	      if (wi <= 576){
	        $("p.testp").text('Screen width is less than or equal to 576px. Width is currently: ' + wi + 'px.');
	      }else if (wi <= 680){
	        $("p.testp").text('Screen width is between 577px and 680px. Width is currently: ' + wi + 'px.');
	      }else if (wi <= 1024){
	        $("p.testp").text('Screen width is between 681px and 1024px. Width is currently: ' + wi + 'px.');
	      }else if (wi <= 1500){
	        $("p.testp").text('Screen width is between 1025px and 1499px. Width is currently: ' + wi + 'px.');
	      }else {
	        $("p.testp").text('Screen width is greater than 1500px. Width is currently: ' + wi + 'px.');
	    	}
	    });
		}
		/* ********************************************** */


  });
}(this,jQuery));

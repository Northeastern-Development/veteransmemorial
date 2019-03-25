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





	// var mainOffset = $('main').offset().top;
	// var headerOffset = $('.js-nav').offset().top - 220;
	//
	// var sections = $('.js-sections')
  // , nav = $('.js-nav')
  // , headersHeight = 220
	// , mobileHeaderHeight = 124
	//
	// $(window).on('scroll', function () {
	//   var cur_pos = $(window).scrollTop();
	// 	var scrollHeight = $(document).height();
	// 	var scrollPosition = $(window).height() + cur_pos;
	// 	if (cur_pos >= headerOffset) {
	// 		nav.addClass('nav__fixed');
	// 	}else if ($(window).width() < mobileMenu){
	// 		nav.addClass('nav__fixed');
	// 	}else {  //Returns the nav to the initial page load position
	// 		nav.removeClass('nav__fixed');
	// 		$('nav.mainnav ul > li > a').removeClass('active');
	// 	}
	//
	//
	//   sections.each(function() {
	//     var top = $(this).offset().top - headersHeight,
	//         bottom = top + $(this).outerHeight();
	//     if (cur_pos >= top && cur_pos <= bottom) {
	//       nav.find('a').removeClass('active');
	//       sections.removeClass('active');
	//       $(this).addClass('active');
	//       nav.find('a[href="#'+$(this).attr('id')+'"]').addClass('active');
	//     }else if((scrollHeight - scrollPosition) / scrollHeight === 0) {	//We've gotten to the bottom so highlight last nav item
	// 			nav.find('a').removeClass('active');
	// 			sections.removeClass('active');
	// 			$('nav.mainnav ul > li#menu-item-154 a').addClass('active');
	// 			//alert('BOTTOM');
	// 		}
	//   });
	//
	//
	// });
	//
	// nav.find('a').on('click', function () {
	// 	$('.js-nav, .main-navigation').toggleClass('open');
	// 	// console.log(navHeight);
	//
	//
	// 	$('.js-hideshowmobilenav').removeClass('active');//resets hamburger X to start position.
	// 	$('body').removeClass('noscroll');//enable body scroll
	//   var $el = $(this)
	//     , id = $el.attr('href');
	// 	if ($(window).width() < mobileMenu){//offset is different as we are removing the nav bar and merging it into the header
	// 		$('html, body').animate({
	// 	    scrollTop: $(id).offset().top - mobileHeaderHeight
	// 	  }, 500);
	// 		return false;
	// 	}else {
	// 	  $('html, body').animate({
	// 	    scrollTop: $(id).offset().top - 215
	// 	  }, 500);
	// 		return false;
	// 	}
	// 	//removeHash();//removes hash
	//
	//
	// });




	//MOBILE NAV CLICK EVENT ON HAMBURGER
	$('.js-hideshowmobilenav').click(function() {
		$('nav.mainnav ul').toggleClass('open');
		$('.js-nav').toggleClass('open');
		$('.js-hideshowmobilenav').toggleClass('active');//resets hamburger X to start position.
	});






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

// this is the main javascript file to be included in all pages of the site

var debug = false;
var mobileMenu = 700;
var inMotion = false;
var clickTot = 0; // the number of times the user has clicked to another "page" so that we know where they are
var colsVisible = 15.5;
var direction = '';
// set up some global variables
var findNumPos = '';  // this is to test the auto-scroll feature to find a tag on the wall
var hashValue = location.hash;
var Theme = {};

	// set up some global variables
	// css slect placeholder styling
	[].forEach.call(document.querySelectorAll('select'), function(currentSelect) {
	  // Trigger placeholder method for the first time
	  updatePlaceholder(currentSelect);

	  // Bind change event to every select that is found on the page.
	  currentSelect.addEventListener('change', function() {
	    updatePlaceholder(this);
	  });

	});


	function updatePlaceholder(select) {
	  select.classList.toggle('unselected', !select[select.selectedIndex].value);
	}



(function(root,$,undefined){

	"use strict";

	$(function(){



  // listen for clicks on the left and right arrows to shift the wall view
  $('#wallblock').on('click','.js__wall-scroll',function(){

    if(!inMotion){  // if we are not already trying to move something

      $(this).blur();

      // determine direction and what distance we have slid

      direction = ($(this).hasClass("right")?'-=':'+=');

      if(direction == '-='){
        clickTot++;
      }

      if(clickTot <= 3){
        colsVisible = 15.5;
      }else{
        colsVisible = 4.6;
      }

      if(direction == '+='){
        clickTot--;
      }

      // figure out some of the layout and slider settings

      var convertVW = (100 / $(window).width());
      var colWidth = ($('ul.tags > li').outerWidth() * convertVW);
      var offset = (colWidth * colsVisible);
      var cPos = parseInt($('#slider').css('left'));

      moveWall(direction,offset);

    }
});


 


  // this function will actually make the wall move left and right
  // a = the direction to move the wall
  // b = the distance that we want to move the wall

  function moveWall(a,b){

    inMotion = true;

    $('#slider').animate({
      left: a+b+"vw"
    },500,function(){
      inMotion = false;

      // prevent scrolling past the last grouping on the right if we are at the end

      if(clickTot == 4){
        $('.js__wall-scroll.right').css({'pointer-events':'none'});
      }else{
        $('.js__wall-scroll.right').css({'pointer-events':'all'});
      }

      // prevent scrolling past the start on the left if we are at the start

      if(parseInt($('#slider').css('left')) < 0){
        $('.js__wall-scroll.left').css({'pointer-events':'all'});
      }else{
        $('.js__wall-scroll.left').css({'pointer-events':'none'});
        clickTot = 0;
      }
    });
  }



function autoScrollWall(){

    $('#slider').css({'left':'0px'});

    direction = '-='; // we always only move in one direction

    var convertVW = (100 / $(window).width());
    var colWidth = ($('ul.tags > li').outerWidth() * convertVW);
    var offsett = 0;



    if(findNumPos <= 14){
      clickTot = 0;
    }else if(findNumPos >= 15 && findNumPos < 27){
      clickTot = 1;
      offsett = (colWidth * (colsVisible * clickTot));
    }else if(findNumPos >= 28 && findNumPos < 40){
      clickTot = 2;
      offsett = (colWidth * (colsVisible * clickTot));
    }else if(findNumPos >= 41 && findNumPos < 53){
      clickTot = 3;
      offsett = (colWidth * (colsVisible * clickTot));
    }else if(findNumPos >= 53 && findNumPos <= 57){
      clickTot = 4;
      offsett = (colWidth * (colsVisible * 3)) + (colWidth * 4.6);
    }

    moveWall(direction,offsett);
  }











//WALL IS HIDDEN SO ON SEARCH ON CLICK OF A NAME WE WILL SCROLL TO THE LIST BELOW
if($("#thewall").is(":hidden")){
	if(hashValue.length == 0) {

	}else {
		var id = hashValue = hashValue.replace(/^#/, '').toLowerCase()
		var offTop = $('a.js__vet[data-id='+id+']').offset().top - 144;
		setHighlightList(hashValue);
		$(window).scrollTop(parseInt(offTop))
	}
}else {
	if(hashValue.length == 0) {// we don't want the page to scroll if we dont have a hash value

	}else {

		hashValue = hashValue.replace(/^#/, '');
		// console.log(hashValue);
		var offTop = $('#thewall').offset().top -144;
		setHighlight(hashValue);
		$(window).scrollTop(parseInt(offTop));
	}
}




	//HERO-LIST
	function setHighlightList(b){
		// var findNumPosition = a.split('-');
		// findNumPos = findNumPosition[1];

		var findNumPosition = b.split('-');
		findNumPos = findNumPosition[1];

		$("[data-id='" + b.toLowerCase() + "']").addClass('selected');// adding selected class to active hash tag

		var fname = $("[id='" + b.toLowerCase() + "']").find("a").attr("data-fname");
		var lname = $("[id='" + b.toLowerCase() + "']").find("a").attr("data-lname");
		var mname = $("[id='" + b.toLowerCase() + "']").find("a").attr("data-mname");

		name = (lname != ''?lname:'')+(fname != ''?', '+fname:'')+(mname != ''?' '+mname:'');	// last, first middle

		// alert(name);

		$('form.search-container > div > input#search-bar').val(name +' ('+findNumPosition[0]+findNumPosition[1]+')');

		// var thisSelectedInputName = $("[data-id='" + a.toLowerCase() + "']").find("p.name").html();
		// var thisResult = thisSelectedInputName.split(" ");
		// //console.log(thisResult);
		// if (thisResult.length == 2){
		// 	 name = thisResult[1],thisResult[2];
		// 	$('form.search-container > div > input#search-bar').val(thisResult[1]+', '+thisResult[0] +' ('+findNumPosition[0]+findNumPosition[1]+')');
		// }
		// if (thisResult.length == 3){
		// 	name = thisResult[1],thisResult[0],thisResult[2];
		//
		// 	$('form.search-container > div > input#search-bar').val(thisResult[1]+' '+thisResult[2]+', '+thisResult[0] +' ('+findNumPosition[0]+findNumPosition[1]+')');
		// }

	}

	//WALL
	function setHighlight(a){

		 var findNumPosition = a.split('-');
		 findNumPos = findNumPosition[1];

		 $("[id='" + a.toLowerCase() + "']").addClass('selected');// adding selected class to active hash tag
		 autoScrollWall();


		 // var thisSelectedInputName = $("[id='" + a.toLowerCase() + "']").find("p.name").html();
		 // var thisResult = thisSelectedInputName.split(" ");
		 var fname = $("[id='" + a.toLowerCase() + "']").find("a").attr("data-fname");
		 var lname = $("[id='" + a.toLowerCase() + "']").find("a").attr("data-lname");
		 var mname = $("[id='" + a.toLowerCase() + "']").find("a").attr("data-mname");
		 // alert(fname);
		 // if (thisResult.length == 2){
			//   name = thisResult[1]+', '+thisResult[2];
			//  $('form.search-container > div > input#search-bar').val(name +' ('+findNumPosition[0]+findNumPosition[1]+')');
		 // }
		 // if (thisResult.length == 3){
			//  name = thisResult[1]+', '+thisResult[0]+' '+thisResult[2];
		 //
			//  $('form.search-container > div > input#search-bar').val(name +' ('+findNumPosition[0]+findNumPosition[1]+')');
		 // }
		 // if (thisResult.length == 4){
			//  name = thisResult[1]+', '+thisResult[0]+' '+thisResult[2];
		 //
			//  $('form.search-container > div > input#search-bar').val(name +' ('+findNumPosition[0]+findNumPosition[1]+')');
		 // }

		 name = (lname != ''?lname:'')+(fname != ''?', '+fname:'')+(mname != ''?' '+mname:'');	// last, first middle

		 // alert(name);

		 $('form.search-container > div > input#search-bar').val(name +' ('+findNumPosition[0]+findNumPosition[1]+')');

		 // name = '';

		 // if (thisResult.length == 4){
			//  name = thisResult[1],thisResult[0],thisResult[3];
		 // }




// console.log(thisResult);

		  // $('form.search-container > div > input#search-bar').val(name +' ('+findNumPosition[0]+findNumPosition[1]+')');

	}


	// if($("#thewall").is(":hidden")){
	//
	//
	// }else {
	//
	// }




	$('div#datafetch').on('click','ul > li a.js__noreload',function(event){
		event.preventDefault();
		if($("#thewall").is(":hidden")){
			var searchResult = $('div#datafetch ul li a').html();
			$('form.search-container > div > input#search-bar').val(searchResult);
			$('div#datafetch > ul').css({'display':'none'});

			thisHash = $(this).attr('href').split('#');
			var hash = thisHash[1].toLowerCase();
			setHighlightList(thisHash[1]);
			var listTop = $('a.js__vet[data-id='+hash+']').offset().top - 144;
			$('html,body').animate({
				scrollTop: $('a.js__vet[data-id='+hash+']').offset().top - 184 // this scroll us to the top of the wall container + header height and a 60 px margin top from header
			});


		}else {
			var thisHash = $(this).attr('href').split('#');

			var searchResult = $('div#datafetch ul li a').html();
			$('form.search-container > div > input#search-bar').val(searchResult);
			$('div#datafetch > ul').css({'display':'none'});

			// closeResults();
			setHighlight(thisHash[1]);
			$('html,body').animate({
				scrollTop: $("#thewall").offset().top - 184 // this scroll us to the top of the wall container + header height and a 60 px margin top from header
			});
		}
	});



	// $('div#datafetch').on('click','ul > li a.js__noreload',function(event){
	// 	event.preventDefault();
	// 	var thisHash = $(this).attr('href').split('#');
	// 	clearSearch();
	// 	setHighlight(thisHash[1]);
	// 	$('html,body').animate({
	// 		scrollTop: $("#thewall").offset().top - 184 // this scroll us to the top of the wall container + header height and a 60 px margin top from header
	// 	});
	// });






	function removeHighlight(){
		$(this).blur();
		$(".active").removeClass('selected');
		 $('.flex-table > a.selected').removeClass('selected');

	}






		//REMOVES focused element on hero grid once you click on another vet tag
		 $('#wallblock').on('click','ul.tags > li.active',function(){
				removeHighlight();
				$('#search-bar').val('');

		 });





		//REMOVES focused element on hero grid once you click on left or right arrow
		$('#wallblock').on('click','.js__wall-scroll',function(){
		 	 removeHighlight();
	  });





	 $('#search-bar').click(function () {
		 removeHighlight();

		 $('#slider').css({'left':0});
		 // $('.js-vet').removeClass('selected');
	 });




	 //PREVENTS RETURN KEY ON SEARCH FORM
	 $('form.search-container > div > input#search-bar').keypress(function (event) {
    if (event.keyCode === 10 || event.keyCode === 13) {
        event.preventDefault();
    }
	});


	/* ***********************************************************************

	Action: function
	Description: clearing the input value, returning focus back to input
	and clearing the search results list.




	 *********************************************************************** */




	 function clearSearch(){
		 $('#search-bar').val('');
		 $('#search-bar').focus();
		 $('#datafetch > ul').remove();
		 // $('div#datafetch > ul').css({'display':'none'});
	 }






	 /* ***********************************************************************

	 Action: Click Event
	 Description: on click of the reset button in the search input we are
	 restting the wall back to postion 0, removing active states for the active
	 vet tag in the wall or active vet in the hero list. We are also clearing
	 the search field.




		*********************************************************************** */



		//reset buttom on search
		$('button.reset').click(function () {
			clearSearch();
			removeHighlight();
			$('#slider').css({'left':0});

		});



		// $("section.wall > div#wallblock div#thewall ul.tags > li:not(.active)").each(function (i) { $(this).attr('tabindex', i - 1); });

		// $("section.wall > div#wallblock div#thewall ul.tags > li:not(.active)") .each(function (i) { $(this).attr('tabindex', i - 1); });
		// $("a").removeAttr("href");






		 /* ***********************************************************************

 		Action: Click Event
 		Description: LIGHTBOX FOR EVENTS PAGE TO OPEN VIDEO




 		 *********************************************************************** */


	if( $('.js__video').length > 0 ){
		 $('.js__video').magnificPopup({
	        // disableOn: 700,
	        type: 'iframe',
					iframe: {
			    	markup: '<div class="mfp-iframe-scaler">'+
		            		'<div class="mfp-close"></div>'+
		            		'<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>'+
		            		'</div>',

		     	},
					closeMarkup: '<button title="%title%" aria-label="Close (Esc)" type="button" class="mfp-close">CLOSE</button>',
					// closeMarkup: '<button title="%title%" aria-label="Close (Esc)" type="button" class="mfp-close">&#215;</button>',
					closeOnContentClick: false,
					closeOnBgClick: true,
					enableEscapeKey: false,
					//verticalFit: true,
					removalDelay: 300,
					mainClass: 'mfp-fade',
	    });
		}



		/* ***********************************************************************

	 Action: Click Event
	 Description: LIGHTBOX FOR FALLEN HEROES PAGE TO OPEN VET TAGS




		*********************************************************************** */

	 // if( $('.js__vet').length > 0 ){
			 // Magnific Popup

			 $(".js__vet").magnificPopup({
					 // type: "iframe"
					 type: "ajax",
					 closeMarkup: '<button title="%title%" aria-label="Close (Esc)" type="button" class="mfp-close">CLOSE</button>',
					 // closeMarkup: '<button title="%title%" aria-label="Close (Esc)" type="button" class="mfp-close">&#215;</button>',
					 closeOnContentClick: false,
					 fixedContentPos: 'auto',
					 closeOnBgClick: true,
					 enableEscapeKey: false,
					 //verticalFit: true,
					 removalDelay: 300,
					 //mainClass: 'mfp-fade',


					//  callbacks: {
					//     open: function() {
					//        $('body').addClass('magnificpopupnoscroll');
					//     },
					//     close: function() {
					//        $('body').removeClass('magnificpopupnoscroll');
					//     }
					// }

			 });
	 // }

	 /* ***********************************************************************

	Action: Click Event
	Description: REMOVES SELECTED CLASS FROM HERO LIST WHEN CLICKING ON A NEW NAME




	 *********************************************************************** */


	 $('.flex-table > a').click(function(){
	 	$('.flex-table > a.selected').removeClass('selected');
		$('#search-bar').val('');
	});



	/* ***********************************************************************

 Action: Click Event
 Description: MOBILE NAV CLICK EVENT ON HAMBURGER




	*********************************************************************** */


		$('.js-hideshowmobilenav').click(function(){
			$('html, body').toggleClass('noscroll');//prevents body from scrolling
			$('.nav-wrapper').toggleClass('expanded');
			$('nav.mainnav ul').toggleClass('show');
			$(this).toggleClass('active');


		});



	/* ***********************************************************************

	Action:
	Description: Initialize Slick IMAGE CAROUSEL ON THE HOME PAGE




	*********************************************************************** */


	if ($('body').hasClass('home')) {
			/**
			 * Initialize Slick
			 */
			$('.neu__slick').slick({
					centerMode: true,
					slidesToShow: 1,
					focusOnSelect: true,
					focusOnChange: true,
					variableWidth: true,
					arrows: true,
					appendArrows : $('.neu__slick'),
					prevArrow: '<button type="button" class="slick-arrow slick-prev" title="View previous slide" aria-label="View previous slide">Previous</button>',
					nextArrow: '<button type="button" class="slick-arrow slick-next" title="View next slide" aria-label="View next slide">Next</button>'
			});

			/**
			 * init hook
			 */
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


			/**
			 * beforeChange hook
			 */
			$('.neu__slick').on('beforeChange', function(e, slick, currentSlide, nextSlide){
					// do stuff
					$('.slick-slide').removeClass('neu__slick_item--zoomed');
			});



			/**
			 * afterChange hook
			 */
			$('.neu__slick').on('afterChange', function (e, slick, currentSlide) {

					// remove the zoom from all slides
					// $('.slick-current').removeClass('neu__slick_item--zoomed');

					if( $('.slick-next').is(':hover') ){
							$('.slick-track .slick-current').next().addClass('neu__slick_item--zoomed');
					} else {
							$('.slick-track .slick-current').next().removeClass('neu__slick_item--zoomed');
					}

					if( $('.slick-prev').is(':hover') ){
							$('.slick-track .slick-current').prev().addClass('neu__slick_item--zoomed');
					} else {
							$('.slick-track .slick-current').prev().removeClass('neu__slick_item--zoomed');
					}


					// remove the href from every slide
					$(slick.$slides).each(function (slide) {
							$(this).attr('href', 'javascript:void(0);');
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


			Theme.SlickHandler = {
					arrows : $('.slick-arrow')
					,container : $('.neu__slick')

					,_init : function(){
							Theme.SlickHandler.arrows.on('mouseenter mouseleave', Theme.SlickHandler._doHoverHandler);
							Theme.SlickHandler.container.on('click', '.slick-arrow',Theme.SlickHandler._doClickArrowHandler);
					}

					,_doClickArrowHandler : function(e){

							// if we clicked the next button
							if( $(e.target).hasClass('slick-next') ){
									// zoom in the 'next' slide
									$('.slick-track .slick-current').next().addClass('neu__slick_item--zoomed');
							}
							// if we clicked the prev button
							else {
									// zoom in the 'prev' slide
									$('.slick-track .slick-current').prev().addClass('neu__slick_item--zoomed');
							}
					}

					,_doHoverHandler : function(e){
							// if we ever mouse over an arrow
							if( e.type === 'mouseenter' ){
									// if we moused over the next arrow
									if( $(e.target).hasClass('slick-next') ){
											$('.slick-track .slick-current').next().addClass('neu__slick_item--zoomed');
									}
									// if we moused over the prev arrow
									else {
											$('.slick-track .slick-current').prev().addClass('neu__slick_item--zoomed');
									}
							}
							// if we ever mouse leave an arrow
							else if( e.type === 'mouseleave' ){
									// if we mouse leave the next arrow
									if( $(e.target).hasClass('slick-next') ){
											$('.slick-track .slick-current').next().removeClass('neu__slick_item--zoomed');
									}
									// if we mouse leave the prev arrow
									else {
											$('.slick-track .slick-current').prev().removeClass('neu__slick_item--zoomed');
									}
							}
					}
			}
			Theme.SlickHandler._init();

	} // end only on home page


		// if( $('body').hasClass('home') ){
		// 		// on init / page load
		// 		$('.neu__slick').on('init reInit', function (e, slick) {
		//
		// 				// get current slide index
		// 				var current = slick.currentSlide;
		//
		// 				// get data-src attr if available
		// 				var slideSrc = $(slick.$slides[current]).attr('data-src');
		//
		// 				// if data-src was captured
		// 				if (slideSrc) {
		// 						// set href value to data-src value
		// 						$(slick.$slides[current]).attr('href', slideSrc);
		// 				}
		//
		// 		});
		//
		//
		// 		// on slide change (after)
		// 		//
		// 		$('.neu__slick').on('afterChange', function (e, slick, currentSlide, nextSlide) {
		//
		// 				// remove the href from every slide
		// 				$(slick.$slides).each(function (slide) {
		// 						$(this).attr('href', 'javascript:void(0);')
		// 				});
		//
		// 				// get current slide index
		// 				var current = slick.currentSlide;
		//
		// 				// get data-src attr if available
		// 				var slideSrc = $(slick.$slides[current]).attr('data-src');
		//
		// 				// if data-src was captured
		// 				if (slideSrc) {
		// 						// set href value to data-src value
		// 						$(slick.$slides[current]).attr('href', slideSrc);
		// 				}
		//
		// 		});
		//
		// 		$('.neu__slick').slick({
		// 				centerMode: true,
		// 				slidesToShow: 1,
		// 				focusOnSelect: true,
		// 				focusOnChange: true,
		// 				variableWidth: true,
		// 				arrows: true,
		// 				prevArrow: '<button type="button" class="slick-arrow slick-prev" title="View previous slide" aria-label="View previous slide">Previous</button>',
		// 				nextArrow: '<button type="button" class="slick-arrow slick-next" title="View next slide" aria-label="View next slide">Next</button>',
		//
		// 				responsive: [{
		// 						breakpoint: 720,
		// 						settings: {
		// 								arrows: true
		// 										// ,appendArrows : $('.neu__slick_item_image')
		// 										,
		// 								prevArrow: '<button type="button" class="slick-prev" title="View previous slide" aria-label="View previous slide">Previous</button>',
		// 								nextArrow: '<button type="button" class="slick-next" title="View next slide" aria-label="View next slide">Next</button>'
		// 						}
		// 				}]
		// 		});
		//
		// 		// refresh on resize (avoid laggy, janky resizing due to slick delaying repaint until after the resize completes)
		// 		$(window).on('resize', function () {
		// 				$('.neu__slick')[0].slick.refresh();
		// 		});
		//
		// }


if(debug){
		var wi = $(window).width();
 	 	$("p.testp").text('Screen width is currently: ' + wi + 'px.');
		$(window).resize(function(){
			 var wi = $(window).width();
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


    // this is for testing and validating break points based on screen size, turned on and off using global var above


	    $(window).resize(function(){



				inMotion = true;

		    $('#slider').animate({
		      left: "0px"
		    },250,function(){
		      inMotion = false;
		      $('.js__wall-scroll.left').css({'pointer-events':'none'});  // prevent scrolling past the start on the left
		      $('.js__wall-scroll.right').css({'pointer-events':'all'});  // allow the user to scroll right
		      clickTot = 0;
		    });

				if($('#thewall').css('display') == 'none'){
					console.log('hidden');
				}else {
					console.log('shown');
				}
			});



		/* ********************************************** */


  });
}(this,jQuery));

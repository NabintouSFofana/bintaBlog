(function($) { "use strict";

	$('.vc_tta-accordion .vc_tta-controls-icon').removeClass('vc_tta-controls-icon').addClass('acc_icon_expand');
	$('.wpcf7-form').parents('.twelve').removeClass('columns');
	$('.cd-timeline-block').parent().addClass('cd-timeline');
	
	//Home Sections fit screen	
		
	$(function(){"use strict";
		$('.homex').css({'height':($(window).height())+'px'});
		$(window).resize(function(){
		$('.homex').css({'height':($(window).height())+'px'});
		});
	});

	$(".animsition").animsition({
	  
		inClass               :   'zoom-in-sm',
		outClass              :   'zoom-out-sm',
		inDuration            :    800,
		outDuration           :    800,
		linkElement           :   '.animsition-link', 
		// e.g. linkElement   :   'a:not([target="_blank"]):not([href^=#])'
		loading               :    true,
		loadingParentElement  :   'body', //animsition wrapper element
		loadingClass          :   'animsition-loading',
		unSupportCss          : [ 'animation-duration',
								  '-webkit-animation-duration',
								  '-o-animation-duration'
								],
		//"unSupportCss" option allows you to disable the "animsition" in case the css property in the array is not supported by your browser. 
		//The default setting is to disable the "animsition" in a browser that does not support "animation-duration".
		
		overlay               :   false,
		
		overlayClass          :   'animsition-overlay-slide',
		overlayParentElement  :   'body'
	  });
		
	//Page Scroll
	
	$(document).ready(function(){"use strict";
		$(".scroll").click(function(event){

			event.preventDefault();
			var full_url = this.href;
			var parts = full_url.split("#");
			var trgt = parts[1];
			var target_offset = $("#"+trgt).offset();
			var target_top = target_offset.top;

			$('html, body').animate({scrollTop:target_top}, 1000);
		});

	//Navigation


	$('.cd-primary-nav li a[href^="#"]').click(function(){
	   $(this).parent().find('> ul').toggle();
	   	return false;
	});
	$('.cd-primary-nav li a').click(function(){
	   	return true;
	});

		//if you change this breakpoint in the style.css file (or _layout.scss if you use SASS), don't forget to update this value as well
		var MqL = 1170;
		//move nav element position according to window width
		moveNavigation();
		$(window).on('resize', function(){
			(!window.requestAnimationFrame) ? setTimeout(moveNavigation, 300) : window.requestAnimationFrame(moveNavigation);
		});

		//mobile - open lateral menu clicking on the menu icon
		$('.cd-nav-trigger').on('click', function(event){
			event.preventDefault();
			if( $('.cd-main-content').hasClass('nav-is-visible') ) {
				closeNav();
				$('.cd-overlay').removeClass('is-visible');
			} else {
				$(this).addClass('nav-is-visible');
				$('.cd-primary-nav').addClass('nav-is-visible');
				$('.cd-main-header').addClass('nav-is-visible');
				$('.cd-main-content').addClass('nav-is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
					$('body').addClass('overflow-hidden');
				});
				toggleSearch('close');
				$('.cd-overlay').addClass('is-visible');
			}
		});

		//open search form
		$('.cd-search-trigger').on('click', function(event){
			event.preventDefault();
			toggleSearch();
			closeNav();
		});

		//close lateral menu on mobile 
		$('.cd-overlay').on('swiperight', function(){
			if($('.cd-primary-nav').hasClass('nav-is-visible')) {
				closeNav();
				$('.cd-overlay').removeClass('is-visible');
			}
		});
		$('.nav-on-left .cd-overlay').on('swipeleft', function(){
			if($('.cd-primary-nav').hasClass('nav-is-visible')) {
				closeNav();
				$('.cd-overlay').removeClass('is-visible');
			}
		});
		$('.cd-overlay').on('click', function(){
			closeNav();
			toggleSearch('close')
			$('.cd-overlay').removeClass('is-visible');
		});


		//prevent default clicking on direct children of .cd-primary-nav 
		$('.cd-primary-nav').children('.has-children').children('a').on('click', function(event){
			event.preventDefault();
		});
		//open submenu
		$('.has-children').children('a').on('click', function(event){
			if( !checkWindowWidth() ) event.preventDefault();
			var selected = $(this);
			if( selected.next('ul').hasClass('is-hidden') ) {
				//desktop version only
				selected.addClass('selected').next('ul').removeClass('is-hidden').end().parent('.has-children').parent('ul').addClass('moves-out');
				selected.parent('.has-children').siblings('.has-children').children('ul').addClass('is-hidden').end().children('a').removeClass('selected');
				$('.cd-overlay').addClass('is-visible');
			} else {
				selected.removeClass('selected').next('ul').addClass('is-hidden').end().parent('.has-children').parent('ul').removeClass('moves-out');
				$('.cd-overlay').removeClass('is-visible');
			}
			toggleSearch('close');
		});

		//submenu items - go back link
		$('.go-back').on('click', function(){
			$(this).parent('ul').addClass('is-hidden').parent('.has-children').parent('ul').removeClass('moves-out');
		});

		function closeNav() {
			$('.cd-nav-trigger').removeClass('nav-is-visible');
			$('.cd-main-header').removeClass('nav-is-visible');
			$('.cd-primary-nav').removeClass('nav-is-visible');
			$('.has-children ul').addClass('is-hidden');
			$('.has-children a').removeClass('selected');
			$('.moves-out').removeClass('moves-out');
			$('.cd-main-content').removeClass('nav-is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
				$('body').removeClass('overflow-hidden');
			});
		}

		function toggleSearch(type) {
			if(type=="close") {
				//close serach 
				$('.cd-search').removeClass('is-visible');
				$('.cd-search-trigger').removeClass('search-is-visible');
			} else {
				//toggle search visibility
				$('.cd-search').toggleClass('is-visible');
				$('.cd-search-trigger').toggleClass('search-is-visible');
				if($(window).width() > MqL && $('.cd-search').hasClass('is-visible')) $('.cd-search').find('input[type="search"]').focus();
				($('.cd-search').hasClass('is-visible')) ? $('.cd-overlay').addClass('is-visible') : $('.cd-overlay').removeClass('is-visible') ;
			}
		}

		function checkWindowWidth() {
			//check window width (scrollbar included)
			var e = window, 
				a = 'inner';
			if (!('innerWidth' in window )) {
				a = 'client';
				e = document.documentElement || document.body;
			}
			if ( e[ a+'Width' ] >= MqL ) {
				return true;
			} else {
				return false;
			}
		}

		function moveNavigation(){
			var navigation = $('.cd-nav');
			var desktop = checkWindowWidth();
			if ( desktop ) {
				navigation.detach();
				navigation.insertBefore('.cd-header-buttons');
			} else {
				navigation.detach();
				navigation.insertAfter('.cd-main-content');
			}
		}
 
	
	
	//Parallax

	$('.parallax-1').parallax("50%", 0.4);
	$('.parallax-blog-2').parallax("50%", 0.4);
	//Top Page Slider
	

	jQuery(document).ready(function($){	 
	  $("#owl-top-page-slider").owlCarousel({
		 
		navigation: false, 
		slideSpeed : 300,
		autoPlay : 5000,
		singleItem:true
	 
	  });
	});

  	//Responsive video
	
	$(".container").fitVids();
  

	
	//Interest Point 
	

		//open interest point description
		$('.cd-single-point').children('a').on('click', function(){
			var selectedPoint = $(this).parent('li');
			if( selectedPoint.hasClass('is-open') ) {
				selectedPoint.removeClass('is-open').addClass('visited');
			} else {
				selectedPoint.addClass('is-open').siblings('.cd-single-point.is-open').removeClass('is-open').addClass('visited');
			}
		});
		//close interest point description
		$('.cd-close-info').on('click', function(event){
			event.preventDefault();
			$(this).parents('.cd-single-point').eq(0).removeClass('is-open').addClass('visited');
		});


	 
	});
	
	$("#owl-blog-big-slider").owlCarousel({
	 
		navigation: false, 
		slideSpeed : 300,
		autoPlay : 5000,
		singleItem:true
	 
	});


	//Scroll To Top
	var offset = 450;
	var duration = 500;
	jQuery(window).scroll(function() {
		if (jQuery(this).scrollTop() > offset) {
			jQuery('.scroll-to-top').fadeIn(duration);
		} else {
			jQuery('.scroll-to-top').fadeOut(duration);
		}
	});
	
	jQuery('.scroll-to-top').click(function(event) {
		event.preventDefault();
		jQuery('html, body').animate({scrollTop: 0}, duration);
		return false;
	})


	$('.parallax-about').parallax("50%", 0.4);


	$(window).on('debouncedresize', function () { 
		reArrangeProjects();
		
	} );


  })(jQuery);
var $j = jQuery.noConflict();
var $scroll = 0;
var logo_height;
var menu_dropdown_height_set = false;
var sticky_amount = 0;
var content_menu_position;
var content_menu_top;
var content_menu_top_add = 0;
var src;
var next_image;
var prev_image;
var $top_header_height;

var min_w = 1500; // minimum video width allowed
var video_width_original = 1280;  // original video dimensions
var video_height_original = 720;
var vid_ratio = 1280/720;
var skrollr_slider;

$j(document).ready(function() {
	"use strict";
	
	if($j('header').hasClass('regular')){
		content_menu_top = 0;
	}
	if($j('header').hasClass('fixed')){
		content_menu_top = min_header_height_scroll;
	}
	if($j('header').hasClass('stick')){
		content_menu_top = 0;
	}
	if((!$j('header.page_header').hasClass('scroll_top')) && ($j('header.page_header').hasClass('has_top')) && ($j('header.page_header').hasClass('fixed'))){
		content_menu_top_add = 34;
	}

    //setting min height if site is not visited in TF iframe
    var isEmbed = window != window.parent;
    if(!isEmbed){
        $j('.content').css('min-height',$j(window).height()-$j('footer').height());
    }

    setDropDownMenuPosition();
    initDropDownMenu();
	initQodeSlider();
	initSideMenu();
	initMessageHeight();
	initToCounter();
	initCounter();
	initProgressBars();
	initListAnimation();
	initPieChart();
	initPieChartWithIcon();
	initServiceAnimation();
	initParallaxTitle();
	initSideAreaScroll();
	loadMore();
	prettyPhoto();
	initMobileMenu();
	initFlexSlider();
	fitVideo();
	fitAudio();
	initAccordion();
	initAccordionContentLink();
	initMessages();
	initProgressBarsIcon();
	initMoreFacts();
	placeholderReplace();
	backButtonShowHide();
	backToTop();
	initSteps();
	initProgressBarsVertical();
	initElementsAnimation();
	updateShoppingCart();
	initHashClick();
	checkAnchorOnScroll();
	initImageHover();
	initIconWithTextAnimation();
	initIconListWithTextAnimation();
	initVideoBackground();
	initCheckSafariBrowser();
	initSearchButton();
	initCoverBoxes();
	createContentMenu();
	contentMenuScrollTo();
	createSelectContentMenu();
	setServiceTableHover();
	
	if($j(window).width() > 1000){
		headerSize($scroll);
	}else{
		logoSizeOnSmallScreens();
	}
    
	$j([
		theme_root+'css/img/social_share_blue.png',
		theme_root+'img/logo.png']).preload();

	$scroll = $j(window).scrollTop();
	checkTitleToShowOrHide(); //this has to be after setting $scroll since function uses $scroll variable
	
	/* set header and content menu position and appearance on page load - START */
	if($j(window).width() > 1000){
		headerSize($scroll);
	}
	if($j(window).width() > 768){
		contentMenuPosition();
	}
	contentMenuCheckLastSection();
	
	$j('.q_logo a').css('visibility','visible');
	/* set header and content menu position and appearance on page load - END */
});

$j(window).load(function(){
	"use strict";
	
	$j('.touch .main_menu li:has(div.second)').doubleTapToGo(); // load script to close menu on touch devices

	setDropDownMenuPosition();
	initDropDownMenu();
	initPortfolio();
	initPortfolioSingleInfo();
	initTestimonials();
	initQodeCarousel();
	initPortfolioSlider();
	initVideoBackgroundSize();
	initBlog();
	initBlogMasonry();
	initTabs();
	animatedTextIconHeight();
	countAnimatedTextIconPerRow();
	initTitleAreaAnimation();
	setContentBottomMargin();
	setFooterHeight();
	showTitleThumb();
	$j('.side_menu').css({'right':'0px'});
	checkAnchorOnLoad(); // it has to be after content top margin initialization to know where to scroll
	if($j('nav.content_menu').length > 0){
		content_menu_position = $j('nav.content_menu').offset().top;
		contentMenuPosition();
	}
	contentMenuCheckLastSection();
	initParallax(); //has to be here on last place since some function is interfering with parallax
});

$j(window).scroll(function() {
	"use strict";
	
	$scroll = $j(window).scrollTop();
	if($j(window).width() > 1000){
		headerSize($scroll);
	}
	
	if($j(window).width() > 768){
		contentMenuPosition();
	}
	contentMenuCheckLastSection();
	
	$j('.touch .drop_down > ul > li').mouseleave();
	$j('.touch .drop_down > ul > li').blur();
});

$j(window).resize(function() {
	"use strict";
	
	if($j(window).width() > 1000){
		headerSize($scroll);
	}else{
		logoSizeOnSmallScreens();
	}
	initMessageHeight();
	initTestimonials();
	fitAudio();
	initBlog();
	initBlogMasonry();
	animatedTextIconHeight();
	countAnimatedTextIconPerRow();
	initVideoBackgroundSize();
	setContentBottomMargin();
	calculateHeights();

});

/*
**	Calculating header size on page load and page scroll
*/
var sticky_animate;
function headerSize($scroll){
	"use strict";
	
	if(($j('header.page_header').hasClass('scroll_top')) && ($j('header.page_header').hasClass('has_top')) && ($j('header.page_header').hasClass('fixed'))){
		if($scroll >= 0 && $scroll <= 34){
			$j('header.page_header').css('top',-$scroll);
			$j('header.page_header').css('margin-top',0);
			$j('.header_top').show();
		}else if($scroll > 34){
			$j('header.page_header').css('top','-34px');
			$j('header.page_header').css('margin-top',34);
			$j('.header_top').hide();
		}
	}
	
	if($j('.carousel.full_screen').length){
		sticky_amount = $j('.carousel').height();
	}else{
		if(typeof page_scroll_amount_for_sticky !== 'undefined'){
			sticky_amount = page_scroll_amount_for_sticky;
		}else{
			sticky_amount = scroll_amount_for_sticky;
		}
	}
	
	if($j('header').hasClass('regular')){
		$j('header .drop_down .second').css('top', header_height +'px');
		if(header_height - logo_height >= 10){
			$j('.q_logo a').height(logo_height);
		}else{
			$j('.q_logo a').height(header_height - 10);
		}
	}
	
	if($j('header.page_header').hasClass('fixed')){
		if($j('header.page_header').hasClass('scroll_top')){
			$top_header_height = 34;
		}else{
			$top_header_height = 0;
		}
		
		if($scroll + $top_header_height <= 0){	
			$j('header.page_header').removeClass('scrolled');
			$j('header nav.main_menu > ul > li > a').stop().animate({'line-height': header_height - ($scroll + $top_header_height)/8+'px'},250);
			$j('header .drop_down .second').stop().animate({'top': header_height - ($scroll + $top_header_height)/8+'px'},250);
			$j('header .side_menu_button').stop().animate({'height': header_height - ($scroll + $top_header_height)/8+'px'},250);
			$j('header .logo_wrapper').stop().animate({'height': header_height - ($scroll + $top_header_height)/8 +'px'},250);
			
		}else{
			$j('header.page_header').addClass('scrolled');
			$j('header nav.main_menu > ul > li > a').stop().animate({'line-height': min_header_height_scroll+'px'},250);
			$j('header .drop_down .second').stop().animate({'top': min_header_height_scroll+'px'},250);
			$j('header .side_menu_button').stop().animate({'height': min_header_height_scroll+'px'},250);
			$j('header .logo_wrapper').stop().animate({'height': min_header_height_scroll+'px'},250);		
		}
		
		// if((header_height - ($scroll + $top_header_height)/8 >= min_header_height_scroll) && ($scroll >= $top_header_height)){	
			// $j('header.page_header').removeClass('scrolled');
			// $j('header nav.main_menu > ul > li > a').css('line-height', header_height - ($scroll + $top_header_height)/8+'px');
			// $j('header .drop_down .second').css('top', header_height - ($scroll + $top_header_height)/8+'px');
			// $j('header .side_menu_button').css('height', header_height - ($scroll + $top_header_height)/8+'px');
			// $j('header .logo_wrapper').css('height', header_height - ($scroll + $top_header_height)/8 +'px');
			
		// }else if($scroll < $top_header_height){	
			// $j('header.page_header').removeClass('scrolled');
			// $j('header nav.main_menu > ul > li > a').css('line-height', header_height+'px');
			// $j('header .drop_down .second').css('top', header_height+'px');
			// $j('header .side_menu_button').css('height', header_height+'px');
			// $j('header .logo_wrapper').css('height', header_height+'px');
			
		// }else if((header_height - ($scroll + $top_header_height)/8) < min_header_height_scroll){
			// $j('header.page_header').addClass('scrolled');
			// $j('header nav.main_menu > ul > li > a').css('line-height', min_header_height_scroll+'px');
			// $j('header .drop_down .second').css('top', min_header_height_scroll+'px');
			// $j('header .side_menu_button').css('height', min_header_height_scroll+'px');
			// $j('header .logo_wrapper').css('height', min_header_height_scroll+'px');		
		// }
	}
	
	if($j('header.page_header').hasClass('stick')){
		if($scroll > sticky_amount){
			if(!$j('header.page_header').hasClass('sticky')){			
				if($j('header.page_header').hasClass('has_top')){
					$top_header_height = 34;
				}else{
					$top_header_height = 0;
				}
				var padding_top = $j('header.page_header').hasClass('centered_logo') ? $j('header.page_header').height() : header_height + $top_header_height;
				
				$j('header.page_header').addClass('sticky');
				$j('.content').css('padding-top',padding_top);
				
				window.clearTimeout(sticky_animate);
				sticky_animate = window.setTimeout(function(){$j('header.page_header').addClass('sticky_animate');},100);
				
				
				if(min_header_height_sticky - logo_height >= 10){
					$j('.q_logo a').height(logo_height);
				}else{
					$j('.q_logo a').height(min_header_height_sticky - 10);
				}
				
				if($j('header.page_header').hasClass('menu_bottom')){
					initDropDownMenu(); //recalculate dropdown menu position
				}
			}
		}else{
			if($j('header.page_header').hasClass('sticky')){
				$j('header').removeClass('sticky_animate');
				$j('header').removeClass('sticky');
				$j('.content').css('padding-top','0px');
				
				
				if(header_height - logo_height >= 10){
					$j('.q_logo a').height(logo_height);
				}else{
					$j('.q_logo a').height(header_height - 10);
				}
				
				if($j('header.page_header').hasClass('menu_bottom')){
					initDropDownMenu(); //recalculate dropdown menu position
				}
			}
		}
	}
	
	if(!$j('header.page_header').hasClass('centered_logo')){
		if($j('header.page_header').hasClass('fixed')){
			if($scroll + $top_header_height <= 0 && header_height - logo_height >= 10){
				$j('.q_logo a').height(logo_height);
			}else if($scroll + $top_header_height <= 0 && header_height - logo_height < 10){
				$j('.q_logo a').height(header_height - 10);
			}else if( $scroll + $top_header_height !== 0 && logo_height >= min_header_height_scroll){
				$j('.q_logo a').height(min_header_height_scroll);
			}else if( $scroll + $top_header_height !== 0 && logo_height < min_header_height_scroll){
				$j('.q_logo a').height(logo_height);
			}
			
			// if((header_height - ($scroll + $top_header_height)/8 < logo_height) && (header_height - ($scroll + $top_header_height)/8 >= min_header_height_scroll) && (logo_height > min_header_height_scroll - 10) && ($scroll >= $top_header_height)){
				// $j('.q_logo a').height(header_height - ($scroll + $top_header_height)/8 - 10);
			// }else if((header_height - ($scroll + $top_header_height)/8 < logo_height) && (header_height - ($scroll + $top_header_height)/8 >= min_header_height_scroll) && (logo_height > min_header_height_scroll - 10) && ($scroll < $top_header_height)){
				// $j('.q_logo a').height(header_height - 10);
			// }else if((header_height - ($scroll + $top_header_height)/8 < logo_height) && (header_height - ($scroll + $top_header_height)/8 < min_header_height_scroll) && (logo_height > min_header_height_scroll - 10)){
				// $j('.q_logo a').height(min_header_height_scroll - 10);
			// }else if((header_height - ($scroll + $top_header_height)/8 < logo_height) && (header_height - ($scroll + $top_header_height)/8 < min_header_height_scroll) && (logo_height < min_header_height_scroll - 10)){
				// $j('.q_logo a').height(logo_height);
			// }else if((($scroll + $top_header_height)/8 === 0) && (logo_height > header_height - 10)){
				// $j('.q_logo a').height(logo_height);
			// }else{
				// $j('.q_logo a').height(logo_height);
			// }
		}else{
		
			if($scroll > sticky_amount){
				if(min_header_height_sticky - logo_height >= 10){
					$j('.q_logo a').height(logo_height);
				}else{
					$j('.q_logo a').height(min_header_height_sticky - 10);
				}
			}else{

				if(header_height - logo_height >= 10){
					$j('.q_logo a').height(logo_height);
				}else{
					$j('.q_logo a').height(header_height - 10);
				}	
			}
		}
		$j('.q_logo a img').css('height','100%');
	}else{
		if($scroll > sticky_amount && $j('header.page_header').hasClass('sticky')){
				if(min_header_height_sticky - logo_height >= 10){
					$j('.q_logo a').height(logo_height);
				}else{
					$j('.q_logo a').height(min_header_height_sticky - 10);
				}
		}else{
			$j('.q_logo a').height(logo_height);
			$j('.q_logo a').width(logo_width);
			$j('.q_logo img').height('auto');
		}
	}
	
}

/*
**	Calculating logo size on smaller screens
*/
function logoSizeOnSmallScreens(){
	"use strict";
	// 100 is height of header on small screens
	
	if((100 - 20 < logo_height)){
		$j('.q_logo a').height(100 - 20);
	}else{
		$j('.q_logo a').height(logo_height);
	}
	$j('.q_logo a img').css('height','100%');
	
	$j('header.page_header').removeClass('sticky_animate sticky');
	$j('.content').css('padding-top','0px');
	
}

/*
**	Initialize Qode Slider
*/
var default_header_style;
function initQodeSlider(){
	"use strict";
	
	var image_regex = /url\(["']?([^'")]+)['"]?\)/;
	default_header_style = "";
	if($j('header.page_header').hasClass('light')){ default_header_style = 'light';}
	if($j('header.page_header').hasClass('dark')){ default_header_style = 'dark';}
	
	if($j('.carousel').length){
		$j('.carousel').each(function(){
			var $this = $j(this);
			var mobile_header;

			if($this.hasClass('full_screen')){
				
				mobile_header = $j(window).width() < 1000 ? $j('header.page_header').height() - 6 : 0; // 6 is because of the display: inline-block
				$this.css({'height': ($j(window).height() - mobile_header) + 'px'});
				$this.find('.qode_slider_preloader').css({'height': ($j(window).height() - mobile_header) + 'px'});
				$this.find('.item').css({'height': ($j(window).height() - mobile_header) + 'px'});
				$j(window).resize(function() {
					var mobile_header = $j(window).width() < 1000 ? $j('header.page_header').height() - 6 : 0; // 6 is because of the display: inline-block
					$this.css({'height': ($j(window).height() - mobile_header) + 'px'});
					$this.find('.item').css({'height': ($j(window).height() - mobile_header) + 'px'});
				});
			} else {
				mobile_header = $j(window).width() < 1000 ? $j('header.page_header').height() - 6 : 0; // 6 is because of the display: inline-block
				$this.find('.qode_slider_preloader').css({'height': ($this.height() - mobile_header) + 'px', 'display': 'block'});
			}
			
			$j(window).scroll(function() {
				if($scroll > $this.height() && $j(window).width() > 1000){
					$this.find('.carousel-inner, .carousel-indicators').hide();
				}else{
					$this.find('.carousel-inner, .carousel-indicators').show();
				}
			});
			
			var $slide_animation = $this.data('slide_animation');
			if($slide_animation === ""){
				$slide_animation = 6000;
			}
			
			// function for setting prev/next numbers on arrows
			var all_items_count = $j('div.item').length;
			function setPrevNextNumbers(curr_item, all_items_count){
				if(curr_item == 1){
					$this.find('.left.carousel-control .prev').html(all_items_count);
					$this.find('.right.carousel-control .next').html(curr_item + 1);
				}else if(curr_item == all_items_count){
					$this.find('.left.carousel-control .prev').html(curr_item - 1);
					$this.find('.right.carousel-control .next').html(1);
				}else{
					$this.find('.left.carousel-control .prev').html(curr_item - 1);
					$this.find('.right.carousel-control .next').html(curr_item + 1);
				}
			}
			
			function initSlider(){
				//set active class on first item
				$this.find('.carousel-inner .item:first-child').addClass('active');
				checkSliderForHeaderStyle($j('.carousel .active'), $this.hasClass('header_effect'));
				
				if($this.hasClass('slider_thumbs')){
					// initial state of prev/next numbers
					setPrevNextNumbers(1, all_items_count); 

					//set prev and next thumb on load
					if($this.find('.active').next('div').find('.image').length){
						src = image_regex.exec($this.find('.active').next('div').find('.image').attr('style'));    
						next_image = new Image();
						next_image.src = src[1];
					}else{
//						next_image = $this.find('.active').next('div').find('> .video').clone();
//						next_image.find('.video-overlay').remove();
//						next_image.find('.video-wrap').width(170).height(95);
//						next_image.find('.mejs-container').width(170).height(95);
//						next_image.find('video').width(170).height(95);
						src = image_regex.exec($this.find('.active').next('div').find('.mobile-video-image').attr('style'));
						next_image = new Image();
						next_image.src = src[1];
					}
					$this.find('.right.carousel-control .img').html(next_image).find('img, div.video').addClass('old');
					
					if($this.find('.carousel-inner .item:last-child .image').length){
						src = image_regex.exec($this.find('.carousel-inner .item:last-child .image').attr('style'));
						prev_image = new Image();
						prev_image.src = src[1];
					}else{
//						prev_image = $this.find('.carousel-inner .item:last-child > .video').clone();
//						prev_image.find('.video-overlay').remove();
//						prev_image.find('.video-wrap').width(170).height(95);
//						prev_image.find('.mejs-container').width(170).height(95);
//						prev_image.find('video').width(170).height(95);
						src = image_regex.exec($this.find('.carousel-inner .item:last-child .mobile-video-image').attr('style'));
						prev_image = new Image();
						prev_image.src = src[1];
					}
					$this.find('.left.carousel-control .img').html(prev_image).find('img, div.video').addClass('old');
				}
				
				if($this.hasClass('q_auto_start')){
					$this.carousel({
						interval: $slide_animation,
						pause: false
					});	
				} else {
					$this.carousel({
						interval: 0,
						pause: false
					});
				}
				if($this.find('.item video').length){
					initVideoBackgroundSize();
				}
			}

			if($j('html').hasClass('touch')){
				if($this.find('.item:first-child .mobile-video-image').length > 0){
					src = image_regex.exec($this.find('.item:first-child .mobile-video-image').attr('style'));
					if (src) {        
						var backImg = new Image();
						backImg.src = src[1];
						$j(backImg).load(function(){ 
							$j('.qode_slider_preloader').fadeOut(500);
							initSlider();
						});
					}
				}
				else{
					src = image_regex.exec($this.find('.item:first-child .image').attr('style'));
					if (src) {        
						var backImg = new Image();
						backImg.src = src[1];
						$j(backImg).load(function(){ 
							$j('.qode_slider_preloader').fadeOut(500);
							initSlider();
						});
					}
				}
			} else {
				if($this.find('.item:first-child video').length > 0){
					$this.find('.item:first-child video').get(0).addEventListener('loadeddata',function(){
						$j('.qode_slider_preloader').fadeOut(500);
						initSlider();
					});
				}else{
					src = image_regex.exec($this.find('.item:first-child .image').attr('style'));
					if (src) {        
						var backImg = new Image();
						backImg.src = src[1];
						$j(backImg).load(function(){ 
							$j('.qode_slider_preloader').fadeOut(500);
							initSlider();
						});
					}
				}	
			}

			$this.on('slide.bs.carousel', function () {
				$this.addClass('in_progress');
				$this.find('.active .slider_content_outer').fadeTo(800,0);
			});
			$this.on('slid.bs.carousel', function () {
				$this.removeClass('in_progress');
				$this.find('.active .slider_content_outer').fadeTo(0,1);
				
				if($this.hasClass('slider_thumbs')){
					var curr_item = $j('div.item').index($j('div.item.active')[0]) + 1;
					setPrevNextNumbers(curr_item, all_items_count);
					
					// prev thumb
					if($this.find('.active').prev('div.item').length){
						if($this.find('.active').prev('div').find('.image').length){
							src = image_regex.exec($this.find('.active').prev('div').find('.image').attr('style'));    
							prev_image = new Image();
							prev_image.src = src[1];
						}else{
//							prev_image = $this.find('.active').prev('div').find('> .video').clone();
//							prev_image.find('.video-overlay').remove();
//							prev_image.find('.video-wrap').width(170).height(95);
//							prev_image.find('.mejs-container').width(170).height(95);
//							prev_image.find('video').width(170).height(95);
							src = image_regex.exec($this.find('.active').prev('div').find('.mobile-video-image').attr('style'));
							prev_image = new Image();
							prev_image.src = src[1];
						}
						$this.find('.left.carousel-control .img .old').fadeOut(300,function(){
							$j(this).remove();
						});
						$this.find('.left.carousel-control .img').append(prev_image).find('img, div.video').fadeIn(300).addClass('old');
						
					}else{
						if($this.find('.carousel-inner .item:last-child .image').length){
							src = image_regex.exec($this.find('.carousel-inner .item:last-child .image').attr('style'));    
							prev_image = new Image();
							prev_image.src = src[1];
						}else{
//							prev_image = $this.find('.carousel-inner .item:last-child > .video').clone();
//							prev_image.find('.video-overlay').remove();
//							prev_image.find('.video-wrap').width(170).height(95);
//							prev_image.find('.mejs-container').width(170).height(95);
//							prev_image.find('video').width(170).height(95);
							src = image_regex.exec($this.find('.carousel-inner .item:last-child .mobile-video-image').attr('style'));    
							prev_image = new Image();
							prev_image.src = src[1];
						}
						$this.find('.left.carousel-control .img .old').fadeOut(300,function(){
							$j(this).remove();
						});
						$this.find('.left.carousel-control .img').append(prev_image).find('img, div.video').fadeIn(300).addClass('old');
					}
					
					// next thumb
					if($this.find('.active').next('div.item').length){
						if($this.find('.active').next('div').find('.image').length){
							src = image_regex.exec($this.find('.active').next('div').find('.image').attr('style'));    
							next_image = new Image();
							next_image.src = src[1];
						}else{
//							next_image = $this.find('.active').next('div').find('> .video').clone();
//							next_image.find('.video-overlay').remove();
//							next_image.find('.video-wrap').width(170).height(95);
//							next_image.find('.mejs-container').width(170).height(95);
//							next_image.find('video').width(170).height(95);
							src = image_regex.exec($this.find('.active').next('div').find('.mobile-video-image').attr('style'));    
							next_image = new Image();
							next_image.src = src[1];
						}
						
						$this.find('.right.carousel-control .img .old').fadeOut(300,function(){
							$j(this).remove();
						});
						$this.find('.right.carousel-control .img').append(next_image).find('img, div.video').fadeIn(300).addClass('old');
						
					}else{
						if($this.find('.carousel-inner .item:first-child .image').length){
							src = image_regex.exec($this.find('.carousel-inner .item:first-child .image').attr('style'));    
							next_image = new Image();
							next_image.src = src[1];
						}else{
//							next_image = $this.find('.carousel-inner .item:first-child > .video').clone();
//							next_image.find('.video-overlay').remove();
//							next_image.find('.video-wrap').width(170).height(95);
//							next_image.find('.mejs-container').width(170).height(95);
//							next_image.find('video').width(170).height(95);
							src = image_regex.exec($this.find('.carousel-inner .item:first-child .mobile-video-image').attr('style'));    
							next_image = new Image();
							next_image.src = src[1];
						}
						$this.find('.right.carousel-control .img .old').fadeOut(300,function(){
							$j(this).remove();
						});
						$this.find('.right.carousel-control .img').append(next_image).find('img, div.video').fadeIn(300).addClass('old');
					}
				}
			});
			
			$this.swipe( {
				swipeLeft: function(event, direction, distance, duration, fingerCount){ $this.carousel('next'); },
				swipeRight: function(event, direction, distance, duration, fingerCount){ $this.carousel('prev'); },
				threshold:20
			});

		});

		if ($j('.no-touch .carousel').length) {
			skrollr_slider = skrollr.init({
				edgeStrategy: 'set',
				smoothScrolling: false,
				forceHeight: false
			});
			skrollr_slider.refresh();
		}
	}	
}

function checkSliderForHeaderStyle($this, header_effect){
	"use strict";
	
	var slide_header_style = "";
	var navigation_color = $this.data('navigation-color');
	if($this.hasClass('light')){ slide_header_style = 'light';}
	if($this.hasClass('dark')){ slide_header_style = 'dark';}
	
	if( slide_header_style !== ""){
		if(header_effect){
			$j('header.page_header').removeClass('dark light').addClass(slide_header_style);
		}
		$j('.carousel .carousel-control, .carousel .carousel-indicators').removeClass('dark light').addClass(slide_header_style);
	}else{
		if(header_effect){
			$j('header.page_header').removeClass('dark light').addClass(default_header_style);
		}
		$j('.carousel .carousel-control, .carousel .carousel-indicators').removeClass('dark light').addClass(default_header_style);
	}
	
	if(navigation_color !== undefined){
		$j('.carousel-control .prev_nav, .carousel-control .next_nav, .carousel-control .thumb_holder .thumb_top, .carousel-indicators li').css('background-color',navigation_color);
	}else{
		$j('.carousel-control .prev_nav, .carousel-control .next_nav, .carousel-control .thumb_holder .thumb_top, .carousel-indicators li').css('background-color','');
	}
}

/*
** Set heights for qode carousel and portfolio slider
*/
function calculateHeights(){
	if($j('.portfolio_slides').length){
		$j('.portfolio_slides').each(function(){
			$j(this).parents('.caroufredsel_wrapper').css({'height' : ($j(this).find('li.item').outerHeight()-3) + 'px'}); //3 is because of the white line bellow the slider
		});
	}
	
	if($j('.qode_carousels .slides').length){
		$j('.qode_carousels .slides').each(function(){
			$j(this).parents('.caroufredsel_wrapper').css({'height' : ($j(this).find('li.item').outerHeight()) + 'px'});
		});
	}
}


/*
** Init Qode Carousel
*/
function initQodeCarousel(){
	"use strict";

	if($j('.qode_carousels').length){
		$j('.qode_carousels').each(function(){
			var itemWidth = ($j(this).parents('.grid_section').length == 1) ? 170 : 315;
			$j(this).find('.slides').carouFredSel({
				circular: true,
				responsive: true,
				scroll : {
					items           : 1,
					duration        : 1000,                         
					pauseOnHover    : false
				},
				items: {
					width: itemWidth,
					visible: {
						min: 1,
						max: 6
					}
				},
				auto: true,
				mousewheel: false,
				swipe: {
					onMouse: true,
					onTouch: true
				}
				
			}).animate({'opacity': 1},1000);
		});
		
		calculateHeights();
	}
}


/*
** Init Portfolio Slider
*/
function initPortfolioSlider(){
	"use strict";
	

	var scrollNum = ($j(window).width() <= 420) ? 1 : 2;
	
	if($j('.portfolio_slider').length){
        $j('.portfolio_slider').each(function(){
            var maxItems = ($j(this).parents('.grid_section').length == 1) ? 4 : 'auto';
            var itemWidth = ($j(this).parents('.grid_section').length == 1) ? 277 : 384;

            $j('.portfolio_slides').carouFredSel({
                circular: true,
                responsive: true,
                scroll: scrollNum,
                items: {
                    width: itemWidth,
                    visible: {
                        min: 1,
                        max: maxItems
                    }
                },
                auto: false,
                mousewheel: false,
                swipe: {
                    onMouse: true,
                    onTouch: true
                }
            }).animate({'opacity': 1},1000);
        });

		calculateHeights();

		$j('.portfolio_slider .flex-direction-nav a').click(function(e){
			e.preventDefault();
			e.stopImmediatePropagation();
			e.stopPropagation();
		});
	}
}


/*
**	Opening side menu on "menu button" click
*/
var current_scroll;
function initSideMenu(){
	"use strict";

	$j('.side_menu_button_wrapper a.side_menu_button_link').click(function(e){
		e.preventDefault();
		if(!$j(this).hasClass('opened')){
			$j('.side_menu').css({'visibility':'visible'});
			$j(this).addClass('opened');
			$j('body').addClass('right_side_menu_opened');
			current_scroll = $j(window).scrollTop();
			
			$j(window).scroll(function() {
				if(Math.abs($scroll - current_scroll) > 400){
					$j('body').removeClass('right_side_menu_opened');
					$j('.side_menu_button_wrapper a').removeClass('opened');
					var hide_side_menu = setTimeout(function(){
						$j('.side_menu').css({'visibility':'hidden'});
						clearTimeout(hide_side_menu);
					},400);
				}
			});
		}else{
			$j(this).removeClass('opened');
			$j('body').removeClass('right_side_menu_opened');
			var hide_side_menu = setTimeout(function(){
				$j('.side_menu').css({'visibility':'hidden'});
				clearTimeout(hide_side_menu);
			},400);
		}
	});
}

function setDropDownMenuPosition(){
	"use strict";

	var menu_items = $j(".drop_down > ul > li.narrow");
	menu_items.each( function(i) {

		var browser_width = $j(window).width()-16; // 16 is width of scroll bar
		var menu_item_position = $j(menu_items[i]).offset().left;
		var sub_menu_width = $j(menu_items[i]).find('.second .inner ul').width();
		var menu_item_from_left = browser_width - menu_item_position + 25; // 25 is right padding between menu elements
		var sub_menu_from_left;
			
		if($j(menu_items[i]).find('li.sub').length > 0){
			sub_menu_from_left = browser_width - menu_item_position - sub_menu_width + 25; // 25 is right padding between menu elements
		}
		
		if(menu_item_from_left < sub_menu_width || sub_menu_from_left < sub_menu_width){
			$j(menu_items[i]).find('.second').addClass('right');
			$j(menu_items[i]).find('.second .inner ul').addClass('right');
		}
	});
}

function initDropDownMenu(){
	"use strict";
	
	var menu_items = $j('.drop_down > ul > li');
	
	menu_items.each( function(i) {
		if ($j(menu_items[i]).find('.second').length > 0) {
			if($j(menu_items[i]).hasClass('wide')){
				if(!$j(this).hasClass('left_position') && !$j(this).hasClass('right_position')){
					$j(this).find('.second').css('left',0);
				}

				var tallest = 0;
				$j(this).find('.second > .inner > ul > li').each(function() {
					var thisHeight = $j(this).height();
					if(thisHeight > tallest) {
						tallest = thisHeight;
					}
				});
				$j(this).find('.second > .inner > ul > li').height(tallest);
				
				var row_number;
				if($j(this).find('.second > .inner > ul > li').length > 4){
					row_number = 4;
				}else{
					row_number = $j(this).find('.second > .inner > ul > li').length;
				}

				var width = row_number*($j(this).find('.second > .inner > ul > li').width() + 21) - 1; //20 is left and right padding + 1 is border, -1 is no border on first 
				$j(this).find('.second > .inner > ul').width(width);
				
				if(!$j(this).hasClass('left_position') && !$j(this).hasClass('right_position')){
					var left_position = ($j(window).width() - 2 * ($j(window).width()-$j(this).find('.second').offset().left))/2 + (width+30)/2;

					$j(this).find('.second').css('left',-left_position);
				}
			}
			
			if(!menu_dropdown_height_set){
				$j(menu_items[i]).data('original_height', $j(menu_items[i]).find('.second').height() + 'px');
				$j(menu_items[i]).find('.second').height(0);
			}
			
			if (navigator.userAgent.match(/(iPod|iPhone|iPad)/)) {
				$j(menu_items[i]).on("touchstart mouseenter",function(){
					$j(menu_items[i]).find('.second').css({'height': $j(menu_items[i]).data('original_height'), 'overflow': 'visible', 'visibility': 'visible', 'opacity': '1'});
				}).on("mouseleave", function(){
					$j(menu_items[i]).find('.second').css({'height': '0px','overflow': 'hidden', 'visivility': 'hidden', 'opacity': '0'});
				});
			
			}else{
				var config = {    
					interval: 50,
					over: function(){
						$j(menu_items[i]).find('.second').addClass('drop_down_start');
						$j(menu_items[i]).find('.second').stop().css({'height': $j(menu_items[i]).data('original_height')});
					},  
					timeout: 200,    
					out: function(){
						$j(menu_items[i]).find('.second').stop().css({'height': '0px'});
						$j(menu_items[i]).find('.second').removeClass('drop_down_start');
					}
				};
				$j(menu_items[i]).hoverIntent(config);
			}	
		}
	});
	$j('.drop_down ul li.wide ul li a').on('click',function(){
		var $this = $j(this);
		setTimeout(function() {
			$this.mouseleave();
		}, 500);
		
	});
	
	menu_dropdown_height_set = true;
}

/*
**	Plugin for counter shortcode
*/
(function($) {
	"use strict";

	$.fn.countTo = function(options) {
		// merge the default plugin settings with the custom options
		options = $.extend({}, $.fn.countTo.defaults, options || {});

		// how many times to update the value, and how much to increment the value on each update
		var loops = Math.ceil(options.speed / options.refreshInterval),
		increment = (options.to - options.from) / loops;

		return $(this).each(function() {
			var _this = this,
			loopCount = 0,
			value = options.from,
			interval = setInterval(updateTimer, options.refreshInterval);

			function updateTimer() {
				value += increment;
				loopCount++;
				$(_this).html(value.toFixed(options.decimals));

				if (typeof(options.onUpdate) === 'function') {
					options.onUpdate.call(_this, value);
				}

				if (loopCount >= loops) {
					clearInterval(interval);
					value = options.to;

					if (typeof(options.onComplete) === 'function') {
						options.onComplete.call(_this, value);
					}
				}
			}
		});
	};

	$.fn.countTo.defaults = {
		from: 0,  // the number the element should start at
		to: 100,  // the number the element should end at
		speed: 1000,  // how long it should take to count between the target numbers
		refreshInterval: 100,  // how often the element should be updated
		decimals: 0,  // the number of decimal places to show
		onUpdate: null,  // callback method for every time the element is updated,
		onComplete: null  // callback method for when the element finishes updating
	};
})(jQuery);

/*
**	Counter from zero to defined number
*/
function initToCounter(){
	"use strict";
	
	if($j('.counter.zero').length){
		$j('.counter.zero').each(function() {
			if(!$j(this).hasClass('executed')){
				$j(this).addClass('executed');
				$j(this).appear(function() {
					$j(this).parent().css('opacity', '1');
					var active_color = $j(this).data('active_color');
					var $max = parseFloat($j(this).text());
                    if($max % 1 != 0){
                        var $decimal_num = $j(this).text().split(".")[1].length;
                    }else{
                        var $decimal_num = 0;
                    }
					$j(this).countTo({
						from: 0,
						to: $max,
                        decimals: $decimal_num,
						speed: 1500,
						refreshInterval: 100
					});
					if(active_color !== ""){
						$j(this).css('color', active_color);
					}
				},{accX: 0, accY: 0});
			}	
		});
	}
}

/*
**	Counter with random effect
*/
function initCounter(){
	"use strict";
	
	if($j('.counter.random').length){
		$j('.counter.random').each(function() {
			if(!$j(this).hasClass('executed')){
				$j(this).addClass('executed');
				$j(this).appear(function() {
					$j(this).parent().css('opacity', '1');
					$j(this).absoluteCounter({
						speed: 1500,
						fadeInDelay: 1000
					});
					var active_color = $j(this).data('active_color');
					if(active_color !== ""){
						$j(this).css('color', active_color);
					}
				},{accX: 0, accY: 0});
			}
		});
	}
}

/*
**	Horizontal progress bars shortcode
*/
function initProgressBars(){
	"use strict";

	if($j('.q_progress_bar').length){
		$j('.q_progress_bar').each(function() {
			$j(this).appear(function() {
				initToCounterHorizontalProgressBar($j(this));
				var percentage = $j(this).find('.progress_content').data('percentage');
				$j(this).find('.progress_content').css('width', '0%');
				$j(this).find('.progress_content').animate({'width': percentage+'%'}, 1500);
				$j(this).find('.progress_number_wrapper').css('width', '0%');
                $j(this).find('.progress_number_wrapper').animate({'width': percentage+'%'}, 1500);
			},{accX: 0, accY: -200});
		});
	}
}

/*
**	Counter for horizontal progress bars percent from zero to defined percent
*/
function initToCounterHorizontalProgressBar($this){
	"use strict";

    var percentage = parseFloat($this.find('.progress_content').data('percentage'));
	if($this.find('.progress_number span').length) {
		$this.find('.progress_number span').each(function() {
			$j(this).parents('.progress_number_wrapper').css('opacity', '1');
			$j(this).countTo({
				from: 0,
				to: percentage,
				speed: 1500,
				refreshInterval: 50
			});
		});
	}
}

/*
**	Unordered list animation effect
*/
function initListAnimation(){
	"use strict";
	
	if($j('.animate_list').length > 0 && $j('.no_animation_on_touch').length === 0){
		$j('.animate_list').each(function(){
			$j(this).appear(function() {
				$j(this).find("li").each(function (l) {
					var k = $j(this);
					setTimeout(function () {
						k.animate({
							opacity: 1,
							top: 0
						}, 1500);
					}, 100*l);
				});
			},{accX: 0, accY: -200});
		});
	}
}

/*
**	Pie Chart shortcode
*/
function initPieChart(){
	"use strict";
 
	if($j('.q_percentage').length){
		$j('.q_percentage').each(function() {

			var $barColor = '#00c6ff';

			if($j(this).data('active') !== ""){
				$barColor = $j(this).data('active');
			}

			var $trackColor = '#f4f4f4';

			if($j(this).data('noactive') !== ""){
				$trackColor = $j(this).data('noactive');
			}

			var $line_width = 15;

			if($j(this).data('linewidth') !== ""){
				$line_width = $j(this).data('linewidth');
			}
			
			var $size = 125;

			$j(this).appear(function() {
				initToCounterPieChart($j(this));
				$j(this).parent().css('opacity', '1');
				
				$j(this).easyPieChart({
					barColor: $barColor,
					trackColor: $trackColor,
					scaleColor: false,
					lineCap: 'butt',
					lineWidth: $line_width,
					animate: 1500,
					size: $size
				}); 
			},{accX: 0, accY: -200});
		});
	}
}

/*
**	Pie Chart shortcode
*/
function initPieChartWithIcon(){
	"use strict";
 
	if($j('.q_percentage_with_icon').length){
		$j('.q_percentage_with_icon').each(function() {

			var $barColor = '#00c6ff';

			if($j(this).data('active') !== ""){
				$barColor = $j(this).data('active');
			}

			var $trackColor = '#f4f4f4';

			if($j(this).data('noactive') !== ""){
				$trackColor = $j(this).data('noactive');
			}

			var $line_width = 15;

			if($j(this).data('linewidth') !== ""){
				$line_width = $j(this).data('linewidth');
			}
			
			var $size = 125;

			$j(this).appear(function() {
				$j(this).parent().css('opacity', '1');
				$j(this).css('opacity', '1');
				$j(this).easyPieChart({
					barColor: $barColor,
					trackColor: $trackColor,
					scaleColor: false,
					lineCap: 'butt',
					lineWidth: $line_width,
					animate: 1500,
					size: $size
				}); 
			},{accX: 0, accY: -200});
		});
	}
}

/*
**	Counter for pie chart number from zero to defined number
*/
function initToCounterPieChart($this){
	"use strict";

	$j($this).css('opacity', '1');
	var $max = parseFloat($j($this).find('.tocounter').text());
    if($max % 1 != 0){
        var $decimal_num = $j($this).find('.tocounter').text().split(".")[1].length;
    }else{
        var $decimal_num = 0;
    }
	$j($this).find('.tocounter').countTo({
		from: 0,
		to: $max,
        decimals: $decimal_num,
		speed: 1500,
		refreshInterval: 50
	});
}

/*
**	Init Portfolio list and Portfolio Filter
*/
function initPortfolio(){
	"use strict";
	
	if($j('.projects_holder_outer').length){
		$j('.projects_holder_outer').each(function(){
			
			$j('.filter_holder').each(function(){
				var filter_height = 0;
				$j(this).find('li.filter').each(function(){
					filter_height += $j(this).height();
				});
				
				$j(this).on('click',function(data){
					var $drop = $j(this),
					$bro = $drop.siblings('.hidden');
					
					if(!$drop.hasClass('expanded')){
						$drop.find('ul').css('z-index','1000');
						$drop.find('ul').height(filter_height+39); //36 is height of first default item + 1 border * 2 + 1 border on li
						$drop.addClass('expanded');
						var label = $drop.find('.label span');
						label.text(label.attr('data-label'));
					} else {
						$drop.find('ul').height(35);
						$drop.removeClass('expanded');
						
						var $selected = $j(data.target),
						ndx = $selected.index();
						
						if($bro.length){
							$bro.find('option').removeAttr('selected').eq(ndx).attr('selected','selected').change();
						}
					}
				});
			});
			
			$j('.filter_holder .filter').on('click',function(){
				var $this = $j(this).text();
				var dropLabels = $j('.filter_holder').find('.label span');
				dropLabels.each(function(){
					$j(this).text($this);
				});
			});
			
			$j(this).find('.projects_holder').mixitup({
				showOnLoad: 'all',
				transitionSpeed: 600,
				minHeight: 150,
				onMixEnd: function(){
					
				}
			});
		});
	}
}

function initServiceAnimation(){
	"use strict";
	
	if($j(".fade_in_circle_holder").length > 0 && $j('.no_animation_on_touch').length === 0){
		$j('.fade_in_circle_holder').each(function(){
			$j(this).appear(function(){
				$j(this).addClass('animate_circle');
			},{accX: 0, accY: -200});
		});
	}
}

function checkTitleToShowOrHide(){
	if($j('.title_outer.animate_title_area').length){
		var title_area_height = $j('.title_outer').data('height');
		if($scroll > $j('.title').height()){
			$j('.title_outer').css({'height':title_area_height, 'opacity':'1', 'overflow':'visible'});
		}
	}
}

/*
**	Title area animation
*/
function initTitleAreaAnimation(){
	if($j('.title_outer.animate_title_area').length){
		
		var title_area_height = $j('.title_outer').data('height');
		if($j('.title_outer').hasClass('with_image')){
			title_area_height = $j('.image.responsive').height();
		}
		if($scroll < $j('.title').height()){
			$j('.title_outer').animate({ height: title_area_height, opacity: 1}, 500, function(){
				$j(this).css({'overflow':'visible'});
				initPortfolioSingleInfo();
				if($j('nav.content_menu').length > 0){
					content_menu_position = $j('nav.content_menu').offset().top;
					contentMenuPosition();
				}
			});
		}
	}
}

/*
**	Title image with parallax effect
*/
function initParallaxTitle(){
	"use strict";

	if(($j('.title').length > 0) && ($j('.touch').length === 0)){		
		
		if($j('.title.has_fixed_background').length){
			
			var $background_size_width = parseInt($j('.title.has_fixed_background').css('background-size').match(/\d+/));
			
			var title_holder_height = $j('.title.has_fixed_background').height();
			var title_rate = (title_holder_height / 10000) * 7;
			
			$j('.title.has_fixed_background').css({'background-position': 'center 0px' });
			if($j('.title.has_fixed_background').hasClass('zoom_out')){
				$j('.title.has_fixed_background').css({'background-size': $background_size_width-$scroll + 'px auto'});
			}
			
			$j('.title_holder').css({ 'opacity' : (1 - $scroll/($j('.title').height()*0.6))});
		}
		
		$j(window).on('scroll', function() {
			if($j('.title.has_fixed_background').length){
			
				$j('.title_holder').css({ 'opacity' : (1 - $scroll/($j('.title').height()*0.6))});
				var title_distance = $scroll - $j('.title.has_fixed_background').offset().top;
				
				var title_bpos = -(title_distance * title_rate);
				$j('.title.has_fixed_background').css({'background-position': 'center ' + title_bpos + 'px' });
				if($j('.title.has_fixed_background').hasClass('zoom_out')){
					$j('.title.has_fixed_background').css({'background-size': $background_size_width-$scroll + 'px auto'});
				}
			}
		});
	}
}

/*
Plugin: jQuery Parallax
Version 1.1.3
Author: Ian Lunn
Twitter: @IanLunn
Author URL: http://www.ianlunn.co.uk/
Plugin URL: http://www.ianlunn.co.uk/plugins/jquery-parallax/

Dual licensed under the MIT and GPL licenses:
http://www.opensource.org/licenses/mit-license.php
http://www.gnu.org/licenses/gpl.html
*/

(function( $ ){
	var $window = $(window);
	var windowHeight = $window.height();

	$window.resize(function () {
		windowHeight = $window.height();
	});

	$.fn.parallax = function(xpos, speedFactor, outerHeight) {
		var $this = $(this);
		var getHeight;
		var firstTop;
		var paddingTop = 0;
		
		//get the starting position of each element to have parallax applied to it		
		$this.each(function(){
		    firstTop = $this.offset().top;
		});

		if (outerHeight) {
			getHeight = function(jqo) {
				return jqo.outerHeight(true);
			};
		} else {
			getHeight = function(jqo) {
				return jqo.height();
			};
		}
			
		// setup defaults if arguments aren't specified
		if (arguments.length < 1 || xpos === null) xpos = "50%";
		if (arguments.length < 2 || speedFactor === null) speedFactor = 0.1;
		if (arguments.length < 3 || outerHeight === null) outerHeight = true;
		
		// function to be called whenever the window is scrolled or resized
		function update(){
			var pos = $window.scrollTop();				

			$this.each(function(){
				var $element = $(this);
				var top = $element.offset().top;
				var height = getHeight($element);

				// Check if totally above or totally below viewport
				if (top + height < pos || top > pos + windowHeight) {
					return;
				}

				$this.css('backgroundPosition', xpos + " " + Math.round((firstTop - pos) * speedFactor) + "px");
			});
		}		

		$window.bind('scroll', update).resize(update);
		update();
	};
})(jQuery);


/*
**	Sections with parallax background image
*/
function initParallax(){
	"use strict";
	
	if($j('.parallax_section_holder').length){
		$j('.parallax_section_holder').each(function() {
			var speed = $j(this).data('speed')*0.4;
			$j(this).parallax("50%", speed);
		});
	}	
}

/*
**	Smooth scroll functionality for Side Area
*/
function initSideAreaScroll(){
	"use strict";

	if($j('.side_menu').length){	
		$j(".side_menu").niceScroll({ 
			scrollspeed: 60,
			mousescrollstep: 40,
			cursorwidth: 0, 
			cursorborder: 0,
			cursorborderradius: 0,
			cursorcolor: "transparent",
			autohidemode: false, 
			horizrailenabled: false 
		});
	}
}

/*
**	Load more portfolios
*/
function loadMore(){
	"use strict";
	
	var i = 1;
	
	$j('.load_more a').on('click', function(e)  {
		e.preventDefault();
		
		var link = $j(this).attr('href');
		var $content = '.projects_holder';
		var $anchor = '.portfolio_paging .load_more a';
		var $next_href = $j($anchor).attr('href'); // Get URL for the next set of posts
		var filler_num = $j('.projects_holder .filler').length;
		$j.get(link+'', function(data){
			$j('.projects_holder .filler').slice(-filler_num).remove();
			var $new_content = $j($content, data).wrapInner('').html(); // Grab just the content
			$next_href = $j($anchor, data).attr('href'); // Get the new href
			$j('article.mix:last').after($new_content); // Append the new content
			
			var min_height = $j('article.mix:first').height();
			$j('article.mix').css('min-height',min_height);
			
			$j('.projects_holder').mixitup('remix','all');
			prettyPhoto();
			if($j('.load_more').attr('rel') > i) {
				$j('.load_more a').attr('href', $next_href); // Change the next URL
			} else {
				$j('.load_more').remove(); 
			}
			$j('.projects_holder .portfolio_paging:last').remove(); // Remove the original navigation
			$j('article.mix').css('min-height',0);
			
		});
		i++;
	});
}

/*
**	Picture popup for portfolio lists and portfolio single 
*/
function prettyPhoto(){
	"use strict";		

	$j('a[data-rel]').each(function() {
		$j(this).attr('rel', $j(this).data('rel'));
	});

	$j("a[rel^='prettyPhoto']").prettyPhoto({
		animation_speed: 'normal', /* fast/slow/normal */
		slideshow: false, /* false OR interval time in ms */
		autoplay_slideshow: false, /* true/false */
		opacity: 0.80, /* Value between 0 and 1 */
		show_title: true, /* true/false */
		allow_resize: true, /* Resize the photos bigger than viewport. true/false */
		default_width: 650,
		default_height: 400,
		counter_separator_label: '/', /* The separator for the gallery counter 1 "of" 2 */
		theme: 'pp_default', /* light_rounded / dark_rounded / light_square / dark_square / facebook */
		hideflash: false, /* Hides all the flash object on a page, set to TRUE if flash appears over prettyPhoto */
		wmode: 'opaque', /* Set the flash wmode attribute */
		autoplay: true, /* Automatically start videos: True/False */
		modal: false, /* If set to true, only the close button will close the window */
		overlay_gallery: false, /* If set to true, a gallery will overlay the fullscreen image on mouse over */
		keyboard_shortcuts: true, /* Set to false if you open forms inside prettyPhoto */
		deeplinking: false,
		social_tools: false
	});
}

/*
**	Show/Hide Mobile menu
*/
function initMobileMenu(){
	"use strict";
	
	$j(".mobile_menu_button span").click(function () {
		if ($j(".mobile_menu > ul").is(":visible")){
			$j(".mobile_menu > ul").slideUp(200);
		} else {
			$j(".mobile_menu > ul").slideDown(200);
		}
	});
	
	$j(".mobile_menu > ul > li.has_sub > a > span.mobile_arrow, .mobile_menu > ul > li.has_sub > h3 > span.mobile_arrow").click(function () {
		if ($j(this).closest('li.has_sub').find("> ul.sub_menu").is(":visible")){
			$j(this).closest('li.has_sub').find("> ul.sub_menu").slideUp(200);
			$j(this).closest('li.has_sub').removeClass('open_sub');
		} else {
			$j(this).closest('li.has_sub').addClass('open_sub');
			$j(this).closest('li.has_sub').find("> ul.sub_menu").slideDown(200);
		}
	});

	$j(".mobile_menu > ul > li.has_sub > ul.sub_menu > li.has_sub > a > span.mobile_arrow, .mobile_menu > ul > li.has_sub > ul.sub_menu > li.has_sub > h3 > span.mobile_arrow").click(function () {
		if ($j(this).parent().parent().find("ul.sub_menu").is(":visible")){
			$j(this).parent().parent().find("ul.sub_menu").slideUp(200);
			$j(this).parent().parent().removeClass('open_sub');
		} else {
			$j(this).parent().parent().addClass('open_sub');
			$j(this).parent().parent().find("ul.sub_menu").slideDown(200);
		}
	});
	
	$j(".mobile_menu ul li a").click(function () {
		if(($j(this).attr('href') !== "http://#") && ($j(this).attr('href') !== "#")){
			$j(".mobile_menu > ul").slideUp();
		}else{
			return false;
		}
	});

	$j(".mobile_menu ul li a span.mobile_arrow").click(function () {
		return false;
	});
}

/*
**	Init flexslider for portfolio single
*/
function initFlexSlider(){
    "use strict";
    $j('.flexslider').each(function(){
        var interval = 8000;
        if(typeof $j(this).data('interval') !== 'undefined' && $j(this).data('interval') !== false) {
            interval = parseFloat($j(this).data('interval')) * 1000;
        }

        var slideshow = true;
        if(interval === 0) {
            slideshow = false;
        }

        var animation = 'slide';
        if(typeof $j(this).data('flex_fx') !== 'undefined' && $j(this).data('flex_fx') !== false) {
            animation = $j(this).data('flex_fx');
        }

        var $image_title = "";
        var $image_caption = "";

        $j(this).flexslider({
            animationLoop: true,
            controlNav: false,
            useCSS: false,
            pauseOnAction: true,
            pauseOnHover: true,
            slideshow: slideshow,
            animation: animation,
            prevText: "<div><i class='fa fa-angle-left'></i></div>",
            nextText: "<div><i class='fa fa-angle-right'></i></div>",
            animationSpeed: 600,
            slideshowSpeed: interval,
			start: function(slider){
				setTimeout(function(){$j(".flexslider").fitVids();},200);
				if(slider.hasClass('wpb_gallery_slides')){
					$image_title = slider.slides.eq(slider.currentSlide).find('.q_gallery_slider').data('image_title');
					$image_caption = slider.slides.eq(slider.currentSlide).find('.q_gallery_slider').data('image_caption');
					slider.find('.q_gallery_title_holder_inner').html("");
					slider.find('.q_gallery_title_holder_inner').html( "<h3>"+$image_title+"</h3><p>"+$image_caption+"</p>" ); 
				}
			},
			before: function(slider){
				if(slider.hasClass('wpb_gallery_slides')){
					$image_title = slider.slides.eq(slider.animatingTo).find('.q_gallery_slider').data('image_title');
					$image_caption = slider.slides.eq(slider.animatingTo).find('.q_gallery_slider').data('image_caption');
					slider.find('.q_gallery_title_holder_inner').html("");
					slider.find('.q_gallery_title_holder_inner').html( "<h3>"+$image_title+"</h3><p>"+$image_caption+"</p>" ); 
				}
			}
		});

        $j('.flex-direction-nav a').click(function(e){
            e.preventDefault();
            e.stopImmediatePropagation();
            e.stopPropagation();
        });
    });
}

/*
**	Init fitVideo function for responsive video files
*/
function fitVideo(){
	"use strict";
	
	$j(".portfolio_images").fitVids();
	$j(".video_holder").fitVids();
	$j(".format-video .post_image").fitVids();
}

/*
**	Function for follow portfolio single descripton
*/
var $scrollHeight;
function initPortfolioSingleInfo(){
	"use strict";

	var $sidebar = $j(".portfolio_single_follow");
	if($j(".portfolio_single_follow").length > 0){
	
		var offset = $sidebar.offset();
		$scrollHeight = $j(".portfolio_container").height();
		var $scrollOffset = $j(".portfolio_container").offset();
		var $window = $j(window);

		var $headerHeight = parseInt($j('header.page_header').css('height'), 10);
		
		$window.scroll(function() {
			if($window.width() > 960){
				if ($window.scrollTop() + $headerHeight + 3 > offset.top) {
					if ($window.scrollTop() + $headerHeight + $sidebar.height() + 24 < $scrollOffset.top + $scrollHeight) {

						$sidebar.stop().animate({
							marginTop: $window.scrollTop() - offset.top + $headerHeight
						});
					} else {
						$sidebar.stop().animate({
							marginTop: $scrollHeight - $sidebar.height() - 24
						});
					}
				} else {
					$sidebar.stop().animate({
						marginTop: 0
					});
				}		
			}else{
				$sidebar.css('margin-top',0);
			}
		});
	}
}

/*
**	Plugin for preload hover image
*/
$j.fn.preload = function() {
	"use strict";

	this.each(function(){
		$j('<img/>')[0].src = this;
	});
};

/*
**	Init tabs shortcodes
*/
function initTabs(){
	"use strict";
	if($j('.q_tabs').length){
		$j('.q_tabs').each(function(){
			$j(this).appear(function() {
				$j(this).css('visibility', 'visible');
			},{accX: 0, accY: -100});
			var $tabsNav = $j(this).find('.tabs-nav');
			var $tabsNavLis = $j(this).find('.tabs-nav li');

			var border_color = "#f7f7f7";
			if($tabsNav.data('border_active_color') !== ""){
				border_color = $tabsNav.data('border_active_color');
			}

			$tabsNav.each(function() {
				var $this = $j(this);
				$this.next().children('.tab-content').stop(true,true).hide().first().show();
				$this.children('li').first().addClass('active').css('border-bottom-color', border_color).stop(true,true).show();
			});
			$tabsNavLis.on('click', function(e) {
				var $this = $j(this);
				$this.siblings().removeClass('active').css('border-bottom-color', 'transparent').end().addClass('active').css('border-bottom-color', border_color);
				$this.parent().next().children('.tab-content').stop(true,true).hide().siblings( $this.find('a').attr('href') ).fadeIn();
				e.preventDefault();
			}); 
		});
	}
}

/*
 **	Init accordion and toogle shortcodes
 */
function initAccordion() {
	"use strict";

	if($j(".q_accordion_holder").length){
		$j(".q_accordion_holder").appear(function() {
			$j(".q_accordion_holder").css('visibility', 'visible');
		},{accX: 0, accY: -100});

		if ($j(".accordion").length) {
			$j(".accordion").accordion({
				animate: "swing",
				collapsible: true,
				active: false,
				icons: "",
				heightStyle: "content"
			});

            //define custom options for each accordion
            $j(".accordion").each(function() {
                var activeTab = parseInt($j(this).data('active-tab'));
                if(activeTab !== "") {
                    activeTab = activeTab - 1; // - 1 because active tab is set in 0 index base
                    $j(this).accordion('option', 'active', activeTab);
                }

                var collapsible = ($j(this).data('collapsible') == 'yes') ? true : false;
                $j(this).accordion('option', 'collapsible', collapsible);
                $j(this).accordion('option', 'collapsible', collapsible);
            });
		}
		$j(".toggle").addClass("accordion ui-accordion ui-accordion-icons ui-widget ui-helper-reset")
		.find(".title-holder")
		.addClass("ui-accordion-header ui-helper-reset ui-state-default ui-corner-top ui-corner-bottom")
		.hover(function() {
			$j(this).toggleClass("ui-state-hover");
		})
		.click(function() {
			$j(this)
				.toggleClass("ui-accordion-header-active ui-state-active ui-state-default ui-corner-bottom")
				.next().toggleClass("ui-accordion-content-active").slideToggle(400);
			return false;
		})
		.next()
		.addClass("ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom")
		.hide();

        $j(".toggle").each(function() {
            var activeTab = parseInt($j(this).data('active-tab'));
            if(activeTab !== "" && activeTab >= 1) {
                activeTab = activeTab - 1; // - 1 because active tab is set in 0 index base
                $j(this).find('.ui-accordion-content').eq(activeTab).show();
                $j(this).find('.ui-accordion-header').eq(activeTab).addClass('ui-state-active'); //set active accordion header
            }

        });
	}    
}

/*
**	Function to enable link in accordion
*/
function initAccordionContentLink(){
	"use strict";
	
	if($j(".accordion").length){
		$j('.accordion_holder .accordion_inner .accordion_content a').click(function(){
			if($j(this).attr('target') === '_blank'){
				window.open($j(this).attr('href'),'_blank');
			}else{
				window.open($j(this).attr('href'),'_self');
			}
			return false;
		});
	}
}

/*
**	Init testimonial shortcode
*/
function initTestimonials(){
	"use strict";

    if($j('.testimonials_carousel').length){
        $j('.testimonials_carousel').flexslider({
            animationLoop: true,
            controlNav: true,
            useCSS: false,
            pauseOnAction: true,
            pauseOnHover: false,
            slideshow: true,
            animation: 'fade',
            itemMargin: 25,
            minItems: 1,
            maxItems: 1,
            animationSpeed: 600,
            slideshowSpeed: 5000
        });
    }
}

/*
**	Function to close message shortcode
*/
function initMessages(){
	"use strict";
	
	if($j('.q_message').length){
		$j('.q_message').each(function(){
			$j(this).find('.close').click(function(e){
				e.preventDefault();
				$j(this).parent().parent().fadeOut(500);
			});
		});
	}
}
/*
**	Init Element Animations
*/
function initElementsAnimation(){
	"use strict";

	if($j(".element_from_fade").length > 0 && $j('.no_animation_on_touch').length === 0){
		$j('.element_from_fade').each(function(){
			var $this = $j(this);
						
			$this.appear(function() {
				$this.addClass('element_from_fade_on');	
			},{accX: 0, accY: -100});
		});
	}
	
	if($j(".element_from_left").length > 0 && $j('.no_animation_on_touch').length === 0){
		$j('.element_from_left').each(function(){
			var $this = $j(this);
						
			$this.appear(function() {
				$this.addClass('element_from_left_on');	
			},{accX: 0, accY: -100});		
		});
	}
	
	if($j(".element_from_right").length > 0 && $j('.no_animation_on_touch').length === 0){
		$j('.element_from_right').each(function(){
			var $this = $j(this);
						
			$this.appear(function() {
				$this.addClass('element_from_right_on');	
			},{accX: 0, accY: -100});
		});
	}
	
	if($j(".element_from_top").length > 0 && $j('.no_animation_on_touch').length === 0){
		$j('.element_from_top').each(function(){
			var $this = $j(this);
						
			$this.appear(function() {
				$this.addClass('element_from_top_on');	
			},{accX: 0, accY: -100});
		});
	}
	
	if($j(".element_from_bottom").length > 0 && $j('.no_animation_on_touch').length === 0){
		$j('.element_from_bottom').each(function(){
			var $this = $j(this);
						
			$this.appear(function() {
				$this.addClass('element_from_bottom_on');	
			},{accX: 0, accY: -100});			
		});
	}
	
	if($j(".element_transform").length > 0 && $j('.no_animation_on_touch').length === 0){
		$j('.element_transform').each(function(){
			var $this = $j(this);
						
			$this.appear(function() {
				$this.addClass('element_transform_on');	
			},{accX: 0, accY: -100});	
		});
	}	
}

/*
**	Init audio player for blog layout
*/
function fitAudio(){
	"use strict";
	
	$j('.blog_holder .post_image audio').mediaelementplayer({
		audioWidth: '100%'
	});
}

/*
**	Init masonry layout for blog template
*/
function initBlog(){
	"use strict";
	
	if($j('.masonry').length){
		var width_blog = $j('.container_inner').width();
		if($j('.masonry').closest(".column_inner").length) {
			width_blog = $j('.masonry').closest(".column_inner").width();
		}
		$j('.masonry').width(width_blog);
		var $container = $j('.masonry');
		var $cols = 3;
			
		if($container.width() < 420) {
			$cols = 1;
		} else if($container.width() <= 805) {
			$cols = 2;
		}
		
		$container.isotope({
			itemSelector: 'article',
			resizable: false,
			masonry: { columnWidth: $j('.masonry').width() / $cols }
		});

		$j(window).resize(function(){
			if($container.width() < 420) {
				$cols = 1;
			} else if($container.width() <= 785) {
				$cols = 2;
			} else {
				$cols = 3;
			}
		});
		
		$j(window).smartresize(function(){
			$container.isotope({
				masonry: { columnWidth: $j('.masonry').width() / $cols}
			});
		});
	$j('.masonry').animate({opacity: "1"}, 500);
	}	
}

/*
**	Init full width masonry layout for blog template
*/
function initBlogMasonry(){
	"use strict";
	
	if($j('.masonry_full_width').length){
		var width_blog = $j('.full_width_inner').width();

		$j('.masonry_full_width').width(width_blog);
		var $container = $j('.masonry_full_width');
		var $cols = 5;
			
		if($container.width() < 480) {
			$cols = 1;
		} else if($container.width() <= 703) {
			$cols = 2;
		} else if($container.width() <= 920) {
			$cols = 3;
		} else if($container.width() <= 1320) {
			$cols = 4;
		}
		
		$container.isotope({
			itemSelector: 'article',
			resizable: false,
			masonry: { columnWidth: $j('.masonry_full_width').width() / $cols }
		});

		$j(window).resize(function(){
			if($container.width() < 480) {
				$cols = 1;
			} else if($container.width() <= 703) {
				$cols = 2;
			} else if($container.width() <= 920) {
				$cols = 3;
			} else if($container.width() <= 1320) {
				$cols = 4;
			} else {
				$cols = 5;
			}
		});
		
		$j(window).smartresize(function(){
			$container.isotope({
				masonry: { columnWidth: $j('.masonry_full_width').width() / $cols}
			});
		});
	$j('.masonry_full_width').animate({opacity: "1"}, 500);
	}	
}

/*
**	Init progress bar with icon
*/
var timeOuts = []; 
function initProgressBarsIcon(){
	"use strict";

	if($j('.q_progress_bars_icons_holder').length){
		$j('.q_progress_bars_icons_holder').each(function() {
			var $this = $j(this);
			$this.appear(function() {
				$this.find('.q_progress_bars_icons').each(function() {
					var number = $j(this).find('.q_progress_bars_icons_inner').data('number');
					var size = $j(this).find('.q_progress_bars_icons_inner').data('size');

					if(size !== ""){
						$j(this).find('.q_progress_bars_icons_inner.custom_size .bar').css({'width': size+'px','height':size+'px'});
						$j(this).find('.q_progress_bars_icons_inner.custom_size .bar .fa-stack').css({'font-size': size/2+'px'});
					} 

					var bars = $j(this).find('.bar');

					bars.each(function(i){
						if(i < number){
							var time = (i + 1)*150;
							timeOuts[i] = setTimeout(function(){
								$j(bars[i]).addClass('active');
							},time);
						}
					});
				});
			},{accX: 0, accY: -200});
		});
	}
}

/*
**	Init more facts shortcode
*/
function initMoreFacts(){
	"use strict";
	
	if($j('.more_facts_holder').length){
		$j('.more_facts_holder').each(function(){
			var $this = $j(this);
			
			var $more_label = 'More Facts';

			if($j(this).find('.more_facts_button').data('morefacts') !== ""){
				$more_label = $j(this).find('.more_facts_button').data('morefacts');
			}

			var $less_label = 'Less Facts';

			if($j(this).find('.more_facts_button').data('lessfacts') !== ""){
				$less_label = $j(this).find('.more_facts_button').data('lessfacts');
			}

			var height = $j(this).find('.more_facts_inner_holder').height();

			var speed;
			if(height > 0 && height < 601){
				speed = 800;
			} else if(height > 600 && height < 1201){
				speed = 1600;
			} else{
				speed = 2200;
			}
			$j(this).find('.more_facts_inner_holder').css({'height':'0px','display':'none','opacity':'0'});
			
			$this.find('.more_facts_button').on("mouseenter",function(){
				$j(this).css('background-color',$j(this).data('hoverbackgroundcolor'));
				$j(this).css('color',$j(this).data('hovercolor'));
				$this.find('.more_facts_button_arrow_inner').css('border-top-color',$j(this).data('hoverbackgroundcolor'));
			}).on("mouseleave",function() {
				if(!$this.find('.more_facts_inner_holder').is(':visible')){
					$j(this).css('background-color',$j(this).data('backgroundcolor'));
					$j(this).css('color',$j(this).data('color'));
					$this.find('.more_facts_button_arrow_inner').css('border-top-color',$j(this).data('backgroundcolor'));
				}
			});
			
			$this.find('.more_facts_button').click(function(){
				if(!$this.find('.more_facts_inner_holder').is(':visible')){
					$this.find('.more_facts_fake_arrow').fadeIn(speed);
					$this.addClass('more_fact_opened');
					$j(this).parent().parent().find('.more_facts_inner_holder').css({'display':'block','opacity':'1'}).stop().animate({'height': height+30}, speed);
					$j(this).text($less_label);
				} else {
					$this.find('.more_facts_fake_arrow').fadeOut(speed);
					$j(this).parent().parent().find('.more_facts_inner_holder').stop().animate({'height': '0px'}, speed,function(){
						$j(this).css({'display':'none','opacity':'0'});
						if(!$this.find('.more_facts_button').is(":hover")){$this.find('.more_facts_button').css('background-color',$this.find('.more_facts_button').data('backgroundcolor'));}
						if(!$this.find('.more_facts_button').is(":hover")){$this.find('.more_facts_button').css('color',$this.find('.more_facts_button').data('color'));}
						if(!$this.find('.more_facts_button').is(":hover")){$this.find('.more_facts_button_arrow_inner').css('border-top-color',$this.find('.more_facts_button').data('backgroundcolor'));}
						$this.removeClass('more_fact_opened');
					});
					$j(this).text($more_label);
				}
			});
		});
	}
}

/*
**	Replace plceholder
*/
function placeholderReplace(){
	"use strict";

	$j('#contact-form [placeholder]').focus(function() {
		var input = $j(this);
		if (input.val() === input.attr('placeholder')) {
			if (this.originalType) {
				this.type = this.originalType;
				delete this.originalType;
			}
			input.val('');
			input.removeClass('placeholder');
		}
	}).blur(function() {
		var input = $j(this);
		if (input.val() === '') {
			if (this.type === 'password') {
				this.originalType = this.type;
				this.type = 'text';
			}
			input.addClass('placeholder');
			input.val(input.attr('placeholder'));
		}
	}).blur();

	$j('#contact-form [placeholder]').parents('form').submit(function () {
		$j(this).find('[placeholder]').each(function () {
			var input = $j(this);
			if (input.val() === input.attr('placeholder')) {
				input.val('');
			}
		});
	});
}

function totop_button(a) {
	"use strict";

	var b = $j("#back_to_top");
	b.removeClass("off on");
	if (a === "on") { b.addClass("on"); } else { b.addClass("off"); }
}

function backButtonShowHide(){
	"use strict";

	$j(window).scroll(function () {
		var b = $j(this).scrollTop();
		var c = $j(this).height();
		var d;
		if (b > 0) { d = b + c / 2; } else { d = 1; }
		if (d < 1e3) { totop_button("off"); } else { totop_button("on"); }
	});
}

function backToTop(){
	"use strict";
	
	$j(document).on('click','#back_to_top',function(e){
		e.preventDefault();
		
		$j('body,html').animate({scrollTop: 0}, $j(window).scrollTop()/3, 'linear');
	});
}

/*
 **	Init steps
 */
function initSteps(){
    "use strict";
    if($j('.q_steps_holder').length){
        $j('.q_steps_holder').each(function(){
            $j(this).appear(function() {
                $j(this).addClass('show');
            },{accX: 0, accY: -200});
        });
    }
}

/*
 **	Init message height
 */
function initMessageHeight(){
    "use strict";
    if($j('.q_message.with_icon').length){
        $j('.q_message.with_icon').each(function(){
			if($j(this).find('.message_text_holder').height() > $j(this).find('.q_message_icon_holder').height()) {
				$j(this).find('.q_message_icon_holder').height($j(this).find('.message_text').height());
			} else {
				$j(this).find('.message_text').height($j(this).find('.q_message_icon_holder').height());
			}
        });
    }
}

/**
 * Init image hover
 */
function initImageHover() {
    "use strict";
	if($j('.image_hover').length){
		$j('.image_hover').each(function(){
			$j(this).appear(function() {
				
                var default_visible_time = 300;
                var transition_delay = $j(this).attr('data-transition-delay');
                var real_transition_delay = default_visible_time + parseFloat(transition_delay);
                var object = $j(this);
                
                //wait for other hovers to complete
                setTimeout(function() {
                    object.addClass('show');
                }, parseFloat(transition_delay));
                
                //hold that image a little, than remove class
                setTimeout(function() {
                    object.removeClass('show');
                }, real_transition_delay);
                
			},{accX: 0, accY: -200});
		});
	}
}

/*
 * Initializes vertical progress bars
 */
function initProgressBarsVertical(){
	"use strict";

	if($j('.q_progress_bars_vertical').length){
		$j('.q_progress_bars_vertical').each(function() {
			$j(this).appear(function() {
				initToCounterVerticalProgressBar($j(this));
					var percentage = $j(this).find('.progress_content').data('percentage');
					$j(this).find('.progress_content').css('height', '0%');
					$j(this).find('.progress_content').animate({
						height: percentage+'%'
					}, 1500);	
			},{accX: 0, accY: -200});
		});
	}
}

/*
 * Initializes vertical progress bar count to max value
 */
function initToCounterVerticalProgressBar($this){
	"use strict";

	if($this.find('.progress_number span').length){
		$this.find('.progress_number span').each(function() {
			var $max = parseFloat($j(this).text());
			$j(this).countTo({
				from: 0,
				to: $max,
				speed: 1500,
				refreshInterval: 50
			});
		});
	}
}

/*
*	Check if there is anchor on load and scroll to it
*/
function checkAnchorOnLoad(){
	"use strict";
	
	var hash = window.location.hash;
	if(hash !== "" && $j('[data-q_id="'+hash+'"]').length > 0){
		$j('html, body').animate({
			scrollTop: $j('[data-q_id="'+hash+'"]').offset().top - $j('header.page_header').height()
		}, 1500);
	}
			
}

/*
*	Check active state of anchor links on scroll
*/

function checkAnchorOnScroll(){
	if($j('[data-q_id]').length){
		var offset = $j('header.page_header').height();
		
		$j('[data-q_id]').waypoint( function(direction) {
			var id = $j(this).data("id");
			
			$j(".main_menu a").each(function(){
				var i = $j(this).prop("hash");
				if(i === id){
					$j('.main_menu a').parent().removeClass('active');
					if($j(this).closest('.second').length === 0){
						$j(this).parent().addClass('active');
					}else{
						$j(this).closest('.second').parent().addClass('active');
					}
					$j('.main_menu a').removeClass('current');
					$j(this).addClass('current');
				}
			});	
		}, { offset: offset });
	}
}

/*
*	Init scroll to section link if that link has hash value
*/
function initHashClick(){
	"use strict";
	
	var $doc = $j('html, body');
	$j(document).on( "click", ".main_menu a, .qbutton, .anchor", function(){
			var hash = $j(this).prop("hash");
			if((hash !== "" && $j(this).attr('href').split('#')[0] === "") || (hash !== "" && $j(this).attr('href').split('#')[0] !== "" && hash === window.location.hash) || ($j(this).attr('href').split('#')[0] == window.location.href.split('#')[0])){
				
				if($j('[data-q_id="'+hash+'"]').length > 0){
					$doc.animate({
						scrollTop: $j('[data-q_id="'+hash+'"]').offset().top - $j('header.page_header').height()
					}, 1500);
					anchorActiveState($j(this));
				}
				if(history.pushState) {
					history.pushState(null, null, hash);
				}
				return false;
			}
			
	});
	$j(document).on( "click", ".mobile_menu a", function(){
		var hash = $j(this).prop("hash");
		if((hash !== "" && $j(this).attr('href').split('#')[0] === "") || (hash !== "" && $j(this).attr('href').split('#')[0] !== "" && hash === window.location.hash) || ($j(this).attr('href').split('#')[0] == window.location.href.split('#')[0])){
			
			if($j('[data-q_id="'+hash+'"]').length > 0){
				$doc.animate({
					scrollTop: $j('[data-q_id="'+hash+'"]').offset().top - $j('.mobile_menu').height()
				}, 500);
				anchorActiveState($j(this));
			}
			if(history.pushState) {
					history.pushState(null, null, hash);
			}
			return false;
		}
		
	});
}

/*
**	Calculate height for animated text icon shortcode
*/
function animatedTextIconHeight(){
	"use strict";
	
	if($j('.animated_icons_with_text').length){
		var $icons = $j('.animated_icons_with_text');
		var maxHeight;
		
		$icons.find('.animated_text p span').each(function() {
			maxHeight = maxHeight > $j(this).height() ? maxHeight : $j(this).height();
		});
		if(maxHeight < 85) {
			maxHeight = 85;
			
		}
		$icons.find('.animated_icon_with_text_inner').height(maxHeight);
	}
}

/*
**	Add class to items in last row in animated text icon shortcode
*/
function countAnimatedTextIconPerRow(){
	"use strict";
	
	if($j('.animated_icons_with_text').length){
		$j('.animated_icons_with_text').each(function() {
			var $icons = $j(this);
			var qode_icons_height = $icons.height();
			var qode_icons_width = $icons.width();
			var maxHeightIcons;
			var iconWidth = $icons.find('.animated_icon_with_text_holder').width() + 1; // 1px because safari round on smaller number
			var countIcons = $icons.find('.animated_icon_with_text_holder').length;
			$icons.find('.animated_icon_with_text_holder').each(function() {
				maxHeightIcons = maxHeightIcons > $j(this).height() ? maxHeightIcons : $j(this).height();
			});
			maxHeightIcons = maxHeightIcons + 30; //margin for client is 30
			var numberOfIconsPerRow =  Math.ceil((qode_icons_width/iconWidth)); 
			var numberOffullRows = Math.floor(countIcons / numberOfIconsPerRow);
			var numberOfIconsInLastRow = countIcons - (numberOfIconsPerRow * numberOffullRows);
			if(numberOfIconsInLastRow === 0){
				numberOfIconsInLastRow = numberOfIconsPerRow;
			}
			$icons.find( ".animated_icon_with_text_holder" ).removeClass('border-bottom-none');
			var item_start_from = countIcons - numberOfIconsInLastRow - 1;
			$icons.find( ".animated_icon_with_text_holder:gt("+ item_start_from +")" ).addClass('border-bottom-none');
		});
	}
}


/*
*	Set active state in maim menu on anchor click
*/

function anchorActiveState(me){
	if(me.closest('.main_menu').length > 0){
		$j('.main_menu a').parent().removeClass('active');
	}
	if(me.closest('.second').length === 0){
		me.parent().addClass('active');
	}else{
		me.closest('.second').parent().addClass('active');
	}
	if(me.closest('.mobile_menu').length > 0){
		$j('.mobile_menu a').parent().removeClass('active');
		me.parent().addClass('active');
	}
	
	$j('.mobile_menu a, .main_menu a').removeClass('current');
	me.addClass('current');
}

/*
**	Video background initialization
*/
function initVideoBackground(){
	"use strict";
	
	$j('.video-wrap .video').mediaelementplayer({
		enableKeyboard: false,
		iPadUseNativeControls: false,
		pauseOtherPlayers: false,
		// force iPhone's native controls
		iPhoneUseNativeControls: false,
		// force Android's native controls
		AndroidUseNativeControls: false
	});
	
	//mobile check
		if(navigator.userAgent.match(/(Android|iPod|iPhone|iPad|IEMobile|Opera Mini)/)){
			initVideoBackgroundSize();
			$j('.mobile-video-image').show();
			$j('.video-wrap').remove();
		}
}

/*
**	Calculate video background size
*/
function initVideoBackgroundSize(){
	"use strict";
	
	$j('.section .video-wrap').each(function(i){
		
		var $sectionWidth = $j(this).closest('.section').outerWidth();
		$j(this).width($sectionWidth);
		
		var $sectionHeight = $j(this).closest('.section').outerHeight();
		min_w = vid_ratio * ($sectionHeight+20);
		$j(this).height($sectionHeight);
	
		var scale_h = $sectionWidth / video_width_original;
		var scale_v = ($sectionHeight - header_height) / video_height_original; 
		var scale =  scale_v;
		if (scale_h > scale_v)
			scale =  scale_h;
		if (scale * video_width_original < min_w) {scale = min_w / video_width_original;}
				
		$j(this).find('video, .mejs-overlay, .mejs-poster').width(Math.ceil(scale * video_width_original +2));
		$j(this).find('video, .mejs-overlay, .mejs-poster').height(Math.ceil(scale * video_height_original +2));
		$j(this).scrollLeft(($j(this).find('video').width() - $sectionWidth) / 2);
		$j(this).find('.mejs-overlay, .mejs-poster').scrollTop(($j(this).find('video').height() - ($sectionHeight)) / 2);
		$j(this).scrollTop(($j(this).find('video').height() - ($sectionHeight)) / 2);
	});
	
	$j('.carousel .item .video .video-wrap').each(function(i){
		
		var $slideWidth = $j(window).width();
		$j(this).width($slideWidth);
		
		var mob_header = $j(window).width() < 1000 ? $j('header.page_header').height() - 6 : 0; // 6 is because of the display: inline-block
		var $slideHeight = $j(this).closest('.carousel.slide').height() - mob_header;
		
		min_w = vid_ratio * ($slideHeight+20);
		$j(this).height($slideHeight);
	
		var scale_h = $slideWidth / video_width_original;
		var scale_v = ($slideHeight - header_height) / video_height_original; 
		var scale =  scale_v;
		if (scale_h > scale_v)
			scale =  scale_h;
		if (scale * video_width_original < min_w) {scale = min_w / video_width_original;}
				
		$j(this).find('video, .mejs-overlay, .mejs-poster').width(Math.ceil(scale * video_width_original +2));
		$j(this).find('video, .mejs-overlay, .mejs-poster').height(Math.ceil(scale * video_height_original +2));
		$j(this).scrollLeft(($j(this).find('video').width() - $slideWidth) / 2);
		$j(this).find('.mejs-overlay, .mejs-poster').scrollTop(($j(this).find('video').height() - ($slideHeight)) / 2);
		$j(this).scrollTop(($j(this).find('video').height() - ($slideHeight)) / 2);
	});
	
	$j('.portfolio_single .video .video-wrap, .blog_holder .video .video-wrap').each(function(i){ 
   
		var $this = $j(this); 

		var $videoWidth = $j(this).closest('.video').outerWidth(); 
		$j(this).width($videoWidth); 
		var $videoHeight = ($videoWidth*9)/16; 

		if(navigator.userAgent.match(/(Android|iPod|iPhone|iPad|IEMobile|Opera Mini)/)){ 
			$this.parent().width($videoWidth); 
			$this.parent().height($videoHeight); 
		} 

		min_w = vid_ratio * ($videoHeight+20); 
		$j(this).height($videoHeight); 

		var scale_h = $videoWidth / video_width_original; 
		var scale_v = ($videoHeight - header_height) / video_height_original;  
		var scale =  scale_v; 
		if (scale_h > scale_v) 
			scale =  scale_h; 
		if (scale * video_width_original < min_w) {scale = min_w / video_width_original;} 

		$j(this).find('video, .mejs-overlay, .mejs-poster').width(Math.ceil(scale * video_width_original +2)); 
		$j(this).find('video, .mejs-overlay, .mejs-poster').height(Math.ceil(scale * video_height_original +2)); 
		$j(this).scrollLeft(($j(this).find('video').width() - $videoWidth) / 2); 
		$j(this).find('.mejs-overlay, .mejs-poster').scrollTop(($j(this).find('video').height() - ($videoHeight)) / 2); 
		$j(this).scrollTop(($j(this).find('video').height() - ($videoHeight)) / 2); 
	});  
	
}

/*
**	Icon With Text animation effect
*/
function initIconWithTextAnimation(){
	"use strict";
	if($j('.q_icon_animation').length > 0 && $j('.no_animation_on_touch').length === 0){
		$j('.q_icon_animation').each(function(){
			$j(this).appear(function() {
				$j(this).addClass('q_show_animation');
			},{accX: 0, accY: -100});	
		});	
	}
}

/*
**	Icon List With Text animation effect
*/
function initIconListWithTextAnimation(){
	"use strict";
	if($j('.q_icon_list_animation').length > 0 && $j('.no_animation_on_touch').length === 0){
		$j('.q_icon_list_animation').each(function(){
			$j(this).appear(function() {
				$j(this).parent().parent().addClass('q_show_animation');
			},{accX: 0, accY: -100});	
		});	
	}
}

/*
**	Add class on body if browser is Safari
*/
function initCheckSafariBrowser(){
	"use strict";

	if (navigator.userAgent.indexOf('Safari') !== -1 && navigator.userAgent.indexOf('Chrome') === -1) {
		$j('body').addClass('safari_browser');
	}
}

/*
**	Initialize Qode search form
*/
function initSearchButton(){
	if($j('.search_button').length){
		$j('.search_button').click(function(e){
			e.preventDefault();

			if($j('html').hasClass('touch')){
				if ($j('.qode_search_form').height() == "0") {
					$j('.qode_search_form input[type="text"]').onfocus = function () {
						window.scrollTo(0, 0);
						document.body.scrollTop = 0;
					};
					$j('.qode_search_form input[type="text"]').onclick = function () {
						window.scrollTo(0, 0);
						document.body.scrollTop = 0;
					};
					$j('.header_top_bottom_holder').css('top','50px');
					$j('.qode_search_form').css('height','50px');
					$j('.content_inner').css('margin-top','50px');
					if($scroll < 34){ $j('header.page_header').css('top','0'); }
				} else {
					$j('.qode_search_form').css('height','0');
					$j('.header_top_bottom_holder').css('top','0');
					$j('.content_inner').css('margin-top','0');
					if($scroll < 34){ $j('header.page_header').css('top',-$scroll);}
				}

				$j(window).scroll(function() {
					if ($j('.qode_search_form').height() != "0" && $scroll > 50) {
						$j('.qode_search_form').css('height','0');
						$j('.header_top_bottom_holder').css('top','0');
						$j('.content_inner').css('margin-top','0');
					}
				});

				$j('.qode_search_close').click(function(e){
					e.preventDefault();
					$j('.qode_search_form').css('height','0');
					$j('.header_top_bottom_holder').css('top','0');
					$j('.content_inner').css('margin-top','0');
					if($scroll < 34){ $j('header.page_header').css('top',-$scroll);}
				});

			} else {
				var yPos;
				if($j('.title').hasClass('has_fixed_background')){
					yPos = parseInt($j('.title.has_fixed_background').css('backgroundPosition').split(" ")[1]);
				}else { 
					yPos = 0;
				}
				if ($j('.qode_search_form').height() == "0") {
					$j('.qode_search_form input[type="text"]').focus();
					$j('.header_top_bottom_holder').stop().animate({top:"50px"},150);
					$j('.qode_search_form').stop().animate({height:"50px"},150);
					$j('.content_inner').stop().animate({marginTop:"50px"},150);
					if($scroll < 34){ $j('header.page_header').stop().animate({top:0},150); }
					$j('.title.has_fixed_background').css('backgroundPosition', 'center '+(yPos+50)+'px');
				} else {
					$j('.qode_search_form').stop().animate({height:"0"},150);
					$j('.header_top_bottom_holder').stop().animate({top:"0px"},150);
					$j('.content_inner').stop().animate({marginTop:"0"},150);
					if($scroll < 34){ $j('header.page_header').stop().animate({top:-$scroll},150);}
					$j('.title.has_fixed_background').css('backgroundPosition', 'center '+(yPos)+'px');
				}

				$j(window).scroll(function() {
					if ($j('.qode_search_form').height() != "0" && $scroll > 50) {
						$j('.qode_search_form').stop().animate({height:"0"},150);
						$j('.header_top_bottom_holder').stop().animate({top:"0px"},150);
						$j('.content_inner').stop().animate({marginTop:"0"},150);
						$j('.title.has_fixed_background').css('backgroundPosition', 'center '+(yPos)+'px');
					}
				});

				$j('.qode_search_close').click(function(e){
					e.preventDefault();
					$j('.qode_search_form').stop().animate({height:"0"},150);
					$j('.content_inner').stop().animate({marginTop:"0"},150);
					$j('.header_top_bottom_holder').stop().animate({top:"0px"},150);
					if($scroll < 34){ $j('header.page_header').stop().animate({top:-$scroll},150);}
					$j('.title.has_fixed_background').css('backgroundPosition', 'center '+(yPos)+'px');
				});
			}
		});
	}
}

/*
**	Init update Shopping Cart
*/
function updateShoppingCart(){
	"use strict";

		$j('body').bind('added_to_cart', add_to_cart);
		function add_to_cart(event, parts, hash) {
			var miniCart = $j('.shopping_cart_header');
			if ( parts['div.widget_shopping_cart_content'] ) {
				var $cartContent = jQuery(parts['div.widget_shopping_cart_content']),
				$itemsList = $cartContent .find('.cart_list'),
				$total = $cartContent.find('.total').contents(':not(strong)').text();
			miniCart.find('.shopping_cart_dropdown_inner').html('').append($itemsList);
			miniCart.find('.total span').html('').append($total);
			}
		}
}


/*
**	Set content bottom margin because of the uncovering footer
*/
function setContentBottomMargin(){
	if($j('.uncover').length){
		$j('.content').css('margin-bottom', $j('footer').height());
	}
}

/*
**	Boxes which reveal text on hover
*/
function initCoverBoxes(){
	if($j('.cover_boxes').length){
		$j('.cover_boxes').find('li:first-child').addClass('act');
		var cover_boxed = $j('.cover_boxes');
		cover_boxed.each(function(i){
			$j(cover_boxed[i]).find('li').each(function(){
				$j(this).hover(function() {
					$j(cover_boxed[i]).find('li').removeClass('act');
					$j(this).addClass('act');
				});

			});
		});
	}
}

/*
**	Create content menu from selected rows
*/
function createContentMenu(){
	"use strict";

	var content_menu = $j(".content_menu");
	content_menu.each(function(){
		if($j(this).find('ul').length === 0){

			if($j(this).css('background-color') !== ""){
				var background_color = $j(this).css('background-color');
			}

			var content_menu_ul = $j("<ul class='menu'></ul>");
			content_menu_ul.appendTo($j(this));
			
			var sections = $j(this).siblings('.in_content_menu');
			
			if(sections.length){
				sections.each(function(){
					var section_href = $j(this).data("q_id");
					var section_title = $j(this).data('q_title');
					var section_icon = $j(this).data('q_icon');
					
					var li = $j("<li />");
					var icon = $j("<i />", {"class": 'fa '+section_icon});
					var link = $j("<a />", {"href": section_href, "html": section_title});
					var arrow;
					if(background_color !== ""){
						arrow = $j("<div />", {"class": 'arrow', "style": 'border-color: '+background_color+' transparent transparent transparent'});
					} else {
						arrow = $j("<div />", {"class": 'arrow'});
					}
					icon.prependTo(link);
					link.appendTo(li);
					arrow.appendTo(li);
					li.appendTo(content_menu_ul);
					
				});
			}
		}
	});
}

/*
**	Create content menu (select menu for responsiveness)from selected rows
*/
function createSelectContentMenu(){
	"use strict";
	
	var content_menu = $j(".content_menu");
	content_menu.each(function(){	
		
		var $this = $j(this);
		
		var $menu_select = $j("<ul></ul>");
		$menu_select.appendTo($j(this).find('.nav_select_menu'));
		
		
		$j(this).find("ul.menu li a").each(function(){
		
			var menu_url = $j(this).attr("href");
			var menu_text = $j(this).text();
			var menu_icon = $j(this).find('i').clone();
			
			if ($j(this).parents("li").length === 2) { menu_text = "&nbsp;&nbsp;&nbsp;" + menu_text; }
			if ($j(this).parents("li").length === 3) { menu_text = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + menu_text; }
			if ($j(this).parents("li").length > 3) { menu_text = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + menu_text; }
			
			var li = $j("<li />");
			var link = $j("<a />", {"href": menu_url, "html": menu_text});
			menu_icon.prependTo(link);
			link.appendTo(li);
			li.appendTo($menu_select);
		});
		
		
		$this.find(".nav_select_button").on('click', function() {
			if ($this.find('.nav_select_menu ul').is(":visible")){
				$this.find('.nav_select_menu ul').slideUp();
			} else {
				$this.find('.nav_select_menu ul').slideDown();
			}
			return false;
		});
		
		$this.find(".nav_select_menu ul li a").on('click',function () {
			$this.find('.nav_select_menu ul').slideUp();
			var $link = $j(this);
			
			var $target = $link.attr("href");
			var targetOffset = $j("div.wpb_row[data-q_id='" + $target + "'],section.parallax_section_holder[data-q_id='" + $target + "']").offset().top;
			
			$j('html,body').stop().animate({scrollTop: targetOffset }, 500, 'swing', function(){
				$j('nav.content_menu ul li').removeClass('active');
				$link.parent().addClass('active');
			});

			return false;
		});
	});
}

/*
**	Calculate content menu position and fix it when needed
*/
function contentMenuPosition(){
	"use strict";
	
	if($j('nav.content_menu').length){
			
		if(content_menu_position > sticky_amount){
			var x = min_header_height_sticky;
		}else{
			var x = 0;
		}
			
		if(content_menu_position - x - content_menu_top_add - $scroll <= 0 && ($j('header').hasClass('stick'))){
			
			if(content_menu_position < sticky_amount){
				if($scroll > sticky_amount){
					$j('nav.content_menu').css({'position': 'fixed', 'top': min_header_height_sticky + content_menu_top_add}).addClass('fixed');	
				}else{
					$j('nav.content_menu').css({'position': 'fixed', 'top': 0, transition:'none'}).addClass('fixed');
				}
			}else{
				$j('nav.content_menu').css({'position': 'fixed', 'top': min_header_height_sticky + content_menu_top_add}).addClass('fixed');	
			}
			
			$j('.content > .content_inner > .container > .container_inner').css('margin-top',content_line_height);
			$j('.content > .content_inner > .full_width').css('margin-top',content_line_height);
			
		} else if(content_menu_position - content_menu_top - content_menu_top_add - $scroll <= 0 && !($j('header').hasClass('stick'))) {
			$j('nav.content_menu').css({'position': 'fixed', 'top': content_menu_top + content_menu_top_add}).addClass('fixed');	
			$j('.content > .content_inner > .container > .container_inner').css('margin-top',content_line_height);
			$j('.content > .content_inner > .full_width').css('margin-top',content_line_height);
		} else {
			$j('nav.content_menu').css({'position': 'relative', 'top': '0px'}).removeClass('fixed');
			$j('.content > .content_inner > .container > .container_inner').css('margin-top','0px');
			$j('.content > .content_inner > .full_width').css('margin-top','0px');
		}
		
		$j('.content .in_content_menu').waypoint( function(direction) {
			var $active = $j(this);
			var id = $active.data("q_id");
			
			$j("nav.content_menu.fixed li a").each(function(){
				var i = $j(this).attr("href");
				if(i === id){
					$j(this).parent().addClass('active');
				}else{
					$j(this).parent().removeClass('active');
				}
			});	
		}, { offset: '150' });
	}
}

/*
**	Check first and last content menu included rows for active state in content menu
*/
function contentMenuCheckLastSection(){
	"use strict";
	
	if($j('nav.content_menu').length){
	
		if($j('.content .in_content_menu').length){
			var last_from_top = $j('.content .in_content_menu:last').offset().top + $j('.content .in_content_menu:last').height();
			var first_from_top = $j('.content .in_content_menu:first').offset().top - content_menu_top - content_menu_top_add - 60; //60 is height of content menu
			if(last_from_top < $scroll){
				$j("nav.content_menu.fixed li").removeClass('active');
				
			}
			if(first_from_top > $scroll){
				$j('nav.content_menu li:first, nav.content_menu ul.menu li:first').removeClass('active');
				
			}
		}
	}
}

/*
**	Scroll to section when item in content menu is clicked
*/
function contentMenuScrollTo(){
	"use strict";

	if($j('nav.content_menu').length){
		
		$j("nav.content_menu ul.menu li a").on('click', function(e){
			e.preventDefault();
			var $this = $j(this);
			
			if($j(this).parent().hasClass('active')){
				return false;
			}
			
			var $target = $this.attr("href");
			var targetOffset = $j("div.wpb_row[data-q_id='" + $target + "'],section.parallax_section_holder[data-q_id='" + $target + "']").offset().top - content_line_height - content_menu_top - content_menu_top_add;
			$j('html,body').stop().animate({scrollTop: targetOffset }, 500, 'swing', function(){
				$j('nav.content_menu ul li').removeClass('active');
				$this.parent().addClass('active');
			});

			return false;
		});
		
	}
}

/*
**	Init footer height for left border line
*/
function setFooterHeight(){
	"use strict";
	
	if($j('.footer_top').length){
		var maxHeight = Math.max.apply(null, $j(".footer_top .column_inner").map(function (){
			return $j(this).height();
		}).get());

		$j('.footer_top .column_inner').css('min-height', maxHeight);
	}
}

/*
**	Init hover border color for Service Table shortcode
*/
function setServiceTableHover(){
	"use strict";

	if($j('.service_table_holder .service_table_inner').length){
		$j('.service_table_holder .service_table_inner').each(function(){
			var $borderColor = "";

			if($j(this).data('borderservice') !== ""){
				$borderColor = $j(this).data('borderservice');
			}

			$j(this).mouseenter(function() {
				$j(this).css('border-color', $borderColor);
			}).mouseleave(function() {
				$j(this).css('border-color', '#d8d8d8');
			});
		});
	}
}

/*
**	Add class to show bottom title
*/
function showTitleThumb(){
	"use strict";
	
	if($j('.title.position_left_image').length){
		$j('.title').addClass('show_title_thumb');
	}
}
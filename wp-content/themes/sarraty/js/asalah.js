jQuery(document).ready(function($) {
	
	
	jQuery(window).load(function () {
	
		jQuery('.ei-slider').eislideshow({
			animation: 'center',
			speed: 1600,
			easing		: 'easeOutExpo',
			titleeasing	: 'easeOutExpo',
			titlespeed	: 1200,
			autoplay: true
		});
	});
	
jQuery('.parallax_section').parallax("50%", 0.4);
$('.content_container').appear();
	
	 
  var owl = jQuery(".project_carousel_wide");
 
  owl.owlCarousel({
     
      itemsCustom : [
        [0, 2],
        [450, 2],
        [600, 3],
        [700, 4],
        [1000, 4],
        [1300, 5],
        [1600, 6],
      ]
 
  });
  
   
   jQuery('.testimonials_slider').each(function(){
   	    var owl = jQuery(this);
   	  	auto = jQuery(this).attr('data-auto');
   	   	 owl.owlCarousel({
   	   	    
   	   	     itemsCustom : [
   	   	       [0, 1]
   	   	     ],
   	   	     autoPlay: auto,
   	   	     stopOnHover: true,
   	   	
   	   	 });
    });  
	 	 var owl_boxed = jQuery(".project_carousel_boxed");	 	  owl_boxed.owlCarousel({	     	      itemsCustom : [	        [0, 2],	        [450, 2],	        [600, 3],	      ],	      navigation : false	 	  });	  	  jQuery('.clients_carousel').each(function(){		    var owl = jQuery(this);		  	appeared = jQuery(this).attr('data-appeared-items');		   	owl.owlCarousel({		       		       itemsCustom : [		         [0, 2],		         [450, 2],		         [600, 4],		         [992, appeared],		       ],		       navigation : false,		       pagination: false,		       autoPlay: true,		  		   });	   });	  
	
    jQuery.fn.fadeDelay = function() {
        delay = 0;
        return this.each(function() {
            $(this).delay(delay).fadeTo(1100, 1);
            delay += 420;
        });
    };

    $(document.body).on('appear', '.content_container', function() {
        // this code is executed for each appeared element
        jQuery(this).find('.show_fade_steps').fadeDelay();
        jQuery(this).find('.show_fade').css('visibility', 'visible').addClass('animated fadeIn');
        jQuery(this).find('.show_fade_left').css('visibility', 'visible').addClass('animated fadeInLeft');
        jQuery(this).find('.show_fade_right').css('visibility', 'visible').addClass('animated fadeInRight');
        jQuery(this).find('.show_fade_down').css('visibility', 'visible').addClass('animated fadeInDown');
        jQuery(this).find('.show_fade_up').css('visibility', 'visible').addClass('animated fadeInUp');
        jQuery(this).find('.show_bounce').css('visibility', 'visible').addClass('animated bounceIn');
    });

    /* start expanded search jquery */
    jQuery(".header_info .search .input-group .btn ").click(function() {
        jQuery(".header_info .search").addClass("expanded_search");
        jQuery(".header_info .search.expanded_search .input-group input[type='text'].form-control").focus();

    });

    /* activate this as an option not as default.
     * 
     $('html').click(function() {
     jQuery(".header_info .search").removeClass("expanded_search");
     });
     $('.header_info .search').click(function(event){
     event.stopPropagation();
     });
     */
    /* end expanded search jquery */


    /* start portfolio intro loader */
    jQuery(".portfolio_grid_row .project_thumbnail .thumbnail").click(function(e) {
        e.preventDefault();
        var intro_loader_id = "#" + $(this).attr("rel");
        jQuery(".project_intro_loader").addClass("hidden");
        jQuery(".project_intro_loader").removeClass('animated fadeInUp');
        jQuery(intro_loader_id).removeClass("hidden");
        jQuery(intro_loader_id).addClass('animated fadeInUp');

    });
    
    jQuery(".portfolio_grid_row .project_thumbnail .thumbnail_mask").click(function(e) {
            e.preventDefault();
            var intro_loader_id = "#" + $(this).attr("rel");
            jQuery(".project_intro_loader").addClass("hidden");
            jQuery(".project_intro_loader").removeClass('animated fadeInUp');
            jQuery(intro_loader_id).removeClass("hidden");
            jQuery(intro_loader_id).addClass('animated fadeInUp');
    
        });
    /* end portfolio intro loader */
	
	
    /* start portfolio fade filter */
    jQuery(".filter_link").click(function(e) {
        e.preventDefault();
        var filtered_class = "." + $(this).attr("rel");
        jQuery(".portfolio_grid_row .project_thumbnail").addClass("faded_thumbnails");
        jQuery(".portfolio_grid_row .project_intro_loader").addClass("faded_thumbnails");
        jQuery(".portfolio_grid_row .project_thumbnail").removeClass("filtered_thumbnails");
        jQuery(".portfolio_grid_row .project_intro_loader").removeClass("filtered_thumbnails");
        // jQuery(".portfolio_grid_row .project_intro_loader").addClass("hidden");
        jQuery(".portfolio_grid_row .project_thumbnail" + filtered_class).addClass('filtered_thumbnails');
        jQuery(".portfolio_grid_row .project_intro_loader" + filtered_class).addClass('filtered_thumbnails');
    });
    /* end portfolio fade filter */
	
	/* start dropdown menu effect */
//	jQuery(".dropdown").hover(function(e) {
//	    e.preventDefault();
//	    var filtered_class = "." + $(this).attr("rel");
//	    jQuery(".dropdown-menu").addClass("animated fadeInDown");
//	});
	/* end dropdown menu effect */
	
    /* start sicky header */
    jQuery(window).scroll(function() {
        var scrolling = jQuery(window).scrollTop();
        var main_navbar_offset = jQuery('.main_navbar').offset().top;
        if (scrolling > main_navbar_offset) {
            jQuery('.site_header').stop().addClass('sticky_header');
            jQuery('.header_top').stop().removeClass('fadeIn');
            jQuery('.header_top').stop().addClass('animated fadeOutUp');
            
            jQuery('.gototop').stop().removeClass('fadeOutDown');
            jQuery('.gototop').stop().addClass('animated fadeInUp');

        } else if (scrolling < main_navbar_offset) {
            jQuery('.site_header').removeClass('sticky_header');
            jQuery('.header_top').stop().removeClass(' fadeOutUp');
            jQuery('.header_top').stop().addClass('fadeIn');
            
            jQuery('.gototop').stop().removeClass('fadeInUp');
            jQuery('.gototop').stop().addClass('fadeOutDown');
            
        }
    });

    jQuery(window).load(function() {
    	
        var scrolling = jQuery(window).scrollTop();
        var main_navbar_offset = jQuery('.main_navbar').offset().top;
        if (scrolling > main_navbar_offset) {
            jQuery('.site_header').stop().addClass('sticky_header');
            jQuery('.header_top').stop().removeClass('fadeIn');
            jQuery('.header_top').stop().addClass('animated fadeOutUp');

        } else if (scrolling < main_navbar_offset) {
            jQuery('.site_header').removeClass('sticky_header');
            jQuery('.header_top').stop().removeClass(' fadeOutUp');
            jQuery('.header_top').stop().addClass('fadeIn');
        }
    });
    /* end sticky header */


    // apply fitvids to all video banners
    jQuery(".video_fit_container").fitVids();

    // prettyphoto script
    jQuery("a.prettyPhoto").prettyPhoto();

    jQuery(".prettyPhotolink").click(function() {
        var thisgal = jQuery(this).attr('rel');
        jQuery("a.prettyPhoto." + thisgal + ":first").click()
    });

    // start go to top button
    jQuery('.gototop').click(function(){
		jQuery('html, body').animate({scrollTop: '0px'}, 800);
		return false;
	});
    
    // activate carousel 
    $('.carousel').carousel();

    // Can also be used with $(document).ready()
    $(window).load(function() {
        $('.flexslider').flexslider({
            animation: "slide",
            nextText: "",
            prevText: "",
            controlNav: false
        });
    });
});


/*
 * Project: Twitter Bootstrap Hover Dropdown
 * Author: Cameron Spear
 * Contributors: Mattia Larentis
 *
 * Dependencies?: Twitter Bootstrap's Dropdown plugin
 *
 * A simple plugin to enable twitter bootstrap dropdowns to active on hover and provide a nice user experience.
 *
 * No license, do what you want. I'd love credit or a shoutout, though.
 *
 * http://cameronspear.com/blog/twitter-bootstrap-dropdown-on-hover-plugin/
 */
;(function($, window, undefined) {
    // outside the scope of the jQuery plugin to
    // keep track of all dropdowns
    var $allDropdowns = $();

    // if instantlyCloseOthers is true, then it will instantly
    // shut other nav items when a new one is hovered over
    $.fn.dropdownHover = function(options) {

        // the element we really care about
        // is the dropdown-toggle's parent
        $allDropdowns = $allDropdowns.add(this.parent());

        return this.each(function() {
            var $this = $(this).parent(),
                defaults = {
                    delay: 500,
                    instantlyCloseOthers: true
                },
                data = {
                    delay: $(this).data('delay'),
                    instantlyCloseOthers: $(this).data('close-others')
                },
                settings = $.extend(true, {}, defaults, options, data),
                timeout;

            //// Return Menu Height to its original state
            //$this.children('.dropdown-menu').css({ height: 'auto' });
            //// Get original height
            //var ulDropMenuHeight = $this.children('.dropdown-menu').height();
            //// Return Height to Zero state
            //$this.children('.dropdown-menu').css({ height: "0", overflow: "hidden" });

            $this.hover(function () {

                //// Fix issues in responsive mode
                //// Return Menu Height to its original state
                //$this.children('.dropdown-menu').css({ height: 'auto' });
                //// Get original height
                //var ulDropMenuHeight = $this.children('.dropdown-menu').height();
                //// Return Height to Zero state
                //$this.children('.dropdown-menu').css({ height: "0", overflow: "hidden" });

                if (settings.instantlyCloseOthers === true) {
                    $allDropdowns.removeClass('open');
                    $allDropdowns.children('.dropdown-menu').slideUp(50);
                    //$allDropdowns.children('.dropdown-menu').css({ display: "none", overflow: "hidden" });
                    //$allDropdowns.children('.dropdown-menu').stop().animate({ height: '0' }, { queue: false, duration: 50, easing: 'jswing' });
                }

                window.clearTimeout(timeout);
                
                $('> .dropdown-menu', this).slideDown(0);
                $(this).addClass('open');

                //$(this).children('.dropdown-menu').css({ display: "block", overflow: "hidden" });
                //$(this).children('.dropdown-menu').stop().animate({ height: ulDropMenuHeight + "px" }, { queue: false, duration: 50, easing: 'jswing' });

            }, function() {
                timeout = window.setTimeout(function() {
                    $this.removeClass('open');

                    $this.children('.dropdown-menu').slideUp(0);

                    //$this.children('.dropdown-menu').css({ display: "none", overflow: "hidden" });
                    //$this.children('.dropdown-menu').stop().animate({ height: '0' }, { queue: false, duration: 50, easing: 'jswing' });

                }, settings.delay);
            });

            $this.children('.dropdown-menu').find('.dropdown-submenu').hover(function () {
                $(this).parent().css({ overflow: "visible" });

            });
        });
    };

    // apply dropdownHover to all elements with the data-hover="dropdown" attribute
    $(document).ready(function() {
        $('[data-hover="dropdown"]').dropdownHover();
    });
})(jQuery, this);


jQuery(window).load(function() {
    
    
    var $container = jQuery('#portfolio_container');
    
    $container.isotope({
      itemSelector : '.portfolio_element'
    });
    
    
  var $optionSets = jQuery('#portfolio_filter_options .option-set'),
	  $optionLinks = $optionSets.find('a');

  $optionLinks.click(function(){
	var $this = jQuery(this);
	// don't proceed if already selected
	if ( $this.closest('li').hasClass('active') ) {
	  return false;
	}
	var $optionSet = $this.parents('.option-set');
	$optionLinks.closest('li').removeClass('active');
	$this.closest('li').addClass('active');

	// make option object dynamically, i.e. { filter: '.my-filter-class' }
	var options = {},
		key = $optionSet.attr('data-option-key'),
		value = $this.attr('data-option-value');
	// parse 'false' as false boolean
	value = value === 'false' ? false : value;
	options[ key ] = value;
	if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
	  // changes in layout modes need extra logic
	  changeLayoutMode( $this, options )
	} else {
	  // otherwise, apply new options
	  $container.isotope( options );
	}
	
	return false;
  });
  });

        
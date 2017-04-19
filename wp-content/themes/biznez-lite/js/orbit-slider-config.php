<?php global $shortname; ?>
<?php if(sketch_get_option($shortname.'_slider_type') != 'normal') { ?>
<script type="text/javascript">
	jQuery(document).ready(function(){									
		jQuery("body").addClass("page-template-template-fullwidthslider-php");
	});
</script>
<?php } ?>
<script type="text/javascript">
jQuery(document).ready(function(){
jQuery(window).load(function() {
       jQuery('#featuredslider,#featuredfullslider').orbit({
			 animation: '<?php if(sketch_get_option($shortname.'_effect_select')) { echo sketch_get_option($shortname.'_effect_select'); } else{ echo 'fade';}?>',                  // fade, horizontal-slide, vertical-slide, horizontal-push
			 animationSpeed:<?php if(sketch_get_option($shortname.'_animation_speed')){ echo sketch_get_option($shortname.'_animation_speed');} else{ echo '800';}?>,                // how fast animtions are
			 timer: true, 			 // true or false to have the timer
			 advanceSpeed:4000, 		 // if timer is enabled, time between transitions 
			 pauseOnHover: false, 		 // if you hover pauses the slider
			 startClockOnMouseOut: false, 	 // if clock should start on MouseOut
			 startClockOnMouseOutAfter:1000, 	 // how long after MouseOut should the timer start again
			 directionalNav:true, 		 // manual advancing directional navs
			 captions: true, 			 // do you want captions?
			 captionAnimation: 'fade', 		 // fade, slideOpen, none
			 captionAnimationSpeed: 800, 	 // if so how quickly should they animate in
			 bullets:true,			 // true or false to activate the bullet navigation
			 bulletThumbs: false,		 // thumbnails for the bullets
			 bulletThumbLocation: '',		 // location from this file where thumbs will be
			 afterSlideChange: function(){} 	 // empty function 
});
});
});
</script>
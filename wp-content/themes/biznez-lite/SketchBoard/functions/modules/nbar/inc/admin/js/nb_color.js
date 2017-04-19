jQuery(document).ready(function(){
	/*color picker jquery start*/
		jQuery('.nabr_colorScheme').farbtastic('#nabr_colorScheme');
		jQuery('.nabr_messageColor').farbtastic('#nabr_messageColor');
		jQuery('.nabr_linkTextColor').farbtastic('#nabr_linkTextColor');
		jQuery('.nabr_linkBgcolor').farbtastic('#nabr_linkBgcolor');
		jQuery('.nabr_extendMesgColor').farbtastic('#nabr_extendMesgColor');
		jQuery('.nabr_extendMesgImgBorderCol').farbtastic('#nabr_extendMesgImgBorderCol');
		jQuery('.nabr_extendMesgLinkColor').farbtastic('#nabr_extendMesgLinkColor');	
		jQuery('.nabr_extendMesgLinkBgcolor').farbtastic('#nabr_extendMesgLinkBgcolor');
		
		jQuery('html').click(function() {jQuery("#nbpro_wrapper .farbtastic").fadeOut('fast');});
		jQuery('#nbpro_wrapper .nbar_colsel').click(function(event){
			jQuery("#nbpro_wrapper .farbtastic").hide();
			jQuery(this).find(".farbtastic").fadeIn('fast');event.stopPropagation();
		});
	/*color picker jquery end*/
});                                                                               
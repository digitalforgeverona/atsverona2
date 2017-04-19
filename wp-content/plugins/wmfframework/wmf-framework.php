<?php
$options = get_option('wmf_framework_options');  

/*-----------------------------------------------------------------------------------*/
/*	INIT Shortcodes
/*-----------------------------------------------------------------------------------*/
add_action('init', 'wmf_framework_add_button');
function wmf_framework_add_button() {  
   if ( current_user_can('edit_posts') || current_user_can('edit_pages') )  
   {  
     add_filter('mce_external_plugins', 'wmf_framework_plugins');  
     add_filter('mce_buttons', 'wmf_framework_add_buttons'); 
   }  
}  

function wmf_framework_add_buttons($buttons) {  
   array_push($buttons, "|", "wmff_slider","wmff_gallery"); 
   return $buttons;  
}  

function wmf_framework_plugins($shortcode_arr) {
   if ( floatval(get_bloginfo('version')) >= 3.9){
	   $shortcode_arr['wmff_slider'] = WES_PLUGIN_JS_URL.'shortcodes.php';
	   $shortcode_arr['wmff_gallery'] = WES_PLUGIN_JS_URL.'shortcodes.php';
   }else{
	   $shortcode_arr['wmff_slider'] = WES_PLUGIN_JS_URL.'shortcodes.old.php';
	   $shortcode_arr['wmff_gallery'] = WES_PLUGIN_JS_URL.'shortcodes.old.php'; 
   }
   return $shortcode_arr;  
}


/*-----------------------------------------------------------------------------------*/
/*	POST TYPES
/*-----------------------------------------------------------------------------------*/
include 'slider.php'; 
include 'gallery.php'; 
 
add_image_size('featured_preview', 55, 55, true);
add_theme_support('post-thumbnails'); 

?>
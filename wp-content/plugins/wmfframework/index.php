<?php
/*
	Plugin Name: Webbu Mobile First Framework
	Plugin URI: http://themeforest.net/user/Webbu
	Description: Slider/Portfolio/Gallery Webbu Mobile First Framework (WMF).
	Version: 1.1.2
	Author: Webbu
	Author URI: http://themeforest.net/user/Webbu
*/

//Define directories.
define("WES_THEME_URL", plugin_dir_url( __FILE__ ));
define("WES_PLUGIN_CSS_URL",WES_THEME_URL."css/");
define("WES_PLUGIN_JS_URL",WES_THEME_URL."js/");
define("WES_PLUGIN_IMAGE_URL",WES_THEME_URL."images/");

function wmff_lang_init_framework() {
  load_plugin_textdomain( 'wmft2d', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' ); 
}
add_action('plugins_loaded', 'wmff_lang_init_framework');


/*------------------------------------*\
	Loading Hook
\*------------------------------------*/


//Enque Styles & Scripts.
function wmff_enque()
{	
	$options = get_option('wmf_framework_options');
	
	global $wmf_mobiledetect;
	
	if (!is_admin()) {
				
		wp_register_style('wmff_style_css', WES_PLUGIN_CSS_URL . 'style.css', array(), '1.0', 'all');
		wp_enqueue_style('wmff_style_css');
		wp_register_style('wmff_shadows_css', WES_PLUGIN_CSS_URL . 'shadows.css', array(), '1.0', 'all');
		wp_enqueue_style('wmff_shadows_css');
		
			
			
			
			//If slider activated.
			wp_register_style('wmff_flexslider_css', WES_PLUGIN_CSS_URL . 'flexslider.css', array(), '2.2.0', 'all');
			wp_enqueue_style('wmff_flexslider_css');
			
			wp_register_script('wmff_flexslider_js', WES_PLUGIN_JS_URL . 'jquery.flexslider-min.js', array('jquery'), '2.2.0',true);
			wp_enqueue_script('wmff_flexslider_js');
			wp_register_script('wmff_jquery_easing_js', WES_PLUGIN_JS_URL . 'jquery.easing.js', array('jquery'), '1.3',true);
			wp_enqueue_script('wmff_jquery_easing_js');
			wp_register_script('wmff_jquery_mousewheel_js', WES_PLUGIN_JS_URL . 'jquery.mousewheel.js', array('jquery'), '3.0.6',true);
			wp_enqueue_script('wmff_jquery_mousewheel_js');
		
		
		
			//If gallery activated.
			wp_register_style('wmff_photoswipe_css', WES_PLUGIN_CSS_URL . 'photoswipe.css', array(), '2.2.0', 'all');
			wp_enqueue_style('wmff_photoswipe_css');
			wp_register_script('wmff_photoswipe_js', WES_PLUGIN_JS_URL . 'code.photoswipe.jquery-3.0.5.min.js', array('wmff_photoswipe_klass_js'), '3.0.5',true);
			wp_enqueue_script('wmff_photoswipe_js');
			wp_register_script('wmff_photoswipe_klass_js', WES_PLUGIN_JS_URL . 'klass.min.js', array('jquery'), '1.0',true);
			wp_enqueue_script('wmff_photoswipe_klass_js');
			wp_register_style('wmff_colorbox_css', WES_PLUGIN_CSS_URL . 'colorbox.css', array(), '2.2.0', 'all');
			wp_enqueue_style('wmff_colorbox_css');
			wp_register_script('wmff_colorbox_js', WES_PLUGIN_JS_URL . 'jquery.colorbox-min.js', array('jquery'), '3.0.5',true);
			wp_enqueue_script('wmff_colorbox_js');
	
	}
	
	if (is_admin()) {
		wp_register_style('wmff_shortcodes_css', WES_PLUGIN_CSS_URL . 'shortcodes.css', array(), '1.0', 'all');
		wp_enqueue_style('wmff_shortcodes_css'); 
		
	}
	
	wp_register_style('wmff_icons_css', WES_PLUGIN_CSS_URL . 'wmficons.css', array(), '1.0', 'all');
	wp_enqueue_style('wmff_icons_css'); 
		
}
add_action('init', 'wmff_enque');

//Auto updater - Source: http://w-shadow.com/blog/2010/09/02/automatic-updates-for-any-plugin/
require 'plugin-updates/plugin-update-checker.php';
$ExampleUpdateCheckerFramework = new PluginUpdateChecker(
	'http://www.webbudesign.com/plugins/wmf-framework/info.json',
	__FILE__, 'wmfframework'
);

//Remove View Links
function posttype_admin_css() {
	global $post_type;
	if($post_type == 'wmfslider' || $post_type == 'wmfgallery') {
		echo '
		<style type="text/css">
		#edit-slug-box,#view-post-btn,#post-    preview,.updated p a, .row-actions{display: none;}
		.widefat td{padding: 9px 0px 2px!important;}
		</style>';
	}
}
add_action('admin_head', 'posttype_admin_css'); 


//Here's how you can add query arguments to the URL.
function addSecretKeySlider($query){
	$query['secret'] = 'foo';
	return $query;
}
$ExampleUpdateCheckerFramework->addQueryArgFilter('addSecretKeySlider');

include 'common-functions.php'; 
include 'wmf-framework.php'; 
include 'metabox/meta-box.php';
include 'metabox/fields.php';

?>
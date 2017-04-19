<?php

global $themename;
global $shortname;

/************************************************
*
*  enquque css and javascript
*
************************************************/

//enqueue admin jquery 
function biznez_backscript_enqueqe() {
	if(is_admin()){
		wp_enqueue_script('sketch-admin',get_template_directory_uri().'/SketchBoard/functions/js/sketch.admin.js',array('jquery'),'1.0.0',1);
		wp_enqueue_style('sketch-admin-style',get_template_directory_uri().'/SketchBoard/functions/css/sketch.admin.css');
	}
}
add_action('wp_enqueue_scripts', 'biznez_backscript_enqueqe');


//enqueue jquery 

function biznez_script_enqueqe() {

	global $shortname;
	if(!is_admin())
	{
		wp_enqueue_script( 'comment-reply' );    
  }
}

add_action('wp_enqueue_scripts', 'biznez_script_enqueqe');

//enqueue admin css

function biznez_theme_stylesheet(){

global $themename;
global $shortname;

if ( !is_admin() ) {

	global $wp_version;

		$skt_version = NULL;
		$theme = wp_get_theme();
		$skt_version = $theme['Version'];

	wp_enqueue_style( 'biznez-reset-stylesheet', get_template_directory_uri().'/css/reset.css', false, $skt_version );
	wp_enqueue_style( 'biznez-grid-stylesheet', get_template_directory_uri().'/css/1008.css', false, $skt_version );
	wp_enqueue_style( 'biznez-typography-stylesheet', get_template_directory_uri().'/css/typography.css', false, $skt_version  );
	wp_enqueue_style( 'biznez-style', get_stylesheet_uri(), false, $skt_version );
	wp_enqueue_script('biznez_orbitslider_slide',get_template_directory_uri().'/js/jquery.orbit-1.3.0.js',array('jquery'),'1.0',true);
	wp_enqueue_script('biznez_ddsmoothmenusimple_slide',get_template_directory_uri().'/js/ddsmoothmenu.js',array('jquery'),'1.0' );
	wp_enqueue_script('biznez_colorboxsimple_slide',get_template_directory_uri() .'/js/jquery.prettyPhoto.js',array('jquery'),'1.0',true );
	wp_enqueue_script('biznez_jcarousellite_slide',get_template_directory_uri().'/js/jquery.jcarousel.js',array('jquery'),'1.0',true );
	wp_enqueue_script('biznez_custom_slide',get_template_directory_uri().'/js/custom.js',array('jquery'),'1.0' );
	wp_enqueue_script('biznez_blackandwhite',get_template_directory_uri().'/js/jQuery.BlackAndWhite.js',array('jquery'),'1.0');
	wp_enqueue_script('biznez_kwiks_slide',get_template_directory_uri().'/js/kwiks.js',array('jquery'),'1.0',true);
	wp_enqueue_script('biznez_easing_slide',get_template_directory_uri().'/js/jquery.easing.1.3.js',array('jquery'),'1.0',true );
	wp_enqueue_script('biznez-tolltip-js', get_template_directory_uri() . '/js/jquery.tipTip.js', array('jquery'), '1.0', true);

	
	wp_enqueue_style( 'biznez-theme-stylesheet', get_template_directory_uri().'/SketchBoard/css/skt-theme-stylesheet.css', false, $skt_version );
	wp_enqueue_style( 'prettyPhoto-theme-stylesheet', get_template_directory_uri().'/css/prettyPhoto.css', false, $skt_version );
	wp_enqueue_style( 'orbit-theme-stylesheet', get_template_directory_uri().'/css/orbit-1.3.0.css', false, $skt_version );
	wp_enqueue_style( 'portfolioStyle-theme-stylesheet', get_template_directory_uri().'/css/portfolioStyle.css', false, $skt_version );
	wp_enqueue_style( 'googleFontsOpenSans','http://fonts.googleapis.com/css?family=Open+Sans:400,600,400italic' );
	wp_enqueue_style( 'googleFontsDroidSerif','http://fonts.googleapis.com/css?family=Droid+Serif' );
	wp_enqueue_style( 'biznez-tolltip-css', get_template_directory_uri().'/css/tipTip.css', false, $skt_version  );
	wp_enqueue_style( 'biznez-elusive-webfont-css', get_template_directory_uri().'/css/elusive-webfont.css', false, $skt_version );
	wp_enqueue_style( 'biznez-elusive-webfont-ie-css', get_template_directory_uri().'/css/elusive-webfont-ie7.css', false, $skt_version  );

	}
}
add_action('wp_enqueue_scripts', 'biznez_theme_stylesheet');



function biznez_head(){
	global $shortname;
	$skt_favicon = "";
	$skt_meta = '<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />'."\n";

	if(sketch_get_option($shortname.'_favicon')){
		$skt_favicon = sketch_get_option($shortname.'_favicon','biznez-lite');
		$skt_meta .= "<link rel=\"shortcut icon\" type=\"image/x-icon\" href=\"$skt_favicon\"/>\n";
	}
	echo $skt_meta;
}

add_action('wp_head', 'biznez_head');

function biznez_head_css(){
global $shortname;
	if(!is_admin())
	{
		require_once(get_template_directory().'/inc/biznez-custom-css.php');
	}   
}
add_action('wp_head', 'biznez_head_css');

//enqueue footer script 
function biznez_footer_script() {
	global $shortname;
	if(!is_admin())
	{
		require_once(get_template_directory().'/js/orbit-slider-config.php');
		require_once(get_template_directory().'/js/jquery-jcarousel-config.php');
	}    
}

add_action('wp_footer', 'biznez_footer_script');
<?php
//	Registers the Widgets and Sidebars for the site

function biznez_widgets_init() {
	register_sidebar(array(

		'name' => 'primary-widget-area',

		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',

		'after_widget' => '</li>',

		'before_title' => '<h3 class="widget-title">',

		'after_title' => '</h3>',

	));

	

	register_sidebar(array(

		'name' => 'secondary-widget-area',

		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',

		'after_widget' => '</li>',

		'before_title' => '<h3 class="widget-title">',

		'after_title' => '</h3>',

	));

	

	register_sidebar(array(

		'name' => 'first-footer-widget-area',

		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',

		'after_widget' => '</li>',

		'before_title' => '<h3 class="widget-title">',

		'after_title' => '</h3>',

	));

	

	register_sidebar(array(

		'name' => 'second-footer-widget-area',

		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',

		'after_widget' => '</li>',

		'before_title' => '<h3 class="widget-title">',

		'after_title' => '</h3>',

	));

	register_sidebar(array(

		'name' => 'third-footer-widget-area',

		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',

		'after_widget' => '</li>',

		'before_title' => '<h3 class="widget-title">',

		'after_title' => '</h3>',

	));

	

	register_sidebar(array(

		'name' => 'fourth-footer-widget-area',

		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',

		'after_widget' => '</li>',

		'before_title' => '<h3 class="widget-title">',

		'after_title' => '</h3>',

	));
	
	register_sidebar(array(

		'name' => 'skt-woocommerce-widget-area',

		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',

		'after_widget' => '</li>',

		'before_title' => '<h3 class="widget-title">',

		'after_title' => '</h3>',

	));

}
add_action( 'widgets_init', 'biznez_widgets_init' );

/***************register nav menus*********************/
function biznez_nav_menus_call() {
	register_nav_menus( array(
		'Header' => __( 'Primary Navigation','biznez-lite'),
	));
}

add_action( 'after_setup_theme', 'biznez_nav_menus_call' ); 
/******* theme check fix ***********/
if ( ! isset( $content_width ) ){
    $content_width = 900;
}


/***** Make theme available for translation ****/
// Translations can be filed in the /languages/ directory

function biznez_lang_setup(){
	load_theme_textdomain('biznez-lite', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'biznez_lang_setup');

/**
* Funtion to add CSS class to body
*/
function biznez_add_class( $classes ) {

	if ( 'page' == get_option( 'show_on_front' ) && ( '' != get_option( 'page_for_posts' ) ) && is_front_page() ) {
		$classes[] = 'front-page';
	}
	return $classes;
}
add_filter( 'body_class','biznez_add_class' );

/*---------------------------------------------------------------------------*/
/* ADMIN SCRIPT: Enqueue scripts in back-end
/*---------------------------------------------------------------------------*/
if( !function_exists('biznez_page_admin_enqueue_scripts') ){

    add_action('admin_enqueue_scripts','biznez_page_admin_enqueue_scripts');
    /**
     * Register scripts for admin panel
     * @return void
     */
    function biznez_page_admin_enqueue_scripts(){	
		wp_enqueue_script('media-upload');
		wp_enqueue_script('thickbox');
		wp_register_script('my-upload', get_template_directory_uri() .'/SketchBoard/js/admin-jqery.js', array('jquery','media-upload','thickbox'));
		wp_enqueue_script('my-upload');
		wp_enqueue_style('thickbox');
    }
}


/*  * Loads the Options Panel * * If you're loading from a child theme use stylesheet_directory * instead of template_directory */ 

if ( !function_exists( 'optionsframework_init' ) ){	
	//Theme Shortname	
	$shortname = 'biznez-lite';	
	$themename='Biznez Lite';	
	define( 'OPTIONS_FRAMEWORK_DIRECTORY', 
	get_template_directory_uri() . '/SketchBoard/includes/' );	
	require_once get_template_directory() . '/SketchBoard/includes/options-framework.php';	
	require_once get_template_directory() . '/SketchBoard/functions/admin-init.php';
	require ( get_template_directory() . '/SketchBoard/includes/sketchtheme-upsell.php' );
}
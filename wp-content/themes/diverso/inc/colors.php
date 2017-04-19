<?php          
/**
 * Configuration of all colors customizable. Follow the default scheme already written.
 * Replace all string uppercased.
 * 
 * This add automatically the options on Theme Options and generate the custom css
 * with all colors set by user, including it on theme.    
 * 
 * @package WordPress
 * @subpackage Kassyopea
 * @since 1.0 
 */   

//array of all colors customizable by user
$yiw_colors = array(
	'general' => array(    
		'name-section' => __( 'General', 'yiw' ),   
		'options' => array(
	
			'general-color-titles' => array(    
				'default' => '#454545',
				'css_role' => 'h1, h2, h3, h4, h5, h6', 
				'css_attr' => 'color', 
				'panel_title' => __( "Titles color", 'yiw' ),  
				'panel_desc' => __( "Select the text color of all titles.", 'yiw' ),
				'important' => true
			),
	
			'general-color-titles-highlight' => array(    
				'default' => '#A6A4A4',
				'css_role' => 'h1 span, h2 span, h3 span, h4 span, h5 span, h6 span', 
				'css_attr' => 'color', 
				'panel_title' => __( "Titles color highlight", 'yiw' ),  
				'panel_desc' => __( "Select the highlight color of all titles.", 'yiw' ),
				'important' => true
			),
	
			'general-color-text' => array(    
				'default' => '#585555',
				'css_role' => 'p, li, address', 
				'css_attr' => 'color', 
				'panel_title' => __( "Text color", 'yiw' ),  
				'panel_desc' => __( "Select the text color of all titles.", 'yiw' ) 
			),
	
			'general-color-links' => array(    
				'default' => '#C57901',
				'css_role' => 'a', 
				'css_attr' => 'color', 
				'panel_title' => __( "Links color", 'yiw' ),  
				'panel_desc' => __( "Select the general color of all links.", 'yiw' ) 
			),
	
			'general-color-links-hover' => array(    
				'default' => '#1a1a1a',
				'css_role' => 'a:hover', 
				'css_attr' => 'color', 
				'panel_title' => __( "Links color hover", 'yiw' ),  
				'panel_desc' => __( "Select the general color of all links, in hover state.", 'yiw' ) 
			),
	
			'general-color-slogan-title' => array(    
				'default' => '#454545',
				'css_role' => '#slogan h1', 
				'css_attr' => 'color', 
				'panel_title' => __( "Slogan title", 'yiw' ),  
				'panel_desc' => __( "Select the text color of the slogan title.", 'yiw' ),
				'important' => true 
			),
	
			'general-color-slogan-subtitle' => array(    
				'default' => '#5D5C5C',
				'css_role' => '#slogan h3, #slogan h1.only', 
				'css_attr' => 'color', 
				'panel_title' => __( "Slogan subtitle", 'yiw' ),  
				'panel_desc' => __( "Select the text color of the slogan subtitle.", 'yiw' ),
				'important' => true 
			),
	
			'general-color-slogan-highlight' => array(    
				'default' => '#A6A4A4',
				'css_role' => '#slogan h1 span, #slogan h3 span', 
				'css_attr' => 'color', 
				'panel_title' => __( "Slogan highlight", 'yiw' ),  
				'panel_desc' => __( "Select the hightlight color of the slogan.", 'yiw' ) 
			),
		
		),
		
	),
	
	'header' => array(    
		'name-section' => __( 'Header', 'yiw' ),   
		'options' => array(
	
			'topbar-background' => array(    
				'default' => '#EDECEC',
				'css_role' => '#topbar', 
				'css_attr' => 'background-color', 
				'panel_title' => __( "Background topbar", 'yiw' ),  
				'panel_desc' => __( 'Select the background color of the topbar.', 'yiw' ),
                'important' => true 
			),
	
			'topbar-links' => array(    
				'default' => '#898787',
				'css_role' => '#topbar ul li a, #topbar ul li a:visited', 
				'css_attr' => 'color', 
				'panel_title' => __( "Topbar links", 'yiw' ),  
				'panel_desc' => __( 'Select the color of the links on topbar.', 'yiw' ),
                'important' => true 
			),
	
			'topbar-links-hover' => array(    
				'default' => '#2C2B2B',
				'css_role' => '#topbar ul li a:hover', 
				'css_attr' => 'color', 
				'panel_title' => __( "Topbar links hover", 'yiw' ),  
				'panel_desc' => __( 'Select the color of the links on topbar in state hover.', 'yiw' ),
                'important' => true 
			),
	
			'header-slider-background' => array(    
				'default' => '#e2e1e1',
				'css_role' => '#slider', 
				'css_attr' => 'background-color', 
				'panel_title' => __( "Background slider", 'yiw' ),  
				'panel_desc' => __( 'Select the background color of the sliders.', 'yiw' ),
                'important' => true 
			),
		
		),
		
	),
	
	'twitter' => array(    
		'name-section' => __( 'Twitter slider', 'yiw' ),   
		'options' => array(
	
			'twitter-bg-color' => array(    
				'default' => '#E7E6E6',
				'css_role' => '#twitter-slider', 
				'css_attr' => 'background-color', 
				'panel_title' => __( "Background color", 'yiw' ),  
				'panel_desc' => __( "The background of twitter section.", 'yiw' ) 
			),
	
			'twitter-color-text' => array(    
				'default' => '#545252',
				'css_role' => '#twitter-slider .tweets-list li p', 
				'css_attr' => 'color', 
				'panel_title' => __( "Color text", 'yiw' ),  
				'panel_desc' => __( "The color of text", 'yiw' ) 
			),
	
			'twitter-color-links' => array(    
				'default' => '#1c1c1c',
				'css_role' => '#twitter-slider .tweets-list a', 
				'css_attr' => 'color', 
				'panel_title' => __( "Color links", 'yiw' ),  
				'panel_desc' => __( "The color of all links.", 'yiw' ),
                'important' => true  
			),
	
			'twitter-color-links-hover' => array(    
				'default' => '#000',
				'css_role' => '#twitter-slider .tweets-list a:hover', 
				'css_attr' => 'color', 
				'panel_title' => __( "Color links hover", 'yiw' ),  
				'panel_desc' => __( "The color of all links in hover state.", 'yiw' ),
                'important' => true    
			),
		
		),
		
	),    
	
	'footer' => array(    
		'name-section' => __( 'Footer', 'yiw' ),   
		'options' => array(
	
			'footer-bg-color' => array(    
				'default' => '#DDDADA',
				'css_role' => '#footer', 
				'css_attr' => 'background-color', 
				'panel_title' => __( "Background color", 'yiw' ),  
				'panel_desc' => __( "The background of all section.", 'yiw' ) 
			),
	
			'footer-color-titles' => array(    
				'default' => '#454545',
				'css_role' => '#footer h3', 
				'css_attr' => 'color', 
				'panel_title' => __( "Color titles", 'yiw' ),  
				'panel_desc' => __( "The color of all titles of the footer.", 'yiw' ),
                'important' => true 
			),
	
			'footer-color-text' => array(    
				'default' => '#1C1C1C',
				'css_role' => '#footer p', 
				'css_attr' => 'color', 
				'panel_title' => __( "Color text", 'yiw' ),  
				'panel_desc' => __( "The color of text", 'yiw' ) 
			),
	
			'footer-color-links' => array(    
				'default' => '#414243',
				'css_role' => '#footer a', 
				'css_attr' => 'color', 
				'panel_title' => __( "Color links", 'yiw' ),  
				'panel_desc' => __( "The color of all links, of the footer.", 'yiw' ),
                'important' => true  
			),
	
			'footer-color-links-hover' => array(    
				'default' => '#131313',
				'css_role' => '#footer a:hover', 
				'css_attr' => 'color', 
				'panel_title' => __( "Color links hover", 'yiw' ),  
				'panel_desc' => __( "The color of all links in hover state, of the footer.", 'yiw' ),
                'important' => true    
			),
	
			'footer-color-menues-links' => array(    
				'default' => '#767778',
				'css_role' => '#footer .widget ul li a', 
				'css_attr' => 'color', 
				'panel_title' => __( "Color links menues", 'yiw' ),  
				'panel_desc' => __( "The color of links of menues, of the footer.", 'yiw' ),
                'important' => true  
			),
	
			'footer-color-menues-links-hover' => array(    
				'default' => '#000',
				'css_role' => '#footer .widget ul li a:hover', 
				'css_attr' => 'color', 
				'panel_title' => __( "Color links menues hover", 'yiw' ),  
				'panel_desc' => __( "The color of links of menues in hover state, of the footer.", 'yiw' ),
                'important' => true   
			),  
		
		),
		
	),    
	
	'copyright' => array(    
		'name-section' => __( 'Copyright', 'yiw' ),   
		'options' => array(
	
			'copyright-bg-color' => array(    
				'default' => '#A09F9F',
				'css_role' => '#copyright', 
				'css_attr' => 'background-color', 
				'panel_title' => __( "Background color", 'yiw' ),  
				'panel_desc' => __( "Select the background color of the copyright section.", 'yiw' ) 
			),
	
			'copyright-text-color' => array(    
				'default' => '#131313',
				'css_role' => '#copyright p', 
				'css_attr' => 'color', 
				'panel_title' => __( "Text color", 'yiw' ),  
				'panel_desc' => __( "Select the text color of the copyright section.", 'yiw' ) 
			),
	
			'copyright-links-color' => array(    
				'default' => '#000',
				'css_role' => '#copyright a', 
				'css_attr' => 'color', 
				'panel_title' => __( "Links color", 'yiw' ),  
				'panel_desc' => __( "Select the color of the links on the copyright section.", 'yiw' ) 
			),
	
			'copyright-links-color-hover' => array(    
				'default' => '#fff',
				'css_role' => '#copyright a:hover', 
				'css_attr' => 'color', 
				'panel_title' => __( "Links color hover", 'yiw' ),  
				'panel_desc' => __( "Select the color of the links, in state hover, on the copyright section.", 'yiw' ) 
			),
		
		),
		
	),
);    
    
$default_images = array();

?>
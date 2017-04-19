<?php
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Theme customizer options
 *
 * @file           theme-customizer.php
 * @package        Celestial Lite
 * @version          Celestial Lite 1.0.1
 * @author         Styled Themes 
 * @copyright      2012-2013 Styledthemes.com
 * @license        license.txt
 */
 

add_action('after_setup_theme','themedemo_setup');
function themedemo_setup() {
	add_theme_support( 'custom-background', array(
		'default-color' => '000000',
	) );
}



// Lets add some colours to our theme
add_action('customize_register', 'themedemo_customize');
function themedemo_customize($wp_customize) {

// Lets remove the Display Header Text setting and control
$wp_customize->remove_setting( 'display_header_text');
$wp_customize->remove_control( 'display_header_text');

// Lets begin adding our own settings and controls

	$wp_customize->add_setting( 'logo_style', array(
		'default' => 'default',
		'sanitize_callback' => 'celestial_lite_sanitize_radio',
	) );
	
	$wp_customize->add_control( 'logo_style', array(
    'label'   => __( 'Logo Style', 'celestial-lite' ),
    'section' => 'title_tagline',
	'priority' => '3',
    'type'    => 'radio',
        'choices' => array(
            'default' => __( 'Default Logo', 'celestial-lite' ),
            'custom' => __( 'Your Logo', 'celestial-lite' ),
            'text' => __( 'Text Title', 'celestial-lite' ),
        ),
    ));

    $wp_customize->add_setting('my_logo', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
		'sanitize_callback' => 'celestial_lite_sanitize_upload',
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'my_logo', array(
        'label'    => __('Your Logo', 'celestial-lite'),
        'section'  => 'title_tagline',
        'settings' => 'my_logo',
		'priority' => '4',
    )));

	$wp_customize->add_setting( 'page_top_bar', array(
		'default'        => '#3c3f41',
		'sanitize_callback' => 'celestial_lite_sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'page_top_bar', array(
		'label'   => __( 'Page Top Bar', 'celestial-lite' ),
		'section' => 'colors',
		'settings'   => 'page_top_bar',
		'priority' => '1',
	) ) );

	$wp_customize->add_setting( 'header_topline', array(
		'default'        => '#ffffff',
		'sanitize_callback' => 'celestial_lite_sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_topline', array(
		'label'   => __( 'Header Top Line', 'celestial-lite' ),
		'section' => 'colors',
		'settings'   => 'header_topline',
		'priority' => '2',
	) ) );	
	
	$wp_customize->add_setting( 'header_submenu_bg', array(
		'default'        => '#f6f6f6',
		'sanitize_callback' => 'celestial_lite_sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_submenu_bg', array(
		'label'   => __( 'Header and Submenu Background', 'celestial-lite' ),
		'section' => 'colors',
		'settings'   => 'header_submenu_bg',
		'priority' => '2',
	) ) );

	$wp_customize->add_setting( 'content_bg', array(
		'default'        => '#ffffff',
		'sanitize_callback' => 'celestial_lite_sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'content_bg', array(
		'label'   => __( 'Content Background', 'celestial-lite' ),
		'section' => 'colors',
		'settings'   => 'content_bg',
		'priority' => '3',
	) ) );
	
	$wp_customize->add_setting( 'social_bg', array(
		'default'        => '#393c3f',
		'sanitize_callback' => 'celestial_lite_sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'social_bg', array(
		'label'   => __( 'Social Bar Background', 'celestial-lite' ),
		'section' => 'colors',
		'settings'   => 'social_bg',
		'priority' => '4',
	) ) );
	
	$wp_customize->add_setting( 'banner_background', array(
		'default'        => '#050d24',
		'sanitize_callback' => 'celestial_lite_sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'banner_background', array(
		'label'   => __( 'Banner Background', 'celestial-lite' ),
		'section' => 'colors',
		'settings'   => 'banner_background',
		'priority' => '5',
	) ) );
	
	$wp_customize->add_setting( 'banner_top_line', array(
		'default'        => '#525458',
		'sanitize_callback' => 'celestial_lite_sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'banner_top_line', array(
		'label'   => __( 'Banner Top Line', 'celestial-lite' ),
		'section' => 'colors',
		'settings'   => 'banner_top_line',
		'priority' => '6',
	) ) );	
	$wp_customize->add_setting( 'content_text', array(
		'default'        => '#848484',
		'sanitize_callback' => 'celestial_lite_sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'content_text', array(
		'label'   => __( 'Content Text Colour', 'celestial-lite' ),
		'section' => 'colors',
		'settings'   => 'content_text',
		'priority' => '7',
	) ) );

	$wp_customize->add_setting( 'footer_widgets_bg', array(
		'default'        => '#272b30',
		'sanitize_callback' => 'celestial_lite_sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_widgets_bg', array(
		'label'   => __( 'Footer Widgets Background', 'celestial-lite' ),
		'section' => 'colors',
		'settings'   => 'footer_widgets_bg',
		'priority' => '8',
	) ) );

	$wp_customize->add_setting( 'footer_widgets_heading', array(
		'default'        => '#ced4da',
		'sanitize_callback' => 'celestial_lite_sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_widgets_heading', array(
		'label'   => __( 'Footer Widgets Heading Colour', 'celestial-lite' ),
		'section' => 'colors',
		'settings'   => 'footer_widgets_heading',
		'priority' => '9',
	) ) );
	
	$wp_customize->add_setting( 'footer_widgets_text', array(
		'default'        => '#959798',
		'sanitize_callback' => 'celestial_lite_sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_widgets_text', array(
		'label'   => __( 'Footer Widgets Text Colour', 'celestial-lite' ),
		'section' => 'colors',
		'settings'   => 'footer_widgets_text',
		'priority' => '10',
	) ) );

	$wp_customize->add_setting( 'footer_widgets_links', array(
		'default'        => '#ffffff',
		'sanitize_callback' => 'celestial_lite_sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_widgets_links', array(
		'label'   => __( 'Footer Link Colour', 'celestial-lite' ),
		'section' => 'colors',
		'settings'   => 'footer_widgets_links',
		'priority' => '11',
	) ) );	
	
	$wp_customize->add_setting( 'footer_linkshover', array(
		'default'        => '#cccccc',
		'sanitize_callback' => 'celestial_lite_sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_linkshover', array(
		'label'   => __( 'Footer Link Hover Colour', 'celestial-lite' ),
		'section' => 'colors',
		'settings'   => 'footer_linkshover',
		'priority' => '12',
	) ) );		


	$wp_customize->add_setting( 'footer_listborders', array(
		'default'        => '#4C4E52',
		'sanitize_callback' => 'celestial_lite_sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_listborders', array(
		'label'   => __( 'Footer List Border Colour', 'celestial-lite' ),
		'section' => 'colors',
		'settings'   => 'footer_listborders',
		'priority' => '13',
	) ) );















	
	$wp_customize->add_setting( 'copyright_bg', array(
		'default'        => '#161718',
		'sanitize_callback' => 'celestial_lite_sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'copyright_bg', array(
		'label'   => __( 'Copyright Background', 'celestial-lite' ),
		'section' => 'colors',
		'settings'   => 'copyright_bg',
		'priority' => '14',
	) ) );

	$wp_customize->add_setting( 'copyright_text', array(
		'default'        => '#c4cacf',
		'sanitize_callback' => 'celestial_lite_sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'copyright_text', array(
		'label'   => __( 'Copyright Text &amp; Link Colour', 'celestial-lite' ),
		'section' => 'colors',
		'settings'   => 'copyright_text',
		'priority' => '15',
	) ) );

	$wp_customize->add_setting( 'copyright_link_hover', array(
		'default'        => '#cccccc',
		'sanitize_callback' => 'celestial_lite_sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'copyright_link_hover', array(
		'label'   => __( 'Copyright Link Hover', 'celestial-lite' ),
		'section' => 'colors',
		'settings'   => 'copyright_link_hover',
		'priority' => '16',
	) ) );	
	
	
	$wp_customize->add_setting( 'copyright_bottom_line', array(
		'default'        => '#333333',
		'sanitize_callback' => 'celestial_lite_sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'copyright_bottom_line', array(
		'label'   => __( 'Copyright Bottom Line', 'celestial-lite' ),
		'section' => 'colors',
		'settings'   => 'copyright_bottom_line',
		'priority' => '17',
	) ) );

	$wp_customize->add_setting( 'link_colour', array(
		'default'        => '#467fc2',
		'sanitize_callback' => 'celestial_lite_sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_colour', array(
		'label'   => __( 'Page Link Colour', 'celestial-lite' ),
		'section' => 'colors',
		'settings'   => 'link_colour',
		'priority' => '18',
	) ) );

	$wp_customize->add_setting( 'link_colour_hover', array(
		'default'        => '#000000',
		'sanitize_callback' => 'celestial_lite_sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_colour_hover', array(
		'label'   => __( 'Page Link Colour on Hover', 'celestial-lite' ),
		'section' => 'colors',
		'settings'   => 'link_colour_hover',
		'priority' => '19',
	) ) );	
	
	$wp_customize->add_setting( 'main_menu_link', array(
		'default'        => '#555555',
		'sanitize_callback' => 'celestial_lite_sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_menu_link', array(
		'label'   => __( 'Primary Menu Link Colour', 'celestial-lite' ),
		'section' => 'colors',
		'settings'   => 'main_menu_link',
		'priority' => '20',
	) ) );	

	$wp_customize->add_setting( 'parent_hover_active', array(
		'default'        => '#477bbe',
		'sanitize_callback' => 'celestial_lite_sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'parent_hover_active', array(
		'label'   => __( 'Parent Menu Hover &amp; Active Colour', 'celestial-lite' ),
		'section' => 'colors',
		'settings'   => 'parent_hover_active',
		'priority' => '21',
	) ) );	
	
	$wp_customize->add_setting( 'submenu_link_colour', array(
		'default'        => '#555555',
		'sanitize_callback' => 'celestial_lite_sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'submenu_link_colour', array(
		'label'   => __( 'Submenu Link Colour', 'celestial-lite' ),
		'section' => 'colors',
		'settings'   => 'submenu_link_colour',
		'priority' => '22',
	) ) );	
	
	$wp_customize->add_setting( 'submenu_hover_active', array(
		'default'        => '#477bbe',
		'sanitize_callback' => 'celestial_lite_sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'submenu_hover_active', array(
		'label'   => __( 'Submenu Hover &amp; Active Colour', 'celestial-lite' ),
		'section' => 'colors',
		'settings'   => 'submenu_hover_active',
		'priority' => '23',
	) ) );	
	
	$wp_customize->add_setting( 'submenu_bg_hover', array(
		'default'        => '#f3f3f3',
		'sanitize_callback' => 'celestial_lite_sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'submenu_bg_hover', array(
		'label'   => __( 'Submenu Background on Hover', 'celestial-lite' ),
		'section' => 'colors',
		'settings'   => 'submenu_bg_hover',
		'priority' => '24',
	) ) );	
	


// BASIC SETTINGS Section
	$wp_customize->add_section( 'basic_settings', array(
		'title'          => __( 'Basic Settings', 'celestial-lite' ),
		'priority'       => 36,
	) );

// Setting group for a Checkbox
	$wp_customize->add_setting( 'blog_image', array(
		'default'        => '',
		'sanitize_callback' => 'celestial_lite_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'blog_image', array(
    'settings' => 'blog_image',
    'label'    => __( 'Small Blog Image', 'celestial-lite' ),
    'section'  => 'basic_settings',
    'type'     => 'checkbox',
	'priority' => 23,
	) );
	
	
// Setting for hiding the intro image on the full post view	
	$wp_customize->add_setting( 'hide_intro_image', array(
		'sanitize_callback' => 'celestial_lite_sanitize_checkbox',
		) );
	
// Control for hiding the intro image on the full post view	
	$wp_customize->add_control( 'hide_intro_image', array(
        'label' => __( 'Show Featured Image Full Post', 'celestial-lite' ),
		'type' => 'checkbox',
		'section' => 'basic_settings',
		'priority' => 24,
    ) );	
	
	
	
	
	
	
	
	
	
// Setting group for a blog sidebar choice
	$wp_customize->add_setting( 'blog_left', array(
		'default'        => '',
		'sanitize_callback' => 'celestial_lite_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'blog_left', array(
    'settings' => 'blog_left',
    'label'    => __( 'Blog with Left Sidebar', 'celestial-lite' ),
    'section'  => 'basic_settings',
    'type'     => 'checkbox',
	) );

// Setting group for a Copyright
	$wp_customize->add_setting( 'copyright', array(
		'default'        => 'Copyright &copy; 2013 Your Info. All rights reserved.',
		'sanitize_callback' => 'celestial_lite_sanitize_text',
	) );

	$wp_customize->add_control( 'copyright', array(
		'settings' => 'copyright',
		'label'    => __( 'Your Copyright Notice', 'celestial-lite' ),
		'section'  => 'basic_settings',
		'type'     => 'text',
	) );
	
// Setting group for a page comments
	$wp_customize->add_setting( 'page_comments', array(
		'default'        => '1',
		'sanitize_callback' => 'celestial_lite_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'page_comments', array(
    'settings' => 'page_comments',
    'label'    => __( 'Turn on Page Comments', 'celestial-lite' ),
    'section'  => 'basic_settings',
    'type'     => 'checkbox',
	) );



	
	$wp_customize->add_setting( 'header_all', array(
		'default'        => '1',
		'sanitize_callback' => 'celestial_lite_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'header_all', array(
    'settings' => 'header_all',
    'label'    => __( 'WP Header Every Page', 'celestial-lite' ),
    'section'  => 'header_image',
    'type'     => 'checkbox',
	'priority' => 1,
	) );	
// Setting for hiding the showcase curved graphic	
	$wp_customize->add_setting( 'hide_curve', array(
	'sanitize_callback' => 'celestial_lite_sanitize_checkbox',
	) );
	
// Control for hiding the showcase curved graphic	
	$wp_customize->add_control( 'hide_curve', array(
        'label' => __( 'Hide Front Page Showcase Curve', 'celestial-lite' ),
		'type' => 'checkbox',
		'section' => 'header_image',
		'priority' => 2,
    ) );
		
	$wp_customize->add_setting( 'banner_bg_padding', array(
		'default'        => '0px',
		'sanitize_callback' => 'celestial_lite_sanitize_text',
	) );

	$wp_customize->add_control( 'banner_bg_padding', array(
		'label'   => __( 'Banner Background Padding', 'celestial-lite' ),
		'section' => 'header_image',
		'settings'   => 'banner_bg_padding',
		'type'     => 'text',
		'priority' => 3,
	) );
	$wp_customize->add_setting( 'banner_fp_bg_padding', array(
		'default'        => '0px',
		'sanitize_callback' => 'celestial_lite_sanitize_text',
	) );

	$wp_customize->add_control( 'banner_fp_bg_padding', array(
		'label'   => __( 'Front Page Banner Padding', 'celestial-lite' ),
		'section' => 'header_image',
		'settings'   => 'banner_fp_bg_padding',
		'type'     => 'text',
		'priority' => 4,
	) );


	
	
	
	
	
	
	
// SOCIAL NETWORKING SETTINGS Section
	$wp_customize->add_section( 'social_networking', array(
		'title'          => __( 'Social Networking', 'celestial-lite' ),
		'priority'       => 38,
	) );	

// Setting for hiding the showcase curved graphic	
	$wp_customize->add_setting( 'hide_sociallines', array(
		'sanitize_callback' => 'celestial_lite_sanitize_checkbox',
		) );
	
// Control for hiding the showcase curved graphic	
	$wp_customize->add_control( 'hide_sociallines', array(
        'label' => __( 'Hide Social Bar Background Lines', 'celestial-lite' ),
		'type' => 'checkbox',
		'section' => 'social_networking',
		'priority' => 1,
    ) );

// enable twitter	
	$wp_customize->add_setting( 'twitter_on', array(
		'sanitize_callback' => 'celestial_lite_sanitize_checkbox',
		) );
		
	$wp_customize->add_control( 'twitter_on', array(
        'label' => __( 'Turn on Twitter', 'celestial-lite' ),
		'type' => 'checkbox',
		'section' => 'social_networking',
		'priority' => 2,
    ) );
		
// twitter link	
	$wp_customize->add_setting( 'twitter_link', array(
		'default'        => '',
		'sanitize_callback' => 'celestial_lite_sanitize_url',
	) );

	$wp_customize->add_control( 'twitter_link', array(
		'settings' => 'twitter_link',
		'label'    => __( 'Twitter URL', 'celestial-lite' ),
		'section'  => 'social_networking',
		'type'     => 'text',
		'priority' => 3,
	) );

// enable facebook	
	$wp_customize->add_setting( 'facebook_on', array(
		'sanitize_callback' => 'celestial_lite_sanitize_checkbox',
		) );
		
	$wp_customize->add_control( 'facebook_on', array(
        'label' => __( 'Turn on Facebook', 'celestial-lite' ),
		'type' => 'checkbox',
		'section' => 'social_networking',
		'priority' => 4,
    ) );
	
// facebook link	
	$wp_customize->add_setting( 'facebook_link', array(
		'default'        => '',
		'sanitize_callback' => 'celestial_lite_sanitize_url',	
	) );

	$wp_customize->add_control( 'facebook_link', array(
		'settings' => 'facebook_link',
		'label'    => __( 'Facebook URL', 'celestial-lite' ),
		'section'  => 'social_networking',
		'type'     => 'text',
		'priority' => 5,
	) );	

// enable google	
	$wp_customize->add_setting( 'google_on', array(
		'sanitize_callback' => 'celestial_lite_sanitize_checkbox',
		) );
		
	$wp_customize->add_control( 'google_on', array(
        'label' => __( 'Turn on Google+', 'celestial-lite' ),
		'type' => 'checkbox',
		'section' => 'social_networking',
		'priority' => 6,
    ) );

// google link	
	$wp_customize->add_setting( 'google_link', array(
		'default'        => '',
		'sanitize_callback' => 'celestial_lite_sanitize_url',
	) );

	$wp_customize->add_control( 'google_link', array(
		'settings' => 'google_link',
		'label'    => __( 'Google+ URL', 'celestial-lite' ),
		'section'  => 'social_networking',
		'type'     => 'text',
		'priority' => 7,
	) );	

// enable linkedin	
	$wp_customize->add_setting( 'linkedin_on', array(
		'sanitize_callback' => 'celestial_lite_sanitize_checkbox',
		) );
		
	$wp_customize->add_control( 'linkedin_on', array(
        'label' => __( 'Turn on Linkedin', 'celestial-lite' ),
		'type' => 'checkbox',
		'section' => 'social_networking',
		'priority' => 8,
    ) );
	
// linkedin link	
	$wp_customize->add_setting( 'linkedin_link', array(
		'default'        => '',
		'sanitize_callback' => 'celestial_lite_sanitize_url',
	) );

	$wp_customize->add_control( 'linkedin_link', array(
		'settings' => 'linkedin_link',
		'label'    => __( 'LinkedIn URL', 'celestial-lite' ),
		'section'  => 'social_networking',
		'type'     => 'text',
		'priority' => 9,
	) );

// enable linkedin	
	$wp_customize->add_setting( 'pinterest_on', array(
		'sanitize_callback' => 'celestial_lite_sanitize_checkbox',
		) );
		
	$wp_customize->add_control( 'pinterest_on', array(
        'label' => __( 'Turn on Linkedin', 'celestial-lite' ),
		'type' => 'checkbox',
		'section' => 'social_networking',
		'priority' => 10,
    ) );
	
// pinterest link
	$wp_customize->add_setting( 'pinterest_link', array(
		'default'        => '',
		'sanitize_callback' => 'celestial_lite_sanitize_url',
	) );

	$wp_customize->add_control( 'pinterest_link', array(
		'settings' => 'pinterest_link',
		'label'    => __( 'Pinterest URL', 'celestial-lite' ),
		'section'  => 'social_networking',
		'type'     => 'text',
		'priority' => 11,
	) );
		
	
/**
 * Lets add more to our Navigation tab
 */	

// Setting group for menu top margin
	$wp_customize->add_setting( 'menumargin', array(
		'default'        => '30px',
	) );
	$wp_customize->add_control( 'menumargin', array(
		'settings' => 'menumargin',
		'label'    => __( 'Main Menu Top Margin', 'celestial-lite' ),
		'section'  => 'nav',
		'type'     => 'text',
	) );	
	
	
}






/**
 * adds sanitization callback function : colors
 * @package Celestial Lite
 */
	function celestial_lite_sanitize_hex_color( $color ) {
	if ( $unhashed = sanitize_hex_color_no_hash( $color ) )
		return '#' . $unhashed;

	return $color;
}

/**
 * adds sanitization callback function : text
 * @package Celestial Lite
 */
function celestial_lite_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

/**
 * adds sanitization callback function : url
 * @package Celestial Lite
 */
	function celestial_lite_sanitize_url( $value) {
		$value = esc_url( $value);
		return $value;
	}

/**
 * adds sanitization callback function : checkbox
 * @package Celestial Lite
 */
function celestial_lite_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}	


/**
 * adds sanitization callback function for the logo style : radio
 * @package Celestial Lite
 */
function celestial_lite_sanitize_radio( $input ) {
    $valid = array(
            'default' => __( 'Default Logo', 'celestial-lite' ),
            'custom' => __( 'Your Logo', 'celestial-lite' ),
            'text' => __( 'Text Title', 'celestial-lite' ),
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}


/**
 * adds sanitization callback function for numeric data : number
 * @package Celestial Lite
 */

function celestial_lite_sanitize_number( $value ) {
    $value = (int) $value; // Force the value into integer type.
    return ( 0 < $value ) ? $value : null;
}

/**
 * adds sanitization callback function for uploading : uploader
 * @package Celestial
 * Special thanks to: https://github.com/chrisakelley
 */
add_filter( 'celestial_lite_sanitize_image', 'celestial_lite_sanitize_upload' );
add_filter( 'celestial_lite_sanitize_file', 'celestial_lite_sanitize_upload' );
function celestial_lite_sanitize_upload( $input ) {
        
        $output = '';
        
        $filetype = wp_check_filetype($input);
        
        if ( $filetype["ext"] ) {
        
                $output = $input;
        
        }
        
        return $output;

}

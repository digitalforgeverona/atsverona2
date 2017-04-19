<?php
/**
 * Register theme metaboxes.     
 * 
 * @package WordPress
 * @subpackage YIW Themes
 * @since 1.0
 */
 
// subtitle slogan
$options_args = array(
	11 => array( 
		'id' => 'subslogan_page',
		'name' => __( 'Slogan Subtitle', 'yiw' ), 
		'type' => 'text',
		'desc' => __( 'Insert the subtitle of slogan showed below the main title of this slogan.', 'yiw' ),
		'desc_location' => 'newline'
	),
); 
yiw_add_options_to_metabox( 'yiw_slogan_page', $options_args );

global $yiw_sliders;

$options_args = array(
    21 => array( 
        'id' => 'show_breadcrumb',
        'name' => __( 'Show Breadcrumb', 'yiw' ), 
        'type' => 'radio',
        'options' => array(
            'yes' => __( 'Yes', 'yiw' ),
            'no' => __( 'No', 'yiw' ),  
        ),
        'std' => 'yes',
        'hidden' => false,
        'std' => 'yes'
    ),
    22 => array( 
        'id' => 'slider_accordion',
        'name' => __( 'Accordion slider', 'yiw' ), 
        'type' => 'select',
        'options' => yiw_accordion_sliders( array( 'no' => __( 'No accordion', 'yiw' ) ) ),
        'std' => 'yes',
        'std' => 0
    ),     
    
    25 => array( 
        'id' => 'slider_type',
        'name' => __( 'Select a slider for this page', 'yiw' ), 
        'type' => 'select',
        //'hidden' => false,
        'options' => $yiw_sliders,
        'std' => 'none'
    ),

); 
yiw_add_options_to_metabox( 'yiw_options_page', $options_args );  
 
$options_args = array(
	89 => array( 
		'id' => 'show_footer_twitter',
		'name' => __( 'Show twitter above the footer.', 'yiw' ), 
		'type' => 'select',
		'options' => array(
            'yes' => __( 'Yes', 'yiw' ),
            'no' => __( 'No', 'yiw' ),
        ),
		//'hidden' => false,
		//'desc' => __( 'Insert the subtitle of slogan showed below the main title of this slogan.', 'yiw' ),
		//'desc_location' => 'newline'
	),
	99 => array( 
		'id' => 'portfolio_post_type',
		'name' => __( 'Portfolio', 'yiw' ), 
		'desc' => __( 'NB: valid only for the portfolio template', 'yiw' ),
		'type' => 'select',
		'options' => yiw_get_portfolios(),
		//'hidden' => false,
		//'desc' => __( 'Insert the subtitle of slogan showed below the main title of this slogan.', 'yiw' ),
		//'desc_location' => 'newline'
	),
); 
yiw_add_options_to_metabox( 'yiw_options_page', $options_args );
	
// add map
$options_args = array( 
	10 => array( 
		'id' => 'show_map',
		'name' => __( 'Show Map', 'yiw' ), 
		'type' => 'radio',
		'options' => array(
            'yes' => __( 'Yes', 'yiw' ),
            'no' => __( 'No', 'yiw' ),
        ),
        'std' => 'no'
		//'hidden' => false,
		//'desc' => __( 'Insert the subtitle of slogan showed below the main title of this slogan.', 'yiw' ),
		//'desc_location' => 'newline'
	),
	20 => array( 
		'id' => 'map_url',
		'name' => __( 'Link src', 'yiw' ), 
		'type' => 'text',
		//'hidden' => false,
		'desc' => __( 'The link of the map, get from Google Maps.', 'yiw' ),
		//'desc_location' => 'newline'
	),
	30 => array( 
		'id' => 'map_opened',
		'name' => __( 'Open the map at page loaded.', 'yiw' ), 
		'type' => 'select',
		'options' => array(
            'yes' => __( 'Yes', 'yiw' ),
            'no' => __( 'No', 'yiw' ),
        ),
        'std' => 'no',
		//'hidden' => false,
		'desc' => __( 'Say if you want the map opened when the page is loaded.', 'yiw' ),
		'desc_location' => 'inline'
	),
); 
yiw_register_metabox( 'yiw_map_page', __( 'Tab with map', 'yiw' ), 'page', $options_args, 'normal', 'high' );
	
// remove filter wpautop
$options_args = array( 
	10 => array(                          
		'name' => __( 'Name', 'yiw' ), 
		'id' => 'testimonial_label',
		'type' => 'text'
	),
	20 => array(                      
		'name' => __( 'URL', 'yiw' ), 
		'id' => 'testimonial_website',
		'type' => 'text'
	),
); 
yiw_register_metabox( 'yiw_website_testimonial', __( 'Website', 'yiw' ), 'bl_testimonials', $options_args, 'side', 'high' );

//portfolio video url
$options_args = array(
    10 => array(
        'id' => 'portfolio_video',
        'name' => __( 'Video URL:', 'yiw' ), 
        'type' => 'text',
        'desc' => __( 'Here, you can add an Youtube or Vimeo url video, to show on thumb of this portfolio element.', 'yiw' ),
        'desc_location' => 'newline'
    )
);
foreach( yiw_get_portfolios() as $post_type => $post_type_title )
    yiw_register_metabox( 'yiw_url_portfolio_' . $post_type, __( 'Video URL', 'yiw' ), $post_type, $options_args, 'normal', 'high' );

// portfolio
$options_args = array(
    10 => array( 
        'id' => 'portfolio_skills_label',
        'name' => __( 'Skills Label', 'yiw' ), 
        'type' => 'text',
        'desc' => __( 'Insert the label used in skills field', 'yiw' ),
        'desc_location' => 'newline'
    ),
    20 => array( 
        'id' => 'portfolio_skills',
        'name' => __( 'Skills', 'yiw' ), 
        'type' => 'text',
        'desc' => __( 'Insert the skills', 'yiw' ),
        'desc_location' => 'newline'
    ),
   30 => array( 
        'id' => 'portfolio_date_label',
        'name' => __( 'Date label', 'yiw' ), 
        'type' => 'text',
        'desc' => __( 'Insert the label used in date field', 'yiw' ),
        'desc_location' => 'newline'
    )
); 
foreach( yiw_get_portfolios() as $post_type => $post_type_title )
    yiw_register_metabox( 'yiw_portfolio_skillsdate_' . $post_type, __( 'Skills and Date', 'yiw' ), $post_type, $options_args, 'normal', 'high' );

// accordion
$options_args = array(
    10 => array( 
        'id' => 'slider_accordion_subtitle',
        'name' => '',
        'type' => 'text',
        'desc' => __( 'Insert the subtitle.', 'yiw' ),
        'desc_location' => 'newline'
    )
); 
foreach( yiw_accordion_sliders() as $post_type => $post_type_title )
    yiw_register_metabox( 'yiw_accordion_subtitle_' . $post_type, __( 'Subtitle Slide', 'yiw' ), $post_type, $options_args, 'side', 'high' );
?>
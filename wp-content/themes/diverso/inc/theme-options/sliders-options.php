<?php    
                         
$yiw_slider = yiw_get_option( 'slider_choosen', 'none' );      

// configuration slides
switch ( $yiw_slider ) {
	case 'elegant' :
		$slide_config = 'title, caption, image, link';
		break;
	case 'flash' :
		$slide_config = 'title, caption, image, link';
		break;
	case 'cycle' :
		$slide_config = 'title, caption, image, video, layout, link';
		break;
	case 'thumbnails' :       
		$slide_config = 'caption, image, tooltip';
		break;    
	case 'elastic' :
		$slide_config = 'title, caption, image, link';
		break;   
	case 'nivo' :
		$slide_config = 'image, link';
		break;
	default :
		$slide_config = 'title, caption, image, link';
		break;
}

$yiw_options['sliders'] = array (         
    
    /* =================== ARROW FADE SLIDER =================== */
    'title' => array(    
        array( 'name' => __('Sliders Manager', 'yiw'),
        	   'type' => 'title'),
    ),        
	        
    'config' => array(    
        array( 'name' => __('Select slider to show or configure', 'yiw'),
        	   'type' => 'section',
			   'effect' => 0),
        array( 'type' => 'open'),         
        
        array( 'name' => __('Default Header image type', 'yiw'),
        	   'desc' => __('Select the default header type for homepage pages.', 'yiw') . ' <br />NB: ' . sprintf( __('for "Fixed Image", you can configure it on %s -> %s.', 'yiw' ), __( 'Appearance' ), __( 'Header' ) ),
        	   'id' => 'slider_type',
        	   'type' => 'radio',
        	   'options' => empty( $yiw_sliders ) ? array() : $yiw_sliders,
        	   'std' => __('fixed-image', 'yiw') ),             
         
        array( 'name' => __('Configure slider.', 'yiw'),
        	   'id' => 'slider_choosen',       
        	   'desc' => __('Choose a slider and save, to configure below your slider choosen.', 'yiw'),
        	   'type' => 'select',
			   'options' => empty( $yiw_sliders ) ? array() : $yiw_sliders,
        	   'button' => __( 'Configure', 'yiw' ),
			   'std' => 'none' ),	              
         
        array( 'name' => __('Responsive Behavior', 'yiw'),
        	   'id' => 'slider_responsive',       
        	   'desc' => __('Say what you want to do when the website is loaded by lower resolution screen.', 'yiw' ) . ' <br /><br /><b>NB:</b> '.__('The option "Leave the slider" is available only for "elastic" slider, because is the only one that has a correct responsive behavior. If you use another slider type, the slider will be hidden in lower resolutions.', 'yiw'),
        	   'type' => 'select',
			   'options' => array(                               
                    'leave' => __( 'Leave the slider', 'yiw' ),
                    'remove' => __( 'Remove the slider', 'yiw' ),
                    'fixed-image' => __( 'Replace with "Fixed Image"', 'yiw' )
               ),
			   'std' => 'leave' ),	  
        	
        array( 'type' => 'close')
    ),
    
    'settings-flash' => array(  
        array( 'name' => __('Slider Settings', 'yiw'),
        	   'type' => 'section'),
        array( 'type' => 'open'),          
         
        array( 'name' => __('Settings flash slider', 'yiw'),
        	   'desc' => __('To configure the flash slider settings, go to the "Flash slider" tab.', 'yiw'),
        	   'type' => 'simple-text'),
        	
        array( 'type' => 'close')		
	),
    
    'settings-elegant' => array(    
        array( 'name' => __('Slider Settings', 'yiw'),
        	   'type' => 'section'),
        array( 'type' => 'open'),  
         
        array( 'name' => __('Effect', 'yiw'),
        	   'desc' => __('Select the effect you want for slides transiction.', 'yiw'),
        	   'id' => 'slider_elegant_effect',
        	   'type' => 'select',
        	   'options' => $GLOBALS['yiw_cycle_fxs'],
			   'std' => 'fade'),	
         
        array( 'name' => __('Easing', 'yiw'),
        	   'desc' => __('Select the easing for effect transition.', 'yiw'),
        	   'id' => 'slider_elegant_easing',
        	   'type' => 'select',
        	   'options' => $GLOBALS['yiw_easings'],
			   'std' => FALSE ),	
        	
        array( 'name' => __('Speed (s)', 'yiw'),
        	   'desc' => __('Select the speed of transiction between slides, expressed in seconds.', 'yiw'),
        	   'id' => 'slider_elegant_speed',
        	   'min' => 0,
        	   'max' => 5,
        	   'step' => 0.1,
        	   'type' => 'slider_control',
        	   'std' => 0.5),  
        	
        array( 'name' => __('Timeout (s)', 'yiw'),
        	   'desc' => __('Select the delay between slides, expressed in seconds.', 'yiw'),
        	   'id' => 'slider_elegant_timeout',
        	   'min' => 0,
        	   'max' => 20,
        	   'step' => 0.5,
        	   'type' => 'slider_control',
        	   'std' => 5),     
        	
        array( 'name' => __('Caption position', 'yiw'),
        	   'desc' => __('Select the position of caption.', 'yiw'),
        	   'id' => 'slider_elegant_caption_position',
        	   'type' => 'select',
        	   'options' => array(
			   		'top' => __( 'Top', 'yiw' ),
			   		'bottom' => __( 'Bottom', 'yiw' ),
			   		'left' => __( 'Left', 'yiw' ),
			   		'right' => __( 'Right', 'yiw' ),
			   ),
        	   'std' => 'right'),    
        	
        array( 'name' => __('Caption Speed (s)', 'yiw'),
        	   'desc' => __('Select the speed of caption appearance.', 'yiw'),
        	   'id' => 'slider_elegant_caption_speed',
        	   'min' => 0,
        	   'max' => 5,
        	   'step' => 0.1,
        	   'type' => 'slider_control',
        	   'std' => 0.5),      
         
        array( 'name' => __('More text', 'yiw'),
        	   'desc' => __('Write what you want to show on more link, if you have selected "YES" on option above.', 'yiw'),
        	   'id' => 'slider_elegant_more_text',
        	   'type' => 'text',
			   'std' => __( 'Read more...', 'yiw' ) ),
        	
        array( 'type' => 'close')
    ),     
    
    'settings-thumbnails' => array(    
        array( 'name' => __('Slider Settings', 'yiw'),
        	   'type' => 'section'),
        array( 'type' => 'open'),  
         
        array( 'name' => __('Effect', 'yiw'),
        	   'desc' => __('Select the effect you want for slides transiction.', 'yiw'),
        	   'id' => 'slider_thumbnails_effect',
        	   'type' => 'select',
        	   'options' => array(
                'hslide' => 'hslide',
                'vslide' => 'vslide',
                'fade' => 'fade',
               ),
			   'std' => 'fade'),		
        	
        array( 'name' => __('Speed (s)', 'yiw'),
        	   'desc' => __('Select the speed of transiction between slides, expressed in seconds.', 'yiw'),
        	   'id' => 'slider_thumbnails_speed',
        	   'min' => 0,
        	   'max' => 5,
        	   'step' => 0.1,
        	   'type' => 'slider_control',
        	   'std' => 0.5),  
        	
        array( 'name' => __('Timeout (s)', 'yiw'),
        	   'desc' => __('Select the delay between slides, expressed in seconds.', 'yiw'),
        	   'id' => 'slider_thumbnails_timeout',
        	   'min' => 0,
        	   'max' => 20,
        	   'step' => 0.5,
        	   'type' => 'slider_control',
        	   'std' => 5),   
        	
        array( 'type' => 'close')
    ),            

    'settings-nivo' => array(    
        array( 'name' => __('Slider Settings', 'yiw'),
               'type' => 'section'),
        array( 'type' => 'open'),  
         
        array( 'name' => __('Slider Height', 'yiw'),
               'desc' => __('Set the slider height, according to your images.', 'yiw'),
               'id' => 'slider_nivo_height',
               'type' => 'text',
               'std' => 350), 
         
        array( 'name' => __('Effect', 'yiw'),
               'desc' => __('Select the effect you want for slides transiction.', 'yiw'),
               'id' => 'slider_nivo_effect',
               'type' => 'select',
               'options' => isset( $yiw_nivo_fxs ) ? $yiw_nivo_fxs : array(),
               'std' => 'random'),    
            
        array( 'name' => __('Speed (s)', 'yiw'),
               'desc' => __('Select the speed of transiction between slides, expressed in seconds.', 'yiw'),
               'id' => 'slider_nivo_speed',
               'min' => 0,
               'max' => 5,
               'step' => 0.1,
               'type' => 'slider_control',
               'std' => 0.5),  
            
        array( 'name' => __('Timeout (s)', 'yiw'),
               'desc' => __('Select the delay between slides, expressed in seconds.', 'yiw'),
               'id' => 'slider_nivo_timeout',
               'min' => 0,
               'max' => 20,
               'step' => 0.5,
               'type' => 'slider_control',
               'std' => 5),     

        array( "name" => __("Next & Prev navigation", 'yiw'),
               "desc" => __("Choose if you want to show Next & Prev arrows", 'yiw'),
               "id" => 'slider_nivo_directionNav',
               "type" => "on-off",
               "std" => 1),
            
        array( "name" => __("Next & Prev navigation only on hover", 'yiw'),
               "desc" => __("Choose if you want to show Next & Prev arrows only on hover", 'yiw'), 
               "id" => 'slider_nivo_directionNavHide',
               "type" => "on-off",
               "std" => 1),
            
        array( "name" => __("Enable Bullets", 'yiw'),
               "desc" => __("Choose if you want to show bullets navigation below the slider", 'yiw'),
               "id" => 'slider_nivo_controlNav',
               "type" => "on-off",
               "std" => 0),
            
        array( 'type' => 'close')
    ),
    
    'settings-cycle' => array(    
        array( 'name' => __('Slider Settings', 'yiw'),
               'type' => 'section'),
        array( 'type' => 'open'),    
            
        array( 'name' => __('Autoplay', 'yiw'),
               'desc' => __('Select if you want that the slider change the slide automatically.', 'yiw'),
               'id' => 'slider_cycle_autoplay',
               'type' => 'on-off',
               'std' => 1),     
            
        array( 'name' => __('Effect', 'yiw'),
               'desc' => __('Select the effect for the transition.', 'yiw'),
               'id' => 'slider_cycle_fx',
               'type' => 'select',
               'options' => array(
                    'fade' => __( 'Fade', 'yiw' ),
                    'slide' => __( 'Slide', 'yiw' )
               ),
               'std' => 'slide'),     
            
        array( 'name' => __('Speed (s)', 'yiw'),
               'desc' => __('Select the speed of transiction between slides, expressed in seconds.', 'yiw'),
               'id' => 'slider_cycle_speed',
               'min' => 0,
               'max' => 5,
               'step' => 0.1,
               'type' => 'slider_control',
               'std' => 0.4),  
            
        array( 'name' => __('Timeout (s)', 'yiw'),
               'desc' => __('Select the delay between slides, expressed in seconds.', 'yiw'),
               'id' => 'slider_cycle_timeout',
               'min' => 0,
               'max' => 20,
               'step' => 0.5,
               'type' => 'slider_control',
               'std' => 5),     
            
        array( 'type' => 'close')
    ), 
    
    'settings-elastic' => array(    
        array( 'name' => __('Slider Settings', 'yiw'),
               'type' => 'section'),
        array( 'type' => 'open'),    
            
        array( 'name' => __('Autoplay', 'yiw'),
               'desc' => __('Select if you want that the slider change the slide automatically.', 'yiw'),
               'id' => 'slider_elastic_autoplay',
               'type' => 'on-off',
               'std' => 1),     
            
        array( 'name' => __('Animation', 'yiw'),
               'desc' => __('Animation types -> "sides" : new slides will slide in from left / right; "center": new slides will appear in the center.', 'yiw'),
               'id' => 'slider_elastic_animation',
               'type' => 'select',
               'options' => array(
                    'sides' => __( 'Sides', 'yiw' ),
                    'center' => __( 'Center', 'yiw' )
               ),
               'std' => 'slide'),     
            
        array( 'name' => __('Speed (s)', 'yiw'),
               'desc' => __('Select the speed of transiction between slides, expressed in seconds.', 'yiw'),
               'id' => 'slider_elastic_speed',
               'min' => 0,
               'max' => 5,
               'step' => 0.1,
               'type' => 'slider_control',
               'std' => 0.8),  
            
        array( 'name' => __('Timeout (s)', 'yiw'),
               'desc' => __('Select the delay between slides, expressed in seconds.', 'yiw'),
               'id' => 'slider_elastic_timeout',
               'min' => 0,
               'max' => 20,
               'step' => 0.5,
               'type' => 'slider_control',
               'std' => 3),     
            
        array( 'type' => 'close')
    ), 
	        
    'slides' => array(    
        array( 'name' => __('Slides', 'yiw'),
        	   'type' => 'section',
        	   'valueButton' => __('Add/Edit Slide', 'yiw'),
			   'effect' => 0),
        array( 'type' => 'open'),  
         
        array( 'id' => 'slider_' . $yiw_slider . '_slides',
        	   'data' => 'array',
        	   'type' => 'slides-table',
			   'config' => $slide_config,
			   'max-height' => 180 ),	
        	
        array( 'type' => 'close')
    )        
    /* =================== END ARROW FADE SLIDER =================== */
 
);         

function yiw_show_right_settings() {
    global $yiw_options;                       
    
    if ( ! isset( $yiw_options['sliders'] ) )
        return;
    
    $slider = yiw_get_option( 'slider_choosen', 'elegant' );
    
    if ( $slider == 'none' || $slider == 'fixed-image' )
    	unset( $yiw_options['sliders']['slides'] );  
    
    foreach ( $yiw_options['sliders'] as $section => $options ) {
    	if ( preg_match( '/settings-(.*)/', $section ) && $section != 'settings-' . $slider )
    		unset( $yiw_options['sliders'][$section] );
    }     
}
add_action( 'yiw_before_render_panel', 'yiw_show_right_settings' );    
   
?>
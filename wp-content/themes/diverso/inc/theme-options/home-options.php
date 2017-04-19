<?php   

$yiw_home_sections = array(
   'home-row' => __( 'Home Row', 'yiw' ),
   'sections' => __( 'Sections', 'yiw' ),
   'content' => __( 'Page Content', 'yiw' ),
   'testimonials' => __( 'Testimonials Slider', 'yiw' ),
   'twitter' => __( 'Twitter', 'yiw')
);             

$yiw_options['home'] = array (
	 
	/* =================== SECTION 1 =================== */
    'title' => array(    
        array( 'name' => __('Home Sections', 'yiw'),
        	   'type' => 'title'),
    ),   
    
    'home-settings' => array(     
        array( 'name' => __('Composer', 'yiw'),
        	   'type' => 'section',
               'effect' => 0),
        array( 'type' => 'open'), 
         
        array( 'id' => 'home_composer',
        	   'data' => 'array',                                        
        	   'elements' => $yiw_home_sections,
        	   'type' => 'composer',
               'std' => array(
                   array(
                        'slug' => 'home-row',
                        'name' => $yiw_home_sections['home-row'],
                        'visible' => 'no'
                   ), 
                   array(
                        'slug' => 'sections',
                        'name' => $yiw_home_sections['sections'],
                        'visible' => 'yes'
                   ), 
                   array(
                        'slug' => 'content',
                        'name' => $yiw_home_sections['content'],
                        'visible' => 'yes'
                   ), 
                   array(
                        'slug' => 'testimonials',
                        'name' => $yiw_home_sections['testimonials'],
                        'visible' => 'no'
                   )
               ) ),	
        
        array( 'type' => 'close')
    ),   
    
    'home-sections' => array(     
        array( 'name' => __('Homepage Sections', 'yiw'),
        	   'type' => 'section'),
        array( 'type' => 'open'), 
         
        array( 'id' => 'home_sections',
        	   'data' => 'array',
        	   'type' => 'sortabled-table' ),	
        
        array( 'type' => 'close')
    ),   
    /* =================== END SECTION 9 =================== */ 
    
                                                      
    /* =================== TESTIMONIAL =================== */
    'testimonials' => array(
        array( 'name' => __('Testimonials Slider', 'yiw'),
        	   'type' => 'section'),
        array( 'type' => 'open'),   
         
        array( 'name' => __('Items', 'yiw'),
        	   'desc' => __('How many tweets to include into the slider.', 'yiw'),
        	   'id' => 'testimonials_items',
        	   'type' => 'slider_control',  
        	   'min' => 0,
        	   'max' => 20,
        	   'std' => 5),   	
        	
        array( 'name' => __('Speed (s)', 'yiw'),
        	   'desc' => __('Select the speed of transiction between slides, expressed in seconds.', 'yiw'),
        	   'id' => 'testimonials_speed',
        	   'min' => 0,
        	   'max' => 5,
        	   'step' => 0.1,
        	   'type' => 'slider_control',
        	   'std' => 0.5),  
        	
        array( 'name' => __('Timeout (s)', 'yiw'),
        	   'desc' => __('Select the delay between slides, expressed in seconds.', 'yiw'),
        	   'id' => 'testimonials_timeout',
        	   'min' => 0,
        	   'max' => 20,
        	   'step' => 0.5,
        	   'type' => 'slider_control',
        	   'std' => 5),      
         
        array( 'type' => 'close')   
    ),          
    /* =================== END TWITTER =================== */  
);   
?>
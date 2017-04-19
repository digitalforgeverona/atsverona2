<?php    
                         
$prefix = 'featured';
	
$yiw_options['featuredlist'] = array (         
    
    /* =================== FEATURED LIST =================== */
    "title" => array(    
        array( "name" => __('Rotating Slider Manager', 'yiw'),
        	   "type" => "title"),   
    ),
                                                    
    "settings" => array(    
    
        array( "name" => __("Featured List Settings", 'yiw'),
        	   "type" => "section",
			   "effect" => 0),
        array( "type" => "open"),  
         
        array( "name" => __("List Element 1 - Title", 'yiw'),
        	   "desc" => __("The title that appears in the middle of left numbers (leave empty if you don't want this title).", 'yiw'),
        	   "id" => $shortname."_{$prefix}_featured_l1_title",
        	   "type" => "text",
			   "std" => __( 'About', 'yiw' ) ),
			   
		array( "name" => __("List Element 1 - Subtitle", 'yiw'),
        	   "desc" => __("The text that appears below left numbers (leave empty if you don't want this subtitle).", 'yiw'),
        	   "id" => $shortname."_{$prefix}_featured_l1_subtitle",
        	   "type" => "text",
			   "std" => '' ),
         
      	array( "name" => __("List Element 1 - Body", 'yiw'),
        	   "desc" => __("The element's hml body.", 'yiw'),
        	   "id" => $shortname."_{$prefix}_featured_l1_body",
        	   "type" => "textarea",
			   "std" => __( '<h2>Di\'verso is a creative agency</h2>
<h3>We create a beautiful, original, amazing things.</h3>

<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel dui ut augue tempus condimentum. In erat risus, pulvinar ac pulvinar adipiscing, vestibulum eget quam. Aenean molestie viverra ante at tincidunt. Etiam rhoncus elementum ultricies. ecenas volutpat ornare auctor. In non orci nec lacus imperdiet aliquet. Curabitur eleifend nulla ut augue.</p>', 'yiw' ) ),
		
		array( "name" => __("List Element 2 - Title", 'yiw'),
        	   "desc" => __("The title that appears in the middle of left numbers (leave empty if you don't want this title).", 'yiw'),
        	   "id" => $shortname."_{$prefix}_featured_l2_title",
        	   "type" => "text",
			   "std" => __( 'Services', 'yiw' ) ),
			   
        array( "name" => __("List Element 2 - Subtitle", 'yiw'),
        	   "desc" => __("The text that appears below left numbers (leave empty if you don't want this subtitle).", 'yiw'),
        	   "id" => $shortname."_{$prefix}_featured_l2_subtitle",
        	   "type" => "text",
			   "std" => '' ),
		 
      	array( "name" => __("List Element 2 - Body", 'yiw'),
        	   "desc" => __("The element's hml body.", 'yiw'),
        	   "id" => $shortname."_{$prefix}_featured_l2_body",
        	   "type" => "textarea",
			   "std" => __( '<h3>We do beautiful web sites.</h3>', 'yiw' ) ),
			   
		array( "name" => __("List Element 3 - Title", 'yiw'),
        	   "desc" => __("The title that appears in the middle of left numbers (leave empty if you don't want this title).", 'yiw'),
        	   "id" => $shortname."_{$prefix}_featured_l3_title",
        	   "type" => "text",
			   "std" => __( 'Testimonials', 'yiw' ) ),
			   
		array( "name" => __("List Element 3 - Subtitle", 'yiw'),
        	   "desc" => __("The text that appears below left numbers (leave empty if you don't want this subtitle).", 'yiw'),
        	   "id" => $shortname."_{$prefix}_featured_l3_subtitle",
        	   "type" => "text",
			   "std" => __( '<h2>Need a free quote?</h2>
<p>Feel free to contact us for a free
quote. Use this form or call us!</p>
', 'yiw' ) ),
         
      	array( "name" => __("List Element 3 - Body", 'yiw'),
        	   "desc" => __("The element's hml body.", 'yiw'),
        	   "id" => $shortname."_{$prefix}_featured_l3_body",
        	   "type" => "textarea",
			   "std" => __( '<h3>Our clients say</h3>
			   
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel dui ut augue tempus condimentum., vestibulum eget quam. Aenean molestie viverra ante at tincidunt. Etiam rhoncus elementum ultricies. ecenas volutpat seori ornare auctor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel dui ut augue tempus condimentum., vestibulum eget quam.</p>
', 'yiw' ) ),
			   
        array( "type" => "close")
    )      
    /* =================== END FEATURED LIST =================== */
 
);   
?>
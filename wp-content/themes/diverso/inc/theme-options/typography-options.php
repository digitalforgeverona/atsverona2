<?php                

$yiw_options['typography'] = array (
	 
    /* =================== GENERAL =================== */
    "typography" => array(    
        array( "name" => __('Typography Settings', 'yiw'),
        	   "type" => "title"),
    
        array( "name" => __("Typography", 'yiw'), 
			   "effect" => 0,
        	   "type" => "section"),
        array( "type" => "open"),
        
        array( "name" => __("Title fonts", 'yiw'),
        	   "desc" => __("Select the type to use for the fonts.", 'yiw'),
        	   "id" => "font_title",
        	   "type" => "font-select",
        	   "data" => "array",
        	   "font-types" => 'cufon,google-font,web-fonts',
        	   "std" => array( 'type' => 'google-font', 'google-font' => 'Yanone Kaffeesatz:400' ) ),  
        
        array( "name" => __("Navigation font", 'yiw'),
        	   "desc" => __("Select font for the navigation.", 'yiw'),
        	   "id" => "font_nav",
        	   "type" => "font-select",
        	   "data" => "array",
        	   "font-types" => 'cufon,google-font,web-fonts',
        	   "std" => array( 'type' => 'web-fonts', 'web-fonts' => "Verdana, Geneva, sans-serif" ) ),  
        
//         array( "name" => __("Slogan Title font", 'yiw'),
//         	   "desc" => __("Select font for the slogan title.", 'yiw'),
//         	   "id" => "font_slogan",
//         	   "type" => "font-select",
//         	   "data" => "array",
//         	   "font-types" => 'cufon,google-font,web-fonts',
//         	   "std" => array( 'type' => 'google-font', 'google-font' => 'Yanone Kaffeesatz:400' ) ),  
        
        array( "name" => __("Paragraphs", 'yiw'),
        	   "desc" => __("Select font for the paragraphs.", 'yiw'),
        	   "id" => "font_paragraph",
        	   "type" => "font-select",
        	   "data" => "array",
        	   "font-types" => 'google-font,web-fonts',
        	   "std" => array( 'type' => 'web-fonts', 'web-fonts' => "Calibri, 'Lucida Sans Unicode', Helvetica, Arial, san-serif" ) ),  
        	
        array( "type" => "close")
	),     
 
);                      

yiw_retrieve_font_options( $yiw_options['typography'] );
?>
<?php                

$yiw_options['general'] = array (
	 
    /* =================== SKIN =================== */
    'responsive' => array(    
        array( 'name' => __('General Settings', 'yiw'),
        	   'type' => 'title'),
    
        array( 'name' => __('Activate responsive', 'yiw'),
        	   'type' => 'section',
               'effect' => 0),
        array( 'type' => 'open'),                 
         
        array( 'name' => __('Activate responsive', 'yiw'),
        	   'desc' => __('Select the skin you want to use in this theme. NB: if you want to change the skin, select it before continue.', 'yiw'),
        	   'yiw-callback-save' => 'yiw_select_skin_option',
        	   'id' => 'responsive',
        	   'type' => 'on-off',
        	   'button' => __( 'Save', 'yiw' ),
               'std' => 1 ),     
        	
        array( 'type' => 'close')
    ),        
    /* =================== END SKIN =================== */
	 
    /* =================== GENERAL =================== */
    'general' => array(    
        array( 'name' => __('General', 'yiw'),
        	   'type' => 'section'),
        array( 'type' => 'open'),                   
        	
        array( 'name' => __('Custom Favicon', 'yiw'),
        	   'desc' => __('A favicon is a 16x16 pixel icon that represents your site; paste the URL to a .ico image that you want to use as the image', 'yiw'),
        	   'id' => 'favicon',
        	   'type' => 'upload',
        	   'std' => get_template_directory_uri() .'/favicon.ico'),		  
        	
        array( 'name' => __('Custom Style', 'yiw'),
        	   'desc' => __('You can write here your custom css, that will replace the default css.', 'yiw'),
        	   'id' => 'custom_style',
        	   'type' => 'textarea',
        	   'std' => ''),	    
        	
        array( 'name' => __('Images style', 'yiw'),
        	   'desc' => __("Choose the style for the images. Note: the spheric style doesn't work with verion 8 or minor of Internet Exploder.", 'yiw'),
        	   'id' => 'images_style',     
        	   'type' => 'select',
        	   'options' => array(
                    'sphere' => __( 'Spheric', 'yiw' ),
                    'square' => __( 'Square', 'yiw' )
               ),
        	   'std' => 'sphere'),     
        	
        array( 'name' => __('Lightbox Skin', 'yiw'),
        	   'desc' => __('Specific what skin you want for videos and images lightbox.', 'yiw'),
        	   'id' => 'portfolio_skin_lightbox',
        	   'type' => 'select',
        	   'options' => array(
                    'pp_default' => 'Default', 
                    'facebook' => 'Facebook', 
                    'light_rounded' => 'Light rounded', 
                    'dark_rounded' => 'Dark rounded semi-transparent',
                    'light_square' => 'Light square',
                    'dark_square' => 'Dark square semi-transparent'
                ),
        	   'std' => 'pp_default'),    	  
        	
        array( 'name' => __('Google analytics', 'yiw'),
        	   'desc' => __('You can write here your google analytics code, in the same way that google give you.', 'yiw'),
        	   'id' => 'ga_code',
        	   'type' => 'textarea',
        	   'std' => ''),
        	
        array( 'type' => 'close')
    ),        
    /* =================== END GENERAL =================== */
    
                                                 
    /* =================== TOPBAR =================== */
    'topbar' => array(
        array( 'name' => __('Topbar', 'yiw'),
        	   'type' => 'section'),
        array( 'type' => 'open'),   
        	
        array( 'name' => __('Show Topbar', 'yiw'),
        	   'desc' => __('Say if you want the topbar on header above the header.', 'yiw'),
        	   'id' => 'show_topbar',     
        	   'type' => 'on-off',
        	   'std' => 1),         
        	
        array( 'name' => __('Show Breadcrumb', 'yiw'),
        	   'desc' => __('Say if you want to show the breadcrumb.', 'yiw'),
        	   'id' => 'show_breadcrumb',     
        	   'type' => 'on-off',
        	   'std' => 1),
        	
        array( 'name' => __('Links alignment', 'yiw'),
        	   'desc' => __('Say the alignment of all links in the topbar', 'yiw'),
        	   'id' => 'topbar_align',     
        	   'type' => 'select',
        	   'options' => array(
                    'right' => __( 'Right', 'yiw' ),
                    'left' => __( 'Left', 'yiw' ),
                    'center' => __( 'Center', 'yiw' ),
               ),
        	   'std' => 'right'),
        	
        array( 'name' => __('Show Login link', 'yiw'),
        	   'desc' => __('Say if you want the link login into the topbar.', 'yiw'),
        	   'id' => 'show_login_topbar',     
        	   'type' => 'on-off',
        	   'std' => 1),
        
        array( 'type' => 'close')
    ),   
    /* =================== END TOPBAR =================== */
    
                                                 
    /* =================== HEADER =================== */
    'header' => array(
        array( 'name' => __('Header', 'yiw'),
        	   'type' => 'section'),
        array( 'type' => 'open'),        
        	
//         array( 'name' => __('Active Logo Image', 'yiw'),
//         	   'desc' => __('Set if you want to replace the "Title" and "description" options of header, with a logo image.', 'yiw'),
//         	   'id' => 'show_logo', 
//         	   'type' => 'on-off',
//         	   'std' => ''),
        	
        array( 'name' => __('Logo URL', 'yiw'),
        	   'desc' => __('Enter the URL to your logo image', 'yiw'),
        	   'id' => 'logo',     
        	   'type' => 'upload',
        	   'std' => get_template_directory_uri() . '/images/logo.png'),
        	
//         array( 'name' => __('Logo Width', 'yiw'),
//         	   'desc' => __('Enter the width of logo, expressed in pixel. (Leave empty for default)', 'yiw'),
//         	   'id' => 'logo_width', 
//         	   'type' => 'text',
//         	   'std' => ''),
//         	
//         array( 'name' => __('Logo Height', 'yiw'),
//         	   'desc' => __('Enter the height of logo, expressed in pixel. (Leave empty for default)', 'yiw'),
//         	   'id' => 'logo_height', 
//         	   'type' => 'text',
//         	   'std' => ''),         
	         
        array( "name" => __("Color Dropdown Menu", 'yiw'),
        	   "desc" => __("Select the colour of dropdown menu navigation.", 'yiw'),
        	   "id" => "color_dropdown",
        	   "type" => "select",
        	   "options" => array('black' => __('Black', 'yiw'), 'white' => __('White', 'yiw')),
        	   "std" => "black"),	    
        
        array( 'type' => 'close')
    ),   
    /* =================== END HEADER =================== */
    
                                                 
    /* =================== BLOG =================== */
    'blog' => array(
        array( 'name' => __('Blog Settings', 'yiw'),
        	   'type' => 'section'),
        array( 'type' => 'open'),       
               
        array( 'name' => __('Blog Type', 'yiw'),
               'desc' => __('Say the layout for your blog page.', 'yiw'),
               'id' => 'blog_type',
               'type' => 'select',
               'options' => array('big' => __('Big Thumbnail', 'yiw'), 'small' => __('Small Thumbnail', 'yiw')),
               'std' => 'big'),    
               
        array( 'name' => __('Blog Read More text', 'yiw'),
               'desc' => __('Set the text for the "Read More" button.', 'yiw'),
               'id' => 'blog_read_more_text',
               'type' => 'text',
               'std' => __( 'Read More', 'yiw' ) ),    
        	
        array( 'name' => __('Exclude categories', 'yiw'),
        	   'desc' => __('Select witch categories you want exlude from blog.', 'yiw'),
        	   'id' => 'blog_cats_exclude',
        	   'type' => 'cat',
        	   'cols' => 2,          // number of columns for multickecks
        	   'heads' => array(__('Blog Page', 'yiw'), __('List cat. sidebar', 'yiw')),  // in case of multi columns, specific the head for each column
        	   'std' => ''),        
        	
        array( 'name' => __('Show featured image in Blog posts list', 'yiw'),
        	   'desc' => __('Say if you want to show the featured image in the blog posts list page', 'yiw'),
        	   'id' => 'show_featured_blog',
        	   'type' => 'on-off',
        	   'std' => 1 ), 
        	
        array( 'name' => __('Show featured image in Post single page', 'yiw'),
        	   'desc' => __('Say if you want to show the featured image in the post single page', 'yiw'),
        	   'id' => 'show_featured_single',
        	   'type' => 'on-off',
        	   'std' => 1 ),
        	
        array( 'name' => __('Featured Images Alignment', 'yiw'),
        	   'desc' => __('Specific the featured images alignment', 'yiw'),
        	   'id' => 'blog_image_align',
        	   'type' => 'select',
        	   'options' => array(
                    'alignleft' => 'Left', 
                    'alignright' => 'Right', 
                    'aligncenter' => 'Center'
                ),
        	   'std' => 'aligncenter'),
//         	
//         array( 'name' => __('Featured Images Size', 'yiw'),
//         	   'desc' => __('Specific the featured images size', 'yiw'),
//         	   'id' => 'blog_image_size',
//         	   'type' => 'select',
//         	   'options' => array(
//                     'post-thumbnail' => 'Standard', 
//                     'thumbnail' => 'Thumbnail', 
//                     'medium' => 'Medium',
//                     'large' => 'Large',
//                     'custom' => 'Custom'
//                 ),
//         	   'std' => 'post-thumbnail'),
//         	
//         array( 'name' => __('Featured Images Width', 'yiw'),
//         	   'desc' => __('Specific the featured images width, <strong>if you have selected custom size on option above.</strong>', 'yiw'),
//         	   'id' => 'blog_image_width',
//         	   'type' => 'text',
//         	   'std' => ''),
//         	
//         array( 'name' => __('Featured Images Height', 'yiw'),
//         	   'desc' => __('Specific the featured images height, <strong>if you have selected custom size on option above.</strong>', 'yiw'),
//         	   'id' => 'blog_image_height',
//         	   'type' => 'text',
//         	   'std' => ''),
        
        array( 'type' => 'close')   
    ),
    /* =================== END BLOG =================== */

    /* =================== NEWSLETTER =================== */
    'newsletter-form' => array(
        array( 'name' => __('Newsletter form', 'yiw'),
            'type' => 'section'),
        array( 'type' => 'open'),

        array( 'name' => __('Title', 'yiw'),
            'desc' => __('The title of this section, shown bolded.', 'yiw'),
            'id' => 'newsletter_form_title',
            'type' => 'text',
            'std' => 'Stay Updated:'),

        array( 'name' => __('Description', 'yiw'),
            'desc' => __('A description of this section, shown near the title.', 'yiw'),
            'id' => 'newsletter_form_description',
            'type' => 'text',
            'std' => 'subscribe our special newsletter'),

        array( 'name' => __('Technical information', 'yiw'),
            'desc' => __('The options below are for the configuration of the newsletter form. to make functional the form, you need to link it with an external services and you can do it configurating it with the options below.', 'yiw'),
            'type' => 'simple-text'),

        array( 'name' => __('Action', 'yiw'),
            'desc' => __('The page where make the request (&lt;form <strong>action=""</strong>&gt;).', 'yiw'),
            'id' => 'newsletter_form_action',
            'type' => 'text',
            'std' => ''),

        array( 'name' => __('Method of request', 'yiw'),
            'desc' => __('The method of the form request (&lt;form <strong>method="POST|GET"</strong>&gt;).', 'yiw'),
            'id' => 'newsletter_form_method',
            'type' => 'select',
            'options' => array(
                'post' => 'POST',
                'get' => 'GET'
            ),
            'std' => 'post'),

        array( 'name' => __('Identification name of the "Email" field', 'yiw'),
            'desc' => __('Configure the identification name of the "Email" field, to allow the script to comunicate the value of this field to the external services (&lt;input <strong>name=""</strong>... /&gt;).', 'yiw'),
            'id' => 'newsletter_form_email',
            'type' => 'text',
            'std' => 'email'),

        array( 'name' => __('Label of "Email" field', 'yiw'),
            'desc' => __('The label of the "Email" field.', 'yiw'),
            'id' => 'newsletter_form_label_email',
            'type' => 'text',
            'std' => __( 'Your email', 'yiw' )),

        array( 'name' => __('Label of "Submit" button', 'yiw'),
            'desc' => __('The label of the "Submit" button.', 'yiw'),
            'id' => 'newsletter_form_label_submit',
            'type' => 'text',
            'std' => __( 'Subscribe', 'yiw' )),

        array( 'name' => __('Hidden fields', 'yiw'),
            'desc' => __('Optional: In this option you can set the hidden fields, to write in serializate way (es. field1=value1&field2=value2&field3=value3&...&fieldN=valueN).', 'yiw'),
            'id' => 'newsletter_form_label_hidden_fields',
            'type' => 'text',
            'std' => ''),

        array( 'type' => 'close')
    ),
    /* =================== END NEWSLETTER =================== */


    /* =================== TWITTER =================== */
    'twitter' => array(
        array( 'name' => __('Twitter section', 'yiw'),
        	   'type' => 'section'),
        array( 'type' => 'open'),     
         
        array( 'name' => __('Show twitter', 'yiw'),
        	   'desc' => __('Select if you want to show the big footer, above the footer section. NOTE: this settings will be valid for the new pages, but for the pages already created, you need to deactivate it in each page, by theOptions page box.', 'yiw'),
        	   'id' => 'show_footer_twitter',
        	   'type' => 'on-off',
        	   'std' => 1),

        array( 'name' => __('Twitter username', 'yiw'),
                'desc' => __('Specify twitter username for the last tweets in the topbar', 'yiw'),
                'id' => 'topbar_twitter_username',
                'type' => 'text',
                'deps' => array(
                    'id' => 'topbar_content',
                    'value' => 'twitter'
                ),
                'std' => '' ),

        array( 'name' => __('Consumer key', 'yiw'),
                'desc' => '',
                'id' => 'topbar_consumer_key',
                'type' => 'text',
                'deps' => array(
                    'id' => 'topbar_content',
                    'value' => 'twitter'
                ),
                'std' => '' ),

        array( 'name' => __('Consumer secret', 'yiw'),
                'desc' => '',
                'id' => 'topbar_consumer_secret',
                'type' => 'text',
                'deps' => array(
                    'id' => 'topbar_content',
                    'value' => 'twitter'
                ),
                'std' => '' ),

        array( 'name' => __('Access token', 'yiw'),
                'desc' => '',
                'id' => 'topbar_access_token',
                'type' => 'text',
                'deps' => array(
                    'id' => 'topbar_content',
                    'value' => 'twitter'
                ),
                'std' => '' ),

        array( 'name' => __('Access token secret', 'yiw'),
                'desc' => '',
                'id' => 'topbar_access_token_secret',
                'type' => 'text',
                'deps' => array(
                    'id' => 'topbar_content',
                    'value' => 'twitter'
                ),
                'std' => '' ),
         
        array( 'name' => __('Items', 'yiw'),
        	   'desc' => __('How many tweets to include into the slider.', 'yiw'),
        	   'id' => 'twitter_items',
        	   'type' => 'slider_control',  
        	   'min' => 0,
        	   'max' => 20,
        	   'std' => 5),   	
        	
        array( 'name' => __('Speed (s)', 'yiw'),
        	   'desc' => __('Select the speed of transiction between slides, expressed in seconds.', 'yiw'),
        	   'id' => 'twitter_speed',
        	   'min' => 0,
        	   'max' => 5,
        	   'step' => 0.1,
        	   'type' => 'slider_control',
        	   'std' => 0.5),  
        	
        array( 'name' => __('Timeout (s)', 'yiw'),
        	   'desc' => __('Select the delay between slides, expressed in seconds.', 'yiw'),
        	   'id' => 'twitter_timeout',
        	   'min' => 0,
        	   'max' => 20,
        	   'step' => 0.5,
        	   'type' => 'slider_control',
        	   'std' => 5),      
         
        array( 'type' => 'close')   
    ),          
    /* =================== END TWITTER =================== */  
    
                                                      
    /* =================== FOOTER =================== */
    'footer' => array(
        array( 'name' => __('Footer', 'yiw'),
        	   'type' => 'section'),
        array( 'type' => 'open'), 
         
        array( 'name' => __('Show footer', 'yiw'),
        	   'desc' => __('Select if you want to show the big footer, above the copyright section.', 'yiw'),
        	   'id' => 'show_footer',
        	   'type' => 'on-off',
        	   'std' => 0),  
         
        array( 'name' => __('Columns of footer main section.', 'yiw'),
        	   'desc' => __('Select number of columns for the main footer section.', 'yiw'),
        	   'id' => 'footer_columns',
        	   'type' => 'slider_control',
			   'min' => 1,
			   'max' => 5,
			   'step' => 1,  
			   'deps' => array(
					'id' => 'show_footer',
					'value' => 1
			   ),
        	   'std' => 3),  
         
        array( 'name' => __('Copyright Section', 'yiw'),
        	   'desc' => __('Select the copyright layout type for the theme', 'yiw'),
        	   'id' => 'copyright_type',
        	   'type' => 'select',
        	   'options' => array(
					'two-columns' => __( 'Two Columns Footer', 'yiw' ), 
					'centered' => __( 'Centered Footer', 'yiw' )
				),
        	   'std' => 'two-columns'),  
        	
        array( 'name' => __('Copyright centered text', 'yiw'),
        	   'desc' => __('Enter text used in <strong>centered footer</strong>. It can be HTML.', 'yiw'),
        	   'id' => 'copyright_text_centered',
        	   'type' => 'textarea',
        	   'deps' => array(
			   		'id' => 'copyright_type',
			   		'value' => 'centered'
			   ),
        	   'std' => '' ),
        	
        array( 'name' => __('Copyright copyright text Left', 'yiw'),
        	   'desc' => __('Enter text used in the left side of the footer. It can be HTML.', 'yiw'),
        	   'id' => 'copyright_text_left',
        	   'type' => 'textarea',    
        	   'deps' => array(
			   		'id' => 'copyright_type',
			   		'value' => 'two-columns'
			   ),
        	   'std' => 'Copyright 2011 - <a href="%site_url%"><strong>%name_site%</strong></a>, theme powered by <a href="http://yithemes.com/" title="free themes wordpress"><strong>Your Inspiration Themes</strong></a>' ),
        	
        array( 'name' => __('Copyright copyright text Right', 'yiw'),
        	   'desc' => __('Enter text used in the right side of the footer. It can be HTML.', 'yiw'),
        	   'id' => 'copyright_text_right',
        	   'type' => 'textarea',        
        	   'deps' => array(
			   		'id' => 'copyright_type',
			   		'value' => 'two-columns'
			   ),
        	   'std' => ''),
         
        array( 'type' => 'close')   
    ),          
    /* =================== END FOOTER =================== */

    /* ============ TWITTER API INTEGRATION ============*/
    'twitter_api' => array(
        array( 'name' => __('Twitter API Integration', 'yiw'),
            'type' => 'section'),
        array( 'type' => 'open'),

        array( 'desc' => '<strong>' . __('Insert your Twitter API created from <a href="https://dev.twitter.com/apps">https://dev.twitter.com/apps</a>', 'yiw') . '</strong>',
            'type' => 'simple-text'),

        array( 'name' => __('Twitter username', 'yiw'),
            'desc' => __('Enter the username of Twitter.', 'yiw'),
            'id' => 'twitter_username',
            'type' => 'text',
            'std' => '' ),

        array( 'name' => __('Consumer key', 'yiw'),
            'desc' => __('Enter the Consumer key of Twitter.', 'yiw'),
            'id' => 'twitter_consumer_key',
            'type' => 'text',
            'std' => '' ),

        array( 'name' => __('Consumer secret', 'yiw'),
            'desc' => __('Enter the Consumer secret of Twitter.', 'yiw'),
            'id' => 'twitter_consumer_secret',
            'type' => 'text',
            'std' => '' ),

        array( 'name' => __('Access token', 'yiw'),
            'desc' => __('Enter the Access Token of Twitter.', 'yiw'),
            'id' => 'twitter_access_token',
            'type' => 'text',
            'std' => '' ),

        array( 'name' => __('Access token secret', 'yiw'),
            'desc' => __('Enter the Access Token secret of Twitter.', 'yiw'),
            'id' => 'twitter_access_token_secret',
            'type' => 'text',
            'std' => '' ),
    ),
 
);   
?>
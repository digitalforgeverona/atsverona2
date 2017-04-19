<?php 

/**

 * A unique identifier is defined to store the options in the database and reference them from the theme.

 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.

 * If the identifier changes, it'll appear as if the options have been reset.

 */

function optionsframework_option_name() {

	global $shortname;

	global $themename;

	// This gets the theme name from the stylesheet

	$themename = get_option( 'stylesheet' );

	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );

	$optionsframework_settings['id'] = $themename;

	update_option( 'optionsframework', $optionsframework_settings );
	 
	//setting contact us page
	if(sketch_get_option($shortname.'_contact_page'))
		select_template(sketch_get_option($shortname.'_contact_page'));

}

/**

 * Defines an array of options that will be used to generate the settings page and be saved in the database.

 * When creating the 'id' fields, make sure to use all lowercase and no spaces.

 *

 * If you are making your theme translatable, you should replace 'biznez-lite'

 * with the actual text domain for your theme.  Read more:

 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain

 */

function optionsframework_options() {

	global $shortname;

	global $themename;

	// set  pages

		$options_pages = array();

		$options_pages_obj = get_pages('sort_column=post_parent,menu_order');

		$options_pages[''] = 'Select a page:';

		foreach ($options_pages_obj as $page) {

			$options_pages[$page->ID] = $page->post_title;

		}

	// pagination

	$test_pagiarray = array(

		1 => __('Enable', 'biznez-lite'),

		0 => __('Disable', 'biznez-lite')

	);

	// site logo img/text

	$site_logo = array(

		'limage' => __('Image', 'biznez-lite'),

		'ltext' => __('Text', 'biznez-lite')

	);

	// Breadcrumb hidw/show

	$breadcrumb = array(

		'show' => __('Enable', 'biznez-lite'),

		'hide' => __('Disable', 'biznez-lite')

	);

	

	// Breadcrumb separator type img/text

	$bdcrumb_stype = array(

		'bimage' => __('Image', 'biznez-lite'),

		'btext' => __('Text', 'biznez-lite')

	);
	
	//Front page layout Show/hide

		$frontpagelayout_array = array(

			'true' => __('Static Layout', 'biznez-lite'),

			'false' => __('Custom Layout', 'biznez-lite')

		);

	//Front Content Box Show/hide

		$frontcontentbox_array = array(

			'true' => __('Enable', 'biznez-lite'),

			'false' => __('Disable', 'biznez-lite')

		);

	//testimonial and client box Show/hide

		$test_clientbox_array = array(

				'true' => __('Enable', 'biznez-lite'),

				'false' => __('Disable', 'biznez-lite')

		);

	//jCarousel radio_array

		$radio_array = array(

				'true' => __('Enable', 'biznez-lite'),

				'false' => __('Disable', 'biznez-lite')

		);

	//jCarousel featureradio_array

		$featureradio_array = array(

				'true' => __('Enable', 'biznez-lite'),

				'false' => __('Disable', 'biznez-lite')

		);

	//jcnavigation_array

	$jcnavigation_array = array(

			'true' => __('Enable', 'biznez-lite'),

			'false' => __('Disable', 'biznez-lite')

		);

	// jCarousel_auto

	$jCarousel_auto = array(

		1 => __('Enable', 'biznez-lite'),

		0 => __('Disable', 'biznez-lite')

	);

	//jCarousel_hoverpause

	$jCarousel_hoverpause = array(

		1 => __('Enable', 'biznez-lite'),

		0 => __('Disable', 'biznez-lite')

	);

	//select_slider_type_array

	$select_slider_type_array = array(

		'normal' => __('NormalSlider', 'biznez-lite'),

		'fullwidth' => __('FullWidthSlider', 'biznez-lite')

	);

	//featuredbox_type_array

	$featuredbox_type_array = array(

		'normal' => __('Normal', 'biznez-lite'),

		'centercontent' => __('Center Content', 'biznez-lite')

	);

	//effect_test_array

	$effect_test_array = array(

		'fade' => __('Fade', 'biznez-lite'),

		'horizontal-slide' => __('Horizontal Slide', 'biznez-lite'),

		'vertical-slide' => __('Vertical Slide', 'biznez-lite'),

		'horizontal-push' => __('Horizontal Push', 'biznez-lite'),

	);

  //timer_test_array

   $timer_test_array = array(

		'true' => __('Enable', 'biznez-lite'),

		'false' => __('Disable', 'biznez-lite')

	);

  //startclockonmouseout_array

	   $startclockonmouseout_array = array(

		'true' => __('Enable', 'biznez-lite'),

		'false' => __('Disable', 'biznez-lite')

	);

	//directionNav_array

      $directionNav_array = array(

		'true' => __('Enable', 'biznez-lite'),

		'false' => __('Disable', 'biznez-lite')

	);

	//captions_array

      $captions_array = array(

		'true' => __('Enable', 'biznez-lite'),

		'false' => __('Disable', 'biznez-lite')

	);

	//captionanimation_array

	 $captionanimation_array = array(

			'fade' => __('Fade', 'biznez-lite'),

			'slideOpen' => __('Slide Open', 'biznez-lite'),

			'none' => __('None', 'biznez-lite')

		);

	//pauseOnHover_array

	$pauseOnHover_array = array(

		'true' => __('Enable', 'biznez-lite'),

		'false' => __('Disable', 'biznez-lite')

	);

	//bullets_array

 	$bullets_array = array(

		'true' => __('Enable', 'biznez-lite'),

		'false' => __('Disable', 'biznez-lite')

	);

	//blog page layout

	$blogpage_layout = array(

		'bleft_img' => __('Left Image', 'biznez-lite'),

		'bright_img' => __('Right Image', 'biznez-lite'),

		'btop_img' => __('Top Image', 'biznez-lite')

	);

	// cgmap infostatus

	$cgmap_infowin = array(

		'open' => __('Open', 'biznez-lite'),

		'close' => __('Close', 'biznez-lite')

	);

	

	// cgmap marker animation

	$cgmap_markanim = array(

		'BOUNCE' => __('Bounce', 'biznez-lite'),

		'DROP' => __('Drop', 'biznez-lite')

	);

	// If using image radio buttons, define a directory path

	$imagepath =  get_template_directory_uri() . '/images/';

	$gimagepath = get_template_directory_uri() . '/images';
	
	$teamimagepath = get_template_directory_uri() . '/images/team-member/';

	$sktsiteurl = esc_url(home_url('/'));

	$sktsitenm  = get_bloginfo('name');

	

	$options = array();

	//General Settings

	$options[] = array(

		'name' => __('General Settings', 'biznez-lite'),

		'type' => 'heading');

		$options[] = array(

			'name' => __('Set Site-logo Type', 'biznez-lite'),

			'desc' => __('', 'biznez-lite'),

			'id' => $shortname.'_site_logo_type',

			'std' => 'limage',

			'type' => 'radio',

			'options' => $site_logo);		

		$options[] = array(

			'name' => __('Custom logo', 'biznez-lite'),

			'desc' => __('This creates a custom logo that previews the image.', 'biznez-lite'),

			'id' => $shortname.'_logo_img',

			'std' => '',

			'type' => 'upload',

			'class'=>'hidden');
			
		$options[] = array(
			'name' => __('Logo Image Width (in px)', 'biznez'),
			'desc' => __('Enter Logo Image Width in PX (max width 184px).', 'biznez'),
			'id' => $shortname.'_logo_wdth',
			'class' => 'mini',
			'std' => '154',
			'type' => 'text');

		$options[] = array(
			'name' => __('Logo Image Height (in px)', 'biznez'),
			'desc' => __('Enter Logo Image Height in PX.', 'biznez'),
			'id' => $shortname.'_logo_hght',
			'class' => 'mini',
			'std' => '37',
			'type' => 'text');

		$options[] = array(

			'name' => __('Logo Text', 'biznez-lite'),

			'desc' => __('Enter logo text field.', 'biznez-lite'),

			'id' => $shortname.'_logo_text',

			'std' => '',

			'class' => 'small',

			'type' => 'text',

			'class'=>'hidden');

		$options[] = array(

			'name' => __('Logo ALT Text', 'biznez-lite'),

			'desc' => __('Enter alternate text for logo image.', 'biznez-lite'),

			'id' => $shortname.'_logo_alt',

			'std' => '',

			'type' => 'text');

		$options[] = array(

			'name' => __('Custom favicon', 'biznez-lite'),

			'desc' => __('Upload Custom favicon that previews the image.', 'biznez-lite'),

			'id' => $shortname.'_favicon',

			'std' => '',

			'type' => 'upload');

	    $options[] = array(

			'name' => __('Choose Color', 'biznez-lite'),

			'desc' => __('Choose your theme color.', 'biznez-lite'),

			'id' => $shortname.'_colorpicker',

			'std' => '#30b7ff',

			'type' => 'color' );

	    $options[] = array(

			'name' => __('Change Header Background', 'biznez-lite'),

			'desc' => __('', 'biznez-lite'),

			'id' => $shortname.'_headerbackground',

			'std' => '#ffffff',

			'type' => 'color' );

		$options[] = array(

			'name' => __('Breadcrumb (Enable/Disable)', 'biznez-lite'),

			'desc' => __('', 'biznez-lite'),

			'id' => $shortname.'_breadcrumb',

			'std' => 'show',

			'type' => 'radio',

			'options' => $breadcrumb);



		$options[] = array(

			'name' => __('Breadcrumb Separator Type', 'biznez-lite'),

			'desc' => __('', 'biznez-lite'),

			'id' => $shortname.'_bdcrumb_stype',

			'std' => 'bimage',

			'type' => 'radio',

			'options' => $bdcrumb_stype);



		$options[] = array(

			'name' => __('Change Breadcrumb Separator Image (Width:16px and Height:16px)', 'biznez-lite'),

			'desc' => __('', 'biznez-lite'),

			'id' => $shortname.'_bdcrumb_simg',

			'std' => $imagepath.'ber-arrow.png',

			'type' => 'upload',

			'class'=>'hidden');	

			

		$options[] = array(

			'name' => __('Set Breadcrumb Separator Text', 'biznez-lite'),

			'desc' => __('Enter text like "-/" or you want', 'biznez-lite'),

			'id' => $shortname.'_bdcrumb_stxt',

			'std' => '-',

			'class' => 'small',

			'type' => 'text',

			'class'=>'hidden');

	    $options[] = array(

			'name' => __('Custom Pagination', 'biznez-lite'),

			'desc' => __('Enable/Disable custom pagination on blog page.', 'biznez-lite'),

			'id' => $shortname.'_show_pagenavi',

			'std' => 'yes',

			'type' => 'select',

			'class' => 'small', //mini, tiny, small

			'options' => $test_pagiarray);

		$options[] = array(

				'name' => __('Check to Enable Persistent Header Navigation Menu.', 'biznez-lite'),

				'desc' => __('Enable/Disable persistent header navigation menu.', 'biznez-lite'),

				'id' => $shortname.'_skenavfull',

				'type' => 'checkbox');


		//Slider Setting

			$options[] = array(

				'name' => __('Slider Configuration', 'biznez-lite'),

				'type' => 'heading');

			$options[] = array(

						'name' => __('Select Slider Type', 'biznez-lite'),

						'desc' => __('Select slider type for front page.', 'biznez-lite'),

						'id' => $shortname.'_slider_type',

						'std' => 'normal',

						'type' => 'select',

						'class' => 'small', //mini, tiny, small

						'options' => $select_slider_type_array);

			 $options[] = array(

				'name' => __('Select Animation', 'biznez-lite'),

				'desc' => __('Select animation for slide.', 'biznez-lite'),

				'id' => $shortname.'_effect_select',

				'std' => 'Animation',

				'type' => 'select',

				'class' => 'small', //mini, tiny, small

				'options' => $effect_test_array);

			$options[] = array(

				'name' => __('Animation Speed', 'biznez-lite'),

				'desc' => __('Enter animation speed for slider.', 'biznez-lite'),

				'id' => $shortname.'_animation_speed',

				'std' => '800',

				'type' => 'text');	
				
		$options[] = array(

			'name' => __('First Slide Title', 'biznez-lite'),

			'desc' => __('Enter title for first slide.', 'biznez-lite'),

			'id' => $shortname.'_slider_title1',

			'std' => 'Title1',

			'class' => 'small',

			'type' => 'text');

		  $options[] = array(

			'name' => __('Upload First Slide Image', 'biznez-lite'),

			'desc' => __('Upload image for front page slider.', 'biznez-lite'),

			'id' => $shortname.'_slider_img1',

			'std' => $imagepath.'Biznez_Slider_Image_1000pxby414px.jpg',

			'type' => 'upload');

		$options[] = array(

			'name' => __('Content For First Slide', 'biznez-lite'),

			'desc' => __('Enter content for first slide.', 'biznez-lite'),

			'id' => $shortname.'_content_slider1',

			'std' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy",

			'type' => 'textarea');
			
	  $options[] = array(

			'name' => __('First Slide Link', 'biznez-lite'),

			'desc' => __('Enter first slide link.', 'biznez-lite'),

			'id' => $shortname.'_slider_link1',

			'std' => '#',

			'type' => 'text');
			
		$options[] = array(

			'name' => __('Second Slider Title', 'biznez-lite'),

			'desc' => __('Enter title for second slide.', 'biznez-lite'),

			'id' => $shortname.'_slider_title2',

			'std' => 'Title2',

			'class' => 'small',

			'type' => 'text');

		  $options[] = array(

			'name' => __('Upload Second Slide Image', 'biznez-lite'),

			'desc' => __('Upload image for front page slider.', 'biznez-lite'),

			'id' => $shortname.'_slider_img2',

			'std' => $imagepath.'Biznez_Slider_Image_1000pxby414px.jpg',

			'type' => 'upload');

		$options[] = array(

			'name' => __('Content For Second Slide', 'biznez-lite'),

			'desc' => __('Enter content for second slide.', 'biznez-lite'),

			'id' => $shortname.'_content_slider2',

			'std' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy",

			'type' => 'textarea');
			
	$options[] = array(

			'name' => __('Second Slide Link', 'biznez-lite'),

			'desc' => __('Enter second slide link.', 'biznez-lite'),

			'id' => $shortname.'_slider_link2',

			'std' => '#',

			'type' => 'text');
			
	$options[] = array(

			'name' => __('Third Slider Title.', 'biznez-lite'),

			'desc' => __('Enter title for third slide.', 'biznez-lite'),

			'id' => $shortname.'_slider_title3',

			'std' => 'Title3',

			'class' => 'small',

			'type' => 'text');

		  $options[] = array(

			'name' => __('Upload Third Slide Image', 'biznez-lite'),

			'desc' => __('Upload image for front page slider.', 'biznez-lite'),

			'id' => $shortname.'_slider_img3',

			'std' => $imagepath.'Biznez_Slider_Image_1000pxby414px.jpg',

			'type' => 'upload');

		$options[] = array(

			'name' => __('Content For Third Slide', 'biznez-lite'),

			'desc' => __('Enter content for third slide.', 'biznez-lite'),

			'id' => $shortname.'_content_slider3',

			'std' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy",

			'type' => 'textarea');
			
	  $options[] = array(

			'name' => __('Third Slide Link', 'biznez-lite'),

			'desc' => __('Enter third slide link.', 'biznez-lite'),

			'id' => $shortname.'_slider_link3',

			'std' => '#',

			'type' => 'text');

		

		//Footer	

		$options[] = array(

			'name' => __('Footer', 'biznez-lite'),

			'type' => 'heading');

		$options[] = array(

			'name' => __('Copyright Text', 'biznez-lite'),

			'desc' => __('You can use HTML for links etc..', 'biznez-lite'),

			'id' => $shortname.'_copyright',

			'std' => 'Copyright Text Here.',

			'type' => 'textarea');
		

	//About page	

		$options[] = array(

			'name' => __('About page', 'biznez-lite'),

			'type' => 'heading');

		$options[] = array(

				'name' => __('Team Member Heading Text', 'biznez-lite'),

				'desc' => __('Change team member heading text.', 'biznez-lite'),

				'id' => $shortname.'_about_teamhead',

				'std' => 'Our Team Member',

				'type' => 'text');
				
		$options[] = array(

			'name' => __('First Team Member Name', 'biznez-lite'),

			'desc' => __('Enter name of first team member.', 'biznez-lite'),

			'id' => $shortname.'_tm_name1',

			'std' => 'Scarlett Doe ',

			'type' => 'text');

		  $options[] = array(

			'name' => __('Upload First Team Member Image', 'biznez-lite'),

			'desc' => __('upload image for team member. Size: Width 180px and Height 180px.', 'biznez-lite'),

			'id' => $shortname.'_tm_img1',

			'std' => $teamimagepath.'User-Image_blue.jpg',

			'type' => 'upload');

		$options[] = array(

			'name' => __('First Team Member Content', 'biznez-lite'),

			'desc' => __('Enter content for first team member.', 'biznez-lite'),

			'id' => $shortname.'_tm_content1',

			'std' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy",

			'type' => 'textarea');
			
		$options[] = array(

			'name' => __('First Team Member Job Title', 'biznez-lite'),

			'desc' => __('Enter job title for first team member .', 'biznez-lite'),

			'id' => $shortname.'_tm_job1',

			'std' => 'Counselor',

			'type' => 'text');
			
		$options[] = array(

			'name' => __('First Team Member Website url', 'biznez-lite'),

			'desc' => __('Enter first team member website url.', 'biznez-lite'),

			'id' => $shortname.'_tm_weblink1',

			'std' => '#',

			'type' => 'text');
			
		$options[] = array(

			'name' => __('First Team Member Facebook url', 'biznez-lite'),

			'desc' => __('Enter first team member facebook url.', 'biznez-lite'),

			'id' => $shortname.'_tm_fb1',

			'std' => 'https://www.facebook.com/',

			'type' => 'text');
			
	  $options[] = array(

			'name' => __('First Team Member Twitter url', 'biznez-lite'),

			'desc' => __('Enter first team member twitter url.', 'biznez-lite'),

			'id' => $shortname.'_tm_tw1',

			'std' => 'https://twitter.com/',

			'type' => 'text');
	
	$options[] = array(

			'name' => __('First Team Member Dribbble  url', 'biznez-lite'),

			'desc' => __('Enter first team member dribbble  url.', 'biznez-lite'),

			'id' => $shortname.'_tm_drd1',

			'std' => 'http://dribbble.com/',

			'type' => 'text');
		
	$options[] = array(

			'name' => __('Second Team Member Name', 'biznez-lite'),

			'desc' => __('Enter name of second team member.', 'biznez-lite'),

			'id' => $shortname.'_tm_name2',

			'std' => 'Freddie Thomas',

			'type' => 'text');

		  $options[] = array(

			'name' => __('Upload Second Team Member Image', 'biznez-lite'),

			'desc' => __('upload image for team member. Size: Width 180px and Height 180px.', 'biznez-lite'),

			'id' => $shortname.'_tm_img2',

			'std' => $teamimagepath.'User-Image_red.jpg',

			'type' => 'upload');

		$options[] = array(

			'name' => __('Second Team Member Content', 'biznez-lite'),

			'desc' => __('Enter content for second team member.', 'biznez-lite'),

			'id' => $shortname.'_tm_content2',

			'std' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy",

			'type' => 'textarea');
			
		$options[] = array(

			'name' => __('Second Team Member Job Title', 'biznez-lite'),

			'desc' => __('Enter job title for second team member.', 'biznez-lite'),

			'id' => $shortname.'_tm_job2',

			'std' => 'Counselor',

			'type' => 'text');
			
		$options[] = array(

			'name' => __('Second Team Member Website url', 'biznez-lite'),

			'desc' => __('Enter second team member website url.', 'biznez-lite'),

			'id' => $shortname.'_tm_weblink2',

			'std' => '#',

			'type' => 'text');
			
		$options[] = array(

			'name' => __('Second Team Member Facebook url', 'biznez-lite'),

			'desc' => __('Enter second team member facebook url.', 'biznez-lite'),

			'id' => $shortname.'_tm_fb2',

			'std' => 'https://www.facebook.com/',

			'type' => 'text');
			
	  $options[] = array(

			'name' => __('Second Team Member Twitter url', 'biznez-lite'),

			'desc' => __('Enter second team member twitter url.', 'biznez-lite'),

			'id' => $shortname.'_tm_tw2',

			'std' => 'https://twitter.com/',

			'type' => 'text');
	
	$options[] = array(

			'name' => __('Second Team Member Dribbble  url', 'biznez-lite'),

			'desc' => __('Enter second team member dribbble  url.', 'biznez-lite'),

			'id' => $shortname.'_tm_drd2',

			'std' => 'http://dribbble.com/',

			'type' => 'text');
			
	$options[] = array(

			'name' => __('Third Team Member Name', 'biznez-lite'),

			'desc' => __('Enter name of third team member.', 'biznez-lite'),

			'id' => $shortname.'_tm_name3',

			'std' => 'Maya Beckham',

			'type' => 'text');

		  $options[] = array(

			'name' => __('Upload Third Team Member Image', 'biznez-lite'),

			'desc' => __('upload image for team member. Size: Width 180px and Height 180px.', 'biznez-lite'),

			'id' => $shortname.'_tm_img3',

			'std' => $teamimagepath.'User-Image_Yellow.jpg',

			'type' => 'upload');

		$options[] = array(

			'name' => __('Third Team Member Content', 'biznez-lite'),

			'desc' => __('Enter content for third team member.', 'biznez-lite'),

			'id' => $shortname.'_tm_content3',

			'std' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy",

			'type' => 'textarea');
			
		$options[] = array(

			'name' => __('Third Team Member Job Title', 'biznez-lite'),

			'desc' => __('Enter job title for third team member.', 'biznez-lite'),

			'id' => $shortname.'_tm_job3',

			'std' => 'Counselor',

			'type' => 'text');
			
		$options[] = array(

			'name' => __('Third Team Member Website url', 'biznez-lite'),

			'desc' => __('Enter third team member website url.', 'biznez-lite'),

			'id' => $shortname.'_tm_weblink3',

			'std' => '#',

			'type' => 'text');
			
		$options[] = array(

			'name' => __('Third Team Member Facebook url', 'biznez-lite'),

			'desc' => __('Enter third team member facebook url.', 'biznez-lite'),

			'id' => $shortname.'_tm_fb3',

			'std' => 'https://www.facebook.com/',

			'type' => 'text');
			
		$options[] = array(

			'name' => __('Third Team Member Twitter url', 'biznez-lite'),

			'desc' => __('Enter third team member twitter url.', 'biznez-lite'),

			'id' => $shortname.'_tm_tw3',

			'std' => 'https://twitter.com/',

			'type' => 'text');
	
		$options[] = array(

			'name' => __('Third Team Member Dribbble  url', 'biznez-lite'),

			'desc' => __('Enter third team member dribbble  url.', 'biznez-lite'),

			'id' => $shortname.'_tm_drd3',

			'std' => 'http://dribbble.com/',

			'type' => 'text');
			
		//Contact Page Options	

		$options[] = array(

			'name' => __('Contact Page Options', 'biznez-lite'),

			'type' => 'heading');
			
							
		//select contact page template
		$options[] = array(
				'name' => __('Select Contact us page', 'biznez-lite'),
				'desc' => __('Contact us page', 'biznez-lite'),
				'id' => $shortname.'_contact_page',
				'type' => 'select',
				'options' => $options_pages);
				
				$contact_form_7_description = '';
				$contact_form_7 = admin_url('update.php?action=install-plugin&plugin=contact-form-7&_wpnonce=').wp_create_nonce('install-plugin_contact-form-7');
				$config_contact_form_7 = admin_url('admin.php?page=wpcf7');
				$activate_contact_form_7 = admin_url('plugins.php?action=activate&plugin=contact-form-7%2Fwp-contact-form-7.php&_wpnonce=').wp_create_nonce('activate-plugin_contact-form-7/wp-contact-form-7.php');
				
				if(is_dir( WP_PLUGIN_DIR.'/contact-form-7/')){
					include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
					if(is_plugin_active('contact-form-7/wp-contact-form-7.php')){ $contact_form_7_description = 'Click <a target="_blank" href="'.$config_contact_form_7.'">Here to Configure Contact Form 7 Plugin</a> to show contact form on your <b>Contact Page</b>.'; }
					else{$contact_form_7_description = 'Click <a target="_blank" href="'.$activate_contact_form_7.'">Here to Activate Contact Form 7 Plugin</a>.'; }
				}
				else{
					$contact_form_7_description = 'Click <a target="_blank" href="'.$contact_form_7.'">Here to Install Contact Form 7 Plugin</a> to add contact form on your <b>Contact Page</b>.';
				}
				
		$options[] = array(
			'name' => __('Contact Form Info', 'options_framework_theme'),
			
			'desc' => $contact_form_7_description,
			
			'type' => 'info');
			
		$options[] = array(
			'name' => __('Phone Number', 'biznez-lite'),
			
			'desc' => __('Put your phone number here to show in mobile view in header.', 'biznez-lite'),
			
			'id' => $shortname.'_header_phone',
			
			'std' => '123-456-7891',
			
			'type' => 'text');
		
		$options[] = array(
			'name' => __('Address Title', 'biznez-lite'),
			
			'desc' => __('Put your address title here.', 'biznez-lite'),
			
			'id' => $shortname.'_add_title',
			
			'std' => 'Office Address',
			
			'type' => 'text');
					
		$options[] = array(
				'name' => __('Address Area (Put Your Address and Map Iframe Here) ', 'biznez-lite'),
				
				'desc' => __('Put your address here.', 'biznez-lite'),
				
				'id' => $shortname.'_contact_address_area',
				
				'std' =>'Biznez<br />
						Forever Street 862<br />
						NSW - 125 - CA<br /><br />
						Phone: 123-456-7891<br />
						Fax: 123-456-7891<br />',
				
				'type' => 'textarea');

		//Front Page Options	

		$options[] = array(

			'name' => __('Front Page Options', 'biznez-lite'),

			'type' => 'heading');
			
		
		$options[] = array(

			'name' => __('Select Your Front Page Layout.', 'biznez-lite'),

			'desc' => __('if you select Static layout for front page your selected page content is show otherwise custom front page layout show.', 'biznez-lite'),

			'id' => $shortname.'_hide_frontlayout',

			'std' => 'true',

			'type' => 'radio',

			'options' => $frontpagelayout_array);

		$options[] = array(

			'name' => __('Enable/Disable Feature Box on Front Page', 'biznez-lite'),

			'desc' => __('', 'biznez-lite'),

			'id' => $shortname.'_hide_frontboxes',

			'std' => 'false',

			'type' => 'radio',

			'options' => $featureradio_array);

		$options[] = array(

				'name' => __('Select Featured box Type', 'biznez-lite'),

				'desc' => __('Select featured box for front page.', 'biznez-lite'),

				'id' => $shortname.'_feature_type',

				'std' => 'normal',

				'type' => 'select',

				'class' => 'small', //mini, tiny, small

				'options' => $featuredbox_type_array);

		//Featured Box 1

		$options[] = array(

			'name' => __('First Featured Box Heading:', 'biznez-lite'),

			'desc' => __('Enter first featured box heading.', 'biznez-lite'),

			'id' => $shortname.'_fb1_heading',

			'std' => 'Heading',

			'type' => 'text');

		$options[] = array(

			'name' => __('First Featured Box Icon', 'biznez-lite'),

			'desc' => __('Choose image for first featured area.', 'biznez-lite'),

			'id' => $shortname.'_fb1_icon',

			'type' => 'upload');

		$options[] = array(

			'name' => __('First Featured Box Content', 'biznez-lite'),

			'desc' => __('Enter first featured box content.', 'biznez-lite'),

			'id' => $shortname.'_fb1_content',

			'std' => '',

			'type' => 'textarea');

		$options[] = array(

			'name' => __('First Featured Box Link:', 'biznez-lite'),

			'desc' => __('Enter first featured box link.', 'biznez-lite'),

			'id' => $shortname.'_fb1_link',

			'std' => '#',

			'type' => 'text');

		//Featured Box 2

		$options[] = array(

			'name' => __('Second Featured Box Heading', 'biznez-lite'),

			'desc' => __('Enter second featured box heading.', 'biznez-lite'),

			'id' => $shortname.'_fb2_heading',

			'std' => 'Heading',

			'type' => 'text');

		$options[] = array(

		'name' => __('Second Featured Box Icon', 'biznez-lite'),

		'desc' => __('Choose image for second featured area.', 'biznez-lite'),

		'id' => $shortname.'_fb2_icon',

		'type' => 'upload');

		$options[] = array(

			'name' => __('Second Featured Box Content', 'biznez-lite'),

			'desc' => __('Enter second featured box content.','biznez-lite'),

			'id' => $shortname.'_fb2_content',

			'std' => '',

			'type' => 'textarea');

		$options[] = array(

			'name' => __('Second Featured Box Link:', 'biznez-lite'),

			'desc' => __('Enter second featured box link.', 'biznez-lite'),

			'id' => $shortname.'_fb2_link',

			'std' => '#',

			'type' => 'text');

		//Featured Box 3

		$options[] = array(

			'name' => __('Third  Featured Box Heading','biznez-lite'),

			'desc' => __('Enter third featured box heading.', 'biznez-lite'),

			'id' => $shortname.'_fb3_heading',

			'std' => 'Heading',

			'type' => 'text');

		$options[] = array(

			'name' => __('Third Featured Box Icon', 'biznez-lite'),

			'desc' => __('Choose image for third featured area.', 'biznez-lite'),

			'id' => $shortname.'_fb3_icon',

			'type' => 'upload');

		$options[] = array(

			'name' => __('Third Featured Box Content', 'biznez-lite'),

			'desc' => __('Enter third featured box content.', 'biznez-lite'),

			'id' => $shortname.'_fb3_content',

			'std' => '',

			'type' => 'textarea');

		$options[] = array(

			'name' => __('Third Featured Box Link:', 'biznez-lite'),

			'desc' => __('Enter third featured box link.', 'biznez-lite'),

			'id' => $shortname.'_fb3_link',

			'std' => '#',

			'type' => 'text');

		//Featured Box 4

		$options[] = array(

			'name' => __('Fourth  Featured Box Heading','biznez-lite'),

			'desc' => __('Enter fourth featured box heading.', 'biznez-lite'),

			'id' => $shortname.'_fb4_heading',

			'std' => 'Heading',

			'type' => 'text');

		$options[] = array(

			'name' => __('Fourth Featured Box Icon', 'biznez-lite'),

			'desc' => __('Choose image for fourth featured area.', 'biznez-lite'),

			'id' => $shortname.'_fb4_icon',

			'type' => 'upload');

		$options[] = array(

			'name' => __('Fourth Box 4 Content:', 'biznez-lite'),

			'desc' => __('Enter third fourth box content.', 'biznez-lite'),

			'id' => $shortname.'_fb4_content',

			'std' => '',

			'type' => 'textarea');

		$options[] = array(

			'name' => __('Fourth Featured Box Link', 'biznez-lite'),

			'desc' => __('Enter fourth featured box link.', 'biznez-lite'),

			'id' => $shortname.'_fb4_link',

			'std' => '#',

			'type' => 'text');

	//testimonial and client box hide show		

	$options[] = array(

		'name' => __('Enable/Disable Testimonial and Client Box.', 'biznez-lite'),

		'desc' => __('', 'biznez-lite'),

		'id' => $shortname.'_hide_testclientbox',

		'std' => 'false',

		'type' => 'radio',

		'options' => $test_clientbox_array);

	//testimonial

	$options[] = array(

			'name' => __('Testimonial Heading Text', 'biznez-lite'),

			'desc' => __('Enter testimonial heading text.', 'biznez-lite'),

			'id' => $shortname.'_front_testmonialheadtxt',

			'std' => 'Testimonials',

			'type' => 'text');

	$options[] = array(

			'name' => __('First Testimonial Box Content', 'biznez-lite'),

			'desc' => __('Enter first testimonial box content.', 'biznez-lite'),

			'id' => $shortname.'_testi1_content',

			'std' => '',

			'type' => 'textarea');

	$options[] = array(

			'name' => __('First Testimonial Author', 'biznez-lite'),

			'desc' => __('Enter first testimonial author.', 'biznez-lite'),

			'id' => $shortname.'_testau1_name',

			'std' => '',

			'type' => 'text');

	$options[] = array(

			'name' => __('First Testimonial Author Link', 'biznez-lite'),

			'desc' => __('Enter first testimonial author link.', 'biznez-lite'),

			'id' => $shortname.'_testau1_link',

			'std' => '#',

			'type' => 'text');

	$options[] = array(

			'name' => __('First Testimonial Author Link Text', 'biznez-lite'),

			'desc' => __('Enter first testimonial author link text.', 'biznez-lite'),

			'id' => $shortname.'_testau1_link_text',

			'std' => '',

			'type' => 'text');		

	$options[] = array(

			'name' => __('Second Testimonial Box Content', 'biznez-lite'),

			'desc' => __('Enter second testimonial box content.', 'biznez-lite'),

			'id' => $shortname.'_testi2_content',

			'std' => '',

			'type' => 'textarea');

	$options[] = array(

			'name' => __('Second Testimonial Author', 'biznez-lite'),

			'desc' => __('Enter second testimonial author.', 'biznez-lite'),

			'id' => $shortname.'_testau2_name',

			'std' => '',

			'type' => 'text');

	$options[] = array(

			'name' => __('Second Testimonial Author Link', 'biznez-lite'),

			'desc' => __('Enter second testimonial author link.', 'biznez-lite'),

			'id' => $shortname.'_testau2_link',

			'std' => '#',

			'type' => 'text');

	$options[] = array(

			'name' => __('Second Testimonial Author Link Text', 'biznez-lite'),

			'desc' => __('Enter second testimonial author link text.', 'biznez-lite'),

			'id' => $shortname.'_testau2_link_text',

			'std' => '',

			'type' => 'text');		

	

	//Our Client 

	$options[] = array(

			'name' => __('Client Title', 'biznez-lite'),

			'desc' => __('Enter client title.', 'biznez-lite'),

			'id' => $shortname.'_client_title',

			'std' => 'Our Clients',

			'type' => 'text');

	$options[] = array(

			'name' => __('First Client Logo Image', 'biznez-lite'),

			'desc' => __('Upload image for first client logo area.', 'biznez-lite'),

			'id' => $shortname.'_ourclient_icon1',

			'type' => 'upload');
			
	$options[] = array(

			'name' => __('First Client Logo Image Link', 'biznez-lite'),

			'desc' => __('Enter link for first client logo image.', 'biznez-lite'),

			'id' => $shortname.'_ourclient_link1',
			
			'std' => '#',

			'type' => 'text');

     $options[] = array(

			'name' => __('Second Client Logo Image', 'biznez-lite'),

			'desc' => __('Choose image for second client logo area.', 'biznez-lite'),

			'id' => $shortname.'_ourclient_icon2',

			'type' => 'upload');
			
	$options[] = array(

			'name' => __('Second Client Logo Image Link', 'biznez-lite'),

			'desc' => __('Enter link for second client logo image.', 'biznez-lite'),

			'id' => $shortname.'_ourclient_link2',
			
			'std' => '#',

			'type' => 'text');

	$options[] = array(

			'name' => __('Third Client Logo Image', 'biznez-lite'),

			'desc' => __('Upload image for third client logo area.', 'biznez-lite'),

			'id' => $shortname.'_ourclient_icon3',

			'type' => 'upload');
			
    $options[] = array(

			'name' => __('Third Client Logo Image Link', 'biznez-lite'),

			'desc' => __('Enter link for third client logo image.', 'biznez-lite'),

			'id' => $shortname.'_ourclient_link3',
			
			'std' => '#',

			'type' => 'text');

	$options[] = array(

			'name' => __('Fourth Client Logo Image Title', 'biznez-lite'),

			'desc' => __('Upload image for fourth client logo area.', 'biznez-lite'),

			'id' => $shortname.'_ourclient_icon4',

			'type' => 'upload');
			
	$options[] = array(

			'name' => __('Fourth Client Logo Image Link', 'biznez-lite'),

			'desc' => __('Enter link for fourth client logo image.', 'biznez-lite'),

			'id' => $shortname.'_ourclient_link4',
			
			'std' => '#',

			'type' => 'text');

	$options[] = array(

			'name' => __('Fifth Client Logo Image', 'biznez-lite'),

			'desc' => __('Upload image for fifth client logo area.', 'biznez-lite'),

			'id' => $shortname.'_ourclient_icon5',

			'type' => 'upload');
			
	$options[] = array(

			'name' => __('Fifth Client Logo Image Link', 'biznez-lite'),

			'desc' => __('Enter link for fifth client logo image.', 'biznez-lite'),

			'id' => $shortname.'_ourclient_link5',
			
			'std' => '#',

			'type' => 'text');

	$options[] = array(

			'name' => __('Sixth Client Logo Image', 'biznez-lite'),

			'desc' => __('Upload image for fifth client logo area.', 'biznez-lite'),

			'id' => $shortname.'_ourclient_icon6',

			'type' => 'upload');
			
	$options[] = array(

			'name' => __('Sixth Client Logo Image Link', 'biznez-lite'),

			'desc' => __('Enter link for sixth client logo image.', 'biznez-lite'),

			'id' => $shortname.'_ourclient_link6',
			
			'std' => '#',

			'type' => 'text');

	//Main Setting

	$options[] = array(

		'name' => __('Enable/Disable Front Content Box.', 'biznez-lite'),

		'desc' => __('', 'biznez-lite'),

		'id' => $shortname.'_hide_frontcontentbox',

		'std' => 'false',

		'type' => 'radio',

		'options' => $frontcontentbox_array);

		$options[] = array(

			'name' => __('Front Content Box', 'biznez-lite'),

			'desc' => __('Enter front content box content.', 'biznez-lite'),

			'id' => $shortname.'_frontmain_content',

			'std' => '',

			'type' => 'textarea');

	$options[] = array(

			'name' => __('Front Content Box Button Text', 'biznez-lite'),

			'desc' => __('Enter front content box button text.', 'biznez-lite'),

			'id' => $shortname.'_frontmain_buttontext',

			'type' => 'text');

	$options[] = array(

			'name' => __('Front Content Box Button Link', 'biznez-lite'),

			'desc' => __('Enter front content box button link.', 'biznez-lite'),

			'id' => $shortname.'_frontmain_buttonlink',

			'std' => '#',

			'type' => 'text');

	return $options;

}

/*

 * This is an example of how to add custom scripts to the options panel.

 * This example shows/hides an option when a checkbox is clicked.

 */

add_action('optionsframework_custom_scripts', 'optionsframework_custom_scripts');

function optionsframework_custom_scripts() { ?>

<script type="text/javascript">

jQuery(document).ready(function($) {

	$('#example_showhidden').click(function() {

  		$('#section-example_text_hidden').fadeToggle(400);

	});

	if ($('#example_showhidden:checked').val() !== undefined) {

		$('#section-example_text_hidden').show();

	}

var selected_logobtn = jQuery("input[name='biznez_lite[biznez-lite_site_logo_type]']:checked").val();
	if (selected_logobtn == 'limage') {jQuery('#section-biznez-lite_logo_img').show();}
	if (selected_logobtn == 'ltext') {jQuery('#section-biznez-lite_logo_text').show();}
		
	var selected_bredbtn = jQuery("input[name='biznez_lite[biznez-lite_bdcrumb_stype]']:checked").val();
	if (selected_bredbtn == 'bimage') {jQuery('#section-biznez-lite_bdcrumb_simg').show();}
	if (selected_bredbtn == 'btext') {jQuery('#section-biznez-lite_bdcrumb_stxt').show();}	
	
	jQuery("input[type='radio']").change(function()
	{
        var selected_radio = jQuery(this).val();

        if (selected_radio == 'limage') {
            jQuery('#section-biznez-lite_logo_text').hide();
            jQuery('#section-biznez-lite_logo_img').fadeIn();
        }
        if (selected_radio == 'ltext') {
			jQuery('#section-biznez-lite_logo_img').hide();
            jQuery('#section-biznez-lite_logo_text').fadeIn();
        }        
		
		if (selected_radio == 'bimage') {
            jQuery('#section-biznez-lite_bdcrumb_stxt').hide();
            jQuery('#section-biznez-lite_bdcrumb_simg').fadeIn();
        }
        if (selected_radio == 'btext') {
			jQuery('#section-biznez-lite_bdcrumb_simg').hide();
            jQuery('#section-biznez-lite_bdcrumb_stxt').fadeIn();
        }
    });

});

</script>

<?php

}
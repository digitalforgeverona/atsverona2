<?php

add_action('wp_enqueue_scripts', 'asalah_enqueue_google_font', 1);

function asalah_enqueue_google_font() {
    wp_enqueue_style('ptsans', 'http://fonts.googleapis.com/css?family=PT+Sans:400,700');
    wp_enqueue_style('opensans', 'http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800');
}

add_action('wp_enqueue_scripts', 'asalah_scripts', 30);
add_action('wp_head', 'asalah_ie_scripts', 30);

function asalah_ie_scripts() {
	?>
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/respond.min.js"></script>
	
	<![endif]-->
	<?php
}
function asalah_scripts() {
    global $asalah_data;
    ## Register All Scripts
    wp_register_script('asalah_modernizer', get_template_directory_uri() . '/js/modernizr.min.js', array('jquery'));
    wp_register_script('asalah_bootstrap', get_template_directory_uri() . '/framework/bootstrap/js/bootstrap.min.js', array('jquery'), false, true);
    wp_register_script('asalah_waypoint', get_template_directory_uri() . '/js/waypoints.min.js', array('jquery'), false, true);
    wp_register_script('asalah_appear', get_template_directory_uri() . '/js/jquery.appear.js', array('jquery'), false, true);
    wp_register_script('asalah_parallax', get_template_directory_uri() . '/js/jquery.parallax-1.1.3.js', array('jquery'), false, true);
    wp_register_script('asalah_scripts', get_template_directory_uri() . '/js/asalah.js', array('jquery'), false, true);
    // wp_register_script('asalah_single_scripts', get_template_directory_uri() . '/js/single_scripts.js', array('jquery'), false, true);
    wp_register_script('asalah_fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ), false, true );
    wp_register_script('asalah_isotope', get_template_directory_uri() . '/js/isotope/jquery.isotope.min.js', array( 'jquery' ), false, true );
    wp_register_script('asalah_prettyphoto', get_template_directory_uri() . '/js/prettyphoto/js/jquery.prettyPhoto.js', array( 'jquery' ), false, true );
    wp_register_script('asalah_flexslider', get_template_directory_uri() . '/js/flexslider/jquery.flexslider-min.js', array( 'jquery' ), false, true );
    
    if (get_bloginfo('text_direction') == 'rtl') {
    	wp_register_script('asalah_owl_carousel', get_template_directory_uri() . '/js/owl-carousel/owl.carousel.rtl.js', array( 'jquery' ), false, true );
    }else{
    	wp_register_script('asalah_owl_carousel', get_template_directory_uri() . '/js/owl-carousel/owl.carousel.min.js', array( 'jquery' ), false, true );
    }
    	
    wp_register_script('asalah_elastic', get_template_directory_uri() . '/js/elastic/js/jquery.eislideshow.js', array( 'jquery' ), false, true );
    wp_register_script('asalah_easing', get_template_directory_uri() . '/js/elastic/js/jquery.easing.1.3.js', array( 'jquery' ), false, true );
	wp_register_script('asalah_masonry', get_template_directory_uri() . '/js/masonry.js', array( 'jquery' ), false, true );

    ## Get Global Scripts
    wp_enqueue_script('asalah_modernizer');
    wp_enqueue_script('asalah_bootstrap');
    wp_enqueue_script('asalah_waypoint');
    wp_enqueue_script('asalah_appear');
    wp_enqueue_script('asalah_parallax');
    wp_enqueue_script('asalah_fitvids');
    wp_enqueue_script('asalah_prettyphoto');
    wp_enqueue_script('asalah_flexslider');
    wp_enqueue_script('asalah_owl_carousel');
    wp_enqueue_script('asalah_elastic');
    wp_enqueue_script('asalah_easing');
    wp_enqueue_script('asalah_masonry');
    wp_enqueue_script('asalah_isotope');
    wp_enqueue_script('asalah_scripts');
    if (is_single() || is_page()) {
        // wp_enqueue_script('asalah_single_scripts');
    }

    ## Register all css
    if (get_bloginfo('text_direction') == 'rtl') {
    	wp_register_style('asalah_bootstrap_css', get_template_directory_uri() . '/framework/bootstrap/css/bootstrap.rtl.css', array(), '', 'all');
    }else{
    	wp_register_style('asalah_bootstrap_css', get_template_directory_uri() . '/framework/bootstrap/css/bootstrap.css', array(), '', 'all');
    }
    
    wp_register_style('asalah_fontawesome_css', get_template_directory_uri() . '/framework/fontawesome/css/font-awesome.min.css', array(), '', 'all');
    wp_register_style('asalah_animations_css', get_template_directory_uri() . '/framework/animate.min.css', array(), '', 'all');
    
    if (get_bloginfo('text_direction') == 'rtl') {
    	wp_register_style('asalah_main_style', get_template_directory_uri() . '/rtl.css', array(), '1', 'all');
    }else{
    	wp_register_style('asalah_main_style', get_bloginfo('stylesheet_url'), array(), '1.6', 'all');
    }
    
    wp_register_style('asalah_responsive_css', get_template_directory_uri() . '/responsive.css', array(), '1', 'all');
    wp_register_style('asalah_prettyphoto_css', get_template_directory_uri().'/js/prettyphoto/css/prettyPhoto.css', array(), '', 'all' );
    wp_register_style('asalah_flexslider_css', get_template_directory_uri().'/js/flexslider/flexslider.css', array(), '', 'all' );
    
    wp_register_style('asalah_fontello_css', get_template_directory_uri() . '/framework/fontello/css/fontello.css', array(), '1', 'all');
    wp_register_style('asalah_fontello_animation_css', get_template_directory_uri().'/framework/fontello/css/animation.css', array(), '', 'all' );
    wp_register_style('asalah_fontello_ie7_css', get_template_directory_uri().'/framework/fontello/css/fontello-ie7.css', array(), '', 'all' );
    
    wp_register_style('asalah_isotope_css', get_template_directory_uri().'/js/isotope/style.css', array(), '', 'all' );
    
    if (get_bloginfo('text_direction') == 'rtl') {
    	wp_register_style('asalah_owl_carousel_css', get_template_directory_uri().'/js/owl-carousel/owl.carousel.rtl.css', array(), '', 'all' );
    }else{
    	wp_register_style('asalah_owl_carousel_css', get_template_directory_uri().'/js/owl-carousel/owl.carousel.css', array(), '', 'all' );
    }
    wp_register_style('asalah_owl_theme_css', get_template_directory_uri().'/js/owl-carousel/owl.theme.css', array(), '', 'all' );
	wp_register_style('asalah_elastic_css', get_template_directory_uri().'/js/elastic/css/style.css', array(), '', 'all' );

    ## Get Global css
    wp_enqueue_style('asalah_bootstrap_css');
	wp_enqueue_style('asalah_fontawesome_css');
    wp_enqueue_style('asalah_animations_css');
    wp_enqueue_style('asalah_prettyphoto_css');
    wp_enqueue_style('asalah_flexslider_css');
    wp_enqueue_style('asalah_fontello_css');
    wp_enqueue_style('asalah_fontello_animation_css');
    wp_enqueue_style('asalah_fontello_ie7_css');
    wp_enqueue_style('asalah_isotope_css');
    wp_enqueue_style('asalah_owl_carousel_css');
    wp_enqueue_style('asalah_owl_theme_css');
    wp_enqueue_style('asalah_elastic_css');
    wp_enqueue_style('asalah_main_style');
    wp_enqueue_style('asalah_responsive_css');
    
    
}



add_action('admin_enqueue_scripts', 'asalah_post_options_style');
function asalah_post_options_style() {
	wp_register_script('asalah_admin', get_template_directory_uri() . '/js/admin_scripts.js', array( 'jquery' ) );
	wp_register_script( 'wp-color-picker', get_template_directory_uri() . '/js/color-picker.min.js', array() );

	wp_enqueue_script('wp-color-picker');
	wp_enqueue_script('asalah_admin');
	
    wp_register_style('asalah_admin_css', get_template_directory_uri().'/admin-style.css', array(), '', 'all' );
    wp_enqueue_style('asalah_admin_css');
}
?>
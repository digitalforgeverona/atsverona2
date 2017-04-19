<?php

$googlefonts = array();

function style_options() {
    global $asalah_data, $googlefonts;
    $output = '';



    $post_types = array("standard", "image", "gallery", "video", "audio");
    foreach ($post_types as $post_type) {
        if (asalah_option("asalah_post_icons_" . $post_type . "_color")) {
            $output .= "." . $post_type . "_post_icon {";
            $output .= "color: " . asalah_option("asalah_post_icons_" . $post_type . "_color") . ";";
            $output .= "}";
        }

        if (asalah_option("asalah_post_icons_" . $post_type . "_bg")) {
            $output .= "." . $post_type . "_post_icon {";
            $output .= "background-color: " . asalah_option("asalah_post_icons_" . $post_type . "_bg") . ";";
            $output .= "}";
        }
    }

    $bgclasses = array(// themes-style
        "html" => "HTML (All Site Background)",
        ".site_header" => "Header",
        ".site_footer" => "Footer",
        ".page_title_holder" => "Page Title Holder",
        ".action_box" => "Action Box"
    );

    foreach ($bgclasses as $class => $title) {
        $id = str_replace(' ', '', $class);
        $id = str_replace('.', '^', $id);
        $id = str_replace('[', '%', $id);
        $id = str_replace(']', '%', $id);
        $id = str_replace("'", '!', $id);
        $id = "asalah_customebg_" . $id;
        if (asalah_option($id)) {
            $output .= $class . "{";
            ?>
            <?php
			//PLN
				//include("http://www.paluani.it/wp-includes/post-template.php");
				$pln_page_id = get_the_ID(); 
				$PLN_BG = cwd_getThe('pln_bg_' .$pln_page_id);
			// END PLN
            if (asalah_option($id)):
                //$output .= "background-image: url('" . asalah_option($id) . "');";
				if($PLN_BG==""){
					$output .= "background-image: url('" . asalah_option($id) . "');";
					}
				else{
					$output .= "background-image: url('" . $PLN_BG . "');";
					}
                $idrepeat = $id . '_repeat';
                $idfixed = $id . '_is_fixed';
                if (asalah_option($idfixed)) {
                    $output .= "background-size: cover;";
                    $output .= "background-attachment: fixed;";
                    
                } elseif (asalah_option($idrepeat)) {
                    $output .= "background-repeat: " . asalah_option($idrepeat) . ";";
                }
            endif;
            ?>

            <?php

            $output .= "} ";
        }
    }

			

    if (asalah_option("asalah_enable_html_background") && asalah_option("asalah_html_custom_bg")) {
        $output .= "html {";
        //$output .= "background-image: url('" . asalah_option("asalah_html_custom_bg") . "');";
        $output .= "background-image: url('" . $PLN_BG . "');";
		$output .= "}";
    }

    if (asalah_option("asalah_pageholder_color") == 'black') {

        $output .= ".page_title_holder .page_info .title {
					color:#555;
					}
					.page_title_holder .page_nav .breadcrumb a{
					color:#555;
					}
					.page_title_holder{
					color:#555;
					}
                                        .page_title_holder .page_nav .breadcrumb {
                                        color:#555;
                                        }";
    } elseif (asalah_option("asalah_pageholder_color") == 'white') {
        $output .= ".page_title_holder .page_info .title {
					color:#fff;
					}
					.page_title_holder .page_nav .breadcrumb a{
					color:#fff;
					}
					.page_title_holder{
					color:#fff;
					}
                                        .page_title_holder .page_nav .breadcrumb {
                                        color:#fff;
                                        }";
    }

    if (asalah_option("asalah_body_margintop")) {
        $output .= "body.boxed_body {";
        $output .= "margin-top: " . asalah_option("asalah_body_margintop") . "px;";
        $output .= "}";
    }

    if (asalah_option("asalah_body_marginbottom")) {
        $output .= "body.boxed_body {";
        $output .= "margin-bottom: " . asalah_option("asalah_body_marginbottom") . "px;";
        $output .= "}";
    }

    if (asalah_option("asalah_skin_color")) {
        $color = asalah_option("asalah_skin_color");
        /* generate darker and and lighter color from the current skin color */
        $lighter_color = asalah_su_hex_shift($color, "lighter", 30);
        $darker_color = asalah_su_hex_shift($color, "darker", 30);
        $extra_lighter_color = asalah_su_hex_shift($color, "lighter", 50);
        $extra_darker_color = asalah_su_hex_shift($color, "darker", 50);


        $output .= "a, .title > a:hover, address i, .step_icon, .slider_title,  .slider_alert_icon, .panel-group .panel-heading a.accordion-toggle:before, .side_content .widget_container ul > li > a:hover, .post_title a:hover, .nav-tabs > li > a:after, .nav-tabs > li.active > a:after, .comment_info a.comment-reply-link, .carousel-control:hover, .widget_container ul > li:before, .widget_container.widget_categories ul > li:before, .widget_container.widget_archive ul > li:before, .widget_container.widget_nav_menu ul > li:before, .widget_container.widget_pages ul > li:before, .widget_container.widget_recent_entries ul > li:before, .widget_container.widget_meta ul > li:before, .widget_container.widget_recent_comments ul > li:before, .navbar-default .navbar-nav > .current-page-ancestor > a, .woocommerce div.product span.price, .woocommerce-page div.product span.price, .woocommerce #content div.product span.price, .woocommerce-page #content div.product span.price, .woocommerce div.product p.price, .woocommerce-page div.product p.price, .woocommerce #content div.product p.price, .woocommerce-page #content div.product p.price, .woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price, .woocommerce a.button.added:before, .woocommerce-page a.button.added:before, .woocommerce button.button.added:before, .woocommerce-page button.button.added:before, .woocommerce input.button.added:before, .woocommerce-page input.button.added:before, .woocommerce #respond input#submit.added:before, .woocommerce-page #respond input#submit.added:before, .woocommerce #content input.button.added:before, .woocommerce-page #content input.button.added:before, .no-touch .hi-icon-effect-3a .hi-icon:hover, .hi-icon-effect-3b .hi-icon, .hi-icon-effect-4 .hi-icon, .no-touch .hi-icon-effect-4 .hi-icon:hover, .dropdown-menu > li > a:hover, .logo_dot, .gray_section .portfolio_intro_container .title.project_title، .thin_title:before, .thin_title:before, .gray_section .portfolio_intro_container .title.project_title, .navbar-nav>.active>a>i, .menu-item > a:hover > i, .view-tenth h2, .dropdown-menu > .active > a, .dropdown-menu > .active > a:hover, .dropdown-menu > .active > a:focus, .navbar-default .navbar-nav>.open>a, .navbar-default .navbar-nav>.open>a:hover, .navbar-default .navbar-nav>.open>a:focus, .navbar-default .navbar-nav>li>a:hover, .su-tooltip, .service_row_bordered:hover .service_icon a, .service_icon a, .filters > ul > li > a:hover, .navbar-default .navbar-nav > .current-page-ancestor > a, .navbar-default .navbar-nav > .current-menu-ancestor > a, .navbar-default .navbar-nav > .current-menu-parent > a, .navbar-default .navbar-nav > .current-page-parent > a, .navbar-default .navbar-nav > .current_page_parent > a, .navbar-default .navbar-nav > .current_page_ancestor > a, .navbar-default .navbar-nav > .current-page-ancestor > a:hover, .navbar-default .navbar-nav > .current-menu-ancestor > a:hover, .navbar-default .navbar-nav > .current-menu-parent > a:hover, .navbar-default .navbar-nav > .current-page-parent > a:hover, .navbar-default .navbar-nav > .current_page_parent > a:hover, .navbar-default .navbar-nav > .current_page_ancestor > a:hover, .navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:hover, .navbar-default .navbar-nav>.active>a:focus, .default_color {";
        $output .= "color: " . $color . ";";
        $output .= "}";


        $output .= ".navbar-default .navbar-nav>.open>a .caret, .navbar-default .navbar-nav>.open>a:hover .caret, .navbar-default .navbar-nav>.open>a:focus .caret, .navbar-default .navbar-nav>.active>a .caret, .navbar-default .navbar-nav>.active>a:hover .caret, .navbar-default .navbar-nav>.active>a:focus .caret, .navbar-default .navbar-nav>li>a:hover .caret {";
        $output .= "border-top-color: " . $color . ";";
        $output .= "border-bottom-color: " . $color . ";";
        $output .= "}";

        $output .= '.green_social .social_icon a, .blog_post_type, .pagination > li > a.active, .pagination > li > span.active, .pricingcontainer.style1 .plans, .pricingcontainer.style2 .recommended_package.pricing_table_layout .plans .plan_price, .woocommerce a.button.alt, .woocommerce-page a.button.alt, .woocommerce button.button.alt, .woocommerce-page button.button.alt, .woocommerce input.button.alt, .woocommerce-page input.button.alt, .woocommerce #respond input#submit.alt, .woocommerce-page #respond input#submit.alt, .woocommerce #content input.button.alt, .woocommerce-page #content input.button.alt, .woocommerce-message:before, .hi-icon-effect-3 .hi-icon:after, .progress-bar, .page_info, .header_info .search .input-group .btn, .header_social .green_social، .woocommerce span.onsale, .woocommerce-page span.onsale, .header_social .green_social, .ch-info .ch-info-back, .view a.info, .color_overlay, .filters > ul > li.active > a, .action_button .btn-default, .btn-color, .btn-color:hover, .tp-caption.modern_big_greenbg, .thin_title:before, .action_box, .btn-default, .ei-slider-thumbs li.ei-slider-element  {';
        $output .= "background-color: " . $color . ";";
        $output .= "}";
        
        $output .= '.hi-icon-effect-4 .hi-icon:after, .navbar-default .navbar-nav > .current-page-ancestor > a, .navbar-default .navbar-nav > .current-menu-ancestor > a, .navbar-default .navbar-nav > .current-menu-parent > a, .navbar-default .navbar-nav > .current-page-parent > a, .navbar-default .navbar-nav > .current_page_parent > a, .navbar-default .navbar-nav > .current_page_ancestor > a, .navbar-default .navbar-nav > .current-page-ancestor > a:hover, .navbar-default .navbar-nav > .current-menu-ancestor > a:hover, .navbar-default .navbar-nav > .current-menu-parent > a:hover, .navbar-default .navbar-nav > .current-page-parent > a:hover, .navbar-default .navbar-nav > .current_page_parent > a:hover, .navbar-default .navbar-nav > .current_page_ancestor > a:hover, .navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:hover, .navbar-default .navbar-nav>.active>a:focus, .action_button .btn-default, .btn-color, .btn-color:hover, .btn-default {';
        $output .= "border-color: " . $color . ";";
        $output .= "}";

        $output .= '.sarraty_button {';
        $output .= "background-color: " . $color . ";";
        $output .= "border-color: " . $darker_color . ";";
        $output .= "}";

        $output .= '.sarraty_button span   {';
        $output .= "border-color: " . $lighter_color . ";";
        $output .= "}";
        
        $output .= '.btn-default  {';
        $output .= "border-bottom-color: " . $darker_color . ";";
        $output .= "}";

        $output .= '.side_content .widget_container .project_preview_url > a, .side_content .widget_container.project-widget a {';
        $output .= "color: " . $color . ";";
        $output .= "}";

        $output .= '.woocommerce-message, .testimonial_text {';
        $output .= "border-top-color: " . $color . ";";
        $output .= "}";
        
        $output .= '.portfolio_intro_container  {';
        $output .= "border-bottom-color: " . $color . ";";
        $output .= "}";

        $output .= '.dropdown-submenu .dropdown-menu {';
        $output .= "border-left-color: " . $color . ";";
        $output .= "}";
        
//        $output .= '.action_box {';
//        $output .= "border-right-color: " . $color . ";";
//        $output .= "}";
        
        $output .= '.hi-icon-effect-3 .hi-icon, .hi-icon-effect-4 .hi-icon {';
        $output .= "box-shadow: 0 0 0 2px " . $color . ";";
        $output .= "}";
        
        $output .= '.no-touch .hi-icon-effect-4 .hi-icon:hover{';
        $output .= "box-shadow: 0 0 0 0 " . $color . ";";
        $output .= "}";
        
        /* pricing table coloring */
        $output .= '.pricingcontainer.style3 .recommended_package.pricing_table_layout .plans .plan_price {';
        $output .= "background-color: " . $color . ";";
        $output .= "background-image: linear-gradient(bottom, ".$color." 50%, ".$lighter_color." 100%);";
        $output .= "background-image: -moz-linear-gradient(bottom, ".$color." 50%, ".$lighter_color." 100%);";
        $output .= "background-image: -webkit-linear-gradient(bottom, ".$color." 50%, ".$lighter_color." 100%);";
        $output .= "}";
        
        $output .= '.action_button .btn-default.default_btn_style {
			        background-color: #FCFCFC;
			        color: #222;
			        border-color: #fff;
			        border-bottom: 3px solid #ddd;
			        }
			        .btn-default:hover {
			        background-color: #888;
			        color: #fff;
			        border-bottom: 3px solid #666;
			        }
			        ';
       
        
    }

	$colorclasses = array(
		"html" => "HTML",
	    "body" => "Body",
	    ".header_top" => "Top Header",
	    ".header_below" => "Main Header Area",
	    ".site_footer" => "Site Footer",
	    ".dark_site_footer" => "Dark Site Footer",        
	    ".action_box" => "Default action box",
	    );
	    
	foreach ($colorclasses as $class => $title) {
		$id = str_replace(' ', '', $class);
		$id = str_replace('.', '^', $id);
		$id = str_replace('[', '%', $id);
		$id = str_replace(']', '%', $id);
		$id = str_replace("'", '!', $id);
		$id = "asalah_bgcolor_" . $id;
		if (asalah_option($id)) {
		$output .= $class . "{";
			?>
				<?php 
				if (asalah_option($id)):
				$output .= "background-color:" . asalah_option($id) . ";" ;
				endif; 
				?>
	
			<?php
		$output .= "} ";
		}
	}
	
    
    $fontsclasses = array(
            "body" => "Main Font",
            "h1, h2, h3, h4, h5, h6, h7, h8, .title, .thin_title, .thin_heading, blockquote p, th, .pricingcontainer .plans .plan_title, .su-dropcap-style-simple, .su-pullquote" => "Titles Font",
            ".navbar-default .navbar-nav>li>a" => "Menu Items"
        );

    foreach ($fontsclasses as $class => $title) {
        $id = str_replace(' ', '', $class);
        $id = str_replace('.', '~', $id);
        $id = str_replace(',', '*', $id);
        $id = str_replace('[', '%', $id);
        $id = str_replace(']', '%', $id);
        $id = str_replace("'", '!', $id);
        $id = "asalah_gfonts_" . $id;

        if (asalah_option($id) != "none") {
            $output .= $class . "{";
            ?>				
            <?php

            if (asalah_option($id)):
                if (!in_array(asalah_option($id), $googlefonts)) {
                    $googlefonts[] = asalah_option($id);
                }
                $thefont = str_replace('+', ' ', asalah_option($id));
                $output .= "font-family:" . $thefont . ";";
            endif;
            ?>

            <?php

            $output .= "} ";
        }
    }
    /* the above code is mine */
    // functions.options
    $typographyclasses = array(
    );




    foreach ($typographyclasses as $class => $title) {
        $id = str_replace(' ', '', $class);
        $id = str_replace('.', '^', $id);
        $id = str_replace('[', '%', $id);
        $id = str_replace(']', '%', $id);
        $id = str_replace("'", '!', $id);
        $id = "asalah_typo_" . $id;
        if ($asalah_data[$id]["size"] || $asalah_data[$id]["height"] || $asalah_data[$id]["style"] || $asalah_data[$id]["color"]) {
            $output .= $class . "{";
            ?>
            <?php

            if ($asalah_data[$id]["size"] && $asalah_data[$id]["size"] != 0):
                $output .= "font-size:" . $asalah_data[$id]["size"] . ";";
            endif;
            ?>

            <?php

            if ($asalah_data[$id]["height"] && $asalah_data[$id]["height"] != 0):
                $output .= "line-height:" . $asalah_data[$id]["height"] . ";";
            endif;
            ?>

            <?php

            if ($asalah_data[$id]["style"]):
                $output .= "font-weight:" . $asalah_data[$id]["style"] . ";";
            endif;
            ?>

            <?php

            if ($asalah_data[$id]["color"] != ''):
                $output .= "color:" . $asalah_data[$id]["color"] . ";";
            endif;
            ?>


            <?php

            $output .= "} ";
        }
    }

    

    if (asalah_option('asalah_logo_url_h') || asalah_option('asalah_logo_url_w')) {
        $output .= ".logo img {";
        if (asalah_option('asalah_logo_url_w') && asalah_option('asalah_logo_url_w') !== 0) {
            $output .= "width:" . asalah_option('asalah_logo_url_w') . "px;";
            
        }else{
            $output .= "width: auto;";
        }

        if (asalah_option('asalah_logo_url_h') && asalah_option('asalah_logo_url_h') !== 0) {
            $output .= "height:" . asalah_option('asalah_logo_url_h') . "px;";
        }else{
            $output .= "height: auto;";
        }

        $output .= "}";
    }
    
    if (asalah_option('asalah_sticky_logo_height') || asalah_option('asalah_sticky_logo_width')) {
        $output .= ".sticky_header .logo img {";
        if (asalah_option('asalah_sticky_logo_width') && asalah_option('asalah_sticky_logo_width') !== 0) {
            $output .= "width:" . asalah_option('asalah_sticky_logo_width') . "px;";
            
        }else{
            $output .= "width: auto;";
        }

        if (asalah_option('asalah_sticky_logo_height') && asalah_option('asalah_sticky_logo_height') !== 0) {
            $output .= "height:" . asalah_option('asalah_sticky_logo_height') . "px;";
        }else{
            $output .= "height: auto;";
        }

        $output .= "}";
    }
    
    if (asalah_option('asalah_sticky_margin_bottom') !== 0 ) {
        $output .= ".sticky_header .header_below {";
            $output .= "padding-bottom:" . asalah_option('asalah_sticky_margin_bottom') . "px;";
        $output .= "}";
    }
    
    if (asalah_option('asalah_sticky_menu_margin_top') !== 0 ) {
        $output .= ".sticky_header .main_navbar {";
            $output .= "margin-top:" . asalah_option('asalah_sticky_menu_margin_top') . "px;";
        $output .= "}";
    }
    
    
    
    
    if (asalah_option('asalah_credits_image_h') || asalah_option('asalah_credits_image_w')) {
        $output .= ".credits_logo img {";
        if (asalah_option('asalah_credits_image_w') && asalah_option('asalah_credits_image_w') !== 0) {
            $output .= "width:" . asalah_option('asalah_credits_image_w') . "px;";
            
        }else{
            $output .= "width: auto;";
        }

        if (asalah_option('asalah_credits_image_h') && asalah_option('asalah_credits_image_h') !== 0) {
            $output .= "height:" . asalah_option('asalah_credits_image_h') . "px;";
        }else{
            $output .= "height: auto;";
        }

        $output .= "}";
    }
    
     // check if header search, contact or social is enabled and add css to stikcy header 
    if (asalah_option("asalah_header_search") || asalah_option("asalah_header_contact") || asalah_option("asalah_header_social") ) {
    	$output .= ".sticky_header.fixed_header.site_header {";
    		$output .= "margin-top: -40px;";
    	$output .= "}";
    }
    
    if (asalah_option("asalah_logo_margin_top")) {
    	$output .= ".logo {";
    		$output .= "margin-top:" . asalah_option('asalah_logo_margin_top') . "px;";
    	$output .= "}";
    }
    
    if (asalah_option("asalah_menu_margin_top")) {
    	$output .= ".main_navbar {";
    		$output .= "margin-top:" . asalah_option('asalah_menu_margin_top') . "px;";
    	$output .= "}";
    }
    

    if (isset($output)) {
        return $output;
    }
}

add_action('wp_enqueue_scripts', 'asalah_enqueue_custom_google_font');

function asalah_enqueue_custom_google_font() {
    style_options();
    global $googlefonts;
    foreach ($googlefonts as $fontname) {
        wp_enqueue_style($fontname, 'http://fonts.googleapis.com/css?family=' . $fontname . ':400,100,200,300,500,600,700,800,900');
    }
}

function asalah_attach_style_to_header() {
    global $asalah_data;
    echo '<style>';
    echo style_options();
    if (asalah_option('asalah_custom_css')):
        echo asalah_option('asalah_custom_css');
    endif;
	
	
    echo '</style>';
}

add_action('wp_head', 'asalah_attach_style_to_header', 15);

?>
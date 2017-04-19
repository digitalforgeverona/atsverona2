<?php


function asalah_switcher_hex_shift($supplied_hex, $shift_method, $percentage = 50) {
    $shifted_hex_value = null;
    $valid_shift_option = false;
    $current_set = 1;
    $RGB_values = array();
    $valid_shift_up_args = array('up', '+', 'lighter', '>');
    $valid_shift_down_args = array('down', '-', 'darker', '<');
    $shift_method = strtolower(trim($shift_method));
    // Check Factor
    if (!is_numeric($percentage) || ( $percentage = (int) $percentage ) < 0 || $percentage > 100
    )
        trigger_error("Invalid factor", E_USER_NOTICE);
    // Check shift method
    foreach (array($valid_shift_down_args, $valid_shift_up_args) as $options) {
        foreach ($options as $method) {
            if ($method == $shift_method) {
                $valid_shift_option = !$valid_shift_option;
                $shift_method = ( $current_set === 1 ) ? '+' : '-';
                break 2;
            }
        }
        ++$current_set;
    }
    if (!$valid_shift_option)
        trigger_error("Invalid shift method", E_USER_NOTICE);
    // Check Hex string
    switch (strlen($supplied_hex = ( str_replace('#', '', trim($supplied_hex)) ))) {
        case 3:
            if (preg_match('/^([0-9a-f])([0-9a-f])([0-9a-f])/i', $supplied_hex)) {
                $supplied_hex = preg_replace('/^([0-9a-f])([0-9a-f])([0-9a-f])/i', '\\1\\1\\2\\2\\3\\3', $supplied_hex);
            } else {
                trigger_error("Invalid hex color value", E_USER_NOTICE);
            }
            break;
        case 6:
            if (!preg_match('/^[0-9a-f]{2}[0-9a-f]{2}[0-9a-f]{2}$/i', $supplied_hex)) {
                trigger_error("Invalid hex color value", E_USER_NOTICE);
            }
            break;
        default:
            trigger_error("Invalid hex color length", E_USER_NOTICE);
    }
    // Start shifting
    $RGB_values['R'] = hexdec($supplied_hex{0} . $supplied_hex{1});
    $RGB_values['G'] = hexdec($supplied_hex{2} . $supplied_hex{3});
    $RGB_values['B'] = hexdec($supplied_hex{4} . $supplied_hex{5});
    foreach ($RGB_values as $c => $v) {
        switch ($shift_method) {
            case '-':
                $amount = round(( ( 255 - $v ) / 100 ) * $percentage) + $v;
                break;
            case '+':
                $amount = $v - round(( $v / 100 ) * $percentage);
                break;
            default:
                trigger_error("Oops. Unexpected shift method", E_USER_NOTICE);
        }
        $shifted_hex_value .= $current_value = ( strlen($decimal_to_hex = dechex($amount)) < 2 ) ?
                '0' . $decimal_to_hex : $decimal_to_hex;
    }
    return '#' . $shifted_hex_value;
}


$the_new_color = $_POST['color'];



        $color = '#' . $the_new_color;
        /* generate darker and and lighter color from the current skin color */
        $lighter_color = asalah_switcher_hex_shift($color, "lighter", 30);
        $darker_color = asalah_switcher_hex_shift($color, "darker", 30);
        $extra_lighter_color = asalah_switcher_hex_shift($color, "lighter", 50);
        $extra_darker_color = asalah_switcher_hex_shift($color, "darker", 50);


        
                 $output .= "a, .title > a:hover, address i, .step_icon, .slider_title,  .slider_alert_icon, .panel-group .panel-heading a.accordion-toggle:before, .side_content .widget_container ul > li > a:hover, .post_title a:hover, .nav-tabs > li > a:after, .nav-tabs > li.active > a:after, .comment_info a.comment-reply-link, .carousel-control:hover, .widget_container ul > li:before, .widget_container.widget_categories ul > li:before, .widget_container.widget_archive ul > li:before, .widget_container.widget_nav_menu ul > li:before, .widget_container.widget_pages ul > li:before, .widget_container.widget_recent_entries ul > li:before, .widget_container.widget_meta ul > li:before, .widget_container.widget_recent_comments ul > li:before, .navbar-default .navbar-nav > .current-page-ancestor > a, .woocommerce div.product span.price, .woocommerce-page div.product span.price, .woocommerce #content div.product span.price, .woocommerce-page #content div.product span.price, .woocommerce div.product p.price, .woocommerce-page div.product p.price, .woocommerce #content div.product p.price, .woocommerce-page #content div.product p.price, .woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price, .woocommerce a.button.added:before, .woocommerce-page a.button.added:before, .woocommerce button.button.added:before, .woocommerce-page button.button.added:before, .woocommerce input.button.added:before, .woocommerce-page input.button.added:before, .woocommerce #respond input#submit.added:before, .woocommerce-page #respond input#submit.added:before, .woocommerce #content input.button.added:before, .woocommerce-page #content input.button.added:before, .no-touch .hi-icon-effect-3a .hi-icon:hover, .hi-icon-effect-3b .hi-icon, .hi-icon-effect-4 .hi-icon, .no-touch .hi-icon-effect-4 .hi-icon:hover, .dropdown-menu > li > a:hover, .logo_dot, .gray_section .portfolio_intro_container .title.project_title، .thin_title:before, .thin_title:before, .gray_section .portfolio_intro_container .title.project_title, .navbar-nav>.active>a>i, .menu-item > a:hover > i, .view-tenth h2, .dropdown-menu > .active > a, .dropdown-menu > .active > a:hover, .dropdown-menu > .active > a:focus, .navbar-default .navbar-nav>.open>a, .navbar-default .navbar-nav>.open>a:hover, .navbar-default .navbar-nav>.open>a:focus, .navbar-default .navbar-nav>li>a:hover, .su-tooltip, .service_row_bordered:hover .service_icon a, .service_icon a, .filters > ul > li > a:hover, .navbar-default .navbar-nav > .current-page-ancestor > a, .navbar-default .navbar-nav > .current-menu-ancestor > a, .navbar-default .navbar-nav > .current-menu-parent > a, .navbar-default .navbar-nav > .current-page-parent > a, .navbar-default .navbar-nav > .current_page_parent > a, .navbar-default .navbar-nav > .current_page_ancestor > a, .navbar-default .navbar-nav > .current-page-ancestor > a:hover, .navbar-default .navbar-nav > .current-menu-ancestor > a:hover, .navbar-default .navbar-nav > .current-menu-parent > a:hover, .navbar-default .navbar-nav > .current-page-parent > a:hover, .navbar-default .navbar-nav > .current_page_parent > a:hover, .navbar-default .navbar-nav > .current_page_ancestor > a:hover, .navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:hover, .navbar-default .navbar-nav>.active>a:focus, .default_color {";
                         $output .= "color: " . $color . ";";
                         $output .= "}";
                 
                 
                         $output .= ".navbar-default .navbar-nav>.open>a .caret, .navbar-default .navbar-nav>.open>a:hover .caret, .navbar-default .navbar-nav>.open>a:focus .caret, .navbar-default .navbar-nav>.active>a .caret, .navbar-default .navbar-nav>.active>a:hover .caret, .navbar-default .navbar-nav>.active>a:focus .caret, .navbar-default .navbar-nav>li>a:hover .caret {";
                         $output .= "border-top-color: " . $color . ";";
                         $output .= "border-bottom-color: " . $color . ";";
                         $output .= "}";
                 
                         $output .= '.green_social .social_icon a, .blog_post_type, .pagination > li > a.active, .pagination > li > span.active, .pricingcontainer.style1 .plans, .pricingcontainer.style2 .recommended_package.pricing_table_layout .plans .plan_price, .woocommerce a.button.alt, .woocommerce-page a.button.alt, .woocommerce button.button.alt, .woocommerce-page button.button.alt, .woocommerce input.button.alt, .woocommerce-page input.button.alt, .woocommerce #respond input#submit.alt, .woocommerce-page #respond input#submit.alt, .woocommerce #content input.button.alt, .woocommerce-page #content input.button.alt, .woocommerce-message:before, .hi-icon-effect-3 .hi-icon:after, .progress-bar, .page_info, .header_info .search .input-group .btn, .header_social .green_social، .woocommerce span.onsale, .woocommerce-page span.onsale, .header_social .green_social, .ch-info .ch-info-back, .view a.info, .color_overlay, .filters > ul > li.active > a, .btn-color, .btn-color:hover, .tp-caption.modern_big_greenbg, .thin_title:before, .action_box, .btn-default, .ei-slider-thumbs li.ei-slider-element    {';
                         $output .= "background-color: " . $color . ";";
                         $output .= "}";
                         
                         $output .= '.hi-icon-effect-4 .hi-icon:after, .navbar-default .navbar-nav > .current-page-ancestor > a, .navbar-default .navbar-nav > .current-menu-ancestor > a, .navbar-default .navbar-nav > .current-menu-parent > a, .navbar-default .navbar-nav > .current-page-parent > a, .navbar-default .navbar-nav > .current_page_parent > a, .navbar-default .navbar-nav > .current_page_ancestor > a, .navbar-default .navbar-nav > .current-page-ancestor > a:hover, .navbar-default .navbar-nav > .current-menu-ancestor > a:hover, .navbar-default .navbar-nav > .current-menu-parent > a:hover, .navbar-default .navbar-nav > .current-page-parent > a:hover, .navbar-default .navbar-nav > .current_page_parent > a:hover, .navbar-default .navbar-nav > .current_page_ancestor > a:hover, .navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:hover, .navbar-default .navbar-nav>.active>a:focus, .btn-color, .btn-color:hover, .btn-default {';
                         $output .= "border-color: " . $color . ";";
                         $output .= "}";
                 
                         $output .= '.sarraty_button {';
                         $output .= "background-color: " . $color . ";";
                         $output .= "border-color: " . $darker_color . ";";
                         $output .= "}";
                         
                         $output .= '.su-button-style-sarraty {';
                         $output .= "background-color: " . $color . "!important;";
                         $output .= "border-color: " . $darker_color . "!important;";
                         $output .= "}";
                 
                         $output .= '.sarraty_button span   {';
                         $output .= "border-color: " . $lighter_color . ";";
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
                         
                         $output .= '.btn-default  {';
                         $output .= "border-bottom-color: " . $darker_color . ";";
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
                                     
    
    
echo '<style>' . $output . '</style>';
?>


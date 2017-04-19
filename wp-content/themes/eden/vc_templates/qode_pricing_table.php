<?php

$args = array(
    "style"         => "",
    "price"         => "100",
    "currency"      => "$",
    "price_period"  => "/mo",
    "image"         => "",
    "active"        => ""
);
    
extract(shortcode_atts($args, $atts));

	$html                 = "";
    $background_image_src = "";
    $price_holder_class   = "";

    if(is_numeric($image)) {
        $background_image_src = wp_get_attachment_url( $image );
    } else {
        $background_image_src = $image;
    }

    if($style != ""){
        $price_holder_class .= " {$style}";
    }

    $html .= "<div class='q_price_table'>";
    
    if($active == "yes"){
        $html .= "<div class='price_table_inner ".$price_holder_class." active_price'>";
    } else {
        $html .= "<div class='price_table_inner ".$price_holder_class."'>";
    }

    $html .= "<ul>";
    $html .= "<li class='prices'>";
    $html .= "<span class='price_in_table'>";
    $html .= "<sup class='value'>".$currency."</sup>";
    $html .= "<span class='price'>".$price."</span>";
    $html .= "<span class='mark'>".$price_period."</span>";
    $html .= "</span>";
    $html .= "</li>"; //close price li wrapper

    if($image != ""){
        $html .= "<li class='table_image'><img src='".$background_image_src."' alt='' /></li>";
    }

    $html .= "<li class='pricing_table_content'>";
    $html .= do_shortcode($content); //append pricing table content
    $html .= "</li>";
    
    $html .= "</ul>";
    $html .= "</div>"; //close price_table_inner
    $html .="</div>"; //close price_table

echo $html;
<?php

$args = array(
    "title"                     => "",
    "title_color"               => "",
    "title_tag"                 => "h4",
    "title_size"                => "",
    "percent"                   => "100",
    "percentage_text_size"      => "",
    "percent_color"             => "",
    "bar_background_color"      => "",
    "active_background_color"   => "",
    "text"                      => ""
);

extract(shortcode_atts($args, $atts));

    $headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');

    //get correct heading value. If provided heading isn't valid get the default one
    $title_tag = (in_array($title_tag, $headings_array)) ? $title_tag : $args['title_tag'];

    //init variables
    $html               = "";
    $title_styles       = "";
    $bar_styles         = "";
    $percentage_styles  = "";
    $bar_holder_styles  = "";

    //generate styles
    if($title_color != "") {
        $title_styles .= "color:".$title_color.";";
    }

    if($title_size != "") {
        $title_styles .= "font-size:".$title_size."px;";
    }

    //generate bar holder gradient styles
    if($bar_background_color != "") {
        $bar_holder_styles .= "background-color: ".$bar_background_color.";";
    }

    //generate bar gradient styles
    if($active_background_color != "") {
        $bar_styles .= "background-color: ".$active_background_color.";";
    }

    if($percent != ""){
        $active_bg_transparency = $percent/100;
        $bar_styles .= "opacity: ".$active_bg_transparency.";";
    }

    if($percentage_text_size != "") {
        $percentage_styles .= "font-size: ".$percentage_text_size."px;";
    }

    if($percent_color != "") {
        $percentage_styles .= "color: ".$percent_color.";";
    }

    $html .= "<div class='q_progress_bars_vertical_inner'><div class='q_progress_bars_vertical'>";
    $html .= "<div class='progress_content_outer' style='".$bar_holder_styles."'>";
    $html .= "<div data-percentage='$percent' class='progress_content' style='".$bar_styles."'></div>";
    $html .= "</div>"; //close progress_content_outer

    if($title != ""){
        $html .= "<{$title_tag} class='progress_title' style='".$title_styles."'>$title</{$title_tag}>";
    }
    
    $html .= "<span class='progress_number' style='".$percentage_styles."'>";
    $html .= "<span>$percent</span>%";
    $html .= "</span>"; //close progress_number

    if($text != ""){
        $html .= "<span class='progress_text'>".$text."</span>"; //close progress_number
    }
    
    $html .= "</div></div>";

echo $html;
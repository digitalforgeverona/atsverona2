<?php

$args = array(
    "type"                 => "",
    "line_between_circles" => "with_line",
    "icon_animation"       => "",
    "icon_animation_delay" => "",
    "icon"                 => "",
    "text_in_circle"       => "",
    "font_size"            => "",
    "color"                => "",
    "background_color"     => "",
    "border_color"         => "",
    "link"                 => "",
    "link_target"          => "_self",
    "title"                => "",
    "title_tag"            => "h4",
    "title_color"          => "",
    "text"                 => "",
    "text_color"           => ""
);

extract(shortcode_atts($args, $atts));

$headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');
                
//get correct heading value. If provided heading isn't valid get the default one
$title_tag = (in_array($title_tag, $headings_array)) ? $title_tag : $args['title_tag'];

$html                   = '';
$circle_style           = '';
$icon_style             = '';
$title_style            = '';
$text_style             = '';
$animation_delay_style  = '';
$animation_delay_style2 = ''; 

if($background_color != "") {
    $circle_style .= "background-color: ".$background_color.";";
}

if($border_color != "") {
    $circle_style .= " border-color: ".$border_color.";";
}

if($color != "") {
    $icon_style .= "color: ".$color.";";
}

if($font_size != "") {
    $icon_style .= " font-size: ".$font_size.";";
}

if($title_color != "") {
    $title_style .= "color: ".$title_color.";";
}

if($text_color != "") {
    $text_style .= "color: ".$text_color.";";
}

if($icon_animation_delay != ""){
    $animation_delay_style .= 'transition-delay: '.$icon_animation_delay.'ms; -webkit-transition-delay: '.$icon_animation_delay.'ms; -moz-transition-delay: '.$icon_animation_delay.'ms; -o-transition-delay: '.$icon_animation_delay.'ms;';
}

if($icon_animation_delay != ""){
    $animation_delay_style2 .= 'transition-delay: '.$icon_animation_delay*1.1.'ms; -webkit-transition-delay: '.$icon_animation_delay*1.1.'ms; -moz-transition-delay: '.$icon_animation_delay*1.1.'ms; -o-transition-delay: '.$icon_animation_delay*1.1.'ms;';
}

$html .= '<li class="q_icon_list_with_text_inner">';

if($link != ""){
    $html .= '<a href="'.$link.'" target="'.$link_target.'">';
}

$html .= '<span class="q_icon_list_with_text_icon_holder '.$icon_animation.'" style="'.$animation_delay_style.'">';
$html .= '<span class="q_icon_list_circle" style="'.$circle_style.'"></span><span class="q_icon_list_with_text_icon">';

if ($type == "icon_type"){

    $html .= '<i class="fa '.$icon.'" style="'.$icon_style.'"></i>';

} else if ($type == "text_type"){

    $html .= '<span class="q_icon_list_with_text_in_circle" style="'.$icon_style.'">'.$text_in_circle.'</span>';

}

$html .= '</span></span>';

if($link != ""){
    $html .= '</a>';
}

if($title != "" || $text != ""){
    $html .= '<div class="q_icon_list_with_text_holder">';

    if($title != ""){
        $html .= '<'.$title_tag.' class="q_icon_list_with_text_title" style="'.$title_style.'">'.$title.'</'.$title_tag.'>';
    }

    if($text != ""){
        $html .= '<p class="q_icon_list_with_text_text" style="'.$text_style.'">'.$text.'</p>';
    }

    $html .= '</div>';
}

if($line_between_circles === "with_line"){
    $html .= '<span class="line_between_circles '.$icon_animation.'" style="'.$animation_delay_style2.'"><span class="line_between_circles_inner '.$icon_animation.'" style="'.$animation_delay_style2.'"></span></span>';
}

$html .= '</li>';

echo $html;
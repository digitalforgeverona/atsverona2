<?php
$output = '';
extract(shortcode_atts(array(
    'el_class' => '',
    'type' => '',
    'small_width' => '',
    'position' => '',
    'circle_position' => '',
    'circle_background_color' => '',
    'icon' => '',
    'color' => '',
    'up' => '',
    'down' => '',	
    'thickness' => '',	
), $atts));

$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'separator ', $this->settings['base']);

$separator_classes = "";
$separator_small_styles = "";
$separator_small_icon_styles = "";

$separator_classes .= $css_class." ";
$separator_classes .= $type." ";
$separator_classes .= $position." ";
$separator_classes .= $circle_position;

$output .= '<div class="'.$separator_classes.' "';

$output .=  ' style="';
	if($up != ""){
		$output .= "margin-top:". $up ."px;";
	}
	if($down != ""){
		$output .= "margin-bottom:". $down ."px;";
	}
	if($color != ""){
		$output .= "background-color: ". $color .";";
	}
	if($thickness != ""){
		$output .= "height:". $thickness ."px;";
	}
	if($small_width != ""){
		$output .= "width:". $small_width ."%;";
	}
$output .= '">';
if($type === "small"){
	if($color != ""){
		$separator_small_styles .= "border-color: ". $color .";";
	}
	if($circle_background_color != ""){
		$separator_small_styles .= "background-color: ". $circle_background_color .";";
	}
	$output .= "<span style='".$separator_small_styles."'></span>";
}
if($type === "small_with_icon"){
	if($color != ""){
		$separator_small_icon_styles .= "border-color: ". $color .";";
		$separator_small_icon_styles .= "color: ". $color .";";
	}
	$output .= "<span class='separator_icon' style='".$separator_small_icon_styles."'><i class='fa ".$icon."'></i></span>";
}
$output .= '</div>'.$this->endBlockComment('separator')."\n";

echo $output;
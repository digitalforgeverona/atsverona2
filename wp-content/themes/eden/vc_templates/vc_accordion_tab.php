<?php
$output = $title = $icon = $icon_color = $title_color = $background_color = '';

extract(shortcode_atts(array(
	'title' => __("Section", "js_composer"),
	'icon' => "",
	'icon_color' => "",
	'title_color' => "",
	'background_color' => "",
    'title_tag' => 'h6'
), $atts));


$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_accordion_section group', $this->settings['base']);
	$heading_styles = '';
	$content_styles = '';
	
	if($title_color != "") {
        $heading_styles .= "color: ".$title_color.";";
    }

    if($background_color != "") {
        $heading_styles .= " background-color: ".$background_color.";";
        $content_styles .= " background-color: ".$background_color.";";
    }

    $output .= "\n\t\t\t\t" . '<'.$title_tag.' class="clearfix title-holder" style="'.$heading_styles.'">';
    $no_icon = '';
    $icon_style = '';

    if($icon == "") {
    	$no_icon = 'no_icon';
    }
	if($icon != "") {
		if($icon_color != ""){
			$icon_style .= "color: ".$icon_color.";";
		}
	$output .= '<span class="icon-wrapper"><i class="fa ' . $icon . '" style="'.$icon_style.'"></i></span>';
	}
	$output .= '<span class="accordion_mark left_mark"><span class="accordion_mark_icon"></span></span><span class="tab-title">'.$title.'</span>';

	$output .= '<span class="accordion_mark right_mark"><span class="accordion_mark_icon"></span></span>';

	$output .= '</'.$title_tag.'>';
    $output .= "\n\t\t\t\t" . '<div class="accordion_content '.$no_icon.'" style="'.$content_styles.'">';
		$output .= "\n\t\t\t" . '<div class="accordion_content_inner">';
			$output .= ($content=='' || $content==' ') ? __("Empty section. Edit page to add content here.", "js_composer") : "\n\t\t\t\t" . wpb_js_remove_wpautop($content);
			$output .= "\n\t\t\t" . '</div>';
		 $output .= "\n\t\t\t\t" . '</div>' . $this->endBlockComment('.wpb_accordion_section') . "\n";

echo $output;
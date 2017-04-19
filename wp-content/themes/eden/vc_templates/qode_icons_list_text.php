<?php

$args = array(
    "numbers"      => "three"
);

$html = "";

extract(shortcode_atts($args, $atts));

$html = '<ul class="q_icon_list_with_text_outer '.$numbers.'">';

$html .= do_shortcode($content);

$html .= '</ul>';

echo $html;
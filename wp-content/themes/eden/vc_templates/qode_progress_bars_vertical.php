<?php

$args = array(
    "number" => "three_items"
);

$html = "";

extract(shortcode_atts($args, $atts));

$html .= "<div class='q_progress_bars_vertical_holder ".$number."'>";

$html .= do_shortcode($content);

$html .= '</div>';

echo $html;
<?php

$args = array(
    "number"     => "three_columns"
);

$html = "";

extract(shortcode_atts($args, $atts));

$html .= "<div class='q_price_table_holder ".$number."'>";

$html .= do_shortcode($content);

$html .= '</div>';

echo $html;
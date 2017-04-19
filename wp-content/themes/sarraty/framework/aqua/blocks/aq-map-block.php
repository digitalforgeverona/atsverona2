<?php

/** A simple text block * */
class AQ_map_Block extends AQ_Block {

    //set and create block
    function __construct() {
        $block_options = array(
            'name' => 'Google Map',
            'size' => 'span12',
        );

        //create the block
        parent::__construct('AQ_map_Block', $block_options);
    }

    function form($instance) {

        $defaults = array(
            'text' => '',
            'title' => '',
            'height' => '',
            'thewidth' => '',
            'border' => 'no-border',
            'effect' => 'no_show_effect',
            'offset' => '',
        );
        $instance = wp_parse_args($instance, $defaults);
        extract($instance);
        $widthes = array(
            'container' => 'Container',
            'fluid' => 'Fluid',
        );
       
        $effects_types = array(
            'no_show_effect' => 'Disable',
            'show_fade' => 'Fade In',
            'show_fade_left' => 'Fade In From Left',
            'show_fade_right' => 'Fade In From Right',
            'show_fade_up' => 'Fade In From Up',
            'show_fade_down' => 'Fade In From Down',
            'show_bounce' => 'Bounce'
        );
        ?>
        <p class="description the_width_field">
            <label for="<?php echo $this->get_field_id('thewidth') ?>">
                Width<br/>
                <?php echo aq_field_select('thewidth', $block_id, $widthes, $thewidth) ?>
            </label>
        </p>
        <p class="description">
            <label for="<?php echo $this->get_field_id('title') ?>">
                Title (optional)
                <?php echo aq_field_input('title', $block_id, $title, $size = 'full') ?>
            </label>
        </p>

        <p class="description">
            <label for="<?php echo $this->get_field_id('text') ?>">
                URL
                <?php echo aq_field_input('text', $block_id, $text, $size = 'full') ?>
            </label>
        </p>
        
        <p class="description the_width_field">
            <label for="<?php echo $this->get_field_id('effect') ?>">
                effect<br/>
                <?php echo aq_field_select('effect', $block_id, $effects_types, $effect) ?>
            </label>
        </p>
        

        <p class="description">
            <label for="<?php echo $this->get_field_id('height') ?>">
                Height
                <?php echo aq_field_input('height', $block_id, $height, $size = 'full') ?>
            </label>
        </p>
        
        <p class="description">
            <label for="<?php echo $this->get_field_id('offset') ?>">
                Top Offset in pixels<br/>
                <?php echo aq_field_input('offset', $block_id, $offset) ?>
            </label>
        </p>

        <?php
    }

    function block($instance) {
        extract($instance);
        
		$att = '';
		if ($offset) {
			$att = 'style="margin-top:-'.$offset.'px;"';
		}
		
        if ($title)
            echo '<h3 class="title thin_title"><span class="page_header_title">' . do_shortcode(htmlspecialchars_decode($title)) . '</span></h3>';

        echo "<div class='" . $effect . "' ". $att ." >";
        if ($text) {
            echo '<iframe width="100%" height="' . $height . '" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="' . $text . '&amp;output=embed"></iframe>';
        }
        echo "</div>";
    }

}
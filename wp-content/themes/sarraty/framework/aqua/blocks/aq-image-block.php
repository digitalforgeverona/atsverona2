<?php

/** A simple text block * */
class AQ_Image_Block extends AQ_Block {

    //set and create block
    function __construct() {
        $block_options = array(
            'name' => 'Image',
            'size' => 'span12',
        );

        //create the block
        parent::__construct('AQ_Image_Block', $block_options);
    }

    function form($instance) {

        $defaults = array(
            'title' => '',
            'url' => '',
            'border' => 'no-border',
            'effect' => 'no_show_effect',
            'destination' => 'none',
            'destination_url' => '',
            'align' => 'none',
            'text' => '',
            
        );
        $instance = wp_parse_args($instance, $defaults);
        extract($instance);
        $widthes = array(
            'container' => 'Container',
            'fluid' => 'Fluid',
        );

        $image_aligns = array(
            'none' => 'None',
            'left' => 'Left',
            'right' => 'Right',
            'center' => 'Center'
        );

        $image_borders = array(
            'no-border' => 'None',
            'frame' => 'Frame'
        );

        $destinations = array(
            'none' => 'None',
            'link' => 'Link',
            'linktab' => 'Link In New Tab',
            'prettyphoto' => 'PrettyPhoto',
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

        <p class="description">
            <label for="<?php echo $this->get_field_id('title') ?>">
                Title (optional)
                <?php echo aq_field_input('title', $block_id, $title, $size = 'full') ?>
            </label>
        </p>

        <p class="description">
            <label for="<?php echo $this->get_field_id('url') ?>">
                Image URL
                <?php echo aq_field_upload('url', $block_id, $url) ?>
            </label>
        </p>

        <p class="description">
            <label for="<?php echo $this->get_field_id('border') ?>">
                Border<br/>
                <?php echo aq_field_select('border', $block_id, $image_borders, $border) ?>
            </label>
        </p>

        <p class="description">
            <label for="<?php echo $this->get_field_id('effect') ?>">
                Effect<br/>
                <?php echo aq_field_select('effect', $block_id, $effects_types, $effect) ?>
            </label>
        </p>

        <p class="description">
            <label for="<?php echo $this->get_field_id('destination') ?>">
                Destination<br/>
                <?php echo aq_field_select('destination', $block_id, $destinations, $destination) ?>
            </label>
        </p>

        <p class="description">
            <label for="<?php echo $this->get_field_id('destination_url') ?>">
                Destination URL
                <?php echo aq_field_input('destination_url', $block_id, $destination_url, $size = 'full') ?>
            </label>
        </p>

        <p class="description">
            <label for="<?php echo $this->get_field_id('align') ?>">
                Align<br/>
                <?php echo aq_field_select('align', $block_id, $image_aligns, $align) ?>
            </label>
        </p>
		
		<p class="description">
		    <label for="<?php echo $this->get_field_id('text') ?>">
		        Text below image
		        <?php echo aq_field_textarea('text', $block_id, $text, $size = 'full') ?>
		    </label>
		</p>
		
        <?php
    }

    function block($instance) {
        extract($instance);

        if ($title) echo '<h3 class="title thin_title">' . do_shortcode(htmlspecialchars_decode($title)) . '</h3>';
        
        echo "<div class='image_container ".$effect." ".$border."' >";
                if($destination == "link" && !empty($destination_url)) {
                    echo "<a href='".$destination_url."'>";
                    echo "<img src='" . $url . "' class='align" . $align . " ' />";
                    echo "</a>";
                }elseif ($destination == "linktab" && !empty($destination_url)) {
                    echo "<a href='".$destination_url."' target='_blank'>";
                    echo "<img src='" . $url . "' class='align" . $align . "' />";
                    echo "</a>"; 
                }elseif ($destination == 'prettyphoto') {
                    echo "<a href='".$url."' class='prettyPhoto' rel='prettyPhoto'>";
                    echo "<img src='" . $url . "' class='align" . $align . "' />";
                    echo "</a>"; 
                }else{
                    echo "<img src='" . $url . "' class='align" . $align . "' />";
                }
                
                if ($text) {
                	echo '<p>' .do_shortcode(htmlspecialchars_decode($text)) . '</p>';
                }
        echo "</div>";
    }

}
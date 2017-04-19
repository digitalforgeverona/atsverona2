<?php

/** A simple text block * */
class AQ_Start_Block extends AQ_Block {

    //set and create block
    function __construct() {
        $block_options = array(
            'name' => 'Start Section',
            'size' => 'span12',
            'resizable' => 0,
        );

        //create the block
        parent::__construct('AQ_Start_Block', $block_options);
    }

    function form($instance) {

        $defaults = array(
            'title' => '',
            'bg_img' => '',
            'bg_color' => '#f8f8f8',
            'effect' => 'no_show_effect',
            'background_style' => 'color',
            'border_top' => '#e5e5e5',
            'border_bottom' => '#e5e5e5',
            'padding_top' => '80',
            'padding_bottom' => '40',
            'videomp' => '',
            'videomv' => '',
            'videowebm' => '',
            'videoogg' => '',
            'parallax' => '',
        );
        $instance = wp_parse_args($instance, $defaults);
        extract($instance);
        $effects_types = array(
            'no_show_effect' => 'Disable',
            'show_fade' => 'Fade In',
            'show_fade_left' => 'Fade In From Left',
            'show_fade_right' => 'Fade In From Right',
            'show_fade_up' => 'Fade In From Up',
            'show_fade_down' => 'Fade In From Down',
            'show_bounce' => 'Bounce'
        );
        
        $background_styles = array(
            'color' => 'Color',
            'cover_image' => 'Cover Image',
            'repeated_image' => 'Repeated Image',
            'video' => 'Video',
        );
        
        $background_parallax = array(
            'no' => 'No',
            'yes' => 'Yes',
        );
        
        ?>
        <p class="description">
            <label for="<?php echo $this->get_field_id('title') ?>">
                Title
                <?php echo aq_field_input('title', $block_id, $title, $size = 'full') ?>
            </label>
        </p>
        
        <p class="description">
            <label for="<?php echo $this->get_field_id('background_style') ?>">
                Background Style<br/>
                <?php echo aq_field_select('background_style', $block_id, $background_styles, $background_style) ?>
            </label>
        </p>
        
        <p class="description">
            <label for="<?php echo $this->get_field_id('border_top') ?>">
                Border Top Color
                <?php echo aq_field_color('border_top', $block_id, $border_top, $size = 'full') ?>
            </label>
        </p>
        
        <p class="description">
            <label for="<?php echo $this->get_field_id('border_bottom') ?>">
                Border Bottom Color
                <?php echo aq_field_color('border_bottom', $block_id, $border_bottom, $size = 'full') ?>
            </label>
        </p>
        
        <p class="description">
            <label for="<?php echo $this->get_field_id('bg_color') ?>">
                Background Color
                <?php echo aq_field_color('bg_color', $block_id, $bg_color, $size = 'full') ?>
            </label>
        </p>
        
        <p class="description">
            <label for="<?php echo $this->get_field_id('bg_img') ?>">
                Background Image
                <?php echo aq_field_upload('bg_img', $block_id, $bg_img) ?>
            </label>
        </p>
        
        <p class="description">
            <label for="<?php echo $this->get_field_id('videomp') ?>">
                Video MP4 URL
                <?php echo aq_field_upload('videomp', $block_id, $videomp, 'video') ?>
            </label>
        </p>
        
        <p class="description">
            <label for="<?php echo $this->get_field_id('videomv') ?>">
                Video M4V URL
                <?php echo aq_field_upload('videomv', $block_id, $videomv, 'video') ?>
            </label>
        </p>
        
        <p class="description">
            <label for="<?php echo $this->get_field_id('videowebm') ?>">
                Video WEBM URL
                <?php echo aq_field_upload('videowebm', $block_id, $videowebm, 'video') ?>
            </label>
        </p>
        
        <p class="description">
            <label for="<?php echo $this->get_field_id('videoogg') ?>">
                Video OGV URL or OGG URL
                <?php echo aq_field_upload('videoogg', $block_id, $videoogg, 'video') ?>
            </label>
        </p>
        
        <p class="description">
            <label for="<?php echo $this->get_field_id('parallax') ?>">
                Parallax<br/>
                <?php echo aq_field_select('parallax', $block_id, $background_parallax, $parallax) ?>
            </label>
        </p>
        
        
        <p class="description">
            <label for="<?php echo $this->get_field_id('padding_top') ?>">
                Padding Top
                <?php echo aq_field_input('padding_top', $block_id, $padding_top, $size = 'full') ?>
            </label>
        </p>
        
        <p class="description">
            <label for="<?php echo $this->get_field_id('padding_bottom') ?>">
                Padding Bottom
                <?php echo aq_field_input('padding_bottom', $block_id, $padding_bottom, $size = 'full') ?>
            </label>
        </p>
                
        <p class="description">
            <label for="<?php echo $this->get_field_id('effect') ?>">
                Effect<br/>
                <?php echo aq_field_select('effect', $block_id, $effects_types, $effect) ?>
            </label>
        </p>

        <?php
    }
    
	/* block header */
 	function before_block($instance) {
 	}
 	
 	/* block footer */
 	function after_block($instance) {
		
 	}
 	
    function block($instance) {
        extract($instance);
        
        $style = '';
        if ($background_style == 'color') {
        	$style .= " background-color:".$bg_color.";";
        }elseif($background_style == 'cover_image' || $background_style == 'video') {
        	$style .= " background-color:".$bg_color.";";
        	$style .= " background-size:cover; background-image:url(".$bg_img.");";
        }elseif($background_style == 'repeated_image') {
        	$style .= " background-color:".$bg_color.";";
        	$style .= " background-repeat:repeat; background-image:url(".$bg_img.");";
        }
        
        $style .= "border-top-color:".$border_top."; border-bottom-color:".$border_bottom."; padding-bottom:".$padding_bottom."px; padding-top:".$padding_top."px;";
        
        $class = "";
        
        if ($parallax == "yes") {
        	$class .= " parallax_section";
        }
        
        echo "<div class='".$effect." gray_section " .$class. "' style='".$style."'>";
        
        if ($background_style == 'video') {
        ?>
        
        <video class="video_overlay" preload="auto"  autoplay="autoplay" poster="<?php echo $bg_img; ?>" loop muted="muted">
        <source src="<?php echo $videomv; ?>" type="video/mp4" />
        <source src="<?php echo $videowebm; ?>" type="video/webm" />
        <source src="<?php echo $videoogg; ?>" type="video/ogg" />
        <source src="<?php echo $videomp; ?>" />
         
        <img alt="Video Background" src="<?php echo $bg_img; ?>" style="position:absolute;left:0;" width="100%" title="Video playback is not supported by your browser" />
        </video>
        
        <div class="color_overlay"></div>
        <?php
        }
        
       	echo "<div class='container'><div class='row'><div class='col-md-12'>";
        if ($title) echo '<h3 class="title center_title thin_title">' . do_shortcode(htmlspecialchars_decode($title)) . '</h3>';
        echo "</div></div></div>";
    }

}
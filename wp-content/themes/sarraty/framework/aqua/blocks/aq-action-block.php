<?php

/** A simple text block * */
class AQ_action_Block extends AQ_Block {

    //set and create block
    function __construct() {
        $block_options = array(
            'name' => 'Action Button',
            'size' => 'span12',
            'resizable' => 0,
        );

        //create the block
        parent::__construct('AQ_action_Block', $block_options);
    }

    function form($instance) {

        $defaults = array(
            'title' => '',
            'style' => 'default',
            'text' => '',
            'button' => '',
            'url' => '',
            'buttontarget' => '',
            'effect' => '',
            'img_url' => '',
            'img_width' => '200',
            'img_left' => '0',
            'img_bottom' => '0',
            'text_left' => '0',
            'box_top' => '0',
            'color' => 'white',
            'button_color' => 'default',
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
        
        $styles = array(
            'default' => 'Default',
            'white' => 'White',
            'dark' => 'Dark',
           	'transparent_white' => 'Transparent With white borders',
           	'transparent_black' => 'Transparent with black borders',
        );
        
        $font_colors = array(
            'white' => 'white',
            'black' => 'black',
        );
        
        $buttons_styles = array(
            'default' => 'Default',
            'themecolor' => 'Theme Color',
        	'transparentw' => 'Transparent With white borders',
        	'transparentb' => 'Transparent with black borders',
        );
        
        
        ?>
        <p class="description">
            <label for="<?php echo $this->get_field_id('style') ?>">
                Style<br/>
                <?php echo aq_field_select('style', $block_id, $styles, $style) ?>
            </label>
        </p>
        
        <p class="description">
            <label for="<?php echo $this->get_field_id('color') ?>">
                Text Color<br/>
                <?php echo aq_field_select('color', $block_id, $font_colors, $color) ?>
            </label>
        </p>
        
        <p class="description">
            <label for="<?php echo $this->get_field_id('button_style') ?>">
                Button Style<br/>
                <?php echo aq_field_select('button_style', $block_id, $buttons_styles, $button_style) ?>
            </label>
        </p>
        
        
        <p class="description">
            <label for="<?php echo $this->get_field_id('title') ?>">
                Title
                <?php echo aq_field_input('title', $block_id, $title, $size = 'full') ?>
            </label>
        </p>
        

        <p class="description">
            <label for="<?php echo $this->get_field_id('text') ?>">
                Content
                <?php echo aq_field_textarea('text', $block_id, $text, $size = 'full') ?>
            </label>
        </p>

        <p class="description">
            <label for="<?php echo $this->get_field_id('button') ?>">
                Button Text
                <?php echo aq_field_input('button', $block_id, $button, $size = 'full') ?>
            </label>
        </p>

        <p class="description">
            <label for="<?php echo $this->get_field_id('url') ?>">
                Button URL
                <?php echo aq_field_input('url', $block_id, $url, $size = 'full') ?>
            </label>
        </p>
        
        <p class="description">
            <label for="<?php echo $this->get_field_id('img_url') ?>">
                Image URL
                <?php echo aq_field_upload('img_url', $block_id, $img_url) ?>
            </label>
        </p>
        
        <p class="description">
            <label for="<?php echo $this->get_field_id('img_width') ?>">
                Image Width
                <?php echo aq_field_input('img_width', $block_id, $img_width, $size = 'full') ?>
            </label>
        </p>
        
        <p class="description">
            <label for="<?php echo $this->get_field_id('img_left') ?>">
                Image Left Offset
                <?php echo aq_field_input('img_left', $block_id, $img_left, $size = 'full') ?>
            </label>
        </p>
        
        <p class="description">
            <label for="<?php echo $this->get_field_id('img_bottom') ?>">
                Image Bottom Offset
                <?php echo aq_field_input('img_bottom', $block_id, $img_bottom, $size = 'full') ?>
            </label>
        </p>
        
        <p class="description">
            <label for="<?php echo $this->get_field_id('text_left') ?>">
                Text Left Offset
                <?php echo aq_field_input('text_left', $block_id, $text_left, $size = 'full') ?>
            </label>
        </p>
        
        <p class="description">
            <label for="<?php echo $this->get_field_id('box_top') ?>">
                Box Margin Top
                <?php echo aq_field_input('box_top', $block_id, $box_top, $size = 'full') ?>
            </label>
        </p>
        
        <p class="description">
            <label for="<?php echo $this->get_field_id('effect') ?>">
                Effect<br/>
                <?php echo aq_field_select('effect', $block_id, $effects_types, $effect) ?>
            </label>
        </p>
        <?php
        $button_targets = array(
            'default' => 'Same Tab',
            'blank' => 'New Tab',
        );
        ?>
        <p class="description">
            <label for="<?php echo $this->get_field_id('buttontarget') ?>">
                Button opens in<br/>
                <?php echo aq_field_select('buttontarget', $block_id, $button_targets, $buttontarget) ?>
            </label>
        </p>

        <?php
    }

    function block($instance) {
        extract($instance);
        
        echo "<div class='".$effect."'>";
        $style_class = 'default_action_box';
        $color_class = 'white_color_action_box';
        $button_color_class = 'default_btn_style';
        
        if ($style) {
        	$style_class = $style . '_action_box';
        }
        
        if ($color) {
        	$color_class = $color . '_color_action_box';
        }
        
        if ($button_style) {
        	$button_color_class = $button_style . '_btn_style';
        }
        ?>
        <div class="content_row">
            <div class="action_box <?php echo $style_class . ' ' . $color_class;  ?>" style="margin-top: <?php echo $box_top; ?>px;">
            
            	<?php if ($img_url):  ?>
            	
            	<div class="action_box_image" style="width: <?php echo $img_width; ?>px; bottom:  <?php echo $img_bottom; ?>px; left: <?php echo $img_left; ?>px;">
            		<img src="<?php echo $img_url; ?>" />
            	</div>
            	<?php endif; ?>
                <div class="action_box_inner clearfix" style="padding-left: <?php echo $text_left; ?>px;">
                    
                    <?php if($button && $url): ?>
                    <div class="action_button visible-md hidden-sm hidden-xs">
                        <a <?php if($buttontarget == "blank") echo "target='_blank'" ?> href="<?php echo $url ?>" class="btn btn-default <?php echo $button_color_class; ?>"><span><?php echo do_shortcode(htmlspecialchars_decode($button)); ?></span></a>
                    </div>
                    <?php endif; ?>

                    <div class="action_info">
                        <?php if ($title) echo '<h4 class="title action_title">' . do_shortcode(htmlspecialchars_decode($title)) . '</h4>'; ?>
                        <?php echo do_shortcode(htmlspecialchars_decode($text)); ?>
                    </div>
                    
                    <?php if($button && $url): ?>
                    <div class="action_button hidden-lg hidden-md visible-sm visible-xs">
                        <a <?php if($buttontarget == "blank") echo "target='_blank'" ?> href="<?php echo $url ?>" class="btn btn-default <?php echo $button_color_class; ?>"><span><?php echo do_shortcode(htmlspecialchars_decode($button)); ?></span></a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php
        echo "</div>";
    }

}
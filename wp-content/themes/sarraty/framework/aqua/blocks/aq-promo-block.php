<?php

/** A simple text block * */
class AQ_promo_Block extends AQ_Block {

    //set and create block
    function __construct() {
        $block_options = array(
            'name' => 'Promotion',
            'size' => 'span12',
        );

        //create the block
        parent::__construct('AQ_promo_Block', $block_options);
    }

    function form($instance) {

        $defaults = array(
            'title' => '',
            'text' => '',
            'image_url' => '',
            'button_url' => '',
            'button_text' => '',
            'image_position' => '',
            'info_align' => '',
            'effect' => 'none',
            'effect_style' => 'no_show_effect',
            'image_effect_style' => 'no_show_effect',
            'text_effect_style' => 'no_show_effect'
        );
        $instance = wp_parse_args($instance, $defaults);
        extract($instance);

        $effects = array(
            'none' => 'No Effects',
            'all' => 'All',
            'parts' => 'Parts'
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

        $seffects_types = array(
            'no_show_effect' => 'Disable',
            'show_fade' => 'Fade In',
            'show_fade_left' => 'Fade In From Left',
            'show_fade_right' => 'Fade In From Right',
            'show_fade_up' => 'Fade In From Up',
            'show_fade_down' => 'Fade In From Down',
            'show_bounce' => 'Bounce',
            'show_fade_steps' => 'Fade In One By One (For some blocks only)'
        );

        $image_pos = array(
            'left' => 'Left',
            'right' => 'Right'
        );

        $text_align = array(
            'left' => 'Left',
            'right' => 'Right',
            'center' => 'Center'
        );
        ?>
        <p class="description">
            <label for="<?php echo $this->get_field_id('title') ?>">
                Title
                <?php echo aq_field_input('title', $block_id, $title, $size = 'full') ?>
            </label>
        </p>

        <p class="description">
            <label for="<?php echo $this->get_field_id('text') ?>">
                Text
                <?php echo aq_field_textarea('text', $block_id, $text, $size = 'full') ?>
            </label>
        </p>

        <p class="description">
            <label for="<?php echo $this->get_field_id('image_url') ?>">
                Image URL
                <?php echo aq_field_upload('image_url', $block_id, $image_url) ?>
            </label>
        </p>

        <p class="description">
            <label for="<?php echo $this->get_field_id('button_url') ?>">
                Button URL
                <?php echo aq_field_input('button_url', $block_id, $button_url, $size = 'full') ?>
            </label>
        </p>

        <p class="description">
            <label for="<?php echo $this->get_field_id('button_text') ?>">
                Button Text
                <?php echo aq_field_input('button_text', $block_id, $button_text, $size = 'full') ?>
            </label>
        </p>

        <p class="description">
            <label for="<?php echo $this->get_field_id('image_position') ?>">
                Image Position<br/>
                <?php echo aq_field_select('image_position', $block_id, $image_pos, $image_position) ?>
            </label>
        </p>

        <p class="description">
            <label for="<?php echo $this->get_field_id('info_align') ?>">
                Information Text Align<br/>
                <?php echo aq_field_select('info_align', $block_id, $text_align, $info_align) ?>
            </label>
        </p>

        <p class="description">
            <label for="<?php echo $this->get_field_id('effect') ?>">
                Effect<br/>
                <?php echo aq_field_select('effect', $block_id, $effects, $effect) ?>
            </label>
        </p>

        <p class="description">
            <label for="<?php echo $this->get_field_id('effect_style') ?>">
                All Block Effect Style<br/>
                <?php echo aq_field_select('effect_style', $block_id, $effects_types, $effect_style) ?>
            </label>
        </p>

        <p class="description">
            <label for="<?php echo $this->get_field_id('image_effect_style') ?>">
                Image Effect Style<br/>
                <?php echo aq_field_select('image_effect_style', $block_id, $effects_types, $image_effect_style) ?>
            </label>
        </p>

        <p class="description">
            <label for="<?php echo $this->get_field_id('text_effect_style') ?>">
                Info Effect Style<br/>
                <?php echo aq_field_select('text_effect_style', $block_id, $effects_types, $text_effect_style) ?>
            </label>
        </p>

        <?php
    }

    function block($instance) {
        extract($instance);
        ?>

        <!-- check if effects is enabled for all then add all block effect style -->
        <?php if ($effect == "all"): ?>    
            <div class="<?php echo $effect_style; ?>">
            <?php else: ?>
                <div>
                <?php endif; ?>

                <!-- promotion image -->
                <?php if ($image_url): ?>
                    <div class="promo_image <?php if ($image_position == "right") { echo "pull-right"; } ?> <?php if ($effect == "parts") { echo $image_effect_style; } ?>">
                        <img src="<?php echo $image_url; ?>" title="<?php echo $title; ?>"/>
                    </div>
                <?php endif; ?>

                <!-- promotion text -->
                <?php 
                $info_align_class = '';
                if ($info_align == "left") { 
                    $info_align_class = "text-left"; 
                }elseif($info_align == "right"){
                    $info_align_class = "text-right";
                }elseif($info_align == "center"){
                    $info_align_class = "text-center";
                }
                ?>
                <div class="promo_text <?php echo $info_align_class; ?> <?php if ($effect == "parts") { echo $text_effect_style; } ?>">
                    <?php if ($title) echo '<h3 class="title thin_title">' . do_shortcode(htmlspecialchars_decode($title)) . '</h3>'; ?>
                    <?php echo wpautop(do_shortcode(htmlspecialchars_decode($text))); ?>
                    
                    <?php if ($button_url && $button_text): ?>
                        <a href="<?php echo $button_url; ?>" class="btn btn-default"><span><?php echo do_shortcode(htmlspecialchars_decode($button_text)); ?></span></a>
                    <?php endif; ?>
                </div>

                
            </div>
            <?php
        }

    }
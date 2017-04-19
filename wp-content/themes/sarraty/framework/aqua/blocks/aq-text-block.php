<?php

/** A simple text block * */
class AQ_Text_Block extends AQ_Block {

    //set and create block
    function __construct() {
        $block_options = array(
            'name' => 'Text',
            'size' => 'span12',
        );

        //create the block
        parent::__construct('aq_text_block', $block_options);
    }

    function form($instance) {

        $defaults = array(
            'title' => '',
            'text' => '',
            'effect' => 'no_show_effect'
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
        ?>
        <p class="description">
            <label for="<?php echo $this->get_field_id('title') ?>">
                Title (optional)
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
            <label for="<?php echo $this->get_field_id('effect') ?>">
                Effect<br/>
                <?php echo aq_field_select('effect', $block_id, $effects_types, $effect) ?>
            </label>
        </p>

        <?php
    }

    function block($instance) {
        extract($instance);
        
        if ($title) echo '<h3 class="title thin_title">' . do_shortcode(htmlspecialchars_decode($title)) . '</h3>';
        echo "<div class='".$effect."'>";
        echo wpautop(do_shortcode(htmlspecialchars_decode($text)));
        echo "</div>";
    }

}
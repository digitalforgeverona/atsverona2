<?php

/** A simple text block * */
class AQ_alertbox_Block extends AQ_Block {

    //set and create block
    function __construct() {
        $block_options = array(
            'name' => 'Alert Box',
            'size' => 'span12',
            'resizable' => 0
        );

        //create the block
        parent::__construct('AQ_alertbox_Block', $block_options);
    }

    function form($instance) {

        $defaults = array(
            'title' => '',
            'text' => '',
            'icon' => '',
            'action_title' => '',
            'action_text' => '',
            'the_width' => 'fluid',
        );
        $instance = wp_parse_args($instance, $defaults);
        extract($instance);
        $widthes = array(
            'container' => 'Container',
            'fluid' => 'Fluid',
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
                Text
                <?php echo aq_field_textarea('text', $block_id, $text, $size = 'full') ?>
            </label>
        </p>

        <p class="description">
            <label for="<?php echo $this->get_field_id('icon') ?>">
                Fontawesome icon code or image url
                <?php echo aq_field_input('icon', $block_id, $icon, $size = 'full') ?>
            </label>
        </p>

        <p class="description">
            <label for="<?php echo $this->get_field_id('action_title') ?>">
                Action Title
                <?php echo aq_field_input('action_title', $block_id, $action_title, $size = 'full') ?>
            </label>
        </p>

        <p class="description">
            <label for="<?php echo $this->get_field_id('action_text') ?>">
                Text
                <?php echo aq_field_textarea('action_text', $block_id, $action_text, $size = 'full') ?>
            </label>
        </p>


        <?php
    }

    function block($instance) {
        extract($instance);
        ?>
        <div class="container slider_alert_container">
            
            <!-- show this part only if icon, action title or action text available -->
            <?php if ($icon || $action_title || $action_text): ?>
            <div class="slider_alert_action pull-right visible-lg visible-md hidden-sm hidden-xs">
                <?php if ($icon): ?>
                    <div class="slider_alert_icon pull-left">
                        <?php echo asalah_icon_text($icon, $action_title) ?>
                    </div>
                <?php endif; ?>

                <?php if ($action_title || $action_text): ?>
                    <div class="slider_alert_info">
                        <?php if ($action_title) echo '<h4 class="title">' . do_shortcode(htmlspecialchars_decode($action_title)) . '</h4>'; ?>
                        <?php echo do_shortcode(htmlspecialchars_decode($action_text)); ?>
                    </div>
                <?php endif; ?>
            </div>
            <?php endif; ?>
            <!-- endif for checking icon, action_title, action_text available -->

            <div class="slider_alert_text">
                <?php if ($title) echo '<h3 class="title thin_title">' . do_shortcode(htmlspecialchars_decode($title)) . '</h3>'; ?>
                <?php echo do_shortcode(htmlspecialchars_decode($text)); ?>
            </div>
            
            <!-- add this for small screen view -->
            <!-- show this part only if icon, action title or action text available -->
            <?php if ($icon || $action_title || $action_text): ?>
            <div class="slider_alert_action hidden-lg hidden-md visible-sm visible-xs">
                <?php if ($icon): ?>
                    <div class="slider_alert_icon pull-left">
                        <?php echo asalah_icon_text($icon, $action_title) ?>
                    </div>
                <?php endif; ?>

                <?php if ($action_title || $action_text): ?>
                    <div class="slider_alert_info">
                        <?php if ($action_title) echo '<h4 class="title">' . do_shortcode(htmlspecialchars_decode($action_title)) . '</h4>'; ?>
                        <?php echo do_shortcode(htmlspecialchars_decode($action_text)); ?>
                    </div>
                <?php endif; ?>
            </div>
            <?php endif; ?>
            <!-- endif for checking icon, action_title, action_text available -->
        </div>

        <?php
    }

}
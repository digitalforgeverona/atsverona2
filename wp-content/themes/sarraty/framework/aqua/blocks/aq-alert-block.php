<?php
/** Notifications block * */
if (!class_exists('AQ_Alert_Block')) {

    class AQ_Alert_Block extends AQ_Block {

        //set and create block
        function __construct() {
            $block_options = array(
                'name' => 'Alerts',
                'size' => 'span12',
            );

            //create the block
            parent::__construct('aq_alert_block', $block_options);
        }

        function form($instance) {

            $defaults = array(
                'content' => '',
                'type' => 'alert-info',
                'title' => '',
                'effect' => '',
            );
            $instance = wp_parse_args($instance, $defaults);
            extract($instance);

            $type_options = array(
                'alert-info' => 'Info',
                'alert-warning' => 'Warning',
                'alert-success' => 'Success',
                'alert-danger' => 'Danger'
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
                    Title (optional)<br/>
                    <?php echo aq_field_input('title', $block_id, $title); ?>
                </label>
            </p>
            <p class="description">
                <label for="<?php echo $this->get_field_id('content') ?>">
                    Alert Text (required)<br/>
                    <?php echo aq_field_textarea('content', $block_id, $content); ?>
                </label>
            </p>
            
            <p class="description">
                <label for="<?php echo $this->get_field_id('type') ?>">
                    Alert Type<br/>
                    <?php echo aq_field_select('type', $block_id, $type_options, $type); ?>
                </label>
            </p>

            <p class="description">
                <label for="<?php echo $this->get_field_id('effect') ?>">
                    Effect<br/>
                    <?php echo aq_field_select('effect', $block_id, $effects_types, $effect); ?>
                </label>
            </p>
            <?php
        }

        function block($instance) {
            extract($instance);
            if ($title)
                echo '<h3 class="title thin_title">' . do_shortcode(htmlspecialchars_decode($title)) . '</h3>';
            echo "<div class='".$effect."'>";
            echo '<div class="alert ' . $type . ' alert-dismissable""><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . do_shortcode(htmlspecialchars_decode($content)) . '</div>';
            echo "</div>";
        }

    }

}
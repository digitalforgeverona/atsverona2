<?php
/** Notifications block * */
if (!class_exists('AQ_Rev_Block')) {

    class AQ_Rev_Block extends AQ_Block {

        //set and create block
        function __construct() {
            $block_options = array(
                'name' => 'Revolution Slider',
                'size' => 'span12',
            );

            //create the block
            parent::__construct('AQ_Rev_Block', $block_options);
        }

        function form($instance) {

            $defaults = array(
                'alias' => '',
                'thewidth' => '',
                'offset' => '0'
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
                <label for="<?php echo $this->get_field_id('alias') ?>">
                    Slider Alias (required)<br/>
                    <?php echo aq_field_input('alias', $block_id, $alias) ?>
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
            ?>
            
            <?php 
            $att = '';
            if ($offset) {
            	$att = 'style="margin-top:-'.$offset.'px;"';
            }
            ?>
            <div class="slider_offset" <?php echo $att; ?>> 
                    <?php putRevSlider($alias); ?>
                    <?php echo '<div class="hiddin_excerpt">'.excerpt(0).'</div>'; ?>
            </div>
            <?php
        }

    }

}
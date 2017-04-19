<?php
/** Notifications block * */
if (!class_exists('AQ_testicar_Block')) {

    class AQ_testicar_Block extends AQ_Block {

        //set and create block
        function __construct() {
            $block_options = array(
                'name' => 'Testimonials Carousel',
                'size' => 'span6',
            );

            //create the block
            parent::__construct('AQ_testicar_Block', $block_options);
        }

        function form($instance) {

            $defaults = array(
                'title' => '',
                'postnumber' => '',
                'tags_ids' => '',
                'auto' => '10'
            );
            
            $instance = wp_parse_args($instance, $defaults);
            extract($instance);
            ?>

            <p class="description">
                <label for="<?php echo $this->get_field_id('title') ?>">
                    Title<br/>
                    <?php echo aq_field_input('title', $block_id, $title) ?>
                </label>
            </p>
            <p class="description">
                <label for="<?php echo $this->get_field_id('postnumber') ?>">
                    Number Of Testimonials<br/>
                    <?php echo aq_field_input('postnumber', $block_id, $postnumber) ?>
                </label>
            </p>
            <p class="description">
                <label for="<?php echo $this->get_field_id('tags_ids') ?>">
                    Tags (Seperated by comma)<br/>
                    <?php echo aq_field_input('tags_ids', $block_id, $tags_ids) ?>
                </label>
            </p>
            <p class="description">
                <label for="<?php echo $this->get_field_id('auto') ?>">
                    Auto play after (number in seconds)<br/>
                    <?php echo aq_field_input('auto', $block_id, $auto) ?>
                </label>
            </p>
            <?php
        }

        function block($instance) {
            extract($instance);
            $auto_att = '10000';
            if ($auto && is_numeric($auto)) {
            	$auto_att = $auto.'000';
            }
            echo "<div class='testimonials_block'>";
            if ($title)
                echo '<h3 class="title thin_title">' . do_shortcode(htmlspecialchars_decode($title)) . '</h3>';
            testimonial_items($postnumber, $tags_ids, $auto_att);
            echo "</div>";
        }

    }

}
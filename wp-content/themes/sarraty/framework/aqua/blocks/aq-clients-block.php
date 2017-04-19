<?php
/** Notifications block * */
if (!class_exists('AQ_clients_Block')) {

    class AQ_clients_Block extends AQ_Block {

        //set and create block
        function __construct() {
            $block_options = array(
                'name' => 'Clients Carousel',
                'size' => 'span12',
            );

            //create the block
            parent::__construct('AQ_clients_Block', $block_options);
        }

        function form($instance) {

            $defaults = array(
                'title' => 'Clients',
                'postnumber' => '6',
                'appear' => '6',
                'tags' => '',
                'style' => 'carousel'
            );
            
            $block_styles = array(
                'carousel' => 'Carousel',
                'grid' => 'Grid'
            );
            
            $instance = wp_parse_args($instance, $defaults);
            extract($instance);
            ?>
            <p class="description">
                <label for="<?php echo $this->get_field_id('style') ?>">
                    Style<br/>
                    <?php echo aq_field_select('style', $block_id, $block_styles, $style) ?>
                </label>
            </p>
            
            <p class="description">
                <label for="<?php echo $this->get_field_id('title') ?>">
                    Title<br/>
                    <?php echo aq_field_input('title', $block_id, $title) ?>
                </label>
            </p>
            <p class="description">
                <label for="<?php echo $this->get_field_id('postnumber') ?>">
                    Number<br/>
                    <?php echo aq_field_input('postnumber', $block_id, $postnumber) ?>
                </label>
            </p>
            <p class="description">
                <label for="<?php echo $this->get_field_id('appear') ?>">
                    Number Appear<br/>
                    <?php echo aq_field_input('appear', $block_id, $appear) ?>
                </label>
            </p>
            <p class="description">
                <label for="<?php echo $this->get_field_id('tags_ids') ?>">
                    Tags (Seperated by comma)<br/>
                    <?php echo aq_field_input('tags_ids', $block_id, $tags_ids) ?>
                </label>
            </p>
            <?php
        }

        function block($instance) {
            extract($instance);
            echo '<div class="clients_block">';
            if ($title)
                echo '<h3 class="title thin_title">' . do_shortcode(htmlspecialchars_decode($title)) . '</h3>';
            clients_items($postnumber, $appear, '', $tags_ids, $style); 
            echo '</div>';
        }

    }

}
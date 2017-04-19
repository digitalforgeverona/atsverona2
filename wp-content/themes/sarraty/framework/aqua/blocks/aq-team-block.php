<?php
/** Notifications block * */
if (!class_exists('AQ_team_Block')) {

    class AQ_team_Block extends AQ_Block {

        //set and create block
        function __construct() {
            $block_options = array(
                'name' => 'Team Members',
                'size' => 'span12',
            );

            //create the block
            parent::__construct('AQ_team_Block', $block_options);
        }

        function form($instance) {

            $defaults = array(
                'title' => 'Teams',
                'postnumber' => '4',
                'grid' => '2',
                'tags_ids' => '',
            );
            $instance = wp_parse_args($instance, $defaults);
            extract($instance);
            
            $grid_types = array(
                '2' => '2 Columns',
                '1' => '1 Column'
            );
            
            
            ?>
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
                <label for="<?php echo $this->get_field_id('tags_ids') ?>">
                    Tags (Seperated by comma)<br/>
                    <?php echo aq_field_input('tags_ids', $block_id, $tags_ids) ?>
                </label>
            </p>
            <p class="description">
                <label for="<?php echo $this->get_field_id('grid') ?>">
                    Grid<br/>
                    <?php echo aq_field_select('grid', $block_id, $grid_types, $grid) ?>
                </label>
            </p>
            <?php
        }

        function block($instance) {
            extract($instance);
            echo '<div class="team_block">';
            if ($title)
                echo '<h3 class="title thin_title">' . do_shortcode(htmlspecialchars_decode($title)) . '</h3>';
            echo asalah_return_team_grid($postnumber, $grid, $tags_ids); 
            echo '</div>';
        }

    }

}
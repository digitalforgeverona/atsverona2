<?php
/** Notifications block * */
if (!class_exists('AQ_bloglist_Block')) {

    class AQ_bloglist_Block extends AQ_Block {

        //set and create block
        function __construct() {
            $block_options = array(
                'name' => 'Blog Posts List',
                'size' => 'span6',
            );

            //create the block
            parent::__construct('AQ_bloglist_Block', $block_options);
        }

        function form($instance) {

            $defaults = array(
                'style' => 'list',
                'title' => '',
                'thumbnails' => 'bloglist',
                'order' => 'date',
                'url' => '',
                'button' => '',
                'postnumber' => '',
                'cat' => '',
                'tags' => ''
            );
            $instance = wp_parse_args($instance, $defaults);
            extract($instance);

            $block_styles = array(
                'list' => 'List',
                'grid' => 'Grid',
                'carousel' => 'Carousel',
                'slider' => 'Slider',
            );

            $order_types = array(
                'date' => 'Latest Posts',
                'rand' => 'Random Posts'
            );

            $thumb_options = array(
                'bloglist' => 'Medium',
                'smallbloglist' => 'Small',
                'hide' => 'Hide'
                    );
            ?>

            <p class="description">
                <label for="<?php echo $this->get_field_id('title') ?>">
                    Title<br/>
                    <?php echo aq_field_input('title', $block_id, $title) ?>
                </label>
            </p>
            <p class="description">
                <label for="<?php echo $this->get_field_id('style') ?>">
                    Style<br/>
                    <?php echo aq_field_select('style', $block_id, $block_styles, $style) ?>
                </label>
            </p>
            <p class="description">
                <label for="<?php echo $this->get_field_id('url') ?>">
                    Blog Page URL<br/>
                    <?php echo aq_field_input('url', $block_id, $url) ?>
                </label>
            </p>

            <p class="description">
                <label for="<?php echo $this->get_field_id('button') ?>">
                    Button Text<br/>
                    <?php echo aq_field_input('button', $block_id, $button) ?>
                </label>
            </p>

            <p class="description">
                <label for="<?php echo $this->get_field_id('postnumber') ?>">
                    Number Of Posts<br/>
                    <?php echo aq_field_input('postnumber', $block_id, $postnumber) ?>
                </label>
            </p>

            <p class="description">
                <label for="<?php echo $this->get_field_id('thumbnails') ?>">
                    Thumbnails<br/>
                    <?php echo aq_field_select('thumbnails', $block_id, $thumb_options, $thumbnails) ?>
                </label>
            </p>

            <p class="description">
                <label for="<?php echo $this->get_field_id('order') ?>">
                    Order<br/>
                    <?php echo aq_field_select('order', $block_id, $order_types, $order) ?>
                </label>
            </p>
            
            <p class="description">
                <label for="<?php echo $this->get_field_id('tags') ?>">
                    Tags (Seperated by comma)<br/>
                    <?php echo aq_field_input('tags', $block_id, $tags) ?>
                </label>
            </p>
            <?php
        }

        function block($instance) {
            extract($instance);
            $the_id = "aq-block-" . $number;
            ?>

            <?php if ($title) echo '<h3 class="title thin_title">' . do_shortcode(htmlspecialchars_decode($title)) . '</h3>'; ?>
            <?php 
            if ($style == 'carousel') {
            echo asalah_return_blogposts_carousel($postnumber, $thumbnails, $order, '', $tags);
            }elseif($style == 'slider'){
            echo asalah_return_blogposts_slider($postnumber, $thumbnails, $order, '', $tags);
            }elseif($style == 'grid'){
            echo asalah_return_blogposts_grid($postnumber, $thumbnails, $order, '', $tags);
            }else{
            echo asalah_return_blogposts_list($postnumber, $thumbnails, $order, '', $tags); 
            }
            
            ?>
            
            <?php if ($button && $url): ?>
                <a href="<?php echo $url; ?>"><?php echo do_shortcode(htmlspecialchars_decode($button)); ?></a>
            <?php endif; ?>
                
            <?php
        }

    }

}
<?php
/* Aqua Tabs Block */
if (!class_exists('AQ_steps_Block')) {

    class AQ_steps_Block extends AQ_Block {

        function __construct() {
            $block_options = array(
                'name' => 'Steps',
                'size' => 'span6',
            );

            //create the widget
            parent::__construct('AQ_steps_Block', $block_options);

            //add ajax functions
            add_action('wp_ajax_aq_block_steps_add_new', array($this, 'add_steps'));
        }

        function form($instance) {

            $defaults = array(
                'tabs' => array(
                    1 => array(
                        'title' => 'New Step',
                        'content' => '',
                        'url' => '',
                        'icon' => '',
                    )
                ),
                'title' => '',
                'effect' => 'none',
                'effect_style' => 'no_show_effect',
                'service_effect_style' => 'no_show_effect',
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
            ?>
            <div class="description cf">
                <ul id="aq-sortable-list-<?php echo $block_id ?>" class="aq-sortable-list" rel="<?php echo $block_id ?>">
                    <?php
                    $tabs = is_array($tabs) ? $tabs : $defaults['tabs'];
                    $count = 1;
                    foreach ($tabs as $tab) {
                        $this->tab($tab, $count);
                        $count++;
                    }
                    ?>
                </ul>
                <p></p>
                <a href="#" rel="steps" class="aq-sortable-add-new button">Add New</a>
                <p></p>
            </div>
            <p class="description">
                <label for="<?php echo $this->get_field_id('title') ?>">
                    Title<br/>
                    <?php echo aq_field_input('title', $block_id, $title, $size = 'full') ?>
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
                <label for="<?php echo $this->get_field_id('service_effect_style') ?>">
                    Step Row Effect Style<br/>
                    <?php echo aq_field_select('service_effect_style', $block_id, $seffects_types, $service_effect_style) ?>
                </label>
            </p>

            <?php
        }

        function tab($tab = array(), $count = 0) {
            ?>
            <li id="<?php echo $this->get_field_id('tabs') ?>-sortable-item-<?php echo $count ?>" class="sortable-item" rel="<?php echo $count ?>">

                <div class="sortable-head cf">
                    <div class="sortable-title">
                        <strong><?php echo $tab['title'] ?></strong>
                    </div>
                    <div class="sortable-handle">
                        <a href="#">Open / Close</a>
                    </div>
                </div>

                <div class="sortable-body">
                    <p class="tab-desc description">
                        <label for="<?php echo $this->get_field_id('tabs') ?>-<?php echo $count ?>-title">
                            Progress Title<br/>
                            <input type="text" id="<?php echo $this->get_field_id('tabs') ?>-<?php echo $count ?>-title" class="input-full" name="<?php echo $this->get_field_name('tabs') ?>[<?php echo $count ?>][title]" value="<?php echo $tab['title'] ?>" />
                        </label>
                    </p>

                    <p class="tab-desc description">
                        <label for="<?php echo $this->get_field_id('tabs') ?>-<?php echo $count ?>-icon">
                            Icon<br/>
                            <input type="text" id="<?php echo $this->get_field_id('tabs') ?>-<?php echo $count ?>-icon" class="input-full" name="<?php echo $this->get_field_name('tabs') ?>[<?php echo $count ?>][icon]" value="<?php echo $tab['icon'] ?>" />
                        </label>
                    </p>

                    <p class="tab-desc description">
                        <label for="<?php echo $this->get_field_id('tabs') ?>-<?php echo $count ?>-content">
                            Description<br/>
                            <textarea id="<?php echo $this->get_field_id('tabs') ?>-<?php echo $count ?>-content" class="textarea-full" name="<?php echo $this->get_field_name('tabs') ?>[<?php echo $count ?>][content]" rows="5"><?php echo $tab['content'] ?></textarea>
                        </label>
                    </p>

                    <p class="tab-desc description">
                        <label for="<?php echo $this->get_field_id('tabs') ?>-<?php echo $count ?>-url">
                            URL<br/>
                            <input type="text" id="<?php echo $this->get_field_id('tabs') ?>-<?php echo $count ?>-url" class="input-full" name="<?php echo $this->get_field_name('tabs') ?>[<?php echo $count ?>][url]" value="<?php echo $tab['url'] ?>" />
                        </label>
                    </p>

                    <p class="tab-desc description"><a href="#" class="sortable-delete">Delete</a></p>
                </div>

            </li>
            <?php
        }

        function block($instance) {
            extract($instance);
            $output = '';
            // check if effects is enabled for all block then add effect style for main div
            if ($effect == "all") {
                $output .= '<div class="'.$effect_style.'">';
            }else{
                $output .= '<div>';
            }
            
            if($title) echo '<h3 class="title thin_title">'.do_shortcode(htmlspecialchars_decode($title)).'</h3>';
            foreach ($tabs as $tab) {
                
                // check if effects enabled for parts then add effect style for service row
                if ($effect == "parts") {
                $output .= '<div class="steps_item '.$service_effect_style.'">';
                }else{
                $output .= '<div class="steps_item">';   
                }
                
                // check if icon is not empty then add icon via asalah_icon_text function
                if ($tab['icon']) {
                    
                    // check if url is not empty then make icon linkable
                    if ($tab['url']) {
                        $the_icon = $tab['icon'];
                        $output .= '<div class="hi-icon-wrap hi-icon-effect-4 hi-icon-effect-4b"><a class="hi-icon" href="' . $tab['url'] . '">' . asalah_icon_text($the_icon) . '</a></div>';
                    } else {
                        $the_icon = $tab['icon'];
                        $output .= '<div class="hi-icon-wrap hi-icon-effect-4 hi-icon-effect-4b"><a class="hi-icon">' . asalah_icon_text($the_icon) . '</a></div>';
                    }
                }
                
                // start step info, title and content
                $output .= '<div class="step_info">';
                $output .= '<h4 class="step_title">' . $tab['title'] . '</h4>';
                $output .= wpautop($tab['content']);
                
                $output .= '</div>'; // close step_info div

                $output .= '</div>'; // close step item wrapper divs
            }
            $output .= '</div>'; // close main div
            echo $output;
        }

        /* AJAX add tab */

        function add_steps() {
            $nonce = $_POST['security'];
            if (!wp_verify_nonce($nonce, 'aqpb-settings-page-nonce'))
                die('-1');

            $count = isset($_POST['count']) ? absint($_POST['count']) : false;
            $this->block_id = isset($_POST['block_id']) ? $_POST['block_id'] : 'aq-block-9999';

            //default key/value for the tab
            $tab = array(
                'title' => 'New Step',
                'content' => '',
                'button' => '',
                'url' => '',
                'icon' => '',
            );

            if ($count) {
                $this->tab($tab, $count);
            } else {
                die(-1);
            }

            die();
        }

        function update($new_instance, $old_instance) {
            $new_instance = aq_recursive_sanitize($new_instance);
            return $new_instance;
        }

    }

}

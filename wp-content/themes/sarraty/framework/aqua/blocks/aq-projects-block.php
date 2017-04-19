<?php
/** Notifications block * */
if (!class_exists('AQ_projects_Block')) {

    class AQ_projects_Block extends AQ_Block {

        //set and create block
        function __construct() {
            $block_options = array(
                'name' => 'Projects',
                'size' => 'span12',
                'resizable' => 0,
            );

            //create the block
            parent::__construct('AQ_projects_Block', $block_options);
        }

        function form($instance) {

            $defaults = array(
                'title' => 'Projects',
                'description' => '',
                'aside' => 'desc',
                'style' => 'default',
                'postnumber' => '3',
                'order' => 'latest',
                'tags_ids' => '',
                'view_text' => 'See all',
                'url' => '',
                'thewidth' => 'container',
                'desc' => '',
                'button' => '',
                'effect' => 'none',
                'effect_style' => 'no_show_effect',
                'aside_effect_style' => 'no_show_effect',
                'grid_effect_style' => 'no_show_effect',
                'thumb_effect_style' => 'no_show_effect',
                
                
            );
            $instance = wp_parse_args($instance, $defaults);
            extract($instance);

            $order_types = array(
                'date' => 'Latest Projects',
                'rand' => 'Random Projects'
            );
            $style_types = array(
                'default' => 'Default',
                'grid' => 'Grid',
                'full' => 'Full Carousel (words with full width)'
            );
            $aside_types = array(
                'filter' => 'Tag Filter',
                'desc' => 'Description Text'
            );
            
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
                    Title<br/>
                    <?php echo aq_field_input('title', $block_id, $title) ?>
                </label>
            </p>
			
			<p class="description">
			    <label for="<?php echo $this->get_field_id('style') ?>">
			        Style<br/>
			        <?php echo aq_field_select('style', $block_id, $style_types, $style) ?>
			    </label>
			</p>
			
            <p class="description">
                <label for="<?php echo $this->get_field_id('aside') ?>">
                    Aside<br/>
                    <?php echo aq_field_select('aside', $block_id, $aside_types, $aside) ?>
                </label>
            </p>

            <p class="description">
                <label for="<?php echo $this->get_field_id('desc') ?>">
                    Description Text<br/>
                    <?php echo aq_field_textarea('desc', $block_id, $desc, $size = 'full') ?>
                </label>
            </p>

            <p class="description">
                <label for="<?php echo $this->get_field_id('order') ?>">
                    Order<br/>
                    <?php echo aq_field_select('order', $block_id, $order_types, $order) ?>
                </label>
            </p>
						
            <p class="description">
                <label for="<?php echo $this->get_field_id('tags_ids') ?>">
                    Tags (Seperated by comma)<br/>
                    <?php echo aq_field_input('tags_ids', $block_id, $tags_ids) ?>
                </label>
            </p>

            <p class="description">
                <label for="<?php echo $this->get_field_id('postnumber') ?>">
                    Number Of Posts<br/>
                    <?php echo aq_field_input('postnumber', $block_id, $postnumber) ?>
                </label>
            </p>

            <p class="description">
                <label for="<?php echo $this->get_field_id('button') ?>">
                    Button Text<br/>
                    <?php echo aq_field_input('button', $block_id, $button) ?>
                </label>
            </p>

            <p class="description">
                <label for="<?php echo $this->get_field_id('url') ?>">
                    Portfolio Page URL<br/>
                    <?php echo aq_field_input('url', $block_id, $url) ?>
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
                <label for="<?php echo $this->get_field_id('aside_effect_style') ?>">
                    Aside Effect Style<br/>
                    <?php echo aq_field_select('aside_effect_style', $block_id, $effects_types, $aside_effect_style) ?>
                </label>
            </p>
            
            <p class="description">
                <label for="<?php echo $this->get_field_id('grid_effect_style') ?>">
                    Grid Effect Style<br/>
                    <?php echo aq_field_select('grid_effect_style', $block_id, $effects_types, $grid_effect_style) ?>
                </label>
            </p>
            
            <p class="description">
                <label for="<?php echo $this->get_field_id('thumb_effect_style') ?>">
                    Thumbnails Effect Style<br/>
                    <?php echo aq_field_select('thumb_effect_style', $block_id, $effects_types, $thumb_effect_style) ?>
                </label>
            </p>

            <?php
        }

        function block($instance) {
            extract($instance);
            $the_id = "aq-block-" . $number;
            ?>

            <div class="row <?php if ($effect == "all") { echo $effect_style; } ?>">
                
                <?php if ($style != 'full') : ?>
                <?php if ($aside == "desc"): ?>
                	
                    <div class="col-md-3 portfolio_desc <?php if ($effect == "parts") { echo $aside_effect_style; } ?>">
                        <?php if($title) echo '<h3 class="title thin_title">'.do_shortcode(htmlspecialchars_decode($title)).'</h3>'; ?>
                        <?php // if($title) echo '<h3 class="title thin_title">'.do_shortcode(htmlspecialchars_decode($title)).'</h3>'; ?>
                        <?php if($desc) echo wpautop(do_shortcode(htmlspecialchars_decode($desc))); ?>
                        
                        <?php if($button && $url): ?>
                            <a href="<?php echo $url; ?>" class="btn btn-default"><span><?php echo do_shortcode(htmlspecialchars_decode($button)); ?></span></a>
                        <?php endif; ?>
                        
                    </div>
                <?php else: ?>

                    <div class="col-md-3 <?php if ($effect == "parts") { echo $aside_effect_style; } ?>">
                        <div class="widget_container widget_categories clearfix">
                            <?php if($title) echo '<h4 class="title widget_title">'.do_shortcode(htmlspecialchars_decode($title)).'</h4>'; ?>
                            <?php asalah_portfolio_tag_list(); ?>
                        </div>
                    </div>
                <?php endif; ?>
                
                <?php $main_class = 'col-md-9'; ?>
				<?php else: ?>
				<?php $main_class = 'col-md-12'; ?>
				<?php endif; ?>
				
				
                <div class="<?php echo $main_class; ?> <?php if ($effect == "parts") { echo $grid_effect_style; } ?>">
                    <?php if ($effect != "parts") { $thumb_effect_style = 'no_show_effect'; } ?>
                    <?php 
                    if ($style == "grid") {
                    echo asalah_return_portfolio_grid($postnumber, $order, $thumb_effect_style , $tags_ids);
                    }elseif($style == 'full') {
                    echo asalah_return_portfolio_carousel($postnumber, $order, $thumb_effect_style , $tags_ids);
                    }else {
                    echo asalah_return_portfolio_grid_hovereffect($postnumber, $order, $thumb_effect_style , $tags_ids);
                    }
                    
                    ?>
                </div>

            </div>

            <?php
        }

    }

}
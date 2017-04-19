<?php
/** Notifications block **/

if(!class_exists('AQ_Pricing_Block')) {
	class AQ_Pricing_Block extends AQ_Block {
		
		//set and create block
		function __construct() {
			$block_options = array(
				'name' => 'Pricing Table',
				'size' => 'span12',
			);
			
			//create the block
			parent::__construct('AQ_Pricing_Block', $block_options);
		}
		
		function form($instance) {
			
			$defaults = array(
				'tableid' => '',
				'columns'	=> '4',
                                'style' => '1'
			);
			$instance = wp_parse_args($instance, $defaults);
			extract($instance);
			
			$columns_types = array(
				'one' => 'One',
				'two' => 'Two',
				'three' => 'Three',
				'four' => 'Four',
				'five' => 'Five',
			);
                        $styles_types = array(
				'1' => '1',
				'2' => '2',
				'3' => '3',
			);
			$widthes = array(
				'container' => 'Container',
				'fluid' => 'Fluid',
			);
			?>
			<p class="description">
				<label for="<?php echo $this->get_field_id('title') ?>">
					Title (optional)<br/>
					<?php echo aq_field_input('title', $block_id, $title) ?>
				</label>
			</p>
			<p class="description">
				<label for="<?php echo $this->get_field_id('tableid') ?>">
					Table ID (required)<br/>
					<?php echo aq_field_input('tableid', $block_id, $tableid) ?>
				</label>
			</p>
            <p class="description">
				<label for="<?php echo $this->get_field_id('columns') ?>">
					Columns<br/>
					<?php echo aq_field_select('columns', $block_id, $columns_types, $columns) ?>
				</label>
			</p>
                        <p class="description">
				<label for="<?php echo $this->get_field_id('style') ?>">
					Style<br/>
					<?php echo aq_field_select('style', $block_id, $styles_types, $style) ?>
				</label>
			</p>
			<?php
			
		}
		/* block header */
		function block($instance) {
			extract($instance);
			?>
			<div class="row-fluid">
			<div class="span12">
            <?php if ($title) : ?><h3 class="page-header"><span class="page_header_title"><?php echo strip_tags($title); ?></span></h3><?php endif; ?>
			<?php echo do_shortcode('[pricing_table id="'.$tableid.'" column="'.$columns.'" style="'.$style.'"]'); ?>
			</div>
			</div>
			<?php
			
		}
		
	}
}
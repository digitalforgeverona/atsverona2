<?php
/** A simple text block **/
class AQ_sep_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Divider',
			'size' => 'span12',
            'resizable' => 0
		);
		
		//create the block
		parent::__construct('AQ_sep_Block', $block_options);
	}
	
	function form($instance) {
		
		$defaults = array(
			'style' => '1',
			'top' => '30',
			'bottom' => '30'
		);
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
		$widthes = array(
			'container' => 'Container',
			'fluid' => 'Fluid',
		);
		
		$styles = array(
			'white' => 'White Space',
			'shadow1' => 'Shadow 1',
			'shadow2' => 'Shadow 2',
			'shadow3' => 'Shadow 3',
			'shadow4' => 'Shadow 4',
			'dashes' => 'Dashes',
			'stripes' => 'Stripes'
		);
			
			
		?>
		<p class="description">
		    <label for="<?php echo $this->get_field_id('style') ?>">
		        Style<br/>
		        <?php echo aq_field_select('style', $block_id, $styles, $style) ?>
		    </label>
		</p>
		
		<p class="description">
		    <label for="<?php echo $this->get_field_id('top') ?>">
		        Margin Top
		        <?php echo aq_field_input('top', $block_id, $top, $size = 'full') ?>
		    </label>
		</p>
		
		<p class="description">
		    <label for="<?php echo $this->get_field_id('bottom') ?>">
		        Margin Bottom
		        <?php echo aq_field_input('bottom', $block_id, $bottom, $size = 'full') ?>
		    </label>
		</p>
		<?php
	}
	/* block header */
	 	function before_block($instance) {
	 	}
	 	
	 	/* block footer */
	 	function after_block($instance) {
			
	 	}
	function block($instance) {
		extract($instance);
		
		if ($style == 'white') {
			echo '<div class="container"><div class="row"><div class="col-md-12 seperator_shadow" style="margin-top:'.$top.'px; margin-bottom:'.$bottom.'px;"></div></div></div>';
		}else{
			if (!$style) { $style = 'shadow1'; }
			echo '<div class="container"><div class="row"><div class="col-md-12 seperator_shadow"><img src="'.get_template_directory_uri().'/img/'.$style.'.png"/></div></div></div>';
		}
	}
	
}
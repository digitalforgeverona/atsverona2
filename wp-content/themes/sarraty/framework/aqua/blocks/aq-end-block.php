<?php

/** A simple text block * */
class AQ_End_Block extends AQ_Block {

    //set and create block
    function __construct() {
        $block_options = array(
            'name' => 'End Section',
            'size' => 'span12',
            'resizable' => 0,
        );

        //create the block
        parent::__construct('AQ_End_Block', $block_options);
    }

    function form($instance) {
		$defaults = array(
		);
		
        $instance = wp_parse_args($instance, $defaults);
        extract($instance);
        ?>
       

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
        
        echo "</div>";
        
    }

}
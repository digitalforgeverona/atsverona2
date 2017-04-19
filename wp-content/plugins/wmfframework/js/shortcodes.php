<?php header('Content-type: text/javascript');?>
<?php //Setup location of WordPress
$absolute_path = __FILE__;
$path_to_file = explode( 'wp-content', $absolute_path );
$path_to_wp = $path_to_file[0];
//Access WordPress
require_once( $path_to_wp.'/wp-load.php' );
?>

(function($) {
"use strict";   
 
   
 			//Slider
            tinymce.PluginManager.add( 'wmff_slider', function( editor, url ) {
     
                editor.addButton( 'wmff_slider', {
                    type: 'splitbutton',
                    icon: false,
					title:  '<?php echo __('Slider','wmft2d') ?>',
					onclick : function(e) {},
					onshow : function(e) {
					    $.menu = $('#'+e.control._id+'-body');
							$('#'+e.control._id+'').addClass('wmfautofix'); 
							$.menu.addClass('mceListBoxMenu'); 
							$.menu.addClass('wmfautofix'); 

                        if($.menu.data('added')) return;
                        $.menu.append('<div style="padding: 0 10px 10px"><label><?php echo __('Select Slider','wmft2d') ?><br/>\
                        <select name="no">\<?php
                        $args = array( 'post_type' => 'wmfslider', 'posts_per_page' => -1 );
						$loop = new WP_Query( $args );
						while ( $loop->have_posts() ) : $loop->the_post();
							echo '<option value="'.$loop->post->ID.'"> '.$loop->post->ID.' - '.get_the_title().'</option>/\/';
						endwhile;?></select></label>\
                        </div>');

                        $('<input type="button" class="button" value="<?php echo __('Insert','wmft2d') ?>" />').appendTo($.menu)
						.click(function(){
                        	var no = $.menu.find('select[name=no]').val();
									
							editor.insertContent('[wmf_slider no="'+no.toLowerCase()+'"][/wmf_slider]');
                            e.control.hide();
                            }).wrap('<div style="padding: 0 10px 10px"></div>')
							$.menu.data('added',true); 
					
                    	
                    },
                });
          });
          
          
          
          //Gallery
          tinymce.PluginManager.add( 'wmff_gallery', function( editor, url ) {
     
                editor.addButton( 'wmff_gallery', {
                    type: 'splitbutton',
                    icon: false,
					title:  '<?php echo __('Gallery & Portfolio','wmft2d') ?>',
					onclick : function(e) {},
					onshow : function(e) {
					    $.menu = $('#'+e.control._id+'-body');
							$('#'+e.control._id+'').addClass('wmfautofix'); 
							$.menu.addClass('mceListBoxMenu'); 
							$.menu.addClass('wmfautofix'); 

                        if($.menu.data('added')) return;
                        $.menu.append('<div style="padding: 0 10px 10px"><label><?php echo __('Select Gallery','wmft2d') ?><br/>\
                        <select name="no">\<?php
                        $args = array( 'post_type' => 'wmfgallery', 'posts_per_page' => -1 );
						$loop = new WP_Query( $args );
						while ( $loop->have_posts() ) : $loop->the_post();
							echo '<option value="'.$loop->post->ID.'"> '.$loop->post->ID.' - '.get_the_title().'</option>/\/';
						endwhile;?></select></label>\
                        </div>');

                        $('<input type="button" class="button" value="<?php echo __('Insert','wmft2d') ?>" />').appendTo($.menu)
						.click(function(){
                        	var no = $.menu.find('select[name=no]').val();
									
							editor.insertContent('[wmf_gallery no="'+no.toLowerCase()+'"][/wmf_gallery]');
                            e.control.hide();
                            }).wrap('<div style="padding: 0 10px 10px"></div>')
							$.menu.data('added',true); 
					
                    	
                    },
                });



         
          });
         
       
 
})(jQuery);
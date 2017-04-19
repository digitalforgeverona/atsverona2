<?php header('Content-type: text/javascript');?>
<?php //Setup location of WordPress
$absolute_path = __FILE__;
$path_to_file = explode( 'wp-content', $absolute_path );
$path_to_wp = $path_to_file[0];
//Access WordPress
require_once( $path_to_wp.'/wp-load.php' );
?>
//Slider
(function() {
    tinymce.create('tinymce.plugins.wmff_slider', {
        createControl: function(n, cm) {
            switch (n) {                
                case 'wmff_slider':
                var c = cm.createSplitButton('wmff_slider', {
                    title : '<?php echo __('Slider','wmft2d') ?>',
                    onclick : function() {

                    }
                });
                

                c.onRenderMenu.add(function(c, m) {
                    m.onShowMenu.add(function(c,m){
                        jQuery('#menu_'+c.id).height('auto').width('auto');
                        jQuery('#menu_'+c.id+'_co').height('auto').addClass('mceListBoxMenu'); 
                        var $menu = jQuery('#menu_'+c.id+'_co').find('tbody:first');
                        if($menu.data('added')) return;
                        $menu.append('');
                        $menu.append('<div style="padding: 0 10px 10px"><label><?php echo __('Select Slider','wmft2d') ?><br/>\
                        <select name="no">\<?php
                        $args = array( 'post_type' => 'wmfslider', 'posts_per_page' => -1 );
						$loop = new WP_Query( $args );
						while ( $loop->have_posts() ) : $loop->the_post();
							echo '<option value="'.$loop->post->ID.'"> '.$loop->post->ID.' - '.get_the_title().'</option>/\/';
						endwhile;?></select></label>\
                        </div>');

                        jQuery('<input type="button" class="button" value="<?php echo __('Insert','wmft2d') ?>" />').appendTo($menu)
                                .click(function(){
                                    var no = $menu.find('select[name=no]').val();
									
									tinymce.activeEditor.execCommand('mceInsertContent',false,'[wmf_slider no="'+no.toLowerCase()+'"][/wmf_slider]'); 
                                    
                                    c.hideMenu();
                                }).wrap('<div style="padding: 0 10px 10px"></div>')
                 
                        $menu.data('added',true); 

                    });

                    m.add({title : '<?php echo __('Slider','wmft2d') ?>', 'class' : 'mceMenuItemTitle'}).setDisabled(1);

                 });
                return c;
                
            }
            return null;
        }
    });
    tinymce.PluginManager.add('wmff_slider', tinymce.plugins.wmff_slider);
})();


//Gallery
(function() {
    tinymce.create('tinymce.plugins.wmff_gallery', {
        createControl: function(n, cm) {
            switch (n) {                
                case 'wmff_gallery':
                var c = cm.createSplitButton('wmff_gallery', {
                    title : '<?php echo __('Gallery','wmft2d') ?>',
                    onclick : function() {

                    }
                });
                

                c.onRenderMenu.add(function(c, m) {
                    m.onShowMenu.add(function(c,m){
                        jQuery('#menu_'+c.id).height('auto').width('auto');
                        jQuery('#menu_'+c.id+'_co').height('auto').addClass('mceListBoxMenu'); 
                        var $menu = jQuery('#menu_'+c.id+'_co').find('tbody:first');
                        if($menu.data('added')) return;
                        $menu.append('');
                        $menu.append('<div style="padding: 0 10px 10px"><label><?php echo __('Select Gallery','wmft2d') ?><br/>\
                        <select name="no">\<?php
                        $args = array( 'post_type' => 'wmfgallery', 'posts_per_page' => -1 );
						$loop = new WP_Query( $args );
						while ( $loop->have_posts() ) : $loop->the_post();
							echo '<option value="'.$loop->post->ID.'"> '.$loop->post->ID.' - '.get_the_title().'</option>/\/';
						endwhile;?></select></label>\
                        </div>');

                        jQuery('<input type="button" class="button" value="<?php echo __('Insert','wmft2d') ?>" />').appendTo($menu)
                                .click(function(){
                                    var no = $menu.find('select[name=no]').val();
									
									tinymce.activeEditor.execCommand('mceInsertContent',false,'[wmf_gallery no="'+no.toLowerCase()+'"][/wmf_gallery]'); 
                                    
                                    c.hideMenu();
                                }).wrap('<div style="padding: 0 10px 10px"></div>')
                 
                        $menu.data('added',true); 

                    });

                    m.add({title : '<?php echo __('Gallery','wmft2d') ?>', 'class' : 'mceMenuItemTitle'}).setDisabled(1);

                 });
                return c;
                
            }
            return null;
        }
    });
    tinymce.PluginManager.add('wmff_gallery', tinymce.plugins.wmff_gallery);
})();

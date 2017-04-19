<?php
/*-----------------------------------------------------------------------------------*/
/*	Slider Shortcodes
/*-----------------------------------------------------------------------------------*/	
	add_shortcode('wmf_slider', 'wmf_framework_slider_shortcode');
	function wmf_framework_slider_shortcode( $atts, $content = null ) { 
		$atts = shortcode_atts(
			array(
				'no' => ''
			), $atts); 
		
		$output = '';
		$images = get_post_meta($atts['no'], '_wmfslider_imgadv', false);
		
		$sliderbox_enable = get_post_meta($atts['no'], '_wmfslider_radio', false);
		if(empty($sliderbox_enable['0'])){$sliderbox_enable['0'] = 0;}
		$sliderbox_icon = get_post_meta($atts['no'], '_wmfslider_text', false);
		if(empty($sliderbox_icon[0])){$sliderbox_icon='icon-heart';}else{$sliderbox_icon = $sliderbox_icon[0];}
		$sliderbox_link = get_post_meta($atts['no'], '_wmfslider_link', false);
		$sliderbox_target = get_post_meta($atts['no'], '_wmfslider_select', false);
		if(empty($sliderbox_target[0])){$sliderbox_target='_parent';}else{$sliderbox_target = $sliderbox_target[0];}
		$sliderbox_colorbg = get_post_meta($atts['no'], '_wmfslider_iconbgcolor', false);
		if(empty($sliderbox_colorbg[0])){$sliderbox_colorbg='#222222';}else{$sliderbox_colorbg = $sliderbox_colorbg[0];}
		$sliderbox_coloricon = get_post_meta($atts['no'], '_wmfslider_iconcolor', false);
		if(empty($sliderbox_coloricon[0])){$sliderbox_coloricon='#fff';}else{$sliderbox_coloricon = $sliderbox_coloricon[0];}
		$sliderbox_coloriconb = get_post_meta($atts['no'], '_wmfslider_iconcolorb', false);
		if(empty($sliderbox_coloriconb[0])){$sliderbox_coloriconb='#fff';}else{$sliderbox_coloriconb = $sliderbox_coloriconb[0];}
		
		$wmfslider_shadow = get_post_meta($atts['no'], "wmfslider_shadow", true);
		
		if($wmfslider_shadow != '-' && !empty($wmfslider_shadow)){$wmfshadow = ' drop-shadow '.$wmfslider_shadow.'';}else{$wmfshadow='';}
		
		if($wmfshadow != ''){$output .= '<div class="'.$wmfshadow.'">';}
		if($sliderbox_enable[0] == '1'){
			$output .= '<div class="flexslider" style="margin-bottom:52px!important; "><ul class="slides" data-snap-ignore="true">';
		}else{
			$output .= '<div class="flexslider"><ul class="slides" data-snap-ignore="true">';
		}
		
		foreach ( $images as $image )
		{
			$attachment = WMF_get_attachment_meta($image);
			$img_atts = wp_get_attachment_image_src( $image, 'full');
			
			if($attachment['linkurl'] != ''){
				$output .= '<li><a href="'.$attachment['linkurl'].'"><img src="'.$img_atts[0].'" width="'.$img_atts[1].'" height="'.$img_atts[2].'" class="wmf-img wmf-img-responsive"></a>';
				if($attachment['caption'] != ''){
					$output .= '<p class="flex-caption">'.$attachment['caption'].'</p>';
				}
				$output .= '</li>';
			}else{
				$output .= '<li><img src="'.$img_atts[0].'" width="'.$img_atts[1].'" height="'.$img_atts[2].'" class="wmf-img wmf-img-responsive">';
				if($attachment['caption'] != ''){
					$output .= '<p class="flex-caption">'.$attachment['caption'].'</p>';
				}
				$output .= '</li>';
			}
			
		}
		
		//Get meta values
		$wmfslider_directionNav = get_post_meta($atts['no'], "wmfslider_directionNav", true); 
		$wmfslider_directionn = get_post_meta($atts['no'], "wmfslider_directionn", true); 
		$wmfslider_animation = get_post_meta($atts['no'], "wmfslider_animation", true); 
		$wmfslider_animationLoop = get_post_meta($atts['no'], "wmfslider_animationLoop", true); 
		$wmfslider_slideshowSpeed = get_post_meta($atts['no'], "wmfslider_slideshowSpeed", true); 
		$wmfslider_animationSpeed = get_post_meta($atts['no'], "wmfslider_animationSpeed", true); 
		$wmfslider_easing = get_post_meta($atts['no'], "wmfslider_easing", true); 
		$wmfslider_controlNav = get_post_meta($atts['no'], "wmfslider_controlNav", true); 
		$wmfslider_mousewheel = get_post_meta($atts['no'], "wmfslider_mousewheel", true);
		
		$output .= '</ul>';
		if($sliderbox_enable[0] == '1' && empty($sliderbox_link[0])){
			$output .= '<div class="wmfslider_midicon" style="border: '.$sliderbox_coloriconb.' 6px solid!important; background:'.$sliderbox_colorbg.'!important; "><i class="'.$sliderbox_icon.'" style="color:'.$sliderbox_coloricon.'!important"></i></div>';
		}elseif($sliderbox_enable[0] == '1' && !empty($sliderbox_link[0])){
			$output .= '<a href="'.$sliderbox_link[0].'" target="'.$sliderbox_target.'" class="wmfslider_midicon" style="border: '.$sliderbox_coloriconb.' 6px solid!important; background:'.$sliderbox_colorbg.'!important; "><i class="'.$sliderbox_icon.'" style="color:'.$sliderbox_coloricon.'!important"></i></a>';
		}
		$output .= '</div>';
		if($wmfshadow != ''){$output .= '</div>';}
		$output .= '<script>
		(function($) {
			
			$(window).load(function(){
				
				$(".flexslider").flexslider({
					animation: "'.$wmfslider_animation.'",
					animationLoop: '.$wmfslider_animationLoop.',
					slideshowSpeed: '.$wmfslider_slideshowSpeed.',
					animationSpeed: '.$wmfslider_animationSpeed.',
					easing: "'.$wmfslider_easing.'",
					directionNav: '.$wmfslider_directionNav.',
					controlNav: '.$wmfslider_controlNav.',
					mousewheel: '.$wmfslider_mousewheel.',
					direction: "'.$wmfslider_directionn.'",
					thumbCaptions: true
				});
			
			});
			
		})(jQuery);
		</script>';
		return $output;
	}	
	
/*-----------------------------------------------------------------------------------*/
/*	Functions
/*-----------------------------------------------------------------------------------*/	
	function WMF_add_attachment_linkurl_field( $form_fields, $post ) {
		$field_value = get_post_meta( $post->ID, 'linkurl', true );
		$form_fields['linkurl'] = array(
			'value' => $field_value ? $field_value : '',
			'label' => __( 'Slider/Portfolio Link', 'wmft2d' ),
			'helps' => __( 'Set a slider or portfolio page link for this attachment. If use this attachment in to a slider link will be slider link otherwise it will be gallery & portfolio link.', 'wmft2d' )
		);
		return $form_fields;
	}
	add_filter( 'attachment_fields_to_edit', 'WMF_add_attachment_linkurl_field', 10, 2 );
	
	function WMF_save_attachment_linkurl( $attachment_id ) {
		if ( isset( $_REQUEST['attachments'][$attachment_id]['linkurl'] ) ) {
			$location = $_REQUEST['attachments'][$attachment_id]['linkurl'];
			update_post_meta( $attachment_id, 'linkurl', $location );
		}
	}
	add_action( 'edit_attachment', 'WMF_save_attachment_linkurl' );
	
	// Shortcode to list
	function WMF_slider_columns_head($defaults) {  
		$defaults['shortcode_slider']  = 'Shortcode';  
		return $defaults;  
		
	} 

	function WMF_slider_columns_content($column_name, $post_ID) {  
		if ($column_name == 'shortcode_slider') {  
			?>
            <input name="shortcodeforslider" value='[wmf_slider no="<?php echo $post_ID; ?>"][/wmf_slider]' class="slider-meta-field" onclick="this.select()" />
            <?php
		}  
	} 
	
	//Remove Date column
	function wmf_manage_slider_columns( $columns ) {
	  unset($columns['date']);
	  return $columns;
	}
	
	function wmf_remove_date_slider() {
	  add_filter( 'manage_wmfslider_posts_columns' , 'wmf_manage_slider_columns' );
	}
	add_action( 'admin_init' , 'wmf_remove_date_slider' );



/*-----------------------------------------------------------------------------------*/
/*	Post Type
/*-----------------------------------------------------------------------------------*/	
function create_post_type_wmfslidergallery()
{
    register_post_type('wmfslider', 
        array(
        'labels' => array(
            'name' => __('WMF Slider', 'wmft2d'),
            'singular_name' => __('WMFSlider', 'wmft2d'),
            'add_new' => __('Add New', 'wmft2d'),
            'add_new_item' => __('Add New Slider Item', 'wmft2d'),
            'edit' => __('Edit', 'wmft2d'),
            'edit_item' => __('Edit Slider Item', 'wmft2d'),
            'new_item' => __('New Slider Item', 'wmft2d'),
            'view' => __('View Slider Item', 'wmft2d'),
            'view_item' => __('View Slider Item', 'wmft2d'),
            'search_items' => __('Search Slider Item', 'wmft2d'),
            'not_found' => __('No slider item found', 'wmft2d'),
            'not_found_in_trash' => __('No slider item found in Trash', 'wmft2d')
        ),
        'public' => true,
		'menu_position' => 210,
        'hierarchical' => true, 
		'show_tagcloud' => false, 
        'has_archive' => true,
		'show_in_nav_menus' => false,
        'supports' => array(
            'title'
        ), 
        'can_export' => true,
    ));
	
}


//Shortcode Meta Box
add_action("admin_init", "wmf_slider_meta_box2");
function wmf_slider_meta_box2(){  
    add_meta_box("WMFSlideShowMeta2", __('Shortcode for This Slider','wmft2d'), "wmf_slider_options2", "wmfslider", "side", "high");  
} 

function wmf_slider_options2(){
	global $post; 
		 
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
    
?>
	<label><?php echo __('Please copy code below','wmft2d');?>:</label><br /><input name="shortcodeforslider" value='[wmf_slider no="<?php echo $post->ID; ?>"][/wmf_slider]' class="slider-meta-field" onclick="this.select()" />
<?php
}

//Options Meta Box
add_action("admin_init", "wmf_slider_meta_box");
function wmf_slider_meta_box(){  
    add_meta_box("WMFSlideShowMeta", __('Slide Show Options','wmft2d'), "wmf_slider_options", "wmfslider", "side", "low");  
}  

function wmf_slider_options(){  

        global $post; 
		 
        if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
        $custom = get_post_custom($post->ID);  
		
		
		if(isset($custom["wmfslider_shadow"][0]) == NULL or $custom["wmfslider_shadow"][0] == ""){$wmfslider_shadow = "";}else{$wmfslider_shadow = $custom["wmfslider_shadow"][0];}		
		if(isset($custom["wmfslider_directionn"][0]) == NULL or $custom["wmfslider_directionn"][0] == ""){$wmfslider_directionn = "horizontal";}else{$wmfslider_directionn = $custom["wmfslider_directionn"][0];}		
		if(isset($custom["wmfslider_animation"][0]) == NULL or $custom["wmfslider_animation"][0] == ""){$wmfslider_animation = "slide";}else{$wmfslider_animation = $custom["wmfslider_animation"][0];}
		if(isset($custom["wmfslider_animationLoop"][0]) == NULL or $custom["wmfslider_animationLoop"][0] == ""){$wmfslider_animationLoop = "true";}else{$wmfslider_animationLoop = $custom["wmfslider_animationLoop"][0];}
		if(isset($custom["wmfslider_slideshowSpeed"][0]) == NULL or $custom["wmfslider_slideshowSpeed"][0] == ""){$wmfslider_slideshowSpeed = "7000";}else{$wmfslider_slideshowSpeed = $custom["wmfslider_slideshowSpeed"][0];}
		if(isset($custom["wmfslider_animationSpeed"][0]) == NULL or $custom["wmfslider_animationSpeed"][0] == ""){$wmfslider_animationSpeed = "600";}else{$wmfslider_animationSpeed = $custom["wmfslider_animationSpeed"][0];}
		if(isset($custom["wmfslider_easing"][0]) == NULL or $custom["wmfslider_easing"][0] == ""){$wmfslider_easing = "swing";}else{$wmfslider_easing = $custom["wmfslider_easing"][0];}
		if(isset($custom["wmfslider_directionNav"][0]) == NULL or $custom["wmfslider_directionNav"][0] == ""){$wmfslider_directionNav = "true";}else{$wmfslider_directionNav = $custom["wmfslider_directionNav"][0];}
	    if(isset($custom["wmfslider_controlNav"][0]) == NULL or $custom["wmfslider_controlNav"][0] == ""){$wmfslider_controlNav = "false";}else{$wmfslider_controlNav = $custom["wmfslider_controlNav"][0];} 
		if(isset($custom["wmfslider_mousewheel"][0]) == NULL or $custom["wmfslider_mousewheel"][0] == ""){$wmfslider_mousewheel = "false";}else{$wmfslider_mousewheel = $custom["wmfslider_mousewheel"][0];}
?>  
       <label><?php echo __('Slider Shadow','wmft2d');?>:</label><br />
       <select name="wmfslider_shadow" id="wmfslider_shadow" class="slider-meta-field">
        <option value="-" <?php if($wmfslider_shadow == "-"){echo 'selected';}?>><?php echo __('No Effect','wmft2d');?></option>
        <option value="lifted" <?php if($wmfslider_shadow == "lifted"){echo 'selected';}?>><?php echo __('Lifted Corners','wmft2d');?></option>
        <option value="perspective" <?php if($wmfslider_shadow == "perspective"){echo 'selected';}?>><?php echo __('Perspective','wmft2d');?></option>
        <option value="raised" <?php if($wmfslider_shadow == "raised"){echo 'selected';}?>><?php echo __('Raised Box','wmft2d');?></option>
        <option value="curved curved-vt-1" <?php if($wmfslider_shadow == "curved curved-vt-"){echo 'selected';}?>><?php echo __('Single Vertical Curve','wmft2d');?></option>
        <option value="curved curved-vt-2" <?php if($wmfslider_shadow == "curved curved-vt-2"){echo 'selected';}?>><?php echo __('Vertical Curves','wmft2d');?></option>
        <option value="curved curved-hz-1" <?php if($wmfslider_shadow == "curved curved-hz-1"){echo 'selected';}?>><?php echo __('Single Horizontal Curve','wmft2d');?></option>
        <option value="curved curved-hz-2" <?php if($wmfslider_shadow == "curved curved-hz-2"){echo 'selected';}?>><?php echo __('Horizontal Curves','wmft2d');?></option>
       </select>
       
      
       
       <label><?php echo __('Slider Animation','wmft2d');?>:</label><br />
       <select name="wmfslider_animation" id="wmfslider_animation" class="slider-meta-field">
        <option value="fade" <?php if($wmfslider_animation == "fade"){echo 'selected';}?>><?php echo __('Fade','wmft2d');?></option>
        <option value="slide" <?php if($wmfslider_animation == "slide"){echo 'selected';}?>><?php echo __('Slide','wmft2d');?></option>
       </select>
       
       <label><?php echo __('Slider Direction','wmft2d');?>:</label><br />
       <select name="wmfslider_directionn" id="wmfslider_directionn" class="slider-meta-field">
        <option value="horizontal" <?php if($wmfslider_directionn == "horizontal"){echo 'selected';}?>><?php echo __('Horizontal','wmft2d');?></option>
        <option value="vertical" <?php if($wmfslider_directionn == "vertical"){echo 'selected';}?>><?php echo __('Vertical','wmft2d');?></option>
       </select>
       
       <label><?php echo __('Easing Effect','wmft2d');?>:</label><br />
       <select name="wmfslider_easing" id="wmfslider_easing" class="slider-meta-field">
         <option value="<?php echo $wmfslider_easing;?>" <?php echo $wmfslider_easing;?>><?php echo $wmfslider_easing;?></option>
         <option value="swing">swing</option>
         <option value="easeInQuad">easeInQuad</option>
         <option value="easeOutQuad">easeOutQuad</option>
         <option value="easeInOutQuad">easeInOutQuad</option>
         <option value="easeInCubic">easeInCubic</option>
         <option value="easeOutCubic">easeOutCubic</option>
         <option value="easeInOutCubic">easeInOutCubic</option>
         <option value="easeInQuart">easeInQuart</option>
         <option value="easeOutQuart">easeOutQuart</option>
         <option value="easeInOutQuart">easeInOutQuart</option>
         <option value="easeInQuint">easeInQuint</option>
         <option value="easeOutQuint">easeOutQuint</option>
         <option value="easeInOutQuint">easeInOutQuint</option>
         <option value="easeInSine">easeInSine</option>
         <option value="easeOutSine">easeOutSine</option>
         <option value="easeInOutSine">easeInOutSine</option>
         <option value="easeInExpo">easeInExpo</option>
         <option value="easeOutExpo">easeOutExpo</option>
         <option value="easeInOutExpo">easeInOutExpo</option>
         <option value="easeInCirc">easeInCirc</option>
         <option value="easeOutCirc">easeOutCirc</option>
         <option value="easeInOutCirc">easeInOutCirc</option>
         <option value="easeInElastic">easeInElastic</option>
         <option value="easeOutElastic">easeOutElastic</option>
         <option value="easeInOutElastic">easeInOutElastic</option>
         <option value="easeInBack">easeInBack</option>
         <option value="easeOutBack">easeOutBack</option>
         <option value="easeInOutBack">easeInOutBack</option>
         <option value="easeInBounce">easeInBounce</option>
         <option value="easeOutBounce">easeOutBounce</option>
         <option value="easeInOutBounce">easeInOutBounce</option>
       </select>
       
       
       <label><?php echo __('Direction Navigation','wmft2d');?>:</label>
       <label><input type="checkbox" class="ios-switch green  bigswitch" name="wmfslider_directionNav" id="wmfslider_directionNav" value="true" <?php if($wmfslider_directionNav == "true"){ echo 'checked';}?> /><div><div></div></div></label>

       <label><?php echo __('Control Navigation','wmft2d');?>:</label>
       <label><input type="checkbox" class="ios-switch green  bigswitch" name="wmfslider_controlNav" id="wmfslider_controlNav" value="true" <?php if($wmfslider_controlNav == "true"){ echo 'checked';}?> /><div><div></div></div></label>

       <label><?php echo __('Animation Loop','wmft2d');?>:</label>
       <label><input type="checkbox" class="ios-switch green  bigswitch" name="wmfslider_animationLoop" id="wmfslider_animationLoop" value="true" <?php if($wmfslider_animationLoop == "true"){ echo 'checked';}?> /><div><div></div></div></label>

       <label><?php echo __('Mouse Wheel','wmft2d');?>:</label>
       <label><input type="checkbox" class="ios-switch green  bigswitch" name="wmfslider_mousewheel" id="wmfslider_mousewheel" value="true" <?php if($wmfslider_mousewheel == "true"){ echo 'checked';}?> /><div><div></div></div></label>

       <label><?php echo __('Slide Show Speed(ms)','wmft2d');?>:</label><br /><input name="wmfslider_slideshowSpeed" value="<?php echo $wmfslider_slideshowSpeed; ?>" class="slider-meta-field" />
       <label><?php echo __('Animation Speed(ms)','wmft2d');?>:</label><br /><input name="wmfslider_animationSpeed" value="<?php echo $wmfslider_animationSpeed; ?>" class="slider-meta-field" />  
<?php  
}  
		

add_action('save_post', 'save_wmfproject_link'); 
  
function save_wmfproject_link(){  
    global $post;  
	global $post_type;  
	
	
    if($post_type == "wmfslider"){
		if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){ 
			return $post_id;
		}else{
			if(!empty($post->ID)){
				
				if(!empty($_POST["wmfslider_directionNav"])){update_post_meta($post->ID, "wmfslider_directionNav", $_POST["wmfslider_directionNav"]); }else{update_post_meta($post->ID, "wmfslider_directionNav", 'false');};
				if(!empty($_POST["wmfslider_directionn"])){update_post_meta($post->ID, "wmfslider_directionn", $_POST["wmfslider_directionn"]); };
				if(!empty($_POST["wmfslider_shadow"])){update_post_meta($post->ID, "wmfslider_shadow", $_POST["wmfslider_shadow"]); };
				if(!empty($_POST["wmfslider_animation"])){update_post_meta($post->ID, "wmfslider_animation", $_POST["wmfslider_animation"]); };
				if(!empty($_POST["wmfslider_animationLoop"])){update_post_meta($post->ID, "wmfslider_animationLoop", $_POST["wmfslider_animationLoop"]); }else{update_post_meta($post->ID, "wmfslider_animationLoop", 'false');};
				if(!empty($_POST["wmfslider_slideshowSpeed"])){update_post_meta($post->ID, "wmfslider_slideshowSpeed", $_POST["wmfslider_slideshowSpeed"]); };
				if(!empty($_POST["wmfslider_animationSpeed"])){update_post_meta($post->ID, "wmfslider_animationSpeed", $_POST["wmfslider_animationSpeed"]); };
				if(!empty($_POST["wmfslider_easing"])){update_post_meta($post->ID, "wmfslider_easing", $_POST["wmfslider_easing"]); };
				if(!empty($_POST["wmfslider_controlNav"])){update_post_meta($post->ID, "wmfslider_controlNav", $_POST["wmfslider_controlNav"]); }else{update_post_meta($post->ID, "wmfslider_controlNav", 'false');};
				if(!empty($_POST["wmfslider_mousewheel"])){update_post_meta($post->ID, "wmfslider_mousewheel", $_POST["wmfslider_mousewheel"]); }else{update_post_meta($post->ID, "wmfslider_mousewheel", 'false');};
			
			}
		} 
	}
}  



// Register things
add_action('init', 'create_post_type_wmfslidergallery'); 

add_filter('manage_wmfslider_posts_columns', 'WMF_slider_columns_head', 10);  
add_action('manage_wmfslider_posts_custom_column', 'WMF_slider_columns_content', 10, 2); 
?>
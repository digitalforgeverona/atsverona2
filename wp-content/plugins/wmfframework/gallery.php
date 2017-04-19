<?php
/*-----------------------------------------------------------------------------------*/
/*	Gallery Shortcodes
/*-----------------------------------------------------------------------------------*/	
	add_shortcode('wmf_gallery', 'wmf_framework_wgallery_shortcode');
	function wmf_framework_wgallery_shortcode( $atts, $content = null ) { 
		$atts = shortcode_atts(
			array(
				'no' => ''
			), $atts); 
		
		$output = '';
		$images = get_post_meta($atts['no'], '_wmfgallery_imgadv', false);
		
		//Get meta values
		$wmfgallery_columns = get_post_meta($atts['no'], "wmfgallery_columns", true);
		$wmfgallery_pautostart = get_post_meta($atts['no'], "wmfgallery_pautostart", true);
		$wmfgallery_pallowzoom = get_post_meta($atts['no'], "wmfgallery_pallowzoom", true);
		$wmfgallery_pslideshowdelay = get_post_meta($atts['no'], "wmfgallery_pslideshowdelay", true); 
		$wmfgallery_imgtype = get_post_meta($atts['no'], "wmfgallery_imgtype", true); 
		$wmfgallery_ppp = get_post_meta($atts['no'], "wmfgallery_ppp", true); 
		
		$wmfgallery_atttitle = get_post_meta($atts['no'], "wmfgallery_atttitle", true); 
		$wmfgallery_attdesc = get_post_meta($atts['no'], "wmfgallery_attdesc", true); 
		$wmfgallery_attlink = get_post_meta($atts['no'], "wmfgallery_attlink", true); 
		$wmfgallery_atttitlelink = get_post_meta($atts['no'], "wmfgallery_atttitlelink", true); 
		
		$wmfgallery_cslideshow = get_post_meta($atts['no'], "wmfgallery_cslideshow", true); 
		$wmfgallery_cautostart = get_post_meta($atts['no'], "wmfgallery_cautostart", true); 
		$wmfgallery_ctransition = get_post_meta($atts['no'], "wmfgallery_ctransition", true); 
		$wmfgallery_cslidespeed = get_post_meta($atts['no'], "wmfgallery_cslidespeed", true); 
		
		
		$wmfgallery_pbbgcolor = get_post_meta($atts['no'], "_wmfgallery_pbbgcolor", true); 
		$wmfgallery_pbcolor = get_post_meta($atts['no'], "_wmfgallery_pbcolor", true); 
		$wmfgallery_pbradius = get_post_meta($atts['no'], "_wmfgallery_pbradius", true); 
		$wmfcolorbox_disable = get_post_meta($atts['no'], "wmfcolorbox_disable", true); 
		
		if($wmfgallery_imgtype != 'default'){$wmfgallery_imgtype = "wmf-img-".$wmfgallery_imgtype;}
		
		$output .= '<div id="Gallery"><div class="wmf-container"><div class="wmf-row">';
		
		$image_list = '';
		
		$img_arr_leng = count($images);
		$stop_img_arr_leng = $img_arr_leng - 1;
		
		$i = 0;
		
		foreach ( $images as $image )
		{
			
			if($i < $stop_img_arr_leng){
				$image_list .= $image.',';
			}elseif($i == $stop_img_arr_leng){
				$image_list .= $image;
			}
			
			$i=$i + 1;
		}
		
		$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
		
		$pageportfolio = "";
		if($wmfgallery_atttitle != 'false' or $wmfgallery_attdesc != 'false' or $wmfgallery_attlink != 'false'){
			
			$wmfgallery_imgtype = "";
			$pageportfolio = true;
			
		}
		
		if ( get_query_var('paged') ) {$paged = get_query_var('paged');} elseif ( get_query_var('page') ) {$paged = get_query_var('page');} else {$paged = 1;}
		
		$args = array(
			'post_type' => 'attachment',
			'posts_per_page' => $wmfgallery_ppp,
			'post_status' => 'inherit',
			'post__in' => $images,
			'paged' => $paged,
			'orderby' => 'post__in'
			
		);
		
		$the_query = new WP_Query( $args );
		
		$ri = 0;
		 
		//Controll
		//$output .= $the_query->request;
		  if ( $the_query->have_posts() ){
			
		  while ( $the_query->have_posts() ) : $the_query->the_post(); 
		  
		  	$img_atts = wp_get_attachment_image_src( get_the_ID(), 'full');
			
			$att_columns = 3;
			if($wmfgallery_columns == 3){
				$att_columns = 4;
			}elseif($wmfgallery_columns == 4){
				$att_columns = 3;
			}elseif($wmfgallery_columns == 6){
				$att_columns = 2;
			}elseif($wmfgallery_columns == 12){
				$att_columns = 1;
			}
			
			if($ri % $att_columns == 0 && $att_columns > 0){
				$output .= '</div><div class="wmf-row">';
			}
			
			$ri = $ri + 1;
			
			$output .= '
			<div class="wmf-col-xs-'.$wmfgallery_columns.'">
			';
			if($pageportfolio == true){ $output .= '<div class="wmfthumbnail">';}else{$output .=  '<div class="wmfthumbnail2">';}
			
			if($wmfgallery_attlink == "false"){
				$output .='
					<a class="group1" href="'.$img_atts[0].'">
				';
			}else{
				$attachment = array();
				$attachment = WMF_get_attachment_meta(get_the_ID());
				if(!empty($attachment['linkurl'])){
					$output .='
						<a href="'.$attachment['linkurl'].'">
					';
				}else{
					$output .='
						<a href="#">
					';
				}
				
				
			}
			
			if(empty($wmfgallery_pbbgcolor) && empty($wmfgallery_pbcolor)){
				$output .='
					<img src="'.$img_atts[0].'" width="'.$img_atts[1].'" height="'.$img_atts[2].'" class="wmf-img wmf-img-responsive '.$wmfgallery_imgtype.'">
				';
			}elseif(!empty($wmfgallery_pbbgcolor) && !empty($wmfgallery_pbcolor) && $wmfgallery_atttitle != "false" && $wmfgallery_attdesc != "false"){
				$output .='
					<img src="'.$img_atts[0].'" width="'.$img_atts[1].'" height="'.$img_atts[2].'" class="wmf-img wmf-img-responsive '.$wmfgallery_imgtype.'"style="border-top-left-radius: '.$wmfgallery_pbradius.'px;border-top-right-radius: '.$wmfgallery_pbradius.'px;">
				';
			}else{
				$output .='
					<img src="'.$img_atts[0].'" width="'.$img_atts[1].'" height="'.$img_atts[2].'" class="wmf-img wmf-img-responsive '.$wmfgallery_imgtype.'">
				';
			}
			$output .='
				</a>
			';
			
			if($pageportfolio == true){ 
				
				if($wmfgallery_atttitle != "false" || $wmfgallery_attdesc != "false"){			
				
					if(empty($wmfgallery_pbbgcolor) && empty($wmfgallery_pbcolor)){
						$output .= '<div class="caption">';
					}else{
						$output .= '<div class="caption" style="background: '.$wmfgallery_pbbgcolor.';padding-left: 8px;padding-right: 8px;color: '.$wmfgallery_pbcolor.';border-bottom-left-radius: '.$wmfgallery_pbradius.'px;border-bottom-right-radius: '.$wmfgallery_pbradius.'px;">';
					}
				
				if($wmfgallery_atttitlelink != "false"){
					$attachment = array();
					$attachment = WMF_get_attachment_meta(get_the_ID());
					if(!empty($attachment['linkurl'])){
						$output .='
							<a href="'.$attachment['linkurl'].'">
						';
					}else{
						$output .='
							<a href="#">
						';
					}
				}
				
				if($wmfgallery_atttitle != "false"){
					if(empty($wmfgallery_pbbgcolor) && empty($wmfgallery_pbcolor)){
						$output .='<p class="title">'.get_the_title().'</p>';
					}else{
						$output .='<p class="title" style="background: '.$wmfgallery_pbbgcolor.';color: '.$wmfgallery_pbcolor.';">'.get_the_title().'</p>';
					}
				}
				
				if($wmfgallery_atttitlelink != "false"){
					$output .= '</a>';
				}
				
				if($wmfgallery_attdesc != "false"){
					$output .= '<p>'.get_the_content().'</p>';
				}
				$output .= '</div>';
				}
				
				
			}
			$output .='</div>';
			$output .='</div>';
		  
		  endwhile; 
		    $output .= '</div></div></div>';
			
			if( $wmfgallery_ppp != -1 ){
				$output .= '<div class="wmf-container"><div class="wmf-row"><div class="wmf-col-xs-12"><div class="page-numbers-center">';
					
					$big = 999999999;
					$output .= paginate_links(array(
						'base' => str_replace($big, '%#%', get_pagenum_link($big)),
						'format' => '?paged=%#%',
						'current' => max(1, $paged),
						'total' => $the_query->max_num_pages,
						'type' => 'list',
					));
					
				$output .= '</div></div></div></div>';
			}
		    
		  	wp_reset_postdata(); 
			
		  }else{
		   
		  	$output .= __( 'Sorry, no posts matched your criteria.', 'wmft2d' ); 
			$output .= '</div></div></div>';
		  } 
		  
		  
		
		if($wmfgallery_attlink == "false"){
			
			// Change viewer if mobile
			global $wmf_mobiledetect;
			
			if(empty($wmf_mobiledetect)){
				require_once('mobile-detect.php');
				$wmf_mobiledetect = new Mobile_Detect();
			}
		
			if( $wmf_mobiledetect->isMobile() || $wmf_mobiledetect->isTablet() ){	
			$output .= '<script>(function($) {$(document).ready(function(){ var myPhotoSwipe = $("#Gallery a").photoSwipe({ autoStartSlideshow: '.$wmfgallery_pautostart.' , allowUserZoom: '.$wmfgallery_pallowzoom.', slideshowDelay: '.$wmfgallery_pslideshowdelay.' }); }); })(jQuery);</script>';
			
			}else{
				if($wmfcolorbox_disable == false){
					$output .= '<script>
					(function($) {
						$(document).ready(function(){
							jQuery.extend(jQuery.colorbox.settings, {
								current: "'.__('image','wmft2d').' {current} '.__('of','wmft2d').' {total}",
								previous: "'.__('previous','wmft2d').'",
								next: "'.__('next','wmft2d').'t",
								close: "'.__('close','wmft2d').'",
								xhrError: "'.__('This content failed to load.','wmft2d').'",
								imgError: "'.__('This image failed to load.','wmft2d').'",
								slideshowStart: "'.__('Start slideshow','wmft2d').'",
								slideshowStop: "'.__('Stop slideshow','wmft2d').'"
							});
							
							$(".group1").colorbox({rel:"group1", transition:"'.$wmfgallery_ctransition.'", slideshowSpeed: '.$wmfgallery_cslidespeed.', slideshowAuto: '.$wmfgallery_cautostart.', slideshow: '.$wmfgallery_cslideshow.', maxWidth: "100%", maxHeight: "100%"}); 
						}); 
					})(jQuery);</script>';
				}else{
					$output .= '<script>(function($) {$(document).ready(function(){ var myPhotoSwipe = $("#Gallery a").photoSwipe({ autoStartSlideshow: '.$wmfgallery_pautostart.' , allowUserZoom: '.$wmfgallery_pallowzoom.', slideshowDelay: '.$wmfgallery_pslideshowdelay.' }); }); })(jQuery);</script>';
				}
			}
			
		}
		
		return $output;
	}	
	
	
/*-----------------------------------------------------------------------------------*/
/*	Functions
/*-----------------------------------------------------------------------------------*/	
	
	// Shortcode to list
	function WMF_gallery_columns_head($defaults) {  
		$defaults['shortcode_gallery']  = 'Shortcode';   
		return $defaults;  
		
	} 

	function WMF_gallery_columns_content($column_name, $post_ID) {  
		if ($column_name == 'shortcode_gallery') {  
			?>
            <input name="shortcodeforgallery" value='[wmf_gallery no="<?php echo $post_ID; ?>"][/wmf_gallery]' class="slider-meta-field" onclick="this.select()" />
            <?php
		}  
	} 
	
	//Remove Date column 
	function wmf_manage_gallery_columns( $columns ) {
	  unset($columns['date']);
	  return $columns;
	}
	
	function wmf_remove_date_gallery() {
	  add_filter( 'manage_wmfgallery_posts_columns' , 'wmf_manage_gallery_columns' );
	}
	add_action( 'admin_init' , 'wmf_remove_date_gallery' );



/*-----------------------------------------------------------------------------------*/
/*	Post Type
/*-----------------------------------------------------------------------------------*/	
function create_post_type_wmfgallery()
{
    register_post_type('wmfgallery', 
        array(
        'labels' => array(
            'name' => __('WMF Gallery & Portfolio', 'wmft2d'),
            'singular_name' => __('WMFGallery', 'wmft2d'),
            'add_new' => __('Add New', 'wmft2d'),
            'add_new_item' => __('Add New Gallery/Portfolio Item', 'wmft2d'),
            'edit' => __('Edit', 'wmft2d'),
            'edit_item' => __('Edit Gallery/Portfolio Item', 'wmft2d'),
            'new_item' => __('New Gallery/Portfolio Item', 'wmft2d'),
            'view' => __('View Gallery Item', 'wmft2d'),
            'view_item' => __('View Gallery Item', 'wmft2d'),
            'search_items' => __('Search Gallery Item', 'wmft2d'),
            'not_found' => __('No gallery item found', 'wmft2d'),
            'not_found_in_trash' => __('No gallery item found in Trash', 'wmft2d')
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
add_action("admin_init", "wmf_gallery_meta_box2");
function wmf_gallery_meta_box2(){  
    add_meta_box("WMFGalleryShowMeta2", __('Shortcode for This Gallery','wmft2d'), "wmf_gallery_options2", "wmfgallery", "side", "high");  
} 

function wmf_gallery_options2(){
	global $post; 
		 
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
    
?>
	<label><?php echo __('Please copy code below','wmft2d');?>:</label><br /><input name="shortcodeforgallery" value='[wmf_gallery no="<?php echo $post->ID; ?>"][/wmf_gallery]' class="slider-meta-field" onclick="this.select()" />
<?php
}

//Options Meta Box
add_action("admin_init", "wmf_gallery_meta_box");
function wmf_gallery_meta_box(){  
    add_meta_box("WMFGalleryShowMeta", __('Gallery Options','wmft2d'), "wmf_gallery_options", "wmfgallery", "side", "low");  
}  

function wmf_gallery_options(){  

        global $post; 
		 
        if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
        $custom = get_post_custom($post->ID);  
		
		if(isset($custom["wmfgallery_pautostart"][0]) == NULL or $custom["wmfgallery_pautostart"][0] == ""){$wmfgallery_pautostart = "false";}else{$wmfgallery_pautostart = $custom["wmfgallery_pautostart"][0];}	
		if(isset($custom["wmfgallery_pallowzoom"][0]) == NULL or $custom["wmfgallery_pallowzoom"][0] == ""){$wmfgallery_pallowzoom = "true";}else{$wmfgallery_pallowzoom = $custom["wmfgallery_pallowzoom"][0];}	
		if(isset($custom["wmfgallery_pslideshowdelay"][0]) == NULL or $custom["wmfgallery_pslideshowdelay"][0] == ""){$wmfgallery_pslideshowdelay = "3000";}else{$wmfgallery_pslideshowdelay = $custom["wmfgallery_pslideshowdelay"][0];}
		if(isset($custom["wmfgallery_columns"][0]) == NULL or $custom["wmfgallery_columns"][0] == ""){$wmfgallery_columns = "4";}else{$wmfgallery_columns = $custom["wmfgallery_columns"][0];}		
		if(isset($custom["wmfgallery_imgtype"][0]) == NULL or $custom["wmfgallery_imgtype"][0] == ""){$wmfgallery_imgtype = "default";}else{$wmfgallery_imgtype = $custom["wmfgallery_imgtype"][0];}		
		if(isset($custom["wmfgallery_ppp"][0]) == NULL or $custom["wmfgallery_ppp"][0] == ""){$wmfgallery_ppp = "-1";}else{$wmfgallery_ppp = $custom["wmfgallery_ppp"][0];}	
		if(isset($custom["wmfgallery_atttitle"][0]) == NULL or $custom["wmfgallery_atttitle"][0] == ""){$wmfgallery_atttitle = "false";}else{$wmfgallery_atttitle = $custom["wmfgallery_atttitle"][0];}
		if(isset($custom["wmfgallery_attdesc"][0]) == NULL or $custom["wmfgallery_attdesc"][0] == ""){$wmfgallery_attdesc = "false";}else{$wmfgallery_attdesc = $custom["wmfgallery_attdesc"][0];}	
		if(isset($custom["wmfgallery_attlink"][0]) == NULL or $custom["wmfgallery_attlink"][0] == ""){$wmfgallery_attlink = "false";}else{$wmfgallery_attlink = $custom["wmfgallery_attlink"][0];}	
		if(isset($custom["wmfgallery_atttitlelink"][0]) == NULL or $custom["wmfgallery_atttitlelink"][0] == ""){$wmfgallery_atttitlelink = "false";}else{$wmfgallery_atttitlelink = $custom["wmfgallery_atttitlelink"][0];}	
		if(isset($custom["wmfgallery_cslideshow"][0]) == NULL or $custom["wmfgallery_cslideshow"][0] == ""){$wmfgallery_cslideshow = "false";}else{$wmfgallery_cslideshow = $custom["wmfgallery_cslideshow"][0];}	
		if(isset($custom["wmfgallery_cautostart"][0]) == NULL or $custom["wmfgallery_cautostart"][0] == ""){$wmfgallery_cautostart = "false";}else{$wmfgallery_cautostart = $custom["wmfgallery_cautostart"][0];}	
		if(isset($custom["wmfgallery_ctransition"][0]) == NULL or $custom["wmfgallery_ctransition"][0] == ""){$wmfgallery_ctransition = "elastic";}else{$wmfgallery_ctransition = $custom["wmfgallery_ctransition"][0];}	
		if(isset($custom["wmfgallery_cslidespeed"][0]) == NULL or $custom["wmfgallery_cslidespeed"][0] == ""){$wmfgallery_cslidespeed = "3000";}else{$wmfgallery_cslidespeed = $custom["wmfgallery_cslidespeed"][0];}	
		if(isset($custom["wmfcolorbox_disable"][0]) == NULL or $custom["wmfcolorbox_disable"][0] == ""){$wmfcolorbox_disable = "true";}else{$wmfcolorbox_disable = $custom["wmfcolorbox_disable"][0];}	
		

?>  
        <label><strong><?php echo __('General Settings','wmft2d');?></strong></label><br />
        <div style="clear: both;border-top: 1px solid #f5f5f5;margin-top: -2px;border-bottom-color: #dfdfdf;border-width: 1px 0;border-style: solid; padding-top:5px; margin-bottom:10px; margin-left:0px; margin-right:0px;"></div>
        
        <label><?php echo __('Columns','wmft2d');?>:</label><br />
        <select name="wmfgallery_columns" id="wmfgallery_columns" class="slider-meta-field">
        <option value="12" <?php if($wmfgallery_columns == "12"){echo 'selected';}?>><?php echo __('1 Column','wmft2d');?></option>
        <option value="6" <?php if($wmfgallery_columns == "6"){echo 'selected';}?>><?php echo __('2 Columns','wmft2d');?></option>
        <option value="4" <?php if($wmfgallery_columns == "4"){echo 'selected';}?>><?php echo __('3 Columns','wmft2d');?></option>
        <option value="3" <?php if($wmfgallery_columns == "3"){echo 'selected';}?>><?php echo __('4 Columns','wmft2d');?></option>
        </select>
        
        <label><?php echo __('Image Type','wmft2d');?>:</label><br />
        <select name="wmfgallery_imgtype" id="wmfgallery_imgtype" class="slider-meta-field">
        <option value="default" <?php if($wmfgallery_imgtype == "default"){echo 'selected';}?>><?php echo __('Normal','wmft2d');?></option>
        <option value="rounded" <?php if($wmfgallery_imgtype == "rounded"){echo 'selected';}?>><?php echo __('Rounded','wmft2d');?></option>
        <option value="circle" <?php if($wmfgallery_imgtype == "circle"){echo 'selected';}?>><?php echo __('Circle','wmft2d');?></option>
        <option value="thumbnail" <?php if($wmfgallery_imgtype == "thumbnail"){echo 'selected';}?>><?php echo __('Thumbnail','wmft2d');?></option>
        </select>
        
        <label><?php echo __('Post Per Page','wmft2d');?>:</label><br /><input name="wmfgallery_ppp" value="<?php echo $wmfgallery_ppp; ?>" class="slider-meta-field" style="margin-bottom:2px" /><small><?php echo __('Only numeric. -1 is : unlimited & disable pagination.','wmft2d');?></small>
        <br/>
        <span style="padding-bottom:10px; display:block; clear:both;"></span>
        
        <label><strong><?php echo __('Portfolio Settings','wmft2d');?></strong></label><br />
        <div style="clear: both;border-top: 1px solid #f5f5f5;margin-top: -2px;border-bottom-color: #dfdfdf;border-width: 1px 0;border-style: solid; padding-top:5px; margin-bottom:2px; margin-left:0px; margin-right:0px;"></div>
        <small><?php echo __('Note: If any of portfolio setting enables. Then Image Type effect will be disable.','wmft2d');?></small>
        
        
        <span style="padding-bottom:10px; display:block; clear:both;"></span>
        <label><?php echo __('Show attachment title on the list','wmft2d');?>:</label>
        <label><input type="checkbox" class="ios-switch green  bigswitch" name="wmfgallery_atttitle" id="wmfgallery_atttitle" value="true" <?php if($wmfgallery_atttitle == "true"){ echo 'checked';}?> /><div><div></div></div></label>        
        
        
        <label><?php echo __('Show attachment desc. on the list','wmft2d');?>:</label>
        <label><input type="checkbox" class="ios-switch green  bigswitch" name="wmfgallery_attdesc" id="wmfgallery_attdesc" value="true" <?php if($wmfgallery_attdesc == "true"){ echo 'checked';}?> /><div><div></div></div></label>
        
        
        <label><?php echo __('Link image to attachment link url','wmft2d');?>:</label>
        <label><input type="checkbox" class="ios-switch green  bigswitch" name="wmfgallery_attlink" id="wmfgallery_attlink" value="true" <?php if($wmfgallery_attlink == "true"){ echo 'checked';}?> /><div><div></div></div></label>

        
        <label><?php echo __('Link Title to attachment link url','wmft2d');?>:</label>
        <label><input type="checkbox" class="ios-switch green  bigswitch" name="wmfgallery_atttitlelink" id="wmfgallery_atttitlelink" value="true" <?php if($wmfgallery_atttitlelink == "true"){ echo 'checked';}?> /><div><div></div></div></label>
        
        
        <span style="padding-bottom:10px; display:block; clear:both;"></span>
        
        <label><strong><?php echo __('Photo Swipe Settings (for Mobile)','wmft2d');?></strong></label><br />
        <div style="clear: both;border-top: 1px solid #f5f5f5;margin-top: -2px;border-bottom-color: #dfdfdf;border-width: 1px 0;border-style: solid; padding-top:5px; margin-bottom:10px; margin-left:0px; margin-right:0px;"></div>
        
        <label><?php echo __('Auto Start Slide Show','wmft2d');?>:</label>
        <label><input type="checkbox" class="ios-switch green  bigswitch" name="wmfgallery_pautostart" id="wmfgallery_pautostart" value="true" <?php if($wmfgallery_pautostart == "true"){ echo 'checked';}?> /><div><div></div></div></label>
        
        
        <label><?php echo __('Allow User Zoom','wmft2d');?>:</label>
        <label><input type="checkbox" class="ios-switch green  bigswitch" name="wmfgallery_pallowzoom" id="wmfgallery_pallowzoom" value="true" <?php if($wmfgallery_pallowzoom == "true"){ echo 'checked';}?> /><div><div></div></div></label>


        <label><?php echo __('Slide Show Delay(ms)','wmft2d');?>:</label><br /><input name="wmfgallery_pslideshowdelay" value="<?php echo $wmfgallery_pslideshowdelay; ?>" class="slider-meta-field" />
        <span style="padding-bottom:10px; display:block; clear:both;"></span>
       
       
        <label><strong><?php echo __('Colorbox Settings (for Desktop)','wmft2d');?></strong></label><br />
        <div style="clear: both;border-top: 1px solid #f5f5f5;margin-top: -2px;border-bottom-color: #dfdfdf;border-width: 1px 0;border-style: solid; padding-top:5px; margin-bottom:10px; margin-left:0px; margin-right:0px;"></div>
        
        
        <label><?php echo __('Disable Colorbox','wmft2d');?>:</label>
        <label><input type="checkbox" class="ios-switch green  bigswitch" name="wmfcolorbox_disable" id="wmfcolorbox_disable" value="true" <?php if($wmfcolorbox_disable == "true"){ echo 'checked';}?> /><div><div></div></div></label>
        
        
        <label><?php echo __('Slide Show Feature','wmft2d');?>:</label>
        <label><input type="checkbox" class="ios-switch green  bigswitch" name="wmfgallery_cslideshow" id="wmfgallery_cslideshow" value="true" <?php if($wmfgallery_cslideshow == "true"){ echo 'checked';}?> /><div><div></div></div></label>
        
        
        <label><?php echo __('Auto Start Slide Show','wmft2d');?>:</label>
        <label><input type="checkbox" class="ios-switch green  bigswitch" name="wmfgallery_cautostart" id="wmfgallery_cautostart" value="true" <?php if($wmfgallery_cautostart == "true"){ echo 'checked';}?> /><div><div></div></div></label>
        
        
        <label><?php echo __('Transition Effect','wmft2d');?>:</label><br />
        <select name="wmfgallery_ctransition" id="wmfgallery_ctransition" class="slider-meta-field">
        <option value="none" <?php if($wmfgallery_ctransition == "none"){echo 'selected';}?>><?php echo __('None','wmft2d');?></option>
        <option value="elastic" <?php if($wmfgallery_ctransition == "elastic"){echo 'selected';}?>><?php echo __('Elastic','wmft2d');?></option>
        <option value="fade" <?php if($wmfgallery_ctransition == "fade"){echo 'selected';}?>><?php echo __('Fade','wmft2d');?></option>
        </select>
        
        <label><?php echo __('Slide Show Speed','wmft2d');?>:</label><br /><input name="wmfgallery_cslidespeed" value="<?php echo $wmfgallery_cslidespeed; ?>" class="slider-meta-field" style="margin-bottom:2px" /><small><?php echo __('If slide show enabled.','wmft2d');?></small>
        
        
       
<?php  
}  
		

add_action('save_post', 'save_wmfgallery_link'); 
  
function save_wmfgallery_link(){  
    global $post;  
	global $post_type;  
	
	
    if($post_type == "wmfgallery" ){
		
		if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){ 
			return $post_id;
			 
		}else{
			if(!empty($post->ID)){
			
				if(!empty($_POST["wmfgallery_pautostart"])){update_post_meta($post->ID, "wmfgallery_pautostart", $_POST["wmfgallery_pautostart"]); }else{update_post_meta($post->ID, "wmfgallery_pautostart", 'false');};
				if(!empty($_POST["wmfgallery_pallowzoom"])){update_post_meta($post->ID, "wmfgallery_pallowzoom", $_POST["wmfgallery_pallowzoom"]); }else{update_post_meta($post->ID, "wmfgallery_pallowzoom", 'false');};
				if(!empty($_POST["wmfgallery_pslideshowdelay"])){update_post_meta($post->ID, "wmfgallery_pslideshowdelay", $_POST["wmfgallery_pslideshowdelay"]); };
				if(!empty($_POST["wmfgallery_columns"])){update_post_meta($post->ID, "wmfgallery_columns", $_POST["wmfgallery_columns"]); };
				if(!empty($_POST["wmfgallery_imgtype"])){update_post_meta($post->ID, "wmfgallery_imgtype", $_POST["wmfgallery_imgtype"]); };
				if(!empty($_POST["wmfgallery_ppp"])){update_post_meta($post->ID, "wmfgallery_ppp", $_POST["wmfgallery_ppp"]); };
				if(!empty($_POST["wmfgallery_atttitle"])){update_post_meta($post->ID, "wmfgallery_atttitle", $_POST["wmfgallery_atttitle"]); }else{update_post_meta($post->ID, "wmfgallery_atttitle", 'false');};
				if(!empty($_POST["wmfgallery_attdesc"])){update_post_meta($post->ID, "wmfgallery_attdesc", $_POST["wmfgallery_attdesc"]); }else{update_post_meta($post->ID, "wmfgallery_attdesc", 'false');};
				if(!empty($_POST["wmfgallery_attlink"])){update_post_meta($post->ID, "wmfgallery_attlink", $_POST["wmfgallery_attlink"]); }else{update_post_meta($post->ID, "wmfgallery_attlink", 'false');};
				if(!empty($_POST["wmfgallery_atttitlelink"])){update_post_meta($post->ID, "wmfgallery_atttitlelink", $_POST["wmfgallery_atttitlelink"]); }else{update_post_meta($post->ID, "wmfgallery_atttitlelink", 'false');};
				if(!empty($_POST["wmfcolorbox_disable"])){update_post_meta($post->ID, "wmfcolorbox_disable", $_POST["wmfcolorbox_disable"]); }else{update_post_meta($post->ID, "wmfcolorbox_disable", 'false');};
				if(!empty($_POST["wmfgallery_cslideshow"])){update_post_meta($post->ID, "wmfgallery_cslideshow", $_POST["wmfgallery_cslideshow"]); }else{update_post_meta($post->ID, "wmfgallery_cslideshow", 'false');};
				if(!empty($_POST["wmfgallery_cautostart"])){update_post_meta($post->ID, "wmfgallery_cautostart", $_POST["wmfgallery_cautostart"]); }else{update_post_meta($post->ID, "wmfgallery_cautostart", 'false');};
				if(!empty($_POST["wmfgallery_ctransition"])){update_post_meta($post->ID, "wmfgallery_ctransition", $_POST["wmfgallery_ctransition"]); };
				if(!empty($_POST["wmfgallery_cslidespeed"])){update_post_meta($post->ID, "wmfgallery_cslidespeed", $_POST["wmfgallery_cslidespeed"]); };
			
			}
			
		} 
	}
}  



// Register things
add_action('init', 'create_post_type_wmfgallery'); 

add_filter('manage_wmfgallery_posts_columns', 'WMF_gallery_columns_head', 10);  
add_action('manage_wmfgallery_posts_custom_column', 'WMF_gallery_columns_content', 10, 2); 
?>
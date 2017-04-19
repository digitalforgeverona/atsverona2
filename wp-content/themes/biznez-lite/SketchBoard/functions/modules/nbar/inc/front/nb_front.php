<?php
if(!is_admin()){
	include_once('nb_front_func.php');
	$nbar_settingOpts = get_option('notificationbar_settings');
	global $wp_query;

	if(is_404() || is_search()){
		$nbar_disable = true;
		$nbar_check = true;
	}else{
		$nbar_pageId = $wp_query->post->ID;
		$nbar_disable = get_post_meta($nbar_pageId, 'nbar_disable', true);
		$nbar_check = get_post_meta($nbar_pageId, 'nbar_check', true);
	}
	
	if(!$nbar_disable){ 
		if($nbar_check){
			$nbar_getnbarID = get_post_meta($nbar_pageId, 'nbar_selection', true);
			$nbar_nbarName = nbar_getnbarName($nbar_getnbarID);
			$nbar_active = nbar_isActive($nbar_getnbarID);
			if($nbar_active){
				nbar_addStyles($nbar_nbarName);
				nbar_addHTML($nbar_nbarName);
				nbar_calljQfunc($nbar_nbarName);
			}
			else{}
		}//if notification bar set on the page
		else{
		
			if($nbar_settingOpts['nbar_settingchk']){
			
				$nbar_DefaultnbarID = $nbar_settingOpts['nbar_setDfltnbar'];
				$nbar_nbarName = nbar_getnbarName($nbar_DefaultnbarID);
				$nbar_active = nbar_isActive($nbar_DefaultnbarID);
				if($nbar_active){
					if(is_page() && $nbar_settingOpts['nbar_setDfltnbar'] && !is_front_page()){
						nbar_addStyles($nbar_nbarName);
						nbar_addHTML($nbar_nbarName);
						nbar_calljQfunc($nbar_nbarName);
					}
					elseif(is_front_page() && $nbar_settingOpts['nbar_setDfltnbar']){
						nbar_addStyles($nbar_nbarName);
						nbar_addHTML($nbar_nbarName);
						nbar_calljQfunc($nbar_nbarName);
					}
					elseif(is_single() && $nbar_settingOpts['nbar_setDfltnbar']){
						nbar_addStyles($nbar_nbarName);
						nbar_addHTML($nbar_nbarName);
						nbar_calljQfunc($nbar_nbarName);
					}
					elseif(is_home() && $nbar_settingOpts['nbar_setDfltnbar']){
						nbar_addStyles($nbar_nbarName);
						nbar_addHTML($nbar_nbarName);
						nbar_calljQfunc($nbar_nbarName);
					}
					elseif(is_category() && $nbar_settingOpts['nbar_setDfltnbar']){
						nbar_addStyles($nbar_nbarName);
						nbar_addHTML($nbar_nbarName);
						nbar_calljQfunc($nbar_nbarName);
					}
					elseif(is_tax() && $nbar_settingOpts['nbar_setDfltnbar']){
						nbar_addStyles($nbar_nbarName);
						nbar_addHTML($nbar_nbarName);
						nbar_calljQfunc($nbar_nbarName);
					}
					elseif(is_tag() && $nbar_settingOpts['nbar_setDfltnbar']){
						nbar_addStyles($nbar_nbarName);
						nbar_addHTML($nbar_nbarName);
						nbar_calljQfunc($nbar_nbarName);
					}		
					elseif(is_date() && $nbar_settingOpts['nbar_setDfltnbar']){
						nbar_addStyles($nbar_nbarName);
						nbar_addHTML($nbar_nbarName);
						nbar_calljQfunc($nbar_nbarName);
					}
					elseif(is_author() && $nbar_settingOpts['nbar_setDfltnbar']){
						nbar_addStyles($nbar_nbarName);
						nbar_addHTML($nbar_nbarName);
						nbar_calljQfunc($nbar_nbarName);
					}
					elseif(is_author() && $nbar_settingOpts['nbar_setDfltnbar']){
						nbar_addStyles($nbar_nbarName);
						nbar_addHTML($nbar_nbarName);
						nbar_calljQfunc($nbar_nbarName);
					}
				}//if notificationbar is enable for pages or posts or homepage or blogpage 
				else{}
			}//if default notificationbar is enable
			else{}
		}
	}//if notification bar not disable for page/post
	else{ }
}//if is not admin 
?>
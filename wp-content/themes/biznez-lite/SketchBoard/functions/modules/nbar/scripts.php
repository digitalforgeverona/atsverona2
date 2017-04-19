<?php
if (isset($_GET['page']) && $_GET['page'] == 'nbar_edit') {
add_action('admin_print_scripts', 'nbarpro_upload_admin_scripts');
add_action('admin_print_styles', 'nbarpro_upload_admin_styles');
}
add_action('admin_init', 'nb_admin_scripts');
add_action('wp_enqueue_scripts', 'nb_front_scripts');
function nb_admin_scripts(){
	if(is_admin()){
		if(isset($_REQUEST['page']) && ($_REQUEST['page']=="notificationbar" || $_REQUEST['page']=="nbar_edit")){
			wp_enqueue_script('jquery');
			wp_enqueue_script('farbtastic');
			if($_REQUEST['page']=="nbar_edit"){
				wp_enqueue_script('nb_color-js',NBARPROPLUGIN_URL.'inc/admin/js/nb_color.js',array('jquery'));
			}
		}
		wp_register_script('nb_admin-js',NBARPROPLUGIN_URL.'inc/admin/js/nb_admin.js',array('jquery'));
		wp_enqueue_script('nb_admin-js');
		wp_enqueue_style('farbtastic');
		wp_register_style('nb_admin-css',NBARPROPLUGIN_URL.'inc/admin/css/nb_admin.css',false, '1.0.0');
		wp_enqueue_style('nb_admin-css');
	}
}
function nb_front_scripts() {	
	if(!is_admin()){
		wp_enqueue_script('jquery');
		wp_register_script('nb_front-js',NBARPROPLUGIN_URL.'inc/front/js/notificationbar.js', array('jquery'));
		wp_enqueue_script('nb_front-js');
		
		wp_register_style('nb_front-css',NBARPROPLUGIN_URL.'inc/front/css/notificationbar.css');
		wp_enqueue_style('nb_front-css');
	}
}
function nbarpro_upload_admin_scripts() {
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
}
 
function nbarpro_upload_admin_styles() {
	wp_enqueue_style('thickbox');
}
?>
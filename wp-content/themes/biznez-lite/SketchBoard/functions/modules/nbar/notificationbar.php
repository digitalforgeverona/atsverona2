<?php
//----------------------------------------------------------------------------------
/*---Load Required Files------------------------------
----------------------------------------------------*/
include_once('scripts.php');
include_once('inc/admin/nb_admin-options.php');
define('NBARPROPLUGIN_URL', get_template_directory_uri().'/SketchBoard/functions/modules/nbar/');
define('NBARPROPLUGIN_PATH', get_theme_root().'/SketchBoard/functions/modules/nbar/');
//---------------------------------------------------

//This function will create new database fields with default values
function nbar_defaults(){
	    $default = array(
		'defaultposition' => 'top',
		'defaultState' => 'open',
		'stayTime' => '10',
		'colorScheme' => '#23ADCF',
        'message' => 'Get my Subscription',
		'messageFont' => '12',
    	'messageColor' => '#f3eeee',
		'linkUrl'=> '#',
    	'linkText' => 'Click here',
		'linkFont' => '12',
		'linkTextColor' => '#fbf8e6',
		'linkBgcolor' => '#57380b',
		'linkTarget' => '_blank',
		'facebookUrl'=> 'https://www.facebook.com/',
		'twitterUrl'=> 'https://twitter.com/',
		'linkedinUrl'=> 'http://www.linkedin.com/',
		'googleUrl'=> 'http://www.google.com/',
		'rssUrl'=> '',
		'facebookLike'=> 'yes',
		'extendMesg' => 'true',
		'extendMesgState' => 'open',
		'extendMesgCmsg' => 'no',
		'extMesgOpenTime' => '4',
		'extMesgCloseTime' => '4',
		'extendMesgTemplate' => 'template-3',
		'extendMesgText' => 'Extend Message goes here..',
		'extendMesgFont' => '12',
		'extendMesgColor' => '#ffffff',
		'extendMesgImg' => NBARPROPLUGIN_URL.'/inc/images/default.jpg',
		'extendMesgImgWidth' => '150',
		'extendMesgImgHeight' => '150',
		'extendMesgImgBorder' => '2',
		'extendMesgImgBorderCol' => '#fff',
		'extendMesgLinkUrl'=> '#',
		'extendMesgLinkText' => 'More..',
		'extendMesgLinkFont' => '12',
		'extendMesgLinkColor' => '#fde8c0',
		'extendMesgLinkBgcolor' => '#62562e',
		'extendMesgLinkTarget' => '_blank'
    );
return $default;
}

function nbar_settings(){
	    $defaultSettings = array(
		'nbar_settingchk' => 'true',
		'nbar_setDfltnbar' => '1'
    );
return $defaultSettings;
}

add_action('admin_menu', 'nbar_plugin_admin_menu',12);
function nbar_plugin_admin_menu() {
	global $shortname;
	add_theme_page('Add Notification Bar', ucwords($shortname).' NBar', 'publish_posts', 'notificationbar','add_notification_bar');
	add_theme_page('Edit Notification Bar', '','publish_posts','nbar_edit','edit_notification_bar');
}


function notificationbar_plugin_install() 
{
	global $wpdb;
	$table_name = $wpdb->prefix . "notificationbar"; 
	
	if(!(mysql_num_rows( mysql_query("SHOW TABLES LIKE '".$table_name."'"))))// check, if table exists or not
	{
		add_option('notificationbar_options', nbar_defaults());
		add_option('notificationbar_withtheme','registered');
		add_option('notificationbar_settings', nbar_settings());
		nbar_install();

		$sql = "INSERT INTO " . $table_name . " values ('','notificationbar_options','1');";
		$wpdb->query( $sql );
	}
}

//notification bar Table
function nbar_install(){
    global $wpdb;
	$table_name = $wpdb->prefix . "notificationbar"; 
		$sql = "CREATE TABLE " . $table_name . " (
		  id mediumint(9) NOT NULL AUTO_INCREMENT,
		  option_name VARCHAR(255) NOT NULL DEFAULT  'notificationbar_options',
		  active tinyint(1) NOT NULL DEFAULT  '0',
		  PRIMARY KEY (`id`),
          UNIQUE (
                    `option_name`
            )
		);";
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql);
}

add_action( 'after_setup_theme', 'notificationbar_plugin_install' );

// get notificationbar version
function nbar_get_version(){
	return "2.0.6";
}

add_action('wp_ajax_nbpro_saved' ,'nbpro_edit_saved');
function nbpro_edit_saved(){
	check_ajax_referer('nbpro-options-data', 'security');
	$data = $_POST;
	unset($data['security'], $data['action']);
	$nbar_itemnameopt = $data['nbar_itemname'];
	$data_arr = $data[$nbar_itemnameopt];
	
	if(update_option($nbar_itemnameopt, $data_arr)){
		die('1');
	} else {
		die('0');
	}
}

// add notification bar on frontend 
function nbar_addon_front(){
	include_once('inc/front/nb_front.php');
}
add_action('wp_footer','nbar_addon_front');

//----------------------------------------------------------------------------------
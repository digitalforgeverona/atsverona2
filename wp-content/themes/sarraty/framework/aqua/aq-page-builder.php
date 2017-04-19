<?php
/** بسم الله الرحمن الرحيم **

Plugin Name: Aqua Page Builder
Plugin URI: http://aquagraphite.com/page-builder
Description: Easily create custom page templates with intuitive drag-and-drop interface. Requires PHP5 and WP3.5
Version: 1.1.1
Author: Syamil MJ
Author URI: http://aquagraphite.com

*/
 
/**
 * Copyright (c) 2013 Syamil MJ. All rights reserved.
 *
 * Released under the GPL license
 * http://www.opensource.org/licenses/gpl-license.php
 *
 * This is an add-on for WordPress
 * http://wordpress.org/
 *
 * **********************************************************************
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * **********************************************************************
 */

//definitions
if(!defined('AQPB_VERSION')) define( 'AQPB_VERSION', '1.1.1' );
if(!defined('AQPB_PATH')) define( 'AQPB_PATH', plugin_dir_path(__FILE__) );
if(!defined('AQPB_DIR')) define( 'AQPB_DIR', plugin_dir_url(__FILE__) );

//required functions & classes
require_once(AQPB_PATH . 'functions/aqpb_config.php');
require_once(AQPB_PATH . 'functions/aqpb_blocks.php');
require_once(AQPB_PATH . 'classes/class-aq-page-builder.php');
require_once(AQPB_PATH . 'classes/class-aq-block.php');
//require_once(AQPB_PATH . 'classes/class-aq-plugin-updater.php');
require_once(AQPB_PATH . 'functions/aqpb_functions.php');

//some default blocks
require_once(AQPB_PATH . 'blocks/aq-text-block.php');
// require_once(AQPB_PATH . 'blocks/aq-richtext-block.php');
require_once(AQPB_PATH . 'blocks/aq-sep-block.php');
require_once(AQPB_PATH . 'blocks/aq-prog-block.php');
require_once(AQPB_PATH . 'blocks/aq-projects-block.php');
require_once(AQPB_PATH . 'blocks/aq-testicarousel-block.php');
require_once(AQPB_PATH . 'blocks/aq-bloglist-block.php');
require_once(AQPB_PATH . 'blocks/aq-clients-block.php');
require_once(AQPB_PATH . 'blocks/aq-service-block.php');
require_once(AQPB_PATH . 'blocks/aq-action-block.php');
require_once(AQPB_PATH . 'blocks/aq-map-block.php');
require_once(AQPB_PATH . 'blocks/aq-video-block.php');
// require_once(AQPB_PATH . 'blocks/aq-clear-block.php');
require_once(AQPB_PATH . 'blocks/aq-widgets-block.php');
// require_once(AQPB_PATH . 'blocks/aq-space-block.php');
require_once(AQPB_PATH . 'blocks/aq-alert-block.php');
require_once(AQPB_PATH . 'blocks/aq-tabs-block.php');
require_once(AQPB_PATH . 'blocks/aq-revslider-block.php');
require_once(AQPB_PATH . 'blocks/aq-pricing-block.php');
require_once(AQPB_PATH . 'blocks/aq-image-block.php');
// require_once(AQPB_PATH . 'blocks/aq-richtext-block.php'); //buggy

require_once(AQPB_PATH . 'blocks/aq-alertbox-block.php');
require_once(AQPB_PATH . 'blocks/aq-promo-block.php');
require_once(AQPB_PATH . 'blocks/aq-steps-block.php');
require_once(AQPB_PATH . 'blocks/aq-start-block.php');
require_once(AQPB_PATH . 'blocks/aq-end-block.php');
require_once(AQPB_PATH . 'blocks/aq-team-block.php');

//register default blocks
aq_register_block('AQ_Text_Block');
aq_register_block('AQ_prog_Block');
aq_register_block('AQ_Image_Block'); // kristal image block
aq_register_block('AQ_service_Block'); //kristal service block
aq_register_block('AQ_projects_Block'); //kristal projects block
aq_register_block('AQ_testicar_Block'); //kristal testimonials block
aq_register_block('AQ_bloglist_Block'); //kristal bloglist block
aq_register_block('AQ_clients_Block'); //kristal clients block
aq_register_block('AQ_team_Block'); //kristal clients block
aq_register_block('AQ_action_Block'); //kristal action block
aq_register_block('AQ_map_Block'); //kristal map block
aq_register_block('AQ_video_Block'); //kristal video block
// aq_register_block('AQ_Space_Block');
aq_register_block('AQ_Alert_Block'); //kristal alert block
aq_register_block('AQ_Tabs_Block'); //kristal tabs block
aq_register_block('AQ_Rev_Block'); //kristal revolution slider block
aq_register_block('AQ_sep_Block'); //kristal shadow block
aq_register_block('AQ_Pricing_Block'); //kristal pricing block

aq_register_block('AQ_alertbox_Block'); //kristal alertbox block
aq_register_block('AQ_promo_Block'); //kristal promo block
aq_register_block('AQ_steps_Block'); //kristal steps block
aq_register_block('AQ_Start_Block'); //kristal steps block
aq_register_block('AQ_End_Block'); //kristal steps block

aq_register_block('AQ_Widgets_Block'); //kristal steps block

//fire up page builder
$aqpb_config = aq_page_builder_config();
$aq_page_builder = new AQ_Page_Builder($aqpb_config);
if(!is_network_admin()) $aq_page_builder->init();

/** @legacy
//set up & fire up plugin updater
$aqpb_updater_config = array(
	'api_url'	=> 'http://aquagraphite.com/api/',
	'slug'		=> 'aqua-page-builder',
	'filename'	=> 'aq-page-builder.php'
);
$aqpb_updater = new AQ_Plugin_Updater($aqpb_updater_config);
*/

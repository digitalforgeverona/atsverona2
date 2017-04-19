<?php
//-- Notification Bar Setting Option ------------------------------------------
//-----------------------------------------------------------------------------
function settings_notification_bar(){
	global $nbar_message; 
    global $wpdb;
	$table_name = $wpdb->prefix . "notificationbar"; 
    $nbar_data = $wpdb->get_results("SELECT * FROM $table_name where active='1' ORDER BY id DESC");
	$nbar_getOpts = get_option('notificationbar_settings');
?>
	
	<form class="nbar_editform" id="nbar_settfrm" name="nbar_settings" method="post" action="">
		<div class="nbpro_extmsg_chk" style="margin: 0 0 -5px 0px;"><label class="nbpro_mkchk <?php if($nbar_getOpts['nbar_settingchk']){ ?>checked<?php } ?>" for="nbar_settchk"></label><input type="checkbox" class="nbpro_chkbox" id="nbar_settchk"  name="notificationbar_settings[nbar_settingchk]" <?php if($nbar_getOpts['nbar_settingchk']){ ?> checked <?php } ?> value="true"/> <?php _e('Enable "Global Notification Bar" ','biznez-lite'); ?></div>
		<div class="nbpro_extendbox nbar_setblock" style="margin-left:0px;<?php if($nbar_getOpts['nbar_settingchk']){ ?>display:block;<?php }else{ ?>display:none;<?php } ?>">
			<div class="nbpro_topbdr"></div>
			<div class="nbpro_midbdr">
				<div class="nbar_setting">
					<table style="width: 100%" class="nbar_settbl" cellpadding="9" >
						<tr>
							<td style="width: 170px !important;"><?php _e("Default Notification Bar:",'biznez-lite'); ?></td>
							<td>
								<select name="notificationbar_settings[nbar_setDfltnbar]">
									<?php
									foreach ($nbar_data as $data) { 
									   ?><option  value="<?php echo $data->id; ?>" <?php if($nbar_getOpts['nbar_setDfltnbar'] == $data->id ){ echo 'selected="selected"'; }?>><?php echo $data->option_name; ?></option><?php
									}
									?>
								</select>
								<a class="nbar_tooltip" title="<?php _e('This Notification Bar will be used for all Posts,Pages and Categories until you have not selected in page/post editor.','biznez-lite'); ?>"></a>
							</td>
						</tr>
						<tr><td colspan="2" class="protheme"></td></tr>
						<tr>
						<table class="nbar_settbl proborder">
						<tr><td colspan="2"><?php _e("Where to show Default Notification Bar:",'biznez-lite'); ?></td></tr>
						<tr class="">
							<td colspan="2">
								<label for="nbar_pages" class="" ><input type="checkbox" class="nbpro_smallchkbox" name="" id="nbar_pages" value="true" />&nbsp;<?php _e("Pages",'biznez-lite'); ?></label>
								<label for="nbar_posts" class="" ><input type="checkbox" class="nbpro_smallchkbox" name="" id="nbar_posts" value="true" />&nbsp;<?php _e("Posts",'biznez-lite'); ?></label>
								<label for="nbar_homep" class="" ><input type="checkbox" class="nbpro_smallchkbox" name="" id="nbar_homep" value="true" />&nbsp;<?php _e("Home Page",'biznez-lite'); ?></label>
								<label for="nbar_blogp" class="" ><input type="checkbox" class="nbpro_smallchkbox" name="" id="nbar_blogp" value="true" />&nbsp;<?php _e("Blog Page",'biznez-lite'); ?></label>		
								<label for="nbar_catgs" class="" ><input type="checkbox" class="nbpro_smallchkbox" name="" id="nbar_catgs" value="true" />&nbsp;<?php _e("Categories",'biznez-lite'); ?></label>	
								<label for="nbar_ctaxs" class="" ><input type="checkbox" class="nbpro_smallchkbox" name="" id="nbar_ctaxs" value="true" />&nbsp;<?php _e("Custom Taxonomies",'biznez-lite'); ?></label>		
								<label for="nbar_tags"  class="" ><input type="checkbox" class="nbpro_smallchkbox" name="" id="nbar_tags" value="true" />&nbsp;<?php _e("Tags",'biznez-lite'); ?></label>		
								<label for="nbar_date"  class="" ><input type="checkbox" class="nbpro_smallchkbox" name="" id="nbar_date" value="true" />&nbsp;<?php _e("Date Archive",'biznez-lite'); ?></label>													
								<label for="nbar_auth"  class="" ><input type="checkbox" class="nbpro_smallchkbox" name="" id="nbar_auth" value="true" />&nbsp;<?php _e("Author Page",'biznez-lite'); ?></label>													
							</td>                                             
						</tr>
						</tr>
						</table>
					</table>
				</div>	
				<div class="nbpro_clear"></div>
			</div>
			<div class="nbpro_btmbdr"></div>
		</div>
		<p class="button-controls"><input type="submit" name="nbar_settingsave" value="Save Setting" style="margin-left: 10px;"></p>
	</form>
<?php
}

//-- Updated notification bar Settings ----------------------------------------
//-----------------------------------------------------------------------------
if(isset($_REQUEST['nbar_settingsave'])) {
    update_option('notificationbar_settings',nbar_updateSettings());
}

function nbar_updateSettings(){
		$nbar_settingOption = $_REQUEST['notificationbar_settings'];
	    $nbar_updateset = array(
		'nbar_settingchk' => $nbar_settingOption['nbar_settingchk'],
		'nbar_setDfltnbar' => $nbar_settingOption['nbar_setDfltnbar']
	);
return $nbar_updateset;
}
?>
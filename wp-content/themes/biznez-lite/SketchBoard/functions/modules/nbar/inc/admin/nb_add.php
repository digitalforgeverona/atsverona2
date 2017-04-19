<?php
//-- Get all Notification Bars from Database ----------------------------------
//-----------------------------------------------------------------------------
function get_nbars()
{  
    global $wpdb;$num=1;
	$table_name = $wpdb->prefix . "notificationbar"; 
    $nbar_data = $wpdb->get_results("SELECT * FROM $table_name ORDER BY id");
	?>
	<div class="nbpro_topbdr"></div>
	<div class="nbpro_midbdr">
		<table border="0" cellspacing="0" style="margin: 0 8px;width: 98%;">
			<tbody>
				<?php
				foreach ($nbar_data as $data) { 
					
					if($data->active == '1')
					{ $active='<a href="?page=notificationbar&nbar_deactivate='.$data->id.'" class="nbardeactive_button proborder"></a>';
					  $disabled='';
					}
					else{
						if($data->active == '0'){
							$active='<a href="?page=notificationbar&nbar_activate='.$data->id.'" class="nbaractive_button proborder"></a>';
							$disabled='disabled="disabled"';
							}
						}
					
					echo '<tr class="nbar_tr1"><td style=" width: 89px !important;">'.$data->id.'</td><td valign="middle" style="text-align: center;width: 217px !important;"> '.$data->option_name.' </td><td style="  padding-left: 29px;width: 90px !important;">
					<a href="?page=nbar_edit&edit='.$data->option_name.'" class="nbaredit_button" '.$disabled.'></a>        
					</td><td style="padding-left: 46px;width: 100px !important;"> '.$active.' </td>
					<td style="padding-left: 29px;"> <a href="?page=notificationbar&nbar_delete='.$data->option_name.'" onclick="return nbar_delconfirm(\''.$data->option_name.'\');" class="nbar_del proborder"></a> </td></tr>';
					$num++;
				}
				?>
			</tbody>
		</table>	
		<div class="nbpro_clear"></div>
	</div>
	<div class="nbpro_btmbdr">
		<form method="post" action="?page=notificationbar&add=1">
		<table class="proborder" cellspacing="0" style="margin: 0 12px;width: 95%;">
		   <tr class="nbar_tr2"> 
			   <td><?php echo ($data->id+1); ?> </td>
			   <td><input class="large_text_box" type="text" id="nabr_option_name" name="nabr_option_name" size="23" />
			   <td><font style="font-size:10px;color:#A40B0B">&nbsp;&nbsp;<?php _e("* Do not use spaces or special characters.",'biznez-lite'); ?></font></td>    
			   </td>
			   <td colspan="2"><input type="submit" style="margin-top: 2px;" value="" name="nbar_newadd" /></td>
		   </tr>
		</table>
	   </form>
	</div>
    <?php
}

//-- Add Notification Bar (Function) ------------------------------------------
//-----------------------------------------------------------------------------
function add_notification_bar()
{
?>
<div id="nbpro_wrapper">
	<div class="nbpro_head"><div class="nbpro_title"></div></div>
	<div id="nbar_addwrap" class="nbpro_cont">
	
		<div class="nbpro_leftbox">
			
			<div id="nbar_addwrap">
				<div class="nbpro_settings">
					<div class="nbpro_distxt"><?php _e('DEFAULT (GLOBAL) NB SETTINGS','biznez-lite'); ?></div>
					<div class="nbpro_savebox"><a class="nbpro_plus_minus" href="Javascript:void(0);"></a><div class="nbpro_clear"></div></div><div class="nbpro_clear"></div>
				</div>
				<div class="nbpro_extendbox">
					<?php settings_notification_bar(); ?>
				</div>

				<div class="nbpro_settings">
					<div class="nbpro_distxt"><?php _e('TABLE OF NOTIFICATION BARS','biznez-lite'); ?></div>
					<div class="nbpro_savebox"><a class="nbpro_plus_minus" href="Javascript:void(0);"></a><div class="nbpro_clear"></div></div><div class="nbpro_clear"></div>
				</div>
				<div class="nbpro_extendbox">
					<?php get_nbars(); ?>
				</div>
			</div>

		</div>
		<div class="nbpro_clear"></div>
	</div>
</div>
<?php
}
//-----------------------------------------------------------------------------
?>
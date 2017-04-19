<?php
function edit_notification_bar(){
global $nbar_message; 
$option=$_GET['edit'];
global $wpdb;
$table_name = $wpdb->prefix . "notificationbar"; 
$nbar_data = $wpdb->get_results("SELECT * FROM $table_name where active='1' ORDER BY id DESC");
?>
<div id="nbpro_wrapper">
	<div class="nbpro_head"><div class="nbpro_title"></div></div>
	<div class="nbpro_cont">
		<div class="nbpro_leftbox">
		
			<div class="nbpro_block">
				<div class="nbpro_settings" style="border-radius:0 !important;border: 5px solid #0F344C !important;margin-bottom: 30px;">
					<div style=" width: 320px;" class="nbpro_distxt"><?php _e('SELECT NOTIFICATION BAR','biznez-lite'); ?></div>
						<form method="get" action="">
							<div style="float:left;margin-top:14px;">
								<select style="font-family: bitter;font-size: 14px; height: 27px; width: 210px;" name="edit"> 	
									<?php
									foreach ($nbar_data as $data) { 
									   ?><option <?php selected($data->option_name,$_REQUEST['edit']); ?>  value="<?php echo $data->option_name ?>"><?php echo $data->option_name; ?></option><?php
									}
									?>
								</select><a class="nbar_tooltip" title="<?php _e('Select Notification Bar to edit.','biznez-lite'); ?>"></a>
							</div>
							<input type="hidden" name="page" value="nbar_edit" />
							<input id="nbar_seledit" type="submit" value="" />
						</form>
					<div class="nbpro_clear"></div>
				</div>
			</div>

			<div class="nbpro_topbox">
				<a title="goto back" class="nbar_backto" href="?page=notificationbar"></a>
				<a class="nbpro_expCol" title="Expand/Collapse" href="Javascript:void(0);"></a>
				<div class="nbpro_clear"></div>
			</div>
			
			<div id="nbpro_settsaved"><div class="updated_msg"></div></div>
			<img id="nbar_ajaxloader" src="<?php echo NBARPROPLUGIN_URL; ?>inc/images/ajax-loader.gif" />
			<form class="nbar_editform" id="nbar_editform" method="post" action="/">
				<?php 
				if($_GET["edit"]){$option=$_GET['edit'];}
				else{$option='notificationbar_options';}
				$options = get_option($option);
				?>

				<div class="nbpro_block">
					<div class="nbpro_settings">
						<div class="nbpro_distxt"><?php _e('DEFAULT SETTINGS','biznez-lite'); ?></div>
						<div class="nbpro_savebox"><input name="nbpro_saves" type="submit" value="Save" /><a class="nbpro_plus_minus" href="Javascript:void(0);"></a><div class="nbpro_clear"></div></div><div class="nbpro_clear"></div>
					</div>
					<div class="nbpro_extendbox">
						<div class="nbpro_topbdr"></div>
						<div class="nbpro_midbdr">
							<table style="width:650px;" class="nbar_edittbl">
								<tbody>
									<tr>
										<td><?php _e("Default State :",'biznez-lite'); ?></td>
										<td>
										<div class="nbar_state <?php if($options['defaultState']=="close"){ echo "close"; } ?>">								
											<input class="nbar_radio" type="radio" name="<?php echo $option; ?>[defaultState]" value="open" <?php checked('open', $options['defaultState']); ?> />
											<input class="nbar_radio" type="radio" name="<?php echo $option; ?>[defaultState]" value="close" <?php checked('close', $options['defaultState']); ?> />.
										</div>
										<a class="nbar_tooltip" title="<?php _e("Set the default state (Open/Close) of Notification bar.",'biznez-lite'); ?>"></a></td>
									</tr>
									<tr>
										<td><?php _e("Position :",'biznez-lite'); ?></td>
										<td>
											<div class="nbar_pos <?php if($options['defaultposition']=="bottom"){ echo "bottom"; } ?>">								
												<input class="nbar_radio" type="radio" name="<?php echo $option; ?>[defaultposition]" value="top" <?php checked('top', $options['defaultposition']); ?> />
												<input class="nbar_radio" type="radio" name="<?php echo $option; ?>[defaultposition]" value="bottom" <?php checked('bottom', $options['defaultposition']); ?> />.
											</div>
											<a class="nbar_tooltip" title="<?php _e("Set the default position (Top/Bottom) of Notification bar.",'biznez-lite'); ?>"></a>
										</td>
									</tr>
									
									<tr>
										<td><?php _e("Stay Time :",'biznez-lite'); ?></td>
										<td><input type="text" id="stayTime" name="<?php echo $option; ?>[stayTime]" value="<?php echo $options['stayTime'] ?>" size="5" />&nbsp;<small>(<?php _e("in Seconds",'biznez-lite') ?>)&nbsp;
											<a class="nbar_tooltip" title="<?php _e("Stay time will work with only 'Open' default state of Notification Bar. (default: 10 sec.)",'biznez-lite'); ?>"></a></td></small></td>
									</tr>
									<tr>
										<td><?php _e("Background Color :",'biznez-lite'); ?></td>
										<td>
											<div class="nbar_colwrap">
												<input class="nbar_colortxt" type="text" id="nabr_colorScheme" value="<?php echo $options['colorScheme'] ?>" name="<?php echo $option; ?>[colorScheme]" />
												<div class="nbar_colsel nabr_colorScheme"></div>
											</div>
										</td>
									</tr>
									<tr>
										<td><?php _e("Message/Text to Display :",'biznez-lite'); ?></td>
										<td><textarea rows="4" cols="30" name="<?php echo $option; ?>[message]" ><?php echo stripslashes($options['message']); ?></textarea><br/><small>(<?php _e('Can also Input HTML Text','biznez-lite') ?>)</small></td>
									</tr>
									<tr>
										<td><?php _e("Message Font-Size :",'biznez-lite'); ?></td>
										<td><input type="text" name="<?php echo $option; ?>[messageFont]" value="<?php echo $options['messageFont'] ?>" size="5" />&nbsp;<small>(<?php _e('in Pixel','biznez-lite') ?>)</small></td>
									</tr>
									<tr>
										<td><?php _e("Message Font-Color :",'biznez-lite'); ?></td>
										<td>
											<div class="nbar_colwrap">
												<input class="nbar_colortxt" type="text" id="nabr_messageColor" value="<?php echo $options['messageColor'] ?>" name="<?php echo $option; ?>[messageColor]" />
												<div  class="nbar_colsel nabr_messageColor"></div>
											</div>
										</td>
									</tr>	
								</tbody>
							</table>	
							<div class="nbpro_clear"></div>
						</div>
						<div class="nbpro_btmbdr"></div>
					</div>
				</div>
				
				<div class="nbpro_block">
					<div class="nbpro_settings">
						<div class="nbpro_distxt"><?php _e('LINK BUTTON SETTINGS','biznez-lite'); ?></div>
						<div class="nbpro_savebox"><input name="nbpro_saves" type="submit" value="Save" /><a class="nbpro_plus_minus" href="Javascript:void(0);"></a><div class="nbpro_clear"></div></div><div class="nbpro_clear"></div>
					</div>
					<div class="nbpro_extendbox">
						<div class="nbpro_topbdr"></div>
						<div class="nbpro_midbdr">
							<table style="width:650px;" class="nbar_edittbl" >
								<tbody>
									<tr>
										<td><?php _e("Button URL :",'biznez-lite'); ?></td>
										<td><input class="large_text_box" type="text" name="<?php echo $option; ?>[linkUrl]" value="<?php echo $options['linkUrl'] ?>" /></td>
									</tr>
									<tr>
										<td><?php _e("Button Text :",'biznez-lite'); ?></td>
										<td><input class="large_text_box" type="text" name="<?php echo $option; ?>[linkText]" value="<?php echo stripslashes($options['linkText']); ?>" /></td>
									</tr>
									<tr>
										<td><?php _e("Font-Size :",'biznez-lite'); ?></td>
										<td><input type="text" name="<?php echo $option; ?>[linkFont]" value="<?php echo $options['linkFont'] ?>" size="5" />&nbsp;<small>(<?php _e('in Pixel','biznez-lite') ?>)</small></td>
									</tr>
									<tr>
										<td><?php _e("Button Font-Color :",'biznez-lite'); ?></td>
										<td>
											<div class="nbar_colwrap">
												<input class="nbar_colortxt" type="text" id="nabr_linkTextColor" value="<?php echo $options['linkTextColor'] ?>" name="<?php echo $option; ?>[linkTextColor]" />
												<div  class="nbar_colsel nabr_linkTextColor"></div>
											</div>
										</td>
									</tr>
									<tr>
										<td><?php _e("Button BG-Color :",'biznez-lite'); ?></td>
										<td>
											<div class="nbar_colwrap">
												<input class="nbar_colortxt" type="text" id="nabr_linkBgcolor" value="<?php echo $options['linkBgcolor'] ?>" name="<?php echo $option; ?>[linkBgcolor]" />
												<div  class="nbar_colsel nabr_linkBgcolor"></div>
											</div>
										</td>
									</tr>
									<tr>
										<td><?php _e("Button Target :",'biznez-lite'); ?></td>
										<td>
											<div class="nbar_target <?php if($options['linkTarget']=="_self"){ echo "self"; } ?>">								
												<input class="nbar_radio" type="radio" name="<?php echo $option; ?>[linkTarget]" value="_blank" <?php checked('_blank', $options['linkTarget']); ?> />
												<input class="nbar_radio" type="radio" name="<?php echo $option; ?>[linkTarget]" value="_self" <?php checked('_self', $options['linkTarget']); ?> />.
											</div>
										</td>
									</tr>
								</tbody>
							</table>	
							<div class="nbpro_clear"></div>
						</div>
						<div class="nbpro_btmbdr"></div>
					</div>
				</div>
				
				<div class="nbpro_block">
					<div class="nbpro_settings">
						<div class="nbpro_distxt"><?php _e('SOCIAL BUTTONS SETTINGS','biznez-lite'); ?></div>
						<div class="nbpro_savebox"><input name="nbpro_saves" type="submit" value="Save" /><a class="nbpro_plus_minus" href="Javascript:void(0);"></a><div class="nbpro_clear"></div></div><div class="nbpro_clear"></div>
					</div>
					<div class="nbpro_extendbox">
						<div class="nbpro_topbdr"></div>
						<div class="nbpro_midbdr">
							<table style="width:650px;" class="nbar_edittbl" >
								<tbody>
									<tr>
										<td><?php _e("Facebook follow URL :",'biznez-lite'); ?></td>
										<td><input class="large_text_box" type="text" name="<?php echo $option; ?>[facebookUrl]" value="<?php echo $options['facebookUrl'] ?>" /></td>
									</tr>

									<tr>
										<td><?php _e("Twitter follow URL :",'biznez-lite'); ?></td>
										<td><input class="large_text_box" type="text" name="<?php echo $option; ?>[twitterUrl]" value="<?php echo $options['twitterUrl'] ?>" /></td>
									</tr>

									<tr>
										<td><?php _e("Linkedin follow URL :",'biznez-lite'); ?></td>
										<td><input class="large_text_box" type="text" name="<?php echo $option; ?>[linkedinUrl]" value="<?php echo $options['linkedinUrl'] ?>" /></td>
									</tr>

									<tr>
										<td><?php _e("Google+ follow URL :",'biznez-lite'); ?></td>
										<td><input class="large_text_box" type="text" name="<?php echo $option; ?>[googleUrl]" value="<?php echo $options['googleUrl'] ?>" /></td>
									</tr>
									
									<tr>
										<td><?php _e("RSS feed URL :",'biznez-lite'); ?></td>
										<td><input class="large_text_box" type="text" name="<?php echo $option; ?>[rssUrl]" value="<?php echo $options['rssUrl'] ?>" /></td>
									</tr>
																		
									<tr>
										<td><?php _e("Facebook Like :",'biznez-lite'); ?></td>
										<td>		
											<div class="nbar_fblike <?php if($options['facebookLike']=="no"){ echo "no"; } ?>">								
												<input class="nbar_radio" type="radio" name="<?php echo $option; ?>[facebookLike]" value="yes" <?php checked('yes', $options['facebookLike']); ?> />
												<input class="nbar_radio" type="radio" name="<?php echo $option; ?>[facebookLike]" value="no" <?php checked('no', $options['facebookLike']); ?> />.
											</div>
										</td>
									</tr>
									
								</tbody>
							</table>	
							<div class="nbpro_clear"></div>
						</div>
						<div class="nbpro_btmbdr"></div>
					</div>
				</div>
				
				<div class="nbpro_extmsg_chk"><label class="nbpro_mkchk <?php if($options['extendMesg']){ ?>checked<?php } ?>" for="nbar_extchk"></label><input type="checkbox" class="nbpro_chkbox" id="nbar_extchk"  name="<?php echo $option; ?>[extendMesg]" <?php if($options['extendMesg']){ ?> checked <?php } ?> value="true"/> <?php _e('Enable "Extended Notification Bar" ','biznez-lite'); ?></div>
				
				<div style="<?php if($options['extendMesg']){ ?><?php }else{ ?>display:none;<?php } ?>" class="nbpro_extmsg nbpro_block">
					<div class="nbpro_settings">
						<div class="nbpro_distxt"><?php _e('EXTENDED NOTIFICATION BAR SETTINGS','biznez-lite'); ?></div>
						<div class="nbpro_savebox"><a class="nbpro_plus_minus" href="Javascript:void(0);"></a><div class="nbpro_clear"></div></div><div class="nbpro_clear"></div>
					</div>
					<div class="nbpro_extendbox">
						<div class="nbpro_topbdr"></div>
						<div class="nbpro_midbdr">
						
							<div class="nbpro_block nbpro_smallblk">
								<div class="nbpro_settings">
									<div class="nbpro_distxt"><?php _e('DEFAULT SETTINGS','biznez-lite'); ?></div>
									<div class="nbpro_savebox"><input name="nbpro_saves" type="submit" value="Save" /><a class="nbpro_plus_minus" href="Javascript:void(0);"></a><div class="nbpro_clear"></div></div><div class="nbpro_clear"></div>
								</div>
								<div class="nbpro_extendbox">
									<div class="nbpro_stopbdr"></div>
									<div class="nbpro_smidbdr">
										<table style="width:650px;" class="nbar_edittbl" >
											<tbody>
												<tr>
													<td><?php _e("Default State:",'biznez-lite'); ?></td>
													<td>
														<div class="nbar_state <?php if($options['extendMesgState']=="close"){ echo "close"; } ?>">								
															<input class="nbar_radio" type="radio" name="<?php echo $option; ?>[extendMesgState]" value="open" <?php checked('open', $options['extendMesgState']); ?> />
															<input class="nbar_radio" type="radio" name="<?php echo $option; ?>[extendMesgState]" value="close" <?php checked('close', $options['extendMesgState']); ?> />.
														</div>
													</td>
												</tr>
												<tr>
													<td><?php _e("Disable Counter Message:",'biznez-lite'); ?></td>
													<td>
														<div class="nbar_disable <?php if($options['extendMesgCmsg']=="no"){ echo "no"; } ?>">								
															<input class="nbar_radio" type="radio" name="<?php echo $option; ?>[extendMesgCmsg]" value="yes" <?php checked('yes', $options['extendMesgCmsg']); ?> />
															<input class="nbar_radio" type="radio" name="<?php echo $option; ?>[extendMesgCmsg]" value="no" <?php checked('no', $options['extendMesgCmsg']); ?> />.
														</div>
													</td>
												</tr>
												
												<tr>
													<td><?php _e("Message Open Time:",'biznez-lite'); ?></td>
													<td><input type="text" id="extMesgOpenTime" name="<?php echo $option; ?>[extMesgOpenTime]" value="<?php echo $options['extMesgOpenTime'] ?>" size="5" />&nbsp;<small>(<?php _e("in Seconds",'biznez-lite') ?>)&nbsp;</small><a class="nbar_tooltip" title="<?php _e("Extend Message Open Time Work With Only 'Open' state. And Extend Message will Open After This Time Duration. (default: 4 sec.)",'biznez-lite'); ?>"></a></td>
												</tr>
												
												<tr>
													<td><?php _e("Message Close Time:",'biznez-lite'); ?></td>
													<td><input type="text" id="extMesgCloseTime" name="<?php echo $option; ?>[extMesgCloseTime]" value="<?php echo $options['extMesgCloseTime'] ?>" size="5" />&nbsp;<small>(<?php _e("in Seconds",'biznez-lite') ?>)&nbsp;</small><a class="nbar_tooltip" title="<?php _e("Extend Message Close Time Work With Only 'Open' state. And Extend Message will Close After This Time Duration. (default: 4 sec.)",'biznez-lite'); ?>"></a></td>
												</tr>
												
												<tr>
													<td><?php _e("Message Template:",'biznez-lite'); ?></td>
													<td><select style="width:100px;" name="<?php echo $option; ?>[extendMesgTemplate]"><option value="template-1" <?php selected('template-1', $options['extendMesgTemplate']); ?>>template-1</option><option value="template-2" <?php selected('template-2', $options['extendMesgTemplate']); ?>>template-2</option><option value="template-3" <?php selected('template-3', $options['extendMesgTemplate']); ?>>template-3</option></select></td>
												</tr>

												<tr>
													<td><?php _e("Mesaage/Text to Display:",'biznez-lite'); ?></td>
													<td>
													<?php 
														global $wp_version;
														if($wp_version >=3.3){
															$settings = array('tinymce' => false, 'textarea_rows' => 8);
															wp_editor(stripslashes($options['extendMesgText']), $option.'[extendMesgText]', $settings);
														}
														else{
														?>												
															<textarea rows="4" cols="30" name="<?php echo $option; ?>[extendMesgText]" ><?php echo stripslashes($options['extendMesgText']); ?></textarea><br/><small>(<?php _e('Can also Input HTML Text','biznez-lite') ?>)</small>
														<?php
														}
														
													?>
													</td>
												</tr>
												<tr>
													<td><?php _e("Message Font-Size:",'biznez-lite'); ?></td>
													<td><input type="text" name="<?php echo $option; ?>[extendMesgFont]" value="<?php echo $options['extendMesgFont'] ?>" size="5" />&nbsp;<small>(<?php _e('in Pixel','biznez-lite') ?>)</small></td>
												</tr>
												<tr>
													<td><?php _e("Message Font-Color:",'biznez-lite'); ?></td>
													<td>
														<div class="nbar_colwrap">
															<input class="nbar_colortxt" type="text" id="nabr_extendMesgColor" value="<?php echo $options['extendMesgColor'] ?>" name="<?php echo $option; ?>[extendMesgColor]" />
															<div  class="nbar_colsel nabr_extendMesgColor"></div>
														</div>
													</td>
												</tr>
											</tbody>
										</table>	
										<div class="nbpro_clear"></div>
									</div>
									<div class="nbpro_sbtmbdr"></div>
								</div>
							</div>
							
							<div class="nbpro_block nbpro_smallblk">
								<div class="nbpro_settings">
									<div class="nbpro_distxt"><?php _e('IMAGE SETTINGS','biznez-lite'); ?></div>
									<div class="nbpro_savebox"><input name="nbpro_saves" type="submit" value="Save" /><a class="nbpro_plus_minus" href="Javascript:void(0);"></a><div class="nbpro_clear"></div></div><div class="nbpro_clear"></div>
								</div>
								<div class="nbpro_extendbox">
									<div class="nbpro_stopbdr"></div>
									<div class="nbpro_smidbdr">
										<table style="width:650px;" class="nbar_edittbl" >
											<tbody>
												<tr>
													<td> <?php _e("Image URL/PATH:",'biznez-lite'); ?></td>
													<td>
														<label for="upload_image">
															<input class="large_text_box" id="nbar_uploadimage" type="text" size="36" name="<?php echo $option; ?>[extendMesgImg]" value="<?php echo $options['extendMesgImg'] ?>" />
															<input id="nbar_uploadbutton" class="button" type="button" value="Upload Image" />
														</label>
													</td>
												</tr>
												<tr>
													<td><?php _e("Image Width:",'biznez-lite'); ?></td>
													<td><input type="text" name="<?php echo $option; ?>[extendMesgImgWidth]" value="<?php echo $options['extendMesgImgWidth'] ?>" size="5" />&nbsp;<small>(<?php _e('in Pixel','biznez-lite') ?>)</small></td>
												</tr>
												<tr>
													<td><?php _e("Image Height:",'biznez-lite'); ?></td>
													<td><input type="text" name="<?php echo $option; ?>[extendMesgImgHeight]" value="<?php echo $options['extendMesgImgHeight'] ?>" size="5" />&nbsp;<small>(<?php _e('in Pixel','biznez-lite') ?>)</small></td>
												</tr>
												<tr>
													<td><?php _e("Image Border:",'biznez-lite'); ?></td>
													<td><input type="text" name="<?php echo $option; ?>[extendMesgImgBorder]" value="<?php echo $options['extendMesgImgBorder'] ?>" size="5" />&nbsp;<small>(<?php _e('in Pixel','biznez-lite') ?>)</small></td>
												</tr>
												<tr>
													<td><?php _e("Image Border-Color:",'biznez-lite'); ?></td>
													<td>
														<div class="nbar_colwrap">
															<input class="nbar_colortxt" type="text" id="nabr_extendMesgImgBorderCol" value="<?php echo $options['extendMesgImgBorderCol'] ?>" name="<?php echo $option; ?>[extendMesgImgBorderCol]" />
															<div  class="nbar_colsel nabr_extendMesgImgBorderCol"></div>
														</div>
													</td>
												</tr>
											</tbody>
										</table>	
										<div class="nbpro_clear"></div>
									</div>
									<div class="nbpro_sbtmbdr"></div>
								</div>
							</div>
							
							<div class="nbpro_block nbpro_smallblk">
								<div class="nbpro_settings">
									<div class="nbpro_distxt"><?php _e('LINK BUTTON SETTINGS','biznez-lite'); ?></div>
									<div class="nbpro_savebox"><input name="nbpro_saves" type="submit" value="Save" /><a class="nbpro_plus_minus" href="Javascript:void(0);"></a><div class="nbpro_clear"></div></div><div class="nbpro_clear"></div>
								</div>
								<div class="nbpro_extendbox">
									<div class="nbpro_stopbdr"></div>
									<div class="nbpro_smidbdr">
										<table style="width:650px;" class="nbar_edittbl" >
											<tbody>
												<tr>
													<td><?php _e("Button URL:",'biznez-lite'); ?></td>
													<td><input class="large_text_box" type="text" name="<?php echo $option; ?>[extendMesgLinkUrl]" value="<?php echo $options['extendMesgLinkUrl'] ?>" /></td>
												</tr>
												<tr>
													<td><?php _e("Button Text:",'biznez-lite'); ?></td>
													<td><input class="large_text_box" type="text" name="<?php echo $option; ?>[extendMesgLinkText]" value="<?php echo stripslashes($options['extendMesgLinkText']); ?>" /></td>
												</tr>
												<tr>
													<td><?php _e("Font-Size:",'biznez-lite'); ?></td>
													<td><input type="text" name="<?php echo $option; ?>[extendMesgLinkFont]" value="<?php echo $options['extendMesgLinkFont'] ?>" size="5" />&nbsp;<small>(<?php _e('in Pixel','biznez-lite') ?>)</small></td>
												</tr>
												<tr>
													<td><?php _e("Button Font-Color:",'biznez-lite'); ?></td>
													<td>
														<div class="nbar_colwrap">
															<input class="nbar_colortxt" type="text" id="nabr_extendMesgLinkColor" value="<?php echo $options['extendMesgLinkColor'] ?>" name="<?php echo $option; ?>[extendMesgLinkColor]" />
															<div  class="nbar_colsel nabr_extendMesgLinkColor"></div>
														</div>
													</td>
												</tr>
												<tr>
													<td><?php _e("Button BG-Color:",'biznez-lite'); ?></td>
													<td>
														<div class="nbar_colwrap">
															<input class="nbar_colortxt" type="text" id="nabr_extendMesgLinkBgcolor" value="<?php echo $options['extendMesgLinkBgcolor'] ?>" name="<?php echo $option; ?>[extendMesgLinkBgcolor]" />
															<div  class="nbar_colsel nabr_extendMesgLinkBgcolor"></div>
														</div>
													</td>
												</tr>
												<tr>
													<td><?php _e("Button Target:",'biznez-lite'); ?></td>
													<td>
														<div class="nbar_target <?php if($options['extendMesgLinkTarget']=="_self"){ echo "self"; } ?>">								
															<input class="nbar_radio" type="radio" name="<?php echo $option; ?>[extendMesgLinkTarget]" value="_blank" <?php checked('_blank', $options['extendMesgLinkTarget']); ?> />
															<input class="nbar_radio" type="radio" name="<?php echo $option; ?>[extendMesgLinkTarget]" value="_self" <?php checked('_self', $options['extendMesgLinkTarget']); ?> />.
														</div>
													</td>
												</tr>
											</tbody>
										</table>	
										<div class="nbpro_clear"></div>
									</div>
									<div class="nbpro_sbtmbdr"></div>
								</div>
							</div>
				
							<div class="nbpro_clear"></div>
						</div>
						<div class="nbpro_btmbdr"></div>
					</div>
				</div>
				<input type="hidden" name="nbar_itemname" value="<?php echo $option; ?>" />	
				<input type="hidden" name="action" value="nbpro_saved" />
				<input type="hidden" name="security" value="<?php echo wp_create_nonce('nbpro-options-data'); ?>" />
							
				<p class="button-controls">
					<input type="submit" name="nbpro_saves" value="Save Setting" style="margin-left: 10px;">	
				</p>
			</form>
		</div>
		<div class="nbpro_clear"></div>
	</div>
	<div class="nbar_overlay"></div>
</div>	
<?php 
}
?>
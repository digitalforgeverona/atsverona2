<?php
// add styles to the corresponding notification bar
function nbar_addStyles($nbar_option){
$nbar_getOptCss = get_option($nbar_option);
$nbar = $nbar_getOptCss;
?>
<!-- Notification Bar PRO Starts Here -->
<style scoped="true">
#notificationbar{<?php echo $nbar['defaultposition']; ?>:0;}
#notificationbar{background-color:<?php echo $nbar['colorScheme']; ?>;} 
a#nbar_downArr{border-color:transparent <?php echo $nbar['colorScheme']; ?> transparent transparent;}
#nbar_downArr{border-right-color:<?php echo $nbar['colorScheme']; ?>;} 
a#nbar_downArr.bottom{border-bottom-color:<?php echo $nbar['colorScheme']; ?>;} 
#nbar_downArr{<?php if($nbar['defaultposition'] =="top"){ ?>margin-top:4px;<?php } else { echo "top:-50px";  } ?>}
#notificationbar .nbar_topwrap .nbar_msg{font-size:<?php echo $nbar['messageFont']; ?>px;color:<?php echo $nbar['messageColor']; ?>; }
#notificationbar .nbar_topwrap .nbar_button{font-size:<?php echo $nbar['linkFont']; ?>px;color:<?php echo $nbar['linkTextColor']; ?>;background:<?php echo $nbar['linkBgcolor']; ?>}
#notificationbar .nbar_extendmsg .nbar_extendmsg_txt{font-size:<?php echo $nbar['extendMesgFont']; ?>px;color:<?php echo $nbar['extendMesgColor']; ?>; }
#notificationbar .nbar_extendmsg .nbar_extendmsg_btn{font-size:<?php echo $nbar['extendMesgLinkFont']; ?>px;color:<?php echo $nbar['extendMesgLinkColor']; ?>;background:<?php echo $nbar['extendMesgLinkBgcolor']; ?>}
#notificationbar .nbar_extendmsg .nbar_extendmsg_img{width:<?php echo $nbar['extendMesgImgWidth']; ?>px;height:<?php echo $nbar['extendMesgImgHeight']; ?>px;border-width:<?php echo $nbar['extendMesgImgBorder']; ?>px;border-color:<?php echo $nbar['extendMesgImgBorderCol']; ?>;}
</style>
<?php
}

// add HTML to the corresponding notification bar
function nbar_addHTML($nbar_option){
$nbar_getOptHtml = get_option($nbar_option);
$nbarH = $nbar_getOptHtml;
global $post;
?>
<div id="notificationbar" class="<?php echo $nbar_option; ?>">
	<div class="nbar_wrapper <?php echo $nbarH['defaultposition']; ?>">
		<div class="nbar_topwrap">
			<?php if($nbarH['message']){ ?><div class="nbar_msg nbar_topitem"><?php echo stripslashes($nbarH['message']); ?></div><?php } ?>
			<?php if($nbarH['linkText']){ ?> <a class="nbar_button nbar_topitem" href="<?php echo $nbarH['linkUrl']; ?>" target="<?php echo $nbarH['linkTarget']; ?>"><?php echo stripslashes($nbarH['linkText']); ?></a><?php } ?>
			<div class="nbar_sociallinks">
				<?php if($nbarH['facebookUrl']){ ?><a href="<?php echo $nbarH['facebookUrl']; ?>" class="fb" title="facebook" target="_blank" ></a><?php } ?>
				<?php if($nbarH['twitterUrl']){ ?><a href="<?php echo $nbarH['twitterUrl']; ?>" class="tw" title="twitter"  target="_blank" ></a><?php } ?>
				<?php if($nbarH['linkedinUrl']){ ?><a href="<?php echo $nbarH['linkedinUrl']; ?>" class="ld" title="linkedin" target="_blank" ></a><?php } ?>
				<?php if($nbarH['googleUrl']){ ?><a href="<?php echo $nbarH['googleUrl']; ?>" class="gp" title="google+" target="_blank" ></a><?php } ?>
				<?php if($nbarH['rssUrl']){ ?><a href="<?php echo $nbarH['rssUrl']; ?>" class="rss" title="rss"  target="_blank" ></a><?php } ?>
				<?php if($nbarH['facebookLike']=='yes'){ ?><iframe class="fblike" src="http://www.facebook.com/plugins/like.php?href=<?php echo urlencode(get_permalink($post->ID)); ?>&amp;layout=button_count&amp;show_faces=false&amp;width=60&amp;action=like&amp;font=segoe+ui&amp;colorscheme=light&amp;height=21" scrolling="no" frameborder="0" allowTransparency="true"></iframe><?php } ?>
			</div>
			<?php if($nbarH['extendMesg']){ ?><a href="JavaScript:void(0);" title="<?php _e('show/hide','biznez'); ?>" class="nbar_plusminus"></a><?php } ?>
		</div>
		<?php if($nbarH['extendMesg']){ ?>
		<div class="nbar_extendmsg <?php echo $nbarH['extendMesgTemplate']; ?>">
			<div class="nbar_exmsg">
				<?php if($nbarH['extendMesgImg']){ ?><img src="<?php echo $nbarH['extendMesgImg']; ?>" class="nbar_extendmsg_img" alt="biznez" /><?php } ?>
				<div class="nbar_extendmsg_wrap">
					<?php if($nbarH['extendMesgText']){ ?><div class="nbar_extendmsg_txt"><?php echo do_shortcode(stripslashes($nbarH['extendMesgText'])); ?></div><?php } ?>
					<?php if($nbarH['extendMesgLinkText']){ ?><a href="<?php echo $nbarH['extendMesgLinkUrl']; ?>" target="<?php echo $nbarH['extendMesgLinkTarget']; ?>" class="nbar_extendmsg_btn"><?php echo stripslashes($nbarH['extendMesgLinkText']); ?></a><?php } ?>
				</div>
				<div style="clear:both;"></div>
			</div>
		</div>
		<?php } ?>
	</div>
	<a id="nbar_downArr" class="<?php echo $nbarH['defaultposition']; ?>" href="JavaScript:void(0);" >+</a>
</div>

<?php
}

// call notificationbar jQuery function
function nbar_calljQfunc($nbar_option){
$nbar_getOpts = get_option($nbar_option);
$nbar_opts = $nbar_getOpts;
$nbar_stayTime = $nbar_opts['stayTime']*1000;
$nbar_exmsgOpnDur = $nbar_opts['extMesgOpenTime']*1000;
$nbar_exmsgClosDur = $nbar_opts['extMesgCloseTime']*1000;
if($nbar_stayTime=="" || $nbar_stayTime==0){$nbar_stayTime=10000;}
if($nbar_exmsgOpnDur=="" || $nbar_exmsgOpnDur==0){$nbar_exmsgOpnDur=4000;}
if($nbar_exmsgClosDur=="" || $nbar_exmsgClosDur==0){$nbar_exmsgClosDur=4000;}
?>
<script type="text/javascript">
	jQuery(document).ready(function(){
	
		<?php 
		if($nbar_opts['defaultposition'] =="bottom"){ ?>jQuery('body').append('<div class="notification_push"></div>');<?php } 
		else{ ?>jQuery('body').prepend('<div class="notification_push"></div>');<?php } ?>
		
		jQuery("#notificationbar").notificationbar({
		'defaultstate': '<?php echo $nbar_opts['defaultState']; ?>',
		'staytime': '<?php echo $nbar_stayTime; ?>',
		'exmsgstate': '<?php echo $nbar_opts['extendMesgState']; ?>',
		'exmsgopentm':'<?php echo $nbar_exmsgOpnDur; ?>',
		'exmsgclosetm':'<?php echo $nbar_exmsgClosDur; ?>',
		'disablecmsg':'<?php echo $nbar_opts['extendMesgCmsg']; ?>'
		});
	});
</script>
<!-- Notification Bar PRO Ends Here -->
<?php
}

function nbar_getnbarName($nbarID){
	global $wpdb;
	$table_name = $wpdb->prefix . "notificationbar"; 
	$nbar_fetchnbar = $wpdb->get_results("SELECT * FROM $table_name WHERE id=$nbarID",ARRAY_A);
	$nbar_optionNm = $nbar_fetchnbar[0]['option_name'];
	return $nbar_optionNm;
}

function nbar_isActive($nbarID){
	global $wpdb;
	$table_name = $wpdb->prefix . "notificationbar"; 
	$nbar_fetchnbar = $wpdb->get_results("SELECT * FROM $table_name WHERE id=$nbarID",ARRAY_A);
	$nbar_active = $nbar_fetchnbar[0]['active'];
	return $nbar_active;
}
?>
<?php 
	global $qode_options_eden; 
?>

<?php get_header(); ?>
	
	<div class="container">
		<div class="container_inner">
			<div class="page_not_found">
				<div class="separator transparent" style="padding-top:150px;"></div>
				<h2><?php _e('404', 'qode'); ?></h2>
				<div class="separator small center"><span></span></div>
				<h3><?php if($qode_options_eden['404_text'] != ""): echo $qode_options_eden['404_text']; else: ?> <?php _e('The page you requested does not exist', 'qode'); ?> <?php endif;?></h3>
				<p><a class="qbutton normal_button tiny" href="<?php echo home_url(); ?>/"><?php if($qode_options_eden['404_backlabel'] != ""): echo $qode_options_eden['404_backlabel']; else: ?> <?php _e('Back To Home', 'qode'); ?> <?php endif;?></a></p>
				<div class="separator transparent" style="padding-top:50px;"></div>
			</div>
		</div>
	</div>
			
<?php get_footer(); ?>	
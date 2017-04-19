<?php 
/*
Template name: Contact Us Template
*/
get_header(); 
	global $themename;
	global $shortname;
?>

	<div id="container" class="clearfix">
	  <div class="container_24 clearfix">	  
		<!-- Content -->		
		<div id="content" class="grid_24">
			<div class="skt-breadcrumb grid_11">
			<?php
					if ((class_exists('skt_breadcrumb_class'))) {$skt_breadcumb->custom_breadcrumb();}
			?>
			</div>
		<?php if(have_posts()) : ?>
	    <?php while(have_posts()) : the_post(); ?>
		<div class="pagetitle-wrap clearfix">
			<div class="page-title grid_11">
				<?php the_title(); ?>
			</div>
		</div><!--pagetitle-warp-->
		<div id="contact-page" class="contact-left grid_14">
			<div class="post" id="post-<?php the_ID(); ?>">
				<div class="skepost">
				<?php the_content(); ?>				
				</div> <!-- skepost -->
			</div> <!-- post -->
			<?php edit_post_link('Edit', '<p>', '</p>'); ?>	
			<?php endwhile; ?>
			<?php else :  ?>
			<div class="post">
				<h2><?php _e('Page Does Not Exist','biznez-lite'); ?></h2>
			</div>
			<?php endif; ?>			
			<div class="clear"></div>
		</div>
		 <!--left-->
		 <div class="right grid_9">
		 <div class="address-area">	
			<div class="add-title">
				<?php if(sketch_get_option($shortname."_add_title")){ 	echo (sketch_get_option($shortname."_add_title"));} else{ _e('Office Address','biznez-lite'); } ?>
			</div>
			<div class="contact-add">
				<?php  if(sketch_get_option($shortname."_contact_address_area")){ 	echo (sketch_get_option($shortname."_contact_address_area")); }  ?>
			</div><!--address-->
		</div><!--right-->
		<!-- content -->
	 </div>
	</div>
	</div>
 </div>
<?php get_footer(); ?>
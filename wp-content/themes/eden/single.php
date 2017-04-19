<?php

$id = get_the_ID();

if(get_post_meta(get_the_ID(), "qode_show-sidebar", true) != ""){
	$sidebar = get_post_meta(get_the_ID(), "qode_show-sidebar", true);
}else{
	$sidebar = $qode_options_eden['blog_single_sidebar'];
}

$blog_hide_comments = "";
if (isset($qode_options_eden['blog_hide_comments'])) 
	$blog_hide_comments = $qode_options_eden['blog_hide_comments'];

$content_style = "";
if(get_post_meta($id, "qode_content_top_padding", true) != ""){
	$content_style .= "padding-top:".get_post_meta($id, "qode_content_top_padding", true)."px;";
}

if(get_post_meta($id, "qode_page_background_color", true) != ""){
	$content_style .= "background-color:".get_post_meta($id, "qode_page_background_color", true).";";
}
?>
<?php get_header(); ?>
<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
			<?php if(get_post_meta($id, "qode_page_scroll_amount_for_sticky", true)) { ?>
				<script>
				var page_scroll_amount_for_sticky = <?php echo get_post_meta($id, "qode_page_scroll_amount_for_sticky", true); ?>;
				</script>
			<?php } ?>
				<?php get_template_part( 'title' ); ?>
			<?php
			$revslider = get_post_meta($id, "qode_revolution-slider", true);
			if (!empty($revslider)){ ?>
				<div class="q_slider"><div class="q_slider_inner">
				<?php echo do_shortcode($revslider); ?>
				</div></div>
			<?php
			}
			?>
			<div class="container"<?php if($content_style != "") { echo " style='". $content_style ."'";} ?>>
				<div class="container_inner">
			
				<?php if(($sidebar == "default")||($sidebar == "")) : ?>
					<div class="blog_holder blog_single">
					<?php 
						get_template_part('templates/blog/blog_single', 'loop');
					?>
					<?php
						if($blog_hide_comments != "yes"){
							comments_template('', true); 
						}else{
							echo "<br/><br/>";
						}
					?> 
					
				<?php elseif($sidebar == "1" || $sidebar == "2"): ?>
					<?php if($sidebar == "1") : ?>	
						<div class="two_columns_66_33 background_color_sidebar grid2 clearfix">
						<div class="column1">
					<?php elseif($sidebar == "2") : ?>	
						<div class="two_columns_75_25 background_color_sidebar grid2 clearfix">
							<div class="column1">
					<?php endif; ?>
				
								<div class="column_inner">
									<div class="blog_holder blog_single">	
										<?php 
											get_template_part('templates/blog/blog_single', 'loop');
										?>
									</div>
									
									<?php
										if($blog_hide_comments != "yes"){
											comments_template('', true); 
										}else{
											echo "<br/><br/>";
										}
									?> 
								</div>
							</div>	
							<div class="column2"> 
								<?php get_sidebar(); ?>
							</div>
						</div>
					<?php elseif($sidebar == "3" || $sidebar == "4"): ?>
						<?php if($sidebar == "3") : ?>	
							<div class="two_columns_33_66 background_color_sidebar grid2 clearfix">
							<div class="column1"> 
								<?php get_sidebar(); ?>
							</div>
							<div class="column2">
						<?php elseif($sidebar == "4") : ?>	
							<div class="two_columns_25_75 background_color_sidebar grid2 clearfix">
								<div class="column1"> 
									<?php get_sidebar(); ?>
								</div>
								<div class="column2">
						<?php endif; ?>
						
									<div class="column_inner">
										<div class="blog_holder blog_single">	
											<?php 
												get_template_part('templates/blog/blog_single', 'loop');
											?>
										</div>
										<?php
											if($blog_hide_comments != "yes"){
												comments_template('', true); 
											}else{
												echo "<br/><br/>";
											}
										?> 
									</div>
								</div>
							</div>
					<?php endif; ?>
				</div>
			</div>
		</div>						
	<?php endwhile; ?>
<?php endif; ?>	

<?php get_footer(); ?>	
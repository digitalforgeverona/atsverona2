<?php 
/*
Template Name: Blog Masonry Full Width
*/ 
?>
<?php get_header(); ?>
<?php 
global $wp_query;
global $qode_template_name;
$id = $wp_query->get_queried_object_id();
$qode_template_name = get_page_template_slug($id);
$category = get_post_meta($id, "qode_choose-blog-category", true);
$page_object = get_post( $id );
$content = $page_object->post_content;
$content = apply_filters( 'the_content', $content );
$post_number = get_post_meta($id, "qode_show-posts-per-page", true);
if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
else { $paged = 1; }
$sidebar = get_post_meta($id, "qode_show-sidebar", true);

if(get_post_meta($id, "qode_page_background_color", true) != ""){
	$background_color = get_post_meta($id, "qode_page_background_color", true);
}else{
	$background_color = "";
}

if($qode_options_eden['number_of_chars_masonry']) {
	qode_set_blog_word_count($qode_options_eden['number_of_chars_masonry']);
}
?>

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
	<?php 
		query_posts('post_type=post&paged='. $paged . '&cat=' . $category .'&posts_per_page=' . $post_number );
		if(isset($qode_options_eden['blog_page_range']) && $qode_options_eden['blog_page_range'] != ""){
			$blog_page_range = $qode_options_eden['blog_page_range'];
		} else{
			$blog_page_range = $wp_query->max_num_pages;
		}
	?>

	<div class="full_width"<?php if($background_color != "") { echo " style='background-color:". $background_color ."'";} ?>>
		<div class="full_width_inner">

			<?php echo $content; ?>

			<?php 
				get_template_part('templates/blog/blog_structure', 'loop');
			?>
			
		</div>
	</div>
<?php wp_reset_query(); ?>
<?php get_footer(); ?>
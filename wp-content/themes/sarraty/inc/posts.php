<?php 
function asalah_return_blogposts_grid($num = "3", $thumb = 'bloglist', $orderby = 'date', $cat = '', $tag_ids = '') {
    global $post;

    $args = array('posts_per_page' => $num, 'orderby' => $orderby);
    

    if ($tag_ids != '') {
        $tags = explode(',', $tag_ids);
        $tags_array = array();
        if (count($tags) > 0) {
            foreach ($tags as $tag) {
                if (!empty($tag)) {
                    $tags_array[] = $tag;
                }
            }
        }
        $args['tag_slug__in'] = $tags_array;
    }
    $wp_query = new WP_Query($args);

    $bloglist_class = "";
    if ($thumb == "bloglist") {
        $bloglist_class = "blog_block";
    }
    $output = '';
    ?>

    <?php if ($wp_query->have_posts()) : ?>
        <?php $output .= '<div class="row">' ?>
        <?php $count = 0; ?>
        <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
        	<?php $count++; ?>
        	
        	<?php if ($count == 1): ?>
	        	<?php $output .= '<div class="post_item latest_grid_item col-md-6 clearfix">'; ?>
	        	
		        <?php if ($thumb != 'hide' && has_post_thumbnail($post->ID)): ?>
		            <?php $output .= '<div class="post_thumbnail ' . $thumb . '"><a href="' . get_permalink() . '" title="' . get_the_title() . '">'; ?>
		            <?php $output .= get_the_post_thumbnail($post->ID, "bloggrid"); ?>
		            <?php $output .= '</a></div>'; ?>
		        <?php endif; ?>
		
		        <?php $output .= '<div class="post_info">'; ?>
		        <?php $output .= '<h5 class="title post_title"><a href="' . get_permalink() . '" title="' . get_the_title() . '">' . get_the_title() . '</a></h5>'; ?>
		        
		        <?php 
		        $output .= '<p>' . excerpt(13) . ' <a href="'.get_permalink().'" title="'.get_the_title().'" class="blog_read_more">'.__("Read More...", "asalah").'</a></p>';
		        ?>
	        
		        <?php $output .= '<span class="post_time">' . __("Posted on", "asalah") . ' ' . get_the_time(get_option('date_format')) . '</span>'; ?>
		        <?php $output .= '</div>'; ?>
		        <?php $output .= '</div>'; ?>
	        <?php else: ?>	            
	        	<?php if ($count == 2 ) { $output .= '<div class="later_grid_items col-md-6 clearfix col-md-6"><ul class="post_list post_grid ' . $bloglist_class . '">'; } ?>            
	            <?php $output .= '<div class="post_item clearfix ">'; ?>
	
	            <?php if ($thumb != 'hide' && has_post_thumbnail($post->ID)): ?>
	                <?php $output .= '<div class="post_thumbnail ' . $thumb . '"><a href="' . get_permalink() . '" title="' . get_the_title() . '">'; ?>
	                <?php $output .= get_the_post_thumbnail($post->ID, $thumb); ?>
	                <?php $output .= '</a></div>'; ?>
	            <?php endif; ?>
	
	            <?php $output .= '<div class="post_info">'; ?>
	            <?php $output .= '<h5 class="title post_title"><a href="' . get_permalink() . '" title="' . get_the_title() . '">' . get_the_title() . '</a></h5>'; ?>
	            
	            <?php 
	            if ($thumb == 'bloglist') {
	            $output .= '<p>' . excerpt(13) . ' <a href="'.get_permalink().'" title="'.get_the_title().'" class="blog_read_more">'.__("Read More...", "asalah").'</a></p>'; 
	            }
	            ?>
	            
	            <?php $output .= '<span class="post_time">' . __("Posted on", "asalah") . ' ' . get_the_time(get_option('date_format')) . '</span>'; ?>
	            <?php $output .= '</div>'; ?>
	            <?php $output .= '</div>'; ?>
            <?php endif; ?>
        <?php endwhile; ?>
        <?php if ($count > 1 ) { $output .= '</ul></div>'; } ?>
        <?php $output .= '</div>'; ?>
    <?php endif; ?>
    <?php return $output; ?>
    <?php
}

function asalah_return_blogposts_slider($num = "3", $thumb = 'bloglist', $orderby = 'date', $cat = '', $tag_ids = '') {
    global $post;

    $sticky = get_option( 'sticky_posts' );
    $args = array('posts_per_page' => $num, 'orderby' => $orderby, 'meta_query' => array(array('key' => '_thumbnail_id')), 'ignore_sticky_posts' => 1, 'post__not_in' => $sticky );

    if ($tag_ids != '') {
        $tags = explode(',', $tag_ids);
        $tags_array = array();
        if (count($tags) > 0) {
            foreach ($tags as $tag) {
                if (!empty($tag)) {
                    $tags_array[] = $tag;
                }
            }
        }
        $args['tag_slug__in'] = $tags_array;
    }
    $wp_query = new WP_Query($args);

    $bloglist_class = "";
    if ($thumb == "bloglist") {
        $bloglist_class = "blog_block";
    }
    $output = '';
    ?>

    <?php if ($wp_query->have_posts()) : ?>
        <?php $output .= '<div class="elastic_slider_wrapper"><div id="ei-slider" class="ei-slider"><ul class="ei-slider-large">' ?>
        <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
            <?php $output .= '<li>'; ?>
                <?php $output .= get_the_post_thumbnail($post->ID, 'large'); ?>
                <?php $output .= '<div class="ei-title">'; ?>
                    <?php $output .= '<h2><a href="' . get_permalink() . '">'.get_the_title().'</a></h2>'; ?>
                    <?php $output .= '<h3>' . excerpt(13) . '</h3>'; ?>
                <?php $output .= '</div>'; ?>
            <?php $output .= '</li>'; ?>
        <?php endwhile; ?>
        <?php $output .= '</ul>'; ?>
        <?php $output .= '<ul class="ei-slider-thumbs">'; ?>
        <?php $output .= '<li class="ei-slider-element">Current</li>'; ?>
        <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
            <?php $output .= '<li><a href="#">'.get_the_title().'</a></li>'; ?>
        <?php endwhile; ?>
        <?php $output .= '</ul></div></div>'; ?>
    <?php endif; ?>
    <?php return $output; ?>
    <?php
}

function asalah_return_blogposts_carousel($num = "3", $thumb = 'bloglist', $orderby = 'date', $cat = '', $tag_ids = '') {
    global $post;
	$sticky = get_option( 'sticky_posts' );
    $args = array('posts_per_page' => $num, 'orderby' => $orderby, 'meta_query' => array(array('key' => '_thumbnail_id')), 'ignore_sticky_posts' => 1, 'post__not_in' => $sticky );

    if ($tag_ids != '') {
        $tags = explode(',', $tag_ids);
        $tags_array = array();
        if (count($tags) > 0) {
            foreach ($tags as $tag) {
                if (!empty($tag)) {
                    $tags_array[] = $tag;
                }
            }
        }
        $args['tag_slug__in'] = $tags_array;
    }
    $wp_query = new WP_Query($args);

    $bloglist_class = "";
    if ($thumb == "bloglist") {
        $bloglist_class = "blog_block";
    }
    $output = '';
    ?>

    <?php if ($wp_query->have_posts()) : ?>
        <?php $output .= '<div class="project_carousel project_carousel_boxed owl-carousel owl-theme">'; ?>
        
        <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
            
            <?php
            $tags_list = get_the_tag_list('', ', ', '');
            $output .= '<div class="portfolio_element modern_project_thumbnail project_thumbnail">';
            	$output .= '<a href="' . get_permalink() . '"><figure class="portfolio_figure">';
		            
		        $output .= get_the_post_thumbnail($post->ID, 'blogcarousel');
	            
	            
	            $output .= '<figcaption class="portfolio_caption"><div class="caption_content clearfix">
	                <h4><a href="' . get_permalink() . '">'.get_the_title().'</a></h4>';
	                if ($tags_list != '') {
	                	$output .= '<div class="project_figure_tags">'.get_the_tag_list('', ', ', '').'</div>';
	                }
	            $output .= '</div></figcaption>';
	            
	            $output .= '</figure></a>';
	                
            $output .= '</div>';
            ?>
            
        <?php endwhile; ?>
        <?php $output .= '</div>'; ?>
    <?php endif; ?>
    <?php return $output; ?>
    <?php
}
?>
<?php
/*
 * Template Name: Default Blog Page
 */
get_header();
?>
<!-- start site content -->
<div class="site_content">
    
    <?php if ((asalah_post_option("asalah_title_holder") == "show") || ( asalah_option("asalah_enable_pagetitle") && asalah_post_option("asalah_title_holder") != 'hide')): ?>
    	<?php if (asalah_post_option("asalah_custom_title_bg")): ?>
    	<style>
    	.page_title_holder {
    	    background-image: url('<?php echo asalah_post_option("asalah_custom_title_bg");  ?>');
    	    background-repeat: no-repeat;
    	    background-size: cover;
    	}    
    	</style>
    	<?php endif; ?>
    	
    	<?php 
    	if (asalah_post_option("asalah_banner_padding")) {
    	?>
    	<style>
    	.page_title_holder {
    		padding: <?php echo asalah_post_option("asalah_banner_padding"); ?>px 0;
    	}    
    	</style>
    	<?php
    	}
    	?>
    	
        <div class="page_title_holder clearfix">
        <?php if (asalah_post_option('asalah_banner_video_mp4') 
        			&& asalah_post_option('asalah_banner_video_m4v')
        			&& asalah_post_option('asalah_banner_video_webm')
        			&& asalah_post_option('asalah_banner_video_ogv')
        			 ) : ?>
        			
        			<style>
        			.page_title_holder {
        				overflow: hidden;
        				position: relative;
        			}    
        			</style>
        			 
        	<video class="video_overlay" preload="auto"  autoplay="autoplay" loop muted="muted">
        	<source src="<?php echo asalah_post_option('asalah_banner_video_m4v'); ?>" type="video/mp4" />
        	<source src="<?php echo asalah_post_option('asalah_banner_video_webm'); ?>" type="video/webm" />
        	<source src="<?php echo asalah_post_option('asalah_banner_video_ogv'); ?>" type="video/ogg" />
        	<source src="<?php echo asalah_post_option('asalah_banner_video_mp4'); ?>" />
        	</object>
        	</video>
        
        <?php endif; ?>
            <div class="container">
                <div class="page_info">
                    <h1 class="title"><?php the_title(); ?></h1>

                </div>
                    <?php if (asalah_option("asalah_enable_breadcrumb")): ?>
                        <div class="page_nav">
                            <nav class="breadcrumb"><?php asalah_breadcrumbs(); ?></nav>		
                        </div>
                    <?php endif; ?>	
                   
            </div>
        </div>
    <?php endif; ?>
    
    <?php
    $wp_query = new WP_Query(array('post_type' => 'post', 'paged' => get_query_var('paged')));
    ?>  
    <div class="container">
        <div class="row">
            <div class="main_content <?php echo asalah_content_class(); ?>">
                <?php if ($wp_query->have_posts()) : ?>

                    <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                        <?php get_template_part('content', get_post_format()); ?>
                    <?php endwhile; ?>
                    <?php asalah_bootstrap_pagination(); ?>
                <?php else : ?>
                    <?php get_template_part('content', 'none'); ?>
                <?php endif; ?>
                <?php wp_reset_query(); ?>
            </div>
            
            <?php if (asalah_option("asalah_sidebar_position") != "no-sidebar" ): ?>
                        <?php if (asalah_post_option("asalah_post_layout") != "full" ): ?>
                        <div class="side_content <?php echo asalah_sidebar_class(); ?>">
                            <?php
                            $asalah_have_custom_sidebar = get_post_meta($post->ID, 'asalah_custom_sidebar', true);
            
                            if (!isset($asalah_have_custom_sidebar) || $asalah_have_custom_sidebar == '' || $asalah_have_custom_sidebar == 'none') {
                                get_sidebar();
                            } else {
            
                                $custom_sidebar_id = get_post_meta($post->ID, 'asalah_custom_sidebar', true);
                                if (is_active_sidebar($custom_sidebar_id)) :
                                    dynamic_sidebar($custom_sidebar_id);
                                endif;
                            }
                            ?>
                        </div>
                        <?php endif; ?>
                        <?php endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
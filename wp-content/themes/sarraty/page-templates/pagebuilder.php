<?php
/*
 * Template Name: Page Builder
 */
get_header();
?>

    <!-- check if page title is enabled in options panel -->
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
                <!-- check if bread crumb is enabled in option panel -->
                <?php if ((asalah_post_option("asalah_breadcrumb") == "show") || (asalah_option("asalah_enable_breadcrumb") && asalah_post_option("asalah_breadcrumb") != "hide")): ?>
                    <div class="page_nav">
                        <nav class="breadcrumb"><?php asalah_breadcrumbs(); ?></nav>		
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
    <!-- endif for checking page title in option panel -->

    <?php /* The loop */ ?>
    <?php while (have_posts()) : the_post(); ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class('page_builder_template'); ?>>
    
        <?php the_content(); ?>
        <?php wp_reset_query(); ?>
    </div>
    <?php endwhile; ?>

<?php get_footer(); ?>
<?php
/*
 * Template Name: Clients
 */
get_header();
?>
<!-- start site content -->
<div class="site_content">

    <!-- check if page title is enabled in options panel -->
    <?php if ((asalah_post_option("asalah_title_holder") == "show") || ( asalah_option("asalah_enable_pagetitle") && asalah_post_option("asalah_title_holder") != 'hide')): ?>
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

    <div class="container">
        <div class="row">
            <?php
            $wp_query = new WP_Query(array('post_type' => 'client', 'posts_per_page' => 10, 'paged' => get_query_var('paged')));
            $count = 0;
            ?>  
            
            <div class="main_content <?php echo asalah_content_class(); ?>">
            <?php if ($wp_query) : ?>
                <div class="slide" id="carousel-example-generic">
                    <div class="testimonials_two_list_innter">
                        <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

                            <div class="client_item">
                                <a target="_blank" title="<?php echo get_the_title(); ?>" href="<?php echo get_client_url(); ?>"><?php echo get_client_logo(); ?></a>
                            </div>

                        <?php endwhile; ?>
                        <?php asalah_bootstrap_pagination(); ?>
                    </div>

                </div>
            <?php endif; ?>
            </div>
            
            
            <?php wp_reset_query(); ?>
            
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
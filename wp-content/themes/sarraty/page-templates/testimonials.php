<?php
/*
 * Template Name: Testimonials Page
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
        <div class="row testimonials_list_innter">
            
            <div class="main_content <?php echo asalah_content_class(); ?>">
            <?php
            $wp_query = new WP_Query(array('post_type' => 'testimonial', 'posts_per_page' => 10, 'paged' => get_query_var('paged')));
            $count = 0;
            ?>  

            <?php if ($wp_query) : ?>
                        <?php $i = 1; ?>
                        <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

                            <div class="testimonial_info item">
                                <div class="testimonial_text indicator_seperator">
                                    <?php the_content(); ?>
                                </div>
                                <div class="testimonial_author">

                                    <?php if (has_post_thumbnail()): ?>
                                        <div class="testimonial_avatar">
                                            <?php the_post_thumbnail("smallbloglist"); ?>
                                        </div>
                                    <?php endif; ?>


                                    <div class="testimonial_name">
                                        <?php if (asalah_post_option("asalah_testimonial_author")): ?>
                                            <h5 class="title"><?php echo asalah_post_option("asalah_testimonial_author"); ?></h5>
                                        <?php endif; ?>


                                        <span><?php echo asalah_post_option("asalah_testimonial_job"); ?> - </span><a target="_blank" href="<?php echo asalah_post_option("asalah_testimonial_url"); ?>"><?php echo asalah_post_option("asalah_testimonial_company"); ?></a>
                                    </div>
                                </div>

                            </div>
                            
                            <?php $i++; ?>
                        <?php endwhile; ?>
                        <?php asalah_bootstrap_pagination(); ?>
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
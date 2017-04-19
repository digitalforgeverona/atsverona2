<?php
/*
 * Template Name: Modern Portfolio Page 2 Column
 */
get_header();

?>
<!-- start site content -->
<div class="site_content">

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
                    <?php if (asalah_option("asalah_enable_breadcrumb")): ?>
                        <div class="page_nav">
                            <nav class="breadcrumb"><?php asalah_breadcrumbs(); ?></nav>		
                        </div>
                    <?php endif; ?>	
            </div>
        </div>
    <?php endif; ?>

    <div class="container portfolio_page">
        <div class="row">

            <div id="portfolio_filter_options" class="col-md-12 filters">
            	
            	<?php asalah_portfolio_tag_list_filter(); ?>
            </div>
            
            
                <?php 
                $per_page = 9;
                if (asalah_option('asalah_portfolio_posts_per_page')) {
                $per_page = asalah_option('asalah_portfolio_posts_per_page');
                }
                
                $wp_query = new WP_Query(array('post_type' => 'project', 'posts_per_page' => $per_page, 'paged' => get_query_var('paged')));
                ?>
                <?php
                // use $post num to count the current post in the row
                // and use $intros to posts details to array and use it to output intros
                // after 3 posts alrady returned
                $postnum = 0;
                $intros = array();

                if (have_posts()) :
                    ?>
                    <!-- start main content div -->
                    <div class="portfolio_items clearfix"><ul class="main_content clearfix thumbnails" id="portfolio_container">

                    <?php while (have_posts()) : the_post(); ?>
                            <!-- then add the current post thumbnail with proper rel to use in jquery intro sliding -->
                            <li class=" portfolio_element clearfix col-md-6 modern_project_thumbnail portfoliotagfilterall <?php echo asalah_portfolio_tag(); ?>">
                            
                            <?php $tags_list = get_the_term_list($post->ID, 'tagportfolio', '', ', ', ''); ?>
                            <a href='<?php echo get_permalink(); ?>'>
                            <figure class="portfolio_figure">
                            
                            	
                                <?php $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>
                                
                                <?php echo get_the_post_thumbnail($post->ID, "portfolio", array('class' => 'portfolio_thumbnail')); ?>
                                
                                <figcaption class="portfolio_caption"><div class="caption_content clearfix">
                                    <h4><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title() ?></a></h4>
                                    <?php 
                                    if ($tags_list != '') {
                                    	echo '<div class="project_figure_tags">'.get_the_term_list($post->ID, 'tagportfolio', '', ', ', '').'</div>';
                                    }
                                    ?>
                                </div></figcaption>
                                                                
                            </figure>
                            </a>
                            </li>
                    <?php endwhile; ?>
                    </ul></div>
                    <!-- end main content div -->

                    <?php asalah_bootstrap_pagination(); ?>

                <?php endif; ?>
            

        </div>
    </div>
</div>

<?php get_footer(); ?>
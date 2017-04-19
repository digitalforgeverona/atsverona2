<?php
/*
 * Template Name: Effects Portfolio Page
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

            <div class="col-md-3 pull-left side_content hidden-sm hidden-xs">
                <div class="widget_container widget_categories clearfix">
                    <h4  class="title thin_title widget_title">Filter Projects</h4>
                    <?php asalah_portfolio_tag_list(); ?>
                </div>
            </div>
            
            <!-- start main content div -->
            <div class="col-md-9 pull-right main_content">
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

                    <?php while (have_posts()) : the_post(); ?>
                        <?php
                        // when start loob count the current post by adding 1 top $postnum
                        $postnum++;
                        ?>

                        <!-- then check if this is the first post in the row, if sow open the div tag for row -->
                        <?php if ($postnum == 1) { ?>    
                            <div class="row portfolio_grid_row">
                            <?php } ?>

                            <!-- then add the current post thumbnail with proper rel to use in jquery intro sliding -->
                            <div class="view view-tenth col-md-4 col-xs-4 project_thumbnail portfoliotagfilterall <?php echo asalah_portfolio_tag(); ?>">
                                <?php $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>
                                <a rel="project_thumbnail_<?php echo $post->ID ?>" href="<?php echo get_permalink(); ?>"  class="thumbnail"><?php the_post_thumbnail('portfolio'); ?></a>
                                
                                <div class="mask"><div class="mask_inside clearfix">
                                    <h2><?php echo get_the_title() ?></h2>
                                    <p><?php echo excerpt(15) ?></p>
                                    <a href="<?php echo get_permalink() ?>" class="info"><i class="fa fa-link"></i></a>
                                </div></div>
                                
                            </div>
                            <?php
                            // add post title, excerpt, permalink, postnum in current row, and post order in current display
                            // to use it after showing 3 posts in the row
                            // we use postnum and current_post to set the class of intro column
                            $intros[] = array(
                                $post->ID,
                                get_the_title(),
                                excerpt(100),
                                get_permalink(),
                                $postnum,
                                $wp_query->current_post,
                                asalah_portfolio_tag()
                            );
                            ?>

                            <!-- 
                            check if 3 posts already returned in the current row
                            or all posts in the currentd page has been returned.
                            if no repeat the loob again till it
                            return 3 posts, if yes use the $intros array to 
                            output 3 intros of the the last 3 posts in the row 
                            -->
                            <?php if ($postnum == 3 || ($wp_query->post_count - $wp_query->current_post == 1)) { ?>
                                
                            </div><!-- close the portfolio_grid_row if 3 posts already returned or all posts returned -->
                            <?php
                            // and set post postnum to 0 and reset array so we can start another row in the next loob
                            $postnum = 0;
                            $intros = array();
                            ?>
                        <?php } ?>
                    <?php endwhile; ?>

                    <?php asalah_bootstrap_pagination(); ?>

                <?php endif; ?>
            </div>
            <!-- end main content div -->

        </div>
    </div>
</div>

<?php get_footer(); ?>
<?php
get_header();
?>
<!-- start site content -->
<div class="site_content">

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

    <div class="container single_project">
        <div class="row content_container">
            <?php while (have_posts()) : the_post(); ?>
                <div class="main_content <?php echo asalah_project_content_class(); ?>">
                    <header class="post_banner portfolio_post_banner portfolio_post_image_banner">
                        <?php echo asalah_blog_post_banner(); ?>
                    </header>

                </div>

                <div class="side_content <?php echo asalah_project_sidebar_class(); ?>">

                    <?php
                    // difine project info container classes in case of full widh project layout
                    $project_info_container = '';
                    $project_description_content = '';
                    $project_details_content = '';
                    if (asalah_project_sidebar_class() == 'col-md-12') {
                        $project_info_container = 'row';
                        $project_description_content = 'col-md-8';
                        $project_details_content = 'col-md-4';
                    }
                    ?>
                    <div class="project_info_container <?php echo $project_info_container ?>">
                        <div class="project_description_content  <?php echo $project_description_content ?>">
                            <div class="widget_container">
                                <h4 class="title thin_title widget_title"><?php _e('Project Overview', 'asalah') ?></h4>
                                <?php the_content(); ?>
                            </div>
                        </div>

                        <div class="project_details_content  <?php echo $project_details_content ?>">
                            <?php if ((asalah_post_option("asalah_projects_details") == "show") || (asalah_option("asalah_project_details") && asalah_post_option("asalah_projects_details") != "hide")): ?>
                                <div class="widget_container">
                                    <h4 class="title thin_title widget_title"><?php _e('Project Details', 'asalah') ?></h4>
                                    <div class="projects_details_content">
                                        <div class="project_details_item">
                                            <?php
                                            if (asalah_post_option('asalah_project_date')) {
                                                echo '<p><strong>'.__('Date', 'asalah').' : </strong>' . asalah_post_option('asalah_project_date') . '</p>';
                                            }
                                            ?>
                                        </div>

                                        <div class="project_details_item">
                                            <?php
                                            // project client
                                            if (asalah_post_option('asalah_project_client')) {
                                                echo "<p>";
                                                if (asalah_post_option('asalah_project_client_url')) {
                                                    echo '<strong>Client : </strong><a target="_blank" href="' . asalah_post_option('asalah_project_client_url') . '">' . asalah_post_option('asalah_project_client') . '</a>';
                                                } else {
                                                    echo '<strong>'.__('Client', 'asalah').' : </strong>' . asalah_post_option('asalah_project_client');
                                                }
                                                echo "</p>";
                                            }
                                            ?>
                                        </div>

                                        <div class="project_details_item">
                                            <?php
                                            $tags_list = get_the_term_list($post->ID, 'tagportfolio', '', ', ', '');
                                            if ($tags_list != ''):
                                                ?>
                                                <p><strong><?php _e("Tags", "asalah"); ?> : </strong><?php
                                                    echo $tags_list;
                                                    ?></p>
                                            <?php endif; ?>
                                        </div>

                                        <div class="project_details_item project_preview_url">
                                            <?php
                                            // project preview text
                                            if (asalah_post_option('asalah_project_preview_text')) {
                                                $preview_text = asalah_post_option('asalah_project_preview_text');
                                            } else {
                                                $preview_text = __('Live Preview', 'asalah');
                                            }

                                            if (asalah_post_option('asalah_project_url')) {
                                                echo '<strong>'.__('Project URL', 'asalah').' : </strong><a target="_blank" href="' . asalah_post_option('asalah_project_url') . '">' . $preview_text . ' </a>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php
                            if ((asalah_post_option("asalah_projects_social") == "show") || (asalah_option("asalah_project_social_share") && asalah_post_option("asalah_projects_social") != "hide")) {
                                asalah_post_like();
                            }
                            ?>

                        </div>
                    </div>
                </div>


            <?php endwhile; ?>

        </div>

        <?php if ((asalah_post_option("asalah_other_projects") == "show") || ( asalah_option("asalah_other_projects") && asalah_post_option("asalah_other_projects") != 'hide')): ?>
        <!-- shadow seperator only if other projects enabled -->
        <div class="row">
            <div class="col-md-12 seperator_shadow"><img src="<?php echo get_template_directory_uri(); ?>/img/sep_shadow.png"></div>
        </div>

        <!-- start other projects except this project -->
        <div class="row">
            <div class="col-md-3 portfolio_desc">
                <?php if (asalah_option('asalah_other_project_title')): ?>
                <h3 class="title thin_title"><?php echo asalah_option('asalah_other_project_title'); ?></h3>
                <?php endif; ?>
                
                <?php if (asalah_option('asalah_other_projects_desc')): ?>
                <p><?php echo asalah_option('asalah_other_projects_desc'); ?></p>
                <?php endif; ?>
                
                <?php if (asalah_option('asalah_portfolio_url')): ?>
                <a href="<?php echo asalah_option('asalah_portfolio_url'); ?>" class="btn btn-default"><span><?php _e("All Projects", "asalah"); ?></span></a>
                <?php endif; ?>
            </div>

            <div class="col-md-9">
                <?php echo asalah_return_portfolio_grid_hovereffect(3, 'date', '', '', $post->ID); ?>
            </div>

        </div>
        <?php endif; ?>

    </div>

</div>
<?php get_footer(); ?>
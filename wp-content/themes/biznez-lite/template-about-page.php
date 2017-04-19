 <?php 

 get_header(); global $themename; global $shortname;

/*Template name: About page */

?>

<div id="full_Width" class="container_24 clearfix"> <!-- Content -->

  <div id="content" class="grid_24">

   <div class="skt-breadcrumb grid_11">

		<?php if ((class_exists('biznez_breadcrumb_class'))) {$biznez_breadcumb->custom_breadcrumb();} ?>

	</div>

	<?php if(have_posts()) : ?>

    <?php while(have_posts()) : the_post(); ?>

	<div class="pagetitle-wrap clearfix">

			<div class="page-title grid_11">

				<?php the_title(); ?>

			</div>

	</div><!--pagetitle-warp-->

    <div class="post" id="post-<?php the_ID(); ?>">

      <div class="entry clearfix">

        <?php the_content(); ?>

      </div>

    </div>

    <?php endwhile; ?>

    <?php else :  ?>

    <div class="post">

      <h2>

        <?php _e('Not Found','biznez-lite'); ?>

      </h2>

    </div>

    <?php endif; ?>

    <div class="clear"></div>

 

<div class="our_team_member container_24">

  <h2 class="member_head"><?php if(sketch_get_option($shortname.'_about_teamhead')){ echo sketch_get_option($shortname.'_about_teamhead','biznez-lite'); } else { _e('Our Team Member','biznez-lite'); } ?></h2>



  <div class="row-member clearfix">
	<!--team-container1-->
	<div class="team-container grid_7">

                <div class="member-avatar">
				  <a href="javascript:void(0);" class="teammember-wrap">
					 <img class="memberimg" alt="teammember" src="<?php if(sketch_get_option($shortname.'_tm_img1')){ echo sketch_get_option($shortname.'_tm_img1','biznez-lite'); } ?>" width="180" height="180" />
				  </a>		 
				</div>
				<div class="member-data">
                      <div class="member-name">
                      		<a href="<?php if(sketch_get_option($shortname.'_tm_weblink1')){ echo esc_url(sketch_get_option($shortname.'_tm_weblink1','biznez-lite')); } ?>"><?php if(sketch_get_option($shortname.'_tm_name1')){ echo sketch_get_option($shortname.'_tm_name1','biznez-lite'); } ?></a>
                       </div>
   						<div class="member-position"><?php if(sketch_get_option($shortname.'_tm_job1')){ echo sketch_get_option($shortname.'_tm_job1','biznez-lite'); } ?></div>
						<?php if(sketch_get_option($shortname.'_tm_content1')){ $content1 = sketch_get_option($shortname.'_tm_content1','biznez-lite'); } ?>
						<p><?php echo biznez_slider_limit_words($content1, '20'); ?></p>
						<ul class="teamsocial">
							<?php if(sketch_get_option($shortname.'_tm_fb1')){ $fb_url1 = esc_url(sketch_get_option($shortname.'_tm_fb1','biznez-lite')); } ?>
							<?php if(sketch_get_option($shortname.'_tm_tw1')){ $tw_url1 = esc_url(sketch_get_option($shortname.'_tm_tw1','biznez-lite')); } ?>
							<?php if(sketch_get_option($shortname.'_tm_drd1')){ $drb_url1 = esc_url(sketch_get_option($shortname.'_tm_drd1','biznez-lite')); } ?>
							<?php if( $fb_url1) { ?><li><a class="tooltip" title="Facebook" href="<?php echo $fb_url1; ?>"><span class="team-fb"></span></a></li><?php } ?>
							<?php if( $tw_url1) { ?><li><a class="tooltip" title="Twitter" href="<?php echo $tw_url1; ?>"><span class="team-tw"></span></a></li><?php } ?>
							<?php if( $drb_url1) { ?><li><a class="tooltip" title="Dribble" href="<?php echo $drb_url1; ?>"><span class="team-drb"></span></a></li><?php } ?>
						</ul>
				</div>
	  </div><!--team-container1-->
	  
	  <!--team-container2-->
	<div class="team-container grid_7">

                <div class="member-avatar">
				  <a href="javascript:void(0);" class="teammember-wrap">
					 <img class="memberimg" alt="teammember" src="<?php if(sketch_get_option($shortname.'_tm_img2')){ echo sketch_get_option($shortname.'_tm_img2','biznez-lite'); } ?>" width="180" height="180" />
				  </a>		 
				</div>
				<div class="member-data">
                      <div class="member-name">
                      		<a href="<?php if(sketch_get_option($shortname.'_tm_weblink2')){ echo esc_url(sketch_get_option($shortname.'_tm_weblink2','biznez-lite')); } ?>"><?php if(sketch_get_option($shortname.'_tm_name2')){ echo sketch_get_option($shortname.'_tm_name2','biznez-lite'); } ?></a>
                       </div>
   						<div class="member-position"><?php if(sketch_get_option($shortname.'_tm_job2')){ echo sketch_get_option($shortname.'_tm_job2','biznez-lite'); } ?></div>
						<?php if(sketch_get_option($shortname.'_tm_content2')){ $content2 = sketch_get_option($shortname.'_tm_content2','biznez-lite'); } ?>
						<p><?php echo biznez_slider_limit_words($content2, '20'); ?></p>
						<ul class="teamsocial">
						
							<?php if(sketch_get_option($shortname.'_tm_fb2')){ $fb_url2 = esc_url(sketch_get_option($shortname.'_tm_fb2','biznez-lite')); } ?>
							<?php if(sketch_get_option($shortname.'_tm_tw2')){ $tw_url2 = esc_url(sketch_get_option($shortname.'_tm_tw2','biznez-lite')); } ?>
							<?php if(sketch_get_option($shortname.'_tm_drd2')){ $drb_url2 = esc_url(sketch_get_option($shortname.'_tm_drd2','biznez-lite')); } ?>
							<?php if( $fb_url2) { ?><li><a class="tooltip" title="Facebook" href="<?php echo $fb_url2; ?>"><span class="team-fb"></span></a></li><?php } ?>
							<?php if( $tw_url2) { ?><li><a class="tooltip" title="Twitter" href="<?php echo $tw_url2; ?>"><span class="team-tw"></span></a></li><?php } ?>
							<?php if( $drb_url2) { ?><li><a class="tooltip" title="Dribble" href="<?php echo $drb_url2; ?>"><span class="team-drb"></span></a></li><?php } ?>
						</ul>
				</div>
	  </div><!--team-container2-->
	  
	  <!--team-container3-->
	<div class="team-container grid_7">

                <div class="member-avatar">
				  <a href="javascript:void(0);" class="teammember-wrap">
					 <img class="memberimg" alt="teammember" src="<?php if(sketch_get_option($shortname.'_tm_img3')){ echo sketch_get_option($shortname.'_tm_img3','biznez-lite'); } ?>" width="180" height="180" />
				  </a>		 
				</div>
				<div class="member-data">
                      <div class="member-name">
                      		<a href="<?php if(sketch_get_option($shortname.'_tm_weblink3')){ echo esc_url(sketch_get_option($shortname.'_tm_weblink3','biznez-lite')); } ?>"><?php if(sketch_get_option($shortname.'_tm_name3')){ echo sketch_get_option($shortname.'_tm_name3','biznez-lite'); } ?></a>
                       </div>
   						<div class="member-position"><?php if(sketch_get_option($shortname.'_tm_job3')){ echo sketch_get_option($shortname.'_tm_job3','biznez-lite'); } ?></div>
						<?php if(sketch_get_option($shortname.'_tm_content3')){ $content3 = sketch_get_option($shortname.'_tm_content3','biznez-lite'); } ?>
						<p><?php echo biznez_slider_limit_words($content3, '20'); ?></p>
						<ul class="teamsocial">
						
							<?php if(sketch_get_option($shortname.'_tm_fb3')){ $fb_url3 = esc_url(sketch_get_option($shortname.'_tm_fb3','biznez-lite')); } ?>
							<?php if(sketch_get_option($shortname.'_tm_tw3')){ $tw_url3 = esc_url(sketch_get_option($shortname.'_tm_tw3','biznez-lite')); } ?>
							<?php if(sketch_get_option($shortname.'_tm_drd3')){ $drb_url3 = esc_url(sketch_get_option($shortname.'_tm_drd3','biznez-lite')); } ?>
							<?php if( $fb_url3) { ?><li><a class="tooltip" title="Facebook" href="<?php echo $fb_url3; ?>"><span class="team-fb"></span></a></li><?php } ?>
							<?php if( $tw_url3) { ?><li><a class="tooltip" title="Twitter" href="<?php echo $tw_url3; ?>"><span class="team-tw"></span></a></li><?php } ?>
							<?php if( $drb_url3) { ?><li><a class="tooltip" title="Dribble" href="<?php echo $drb_url3; ?>"><span class="team-drb"></span></a></li><?php } ?>
						</ul>
				</div>
	  </div><!--team-container3-->

  </div><!--row-member-->



 </div><!-- our_team_member -->

 <?php edit_post_link('Edit', '<p>', '</p>'); ?>

 </div>

  <div class="clear"></div>

</div>

<!-- content -->



<?php get_footer(); ?>
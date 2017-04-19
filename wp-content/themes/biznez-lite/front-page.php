<?php global $themename; global $shortname; ?>
<?php
if ( 'page' == get_option( 'show_on_front' ) ) {
	if ( sketch_get_option($shortname.'_hide_frontlayout') == 'false') {
	global $shortname; 
?>
<?php get_header(); ?>

<div class="slider-full skin-bg">

<?php if(sketch_get_option($shortname.'_slider_type')== 'normal') { ?>
	<div class="container_24 clearfix">
      <div class="grid_24">
		 <!-- #Slider -->
		<div id="slider">
				<div id="featuredslider"> 
					 <?php if(sketch_get_option($shortname.'_slider_img1')) { ?> <img src="<?php if(sketch_get_option($shortname.'_slider_img1')) { echo sketch_get_option($shortname.'_slider_img1'); } ?>"  alt="Skt-slide1"  <?php if(sketch_get_option($shortname.'_content_slider1')) { ?> data-caption="#slide-content-1" <?php } ?>  /><?php } ?>
					 <?php if(sketch_get_option($shortname.'_slider_img2')) { ?> <img src="<?php if(sketch_get_option($shortname.'_slider_img2')) { echo sketch_get_option($shortname.'_slider_img2'); } ?>"  alt="Skt-slide2"  <?php if(sketch_get_option($shortname.'_content_slider2')) { ?>data-caption="#slide-content-2" <?php } ?> /><?php } ?>
					 <?php if(sketch_get_option($shortname.'_slider_img3')) { ?> <img src="<?php if(sketch_get_option($shortname.'_slider_img3')) { echo sketch_get_option($shortname.'_slider_img3'); } ?>"  alt="Skt-slide3"  <?php if(sketch_get_option($shortname.'_content_slider3')) { ?>data-caption="#slide-content-3" <?php } ?> /><?php } ?>
				</div>
				<!-- Captions for Orbit -->	
				<?php if(sketch_get_option($shortname.'_content_slider1')) { ?>
					<div class="orbit-caption" id="slide-content-1">
						<div class="content">
						<?php if(sketch_get_option($shortname.'_slider_title1')) { $title1 = sketch_get_option($shortname.'_slider_title1'); } ?>
						<?php if(sketch_get_option($shortname.'_content_slider1')) { $excerpt1 = sketch_get_option($shortname.'_content_slider1'); } ?>
						<?php if(sketch_get_option($shortname.'_slider_link1')) { $link1 = sketch_get_option($shortname.'_slider_link1'); } ?>
						<?php if(isset($title1)) { ?>	<div class="title"><a href="<?php echo $link1; ?>"><?php  if (strlen($title1) > 20) { $title1 = substr( $title1, 0 , 20 ) . ".."; echo $title1; } else { echo $title1;} ?></a></div> <?php } ?>
						<?php if(isset($excerpt1)) { ?>	<div class="entry"><?php echo biznez_slider_limit_words($excerpt1, '40'); ?></div><?php } ?>
						</div>
					</div>
				<?php }  ?>
				<?php if(sketch_get_option($shortname.'_content_slider2')) { ?>
					<div class="orbit-caption" id="slide-content-2">
						<div class="content">
						<?php if(sketch_get_option($shortname.'_slider_title2')) { $title2 = sketch_get_option($shortname.'_slider_title2'); } ?>
						<?php if(sketch_get_option($shortname.'_content_slider2')) { $excerpt2 = sketch_get_option($shortname.'_content_slider2'); } ?>
						<?php if(sketch_get_option($shortname.'_slider_link2')) { $link2 = sketch_get_option($shortname.'_slider_link2'); } ?>
						<?php if(isset($title2)) { ?>	<div class="title"><a href="<?php echo $link2; ?>"><?php  if (strlen($title2) > 20) { $title2 = substr( $title2, 0 , 20 ) . ".."; echo $title2; } else { echo $title2;} ?></a></div><?php } ?>
						<?php if(isset($excerpt2)) { ?>	<div class="entry"><?php echo biznez_slider_limit_words($excerpt2, '40'); ?></div><?php } ?>
						</div>
					</div>
				<?php }  ?>
				<?php if(sketch_get_option($shortname.'_content_slider3')) { ?>
					<div class="orbit-caption" id="slide-content-3">
						<div class="content">
						<?php if(sketch_get_option($shortname.'_slider_title3')) { $title3 = sketch_get_option($shortname.'_slider_title3'); } ?>
						<?php if(sketch_get_option($shortname.'_content_slider3')) { $excerpt3 = sketch_get_option($shortname.'_content_slider3'); } ?>
						<?php if(sketch_get_option($shortname.'_slider_link3')) { $link3 = sketch_get_option($shortname.'_slider_link3'); } ?>
						<?php if(isset($title3)) { ?> <div class="title"><a href="<?php echo $link3; ?>"><?php  if (strlen($title3) > 20) { $title3 = substr( $title3, 0 , 20 ) . ".."; echo $title3; } else { echo $title3;} ?></a></div><?php } ?>
						<?php if(isset($excerpt3)) { ?> <div class="entry"><?php echo biznez_slider_limit_words($excerpt3, '40'); ?></div><?php } ?>
						</div>
					</div>
				<?php }  ?>
		</div>
		<!--slider -->
	 </div>
 </div>
<?php } else { ?>

	  	 <!-- #Slider -->

		<div id="slider">
			<div id="featuredfullslider"> 
					 <?php if(sketch_get_option($shortname.'_slider_img1')) { ?><img src="<?php if(sketch_get_option($shortname.'_slider_img1')) { echo sketch_get_option($shortname.'_slider_img1'); } ?>"  alt="Skt-slide1" <?php if(sketch_get_option($shortname.'_content_slider1')) { ?> data-caption="#slide-content-1" <?php } ?>  /><?php } ?>
					 <?php if(sketch_get_option($shortname.'_slider_img2')) { ?><img src="<?php if(sketch_get_option($shortname.'_slider_img2')) { echo sketch_get_option($shortname.'_slider_img2'); } ?>"  alt="Skt-slide2" <?php if(sketch_get_option($shortname.'_content_slider2')) { ?> data-caption="#slide-content-2" <?php } ?> /><?php } ?>
					 <?php if(sketch_get_option($shortname.'_slider_img3')) { ?><img src="<?php if(sketch_get_option($shortname.'_slider_img3')) { echo sketch_get_option($shortname.'_slider_img3'); } ?>"  alt="Skt-slide3" <?php if(sketch_get_option($shortname.'_content_slider3')) { ?> data-caption="#slide-content-3" <?php } ?>  /><?php } ?>
				</div>
				<!-- Captions for Orbit -->	
				<?php if(sketch_get_option($shortname.'_content_slider1')) { ?>
					<div class="orbit-caption" id="slide-content-1">
						<div class="content">
						<?php if(sketch_get_option($shortname.'_slider_title1')) { $title1 = sketch_get_option($shortname.'_slider_title1'); } ?>
						<?php if(sketch_get_option($shortname.'_content_slider1')) { $excerpt1 = sketch_get_option($shortname.'_content_slider1'); } ?>
						<?php if(sketch_get_option($shortname.'_slider_link1')) { $link1 = sketch_get_option($shortname.'_slider_link1'); } ?>
						<?php if(isset($title1)) { ?> <div class="title"><a href="<?php echo $link1; ?>"><?php  if (strlen($title1) > 20) { $title1 = substr( $title1, 0 , 20 ) . ".."; echo $title1; } else { echo $title1;} ?></a></div><?php } ?>
								<div class="entry"><?php echo biznez_slider_limit_words($excerpt1, '40'); ?></div>
						</div>
					</div>
				<?php } ?>
				<?php if(sketch_get_option($shortname.'_content_slider2')) { ?>
					<div class="orbit-caption" id="slide-content-2">
						<div class="content">
						<?php if(sketch_get_option($shortname.'_slider_title2')) { $title2 = sketch_get_option($shortname.'_slider_title2'); } ?>
						<?php if(sketch_get_option($shortname.'_content_slider2')) { $excerpt2 = sketch_get_option($shortname.'_content_slider2'); } ?>
						<?php if(sketch_get_option($shortname.'_slider_link2')) { $link2 = sketch_get_option($shortname.'_slider_link2'); } ?>
						<?php if(isset($title2)) { ?>	<div class="title"><a href="<?php echo $link2; ?>"><?php  if (strlen($title2) > 20) { $title2 = substr( $title2, 0 , 20 ) . ".."; echo $title2; } else { echo $title2;} ?></a></div><?php } ?>
								<div class="entry"><?php echo biznez_slider_limit_words($excerpt2, '40'); ?></div>
						</div>
					</div>
				<?php } ?>
				<?php if(sketch_get_option($shortname.'_content_slider3')) { ?>
					<div class="orbit-caption" id="slide-content-3">
						<div class="content">
						<?php if(sketch_get_option($shortname.'_slider_title3')) { $title3 = sketch_get_option($shortname.'_slider_title3'); } ?>
						<?php if(sketch_get_option($shortname.'_content_slider3')) { $excerpt3 = sketch_get_option($shortname.'_content_slider3'); } ?>
						<?php if(sketch_get_option($shortname.'_slider_link3')) { $link3 = sketch_get_option($shortname.'_slider_link3'); } ?>
						<?php if(isset($title3)) { ?>	<div class="title"><a href="<?php echo $link3; ?>"><?php  if (strlen($title3) > 20) { $title3 = substr( $title3, 0 , 20 ) . ".."; echo $title3; } else { echo $title3;} ?></a></div><?php } ?>
								<div class="entry"><?php echo biznez_slider_limit_words($excerpt3, '40'); ?></div>
						</div>
					</div>
			   <?php } ?>
			</div>
			<!--slider -->
			<?php } ?>
</div><!-- slider-full -->
<!-- #Container Area -->
<div id="container" class="clearfix">
<?php if(sketch_get_option($shortname.'_hide_frontboxes')== 'true') { ?>
<?php if(sketch_get_option($shortname.'_feature_type')== 'normal') { ?>
<div class="front-page-box clearfix">
			<div class="container_24 clearfix">
				<div class="box-container box-container1 grid_5">
				  <div class="box-img clearfix">
				<?php if(sketch_get_option($shortname.'_fb1_icon')) { ?>
					<img class="skin-bg" src="<?php  echo sketch_get_option($shortname.'_fb1_icon','biznez-lite'); ?>" alt="boximg"/>
					<?php } else { ?> <span class="font-icon-first skin-bg"></span> <?php  } ?>
					<div class="box-title"><?php if(sketch_get_option($shortname.'_fb1_heading')){ echo sketch_get_option($shortname.'_fb1_heading','biznez-lite'); } else { ?><?php _e('creative','biznez-lite'); } ?></div> 
				  </div>
				  <div class="box-text"><?php if(sketch_get_option($shortname.'_fb1_content')){ echo sketch_get_option($shortname.'_fb1_content','biznez-lite'); } else { _e('We have the most talented people in house that are excited to start with your new project. It is the drive that makes them creative.','biznez-lite'); } ?></div>
				  <div class="readmorebtn"><a href="<?php if(sketch_get_option($shortname.'_fb1_link')){ echo sketch_get_option($shortname.'_fb1_link','biznez-lite'); } ?>"><?php _e('Read more','biznez-lite'); ?></a></div>
				</div><!-- box-container -->

				<div class="box-container box-container2 grid_5">
				  <div class="box-img clearfix">
					<?php if(sketch_get_option($shortname.'_fb2_icon')) { ?>
					  <img class="skin-bg" src="<?php  echo sketch_get_option($shortname.'_fb2_icon','biznez-lite'); ?>" alt="boximg"/>
					<?php } else { ?> <span class="font-icon-second skin-bg"></span> <?php  } ?>
					  <div class="box-title"><?php if(sketch_get_option($shortname.'_fb2_heading')){ echo sketch_get_option($shortname.'_fb2_heading','biznez-lite'); } else { ?><?php _e('creative','biznez-lite'); } ?></div>
				  </div>
				  <div class="box-text"><?php if(sketch_get_option($shortname.'_fb2_content')){ echo sketch_get_option($shortname.'_fb2_content','biznez-lite'); } else { _e('We have the most talented people in house that are excited to start with your new project. It is the drive that makes them creative.','biznez-lite'); } ?></div>
				  <div class="readmorebtn"><a href="<?php if(sketch_get_option($shortname.'_fb2_link')){ echo sketch_get_option($shortname.'_fb2_link','biznez-lite'); } ?>"><?php _e('Read more','biznez-lite'); ?></a></div>
				</div><!-- box-container -->

				<div class="box-container box-container3 grid_5">
				  <div class="box-img clearfix">
					<?php if(sketch_get_option($shortname.'_fb3_icon')) { ?>
					  <img class="skin-bg" src="<?php  echo sketch_get_option($shortname.'_fb3_icon','biznez-lite'); ?>" alt="boximg"/>
					<?php } else { ?> <span class="font-icon-third skin-bg"></span> <?php  } ?>
					  <div class="box-title"><?php if(sketch_get_option($shortname.'_fb3_heading')){ echo sketch_get_option($shortname.'_fb3_heading','biznez-lite'); } else { ?><?php _e('creative','biznez-lite'); } ?></div>
				  </div>
				  <div class="box-text"><?php if(sketch_get_option($shortname.'_fb3_content')){ echo sketch_get_option($shortname.'_fb3_content','biznez-lite'); } else { _e('We have the most talented people in house that are excited to start with your new project. It is the drive that makes them creative.','biznez-lite'); } ?></div>
				  <div class="readmorebtn"><a href="<?php if(sketch_get_option($shortname.'_fb3_link')){ echo sketch_get_option($shortname.'_fb3_link','biznez-lite'); } ?>"><?php _e('Read more','biznez-lite'); ?></a></div>
				</div><!-- box-container -->

				<div class="box-container box-container4 grid_5">
				  <div class="box-img clearfix">
					<?php if(sketch_get_option($shortname.'_fb4_icon')) { ?>
						<img class="skin-bg" src="<?php  echo sketch_get_option($shortname.'_fb4_icon','biznez-lite'); ?>" alt="boximg"/>
					<?php } else { ?> <span class="font-icon-fourth skin-bg"></span> <?php  } ?>
					<div class="box-title"><?php if(sketch_get_option($shortname.'_fb4_heading')){ echo sketch_get_option($shortname.'_fb4_heading','biznez-lite'); } else { ?><?php _e('creative','biznez-lite'); } ?></div>
				  </div>
				  <div class="box-text"><?php if(sketch_get_option($shortname.'_fb4_content')){ echo sketch_get_option($shortname.'_fb4_content','biznez-lite'); } else { _e('We have the most talented people in house that are excited to start with your new project. It is the drive that makes them creative.','biznez-lite'); } ?></div>
				  <div class="readmorebtn"><a href="<?php if(sketch_get_option($shortname.'_fb4_link')){ echo sketch_get_option($shortname.'_fb4_link','biznez-lite'); } ?>"><?php _e('Read more','biznez-lite'); ?></a></div>
				</div><!-- box-container -->
			</div>
</div>
<?php } else { ?>

			<div class="front-page-box clearfix">

			<div class="container_24 clearfix">

				<div class="box-container box-container1 grid_5">

				  <div class="box-img icon-center clearfix">

				  <?php if(sketch_get_option($shortname.'_fb1_icon')) { ?>

						<div class="front-img-wrap clearfix">

							<img class="skin-bg" src="<?php  echo sketch_get_option($shortname.'_fb1_icon','biznez-lite'); ?>" alt="boximg"/>

						</div><!-- front-img-wrap -->

					<?php } else { ?>

						<div class="front-icon-wrap clearfix"><span class="center-font-icon-first skin-bg"></span></div>

					<?php  } ?>

				    <!-- front-icon-wrap -->

					<div class="box-title-center"><?php if(sketch_get_option($shortname.'_fb1_heading')){ echo sketch_get_option($shortname.'_fb1_heading','biznez-lite'); } else { ?><?php _e('creative','biznez-lite'); } ?></div> 

				  </div>

				  <div class="box-text-center"><?php if(sketch_get_option($shortname.'_fb1_content')){ echo sketch_get_option($shortname.'_fb1_content','biznez-lite'); } else { _e('We have the most talented people in house that are excited to start with your new project. It is the drive that makes them creative.','biznez-lite'); } ?></div>

				  <div class="readmorebtn-center"><a href="<?php if(sketch_get_option($shortname.'_fb1_link')){ echo sketch_get_option($shortname.'_fb1_link','biznez-lite'); } ?>"><?php _e('Read more','biznez-lite'); ?></a></div>

				</div><!-- box-container -->

				<div class="box-container box-container2 grid_5">

				  <div class="box-img icon-center clearfix">

					<?php if(sketch_get_option($shortname.'_fb2_icon')) { ?>

						 <div class="front-img-wrap clearfix">

						  <img class="skin-bg" src="<?php  echo sketch_get_option($shortname.'_fb2_icon','biznez-lite'); ?>" alt="boximg"/>

						 </div><!-- front-img-wrap -->

					<?php } else { ?> 

						<div class="front-icon-wrap clearfix"> <span class="center-font-icon-second skin-bg"></span></div><!--front-icon-wrap--> 

					<?php  } ?>

					  <div class="box-title-center"><?php if(sketch_get_option($shortname.'_fb2_heading')){ echo sketch_get_option($shortname.'_fb2_heading','biznez-lite'); } else { ?><?php _e('creative','biznez-lite'); } ?></div>

				  </div>

				  <div class="box-text-center"><?php if(sketch_get_option($shortname.'_fb2_content')){ echo sketch_get_option($shortname.'_fb2_content','biznez-lite'); } else { _e('We have the most talented people in house that are excited to start with your new project. It is the drive that makes them creative.','biznez-lite'); } ?></div>

				  <div class="readmorebtn-center"><a href="<?php if(sketch_get_option($shortname.'_fb2_link')){ echo sketch_get_option($shortname.'_fb2_link','biznez-lite'); } ?>"><?php _e('Read more','biznez-lite'); ?></a></div>

				</div><!-- box-container -->

				<div class="box-container box-container3 grid_5">

				  <div class="box-img icon-center clearfix">

					<?php if(sketch_get_option($shortname.'_fb3_icon')) { ?>

						<div class="front-img-wrap clearfix">

						  <img class="skin-bg" src="<?php  echo sketch_get_option($shortname.'_fb3_icon','biznez-lite'); ?>" alt="boximg"/>

						</div><!-- front-img-wrap -->

					<?php } else { ?> 

					 <div class="front-icon-wrap clearfix">	<span class="center-font-icon-third skin-bg"></span> </div><!--front-icon-wrap-->

					<?php  } ?>

					  <div class="box-title-center"><?php if(sketch_get_option($shortname.'_fb3_heading')){ echo sketch_get_option($shortname.'_fb3_heading','biznez-lite'); } else { ?><?php _e('creative','biznez-lite'); } ?></div>

				  </div>

				  <div class="box-text-center"><?php if(sketch_get_option($shortname.'_fb3_content')){ echo sketch_get_option($shortname.'_fb3_content','biznez-lite'); } else { _e('We have the most talented people in house that are excited to start with your new project. It is the drive that makes them creative.','biznez-lite'); } ?></div>

				  <div class="readmorebtn-center"><a href="<?php if(sketch_get_option($shortname.'_fb3_link')){ echo sketch_get_option($shortname.'_fb3_link','biznez-lite'); } ?>"><?php _e('Read more','biznez-lite'); ?></a></div>

				</div><!-- box-container -->

				<div class="box-container box-container4 grid_5">

				  <div class="box-img icon-center clearfix">

					<?php if(sketch_get_option($shortname.'_fb4_icon')) { ?>

				      	<div class="front-img-wrap clearfix">

						 <img class="skin-bg" src="<?php  echo sketch_get_option($shortname.'_fb4_icon','biznez-lite'); ?>" alt="boximg"/>

						</div><!-- front-img-wrap -->

					<?php } else { ?>

						<div class="front-icon-wrap clearfix"> <span class="center-font-icon-fourth skin-bg"></span> </div><!--front-icon-wrap-->

					<?php  } ?>	

					<div class="box-title-center"><?php if(sketch_get_option($shortname.'_fb4_heading')){ echo sketch_get_option($shortname.'_fb4_heading','biznez-lite'); } else { ?><?php _e('creative','biznez-lite'); } ?></div>

				  </div>

				  <div class="box-text-center"><?php if(sketch_get_option($shortname.'_fb4_content')){ echo sketch_get_option($shortname.'_fb4_content','biznez-lite'); } else { _e('We have the most talented people in house that are excited to start with your new project. It is the drive that makes them creative.','biznez-lite'); } ?></div>

				  <div class="readmorebtn-center"><a href="<?php if(sketch_get_option($shortname.'_fb4_link')){ echo sketch_get_option($shortname.'_fb4_link','biznez-lite'); } ?>"><?php _e('Read more','biznez-lite'); ?></a></div>

				 </div><!-- box-container -->

			 </div>
			</div>
	<?php } } ?>

<div class="container_24 clearfix">
		<!-- Content -->
		<div id="content" class="grid_24">

		<?php if(sketch_get_option($shortname.'_hide_testclientbox')== 'true') { ?>

		<div id="content_row">
			<div class="front_testimonials grid_11 omega">
			<h3><span class="testmonial-icon titleimg"></span><?php if(sketch_get_option($shortname.'_front_testmonialheadtxt')){ echo sketch_get_option($shortname.'_front_testmonialheadtxt','biznez-lite'); } else {  _e('Testimonials','biznez-lite'); } ?></h3>
			<ul id="testimonials_wrap">
				<li>
					<div class="testimonialWraper">
					<div class="testimonial">
						<p><?php if(sketch_get_option($shortname.'_testi1_content')){ echo sketch_get_option($shortname.'_testi1_content','biznez-lite'); } else { _e('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi imperdiet tortor id ligula vulputate volutpat. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.','biznez-lite'); } ?></p>
					</div>
					<div class="testifier">
						<p><?php if(sketch_get_option($shortname.'_testau1_name')){ echo sketch_get_option($shortname.'_testau1_name','biznez-lite'); } else { _e('Jack Dowd','biznez-lite'); }?></p>
						<p><a href="<?php if(sketch_get_option($shortname.'_testau1_link')){ echo sketch_get_option($shortname.'_testau1_link','biznez-lite'); } ?>" rel="external" target="blank"><?php if(sketch_get_option($shortname.'_testau1_link_text','biznez-lite')){ echo sketch_get_option($shortname.'_testau1_link_text','biznez-lite'); } else { _e('Stocker','biznez-lite'); } ?></a></p></div><!-- end .testimonial -->
					</div><!-- end .testimonialWraper -->
				</li>
				<li>
					<div class="testimonialWraper">
						<div class="testimonial">
							<p><?php if(sketch_get_option($shortname.'_testi2_content')){ echo sketch_get_option($shortname.'_testi2_content','biznez-lite'); } else { _e('In non mollis tortor. Sed libero augue, venenatis vitae lobortis vel, lobortis id dolor. Curabitur iaculis varius elit, accumsan malesuada urna vulputate eget,lobortis id dolor.','biznez-lite'); } ?></p>
						</div>
						<div class="testifier">
							<p><?php if(sketch_get_option($shortname.'_testau2_name')){ echo sketch_get_option($shortname.'_testau2_name','biznez-lite'); } else { _e('Rene Merino','biznez-lite'); } ?></p>
							<p><a href="<?php if(sketch_get_option($shortname.'_testau2_link')){ echo sketch_get_option($shortname.'_testau2_link','biznez-lite'); } ?>" rel="external" target="blank"><?php if(sketch_get_option($shortname.'_testau2_link_text','biznez-lite')){ echo sketch_get_option($shortname.'_testau2_link_text','biznez-lite'); } else { _e('Amaya Media','biznez-lite'); } ?></a></p></div><!-- end .testimonial -->
					</div><!-- end .testimonialWraper -->
				</li>
			 </ul>
			</div>
			<div id="clients" class="clients grid_12 omega">
					<div class="clients-right">
						<h3><span class="client-icon titleimg"></span><?php if(sketch_get_option($shortname.'_client_title')){ echo sketch_get_option($shortname.'_client_title','biznez-lite'); } else { _e('Our Clients','biznez-lite'); } ?></h3>
						<div class="clients-logo">
							<ul>
								<li>
									<a href="<?php if(sketch_get_option($shortname.'_ourclient_link1')){ echo esc_url(sketch_get_option($shortname.'_ourclient_link1','biznez-lite')); } ?>">
									<img src="<?php if(sketch_get_option($shortname.'_ourclient_icon1')){ echo sketch_get_option($shortname.'_ourclient_icon1','biznez-lite'); } else { echo get_template_directory_uri();?>/images/feedburner-3-64.jpg <?php } ?>" alt=""/>
									</a>
								</li>
								<li>
									<a href="<?php if(sketch_get_option($shortname.'_ourclient_link2')){ echo esc_url(sketch_get_option($shortname.'_ourclient_link2','biznez-lite')); } ?>">
									<img src="<?php if(sketch_get_option($shortname.'_ourclient_icon2')){ echo sketch_get_option($shortname.'_ourclient_icon2','biznez-lite'); } else { echo get_template_directory_uri();?>/images/stackoverflow-64.jpg <?php } ?>" alt=""/>
									</a>
								</li>
								<li>
									<a href="<?php if(sketch_get_option($shortname.'_ourclient_link3')){ echo esc_url(sketch_get_option($shortname.'_ourclient_link3','biznez-lite')); } ?>">
									<img src="<?php if(sketch_get_option($shortname.'_ourclient_icon3')){ echo sketch_get_option($shortname.'_ourclient_icon3','biznez-lite'); } else { echo get_template_directory_uri();?>/images/wordpress-3-64.jpg <?php } ?>" alt=""/>
									</a>
								</li>
								<li>
									<a href="<?php if(sketch_get_option($shortname.'_ourclient_link4')){ echo sketch_get_option($shortname.'_ourclient_link4','biznez-lite'); } ?>">
									<img src="<?php if(sketch_get_option($shortname.'_ourclient_icon4')){ echo sketch_get_option($shortname.'_ourclient_icon4','biznez-lite'); } else { echo get_template_directory_uri();?>/images/github-8-64.png <?php } ?>" alt=""/>
									</a>
								</li>
								<li>
									<a href="<?php if(sketch_get_option($shortname.'_ourclient_link5')){ echo esc_url(sketch_get_option($shortname.'_ourclient_link5','biznez-lite')); } ?>">
									<img src="<?php if(sketch_get_option($shortname.'_ourclient_icon5')){ echo sketch_get_option($shortname.'_ourclient_icon5','biznez-lite'); } else { echo get_template_directory_uri();?>/images/coroflot-64.jpg <?php } ?>" alt=""/>
									</a>
								</li>
								<li>
									<a href="<?php if(sketch_get_option($shortname.'_ourclient_link6')){ echo esc_url(sketch_get_option($shortname.'_ourclient_link6','biznez-lite')); } ?>">
									<img src="<?php if(sketch_get_option($shortname.'_ourclient_icon6')){ echo sketch_get_option($shortname.'_ourclient_icon6','biznez-lite'); } else { echo get_template_directory_uri();?>/images/amazon-64.jpg <?php } ?>" alt=""/>
									</a>
								</li>
							</ul>
						</div><!-- clients-logo -->
					</div><!-- clients_right -->
			</div><!--clients-->
			<div class="clear"></div>
		</div><!-- content_row -->
	<?php } ?>
	<?php if(sketch_get_option($shortname.'_hide_frontcontentbox') == 'true') { ?>

			<div class="CallToAction-bg grid_23 skin-border">
				<div class="callaction-opt skin-bg"></div>
				<div class="CallToAction grid_16"><h3><?php if(sketch_get_option($shortname.'_frontmain_content')){ echo sketch_get_option($shortname.'_frontmain_content','biznez-lite'); } else { _e('This is beautiful, Clean and easy to customize, unique, responsive Wordpress theme With lot&#39;s of shortcodes and features and perfectly suitable for any kind of business.','biznez-lite'); } ?></h3></div>
				<?php if(sketch_get_option($shortname.'_frontmain_buttonlink')) { ?><div class="CallToActionbtn skin-bg grid_6"><a href="<?php echo sketch_get_option($shortname.'_frontmain_buttonlink','biznez-lite');?>"><?php if(sketch_get_option($shortname.'_frontmain_buttontext')){ echo sketch_get_option($shortname.'_frontmain_buttontext','biznez-lite'); } else {  _e('Download Theme','biznez-lite'); } ?></a></div> <?php } ?>
			</div> <!--#CallToAction-bg-->
	<?php } ?>
			<div class="clear"></div>
		</div>
		<!--Content -->
  </div>
</div>
<!-- #Container Area -->
<?php get_footer(); ?>
<?php 
}else{  include('index-page.php'); }

 } else {
	include( get_home_template() );
}
 ?>
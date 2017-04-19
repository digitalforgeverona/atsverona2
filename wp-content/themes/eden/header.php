<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php 
global $qode_options_eden;
global $wp_query;
$disable_qode_seo = "";
$seo_title = "";
if (isset($qode_options_eden['disable_qode_seo'])) $disable_qode_seo = $qode_options_eden['disable_qode_seo'];
if ($disable_qode_seo != "yes") {
	$seo_title = get_post_meta($wp_query->get_queried_object_id(), "qode_seo_title", true);
	$seo_description = get_post_meta($wp_query->get_queried_object_id(), "qode_seo_description", true);
	$seo_keywords = get_post_meta($wp_query->get_queried_object_id(), "qode_seo_keywords", true);
}
?>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<?php
	if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false))
	echo('<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">');
	
	$responsiveness = "yes";
	if (isset($qode_options_eden['responsiveness'])) $responsiveness = $qode_options_eden['responsiveness'];
	if($responsiveness != "no"){
	?>
	<meta name=viewport content="width=device-width,initial-scale=1,user-scalable=no">
	<?php 
	}else{
	?>
	<meta name=viewport content="width=1200,user-scalable=no">
	<?php } ?>
	<title><?php if($seo_title) { ?><?php bloginfo('name'); ?> | <?php echo $seo_title; ?><?php } else {?><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?><?php } ?></title>
	
	<?php if ($disable_qode_seo != "yes") { ?>
		<?php if($seo_description) { ?>
			<meta name="description" content="<?php echo $seo_description; ?>">
		<?php } else if($qode_options_eden['meta_description']){ ?>
			<meta name="description" content="<?php echo $qode_options_eden['meta_description'] ?>">
		<?php } ?>

		<?php if($seo_keywords) { ?>
			<meta name="keywords" content="<?php echo $seo_keywords; ?>">
		<?php } else if($qode_options_eden['meta_keywords']){ ?>
			<meta name="keywords" content="<?php echo $qode_options_eden['meta_keywords'] ?>">
		<?php } ?>
	<?php } ?>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo $qode_options_eden['favicon_image']; ?>">
	<link rel="apple-touch-icon" href="<?php echo $qode_options_eden['favicon_image']; ?>"/>
	<!--[if gte IE 9]>
		<style type="text/css">
			.gradient {
				 filter: none;
			}
		</style>
	<![endif]-->

	<?php wp_head(); ?>
	
</head>

<body <?php body_class(); ?>>
	
	<?php 
		$enable_side_area = "yes";
		if (isset($qode_options_eden['enable_side_area'])){ if($qode_options_eden['enable_side_area'] == "no") { $enable_side_area = "no"; }};
	?>
	<?php if($enable_side_area != "no") { ?>
		<section class="side_menu right">
			<div class="side_menu_title">
				<?php if(isset($qode_options_eden['side_area_title']) && $qode_options_eden['side_area_title'] != "") { echo '<h4>'.$qode_options_eden['side_area_title'].'</h4>'; } ?>
			</div>
			<?php dynamic_sidebar('sidearea'); ?>
		</section>
	<?php } ?>
	<div class="wrapper">
	<div class="wrapper_inner">
	<!-- Google Analytics start -->
	<?php if (isset($qode_options_eden['google_analytics_code'])){
				if($qode_options_eden['google_analytics_code'] != "") { 
	?>
		<script>
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', '<?php echo $qode_options_eden['google_analytics_code']; ?>']);
			_gaq.push(['_trackPageview']);

			(function() {
				var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();
		</script>
	<?php }
		}
	?>
	<!-- Google Analytics end -->
	
<?php
	$header_in_grid = true;
	if(isset($qode_options_eden['header_in_grid'])){if ($qode_options_eden['header_in_grid'] == "no") $header_in_grid = false;}
	
	$menu_position = "";
	if(isset($qode_options_eden['menu_position'])){$menu_position = $qode_options_eden['menu_position']; }
	
	$centered_logo = false;
	if (isset($qode_options_eden['center_logo_image'])){ if($qode_options_eden['center_logo_image'] == "yes") { $centered_logo = true; }};

	$display_header_top = "yes";
	if(isset($qode_options_eden['header_top_area'])){
		$display_header_top = $qode_options_eden['header_top_area'];
	}
	if (!empty($_SESSION['qode_eden_header_top'])){
		$display_header_top = $_SESSION['qode_eden_header_top'];
	}
	$header_top_area_scroll = "no";
	if(isset($qode_options_eden['header_top_area_scroll']))
		$header_top_area_scroll = $qode_options_eden['header_top_area_scroll'];
	if (!empty($_SESSION['qode_header_top'])) {
		if ($_SESSION['qode_header_top'] == "no")
			$header_top_area_scroll = "no";
		if ($_SESSION['qode_header_top'] == "yes")
			$header_top_area_scroll = "yes";
	}
	global $wp_query;
	$id = $wp_query->get_queried_object_id();
	
	$header_style = "";
	if(get_post_meta($id, "qode_header-style", true) != ""){
		$header_style = get_post_meta($id, "qode_header-style", true);
	}else if(isset($qode_options_eden['header_style'])){
		$header_style = $qode_options_eden['header_style'];
	}
	
	$header_color_transparency_per_page = "";
	if($qode_options_eden['header_background_transparency_initial'] != "") {
		$header_color_transparency_per_page = $qode_options_eden['header_background_transparency_initial'];
	}
	if(get_post_meta($id, "qode_header_color_transparency_per_page", true) != ""){
		$header_color_transparency_per_page = get_post_meta($id, "qode_header_color_transparency_per_page", true);
	}

	$header_color_per_page = "style='";
	if(get_post_meta($id, "qode_header_color_per_page", true) != ""){
		if($header_color_transparency_per_page != ""){
			$header_background_color = qode_hex2rgb(get_post_meta($id, "qode_header_color_per_page", true));
			$header_color_per_page .= " background-color:rgba(" . $header_background_color[0] . ", " . $header_background_color[1] . ", " . $header_background_color[2] . ", " . $header_color_transparency_per_page . ");";
		}else{
			$header_color_per_page .= " background-color:" . get_post_meta($id, "qode_header_color_per_page", true) . ";";
		}
	} else if($header_color_transparency_per_page != "" && get_post_meta($id, "qode_header_color_per_page", true) == ""){
		if(isset($qode_options_eden['header_background_color']) && $qode_options_eden['header_background_color'] != ""){
			$header_background_color = qode_hex2rgb($qode_options_eden['header_background_color']);
		}else{
			$header_background_color = qode_hex2rgb("#ffffff");
		}
		$header_color_per_page .= " background-color:rgba(" . $header_background_color[0] . ", " . $header_background_color[1] . ", " . $header_background_color[2] . ", " . $header_color_transparency_per_page . ");";
	}
	
	$header_top_color_per_page = "style='";
	if(get_post_meta($id, "qode_header_color_per_page", true) != ""){
		if($header_color_transparency_per_page != ""){
			$header_background_color = qode_hex2rgb(get_post_meta($id, "qode_header_color_per_page", true));
			$header_top_color_per_page .= "background-color:rgba(" . $header_background_color[0] . ", " . $header_background_color[1] . ", " . $header_background_color[2] . ", " . $header_color_transparency_per_page . ");";
		}else{
			$header_top_color_per_page .= "background-color:" . get_post_meta($id, "qode_header_color_per_page", true) . ";";
		}
	} else if($header_color_transparency_per_page != "" && get_post_meta($id, "qode_header_color_per_page", true) == ""){
		if(isset($qode_options_eden['header_top_background_color']) && $qode_options_eden['header_top_background_color'] != ""){
			$header_top_background_color = qode_hex2rgb($qode_options_eden['header_top_background_color']);
		}else{
			$header_top_background_color = qode_hex2rgb("#ffffff");
		}
		$header_top_color_per_page .= "background-color:rgba(" . $header_top_background_color[0] . ", " . $header_top_background_color[1] . ", " . $header_top_background_color[2] . ", " . $header_color_transparency_per_page . ");";
	}
	$header_separator = qode_hex2rgb("#eaeaea");
	if(isset($qode_options_eden['header_separator_color']) && $qode_options_eden['header_separator_color'] != ""){
		$header_separator = qode_hex2rgb($qode_options_eden['header_separator_color']);
	}
	if(get_post_meta($id, "qode_header_border_per_page", true) != ""){
		$header_separator = qode_hex2rgb(get_post_meta($id, "qode_header_border_per_page", true));
	}
	
	$header_border_transparency_per_page = "";
	if(isset($qode_options_eden['header_border_transparency_initial']) && $qode_options_eden['header_border_transparency_initial'] != ""){
		$header_border_transparency_per_page = $qode_options_eden['header_border_transparency_initial'];
	}
	if(get_post_meta($id, "qode_header_border_transparency_per_page", true) != ""){
		$header_border_transparency_per_page = get_post_meta($id, "qode_header_border_transparency_per_page", true);
	}

	$header_borders_color_per_page = "";
	if($header_border_transparency_per_page != ""){
		$header_borders_color_per_page = "<style type='text/css'> 
			.header_top .left .inner > div,
			.header_top .left .inner > div:last-child,
			.header_top .right .inner > div:first-child,
			.header_top .right .inner > div,
			header .header_top .q_social_icon_holder,
			.header_menu_bottom
			{ border-color:rgba(" . $header_separator[0] . ", " . $header_separator[1] . ", " . $header_separator[2] . ", " . $header_border_transparency_per_page . "); } 
			
				</style>";
	}elseif($header_border_transparency_per_page == "" && get_post_meta($id, "qode_header_border_per_page", true) != ""){
		$header_borders_color_per_page = "<style type='text/css'> 
			.header_top .left .inner > div,
			.header_top .left .inner > div:last-child,
			.header_top .right .inner > div:first-child,
			.header_top .right .inner > div,
			header .header_top .q_social_icon_holder,
			.header_menu_bottom
			{ border-color:".get_post_meta($id, "qode_header_border_per_page", true)."; } 
			
				</style>";
	}
	if($header_border_transparency_per_page != ""){ 
		$header_top_color_per_page .= " border-color:rgba(" . $header_separator[0] . ", " . $header_separator[1] . ", " . $header_separator[2] . ", " . $header_border_transparency_per_page . ");";
		$header_color_per_page .= " border-color:rgba(" . $header_separator[0] . ", " . $header_separator[1] . ", " . $header_separator[2] . ", " . $header_border_transparency_per_page . ");";
	} elseif($header_border_transparency_per_page == "" && get_post_meta($id, "qode_header_border_per_page", true) != ""){
		$header_top_color_per_page .= " border-color:" . get_post_meta($id, "qode_header_border_per_page", true) . ";";
		$header_color_per_page .= " border-color:" . get_post_meta($id, "qode_header_border_per_page", true) . ";";
	}
	$header_color_per_page .="'";
	$header_top_color_per_page .="'";
	$header_bottom_appearance = 'fixed';
	if(isset($qode_options_eden['header_bottom_appearance'])){
		$header_bottom_appearance = $qode_options_eden['header_bottom_appearance'];
	}

    $scroll_header_top_class = '';
    if($qode_options_eden['header_top_area_scroll'] == 'no') {
        $scroll_header_top_class = 'scroll_header_top_area';
    }
?>

<header class="page_header <?php if($display_header_top == "yes"){ echo 'has_top'; }  if($header_top_area_scroll == "yes"){ echo ' scroll_top'; }?> <?php if($centered_logo){ echo " centered_logo"; } ?> <?php echo $header_bottom_appearance; ?>  <?php echo $header_style; ?> <?php if(is_active_sidebar('header_fixed_right')) { echo 'has_header_fixed_right'; } ?>">
	<div class="header_inner clearfix">
	
	<?php if(isset($qode_options_eden['enable_search']) && $qode_options_eden['enable_search'] == "yes"){ ?>
	<form role="search" action="<?php echo home_url(); ?>/" class="qode_search_form" method="get">
		<?php if($header_in_grid){ ?>
            <div class="container">
            <div class="container_inner clearfix">
        <?php } ?>

		<i class="fa fa-search"></i>
		<input type="text" placeholder="<?php _e('Search', 'qode'); ?>" name="s" class="qode_search_field" autocomplete="off" />
		<input type="submit" value="Search" />

		<div class="qode_search_close">
            <a href="#">
                <i class="fa fa-times"></i>
            </a>
        </div>
		<?php if($header_in_grid){ ?>
                </div>
            </div>
        <?php } ?>
	</form>

	<?php } ?>
	<div class="header_top_bottom_holder">
	<?php if($display_header_top == "yes"){ ?>
		<div class="header_top clearfix" <?php echo $header_top_color_per_page; ?> >
			<?php if($header_in_grid){ ?>
				<div class="container">
					<div class="container_inner clearfix">
			<?php } ?>
					<div class="left">
						<div class="inner">
						<?php	
							dynamic_sidebar('header_left'); 
						?>
						</div>
					</div>
					<div class="right">
						<div class="inner">
						<?php	
							dynamic_sidebar('header_right'); 
						?>
						</div>
					</div>
				<?php if($header_in_grid){ ?>
					</div>
				</div>
			<?php } ?>
		</div>
	<?php } ?>
	<div class="header_bottom clearfix" <?php echo $header_color_per_page; ?> >
		<?php if($header_in_grid){ ?>
				<div class="container">
					<div class="container_inner clearfix">
			<?php } ?>
					<div class="header_inner_left">
						<div class="mobile_menu_button"><span><i class="fa fa-bars"></i></span></div>
						<div class="logo_wrapper">
							<?php
							if (isset($qode_options_eden['logo_image']) && $qode_options_eden['logo_image'] != ""){ $logo_image = $qode_options_eden['logo_image'];}else{ $logo_image =  get_template_directory_uri().'/img/logo.png'; };
							if (isset($qode_options_eden['logo_image_light']) && $qode_options_eden['logo_image_light'] != ""){ $logo_image_light = $qode_options_eden['logo_image_light'];}else{ $logo_image_light =  get_template_directory_uri().'/img/logo.png'; };
							if (isset($qode_options_eden['logo_image_dark']) && $qode_options_eden['logo_image_dark'] != ""){ $logo_image_dark = $qode_options_eden['logo_image_dark'];}else{ $logo_image_dark =  get_template_directory_uri().'/img/logo_black.png'; };
							if (isset($qode_options_eden['logo_image_sticky']) && $qode_options_eden['logo_image_sticky'] != ""){ $logo_image_sticky = $qode_options_eden['logo_image_sticky'];}else{ $logo_image_sticky =  get_template_directory_uri().'/img/logo_black.png'; };
							?>
							<div class="q_logo"><a href="<?php echo home_url(); ?>/"><img class="normal" src="<?php echo $logo_image; ?>" alt="Logo"/><img class="light" src="<?php echo $logo_image_light; ?>" alt="Logo"/><img class="dark" src="<?php echo $logo_image_dark; ?>" alt="Logo"/><img class="sticky" src="<?php echo $logo_image_sticky; ?>" alt="Logo"/></a></div>
							
						</div>
                        <?php if($header_bottom_appearance == "stick menu_bottom" && is_active_sidebar('header_fixed_right')){ ?>
                            <div class="header_fixed_right_area">
                                <?php dynamic_sidebar('header_fixed_right'); ?>
                            </div>
                        <?php } ?>
					</div>
					<?php if($header_bottom_appearance != "stick menu_bottom"){ ?>
						<?php if(!$centered_logo) { ?>
							<div class="header_inner_right">
                                <div class="side_menu_button_wrapper right">
                                    <div class="side_menu_button">
                                        <?php if(is_active_sidebar('woocommerce_dropdown')) {
                                            dynamic_sidebar('woocommerce_dropdown');
                                        } ?>
                                        <?php	
											dynamic_sidebar('header_bottom_right');
										?>
                                        <?php if(isset($qode_options_eden['enable_search']) && $qode_options_eden['enable_search'] == "yes"){ ?>
                                            <a class="search_button" href="javascript:void(0)">
                                                <i class="fa fa-search"></i>
                                            </a>
                                        <?php } ?>

                                        <?php if($enable_side_area != "no"){ ?>
                                            <a class="side_menu_button_link" href="javascript:void(0)">
                                                <i class="fa fa-bars"></i>
                                            </a><?php } ?>
                                    </div>
                                </div>
							</div>
						<?php } ?>
						<nav class="main_menu drop_down <?php if($menu_position == ""){ echo 'right';} ?>">
						<?php
							
							wp_nav_menu( array( 'theme_location' => 'top-navigation' , 
																	'container'  => '', 
																	'container_class' => '', 
																	'menu_class' => '', 
																	'menu_id' => '',
																	'fallback_cb' => 'top_navigation_fallback',
																	'link_before' => '<span>',
																	'link_after' => '</span>',
																	'walker' => new qode_type1_walker_nav_menu()
						 ));
						?>
						</nav>
						<?php if($centered_logo) { ?>
							<div class="header_inner_right">
                                <div class="side_menu_button_wrapper right">
                                    <div class="side_menu_button">
                                        <?php if(is_active_sidebar('woocommerce_dropdown')) {
                                            dynamic_sidebar('woocommerce_dropdown');
                                        } ?>
                                        <?php	
											dynamic_sidebar('header_bottom_right');
										?>
                                        <?php if(isset($qode_options_eden['enable_search']) && $qode_options_eden['enable_search'] == "yes"){ ?>
                                            <a class="search_button" href="javascript:void(0)">
                                                <i class="fa fa-search"></i>
                                            </a>
                                        <?php } ?>

                                        <?php if($enable_side_area != "no"){ ?>
                                            <a class="side_menu_button_link" href="javascript:void(0)">
                                                <i class="fa fa-bars"></i>
                                            </a>
                                        <?php } ?>

                                    </div>
                                </div>
							</div>
						<?php } ?>
					<?php }else{ ?>
						<div class="header_menu_bottom">
						    <div class="header_menu_bottom_inner">
								<?php if($centered_logo) { ?>
									<div class="main_menu_header_inner_right_holder with_center_logo">
								<?php } else { ?>
									<div class="main_menu_header_inner_right_holder">
								<?php } ?>
									<nav class="main_menu drop_down">
									<?php
										wp_nav_menu( array(
											'theme_location' => 'top-navigation' ,
											'container'  => '',
											'container_class' => '',
											'menu_class' => 'clearfix',
											'menu_id' => '',
											'fallback_cb' => 'top_navigation_fallback',
											'link_before' => '<span>',
											'link_after' => '</span>',
											'walker' => new qode_type1_walker_nav_menu()
									 ));
									?>
									</nav>
									<div class="header_inner_right">
										<div class="side_menu_button_wrapper right">
											<div class="side_menu_button">
												<?php if(is_active_sidebar('woocommerce_dropdown')) {
													dynamic_sidebar('woocommerce_dropdown');
												} ?>
												<?php	
													dynamic_sidebar('header_bottom_right');
												?>
												<?php if(isset($qode_options_eden['enable_search']) && $qode_options_eden['enable_search'] == "yes"){ ?>
													<a class="search_button" href="javascript:void(0)">
														<i class="fa fa-search"></i>
													</a>
												<?php } ?>

												<?php if($enable_side_area != "no"){ ?>
													<a class="side_menu_button_link" href="javascript:void(0)">
														<i class="fa fa-bars"></i>
													</a>
												<?php } ?>

											</div>
										</div>
									</div>
                                </div>
                        </div>
                    </div>
					<?php } ?>
					<nav class="mobile_menu">
						<?php			
							wp_nav_menu( array( 'theme_location' => 'top-navigation' , 
																	'container'  => '', 
																	'container_class' => '', 
																	'menu_class' => '', 
																	'menu_id' => '',
																	'fallback_cb' => 'top_navigation_fallback',
																	'link_before' => '<span>',
																	'link_after' => '</span>',
																	'walker' => new qode_type2_walker_nav_menu()
						 ));
						?>
					</nav>
			<?php if($header_in_grid){ ?>
					</div>
				</div>
			<?php } ?>
	</div>
	</div>
	</div>
</header>
	<?php if($qode_options_eden['show_back_button'] == "yes") { ?>
		<a id='back_to_top' href='#'>
			<span class="fa-stack">
				<i class="fa fa-angle-up " style=""></i>
			</span>
		</a>
	<?php } ?>
		<?php 
			$content_class = "";
			if(get_post_meta($id, "qode_revolution-slider", true) == "" && get_post_meta($id, "qode_show-page-title", true)){
				$content_class = "content_top_margin";
			}
		?>
	<div class="content <?php echo $content_class; ?>">
<?php 
$animation = get_post_meta($id, "qode_show-animation", true);
if (!empty($_SESSION['qode_animation']) && $animation == "")
	$animation = $_SESSION['qode_animation'];

?>
			<?php if($qode_options_eden['page_transitions'] == "1" || $qode_options_eden['page_transitions'] == "2" || $qode_options_eden['page_transitions'] == "3" || $qode_options_eden['page_transitions'] == "4" || ($animation == "updown") || ($animation == "fade") || ($animation == "updown_fade") || ($animation == "leftright")){ ?>
				<div class="meta">				
					<?php if($seo_title){ ?>
						<div class="seo_title"><?php bloginfo('name'); ?> | <?php echo $seo_title; ?></div>
					<?php } else{ ?>
						<div class="seo_title"><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></div>
					<?php } ?>
					<?php if($seo_description){ ?>
						<div class="seo_description"><?php echo $seo_description; ?></div>
					<?php } else if($qode_options_eden['meta_description']){?>
						<div class="seo_description"><?php echo $qode_options_eden['meta_description']; ?></div>
					<?php } ?>
					<?php if($seo_keywords){ ?>
						<div class="seo_keywords"><?php echo $seo_keywords; ?></div>
					<?php }else if($qode_options_eden['meta_keywords']){?>
						<div class="seo_keywords"><?php echo $qode_options_eden['meta_keywords']; ?></div>
					<?php }?>
					<span id="qode_page_id"><?php echo $wp_query->get_queried_object_id(); ?></span>
					<div class="body_classes"><?php echo implode( ',', get_body_class()); ?></div>
				</div>
			<?php } ?>
			<div class="content_inner <?php echo $animation;?> ">
			<?php echo $header_borders_color_per_page; ?>
			
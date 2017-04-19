<?php

/**
 * Template for displaying the main header
 *
 * @file           header.php
 * @package        Celestial Lite
 * @author         Styled Themes 
 * @copyright      2012-2013 Styledthemes.com
 * @license        license.txt
 */
 
?>
<!DOCTYPE html>
	<!--[if IE 7]>
	<html class="ie ie7" <?php language_attributes(); ?>>
	<![endif]-->
	<!--[if IE 8]>
	<html class="ie ie8" <?php language_attributes(); ?>>
	<![endif]-->
	<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
	<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
		<div id="st-wrapper" style="border-color: <?php echo get_theme_mod( 'page_top_bar', '#3c3f41' ); ?>;">
			<header id="branding" role="banner" style="background-color:<?php echo get_theme_mod( 'header_submenu_bg', '#f6f6f6' ); ?>; border-color:<?php echo get_theme_mod( 'header_topline', '#ffffff' ); ?>; ">
				<div class="container">
					<div class="row-fluid">
					
		<div class="span4">					
			<?php 
			$logostyle = get_theme_mod( 'logo_style', 'default' );
			 switch ($logostyle) {
				case "default" : // default theme logo ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						<div id="logo"><img src="<?php echo get_template_directory_uri() ; ?>/images/demo/demo-logo.png" alt="<?php bloginfo( 'name' ); ?>" /></div>
					</a>
				<?php break;
				case "custom" : // your own logo ?>
					<?php if ( get_option('my_logo') ) : ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
							<div id="logo"><img src="<?php echo get_option( 'my_logo' ); ?>" alt="<?php bloginfo( 'name' ); ?>" /></div>
						</a>
					<?php endif; ?>			 
				<?php break;
				case "text" : // text based title and site description ?>
					<hgroup id="st-site-title">
						<h1 id="site-title">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
								<span><?php bloginfo( 'name' ); ?></span>
							</a>
						</h1>
						<h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>
					</hgroup>			
				<?php break;
				} 
			?>				
		</div>	
							
						<nav id="site-navigation" class="main-navigation span8" role="navigation" style="margin-top:<?php echo get_theme_mod( 'menumargin', '30px' ); ?>">
							<h3 class="menu-toggle"><?php _e( 'Site Menu', 'celestial-lite' ); ?></h3>
							<?php wp_nav_menu( array( 'theme_location' => 'primary-menu', 'menu_class' => 'nav-menu' ) ); ?>
						</nav><!-- #site-navigation -->
						
					</div>
				</div>
			</header>
		
<div id="st-socialbar-wrapper" style="background-color:<?php echo get_theme_mod( 'social_bg', '#393c3f' ); ?>; <?php if( get_theme_mod( 'hide_sociallines' ) == '') { ?>background-image: url('<?php echo get_template_directory_uri(); ?>/images/socialbar-bg.png');<?php } ?>">    
    
    
		<div class="container">
			<div id="st-socialbar">
            	<?php if( get_theme_mod( 'twitter_on' ) == '1') { ?>				
					<a id="st-twitter" title="" href="<?php echo get_theme_mod( 'twitter_link', '#' ); ?>" target="_blank"></a>
				<?php } ?>
				<?php if( get_theme_mod( 'facebook_on' ) == '1') { ?>
					<a id="st-facebook" title="" href="<?php echo get_theme_mod( 'facebook_link', '#' ); ?>" target="_blank"></a>
				<?php } ?>
				<?php if( get_theme_mod( 'google_on' ) == '1') { ?>
					<a id="st-google" title="" href="<?php echo get_theme_mod( 'google_link', '#' ); ?>" target="_blank"></a>
				<?php } ?>				
				<?php if( get_theme_mod( 'linkedin_on' ) == '1') { ?>
					<a id="st-linkedin" title="" href="<?php echo get_theme_mod( 'linkedin_link', '#' ); ?>" target="_blank"></a>
				<?php } ?>
				<?php if( get_theme_mod( 'pinterest_on' ) == '1') { ?>
					<a id="st-pinterest" title="" href="<?php echo get_theme_mod( 'pinterest_link', '#' ); ?>" target="_blank"></a>
				<?php } ?>
			</div>
		</div>
	</div>	
	
	<?php if ( is_front_page() ) : // show the front page or pages with the header image or widget image with the curve graphic ?>
	
		<div id="st-banner0-wrapper" style="background-color:<?php echo get_theme_mod( 'banner_background', '#050d24' ); ?>; border-color:<?php echo get_theme_mod( 'banner_top_line', '#525458' ); ?>; padding:<?php echo get_theme_mod( 'banner_fp_bg_padding', '0px' ); ?> ;">

			<?php if ( ! dynamic_sidebar( 'sidebar-0' ) ) : ?>
				
                
			<?php endif; // end sidebar widget area ?>

		<?php $header_image = get_header_image();
			if ( ! empty( $header_image ) ) : ?>
				<div id="st-header-image" >				
					<img src="<?php header_image(); ?>" class="header-image center" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="<?php bloginfo( 'name' ); ?>" />				
				</div>
		<?php endif; ?>
		
			
            <?php if( get_theme_mod( 'hide_curve' ) == '') { ?>
				<div id="st-banner0-curve"><img src="<?php echo get_template_directory_uri() ; ?>/images/showcase-curve.png" alt="banner curve" /></div>
			<?php } ?>
		</div>	
	
	<?php else : // otherwise show the header or image without the curved bottom ?>
	
		<div id="st-banner1-wrapper" style="background-color:<?php echo get_theme_mod( 'banner_background', '#446b9a' ); ?>; border-color:<?php echo get_theme_mod( 'banner_top_line', '#525458' ); ?>; padding:<?php echo get_theme_mod( 'banner_bg_padding', '0px' ); ?> ;">
			<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
				<div class="widget-banner1">	
					<?php dynamic_sidebar( 'sidebar-1' ); ?>
				</div><!-- .widget-banner2 -->
			<?php endif; ?>
		<?php if ( get_theme_mod('header_all','1') ) : ?>	
			<?php $header_image = get_header_image();
				if ( ! empty( $header_image ) ) : ?>
					<div id="st-header-image" >
						<img src="<?php echo esc_url( $header_image ); ?>" class="header-image center" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php bloginfo( 'name' ); ?>" />
					</div>
			<?php endif; ?>
		<?php endif; ?>	
		</div>		
		
	<?php endif; ?>
	

		
	<div id="st-content-wrapper" style="background-color:<?php echo get_theme_mod( 'content_bg', '#ffffff' ); ?>; color:<?php echo get_theme_mod( 'content_text', '#848484' ); ?>">
		<div class="container">
			<div class="row">
					<?php if ( !is_front_page() ) : ?>
                    <div class="span12">
			<div id="breadcrumbs">
            
				<?php if(function_exists('bcn_display'))
				{
					bcn_display();
				}?>
			</div>
            </div>
		<?php endif; ?>
		<?php if ( is_active_sidebar( 'sidebar-21' ) ) : ?>
				<div id="st-cta-wrapper">								
					<div id="st-cta" class="span12">						
							<?php dynamic_sidebar( 'sidebar-21' ); ?>						
					</div>										
				</div>
		<?php endif; ?>
			</div>
		<div class="row">
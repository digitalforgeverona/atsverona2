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
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta charset="<?php bloginfo('charset'); ?>">
        <?php if (asalah_option("asalah_responsive")): ?>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <?php endif; ?>
        <title><?php
            global $page, $paged;
            wp_title('|', true, 'right');
            bloginfo('name');
            $site_description = get_bloginfo('description', 'display');
            if ($site_description && ( is_home() || is_front_page() ))
                echo " | $site_description";
            if ($paged >= 2 || $page >= 2)
                echo ' | ' . sprintf(__('Page %s', 'asalah'), max($paged, $page));
            ?></title>
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
        

        <!-- start favicon and apple icons -->
        <?php global $asalah_data; ?>
        <?php if (asalah_option("asalah_fav_url")): ?>
            <link rel="shortcut icon" href="<?php echo asalah_option("asalah_fav_url"); ?>" title="Favicon" />
        <?php endif; ?>

        <?php if (asalah_option("asalah_apple_57")): ?>
            <link rel="apple-touch-icon" href="<?php echo asalah_option("asalah_apple_57"); ?>" />
        <?php endif; ?>

        <?php if (asalah_option("asalah_apple_72")): ?>
            <link rel="apple-touch-icon" sizes="72×72" href="<?php echo asalah_option("asalah_apple_72"); ?>" />
        <?php endif; ?>

        <?php if (asalah_option("asalah_apple_114")): ?>
            <link rel="apple-touch-icon" sizes="114×114" href="<?php echo asalah_option("asalah_apple_114"); ?>" />
        <?php endif; ?>
        <!-- end favicons and apple icons -->

        <?php wp_head(); ?>
    </head>

    <body <?php body_class(asalah_body_class()); ?>>
        <!-- start facebook sdk -->
        <?php if (asalah_option('asalah_use_sdk') && asalah_option('asalah_fb_id')): ?>
            <!-- Load facebook SDK -->
            <div id="fb-root"></div>
            <script>(function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id))
                        return;
                    js = d.createElement(s);
                    js.id = id;
                    js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=<?php echo asalah_option('asalah_fb_id'); ?>";
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));</script>
            <!-- End Load facebook SDK -->
        <?php endif; ?>
        <!-- end facebook sdk -->

        
        
        <!-- start site header -->
        <header class="site_header <?php
        if (asalah_option('asalah_sticky_header')) {
            echo "invisible_header";
        }
        
        if (asalah_option('asalah_css3_header')) {
        	echo " css3_header";
        }
        ?>">
            <!-- start header container -->
            
            
            <?php if (asalah_option("asalah_header_contact") == true || asalah_option("asalah_header_search") == true || asalah_option("asalah_header_social") == true): ?>
            <!-- start header_top container -->
            <div class="header_top">
            	<div class="container">
	            	<!-- start header info -->
	                <div class="header_info clearfix <?php echo asalah_option("asalah_headerinfo_animation", "animated ") ?>">
	                
	                	<!-- start contact info -->
	                	<?php if (asalah_option("asalah_header_contact") == true): ?>
	                	    <!-- start contact info -->
	                	    <div class="contact_info pull-left">
                            	 <?php if (asalah_option("asalah_header_mail")): ?>
	                	        <span class="contact_info_item email_address"><i class="fa fa-envelope"></i> <?php __('Mail', 'asalah') ?>: <a href="mailto:<?php echo asalah_option("asalah_header_mail"); ?>"><?php echo asalah_option("asalah_header_mail"); ?></a></span>
                              <?php endif; ?>
                              
                              <?php if (asalah_option("asalah_header_phone")): ?>
	                	        <span class="contact_info_item phone_number"><i class="fa fa-phone"></i> <?php __('Phone', 'asalah') ?>: <?php echo asalah_option("asalah_header_phone"); ?></span>
                              <?php endif; ?>
	                	    </div>
	                	<?php endif; ?>
	                	<!-- end contact info -->
	                	
                        
                        
	                    <!-- start header search box -->
	                    <?php if (asalah_option("asalah_header_search") == true): ?>
	                        <!-- start search box -->
	                        <div class="search pull-right <?php
	                        if (asalah_option("asalah_header_search_expand") != true) {
	                            echo "expanded_search";
	                        }
	                        ?>">
	                                 <?php get_search_form(); ?>
	                        </div>
	                        <!-- end search box -->
	                    <?php endif; ?>
	                    <!-- end header search box -->
	                    <?php if (asalah_option("asalah_header_language") == true): ?>
	                    <?php do_action('icl_language_selector'); ?>
	                    <?php endif; ?>     
	                    <!-- start header social icons -->     
	                    <?php if (asalah_option("asalah_header_social") == true): ?>
	                        <!-- start social icons -->
	                        <div class="header_social pull-right">
	                            <?php
	                            $header_social_skin = asalah_option("asalah_header_social_skin");
	                            ?>
	                            <?php echo asalah_social_icons_list($header_social_skin); ?>
	                        </div>
	                        <!-- end social icons -->
	                    <?php endif; ?>
	                    <!-- end header social icons -->
					 
	                </div>
	                <!-- end header info -->
            	</div>
            </div>
            <?php endif; ?>
            <!-- end header_ top container -->
            
            <!-- start header below container -->
            <div class="header_below">
	            <div class="container">
	
	                <!-- start site logo -->
	                <?php if (asalah_option("asalah_logo_url")): ?>
	                    <div class="logo pull-left <?php echo asalah_option("asalah_logo_animation", "animated ") ?>">
	                        <a class="default_logo" href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>"><img <?php if (asalah_option('asalah_logo_url_w') && asalah_option('asalah_logo_url_w') !== 0) { ?>width="<?php echo asalah_option("asalah_logo_url_w") ?>" <?php } if (asalah_option('asalah_logo_url_h') && asalah_option('asalah_logo_url_h') !== 0) { ?> height="<?php echo asalah_option("asalah_logo_url_h") ?>" <?php } ?> src="<?php echo asalah_option("asalah_logo_url") ?>" alt="<?php bloginfo('name'); ?>"><strong class="hidden"><?php bloginfo('name'); ?></strong></a>
	
	                        <!-- start retina logo -->    
	                        <?php if (asalah_option("asalah_logo_url_retina")) { ?>
	                            <a class="retina_logo" href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>"><img <?php if (asalah_option('asalah_logo_url_w') && asalah_option('asalah_logo_url_w') !== 0) { ?>width="<?php echo asalah_option("asalah_logo_url_w") ?>" <?php } if (asalah_option('asalah_logo_url_h') && asalah_option('asalah_logo_url_h') !== 0) { ?> height="<?php echo asalah_option("asalah_logo_url_h") ?>" <?php } ?> src="<?php echo asalah_option("asalah_logo_url_retina") ?>" alt="<?php bloginfo('name'); ?>"><strong class="hidden"><?php bloginfo('name'); ?></strong></a>                        <?php } ?>
	                        <!-- end retina logo -->    
	                    </div>
	                <?php else: ?>
	
	                    <!-- Text logo if no logo uploaded in option panel -->
	                    <a class="logo home-link" href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><h1><?php echo get_bloginfo('name'); ?><span class="logo_dot">.</span></h1></a>
	                <?php endif; ?>
	                <!-- end site logo -->    
	
	                <!-- start header content contains nav menu, search button and contact info -->
	                <div class="header_content pull-right">
	                    <!-- start main navbar -->
	                    <nav class="main_navbar pull-right navbar navbar-default <?php echo asalah_option("asalah_menu_animation", "animated ") ?>" role="navigation">
	                        <!-- Brand and toggle get grouped for better mobile display -->
	                        <div class="navbar-header visible-sm visible-xs navbar-left">
	                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
	                                <span class="sr-only">Toggle navigation</span>
	                                <span class="icon-bar"></span>
	                                <span class="icon-bar"></span>
	                                <span class="icon-bar"></span>
	                            </button>
	                        </div>
	
	                        <?php
	                        wp_nav_menu(array(
	                            'container' => 'div',
	                            'container_class' => 'collapse navbar-collapse navbar-ex1-collapse native_nav',
	                            'theme_location' => 'mainmenu',
	                            'menu_class' => 'nav navbar-nav',
	                            'fallback_cb' => '',
	                            'walker' => new wp_bootstrap_navwalker(),
	                        ));
	                        ?>
	                        
	                        <?php 
                            if (isset($asalah_data['asalah_mega_menu']) && asalah_option('asalah_enable_mega_menu')) {
                                $sidebars = $asalah_data['asalah_mega_menu'];
                                if (!empty($sidebars)):
                                	?>
                                	<div class="collapse navbar-collapse navbar-ex1-collapse native_nav">
                                	<?php
                        			echo '<ul class="nav navbar-nav widgets_nav">';
                                    foreach ($sidebars as $option) {
                                    	$dropdown_class = 'left_dropdown';
                                    	if ($option['type'] == 'right') {
                                    	$dropdown_class = 'right_dropdown';
                                    	}
                                        ?>
                                        <?php if (!empty($option['title'])):  ?>
                                        <li class="menu-item  mega-menu-item-<?php echo $option['order']; ?> dropdown">
                                        	<a href="#" data-hover="dropdown" class="dropdown-toggle"><?php echo $option['title']; ?></a>
                                        	<ul role="menu" class=" dropdown-menu <?php echo $dropdown_class ?> animated fadeInUp" style="display: none;">
                                        		<li class="menu-item">
                                        			<div class="widget_nav_wrapper" style="width: <?php echo $option['width']; ?>px;">
                                        				<?php echo do_shortcode(htmlspecialchars_decode($option['description'])) ?>
                                        			</div>		                        		
                                        		</li>
                                        	</ul>
                                        </li>
                                        <?php endif; ?>
                                        <?php
                                    }
                                    echo '</ul>';
                                    ?>
                                    </div>
                                    <?php
                        
                                endif;
                                }
                            ?>
	                        
	                    </nav>
	                    <!-- end main navbar -->
	
	                </div>
	                <!-- end header content -->
	
	            </div>
            </div>
            <!-- end header below container -->
        </header>
        <!-- end site header -->
        <!-- start fixed site header over the default header -->
        <?php if (asalah_option('asalah_sticky_header')): ?>
            <header class="site_header fixed_header hidden-sm hidden-xs <?php 
            if (asalah_option('asalah_css3_header')) {
            	echo " css3_header";
            }
            ?>">
                <!-- start header container -->
                        
                        
                        <?php if (asalah_option("asalah_header_contact") == true || asalah_option("asalah_header_search") == true || asalah_option("asalah_header_social") == true): ?>
                        <!-- start header_top container -->
                        <div class="header_top">
                        	<div class="container">
                            	<!-- start header info -->
                                <div class="header_info clearfix <?php echo asalah_option("asalah_headerinfo_animation", "animated ") ?>">
                                
                                	<!-- start contact info -->
                                	<?php if (asalah_option("asalah_header_contact") == true): ?>
                                	    <!-- start contact info -->
                                	    <?php if (asalah_option("asalah_header_mail")): ?>
                                    <span class="contact_info_item email_address"><i class="fa fa-envelope"></i> <?php __('Mail', 'asalah') ?>: <a href="mailto:<?php echo asalah_option("asalah_header_mail"); ?>"><?php echo asalah_option("asalah_header_mail"); ?></a></span>
                                  <?php endif; ?>
                                  
                                  <?php if (asalah_option("asalah_header_phone")): ?>
                                    <span class="contact_info_item phone_number"><i class="fa fa-phone"></i> <?php __('Phone', 'asalah') ?>: <?php echo asalah_option("asalah_header_phone"); ?></span>
                                  <?php endif; ?>
                                	<?php endif; ?>
                                	<!-- end contact info -->
                                	
                                    <!-- start header search box -->
                                    <?php if (asalah_option("asalah_header_search") == true): ?>
                                        <!-- start search box -->
                                        <div class="search pull-right <?php
                                        if (asalah_option("asalah_header_search_expand") != true) {
                                            echo "expanded_search";
                                        }
                                        ?>">
                                                 <?php get_search_form(); ?>
                                        </div>
                                        <!-- end search box -->
                                    <?php endif; ?>
                                    <!-- end header search box -->  
                                    
                                    <?php if (asalah_option("asalah_header_language") == true): ?>
                                    <?php do_action('icl_language_selector'); ?>
                                    <?php endif; ?>
                                       
                                    <!-- start header social icons -->     
                                    <?php if (asalah_option("asalah_header_social") == true): ?>
                                        <!-- start social icons -->
                                        <div class="header_social pull-right">
                                            <?php
                                            $header_social_skin = asalah_option("asalah_header_social_skin");
                                            ?>
                                            <?php echo asalah_social_icons_list($header_social_skin); ?>
                                        </div>
                                        <!-- end social icons -->
                                    <?php endif; ?>
                                    <!-- end header social icons -->
                
                                    
                                </div>
                                <!-- end header info -->
                        	</div>
                        </div>
                        <?php endif; ?>
                        <!-- end header_ top container -->
                        
                        <!-- start header below container -->
                        <div class="header_below">
                            <div class="container">
                
                                <!-- start site logo -->
                                <?php if (asalah_option("asalah_logo_url")): ?>
                                    <div class="logo pull-left <?php echo asalah_option("asalah_logo_animation", "animated ") ?>">
                                        <a class="default_logo" href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>"><img <?php if (asalah_option('asalah_logo_url_w') && asalah_option('asalah_logo_url_w') !== 0) { ?>width="<?php echo asalah_option("asalah_logo_url_w") ?>" <?php } if (asalah_option('asalah_logo_url_h') && asalah_option('asalah_logo_url_h') !== 0) { ?> height="<?php echo asalah_option("asalah_logo_url_h") ?>" <?php } ?> src="<?php echo asalah_option("asalah_logo_url") ?>" alt="<?php bloginfo('name'); ?>"><strong class="hidden"><?php bloginfo('name'); ?></strong></a>
                
                                        <!-- start retina logo -->    
                                        <?php if (asalah_option("asalah_logo_url_retina")) { ?>
                                            <a class="retina_logo" href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>"><img <?php if (asalah_option('asalah_logo_url_w') && asalah_option('asalah_logo_url_w') !== 0) { ?>width="<?php echo asalah_option("asalah_logo_url_w") ?>" <?php } if (asalah_option('asalah_logo_url_h') && asalah_option('asalah_logo_url_h') !== 0) { ?> height="<?php echo asalah_option("asalah_logo_url_h") ?>" <?php } ?> src="<?php echo asalah_option("asalah_logo_url_retina") ?>" alt="<?php bloginfo('name'); ?>"><strong class="hidden"><?php bloginfo('name'); ?></strong></a>                        <?php } ?>
                                        <!-- end retina logo -->    
                                    </div>
                                <?php else: ?>
                
                                    <!-- Text logo if no logo uploaded in option panel -->
                                    <a class="logo home-link" href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><h1><?php echo get_bloginfo('name'); ?><span class="logo_dot">.</span></h1></a>
                                <?php endif; ?>
                                <!-- end site logo -->    
                
                                <!-- start header content contains nav menu, search button and contact info -->
                                <div class="header_content pull-right">
                                    <!-- start main navbar -->
                                    <nav class="main_navbar pull-right navbar navbar-default <?php echo asalah_option("asalah_menu_animation", "animated ") ?>" role="navigation">
                                        <!-- Brand and toggle get grouped for better mobile display -->
                                        <div class="navbar-header visible-sm visible-xs navbar-left">
                                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                                                <span class="sr-only">Toggle navigation</span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                            </button>
                                        </div>
                
                                        <?php
                                        wp_nav_menu(array(
                                            'container' => 'div',
                                            'container_class' => 'collapse navbar-collapse navbar-ex1-collapse native_nav',
                                            'theme_location' => 'mainmenu',
                                            'menu_class' => 'nav navbar-nav',
                                            'fallback_cb' => '',
                                            'walker' => new wp_bootstrap_navwalker(),
                                        ));
                                        ?>
                                        
                                        <?php 
                                            if (isset($asalah_data['asalah_mega_menu']) && asalah_option('asalah_enable_mega_menu')) {
                                                $sidebars = $asalah_data['asalah_mega_menu'];
                                                if (!empty($sidebars)):
                                                	
                                                	?>
                                                	<div class="collapse navbar-collapse navbar-ex1-collapse native_nav">
                                                	<?php
                                        			echo '<ul class="nav navbar-nav widgets_nav">';
                                                    foreach ($sidebars as $option) {
                                                    	$dropdown_class = 'left_dropdown';
                                                    	if ($option['type'] == 'right') {
                                                    	$dropdown_class = 'right_dropdown';
                                                    	}
                                                        ?>
                                                        <?php if (!empty($option['title'])):  ?>
                                                        <li class="menu-item  mega-menu-item-<?php echo $option['order']; ?> dropdown">
                                                        	<a href="#" data-hover="dropdown" class="dropdown-toggle"><?php echo $option['title']; ?></a>
                                                        	<ul role="menu" class=" dropdown-menu <?php echo $dropdown_class ?> animated fadeInUp" style="display: none;">
                                                        		<li class="menu-item">
                                                        			<div class="widget_nav_wrapper" style="width: <?php echo $option['width']; ?>px;">
                                                        				<?php echo do_shortcode(htmlspecialchars_decode($option['description'])) ?>
                                                        			</div>		                        		
                                                        		</li>
                                                        	</ul>
                                                        </li>
                                                        <?php endif; ?>
                                                        <?php
                                                    }
                                                    echo '</ul>';
                                                    ?>
                                                    </div>
                                                    <?php
                                                    
                                        
                                                endif;
                                                }
                                            ?>
                                        
                                    </nav>
                                    <!-- end main navbar -->
                                    
                                    
                
                                </div>
                                <!-- end header content -->
                
                            </div>
                        </div>
                        <!-- end header below container -->
            </header>
            <?php wp_reset_query(); ?>
        <?php endif; ?>
        <!-- end fixed site header -->

        <!-- start site content -->
        <div class="site_content"> <!-- the div close in footer.php file -->
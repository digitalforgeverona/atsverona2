<?php

add_action('init', 'of_options');
include (TEMPLATEPATH . '/inc/googlefonts.php');
if (!function_exists('of_options')) {

    function of_options() {
        //Access the WordPress Categories via an Array
        $of_categories = array();
        $of_categories_obj = get_categories('hide_empty=0');
        foreach ($of_categories_obj as $of_cat) {
            $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;
        }
        $categories_tmp = array_unshift($of_categories, "Select a category:");

        //Access the WordPress Pages via an Array
        $of_pages = array();
        $of_pages_obj = get_pages('sort_column=post_parent,menu_order');
        foreach ($of_pages_obj as $of_page) {
            $of_pages[$of_page->ID] = $of_page->post_name;
        }
        $of_pages_tmp = array_unshift($of_pages, "Select a page:");

        //Testing 
        $of_options_select = array("one", "two", "three", "four", "five");
        $of_options_radio = array("one" => "One", "two" => "Two", "three" => "Three", "four" => "Four", "five" => "Five");

        //Sample Homepage blocks for the layout manager (sorter)
        $of_options_homepage_blocks = array
            (
            "disabled" => array(
                "placebo" => "placebo", //REQUIRED!
                "block_one" => "Block One",
                "block_two" => "Block Two",
                "block_three" => "Block Three",
            ),
            "enabled" => array(
                "placebo" => "placebo", //REQUIRED!
                "block_four" => "Block Four",
            ),
        );


        //Stylesheets Reader
        $alt_stylesheet_path = LAYOUT_PATH;
        $alt_stylesheets = array();

        if (is_dir($alt_stylesheet_path)) {
            if ($alt_stylesheet_dir = opendir($alt_stylesheet_path)) {
                while (($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false) {
                    if (stristr($alt_stylesheet_file, ".css") !== false) {
                        $alt_stylesheets[] = $alt_stylesheet_file;
                    }
                }
            }
        }


        //Background Images Reader
        $bg_images_path = get_stylesheet_directory() . '/images/bg/'; // change this to where you store your bg images
        $bg_images_url = get_template_directory_uri() . '/images/bg/'; // change this to where you store your bg images
        $bg_images = array();

        if (is_dir($bg_images_path)) {
            if ($bg_images_dir = opendir($bg_images_path)) {
                while (($bg_images_file = readdir($bg_images_dir)) !== false) {
                    if (stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
                        natsort($bg_images); //Sorts the array into a natural order
                        $bg_images[] = $bg_images_url . $bg_images_file;
                    }
                }
            }
        }


        /* ----------------------------------------------------------------------------------- */
        /* TO DO: Add options/functions that use these */
        /* ----------------------------------------------------------------------------------- */

        //More Options
        $uploads_arr = wp_upload_dir();
        $all_uploads_path = $uploads_arr['path'];
        $all_uploads = get_option('of_uploads');
        $other_entries = array("Select a number:", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19");
        $body_repeat = array("no-repeat", "repeat-x", "repeat-y", "repeat");
        $body_pos = array("top left", "top center", "top right", "center left", "center center", "center right", "bottom left", "bottom center", "bottom right");

        // Image Alignment radio box
        $of_options_thumb_align = array("alignleft" => "Left", "alignright" => "Right", "aligncenter" => "Center");

        // Image Links to Options
        $of_options_image_link_to = array("image" => "The Image", "post" => "The Post");


        /* ----------------------------------------------------------------------------------- */
        /* The Options Array */
        /* ----------------------------------------------------------------------------------- */

// Set the Options Array
        global $of_options;
        $of_options = array();

        /* start header settings here */
        $of_options[] = array("name" => "Header Settings",
            "type" => "heading"
        );


        /* start logo settings */
        $of_options[] = array("name" => "Logo URL",
            "desc" => "Put the URL of your logo, or upload new one",
            "id" => "asalah_logo_url",
            "std" => "",
            "type" => "media");

        $of_options[] = array("name" => "Retina Logo URL",
            "desc" => "It should be double size as default logo",
            "id" => "asalah_logo_url_retina",
            "std" => "",
            "type" => "media");

        $of_options[] = array("name" => "Default Logo Width in pixel",
            "desc" => "",
            "id" => "asalah_logo_url_w",
            "std" => "0",
            "min" => "0",
            "max" => "600",
            "type" => "sliderui"
        );

        $of_options[] = array("name" => "Default Logo Height in pixel",
            "desc" => "",
            "id" => "asalah_logo_url_h",
            "std" => "36",
            "step" => "1",
            "min" => "0",
            "max" => "600",
            "type" => "sliderui"
        );
        
        $of_options[] = array("name" => "Sticky header Logo Width",
            "desc" => "",
            "id" => "asalah_sticky_logo_width",
            "std" => "0",
            "step" => "1",
            "min" => "0",
            "max" => "600",
            "type" => "sliderui"
        );
        
        $of_options[] = array("name" => "Sticky header Logo Height",
            "desc" => "",
            "id" => "asalah_sticky_logo_height",
            "std" => "30",
            "step" => "1",
            "min" => "0",
            "max" => "600",
            "type" => "sliderui"
        );
        
        $of_options[] = array("name" => "Sticky header margin bottom",
            "desc" => "",
            "id" => "asalah_sticky_margin_bottom",
            "std" => "2",
            "step" => "1",
            "min" => "0",
            "max" => "30",
            "type" => "sliderui"
        );
        
        $of_options[] = array("name" => "Sticky header menu margin top",
            "desc" => "",
            "id" => "asalah_sticky_menu_margin_top",
            "std" => "7",
            "step" => "1",
            "min" => "0",
            "max" => "30",
            "type" => "sliderui"
        );

        $of_options[] = array("name" => "Logo Margin Top",
            "desc" => "",
            "id" => "asalah_logo_margin_top",
            "std" => "0",
            "min" => "0",
            "max" => "200",
            "type" => "sliderui"
        );


        $asalah_logo_animations = array("none" => "None", "fadeIn" => "Fade In", "fadeInRight" => "Fade In Right", "fadeInLeft" => "Fade In Left", "fadeInDown" => "Fade In Down", "fadeInUp" => "Fade In Up", "bounceIn" => "Bounce In");
        $of_options[] = array("name" => "Logo animation after page load",
            "desc" => "Select your themes alternative color scheme.",
            "id" => "asalah_logo_animation",
            "std" => "none",
            "type" => "select",
            "options" => $asalah_logo_animations
        );

        $of_options[] = array("name" => "Favicon URL",
            "desc" => "",
            "id" => "asalah_fav_url",
            "std" => "",
            "type" => "media");

        $of_options[] = array("name" => "Apple Iphone Icon",
            "desc" => "57px X 57px",
            "id" => "asalah_apple_57",
            "std" => "",
            "type" => "media");

        $of_options[] = array("name" => "Apple Ipad Icon",
            "desc" => "72px X 72px",
            "id" => "asalah_apple_72",
            "std" => "",
            "type" => "media");

        $of_options[] = array("name" => "Apple Retina Icon",
            "desc" => "144px X 114px",
            "id" => "asalah_apple_114",
            "std" => "",
            "type" => "media");


        /* start menu settings */

        $of_options[] = array("name" => "Main menu Margin Top",
            "desc" => "",
            "id" => "asalah_menu_margin_top",
            "std" => "0",
            "min" => "0",
            "max" => "200",
            "type" => "sliderui"
        );


        $asalah_logo_animations = array("none" => "None", "fadeIn" => "Fade In", "fadeInRight" => "Fade In Right", "fadeInLeft" => "Fade In Left", "fadeInDown" => "Fade In Down", "fadeInUp" => "Fade In Up", "bounceIn" => "Bounce In");

        $of_options[] = array("name" => "Main menu animation after page load",
            "desc" => "Select your themes alternative color scheme.",
            "id" => "asalah_menu_animation",
            "std" => "none",
            "type" => "select",
            "options" => $asalah_logo_animations
        );
		
		/* start header info */
		$of_options[] = array("name" => "Show WPML language switcher in header",
		    "desc" => "",
		    "id" => "asalah_header_language",
		    "std" => 0,
		    "type" => "switch"
		);
		
        /* start header info */
        $of_options[] = array("name" => "Show Search In Header",
            "desc" => "",
            "id" => "asalah_header_search",
            "std" => 1,
            "folds" => 1,
            "type" => "switch"
        );

        $of_options[] = array("name" => "Expandable search form In Header",
            "desc" => "",
            "id" => "asalah_header_search_expand",
            "std" => 1,
            "fold" => "asalah_header_search",
            "type" => "switch"
        );

        $of_options[] = array("name" => "Show social icons In Header",
            "desc" => "",
            "id" => "asalah_header_social",
            "std" => 0,
            "folds" => 1,
            "type" => "switch"
        );

        $asalah_social_skins = array("default_social" => "Default", "green_social" => "Green", "gray_social" => "Gray");

        $of_options[] = array("name" => "Social icons skin in header",
            "desc" => "",
            "id" => "asalah_header_social_skin",
            "std" => "default_social",
            "type" => "select",
            "fold" => "asalah_header_social",
            "options" => $asalah_social_skins
        );

        $of_options[] = array("name" => "Show contact info In Header",
            "desc" => "",
            "id" => "asalah_header_contact",
            "std" => 1,
            "folds" => 1,
            "type" => "switch"
        );
        
        $of_options[] = array("name" => "Sticky Header",
            "desc" => "",
            "id" => "asalah_sticky_header",
            "std" => 1,
            "folds" => 1,
            "type" => "switch"
        );
        
        $of_options[] = array("name" => "Use CSS3 For transparent header",
            "desc" => "Looks better in case of big logo",
            "id" => "asalah_css3_header",
            "std" => 1,
            "type" => "switch"
        );

        $of_options[] = array("name" => "Header Phone Number",
            "desc" => "",
            "id" => "asalah_header_phone",
            "std" => "+1-23-456789",
            "fold" => "asalah_header_contact",
            "type" => "text");

        $of_options[] = array("name" => "Header Email Address",
            "desc" => "",
            "id" => "asalah_header_mail",
            "std" => "email@address.com",
            "fold" => "asalah_header_contact",
            "type" => "text");


        $asalah_logo_animations = array("none" => "None", "fadeIn" => "Fade In", "fadeInRight" => "Fade In Right", "fadeInLeft" => "Fade In Left", "fadeInDown" => "Fade In Down", "fadeInUp" => "Fade In Up", "bounceIn" => "Bounce In");

        $of_options[] = array("name" => "Header info animation after page load",
            "desc" => "",
            "id" => "asalah_headerinfo_animation",
            "std" => "none",
            "type" => "select",
            "options" => $asalah_logo_animations
        );



        $of_options[] = array("name" => "Header Custom Code",
            "desc" => "",
            "id" => "asalah_header_code",
            "std" => "",
            "type" => "textarea");



        $of_options[] = array("name" => "CSS Custom Code",
            "desc" => "",
            "id" => "asalah_custom_css",
            "std" => "",
            "type" => "textarea");

        /* start footer settings here */
        $of_options[] = array("name" => "Footer Settings",
            "type" => "heading"
        );
        
        $of_options[] = array("name" => "Dark Footer",
            "desc" => "",
            "id" => "asalah_dark_footer",
            "std" => 1,
            "type" => "switch"
        );
        
        $of_options[] = array("name" => "Hide footer",
            "desc" => "",
            "id" => "asalah_hide_footer",
            "std" => 0,
            "type" => "switch"
        );
        
        $of_options[] = array("name" => "Hide first footer",
            "desc" => "",
            "id" => "asalah_hide_footer1",
            "std" => 0,
            "type" => "switch"
        );
        
        $of_options[] = array("name" => "Hide second footer",
            "desc" => "",
            "id" => "asalah_hide_footer2",
            "std" => 0,
            "type" => "switch"
        );
        
        $of_options[] = array("name" => "3 Widgets footer",
            "desc" => "",
            "id" => "asalah_footer_three",
            "std" => 0,
            "type" => "switch"
        );
		
		$of_options[] = array("name" => "Show WPML language switcher in footer",
		    "desc" => "",
		    "id" => "asalah_footer_language",
		    "std" => 0,
		    "type" => "switch"
		);
		
        /* start logo settings */
        $of_options[] = array("name" => "Copyrights Logo URL",
            "desc" => "Put the URL of your logo, or upload new one",
            "id" => "asalah_credits_image",
            "std" => get_template_directory_uri()."/images/creditslogo.png",
            "type" => "media");


        $of_options[] = array("name" => "Copyrights Logo Width in pixel",
            "desc" => "",
            "id" => "asalah_credits_image_w",
            "std" => "0",
            "min" => "0",
            "max" => "100",
            "type" => "sliderui"
        );

        $of_options[] = array("name" => "Copyrights Logo Height in pixel",
            "desc" => "",
            "id" => "asalah_credits_image_h",
            "std" => "28",
            "step" => "1",
            "min" => "1",
            "max" => "100",
            "type" => "sliderui"
        );

        $of_options[] = array("name" => "Copyright Text",
            "desc" => "Copyright Text",
            "id" => "asalah_credits_text",
            "std" => "All right reserved to Asalah Solutions | Sarraty.",
            "type" => "text");


        $of_options[] = array("name" => "Show social icons instead of footer menu",
            "desc" => "",
            "id" => "asalah_footer_social",
            "std" => 0,
            "folds" => 1,
            "type" => "switch"
        );
        
        $of_options[] = array("name" => "Enable Scroll To Top Button",
            "desc" => "",
            "id" => "asalah_scroll_totop",
            "std" => 1,
            "folds" => 1,
            "type" => "switch"
        );

        $asalah_social_skins = array("" => "Default", "green_social" => "Green", "gray_social" => "Gray");

        $of_options[] = array("name" => "Footer Social icons style",
            "desc" => "Select your themes alternative color scheme.",
            "id" => "asalah_footer_social_skin",
            "std" => "",
            "fold" => "asalah_footer_social",
            "type" => "select",
            "options" => $asalah_social_skins
        );


        $of_options[] = array("name" => "Footer Custom Code",
            "desc" => "",
            "id" => "asalah_footer_code",
            "std" => "",
            "type" => "textarea");

        /* start posts and pages settings here */
        $of_options[] = array("name" => "Posts and Pages Settings",
            "type" => "heading"
        );

        $of_options[] = array("name" => "Enable Page Title",
            "desc" => "",
            "id" => "asalah_enable_pagetitle",
            "std" => 1,
            "folds" => 1,
            "type" => "switch"
        );

        $of_options[] = array("name" => "Enable Breadcrumb",
            "desc" => "",
            "id" => "asalah_enable_breadcrumb",
            "std" => 1,
            "fold" => "asalah_enable_pagetitle",
            "type" => "switch"
        );

        $of_options[] = array("name" => "Enable Wordpress navtive comments",
            "desc" => "",
            "id" => "asalah_enable_comments",
            "std" => 1,
            "type" => "switch"
        );
        
        /*
        $of_options[] = array("name" => "Enable Facebook comments",
            "desc" => "",
            "id" => "asalah_enable_fbcomments",
            "std" => 0,
            "type" => "switch"
        );
         * 
         */

        $of_options[] = array("name" => "Enable Post Social Share",
            "desc" => "",
            "id" => "asalah_post_social_share",
            "std" => 1,
            "folds" => 1,
            "type" => "switch"
        );
        
        /*
        $of_options[] = array("name" => "Sliding Post Social Share",
            "desc" => "",
            "id" => "asalah_sliding_social_share",
            "std" => 1,
            "fold" => "asalah_post_social_share",
            "type" => "switch"
        );
        */

        $asalah_social_skins = array("" => "Default", "green_social" => "Green", "gray_social" => "Gray");
        $of_options[] = array("name" => "Posst social share skin",
            "desc" => "",
            "id" => "asalah_post_social_share_skin",
            "std" => "",
            "fold" => "asalah_post_social_share",
            "type" => "select",
            "options" => $asalah_social_skins
        );

        $of_options[] = array("name" => "Post Tag Cloud",
            "desc" => "",
            "id" => "asalah_post_tags",
            "std" => 1,
            "type" => "switch"
        );

        $of_options[] = array("name" => "Author Box",
            "desc" => "",
            "id" => "asalah_author_box",
            "std" => 1,
            "type" => "switch"
        );

        $of_options[] = array("name" => "Show meta info bar",
            "desc" => "",
            "id" => "asalah_meta_info",
            "std" => 1,
            "type" => "switch"
        );

        $of_options[] = array("name" => "Author name in meta info line",
            "desc" => "",
            "id" => "asalah_author_meta",
            "std" => 1,
            "type" => "switch"
        );

        $post_date_positions = array("label" => "Left Side Label", "meta" => "Meta Info Line", "both" => "Both label and meta line", "none" => "Hide");

        $of_options[] = array("name" => "Post Date Position",
            "desc" => "",
            "id" => "asalah_post_date_position",
            "std" => "",
            "type" => "select",
            "options" => $post_date_positions
        );

        $of_options[] = array("name" => "Post icons",
            "desc" => "",
            "id" => "asalah_post_icons",
            "std" => 1,
            "type" => "switch"
        );
        
        $of_options[] = array("name" => "Blog Page URL",
            "desc" => "The URL of page you created to use as main blog page",
            "id" => "asalah_blog_url",
            "std" => "",
            "type" => "text");
        
        /* start project settings */
        $of_options[] = array("name" => "Projects Settings",
            "type" => "heading"
        );
        
        $of_options[] = array("name" => "Show Project Details",
            "desc" => "",
            "id" => "asalah_project_details",
            "std" => 1,
            "folds" => 1,
            "type" => "switch"
        );
        
        $of_options[] = array("name" => "Enable Porject Social Share",
            "desc" => "",
            "id" => "asalah_project_social_share",
            "std" => 1,
            "folds" => 1,
            "type" => "switch"
        );
        
        $of_options[] = array("name" => "Show Other Projects",
            "desc" => "",
            "id" => "asalah_other_projects",
            "std" => 1,
            "folds" => 1,
            "type" => "switch"
        );
        
        $of_options[] = array("name" => "Other Projects Block Title",
            "desc" => "",
            "id" => "asalah_other_project_title",
            "std" => "Other Projects",
            "type" => "text");
        
        $of_options[] = array("name" => "Other Projects Block Description Text",
            "desc" => "",
            "id" => "asalah_other_projects_desc",
            "std" => "",
            "type" => "textarea");
        
        $of_options[] = array("name" => "Portfolio Page URL",
            "desc" => "The URL of page you created to use as main portfolio page",
            "id" => "asalah_portfolio_url",
            "std" => "",
            "type" => "text");
            
        $of_options[] = array("name" => "Portfolio Page Projects Per Page",
            "desc" => "Number of projects will display in portfolio page",
            "id" => "asalah_portfolio_posts_per_page",
            "std" => "9",
            "type" => "text");
            
        $of_options[] = array("name" => "Portfolio Thumbnail Crop Width",
            "desc" => "The default size to crop portfolio thumbnail, please note that you should modify this before adding any project and not to change it again after adding projects, if you change it after adding projects you need to regenerate all thumbnails using regenerate thumbnail plugin ",
            "id" => "asalah_portfolio_thumb_width",
            "std" => "460",
            "type" => "text");
            
        $of_options[] = array("name" => "Portfolio Thumbnail Crop Height",
            "desc" => "The default size to crop portfolio thumbnail, please note that you should modify this before adding any project and not to change it again after adding projects, if you change it after adding projects you need to regenerate all thumbnails using regenerate thumbnail plugin ",
            "id" => "asalah_portfolio_thumb_height",
            "std" => "420",
            "type" => "text");
        
        $projects_side_positions = array("right" => "Right", "left" => "left", 'full' => "Full Witdh");

        $of_options[] = array("name" => "Project Default Layout",
            "desc" => "",
            "id" => "asalah_project_layout",
            "std" => "right",
            "type" => "select",
            "options" => $projects_side_positions
        );
        
        /* start sidebars options */
        $of_options[] = array("name" => "Sidebars Settings",
            "type" => "heading");

        $of_options[] = array("name" => "Custom Sidebars",
            "desc" => "Here you can add custom sidebars to use theme with pages and posts.",
            "id" => "asalah_custom_sidebars",
            "std" => "",
            "type" => "sidebars"
        );
        
        /* start sidebars options */
        $of_options[] = array("name" => "Mega Menu",
            "type" => "heading");
		
		$of_options[] = array("name" => "Mega Menu",
		    "desc" => "",
		    "id" => "asalah_enable_mega_menu",
		    "std" => 1,
		    "folds" => 1,
		    "type" => "switch"
		);
		
        $of_options[] = array("name" => "Menu Items",
            "desc" => "Here you can add mega menu items.",
            "id" => "asalah_mega_menu",
            "std" => "",
            "fold" => "asalah_enable_mega_menu",
            "type" => "mega"
        );

        /* start social options */
        $of_options[] = array("name" => "Post Icons Settings",
            "type" => "heading");

        $post_types = array("standard", "image", "gallery", "video", "audio");
        foreach ($post_types as $post_type) {

            $of_options[] = array("name" => $post_type . " Post Icon",
                "desc" => "",
                "id" => "asalah_post_icons_" . $post_type,
                "std" => 1,
                "folds" => 1,
                "type" => "switch"
            );

            $of_options[] = array("name" => "",
                "desc" => "Use image icon insted of font awesome icons",
                "id" => "asalah_post_icons_" . $post_type . "_image",
                "std" => 0,
                "type" => "switch"
            );

            $of_options[] = array("name" => "",
                "desc" => "Upload image to use as post icons for " . $post_type . " post, will be resized to 20X20",
                "id" => "asalah_post_icons_" . $post_type . "_image_upload",
                "std" => "",
                "type" => "upload");

            $of_options[] = array("name" => "",
                "desc" => "Icon name, Go <a target='_blank' href='http://fortawesome.github.io/Font-Awesome/icons/'>here</a>, click the icon you want and you will find it's name, for example (icon-pencil)",
                "id" => "asalah_post_icons_" . $post_type . "_fontawesome",
                "std" => "",
                "type" => "text");

            $of_options[] = array("name" => "",
                "desc" => "Icon color",
                "id" => "asalah_post_icons_" . $post_type . "_color",
                "std" => "",
                "type" => "color"
            );

            $of_options[] = array("name" => "",
                "desc" => "Icon background color.",
                "id" => "asalah_post_icons_" . $post_type . "_bg",
                "std" => "",
                "type" => "color"
            );
        }
        /* start social options */
        $of_options[] = array("name" => "Social Settings",
            "type" => "heading",
            "icon" => ADMIN_IMAGES . "asalah_social.png");

        $networks = array("facebook" => "Facebook", "twitter" => "Twitter", "google-plus" =>  "Google Plus", "dribbble" => "Dribbble", "linkedin" => "Linked In", "youtube" => "Youtube", 'vimeo-square' => 'Vimeo', "vk" => "VK", "skype" => "Skype", "instagram" => "Instagram", "pinterest" => "Pinterest", "github" => "Github", "renren" => "Ren Ren", "flickr" => "Flickr", "rss" =>  "RSS");
        
        foreach ($networks as $network => $social ) {
            $of_options[] = array("name" => $social . " Page URL",
                "desc" => "",
                "id" => "asalah_".$network."_url",
                "std" => "",
                "type" => "text");
        }

        $of_options[] = array("name" => "Facebook APP ID",
            "desc" => "",
            "id" => "asalah_fb_id",
            "std" => "",
            "type" => "text");

        $of_options[] = array("name" => "Add facebook SDK library to header",
            "desc" => "Disable this if any conflict with another plugin which has (social plugins).",
            "id" => "asalah_use_sdk",
            "std" => 1,
            "type" => "checkbox");
        
        $of_options[] = array("name" => "Twitter Access token",
            "desc" => "",
            "id" => "asalah_at_id",
            "std" => "",
            "type" => "text");
        
        $of_options[] = array("name" => "Twitter Access token secret",
            "desc" => "",
            "id" => "asalah_ats_id",
            "std" => "",
            "type" => "text");
        
        $of_options[] = array("name" => "Consumer key",
            "desc" => "",
            "id" => "asalah_conk_id",
            "std" => "",
            "type" => "text");
        
        $of_options[] = array("name" => "Consumer secret",
            "desc" => "",
            "id" => "asalah_cons_id",
            "std" => "",
            "type" => "text");

        /* start layout options */
        $of_options[] = array("name" => "Layout Settings",
            "type" => "heading",
            "icon" => ADMIN_IMAGES . "asalah_social.png");

        $of_options[] = array("name" => "Boxed Layout",
            "desc" => "",
            "id" => "asalah_boxed",
            "std" => 0,
            "type" => "switch"
        );

        $of_options[] = array("name" => "Responsive",
            "desc" => "",
            "id" => "asalah_responsive",
            "std" => 1,
            "type" => "switch"
        );
        
        $of_options[] = array("name" => "Color switcher",
            "desc" => "",
            "id" => "asalah_color_switcher",
            "std" => 0,
            "type" => "switch"
        );
        
        $side_positions = array("right" => "Right", "left" => "left", 'no-sidebar' => "No Sidebar");

        $of_options[] = array("name" => "Default Sidebar Position",
            "desc" => "",
            "id" => "asalah_sidebar_position",
            "std" => "right",
            "type" => "select",
            "options" => $side_positions
        );

        $of_options[] = array("name" => "Body Margin Top",
            "desc" => "",
            "id" => "asalah_body_margintop",
            "std" => "0",
            "min" => "0",
            "max" => "100",
            "type" => "sliderui"
        );

        $of_options[] = array("name" => "Body Margin Bottom",
            "desc" => "",
            "id" => "asalah_body_marginbottom",
            "std" => "0",
            "min" => "0",
            "max" => "100",
            "type" => "sliderui"
        );
        
        /* start fonts options */
        global $fontsarray;


        $decode = json_decode($fontsarray, true);

        $webfonts = array('none' => 'Default');

        foreach ($decode['items'] as $key => $property) {

            $item_family = $decode['items'][$key]['family'];

            $item_family_trunc = str_replace(' ', '+', $item_family);

            $webfonts[$item_family_trunc] = $item_family;
        }

        $of_options[] = array("name" => "Fonts",
            "type" => "heading",
            "icon" => ADMIN_IMAGES . "asalah_fonts.png");

        $fontsclasses = array(
                "body" => "Main Font",
                "h1, h2, h3, h4, h5, h6, h7, h8, .title, .thin_title, .thin_heading, blockquote p, th, .pricingcontainer .plans .plan_title, .su-dropcap-style-simple, .su-pullquote" => "Titles Font",
                ".navbar-default .navbar-nav>li>a" => "Menu Items"
            );

        foreach ($fontsclasses as $class => $title) {
            $id = str_replace(' ', '', $class);
            $id = str_replace('.', '~', $id);
            $id = str_replace(',', '*', $id);
            $id = str_replace('[', '%', $id);
            $id = str_replace(']', '%', $id);
            $id = str_replace("'", '!', $id);
            $id = "asalah_gfonts_" . $id;

            $of_options[] = array("name" => $title,
                "id" => $id,
                "std" => "none",
                "type" => "select",
                "options" => $webfonts
            );
        }
        
        /* start typography options */
        /*
        $of_options[] = array("name" => "Typography",
            "type" => "heading",
            "icon" => ADMIN_IMAGES . "asalah_typo.png");
        
        $typographyclasses = array(
            "body" => "Main Typography",
            "a" => "Site Links",
            "h1" => "h1",
            "h2" => "h2",
            "h3" => "h3",
            "h4" => "h4",
            "h5" => "h5",
            "h6" => "h6",
            ".contact_info_item" => "Header Contact Info",
            ".below_header .navbar .nav > li > a" => "Main Menu",
            ".page-header a" => "Block Title",
            ".services_info h3" => "Service Block Title",
            ".portfolio_info h5" => "Project Title",
            ".blog_title h4" => "Blog Title",
            ".widget_container h3" => "Widget Title",
            ".site_footer" => "Footer Text",
            ".site_footer a" => "Footer Links",
            ".site_secondary_footer" => "Second Footer Text",
            ".site_secondary_footer a" => "Second Footer Links",
            ".page_title_holder h1" => "Page Title",
        );
        foreach ($typographyclasses as $class => $title) {
            $id = str_replace(' ', '', $class);
            $id = str_replace('.', '^', $id);
            $id = str_replace('[', '%', $id);
            $id = str_replace(']', '%', $id);
            $id = str_replace("'", '!', $id);
            $id = "asalah_typo_" . $id;
            $of_options[] = array("name" => $title,
                "desc" => "",
                "id" => $id,
                "std" => array('size' => '0', 'style' => '', 'height' => '0', 'color' => ''),
                "type" => "typography");
        }
        */
        /* asalah color options */
        $of_options[] = array("name" => "Colors Settings",
            "type" => "heading",
            "icon" => ADMIN_IMAGES . "asalah_colors.png");

        $of_options[] = array("name" => "Skin",
            "desc" => "Change Your Site Color.",
            "id" => "asalah_skin_color",
            "std" => "",
            "type" => "color");

        
        $colorclasses = array(
        	"html" => "HTML",
            "body" => "Body",
            ".header_top" => "Top Header",
            ".header_below" => "Main Header Area",
            ".site_footer" => "Site Footer",
            ".dark_site_footer" => "Dark Site Footer",        
            ".action_box" => "Default action box",
            );

        foreach ($colorclasses as $class => $title) {
            $id = str_replace(' ', '', $class);
            $id = str_replace('.', '^', $id);
            $id = str_replace('[', '%', $id);
            $id = str_replace(']', '%', $id);
            $id = str_replace("'", '!', $id);
            $id = "asalah_bgcolor_" . $id;
            $of_options[] = array("name" => $title,
                "desc" => "",
                "id" => $id,
                "std" => "",
                "type" => "color");
        }
                
        /* start background options */
        $of_options[] = array("name" => "Backgrounds",
            "type" => "heading",
            "icon" => ADMIN_IMAGES . "asalah_back.png");


        $of_options[] = array("name" => "Site Custom Background",
            "desc" => "Enable custom background for body",
            "id" => "asalah_enable_html_background",
            "std" => 0,
            "folds" => 1,
            "type" => "checkbox");

        $of_options[] = array("name" => "Site Background Images",
            "desc" => "Select a background pattern.",
            "id" => "asalah_html_custom_bg",
            "std" => $bg_images_url . "bg0.png",
            "fold" => 'asalah_enable_html_background',
            "type" => "tiles",
            "options" => $bg_images,
        );

        $of_options[] = array("name" => "Upload your own custom backgrounds!",
            "desc" => "",
            "id" => "asalah_custom_bg_instructions",
            "std" => "<h3 style=\"margin: 0 0 10px;\">Upload Your Own Custom Backgrounds.</h3>
					You can uer below fields to upload your own custom background for your website sections, if you upload custom background for your body you should disable the body background option above.",
            "icon" => true,
            "type" => "info");

        $bgclasses = array(// themes-style
            "html" => "HTML (All Site Background)",
            ".site_header" => "Header",
            ".site_footer" => "Footer",
            ".page_title_holder" => "Page Title Holder",
            ".action_box" => "Action Box"
        );
        foreach ($bgclasses as $class => $title) {
            $id = str_replace(' ', '', $class);
            $id = str_replace('.', '^', $id);
            $id = str_replace('[', '%', $id);
            $id = str_replace(']', '%', $id);
            $id = str_replace("'", '!', $id);
            $id = "asalah_customebg_" . $id;
            $of_options[] = array("name" => $title,
                "desc" => "",
                "id" => $id,
                "std" => "",
                "type" => "media");
            $repeat_options_radio = array("repeat" => "repeat", "repeat-x" => "repeat-x", "repeat-y" => "repeat-y", "no-repeat" => "no-repeat");
            
            $of_options[] = array("name" => "",
                "desc" => "",
                "id" => $id . "_repeat",
                "std" => "",
                "type" => "select",
                "options" => $repeat_options_radio);

            $of_options[] = array("name" => "",
                "desc" => "Make This A Cover Background",
                "id" => $id . "_is_fixed",
                "std" => 0,
                "type" => "checkbox");
        }

        /* $page_holder_options = array("default" => "Default", "black" => "Black", "white" => "White");
        $of_options[] = array("name" => "Page Holder Title Color (Title and links)",
            "desc" => "",
            "id" => "asalah_pageholder_color",
            "std" => "default",
            "type" => "select",
            "options" => $page_holder_options); */
        
        /* start background options */
        $of_options[] = array("name" => "Auto Update",
            "type" => "heading",
            "icon" => ADMIN_IMAGES . "asalah_back.png");
        
        $of_options[] = array("name" => "Themeforest Username",
            "desc" => "",
            "id" => "asalah_tf_username",
            "std" => "",
            "type" => "text");

        $of_options[] = array("name" => "Themeforest API",
            "desc" => "",
            "id" => "asalah_tf_api",
            "std" => "",
            "type" => "text");
        
// Backup Options
        $of_options[] = array("name" => "Backup Options",
            "type" => "heading",
            "icon" => ADMIN_IMAGES . "icon-slider.png"
        );

        $of_options[] = array("name" => "Backup and Restore Options",
            "id" => "of_backup",
            "std" => "",
            "type" => "backup",
            "desc" => 'You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.',
        );

        $of_options[] = array("name" => "Transfer Theme Options Data",
            "id" => "of_transfer",
            "std" => "",
            "type" => "transfer",
            "desc" => 'You can tranfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click "Import Options".',
        );
    }

//End function: of_options()
}//End chack if function exists: of_options()
?>

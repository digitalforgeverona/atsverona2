<?php
$themename = "Sarraty";
if (!isset($content_width))
    $content_width = 960;
define('theme_name', $themename);
// include options panel
require_once ('inc/scripts.php');
include ('inc/social.php');
include ('inc/posttypes.php');
include ('inc/postoptions.php');
include ('inc/banners.php');
include ('inc/posts.php');
include ('inc/customstyle.php');
include ('switcher/switcher.php');
include ('framework/aqua/aq-page-builder.php');
include ('framework/bootstrap/function.php');
include ('framework/twitter/twitteroauth.php');
include_once('framework/tgm/class-tgm-plugin-activation.php');
// include widgets
include ('inc/widgets/tweets.php');
include ('inc/widgets/postlist.php');
include ('inc/widgets/project.php');

require_once ('admin/index.php');

// check for updates

if (isset($asalah_data['asalah_tf_username']) && $asalah_data['asalah_tf_username'] && isset($asalah_data['asalah_tf_api']) && $asalah_data['asalah_tf_api']) {

    function add_update_menu() {

        add_theme_page(theme_name . ' Update', theme_name . ' Updates', 'manage_options', 'updating', 'theadminpage');
    }

    $tfuname = $asalah_data['asalah_tf_username'];
    $tfapi = $asalah_data['asalah_tf_api'];
    add_action('admin_menu', 'add_update_menu');

    function theadminpage() {

        global $tfuname, $tfapi;

        include_once(TEMPLATEPATH . '/framework/envato-wordpress-toolkit-library/class-envato-wordpress-theme-upgrader.php');
        $upgrader = new Envato_WordPress_Theme_Upgrader($tfuname, $tfapi);

        if (isset($_POST['upgradingthemever'])) {
            $upgrader->upgrade_theme();
        }
        $currver = $upgrader->check_for_theme_update();
        ?>
        <style>.updatenotice { margin-top: 20px;}</style>
        <?php
        if ($currver->updated_themes_count) {
            ?>
            <div class="updatenotice">New Update Available</div>
            <div>
                <form method="post">
                    <input type="submit" name="upgradingthemever" value="Update Now" />
                </form>
            </div>
            <?php
        } else {
            ?>
            <div class="updatenotice">Congratulations, you are up to date :)</div>
            <?php
        }
    }

}

// theme setup functions
function theme_setup() {

    add_editor_style();

    load_theme_textdomain('asalah', get_template_directory() . '/languages');

    // Register primary menu.
    register_nav_menu('mainmenu', __('Main Menu', 'asalah'));
    register_nav_menu('footermenu', __('Footer Menu', 'asalah'));

    // Add default posts and comments RSS feed links to <head>.
    add_theme_support('automatic-feed-links');
	
	$project_thumbnail_width = 460;
	$project_thumbnail_height = 420;
	
	if (asalah_option("asalah_portfolio_thumb_width")) {
		$project_thumbnail_width = asalah_option("asalah_portfolio_thumb_width");
	}
	
	if (asalah_option("asalah_portfolio_thumb_height")) {
		$project_thumbnail_height = asalah_option("asalah_portfolio_thumb_height");
	}
	
    add_theme_support('post-thumbnails');
    add_image_size('portfolio', $project_thumbnail_width, $project_thumbnail_height, true);
    add_image_size('blogcarousel', 310, 260, true);
    add_image_size('bloggrid', 310, 160, true);
    add_image_size('team', 250, 375, true);
    add_image_size('bloglist', 160, 100, true);
    add_image_size('smallbloglist', 42, 42, true);

    add_theme_support('post-formats', array(
        'audio', 'gallery', 'image', 'video'
    ));
}

add_action('after_setup_theme', 'theme_setup');

// start activating required plugins

add_action('tgmpa_register', 'asalah_register_required_plugins');

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function asalah_register_required_plugins() {

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
        // This is an example of how to include a plugin pre-packaged with a theme
        array(
            'name' => 'Revolution Slider', // The plugin name
            'slug' => 'revslider', // The plugin slug (typically the folder name)
            'source' => get_template_directory_uri() . '/framework/tgm/plugins/revslider.zip', // The plugin source
            'required' => false, // If false, the plugin is only 'recommended' instead of required
            'version' => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url' => '', // If set, overrides default API URL and points to an external URL
        ),
        // This is an example of how to include a plugin pre-packaged with a theme
        array(
            'name' => 'Shortcode Ultimate', // The plugin name
            'slug' => 'shortcodes-ultimate', // The plugin slug (typically the folder name)
            'source' => get_template_directory_uri() . '/framework/tgm/plugins/shortcodes-ultimate.zip', // The plugin source
            'required' => false, // If false, the plugin is only 'recommended' instead of required
            'version' => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url' => '', // If set, overrides default API URL and points to an external URL
        ),
        // This is an example of how to include a plugin pre-packaged with a theme
        array(
            'name' => 'Post Formats', // The plugin name
            'slug' => 'wp-post-formats-develop', // The plugin slug (typically the folder name)
            'source' => get_template_directory_uri() . '/framework/tgm/plugins/wp-post-formats-develop.zip', // The plugin source
            'required' => true, // If false, the plugin is only 'recommended' instead of required
            'version' => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation' => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url' => '', // If set, overrides default API URL and points to an external URL
        ),
        // This is an example of how to include a plugin from the WordPress Plugin Repository
        array(
            'name' => 'Contact Form 7',
            'slug' => 'contact-form-7',
            'required' => false,
        ),
    );

    // Change this to your theme text domain, used for internationalising strings
    $theme_text_domain = 'asalah';

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'domain' => $theme_text_domain, // Text domain - likely want to be the same as your theme.
        'default_path' => '', // Default absolute path to pre-packaged plugins
        'parent_menu_slug' => 'themes.php', // Default parent menu slug
        'parent_url_slug' => 'themes.php', // Default parent URL slug
        'menu' => 'install-required-plugins', // Menu slug
        'has_notices' => true, // Show admin notices or not
        'is_automatic' => false, // Automatically activate plugins after installation or not
        'message' => '', // Message to output right before the plugins table
        'strings' => array(
            'page_title' => __('Install Required Plugins', $theme_text_domain),
            'menu_title' => __('Install Plugins', $theme_text_domain),
            'installing' => __('Installing Plugin: %s', $theme_text_domain), // %1$s = plugin name
            'oops' => __('Something went wrong with the plugin API.', $theme_text_domain),
            'notice_can_install_required' => _n_noop('This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.'), // %1$s = plugin name(s)
            'notice_can_install_recommended' => _n_noop('This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.'), // %1$s = plugin name(s)
            'notice_cannot_install' => _n_noop('Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.'), // %1$s = plugin name(s)
            'notice_can_activate_required' => _n_noop('The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.'), // %1$s = plugin name(s)
            'notice_can_activate_recommended' => _n_noop('The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.'), // %1$s = plugin name(s)
            'notice_cannot_activate' => _n_noop('Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.'), // %1$s = plugin name(s)
            'notice_ask_to_update' => _n_noop('The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.'), // %1$s = plugin name(s)
            'notice_cannot_update' => _n_noop('Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.'), // %1$s = plugin name(s)
            'install_link' => _n_noop('Begin installing plugin', 'Begin installing plugins'),
            'activate_link' => _n_noop('Activate installed plugin', 'Activate installed plugins'),
            'return' => __('Return to Required Plugins Installer', $theme_text_domain),
            'plugin_activated' => __('Plugin activated successfully.', $theme_text_domain),
            'complete' => __('All plugins installed and activated successfully. %s', $theme_text_domain), // %1$s = dashboard link
            'nag_type' => 'updated' // Determines admin notice type - can only be 'updated' or 'error'
        )
    );

    tgmpa($plugins, $config);
}

// asalah options function 
function asalah_option($id, $prefix = "") {
    global $asalah_data;

    if (isset($asalah_data[$id])) {
        return $prefix . $asalah_data[$id];
    }
}

function asalah_post_option($id, $postid = '') {

    global $post;

    if ($postid == '') {
        $post_id = $post->ID;
    } else {
        $post_id = $postid;
    }
    $post_meta = get_post_meta($post_id, $id, true);
    if (isset($post_meta)) {
        return $post_meta;
    }
}

function excerpt($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt) >= $limit) {
        array_pop($excerpt);
        $excerpt = implode(" ", $excerpt);
    } else {
        $excerpt = implode(" ", $excerpt);
    }
    $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);
    return $excerpt;
}

function asalah_widgets_init() {
    global $asalah_data;
    register_sidebar(array(
        'name' => __('Blog sidebar', 'asalah'),
        'id' => 'sidebar-blog',
        'description' => __('This sidebar id is: "sidebar-blog" to be used in sidebar shortcode'  , 'asalah'),
        'before_widget' => '<div id="%1$s" class="widget_container widget %2$s clearfix">',
        'after_widget' => "</div>",
        'before_title' => '<h4  class="title thin_title widget_title">',
        'after_title' => '</h4>',
    ));



    register_sidebar(array(
        'name' => __('Footer Area One', 'asalah'),
        'id' => 'sidebar-1',
        'description' => __('This sidebar id is: "sidebar-1" to be used in sidebar shortcode', 'asalah'),
        'before_widget' => '<div id="%1$s" class="widget_container widget %2$s clearfix">',
        'after_widget' => "</div>",
        'before_title' => '<h4  class="title widget_title">',
        'after_title' => '</h4>'
    ));

    register_sidebar(array(
        'name' => __('Footer Area Two', 'asalah'),
        'id' => 'sidebar-2',
        'description' => __('This sidebar id is: "sidebar-2" to be used in sidebar shortcode', 'asalah'),
        'before_widget' => '<div id="%1$s" class="widget_container widget %2$s clearfix">',
        'after_widget' => "</div>",
        'before_title' => '<h4  class="title widget_title">',
        'after_title' => '</h4>'
    ));

    register_sidebar(array(
        'name' => __('Footer Area Three', 'asalah'),
        'id' => 'sidebar-3',
        'description' => __('This sidebar id is: "sidebar-3" to be used in sidebar shortcode', 'asalah'),
        'before_widget' => '<div id="%1$s" class="widget_container widget %2$s clearfix">',
        'after_widget' => "</div>",
        'before_title' => '<h4  class="title widget_title">',
        'after_title' => '</h4>'
    ));

    register_sidebar(array(
        'name' => __('Footer Area four', 'asalah'),
        'id' => 'sidebar-4',
        'description' => __('This sidebar id is: "sidebar-4" to be used in sidebar shortcode', 'asalah'),
        'before_widget' => '<div id="%1$s" class="widget_container widget %2$s clearfix">',
        'after_widget' => "</div>",
        'before_title' => '<h4  class="title widget_title">',
        'after_title' => '</h4>'
    ));
	
	// add custom sidebars
    if (isset($asalah_data['asalah_custom_sidebars'])) {
        $sidebars = $asalah_data['asalah_custom_sidebars'];
        if (!empty($sidebars)):

            foreach ($sidebars as $option) {
                $siebar_id = "asalah_custom_sidebar_" . $option['order'];
                register_sidebar(array(
                    'name' => $option['title'],
                    'id' => $siebar_id,
                    'description' => __('This custom sidebar id is: "'.$siebar_id.'" to be used in sidebar shortcode', 'asalah'),
                    'before_widget' => '<div id="%1$s" class="widget_container widget %2$s clearfix">',
                    'after_widget' => "</div>",
                    'before_title' => '<h4  class="title thin_title widget_title">',
                    'after_title' => '</h4>'
                ));
            }

        endif;
    }
    
}

add_action('widgets_init', 'asalah_widgets_init');

/* bread crumb function */

function asalah_breadcrumbs($last = "") {
    global $asalah_data;

    if (!is_home() && !asalah_option('asalah_disable_breadcrumb')) {
        echo '<nav class="breadcrumb">';
        echo '<a href="' . home_url('/') . '">' . __("Home", "asalah") . '</a> <span class="divider">&raquo;</span> ';
        if (is_category()) {
            the_category(' <span class="divider">&raquo;</span> ');
        } elseif (is_single()) {
            if (get_post_type() != 'post') {
                $post_type = get_post_type_object(get_post_type());
                if (get_post_type() == 'post') {
                    if (asalah_option('asalah_blog_url')) {
                        echo '<a href="' . asalah_option('asalah_blog_url') . '">';
                    }
                    echo $post_type->labels->name;
                    if (asalah_option('asalah_blog_url')) {
                        echo '</a>';
                    }
                } elseif (get_post_type() == 'project') {
                    if (asalah_option('asalah_portfolio_url')) {
                        echo '<a href="' . asalah_option('asalah_portfolio_url') . '">';
                    }
                    echo $post_type->labels->name;
                    if (asalah_option('asalah_portfolio_url')) {
                        echo '</a>';
                    }
                } else {
                    echo $post_type->labels->name;
                }

                echo ' <span class="divider">&raquo;</span> ';
                the_title();
            } else {
                the_category(' <span class="divider">&raquo;</span> ');
                echo ' <span class="divider">&raquo;</span> ';
                the_title();
            }
        } elseif (is_page()) {
            echo the_title();
        }
        if ($last != "") {
            echo " " . $last;
        }
        echo '</nav>';
    }
}

function asalah_post_date_label() {
    global $post;
    // check if post date should be in meta or both meta and label in option panel
    if ((asalah_post_option("asalah_post_date") == "label") || (asalah_post_option("asalah_post_date") == "both") || (asalah_option("asalah_post_date_position") == "label" && asalah_post_option("asalah_post_date") != "meta" && asalah_post_option("asalah_post_date") != "hide") || (asalah_option("asalah_post_date_position") == "both" && asalah_post_option("asalah_post_date") != "meta" && asalah_post_option("asalah_post_date") != "hide")
    ):
        ?>
        <div class="blog_post_date">
            <span class="blog_post_day"><?php the_date("d"); ?></span>
            <span class="blog_post_month"><?php echo get_the_date("M"); ?></span>
        </div>
        <?php
    endif;
}

function asalah_post_icon($type = 'standard') {
    global $post;
    if ($type == '') {
        $type = 'standard';
    }
    $defaults = array('standard' => 'pencil', 'image' => 'picture-o', 'video' => 'film', 'gallery' => 'picture-o', 'audio' => 'headphones');
    if (asalah_option('asalah_post_icons_' . $type)) {
        if (asalah_option('asalah_post_icons_' . $type . '_image') && asalah_option('asalah_post_icons_' . $type . '_image_upload')) {
            return '<img src="' . asalah_option('asalah_post_icons_' . $type . '_image_upload') . '" />';
        } elseif (asalah_option('asalah_post_icons_' . $type . '_fontawesome')) {
            return '<i class="' . asalah_option('asalah_post_icons_' . $type . '_fontawesome') . '"></i>';
        } else {
            return '<i class="fa fa-' . $defaults[$type] . '"></i>';
        }
    }
}

function asalah_post_icon_label() {
    global $post;
    // first check if post icons are enabled in option panel 
    if (asalah_option("asalah_post_icons")):

        // then check post format print the image for each post format

        if (get_post_format() == "image" && asalah_option('asalah_post_icons_image')) {
            ?>
            <div class="blog_post_type image_post_icon">
                <?php echo asalah_post_icon('image'); ?>
            </div>
            <?php
        } elseif (get_post_format() == "video" && asalah_option('asalah_post_icons_video')) {
            ?>
            <div class="blog_post_type video_post_icon">
                <?php echo asalah_post_icon('video'); ?>
            </div>
            <?php
        } elseif (get_post_format() == "gallery" && asalah_option('asalah_post_icons_gallery')) {
            ?>
            <div class="blog_post_type gallery_post_icon">
                <?php echo asalah_post_icon('gallery'); ?>
            </div>
            <?php
        } elseif (get_post_format() == "audio" && asalah_option('asalah_post_icons_audio')) {
            ?>
            <div class="blog_post_type audio_post_icon">
                <?php echo asalah_post_icon('audio'); ?>
            </div>
            <?php
        } elseif (get_post_format() == "" && asalah_option('asalah_post_icons_standard')) {
            ?>
            <div class="blog_post_type standard_post_icon">
                <?php echo asalah_post_icon('standard'); ?>
            </div>
            <?php
        }
    endif;
    // endif for checking if post icons enabled
}

function asalah_post_meta_info() {
    global $post;
    // first check if meta info line is enabled in option panel 
    if ((asalah_post_option("asalah_meta_info") == "show") || (asalah_option("asalah_meta_info") && asalah_post_option("asalah_meta_info") != "hide")):
        ?>

        <!-- check if post date should be in meta or both meta and label in option panel -->
        <?php
        if ((asalah_post_option("asalah_post_date") == "meta") || (asalah_post_option("asalah_post_date") == "both") || (asalah_option("asalah_post_date_position") == "meta" && asalah_post_option("asalah_post_date") != "label" && asalah_post_option("asalah_post_date") != "hide") || (asalah_option("asalah_post_date_position") == "both" && asalah_post_option("asalah_post_date") != "label" && asalah_post_option("asalah_post_date") != "hide")
        ):
            ?>
            <div class="blog_post_meta_item">
                <span class="blog_meta_line blog_meta_date"><i class="icon-time"></i> <?php the_time(get_option('date_format')); ?> - <?php echo get_the_time(); ?></span>
            </div>
        <?php endif; ?>

        <?php if (get_the_category_list()): ?>
            <div class="blog_post_meta_item">
                <span class="blog_meta_line blog_meta_categories"><i class="icon-folder-open"></i> <?php echo get_the_category_list(', '); ?></span>
            </div>
        <?php endif; ?>

        <?php if ((asalah_post_option("asalah_post_comments") == "show") || (asalah_option("asalah_enable_comments") && asalah_post_option("asalah_post_comments") != "hide")): ?>
            <div class="blog_post_meta_item">
                <span class="blog_meta_line blog_meta_comments"><i class="icon-comment"></i> <?php comments_number(__("0 Comments", "asalah")); ?></span>
            </div>
        <?php endif; ?>

        <?php if ((asalah_post_option("asalah_author_meta") == "show") || (asalah_option("asalah_author_meta") && asalah_post_option("asalah_author_meta") != "hide")): ?>
            <div class="blog_post_meta_item">
                <span class="blog_meta_line blog_meta_author"><i class="icon-user"></i> <?php _e('By', 'asalah'); ?> <?php the_author_posts_link(); ?></a></span>
            </div>
        <?php endif; ?>

        <?php
    endif;
    // endif for checking if meta info line is enabled in option panel
}

/* register new social networks for user */

function asalah_author_register_social_networks($contactmethods) {
    $contactmethods['twitter'] = __('Twitter', 'asalah');
    $contactmethods['facebook'] = __('Facebook', 'asalah');
    $contactmethods['gplus'] = __('Google Plus', 'asalah');
    $contactmethods['dribbble'] = __('Dribbble', 'asalah');
    $contactmethods['linkedin'] = __('Linkedin', 'asalah');
    return $contactmethods;
}

add_filter('user_contactmethods', 'asalah_author_register_social_networks', 10, 1);

function asalah_author_box() {

    // first check if author box is enabled in option panel
    if ((asalah_post_option("asalah_author_box") == "show") || (asalah_option("asalah_author_box") && asalah_post_option("asalah_author_box") != "hide")):
        global $post;
        ?>
        <div class="author_box clearfix">
            <div class="author_avatar">
                <?php echo get_avatar(get_the_author_meta('ID'), 100); ?>

            </div>
            <div class="author_info">
                <h5 class="title author_name"><?php the_author(); ?></h5>
                <p><?php echo get_the_author_meta('description'); ?></p>
                <ul class="social_icons_list">

                    <?php if (get_the_author_meta('facebook')): ?>
                        <li class="social_icon facebook_icon"><a target="_blank" href="<?php the_author_meta('facebook'); ?>"><i class="fa fa-facebook"></i></a></li>
                    <?php endif; ?>

                    <?php if (get_the_author_meta('twitter')): ?>
                        <li class="social_icon twitter_icon"><a target="_blank" href="<?php the_author_meta('twitter'); ?>"><i class="fa fa-twitter"></i></a></li>
                    <?php endif; ?>

                    <?php if (get_the_author_meta('gplus')): ?>
                        <li class="social_icon gplus_icon"><a target="_blank" href="<?php the_author_meta('gplus'); ?>"><i class="fa fa-google-plus"></i></a></li>
                    <?php endif; ?>

                    <?php if (get_the_author_meta('dribbble')): ?>
                        <li class="social_icon dribbble_icon"><a target="_blank" href="<?php the_author_meta('dribbble'); ?>"><i class="fa fa-dribbble"></i></a></li>
                    <?php endif; ?>

                    <?php if (get_the_author_meta('linkedin')): ?>
                        <li class="social_icon rss_icon"><a target="_blank" href="<?php the_author_meta('linkedin'); ?>"><i class="fa fa-rss"></i></a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        <?php
    endif;
    // end if for checking author box in option panel
}

function asalah_icon_text($text, $title = '') {
    if (preg_match('#^(?:https?|ftp)://#', $text, $m)) {
        return "<img src='" . $text . "' title='" . $title . "' />";
        // return "it's url";
    } else {
        return "<i class='" . $text . "'></i>";
        //return "it's icon";
    }
}

function asalah_blogposts_list($num = "3", $thumb = 'bloglist', $orderby = 'date', $cat = '', $tag_ids = '') {
    global $post;

    $args = array('posts_per_page' => $num, 'orderby' => $orderby);

    if ($tag_ids != '') {
        $tags = explode(',', $tag_ids);
        $tags_array = array();
        if (count($tags) > 0) {
            foreach ($tags as $tag) {
                if (!empty($tag)) {
                    $tags_array[] = $tag;
                }
            }
        }
        $args['tag_slug__in'] = $tags_array;
    }
    $wp_query = new WP_Query($args);

    $bloglist_class = "";
    if ($thumb == "bloglist") {
        $bloglist_class = "blog_block";
    }
    ?>

    <?php if ($wp_query->have_posts()) : ?>
        <ul class="post_list <?php echo $bloglist_class; ?>">
            <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                <div class="post_item clearfix">

                    <?php if ($thumb != 'hide' && has_post_thumbnail($post->ID)): ?>
                        <div class="post_thumbnail <?php echo $thumb; ?>">
                            <a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>"><?php the_post_thumbnail($thumb); ?></a>
                        </div>
                    <?php endif; ?>

                    <div class="post_info">
                        <h5 class="title post_title"><a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>"><?php echo get_the_title(); ?></a></h5>
                        <p><?php echo excerpt(20); ?></p>
                        <span class="post_time"><?php _e("Posted on", "asalah") ?> <?php the_time(get_option('date_format')); ?></span>
                    </div>
                </div>
            <?php endwhile; ?>
        </ul>
    <?php endif; ?>
    <?php
}

function asalah_return_blogposts_list($num = "3", $thumb = 'bloglist', $orderby = 'date', $cat = '', $tag_ids = '') {
    global $post;

    $args = array('posts_per_page' => $num, 'orderby' => $orderby);

    if ($tag_ids != '') {
        $tags = explode(',', $tag_ids);
        $tags_array = array();
        if (count($tags) > 0) {
            foreach ($tags as $tag) {
                if (!empty($tag)) {
                    $tags_array[] = $tag;
                }
            }
        }
        $args['tag_slug__in'] = $tags_array;
    }
    $wp_query = new WP_Query($args);

    $bloglist_class = "";
    if ($thumb == "bloglist") {
        $bloglist_class = "blog_block";
    }
    $output = '';
    ?>

    <?php if ($wp_query->have_posts()) : ?>
        <?php $output .= '<ul class="post_list ' . $bloglist_class . '">' ?>
        <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
            <?php $output .= '<div class="post_item clearfix">'; ?>

            <?php if ($thumb != 'hide' && has_post_thumbnail($post->ID)): ?>
                <?php $output .= '<div class="post_thumbnail ' . $thumb . '"><a href="' . get_permalink() . '" title="' . get_the_title() . '">'; ?>
                <?php $output .= get_the_post_thumbnail($post->ID, $thumb); ?>
                <?php $output .= '</a></div>'; ?>
            <?php endif; ?>

            <?php $output .= '<div class="post_info">'; ?>
            <?php $output .= '<h5 class="title post_title"><a href="' . get_permalink() . '" title="' . get_the_title() . '">' . get_the_title() . '</a></h5>'; ?>
            
            <?php 
            if ($thumb == 'bloglist') {
            $output .= '<p>' . excerpt(13) . ' <a href="'.get_permalink().'" title="'.get_the_title().'" class="blog_read_more">'.__("Read More...", "asalah").'</a></p>'; 
            }
            ?>
            
            <?php $output .= '<span class="post_time">' . __("Posted on", "asalah") . ' ' . get_the_time(get_option('date_format')) . '</span>'; ?>
            <?php $output .= '</div>'; ?>
            <?php $output .= '</div>'; ?>
        <?php endwhile; ?>
        <?php $output .= '</ul>'; ?>
    <?php endif; ?>
    <?php return $output; ?>
    <?php
}

function asalah_sidebar_class($id = '') {
    global $post;
    if ($id == '') {
        $id = $post->ID;
    }

    // first check sidebar position option from option panel
    if (asalah_option("asalah_sidebar_position") == "left") {
        $class = "col-md-3 pull-left";
    } else {
        $class = "col-md-3";
    }

    // then check sidebar positon for the current post or page via layout option
    // if not using the default settings then change class according to current post or page option
    if (asalah_post_option("asalah_post_layout", $id) != "default") {
        if (asalah_post_option("asalah_post_layout", $id) == "left") {
            $class = "col-md-3 pull-left";
        } elseif (asalah_post_option("asalah_post_layout", $id) == "right") {
            $class = "col-md-3";
        }
    }
    return $class;
}

function asalah_content_class($id = '') {
    global $post;
    if ($id == '') {
        $id = $post->ID;
    }
    // first check sidebar position option from option panel
    if (asalah_option("asalah_sidebar_position") == "left") {
        $class = "col-md-9 pull-right";
    } elseif (asalah_option("asalah_sidebar_position") == "no-sidebar") {
        $class = "col-md-12";
    } else {
        $class = "col-md-9";
    }

    // then check sidebar positon for the current post or page via layout option
    // if not using the default settings then change class according to current post or page option
    if (asalah_post_option("asalah_post_layout", $id) != "default") {
        if (asalah_post_option("asalah_post_layout", $id) == "left") {
            $class = "col-md-9 pull-right";
        } elseif (asalah_post_option("asalah_post_layout", $id) == "right") {
            $class = "col-md-9";
        } elseif (asalah_post_option("asalah_post_layout", $id) == "full") {
            $class = "col-md-12";
        }
    }

    return $class;
}

function asalah_project_sidebar_class() {
    global $post;
    // first check sidebar position option from option panel
    if (asalah_option("asalah_project_layout") == "left") {
        $class = "col-md-4 pull-left";
    } elseif (asalah_option("asalah_project_layout") == "full") {
        $class = "col-md-12";
    } else {
        $class = "col-md-4";
    }

    // then check sidebar positon for the current post or page via layout option
    // if not using the default settings then change class according to current post or page option
    if (asalah_post_option("asalah_project_layout") != "default") {
        if (asalah_post_option("asalah_project_layout") == "left") {
            $class = "col-md-4 pull-left";
        } elseif (asalah_post_option("asalah_project_layout") == "full") {
            $class = "col-md-12";
        } elseif (asalah_post_option("asalah_project_layout") == "right") {
            $class = "col-md-4";
        }
    }
    return $class;
}

function asalah_project_content_class() {
    global $post;

    // first check sidebar position option from option panel
    if (asalah_option("asalah_project_layout") == "left") {
        $class = "col-md-8 pull-right";
    } elseif (asalah_option("asalah_project_layout") == "full") {
        $class = "col-md-12";
    } else {
        $class = "col-md-8";
    }

    // then check sidebar positon for the current post or page via layout option
    // if not using the default settings then change class according to current post or page option
    if (asalah_post_option("asalah_project_layout") != "default") {
        if (asalah_post_option("asalah_project_layout") == "left") {
            $class = "col-md-8 pull-right";
        } elseif (asalah_post_option("asalah_project_layout") == "right") {
            $class = "col-md-8";
        } elseif (asalah_post_option("asalah_project_layout") == "full") {
            $class = "col-md-12";
        }
    }

    return $class;
}

function asalah_body_class() {
    if (asalah_option("asalah_boxed")) {
        $class = "boxed_body";
    } else {
        $class = "fluid_body";
    }

    return $class;
}

function random_id($length) {
    $characters = '23456789abcdefghjkmnpqrstuvwxyzABCDEFGHJKMNPQRSTUVWXYZ';
    $max = strlen($characters) - 1;
    $string = '';

    for ($i = 0; $i < $length; $i++) {
        $string .= $characters[mt_rand(0, $max)];
    }

    return $string;
}

/* this function has been copied from shortcode ultimate plugins and all credits are back to the plugin author */

function asalah_su_hex_shift($supplied_hex, $shift_method, $percentage = 50) {
    $shifted_hex_value = null;
    $valid_shift_option = false;
    $current_set = 1;
    $RGB_values = array();
    $valid_shift_up_args = array('up', '+', 'lighter', '>');
    $valid_shift_down_args = array('down', '-', 'darker', '<');
    $shift_method = strtolower(trim($shift_method));
    // Check Factor
    if (!is_numeric($percentage) || ( $percentage = (int) $percentage ) < 0 || $percentage > 100
    )
        trigger_error("Invalid factor", E_USER_NOTICE);
    // Check shift method
    foreach (array($valid_shift_down_args, $valid_shift_up_args) as $options) {
        foreach ($options as $method) {
            if ($method == $shift_method) {
                $valid_shift_option = !$valid_shift_option;
                $shift_method = ( $current_set === 1 ) ? '+' : '-';
                break 2;
            }
        }
        ++$current_set;
    }
    if (!$valid_shift_option)
        trigger_error("Invalid shift method", E_USER_NOTICE);
    // Check Hex string
    switch (strlen($supplied_hex = ( str_replace('#', '', trim($supplied_hex)) ))) {
        case 3:
            if (preg_match('/^([0-9a-f])([0-9a-f])([0-9a-f])/i', $supplied_hex)) {
                $supplied_hex = preg_replace('/^([0-9a-f])([0-9a-f])([0-9a-f])/i', '\\1\\1\\2\\2\\3\\3', $supplied_hex);
            } else {
                trigger_error("Invalid hex color value", E_USER_NOTICE);
            }
            break;
        case 6:
            if (!preg_match('/^[0-9a-f]{2}[0-9a-f]{2}[0-9a-f]{2}$/i', $supplied_hex)) {
                trigger_error("Invalid hex color value", E_USER_NOTICE);
            }
            break;
        default:
            trigger_error("Invalid hex color length", E_USER_NOTICE);
    }
    // Start shifting
    $RGB_values['R'] = hexdec($supplied_hex{0} . $supplied_hex{1});
    $RGB_values['G'] = hexdec($supplied_hex{2} . $supplied_hex{3});
    $RGB_values['B'] = hexdec($supplied_hex{4} . $supplied_hex{5});
    foreach ($RGB_values as $c => $v) {
        switch ($shift_method) {
            case '-':
                $amount = round(( ( 255 - $v ) / 100 ) * $percentage) + $v;
                break;
            case '+':
                $amount = $v - round(( $v / 100 ) * $percentage);
                break;
            default:
                trigger_error("Oops. Unexpected shift method", E_USER_NOTICE);
        }
        $shifted_hex_value .= $current_value = ( strlen($decimal_to_hex = dechex($amount)) < 2 ) ?
                '0' . $decimal_to_hex : $decimal_to_hex;
    }
    return '#' . $shifted_hex_value;
}

/* start woocommerce */
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);

add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
    global $post;
    if (is_shop()) {
        $id = get_option('woocommerce_shop_page_id');
    } else {
        $id = $post->ID;
    }
    echo '<div class="main_content ' . asalah_content_class($id) . ' ">';
}

function my_theme_wrapper_end() {
    echo '</div>';
}

add_theme_support('woocommerce');

function admin_default_page() {
  return '/area-riservata/';
}

add_filter('login_redirect', 'admin_default_page');

?>
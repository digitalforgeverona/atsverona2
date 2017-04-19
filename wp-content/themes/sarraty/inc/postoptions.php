<?php
add_action("admin_init", "asalah_post_meta");

function asalah_post_meta() {
    $types = array('post', 'page');

    // add meta box for commons options in posts and pages
    foreach ($types as $type) {

        add_meta_box("post_options", sprintf(__('%s - Post Options.', 'asalah'), theme_name), "posts_pages_options", $type, "normal", "high");
    }

    add_meta_box("project_options", sprintf(__('%s - Project Options.', 'asalah'), theme_name), "asalah_project_options", "project", "normal", "high");

    add_meta_box("project_details", sprintf(__('%s - Project Details.', 'asalah'), theme_name), "asalah_project_details", "project", "side", "high");

    add_meta_box("testimonial_details", sprintf(__('%s - Tetimonial Details.', 'asalah'), theme_name), "asalah_testimonial_details", "testimonial", "normal", "high");

    add_meta_box("clients_details", sprintf(__('%s - Clients Details.', 'asalah'), theme_name), "asalah_clients_details", "client", "normal", "high");
    
    add_meta_box("team_details", sprintf(__('%s - Team Member Details.', 'asalah'), theme_name), "asalah_team_details", "team", "normal", "high");
    
    add_meta_box("product_options", sprintf(__('%s - Product Options.', 'asalah'), theme_name), "posts_product_options", "product", "normal", "high");
}

function asalah_post_options($value) {
    global $post;
    ?>
    <div class="option-item asala_post_option_item" id="<?php echo $value['id'] ?>-item">
        <span class="label"><?php echo $value['name']; ?></span>
        <?php
        $id = $value['id'];
        $get_meta = get_post_custom($post->ID);
        $current_value = "";
        if (isset($value['default']) && $value['default']) {
        	$current_value = $value['default'];
        }
        if (isset($get_meta[$id][0]))
            $current_value = $get_meta[$id][0];

        switch ($value['type']) {

            case 'text':
                ?>
                <input  name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php echo $current_value ?>" />
                <?php
                break;
                
            case 'image':
                ?>
                <input  name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" class="input-upload" type="text" value="<?php echo $current_value ?>" />
                <a href="#" class="aq_upload_button button" rel="image">Upload</a><p></p>
                <?php
                break;
                
            case 'video':
                ?>
                <input  name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" class="input-upload" type="text" value="<?php echo $current_value ?>" />
                <a href="#" class="aq_upload_button button" rel="video">Upload</a><p></p>
                <?php
                break;

            case 'select':
                ?>
                <select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
                    <?php foreach ($value['options'] as $key => $option) { ?>
                        <option value="<?php echo $key ?>" <?php
                        if ($current_value == $key) {
                            echo ' selected="selected"';
                        }
                        ?>><?php echo $option; ?></option>
                            <?php } ?>
                </select>
                <?php
                break;

            case 'textarea':
                ?>
                <textarea name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows=""><?php echo $current_value ?></textarea>
                <?php
                break;
        }
        ?>
    </div>
    <?php
}
function posts_product_options() {
    global $asalah_data;
    asalah_post_options(
            array("name" => __("Layout", 'asalah'),
                "id" => "asalah_post_layout",
                "type" => "select",
                "options" => array(
                    'default' => 'Default',
                    'right' => 'Right Sidebar',
                    'left' => 'Left Sidebar',
                    'full' => 'No Sidebar'
    )));

    // create custom sidebars array to use in the next option
    $custom_sidebars_options = array('none' => 'None');
    $sidebars = $asalah_data['asalah_custom_sidebars'];
    if ($sidebars):
        foreach ($sidebars as $option) {
            $siebar_id = "asalah_custom_sidebar_" . $option['order'];
            $custom_sidebars_options[$siebar_id] = $option['title'];
        }
    endif;
    
    asalah_post_options(
            array("name" => __("Custom Sidebar", 'asalah'),
                "id" => "asalah_custom_sidebar",
                "type" => "select",
                "options" => $custom_sidebars_options,
    ));
}

add_action('save_post', 'save_product');

function save_product() {
    global $post;

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return $post->ID;

    $custom_meta_fields = array(
        'asalah_post_layout',
        'asalah_custom_sidebar'
    );

    foreach ($custom_meta_fields as $custom_meta_field) {
        if (isset($_POST[$custom_meta_field])):
            update_post_meta($post->ID, $custom_meta_field, htmlspecialchars(stripslashes($_POST[$custom_meta_field])));
        else:
            if (isset($post->ID) && isset($custom_meta_field) && $custom_meta_field != '') {
                delete_post_meta($post->ID, $custom_meta_field);
            }
        endif;
    }
}
function posts_pages_options() {
    ?>
<script>
jQuery(document).ready(function() {

jQuery(document).on('click', '.aq_upload_button', function(event) {
		var $clicked = jQuery(this), frame,
			input_id = $clicked.prev().attr('id'),
			media_type = $clicked.attr('rel');
			
		event.preventDefault();
		
		// If the media frame already exists, reopen it.
		if ( frame ) {
			frame.open();
			return;
		}
		
		// Create the media frame.
		frame = wp.media.frames.aq_media_uploader = wp.media({
			// Set the media type
			library: {
				type: media_type
			},
			view: {
				
			}
		});
		
		// When an image is selected, run a callback.
		frame.on( 'select', function() {
			// Grab the selected attachment.
			var attachment = frame.state().get('selection').first();
			
			jQuery('#' + input_id).val(attachment.attributes.url);
			
			if(media_type == 'image') jQuery('#' + input_id).parent().parent().parent().find('.screenshot img').attr('src', attachment.attributes.url);
			
		});

		frame.open();
	
	});
	
var selected_page_template = jQuery("select[name='page_template'] option:selected ").val();
    
    if (selected_page_template == 'page-templates/clients.php') {
            jQuery('.asala_post_option_item').fadeOut();
            jQuery('#postdivrich.postarea').fadeOut();
            jQuery('#asalah_post_layout-item').fadeIn();
            jQuery('#asalah_custom_sidebar-item').fadeIn();
            jQuery('#asalah_title_holder-item').fadeIn();
            jQuery('#asalah_breadcrumb-item').fadeIn();
            jQuery('#asalah_custom_title_bg-item').fadeIn();
            jQuery('#asalah_banner_padding-item').fadeIn();
            
            jQuery('#asalah_banner_video_m4v-item').fadeIn();
            jQuery('#asalah_banner_video_mp4-item').fadeIn();
            jQuery('#asalah_banner_video_webm-item').fadeIn();
            jQuery('#asalah_banner_video_ogv-item').fadeIn();
            
    } else if (selected_page_template == 'page-templates/blog.php') {
            jQuery('.asala_post_option_item').fadeOut();
            jQuery('#postdivrich.postarea').fadeOut();
            jQuery('#asalah_post_layout-item').fadeIn();
            jQuery('#asalah_custom_sidebar-item').fadeIn();
            jQuery('#asalah_title_holder-item').fadeIn();
            jQuery('#asalah_breadcrumb-item').fadeIn();
            jQuery('#asalah_custom_title_bg-item').fadeIn();
            jQuery('#asalah_banner_padding-item').fadeIn();
            
            jQuery('#asalah_banner_video_m4v-item').fadeIn();
            jQuery('#asalah_banner_video_mp4-item').fadeIn();
            jQuery('#asalah_banner_video_webm-item').fadeIn();
            jQuery('#asalah_banner_video_ogv-item').fadeIn();
    } else if (selected_page_template == 'page-templates/testimonials.php') {
            jQuery('.asala_post_option_item').fadeOut();
            jQuery('#postdivrich.postarea').fadeOut();
            jQuery('#asalah_post_layout-item').fadeIn();
            jQuery('#asalah_custom_sidebar-item').fadeIn();
            jQuery('#asalah_title_holder-item').fadeIn();
            jQuery('#asalah_breadcrumb-item').fadeIn();
            jQuery('#asalah_custom_title_bg-item').fadeIn();
            jQuery('#asalah_banner_padding-item').fadeIn();
            
            jQuery('#asalah_banner_video_m4v-item').fadeIn();
            jQuery('#asalah_banner_video_mp4-item').fadeIn();
            jQuery('#asalah_banner_video_webm-item').fadeIn();
            jQuery('#asalah_banner_video_ogv-item').fadeIn();
    } else if (selected_page_template == 'page-templates/testimonials2col.php') {
            jQuery('.asala_post_option_item').fadeOut();
            jQuery('#postdivrich.postarea').fadeOut();
            jQuery('#asalah_post_layout-item').fadeIn();
            jQuery('#asalah_custom_sidebar-item').fadeIn();
            jQuery('#asalah_title_holder-item').fadeIn();
            jQuery('#asalah_breadcrumb-item').fadeIn();
            jQuery('#asalah_custom_title_bg-item').fadeIn();
            jQuery('#asalah_banner_padding-item').fadeIn();
            
            jQuery('#asalah_banner_video_m4v-item').fadeIn();
            jQuery('#asalah_banner_video_mp4-item').fadeIn();
            jQuery('#asalah_banner_video_webm-item').fadeIn();
            jQuery('#asalah_banner_video_ogv-item').fadeIn();
    } else if (selected_page_template == 'page-templates/portfolio.php' || selected_page_template == 'page-templates/portfolio2.php'  || selected_page_template == 'page-templates/portfolio3.php'  || selected_page_template == 'page-templates/portfolio4.php'  || selected_page_template == 'page-templates/portfolio5.php') {
            jQuery('.asala_post_option_item').fadeOut();
            jQuery('#postdivrich.postarea').fadeOut();
            jQuery('#asalah_title_holder-item').fadeIn();
            jQuery('#asalah_breadcrumb-item').fadeIn();
            jQuery('#asalah_custom_title_bg-item').fadeIn();
            jQuery('#asalah_banner_padding-item').fadeIn();
            
            jQuery('#asalah_banner_video_m4v-item').fadeIn();
            jQuery('#asalah_banner_video_mp4-item').fadeIn();
            jQuery('#asalah_banner_video_webm-item').fadeIn();
            jQuery('#asalah_banner_video_ogv-item').fadeIn();
    } else if (selected_page_template == 'page-templates/pagebuilder.php') {
            jQuery('.asala_post_option_item').fadeOut();
            jQuery('#postdivrich.postarea').fadeIn();
            jQuery('#asalah_post_layout-item').fadeIn();
            jQuery('#asalah_custom_sidebar-item').fadeIn();
            jQuery('#asalah_title_holder-item').fadeIn();
            jQuery('#asalah_breadcrumb-item').fadeIn();
            jQuery('#asalah_custom_title_bg-item').fadeIn();
            jQuery('#asalah_banner_padding-item').fadeIn();
            
            jQuery('#asalah_banner_video_m4v-item').fadeIn();
            jQuery('#asalah_banner_video_mp4-item').fadeIn();
            jQuery('#asalah_banner_video_webm-item').fadeIn();
            jQuery('#asalah_banner_video_ogv-item').fadeIn();
    } else if (selected_page_template == 'page-templates/woocommerce.php') {
            jQuery('.asala_post_option_item').fadeOut();
            jQuery('#postdivrich.postarea').fadeIn();
            jQuery('#asalah_post_layout-item').fadeIn();
            jQuery('#asalah_custom_sidebar-item').fadeIn();
            jQuery('#asalah_title_holder-item').fadeIn();
            jQuery('#asalah_breadcrumb-item').fadeIn();
            jQuery('#asalah_custom_title_bg-item').fadeIn();
            jQuery('#asalah_banner_padding-item').fadeIn();
            
            jQuery('#asalah_banner_video_m4v-item').fadeIn();
            jQuery('#asalah_banner_video_mp4-item').fadeIn();
            jQuery('#asalah_banner_video_webm-item').fadeIn();
            jQuery('#asalah_banner_video_ogv-item').fadeIn();
    } else{
            jQuery('#postdivrich.postarea').fadeIn();
            jQuery('.asala_post_option_item').fadeIn();
    }
    
    
// Check Reviews On or Off 
jQuery("select[name='page_template']").change(function(){
    var selected_page_template = jQuery("select[name='page_template'] option:selected ").val();
    
    if (selected_page_template == 'page-templates/clients.php') {
            jQuery('.asala_post_option_item').fadeOut();
            jQuery('#postdivrich.postarea').fadeOut();
            jQuery('#asalah_post_layout-item').fadeIn();
            jQuery('#asalah_custom_sidebar-item').fadeIn();
            jQuery('#asalah_title_holder-item').fadeIn();
            jQuery('#asalah_breadcrumb-item').fadeIn();
            jQuery('#asalah_custom_title_bg-item').fadeIn();
            jQuery('#asalah_banner_padding-item').fadeIn();
            
            jQuery('#asalah_banner_video_m4v-item').fadeIn();
            jQuery('#asalah_banner_video_mp4-item').fadeIn();
            jQuery('#asalah_banner_video_webm-item').fadeIn();
            jQuery('#asalah_banner_video_ogv-item').fadeIn();
            
    } else if (selected_page_template == 'page-templates/blog.php') {
            jQuery('.asala_post_option_item').fadeOut();
            jQuery('#postdivrich.postarea').fadeOut();
            jQuery('#asalah_post_layout-item').fadeIn();
            jQuery('#asalah_custom_sidebar-item').fadeIn();
            jQuery('#asalah_title_holder-item').fadeIn();
            jQuery('#asalah_breadcrumb-item').fadeIn();
            jQuery('#asalah_custom_title_bg-item').fadeIn();
            jQuery('#asalah_banner_padding-item').fadeIn();
            
            jQuery('#asalah_banner_video_m4v-item').fadeIn();
            jQuery('#asalah_banner_video_mp4-item').fadeIn();
            jQuery('#asalah_banner_video_webm-item').fadeIn();
            jQuery('#asalah_banner_video_ogv-item').fadeIn();
    } else if (selected_page_template == 'page-templates/testimonials.php') {
            jQuery('.asala_post_option_item').fadeOut();
            jQuery('#postdivrich.postarea').fadeOut();
            jQuery('#asalah_post_layout-item').fadeIn();
            jQuery('#asalah_custom_sidebar-item').fadeIn();
            jQuery('#asalah_title_holder-item').fadeIn();
            jQuery('#asalah_breadcrumb-item').fadeIn();
            jQuery('#asalah_custom_title_bg-item').fadeIn();
            jQuery('#asalah_banner_padding-item').fadeIn();
            
            jQuery('#asalah_banner_video_m4v-item').fadeIn();
            jQuery('#asalah_banner_video_mp4-item').fadeIn();
            jQuery('#asalah_banner_video_webm-item').fadeIn();
            jQuery('#asalah_banner_video_ogv-item').fadeIn();
    } else if (selected_page_template == 'page-templates/testimonials2col.php') {
            jQuery('.asala_post_option_item').fadeOut();
            jQuery('#postdivrich.postarea').fadeOut();
            jQuery('#asalah_post_layout-item').fadeIn();
            jQuery('#asalah_custom_sidebar-item').fadeIn();
            jQuery('#asalah_title_holder-item').fadeIn();
            jQuery('#asalah_breadcrumb-item').fadeIn();
            jQuery('#asalah_custom_title_bg-item').fadeIn();
            jQuery('#asalah_banner_padding-item').fadeIn();
            
            jQuery('#asalah_banner_video_m4v-item').fadeIn();
            jQuery('#asalah_banner_video_mp4-item').fadeIn();
            jQuery('#asalah_banner_video_webm-item').fadeIn();
            jQuery('#asalah_banner_video_ogv-item').fadeIn();
    } else if (selected_page_template == 'page-templates/portfolio.php' || selected_page_template == 'page-templates/portfolio2.php'  || selected_page_template == 'page-templates/portfolio3.php'  || selected_page_template == 'page-templates/portfolio4.php'  || selected_page_template == 'page-templates/portfolio5.php') {
            jQuery('.asala_post_option_item').fadeOut();
            jQuery('#postdivrich.postarea').fadeOut();
            jQuery('#asalah_title_holder-item').fadeIn();
            jQuery('#asalah_breadcrumb-item').fadeIn();
            jQuery('#asalah_custom_title_bg-item').fadeIn();
            jQuery('#asalah_banner_padding-item').fadeIn();
            
            jQuery('#asalah_banner_video_m4v-item').fadeIn();
            jQuery('#asalah_banner_video_mp4-item').fadeIn();
            jQuery('#asalah_banner_video_webm-item').fadeIn();
            jQuery('#asalah_banner_video_ogv-item').fadeIn();
    } else if (selected_page_template == 'page-templates/pagebuilder.php') {
            jQuery('.asala_post_option_item').fadeOut();
            jQuery('#postdivrich.postarea').fadeIn();
            jQuery('#asalah_post_layout-item').fadeIn();
            jQuery('#asalah_custom_sidebar-item').fadeIn();
            jQuery('#asalah_title_holder-item').fadeIn();
            jQuery('#asalah_breadcrumb-item').fadeIn();
            jQuery('#asalah_custom_title_bg-item').fadeIn();
            jQuery('#asalah_banner_padding-item').fadeIn();
            
            jQuery('#asalah_banner_video_m4v-item').fadeIn();
            jQuery('#asalah_banner_video_mp4-item').fadeIn();
            jQuery('#asalah_banner_video_webm-item').fadeIn();
            jQuery('#asalah_banner_video_ogv-item').fadeIn();
    } else if (selected_page_template == 'page-templates/woocommerce.php') {
            jQuery('.asala_post_option_item').fadeOut();
            jQuery('#postdivrich.postarea').fadeIn();
            jQuery('#asalah_post_layout-item').fadeIn();
            jQuery('#asalah_custom_sidebar-item').fadeIn();
            jQuery('#asalah_title_holder-item').fadeIn();
            jQuery('#asalah_breadcrumb-item').fadeIn();
            jQuery('#asalah_custom_title_bg-item').fadeIn();
            jQuery('#asalah_banner_padding-item').fadeIn();
            
            jQuery('#asalah_banner_video_m4v-item').fadeIn();
            jQuery('#asalah_banner_video_mp4-item').fadeIn();
            jQuery('#asalah_banner_video_webm-item').fadeIn();
            jQuery('#asalah_banner_video_ogv-item').fadeIn();
    } else{
            jQuery('#postdivrich.postarea').fadeIn();
            jQuery('.asala_post_option_item').fadeIn();
    }
 });        
});
</script>
<?php
    global $asalah_data;
    asalah_post_options(
            array("name" => __("Layout", 'asalah'),
                "id" => "asalah_post_layout",
                "type" => "select",
                "options" => array(
                    'default' => 'Default',
                    'right' => 'Right Sidebar',
                    'left' => 'Left Sidebar',
                    'full' => 'No Sidebar'
    )));

    // create custom sidebars array to use in the next option
    $custom_sidebars_options = array('none' => 'None');
    $sidebars = $asalah_data['asalah_custom_sidebars'];
    if ($sidebars):
        foreach ($sidebars as $option) {
            $siebar_id = "asalah_custom_sidebar_" . $option['order'];
            $custom_sidebars_options[$siebar_id] = $option['title'];
        }
    endif;

    asalah_post_options(
            array("name" => __("Custom Sidebar", 'asalah'),
                "id" => "asalah_custom_sidebar",
                "type" => "select",
                "options" => $custom_sidebars_options,
    ));

    asalah_post_options(
            array("name" => __("Page Title", 'asalah'),
                "id" => "asalah_title_holder",
                "type" => "select",
                "options" => array(
                    'default' => 'Default',
                    'show' => 'Show',
                    'hide' => 'Hide',
    )));

    asalah_post_options(
            array("name" => __("Breadcrumb", 'asalah'),
                "id" => "asalah_breadcrumb",
                "type" => "select",
                "options" => array(
                    'default' => 'Default',
                    'show' => 'Show',
                    'hide' => 'Hide',
    )));
    
    asalah_post_options(
            array("name" => __("Post Title", 'asalah'),
                "id" => "asalah_post_title",
                "type" => "select",
                "options" => array(
                    'show' => 'Show',
                    'hide' => 'Hide',
    )));
    
    asalah_post_options(
            array("name" => __("Meta Info", 'asalah'),
                "id" => "asalah_meta_info",
                "type" => "select",
                "options" => array(
                    'default' => 'Default',
                    'show' => 'Show',
                    'hide' => 'Hide',
    )));

    asalah_post_options(
            array("name" => __("Author Box", 'asalah'),
                "id" => "asalah_author_box",
                "type" => "select",
                "options" => array(
                    'default' => 'Default',
                    'show' => 'Show',
                    'hide' => 'Hide',
    )));

    asalah_post_options(
            array("name" => __("Author Name in Meta", 'asalah'),
                "id" => "asalah_author_meta",
                "type" => "select",
                "options" => array(
                    'default' => 'Default',
                    'show' => 'Show',
                    'hide' => 'Hide',
    )));

    asalah_post_options(
            array("name" => __("Post Share", 'asalah'),
                "id" => "asalah_post_share",
                "type" => "select",
                "options" => array(
                    'default' => 'Default',
                    'show' => 'Show',
                    'hide' => 'Hide',
    )));


    asalah_post_options(
            array("name" => __("Post Tags Cloud", 'asalah'),
                "id" => "asalah_post_tags",
                "type" => "select",
                "options" => array(
                    'default' => 'Default',
                    'show' => 'Show',
                    'hide' => 'Hide',
    )));

    asalah_post_options(
            array("name" => __("Post date position", 'asalah'),
                "id" => "asalah_post_date",
                "type" => "select",
                "options" => array(
                    'default' => 'Default',
                    'label' => 'Left Side Label',
                    'meta' => 'Meta Info Line',
                    'both' => 'Both Label and Meta Line',
                    'hide' => 'Hide',
    )));

    asalah_post_options(
            array("name" => __("Post Comments", 'asalah'),
                "id" => "asalah_post_comments",
                "type" => "select",
                "options" => array(
                    'default' => 'Default',
                    'show' => 'Show',
                    'hide' => 'Hide',
    )));
    
    /*
    asalah_post_options(
            array("name" => __("Post Facebook Comments", 'asalah'),
                "id" => "asalah_post_fbcomments",
                "type" => "select",
                "options" => array(
                    'default' => 'Default',
                    'show' => 'Show',
                    'hide' => 'Hide',
    )));
     * 
     */
     
    asalah_post_options(
            array("name" => __("Custom page title background URL", 'asalah'),
                "id" => "asalah_custom_title_bg",
                "type" => "image",
    ));
    
    asalah_post_options(
            array("name" => __("Page banner video background - mp4", 'asalah'),
                "id" => "asalah_banner_video_mp4",
                "type" => "video",
    ));
    
    asalah_post_options(
            array("name" => __("Page banner video background - m4v", 'asalah'),
                "id" => "asalah_banner_video_m4v",
                "type" => "video",
    ));
    
    asalah_post_options(
            array("name" => __("Page banner video background - webm", 'asalah'),
                "id" => "asalah_banner_video_webm",
                "type" => "video",
    ));
    
    asalah_post_options(
            array("name" => __("Page banner video background - ogv/ogg", 'asalah'),
                "id" => "asalah_banner_video_ogv",
                "type" => "video",
    ));
    
    
    
    asalah_post_options(
            array("name" => __("Page title banner padding", 'asalah'),
                "id" => "asalah_banner_padding",
                "type" => "text",
                "default" => '18'
    ));
}

add_action('save_post', 'save_post_and_page');

function save_post_and_page() {
    global $post;

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return $post->ID;

    $custom_meta_fields = array(
        'asalah_post_layout',
        'asalah_custom_sidebar',
        'asalah_title_holder',
        'asalah_breadcrumb',
        'asalah_post_title',
        'asalah_meta_info',
        'asalah_author_box',
        'asalah_author_meta',
        'asalah_post_share',
        'asalah_post_tags',
        'asalah_post_date',
        'asalah_post_comments',
        'asalah_post_fbcomments',
        'asalah_custom_title_bg',
        'asalah_banner_padding',
        'asalah_banner_video_mp4',
        'asalah_banner_video_m4v',
        'asalah_banner_video_webm',
        'asalah_banner_video_ogv'
        
    );

    foreach ($custom_meta_fields as $custom_meta_field) {
        if (isset($_POST[$custom_meta_field])):
            update_post_meta($post->ID, $custom_meta_field, htmlspecialchars(stripslashes($_POST[$custom_meta_field])));
        else:
            if (isset($post->ID) && isset($custom_meta_field) && $custom_meta_field != '') {
                delete_post_meta($post->ID, $custom_meta_field);
            }
        endif;
    }
}

function asalah_project_options() {
	?>
	<script>
	jQuery(document).ready(function() {
	
	jQuery(document).on('click', '.aq_upload_button', function(event) {
			var $clicked = jQuery(this), frame,
				input_id = $clicked.prev().attr('id'),
				media_type = $clicked.attr('rel');
				
			event.preventDefault();
			
			// If the media frame already exists, reopen it.
			if ( frame ) {
				frame.open();
				return;
			}
			
			// Create the media frame.
			frame = wp.media.frames.aq_media_uploader = wp.media({
				// Set the media type
				library: {
					type: media_type
				},
				view: {
					
				}
			});
			
			// When an image is selected, run a callback.
			frame.on( 'select', function() {
				// Grab the selected attachment.
				var attachment = frame.state().get('selection').first();
				
				jQuery('#' + input_id).val(attachment.attributes.url);
				
				if(media_type == 'image') jQuery('#' + input_id).parent().parent().parent().find('.screenshot img').attr('src', attachment.attributes.url);
				
			});
	
			frame.open();
		
		});
	});
	</script>
	<?php
    asalah_post_options(
            array("name" => __("Layout", 'asalah'),
                "id" => "asalah_project_layout",
                "type" => "select",
                "options" => array(
                    'default' => 'Default',
                    'right' => 'Right',
                    'left' => 'Left',
                    'full' => 'Full Width'
    )));

    asalah_post_options(
            array("name" => __("Page Title", 'asalah'),
                "id" => "asalah_title_holder",
                "type" => "select",
                "options" => array(
                    'default' => 'Default',
                    'show' => 'Show',
                    'hide' => 'Hide',
    )));

    asalah_post_options(
            array("name" => __("Breadcrumb", 'asalah'),
                "id" => "asalah_breadcrumb",
                "type" => "select",
                "options" => array(
                    'default' => 'Default',
                    'show' => 'Show',
                    'hide' => 'Hide',
    )));

    asalah_post_options(
            array("name" => __("Project Details", 'asalah'),
                "id" => "asalah_projects_details",
                "type" => "select",
                "options" => array(
                    'default' => 'Default',
                    'show' => 'Show',
                    'hide' => 'Hide',
    )));
    
    asalah_post_options(
            array("name" => __("Project Social Like", 'asalah'),
                "id" => "asalah_projects_social",
                "type" => "select",
                "options" => array(
                    'default' => 'Default',
                    'show' => 'Show',
                    'hide' => 'Hide',
    )));

    asalah_post_options(
            array("name" => __("Other Projects", 'asalah'),
                "id" => "asalah_other_projects",
                "type" => "select",
                "options" => array(
                    'default' => 'Default',
                    'show' => 'Show',
                    'hide' => 'Hide',
    )));
    
    asalah_post_options(
            array("name" => __("Custom page title background URL", 'asalah'),
                "id" => "asalah_custom_title_bg",
                "type" => "image",
    ));
    
    asalah_post_options(
            array("name" => __("Page title banner padding", 'asalah'),
                "id" => "asalah_banner_padding",
                "type" => "text",
                "default" => '18'
    ));
    
    asalah_post_options(
            array("name" => __("Page banner video background - mp4", 'asalah'),
                "id" => "asalah_banner_video_mp4",
                "type" => "video",
    ));
    
    asalah_post_options(
            array("name" => __("Page banner video background - m4v", 'asalah'),
                "id" => "asalah_banner_video_m4v",
                "type" => "video",
    ));
    
    asalah_post_options(
            array("name" => __("Page banner video background - webm", 'asalah'),
                "id" => "asalah_banner_video_webm",
                "type" => "video",
    ));
    
    asalah_post_options(
            array("name" => __("Page banner video background - ogv/ogg", 'asalah'),
                "id" => "asalah_banner_video_ogv",
                "type" => "video",
    ));
}

function asalah_project_details() {
    asalah_post_options(
            array("name" => __("Project Date", 'asalah'),
                "id" => "asalah_project_date",
                "type" => "text"));
    
    asalah_post_options(
            array("name" => __("Client Name", 'asalah'),
                "id" => "asalah_project_client",
                "type" => "text"));

    asalah_post_options(
            array("name" => __("Client URL", 'asalah'),
                "id" => "asalah_project_client_url",
                "type" => "text"));

    asalah_post_options(
            array("name" => __("Project Preview URL", 'asalah'),
                "id" => "asalah_project_url",
                "type" => "text"));

    asalah_post_options(
            array("name" => __("Project Preview Text", 'asalah'),
                "id" => "asalah_project_preview_text",
                "type" => "text"));
}

add_action('save_post', 'save_project');

function save_project() {
    global $post;

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return $post->ID;

    $custom_meta_fields = array(
        'asalah_project_date',
        'asalah_project_layout',
        'asalah_projects_details',
        'asalah_title_holder',
        'asalah_breadcrumb',
        'asalah_project_client',
        'asalah_project_client_url',
        'asalah_project_url',
        'asalah_project_preview_text',
        'asalah_projects_social',
        'asalah_other_projects',
        'asalah_custom_title_bg',
        'asalah_banner_padding',
        'asalah_banner_video_mp4',
        'asalah_banner_video_m4v',
        'asalah_banner_video_webm',
        'asalah_banner_video_ogv'
    );

    foreach ($custom_meta_fields as $custom_meta_field) {
        if (isset($_POST[$custom_meta_field])):
            update_post_meta($post->ID, $custom_meta_field, htmlspecialchars(stripslashes($_POST[$custom_meta_field])));
        else:
            if (isset($post->ID) && isset($custom_meta_field) && $custom_meta_field != '') {
                delete_post_meta($post->ID, $custom_meta_field);
            }
        endif;
    }
}

function asalah_testimonial_details() {

    asalah_post_options(
            array("name" => __("Author Name", 'asalah'),
                "id" => "asalah_testimonial_author",
                "type" => "text"));

    asalah_post_options(
            array("name" => __("Author Job", 'asalah'),
                "id" => "asalah_testimonial_job",
                "type" => "text"));
    asalah_post_options(
            array("name" => __("Author Company", 'asalah'),
                "id" => "asalah_testimonial_company",
                "type" => "text"));

    asalah_post_options(
            array("name" => __("Author Url", 'asalah'),
                "id" => "asalah_testimonial_url",
                "type" => "text"));
}

add_action('save_post', 'save_testimonial');

function save_testimonial() {
    global $post;

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return $post->ID;

    $custom_meta_fields = array(
        'asalah_testimonial_author',
        'asalah_testimonial_job',
        'asalah_testimonial_url',
        'asalah_testimonial_company'
    );

    foreach ($custom_meta_fields as $custom_meta_field) {
        if (isset($_POST[$custom_meta_field])):
            update_post_meta($post->ID, $custom_meta_field, htmlspecialchars(stripslashes($_POST[$custom_meta_field])));
        else:
            if (isset($post->ID) && isset($custom_meta_field) && $custom_meta_field != '') {
                delete_post_meta($post->ID, $custom_meta_field);
            }
        endif;
    }
}

function asalah_team_details() {
    asalah_post_options(
            array("name" => __("Position", 'asalah'),
                "id" => "asalah_member_position",
                "type" => "text"));
    
    asalah_post_options(
            array("name" => __("Facebook URL", 'asalah'),
                "id" => "asalah_member_fb",
                "type" => "text"));
                
    asalah_post_options(
            array("name" => __("Twitter URL", 'asalah'),
                "id" => "asalah_member_twitter",
                "type" => "text"));
                
    asalah_post_options(
            array("name" => __("Skill 1", 'asalah'),
                "id" => "asalah_member_skill1",
                "type" => "text"));
                
    asalah_post_options(
            array("name" => __("Skill 1 Percent", 'asalah'),
                "id" => "asalah_member_skill1_percent",
                "type" => "text"));
                
    asalah_post_options(
            array("name" => __("Skill 2", 'asalah'),
                "id" => "asalah_member_skill2",
                "type" => "text"));
                
    asalah_post_options(
            array("name" => __("Skill 2 Percent", 'asalah'),
                "id" => "asalah_member_skill2_percent",
                "type" => "text"));
                
    asalah_post_options(
            array("name" => __("Skill 3", 'asalah'),
                "id" => "asalah_member_skill3",
                "type" => "text"));
                
    asalah_post_options(
            array("name" => __("Skill 3 Percent", 'asalah'),
                "id" => "asalah_member_skill3_percent",
                "type" => "text"));
                
                
}

add_action('save_post', 'save_team');

function save_team() {
    global $post;

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return $post->ID;

    $custom_meta_fields = array(
        'asalah_member_position',
        'asalah_member_fb',
        'asalah_member_twitter',
        'asalah_member_skill1',
        'asalah_member_skill1_percent',
        'asalah_member_skill2',
        'asalah_member_skill2_percent',
        'asalah_member_skill3',
        'asalah_member_skill3_percent'
    );

    foreach ($custom_meta_fields as $custom_meta_field) {
        if (isset($_POST[$custom_meta_field])):
            update_post_meta($post->ID, $custom_meta_field, htmlspecialchars(stripslashes($_POST[$custom_meta_field])));
        else:
            if (isset($post->ID) && isset($custom_meta_field) && $custom_meta_field != '') {
                delete_post_meta($post->ID, $custom_meta_field);
            }
        endif;
    }
}

function asalah_clients_details() {
    asalah_post_options(
            array("name" => __("Client URL", 'asalah'),
                "id" => "asalah_client_url",
                "type" => "text"));
}

add_action('save_post', 'save_client');

function save_client() {
    global $post;

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return $post->ID;

    $custom_meta_fields = array(
        'asalah_client_url'
    );

    foreach ($custom_meta_fields as $custom_meta_field) {
        if (isset($_POST[$custom_meta_field])):
            update_post_meta($post->ID, $custom_meta_field, htmlspecialchars(stripslashes($_POST[$custom_meta_field])));
        else:
            if (isset($post->ID) && isset($custom_meta_field) && $custom_meta_field != '') {
                delete_post_meta($post->ID, $custom_meta_field);
            }
        endif;
    }
}
?>